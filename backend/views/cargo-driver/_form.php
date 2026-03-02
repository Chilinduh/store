<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use app\components\BreadcrumbWidget;
use yii\helpers\Html;
use app\components\PanelWidget;
use kartik\form\ActiveForm;
use backend\models\Menu;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
?>

<?= BreadcrumbWidget::widget([
  'title' => 'Водители',
  'createUrl' => '/cargo-driver/create',
  'breadcrumbs' => [
    ['label' => $menu->name, 'url' => Yii::$app->getUrlManager()->createUrl([$menu->url])],
    ['label' => $model->name]
  ]
]);
?>

<?= PanelWidget::start(); ?>

<div class="row ">
  <div class="col-md-12">
        <?php

        $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name'); ?>
        <?= $form->field($model, 'first_name'); ?>
        <?= $form->field($model, 'last_name'); ?>
        <?= $form->field($model, 'phone'); ?>


        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>
      </div>
    </div>
<?php PanelWidget::finish() ?>


