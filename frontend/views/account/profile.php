<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="block-space block-space--layout--after-header"></div>
<div class="block">
  <div class="container container--max--xl">
    <div class="row">
      <div class="col-12 col-lg-3 d-flex">
        <?php include_once(Yii::getAlias('@frontend/views/account/_navigation.php')); ?>
      </div>
      <div class="col-12 col-lg-9 mt-4 mt-lg-0">
        <div class="card">
          <div class="card-header">
            <h5>Редактировать профиль</h5>
          </div>
          <div class="card-divider"></div>
          <div class="card-body card-body--padding--2">
            <div class="row no-gutters">
              <div class="col-12 col-lg-7 col-xl-6">

                <?php $form = ActiveForm::begin(['id' => 'form-profile']); ?>

                <?= $form->field($model, 'first_name')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'last_name')->textInput() ?>
                <?= $form->field($model, 'phone')->textInput() ?>
                <?= $form->field($model, 'country')->textInput() ?>
                <?= $form->field($model, 'city')->textInput() ?>
                <?= $form->field($model, 'address')->textInput() ?>

                <div class="form-group">
                  <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary mt-3']) ?>
                </div>

                <?php ActiveForm::end(); ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="block-space block-space--layout--before-footer"></div>
