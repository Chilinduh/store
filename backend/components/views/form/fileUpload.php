<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 18.07.19
 * Time: 14:50
 */

use yii\helpers\Html;


?>

<div class="form-group">
    <div class="input-group input-group-file" data-plugin="inputGroupFile">
        <input type="text" class="form-control" readonly="">
        <div class="input-group-append">
                        <span class="btn btn-success btn-file">
                          <i class="icon wb-upload" aria-hidden="true"></i>
                          <input type="file" id="<?= Html::getInputId($model, $name) ?>" name="<?= Html::getInputName($model, $name) ?>"  multiple="">
                        </span>
        </div>
    </div>
</div>