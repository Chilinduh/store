<?php

namespace common\components;

use common\models\Products;
use common\models\Tree;
use Yii;
use yii\base\Component;
use yii\base\ErrorException;
use yii\base\Exception;
use yii\base\InvalidConfigException;
use yii\caching\Cache;
use yii\caching\TagDependency;
use yii\db\Transaction;
use yii\web\NotFoundHttpException;
use yii\web\User;
use yii\helpers\ArrayHelper;

class Catalog extends Component
{

  protected $catalog;
  protected $request;

  public function init()
  {

    $this->request = Yii::$app->request;
    $roots = Tree::find()
      ->where(['lvl' => 0])
      ->andWhere(['visible' => true])
      ->addOrderBy('root, lft')
      ->all();

    $this->catalog = $this->getFullTreeStructure($roots);

    foreach ($this->catalog as $key => $item) {

      $this->catalog[$key] = ArrayHelper::merge(
        $this->catalog[$key],
        [
          'productsCount' => $this->getCategoryElementsCount($item)
        ]);
    }

    parent::init();
  }

  public static function getTree($categories, $left = 0, $right = null, $lvl = 1)
  {

    $tree = [];
    foreach ($categories as $index => $category) {
      if ($category->lft >= $left + 1 && (is_null($right) || $category->rgt <= $right) && $category->lvl == $lvl) {

        $count = Products::find()->select('count(id)')->where(['category_id' => $category->id])->andWhere(['>', 'price', 0])->scalar();
        $subCategory = self::getTree($categories, $category->lft, $category->rgt, $category->lvl + 1);
        $tree[$category->id] = [
          'id' => $category->id,
          'visible' => $category->visible,
          'count' => $count??0,
          'lvl' => $lvl,
          'image' => $category->getFiles()->asArray()->one(),
          'name' => $category->name,
          'items' => $subCategory,
        ];
      }
    }
    return $tree;
  }

  public static function getFullTreeStructure($roots)
  {

    $tree = [];
    foreach ($roots as $root) {

      $count = Products::find()->select('count(id)')->where(['category_id' => $root->id])->andWhere(['>', 'price', 0])->scalar();
      $tree [$root->id] = [
        'id' => $root->id,
        'name' => $root->name,
        'visible' => $root->visible,
        'lvl' => $root->lvl,
        'count' => $count,
        'image' => $root->getFiles()->asArray()->one(),
        'items' => self::getTree($root->children()->andWhere(['visible' => true])->all()),
      ];
    }
    return $tree;
  }

  public function getCatalogCategory()
  {
    $params = $this->request->queryParams;
    return Tree::find()->where(['id' => $params['category_id']])->asArray()->one();
  }


  public function getCatalogBreadCrumbs(): array
  {

    $breadCrumbs = [];
    $catalog = $this->getParents();

    if (isset($catalog['parent']['id'])) {
      $breadCrumbs[] = [
        'url' => '/catalog/' . $catalog['parent']['id'],
        'name' => $catalog['parent']['name']
      ];
    }

    if (isset($catalog['sub']['id'])) {
      $breadCrumbs[] = [
        'url' => '/catalog/' . $catalog['sub']['id'],
        'name' => $catalog['sub']['name']
      ];
    }

    if (isset($catalog['category']['id'])) {
      $breadCrumbs[] = [
        'url' => '/catalog/' . $catalog['category']['id'],
        'name' => $catalog['category']['name']
      ];
    }

    return $breadCrumbs;
  }

  public function getParents(): array
  {

    $params = $this->request->queryParams;
    $catalog = [];

    if ($params && isset($params['category_id'])) {

      $category = Tree::findOne((int)$params['category_id']);

      if ($category) {

        switch ($category->lvl) {

          case Tree::LVL_ZERO:

            $catalog = [
              'parent' => ArrayHelper::toArray($category) ?? false,
            ];
            break;
          case Tree::LVL_ONE:
            $parent = $category->parents(2)->asArray()->one();
            $sub = $category->parents(1)->asArray()->one();
            $catalog = [
              'parent' => $parent ?? false,
              'category' => ArrayHelper::toArray($category) ?? false,
            ];
            break;
          case Tree::LVL_TWO:
            $parent = $category->parents(2)->asArray()->one();
            $sub = $category->parents(1)->asArray()->one();
            $catalog = [
              'parent' => $parent ?? false,
              'sub' => $sub ?? false,
              'category' => ArrayHelper::toArray($category) ?? false,
            ];
        }
      }
    }

    return $catalog;
  }

  public function getCatalogByCategoryId(int $category_id, array $arr, array &$result)
  {
    if ($category_id) {

      if (isset($arr[$category_id])) {
        $result = $arr[$category_id];
      }
      // Обходим все элементы массива в цикле
      foreach ($arr as $key => $param) {
        // Если элемент массива есть массив, то вызываем рекурсивно эту функцию
        if (is_array($param)) {
          $this->getCatalogByCategoryId($category_id, $param, $result);
        }
      }
    }
  }

  public function getCatalog(int $category_id = null)
  {

    if ($category_id) {
      $result = [];
      $lvl = $this->getCategoryLvl($category_id);

      $category = Tree::find()
        ->where(['id' => $category_id])->andWhere(['visible' => 1])->one();

      if ($category->lvl === 2) {

        $parent = $category->parents(1)->one();
        $category_id = $parent->id;
      }

      $this->getCatalogByCategoryId($category_id, $this->catalog, $result);

      return [
        'parent' => [$result],
        'sub' => $result['items']??[],
        'count' => count(Products::find()->where(['category_id' => $category_id])->all())
      ];
    }

    return $this->catalog;
  }

  public function getCategoryLvl(int $category_id = null)
  {
    $result = [];
    $this->getCatalogByCategoryId($category_id, $this->catalog, $result);

    return $result['lvl']??false;
  }

  public function getCategoryElementsCount(array $category = [])
  {

    $count = 0;
    if ($category) {

      foreach ($category['items'] as $cat) {

        if (isset($cat['items'])) {
          foreach ($cat['items'] as $item) {

            $count += $item['count'];
          }
        }
      }
    }

    return $count;
  }

}
