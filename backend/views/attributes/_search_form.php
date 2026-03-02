<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
?>

<?php

$form = ActiveForm::begin(['method' => 'post']); ?>

<?php

echo $form->field($searchModel, 'search');

?>

<?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
