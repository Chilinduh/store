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
use yii\widgets\ActiveForm;
use app\components\BreadcrumbWidget;
use common\models\Attributes;
use common\models\ProductAttributesValues;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
//$parent = Menu::findOne(['id' => $menu->parent_id]);
?>

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
  <!--begin::Card body-->
  <?php require_once('_tabs.php'); ?>
  <!--end::Card body-->
</div>
<div class="card card-flush">
  <!--begin::Card header-->
  <div class="card-body pb-0">

    <?php $form = ActiveForm::begin(); ?>
    <?php foreach ($productAttributes as $productAttribute) {

      $attributes = new Attributes();
      $attribute = $attributes->findOne($productAttribute->attribute_id);

      $attributesValues = new ProductAttributesValues();
      $attributesValue = $attributesValues->find()->where([
        'product_id' => $model->id,
        'product_attribute_id' => $productAttribute->id
      ])->one();

      ?>
      <?=  $form->field($model, 'attributes['.$productAttribute->id.']')->textInput(['value'=> $attributesValue->value??''])->label($attribute->name??''); ?>
    <?php } ?>

    <br>
    <div class="form-group">
      <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <br>
  </div>

</div>

<?= PanelWidget::finish(false); ?>
