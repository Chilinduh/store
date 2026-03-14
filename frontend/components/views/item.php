<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\Helper\StringHelper;
use yii\web\View;

?>

<div class="products-list__item">
  <div class="product-card">

    <div class="product-card__actions-list">
      <?php if (0) { ?>
      <button class="product-card__action product-card-quickview" type="button" data-product-id="<?= $product['id'] ?>"
              aria-label="Быстрый просмотр">
        <svg width="16" height="16">
          <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
         M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
        </svg>
      </button>

        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="В избранное">
          <svg width="16" height="16">
            <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
        l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
          </svg>
        </button>
        <button class="product-card__action product-card__action--compare" type="button" aria-label="Сравнить">
          <svg width="16" height="16">
            <path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
            <path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
            <path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
          </svg>
        </button>
      <?php } ?>
    </div>

    <div class="product-card__image">
      <div class="image image--type--product">
        <a href="/catalog/<?= $product['category_id'] ?>/<?= $product['id'] ?>" class="image__body">
          <img class="image__tag item" src="<?= isset($images[0]) ? $images[0]['original'] : '/images/no-photo.jpg'; ?>"
               alt="">
        </a>
      </div>
      <?php if($product['availability']) { ?>
      <div class="status-badge status-badge--style--success product-card__fit status-badge--has-text">
        <div class="status-badge__body" style="background-color:<?= $product['availability_color']??'' ?>" >
          <div class="status-badge__text" style="color:#fff"><?= $product['availability'] ?></div>
          <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="<?= $product['name'] ?>"></div>
        </div>
      </div>
      <?php } ?>
    </div>
    <div class="product-card__info">
      <?php if (!empty($product['code'])) { ?>
        <div class="product-card__meta"><span class="product-card__meta-title">Артикул:</span><?= $product['code'] ?>
        </div>
      <?php } ?>
      <div class="product-card__name">
        <div>
          <?php if (!empty($product['property'])) { ?>
            <div class="product-card__badges">
              <?php switch ($product['property']) {
                case 'sale':
                  echo '<div class="tag-badge tag-badge--sale">Распродажа</div>';
                  break;
                case 'new':
                  echo '<div class="tag-badge tag-badge--new">Новинка</div>';
                  break;
                case 'hot':
                  echo '<div class="tag-badge tag-badge--hot">Хит продаж</div>';
                  break;

              } ?>
            </div>
          <?php } ?>
          <a href="/catalog/<?= $product['category_id'] ?>/<?= $product['id'] ?>"><?= $product['name'] ?></a>
        </div>
      </div>
      <?php if (0) { ?>
        <div class="product-card__rating">
          <div class="rating product-card__rating-stars">
            <div class="rating__body">
              <div class="rating__star rating__star--active"></div>
              <div class="rating__star rating__star--active"></div>
              <div class="rating__star rating__star--active"></div>
              <div class="rating__star rating__star--active"></div>
              <div class="rating__star"></div>
            </div>
          </div>
          <?php if (0) { ?>
            <div class="product-card__rating-label">4 по 3 отзывам</div>
          <?php } ?>
        </div>
      <?php } ?>
      <?php if (0) { ?>
        <div class="product-card__features">
          <?= StringHelper::truncateWords($product['description'], 10) ?>
        </div>
      <?php } ?>
      <div class="product-card__features">
        <ul>
          <?php if (isset($product['brand']['name'])) { ?>
            <li> Бренд: <?= $product['brand']['name'] ?> </li>
          <?php } ?>
          <?php if (isset($product['manufacturer']['name'])) { ?>
            <li> Производитель: <?= $product['manufacturer']['name'] ?> </li>
          <?php } ?>
          <?php if ($product['color_id']) { ?>
            <li> Цвет: <?= $product['color']??'' ?> </li>
          <?php } ?>
          <?php if ($product['weight']) { ?>
            <li> Вес: <?= $product['weight']??'' ?> кг</li>
          <?php } ?>
          <?php if ($product['size_id']) { ?>
            <li> Размер: <?= $product['size']['eu_size'] . ' (' . $product['size']['ru_size'] . ')' ?> </li>
          <?php } ?>
        </ul>
      </div>

      <!--        --><?php //include(Yii::getAlias('@frontend/views/products/_characteristics.php')); ?>
    </div>

    <?php $form = ActiveForm::begin([
      'id' => 'form-order-' . $product['id'],
      'options' => [
        'onsubmit' => 'return false;'
      ]
    ]); ?>

    <?= $form->field($cartForm, 'quantity')->textInput([
      'class' => 'input-number__input form-control form-control-lg',
      'min' => 1,
    ])->hiddenInput()->label(false); ?>
    <?= $form->field($cartForm, 'id')->hiddenInput([
      'value' => $product['id']
    ])->label(false); ?>
    <div class="product-card__footer">
      <div class="product-card__prices">
        <div class="product-card__price product-card__price--current"><?= $product['price'] ?> руб.</div>
      </div>
      <button
        class="product-card__addtocart-icon <?= isset($product['inCart']) && $product['inCart'] ? 'cart-add' : 'cart-open' ?>"
        type="button" data-id="<?= $product['id'] ?>" aria-label="В корзину">
        <svg width="20" height="20">
          <circle cx="7" cy="17" r="2"/>
          <circle cx="15" cy="17" r="2"/>
          <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
        V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
        C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
        </svg>
      </button>
      <button
        class="product-card__addtocart-full <?= isset($product['inCart']) && !$product['inCart'] ? 'cart-add' : 'cart-open' ?>"
        type="button" data-id="<?= $product['id'] ?>">
        <?= isset($product['inCart']) && !$product['inCart'] ? 'В корзину' : 'В корзине' ?>
      </button>
      <button
        class="product-card__wishlist favorite add-favorite <?= isset($product['inFavorite']) && $product['inFavorite'] ? 'in-favorite' : '' ?>"
        data-id="<?= $product['id'] ?>" id="favorite<?= $product['id'] ?>" type="button">
        <svg width="16" height="16">
          <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
        l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
        </svg>
        <span>В избранное</span>
      </button>
      <?php if (0) { ?>
        <button class="product-card__compare" type="button">
          <svg width="16" height="16">
            <path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
            <path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
            <path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
          </svg>
          <span>Сравнить</span>
        </button>
      <?php } ?>
    </div>
    <?php ActiveForm::end(); ?>
  </div>
</div>

