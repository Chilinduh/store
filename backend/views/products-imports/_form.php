<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductsImports */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-imports-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_import_id')->textInput() ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <?= $form->field($model, 'source')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'announce_color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
