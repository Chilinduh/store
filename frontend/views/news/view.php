<?php

use frontend\components\BreadCrumbsWidget;
$file = $model->getFiles()->one();
?>

<div class="block-header block-header--has-breadcrumb block-header--has-title">
  <div class="container">
    <div class="block-header__body">
      <?= BreadCrumbsWidget::widget(['breadCrumbs' => $breadCrumbs]) ?>
      <h1 class="block-header__title">Новости</h1>
    </div>
  </div>
</div>
<div class="block blog-view blog-view--layout--list">
  <div class="container">
    <div class="blog-view__body">
      <div class="blog-view__item blog-view__item-sidebar">
        <?= $this->render(Yii::getAlias('_left-menu.php'), compact('categories')); ?>
      </div>
      <div class="blog-view__item blog-view__item-posts">
        <div class="post-view__card post">

          <div class="post__body typography">
            <h2><?= $model->title ?></h2>

            <div class="post__body--content">
              <div class="post__body--content--file" ><img src="<?= $file->original??'' ?>" alt=""></div>
              <div class="post__body--content--text" ><?= $model->text ?></div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<div class="block-space block-space--layout--before-footer"></div>
