<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 16.03.26
 * Time: 15:00
 */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\components\PanelWidget;
use kartik\form\ActiveForm;
use kartik\color\ColorInput;
use kartik\file\FileInput;

?>

<?= PanelWidget::start(); ?>

<?php

$form = ActiveForm::begin(['action' => '/blocks/'.$model->block_id.'/banners']); ?>

<?= $form->field($model, 'title'); ?>
<?= $form->field($model, 'title_color')->widget(ColorInput::classname(), [
  'options' => ['placeholder' => 'Выбрать цвет заголовка'],
]); ?>


<?= $form->field($model, 'announce'); ?>
<?= $form->field($model, 'announce_color')->widget(ColorInput::classname(), [
  'options' => ['placeholder' => 'Выбрать цвет текста описания'],
]); ?>

<?= $form->field($model, 'link'); ?>

<?php echo $form->field($model, 'file')->widget(FileInput::classname(), [
  'options' => ['overwriteInitial ' => false, 'multiple' => false, 'accept' => 'image/*'],
  'pluginOptions' => [
    'showPreview' => false,
    'showCaption' => true,
    'showRemove' => true,
    'showUpload' => false,
    'msgPlaceholder' => 'Выберите файл ...',
    'browseLabel' => 'Загрузить'
  ]
]);

?>

<?php if($model->block->files) { ?>
<img src="<?= Yii::$app->params['imageUrl'].$model->block->files->original ?>"><br><br>
<?php } ?>


<?= Html::submitButton( 'Сохранить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
<?php PanelWidget::finish() ?>
