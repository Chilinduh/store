<div class="block-header block-header--has-breadcrumb block-header--has-title">
  <div class="container">
    <div class="block-header__body">

      <?php include_once(Yii::getAlias('@frontend/views/site/breadcrumb.php')); ?>
      <h1 class="block-header__title">Избранное</h1>
    </div>
  </div>
</div>
<div class="block">
  <div class="container container--max--xl">
    <div class="wishlist">
      <table class="wishlist__table">
        <thead class="wishlist__head">
        <tr class="wishlist__row wishlist__row--head">
          <th class="wishlist__column wishlist__column--head wishlist__column--image">Изображение</th>
          <th class="wishlist__column wishlist__column--head wishlist__column--product">Наименование</th>
          <th class="wishlist__column wishlist__column--head wishlist__column--stock">Наличие</th>
          <th class="wishlist__column wishlist__column--head wishlist__column--price">Цена</th>
          <th class="wishlist__column wishlist__column--head wishlist__column--button"></th>
          <th class="wishlist__column wishlist__column--head wishlist__column--remove"></th>
        </tr>
        </thead>
        <tbody class="wishlist__body">
        <tr class="wishlist__row wishlist__row--body">
          <td class="wishlist__column wishlist__column--body wishlist__column--image">
            <div class="image image--type--product">
              <a href="/products/view" class="image__body">
                <img class="image__tag" src="/images/products/product-1-160x160.jpg" alt="">
              </a>
            </div>
          </td>
          <td class="wishlist__column wishlist__column--body wishlist__column--product">
            <div class="wishlist__product-name">
              <a href="/products/view">Комплект свечей зажигания Brandix ASR-400</a>
            </div>
            <div class="wishlist__product-rating">
              <div class="wishlist__product-rating-stars">
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
              <div class="wishlist__product-rating-title">3 отзыва</div>
            </div>
          </td>
          <td class="wishlist__column wishlist__column--body wishlist__column--stock">
            <div class="status-badge status-badge--style--success status-badge--has-text">
              <div class="status-badge__body">
                <div class="status-badge__text">на складе</div>
              </div>
            </div>
          </td>
          <td class="wishlist__column wishlist__column--body wishlist__column--price">
            $19.00
          </td>
          <td class="wishlist__column wishlist__column--body wishlist__column--button">
            <button type="button" class="btn btn-sm btn-primary">В корзину</button>
          </td>
          <td class="wishlist__column wishlist__column--body wishlist__column--remove">
            <button type="button" class="wishlist__remove btn btn-sm btn-muted btn-icon">
              <svg width="12" height="12">
                <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
	c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
	C11.2,9.8,11.2,10.4,10.8,10.8z" />
              </svg>
            </button>
          </td>
        </tr>
        <tr class="wishlist__row wishlist__row--body">
          <td class="wishlist__column wishlist__column--body wishlist__column--image">
            <div class="image image--type--product">
              <a href="/products/view" class="image__body">
                <img class="image__tag" src="/images/products/product-2-160x160.jpg" alt="">
              </a>
            </div>
          </td>
          <td class="wishlist__column wishlist__column--body wishlist__column--product">
            <div class="wishlist__product-name">
              <a href="/products/view">Тормозной комплект Brandix BDX-750Z370-S</a>
            </div>
            <div class="wishlist__product-rating">
              <div class="wishlist__product-rating-stars">
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
              <div class="wishlist__product-rating-title">22 отзыва</div>
            </div>
          </td>
          <td class="wishlist__column wishlist__column--body wishlist__column--stock">
            <div class="status-badge status-badge--style--success status-badge--has-text">
              <div class="status-badge__body">
                <div class="status-badge__text">на складе</div>
              </div>
            </div>
          </td>
          <td class="wishlist__column wishlist__column--body wishlist__column--price">
            $224.00
          </td>
          <td class="wishlist__column wishlist__column--body wishlist__column--button">
            <button type="button" class="btn btn-sm btn-primary">В корзину</button>
          </td>
          <td class="wishlist__column wishlist__column--body wishlist__column--remove">
            <button type="button" class="wishlist__remove btn btn-sm btn-muted btn-icon">
              <svg width="12" height="12">
                <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
	c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
	C11.2,9.8,11.2,10.4,10.8,10.8z" />
              </svg>
            </button>
          </td>
        </tr>
        <tr class="wishlist__row wishlist__row--body">
          <td class="wishlist__column wishlist__column--body wishlist__column--image">
            <div class="image image--type--product">
              <a href="/products/view" class="image__body">
                <img class="image__tag" src="/images/products/product-3-160x160.jpg" alt="">
              </a>
            </div>
          </td>
          <td class="wishlist__column wishlist__column--body wishlist__column--product">
            <div class="wishlist__product-name">
              <a href="/products/view">Левая фара Brandix Z54</a>
            </div>
            <div class="wishlist__product-rating">
              <div class="wishlist__product-rating-stars">
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
              <div class="wishlist__product-rating-title">14 отзывов</div>
            </div>
          </td>
          <td class="wishlist__column wishlist__column--body wishlist__column--stock">
            <div class="status-badge status-badge--style--success status-badge--has-text">
              <div class="status-badge__body">
                <div class="status-badge__text">на складе</div>
              </div>
            </div>
          </td>
          <td class="wishlist__column wishlist__column--body wishlist__column--price">
            $349.00
          </td>
          <td class="wishlist__column wishlist__column--body wishlist__column--button">
            <button type="button" class="btn btn-sm btn-primary">В корзину</button>
          </td>
          <td class="wishlist__column wishlist__column--body wishlist__column--remove">
            <button type="button" class="wishlist__remove btn btn-sm btn-muted btn-icon">
              <svg width="12" height="12">
                <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
	c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
	C11.2,9.8,11.2,10.4,10.8,10.8z" />
              </svg>
            </button>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="block-space block-space--layout--before-footer"></div>
