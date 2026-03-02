<?php

use yii\helpers\Html;
use common\models\FKPlatformTypes;
use app\models\Users;
use kartik\daterange\DateRangePicker;
use kartik\form\ActiveForm;
use kartik\datetime\DateTimePicker;
use common\helpers\MiscHelpers;
use kartik\select2\Select2;
use yiister\gentelella\widgets\Panel;
use common\models\Category;
use yii\helpers\ArrayHelper;
use app\components\PanelWidget;
use app\components\BreadcrumbWidget;


$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;

?>
<?php if (0) { ?>

  <?php
  PanelWidget::begin([
    'title' => $this->title,
    'heading' => true,
  ]);
  ?>

  <?php $form = ActiveForm::begin([
    'id' => 'products',
  ]); ?>

  <div class="row">
    <div class="col-md-3">
      <?= $form->field($searchModel, 'category_id')->widget(Select2::classname(), [
        'data' => [],
        'options' => ['placeholder' => 'Выбрать категорию товара',
        ],
        'pluginOptions' => [
          'allowClear' => true
        ],
      ]); ?>
    </div>
    <div class="col-md-3">
      <?= Html::submitButton('Просмотреть', ['class' => 'btn btn-primary']) ?>
    </div>
  </div>
  <?php ActiveForm::end(); ?>
  <?php Panel::end() ?>
<?php } ?>


<?= BreadcrumbWidget::widget([
  'title' => 'Склад',
  'createUrl' => '/product-stock/create',
]);
?>

<?= PanelWidget::start(); ?>

<div id="kt_ecommerce_products_table">
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
    'tableOptions' => [
      'class' => 'table'
    ],
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
        'attribute' => 'stock_id',
        'filter' => false,
        'value' => static function ($model) {

          $stock = $model->getStock()->one();
          return $stock->name ? $stock->name : '';
        }
      ],
      [
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'attribute' => 'product_id',
        'format' => 'raw',
        'filter' => false,
        'value' => static function ($model) {

          $product = $model->getProduct()->one();
          return '<a href="/products/'.$product->id.'"><div data-kt-ecommerce-product-filter="product_name">' . (isset($product) ? $product->name.' '.$product->code : '') . '</div></a>';
        }
      ],
      [
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'attribute' => 'color_id',
        'filter' => false,
        'value' => static function ($model) {

          $color = $model->getColor()->one();
          return $color->name ?? '';
        }
      ],

      [
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'attribute' => 'size_id',
        'filter' => false,
        'value' => static function ($model) {

          $size = $model->getSize()->one();
          return isset($size->id) ? $size->eu_size.' - ('.$size->ru_size.')'  : '';
        }
      ],
      [
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'attribute' => 'quantity',
        'filter' => false,
      ],

      [
        'class' => 'yii\grid\ActionColumn',
        'headerOptions' => ['width' => '60'],
        'template' => '{buttons}',
        'buttons' => [
          'buttons' => function ($url, $model) {

            $buttons = '
          <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Действия
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
            <span class="svg-icon svg-icon-5 m-0">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
              </svg>
            </span>
            </a>
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
              <div class="menu-item px-3">
                <a href="/product-stock/' . $model->id . '" class="menu-link px-3">Редактировать</a>
              </div>
              <div class="menu-item px-3">';
            $buttons .= Html::a('Удалить', '/product-stock/' . $model->id . '/delete', ['class' => 'menu-link px-3', 'onClick' => 'return confirm("Удалить запись?")']);
            $buttons .= '</div>
            </div>';
            return $buttons;
          },
        ],
      ],
    ],
  ]); ?>

</div>
<?= PanelWidget::finish(); ?>

