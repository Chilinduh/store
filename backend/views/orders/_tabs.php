<!--begin::Card header-->
<div class="card-header pt-10">
  <div class="d-flex align-items-center">
    <!--begin::Icon-->
    <div class="symbol symbol-circle me-5">
      <div class="symbol-label bg-transparent text-primary border border-secondary border-dashed">
        <!--begin::Svg Icon | path: icons/duotune/abstract/abs020.svg-->
        <span class="svg-icon svg-icon-2x svg-icon-primary">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
              <path
                d="M17.302 11.35L12.002 20.55H21.202C21.802 20.55 22.202 19.85 21.902 19.35L17.302 11.35Z"
                fill="currentColor"/>
              <path opacity="0.3"
                    d="M12.002 20.55H2.802C2.202 20.55 1.80202 19.85 2.10202 19.35L6.70203 11.45L12.002 20.55ZM11.302 3.45L6.70203 11.35H17.302L12.702 3.45C12.402 2.85 11.602 2.85 11.302 3.45Z"
                    fill="currentColor"/>
            </svg>
          </span>
        <!--end::Svg Icon-->
      </div>
    </div>
    <!--end::Icon-->
    <!--begin::Title-->
    <div class="d-flex flex-column">
      <h2 class="mb-1">#<?= $order->id ?></h2>
      <?= ($order->userProfile->name??'').' '.$order->userProfile->first_name.' '.$order->userProfile->last_name; ?>
      <?= '<br>Тел.: '.\common\Helper\PhoneHelper::phone_format($order->userProfile->phone)
          .'<br>Адрес: '.$order->userProfile->country.', '.$order->userProfile->city.', '.$order->userProfile->address; ?>
      <?php if(0) { ?>
        <div class="text-muted fw-bold">
          <a href="#">Keenthemes</a>
          <span class="mx-3">|</span>
          <a href="#">File Manager</a>
          <span class="mx-3">|</span>2.6 GB
          <span class="mx-3">|</span>758 items
        </div>
      <?php } ?>
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
        <a class="nav-link text-active-primary me-6  <?= Yii::$app->controller->action->id === 'update' ? 'active' : '' ?>" href="/orders/<?= $order->id ?>">Заказ</a>
      </li>
      <!--end::Nav item-->
      <!--begin::Nav item-->
      <li class="nav-item">
        <a class="nav-link text-active-primary me-6 <?= Yii::$app->controller->action->id === 'products' ? 'active' : '' ?>"
           href="/orders/<?= $order->id ?>/products">Состав заказа</a>
      </li>
      <!--end::Nav item-->
    </ul>
  </div>
  <!--begin::Navs-->
</div>
<!--end::Card body-->
