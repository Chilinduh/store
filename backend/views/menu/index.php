<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use yii\helpers\Html;
use kartik\select2\Select2;
use yiister\gentelella\widgets\Panel;
use yii\helpers\Url;
use kartik\tree\TreeView;
use backend\models\Menu;
use app\components\PanelWidget;
use app\components\BreadcrumbWidget;

?>

<?= BreadcrumbWidget::widget([
  'title' => 'Меню',
  'breadcrumbs' => [
    [
      'label' => 'Меню',
      'url' => '/menu'
    ]
  ]
]);
?>

<?= PanelWidget::start(); ?>

    <?php echo TreeView::widget([
      // single query fetch to render the tree
      'query' => Menu::find()->addOrderBy('root, lft'),
      'headingOptions' => ['label' => 'Categories'],
      'isAdmin' => true,                       // optional (toggle to enable admin mode)
      'displayValue' => 1,                           // initial display value
      //'softDelete'      => true,                        // normally not needed to change
      'cacheSettings' => ['enableCache' => false],     // normally not needed to change
      'nodeAddlViews' => [

        \kartik\tree\Module::VIEW_PART_2 => '@backend/views/menu/_url'

      ]
    ]);
    ?>

  </div>
</div>

<?php PanelWidget::finish() ?>

<style>
  .modal {
    opacity: 1;
  }
</style>
