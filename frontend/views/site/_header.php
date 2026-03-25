<?php

use frontend\components\CatalogHeader\CatalogHeaderWidget;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<!-- site__mobile-header -->
<header class="site__mobile-header">
  <div class="mobile-header">
    <div class="container">
      <div class="mobile-header__body">
        <button class="mobile-header__menu-button" type="button">
          <svg width="18px" height="14px">
            <path d="M-0,8L-0,6L18,6L18,8L-0,8ZM-0,-0L18,-0L18,2L-0,2L-0,-0ZM14,14L-0,14L-0,12L14,12L14,14Z"/>
          </svg>
        </button>
        <a class="mobile-header__logo" href="/">
          <!-- mobile-logo -->
          <?php if (0) { ?>
            <svg width="130" height="20">
              <path class="mobile-header__logo-part-one" d="M40,19.9c-0.3,0-0.7,0.1-1,0.1h-4.5c-0.8,0-1.5-0.7-1.5-1.5v-17C33,0.7,33.7,0,34.5,0H39c0.3,0,0.7,0,1,0.1
        c4.5,0.5,8,4.3,8,8.9v2C48,15.6,44.5,19.5,40,19.9z M44,9.5C44,6.7,41.8,4,39,4h-0.8C37.5,4,37,4.5,37,5.2v9.6
        c0,0.7,0.5,1.2,1.2,1.2H39c2.8,0,5-2.7,5-5.5V9.5z M29.5,20h-11c-0.8,0-1.5-0.7-1.5-1.5v-17C17,0.7,17.7,0,18.5,0h11
        C30.3,0,31,0.7,31,1.5v1C31,3.3,30.3,4,29.5,4H21v4h6.5C28.3,8,29,8.7,29,9.5v1c0,0.8-0.7,1.5-1.5,1.5H21v4h8.5
        c0.8,0,1.5,0.7,1.5,1.5v1C31,19.3,30.3,20,29.5,20z M14.8,17.8c0.6,1-0.1,2.3-1.3,2.3h-2L8,14H4v4.5C4,19.3,3.3,20,2.5,20h-1
        C0.7,20,0,19.3,0,18.5v-17C0,0.7,0.7,0,1.5,0H8c0.3,0,0.7,0,1,0.1c3.4,0.5,6,3.4,6,6.9c0,2.4-1.2,4.5-3.1,5.8L14.8,17.8z M9,4.2
        C8.7,4.1,8.3,4,8,4H5C4.4,4,4,4.4,4,5v4c0,0.6,0.4,1,1,1h3c0.3,0,0.7-0.1,1-0.2c0.3-0.1,0.7-0.3,0.9-0.5C10.6,8.8,11,7.9,11,7
        C11,5.7,10.2,4.6,9,4.2z"></path>
              <path class="mobile-header__logo-part-two" d="M128.6,6h-1c-0.5,0-0.9-0.3-1.2-0.7c-0.2-0.3-0.4-0.6-0.8-0.8c-0.5-0.3-1.4-0.5-2.1-0.5c-1.5,0-2.8,0.9-2.8,2
        c0,0.7,0.5,1.3,1.2,1.6c0.8,0.4,1.1,1.3,0.7,2.1l-0.4,0.9c-0.4,0.7-1.2,1-1.8,0.6c-0.6-0.3-1.2-0.7-1.6-1.2c-1-1.1-1.7-2.5-1.7-4
        c0-3.3,2.9-6,6.5-6c2.8,0,5.5,1.7,6.4,4C130.3,4.9,129.6,6,128.6,6z M113.5,4H109v14.5c0,0.8-0.7,1.5-1.5,1.5h-1
        c-0.8,0-1.5-0.7-1.5-1.5V4h-4.5C99.7,4,99,3.3,99,2.5v-1c0-0.8,0.7-1.5,1.5-1.5h13c0.8,0,1.5,0.7,1.5,1.5v1C115,3.3,114.3,4,113.5,4
        z M97.8,17.8c0.6,1-0.1,2.3-1.3,2.3h-2L91,14h-4v4.5c0,0.8-0.7,1.5-1.5,1.5h-1c-0.8,0-1.5-0.7-1.5-1.5v-17C83,0.7,83.7,0,84.5,0H91
        c0.3,0,0.7,0,1,0.1c3.4,0.5,6,3.4,6,6.9c0,2.4-1.2,4.5-3.1,5.8L97.8,17.8z M92,4.2C91.7,4.1,91.3,4,91,4h-3c-0.6,0-1,0.4-1,1v4
        c0,0.6,0.4,1,1,1h3c0.3,0,0.7-0.1,1-0.2c0.3-0.1,0.7-0.3,0.9-0.5C93.6,8.8,94,7.9,94,7C94,5.7,93.2,4.6,92,4.2z M79.5,20h-1.1
        c-0.6,0-1.2-0.4-1.4-1l-1.5-4h-6.1L68,19c-0.2,0.6-0.8,1-1.4,1h-1.1c-1,0-1.8-1-1.4-2l6.2-17c0.2-0.6,0.8-1,1.4-1h1.6
        c0.6,0,1.2,0.4,1.4,1l6.2,17C81.3,19,80.5,20,79.5,20z M72.5,6.6L70.9,11h3.2L72.5,6.6z M58,14h-4v4.5c0,0.8-0.7,1.5-1.5,1.5h-1
        c-0.8,0-1.5-0.7-1.5-1.5v-17C50,0.7,50.7,0,51.5,0H58c3.9,0,7,3.1,7,7S61.9,14,58,14z M61,7c0-1.3-0.8-2.4-2-2.8
        C58.7,4.1,58.3,4,58,4h-3c-0.5,0-1,0.4-1,1v4c0,0.6,0.5,1,1,1h3c0.3,0,0.7-0.1,1-0.2c0.3-0.1,0.7-0.3,0.9-0.5C60.6,8.8,61,7.9,61,7z
         M118.4,14h1c0.5,0,0.9,0.3,1.2,0.7c0.2,0.3,0.4,0.6,0.8,0.8c0.5,0.3,1.4,0.5,2.1,0.5c1.5,0,2.8-0.9,2.8-2c0-0.7-0.5-1.3-1.2-1.6
        c-0.8-0.4-1.1-1.3-0.7-2.1l0.4-0.9c0.4-0.7,1.2-1,1.8-0.6c0.6,0.3,1.2,0.7,1.6,1.2c1,1.1,1.7,2.5,1.7,4c0,3.3-2.9,6-6.5,6
        c-2.8,0-5.5-1.7-6.4-4C116.7,15.1,117.4,14,118.4,14z"></path>
q          <?php } ?>
          <!-- mobile-logo / end -->
        </a>
        <div class="mobile-header__search mobile-search">
          <form class="mobile-search__body" action="/search">
            <input type="text" name="search" class="mobile-search__input"
                   value="<?= Yii::$app->request->queryParams['search'] ?? '' ?>" placeholder="Введите поисковое слово">
            <?php if (0) { ?>

              <button type="button" class="mobile-search__vehicle-picker" aria-label="Select Vehicle">
                <svg width="20" height="20">
                  <path d="M6.6,2c2,0,4.8,0,6.8,0c1,0,2.9,0.8,3.6,2.2C17.7,5.7,17.9,7,18.4,7C20,7,20,8,20,8v1h-1v7.5c0,0.8-0.7,1.5-1.5,1.5h-1
        c-0.8,0-1.5-0.7-1.5-1.5V16H5v0.5C5,17.3,4.3,18,3.5,18h-1C1.7,18,1,17.3,1,16.5V16V9H0V8c0,0,0.1-1,1.6-1C2.1,7,2.3,5.7,3,4.2
        C3.7,2.8,5.6,2,6.6,2z M13.3,4H6.7c-0.8,0-1.4,0-2,0.7c-0.5,0.6-0.8,1.5-1,2C3.6,7.1,3.5,7.9,3.7,8C4.5,8.4,6.1,9,10,9
        c4,0,5.4-0.6,6.3-1c0.2-0.1,0.2-0.8,0-1.2c-0.2-0.4-0.5-1.5-1-2C14.7,4,14.1,4,13.3,4z M4,10c-0.4-0.3-1.5-0.5-2,0
        c-0.4,0.4-0.4,1.6,0,2c0.5,0.5,4,0.4,4,0C6,11.2,4.5,10.3,4,10z M14,12c0,0.4,3.5,0.5,4,0c0.4-0.4,0.4-1.6,0-2c-0.5-0.5-1.3-0.3-2,0
        C15.5,10.2,14,11.3,14,12z"/>
                </svg>
                <span class="mobile-search__vehicle-picker-label">Автомобиль</span>
              </button>
            <?php } ?>
            <button type="submit" class="mobile-search__button mobile-search__button--search">
              <svg width="20" height="20">
                <path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15
        c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8
        c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z"/>
              </svg>
            </button>
            <button type="button" class="mobile-search__button mobile-search__button--close">
              <svg width="20" height="20">
                <path d="M16.7,16.7L16.7,16.7c-0.4,0.4-1,0.4-1.4,0L10,11.4l-5.3,5.3c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L8.6,10L3.3,4.7
        c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L10,8.6l5.3-5.3c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L11.4,10l5.3,5.3
        C17.1,15.7,17.1,16.3,16.7,16.7z"/>
              </svg>
            </button>
            <div class="mobile-search__field"></div>


          </form>
        </div>
        <div class="mobile-header__indicators">
          <div class="mobile-indicator mobile-indicator--search d-md-none">
            <button type="button" class="mobile-indicator__button">
              <span class="mobile-indicator__icon"><svg width="20" height="20">
                      <path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15
