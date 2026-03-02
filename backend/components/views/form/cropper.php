<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use app\components\CropWidget;
use yii\helpers\Html;
use app\components\ModalWidget;

?>

<?php

$crop = CropWidget::begin([
    'model' => $model,
    'name' => 'file',
]);
$crop->crop();
CropWidget::end();

?>



