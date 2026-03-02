<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\Pages;

$this->title = 'Контакты';
?>

<div class="block-header block-header--has-breadcrumb block-header--has-title">
  <div class="container">
    <div class="block-header__body">
      <h1 class="block-header__title">Контакты</h1>
    </div>
  </div>
</div>
<div class="block">
  <div class="container container--max--lg">
    <div class="card contacts">
      <?php if (0) { ?>
        <div class="contacts__map">
          <iframe
            src='https://maps.google.com/maps?q=Москва%20Высоковольтный%20проезд&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed'
            frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe>
        </div>
      <?php } ?>
      <div class="card-body card-body--padding--2">
        <div class="row">
          <div class="col-12 col-lg-6 pb-4 pb-lg-0">
            <div class="mr-1">
              <?= $content; ?>
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="ml-1">
              <h4 class="contact-us__header card-title">Оставьте нам сообщение</h4>

              <?php if ($send) { ?>

                    <div style="padding:10px">Сообщение отправлено!</div>

              <?php } else { ?>

              <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
              <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
              <?= $form->field($model, 'email') ?>
              <?= $form->field($model, 'subject') ?>
              <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

              <!--              --><? //= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
              //                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
              //              ]) ?>

              <div class="form-group">
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
              </div>

              <?php ActiveForm::end(); ?>

              <?php } ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="block-space block-space--layout--before-footer"></div>
