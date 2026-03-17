<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\components\PanelWidget;
use kartik\form\ActiveForm;
use app\components\BreadcrumbWidget;
use backend\models\Menu;
use common\models\Pages;
use common\models\BlocksTypes;
use kartik\checkbox\CheckboxX;
use kartik\select2\Select2;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
?>

<?= BreadcrumbWidget::widget([
  'title' => 'Блоки',
  'createUrl' => '/blocks/create',
  'breadcrumbs' => [
    ['label' => $menu->name, 'url' => Yii::$app->getUrlManager()->createUrl([$menu->url])],
    ['label' => $model->name]
  ]
]);
?>

<?= PanelWidget::start(); ?>

<?php

$form = ActiveForm::begin(); ?>

<div class="row">
  <div class="col-md-3"><?= $form->field($model, 'name'); ?></div>
  <div class="col-md-3">
    <?= $form->field($model, 'page_id')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(Pages::find()->asArray()->all(), 'id', 'name'),
      'options' => ['placeholder' => 'Выбрать страницу'],
    ]); ?>
  </div>
  <div class="col-md-3">
    <?= $form->field($model, 'block_type_id')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(BlocksTypes::find()->asArray()->all(), 'id', 'name'),
      'options' => ['placeholder' => 'Выбрать тип'],
    ]); ?>
  </div>
</div>

<?//= $form->field($model, 'group_id')->widget(Select2::classname(), [
//  'data' => ArrayHelper::map(Groups::find()->asArray()->all(), 'id', 'name'),
//  'options' => ['placeholder' => 'Выбрать группу'],
//]); ?>

<?php
echo $form->field($model, 'show')->widget(CheckboxX::classname(), [
  'autoLabel' => true,
  'pluginOptions' => [
    'threeState' => false,
    'size' => 'md'
  ]
])->label(false);
?>

<?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
<?php PanelWidget::finish() ?>

<?php if($model->banners && $model->block_type_id != BlocksTypes::BLOCK_BANNERS_CAROUSEL && !$model->isNewRecord) { ?>
  <?= $this->render('_short_banner', ['model' => $model->banners]); ?>
<?php } else { ?>
  <?= $this->render('_carousel_banner', ['model' => $model, 'bannersCarousel' => new common\models\BlocksBannersCarousel()]); ?>
<?php } ?>


