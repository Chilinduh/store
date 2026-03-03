<?php

use kartik\form\ActiveForm;
use common\models\BlocksTypes;
use common\models\Blocks;
use common\models\Pages;
use common\models\Property;
use frontend\components\Blocks\BlocksWidget;

?>
<?php if ($block = Blocks::findOne(['block_type_id' => BlocksTypes::BLOCK_CATEGORY])) { ?>
  <div class="block-space block-space--layout--divider-nl"></div>
  <div class="block block-split">
    <div class="container">
      <div class="block-split__row row no-gutters">
        <div class="block-split__item block-split__item-content col-auto">

          <div class="block">
            <div class="block-banners block">
              <div class="container">
                <img src="/images/banners/banner3.jpg" width="">
              </div>
              </div>
            <?php BlocksWidget::widget(['model' => $block]) ?>
          </div>

          <?php if (0) { ?>
            <div class="block-space block-space--layout--divider-nl"></div>
            <div class="block block-products-carousel" data-layout="horizontal">
              <div class="container">
                <div class="section-header">
                  <div class="section-header__body">
                    <h2 class="section-header__title">Featured Products</h2>
                    <div class="section-header__spring"></div>
                    <div class="section-header__arrows">
                      <div class="arrow section-header__arrow section-header__arrow--prev arrow--prev">
                        <button class="arrow__button" type="button">
                          <svg width="7" height="11">
                            <path
                              d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/>
                          </svg>
                        </button>
                      </div>
                      <div class="arrow section-header__arrow section-header__arrow--next arrow--next">
                        <button class="arrow__button" type="button">
                          <svg width="7" height="11">
                            <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
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
                            <button class="product-card__action product-card__action--quickview" type="button"
                                    aria-label="Quick view">
                              <svg width="16" height="16">
                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                              </svg>
                            </button>
                          </div>
                          <div class="product-card__image">
                            <div class="image image--type--product">
                              <a href="product-full.html" class="image__body">
                                <img class="image__tag" src="images/products/product-1-245x245.jpg" alt="">
                              </a>
                            </div>
                          </div>
                          <div class="product-card__info">
                            <div class="product-card__name">
                              <div>
                                <div class="product-card__badges">
                                  <div class="tag-badge tag-badge--sale">sale</div>
                                  <div class="tag-badge tag-badge--new">new</div>
                                  <div class="tag-badge tag-badge--hot">hot</div>
                                </div>
                                <a href="product-full.html">Brandix Spark Plug Kit ASR-400</a>
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
                              <div class="product-card__rating-label">4 on 3 reviews</div>
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
                            <button class="product-card__action product-card__action--quickview" type="button"
                                    aria-label="Quick view">
                              <svg width="16" height="16">
                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                              </svg>
                            </button>
                          </div>
                          <div class="product-card__image">
                            <div class="image image--type--product">
                              <a href="product-full.html" class="image__body">
                                <img class="image__tag" src="images/products/product-2-245x245.jpg" alt="">
                              </a>
                            </div>
                          </div>
                          <div class="product-card__info">
                            <div class="product-card__name">
                              <div>
                                <a href="product-full.html">Brandix Brake Kit BDX-750Z370-S</a>
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
                              <div class="product-card__rating-label">5 on 22 reviews</div>
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
                            <button class="product-card__action product-card__action--quickview" type="button"
                                    aria-label="Quick view">
                              <svg width="16" height="16">
                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                              </svg>
                            </button>
                          </div>
                          <div class="product-card__image">
                            <div class="image image--type--product">
                              <a href="product-full.html" class="image__body">
                                <img class="image__tag" src="images/products/product-3-245x245.jpg" alt="">
                              </a>
                            </div>
                          </div>
                          <div class="product-card__info">
                            <div class="product-card__name">
                              <div>
                                <div class="product-card__badges">
                                  <div class="tag-badge tag-badge--sale">sale</div>
                                </div>
                                <a href="product-full.html">Left Headlight Of Brandix Z54</a>
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
                              <div class="product-card__rating-label">3 on 14 reviews</div>
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
                            <button class="product-card__action product-card__action--quickview" type="button"
                                    aria-label="Quick view">
                              <svg width="16" height="16">
                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                              </svg>
                            </button>
                          </div>
                          <div class="product-card__image">
                            <div class="image image--type--product">
                              <a href="product-full.html" class="image__body">
                                <img class="image__tag" src="images/products/product-4-245x245.jpg" alt="">
                              </a>
                            </div>
                          </div>
                          <div class="product-card__info">
                            <div class="product-card__name">
                              <div>
                                <div class="product-card__badges">
                                  <div class="tag-badge tag-badge--hot">hot</div>
                                </div>
                                <a href="product-full.html">Glossy Gray 19" Aluminium Wheel AR-19</a>
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
                              <div class="product-card__rating-label">4 on 26 reviews</div>
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
                            <button class="product-card__action product-card__action--quickview" type="button"
                                    aria-label="Quick view">
                              <svg width="16" height="16">
                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                              </svg>
                            </button>
                          </div>
                          <div class="product-card__image">
                            <div class="image image--type--product">
                              <a href="product-full.html" class="image__body">
                                <img class="image__tag" src="images/products/product-5-245x245.jpg" alt="">
                              </a>
                            </div>
                          </div>
                          <div class="product-card__info">
                            <div class="product-card__name">
                              <div>
                                <a href="product-full.html">Twin Exhaust Pipe From Brandix Z54</a>
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
                              <div class="product-card__rating-label">4 on 9 reviews</div>
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
                            <button class="product-card__action product-card__action--quickview" type="button"
                                    aria-label="Quick view">
                              <svg width="16" height="16">
                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                              </svg>
                            </button>
                          </div>
                          <div class="product-card__image">
                            <div class="image image--type--product">
                              <a href="product-full.html" class="image__body">
                                <img class="image__tag" src="images/products/product-6-245x245.jpg" alt="">
                              </a>
                            </div>
                          </div>
                          <div class="product-card__info">
                            <div class="product-card__name">
                              <div>
                                <a href="product-full.html">Motor Oil Level 5</a>
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
                              <div class="product-card__rating-label">5 on 2 reviews</div>
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
                            <button class="product-card__action product-card__action--quickview" type="button"
                                    aria-label="Quick view">
                              <svg width="16" height="16">
                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                              </svg>
                            </button>
                          </div>
                          <div class="product-card__image">
                            <div class="image image--type--product">
                              <a href="product-full.html" class="image__body">
                                <img class="image__tag" src="images/products/product-7-245x245.jpg" alt="">
                              </a>
                            </div>
                          </div>
                          <div class="product-card__info">
                            <div class="product-card__name">
                              <div>
                                <a href="product-full.html">Brandix Engine Block Z4</a>
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
                              <div class="product-card__rating-label">0 on 0 reviews</div>
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
                            <button class="product-card__action product-card__action--quickview" type="button"
                                    aria-label="Quick view">
                              <svg width="16" height="16">
                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                              </svg>
                            </button>
                          </div>
                          <div class="product-card__image">
                            <div class="image image--type--product">
                              <a href="product-full.html" class="image__body">
                                <img class="image__tag" src="images/products/product-8-245x245.jpg" alt="">
                              </a>
                            </div>
                          </div>
                          <div class="product-card__info">
                            <div class="product-card__name">
                              <div>
                                <a href="product-full.html">Brandix Clutch Discs Z175</a>
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
                              <div class="product-card__rating-label">3 on 7 reviews</div>
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
                            <button class="product-card__action product-card__action--quickview" type="button"
                                    aria-label="Quick view">
                              <svg width="16" height="16">
                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                              </svg>
                            </button>
                          </div>
                          <div class="product-card__image">
                            <div class="image image--type--product">
                              <a href="product-full.html" class="image__body">
                                <img class="image__tag" src="images/products/product-9-245x245.jpg" alt="">
                              </a>
                            </div>
                          </div>
                          <div class="product-card__info">
                            <div class="product-card__name">
                              <div>
                                <a href="product-full.html">Brandix Manual Five Speed Gearbox</a>
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
                              <div class="product-card__rating-label">4 on 6 reviews</div>
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
                            <button class="product-card__action product-card__action--quickview" type="button"
                                    aria-label="Quick view">
                              <svg width="16" height="16">
                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                              </svg>
                            </button>
                          </div>
                          <div class="product-card__image">
                            <div class="image image--type--product">
                              <a href="product-full.html" class="image__body">
                                <img class="image__tag" src="images/products/product-10-245x245.jpg" alt="">
                              </a>
                            </div>
                          </div>
                          <div class="product-card__info">
                            <div class="product-card__name">
                              <div>
                                <a href="product-full.html">Set of Car Floor Mats Brandix Z4</a>
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
                              <div class="product-card__rating-label">4 on 16 reviews</div>
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
            <div class="block block-brands block-brands--layout--columns-8-full">
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
          <?php } ?>
        </div>
      </div>
      <?php if (1) { ?>
      <div class="block-space block-space--layout--before-footer"></div>
      <?php } ?>
    </div>
  </div>
<?php } ?>
<?php if (0) { ?>
  <div class="container">
    <div class="block-categories__header">
      <div class="block-categories__title">
        Популярные категории
      </div>
    </div>
  </div>
<?php } ?>

