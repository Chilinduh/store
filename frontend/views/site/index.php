<?php

use kartik\form\ActiveForm;
use common\models\BlocksTypes;
use common\models\Blocks;
use common\models\Pages;
use common\models\Property;
use frontend\components\Blocks\BlocksWidget;
use frontend\components\BrandsWidget;

Yii::$app->metaTags->register('main');

?>

<?php if ($block = Blocks::find()->where(['block_type_id' => BlocksTypes::BLOCK_BANNERS_IMAGES])->andWhere(['show' => 1])->one()) { ?>
  <?= BlocksWidget::widget(['model' => $block]) ?>
<?php } ?>

<?php if ($block = Blocks::find()->where(['block_type_id' => BlocksTypes::BLOCK_BANNERS_CAROUSEL])->andWhere(['show' => 1])->one()) { ?>
  <?= BlocksWidget::widget(['model' => $block]) ?>
<?php } ?>

<?php if ($block = Blocks::find()->where(['block_type_id' => BlocksTypes::BLOCK_BANNERS_BRANDS])->andWhere(['show' => 1])->one()) { ?>
  <?= BrandsWidget::widget() ?>
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

  <div class="block-space block-space--layout--divider-nl"></div>

<?php

  $blockLeft = Blocks::find()->where(['block_type_id' => BlocksTypes::BLOCK_BANNERS_LEFT])->one();
  $blockRight = Blocks::find()->where(['block_type_id' => BlocksTypes::BLOCK_BANNERS_RIGHT])->one();

  if ($blockLeft || $blockRight) { ?>
  <?= BlocksWidget::widget([
    'model' => $blockLeft,
    'left' => $blockLeft,
    'right' => $blockRight
  ]) ?>
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

