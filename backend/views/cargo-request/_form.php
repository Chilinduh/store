<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yiister\gentelella\widgets\Panel;
use yii\helpers\ArrayHelper;
use app\components\PanelWidget;
use kartik\color\ColorInput;
use kartik\checkbox\CheckboxX;
use app\components\BreadcrumbWidget;
use backend\models\Menu;
use common\models\Pages;
use kartik\select2\Select2;
use kartik\editors\Summernote;
use yii\widgets\ActiveForm;
use common\models\CargoGoodType;
use common\models\CargoCarType;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);

?>

<?= BreadcrumbWidget::widget([
  'title' => 'Заявки',
  'createUrl' => '/cargo-request/create',
  'breadcrumbs' => [
    ['label' => $menu->name, 'url' => Yii::$app->getUrlManager()->createUrl([$menu->url])],
    ['label' => $model->number]
  ]
]);
?>

<?= PanelWidget::start(); ?>

<?php

$form = ActiveForm::begin(); ?>
<div class="row">
  <div class="col-md-6">
    <?= $form->field($model, 'counterparty_id')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(\common\models\CargoCounterparty::find()->all(), 'id', 'name'),
      'options' => ['placeholder' => 'Выбрать клиента'],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ]);  ?>
  </div>
  <div class="col-md-6">
    <?= $form->field($model, 'counterparty'); ?>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <?= $form->field($model, 'car_type_id')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(CargoCarType::find()->all(), 'id', 'name'),
      'options' => ['placeholder' => 'Выбрать тип авто'],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ]);  ?>
  </div>
  <div class="col-md-6">
    <?= $form->field($model, 'carType'); ?>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <?= $form->field($model, 'good_type_id')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(CargoGoodType::find()->all(), 'id', 'name'),
      'options' => ['placeholder' => 'Выбрать тип товара'],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ]);  ?>
  </div>
  <div class="col-md-6">
    <?= $form->field($model, 'goodType'); ?>
  </div>
</div>
<?= $form->field($model, 'weight'); ?>
<?= $form->field($model, 'capacity'); ?>
<?= $form->field($model, 'palette'); ?>

<?= $form->field($model, 'route_start')->textInput(['placeholder'=>'введите город погрузки ...']); ?>
<?= $form->field($model, 'route_end')->textInput(['placeholder'=>'введите город разгрузки ...']); ?>
<?= $form->field($model, 'address_from')->hint('Только улицу в данном городе'); ?>
<?= $form->field($model, 'address_to')->hint('Только улицу в данном городе'); ?>

<?= $form->field($model, 'address_start')->hint('Полный адрес погрузки'); ?>
<?= $form->field($model, 'address_end')->hint('Полный адрес разгрузки'); ?>

<?= $form->field($model, 'price'); ?>
<?= $form->field($model, 'comment')->widget(Summernote::class, [
  'useKrajeePresets' => true,
  // other widget settings
]); ?>

<?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
<?php PanelWidget::finish() ?>


