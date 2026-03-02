<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 03.10.22
 * Time: 16:10
 */

namespace frontend\components\CatalogHeader;

use common\components\Catalog;
use common\models\Products;
use common\models\Tree;
use yii\base\Widget;
use yii\helpers\Html;

class CatalogHeaderWidget extends Widget
{
  public $categories;
  public $category;

  public static function getTree($categories, $left = 0, $right = null, $lvl = 1)
  {

    $tree = [];

    foreach ($categories as $index => $category) {
      if ($category->lft >= $left + 1 && (is_null($right) || $category->rgt <= $right) && $category->lvl == $lvl) {

        $count = 0;
        if ($lvl == 2 || $lvl == 1) {
          $count = Products::find()->select('count(id)')->where(['category_id' => $category->id])->scalar();
        }

        $tree[] = [
          'id' => $category->id,
          'count' => $count,
          'label' => $category->name,
          'items' => self::getTree($categories, $category->lft, $category->rgt, $category->lvl + 1),
        ];
      }
    }

    return $tree;
  }

  public static function getFullTreeStructure($roots)
  {

    $tree = [];
    foreach ($roots as $root) {

      $tree [] = [
        'id' => $root->id,
        'label' => $root->name,
        'items' => self::getTree($root->children()->andWhere(['visible' => true])->all()),
      ];
    }
    return $tree;
  }

  public function init()
  {

    $roots = Tree::find()->where(['lvl' => 0])->andWhere(['visible' => 1])->addOrderBy('root, lft')->all();

    $this->categories = $this->getFullTreeStructure($roots);

    parent::init();
  }

  public function run()
  {

    $categories = [];
    $catalog = new Catalog();

    $index = 0;

    foreach ($catalog->getCatalog() as $cKey => $category) {

      $categories[$cKey] = $category;
      $categories[$cKey]['items'] = [];

      $columns = 0;
      foreach ($category['items'] as $sKey => $item) {

        if (in_array($columns++, [4, 8, 12])) {
          $index++;
        }
        $categories[$cKey]['items'][$index][] = $item;
      }
    }

    return $this->render('catalog_header', [
      'categories' => $categories,
    ]);
  }
}


