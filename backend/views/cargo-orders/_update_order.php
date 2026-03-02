<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use app\components\PanelWidget;
use yii\helpers\Html;
use backend\models\Menu;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\components\BreadcrumbWidget;
use kartik\editors\Summernote;
use common\models\CargoCarType;
use common\models\CargoGoodType;
use kartik\checkbox\CheckboxX;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
//$parent = Menu::findOne(['id' => $menu->parent_id]);
?>


<?= BreadcrumbWidget::widget([
  'title' => 'Заявки',
  'createUrl' => '/cargo-orders/create',
  'breadcrumbs' => [
    ['label' => $menu->name, 'url' => Yii::$app->getUrlManager()->createUrl([$menu->url])],
    ['label' => $model->number??'']
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
    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
      <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <div class="row">
      <!--begin::Col-->
      <div class="col-md-6">

        <?= $form->field($model, 'good_type_id')->widget(Select2::classname(), [
          'data' => ArrayHelper::map(CargoGoodType::find()->all(), 'id', 'name'),
          'options' => ['placeholder' => 'Выбрать тип товара'],
          'pluginOptions' => [
            'allowClear' => true
          ],
        ]);  ?>

        <?= $form->field($model, 'car_type_id')->widget(Select2::classname(), [
          'data' => ArrayHelper::map(CargoCarType::find()->all(), 'id', 'name'),
          'options' => ['placeholder' => 'Выбрать тип товара'],
          'pluginOptions' => [
            'allowClear' => true
          ],
        ]);  ?>

        <?= $form->field($model, 'route_start')->hint('Город погрузки'); ?>
        <?= $form->field($model, 'route_end')->hint('Город разгрузки'); ?>

        <?= $form->field($model, 'address_from')->hint('Только улицу в данном городе'); ?>
        <?= $form->field($model, 'address_to')->hint('Только улицу в данном городе'); ?>

        <?= $form->field($model, 'counterparty_price'); ?>
        <?= $form->field($model, 'carrier_price'); ?>

        <?= $form->field($model, 'archive')->widget(CheckboxX::classname(), [
          'autoLabel' => true,
          'pluginOptions' => [
            'threeState' => false,
            'size' => 'md'
          ]
        ])->label(false); ?>

      </div>
      <div class="col-md-6">

        <?= $form->field($model, 'description')->widget(Summernote::class, [
          'useKrajeePresets' => true,
          // other widget settings
        ]); ?>
        <?= $form->field($model, 'comment')->textarea(['rows' => '6']) ?>
<!--        --><?//= $form->field($model, 'comment')->widget(Summernote::class, [
//          'useKrajeePresets' => true,
//          // other widget settings
//        ]); ?>
      </div>
    </div>
    <?php ActiveForm::end(); ?>
  </div>

</div>

<?= PanelWidget::finish(false); ?>
