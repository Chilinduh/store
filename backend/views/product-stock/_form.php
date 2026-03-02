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
use common\models\Products;
use common\models\Colors;
use common\models\Stocks;
use common\models\Sizes;
use kartik\select2\Select2;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
?>

<?= BreadcrumbWidget::widget([
  'title' => $menu->name,
  'breadcrumbs' => [
    ['label' => $menu->name, 'url' => Yii::$app->getUrlManager()->createUrl([$menu->url])],
    ['label' => $model->name??'']
  ]
]);
?>

<?= PanelWidget::start(); ?>

<?php

$form = ActiveForm::begin(); ?>

<?= $form->field($model, 'stock_id')->widget(Select2::classname(), [
  'data' => ArrayHelper::map(Stocks::find()->asArray()->all(), 'id', 'name'),
  'options' => ['placeholder' => 'Выберите склад'],

]); ?>

<?= $form->field($model, 'product_id')->widget(Select2::classname(), [
  'data' => ArrayHelper::map(Products::find()->select(["concat(id, ', ', name, ', ', code, ', ', price) as name", "id"])->asArray()->all(), 'id', 'name'),
  'options' => ['placeholder' => 'Выберите товар'],

]); ?>

<?= $form->field($model, 'size_id')->widget(Select2::classname(), [
  'data' => ArrayHelper::map(Sizes::getSizes(), 'id', 'name'),
  'options' => ['placeholder' => 'Выберите размер'],
]); ?>

<?= $form->field($model, 'color_id')->widget(Select2::classname(), [
  'data' => ArrayHelper::map(Colors::find()->asArray()->all(), 'id', 'name'),
  'options' => ['placeholder' => 'Выберите размер'],
]); ?>

<?= $form->field($model, 'quantity'); ?>


<?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
<?php PanelWidget::finish() ?>


