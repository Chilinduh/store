  <div class="block-space block-space--layout--divider-nl"></div>
  <div class="block block-brands block-brands--layout--columns-8-full">
    <div class="container">
      <ul class="block-brands__list">
        <?php foreach ($brands as $brand) { ?>
        <?php if(isset($brand['image']['thumbnail'])) { ?>
        <li class="block-brands__item">
          <a href="#" class="block-brands__item-link">
            <img src="<?= $brand['image']['thumbnail'] ?>" alt="">
            <span class="block-brands__item-name hidden">AimParts</span>
          </a>
        </li>
        <li class="block-brands__divider" role="presentation"></li>
        <?php } ?>
        <?php } ?>
      </ul>
    </div>
  </div>
  <?php if(0) { ?>
    <div class="block-space block-space--layout--divider-nl"></div>
    <div class="block block-products-carousel" data-layout="grid-5">
      <div class="container">
        <div class="section-header">
          <div class="section-header__body">
            <h2 class="section-header__title">Рекомендуемые товары</h2>
            <div class="section-header__spring"></div>
            <ul class="section-header__groups">
              <li class="section-header__groups-item">
                <button type="button" class="section-header__groups-button section-header__groups-button--active">Все
                </button>
              </li>
              <li class="section-header__groups-item">
                <button type="button" class="section-header__groups-button">Электроинструменты</button>
              </li>
              <li class="section-header__groups-item">
                <button type="button" class="section-header__groups-button">Ручные инструменты</button>
              </li>
              <li class="section-header__groups-item">
                <button type="button" class="section-header__groups-button">Сантехника</button>
              </li>
            </ul>
            <div class="section-header__arrows">
              <div class="arrow section-header__arrow section-header__arrow--prev arrow--prev">
                <button class="arrow__button" type="button">
                  <svg width="7" height="11">
                    <path
                      d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/>
                  </svg>
                </button>
              </div>
              <div class="arrow section-header__arrow section-header__arrow--next arrow--next">
                <button class="arrow__button" type="button">
                  <svg width="7" height="11">
                    <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
                  </svg>
                </button>
              </div>
            </div>
            <div class="section-header__divider"></div>
          </div>
        </div>
        <?php include_once(Yii::getAlias('@frontend/views/site/_carousel.php')); ?>
      </div>
    </div>
  <?php } ?>
  <div class="block-space block-space--layout--divider-nl"></div>
