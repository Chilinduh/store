<?php

use yii\helpers\Html;
use common\models\FKPlatformTypes;
use app\models\Users;
use kartik\daterange\DateRangePicker;
use kartik\form\ActiveForm;
use kartik\datetime\DateTimePicker;
use common\helpers\MiscHelpers;
use kartik\select2\Select2;
use yiister\gentelella\widgets\Panel;
use common\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use common\models\Tree;

use kartik\tree\TreeView;
use app\components\BreadcrumbWidget;
use app\components\PanelWidget;

?>

<?= BreadcrumbWidget::widget([
  'title' => 'Категории товаров',
]);
?>

<?= PanelWidget::start(); ?>

<?php

echo TreeView::widget([
  // single query fetch to render the tree
  'query' => Tree::find()->addOrderBy('root, lft'),
  'headingOptions' => ['label' => 'Categories'],
  'isAdmin' => true,                       // optional (toggle to enable admin mode)
  'displayValue' => 1,                           // initial display value
  //'softDelete'      => true,                        // normally not needed to change
  'cacheSettings' => ['enableCache' => false],      // normally not needed to change
  'nodeAddlViews' => [

    \kartik\tree\Module::VIEW_PART_3 => '@backend/views/category/_image'
  ]
]);
?>

<?= PanelWidget::finish(); ?>
<style>
  .modal {
    opacity: 1;
  }
</style>
