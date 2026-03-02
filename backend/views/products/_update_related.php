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
use app\components\BreadcrumbWidget;
use yii\widgets\Breadcrumbs;
use kartik\file\FileInput;
use kartik\checkbox\CheckboxX;
use common\models\Products;
use yii\helpers\ArrayHelper;
use common\models\Materials;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
//$parent = Menu::findOne(['id' => $menu->parent_id]);
?>
s
<?= BreadcrumbWidget::widget([
  'title' => 'Товары',
  'createUrl' => '/products/create',
  'breadcrumbs' => [
    ['label' => $menu->name, 'url' => Yii::$app->getUrlManager()->createUrl([$menu->url])],
    ['label' => $model->name]
  ]
]);
?>

<?= PanelWidget::start(false); ?>

<div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10">

  <?php require_once('_tabs.php'); ?>

</div>
<div class="card card-flush">
  <!--begin::Card header-->
  <div class="card-body pb-0">

    <?php $form = ActiveForm::begin(); ?>

    <?php

    echo $form->field($productRelated, 'product_related_id')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(Products::find()->all(), 'id', 'name'),
      'options' => ['placeholder' => 'Выбрать товар'],
    ]);
    ?>

    <div class="form-group">
      <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


    <?php echo $this->context->renderPartial('_products', [
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'searchModel' => $searchModel,
    ]); ?>

  </div>

</div>

<?= PanelWidget::finish(false); ?>
