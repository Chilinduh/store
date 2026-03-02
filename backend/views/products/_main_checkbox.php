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
  'id' => 'Files',
  'action' => '/files/' . $model->id . '/update']);

echo CheckboxX::widget([
  'model' => $model,
  'name' => 'main',
  'value' => $model->main,
  'options' => ['id' => $model->id],
  'pluginOptions' => ['threeState' => false],
  'pluginEvents' => [
    "change"=> 'function() { this.form.submit(); }',
  ]
]);
ActiveForm::end();
