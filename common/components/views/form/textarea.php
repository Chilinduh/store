<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 18.07.19
 * Time: 14:41
 */

use yii\helpers\Html;
?>

<div class="form-group <?= $label ? 'row' : ''; ?> " >
    <?php if($label) { ?> 
    <label class="col-md-<?= $label['labelWidth'] ? $label['labelWidth'] : 3; ?> form-control-sm form-control-label" for="<?= Html::getInputName($model, $name) ?>"><?= $model->getAttributeLabel($name) ?></label>
    <?php  } ?>
    <?php if($label) { ?>
    <div class="row col-md-<?= $label['fieldWidth'] ? $label['fieldWidth'] - $label['labelWidth'] : 9; ?>">
    <?php } ?>    
    <textarea type="text" class="form-control"
           id="<?= Html::getInputId($model, $name) ?>"
           name="<?= Html::getInputName($model, $name) ?>"
           placeholder="<?= ($options && $options['placeholder']) ? $options['placeholder'] : ''; ?>" autocomplete="off"><?= $model->{$name} ?></textarea>
    <?php if($label) { ?>
    </div>
    <?php } ?>        
</div>
