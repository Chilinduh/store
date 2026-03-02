<div class="categories-list categories-list--layout--columns-6-full">
  <ul class="categories-list__body">
    <?php foreach (array_slice($data, 0, 6) as $item) { ?>
      <li class="categories-list__item">
        <a href="/catalog/<?= $item->id ?>">
          <div class="image image--type--category">
            <div class="image__body">
              <img class="image__tag" src="<?= $item->image->original ?? Yii::$app->params['noPhoto'] ?>" alt="">
            </div>
          </div>
          <div class="categories-list__item-name"><?= $item->name ?></div>
        </a>
        <div class="categories-list__item-products"><?= $item['productsCount']??0 ?> товаров</div>
      </li>
      <li class="categories-list__divider"></li>
    <?php } ?>

  </ul>
</div>
