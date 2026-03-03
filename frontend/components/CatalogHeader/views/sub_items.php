
<?php if($category['items']) { ?>
<div class="departments__item-menu">
  <div class="megamenu departments__megamenu departments__megamenu--size--xl <?= $hover ? 'departments__megamenu--open' : '' ?>">

    <div class="row">
      <?php foreach ($category['items'] as $subCat) { ?>
        <div class="col-1of2" style="min-width:320px !important">
          <ul class="megamenu__links megamenu-links megamenu-links--root">
            <?php foreach ($subCat as $cat) { ?>
              <li class="megamenu-links__item <?= is_array($cat['items']) && array_sum(array_column($cat['items'], 'count')) > 0 ? 'megamenu-links__item--has-submenu' : '' ?>">
                <a class="megamenu-links__item-link"
                   href="/catalog/<?= $cat['id'] ?>"><?= $cat['name'] ?><sup class="category-sup"><?= $cat['count'] ?></sup></a>

                <?php
                if (isset($cat['items']) && count($cat['items']) > 0) { ?>
                  <ul class="megamenu-links">
                    <?php foreach ($cat['items'] as $child) { ?>
                      <?php if ($child['count']) { ?>
                        <li class="megamenu-links__item">
                          <a class="megamenu-links__item-link" href="/catalog/<?= $child['id'] ?>"><?= $child['name'] ?> </a>
                          <sup class="category-sup"><?= $child['count'] ?></sup>
                        </li>
                      <?php } ?>
                    <?php } ?>
                  </ul>
                <?php } ?>
              </li>
            <?php } ?>
          </ul>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
<?php } ?>
