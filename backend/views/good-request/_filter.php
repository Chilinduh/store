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
use kartik\select2\Select2;
use common\models\GoodRequestStatus;

?>

<?php

$form = ActiveForm::begin(['method' => 'GET']); ?>

<div class="row">
  <div class="col-md-4">
    <?php
    echo $form->field($goodRequest, 'good_request_status_id')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(GoodRequestStatus::find()->all(), 'id', 'name'),
      'options' => ['placeholder' => 'Выбрать статус'],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ]);
    ?>
  </div>
</div>
<?= Html::submitButton('Применить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
