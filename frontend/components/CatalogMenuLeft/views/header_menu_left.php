<div class="block-split__row row no-gutters">
  <div class="block-split__item block-split__item-sidebar col-auto">
    <div class="card widget widget-categories-list">
      <div class="widget-categories-list__body" data-collapse
           data-collapse-opened-class="widget-categories-list--open">
        <ul class="widget-categories-list__root">
          <?php
          foreach ($catalog as $cat) { ?>
            <li class="widget-categories-list__root-item widget-categories-list__root-item--has-children"
                data-collapse-item>
              <a href="/catalog/<?= $cat['id'] ?>" class="widget-categories-list__root-link"><?= $cat['name'] ?></a>
              <?php if (isset($cat['items']) && count($cat['items'])) { ?>
                <ul class="widget-categories-list__child">
                  <?php foreach ($cat['items'] as $item) { ?>
<!--                    --><?php //if ($item['count']) { ?>
                      <li class="widget-categories-list__child-item">
                        <a href="/catalog/<?= $item['id'] ?>" class="widget-categories-list__child-link">
                          <?= $item['name'] ?>   <sup class="category-sup"><?= $item['count']??0 ?></sup>
                        </a>
                      </li>
                    <?php } ?>
<!--                  --><?php //} ?>
                </ul>
                <?php if (count($cat['items']) > 5) { ?>
                  <ul class="widget-categories-list__child" data-collapse-content>
                    <?php foreach (array_slice($cat['items'], 0, 5) as $item) { ?>
                      <li class="widget-categories-list__child-item">
                        <a href="" class="widget-categories-list__child-link"><?= $item['name'] ?>   <sup><?= $item['count']??0 ?></sup></a>
                      </li>
                    <?php } ?>
                  </ul>

                  <button type="button" class="widget-categories-list__show-more" data-collapse-trigger>
                    <span class="widget-categories-list__show-more-expand-text">Показать все</span>
                    <span class="widget-categories-list__show-more-collapse-text">Скрыть часть</span>
                    <span class="widget-categories-list__show-more-arrow">
                            <svg width="9" height="6">
                                <path
                                  d="M0.2,0.4c0.4-0.4,1-0.5,1.4-0.1l2.9,3l2.9-3c0.4-0.4,1.1-0.4,1.4,0.1c0.3,0.4,0.3,0.9-0.1,1.3L4.5,6L0.3,1.6C-0.1,1.3-0.1,0.7,0.2,0.4z"/>
                            </svg>
                        </span>
                  </button>
                <?php } ?>
              <?php } ?>
            </li>
          <?php } ?>

        </ul>
      </div>
    </div>
    <?php if (0) { ?>>
      <div class="card widget widget-products">
        <div class="widget__header">
          <h4>Latest Products</h4>
        </div>
        <div class="widget-products__list">
          <div class="widget-products__item">
            <div class="widget-products__image image image--type--product">
              <a href="product-full.html" class="image__body">
                <img class="image__tag" src="images/products/product-1-64x64.jpg" alt="">
              </a>
            </div>
            <div class="widget-products__info">
              <div class="widget-products__name">
                <a href="product-full.html">Brandix Spark Plug Kit ASR-400</a>
              </div>
              <div class="widget-products__prices">
                <div class="widget-products__price widget-products__price--current">$19.00</div>
              </div>
            </div>
          </div>
          <div class="widget-products__item">
            <div class="widget-products__image image image--type--product">
              <a href="product-full.html" class="image__body">
                <img class="image__tag" src="images/products/product-2-64x64.jpg" alt="">
              </a>
            </div>
            <div class="widget-products__info">
              <div class="widget-products__name">
                <a href="product-full.html">Brandix Brake Kit BDX-750Z370-S</a>
              </div>
              <div class="widget-products__prices">
                <div class="widget-products__price widget-products__price--current">$224.00</div>
              </div>
            </div>
          </div>
          <div class="widget-products__item">
            <div class="widget-products__image image image--type--product">
              <a href="product-full.html" class="image__body">
                <img class="image__tag" src="images/products/product-3-64x64.jpg" alt="">
              </a>
            </div>
            <div class="widget-products__info">
              <div class="widget-products__name">
                <a href="product-full.html">Left Headlight Of Brandix Z54</a>
              </div>
              <div class="widget-products__prices">
                <div class="widget-products__price widget-products__price--new">$349.00</div>
                <div class="widget-products__price widget-products__price--old">$415.00</div>
              </div>
            </div>
          </div>
          <div class="widget-products__item">
            <div class="widget-products__image image image--type--product">
              <a href="product-full.html" class="image__body">
                <img class="image__tag" src="images/products/product-4-64x64.jpg" alt="">
              </a>
            </div>
            <div class="widget-products__info">
              <div class="widget-products__name">
                <a href="product-full.html">Glossy Gray 19" Aluminium Wheel AR-19</a>
              </div>
              <div class="widget-products__prices">
                <div class="widget-products__price widget-products__price--current">$589.00</div>
              </div>
            </div>
          </div>
          <div class="widget-products__item">
            <div class="widget-products__image image image--type--product">
              <a href="product-full.html" class="image__body">
                <img class="image__tag" src="images/products/product-5-64x64.jpg" alt="">
              </a>
            </div>
            <div class="widget-products__info">
              <div class="widget-products__name">
                <a href="product-full.html">Twin Exhaust Pipe From Brandix Z54</a>
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
  <?php if (0) { ?>
    <div class="block-split__item block-split__item-content col-auto">
      <div class="block">
        <div class="categories-list categories-list--layout--columns-5-sidebar">
          <ul class="categories-list__body">

            <?php foreach ($catalog as $cat) { ?>
              <li class="categories-list__item">
                <a href="/catalog/<?= $cat['id'] ?>">
                  <div class="image image--type--category">
                    <div class="image__body">
                      <img class="image__tag" src="<?= $cat['image']['original'] ?>" alt="">
                    </div>
                  </div>
                  <div class="categories-list__item-name"><?= $cat['name'] ?></div>
                </a>
                <div class="categories-list__item-products"><?= $cat['count'] ?> товаров</div>
              </li>
              <li class="categories-list__divider"></li>
            <?php } ?>

          </ul>
        </div>
      </div>

    </div>
  <?php } ?>
</div>
