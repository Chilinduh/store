<?php


/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */
use app\components\PanelWidget;
use yii\helpers\Html;
use app\components\FormWidget;
use common\models\City;
use common\models\Stocks;

PanelWidget::begin([
    'title' =>  'Найстройки текущего города',
    'heading' => true,
]);

    $form = FormWidget::begin(['id' => 'city', 'action' => 'settings/city']);
    $city = new City();

    $form->select($model, 'city_id', [
        'select' => $city->getAll(),
        'field' => 'id',
        'type' => 'select2'        
    ]);

    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php FormWidget::end(); ?>

    <?php
    
    $form = FormWidget::begin(['id' => 'stocks', 'action' => 'settings/stocks']);
    $stocks = new Stocks();
    
    $form->select($model, 'stock_id', [
        'select' => $stocks->getAll(),
        'field' => 'id',
        'type' => 'select2'        
    ]);

    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php FormWidget::end(); ?>

<?php PanelWidget::end();?>