c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8
c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z"/>
                  </svg>
              </span>
            </button>
          </div>
          <div class="mobile-indicator d-none d-md-block">
            <a href="/login" class="mobile-indicator__button">
              <span class="mobile-indicator__icon"><svg width="20" height="20">
                      <path d="M20,20h-2c0-4.4-3.6-8-8-8s-8,3.6-8,8H0c0-4.2,2.6-7.8,6.3-9.3C4.9,9.6,4,7.9,4,6c0-3.3,2.7-6,6-6s6,2.7,6,6
  c0,1.9-0.9,3.6-2.3,4.7C17.4,12.2,20,15.8,20,20z M14,6c0-2.2-1.8-4-4-4S6,3.8,6,6s1.8,4,4,4S14,8.2,14,6z"/>
                  </svg>
              </span>
            </a>
          </div>
          <div class="mobile-indicator d-none d-md-block">
            <a href="/wishList" class="mobile-indicator__button">
              <span class="mobile-indicator__icon">
                  <svg width="20" height="20">
                      <path d="M14,3c2.2,0,4,1.8,4,4c0,4-5.2,10-8,10S2,11,2,7c0-2.2,1.8-4,4-4c1,0,1.9,0.4,2.7,1L10,5.2L11.3,4C12.1,3.4,13,3,14,3 M14,1
