<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 18.07.19
 * Time: 13:55
 */

use yii\web\View;
use yii\helpers\Html;

?>
<div class="form-group">

    <div class="input-group">
        <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="wb-time" aria-hidden="true"></i>
                        </span>
        </div>
        <input type="text" id="colorpicker-<?= Html::getInputId($model, $name) ?>"
               name="<?= Html::getInputName($model, $name) ?>"
               class="timepicker form-control" data-plugin="clockpicker" data-autoclose="true">
    </div>

</div>


