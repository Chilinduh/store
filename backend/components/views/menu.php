<?php
use yii\helpers\ArrayHelper;
?>

<!--begin::sidebar menu-->
<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
  <!--begin::Menu wrapper-->
  <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true"
       data-kt-scroll-activate="true" data-kt-scroll-height="auto"
       data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
       data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
    <!--begin::Menu-->
    <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true"
         data-kt-menu-expand="false">
      <!--begin:Menu item-->
      <?php foreach ($menu as $item) { ?>
        <!--begin:Menu item-->
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion <?= in_array($current, ArrayHelper::map($item['items'], 'id', 'url')) ? 'show' : '' ?>">
          <!--begin:Menu link-->
          <span class="menu-link">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M6.5 11C8.98528 11 11 8.98528 11 6.5C11 4.01472 8.98528 2 6.5 2C4.01472 2 2 4.01472 2 6.5C2 8.98528 4.01472 11 6.5 11Z" fill="currentColor"></path>
														<path opacity="0.3" d="M13 6.5C13 4 15 2 17.5 2C20 2 22 4 22 6.5C22 9 20 11 17.5 11C15 11 13 9 13 6.5ZM6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22ZM17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22Z" fill="currentColor"></path>
													</svg>
												</span>
                        <!--end::Svg Icon-->
											</span>
											<span class="menu-title"><?= $item['label'] ?></span>
											<span class="menu-arrow"></span>
										</span>
          <!--end:Menu link-->

            <!--begin:Menu sub-->
            <div class="menu-sub menu-sub-accordion <?= in_array($current, ArrayHelper::map($item['items'], 'id', 'url')) ? 'show' : '' ?>">

              <?php foreach ($item['items'] as $child) { ?>
              <!--begin:Menu item-->
              <div class="menu-item">
                <!--begin:Menu link-->
                <a class="menu-link <?= Yii::$app->controller->id == $child['url'] ? 'active' : '' ?>" href="/<?= $child['url'] ?>">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                  <span class="menu-title"><?= $child['label'] ?></span>
                </a>
                <!--end:Menu link-->
              </div>
              <!--end:Menu item-->
              <?php } ?>
            </div>
            <!--end:Menu sub-->

        </div>
      <?php } ?>
    </div>
  </div>
</div>
<!--end:Menu item-->

<!---->
<!--  --><?php //foreach ($menu as $item) { ?>
<!--    <li class="site-menu-item has-sub --><?//= in_array($current, ArrayHelper::map($item['items'], 'id', 'url')) ? 'open' : '' ?><!--">-->
<!--      <a href="javascript:void(0)">-->
<!--        <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>-->
<!--        <span class="site-menu-title">--><?//= $item['label'] ?><!--</span>-->
<!--        <span class="site-menu-arrow"></span>-->
<!--        <div class="site-menu-badge hide">-->
<!--          <span class="badge badge-pill badge-success">--><?//= count($item['items']) ?><!--</span>-->
<!--        </div>-->
<!--      </a>-->
<!--      <ul class="site-menu-sub" style="">-->
<!--        --><?php //foreach ($item['items'] as $child) { ?>
<!--          <li class="site-menu-item --><?//= in_array($current, ArrayHelper::map($item['items'], 'id', 'url')) ? 'is-shown' : '' ?><!--">-->
<!--            <a class="animsition-link" href="/--><?//= $child['url'] ?><!--">-->
<!--              <span class="site-menu-title">--><?//= $child['label'] ?><!--</span>-->
<!--            </a>-->
<!--          </li>-->
<!--        --><?php //} ?>
<!--      </ul>-->
<!--    </li>-->
<!--  --><?php //} ?>
<!---->
<!--</ul>-->
