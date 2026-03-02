<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use app\components\PanelWidget;

use backend\models\Menu;
use yii\widgets\ActiveForm;
use app\components\BreadcrumbWidget;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
//$parent = Menu::findOne(['id' => $menu->parent_id]);
?>


<?= BreadcrumbWidget::widget([
  'title' => 'Заявки',
  'createUrl' => '/cargo-orders/create',
  'breadcrumbs' => [
    ['label' => $menu->name, 'url' => Yii::$app->getUrlManager()->createUrl([$menu->url])],
    ['label' => $model->number ?? '']
  ]
]);
?>

<?= PanelWidget::start(false); ?>

<div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10">
  <!--begin::Card body-->
  <?php

  echo $this->context->renderPartial('_tabs', [
    'model' => $model,
  ]);
  ?>
  <!--end::Card body-->
</div>
<div class="card card-flush">
  <!--begin::Card header-->
  <div class="card-body pb-0">


    <?php $form = ActiveForm::begin(['action' => '/cargo-orders/' . $model->id . '/update-route/' . $route->id]); ?>
    <div class="row">
      <!--begin::Col-->
      <div class="col-md-12">

        <div class="row">
          <div class="col-md-12">
            <?= $form->field($direction, 'address_start'); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <?= $form->field($direction, 'lat_start')->label('Широта'); ?>
          </div>
          <div class="col-md-3">
            <?= $form->field($direction, 'lon_start')->label('Долгота'); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <?= $form->field($direction, 'address_end'); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <?= $form->field($direction, 'lat_end')->label('Широта'); ?>
          </div>
          <div class="col-md-3">
            <?= $form->field($direction, 'lon_end')->label('Долгота'); ?>
          </div>
        </div>
        <?= $form->field($direction, 'date_start')->widget(DateTimePicker::classname(), [
          'options' => [],
          'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
          'pluginOptions' => [
            'autoclose' => true,
          ]
        ]); ?>
        <?= $form->field($direction, 'date_end')->widget(DateTimePicker::classname(), [
          'options' => [],
          'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
          'pluginOptions' => [
            'autoclose' => true,
          ]
        ]); ?>
        <?= $form->field($direction, 'comment', [
        ])->textArea([
          'id' => 'address-input',
          'placeholder' => 'Комментарий...',
          'rows' => 3
        ]); ?>
        <br>
        <div class="form-group">
          <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
        </div>
        <br>
      </div>

    </div>
    <?php ActiveForm::end(); ?>
  </div>

</div>

<?= PanelWidget::finish(false); ?>
