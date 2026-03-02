<?php

use frontend\components\BreadCrumbsWidget;
?>
<div class="block-header block-header--has-breadcrumb block-header--has-title">
  <div class="container">
    <div class="block-header__body">
      <?= BreadCrumbsWidget::widget(['breadCrumbs' => $breadCrumbs??[]]) ?>
      <h1 class="block-header__title"><?= $title ?></h1>
    </div>
  </div>
</div>

<div class="block">
  <div class="container container--max--xl">

    <div class="card mb-4">
      <div class="card-body card-body--padding--2">
        <div class="row">
          <div class="col-12">
            <?= $content ?>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
