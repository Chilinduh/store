<div class="block-space block-space--layout--after-header"></div>
<div class="block">
  <div class="container container--max--xl">
    <div class="row">
      <div class="col-12 col-lg-3 d-flex">
        <?php include_once(Yii::getAlias('@frontend/views/account/_navigation.php')); ?>
      </div>
      <div class="col-12 col-lg-9 mt-4 mt-lg-0">
        <div class="card">
          <div class="order-header">
            <div class="order-header__actions">
              <a href="/account/orders" class="btn btn-xs btn-secondary">К списку заказов</a>
            </div>
            <h5 class="order-header__title">Заказ #<?= $order->id ?></h5>
            <div class="order-header__subtitle">
              Был размещен
              <mark><?= $order->created_at ?></mark>
            </div>
          </div>
          <div class="card-divider"></div>
          <div class="card-table">
            <div class="table-responsive-sm">
              <table>
                <thead>
                <tr>
                  <th>Наименование</th>
                  <th>Сумма</th>
                </tr>
                </thead>
                <tbody class="card-table__body card-table__body--merge-rows">

                <?php

                  $total = 0;
                  foreach ($orderItems as $item) {

                  $product = $item->getProduct()->one();
                  $price = $item->quantity * $product->price;
                  $total += $price;

                  ?>

                  <tr>
                    <td><?= $item->quantity ?> * <?= $product->name ?></td>
                    <td><?= $price ?></td>
                  </tr>
                <?php } ?>

                </tbody>
                <tbody class="card-table__body card-table__body--merge-rows">

                </tbody>
                <tfoot>
                <tr>
                  <th>Итого</th>
                  <td><?= $total ?> руб.</td>
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        <div class="row mt-3 no-gutters mx-n2">
          <div class="col-sm-6 col-12 px-2">
            <div class="card address-card address-card--featured">
              <div class="address-card__badge tag-badge tag-badge--theme">
                Адрес доставки
              </div>
              <div class="address-card__body">
                <div class="address-card__name"><?= $profile->first_name??'' ?> <?= $profile->last_name??'' ?></div>
                <div class="address-card__row">
                  <?= $profile->country??'' ?><br>
                  <?= $profile->city??'' ?><br>
                  <?= $profile->address??'' ?>
                </div>
                <div class="address-card__row">
                  <div class="address-card__row-title">Телефон</div>
                  <div class="address-card__row-content"><?= $profile->phone??'' ?></div>
                </div>
                <?php if(0) { ?>
                <div class="address-card__row">
                  <div class="address-card__row-title">Email</div>
                  <div class="address-card__row-content"><?= $profile->phone??'' ?></div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
          <?php if(0) { ?>
          <div class="col-sm-6 col-12 px-2 mt-sm-0 mt-3">
            <div class="card address-card address-card--featured">
              <div class="address-card__badge tag-badge tag-badge--theme">
                Адрес для выставления счета
              </div>
              <div class="address-card__body">
                <div class="address-card__name">Сергей М.</div>
                <div class="address-card__row">
                  Россия<br>
                  115302, Москва<br>
                  ул. Ленина, 15
                </div>
                <div class="address-card__row">
                  <div class="address-card__row-title">Телефон</div>
                  <div class="address-card__row-content"><?= Yii::$app->params['phone']??''?></div>
                </div>
                <div class="address-card__row">
                  <div class="address-card__row-title">Email</div>
                  <div class="address-card__row-content">work@smezentsev.ru</div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="block-space block-space--layout--before-footer"></div>
