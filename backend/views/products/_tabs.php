<!--begin::Card header-->
<div class="card-header pt-10">
  <div class="d-flex align-items-center">
    <!--begin::Icon-->
    <div class="symbol symbol-circle me-5">
      <?php if(isset($model->files[0]->thumbnail)) { ?>
        <img src="<?= Yii::$app->params['imageUrl'] . $model->files[0]->thumbnail ?>">
      <?php } else { ?>
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
      <?php } ?>
    </div>
    <!--end::Icon-->
    <!--begin::Title-->
    <div class="d-flex flex-column">
      <h2 class="mb-1"><?= $model->name??'' ?></h2>
      
        <div class="text-muted fw-bold">
          <div class="text-left"><a href="<?= Yii::$app->params['imageUrl'].'catalog/'.$model->category_id.'/'.$model->id ?>" target="_blank">На сайте</a></div>
          <?php if(0) { ?>
          <span class="mx-3">|</span>
          <a href="#">File Manager</a>
          <span class="mx-3">|</span>2.6 GB
          <span class="mx-3">|</span>758 items
          <?php } ?>
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
        <a class="nav-link text-active-primary me-6 <?= Yii::$app->controller->action->id === 'update' ? 'active' : '' ?>"
           href="/products/<?= $model->id ?>">Товар</a>
      </li>
      <!--end::Nav item-->
      <!--begin::Nav item-->
      <li class="nav-item">
        <a class="nav-link text-active-primary me-6 <?= Yii::$app->controller->action->id === 'update-files' ? 'active' : '' ?> <?= $model->isNewRecord ? 'disabled' : '' ?>"
           href="/products/<?= $model->id ?>/update-files">Изображения</a>
      </li>
      <!--end::Nav item-->
      <li class="nav-item">
        <a class="nav-link text-active-primary me-6 <?= Yii::$app->controller->action->id === 'materials' ? 'active' : '' ?> <?= $model->isNewRecord ? 'disabled' : '' ?>"
           href="/products/<?= $model->id ?>/materials">Материалы</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-active-primary me-6 <?= Yii::$app->controller->action->id === 'prices' ? 'active' : '' ?> <?= $model->isNewRecord ? 'disabled' : '' ?>"
           href="/products/<?= $model->id ?>/prices">Цены</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-active-primary me-6 <?= Yii::$app->controller->action->id === 'attributes' ? 'active' : '' ?> <?= $model->isNewRecord ? 'disabled' : '' ?>"
           href="/products/<?= $model->id ?>/attributes">Атрибуты</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-active-primary me-6 <?= Yii::$app->controller->action->id === 'related' ? 'active' : '' ?> <?= $model->isNewRecord ? 'disabled' : '' ?>"
           href="/products/<?= $model->id ?>/related">Сопутствующие товары</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-active-primary me-6 <?= Yii::$app->controller->action->id === 'update-sources' ? 'active' : '' ?> <?= $model->isNewRecord ? 'disabled' : '' ?>"
           href="/products/<?= $model->id ?>/update-sources">Описание/рерайт</a>
      </li>
    </ul>
  </div>
  <!--begin::Navs-->
</div>
<!--end::Card body-->
