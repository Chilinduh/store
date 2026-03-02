<div class="widget-filters__item">
  <div class="filter filter--opened" data-collapse-item>
    <button type="button" class="filter__title" data-collapse-trigger>
      <?= $title ?>
      <span class="filter__arrow">
        <svg width="12px" height="7px">
            <path
              d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/>
        </svg>
      </span>
    </button>
    <div class="filter__body" data-collapse-content>
      <div class="filter__container">
        <div class="filter-list">
          <div class="filter-list__list">
            <?php if ($items) { ?>
              <?php foreach ($items as $item) { ?>
                <label class="filter-list__item ">
                  <span class="input-check filter-list__input">
                      <span class="input-check__body">
                          <input class="input-check__input" name="<?= $field ?>[<?= $item['id'] ?>]"
                                 type="checkbox" <?=  isset($value[$item['id']]) ? 'checked="checked"' : '' ?>>
                          <span class="input-check__box"></span>
                          <span class="input-check__icon">
                            <svg width="9px" height="7px">
                                <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/>
                            </svg>
                          </span>
                      </span>
                  </span>
                  <span class="filter-list__title"><?= $item['name'] ?></span>
                  <span class="filter-list__counter"></span>
                </label>
              <?php } ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
