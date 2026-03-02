<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 18.07.19
 * Time: 14:47
 */

use yii\helpers\Html;


?>

<div class="checkbox-custom checkbox-primary">
    <input type="checkbox" id="<?= Html::getInputId($model, $name) ?>" checked="">
    <label for="<?= Html::getInputId($model, $name) ?>">Checked</label>
</div>
