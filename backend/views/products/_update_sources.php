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
use kartik\editors\Summernote;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
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

    <?= $form->field($productSource, 'product_id')->hiddenInput()->label(false); ?>

    <?= $form->field($productSource, 'source_url')->textarea(['rows' => '4']); ?>

    <?= $form->field($productSource, 'source_description')->widget(Summernote::class, [
      'useKrajeePresets' => true,
      // other widget settings
    ]); ?>

    <?= $form->field($productSource, 'rewrite_description')->widget(Summernote::class, [
      'useKrajeePresets' => true,
      // other widget settings
    ]); ?>

    <div class="form-group">
      <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </div>
</div>
