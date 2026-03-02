<?php


/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 18.07.19
 * Time: 16:26
 */

namespace app\components;

use Yii;
use common\models\Tree;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use backend\models\Menu;

/**
 * Class Panel
 * @package infinitiweb\widgets\yii2\panel
 */
class MenuWidget extends Widget
{

  public $menu = [];

  public function init()
  {

    $roots = Menu::find()->where(['lvl' => 0])->andWhere(['active' => 1])->andWhere(['visible' => true])->addOrderBy('root, lft')->all();
    $this->menu = $this->getFullTreeStructure($roots);

    parent::init();
  }

  public static function getTree($categories, $left = 0, $right = null, $lvl = 1)
  {

    $tree = [];

    foreach ($categories as $index => $category) {

      $count = 0;

      if ($category->lft >= $left + 1 && (is_null($right) || $category->rgt <= $right) && $category->lvl == $lvl) {

        if ($lvl == 2) {
          $count = Products::find()->select('count(id)')->where(['category_id' => $category->id])->scalar();
        }

        $tree[$category->id] = [
          'id' => $category->id,
          'count' => $count,
          'url' => $category->url,
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

      $tree [$root->id] = [
        'id' => $root->id,
        'label' => $root->name,
        'items' => self::getTree($root->children()->andWhere(['visible' => true])->all()),
      ];
    }
    return $tree;
  }

  public function run()
  {

    echo $this->render('menu', [
      'menu' => $this->menu,
      'current' => Yii::$app->controller->id
    ]);
  }

}



