<div class="block-header block-header--has-breadcrumb block-header--has-title">
  <div class="container">
    <div class="block-header__body">

      <?php include_once(Yii::getAlias('@frontend/views/site/breadcrumb.php')); ?>
      <h1 class="block-header__title">Оплата</h1>
    </div>
  </div>
</div>
<div class="checkout block">
  <div class="container container--max--xl">
    <div class="row">
      <div class="col-12 mb-3">
        <div class="alert alert-lg alert-primary">Уже зарегистрированны? <a href="/login">Вход</a></div>
      </div>
      <div class="col-12 col-lg-6 col-xl-7">
        <div class="card mb-lg-0">
          <div class="card-body card-body--padding--2">
            <h3 class="card-title">Платежные реквизиты</h3>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="checkout-first-name">Имя</label>
                <input type="text" class="form-control" id="checkout-first-name" placeholder="Имя">
              </div>
              <div class="form-group col-md-6">
                <label for="checkout-last-name">Фамилия</label>
                <input type="text" class="form-control" id="checkout-last-name" placeholder="Фамилия">
              </div>
            </div>
            <div class="form-group">
              <label for="checkout-company-name">Название компании <span class="text-muted">(необязательно)</span></label>
              <input type="text" class="form-control" id="checkout-company-name" placeholder="Название компании">
            </div>
            <div class="form-group">
              <label for="checkout-country">Страна</label>
              <select id="checkout-country" class="form-control form-control-select2">
                <option>Выберите страну...</option>
                <option>United States</option>
                <option>Russia</option>
                <option>Italy</option>
                <option>France</option>
                <option>Ukraine</option>
                <option>Germany</option>
                <option>Australia</option>
              </select>
            </div>
            <div class="form-group">
              <label for="checkout-street-address">Адрес улицы</label>
              <input type="text" class="form-control" id="checkout-street-address" placeholder="Адрес улицы">
            </div>
            <div class="form-group">
              <label for="checkout-address">Квартира<span class="text-muted">(необязательно)</span></label>
              <input type="text" class="form-control" id="checkout-address">
            </div>
            <div class="form-group">
              <label for="checkout-city">Город</label>
              <input type="text" class="form-control" id="checkout-city">
            </div>
            <div class="form-group">
              <label for="checkout-state">Страна</label>
              <input type="text" class="form-control" id="checkout-state">
            </div>
            <div class="form-group">
              <label for="checkout-postcode">Почтовый индекс</label>
              <input type="text" class="form-control" id="checkout-postcode">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="checkout-email">Email</label>
                <input type="email" class="form-control" id="checkout-email" placeholder="Email">
              </div>
              <div class="form-group col-md-6">
                <label for="checkout-phone">Телефон</label>
                <input type="text" class="form-control" id="checkout-phone" placeholder="Телефон">
              </div>
            </div>
            <div class="form-group">
              <div class="form-check">
                <span class="input-check form-check-input">
                    <span class="input-check__body">
                        <input class="input-check__input" type="checkbox" id="checkout-create-account">
                        <span class="input-check__box"></span>
                        <span class="input-check__icon"><svg width="9px" height="7px">
                                <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                            </svg>
                        </span>
                    </span>
                </span>
                <label class="form-check-label" for="checkout-create-account">Создать аккаунт?</label>
              </div>
            </div>
          </div>
          <div class="card-divider"></div>
          <div class="card-body card-body--padding--2">
            <h3 class="card-title">Адрес доставки</h3>
            <div class="form-group">
              <div class="form-check">
                <span class="input-check form-check-input">
                    <span class="input-check__body">
                        <input class="input-check__input" type="checkbox" id="checkout-different-address">
                        <span class="input-check__box"></span>
                        <span class="input-check__icon"><svg width="9px" height="7px">
                                <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                            </svg>
                        </span>
                    </span>
                </span>
                <label class="form-check-label" for="checkout-different-address">Доставить по другому адресу?</label>
              </div>
            </div>
            <div class="form-group">
              <label for="checkout-comment">Примечания к заказу <span class="text-muted">(необязательно)</span></label>
              <textarea id="checkout-comment" class="form-control" rows="4"></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 col-xl-5 mt-4 mt-lg-0">
        <div class="card mb-0">
          <div class="card-body card-body--padding--2">
            <h3 class="card-title">Ваш заказ</h3>
            <table class="checkout__totals">
              <thead class="checkout__totals-header">
              <tr>
                <th>Наименование</th>
                <th>Итого</th>
              </tr>
              </thead>
              <tbody class="checkout__totals-products">
              <tr>
                <td>Глянцевое серое 19-дюймовое алюминиевое колесо AR-19 × 2</td>
                <td>$1398.00</td>
              </tr>
              <tr>
                <td>Тормозной комплект Brandix BDX-750Z370-S × 1</td>
                <td>$849.00</td>
              </tr>
              <tr>
                <td>Двойная выхлопная труба от Brandix Z54 × 3</td>
                <td>$3630.00</td>
              </tr>
              </tbody>
              <tbody class="checkout__totals-subtotals">
              <tr>
                <th>Итого</th>
                <td>$5877.00</td>
              </tr>
              <tr>
                <th>Скидка магазина</th>
                <td>$-20.00</td>
              </tr>
              <tr>
                <th>Доставка</th>
                <td>$25.00</td>
              </tr>
              </tbody>
              <tfoot class="checkout__totals-footer">
              <tr>
                <th>Итого</th>
                <td>$5882.00</td>
              </tr>
              </tfoot>
            </table>
            <div class="checkout__payment-methods payment-methods">
              <ul class="payment-methods__list">
                <li class="payment-methods__item payment-methods__item--active">
                  <label class="payment-methods__item-header">
                    <span class="payment-methods__item-radio input-radio">
                        <span class="input-radio__body">
                            <input class="input-radio__input" name="checkout_payment_method" type="radio" checked>
                            <span class="input-radio__circle"></span>
                        </span>
                    </span>
                    <span class="payment-methods__item-title">Прямой банковский перевод</span>
                  </label>
                  <div class="payment-methods__item-container">
                    <div class="payment-methods__item-details text-muted">
                      Сделайте платеж прямо на наш банковский счет. Используйте свой идентификатор заказа в качестве ссылки для оплаты. Ваш заказ не будет отправлен, пока средства не будут зачислены на наш счет.
                    </div>
                  </div>
                </li>
                <li class="payment-methods__item">
                  <label class="payment-methods__item-header">
                    <span class="payment-methods__item-radio input-radio">
                        <span class="input-radio__body">
                            <input class="input-radio__input" name="checkout_payment_method" type="radio">
                            <span class="input-radio__circle"></span>
                        </span>
                    </span>
                    <span class="payment-methods__item-title">Проверить платежи</span>
                  </label>
                  <div class="payment-methods__item-container">
                    <div class="payment-methods__item-details text-muted">
                      Отправьте чек на адрес магазина, улицу магазина, город магазина, штат / округ магазина, почтовый индекс магазина.
                    </div>
                  </div>
                </li>
                <li class="payment-methods__item">
                  <label class="payment-methods__item-header">
                    <span class="payment-methods__item-radio input-radio">
                        <span class="input-radio__body">
                            <input class="input-radio__input" name="checkout_payment_method" type="radio">
                            <span class="input-radio__circle"></span>
                        </span>
                    </span>
                    <span class="payment-methods__item-title">Оплата при доставке</span>
                  </label>
                  <div class="payment-methods__item-container">
                    <div class="payment-methods__item-details text-muted">
                      Оплата наличными при доставке.
                    </div>
                  </div>
                </li>
                <li class="payment-methods__item">
                  <label class="payment-methods__item-header">
                    <span class="payment-methods__item-radio input-radio">
                        <span class="input-radio__body">
                            <input class="input-radio__input" name="checkout_payment_method" type="radio">
                            <span class="input-radio__circle"></span>
                        </span>
                    </span>
                    <span class="payment-methods__item-title">PayPal</span>
                  </label>
                  <div class="payment-methods__item-container">
                    <div class="payment-methods__item-details text-muted">
                      Оплатить через PayPal; если у вас нет учетной записи PayPal, вы можете расплачиваться кредитной картой.
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="checkout__agree form-group">
              <div class="form-check">
                <span class="input-check form-check-input">
                    <span class="input-check__body">
                        <input class="input-check__input" type="checkbox" id="checkout-terms">
                        <span class="input-check__box"></span>
                        <span class="input-check__icon"><svg width="9px" height="7px">
                                <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                            </svg>
                        </span>
                    </span>
                </span>
                <label class="form-check-label" for="checkout-terms">
                  Я прочитал и согласен <a target="_blank" href="/terms">с условиями использования сайта</a>
                </label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-xl btn-block">Заказать</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="block-space block-space--layout--before-footer"></div>
