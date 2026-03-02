<?php

use app\components\SliderWidget;
use app\components\ItemsWidget;
use app\components\ProductItemsWidget;

/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>

<?//=  $this->render('section', ['products' => $products, 'model' => $model]); ?>
<div class="block-header block-header--has-breadcrumb block-header--has-title">
  <div class="container">
    <div class="block-header__body">

      <?php include_once(Yii::getAlias('@frontend/views/site/breadcrumb.php')); ?>

      <?php if(0) { ?>
      <h1 class="block-header__title">Tires & Wheels</h1>
      <?php } ?>
    </div>
  </div>
</div>
<div class="block block-split block-split--has-sidebar">
  <div class="container">
    <div class="block-split__row row no-gutters">
      <div class="block-split__item block-split__item-sidebar col-auto">
        <div class="card widget widget-categories-list">
          <div class="widget-categories-list__body" data-collapse data-collapse-opened-class="widget-categories-list--open">
            <ul class="widget-categories-list__root">
              <li class="widget-categories-list__root-item widget-categories-list__root-item--has-children" data-collapse-item>
                <a href="" class="widget-categories-list__root-link">Фары и освещение</a>
                <ul class="widget-categories-list__child">
                  <li class="widget-categories-list__child-item">
                    <a href="/list" class="widget-categories-list__child-link">Поворотники</a>
                  </li>
                  <li class="widget-categories-list__child-item">
                    <a href="/list" class="widget-categories-list__child-link">Противотуманные огни</a>
                  </li>
                  <li class="widget-categories-list__child-item">
                    <a href="/list" class="widget-categories-list__child-link">Фары</a>
                  </li>
                  <li class="widget-categories-list__child-item">
                    <a href="/list" class="widget-categories-list__child-link">Переключатели и реле</a>
                  </li>
                  <li class="widget-categories-list__child-item">
                    <a href="/list" class="widget-categories-list__child-link">Задние фонари</a>
                  </li>
                </ul>
                <ul class="widget-categories-list__child" data-collapse-content>
                  <li class="widget-categories-list__child-item">
                    <a href="/list" class="widget-categories-list__child-link">Угловые светильники</a>
                  </li>
                  <li class="widget-categories-list__child-item">
                    <a href="/list" class="widget-categories-list__child-link">Внедорожное освещение</a>
                  </li>
                  <li class="widget-categories-list__child-item">
                    <a href="/list" class="widget-categories-list__child-link">Осветительные аксессуары</a>
                  </li>
                </ul>
                <button type="button" class="widget-categories-list__show-more" data-collapse-trigger>
                  <span class="widget-categories-list__show-more-expand-text">Показать все</span>
                  <span class="widget-categories-list__show-more-collapse-text">Скрыть</span>
                  <span class="widget-categories-list__show-more-arrow">
                    <svg width="9" height="6">
                          <path d="M0.2,0.4c0.4-0.4,1-0.5,1.4-0.1l2.9,3l2.9-3c0.4-0.4,1.1-0.4,1.4,0.1c0.3,0.4,0.3,0.9-0.1,1.3L4.5,6L0.3,1.6C-0.1,1.3-0.1,0.7,0.2,0.4z" />
                      </svg>
                  </span>
                </button>
              </li>
              <li class="widget-categories-list__root-item widget-categories-list__root-item--has-children" data-collapse-item>
                <a href="/" class="widget-categories-list__root-link">Детали интерьера</a>
                <ul class="widget-categories-list__child">
                  <li class="widget-categories-list__child-item">
                    <a href="" class="widget-categories-list__child-link">Коврики</a>
                  </li>
                  <li class="widget-categories-list__child-item">
                    <a href="" class="widget-categories-list__child-link">Манометры</a>
                  </li>
                  <li class="widget-categories-list__child-item">
                    <a href="" class="widget-categories-list__child-link">Консоли и Органайзеры</a>
                  </li>
                  <li class="widget-categories-list__child-item">
                    <a href="" class="widget-categories-list__child-link">Мобильная электроника</a>
                  </li>
                  <li class="widget-categories-list__child-item">
                    <a href="" class="widget-categories-list__child-link">Рулевые колеса</a>
                  </li>
                  <li class="widget-categories-list__child-item">
                    <a href="" class="widget-categories-list__child-link">Грузовые аксессуары</a>
                  </li>
                </ul>
              </li>
              <li class="widget-categories-list__root-item widget-categories-list__root-item--has-children" data-collapse-item>
                <a href="" class="widget-categories-list__root-link">Двигатель и трансмиссия</a>
                <ul class="widget-categories-list__child">
                  <li class="widget-categories-list__child-item">
                    <a href="" class="widget-categories-list__child-link">Воздушные фильтры</a>
                  </li>
                  <li class="widget-categories-list__child-item">
                    <a href="" class="widget-categories-list__child-link">Датчики кислорода</a>
                  </li>
                  <li class="widget-categories-list__child-item">
                    <a href="" class="widget-categories-list__child-link">Обогрев</a>
                  </li>
                  <li class="widget-categories-list__child-item">
                    <a href="" class="widget-categories-list__child-link">Выхлоп</a>
                  </li>
                  <li class="widget-categories-list__child-item">
                    <a href="" class="widget-categories-list__child-link">Шатуны и поршни</a>
                  </li>
                </ul>
              </li>
              <li class="widget-categories-list__root-item" data-collapse-item>
                <a href="" class="widget-categories-list__root-link">Руководства по ремонту</a>
              </li>
              <li class="widget-categories-list__root-item" data-collapse-item>
                <a href="" class="widget-categories-list__root-link">Подвеска</a>
              </li>
              <li class="widget-categories-list__root-item" data-collapse-item>
                <a href="" class="widget-categories-list__root-link">Топливные системы</a>
              </li>
              <li class="widget-categories-list__root-item" data-collapse-item>
                <a href="" class="widget-categories-list__root-link">Воздушные фильтры</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="card widget widget-products">
          <div class="widget__header">
            <h4>Новые товары</h4>
          </div>
          <div class="widget-products__list">
            <div class="widget-products__item">
              <div class="widget-products__image image image--type--product">
                <a href="/products/view" class="image__body">
                  <img class="image__tag" src="/images/products/product-1-64x64.jpg" alt="">
                </a>
              </div>
              <div class="widget-products__info">
                <div class="widget-products__name">
                  <a href="/products/view">Комплект свечей зажигания Brandix ASR-400</a>
                </div>
                <div class="widget-products__prices">
                  <div class="widget-products__price widget-products__price--current">$19.00</div>
                </div>
              </div>
            </div>
            <div class="widget-products__item">
              <div class="widget-products__image image image--type--product">
                <a href="/products/view" class="image__body">
                  <img class="image__tag" src="/images/products/product-2-64x64.jpg" alt="">
                </a>
              </div>
              <div class="widget-products__info">
                <div class="widget-products__name">
                  <a href="/products/view">Тормозной комплект Brandix BDX-750Z370-S</a>
                </div>
                <div class="widget-products__prices">
                  <div class="widget-products__price widget-products__price--current">$224.00</div>
                </div>
              </div>
            </div>
            <div class="widget-products__item">
              <div class="widget-products__image image image--type--product">
                <a href="/products/view" class="image__body">
                  <img class="image__tag" src="/images/products/product-3-64x64.jpg" alt="">
                </a>
              </div>
              <div class="widget-products__info">
                <div class="widget-products__name">
                  <a href="/products/view">Левая фара Brandix Z54</a>
                </div>
                <div class="widget-products__prices">
                  <div class="widget-products__price widget-products__price--new">$349.00</div>
                  <div class="widget-products__price widget-products__price--old">$415.00</div>
                </div>
              </div>
            </div>
            <div class="widget-products__item">
              <div class="widget-products__image image image--type--product">
                <a href="/products/view" class="image__body">
                  <img class="image__tag" src="/images/products/product-4-64x64.jpg" alt="">
                </a>
              </div>
              <div class="widget-products__info">
                <div class="widget-products__name">
                  <a href="/products/view">Глянцево-серый 19-дюймовый алюминиевый диск</a>
                </div>
                <div class="widget-products__prices">
                  <div class="widget-products__price widget-products__price--current">$589.00</div>
                </div>
              </div>
            </div>
            <div class="widget-products__item">
              <div class="widget-products__image image image--type--product">
                <a href="/products/view" class="image__body">
                  <img class="image__tag" src="/images/products/product-5-64x64.jpg" alt="">
                </a>
              </div>
              <div class="widget-products__info">
                <div class="widget-products__name">
                  <a href="/products/view">Двойная выхлопная труба от Brandix Z54</a>
                </div>
                <div class="widget-products__prices">
                  <div class="widget-products__price widget-products__price--current">$749.00</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="block-split__item block-split__item-content col-auto">
        <div class="block">
          <div class="categories-list categories-list--layout--columns-4-sidebar">
            <ul class="categories-list__body">
              <li class="categories-list__item">
                <a href="/list">
                  <div class="image image--type--category">
                    <div class="image__body">
                      <img class="image__tag" src="images/categories/category-1-200x200.jpg" alt="">
                    </div>
                  </div>
                  <div class="categories-list__item-name">Фары и освещение</div>
                </a>
                <div class="categories-list__item-products">131 Products</div>
              </li>
              <li class="categories-list__divider"></li>
              <li class="categories-list__item">
                <a href="/list">
                  <div class="image image--type--category">
                    <div class="image__body">
                      <img class="image__tag" src="images/categories/category-2-200x200.jpg" alt="">
                    </div>
                  </div>
                  <div class="categories-list__item-name">Топливная система и фильтры</div>
                </a>
                <div class="categories-list__item-products">356 Products</div>
              </li>
              <li class="categories-list__divider"></li>
              <li class="categories-list__item">
                <a href="/list">
                  <div class="image image--type--category">
                    <div class="image__body">
                      <img class="image__tag" src="images/categories/category-3-200x200.jpg" alt="">
                    </div>
                  </div>
                  <div class="categories-list__item-name">Детали кузова и зеркала</div>
                </a>
                <div class="categories-list__item-products">54 Products</div>
              </li>
              <li class="categories-list__divider"></li>
              <li class="categories-list__item">
                <a href="/list">
                  <div class="image image--type--category">
                    <div class="image__body">
                      <img class="image__tag" src="images/categories/category-4-200x200.jpg" alt="">
                    </div>
                  </div>
                  <div class="categories-list__item-name">Аксессуары для интерьера</div>
                </a>
                <div class="categories-list__item-products">274 Products</div>
              </li>
              <li class="categories-list__divider"></li>
              <li class="categories-list__item">
                <a href="/list">
                  <div class="image image--type--category">
                    <div class="image__body">
                      <img class="image__tag" src="images/categories/category-5-200x200.jpg" alt="">
                    </div>
                  </div>
                  <div class="categories-list__item-name">Шины и диски</div>
                </a>
                <div class="categories-list__item-products">508 Products</div>
              </li>
              <li class="categories-list__divider"></li>
              <li class="categories-list__item">
                <a href="/list">
                  <div class="image image--type--category">
                    <div class="image__body">
                      <img class="image__tag" src="images/categories/category-6-200x200.jpg" alt="">
                    </div>
                  </div>
                  <div class="categories-list__item-name">Двигатель и трансмиссия</div>
                </a>
                <div class="categories-list__item-products">95 Products</div>
              </li>
              <li class="categories-list__divider"></li>
              <li class="categories-list__item">
                <a href="/list">
                  <div class="image image--type--category">
                    <div class="image__body">
                      <img class="image__tag" src="images/categories/category-7-200x200.jpg" alt="">
                    </div>
                  </div>
                  <div class="categories-list__item-name">Масла и смазки</div>
                </a>
                <div class="categories-list__item-products">179 Products</div>
              </li>
              <li class="categories-list__divider"></li>
              <li class="categories-list__item">
                <a href="/list">
                  <div class="image image--type--category">
                    <div class="image__body">
                      <img class="image__tag" src="images/categories/category-8-200x200.jpg" alt="">
                    </div>
                  </div>
                  <div class="categories-list__item-name">Инструменты и гараж</div>
                </a>
                <div class="categories-list__item-products">106 Products</div>
              </li>
              <li class="categories-list__divider"></li>
            </ul>
          </div>
        </div>
        <div class="block-space block-space--layout--divider-nl"></div>
        <div class="block block-products-carousel" data-layout="grid-4-sidebar">
          <div class="container">
            <div class="section-header">
              <div class="section-header__body">
                <h2 class="section-header__title">Хиты продаж</h2>
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
                        <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z" />
                      </svg>
                    </button>
                  </div>
                </div>
                <div class="section-header__divider"></div>
              </div>
            </div>
            <div class="block-products-carousel__carousel">
              <div class="block-products-carousel__carousel-loader"></div>
              <div class="owl-carousel">
                <div class="block-products-carousel__column">
                  <div class="block-products-carousel__cell">
                    <div class="product-card product-card--layout--grid">
                      <div class="product-card__actions-list">
                        <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                          <svg width="16" height="16">
                            <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" />
                          </svg>
                        </button>
                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list">
                          <svg width="16" height="16">
                            <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" />
                          </svg>
                        </button>
                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare">
                          <svg width="16" height="16">
                            <path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z" />
                            <path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z" />
                            <path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z" />
                          </svg>
                        </button>
                      </div>
                      <div class="product-card__image">
                        <div class="image image--type--product">
                          <a href="/products/view" class="image__body">
                            <img class="image__tag" src="/images/products/product-1-245x245.jpg" alt="">
                          </a>
                        </div>
                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                          <div class="status-badge__body">
                            <div class="status-badge__icon"><svg width="13" height="13">
                                <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z" />
                              </svg>
                            </div>
                            <div class="status-badge__text">Деталь для 2011 Ford Focus S</div>
                            <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                          </div>
                        </div>
                      </div>
                      <div class="product-card__info">
                        <div class="product-card__meta"><span class="product-card__meta-title">Артикул:</span> 140-10440-B</div>
                        <div class="product-card__name">
                          <div>
                            <div class="product-card__badges">
                              <div class="tag-badge tag-badge--sale">распродажа</div>
                              <div class="tag-badge tag-badge--new">новое</div>
                              <div class="tag-badge tag-badge--hot">хит продаж</div>
                            </div>
                            <a href="/products/view">Комплект свечей зажигания Brandix ASR-400</a>
                          </div>
                        </div>
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
                          <div class="product-card__rating-label">4 по 3 отзывов</div>
                        </div>
                      </div>
                      <div class="product-card__footer">
                        <div class="product-card__prices">
                          <div class="product-card__price product-card__price--current">$19.00</div>
                        </div>
                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart">
                          <svg width="20" height="20">
                            <circle cx="7" cy="17" r="2" />
                            <circle cx="15" cy="17" r="2" />
                            <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" />
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-products-carousel__column">
                  <div class="block-products-carousel__cell">
                    <div class="product-card product-card--layout--grid">
                      <div class="product-card__actions-list">
                        <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                          <svg width="16" height="16">
                            <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" />
                          </svg>
                        </button>
                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list">
                          <svg width="16" height="16">
                            <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" />
                          </svg>
                        </button>
                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare">
                          <svg width="16" height="16">
                            <path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z" />
                            <path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z" />
                            <path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z" />
                          </svg>
                        </button>
                      </div>
                      <div class="product-card__image">
                        <div class="image image--type--product">
                          <a href="/products/view" class="image__body">
                            <img class="image__tag" src="/images/products/product-2-245x245.jpg" alt="">
                          </a>
                        </div>
                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                          <div class="status-badge__body">
                            <div class="status-badge__icon"><svg width="13" height="13">
                                <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z" />
                              </svg>
                            </div>
                            <div class="status-badge__text">Деталь для 2011 Ford Focus S</div>
                            <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                          </div>
                        </div>
                      </div>
                      <div class="product-card__info">
                        <div class="product-card__meta"><span class="product-card__meta-title">Артикул:</span> 573-23743-C</div>
                        <div class="product-card__name">
                          <div>
                            <a href="/products/view">Тормозной комплект Brandix BDX-750Z370-S</a>
                          </div>
                        </div>
                        <div class="product-card__rating">
                          <div class="rating product-card__rating-stars">
                            <div class="rating__body">
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                            </div>
                          </div>
                          <div class="product-card__rating-label">5 по 22 отзывов</div>
                        </div>
                      </div>
                      <div class="product-card__footer">
                        <div class="product-card__prices">
                          <div class="product-card__price product-card__price--current">$224.00</div>
                        </div>
                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart">
                          <svg width="20" height="20">
                            <circle cx="7" cy="17" r="2" />
                            <circle cx="15" cy="17" r="2" />
                            <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" />
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-products-carousel__column">
                  <div class="block-products-carousel__cell">
                    <div class="product-card product-card--layout--grid">
                      <div class="product-card__actions-list">
                        <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                          <svg width="16" height="16">
                            <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" />
                          </svg>
                        </button>
                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list">
                          <svg width="16" height="16">
                            <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" />
                          </svg>
                        </button>
                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare">
                          <svg width="16" height="16">
                            <path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z" />
                            <path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z" />
                            <path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z" />
                          </svg>
                        </button>
                      </div>
                      <div class="product-card__image">
                        <div class="image image--type--product">
                          <a href="/products/view" class="image__body">
                            <img class="image__tag" src="/images/products/product-3-245x245.jpg" alt="">
                          </a>
                        </div>
                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                          <div class="status-badge__body">
                            <div class="status-badge__icon"><svg width="13" height="13">
                                <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z" />
                              </svg>
                            </div>
                            <div class="status-badge__text">Деталь подходит для 2011 Ford Focus S</div>
                            <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                          </div>
                        </div>
                      </div>
                      <div class="product-card__info">
                        <div class="product-card__meta"><span class="product-card__meta-title">Артикул:</span> 009-50078-Z</div>
                        <div class="product-card__name">
                          <div>
                            <div class="product-card__badges">
                              <div class="tag-badge tag-badge--sale">распродажа</div>
                            </div>
                            <a href="/products/view">Левая фара Brandix Z54                            </a>
                          </div>
                        </div>
                        <div class="product-card__rating">
                          <div class="rating product-card__rating-stars">
                            <div class="rating__body">
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star"></div>
                              <div class="rating__star"></div>
                            </div>
                          </div>
                          <div class="product-card__rating-label">3 по 14 отзывов</div>
                        </div>
                      </div>
                      <div class="product-card__footer">
                        <div class="product-card__prices">
                          <div class="product-card__price product-card__price--new">$349.00</div>
                          <div class="product-card__price product-card__price--old">$415.00</div>
                        </div>
                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart">
                          <svg width="20" height="20">
                            <circle cx="7" cy="17" r="2" />
                            <circle cx="15" cy="17" r="2" />
                            <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" />
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-products-carousel__column">
                  <div class="block-products-carousel__cell">
                    <div class="product-card product-card--layout--grid">
                      <div class="product-card__actions-list">
                        <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                          <svg width="16" height="16">
                            <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" />
                          </svg>
                        </button>
                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list">
                          <svg width="16" height="16">
                            <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" />
                          </svg>
                        </button>
                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare">
                          <svg width="16" height="16">
                            <path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z" />
                            <path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z" />
                            <path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z" />
                          </svg>
                        </button>
                      </div>
                      <div class="product-card__image">
                        <div class="image image--type--product">
                          <a href="/products/view" class="image__body">
                            <img class="image__tag" src="/images/products/product-4-245x245.jpg" alt="">
                          </a>
                        </div>
                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                          <div class="status-badge__body">
                            <div class="status-badge__icon"><svg width="13" height="13">
                                <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z" />
                              </svg>
                            </div>
                            <div class="status-badge__text">Деталь подходит для 2011 Ford Focus S
                            </div>
                            <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                          </div>
                        </div>
                      </div>
                      <div class="product-card__info">
                        <div class="product-card__meta"><span class="product-card__meta-title">Артикул:</span> A43-44328-B</div>
                        <div class="product-card__name">
                          <div>
                            <div class="product-card__badges">
                              <div class="tag-badge tag-badge--hot">хит продаж</div>
                            </div>
                            <a href="/products/view">Глянцево-серый 19-дюймовый алюминиевый диск AR-19</a>
                          </div>
                        </div>
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
                          <div class="product-card__rating-label">4 по 26 отзывов</div>
                        </div>
                      </div>
                      <div class="product-card__footer">
                        <div class="product-card__prices">
                          <div class="product-card__price product-card__price--current">$589.00</div>
                        </div>
                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart">
                          <svg width="20" height="20">
                            <circle cx="7" cy="17" r="2" />
                            <circle cx="15" cy="17" r="2" />
                            <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" />
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-products-carousel__column">
                  <div class="block-products-carousel__cell">
                    <div class="product-card product-card--layout--grid">
                      <div class="product-card__actions-list">
                        <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                          <svg width="16" height="16">
                            <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" />
                          </svg>
                        </button>
                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list">
                          <svg width="16" height="16">
                            <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" />
                          </svg>
                        </button>
                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare">
                          <svg width="16" height="16">
                            <path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z" />
                            <path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z" />
                            <path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z" />
                          </svg>
                        </button>
                      </div>
                      <div class="product-card__image">
                        <div class="image image--type--product">
                          <a href="/products/view" class="image__body">
                            <img class="image__tag" src="/images/products/product-5-245x245.jpg" alt="">
                          </a>
                        </div>
                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                          <div class="status-badge__body">
                            <div class="status-badge__icon"><svg width="13" height="13">
                                <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z" />
                              </svg>
                            </div>
                            <div class="status-badge__text">Деталь подходит для 2011 Ford Focus S</div>
                            <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                          </div>
                        </div>
                      </div>
                      <div class="product-card__info">
                        <div class="product-card__meta"><span class="product-card__meta-title">Артикул:</span> 729-51203-B</div>
                        <div class="product-card__name">
                          <div>
                            <a href="/products/view">Двойная выхлопная труба от Brandix Z54</a>
                          </div>
                        </div>
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
                          <div class="product-card__rating-label">4 по 9 отзывов</div>
                        </div>
                      </div>
                      <div class="product-card__footer">
                        <div class="product-card__prices">
                          <div class="product-card__price product-card__price--current">$749.00</div>
                        </div>
                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart">
                          <svg width="20" height="20">
                            <circle cx="7" cy="17" r="2" />
                            <circle cx="15" cy="17" r="2" />
                            <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" />
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-products-carousel__column">
                  <div class="block-products-carousel__cell">
                    <div class="product-card product-card--layout--grid">
                      <div class="product-card__actions-list">
                        <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                          <svg width="16" height="16">
                            <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" />
                          </svg>
                        </button>
                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list">
                          <svg width="16" height="16">
                            <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" />
                          </svg>
                        </button>
                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare">
                          <svg width="16" height="16">
                            <path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z" />
                            <path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z" />
                            <path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z" />
                          </svg>
                        </button>
                      </div>
                      <div class="product-card__image">
                        <div class="image image--type--product">
                          <a href="/products/view" class="image__body">
                            <img class="image__tag" src="/images/products/product-6-245x245.jpg" alt="">
                          </a>
                        </div>
                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                          <div class="status-badge__body">
                            <div class="status-badge__icon"><svg width="13" height="13">
                                <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z" />
                              </svg>
                            </div>
                            <div class="status-badge__text">Деталь подходит для 2011 Ford Focus S</div>
                            <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                          </div>
                        </div>
                      </div>
                      <div class="product-card__info">
                        <div class="product-card__meta"><span class="product-card__meta-title">Артикул:</span> 573-49386-C</div>
                        <div class="product-card__name">
                          <div>
                            <a href="/products/view">Моторное масло 5-го уровня</a>
                          </div>
                        </div>
                        <div class="product-card__rating">
                          <div class="rating product-card__rating-stars">
                            <div class="rating__body">
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                            </div>
                          </div>
                          <div class="product-card__rating-label">5 по 2 отзвов</div>
                        </div>
                      </div>
                      <div class="product-card__footer">
                        <div class="product-card__prices">
                          <div class="product-card__price product-card__price--current">$23.00</div>
                        </div>
                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart">
                          <svg width="20" height="20">
                            <circle cx="7" cy="17" r="2" />
                            <circle cx="15" cy="17" r="2" />
                            <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" />
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-products-carousel__column">
                  <div class="block-products-carousel__cell">
                    <div class="product-card product-card--layout--grid">
                      <div class="product-card__actions-list">
                        <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                          <svg width="16" height="16">
                            <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" />
                          </svg>
                        </button>
                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list">
                          <svg width="16" height="16">
                            <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" />
                          </svg>
                        </button>
                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare">
                          <svg width="16" height="16">
                            <path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z" />
                            <path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z" />
                            <path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z" />
                          </svg>
                        </button>
                      </div>
                      <div class="product-card__image">
                        <div class="image image--type--product">
                          <a href="/products/view" class="image__body">
                            <img class="image__tag" src="/images/products/product-7-245x245.jpg" alt="">
                          </a>
                        </div>
                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                          <div class="status-badge__body">
                            <div class="status-badge__icon"><svg width="13" height="13">
                                <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z" />
                              </svg>
                            </div>
                            <div class="status-badge__text">Деталь подходит для 2011 Ford Focus S</div>
                            <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                          </div>
                        </div>
                      </div>
                      <div class="product-card__info">
                        <div class="product-card__meta"><span class="product-card__meta-title">Артикул:</span> 753-38573-B</div>
                        <div class="product-card__name">
                          <div>
                            <a href="/products/view">Блок двигателя Brandix Z4</a>
                          </div>
                        </div>
                        <div class="product-card__rating">
                          <div class="rating product-card__rating-stars">
                            <div class="rating__body">
                              <div class="rating__star"></div>
                              <div class="rating__star"></div>
                              <div class="rating__star"></div>
                              <div class="rating__star"></div>
                              <div class="rating__star"></div>
                            </div>
                          </div>
                          <div class="product-card__rating-label">0 по 0 отзывов</div>
                        </div>
                      </div>
                      <div class="product-card__footer">
                        <div class="product-card__prices">
                          <div class="product-card__price product-card__price--current">$452.00</div>
                        </div>
                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart">
                          <svg width="20" height="20">
                            <circle cx="7" cy="17" r="2" />
                            <circle cx="15" cy="17" r="2" />
                            <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" />
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-products-carousel__column">
                  <div class="block-products-carousel__cell">
                    <div class="product-card product-card--layout--grid">
                      <div class="product-card__actions-list">
                        <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                          <svg width="16" height="16">
                            <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" />
                          </svg>
                        </button>
                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list">
                          <svg width="16" height="16">
                            <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" />
                          </svg>
                        </button>
                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare">
                          <svg width="16" height="16">
                            <path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z" />
                            <path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z" />
                            <path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z" />
                          </svg>
                        </button>
                      </div>
                      <div class="product-card__image">
                        <div class="image image--type--product">
                          <a href="/products/view" class="image__body">
                            <img class="image__tag" src="/images/products/product-8-245x245.jpg" alt="">
                          </a>
                        </div>
                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                          <div class="status-badge__body">
                            <div class="status-badge__icon"><svg width="13" height="13">
                                <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z" />
                              </svg>
                            </div>
                            <div class="status-badge__text">Деталь подходит для 2011 Ford Focus S</div>
                            <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                          </div>
                        </div>
                      </div>
                      <div class="product-card__info">
                        <div class="product-card__meta"><span class="product-card__meta-title">Артикул:</span> 472-67382-Z</div>
                        <div class="product-card__name">
                          <div>
                            <a href="/products/view">Диски сцепления Brandix Z175</a>
                          </div>
                        </div>
                        <div class="product-card__rating">
                          <div class="rating product-card__rating-stars">
                            <div class="rating__body">
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star"></div>
                              <div class="rating__star"></div>
                            </div>
                          </div>
                          <div class="product-card__rating-label">3 по 7 отзывов</div>
                        </div>
                      </div>
                      <div class="product-card__footer">
                        <div class="product-card__prices">
                          <div class="product-card__price product-card__price--current">$345.00</div>
                        </div>
                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart">
                          <svg width="20" height="20">
                            <circle cx="7" cy="17" r="2" />
                            <circle cx="15" cy="17" r="2" />
                            <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" />
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-products-carousel__column">
                  <div class="block-products-carousel__cell">
                    <div class="product-card product-card--layout--grid">
                      <div class="product-card__actions-list">
                        <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                          <svg width="16" height="16">
                            <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" />
                          </svg>
                        </button>
                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list">
                          <svg width="16" height="16">
                            <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" />
                          </svg>
                        </button>
                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare">
                          <svg width="16" height="16">
                            <path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z" />
                            <path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z" />
                            <path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z" />
                          </svg>
                        </button>
                      </div>
                      <div class="product-card__image">
                        <div class="image image--type--product">
                          <a href="/products/view" class="image__body">
                            <img class="image__tag" src="/images/products/product-9-245x245.jpg" alt="">
                          </a>
                        </div>
                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                          <div class="status-badge__body">
                            <div class="status-badge__icon"><svg width="13" height="13">
                                <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z" />
                              </svg>
                            </div>
                            <div class="status-badge__text">Деталь подходит для 2011 Ford Focus S</div>
                            <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                          </div>
                        </div>
                      </div>
                      <div class="product-card__info">
                        <div class="product-card__meta"><span class="product-card__meta-title">Артикул:</span> 855-78336-G</div>
                        <div class="product-card__name">
                          <div>
                            <a href="/products/view">Ручная пятиступенчатая коробка передач Brandix</a>
                          </div>
                        </div>
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
                          <div class="product-card__rating-label">4 по 6 отзывов</div>
                        </div>
                      </div>
                      <div class="product-card__footer">
                        <div class="product-card__prices">
                          <div class="product-card__price product-card__price--current">$879.00</div>
                        </div>
                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart">
                          <svg width="20" height="20">
                            <circle cx="7" cy="17" r="2" />
                            <circle cx="15" cy="17" r="2" />
                            <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" />
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-products-carousel__column">
                  <div class="block-products-carousel__cell">
                    <div class="product-card product-card--layout--grid">
                      <div class="product-card__actions-list">
                        <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                          <svg width="16" height="16">
                            <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" />
                          </svg>
                        </button>
                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list">
                          <svg width="16" height="16">
                            <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" />
                          </svg>
                        </button>
                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare">
                          <svg width="16" height="16">
                            <path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z" />
                            <path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z" />
                            <path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z" />
                          </svg>
                        </button>
                      </div>
                      <div class="product-card__image">
                        <div class="image image--type--product">
                          <a href="/products/view" class="image__body">
                            <img class="image__tag" src="/images/products/product-10-245x245.jpg" alt="">
                          </a>
                        </div>
                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                          <div class="status-badge__body">
                            <div class="status-badge__icon"><svg width="13" height="13">
                                <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z" />
                              </svg>
                            </div>
                            <div class="status-badge__text">Деталь подходит для 2011 Ford Focus S</div>
                            <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                          </div>
                        </div>
                      </div>
                      <div class="product-card__info">
                        <div class="product-card__meta"><span class="product-card__meta-title">Артикул:</span> 473-75662-R</div>
                        <div class="product-card__name">
                          <div>
                            <a href="/products/view">Комплект автомобильных ковриков Brandix Z4</a>
                          </div>
                        </div>
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
                          <div class="product-card__rating-label">4 по 16 отзывов</div>
                        </div>
                      </div>
                      <div class="product-card__footer">
                        <div class="product-card__prices">
                          <div class="product-card__price product-card__price--current">$78.00</div>
                        </div>
                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart">
                          <svg width="20" height="20">
                            <circle cx="7" cy="17" r="2" />
                            <circle cx="15" cy="17" r="2" />
                            <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" />
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="block-space block-space--layout--divider-nl"></div>
        <?php include_once(Yii::getAlias('@frontend/views/site/_banners.php')); ?>
        <div class="block-space block-space--layout--divider-nl"></div>
        <div class="block block-products-carousel" data-layout="horizontal-sidebar">
          <div class="container">
            <div class="section-header">
              <div class="section-header__body">
                <h2 class="section-header__title">Рекомендуемые товары</h2>
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
                        <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z" />
                      </svg>
                    </button>
                  </div>
                </div>
                <div class="section-header__divider"></div>
              </div>
            </div>
            <div class="block-products-carousel__carousel">
              <div class="block-products-carousel__carousel-loader"></div>
              <div class="owl-carousel">
                <div class="block-products-carousel__column">
                  <div class="block-products-carousel__cell">
                    <div class="product-card product-card--layout--horizontal">
                      <div class="product-card__actions-list">
                        <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                          <svg width="16" height="16">
                            <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" />
                          </svg>
                        </button>
                      </div>
                      <div class="product-card__image">
                        <div class="image image--type--product">
                          <a href="/products/view" class="image__body">
                            <img class="image__tag" src="/images/products/product-1-245x245.jpg" alt="">
                          </a>
                        </div>
                      </div>
                      <div class="product-card__info">
                        <div class="product-card__name">
                          <div>
                            <div class="product-card__badges">
                              <div class="tag-badge tag-badge--sale">распродажа</div>
                              <div class="tag-badge tag-badge--new">новое</div>
                              <div class="tag-badge tag-badge--hot">хит продаж</div>
                            </div>
                            <a href="/products/view">Комплект свечей зажигания Brandix ASR-400</a>
                          </div>
                        </div>
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
                          <div class="product-card__rating-label">4 по 3 отзывам</div>
                        </div>
                      </div>
                      <div class="product-card__footer">
                        <div class="product-card__prices">
                          <div class="product-card__price product-card__price--current">$19.00</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="block-products-carousel__cell">
                    <div class="product-card product-card--layout--horizontal">
                      <div class="product-card__actions-list">
                        <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                          <svg width="16" height="16">
                            <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" />
                          </svg>
                        </button>
                      </div>
                      <div class="product-card__image">
                        <div class="image image--type--product">
                          <a href="/products/view" class="image__body">
                            <img class="image__tag" src="/images/products/product-2-245x245.jpg" alt="">
                          </a>
                        </div>
                      </div>
                      <div class="product-card__info">
                        <div class="product-card__name">
                          <div>
                            <a href="/products/view">Тормозной комплект Brandix BDX-750Z370-S</a>
                          </div>
                        </div>
                        <div class="product-card__rating">
                          <div class="rating product-card__rating-stars">
                            <div class="rating__body">
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                            </div>
                          </div>
                          <div class="product-card__rating-label">5 по 22 отзывам</div>
                        </div>
                      </div>
                      <div class="product-card__footer">
                        <div class="product-card__prices">
                          <div class="product-card__price product-card__price--current">$224.00</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-products-carousel__column">
                  <div class="block-products-carousel__cell">
                    <div class="product-card product-card--layout--horizontal">
                      <div class="product-card__actions-list">
                        <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                          <svg width="16" height="16">
                            <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" />
                          </svg>
                        </button>
                      </div>
                      <div class="product-card__image">
                        <div class="image image--type--product">
                          <a href="/products/view" class="image__body">
                            <img class="image__tag" src="/images/products/product-3-245x245.jpg" alt="">
                          </a>
                        </div>
                      </div>
                      <div class="product-card__info">
                        <div class="product-card__name">
                          <div>
                            <div class="product-card__badges">
                              <div class="tag-badge tag-badge--sale">распродажа</div>
                            </div>
                            <a href="/products/view">Левая фара Brandix Z54</a>
                          </div>
                        </div>
                        <div class="product-card__rating">
                          <div class="rating product-card__rating-stars">
                            <div class="rating__body">
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star"></div>
                              <div class="rating__star"></div>
                            </div>
                          </div>
                          <div class="product-card__rating-label">3 по 14 отзывам</div>
                        </div>
                      </div>
                      <div class="product-card__footer">
                        <div class="product-card__prices">
                          <div class="product-card__price product-card__price--new">$349.00</div>
                          <div class="product-card__price product-card__price--old">$415.00</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="block-products-carousel__cell">
                    <div class="product-card product-card--layout--horizontal">
                      <div class="product-card__actions-list">
                        <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                          <svg width="16" height="16">
                            <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" />
                          </svg>
                        </button>
                      </div>
                      <div class="product-card__image">
                        <div class="image image--type--product">
                          <a href="/products/view" class="image__body">
                            <img class="image__tag" src="/images/products/product-4-245x245.jpg" alt="">
                          </a>
                        </div>
                      </div>
                      <div class="product-card__info">
                        <div class="product-card__name">
                          <div>
                            <div class="product-card__badges">
                              <div class="tag-badge tag-badge--hot">хит продаж</div>
                            </div>
                            <a href="/products/view">Глянцево-серый 19-дюймовый алюминиевый диск AR-19</a>
                          </div>
                        </div>
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
                          <div class="product-card__rating-label">4 по 26 отзвам</div>
                        </div>
                      </div>
                      <div class="product-card__footer">
                        <div class="product-card__prices">
                          <div class="product-card__price product-card__price--current">$589.00</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-products-carousel__column">
                  <div class="block-products-carousel__cell">
                    <div class="product-card product-card--layout--horizontal">
                      <div class="product-card__actions-list">
                        <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                          <svg width="16" height="16">
                            <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" />
                          </svg>
                        </button>
                      </div>
                      <div class="product-card__image">
                        <div class="image image--type--product">
                          <a href="/products/view" class="image__body">
                            <img class="image__tag" src="/images/products/product-5-245x245.jpg" alt="">
                          </a>
                        </div>
                      </div>
                      <div class="product-card__info">
                        <div class="product-card__name">
                          <div>
                            <a href="/products/view">Двойная выхлопная труба от Brandix Z54</a>
                          </div>
                        </div>
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
                          <div class="product-card__rating-label">4 по 9 отзывам</div>
                        </div>
                      </div>
                      <div class="product-card__footer">
                        <div class="product-card__prices">
                          <div class="product-card__price product-card__price--current">$749.00</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="block-products-carousel__cell">
                    <div class="product-card product-card--layout--horizontal">
                      <div class="product-card__actions-list">
                        <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                          <svg width="16" height="16">
                            <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" />
                          </svg>
                        </button>
                      </div>
                      <div class="product-card__image">
                        <div class="image image--type--product">
                          <a href="/products/view" class="image__body">
                            <img class="image__tag" src="/images/products/product-6-245x245.jpg" alt="">
                          </a>
                        </div>
                      </div>
                      <div class="product-card__info">
                        <div class="product-card__name">
                          <div>
                            <a href="/products/view">Моторное масло 5-го уровня</a>
                          </div>
                        </div>
                        <div class="product-card__rating">
                          <div class="rating product-card__rating-stars">
                            <div class="rating__body">
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                            </div>
                          </div>
                          <div class="product-card__rating-label">5 по 2 отзывам</div>
                        </div>
                      </div>
                      <div class="product-card__footer">
                        <div class="product-card__prices">
                          <div class="product-card__price product-card__price--current">$23.00</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-products-carousel__column">
                  <div class="block-products-carousel__cell">
                    <div class="product-card product-card--layout--horizontal">
                      <div class="product-card__actions-list">
                        <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                          <svg width="16" height="16">
                            <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" />
                          </svg>
                        </button>
                      </div>
                      <div class="product-card__image">
                        <div class="image image--type--product">
                          <a href="/products/view" class="image__body">
                            <img class="image__tag" src="/images/products/product-7-245x245.jpg" alt="">
                          </a>
                        </div>
                      </div>
                      <div class="product-card__info">
                        <div class="product-card__name">
                          <div>
                            <a href="/products/view">Блок двигателя Brandix Z4</a>
                          </div>
                        </div>
                        <div class="product-card__rating">
                          <div class="rating product-card__rating-stars">
                            <div class="rating__body">
                              <div class="rating__star"></div>
                              <div class="rating__star"></div>
                              <div class="rating__star"></div>
                              <div class="rating__star"></div>
                              <div class="rating__star"></div>
                            </div>
                          </div>
                          <div class="product-card__rating-label">0 по 0 отзывам</div>
                        </div>
                      </div>
                      <div class="product-card__footer">
                        <div class="product-card__prices">
                          <div class="product-card__price product-card__price--current">$452.00</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="block-products-carousel__cell">
                    <div class="product-card product-card--layout--horizontal">
                      <div class="product-card__actions-list">
                        <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                          <svg width="16" height="16">
                            <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" />
                          </svg>
                        </button>
                      </div>
                      <div class="product-card__image">
                        <div class="image image--type--product">
                          <a href="/products/view" class="image__body">
                            <img class="image__tag" src="/images/products/product-8-245x245.jpg" alt="">
                          </a>
                        </div>
                      </div>
                      <div class="product-card__info">
                        <div class="product-card__name">
                          <div>
                            <a href="/products/view">Диски сцепления Brandix Z175</a>
                          </div>
                        </div>
                        <div class="product-card__rating">
                          <div class="rating product-card__rating-stars">
                            <div class="rating__body">
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star rating__star--active"></div>
                              <div class="rating__star"></div>
                              <div class="rating__star"></div>
                            </div>
                          </div>
                          <div class="product-card__rating-label">3 по 7 отзывам</div>
                        </div>
                      </div>
                      <div class="product-card__footer">
                        <div class="product-card__prices">
                          <div class="product-card__price product-card__price--current">$345.00</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="block-products-carousel__column">
                  <div class="block-products-carousel__cell">
                    <div class="product-card product-card--layout--horizontal">
                      <div class="product-card__actions-list">
                        <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                          <svg width="16" height="16">
                            <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" />
                          </svg>
                        </button>
                      </div>
                      <div class="product-card__image">
                        <div class="image image--type--product">
                          <a href="/products/view" class="image__body">
                            <img class="image__tag" src="/images/products/product-9-245x245.jpg" alt="">
                          </a>
                        </div>
                      </div>
                      <div class="product-card__info">
                        <div class="product-card__name">
                          <div>
                            <a href="/products/view">Ручная пятиступенчатая коробка передач Brandix</a>
                          </div>
                        </div>
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
                          <div class="product-card__rating-label">4 по 6 отзывам</div>
                        </div>
                      </div>
                      <div class="product-card__footer">
                        <div class="product-card__prices">
                          <div class="product-card__price product-card__price--current">$879.00</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="block-products-carousel__cell">
                    <div class="product-card product-card--layout--horizontal">
                      <div class="product-card__actions-list">
                        <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                          <svg width="16" height="16">
                            <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" />
                          </svg>
                        </button>
                      </div>
                      <div class="product-card__image">
                        <div class="image image--type--product">
                          <a href="/products/view" class="image__body">
                            <img class="image__tag" src="/images/products/product-10-245x245.jpg" alt="">
                          </a>
                        </div>
                      </div>
                      <div class="product-card__info">
                        <div class="product-card__name">
                          <div>
                            <a href="/products/view">Комплект автомобильных ковриков Brandix Z4</a>
                          </div>
                        </div>
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
                          <div class="product-card__rating-label">4 по 16 отзывам</div>
                        </div>
                      </div>
                      <div class="product-card__footer">
                        <div class="product-card__prices">
                          <div class="product-card__price product-card__price--current">$78.00</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="block-space block-space--layout--divider-nl"></div>
        <div class="block block-brands block-brands--layout--columns-7-sidebar">
          <div class="container">
            <ul class="block-brands__list">
              <li class="block-brands__item">
                <a href="" class="block-brands__item-link">
                  <img src="images/brands/brand-1.png" alt="">
                  <span class="block-brands__item-name">AimParts</span>
                </a>
              </li>
              <li class="block-brands__divider" role="presentation"></li>
              <li class="block-brands__item">
                <a href="" class="block-brands__item-link">
                  <img src="images/brands/brand-2.png" alt="">
                  <span class="block-brands__item-name">WindEngine</span>
                </a>
              </li>
              <li class="block-brands__divider" role="presentation"></li>
              <li class="block-brands__item">
                <a href="" class="block-brands__item-link">
                  <img src="images/brands/brand-3.png" alt="">
                  <span class="block-brands__item-name">TurboElectric</span>
                </a>
              </li>
              <li class="block-brands__divider" role="presentation"></li>
              <li class="block-brands__item">
                <a href="" class="block-brands__item-link">
                  <img src="images/brands/brand-4.png" alt="">
                  <span class="block-brands__item-name">StartOne</span>
                </a>
              </li>
              <li class="block-brands__divider" role="presentation"></li>
              <li class="block-brands__item">
                <a href="" class="block-brands__item-link">
                  <img src="images/brands/brand-5.png" alt="">
                  <span class="block-brands__item-name">Brandix</span>
                </a>
              </li>
              <li class="block-brands__divider" role="presentation"></li>
              <li class="block-brands__item">
                <a href="" class="block-brands__item-link">
                  <img src="images/brands/brand-6.png" alt="">
                  <span class="block-brands__item-name">ABS-Brand</span>
                </a>
              </li>
              <li class="block-brands__divider" role="presentation"></li>
              <li class="block-brands__item">
                <a href="" class="block-brands__item-link">
                  <img src="images/brands/brand-7.png" alt="">
                  <span class="block-brands__item-name">GreatCircle</span>
                </a>
              </li>
              <li class="block-brands__divider" role="presentation"></li>
              <li class="block-brands__item">
                <a href="" class="block-brands__item-link">
                  <img src="images/brands/brand-8.png" alt="">
                  <span class="block-brands__item-name">JustRomb</span>
                </a>
              </li>
              <li class="block-brands__divider" role="presentation"></li>
              <li class="block-brands__item">
                <a href="" class="block-brands__item-link">
                  <img src="images/brands/brand-9.png" alt="">
                  <span class="block-brands__item-name">FastWheels</span>
                </a>
              </li>
              <li class="block-brands__divider" role="presentation"></li>
              <li class="block-brands__item">
                <a href="" class="block-brands__item-link">
                  <img src="images/brands/brand-10.png" alt="">
                  <span class="block-brands__item-name">Stroyka-X</span>
                </a>
              </li>
              <li class="block-brands__divider" role="presentation"></li>
              <li class="block-brands__item">
                <a href="" class="block-brands__item-link">
                  <img src="images/brands/brand-11.png" alt="">
                  <span class="block-brands__item-name">Mission-51</span>
                </a>
              </li>
              <li class="block-brands__divider" role="presentation"></li>
              <li class="block-brands__item">
                <a href="" class="block-brands__item-link">
                  <img src="images/brands/brand-12.png" alt="">
                  <span class="block-brands__item-name">FuelCorp</span>
                </a>
              </li>
              <li class="block-brands__divider" role="presentation"></li>
              <li class="block-brands__item">
                <a href="" class="block-brands__item-link">
                  <img src="images/brands/brand-13.png" alt="">
                  <span class="block-brands__item-name">RedGate</span>
                </a>
              </li>
              <li class="block-brands__divider" role="presentation"></li>
              <li class="block-brands__item">
                <a href="" class="block-brands__item-link">
                  <img src="images/brands/brand-14.png" alt="">
                  <span class="block-brands__item-name">Blocks</span>
                </a>
              </li>
              <li class="block-brands__divider" role="presentation"></li>
              <li class="block-brands__item">
                <a href="" class="block-brands__item-link">
                  <img src="images/brands/brand-15.png" alt="">
                  <span class="block-brands__item-name">BlackBox</span>
                </a>
              </li>
              <li class="block-brands__divider" role="presentation"></li>
              <li class="block-brands__item">
                <a href="" class="block-brands__item-link">
                  <img src="images/brands/brand-16.png" alt="">
                  <span class="block-brands__item-name">SquareGarage</span>
                </a>
              </li>
              <li class="block-brands__divider" role="presentation"></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
  </div>
