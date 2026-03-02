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

use common\models\CargoGoodRoute;
use common\models\CargoGoodRouteType;
use common\models\CargoGoodRouteDirection;
use common\Helper\UnitHelper;
use yii\web\View;

?>

<?= BreadcrumbWidget::widget([
  'title' => 'Страницы',
]);
?>


<?= PanelWidget::start(); ?>

<?php
//echo $this->context->renderPartial('_search_form', [
//  'searchModel' => $searchModel
//]);
//?>

<?= PanelWidget::finish(); ?>

<?= PanelWidget::start(); ?>

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
    'id' => 'ID',
    'number' => 'Number',
    'order_condition',
    'order_view_type',
    'external_number',
    'status_title',
    'order_status',
    'created_at',
    'viewed_at',
    'client_role_code',
    'client_title',
    'transportation_way',
    'resource_type_title',
    'loading_dt',
    'from_location_title',
    'route_points_count',
    'to_location_title',
    'from_address_title',
    'to_address_title',
    'unloading_dt',
    'margin_percent',
    'margin',
    'tariff_with_vat',
    'order_chat_message',
    'weight_in_kg',
    'volume_in_cubic_meters',
    'pallet_count',
    'from_address_fact_slot_start_at',
    'from_address_fact_slot_end_at',
    'to_address_fact_slot_start_at',
    'to_address_fact_slot_end_at',
    'period_title',
    'period_status',
    'creation_type',
    'shipping_documents_status',
    'shipping_documents_files',
    [
      'class' => 'yii\grid\ActionColumn',
      'headerOptions' => ['width' => '120'],
      'contentOptions' => ['class' => 'actions'],
      'template' => '',
      'buttons' => [
      ],
    ],
  ],
]); ?>

<?= PanelWidget::finish(); ?>

<?php

$style = <<< CSS

.kv-grid-table tr:nth-child(even) {background: #f7fbfe}
.kv-grid-table tr:nth-child(odd) {background: #FFF}

  .kv-grid-loading {

    visibility: hidden !important;
  }
  .filters {

    visibility: visible !important;
  }

CSS;
$this->registerCss($style);
