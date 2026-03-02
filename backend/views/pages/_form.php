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
use common\models\Pages;
use kartik\select2\Select2;
use kartik\editors\Summernote;


$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
?>


<?= BreadcrumbWidget::widget([
  'title' => 'Страницы',
  'createUrl' => '/pages/create',
  'breadcrumbs' => [
    ['label' => $menu->name, 'url' => Yii::$app->getUrlManager()->createUrl([$menu->url])],
    ['label' => $model->name]
  ]
]);
?>

<?= PanelWidget::start(); ?>

<?php

$form = ActiveForm::begin(); ?>

<?= $form->field($model, 'name'); ?>
<?= $form->field($model, 'url'); ?>
<?= $form->field($model, 'text')->widget(Summernote::class, [
  'useKrajeePresets' => true,
  // other widget settings
]); ?>
<?= $form->field($model, 'show')->checkbox()->label($model->getAttributeLabel('show')); ?>

<?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
<?php PanelWidget::finish() ?>