</div>
<div class="block-space block-space--layout--divider-nl"></div>
<div class="block block-posts-carousel block-posts-carousel--layout--grid" data-layout="grid">
  <div class="container">
    <div class="section-header">
      <div class="section-header__body">
        <h2 class="section-header__title">Latest News</h2>
        <div class="section-header__spring"></div>
        <ul class="section-header__links">
          <li class="section-header__links-item">
            <a href="" class="section-header__links-link">Special Offers</a>
          </li>
          <li class="section-header__links-item">
            <a href="" class="section-header__links-link">New Arrivals</a>
          </li>
          <li class="section-header__links-item">
            <a href="" class="section-header__links-link">Reviews</a>
          </li>
        </ul>
        <div class="section-header__arrows">
          <div class="arrow section-header__arrow section-header__arrow--prev arrow--prev">
            <button class="arrow__button" type="button"><svg width="7" height="11">
                <path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />
              </svg>
            </button>
          </div>
          <div class="arrow section-header__arrow section-header__arrow--next arrow--next">
            <button class="arrow__button" type="button"><svg width="7" height="11">
                <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z" />
              </svg>
            </button>
          </div>
        </div>
        <div class="section-header__divider"></div>
      </div>
    </div>
    <div class="block-posts-carousel__carousel">
      <div class="owl-carousel">
        <div class="block-posts-carousel__item">
          <div class="post-card">
            <div class="post-card__image">
              <a href="/blog/post">
                <img src="images/posts/post-1-730x485.jpg" alt="">
              </a>
            </div>
            <div class="post-card__content">
              <div class="post-card__category">
                <a href="blog-classic-right-sidebar.html">Special Offers</a>
              </div>
              <div class="post-card__title">
                <h2><a href="/blog/post">Philosophy That Addresses Topics Such As Goodness</a></h2>
              </div>
              <div class="post-card__date">
                By <a href="">Jessica Moore</a> on October 19, 2019
              </div>
              <div class="post-card__excerpt">
                <div class="typography">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis neque ut purus fermentum, ac pretium
                  nibh facilisis. Vivamus venenatis viverra iaculis. Suspendisse tempor orci non sapien ullamcorper dapibus.
                  Suspendisse at velit diam. Donec pharetra nec enim blandit vulputate.
                </div>
              </div>
              <div class="post-card__more">
                <a href="/blog/post" class="btn btn-secondary btn-sm">Read more</a>
              </div>
            </div>
          </div>
        </div>
        <div class="block-posts-carousel__item">
          <div class="post-card">
            <div class="post-card__image">
              <a href="/blog/post">
                <img src="images/posts/post-2-730x485.jpg" alt="">
              </a>
            </div>
            <div class="post-card__content">
              <div class="post-card__category">
                <a href="blog-classic-right-sidebar.html">Latest News</a>
              </div>
              <div class="post-card__title">
                <h2><a href="/blog/post">Logic Is The Study Of Reasoning And Argument Part 2</a></h2>
              </div>
              <div class="post-card__date">
                By <a href="">Jessica Moore</a> on September 5, 2019
              </div>
              <div class="post-card__excerpt">
                <div class="typography">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis neque ut purus fermentum, ac pretium
                  nibh facilisis. Vivamus venenatis viverra iaculis. Suspendisse tempor orci non sapien ullamcorper dapibus.
                  Suspendisse at velit diam. Donec pharetra nec enim blandit vulputate.
                </div>
              </div>
              <div class="post-card__more">
                <a href="/blog/post" class="btn btn-secondary btn-sm">Read more</a>
              </div>
            </div>
          </div>
        </div>
        <div class="block-posts-carousel__item">
          <div class="post-card">
            <div class="post-card__image">
              <a href="/blog/post">
                <img src="images/posts/post-3-730x485.jpg" alt="">
              </a>
            </div>
            <div class="post-card__content">
              <div class="post-card__category">
                <a href="blog-classic-right-sidebar.html">New Arrivals</a>
              </div>
              <div class="post-card__title">
                <h2><a href="/blog/post">Some Philosophers Specialize In One Or More Historical Periods</a></h2>
              </div>
              <div class="post-card__date">
                By <a href="">Jessica Moore</a> on August 12, 2019
              </div>
              <div class="post-card__excerpt">
                <div class="typography">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis neque ut purus fermentum, ac pretium
                  nibh facilisis. Vivamus venenatis viverra iaculis. Suspendisse tempor orci non sapien ullamcorper dapibus.
                  Suspendisse at velit diam. Donec pharetra nec enim blandit vulputate.
                </div>
              </div>
              <div class="post-card__more">
                <a href="/blog/post" class="btn btn-secondary btn-sm">Read more</a>
              </div>
            </div>
          </div>
        </div>
        <div class="block-posts-carousel__item">
          <div class="post-card">
            <div class="post-card__image">
              <a href="/blog/post">
                <img src="images/posts/post-4-730x485.jpg" alt="">
              </a>
            </div>
            <div class="post-card__content">
              <div class="post-card__category">
                <a href="blog-classic-right-sidebar.html">Special Offers</a>
              </div>
              <div class="post-card__title">
                <h2><a href="/blog/post">A Variety Of Other Academic And Non-Academic Approaches Have Been Explored</a></h2>
              </div>
              <div class="post-card__date">
                By <a href="">Jessica Moore</a> on Jule 30, 2019
              </div>
              <div class="post-card__excerpt">
                <div class="typography">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis neque ut purus fermentum, ac pretium
                  nibh facilisis. Vivamus venenatis viverra iaculis. Suspendisse tempor orci non sapien ullamcorper dapibus.
                  Suspendisse at velit diam. Donec pharetra nec enim blandit vulputate.
                </div>
              </div>
              <div class="post-card__more">
                <a href="/blog/post" class="btn btn-secondary btn-sm">Read more</a>
              </div>
            </div>
          </div>
        </div>
        <div class="block-posts-carousel__item">
          <div class="post-card">
            <div class="post-card__image">
              <a href="/blog/post">
                <img src="images/posts/post-5-730x485.jpg" alt="">
              </a>
            </div>
            <div class="post-card__content">
              <div class="post-card__category">
                <a href="blog-classic-right-sidebar.html">New Arrivals</a>
              </div>
              <div class="post-card__title">
                <h2><a href="/blog/post">Germany Was The First Country To Professionalize Philosophy</a></h2>
              </div>
              <div class="post-card__date">
                By <a href="">Jessica Moore</a> on June 12, 2019
              </div>
              <div class="post-card__excerpt">
                <div class="typography">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis neque ut purus fermentum, ac pretium
                  nibh facilisis. Vivamus venenatis viverra iaculis. Suspendisse tempor orci non sapien ullamcorper dapibus.
                  Suspendisse at velit diam. Donec pharetra nec enim blandit vulputate.
                </div>
              </div>
              <div class="post-card__more">
                <a href="/blog/post" class="btn btn-secondary btn-sm">Read more</a>
              </div>
            </div>
          </div>
        </div>
        <div class="block-posts-carousel__item">
          <div class="post-card">
            <div class="post-card__image">
              <a href="/blog/post">
                <img src="images/posts/post-6-730x485.jpg" alt="">
              </a>
            </div>
            <div class="post-card__content">
              <div class="post-card__category">
                <a href="blog-classic-right-sidebar.html">Special Offers</a>
              </div>
              <div class="post-card__title">
                <h2><a href="/blog/post">Logic Is The Study Of Reasoning And Argument Part 1</a></h2>
              </div>
              <div class="post-card__date">
                By <a href="">Jessica Moore</a> on May 21, 2019
              </div>
              <div class="post-card__excerpt">
                <div class="typography">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis neque ut purus fermentum, ac pretium
                  nibh facilisis. Vivamus venenatis viverra iaculis. Suspendisse tempor orci non sapien ullamcorper dapibus.
                  Suspendisse at velit diam. Donec pharetra nec enim blandit vulputate.
                </div>
              </div>
              <div class="post-card__more">
                <a href="/blog/post" class="btn btn-secondary btn-sm">Read more</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="block-space block-space--layout--divider-nl"></div>
