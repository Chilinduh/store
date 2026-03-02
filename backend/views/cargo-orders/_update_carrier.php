<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use app\components\PanelWidget;

use backend\models\Menu;
use common\models\CargoDriver;
use yii\widgets\ActiveForm;
use app\components\BreadcrumbWidget;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use common\models\CargoGoodRoute;
use common\Helper\UnitHelper;
use common\Helper\MoneyHelper;
use common\Helper\PhoneHelper;
use common\Helper\StringHelper;
use yii\web\View;
use common\models\CargoCarrier;
use common\models\CargoOrdersCarrier;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
//$parent = Menu::findOne(['id' => $menu->parent_id]);
?>


<?= BreadcrumbWidget::widget([
  'title' => 'Заявки',
  'createUrl' => '/cargo-orders/create',
  'breadcrumbs' => [
    ['label' => $menu->name, 'url' => Yii::$app->getUrlManager()->createUrl([$menu->url])],
    ['label' => $model->number ?? '']
  ]
]);
?>

<?= PanelWidget::start(false); ?>

  <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10">
    <!--begin::Card body-->
    <?php

    echo $this->context->renderPartial('_tabs', [
      'model' => $model,
    ]);
    ?>
    <!--end::Card body-->
  </div>

  <div class="card card-flush">
    <!--begin::Card header-->
    <div class="card-body pb-0">

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
            'label' => 'Перевозчики',
            'filter' => false,
            'width' => '50%',
            'format' => 'raw',
            'value' => function ($model, $key) {

              $carrier = CargoCarrier::find()->where(['id' => $key])->one();

              $html = '<form class="form-vertical kv-form-bs3 carrier-comments" data-id="'.$key.'">';
              $html .= '<input type="hidden" name="CargoOrdersCarrier[carrier_id]" value="'.$key.'">';
              $html .= '<div class="form-group">';
              $html .= '<div class="form-group field-cargoorders-comment">';
              $html .= '<label class="control-label" for="cargoorders-comment">Комментарий (суда писать общий комментарий по перевозу)</label>';
              $html .= '<textarea class="form-control" name="CargoCarrier[comment]" rows="2">'.($carrier->comment??'').'</textarea>';
              $html .= '</div>';
              $html .= '</div>';
              $html .= '<button type="submit" class="btn btn-sm btn-primary">Сохранить</button>';
              $html .= '</form><br>';
              $html .= '<h2><a href="/cargo-carrier/'.$carrier->id.'">'.$carrier->name.'</a></h2><h3>'.PhoneHelper::phone_format($carrier->phone).'</h3><br>';

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
          [
            'hAlign' => 'left',
            'vAlign' => 'top',
            'label' => '',
            'filter' => false,
            'format' => 'raw',
            'value' => function ($request, $key) use ($model) {

              $cargoOrdersCarrier = CargoOrdersCarrier::find()->where(['order_id' => $model->id, 'carrier_id' => $key])->one();

              $html = '<form class="form-vertical kv-form-bs3 comments" data-id="'.$model->id.'">';
              $html .= '<input type="hidden" name="CargoOrdersCarrier[order_id]" value="'.$model->id.'">';
              $html .= '<input type="hidden" name="CargoOrdersCarrier[carrier_id]" value="'.$key.'">';
              $html .= '<div class="form-group">';
              $html .= '<div class="form-group field-cargoorders-comment">';
              $html .= '<label class="control-label" for="cargoorders-comment">Комментарий (суда писать комментарий по перевозу в рамках груза)</label>';
              $html .= '<textarea class="form-control" name="CargoOrdersCarrier[comment]" rows="2">'.($cargoOrdersCarrier->comment??'').'</textarea>';
              $html .= '</div>';
              $html .= '</div>';

//              $html .= '<div class="form-group">';
//              $html .= '<div class="form-check">
//                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="margin: -2px 0px 0px -27px !important">
//                              <label class="form-check-label" for="flexCheckDefault">
//                                перевозчик не повезет
//                              </label>
//                          </div>';
//              $html .= '</div>';

              $html .= '<button type="submit" class="btn btn-sm btn-primary">Сохранить</button>';
              $html .= '</form>';
              return $html;
            }
          ],
        ],
      ]); ?>

    </div>
  </div>

<?= PanelWidget::finish(false); ?>

<?php

$script = <<< JS

     $('.comments').each(function (i, element) {

       $(element).on('submit', function (e) {

        e.preventDefault();
        let id = $(this).attr('data-id');

        $.ajax({
          url: "/cargo-orders/" + id + "/order-comment",
          data: $( this ).serialize(),
          method: 'POST',
          dataType: 'json',
          success: function (data) {

          },
          error: function (response) {
            console.log(response);
          }
        });

        return false;
      });
    });

     $('.carrier-comments').each(function (i, element) {

       $(element).on('submit', function (e) {

        e.preventDefault();
        let id = $(this).attr('data-id');

        $.ajax({
          url: "/cargo-orders/" + id + "/carrier-comment",
          data: $( this ).serialize(),
          method: 'POST',
          dataType: 'json',
          success: function (data) {

          },
          error: function (response) {
            console.log(response);
          }
        });

        return false;
      });
    });

JS;

$this->registerJs($script, View::POS_END);