<?php if ($block = Blocks::findOne(['page_id' => Pages::PAGE_MAIN, 'block_type_id' => BlocksTypes::BLOCK_CATEGORY_WITH_SUBCATEGORY])) { ?>
  <?= BlocksWidget::widget(['model' => $block]) ?>
<?php } ?>
<?php if ($block = Blocks::findOne(['page_id' => Pages::PAGE_MAIN, 'block_type_id' => BlocksTypes::BLOCK_PRODUCTS_SALE])) { ?>
  <?= BlocksWidget::widget(['model' => $block, 'property_id' => Property::STATUS_SALE_ID]) ?>
<?php } ?>
<?php if ($block = Blocks::findOne(['page_id' => Pages::PAGE_MAIN, 'block_type_id' => BlocksTypes::BLOCK_PRODUCTS_NEW])) { ?>
  <?= BlocksWidget::widget(['model' => $block, 'property_id' => Property::STATUS_NEW_ID]) ?>
<?php } ?>
<?php if ($block = Blocks::findOne(['page_id' => Pages::PAGE_MAIN, 'block_type_id' => BlocksTypes::BLOCK_PRODUCTS_PROMOTION])) { ?>
  <?= BlocksWidget::widget(['model' => $block, 'property_id' => Property::BEST_PROMOTION_ID]) ?>
<?php } ?>
<?php if ($block = Blocks::findOne(['page_id' => Pages::PAGE_MAIN, 'block_type_id' => BlocksTypes::BLOCK_PRODUCTS_HOT])) { ?>
  <?= BlocksWidget::widget(['model' => $block, 'property_id' => Property::STATUS_HOT_ID]) ?>
<?php } ?>
<?php if ($block = Blocks::findOne(['page_id' => Pages::PAGE_MAIN, 'block_type_id' => BlocksTypes::BLOCK_PRODUCTS_BEST])) { ?>
  <?= BlocksWidget::widget(['model' => $block, 'property_id' => Property::BEST_SELLERS_ID]) ?>
<?php } ?>
<?php if (0) { ?>

  <div class="block-space block-space--layout--divider-nl"></div>
  <div class="block block-brands block-brands--layout--columns-8-full">
    <div class="container">
      <ul class="block-brands__list">
        <li class="block-brands__item">
          <a href="#" class="block-brands__item-link">
            <img src="/images/brands/brand-1.png" alt="">
            <span class="block-brands__item-name">AimParts</span>
          </a>
        </li>
        <li class="block-brands__divider" role="presentation"></li>
        <li class="block-brands__item">
          <a href="#" class="block-brands__item-link">
            <img src="/images/brands/brand-2.png" alt="">
            <span class="block-brands__item-name">WindEngine</span>
          </a>
        </li>
        <li class="block-brands__divider" role="presentation"></li>
        <li class="block-brands__item">
          <a href="#" class="block-brands__item-link">
            <img src="/images/brands/brand-3.png" alt="">
            <span class="block-brands__item-name">TurboElectric</span>
          </a>
        </li>
        <li class="block-brands__divider" role="presentation"></li>
        <li class="block-brands__item">
          <a href="" class="block-brands__item-link">
            <img src="/images/brands/brand-4.png" alt="">
            <span class="block-brands__item-name">StartOne</span>
          </a>
        </li>
        <li class="block-brands__divider" role="presentation"></li>
        <li class="block-brands__item">
          <a href="#" class="block-brands__item-link">
            <img src="/images/brands/brand-5.png" alt="">
            <span class="block-brands__item-name">Brandix</span>
          </a>
        </li>
        <li class="block-brands__divider" role="presentation"></li>
        <li class="block-brands__item">
          <a href="#" class="block-brands__item-link">
            <img src="/images/brands/brand-6.png" alt="">
            <span class="block-brands__item-name">ABS-Brand</span>
          </a>
        </li>
        <li class="block-brands__divider" role="presentation"></li>
        <li class="block-brands__item">
          <a href="#" class="block-brands__item-link">
            <img src="/images/brands/brand-7.png" alt="">
            <span class="block-brands__item-name">GreatCircle</span>
          </a>
        </li>
        <li class="block-brands__divider" role="presentation"></li>
        <li class="block-brands__item">
          <a href="#" class="block-brands__item-link">
            <img src="/images/brands/brand-8.png" alt="">
            <span class="block-brands__item-name">JustRomb</span>
          </a>
        </li>
        <li class="block-brands__divider" role="presentation"></li>
        <li class="block-brands__item">
          <a href="#" class="block-brands__item-link">
            <img src="/images/brands/brand-9.png" alt="">
            <span class="block-brands__item-name">FastWheels</span>
          </a>
        </li>
        <li class="block-brands__divider" role="presentation"></li>
        <li class="block-brands__item">
          <a href="#" class="block-brands__item-link">
            <img src="/images/brands/brand-10.png" alt="">
            <span class="block-brands__item-name">Stroyka-X</span>
          </a>
        </li>
        <li class="block-brands__divider" role="presentation"></li>
        <li class="block-brands__item">
          <a href="#" class="block-brands__item-link">
            <img src="/images/brands/brand-11.png" alt="">
            <span class="block-brands__item-name">Mission-51</span>
          </a>
        </li>
        <li class="block-brands__divider" role="presentation"></li>
        <li class="block-brands__item">
          <a href="#" class="block-brands__item-link">
            <img src="/images/brands/brand-12.png" alt="">
            <span class="block-brands__item-name">FuelCorp</span>
          </a>
        </li>
        <li class="block-brands__divider" role="presentation"></li>
        <li class="block-brands__item">
          <a href="#" class="block-brands__item-link">
            <img src="/images/brands/brand-13.png" alt="">
            <span class="block-brands__item-name">RedGate</span>
          </a>
        </li>
        <li class="block-brands__divider" role="presentation"></li>
        <li class="block-brands__item">
          <a href="#" class="block-brands__item-link">
            <img src="/images/brands/brand-14.png" alt="">
            <span class="block-brands__item-name">Blocks</span>
          </a>
        </li>
        <li class="block-brands__divider" role="presentation"></li>
        <li class="block-brands__item">
          <a href="#" class="block-brands__item-link">
            <img src="/images/brands/brand-15.png" alt="">
            <span class="block-brands__item-name">BlackBox</span>
          </a>
        </li>
        <li class="block-brands__divider" role="presentation"></li>
        <li class="block-brands__item">
          <a href="#" class="block-brands__item-link">
            <img src="/images/brands/brand-16.png" alt="">
            <span class="block-brands__item-name">SquareGarage</span>
          </a>
        </li>
        <li class="block-brands__divider" role="presentation"></li>
      </ul>
    </div>
  </div>

  <div class="block-space block-space--layout--divider-nl"></div>
  <div class="block block-products-carousel" data-layout="grid-5">
    <div class="container">
      <div class="section-header">
        <div class="section-header__body">
          <h2 class="section-header__title">Рекомендуемые товары</h2>
          <div class="section-header__spring"></div>
          <ul class="section-header__groups">
            <li class="section-header__groups-item">
              <button type="button" class="section-header__groups-button section-header__groups-button--active">Все
              </button>
            </li>
            <li class="section-header__groups-item">
              <button type="button" class="section-header__groups-button">Электроинструменты</button>
            </li>
            <li class="section-header__groups-item">
              <button type="button" class="section-header__groups-button">Ручные инструменты</button>
            </li>
            <li class="section-header__groups-item">
              <button type="button" class="section-header__groups-button">Сантехника</button>
            </li>
          </ul>
          <div class="section-header__arrows">
            <div class="arrow section-header__arrow section-header__arrow--prev arrow--prev">
              <button class="arrow__button" type="button">
                <svg width="7" height="11">
                  <path
                    d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/>
                </svg>
              </button>
            </div>
            <div class="arrow section-header__arrow section-header__arrow--next arrow--next">
              <button class="arrow__button" type="button">
                <svg width="7" height="11">
                  <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
                </svg>
              </button>
            </div>
          </div>
          <div class="section-header__divider"></div>
        </div>
      </div>
      <?php include_once(Yii::getAlias('@frontend/views/site/_carousel.php')); ?>
    </div>
  </div>
  <div class="block-space block-space--layout--divider-nl"></div>
<?php } ?>
  <div class="block-space block-space--layout--divider-nl"></div>
