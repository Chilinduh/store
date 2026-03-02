<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use app\components\PanelWidget;

use backend\models\Menu;
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
            'vAlign' => 'middle',
            'label' => 'Адреса, погруз. - разгр.',
            'filter' => false,
            'format' => 'raw',
            'value' => function ($model) {


              $html = $model->good->counterparty->name ?? '';

              if ($goodId = $model->good->id ?? false) {

                $html .= '<span style="font-size:12px;font-weight:bold">';
                $html .= $model->route_start . ' - ' . $model->route_end;
                $html .= '</span><br>';
                $goodRoute = CargoGoodRoute::find()->where(['good_id' => $goodId])->one();

                $html .= '<span class="glyphicon glyphicon-arrow-down"></span> <span style="font-size:12px">';
                $html .= $model->address_start ?? '';
                $html .= '</span>';
                $html .= '<br><span class="glyphicon glyphicon-arrow-up"></span> <span style="font-size:12px">';
                $html .= $model->address_end ?? '';
                $html .= '</span>';
                return $html;
              }
              return '';
            }
          ],
          [
            'hAlign' => 'left',
            'vAlign' => 'middle',
            'label' => 'Цены / Перев. / водит.',
            'filter' => false,
            'width' => '40%',
            'format' => 'raw',
            'value' => function ($model) {

              $html = '';
              $total = 0;
              if ($model->good_id ?? false) {

                $html = ' <span style="font-size:14px;">' . $model->date . '</span><br>';
                $html .= '<span style="font-size:11px">';
                $html .= '<i class="fa-solid fa-box"></i> ' . UnitHelper::Kg($model->good->weight) . '/' . number_format($model->good->capacity, 1, '.', ' ') . '/' . number_format($model->good->palette, 1, '.', ' ');
                $html .= '</span><br>';
                $goodRoute = CargoGoodRoute::find()->where(['good_id' => $model->good->id])->one();
                $html .= '<span style="font-size:11px">';

                foreach ($goodRoute->shipping ?? [] as $item) {

                  if ($carrier = $item->carrier ?? false) {

                    $html .= '<span style="font-size:11px">';
                    $html .= Html::a($carrier->name,
                      '/cargo-carrier/' . $model->id,
                      ['data' => ['pjax' => "0"]]
                    );
                    $html .= '</span> - ' . MoneyHelper::price($item->price / 100) . '<br>';
                    $html .= PhoneHelper::phone_format($carrier->phone) . '<br>';
                  }

                  if ($driver = $item->driver??false) {

                    $car = $item->driver->car;
                    $html .= '<i class="fa-regular fa-truck-fast" style="color:#009ef7"></i> ' . $driver->name . ' ' . $driver->first_name . ' ' . $driver->last_name . ' - ';
                    $html .=
                      ' ' . $car->type->name . ' - '
                      . ' ' . number_format($car->weight, 1, '.', ' ')
                      . '/' . number_format($car->capacity, 1, '.', ' ')
                      . '/' . number_format($car->palette, 1, '.', ' ') . '<br>';
                    $html .= PhoneHelper::phone_format($driver->phone) . '<br>';
                  } else {
                    $html .= '<i class="fa-regular fa-truck-fast" style="color:red"></i><br>';
                  }

                  $total += $item->price / 100;
                }

                $html .= '</span>';

                $clientPrice = MoneyHelper::price($model->price / 100);
                $delta = MoneyHelper::price($model->price / 100 - $total);

                $total = MoneyHelper::price($total);
                $html .= $clientPrice . ' - ' . $total . ' = ' . $delta . '<br>';
                if ($goodRoute) {

                  return $html;
                }
                return '';
              }
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

       $(element).on('click', function (e) {

        e.preventDefault();
        let id = $(this).attr('data-id');
        let comment = $('#comment'  + id);

        $.ajax({
          url: "/cargo-orders/" + id + "/comments",
          data: {'id': id, 'comment': comment.val()},
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
