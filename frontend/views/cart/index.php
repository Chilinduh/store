<?php

use frontend\components\BreadCrumbsWidget;

use lavrentiev\widgets\toastr\Notification;

?>

<div class="block-header block-header--has-breadcrumb block-header--has-title">
  <div class="container">
    <div class="block-header__body">

      <?= BreadCrumbsWidget::widget(['breadCrumbs' => [
        [
          'url' => '/cart',
          'name' => 'Корзина',
        ]
      ]]) ?>
      <h1 class="block-header__title">Корзина</h1>
    </div>
  </div>
</div>
<div class="block">
  <?php if (Yii::$app->cart->getTotalCount() > 0) { ?>
    <div class="container">

      <div class="cart">
        <div class="cart__table cart-table">
          <table class="cart-table__table">
            <thead class="cart-table__head">
            <tr class="cart-table__row">
              <th class="cart-table__column cart-table__column--image">Изображение</th>
              <th class="cart-table__column cart-table__column--product">Наименование</th>
              <th class="cart-table__column cart-table__column--price">Цена</th>
              <th class="cart-table__column cart-table__column--quantity">Количество</th>
              <th class="cart-table__column cart-table__column--total">Всего</th>
              <th class="cart-table__column cart-table__column--remove"></th>
            </tr>
            </thead>
            <tbody class="cart-table__body">
            <?php foreach ($cart as $item) { ?>
              <tr class="cart-table__row" id="cartItem<?= $item['id'] ?>">
                <td class="cart-table__column cart-table__column--image">
                  <div class="image image--type--product">
                    <a href="catalog/<?= $item['category_id'] ?>/<?= $item['id'] ?>" class="image__body">
                      <img class="image__tag" src="<?= $item['images'][0]['original']??'/images/no-photo.jpg' ?>" alt="">
                    </a>
                  </div>
                </td>
                <td class="cart-table__column cart-table__column--product">
                  <a href="catalog/<?= $item['category_id'] ?>/<?= $item['id'] ?>"
                     class="cart-table__product-name"><?= $item['name'] ?></a>
                  <?php if ($item['color_id'] || $item['size_id']) { ?>
                    <ul class="cart-table__options">
                      <?php if ($item['color_id']) { ?>
                      <li>Цвет: <?= $item['color'] ?></li>
                      <?php } ?>
                      <?php if ($item['size_id']) { ?>
                      <li>Размер: <?= $item['size']['eu_size'] ?> (<?= $item['size']['ru_size'] ?>)</li>
                      <?php } ?>
                    </ul>
                  <?php } ?>
                </td>
                <td class="cart-table__column cart-table__column--price"
                    data-title="Price"><?= $item['price'] ?> руб.
                </td>
                <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                  <div class="cart-table__quantity input-number">
                    <input class="form-control input-number__input" id="cart-item-quantity<?= $item['id'] ?>"
                           type="number" min="1" value="<?= $item['quantity'] ?>">
                    <div class="input-number__add cart-item-quantity-add" data-id="<?= $item['id'] ?>"></div>
                    <div class="input-number__sub cart-item-quantity-sub" data-id="<?= $item['id'] ?>"></div>
                  </div>
                </td>
                <td class="cart-table__column cart-table__column--total" data-title="Total"
                    id="cart-item-total<?= $item['id'] ?>"
                    total=""><span><?= $item['quantity'] * $item['price'] ?></span> руб.
                </td>
                <td class="cart-table__column cart-table__column--remove">
                  <button type="button" class="cart-table__remove btn btn-sm cart-item-remove btn-icon btn-muted"
                          data-cart-item-id="<?= $item['id'] ?>">
                    <svg width="12" height="12">
                      <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
	c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
	C11.2,9.8,11.2,10.4,10.8,10.8z"/>
                    </svg>
                  </button>
                </td>
              </tr>
            <?php } ?>
            </tbody>
            <?php if (0) { ?>
              <tfoot class="cart-table__foot">
              <tr>
                <td colspan="6">
                  <div class="cart-table__actions">
                    <form class="cart-table__coupon-form form-row">
                      <div class="form-group mb-0 col flex-grow-1">
                        <input type="text" class="form-control form-control-sm" placeholder="">
                      </div>
                      <div class="form-group mb-0 col-auto">
                        <button type="button" class="btn btn-sm btn-primary">Активировать купон</button>
                      </div>
                    </form>
                    <div class="cart-table__update-button">
                      <a class="btn btn-sm btn-primary" href="/products/view">Обновить</a>
                    </div>
                  </div>
                </td>
              </tr>
              </tfoot>
            <?php } ?>
          </table>
        </div>
        <div class="cart__totals">
          <div class="card">
            <div class="card-body card-body--padding--2">
              <h3 class="card-title">Всего в корзине</h3>
              <table class="cart__totals-table">
                <thead>
                <tr>
                  <th>Всего</th>
                  <td class="cart-total">
                    <span><?= $total ?></span> руб.</td>
                </tr>
                </thead>
                <tbody>

                  <tr>
                    <th>Доставка</th>
                    <td>
                      0.00 руб.
                      <?php if (0) { ?>
                      <div>
                        <a href="/products/view">Обновить</a>
                      </div>
                      <?php } ?>
                    </td>

                  </tr>

                <tr>
                  <th>НДС</th>
                  <td>0.00 руб.</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Общее</th>
                  <td class="cart-general"><span><?= $total ?></span> руб.</td>
                </tr>
                </tfoot>
              </table>
              <a class="btn btn-primary btn-xl btn-block" href="/order">
                Перейти к оплате
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  <?php } else { ?>

    <div class="block-space block-space--layout--spaceship-ledge-height"></div>
    <div class="container container--max--xl">
      <div class="card mb-4">
        <div class="card-body card-body--padding--2">
          <div class="row">
            <div class="col-12">
              Корзина пуста
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
</div>
<div class="block-space block-space--layout--before-footer"></div>
