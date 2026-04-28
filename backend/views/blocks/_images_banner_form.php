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

$form = ActiveForm::begin(['action' => '/blocks/'.$model->id.'/banners-images-create']); ?>

<div class="row">
  <div class="col-md-6"><?= $form->field($bannersImages, 'title'); ?></div>
  <div class="col-md-3">
    <?= $form->field($bannersImages, 'title_color')->widget(ColorInput::classname(), [
      'options' => ['placeholder' => 'Выбрать цвет заголовка'],
    ]); ?>
  </div>
  <div class="col-md-3">
    <?= $form->field($bannersImages, 'announce_color')->widget(ColorInput::classname(), [
      'options' => ['placeholder' => 'Выбрать цвет текста описания'],
    ]); ?>
  </div>
</div>

<div class="row">
  <div class="col-md-6"><?= $form->field($bannersImages, 'announce'); ?></div>
  <div class="col-md-6">
    <?= $form->field($bannersImages, 'link'); ?>
  </div>
</div>

<div class="row">
  <div class="col-md-6"><?= $form->field($bannersImages, 'sequence'); ?></div>
  <div class="col-md-6">
    <?php echo $form->field($bannersImages, 'file')->widget(FileInput::classname(), [
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
  </div>
</div>


<?php //if($model->block->files) { ?>
<!--  <img src="--><?//= Yii::$app->params['imageUrl'].$model->block->files->original ?><!--"><br><br>-->
<?php //} ?>


<?= Html::submitButton( 'Добавить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
<?php PanelWidget::finish() ?>
