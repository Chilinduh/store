<?php

use frontend\models\OrderForm;
use kartik\form\ActiveForm;
use yii\web\View;
$cartForm = new OrderForm();

?>
  <div class="block-products-carousel__carousel">
    <div class="block-products-carousel__carousel-loader" ></div>
    <div class="owl-carousel" data-loop="false"  data-items="<?= count($products) + 10 ?>">

      <?php foreach ($products as $item) { ?>

        <div class="block-products-carousel__column">
          <div class="block-products-carousel__cell">
            <div class="product-card product-card--layout--grid">

              <div class="product-card__actions-list">

                <button
                  class="product-card__action product-card__action--wishlist add-favorite<?= isset($item['inFavorite']) && $item['inFavorite'] ? 'in-favorite' : '' ?>"
                  data-id="<?= $item['id'] ?>" id="favorite<?= $item['id'] ?>" type="button">
                  <svg width="16" height="16">
                    <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
    l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                  </svg>
                </button>

              </div>

              <div class="product-card__image">
                <div class="image image--type--product">
                  <a href="/catalog/<?= $item['category_id'] ?>/<?= $item['id'] ?>" class="image__body">
                    <img class="image__tag item" style="width:250px" src="<?= $item->file()->original ?? '/images/no-photo.jpg'; ?>" alt="">
                  </a>
                </div>
              </div>
              <div class="product-card__info">
                <div class="product-card__meta">
                  <span class="product-card__meta-title">Артикул: </span><?= $item['code'] ?>
                </div>
                <div class="product-card__name">
                  <div>
                    <?php if (!empty($item['property'])) { ?>
                      <div class="product-card__badges">
                        <?php switch ($item['property']) {
                          case 'sale':
                            echo '<div class="tag-badge tag-badge--sale">Распродажа</div>';
                            break;
                          case 'new':
                            echo '<div class="tag-badge tag-badge--new">Акция</div>';
                            break;
                          case 'hot':
                            echo '<div class="tag-badge tag-badge--hot">Хит продаж</div>';
                            break;
                          case 'best':
                            echo '<div class="tag-badge tag-badge--hot">Лучший товар</div>';
                            break;

                        } ?>
                      </div>
                    <?php } ?>
                    <a href="/catalog/<?= $item['category_id'] ?>/<?= $item['id'] ?>"><?= $item['name'] ?></a>
                  </div>
                </div>
              </div>
              <div class="product-card__footer">
                <div class="product-card__prices">
                  <?php if($item['show_previous_price']) { ?>
                    <div class="product-card__price product-card__price--new"><?= $item['price'] ?> руб. </div>
                    <div class="product-card__price product-card__price--old"><?= $item['previous_price'] ?> руб. </div>
                  <?php } else { ?>
                    <div class="product-card__price product-card__price--current"><?= $item['price'] ?> руб. </div>
                  <?php } ?>
                </div>
                <?php

                $form = ActiveForm::begin([
                  'id' => 'form-order-' . $item->id,
                  'action' => '/',
                  'options' => [
                    'onsubmit' => 'return false;'
                  ]
                ]); ?>

                <?= $form->field($cartForm, 'id')->hiddenInput([
                  'value' => $item->id
                ])->label(false);
                ?>

                <div data-icon="icon" data-id="<?= $item->id ?>"
                     class="icon-cart-add <?= !$item->inCart ? 'cart-add' : 'cart-open' ?>">
                  <i class="fa-solid fa-cart-plus <?= $item->inCart ? 'in-cart' : '' ?>"></i>
                </div>

                <?php ActiveForm::end(); ?>

              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
