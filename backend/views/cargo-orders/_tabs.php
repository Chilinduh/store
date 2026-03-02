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
use common\Helper\MoneyHelper;
use common\Helper\PhoneHelper;
use common\Helper\StringHelper;
?>
<!--begin::Card header-->
<div class="card-header pt-10">
  <div class="d-flex align-items-center">
    <!--begin::Icon-->

    <!--end::Icon-->
    <!--begin::Title-->
    <div class="d-flex flex-column">
      <h2 class="mb-1"><?= $model->good->counterparty->name ?? '' ?></h2>

      <div class="row">
        <div class="col-md-12">

          <?php

          $html = ' <span style="font-size:10px;">АТИ <a href="' . $model->url_ati . '" target="_blank">' . $model->number_ati . '</a></span><br>';
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
            $html .= '<hr>';

            $total = 0;
            if ($model->good->id ?? false) {

              $html .= '<span style="font-size:11px">';
              $html .= '<i class="fa-solid fa-box"></i> '.UnitHelper::Kg($model->good->weight) . '/'.number_format($model->good->capacity, 1, '.', ' ').'/' . number_format($model->good->palette, 1, '.', ' ');
              $html .= '</span><br>';
              $goodRoute = CargoGoodRoute::find()->where(['good_id' => $model->good->id])->one();
              $html .= '<span style="font-size:11px">';

              foreach ($goodRoute->shipping??[] as $item) {

                if ($carrier = $item->carrier ?? false) {
                  $html .= '<span style="font-size:11px">';
                  $html .= Html::a($carrier->name,
                    '/cargo-carrier/' . $model->id,
                    ['data' => ['pjax' => "0"]]
                  );
                  $html .= '</span> - '.MoneyHelper::price($item->counterparty_price/100).'<br>';
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
                $total += $item->counterparty_price/100;

              }

              $html .= '</span>';

              $clientPrice = $model->counterparty_price??MoneyHelper::price($model->counterparty_price/100);
              $delta = $model->counterparty_price??MoneyHelper::price($model->counterparty_price/100 - $total);

              $total = MoneyHelper::price($total);
              $html .= $clientPrice.' - '.$total.' = '.$delta.'<br>';

            }

          }

          ?>
          <div class="text-muted fw-bold">
            <?php
            echo $html;
            ?>
            <?php if(0) { ?>
              <a href="#">Keenthemes</a>
              <span class="mx-3">|</span>
              <a href="#">File Manager</a>
              <span class="mx-3">|</span>2.6 GB
              <span class="mx-3">|</span>758 items
            <?php } ?>
          </div>
        </div>
<!--        <div class="col-md-6">-->
<!--          --><?php //// $model->description ?>
<!--        </div>-->

      </div>



    </div>
    <!--end::Title-->
  </div>
</div>
<!--end::Card header-->
<!--begin::Card body-->
<div class="card-body pb-0">
  <!--begin::Navs-->
  <div class="d-flex overflow-auto h-55px">
    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-semibold flex-nowrap">
      <!--begin::Nav item-->
      <li class="nav-item">
        <a class="nav-link text-active-primary me-6 <?= Yii::$app->controller->action->id === 'update-order' ? 'active' : '' ?>"
           href="/cargo-orders/<?= $model->id ?>">Заявка</a>
      </li>
      <!--end::Nav item-->
      <!--begin::Nav item-->
      <li class="nav-item">
        <a class="nav-link text-active-primary me-6 <?= Yii::$app->controller->action->id === 'update-good' ? 'active' : '' ?> <?= $model->isNewRecord ? 'disabled' : '' ?>"
           href="/cargo-orders/<?= $model->id ?>/update-good">Груз</a>
      </li>
      <!--end::Nav item-->
      <li class="nav-item">
        <a class="nav-link text-active-primary me-6 <?= Yii::$app->controller->action->id === 'update-route' ? 'active' : '' ?> <?= $model->isNewRecord ? 'disabled' : '' ?>"
           href="/cargo-orders/<?= $model->id ?>/update-route">Маршрут</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-active-primary me-6 <?= Yii::$app->controller->action->id === 'update-driver' ? 'active' : '' ?> <?= $model->isNewRecord ? 'disabled' : '' ?>"
           href="/cargo-orders/<?= $model->id ?>/update-driver">Рейсы</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-active-primary me-6 <?= Yii::$app->controller->action->id === 'update-carrier' ? 'active' : '' ?> <?= $model->isNewRecord ? 'disabled' : '' ?>"
           href="/cargo-orders/<?= $model->id ?>/update-carrier">Перевозчики и водители</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-active-primary me-6 <?= Yii::$app->controller->action->id === 'map' ? 'active' : '' ?> <?= $model->isNewRecord ? 'disabled' : '' ?>"
           href="/cargo-orders/<?= $model->id ?>/map">Маршрут на карте</a>
      </li>
    </ul>
  </div>
  <!--begin::Navs-->
</div>
<!--end::Card body-->
