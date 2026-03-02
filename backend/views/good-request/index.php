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
use kartik\form\ActiveForm;
use yii\web\View;
use common\components\CopyToBufferWidget;

?>

<?= BreadcrumbWidget::widget([
  'title' => 'Заявки',
]);
?>

<?= PanelWidget::start(); ?>

<div class="mb-5">
  <div class="d-grid">
    <ul class="nav nav-tabs flex-nowrap text-nowrap">
      <li class="nav-item">
        <a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-primary rounded-bottom-0 active"
           data-bs-toggle="tab" href="#search">Заявки</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-primary rounded-bottom-0"
           data-bs-toggle="tab" href="#filter">Фильтр</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-primary rounded-bottom-0"
           data-bs-toggle="tab" href="#upload">Загрузка товаров из 1С</a>
      </li>
    </ul>
  </div>
</div>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane active show" id="search" role="tabpanel">
    <?php
    echo $this->context->renderPartial('_search', [
      'goodRequestSearch' => $goodRequestSearch,
      'goodStorageSearch' => $goodStorageSearch
    ]);
    ?>
  </div>
  <div class="tab-pane" id="filter" role="tabpanel">
    <?php
    echo $this->context->renderPartial('_filter', [
      'goodRequest' => $goodRequestSearch,
    ]);
    ?>
  </div>

  <div class="tab-pane" id="upload" role="tabpanel">
    <?php
    echo $this->context->renderPartial('_upload', [
      'goodStorage' => $goodStorageSearch
    ]);
    ?>
  </div>
</div>

<?= PanelWidget::finish(); ?>

<?= PanelWidget::start(); ?>

<div class="mb-5">
  <div class="d-grid">
    <ul class="nav nav-tabs flex-nowrap text-nowrap">
      <li class="nav-item">
        <a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-primary rounded-bottom-0 active"
           data-bs-toggle="tab" href="#request">Заявки</a>
      </li>

      <li class="nav-item">
        <a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-primary rounded-bottom-0"
           data-bs-toggle="tab" href="#goods">Товары из 1С</a>
      </li>
    </ul>
  </div>
</div>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane active show" id="request" role="tabpanel">
    <?= \kartik\grid\GridView::widget([
      'dataProvider' => $goodRequest,
      'filterModel' => $goodRequestSearch,
      'containerOptions' => [
        'style' => 'min-height:100px; overflow: auto; word-wrap: break-word;'
      ],

      'toolbar' => [
        [
          'content' =>
            Html::a('<i class="fas fa-redo"></i>', ['/good-request'], [
              'class' => 'btn btn-outline-secondary',
              'title' => 'Reset Grid',
              'data-pjax' => true,
            ]),
          'options' => ['class' => 'btn-group mr-2 me-2']
        ],
        '{export}',
        '{toggleData}'
      ],
//        'rowOptions' => function($model) {
//
//          if($model->deleted_at) {
//            return ['class' => 'danger']; // Генерирует опции для tr
//          }
//          return [];
//        },
      'pjax' => false,
      'pjaxSettings' => [
        'neverTimeout' => true,
//          'beforeGrid'=>'My fancy content before.',
//          'afterGrid'=>'My fancy content after.',
      ],
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
          'filter' => true,
          'format' => 'raw',
          'width' => '5%',
        ],
        [
          'hAlign' => 'left',
          'vAlign' => 'middle',
          'attribute' => 'name',
          'format' => 'raw',
          'filter' => true,
          'value' => function ($model) {


            $html = CopyToBufferWidget::widget(
              [
                'text' => Html::a($model->name, 'javascript:return void();',
                  ['class' => 'copy link-dashed', 'style' => 'display:block;float:left']
                )
                ]
            );

            if (!empty($model->code)) {
              $html .= ' - <span style="color:red">' . $model->code . '</span>';
            }
            return $html;
          }
        ],
        [
          'hAlign' => 'center',
          'vAlign' => 'middle',
          'attribute' => 'count',
          'label' => 'Кол-во',
          'format' => 'raw',
          'width' => '5%',
          'filter' => false,
          'value' => function ($model) {

            $status = $model->status->id ?? false;
            if ($status == 2) {

              return $model->count;
            }
            $html = '<input type="text" style="width:60px" id="request-count-' . $model->count . '" class="form-control request-count" data-id="' . $model->id . '" name="count" value="' . $model->count . '">';
            return $html;
          }
        ],
        [
          'hAlign' => 'center',
          'vAlign' => 'middle',
          'attribute' => 'good_request_status_id',
          'format' => 'raw',
          'filter' => false,
          'value' => function ($model) {

            $status = $model->status->id ?? false;
            if ($status == 1) {

              return Html::button('Закрыть', ['data-id' => $model->id, 'class' => 'btn btn-sm btn-primary request-status']);
            }
            return $model->status->name ?? '';
          }
        ],
        [
          'hAlign' => 'center',
          'vAlign' => 'middle',
          'attribute' => 'created_at',
          'filter' => true,
          'format' => 'raw',
          'value' => function ($model) {

            return $model->created_at;
          }
        ],
        [
          'class' => 'yii\grid\ActionColumn',
          'headerOptions' => ['width' => '140'],
          'contentOptions' => ['class' => 'actions'],
          'template' => '{edit}{delete}',
          'buttons' => [
            'edit' => function ($url, $model) {

              return '<a href="/good-request/' . $model->id . '" class="menu-link px-3" data-pjax="0">
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

              return '<span data-id="'.$model->id.'" data-pjax="0" class="menu-link px-3 request-delete" >
                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                       <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect x="0" y="0" width="24" height="24"/>
                              <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#009ef7" fill-rule="nonzero"/>
                              <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#009ef7" opacity="0.3"/>
                          </g>
                      </svg>
                    </span>
                  </span>';
            },
          ],
        ],
      ],
    ]); ?>
  </div>
  <div class="tab-pane" id="goods" role="tabpanel">
    <?= \kartik\grid\GridView::widget([
      'dataProvider' => $goodStorage,
      'filterModel' => $goodStorageSearch,
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
        'code',
        'name',
        [
          'class' => 'yii\grid\ActionColumn',
          'headerOptions' => ['width' => '100'],
          'contentOptions' => ['class' => 'actions'],
          'template' => '{update}&nbsp;&nbsp;{delete}',
          'buttons' => [
            'delete' => function ($url, $model) {
              return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                ['good-request/' . $model->id . '/delete'],
              );

            },
          ],
        ],
      ],
    ]); ?>
  </div>
</div>

<?php PanelWidget::finish(); ?>

<?php

$script = <<< JS

     $('.request-delete').each(function (i, element) {

       $(element).on('click', function (e) {

        e.preventDefault();
        let id = $(this).attr('data-id');

        $.ajax({
          url: "/good-request/" + id + "/delete",
          method: 'POST',
          data: {'id':id},
          dataType: 'json',
          success: function (data) {
            $(element).closest('tr').addClass('hide');
          },
          error: function (response) {
            $(element).closest('tr').addClass('hide');
          }
        });

        return false;
      });
    });

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

$style = <<< CSS

.name-copy {

cursor: pointer;
}

.kv-grid-table tr:nth-child(even) {background: #f7fbfe}
.kv-grid-table tr:nth-child(odd) {background: #FFF}

  .kv-grid-loading {

    visibility: hidden !important;
  }
  .filters {

    visibility: visible !important;
  }
  .request-delete {

    cursor: pointer;
  }

CSS;
$this->registerCss($style);

?>

