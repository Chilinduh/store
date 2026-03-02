<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use app\components\TableDataWidget;
use app\components\PanelWidget;
use yii\helpers\Html;
use app\components\FormWidget;
use common\models\Manufacturers;
use common\models\Category;
use common\models\City;
use common\models\Ingredients;
use common\models\Colors;
use backend\models\Menu;
use common\models\PackagingType;
use kartik\tree\TreeViewInput;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use common\models\Tree;
use yii\helpers\ArrayHelper;
use common\models\Brands;
use common\models\Property;
use app\components\BreadcrumbWidget;
use yii\widgets\Breadcrumbs;
use kartik\file\FileInput;
use kartik\checkbox\CheckboxX;
use kartik\editors\Summernote;
use common\models\CargoCounterparty;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
//$parent = Menu::findOne(['id' => $menu->parent_id]);
?>


<?= BreadcrumbWidget::widget([
  'title' => 'Заявки',
  'createUrl' => '/cargo-orders/create',
  'breadcrumbs' => [
    ['label' => $menu->name, 'url' => Yii::$app->getUrlManager()->createUrl([$menu->url])],
    ['label' => $model->number]
  ]
]);
?>

<?= PanelWidget::start(false); ?>

<div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10">
  <!--begin::Card body-->
  <?php

  echo $this->context->renderPartial('_tabs', [
    'model' => $model,
    'good' => $good
  ]);
  ?>
  <!--end::Card body-->
</div>
<div class="card card-flush">
  <!--begin::Card header-->
  <div class="card-body pb-0">
    <div class="row">
      <!--begin::Col-->
      <div class="col-md-4">
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($good, 'counterparty_id')->widget(Select2::classname(), [
          'data' => ArrayHelper::map(CargoCounterparty::find()->all(), 'id', 'name'),
          'options' => ['placeholder' => 'Выбрать контрагента'],
          'pluginOptions' => [
            'allowClear' => true
          ],
        ]);  ?>
      </div>
      <div class="col-md-4">
        <?= $form->field($good, 'counterparty'); ?>      </div>
      </div>
        <div class="row">
      <!--begin::Col-->
      <div class="col-md-8">


        <?= $form->field($good, 'weight'); ?>
        <?= $form->field($good, 'capacity'); ?>
        <?= $form->field($good, 'palette'); ?>
        <?= $form->field($good, 'comment')->widget(Summernote::class, [
          'useKrajeePresets' => true,
          // other widget settings
        ]); ?>

        <div class="form-group">
          <?= Html::submitButton('Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
      </div>
    </div>
  </div>

</div>

<?= PanelWidget::finish(false); ?>
