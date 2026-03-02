<?php if(isset($categories) && count($categories)) { ?>
<div class="widget-filters__item">
  <div class="filter filter--opened" data-collapse-item>
    <button type="button" class="filter__title" data-collapse-trigger>
      Категории товаров
      <span class="filter__arrow"><svg width="12px" height="7px">
          <path
            d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/>
      </svg></span>
    </button>
    <div class="filter__body" data-collapse-content>
      <div class="filter__container">
        <div class="filter-categories">

          <ul class="filter-categories__list">
            <?php if (0) { ?>
              <li class="filter-categories__item filter-categories__item--parent">
                        <span class="filter-categories__arrow">
                          <svg width="6" height="9">
                              <path d="M5.7,8.7L5.7,8.7c-0.4,0.4-0.9,0.4-1.3,0L0,4.5l4.4-4.2c0.4-0.4,0.9-0.3,1.3,0l0,0c0.4,0.4,0.4,1,0,1.3l-3,2.9l3,2.9
C6.1,7.8,6.1,8.4,5.7,8.7z"/>
                          </svg>
                        </span>
                <a href="">Строительство и ремонт</a>
                <div class="filter-categories__counter">254</div>
              </li>

              <li class="filter-categories__item filter-categories__item--parent">
                        <span class="filter-categories__arrow"><svg width="6"
                                                                    height="9">
                                <path d="M5.7,8.7L5.7,8.7c-0.4,0.4-0.9,0.4-1.3,0L0,4.5l4.4-4.2c0.4-0.4,0.9-0.3,1.3,0l0,0c0.4,0.4,0.4,1,0,1.3l-3,2.9l3,2.9
C6.1,7.8,6.1,8.4,5.7,8.7z"/>
                            </svg>
                        </span>
                <a href="">Инструменты</a>
                <div class="filter-categories__counter">75</div>
              </li>
            <?php } ?>

            <?php

            foreach ($categories as $category) { ?>

              <li class="filter-categories__item filter-categories__item--current">
                <a href=""><?= $category['label'] ?></a>
                <div class="filter-categories__counter"><?= count($category['items']) ?></div>
              </li>

              <?php foreach ($category['items'] as $item) {  ?>
                <li class="filter-categories__item filter-categories__item--child">
                  <a href=""><?= $item['label'] ?></a>
                  <div class="filter-categories__counter"><?= $item['count'] ?></div>
                </li>
              <?php } ?>
            <?php } ?>

          </ul>

        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
