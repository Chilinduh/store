<?php

use frontend\components\BreadCrumbsWidget;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Восстановить пароль';
$this->params['breadCrumbs'][] = [
  'name' => $this->title,
  'url' => '/register'
];

?>
<?php if (0) { ?>
  <div class="block-space block-space--layout--after-header"></div>
<?php } ?>
<div class="block">

  <div class="container container--max--lg">
    <?= BreadCrumbsWidget::widget(['breadCrumbs' => $this->params['breadCrumbs']??[]]) ?>
    <div class="row">
      <div class="col-md-12 d-flex mt-4 mt-md-0">
        <?php if (Yii::$app->session->hasFlash('success')): ?>
          <div class="info">
            <?php echo Yii::$app->session->getFlash('success'); ?>
          </div>
        <?php endif; ?>
      </div>

    </div>
    <div class="row">
      <div class="col-md-12 d-flex mt-4 mt-md-0">
        <div class="card flex-grow-1 mb-0 ml-0 mr-0 mr-lg-4">
          <div class="card-body card-body--padding--2">
            <h3 class="card-title">Восстановить пароль</h3>

            <?php $form = ActiveForm::begin(['id' => 'form-reset-password']); ?>

            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'repeated_password')->passwordInput() ?>

            <div class="form-group">
              <?= Html::submitButton('Изменить пароль', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="block-space block-space--layout--before-footer"></div>


