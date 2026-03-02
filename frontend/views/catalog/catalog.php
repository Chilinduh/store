<?php

use app\components\SliderWidget;
use app\components\ItemsWidget;
use app\components\ProductItemsWidget;
use frontend\components\BreadCrumbsWidget;
use frontend\components\CatalogMenuLeft\CatalogMenuLeftWidget;
use frontend\components\ProductLeftSide\ProductLeftSideWidget;
use common\models\Property;

?>

<div class="block-header block-header--has-breadcrumb block-header--has-title">
  <div class="container">
    <div class="block-header__body">
      <div class="container">
        <div class="block-header__body">
          <?= BreadCrumbsWidget::widget(['breadCrumbs' => $breadCrumbs]) ?>
        </div>
      </div>
      <?php if (0) { ?>
        <h1 class="block-header__title"><?= $category['name']; ?></h1>
      <?php } ?>
    </div>
  </div>
</div>
<div class="block block-split block-split--has-sidebar">
  <div class="container">
    <div class="block-split__row row no-gutters">

      <div class="block-split__item block-split__item-sidebar col-auto">
        <div class="card widget widget-categories-list">
          <div class="widget-categories-list__body" data-collapse
               data-collapse-opened-class="widget-categories-list--open">
            <ul class="widget-categories-list__root">
              <?php foreach ($catalog as $cat) { ?>
                <li class="widget-categories-list__root-item widget-categories-list__root-item--has-children"
                    data-collapse-item>
                  <a href="/catalog/<?= $cat['id'] ?>" class="widget-categories-list__root-link"><?= $cat['name'] ?></a>
                  <?php if (isset($cat['items']) && count($cat['items'])) { ?>

                    <ul class="widget-categories-list__child">
                      <?php foreach ($cat['items'] as $item) { ?>
                        <li class="widget-categories-list__child-item">
                          <a href="/catalog/<?= $item['id'] ?>"
                             class="widget-categories-list__child-link"><?= $item['name'] ?></a>
                        </li>
                      <?php } ?>
                    </ul>

                    <?php if (count($cat['items']) > 5) { ?>
                      <ul class="widget-categories-list__child" data-collapse-content>
                        <?php foreach (array_slice($cat['items'], 0, 5) as $item) { ?>
                          <li class="widget-categories-list__child-item">
                            <a href="/catalog/<?= $item['id'] ?>"
                               class="widget-categories-list__child-link"><?= $item['name'] ?></a>
                          </li>
                        <?php } ?>
                      </ul>

                      <button type="button" class="widget-categories-list__show-more" data-collapse-trigger>
                        <span class="widget-categories-list__show-more-expand-text">Показать все</span>
                        <span class="widget-categories-list__show-more-collapse-text">Скрыть часть</span>
                        <span class="widget-categories-list__show-more-arrow">
                            <svg width="9" height="6">
                                <path
                                  d="M0.2,0.4c0.4-0.4,1-0.5,1.4-0.1l2.9,3l2.9-3c0.4-0.4,1.1-0.4,1.4,0.1c0.3,0.4,0.3,0.9-0.1,1.3L4.5,6L0.3,1.6C-0.1,1.3-0.1,0.7,0.2,0.4z"/>
                            </svg>
                        </span>
                      </button>
                    <?php } ?>
                  <?php } ?>
                </li>
              <?php } ?>

            </ul>
          </div>
        </div>
        <?= ProductLeftSideWidget::widget([
          'title' => 'Новые поступления',
          'property' => Property::CODE_NEW
        ]); ?>
      </div>
      <div class="block-split__item block-split__item-content col-auto">
        <div class="block">
          <div class="categories-list categories-list--layout--columns-5-sidebar">
            <ul class="categories-list__body">
              <?php foreach ($sub as $cat) { ?>
                <li class="categories-list__item">
                  <a href="/catalog/<?= $cat['id'] ?>">
                    <div class="image image--type--category">
                      <div class="image__body">
                        <img class="image__tag" src="<?= $cat['image']['original']??'/images/no-photo.jpg' ?>" alt="">
                      </div>
                    </div>
                    <div class="categories-list__item-name"><?= $cat['name'] ?></div>
                  </a>
                  <div class="categories-list__item-products"><?= $cat['count'] ?> товаров</div>
                </li>
                <li class="categories-list__divider"></li>
              <?php } ?>

            </ul>
          </div>
        </div>

      </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
  </div>
</div>
