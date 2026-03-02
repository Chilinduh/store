<div class="header__navbar-departments">
  <div class="departments">
    <button class="departments__button" type="button">
      <span class="departments__button-icon"><svg width="16px" height="12px">
              <path
                d="M0,7L0,5L16,5L16,7L0,7ZM0,0L16,0L16,2L0,2L0,0ZM12,12L0,12L0,10L12,10L12,12Z"/>
          </svg>
      </span>
      <span class="departments__button-title">Каталог</span>
      <span class="departments__button-arrow">
        <svg width="9px" height="6px">
          <path
            d="M0.2,0.4c0.4-0.4,1-0.5,1.4-0.1l2.9,3l2.9-3c0.4-0.4,1.1-0.4,1.4,0.1c0.3,0.4,0.3,0.9-0.1,1.3L4.5,6L0.3,1.6C-0.1,1.3-0.1,0.7,0.2,0.4z"/>
        </svg>
      </span>
    </button>
    <div class="departments__menu">
      <div class="departments__arrow"></div>
      <div class="departments__body">
        <ul class="departments__list">
          <li class="departments__list-padding" role="presentation"></li>
          <?php foreach ($categories as $category) { ?>
            <li class="departments__item departments__item--submenu--megamenu departments__item--has-submenu">
              <a href="/catalog" class="departments__item-link">
                <?= $category->name ?>
                <span class="departments__item-arrow">
                <svg width="7" height="11">
                      <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
                  </svg>
              </span>
              </a>
              <?php foreach ($category as $sub) { ?>
                <div class="departments__item-menu">
                  <div class="megamenu departments__megamenu departments__megamenu--size--md">
                    <div class="megamenu__image">
                      <img src="/images/departments/departments-3.jpg" alt="">
                    </div>
                    <div class="row">
                      <div class="col-4">
                        <ul class="megamenu__links megamenu-links megamenu-links--root">
                          <li class="megamenu-links__item megamenu-links__item--has-submenu">
                            <a class="megamenu-links__item-link" href="/catalog"><?= $sub->name ?></a>
                            <ul class="megamenu-links">
                              <?php foreach ($sub as $child) { ?>
                                <li class="megamenu-links__item">
                                  <a class="megamenu-links__item-link" href="/list"><?= $child->name ?></a>
                                </li>
                              <?php } ?>
                            </ul>
                          </li>

                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </li>
          <?php } ?>
          <li class="departments__item departments__item--submenu--megamenu departments__item--has-submenu">
            <a href="/catalog" class="departments__item-link">
              Инструменты
              <span class="departments__item-arrow"><svg width="7" height="11">
                                                        <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
                                                    </svg>
                                                </span>
            </a>
          </li>
          <?php if (0) { ?>
            <li class="departments__item">
              <a href="/catalog" class="departments__item-link">
                Клатчи
              </a>
            </li>
            <li class="departments__item">
              <a href="/catalog" class="departments__item-link">
                Топливные системы
              </a>
            </li>
            <li class="departments__item">
              <a href="/catalog" class="departments__item-link">
                Рулевое управление
              </a>
            </li>
            <li class="departments__item">
              <a href="/catalog" class="departments__item-link">
                Подвеска
              </a>
            </li>
            <li class="departments__item">
              <a href="/catalog" class="departments__item-link">
                Кузовные части
              </a>
            </li>
            <li class="departments__item">
              <a href="/catalog" class="departments__item-link">
                Воздушные фильтры
              </a>
            </li>
            <li class="departments__list-padding" role="presentation"></li>
          <?php } ?>
        </ul>
        <div class="departments__menu-container"></div>
      </div>
    </div>
  </div>
</div>
