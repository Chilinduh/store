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
use kartik\checkbox\CheckboxX;
use app\components\BreadcrumbWidget;
use backend\models\Menu;
use kartik\select2\Select2;

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

<?php

$form = ActiveForm::begin(); ?>
<div class="row">
  <div class="col-md-12">
<?= $form->field($model, 'name'); ?>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
  <?= $form->field($model, 'product_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(\common\models\Products::find()->asArray()->all(), 'id', 'name'),
    'options' => ['placeholder' => 'Выбрать товары', 'multiple' => true],
  ]); ?>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
<?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
  </div>
</div>


<?php ActiveForm::end(); ?>
<?php PanelWidget::finish() ?>