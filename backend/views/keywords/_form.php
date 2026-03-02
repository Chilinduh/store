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
use kartik\form\ActiveForm;
use kartik\color\ColorInput;
use kartik\checkbox\CheckboxX;
use app\components\BreadcrumbWidget;
use backend\models\Menu;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
?>

<?= BreadcrumbWidget::widget([
  'title' => $menu->name,
  'breadcrumbs' => [
    ['label' => $menu->name, 'url' => Yii::$app->getUrlManager()->createUrl([$menu->url])],
    ['label' => $model->name ?? '']
  ]
]);
?>

<?= PanelWidget::start(); ?>


<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'page'); ?>
<?= $form->field($model, 'title'); ?>
<?= $form->field($model, 'meta_tag_title'); ?>
<?= $form->field($model, 'meta_tag_keywords'); ?>
<?= $form->field($model, 'meta_tag_description'); ?>

<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
<?php PanelWidget::finish() ?>


