<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use yiister\gentelella\widgets\Panel;
use yii\helpers\Html;
use app\components\PanelWidget;
use app\components\BreadcrumbWidget;
use backend\models\Menu;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
?>

<?= BreadcrumbWidget::widget([
  'title' => 'Склады',
    'createUrl' => '/stocks/create',
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
          'attribute' => 'name',
          'filter' => false,
        ],

        [
          'class' => 'yii\grid\ActionColumn',
          'headerOptions' => ['width' => '100'],
          'contentOptions' => ['class' => 'actions'],
          'template' => '{update}   {delete}',
          'buttons' => [
            'delete' => function ($url, $model) {
              return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                ['/colors/' . $model->id.'/delete'],
              );

            },
          ],
        ],
      ],
    ]); ?>


<?= PanelWidget::finish(); ?>