<?php if ($block = Blocks::findOne(['block_type_id' => BlocksTypes::BLOCK_BANNERS])) { ?>
  <?= BlocksWidget::widget(['model' => $block]) ?>
<?php } ?>

<?php if (0) { ?>
  <div class="block block-products-columns">
    <div class="container">
      <div class="row">
        <div class="col-4">
          <div class="block-products-columns__title">Лучшие продукты</div>
          <div class="block-products-columns__list">
            <?php $i = 0;
            foreach ($products as $item) { ?>
              <?php
              if (rand(0, 1) && $i < 3) {
                $i++;
                ?>
                <div class="block-products-columns__list-item">
                  <div class="product-card">
                    <div class="product-card__actions-list">
                      <button class="product-card__action product-card__action--quickview" type="button"
                              aria-label="Quick view">
                        <svg width="16" height="16">
                          <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                        </svg>
                      </button>
                    </div>
                    <div class="product-card__image">
                      <div class="image image--type--product">
                        <a href="/catalog/<?= $item->category_id ?>/<?= $item->id ?>" class="image__body">
                          <img class="image__tag" src="<?= $item->file()->original ?? '/images/no-photo.jpg' ?>" alt="">
                        </a>
                      </div>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <div>
                          <div class="product-card__badges">
                            <?php if (rand(0, 1)) { ?>
                              <div class="tag-badge tag-badge--sale">Распродажа</div>
                            <?php } ?>
                            <?php if (rand(0, 1)) { ?>
                              <div class="tag-badge tag-badge--new">Новинка</div>
                            <?php } ?>
                            <?php if (rand(0, 1)) { ?>
                              <div class="tag-badge tag-badge--hot">Хит продаж</div>
                            <?php } ?>
                          </div>
                          <a href="/catalog/<?= $item->category_id ?>/<?= $item->id ?>"><?= $item->name; ?></a>
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
                        <div class="product-card__rating-label">4 из 3 отзыва</div>
                      </div>
                    </div>
                    <div class="product-card__footer">
                      <div class="product-card__prices">
                        <div class="product-card__price product-card__price--current">$19.00</div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            <?php } ?>
          </div>
        </div>
        <div class="col-4">
          <div class="block-products-columns__title">Специальные предложения</div>
          <div class="block-products-columns__list">
            <?php
            $i = 0;
            foreach ($products as $item) {
              if (rand(0, 1) && $i < 3) {
                $i++;
                ?>
                <div class="block-products-columns__list-item">
                  <div class="product-card">
                    <div class="product-card__actions-list">
                      <button class="product-card__action product-card__action--quickview" type="button"
                              aria-label="Quick view">
                        <svg width="16" height="16">
                          <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                        </svg>
                      </button>
                    </div>
                    <div class="product-card__image">
                      <div class="image image--type--product">
                        <a href="/products/view" class="image__body">
                          <img class="image__tag" src="<?= $item->file()->original ?? '/images/no-photo.jpg'; ?>"
                               alt="">
                        </a>
                      </div>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <div>
                          <div class="product-card__badges">
                            <?php if (rand(0, 1)) { ?>
                              <div class="tag-badge tag-badge--sale">Распродажа</div>
                            <?php } ?>
                            <?php if (rand(0, 1)) { ?>
                              <div class="tag-badge tag-badge--new">Новинка</div>
                            <?php } ?>
                            <?php if (rand(0, 1)) { ?>
                              <div class="tag-badge tag-badge--hot">Хит продаж</div>
                            <?php } ?>
                          </div>
                          <a href="/products/view"><?= $item->name; ?></a>
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
                        <div class="product-card__rating-label">4 из 3 отзыва</div>
                      </div>
                    </div>
                    <div class="product-card__footer">
                      <div class="product-card__prices">
                        <div class="product-card__price product-card__price--current">$19.00</div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            <?php } ?>
          </div>
        </div>
        <div class="col-4">
          <div class="block-products-columns__title">Бестселлеры</div>
          <div class="block-products-columns__list">
            <?php
            $i = 0;
            foreach ($products as $item) {

              if (rand(0, 1) && $i < 3) {
                $i++;
                ?>
                <div class="block-products-columns__list-item">
                  <div class="product-card">
                    <div class="product-card__actions-list">
                      <button class="product-card__action product-card__action--quickview" type="button"
                              aria-label="Quick view">
                        <svg width="16" height="16">
                          <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                        </svg>
                      </button>
                    </div>
                    <div class="product-card__image">
                      <div class="image image--type--product">
                        <a href="/products/view" class="image__body">
                          <img class="image__tag" src="<?= $item->file()->original ?? '/images/no-photo.jpg'; ?>"
                               alt="">
                        </a>
                      </div>
                    </div>
                    <div class="product-card__info">
                      <div class="product-card__name">
                        <div>
                          <div class="product-card__badges">
                            <?php if (rand(0, 1)) { ?>
                              <div class="tag-badge tag-badge--sale">Распродажа</div>
                            <?php } ?>
                            <?php if (rand(0, 1)) { ?>
                              <div class="tag-badge tag-badge--new">Новинка</div>
                            <?php } ?>
                            <?php if (rand(0, 1)) { ?>
                              <div class="tag-badge tag-badge--hot">Хит продаж</div>
                            <?php } ?>
                          </div>
                          <a href="/products/view"><?= $item->name; ?></a>
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
                        <div class="product-card__rating-label">4 из 3 отзыва</div>
                      </div>
                    </div>
                    <div class="product-card__footer">
                      <div class="product-card__prices">
                        <div class="product-card__price product-card__price--current">$19.00</div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<?php if ($block = Blocks::findOne(['block_type_id' => BlocksTypes::BLOCK_NEWS_V1])) { ?>
  <?= BlocksWidget::widget(['model' => $block]) ?>
<?php } ?>

<?php if ($block = Blocks::findOne(['block_type_id' => BlocksTypes::BLOCK_NEWS_V2])) { ?>
  <?= BlocksWidget::widget(['model' => $block]) ?>
<?php } ?>

<?php if ($block = Blocks::findOne(['block_type_id' => BlocksTypes::BLOCK_FEATURES])) { ?>
  <?= BlocksWidget::widget(['model' => $block]) ?>
<?php } ?>

