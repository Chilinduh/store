<?php foreach ($products as $product) { ?>
  <a class="suggestions__item suggestions__product" href="/catalog/<?= $product['category_id'] ?>/<?= $product['id'] ?>">
    <div class="suggestions__product-image image image--type--product">
      <div class="image__body">
        <img class="image__tag" src="<?= isset($product['images'][0]) ? $product['images'][0]['thumbnail'] : '/images/no-photo.jpg'; ?>" alt="">
      </div>
    </div>
    <div class="suggestions__product-info">
      <div class="suggestions__product-name"><?= $product['name'] ?></div>
    </div>
    <div class="suggestions__product-price"><?= $product['price'] ?></div>
  </a>
<?php } ?>
