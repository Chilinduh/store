<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 18.07.19
 * Time: 14:26
 */

use yii\helpers\Html;

?>

<div class="form-group <?= $label ? 'row' : ''; ?> " >
    <?php if($label) { ?> 
    <label class="col-md-<?= $label['labelWidth'] ? $label['labelWidth'] : 3; ?> form-control-sm form-control-label" for="<?= Html::getInputName($model, $name) ?>"><?= $model->getAttributeLabel($name) ?></label>
    <?php  } ?>
    <?php if($label) { ?>
    <div class=" col-md-<?= $label['fieldWidth'] ? $label['fieldWidth'] - $label['labelWidth'] : 9; ?>">
    <?php } ?>
        
        <input type="text" 
                              id="<?= Html::getInputId($model, $name) ?>"
               name="<?= Html::getInputName($model, $name) ?>"
               value="<?= $model->{$name} ?>"
               class="asColorpicker form-control" data-plugin="asColorPicker"
                      data-mode="simple"/>
    <?php if($label) { ?>
    </div>
    <?php } ?>
</div>