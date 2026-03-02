<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use app\components\BreadcrumbWidget;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yiister\gentelella\widgets\Panel;
use yii\helpers\ArrayHelper;
use app\components\PanelWidget;
use kartik\form\ActiveForm;
use kartik\checkbox\CheckboxX;
use backend\models\Menu;
use kartik\datetime\DateTimePicker;
use kartik\date\DatePicker;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
?>

<?= BreadcrumbWidget::widget([
  'title' => 'Сотрудники',
  'createUrl' => '/employee/create',
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
        <?= $form->field($model, 'email'); ?>
        <?= $form->field($model, 'birthdate')->widget(DatePicker::classname(), [
          'options' => ['placeholder' => 'Enter event time ...'],
          'pluginOptions' => [
            'autoclose' => true,
            'format' => 'd-m-yyyy'
          ]
        ]); ?>

        <?= $form->field($model, 'show')->widget(CheckboxX::classname(), [
          'autoLabel' => true,
          'pluginOptions' => [
            'threeState' => false,
            'size' => 'md'
          ]
        ])->label(false); ?>

        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>
      </div>
    </div>
<?php PanelWidget::finish() ?>



