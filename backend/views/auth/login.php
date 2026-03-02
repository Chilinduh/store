<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \LoginForm $model */

use kartik\form\ActiveForm;
use yii\helpers\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(); ?>

<!--begin::Heading-->
<div class="text-start mb-10">
  <!--begin::Title-->
  <h1 class="text-dark mb-3 fs-3x" data-kt-translate="sign-in-title">Авторизация</h1>
  <!--end::Title-->
  <!--begin::Text-->
  <!--end::Link-->
</div>
<!--begin::Heading-->
<!--begin::Input group=-->
<div class="fv-row mb-8">
  <!--begin::Email-->
  <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
  <!--end::Email-->
</div>
<!--end::Input group=-->
<div class="fv-row mb-7">
  <!--begin::Password-->
  <?= $form->field($model, 'password')->passwordInput() ?>
  <!--end::Password-->
</div>

<div class="form-group">
  <div class="offset-lg-1 col-lg-11">
    <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
  </div>
</div>






  <?php ActiveForm::end(); ?>

