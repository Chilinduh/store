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
use common\models\User;
use app\components\BreadcrumbWidget;

?>
<?php
$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;

?>

<?= BreadcrumbWidget::widget([
  'title' => 'Заказы',
  'createUrl' => '/orders/create',
  'breadcrumbs' => [
    [
      'label' => 'Заказы',
      'url' => '/orders'
    ]
  ]
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
      'attribute' => 'id',
      'label' => '№ Заказа',
      'filter' => false,
    ],
    [
      'hAlign' => 'center',
      'vAlign' => 'middle',
      'attribute' => 'user_id',
      'filter' => false,
      'value' => static function ($model) {

        $user = $model->getUser();
        $userProfile = $model->getUserProfile();

        return $user->username;
      }
    ],
    [
      'hAlign' => 'center',
      'vAlign' => 'middle',
      'attribute' => 'price',
      'filter' => false,
    ],
    [
      'hAlign' => 'center',
      'vAlign' => 'middle',
      'attribute' => 'status_id',
      'filter' => false,
      'value' => static function ($model) {

        $status = $model->getStatus();
        if ($status) {
          return $status->name;
        }
        return '';
      }
    ],
    [
      'hAlign' => 'center',
      'vAlign' => 'middle',
      'format' => ['date', 'php:h:m:s d-m-Y '],
      'attribute' => 'created_at',
      'filter' => false,
    ],
    [
      'class' => 'yii\grid\ActionColumn',
      'headerOptions' => ['width' => '60'],
      'contentOptions' => ['class' => 'actions'],
      'template' => '{update} {delete}',
      'buttons' => [
        //view button
        'delete' => function ($url, $model) {

          return Html::a('<span class="glyphicon glyphicon-trash"></span>',
            '/orders/'. $model->id.'/delete',
            ['data' => ['confirm' => 'My confirm question here?']]

          );
        },
      ],
    ],
  ],
]); ?>

<?= PanelWidget::finish(); ?>
