<?php

namespace common\components;

use yii;
use yii\helpers\Html;
use yii\web\View;
use frontend\components\BreadCrumbsWidget;
use frontend\components\CatalogMenuLeft\CatalogMenuLeftWidget;
use yii\bootstrap\ActiveForm;

?>

<div class="block-header block-header--has-breadcrumb">
  <div class="container">
    <div class="block-header__body">
      <?= BreadCrumbsWidget::widget(['breadCrumbs' => $breadCrumbs]) ?>
    </div>
  </div>
</div>
<div class="block-split">

  <?php
  $this->context->render('@frontend/views/site/_category_filter.php', [
    'products' => $products ?? [],
    'categories' => $categories,
    //'category' => $category,
  ]);

  //include_once(Yii::getAlias('@frontend/views/site/_left-filter.php'));
  ?>
  <div class="container">
    <div class="block-split__row row no-gutters">

      <div class="block-split__item block-split__item-content col-auto">
        <div class="product product--layout--full">
          <div class="product__body">
            <div class="product__card product__card--one"></div>
            <div class="product__card product__card--two"></div>
            <div class="product-gallery product-gallery--layout--product-sidebar product__gallery"
                 data-layout="product-sidebar">
              <div class="product-gallery__featured">
                <button type="button" class="product-gallery__zoom">
                  <svg width="24" height="24">
                    <path d="M15,18c-2,0-3.8-0.6-5.2-1.7c-1,1.3-2.1,2.8-3.5,4.6c-2.2,2.8-3.4,1.9-3.4,1.9s-0.6-0.3-1.1-0.7
	c-0.4-0.4-0.7-1-0.7-1s-0.9-1.2,1.9-3.3c1.8-1.4,3.3-2.5,4.6-3.5C6.6,12.8,6,11,6,9c0-5,4-9,9-9s9,4,9,9S20,18,15,18z M15,2
	c-3.9,0-7,3.1-7,7s3.1,7,7,7s7-3.1,7-7S18.9,2,15,2z M16,13h-2v-3h-3V8h3V5h2v3h3v2h-3V13z"/>
                  </svg>
                </button>
                <div class="owl-carousel">

                  <?php if (count($product['images'])) { ?>
                    <?php foreach ($product['images'] as $image) { ?>

                      <a class="image image--type--product" href="<?= $image['original'] ?? '/images/no-photo.jpg' ?>"
                         target="_blank" data-width="700" data-height="700">
                        <div class="image__body">
                          <img class="image__tag" src="<?= $image['original'] ?? '/images/no-photo.jpg' ?>" alt="">
                        </div>
                      </a>

                    <?php } ?>
                  <?php } else { ?>

                    <a class="image image--type--product" href="/images/no-photo.jpg"
                       target="_blank" data-width="700" data-height="700">
                      <div class="image__body">
                        <img class="image__tag" src="/images/no-photo.jpg" alt="">
                      </div>
                    </a>

                  <?php } ?>

                </div>
              </div>
              <div class="product-gallery__thumbnails">
                <div class="owl-carousel">
                  <?php foreach ($product['images'] as $image) { ?>

                    <div class="product-gallery__thumbnails-item image image--type--product">
                      <div class="image__body">
                        <img class="image__tag" src="<?= $image['thumbnail'] ?? '/images/no-photo.jpg' ?>" alt="">
                      </div>
                    </div>

                  <?php } ?>

                </div>
              </div>
            </div>
            <div class="product__header">
              <h1 class="product__title"><?= $product['name'] ?></h1>
              <?php if (0) { ?>
                <div class="product__subtitle">
                  <div class="product__rating">
                    <div class="product__rating-stars">
                      <div class="rating">
                        <div class="rating__body">
                          <div class="rating__star rating__star--active"></div>
                          <div class="rating__star rating__star--active"></div>
                          <div class="rating__star rating__star--active"></div>
                          <div class="rating__star rating__star--active"></div>
                          <div class="rating__star"></div>
                        </div>
                      </div>
                    </div>
                    <div class="product__rating-label"><a href="">3.5 по 7 отзывам</a></div>
                  </div>
                  <div
                    class="status-badge status-badge--style--success product__fit status-badge--has-icon status-badge--has-text">
                    <div class="status-badge__body">
                      <div class="status-badge__icon">
                        <svg width="13" height="13">
                          <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                        </svg>
                      </div>
                      <div class="status-badge__text">Деталь подходит для 2011 Ford Focus S</div>
                      <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip"
                           title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
            <div class="product__main">
              <div class="product__excerpt">
                <?= !empty($product['description']) && strlen($product['description']) > 300 ? mb_substr($product['description'], 0, 300) . ' ...': $product['description'] ?>
              </div>
              <?php if ($product['materials'] || $product['attributes']) { ?>
                <div class="product__features">
                  <div class="product__features-title">Характеристики:</div>
                  <ul>
                    <?php foreach ($product['materials'] as $material) { ?>
                      <li><?= $material['name'] ?> - <span><?= $material['value'] ?></span><?= $material['unit'] ?></li>
                    <?php } ?>
                    <?php foreach (array_slice($product['attributes'], 0, 6) as $attributes) { ?>
                      <?php if (!empty($attributes['value'])) { ?>
                        <li><?= $attributes['name'] ?> - <span><?= $attributes['value'] ?></span></li>
                      <?php } ?>
                    <?php } ?>
                  </ul>
                  <div class="product__features-link"><a href="#description">Полное описание</a></div>
                </div>
              <?php } ?>
            </div>
            <div class="product__info">
              <div class="product__info-card">
                <div class="product__info-body">
                  <?php if (0) { ?>
                    <div class="product__badge tag-badge tag-badge--sale">Sale</div>
                  <?php } ?>
                  <div class="product__prices-stock">
                    <div class="product__prices">
                      <div class="product__price product-card__price--current"><?= $product['price'] ?> руб.</div>
                      <?php if ($product['show_previous_price']) { ?>
                        <div style="text-decoration:line-through"><?= $product['previous_price'] ?> руб.</div>
                      <?php } ?>
                    </div>
                    <div class="status-badge status-badge--style--success product__stock status-badge--has-text">
                      <div class="status-badge__body">
                        <div class="status-badge__text">В наличии</div>
                        <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip"
                             title="In&#x20;Stock"></div>
                      </div>
                    </div>
                  </div>
                  <div class="product__meta">
                    <table>
                      <?php if (!empty($product['code'])) { ?>
                        <tr>
                          <th> Артикул</th>
                          <td><?= $product['code'] ?></td>
                        </tr>
                      <?php } ?>
                      <?php if (isset($product['brand']) && !empty($product['brand'])) { ?>
                        <tr>
                          <th> Бренд</th>
                          <td> <?= $product['brand']['name'] ?> </td>
                        </tr>
                      <?php } ?>
                      <?php if (isset($product['manufacturer']['name'])) { ?>
                        <tr>
                          <th> Страна производитель</th>
                          <td> <?= $product['manufacturer']['name'] ?> </td>
                        </tr>
                      <?php } ?>
                      <?php if ($product['color']) { ?>
                        <tr>
                          <th> Цвет</th>
                          <td> <?= $product['color'] ?> </td>
                        </tr>
                      <?php } ?>
                      <?php if ($product['weight']) { ?>
                        <tr>
                          <th> Вес</th>
                          <td> <?= $product['weight'] ?> кг</td>
                        </tr>
                      <?php } ?>
                      <?php if (0) { ?>
                        <tr>
                          <th> Код поставщика</th>
                          <td> BDX-750Z370-S</td>
                        </tr>
                      <?php } ?>
                    </table>
                  </div>
                </div>

                <?php $form = ActiveForm::begin([
                  'id' => 'form-order-' . $product['id'],
                  'options' => [
                    'onsubmit' => 'return false;'
                  ]
                ]); ?>

                <?= $form->field($cartForm, 'id')->hiddenInput()->label(false); ?>

                <?php if ($product['colors']) { ?>

                  <div class="product-form product__form">
                    <div class="product-form__body">

                      <div class="product-form__row">
                        <div class="product-form__title">Цвет</div>
                        <div class="product-form__control">
                          <div class="input-radio-color">
                            <div class="input-radio-color__list">
                              <?= $form->field($cartForm, 'color_id')->hiddenInput()->label(false); ?>
                              <?php foreach ($product['colors'] as $color) { ?>
                                <label class="input-radio-color__item input-radio-color-button"
                                       data-category-id="<?= $product['category_id'] ?>"
                                       data-product-id="<?= $product['id'] ?>"
                                       data-color-id="<?= $color['id'] ?>"
                                       style="color:<?= $color['color'] ?>"
                                       data-toggle="tooltip"
                                       title="<?= $color['name'] ?>">

                                  <span style="background:<?= $color['color'] ?>"
                                        class="<?= $color['default'] ? 'color-border-fill' : '' ?>"></span>
                                </label>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="product-form__row">
                        <div class="product-form__title">Размер</div>
                        <div class="product-form__control">
                          <div class="input-radio-label">
                            <div class="input-radio-label__list size-list">
                              <?php foreach ($product['colors'] as $color) { ?>
                                <?php if ($color['default']) { ?>
                                  <?php foreach ($color['sizes'] as $size) { ?>
                                    <label class="input-radio-label__item" data-size-id="<?= $size['id'] ?>">
                                      <input type="radio" name="size_id" value="<?= $size['id'] ?>"
                                             class="input-radio-label__input">
                                      <span
                                        class="input-radio-label__title"><?= $size['eu_size'] . ' (' . $size['ru_size'] . ')' ?></span>
                                    </label>
                                  <?php } ?>
                                <?php } ?>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                <?php } ?>
                <div class="product__actions">
                  <div class="product__actions-item product__actions-item--quantity">
                    <div class="input-number">
                      <?= $form->field($cartForm, 'quantity')->textInput([
                        'class' => 'input-number__input form-control form-control-lg',
                        'min' => 1,
                      ])->label(false); ?>
                      <div class="input-number__add"></div>
                      <div class="input-number__sub"></div>
                    </div>
                  </div>
                  <div class="product__actions-item product__actions-item--addtocart">
                    <button
                      class="btn btn-primary btn-lg btn-block cart-add <?= Yii::$app->cart->getItem($product['id']) ? 'cart-hide' : '' ?>"
                      data-id="<?= $product['id'] ?>">В
                      корзину
                    </button>
                    <button
                      class="btn btn-primary btn-lg btn-block cart-open <?= Yii::$app->cart->getItem($product['id']) ? '' : 'cart-hide' ?>"
                      id="item<?= $product['id'] ?>">В
                      корзине
                    </button>
                  </div>
                  <div class="product__actions-divider"></div>
                  <button
                    class="product__actions-item product__actions-item--wishlist favorite add-favorite <?= isset($product['inFavorite']) && $product['inFavorite'] ? 'in-favorite' : '' ?>"
                    data-id="<?= $product['id'] ?>" id="favorite<?= $product['id'] ?>" type="button">
                    <svg width="16" height="16">
                      <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
        l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                    </svg>
                    <span>В избранное</span>
                  </button>
                  </button>

                </div>
                <?php ActiveForm::end(); ?>
              </div>
            </div>
            <div class="product__tabs product-tabs product-tabs--layout--sidebar">
              <ul class="product-tabs__list">
                <li class="product-tabs__item product-tabs__item--active"><a
                    href="#product-tab-description">Описание</a></li>
                <li class="product-tabs__item"><a href="#product-tab-specification">Характеристики</a></li>
              </ul>
              <div class="product-tabs__content">
                <div class="product-tabs__pane product-tabs__pane--active" id="product-tab-description">
                  <a name="description"></a><?= $product['description'] ?>
                </div>
                <div class="product-tabs__pane" id="product-tab-specification">
                  <div class="spec">
                    <div class="spec__section">
                      <?php foreach ($product['materials'] as $material) { ?>
                        <div class="spec__row">
                          <div class="spec__name"><?= $material['name'] ?></div>
                          <div class="spec__value"><?= $material['value'] ?> <?= $material['unit'] ?></div>
                        </div>
                      <?php } ?>
                      <?php foreach ($product['attributes'] as $attributes) { ?>
                        <?php if (!empty($attributes['value'])) { ?>
                          <div class="spec__row">
                            <div class="spec__name"><?= $attributes['name'] ?></div>
                            <div class="spec__value"><?= $attributes['value'] ?></div>
                          </div>
                        <?php } ?>
                      <?php } ?>
                      <?php if ($product['color']) { ?>
                        <div class="spec__row">
                          <div class="spec__name">Цвет</div>
                          <div class="spec__value"><?= $product['color'] ?></div>
                        </div>
                      <?php } ?>

                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>


        <?php if(count($productsRelated)) { ?>
        <div class="block-space block-space--layout--divider-nl"></div>
        <div class="block block-products-carousel" data-layout="grid-4-sidebar">
          <div class="container">
            <div class="section-header">
              <div class="section-header__body">
                <h2 class="section-header__title">Сопутствующие товары</h2>
                <div class="section-header__spring"></div>
                <div class="section-header__arrows">
                  <div class="arrow section-header__arrow section-header__arrow--prev arrow--prev">
                    <button class="arrow__button" type="button"><svg width="7" height="11">
                        <path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />
                      </svg>
                    </button>
                  </div>
                  <div class="arrow section-header__arrow section-header__arrow--next arrow--next">
                    <button class="arrow__button" type="button"><svg width="7" height="11">
                        <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9	C-0.1,9.8-0.1,10.4,0.3,10.7z" />
                      </svg>
                    </button>
                  </div>
                </div>
                <div class="section-header__divider"></div>
              </div>
            </div>
            <?= $this->context->renderPartial('/site/_carousel', ['products' => $productsRelated]); ?>
          </div>
        </div>

        <?php } ?>

      </div>
    </div>
  </div>
</div>
<div class="block-space block-space--layout--before-footer"></div>
