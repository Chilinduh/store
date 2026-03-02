<?php

use frontend\components\BreadCrumbsWidget;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
$this->params['breadCrumbs'][] = [
  'name' => $this->title,
  'url' => '/login'
];

?>
<?php if(0) { ?>
<div class="block-space block-space--layout--after-header"></div>
<?php } ?>
<div class="block">
  <div class="container container--max--lg">
    <?= BreadCrumbsWidget::widget(['breadCrumbs' => $this->params['breadCrumbs']]) ?>
    <div class="row">
      <div class="col-md-12 d-flex">
        <div class="card flex-grow-1 mb-md-0 mr-0 mr-lg-3 ml-0 ">
          <div class="card-body card-body--padding--2">
            <h3 class="card-title">Авторизоваться</h3>

            <?php $form = ActiveForm::begin(['id' => 'form-login']); ?>

            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
              <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="block-space block-space--layout--before-footer"></div>
