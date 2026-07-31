<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\checkbox\CheckboxX;

$form = ActiveForm::begin([
  'action' => '/files/' . $model->id . '/update']);

echo CheckboxX::widget([
  'model' => $model,
  'name' => 'is_creative',
  'value' => $model->is_creative,
  'options' => ['id' => 'creative'.$model->id],
  'pluginOptions' => ['threeState' => false],
  'pluginEvents' => [
    "change"=> 'function() { this.form.submit(); }',
  ]
]);
ActiveForm::end();
