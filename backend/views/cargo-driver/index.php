<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use app\components\TableDataWidget;
use app\components\ModalWidget;
use yiister\gentelella\widgets\Panel;
use yii\helpers\Html;
use app\components\PanelWidget;
use app\components\BreadcrumbWidget;

?>

<?= BreadcrumbWidget::widget([
  'title' => 'Водители',
  'createUrl' => '/cargo-carrier/create',
]);
?>

<?= PanelWidget::start(); ?>

<?= \kartik\grid\GridView::widget([
  'dataProvider' => $dataProvider,
  'filterModel' => $searchModel,
  'containerOptions' => [
    'style' => 'min-height:100px; overflow: auto; word-wrap: break-word;'
  ],

  'toolbar' => [

//        '{export}',
//        '{toggleData}'
  ],
//        'rowOptions' => function($model) {
//
//          if($model->deleted_at) {
//            return ['class' => 'danger']; // Генерирует опции для tr
//          }
//          return [];
//        },
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
      'hAlign' => 'center',
      'vAlign' => 'middle',
      'label' => 'ФИО',
      'format' => 'raw',
      'value' => function($model) {

        return $model->name.' '.$model->first_name.' '.$model->last_name;
      },
      'filter' => false,
    ],
    'phone',
    [
      'hAlign' => 'center',
      'vAlign' => 'middle',
      'label' => 'Авто',
      'format' => 'raw',
      'value' => function($model) {

        return $model->car->carType->name.' '.number_format($model->car->weight, 1, '.', ' ')
          .'/'.number_format($model->car->palette, 1, '.', ' ')
          .'/'.number_format($model->car->capacity, 1, '.', ' ');
      },
      'filter' => false,
    ],
    [
      'class' => 'yii\grid\ActionColumn',
      'headerOptions' => ['width' => '100'],
      'contentOptions' => ['class' => 'actions'],
      'template' => '{update}&nbsp;&nbsp;{delete}',
      'buttons' => [
        'delete' => function ($url, $model) {
          return Html::a('<span class="glyphicon glyphicon-trash"></span>',
            ['/cargo-carrier/' . $model->id . '/delete'],
              );

        },
      ],
    ],
  ],
]); ?>

<?php PanelWidget::finish(); ?>
