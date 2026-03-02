<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 18.07.19
 * Time: 14:41
 */

use yii\helpers\Html;

?>
<div class="form-group  <?= $label ? 'row' : ''; ?> " >
    <?php if($label) { ?> 
    <label class="col-md-<?= $label['labelWidth'] ? $label['labelWidth'] : 3; ?> form-control-sm form-control-label" for="<?= Html::getInputName($model, $name) ?>"><?= $model->getAttributeLabel($name) ?></label>
    <?php  } ?>
    <?php if($label) { ?>
    <div class=" col-md-<?= $label['fieldWidth'] ? $label['fieldWidth'] - $label['labelWidth'] : 9; ?>">
    <?php } ?>    
    <select data-plugin="select2" id="<?= Html::getInputId($model, $name) ?>" name="<?= Html::getInputName($model, $name) ?>" class="form-control">
        <?php foreach($select as $item) { ?>
        <option <?= $item->{$field} == $model->{$name} ? 'selected="selected"' : '' ; ?> value="<?= $item->id; ?>"><?= $options['display'] ? $item->{$options['display']} : $item->name; ?>  </option>
        <?php } ?>
    </select>
    <?php if($label) { ?>
    </div>
    <?php } ?>
</div>

