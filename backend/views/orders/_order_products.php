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
use backend\models\Menu;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use app\components\BreadcrumbWidget;
use yii\widgets\Breadcrumbs;
use kartik\file\FileInput;
use kartik\checkbox\CheckboxX;
use common\models\User;
use common\models\OrderStatus;
use yii\helpers\ArrayHelper;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
//$parent = Menu::findOne(['id' => $menu->parent_id]);
?>

<?= BreadcrumbWidget::widget([
  'title' => 'Заказы',
  'createUrl' => '/orders/create',
  'breadcrumbs' => [
    ['label' => $menu->name, 'url' => Yii::$app->getUrlManager()->createUrl([$menu->url])],
    ['label' => $order->id]
  ]
]);

?>

<?= PanelWidget::start(false); ?>

<div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10">
  <?php
  echo $this->context->renderPartial('_tabs', [
    'order' => $order
  ]);
  ?>
</div>
<div class="card card-flush">
  <!--begin::Card header-->
  <div class="card-body pb-0">

    <div class="row">
      <!--begin::Col-->
      <div class="col-md-12">
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
              'filter' => false,
            ],
            [
              'hAlign' => 'center',
              'vAlign' => 'middle',
              'format' => 'html',
              'filter' => false,
              'value' => static function ($model) {


                $images = $model->product->getFiles()->asArray()->all();
                if($images) {
                  return \yii\helpers\Html::a(\yii\helpers\Html::img(Yii::$app->params['imageUrl'].$images[0]['thumbnail'], [
                    'style' => ['border' => '0px solid #efefef'], 'width' => '50px'
                  ]), Yii::$app->params['imageUrl']. $images[0]['original'], []);
                }
                return '';
              }
            ],
            [
              'hAlign' => 'center',
              'vAlign' => 'middle',
              'format' => 'html',
              'label' => 'Наименование',
              'filter' => false,
              'value' => static function ($model) {

                  return \yii\helpers\Html::a($model->product->name,
                    Yii::$app->params['imageUrl'].'/catalog/'.$model->product->category_id.'/'.$model->product->id
                  );
              }
            ],
            [
              'hAlign' => 'center',
              'vAlign' => 'middle',
              'label' => 'Количество',
              'format' => 'html',
              'filter' => false,
              'value' => static function ($model) {

                return $model->quantity;
              }
            ],
            [
              'hAlign' => 'center',
              'vAlign' => 'middle',
              'attribute' => 'price',
              'label' => 'Цена, руб.',
              'format' => 'html',
              'filter' => false,
              'value' => static function ($model) {

                return $model->product->price;
              }
            ],
            [
              'hAlign' => 'center',
              'vAlign' => 'middle',
              'format' => 'html',
              'filter' => false,
              'label' => 'Сумма, руб.',
              'value' => static function ($model) {

                return $model->product->price*$model->quantity;
              }
            ],
            [
              'class' => 'yii\grid\ActionColumn',
              'headerOptions' => ['width' => '60'],
              'template' => '',
            ],
          ],
        ]); ?>
      </div>
    </div>

  </div>

</div>

<?= PanelWidget::finish(false); ?>
