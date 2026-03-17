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

$form = ActiveForm::begin(['action' => '/blocks/'.$model->id.'/banners-carousel-create']); ?>

<div class="row">
  <div class="col-md-6"><?= $form->field($bannersCarousel, 'title'); ?></div>
  <div class="col-md-3">
    <?= $form->field($bannersCarousel, 'title_color')->widget(ColorInput::classname(), [
      'options' => ['placeholder' => 'Выбрать цвет заголовка'],
    ]); ?>
  </div>
  <div class="col-md-3">
    <?= $form->field($bannersCarousel, 'announce_color')->widget(ColorInput::classname(), [
      'options' => ['placeholder' => 'Выбрать цвет текста описания'],
    ]); ?>
  </div>
</div>

<div class="row">
  <div class="col-md-6"><?= $form->field($bannersCarousel, 'announce'); ?></div>
  <div class="col-md-6">
    <?= $form->field($bannersCarousel, 'link'); ?>
  </div>
</div>

<div class="row">
  <div class="col-md-6"><?= $form->field($bannersCarousel, 'sequence'); ?></div>
  <div class="col-md-6">
    <?php echo $form->field($bannersCarousel, 'file')->widget(FileInput::classname(), [
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
