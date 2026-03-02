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
    </div>
  </div>
</div>
<div class="block-split block-split--has-sidebar">
  <?php include_once(Yii::getAlias('@frontend/views/site/_left-filter.php')); ?>
  <div class="container">
    <div class="block-split__row row no-gutters">
      <?php if(0) { ?>
      <?php } ?>
      <div class="block-split__item block-split__item-sidebar col-auto">
        <div class="sidebar">
          <div class="sidebar__backdrop"></div>
          <div class="sidebar__body">
            <div class="sidebar__header">
              <div class="sidebar__title">Фильтр</div>
              <button class="sidebar__close" type="button"><svg width="12" height="12">
                  <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
        c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
        C11.2,9.8,11.2,10.4,10.8,10.8z" />
                </svg>
              </button>
            </div>

            <div class="sidebar__content">
                <div class="widget widget-filters widget-filters--offcanvas--mobile" data-collapse data-collapse-opened-class="filter--opened">
                <div class="widget__header widget-filters__header">
                  <h4>Фильтр</h4>
                </div>
                <div class="widget-filters__list">

                  <?php require(Yii::getAlias('@frontend/views/site/_category_filter.php')); ?>
                  <?php if(0) { ?>

                  <div class="widget-filters__item">
                    <div class="filter filter--opened" data-collapse-item>
                      <button type="button" class="filter__title" data-collapse-trigger>
                        Транспортное средство

                        <span class="filter__arrow">
                  <svg width="12px" height="7px">
                    <path
                      d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/>
                </svg></span>
                      </button>
                      <div class="filter__body" data-collapse-content>
                        <div class="filter__container">
                          <div class="filter-vehicle">
                            <ul class="filter-vehicle__list">
                              <li class="filter-vehicle__item ">
                                <label class="filter-vehicle__item-label">
                          <span class="filter-list__input input-radio">
                              <span class="input-radio__body">
                                  <input class="input-radio__input"
                                         name="filter_vehicle" type="radio">
                                  <span class="input-radio__circle"></span>
                              </span>
                          </span>
                                  <span class="filter-vehicle__item-title">
                              Все части
                          </span>
                                  <span class="filter-vehicle__item-counter">57</span>
                                </label>
                              </li>
                              <li class="filter-vehicle__item ">
                                <label class="filter-vehicle__item-label">
                          <span class="filter-list__input input-radio">
                              <span class="input-radio__body">
                                  <input class="input-radio__input"
                                         name="filter_vehicle" type="radio"
                                         checked>
                                  <span class="input-radio__circle"></span>
                              </span>
                          </span>
                                  <span class="filter-vehicle__item-title">
                              2011 Ford Focus S
                          </span>
                                  <span class="filter-vehicle__item-counter">12</span>
                                </label>
                              </li>
                              <li class="filter-vehicle__item ">
                                <label class="filter-vehicle__item-label">
                          <span class="filter-list__input input-radio">
                              <span class="input-radio__body">
                                  <input class="input-radio__input" name="filter_vehicle" type="radio">
                                  <span class="input-radio__circle"></span>
                              </span>
                          </span>
                                  <span class="filter-vehicle__item-title">
                              2015 Audi A3
                          </span>
                                  <span class="filter-vehicle__item-counter">51</span>
                                </label>
                              </li>
                            </ul>
                            <?php if(0) { ?>
                              <div class="filter-vehicle__button">
                                <button type="button" class="btn btn-xs btn-secondary">Добавить транспортное средство</button>
                              </div>
                            <?php } ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="widget-filters__item">
                    <div class="filter filter--opened" data-collapse-item>
                      <button type="button" class="filter__title" data-collapse-trigger>
                        Цена
                        <span class="filter__arrow">
                  <svg width="12px" height="7px">
                      <path
                        d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/>
                  </svg>
                </span>
                      </button>
                      <div class="filter__body" data-collapse-content>
                        <div class="filter__container">
                          <div class="filter-price" data-min="500" data-max="1500" data-from="590" data-to="1000">
                            <div class="filter-price__slider"></div>
                            <div class="filter-price__title-button">
                              <div class="filter-price__title">$<span class="filter-price__min-value"></span> – $<span
                                  class="filter-price__max-value"></span></div>
                              <button type="button" class="btn btn-xs btn-secondary filter-price__button">Фильтр</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="widget-filters__item">
                    <div class="filter filter--opened" data-collapse-item>
                      <button type="button" class="filter__title" data-collapse-trigger>
                        Марка
                        <span class="filter__arrow">
                  <svg width="12px" height="7px">
                      <path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/>
                  </svg>
                </span>
                      </button>
                      <div class="filter__body" data-collapse-content>
                        <div class="filter__container">
                          <div class="filter-list">
                            <div class="filter-list__list">
                              <label class="filter-list__item ">
                        <span class="input-check filter-list__input">
                            <span class="input-check__body">
                                <input class="input-check__input"
                                       type="checkbox">
                                <span class="input-check__box"></span>
                                <span class="input-check__icon">
                                  <svg width="9px" height="7px">
                                      <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/>
                                  </svg>
                                </span>
                            </span>
                        </span>
                                <span class="filter-list__title">Wakita</span>
                                <span class="filter-list__counter">7</span>
                              </label>
                              <label class="filter-list__item ">
                        <span class="input-check filter-list__input">
                            <span class="input-check__body">
                                <input class="input-check__input" type="checkbox" checked>
                                <span class="input-check__box"></span>
                                <span class="input-check__icon">
                                  <svg width="9px" height="7px">
                                      <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/>
                                  </svg>
                                </span>
                            </span>
                        </span>
                                <span class="filter-list__title">Zosch </span>
                                <span class="filter-list__counter">42</span>
                              </label>
                              <label class="filter-list__item  filter-list__item--disabled ">
                        <span class="input-check filter-list__input">
                            <span class="input-check__body">
                                <input class="input-check__input"
                                       type="checkbox" checked disabled>
                                <span class="input-check__box"></span>
                                <span class="input-check__icon"><svg width="9px"
                                                                     height="7px">
                                        <path
                                          d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/>
                                    </svg>
                                </span>
                            </span>
                        </span>
                                <span class="filter-list__title">WeVALT </span>
                              </label>
                              <label class="filter-list__item  filter-list__item--disabled ">
                        <span class="input-check filter-list__input">
                            <span class="input-check__body">
                                <input class="input-check__input"
                                       type="checkbox" disabled>
                                <span class="input-check__box"></span>
                                <span class="input-check__icon"><svg width="9px"
                                                                     height="7px">
                                        <path
                                          d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/>
                                    </svg>
                                </span>
                            </span>
                        </span>
                                <span class="filter-list__title">Hammer</span>
                              </label>
                              <label class="filter-list__item ">
                        <span class="input-check filter-list__input">
                            <span class="input-check__body">
                                <input class="input-check__input"
                                       type="checkbox">
                                <span class="input-check__box"></span>
                                <span class="input-check__icon"><svg width="9px"
                                                                     height="7px">
                                        <path
                                          d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/>
                                    </svg>
                                </span>
                            </span>
                        </span>
                                <span class="filter-list__title">Mitasia</span>
                                <span class="filter-list__counter">1</span>
                              </label>
                              <label class="filter-list__item ">
                        <span class="input-check filter-list__input">
                            <span class="input-check__body">
                                <input class="input-check__input"
                                       type="checkbox">
                                <span class="input-check__box"></span>
                                <span class="input-check__icon"><svg width="9px"
                                                                     height="7px">
                                        <path
                                          d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/>
                                    </svg>
                                </span>
                            </span>
                        </span>
                                <span class="filter-list__title">Metaggo</span>
                                <span class="filter-list__counter">25</span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="widget-filters__item">
                    <div class="filter filter--opened" data-collapse-item>
                      <button type="button" class="filter__title" data-collapse-trigger>
                        Марка
                        <span class="filter__arrow">
                  <svg width="12px" height="7px">
                      <path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/>
                  </svg>
                </span>
                      </button>
                      <div class="filter__body" data-collapse-content>
                        <div class="filter__container">
                          <div class="filter-list">
                            <div class="filter-list__list">
                              <label class="filter-list__item ">
                        <span class="filter-list__input input-radio">
                            <span class="input-radio__body">
                                <input class="input-radio__input"
                                       name="filter_radio" type="radio">
                                <span class="input-radio__circle"></span>
                            </span>
                        </span>
                                <span class="filter-list__title"> Wakita </span>
                                <span class="filter-list__counter">7</span>
                              </label>
                              <label class="filter-list__item ">
                        <span class="filter-list__input input-radio">
                            <span class="input-radio__body">
                                <input class="input-radio__input"
                                       name="filter_radio" type="radio">
                                <span class="input-radio__circle"></span>
                            </span>
                        </span>
                                <span class="filter-list__title">Zosch </span>
                                <span class="filter-list__counter">42</span>
                              </label>
                              <label class="filter-list__item  filter-list__item--disabled ">
                        <span class="filter-list__input input-radio">
                            <span class="input-radio__body">
                                <input class="input-radio__input"
                                       name="filter_radio" type="radio" checked
                                       disabled>
                                <span class="input-radio__circle"></span>
                            </span>
                        </span>
                                <span class="filter-list__title">WeVALT</span>
                              </label>
                              <label class="filter-list__item  filter-list__item--disabled ">
                        <span class="filter-list__input input-radio">
                            <span class="input-radio__body">
                                <input class="input-radio__input"
                                       name="filter_radio" type="radio"
                                       disabled>
                                <span class="input-radio__circle"></span>
                            </span>
                        </span>
                                <span class="filter-list__title">Hammer</span>
                              </label>
                              <label class="filter-list__item ">
                        <span class="filter-list__input input-radio">
                            <span class="input-radio__body">
                                <input class="input-radio__input"
                                       name="filter_radio" type="radio">
                                <span class="input-radio__circle"></span>
                            </span>
                        </span>
                                <span class="filter-list__title">Mitasia</span>
                                <span class="filter-list__counter">1</span>
                              </label>
                              <label class="filter-list__item ">
                        <span class="filter-list__input input-radio">
                            <span class="input-radio__body">
                                <input class="input-radio__input"
                                       name="filter_radio" type="radio">
                                <span class="input-radio__circle"></span>
                            </span>
                        </span>
                                <span class="filter-list__title">Metaggo</span>
                                <span class="filter-list__counter">25</span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="widget-filters__item">
                    <div class="filter filter--opened" data-collapse-item>
                      <button type="button" class="filter__title" data-collapse-trigger>
                        Рейтинг
                        <span class="filter__arrow">
                  <svg width="12px" height="7px">
                      <path
                        d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/>
                  </svg>
                </span>
                      </button>
                      <div class="filter__body" data-collapse-content>
                        <div class="filter__container">
                          <div class="filter-rating">
                            <ul class="filter-rating__list">
                              <li class="filter-rating__item">
                                <label class="filter-rating__item-label">
                          <span class="input-check filter-rating__item-input">
                              <span class="input-check__body">
                                  <input class="input-check__input"
                                         type="checkbox">
                                  <span class="input-check__box"></span>
                                  <span class="input-check__icon"><svg
                                      width="9px" height="7px">
                                          <path
                                            d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/>
                                      </svg>
                                  </span>
                              </span>
                          </span>
                                  <span class="filter-rating__item-звезды">
                            <div class="rating">
                                <div class="rating__body">
                                    <div class="rating__star rating__star--active"></div>
                                    <div class="rating__star rating__star--active"></div>
                                    <div class="rating__star rating__star--active"></div>
                                    <div class="rating__star rating__star--active"></div>
                                    <div class="rating__star rating__star--active"></div>
                                </div>
                            </div>
                          </span>
                                  <span class="filter-rating__item-title sr-only">5 звезды</span>
                                  <span class="filter-rating__item-counter">42</span>
                                </label>
                              </li>
                              <li class="filter-rating__item">
                                <label class="filter-rating__item-label">
                          <span class="input-check filter-rating__item-input">
                              <span class="input-check__body">
                                  <input class="input-check__input"
                                         type="checkbox">
                                  <span class="input-check__box"></span>
                                  <span class="input-check__icon"><svg
                                      width="9px" height="7px">
                                          <path
                                            d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/>
                                      </svg>
                                  </span>
                              </span>
                          </span>
                                  <span class="filter-rating__item-звезды">
                              <div class="rating">
                                  <div class="rating__body">
                                      <div
                                        class="rating__star rating__star--active"></div>
                                      <div
                                        class="rating__star rating__star--active"></div>
                                      <div
                                        class="rating__star rating__star--active"></div>
                                      <div
                                        class="rating__star rating__star--active"></div>
                                      <div class="rating__star"></div>
                                  </div>
                              </div>
                          </span>
                                  <span class="filter-rating__item-title sr-only">
                              4 звезды
                          </span>
                                  <span class="filter-rating__item-counter">24</span>
                                </label>
                              </li>
                              <li class="filter-rating__item">
                                <label class="filter-rating__item-label">
                          <span class="input-check filter-rating__item-input">
                              <span class="input-check__body">
                                  <input class="input-check__input"
                                         type="checkbox">
                                  <span class="input-check__box"></span>
                                  <span class="input-check__icon"><svg
                                      width="9px" height="7px">
                                          <path
                                            d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/>
                                      </svg>
                                  </span>
                              </span>
                          </span>
                                  <span class="filter-rating__item-звезды">
                              <div class="rating">
                                  <div class="rating__body">
                                      <div
                                        class="rating__star rating__star--active"></div>
                                      <div
                                        class="rating__star rating__star--active"></div>
                                      <div
                                        class="rating__star rating__star--active"></div>
                                      <div class="rating__star"></div>
                                      <div class="rating__star"></div>
                                  </div>
                              </div>
                          </span>
                                  <span class="filter-rating__item-title sr-only">
                                                                        3 звезды
                                                                    </span>
                                  <span class="filter-rating__item-counter">19</span>
                                </label>
                              </li>
                              <li class="filter-rating__item">
                                <label class="filter-rating__item-label">
                          <span class="input-check filter-rating__item-input">
                              <span class="input-check__body">
                                  <input class="input-check__input"
                                         type="checkbox">
                                  <span class="input-check__box"></span>
                                  <span class="input-check__icon"><svg
                                      width="9px" height="7px">
                                          <path
                                            d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/>
                                      </svg>
                                  </span>
                              </span>
                          </span>
                                  <span class="filter-rating__item-звезды">
                              <div class="rating">
                                  <div class="rating__body">
                                      <div
                                        class="rating__star rating__star--active"></div>
                                      <div
                                        class="rating__star rating__star--active"></div>
                                      <div class="rating__star"></div>
                                      <div class="rating__star"></div>
                                      <div class="rating__star"></div>
                                  </div>
                              </div>
                          </span>
                                  <span class="filter-rating__item-title sr-only">
                              2 звезды
                          </span>
                                  <span class="filter-rating__item-counter">3</span>
                                </label>
                              </li>
                              <li class="filter-rating__item">
                                <label class="filter-rating__item-label">
                          <span class="input-check filter-rating__item-input">
                              <span class="input-check__body">
                                  <input class="input-check__input"
                                         type="checkbox">
                                  <span class="input-check__box"></span>
                                  <span class="input-check__icon"><svg
                                      width="9px" height="7px">
                                          <path
                                            d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/>
                                      </svg>
                                  </span>
                              </span>
                          </span>
                                  <span class="filter-rating__item-звезды">
                              <div class="rating">
                                  <div class="rating__body">
                                      <div
                                        class="rating__star rating__star--active"></div>
                                      <div class="rating__star"></div>
                                      <div class="rating__star"></div>
                                      <div class="rating__star"></div>
                                      <div class="rating__star"></div>
                                  </div>
                              </div>
                          </span>
                                  <span class="filter-rating__item-title sr-only">
                              1 star
                          </span>
                                  <span class="filter-rating__item-counter">12</span>
                                </label>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="widget-filters__item">
                    <div class="filter filter--opened" data-collapse-item>
                      <button type="button" class="filter__title" data-collapse-trigger>
                        Color
                        <span class="filter__arrow"><svg width="12px" height="7px">
                                                        <path
                                                          d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/>
                                                    </svg></span>
                      </button>
                      <div class="filter__body" data-collapse-content>
                        <div class="filter__container">
                          <div class="filter-color">
                            <div class="filter-color__list">
                              <label class="filter-color__item">
                                                                <span
                                                                  class="filter-color__check input-check-color  input-check-color--white  "
                                                                  style="color: #fff;">
                                                                    <label class="input-check-color__body">
                                                                        <input class="input-check-color__input"
                                                                               type="checkbox">
                                                                        <span class="input-check-color__box"></span>
                                                                        <span class="input-check-color__icon"><svg
                                                                            width="12px" height="9px">
                                                                                <path
                                                                                  d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                                                            </svg></span>
                                                                        <span class="input-check-color__stick"></span>
                                                                    </label>
                                                                </span>
                              </label>
                              <label class="filter-color__item">
                                                                <span
                                                                  class="filter-color__check input-check-color   input-check-color--light "
                                                                  style="color: #d9d9d9;">
                                                                    <label class="input-check-color__body">
                                                                        <input class="input-check-color__input"
                                                                               type="checkbox">
                                                                        <span class="input-check-color__box"></span>
                                                                        <span class="input-check-color__icon"><svg
                                                                            width="12px" height="9px">
                                                                                <path
                                                                                  d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                                                            </svg></span>
                                                                        <span class="input-check-color__stick"></span>
                                                                    </label>
                                                                </span>
                              </label>
                              <label class="filter-color__item">
                                                                <span class="filter-color__check input-check-color  "
                                                                      style="color: #b3b3b3;">
                                                                    <label class="input-check-color__body">
                                                                        <input class="input-check-color__input"
                                                                               type="checkbox">
                                                                        <span class="input-check-color__box"></span>
                                                                        <span class="input-check-color__icon"><svg
                                                                            width="12px" height="9px">
                                                                                <path
                                                                                  d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                                                            </svg></span>
                                                                        <span class="input-check-color__stick"></span>
                                                                    </label>
                                                                </span>
                              </label>
                              <label class="filter-color__item">
                                                                <span class="filter-color__check input-check-color  "
                                                                      style="color: #808080;">
                                                                    <label class="input-check-color__body">
                                                                        <input class="input-check-color__input"
                                                                               type="checkbox">
                                                                        <span class="input-check-color__box"></span>
                                                                        <span class="input-check-color__icon"><svg
                                                                            width="12px" height="9px">
                                                                                <path
                                                                                  d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                                                            </svg></span>
                                                                        <span class="input-check-color__stick"></span>
                                                                    </label>
                                                                </span>
                              </label>
                              <label class="filter-color__item">
                                                                <span class="filter-color__check input-check-color  "
                                                                      style="color: #666;">
                                                                    <label class="input-check-color__body">
                                                                        <input class="input-check-color__input"
                                                                               type="checkbox">
                                                                        <span class="input-check-color__box"></span>
                                                                        <span class="input-check-color__icon"><svg
                                                                            width="12px" height="9px">
                                                                                <path
                                                                                  d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                                                            </svg></span>
                                                                        <span class="input-check-color__stick"></span>
                                                                    </label>
                                                                </span>
                              </label>
                              <label class="filter-color__item">
                                                                <span class="filter-color__check input-check-color  "
                                                                      style="color: #4d4d4d;">
                                                                    <label class="input-check-color__body">
                                                                        <input class="input-check-color__input"
                                                                               type="checkbox">
                                                                        <span class="input-check-color__box"></span>
                                                                        <span class="input-check-color__icon"><svg
                                                                            width="12px" height="9px">
                                                                                <path
                                                                                  d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                                                            </svg></span>
                                                                        <span class="input-check-color__stick"></span>
                                                                    </label>
                                                                </span>
                              </label>
                              <label class="filter-color__item">
                                                                <span class="filter-color__check input-check-color  "
                                                                      style="color: #262626;">
                                                                    <label class="input-check-color__body">
                                                                        <input class="input-check-color__input"
                                                                               type="checkbox">
                                                                        <span class="input-check-color__box"></span>
                                                                        <span class="input-check-color__icon"><svg
                                                                            width="12px" height="9px">
                                                                                <path
                                                                                  d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                                                            </svg></span>
                                                                        <span class="input-check-color__stick"></span>
                                                                    </label>
                                                                </span>
                              </label>
                              <label class="filter-color__item">
                                                                <span class="filter-color__check input-check-color  "
                                                                      style="color: #ff4040;">
                                                                    <label class="input-check-color__body">
                                                                        <input class="input-check-color__input"
                                                                               type="checkbox" checked>
                                                                        <span class="input-check-color__box"></span>
                                                                        <span class="input-check-color__icon"><svg
                                                                            width="12px" height="9px">
                                                                                <path
                                                                                  d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                                                            </svg></span>
                                                                        <span class="input-check-color__stick"></span>
                                                                    </label>
                                                                </span>
                              </label>
                              <label class="filter-color__item">
                        <span class="filter-color__check input-check-color  "
                              style="color: #ff8126;">
                            <label class="input-check-color__body">
                                <input class="input-check-color__input"
                                       type="checkbox">
                                <span class="input-check-color__box"></span>
                                <span class="input-check-color__icon"><svg
                                    width="12px" height="9px">
                                        <path
                                          d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                    </svg></span>
                                <span class="input-check-color__stick"></span>
                            </label>
                        </span>
                              </label>
                              <label class="filter-color__item">
                        <span
                          class="filter-color__check input-check-color   input-check-color--light "
                          style="color: #ffd440;">
                            <label class="input-check-color__body">
                                <input class="input-check-color__input"
                                       type="checkbox">
                                <span class="input-check-color__box"></span>
                                <span class="input-check-color__icon"><svg
                                    width="12px" height="9px">
                                        <path
                                          d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                    </svg></span>
                                <span class="input-check-color__stick"></span>
                            </label>
                        </span>
                              </label>
                              <label class="filter-color__item">
                        <span
                          class="filter-color__check input-check-color   input-check-color--light "
                          style="color: #becc1f;">
                            <label class="input-check-color__body">
                                <input class="input-check-color__input"
                                       type="checkbox">
                                <span class="input-check-color__box"></span>
                                <span class="input-check-color__icon"><svg
                                    width="12px" height="9px">
                                        <path
                                          d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                    </svg></span>
                                <span class="input-check-color__stick"></span>
                            </label>
                        </span>
                              </label>
                              <label class="filter-color__item">
                        <span class="filter-color__check input-check-color  "
                              style="color: #8fcc14;">
                            <label class="input-check-color__body">
                                <input class="input-check-color__input"
                                       type="checkbox" checked>
                                <span class="input-check-color__box"></span>
                                <span class="input-check-color__icon"><svg
                                    width="12px" height="9px">
                                        <path
                                          d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                    </svg></span>
                                <span class="input-check-color__stick"></span>
                            </label>
                        </span>
                              </label>
                              <label class="filter-color__item">
                        <span class="filter-color__check input-check-color  "
                              style="color: #47cc5e;">
                            <label class="input-check-color__body">
                                <input class="input-check-color__input"
                                       type="checkbox">
                                <span class="input-check-color__box"></span>
                                <span class="input-check-color__icon"><svg
                                    width="12px" height="9px">
                                        <path
                                          d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                    </svg></span>
                                <span class="input-check-color__stick"></span>
                            </label>
                        </span>
                              </label>
                              <label class="filter-color__item">
                        <span class="filter-color__check input-check-color"
                              style="color: #47cca0;">
                            <label class="input-check-color__body">
                                <input class="input-check-color__input"
                                       type="checkbox">
                                <span class="input-check-color__box"></span>
                                <span class="input-check-color__icon"><svg
                                    width="12px" height="9px">
                                        <path
                                          d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                    </svg></span>
                                <span class="input-check-color__stick"></span>
                            </label>
                        </span>
                              </label>
                              <label class="filter-color__item">
                        <span class="filter-color__check input-check-color"
                              style="color: #47cccc;">
                            <label class="input-check-color__body">
                                <input class="input-check-color__input"
                                       type="checkbox">
                                <span class="input-check-color__box"></span>
                                <span class="input-check-color__icon"><svg
                                    width="12px" height="9px">
                                        <path
                                          d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                    </svg></span>
                                <span class="input-check-color__stick"></span>
                            </label>
                        </span>
                              </label>
                              <label class="filter-color__item">
                        <span class="filter-color__check input-check-color"
                              style="color: #40bfff;">
                            <label class="input-check-color__body">
                                <input class="input-check-color__input"
                                       type="checkbox" disabled>
                                <span class="input-check-color__box"></span>
                                <span class="input-check-color__icon"><svg
                                    width="12px" height="9px">
                                        <path
                                          d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                    </svg></span>
                                <span class="input-check-color__stick"></span>
                            </label>
                        </span>
                              </label>
                              <label class="filter-color__item">
                        <span class="filter-color__check input-check-color"
                              style="color: #3d6dcc;">
                            <label class="input-check-color__body">
                                <input class="input-check-color__input"
                                       type="checkbox" checked>
                                <span class="input-check-color__box"></span>
                                <span class="input-check-color__icon"><svg
                                    width="12px" height="9px">
                                        <path
                                          d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                    </svg></span>
                                <span class="input-check-color__stick"></span>
                            </label>
                        </span>
                              </label>
                              <label class="filter-color__item">
                        <span class="filter-color__check input-check-color"
                              style="color: #7766cc;">
                            <label class="input-check-color__body">
                                <input class="input-check-color__input"
                                       type="checkbox">
                                <span class="input-check-color__box"></span>
                                <span class="input-check-color__icon"><svg
                                    width="12px" height="9px">
                                        <path
                                          d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                    </svg></span>
                                <span class="input-check-color__stick"></span>
                            </label>
                        </span>
                              </label>
                              <label class="filter-color__item">
                        <span class="filter-color__check input-check-color"
                              style="color: #b852cc;">
                            <label class="input-check-color__body">
                                <input class="input-check-color__input"
                                       type="checkbox">
                                <span class="input-check-color__box"></span>
                                <span class="input-check-color__icon"><svg
                                    width="12px" height="9px">
                                        <path
                                          d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                    </svg></span>
                                <span class="input-check-color__stick"></span>
                            </label>
                        </span>
                              </label>
                              <label class="filter-color__item">
                        <span class="filter-color__check input-check-color"
                              style="color: #e53981;">
                            <label class="input-check-color__body">
                                <input class="input-check-color__input"
                                       type="checkbox">
                                <span class="input-check-color__box"></span>
                                <span class="input-check-color__icon"><svg
                                    width="12px" height="9px">
                                        <path
                                          d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                    </svg></span>
                                <span class="input-check-color__stick"></span>
                            </label>
                        </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                </div>
                <div class="widget-filters__actions d-flex">
                  <button class="btn btn-primary btn-sm">Filter</button>
                  <button class="btn btn-secondary btn-sm">Reset</button>
                </div>
              </div>
              <?php if(0) { ?>
              <div class="card widget widget-categories">
                <div class="widget__header">
                  <h4>Categories</h4>
                </div>
                <ul class="widget-categories__list widget-categories__list--root" data-collapse data-collapse-opened-class="widget-categories__item--open">
                  <li class="widget-categories__item" data-collapse-item>
                    <a href="" class="widget-categories__link">
                      Tools & Garage
                    </a>
                  </li>
                  <li class="widget-categories__item" data-collapse-item>
                    <a href="" class="widget-categories__link">
                      Headlights & Lighting
                    </a>
                    <button class="widget-categories__expander" type="button" data-collapse-trigger></button>
                    <div class="widget-categories__container" data-collapse-content>
                      <ul class="widget-categories__list widget-categories__list--child">
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Headlights</a>
                        </li>
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Tail Lights</a>
                        </li>
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Fog Lights</a>
                        </li>
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Turn Signals</a>
                        </li>
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Switches & Relays</a>
                        </li>
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Corner Lights</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="widget-categories__item" data-collapse-item>
                    <a href="" class="widget-categories__link">
                      Interior Parts
                    </a>
                    <button class="widget-categories__expander" type="button" data-collapse-trigger></button>
                    <div class="widget-categories__container" data-collapse-content>
                      <ul class="widget-categories__list widget-categories__list--child">
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Floor Mats</a>
                        </li>
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Gauges</a>
                        </li>
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Consoles & Organizers</a>
                        </li>
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Mobile Electronics</a>
                        </li>
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Steering Wheels</a>
                        </li>
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Cargo Accessories</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="widget-categories__item" data-collapse-item>
                    <a href="" class="widget-categories__link">
                      Engine & Drivetrain
                    </a>
                    <button class="widget-categories__expander" type="button" data-collapse-trigger></button>
                    <div class="widget-categories__container" data-collapse-content>
                      <ul class="widget-categories__list widget-categories__list--child">
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Air Filters</a>
                        </li>
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Oxygen Sensors</a>
                        </li>
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Heating</a>
                        </li>
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Exhaust</a>
                        </li>
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Cranks & Pistons</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="widget-categories__item" data-collapse-item>
                    <a href="" class="widget-categories__link">
                      Repair Manuals
                    </a>
                  </li>
                  <li class="widget-categories__item" data-collapse-item>
                    <a href="" class="widget-categories__link">
                      Suspension
                    </a>
                  </li>
                  <li class="widget-categories__item" data-collapse-item>
                    <a href="" class="widget-categories__link">
                      Body Parts
                    </a>
                    <button class="widget-categories__expander" type="button" data-collapse-trigger></button>
                    <div class="widget-categories__container" data-collapse-content>
                      <ul class="widget-categories__list widget-categories__list--child">
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Bumpers</a>
                        </li>
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Hoods</a>
                        </li>
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Grilles</a>
                        </li>
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Fog Lights</a>
                        </li>
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Door Handles</a>
                        </li>
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Car Covers</a>
                        </li>
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Tailgates</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="widget-categories__item" data-collapse-item>
                    <a href="" class="widget-categories__link">
                      Fuel Systems
                    </a>
                  </li>
                  <li class="widget-categories__item" data-collapse-item>
                    <a href="" class="widget-categories__link">
                      Brakes & Suspension
                    </a>
                    <button class="widget-categories__expander" type="button" data-collapse-trigger></button>
                    <div class="widget-categories__container" data-collapse-content>
                      <ul class="widget-categories__list widget-categories__list--child">
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Brake Discs</a>
                        </li>
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Wheel Hubs</a>
                        </li>
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Air Suspension</a>
                        </li>
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Ball Joints</a>
                        </li>
                        <li class="widget-categories__item">
                          <a href="" class="widget-categories__link">Brake Pad Sets</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="widget-categories__item" data-collapse-item>
                    <a href="" class="widget-categories__link">
                      Steering
                    </a>
                  </li>
                  <li class="widget-categories__item" data-collapse-item>
                    <a href="" class="widget-categories__link">
                      Transmission
                    </a>
                  </li>
                  <li class="widget-categories__item" data-collapse-item>
                    <a href="" class="widget-categories__link">
                      Air Filters
                    </a>
                  </li>
                </ul>
              </div>

              <div class="card widget widget-products d-none d-lg-block">
                <div class="widget__header">
                  <h4>Новые поступления</h4>
                </div>
                <div class="widget-products__list">
                  <div class="widget-products__item">
                    <div class="widget-products__image image image--type--product">
                      <a href="/products/view" class="image__body">
                        <img class="image__tag" src="images/products/product-1-64x64.jpg" alt="">
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
                        <img class="image__tag" src="images/products/product-2-64x64.jpg" alt="">
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
                        <img class="image__tag" src="images/products/product-3-64x64.jpg" alt="">
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
                        <img class="image__tag" src="images/products/product-4-64x64.jpg" alt="">
                      </a>
                    </div>
                    <div class="widget-products__info">
                      <div class="widget-products__name">
                        <a href="/products/view">Глянцево-серый 19-дюймовый алюминиевый диск AR-19</a>
                      </div>
                      <div class="widget-products__prices">
                        <div class="widget-products__price widget-products__price--current">$589.00</div>
                      </div>
                    </div>
                  </div>
                  <div class="widget-products__item">
                    <div class="widget-products__image image image--type--product">
                      <a href="/products/view" class="image__body">
                        <img class="image__tag" src="images/products/product-5-64x64.jpg" alt="">
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
              <?php } ?>
            </div>

          </div>
        </div>
      </div>

      <div class="block-split__item block-split__item-content col-auto">
        <div class="block">
          <div class="products-view">
            <div class="products-view__options view-options">
              <div class="view-options__body">
                <button type="button" class="view-options__filters-button filters-button">
                  <span class="filters-button__icon"><svg width="16" height="16">
                          <path d="M7,14v-2h9v2H7z M14,7h2v2h-2V7z M12.5,6C12.8,6,13,6.2,13,6.5v3c0,0.3-0.2,0.5-0.5,0.5h-2
C10.2,10,10,9.8,10,9.5v-3C10,6.2,10.2,6,10.5,6H12.5z M7,2h9v2H7V2z M5.5,5h-2C3.2,5,3,4.8,3,4.5v-3C3,1.2,3.2,1,3.5,1h2
C5.8,1,6,1.2,6,1.5v3C6,4.8,5.8,5,5.5,5z M0,2h2v2H0V2z M9,9H0V7h9V9z M2,14H0v-2h2V14z M3.5,11h2C5.8,11,6,11.2,6,11.5v3
C6,14.8,5.8,15,5.5,15h-2C3.2,15,3,14.8,3,14.5v-3C3,11.2,3.2,11,3.5,11z" />
                      </svg>
                  </span>
                  <span class="filters-button__title">Фильтр</span>
                  <span class="filters-button__counter">3</span>
                </button>
                <div class="view-options__layout layout-switcher">
                  <div class="layout-switcher__list">
                    <button type="button" class="layout-switcher__button" data-layout="grid" data-with-features="false">
                      <svg width="16" height="16">
                        <path d="M15.2,16H9.8C9.4,16,9,15.6,9,15.2V9.8C9,9.4,9.4,9,9.8,9h5.4C15.6,9,16,9.4,16,9.8v5.4C16,15.6,15.6,16,15.2,16z M15.2,7
        H9.8C9.4,7,9,6.6,9,6.2V0.8C9,0.4,9.4,0,9.8,0h5.4C15.6,0,16,0.4,16,0.8v5.4C16,6.6,15.6,7,15.2,7z M6.2,16H0.8
        C0.4,16,0,15.6,0,15.2V9.8C0,9.4,0.4,9,0.8,9h5.4C6.6,9,7,9.4,7,9.8v5.4C7,15.6,6.6,16,6.2,16z M6.2,7H0.8C0.4,7,0,6.6,0,6.2V0.8
        C0,0.4,0.4,0,0.8,0h5.4C6.6,0,7,0.4,7,0.8v5.4C7,6.6,6.6,7,6.2,7z" />
                      </svg>
                    </button>
                    <button type="button" class="layout-switcher__button" data-layout="grid" data-with-features="true">
                      <svg width="16" height="16">
                        <path d="M16,0.8v14.4c0,0.4-0.4,0.8-0.8,0.8H9.8C9.4,16,9,15.6,9,15.2V0.8C9,0.4,9.4,0,9.8,0l5.4,0C15.6,0,16,0.4,16,0.8z M7,0.8
        v14.4C7,15.6,6.6,16,6.2,16H0.8C0.4,16,0,15.6,0,15.2L0,0.8C0,0.4,0.4,0,0.8,0l5.4,0C6.6,0,7,0.4,7,0.8z" />
                      </svg>
                    </button>
                    <button type="button" class="layout-switcher__button layout-switcher__button--active" data-layout="list" data-with-features="false">
                      <svg width="16" height="16">
                        <path d="M15.2,16H0.8C0.4,16,0,15.6,0,15.2V9.8C0,9.4,0.4,9,0.8,9h14.4C15.6,9,16,9.4,16,9.8v5.4C16,15.6,15.6,16,15.2,16z M15.2,7
        H0.8C0.4,7,0,6.6,0,6.2V0.8C0,0.4,0.4,0,0.8,0h14.4C15.6,0,16,0.4,16,0.8v5.4C16,6.6,15.6,7,15.2,7z" />
                      </svg>
                    </button>
                    <button type="button" class="layout-switcher__button" data-layout="table" data-with-features="false">
                      <svg width="16" height="16">
                        <path d="M15.2,16H0.8C0.4,16,0,15.6,0,15.2v-2.4C0,12.4,0.4,12,0.8,12h14.4c0.4,0,0.8,0.4,0.8,0.8v2.4C16,15.6,15.6,16,15.2,16z
         M15.2,10H0.8C0.4,10,0,9.6,0,9.2V6.8C0,6.4,0.4,6,0.8,6h14.4C15.6,6,16,6.4,16,6.8v2.4C16,9.6,15.6,10,15.2,10z M15.2,4H0.8
        C0.4,4,0,3.6,0,3.2V0.8C0,0.4,0.4,0,0.8,0h14.4C15.6,0,16,0.4,16,0.8v2.4C16,3.6,15.6,4,15.2,4z" />
                      </svg>
                    </button>
                  </div>
                </div>
                <?php if(0) { ?>
                <div class="view-options__legend">
                  Показано 0 из 0 товаров
                </div>
                <?php } ?>
                <div class="view-options__spring"></div>
                <div class="view-options__select">
                  <label for="view-option-sort">Сортировка:</label>
                  <form on-change="submit()">
                  <select id="view-option-sort" class="form-control form-control-sm" name="">
                    <option value="">Цена (по убыванию)</option>
                    <option value="">Цена (по возрастанию)</option>
                  </select>
                  </form>
                </div>
                <div class="view-options__select">
                  <label for="view-option-limit">Показать:</label>
                  <select id="view-option-limit" class="form-control form-control-sm" name="">
                    <option value="">10</option>
                    <option value="">20</option>
                    <option value="">50</option>
                  </select>
                </div>
              </div>
              <div class="view-options__body view-options__body--filters">
                <div class="view-options__label">Фильтры</div>
                <div class="applied-filters">
                  <ul class="applied-filters__list">
                    <li class="applied-filters__item">
                      <a href="" class="applied-filters__button applied-filters__button--filter">
                        Популярное: По отзывам
                        <svg width="9" height="9">
                          <path d="M9,8.5L8.5,9l-4-4l-4,4L0,8.5l4-4l-4-4L0.5,0l4,4l4-4L9,0.5l-4,4L9,8.5z" />
                        </svg>
                      </a>
                    </li>
                    <li class="applied-filters__item">
                      <a href="" class="applied-filters__button applied-filters__button--filter">
                        Цвет: Красный
                        <svg width="9" height="9">
                          <path d="M9,8.5L8.5,9l-4-4l-4,4L0,8.5l4-4l-4-4L0.5,0l4,4l4-4L9,0.5l-4,4L9,8.5z" />
                        </svg>
                      </a>
                    </li>
                    <li class="applied-filters__item">
                      <button type="button" class="applied-filters__button applied-filters__button--clear">Очистить фильтр</button>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="products-view__list products-list products-list--grid--4" data-layout="list" data-with-features="false">
              <div class="products-list__head">
                <div class="products-list__column products-list__column--image">Изображение</div>
                <div class="products-list__column products-list__column--meta">Артикул</div>
                <div class="products-list__column products-list__column--product">Наименование</div>
                <div class="products-list__column products-list__column--rating">Рейтинг 1</div>
                <div class="products-list__column products-list__column--price">Цена</div>
              </div>
              <div class="products-list__content">

                <?php foreach ($products as $item) { ?>
                  <?= ProductItemsWidget::widget(['product' => $item, 'images' => $item->getFiles()->all()]) ?>
                <?php } ?>

              </div>
            </div>
            <div class="products-view__pagination">
              <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item disabled">
                    <a class="page-link page-link--with-arrow" href="" aria-label="Previous">
                      <span class="page-link__arrow page-link__arrow--left" aria-hidden="true"><svg width="7" height="11">
                          <path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />
                      </svg>
                      </span>
                    </a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item active" aria-current="page">
                    <span class="page-link">
                        2
                        <span class="sr-only">(current)</span>
                    </span>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">4</a></li>
                  <li class="page-item page-item--dots">
                    <div class="pagination__dots"></div>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">9</a></li>
                  <li class="page-item">
                    <a class="page-link page-link--with-arrow" href="" aria-label="Next">
                      <span class="page-link__arrow page-link__arrow--right" aria-hidden="true"><svg width="7" height="11">
                              <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9C-0.1,9.8-0.1,10.4,0.3,10.7z" />
                          </svg>
                      </span>
                    </a>
                  </li>
                </ul>
              </nav>
              <div class="products-view__pagination-legend">
                Показано 0 из 0 товаров
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="block-space block-space--layout--before-footer"></div>
  </div>
</div>


