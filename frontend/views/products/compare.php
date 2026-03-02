<div class="block-header block-header--has-breadcrumb block-header--has-title">
  <div class="container">
    <div class="block-header__body">

      <?php include_once(Yii::getAlias('@frontend/views/site/breadcrumb.php')); ?>
      <h1 class="block-header__title">Сравнить</h1>
    </div>
  </div>
</div>
<div class="block">
  <div class="container">
    <div class="compare card">
      <div class="compare__options-list">
        <div class="compare__option">
          <div class="compare__option-label">Показать:</div>
          <div class="compare__option-control">
            <div class="button-toggle">
              <div class="button-toggle__list">
                <label class="button-toggle__item">
                  <input type="radio" class="button-toggle__input" name="compare-filter" checked>
                  <span class="button-toggle__button">Все</span>
                </label>
                <label class="button-toggle__item">
                  <input type="radio" class="button-toggle__input" name="compare-filter">
                  <span class="button-toggle__button">Различия</span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="compare__option">
          <div class="compare__option-control">
            <button type="button" class="btn btn-secondary btn-xs">Очистить</button>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="compare__table compare-table">
          <tbody>
          <tr class="compare-table__row">
            <th class="compare-table__column compare-table__column--header">Наименование</th>
            <td class="compare-table__column compare-table__column--product">
              <a href="/products/view" class="compare-table__product">
                <div class="compare-table__product-image image image--type--product">
                  <div class="image__body">
                    <img class="image__tag" src="/images/products/product-1-150x150.jpg" alt="">
                  </div>
                </div>
                <div class="compare-table__product-name">
                  Комплект свечей зажигания Brandix ASR-400
                </div>
              </a>
            </td>
            <td class="compare-table__column compare-table__column--product">
              <a href="/products/view" class="compare-table__product">
                <div class="compare-table__product-image image image--type--product">
                  <div class="image__body">
                    <img class="image__tag" src="/images/products/product-2-150x150.jpg" alt="">
                  </div>
                </div>
                <div class="compare-table__product-name">
                  Тормозной комплект Brandix BDX-750Z370-S
                </div>
              </a>
            </td>
            <td class="compare-table__column compare-table__column--product">
              <a href="/products/view" class="compare-table__product">
                <div class="compare-table__product-image image image--type--product">
                  <div class="image__body">
                    <img class="image__tag" src="/images/products/product-3-150x150.jpg" alt="">
                  </div>
                </div>
                <div class="compare-table__product-name">
                  Левая фара Brandix Z54
                </div>
              </a>
            </td>
            <td class="compare-table__column compare-table__column--product">
              <a href="/products/view" class="compare-table__product">
                <div class="compare-table__product-image image image--type--product">
                  <div class="image__body">
                    <img class="image__tag" src="/images/products/product-4-150x150.jpg" alt="">
                  </div>
                </div>
                <div class="compare-table__product-name">
                  Глянцево-серый 19-дюймовый
                </div>
              </a>
            </td>
            <td class="compare-table__column compare-table__column--product">
              <a href="/products/view" class="compare-table__product">
                <div class="compare-table__product-image image image--type--product">
                  <div class="image__body">
                    <img class="image__tag" src="/images/products/product-5-150x150.jpg" alt="">
                  </div>
                </div>
                <div class="compare-table__product-name">
                  Двойная выхлопная труба от Brandix Z54
                </div>
              </a>
            </td>
            <td class="compare-table__column compare-table__column--fake"></td>
          </tr>
          <tr class="compare-table__row">
            <th class="compare-table__column compare-table__column--header">Рейтинг</th>
            <td class="compare-table__column compare-table__column--product">
              <div class="compare-table__rating">
                <div class="compare-table__rating-stars">
                  <div class="rating">
                    <div class="rating__body">
                      <div class="rating__star rating__star--active"></div>
                      <div class="rating__star rating__star--active"></div>
                      <div class="rating__star rating__star--active"></div>
                      <div class="rating__star rating__star--active"></div>
                      <div class="rating__star"></div>
                    </div>
                  </div>
                </div>
                <div class="compare-table__rating-title">На основе 3 отзывов</div>
              </div>
            </td>
            <td class="compare-table__column compare-table__column--product">
              <div class="compare-table__rating">
                <div class="compare-table__rating-stars">
                  <div class="rating">
                    <div class="rating__body">
                      <div class="rating__star rating__star--active"></div>
                      <div class="rating__star rating__star--active"></div>
                      <div class="rating__star rating__star--active"></div>
                      <div class="rating__star rating__star--active"></div>
                      <div class="rating__star rating__star--active"></div>
                    </div>
                  </div>
                </div>
                <div class="compare-table__rating-title">На основе 22 отзывов</div>
              </div>
            </td>
            <td class="compare-table__column compare-table__column--product">
              <div class="compare-table__rating">
                <div class="compare-table__rating-stars">
                  <div class="rating">
                    <div class="rating__body">
                      <div class="rating__star rating__star--active"></div>
                      <div class="rating__star rating__star--active"></div>
                      <div class="rating__star rating__star--active"></div>
                      <div class="rating__star"></div>
                      <div class="rating__star"></div>
                    </div>
                  </div>
                </div>
                <div class="compare-table__rating-title">На основе 14 отзывов</div>
              </div>
            </td>
            <td class="compare-table__column compare-table__column--product">
              <div class="compare-table__rating">
                <div class="compare-table__rating-stars">
                  <div class="rating">
                    <div class="rating__body">
                      <div class="rating__star rating__star--active"></div>
                      <div class="rating__star rating__star--active"></div>
                      <div class="rating__star rating__star--active"></div>
                      <div class="rating__star rating__star--active"></div>
                      <div class="rating__star"></div>
                    </div>
                  </div>
                </div>
                <div class="compare-table__rating-title">На основе 26 отзывов</div>
              </div>
            </td>
            <td class="compare-table__column compare-table__column--product">
              <div class="compare-table__rating">
                <div class="compare-table__rating-stars">
                  <div class="rating">
                    <div class="rating__body">
                      <div class="rating__star rating__star--active"></div>
                      <div class="rating__star rating__star--active"></div>
                      <div class="rating__star rating__star--active"></div>
                      <div class="rating__star rating__star--active"></div>
                      <div class="rating__star"></div>
                    </div>
                  </div>
                </div>
                <div class="compare-table__rating-title">На основе 9 отзывов</div>
              </div>
            </td>
            <td class="compare-table__column compare-table__column--fake"></td>
          </tr>
          <tr class="compare-table__row">
            <th class="compare-table__column compare-table__column--header">Наличие</th>
            <td class="compare-table__column compare-table__column--product">
              <div class="status-badge status-badge--style--success status-badge--has-text">
                <div class="status-badge__body">
                  <div class="status-badge__text">На складе</div>
                </div>
              </div>
            </td>
            <td class="compare-table__column compare-table__column--product">
              <div class="status-badge status-badge--style--success status-badge--has-text">
                <div class="status-badge__body">
                  <div class="status-badge__text">На складе</div>
                </div>
              </div>
            </td>
            <td class="compare-table__column compare-table__column--product">
              <div class="status-badge status-badge--style--success status-badge--has-text">
                <div class="status-badge__body">
                  <div class="status-badge__text">На складе</div>
                </div>
              </div>
            </td>
            <td class="compare-table__column compare-table__column--product">
              <div class="status-badge status-badge--style--success status-badge--has-text">
                <div class="status-badge__body">
                  <div class="status-badge__text">На складе</div>
                </div>
              </div>
            </td>
            <td class="compare-table__column compare-table__column--product">
              <div class="status-badge status-badge--style--success status-badge--has-text">
                <div class="status-badge__body">
                  <div class="status-badge__text">На складе</div>
                </div>
              </div>
            </td>
            <td class="compare-table__column compare-table__column--fake"></td>
          </tr>
          <tr class="compare-table__row">
            <th class="compare-table__column compare-table__column--header">Цена</th>
            <td class="compare-table__column compare-table__column--product">
              $19.00
            </td>
            <td class="compare-table__column compare-table__column--product">
              $224.00
            </td>
            <td class="compare-table__column compare-table__column--product">
              $349.00
            </td>
            <td class="compare-table__column compare-table__column--product">
              $589.00
            </td>
            <td class="compare-table__column compare-table__column--product">
              $749.00
            </td>
            <td class="compare-table__column compare-table__column--fake"></td>
          </tr>
          <tr class="compare-table__row">
            <th class="compare-table__column compare-table__column--header">Добавить в корзину</th>
            <td class="compare-table__column compare-table__column--product">
              <button type="button" class="btn btn-sm btn-primary">Добавить в корзину</button>
            </td>
            <td class="compare-table__column compare-table__column--product">
              <button type="button" class="btn btn-sm btn-primary">Добавить в корзину</button>
            </td>
            <td class="compare-table__column compare-table__column--product">
              <button type="button" class="btn btn-sm btn-primary">Добавить в корзину</button>
            </td>
            <td class="compare-table__column compare-table__column--product">
              <button type="button" class="btn btn-sm btn-primary">Добавить в корзину</button>
            </td>
            <td class="compare-table__column compare-table__column--product">
              <button type="button" class="btn btn-sm btn-primary">Добавить в корзину</button>
            </td>
            <td class="compare-table__column compare-table__column--fake"></td>
          </tr>
          <tr class="compare-table__row">
            <th class="compare-table__column compare-table__column--header">Артикул</th>
            <td class="compare-table__column compare-table__column--product">140-10440-B</td>
            <td class="compare-table__column compare-table__column--product">573-23743-C</td>
            <td class="compare-table__column compare-table__column--product">009-50078-Z</td>
            <td class="compare-table__column compare-table__column--product">A43-44328-B</td>
            <td class="compare-table__column compare-table__column--product">729-51203-B</td>
            <td class="compare-table__column compare-table__column--fake"></td>
          </tr>
          <tr class="compare-table__row">
            <th class="compare-table__column compare-table__column--header">Вес</th>
            <td class="compare-table__column compare-table__column--product">0.1 Kg</td>
            <td class="compare-table__column compare-table__column--product">2.3 Kg</td>
            <td class="compare-table__column compare-table__column--product">1.4 Kg</td>
            <td class="compare-table__column compare-table__column--product">5 Kg</td>
            <td class="compare-table__column compare-table__column--product">2 Kg</td>
            <td class="compare-table__column compare-table__column--fake"></td>
          </tr>
          <tr class="compare-table__row">
            <th class="compare-table__column compare-table__column--header">Цвет</th>
            <td class="compare-table__column compare-table__column--product">Серый</td>
            <td class="compare-table__column compare-table__column--product">Красный</td>
            <td class="compare-table__column compare-table__column--product">Черный</td>
            <td class="compare-table__column compare-table__column--product">Черный</td>
            <td class="compare-table__column compare-table__column--product">Металик</td>
            <td class="compare-table__column compare-table__column--fake"></td>
          </tr>
          <tr class="compare-table__row">
            <th class = "compare-table__column compare-table__column--header"> Материал </th>
            <td class = "compare-table__column compare-table__column--product"> Торий </td>
            <td class = "compare-table__column compare-table__column--product"> Сталь </td>
            <td class = "compare-table__column compare-table__column--product"> Пластик </td>
            <td class = "compare-table__column compare-table__column--product"> Алюминий </td>
            <td class = "compare-table__column compare-table__column--product"> Алюминий </td>
            <td class = "compare-table__column compare-table__column--fake"> </td>
          </tr>
          <tr class="compare-table__row">
            <th class="compare-table__column compare-table__column--header"></th>
            <td class="compare-table__column compare-table__column--product">
              <button type="button" class="btn btn-sm btn-secondary">Удалить</button>
            </td>
            <td class="compare-table__column compare-table__column--product">
              <button type="button" class="btn btn-sm btn-secondary">Удалить</button>
            </td>
            <td class="compare-table__column compare-table__column--product">
              <button type="button" class="btn btn-sm btn-secondary">Удалить</button>
            </td>
            <td class="compare-table__column compare-table__column--product">
              <button type="button" class="btn btn-sm btn-secondary">Удалить</button>
            </td>
            <td class="compare-table__column compare-table__column--product">
              <button type="button" class="btn btn-sm btn-secondary">Удалить</button>
            </td>
            <td class="compare-table__column compare-table__column--fake"></td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="block-space block-space--layout--before-footer"></div>
