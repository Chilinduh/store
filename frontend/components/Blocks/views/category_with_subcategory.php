<?php


?>

<div class="block-categories__body">
  <div class="container">
    <div class="block-categories__list">
      <?php foreach (array_slice($data, 0, 6) as $catalog) { ?>
      <div class="block-categories__item category-card category-card--layout--classic">
        <div class="category-card__body">
          <div class="category-card__content">
            <div class="category-card__image image image--type--category">
              <a href="/catalog/<?= $catalog['id'] ?>" class="image__body">
                <img class="image__tag" src="<?= $catalog['image']['original'] ?? Yii::$app->params['noPhoto'] ?>" alt="">
              </a>
            </div>
            <div class="category-card__info">
              <div class="category-card__name">
                <a href="/catalog/<?= $catalog['id'] ?>"><?= $catalog['name'] ?></a>
              </div>
              <ul class="category-card__children">
                <?php $count = 0; ?>
                <?php foreach (array_slice($catalog['items'], 0, 6) as $item) {

                    foreach ($catalog['items'] as $subs) {
                      foreach ($subs['items'] as $sub) {
                        $count += $sub['count'];
                      }
                    }

                  ?>
                <li><a href="/catalog/<?= $item['id'] ?>"> <?= $item['name'] ?> <sup class="category-sup"></sup></a></li>
                <?php } ?>
              </ul>
              <div class="category-card__actions">
                <a href="/catalog/<?= $catalog['id'] ?>" class="category-card__link">Подробнее</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>
