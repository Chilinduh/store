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
              <i class="icon wb-calendar" aria-hidden="true"></i>
            </span>
        </div>
        <input type="text" class="form-control"
               id="<?= Html::getInputId($model, $name) ?>"
               name="<?= Html::getInputName($model, $name) ?>" data-plugin="datepicker">
    </div>
</div>
