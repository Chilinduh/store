<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use yii\helpers\Html;
use yiister\gentelella\widgets\Panel;
use yii\helpers\ArrayHelper;
use app\components\PanelWidget;
use kartik\form\ActiveForm;
use kartik\color\ColorInput;
use kartik\checkbox\CheckboxX;
use app\components\BreadcrumbWidget;
use common\models\OrdersStatusColors;
use kartik\select2\Select2;

?>


<?=
BreadcrumbWidget::widget([
  'title' => 'Статусы заказов - Создать',
  'createUrl' => '/order-status/create',
  'breadcrumbs' => [
    [
      'label' => 'Статусы заказов - '.($model->id ? 'редактировать' : 'создать'),
      'url' => '/order-status'
    ]
  ]
]);
?>

<?= PanelWidget::start(); ?>

<?php

$form = ActiveForm::begin(); ?>

<?= $form->field($model, 'name'); ?>
<?= $form->field($model, 'status_color_id')->widget(Select2::classname(), [
  'data' => ArrayHelper::map(OrdersStatusColors::Colors(), 'id', 'name'),
]); ?>
<?= $form->field($model, 'show')->widget(CheckboxX::classname(), [
  'autoLabel' => true,
  'pluginOptions' => [
    'threeState' => false,
    'size' => 'md'
  ]
])->label(false); ?>

<?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
<?= PanelWidget::finish(); ?>


