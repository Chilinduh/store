<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use app\components\BreadcrumbWidget;
use yii\helpers\Html;
use app\components\PanelWidget;
use kartik\form\ActiveForm;
use backend\models\Menu;
use common\models\CargoCarrier;
use common\Helper\PhoneHelper;
use common\models\CargoDriver;
use common\models\CargoOrdersCarrier;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
?>

<?= BreadcrumbWidget::widget([
  'title' => 'Перевозчики',
  'createUrl' => '/cargo-carrier/create',
  'breadcrumbs' => [
    ['label' => $menu->name, 'url' => Yii::$app->getUrlManager()->createUrl([$menu->url])],
    ['label' => $model->name]
  ]
]);
?>

<?= PanelWidget::start(); ?>

<div class="row ">
  <div class="col-md-12">
        <?php

        $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name'); ?>
        <?= $form->field($model, 'fio'); ?>
        <?= $form->field($model, 'address'); ?>
        <?= $form->field($model, 'phone'); ?>


        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>
      </div>
    </div>
<?php PanelWidget::finish() ?>

<?= PanelWidget::start(); ?>

<?= \kartik\grid\GridView::widget([
  'dataProvider' => $dataProvider,
  'filterModel' => $searchModel,
  'containerOptions' => [
    'style' => 'min-height:100px; overflow: auto; word-wrap: break-word;'
  ],
  'toolbar' => [
    [
      'content' =>
        Html::a('<i class="fas fa-redo"></i>', ['/cargo-request'], [
          'class' => 'btn btn-outline-secondary',
          'title' => 'Reset Grid',
          'data-pjax' => true,
        ]),
      'options' => ['class' => 'btn-group mr-2 me-2']
    ],
    '{export}',
    '{toggleData}'
  ],
  'pjax' => true,
  'toggleDataOptions' => ['minCount' => 10],
  'bordered' => true,
  'resizableColumns' => true,
  'striped' => false,
  'condensed' => false,
  'responsive' => true,
  'hover' => true,
  'floatHeader' => true,
  'floatHeaderOptions' => ['top' => true],
  'panel' => [
    'type' => 'primary'
  ],
  'columns' => [
    //['class' => 'yii\grid\SerialColumn'],

    [
      'hAlign' => 'left',
      'vAlign' => 'top',
      'label' => 'Водители',
      'filter' => false,
      'width' => '50%',
      'format' => 'raw',
      'value' => function ($model, $key) {

        $carrier = CargoCarrier::find()->where(['id' => $key])->one();

        $html  = '';

        foreach ($model as $item) {

          $driver = CargoDriver::find()->where(['id' => $item->driver_id])->one();
          if ($driver) {

            $car = $driver->car;
            $html .= $item->date. ' - ';
            $html .= '<i class="fa-regular fa-truck-fast" style="color:#009ef7"></i> ' . $car->type->name . ' - ' . $driver->name . ' ' . $driver->first_name . ' ' . $driver->last_name . ' - ';

            $html .=  ' ' . number_format($car->weight, 1, '.', ' ')
              . '/' . number_format($car->capacity, 1, '.', ' ')
              . '/' . number_format($car->palette, 1, '.', ' ') ;
            $html .= ' - <b> '.PhoneHelper::phone_format($driver->phone) . '</b><br>';
          } else {
            $html .= '<i class="fa-regular fa-truck-fast" style="color:red"></i><br>';
          }
        }

        return $html;
      }
    ],
  ],
]); ?>

<?php PanelWidget::finish(); ?>


