<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<div class="dropdown-content dropdown-menu">
    <h6 class="title-login d-none">Login</h6>

    <?php $form = ActiveForm::begin(['id' => 'LoginForm', 'action' => '/login']); ?>

    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />


    <?= $form->field($model, 'rememberMe')->hiddenInput(['value'=> 1])->label(false); ?>
    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>


    <div class="form-group">
        <input type="submit"
               class="btn btn-default btn-full mg-bt10" value="Войти">

    </div>
    <div class="form-group">
        <a href="/register"
           class="btn btn-secondary btn-full">Зарегистрироваться</a>

    </div>
    <div class="dropdown-divider"></div>
    <div class="dropdown-item text-center">
        <a href="resetPassword">Забыли пароль?</a>
    </div>
    <?php ActiveForm::end(); ?>
</div>