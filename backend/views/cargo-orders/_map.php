<?php

use yii\web\View;
use backend\models\Menu;
use yii\widgets\ActiveForm;
use app\components\BreadcrumbWidget;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use app\components\PanelWidget;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
$direction = $model->good->route->direction??false;

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

PanelWidget::start(false);
?>

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

      Расстояние: ~ <?= distance($direction->lat_start, $direction->lon_start, $direction->lat_end, $direction->lon_end)?>

      <div id="map" style="width:auto;height:700px"></div>
    </div>
  </div>
<?php
PanelWidget::finish(false);



$script = "
var map = L.map('map').setView([55.5, 38], 9);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href=\"https://www.openstreetmap.org/copyright\">OpenStreetMap</a> contributors'
}).addTo(map);
";

if($direction && !empty($direction->lat_start) && !empty($direction->lon_start)) {

  $script .= "
  L.marker(['".$direction->lat_start."', '".$direction->lon_start."']).addTo(map)
  .bindPopup('Начало ".$direction->address_start."', {autoClose: false, autoPan: false})
    .openPopup();";
}


if($direction && !empty($direction->lat_end) && !empty($direction->lon_end)) {

  $script .= "
  L.marker([".$direction->lat_end.", ".$direction->lon_end."]).addTo(map)
  .bindPopup('Конец ".$direction->address_end."', {autoClose: false, autoPan: false})
    .openPopup();";
}

$this->registerJs($script, View::POS_END);


function distance($lat1, $lon1, $lat2, $lon2) {

  $radius_earth = 6371; // Радиус Земли

  $lat_1 = deg2rad($lat1);
  $lon_1 = deg2rad($lon1);
  $lat_2 = deg2rad($lat2);
  $lon_2 = deg2rad($lon2);

  $d = 2 * $radius_earth * asin(sqrt(sin(($lat_2 - $lat_1) / 2) ** 2 + cos($lat_1) * cos($lat_2) * sin(($lon_2 - $lon_1) / 2) ** 2));

  return number_format($d, 2, '.', '').' км.';
}



