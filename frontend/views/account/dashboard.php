<?php

use frontend\components\BreadCrumbsWidget;


?>

<div class="block-header block-header--has-breadcrumb block-header--has-title">
  <div class="container">
    <div class="block-header__body">

      <?= BreadCrumbsWidget::widget(['breadCrumbs' => [
        [
          'url' => '/account',
          'name' => 'Аккаунт',
        ]
      ]]) ?>
      <h1 class="block-header__title">Аккаунт</h1>
    </div>
  </div>
</div>
<div class="block">
  <div class="container container--max--xl">
    <div class="row">
      <div class="col-12 col-lg-3 d-flex">
        <?php include_once(Yii::getAlias('@frontend/views/account/_navigation.php')); ?>
      </div>
      <div class="col-12 col-lg-9 mt-4 mt-lg-0">
        <div class="dashboard">
          <div class="dashboard__profile card profile-card">
            <div class="card-body profile-card__body">
              <div class="profile-card__avatar">
                <img src="/images/avatars/avatar-4.jpg" alt="">
              </div>
              <div class="profile-card__name">Сергей М.</div>
              <div class="profile-card__email">work@smezentsev.ru</div>
              <div class="profile-card__edit">
                <a href="/profile" class="btn btn-secondary btn-sm">Редактировать профиль</a>
              </div>
            </div>
          </div>
          <div class="dashboard__address card address-card address-card--featured">
            <?php if(0) { ?>
            <div class="address-card__badge tag-badge tag-badge--theme">По умолчанию</div>
            <?php } ?>
            <div class="address-card__body">
              <div class="address-card__name">Сергей</div>
              <div class="address-card__row">
                Россия<br>
                115302, Москва<br>
                ул. Почтовая, 3
              </div>
              <div class="address-card__row">
                <div class="address-card__row-title">Телефон</div>
                <div class="address-card__row-content">+7 (495) 146-43-00</div>
              </div>
              <div class="address-card__row">
                <div class="address-card__row-title">Email</div>
                <div class="address-card__row-content"work@smezentsev.ru</div>
              </div>
              <div class="address-card__footer">
                <a href="/addresses">Редактировать адрес</a>
              </div>
            </div>
          </div>
          <?php if(0) { ?>
          <div class="dashboard__orders card">
            <div class="card-header">
              <h5>Последние заказы</h5>
            </div>
            <div class="card-divider"></div>
            <div class="card-table">
              <div class="table-responsive-sm">
                <table>
                  <thead>
                  <tr>
                    <th>№ заказа</th>
                    <th>Дата</th>
                    <th>Статус</th>
                    <th>Итого</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><a href="#">#8132</a></td>
                    <td>02 Апреля, 2020</td>
                    <td>В обработке</td>
                    <td>$2,719.00 за 5 товара</td>
                  </tr>
                  <tr>
                    <td><a href="#">#7592</a></td>
                    <td>28 Марта, 2020</td>
                    <td>В обработке</td>
                    <td>$374.00 за 3 товара</td>
                  </tr>
                  <tr>
                    <td><a href="#">#7192</a></td>
                    <td>15 Марта, 2020</td>
                    <td>в службе доставке</td>
                    <td>$791.00 за 4 товара</td>
                  </tr>
                  </tbody>
                </table>
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
