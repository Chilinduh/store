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
use app\components\PanelWidget;
use app\components\BreadcrumbWidget;

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;

?>

<?= BreadcrumbWidget::widget([
  'title' => 'Товары',
  'createUrl' => '/products/create',
]);
?>

<?= PanelWidget::start(); ?>

<?php
echo $this->context->renderPartial('_search_form', [
  'searchModel' => $searchModel
]);
?>

<?= PanelWidget::finish(); ?>

<?= PanelWidget::start(); ?>

Всего товаров: <?= $contentData['total']??0 ?>,
Товаров для Рерайта: <?= $contentData['rewriteTotal']??0 ?>,
Сумма символов по описаниям товаров: <?= $contentData['source_description']??0 ?>,
Сумма символов по Рерайту описаний: <?= $contentData['rewrite_description']??0 ?>

<?php echo $this->context->renderPartial('_products', [
  'dataProvider' => $dataProvider,
  'filterModel' => $searchModel,
  'searchModel' => $searchModel,
]); ?>


<?= PanelWidget::finish(); ?>
