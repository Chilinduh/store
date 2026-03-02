<?php if(count($products)) { ?>
<div class="card widget widget-products d-none d-lg-block">
  <div class="widget__header">
    <h4><?= $title ?></h4>
  </div>
  <div class="widget-products__list">

    <?php foreach ($products as $product) {

      ?>
      <div class="widget-products__item">
        <div class="widget-products__image image image--type--product">
          <a href="/catalog/<?= $product['category_id'] ?>/<?= $product['id'] ?>" class="image__body">
            <img class="image__tag" src="<?= $product['images'][0]['original']??'/images/no-photo.jpg' ?>" alt="">
          </a>
        </div>
        <div class="widget-products__info">
          <div class="widget-products__name">
            <a href="/catalog/<?= $product['category_id'] ?>/<?= $product['id'] ?>"><?= $product['name'] ?></a>
          </div>
          <div class="widget-products__prices">
            <div class="widget-products__price widget-products__price--current"><?= $product['price'] ?> руб.</div>
          </div>
        </div>
      </div>
    <?php } ?>

  </div>
</div>
<?php } ?>
