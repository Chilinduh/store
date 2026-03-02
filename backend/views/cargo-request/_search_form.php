<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\components\PanelWidget;
use kartik\form\ActiveForm;
use common\models\Category;
use kartik\select2\Select2;
use common\models\Tree;
use kartik\tree\TreeViewInput;
use yii\web\JsExpression;

?>

<?php

$form = ActiveForm::begin(['method' => 'get']); ?>

<div class="row">
  <div class="col-md-3">
    <?= $form->field($searchModel, 'route_start'); ?>
  </div>
  <div class="col-md-3">
    <?= $form->field($searchModel, 'route_end'); ?>
  </div>
  <div class="col-md-3">
    <?= $form->field($searchModel, 'address_from'); ?>
  </div>
  <div class="col-md-3">
    <?= $form->field($searchModel, 'address_to'); ?>
  </div>
</div>
<div class="row">
  <div class="col-md-3">
    <?= $form->field($searchModel, 'tonnage'); ?>
  </div>
  <div class="col-md-3">
    <?= $form->field($searchModel, 'palletage'); ?>
  </div>
  <div class="col-md-3">
    <?= $form->field($searchModel, 'counterparty_id')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(\common\models\CargoCounterparty::find()->all(), 'id', 'name'),
      'options' => ['placeholder' => 'Выбрать клиента'],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ]);  ?>
  </div>
</div>

<?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
