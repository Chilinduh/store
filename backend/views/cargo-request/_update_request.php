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

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
//$parent = Menu::findOne(['id' => $menu->parent_id]);
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
    <div class="row">
      <!--begin::Col-->
      <div class="col-md-8">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'route_start')->hint('Город погрузки'); ?>
        <?= $form->field($model, 'route_end')->hint('Город разгрузки'); ?>

        <?= $form->field($model, 'address_from')->hint('Только улицу в данном городе'); ?>
        <?= $form->field($model, 'address_to')->hint('Только улицу в данном городе'); ?>

        <?= $form->field($model, 'price'); ?>
        <?= $form->field($model, 'comment')->widget(Summernote::class, [
          'useKrajeePresets' => true,
          // other widget settings
        ]); ?>

        <div class="form-group">
          <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
      </div>
    </div>
  </div>

</div>

<?= PanelWidget::finish(false); ?>
