<?php

use app\components\SliderWidget;
use app\components\ItemsWidget;
use common\components\Catalog;
use app\components\ProductItemsWidget;
use frontend\components\Filter\FilterWidget;
use frontend\components\BreadCrumbsWidget;
use frontend\components\CatalogMenuLeft\CatalogMenuLeftWidget;
use frontend\components\ProductLeftSide\ProductLeftSideWidget;
use common\models\Property;
use yii\widgets\LinkPager;
use yii\data\Pagination;

/* @var $this yii\web\View */

$get = \Yii::$app->getRequest()->get();
$getParams = [];
foreach (explode('&', http_build_query($get)) as $key => $str) {
  list($key, $value) = explode('=', $str, 2);
  $getParams[urldecode($key)] = $value;
}

?>

<? //=  $this->render('section', ['products' => $products, 'model' => $model]); ?>
<div class="block-header block-header--has-breadcrumb block-header--has-title">
  <div class="container">
    <div class="block-header__body">
      <?= BreadCrumbsWidget::widget(['breadCrumbs' => $breadCrumbs]) ?>
    </div>
  </div>
  <div class="block-split block-split--has-sidebar">

    <div class="container">
      <div class="block-split__row row no-gutters">

        <div class="block-split__item block-split__item-sidebar col-auto">
          <div class="sidebar">
            <div class="sidebar__backdrop"></div>
            <div class="sidebar__body">

              <div class="sidebar__content">
                <div class="widget widget-filters widget-filters--offcanvas--mobile" data-collapse
                     data-collapse-opened-class="filter--opened">
                  <?php if (0) { ?>
                    <div class="widget__header widget-filters__header">
                      <h4>Фильтр</h4>
                    </div>
                  <?php } ?>
                    <div class="widget-filters__list">
                      <?php //include_once(Yii::getAlias('@frontend/views/site/_categories.php')); ?>
                      <?php //require(Yii::getAlias('@frontend/views/site/_category-filter.php')); ?>
                      <?php //if (0) {  ?>
                      <?= CatalogMenuLeftWidget::widget([
                        'catalog' => $catalog,
                        'category' => $category,
                      ]); ?>
                      <?php
                      //                    $this->context->render('@frontend/views/site/_category_filter.php', [
                      //                      'products' => $products,
                      //                      'categories' => $categories,
                      //                      'category' => $category,
                      //                    ]);

                      $catalogComponent = new Catalog();
                      if ($catalogComponent->getCategoryLvl($category['id']) > 0 ) {

                        echo FilterWidget::widget([
                          'filters' => $filters
                        ]);
                      }
                      ?>

                      <?php //} ?>
                    </div>
                    <?php if (count($filters) > 0 && $catalogComponent->getCategoryLvl($category['id']) > 0) { ?>
                      <div class="widget-filters__actions d-flex">
                        <button class="btn btn-primary btn-sm button-search">Поиск</button>
                      </div>
                    <?php } ?>
                </div>

                <?= ProductLeftSideWidget::widget([
                  'title' => 'Популярные товары',
                  'mode' => 'by-views',
                  'category_id' => $category['id']
                ]); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="block-split__item block-split__item-content col-auto">
          <?php

          $sub = array_values($sub);

          if ($showSubGroupImages && $sub[0]['lvl'] <= Yii::$app->params['maxLevel']) { ?>
            <div class="block">
              <div class="categories-list categories-list--layout--columns-5-sidebar">
                <ul class="categories-list__body">
                  <?php foreach ($sub as $cat) { ?>

                    <?php if(1 || $cat['count']) { ?>
                      <li class="categories-list__item">
                        <a href="/catalog/<?= $cat['id'] ?>">
                          <div class="image image--type--category">
                            <div class="image__body">
                              <img class="image__tag" src="<?= $cat['image']['original'] ?? '/images/no-photo.jpg' ?>"
                                   alt="">
                            </div>
                          </div>
                          <div class="categories-list__item-name"><?= $cat['name'] ?></div>
                        </a>
                      </li>
                      <li class="categories-list__divider"></li>
                    <?php } ?>
                  <?php } ?>

                </ul>
              </div>
            </div>
            <div class="block-space block-space--layout--divider-nl"></div>
          <?php } ?>
          <div class="block">

            <?php if (count($dataProvider->getModels())) { ?>
              <div class="products-view">
                <div class="products-view__options view-options">
                  <div class="view-options__body">

                    <div class="view-options__spring"></div>
                    <form style="display:flex" action="<?= Yii::$app->request->url ?>" on-change="submit()">
                      <div class="view-options__select">
                        <label for="view-option-sort">Сортировка:</label>
                        <select onchange="this.form.submit()" class="form-control form-control-sm" name="sort">
                          <option <?= isset($getParams['sort']) && $getParams['sort'] == '-price' ? 'selected' : '' ?>
                            value="-price">Цена (по убыванию)
                          </option>
                          <option <?= isset($getParams['sort']) && $getParams['sort'] == 'price' ? 'selected' : '' ?>
                            value="price">Цена (по возрастанию)
                          </option>
                        </select>
                      </div>
                      <div class="view-options__select">
                        <label for="view-option-limit">Показать:</label>
                        <select onchange="this.form.submit()" class="form-control form-control-sm" name="per-page">
                          <option <?= isset($getParams['per-page']) && $getParams['per-page'] == 10 ? 'selected' : '' ?>
                            value="10">10
                          </option>
                          <option <?= isset($getParams['per-page']) && $getParams['per-page'] == 20 ? 'selected' : '' ?>
                            value="20">20
                          </option>
                          <option <?= isset($getParams['per-page']) && $getParams['per-page'] == 50 ? 'selected' : '' ?>
                            value="50">50
                          </option>
                        </select>
                    </form>
                  </div>
                </div>

              </div>
              <div class="products-view__list products-list products-list--grid--4" data-layout="list"
                   data-with-features="false">
                <div class="products-list__head">
                  <div class="products-list__column products-list__column--image">Изображение</div>
                  <div class="products-list__column products-list__column--meta">Артикул</div>
                  <div class="products-list__column products-list__column--product">Наименование</div>
                  <div class="products-list__column products-list__column-  -rating">Рейтинг</div>
                  <div class="products-list__column products-list__column--price">Цена</div>
                </div>
                <div class="products-list__content">

                  <?php foreach ($dataProvider->getModels() as $item) { ?>
                    <?= ProductItemsWidget::widget(['product' => $item, 'images' => $item['images'], 'cartForm' => $cartForm]) ?>
                  <?php } ?>

                </div>
              </div>
            <?php } else { ?>

              <div class="container container--max--xl">
                <div class="wishlist">
                  <div style="padding:10px; text-align: center">Товаров не найдено</div>
                </div>
              </div>

            <?php } ?>

            <?php if ($dataProvider->getTotalCount() > 10) { ?>
              <div class="products-view__pagination">
                <nav aria-label="Page navigation example">
                  <?php

                  $pagination = new Pagination();
                  $pagination->defaultPageSize = 10;
                  $pagination->totalCount = $dataProvider->getTotalCount();
                  $pagination->params = array_merge([], Yii::$app->request->get());

                  echo LinkPager::widget([
                    'pagination' => $pagination,
                    'prevPageLabel' => false,
                    'nextPageLabel' => false,
                    //'defaultPageSize' => 10,
                    //'maxButtonCount' => 2,
                    'linkOptions' => [
                      'class' => 'page-link'
                    ],
                    'linkContainerOptions' => [
                      'class' => 'page-item'
                    ],
                    'options' => [
                      'class' => 'pagination',
                    ],
                  ]);

                  ?>
                  <ul class="hide pagination">
                    <li class="page-item disabled">
                      <a class="page-link page-link--with-arrow" href="" aria-label="Previous">
                      <span class="page-link__arrow page-link__arrow--left" aria-hidden="true">
                        <svg width="7"
                             height="11">
                          <path
                            d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/>
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
                      <span class="page-link__arrow page-link__arrow--right" aria-hidden="true"><svg width="7"
                                                                                                     height="11">
                              <path
                                d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
                          </svg>
                      </span>
                      </a>
                    </li>
                  </ul>
                </nav>
                <div class="hide products-view__pagination-legend">
                  Показано 0 из 0 товаров
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>

    </div>
    <div class="block-space block-space--layout--before-footer"></div>
  </div>
</div>


