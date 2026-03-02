<?php
use yii\helpers\Html;

?>

<div class="form-group">
    <div class="checkbox-custom checkbox-default">
        <input type="checkbox" id="<?= Html::getInputId($model, $name).'-'.$model->id; ?>" name="<?= Html::getInputName($model, $name) ?>" <?= $model->{$name} ? 'checked="checked"' : '' ?> autocomplete="off">
        <label for="<?= Html::getInputId($model, $name) ?>"><?= ($options && $options['placeholder']) ? $options['placeholder'] : ''; ?></label>
    </div>
</div>


