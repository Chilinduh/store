<?php

use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\web\View;

?>

<?php $form = ActiveForm::begin([
  'action' => '/good-request/upload'
]); ?>

<?php echo $form->field($goodStorage, 'file')->widget(FileInput::classname(), [
  'options' => ['overwriteInitial ' => false, 'multiple' => false, 'accept' => 'image/*'],
  'pluginOptions' => [
    'showPreview' => false,
    'showCaption' => true,
    'showRemove' => true,
    'showUpload' => false
  ]
]);
?>

<div class="form-group">
  <?= Html::submitButton('Загрузить', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