c-1.5,0-2.9,0.6-4,1.5C8.9,1.6,7.5,1,6,1C2.7,1,0,3.7,0,7c0,5,6,12,10,12s10-7,10-12C20,3.7,17.3,1,14,1L14,1z"/>
                  </svg>
              </span>
            </a>
          </div>
          <div class="mobile-indicator">
            <a href="/cart" class="mobile-indicator__button">
              <span class="mobile-indicator__icon">
                  <svg width="20" height="20">
                      <circle cx="7" cy="17" r="2"/>
                      <circle cx="15" cy="17" r="2"/>
                      <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
  V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
  C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                  </svg>
                  <span class="mobile-indicator__counter">3</span>
              </span>
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</header>
<!-- site__mobile-header / end -->
<!-- site__header -->
<header class="site__header">
  <div class="header">
    <div class="header__megamenu-area megamenu-area"></div>
    <div class="header__topbar-classic-bg"></div>
        <div class="header__topbar-classic">
      <div class="topbar topbar--classic">
        <?php foreach (Yii::$app->pages->display() as $item) { ?>
          <div class="topbar__item-text"><a class="topbar__link" href="<?= $item->url ?>"><?= $item->name ?></a></div>
        <?php } ?>

        <?php if (0) { ?>
          <div class="topbar__item-button">
            <a href="/compare" class="topbar__button">
              <span class="topbar__button-label">Сравнить 111:</span>
              <span class="topbar__button-title">5</span>
            </a>
          </div>
        <?php } ?>

      </div>
          <div class="topbar__item-spring">

            <div class="header__navbar-phone phone">
              <a href="javascript:return void(0)" class="phone__body">
                <div class="phone__title">Звоните нам:</div>
                <div class="phone__number"><?= Yii::$app->params['phone'] ?? '' ?></div>
              </a>
              <a href="https://t.me/Gar_Hov" class="telegramm" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="27px" height="29px"><path fill="#29b6f6" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"/><path fill="#fff" d="M33.95,15l-3.746,19.126c0,0-0.161,0.874-1.245,0.874c-0.576,0-0.873-0.274-0.873-0.274l-8.114-6.733 l-3.97-2.001l-5.095-1.355c0,0-0.907-0.262-0.907-1.012c0-0.625,0.933-0.923,0.933-0.923l21.316-8.468 c-0.001-0.001,0.651-0.235,1.126-0.234C33.667,14,34,14.125,34,14.5C34,14.75,33.95,15,33.95,15z"/><path fill="#b0bec5" d="M23,30.505l-3.426,3.374c0,0-0.149,0.115-0.348,0.12c-0.069,0.002-0.143-0.009-0.219-0.043 l0.964-5.965L23,30.505z"/><path fill="#cfd8dc" d="M29.897,18.196c-0.169-0.22-0.481-0.26-0.701-0.093L16,26c0,0,2.106,5.892,2.427,6.912 c0.322,1.021,0.58,1.045,0.58,1.045l0.964-5.965l9.832-9.096C30.023,18.729,30.064,18.416,29.897,18.196z"/></svg>
              </a>
            </div>
          </div>
    </div>
    <?php if(0) { ?>
    <div class="header__navbar">
      <div class="header__navbar-menu">
        <div class="main-menu">
          <?php if (Yii::$app->params['news']) { ?>
            <ul class="main-menu__list">
              <li class="main-menu__item main-menu__item--submenu--menu">
                <a href="/news" class="main-menu__link">
                  Новости
                </a>
              </li>
            </ul>
          <?php } ?>
        </div>
      </div>

    </div>
    <?php } ?>
    <div class="header__logo">

      <a href="/" class="logo" style="height:50px !important">
        <div class="logo__slogan">
        </div>
        <div class="logo__image">
          <img src="/images/<?= Yii::$app->params['logo']['path']??'' ?>" style="<?= Yii::$app->params['logo']['style'] ?? '' ?>">
        </div>
      </a>

    </div>
    <div class="header__catalog">
      <?php echo CatalogHeaderWidget::widget(); ?>
    </div>
    <div class="header__search">
      <div class="search">
        <form action="/search" class="search__body" method="get">
          <div class="search__shadow"></div>
          <input class="search__input" name="search" type="text"
                 value="<?= Yii::$app->request->queryParams['search'] ?? '' ?>" placeholder="Введите поисковое слово">
          </button>
          <button class="search__button search__button--end" type="submit">
                                <span class="search__button-icon"><svg width="20" height="20">
                                        <path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15
	c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8
	c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z"/>
                                    </svg>
                                </span>
          </button>
          <div class="search__box"></div>
          <div class="search__decor">
            <div class="search__decor-start"></div>
            <div class="search__decor-end"></div>
          </div>
          <?php if (0) { ?>
            <div class="search__dropdown search__dropdown--suggestions suggestions">
              <div class="suggestions__group">
                <div class="suggestions__group-title">Товар</div>
                <div class="suggestions__group-content">
                  <a class="suggestions__item suggestions__product" href="">
                    <div class="suggestions__product-image image image--type--product">
                      <div class="image__body">
                        <img class="image__tag" src="/images/products/product-2-40x40.jpg" alt="">
                      </div>
                    </div>
                    <div class="suggestions__product-info">
                      <div class="suggestions__product-name">Тормозной комплект Brandix BDX-750Z370-S</div>
                      <div class="suggestions__product-rating">
                        <div class="suggestions__product-rating-stars">
                          <div class="rating">
                            <div class="rating__body">
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                            </div>
                          </div>
                        </div>
                        <div class="suggestions__product-rating-label">5 из 22 отзывов</div>
                      </div>
                    </div>
                    <div class="suggestions__product-price">$224.00</div>
                  </a>
                  <a class="suggestions__item suggestions__product" href="/products/view">
                    <div class="suggestions__product-image image image--type--product">
                      <div class="image__body">
                        <img class="image__tag" src="/images/products/product-3-40x40.jpg" alt="">
                      </div>
                    </div>
                    <div class="suggestions__product-info">
                      <div class="suggestions__product-name">Левая фара Brandix Z54</div>
                      <div class="suggestions__product-rating">
                        <div class="suggestions__product-rating-stars">
                          <div class="rating">
                            <div class="rating__body">
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star"></div>
                              <div class="rating__star"></div>
                            </div>
                          </div>
                        </div>
                        <div class="suggestions__product-rating-label">3 из 14 отзывов</div>
                      </div>
                    </div>
                    <div class="suggestions__product-price">$349.00</div>
                  </a>
                  <a class="suggestions__item suggestions__product" href="/products/view">
                    <div class="suggestions__product-image image image--type--product">
                      <div class="image__body">
                        <img class="image__tag" src="/images/products/product-4-40x40.jpg" alt="">
                      </div>
                    </div>
                    <div class="suggestions__product-info">
                      <div class="suggestions__product-name">Глянцево-серый 19-дюймовый алюминиевый диск AR-19</div>
                      <div class="suggestions__product-rating">
                        <div class="suggestions__product-rating-stars">
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
                        <div class="suggestions__product-rating-label">4 on 26 отзывов</div>
                      </div>
                    </div>
                    <div class="suggestions__product-price">$589.00</div>
                  </a>
                </div>
              </div>
              <div class="suggestions__group">
                <div class="suggestions__group-title">Категории</div>
                <div class="suggestions__group-content">
                  <a class="suggestions__item suggestions__category" href="/list">Фары и освещение</a>
                  <a class="suggestions__item suggestions__category" href="/list">Топливная система и фильтры</a>
                  <a class="suggestions__item suggestions__category" href="/list">Аксессуары для интерьера</a>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if (0) { ?>
            <div class="search__dropdown search__dropdown--vehicle-picker vehicle-picker">
              <div class="search__dropdown-arrow"></div>
              <div class="vehicle-picker__panel vehicle-picker__panel--list vehicle-picker__panel--active"
                   data-panel="list">
                <div class="vehicle-picker__panel-body">
                  <div class="vehicle-picker__text">
                    Выберите дополнительные параметры
                  </div>
                  <div class="vehicles-list">
                    <div class="vehicles-list__body">
                      <label class="vehicles-list__item">
                      <span class="vehicles-list__item-radio input-radio">
                          <span class="input-radio__body">
                              <input class="input-radio__input" name="header-vehicle"
                                     type="radio">
                              <span class="input-radio__circle"></span>
                          </span>
                      </span>
                        <span class="vehicles-list__item-info">
                          <span class="vehicles-list__item-name">Параметр 1</span>
                          <span class="vehicles-list__item-details">описание поискового параметра 1</span>
                      </span>
                        <button type="button" class="vehicles-list__item-remove">
                          <svg width="16" height="16">
                            <path d="M2,4V2h3V1h6v1h3v2H2z M13,13c0,1.1-0.9,2-2,2H5c-1.1,0-2-0.9-2-2V5h10V13z"/>
                          </svg>
                        </button>
                      </label>
                      <label class="vehicles-list__item">
                      <span class="vehicles-list__item-radio input-radio">
                          <span class="input-radio__body">
                              <input class="input-radio__input" name="header-vehicle" type="radio">
                              <span class="input-radio__circle"></span>
                          </span>
                      </span>
                        <span class="vehicles-list__item-info">
                          <span class="vehicles-list__item-name">Параметр 2</span>
                          <span class="vehicles-list__item-details">описание поискового параметра 2</span>
                      </span>
                        <button type="button" class="vehicles-list__item-remove">
                          <svg width="16" height="16">
                            <path d="M2,4V2h3V1h6v1h3v2H2z M13,13c0,1.1-0.9,2-2,2H5c-1.1,0-2-0.9-2-2V5h10V13z"/>
                          </svg>
                        </button>
                      </label>
                    </div>
                  </div>
                  <div class="vehicle-picker__actions">
                    <button type="button" class="btn btn-primary btn-sm" data-to-panel="form">Добавить автомобиль
                    </button>
                  </div>
                </div>
              </div>
              <div class="vehicle-picker__panel vehicle-picker__panel--form" data-panel="form">
                <div class="vehicle-picker__panel-body">
                  <div class="vehicle-form vehicle-form--layout--search">
                    <div class="vehicle-form__item vehicle-form__item--select">
                      <select class="form-control form-control-select2" aria-label="Год">
                        <option value="none">Выберите год</option>
                        <option>2010</option>
                        <option>2011</option>
                        <option>2012</option>
                        <option>2013</option>
                        <option>2014</option>
                        <option>2015</option>
                        <option>2016</option>
                        <option>2017</option>
                        <option>2018</option>
                        <option>2019</option>
                        <option>2020</option>
                      </select>
                    </div>
                    <div class="vehicle-form__item vehicle-form__item--select">
                      <select class="form-control form-control-select2" aria-label="Бренд" disabled>
                        <option value="none">Выберите марку</option>
                        <option>Audi</option>
                        <option>BMW</option>
                        <option>Ferrari</option>
                        <option>Ford</option>
                        <option>KIA</option>
                        <option>Nissan</option>
                        <option>Tesla</option>
                        <option>Toyota</option>
                      </select>
                    </div>
                    <div class="vehicle-form__item vehicle-form__item--select">
                      <select class="form-control form-control-select2" aria-label="Модель" disabled>
                        <option value="none">Выбрать модель</option>
                        <option>Explorer</option>
                        <option>Focus S</option>
                        <option>Fusion SE</option>
                        <option>Mustang</option>
                      </select>
                    </div>
                    <div class="vehicle-form__item vehicle-form__item--select">
                      <select class="form-control form-control-select2" aria-label="Двигатель" disabled>
                        <option value="none">Двигатель</option>
                        <option>Gas 1.6L 125 hp AT/L4</option>
                        <option>Diesel 2.5L 200 hp AT/L5</option>
                        <option>Diesel 3.0L 250 hp MT/L5</option>
                      </select>
                    </div>
                    <div class="vehicle-form__divider">Or</div>
                    <div class="vehicle-form__item">
                      <input type="text" class="form-control" placeholder="VIN" aria-label="VIN">
                    </div>
                  </div>
                  <div class="vehicle-picker__actions">
                    <div class="search__car-selector-link">
                      <a href="" data-to-panel="list">Вернуться к списку автомобилей</a>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm" disabled>Добавить автомобиль</button>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </form>
      </div>
    </div>

    <div class="header__indicators">
      <div class="indicator">
        <a href="/favorites" class="indicator__button">
          <span class="indicator__icon">
              <svg width="32" height="32">
                  <path d="M23,4c3.9,0,7,3.1,7,7c0,6.3-11.4,15.9-14,16.9C13.4,26.9,2,17.3,2,11c0-3.9,3.1-7,7-7c2.1,0,4.1,1,5.4,2.6l1.6,2l1.6-2
C18.9,5,20.9,4,23,4 M23,2c-2.8,0-5.4,1.3-7,3.4C14.4,3.3,11.8,2,9,2c-5,0-9,4-9,9c0,8,14,19,16,19s16-11,16-19C32,6,28,2,23,2L23,2
z"/>
              </svg>
            <?php if ($count = Yii::$app->favorites->getTotalCount()) { ?>
              <span class="indicator__counter"><?= $count ?></span>
            <?php } ?>
          </span>
        </a>
      </div>
      <div class="indicator indicator--trigger--click">
        <a href="/account" class="indicator__button">
          <span class="indicator__icon">
              <svg width="32" height="32">
                  <path d="M16,18C9.4,18,4,23.4,4,30H2c0-6.2,4-11.5,9.6-13.3C9.4,15.3,8,12.8,8,10c0-4.4,3.6-8,8-8s8,3.6,8,8c0,2.8-1.5,5.3-3.6,6.7
  C26,18.5,30,23.8,30,30h-2C28,23.4,22.6,18,16,18z M22,10c0-3.3-2.7-6-6-6s-6,2.7-6,6s2.7,6,6,6S22,13.3,22,10z"/>
              </svg>
          </span>
          <?php if (Yii::$app->user->isGuest) { ?>
            <span class="indicator__title">Здравствуйте, авторизуйтесь</span>
          <?php } else { ?>
            <span class="indicator__title">Здравствуйте, <?= Yii::$app->user->identity->email; ?></span>
          <?php } ?>
          <span class="indicator__value">Мой аккаунт</span>
        </a>

        <div class="indicator__content">
          <div class="account-menu">
            <?php if (Yii::$app->user->isGuest) { ?>
              <form class="account-menu__form" action="/login" method="POST" id="form-login">
                <input type="hidden" name="_csrf"
                       value="C3ou4rgP22DzpL2eoaftsW7V_2JPHrHwKvONLegUQKp5FVe9gHWrLYfT3_Hw8MD_Cr_IKTlWx7xnu-9HxSx0xQ==">
                <div class="account-menu__form-title">
                  Авторизоваться
                </div>
                <div class="form-group">
                  <label for="header-signin-email" class="sr-only">Email</label>
                  <input id="header-signin-email" name="LoginForm[email]" type="email"
                         class="form-control form-control-sm" placeholder="">
                </div>
                <div class="form-group">
                  <label for="header-signin-password" class="sr-only">Пароль</label>
                  <div class="account-menu__form-forgot">
                    <input id="header-signin-password" name="LoginForm[password]" type="password"
                           class="form-control form-control-sm" placeholder="">
                    <a href="/restore" class="account-menu__form-forgot-link">Забыли пароль?</a>
                  </div>
                </div>
                <div class="form-group account-menu__form-button">
                  <button type="submit" class="btn btn-primary btn-sm">Войти</button>
                </div>
                <div class="account-menu__form-link">
                  <a href="/register">Завести аккаунт</a>
                </div>
              </form>
            <?php } else { ?>

              <div class="account-menu__divider"></div>
              <a href="" class="account-menu__user">
                <?php if (0) { ?>
                  <div class="account-menu__user-avatar">
                    <img src="/images/avatars/avatar-4.jpg" alt="">
                  </div>
                <?php } ?>
                <div class="account-menu__user-info">
                  <div class="account-menu__user-name">Сергей М.</div>
                  <div class="account-menu__user-email"><?= Yii::$app->user->identity->email ?></div>
                </div>
              </a>
              <div class="account-menu__divider"></div>
              <ul class="account-menu__links">
                <?php if (0) { ?>
                  <li><a href="/account/dashboard"></a></li>
                <?php } ?>
                <li><a href="/account/profile">Мои данные</a></li>
                <li><a href="/account/orders">История заказов</a></li>
                <?php if (0) { ?>
                  <li><a href="/account/password">Изменить пароль</a></li>
                  <li><a href="/account/addresses"> Адреса </a></li>
                <?php } ?>
              </ul>
              <div class="account-menu__divider"></div>
              <ul class="account-menu__links">
                <li><a href="/logout">Выйти</a></li>
              </ul>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="indicator ">
        <a href="/cart" class="indicator__button">
                        <span class="indicator__icon">
                            <svg width="32" height="32">
                                <circle cx="10.5" cy="27.5" r="2.5"/>
                                <circle cx="23.5" cy="27.5" r="2.5"/>
                                <path d="M26.4,21H11.2C10,21,9,20.2,8.8,19.1L5.4,4.8C5.3,4.3,4.9,4,4.4,4H1C0.4,4,0,3.6,0,3s0.4-1,1-1h3.4C5.8,2,7,3,7.3,4.3
l3.4,14.3c0.1,0.2,0.3,0.4,0.5,0.4h15.2c0.2,0,0.4-0.1,0.5-0.4l3.1-10c0.1-0.2,0-0.4-0.1-0.4C29.8,8.1,29.7,8,29.5,8H14
c-0.6,0-1-0.4-1-1s0.4-1,1-1h15.5c0.8,0,1.5,0.4,2,1c0.5,0.6,0.6,1.5,0.4,2.2l-3.1,10C28.5,20.3,27.5,21,26.4,21z"/>
                            </svg>
                            <span class="indicator__counter"><?= Yii::$app->cart->getTotalCount() ?></span>
                        </span>
          <span class="indicator__title">Корзина</span>
          <span class="indicator__value" id="cartItemTotalCount"><span><?= Yii::$app->cart->getTotalCost() ?></span> руб.</span>
        </a>

        <div class="indicator__content">
          <div class="dropcart">
            <ul class="dropcart__list">
              <!--              --><?php //foreach (Yii::$app->cart->getItems() as $item) {
              //
              //                $files = $item->getProduct()->getFiles()->asArray()->all();
              //
              //                ?>
              <!--                <li class="dropcart__item">-->
              <!--                  <div class="dropcart__item-image image image--type--product">-->
              <!--                    <a class="image__body" href="/products/--><? //= $item->getId() ?><!--">-->
              <!--                      <img class="image__tag" src="-->
              <? //= $files[0]['original'] ?? '' ?><!--" alt="">-->
              <!--                    </a>-->
              <!--                  </div>-->
              <!--                  <div class="dropcart__item-info">-->
              <!--                    <div class="dropcart__item-name">-->
              <!--                      <a href="/products/--><? //= $item->getId() ?><!--">-->
              <? //= $item->getProduct()->name ?><!--</a>-->
              <!--                    </div>-->
              <!--                    --><?php //if (0) { ?>
              <!--                      <ul class="dropcart__item-features">-->
              <!--                        <li>Цвет: желтый</li>-->
              <!--                        <li>Материал: алюминий</li>-->
              <!--                      </ul>-->
              <!--                    --><?php //} ?>
              <!--                    <div class="dropcart__item-meta">-->
              <!--                      <div class="dropcart__item-quantity">-->
              <? //= $item->getQuantity() ?><!--</div>-->
              <!--                      <div class="dropcart__item-price" id="cartTotalPopup"><span>-->
              <? //= $item->getPrice() ?><!--</span> руб.-->
              <!--                      </div>-->
              <!--                    </div>-->
              <!--                  </div>-->
              <!--                  <button type="button" class="dropcart__item-remove">-->
              <!--                    <svg width="10" height="10">-->
              <!--                      <path d="M8.8,8.8L8.8,8.8c-0.4,0.4-1,0.4-1.4,0L5,6.4L2.6,8.8c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L3.6,5L1.2,2.6-->
              <!--	c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L5,3.6l2.4-2.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L6.4,5l2.4,2.4-->
              <!--	C9.2,7.8,9.2,8.4,8.8,8.8z"/>-->
              <!--                    </svg>-->
              <!--                  </button>-->
              <!--                </li>-->
              <!--                <li class="dropcart__divider" role="presentation"></li>-->
              <!--              --><?php //} ?>
            </ul>
            <div class="dropcart__totals">
              <table>
                <tr>
                  <th>Итого</th>
                  <td><span><?= Yii::$app->cart->getTotalCost() ?></span> руб.</td>
                </tr>
                <?php if (0) { ?>
                  <tr>
                    <th>Доставка</th>
                    <td>$25.00</td>
                  </tr>
                  <tr>
                    <th>НДС</th>
                    <td>$0.00</td>
                  </tr>
                  <tr>
                    <th>Итого</th>
                    <td>$5902.00</td>
                  </tr>
                <?php } ?>
              </table>
            </div>
            <div class="dropcart__actions">
              <a href="/cart" class="btn btn-secondary">Корзина</a>
              <a href="/checkout" class="btn btn-primary" disabled="disabled">Перейти к оплате</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- site__header / end -->
<!-- site__body -->
