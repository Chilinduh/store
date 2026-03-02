<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use app\components\PanelWidget;
use yii\helpers\Html;
use app\components\BreadcrumbWidget;
use kartik\form\ActiveForm;

?>

<?= BreadcrumbWidget::widget([
  'title' => 'Ключевые слова',
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
    'page',
    'title',
    'meta_tag_title',
    'meta_tag_keywords',
    'meta_tag_description',
    [
      'class' => 'yii\grid\ActionColumn',
      'headerOptions' => ['width' => '100'],
      'contentOptions' => ['class' => 'actions'],
      'template' => '{update}   {delete}',
      'buttons' => [
        'delete' => function ($url, $model) {
          return Html::a('<span class="glyphicon glyphicon-trash"></span>',
            ['/keywords/' . $model->id.'/delete'],
              );

        },
      ],
    ],
  ],
]); ?>


<?= PanelWidget::finish(); ?>
