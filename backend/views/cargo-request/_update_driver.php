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

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
//$parent = Menu::findOne(['id' => $menu->parent_id]);
?>


<?= BreadcrumbWidget::widget([
  'title' => 'Заявки',
  'createUrl' => '/cargo-request/create',
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

            $html = $model->id.'<br>';
            $html .= ' <span style="font-size:10px;">' . $model->number . '</span><br>';
            $html .= $model->good->counterparty->name ?? '';
            $html .= '<br>';

            if($goodId = $model->good->id ?? false) {

              $html .= '<span style="font-size:12px;font-weight:bold">';
              $html .= $model->route_start . ' - ' . $model->route_end;
              $html .= '</span><br>';
              $goodRoute = CargoGoodRoute::find()->where(['good_id' => $goodId])->one();

              $html .= '<span class="glyphicon glyphicon-arrow-down"></span> <span style="font-size:12px">';
              $html .= $goodRoute->direction->address_start ?? '';
              $html .= '</span>';
              $html .= '<br><span class="glyphicon glyphicon-arrow-up"></span> <span style="font-size:12px">';
              $html .= $goodRoute->direction->address_end ?? '';
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
            if ($model->good->id ?? false) {

              $html .= '<span style="font-size:11px">';
              $html .= '<i class="fa-solid fa-box"></i> '.UnitHelper::Kg($model->good->weight) . '/'.number_format($model->good->capacity, 1, '.', ' ').'/' . number_format($model->good->palette, 1, '.', ' ');
              $html .= '</span><br>';
              $goodRoute = CargoGoodRoute::find()->where(['good_id' => $model->good->id])->one();
              $html .= '<span style="font-size:11px">';

              foreach ($goodRoute->shipping as $item) {

                if ($carrier = $item->carrier ?? false) {
                  $html .= '<span style="font-size:11px">';
                  $html .= Html::a($carrier->name,
                    '/cargo-carrier/' . $model->id,
                    ['data' => ['pjax' => "0"]]
                  );
                  $html .= '</span> - '.MoneyHelper::price($item->price/100).'<br>';
                  $html .= PhoneHelper::phone_format($carrier->phone).'<br>';
                }

                if(isset($item->driver)) {
                  $html .= '<i class="fa-regular fa-truck-fast" style="color:#009ef7"></i> ' . $item->driver->name.' '.$item->driver->first_name.' '.$item->driver->last_name.' - ';
                  $html .=
                    ' '.$item->driver->car->type->name.' - '
                    .' '.number_format($item->driver->car->weight, 1, '.', ' ')
                    .'/'.number_format($item->driver->car->capacity, 1, '.', ' ')
                    .'/'.number_format($item->driver->car->palette, 1, '.', ' ').'<br>';
                  $html .= PhoneHelper::phone_format($item->driver->phone).'<br>';
                } else {
                  $html .= '<i class="fa-regular fa-truck-fast" style="color:red"></i><br>' ;
                }
                $total += $item->price/100;

              }

              $html .= '</span>';

              $clientPrice = MoneyHelper::price($model->price/100);
              $delta = MoneyHelper::price($model->price/100 - $total);

              $total = MoneyHelper::price($total);
              $html .= $clientPrice.' - '.$total.' = '.$delta.'<br>';
              if ($goodRoute) {


                return $html;
              }
              return '';
            }
          }
        ],
        [
          'hAlign' => 'left',
          'vAlign' => 'middle',
          'label' => 'Отв. лицо',
          'filter' => false,
          'format' => 'raw',
          'value' => function ($model) {

            $html = '<span style="font-size:11px">';
            $html .= isset($model->logist->fio) ? StringHelper::fio($model->logist->fio) : '';
            $html .= !empty($html) ? '<bR>' : '';
            $html .= isset($model->author->fio) ? StringHelper::fio($model->author->fio) : '';
            $html .= '</span>';
            return $html;
          }
        ],
//    [
//      'hAlign' => 'left',
//      'vAlign' => 'middle',
//      'label' => 'Отв. лицо',
//      'filter' => false,
//      'format' => 'raw',
//      'value' => function ($model) {
//
//        $html = '<span style="font-size:11px">';
//        $html .= isset($model->logist->fio) ? StringHelper::fio($model->logist->fio) : '';
//        $html .= !empty($html) ? '<bR>' : '';
//        $html .= isset($model->author->fio) ? StringHelper::fio($model->author->fio) : '';
//        $html .= '</span>';
//        return $html;
//      }
//    ],
        [
          'class' => 'yii\grid\ActionColumn',
          'headerOptions' => ['width' => '120'],
          'contentOptions' => ['class' => 'actions'],
          'template' => '{update}{delete}',
          'buttons' => [
            'update' => function ($url, $model) {

              return '<a href="/cargo-request/' . $model->id . '" class="menu-link px-3" data-pjax="0">
                      <span class="svg-icon svg-icon-primary svg-icon-2x">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#009ef7" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                <rect fill="#009ef7" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                            </g>
                        </svg>
                      </span>
                    </a>';
            },
            'delete' => function ($url, $model) {

              return Html::a('<span class="svg-icon svg-icon-primary svg-icon-2x">
                                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#009ef7" fill-rule="nonzero"/>
                                        <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#009ef7" opacity="0.3"/>
                                    </g>
                                </svg>
                              </span>',
                '/cargo-request/' . $model->id . '/delete',
                ['data' => ['confirm' => 'Удалить запись?', 'pjax' => "0"]]
              );

            },
          ],
        ],
      ],
    ]); ?>

  </div>

</div>

<?= PanelWidget::finish(false); ?>

<?php

$script = <<< JS

     $('.request-count').each(function (i, element) {

       $(element).on('keyup', function (e) {

        e.preventDefault();
        let id = $(this).attr('data-id');
        let count = $(this).val();

        $.ajax({
          url: "/good-request/" + id + "/count",
          data: {'id':id, 'count': count},
          method: 'POST',
          dataType: 'json',
          success: function (data) {
            console.log(response);
          },
          error: function (response) {
            console.log(response);
          }
        });

        return false;
      });
    });

     $('.request-status').each(function (i, element) {

       $(element).on('click', function (e) {

        let id = $(this).attr('data-id');
        let td = $(this).closest('td');

        $.ajax({
          url: "/good-request/" + id + "/status",
          method: 'POST',
          dataType: 'json',
          success: function (data) {

              td.html('Заказано');
              td.find('input').val();
              td.closest('tr');
              tr.find('request-count').closest('td');
              td.find('input').val();
            //$('.btn-outline-secondary').click();
          },
          error: function (response) {
            console.log(response);
          }
        });

        return false;
      });
    });

     $('#code').focus();

     $('.name-copy').on('click', function() {

         let id = $(this).attr('id');
         var textToCopy = document.getElementById(id);
         textToCopy.select();
         document.execCommand("copy");
         alert("Copied the text: " + textToCopy.value);
    });

JS;

$this->registerJs($script, View::POS_END);
