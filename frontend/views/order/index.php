<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use frontend\components\BreadCrumbsWidget;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use kartik\select2\Select2;

?>

<div class="block-header block-header--has-breadcrumb block-header--has-title">
  <div class="container">
    <div class="block-header__body">

      <?= BreadCrumbsWidget::widget(['breadCrumbs' => [
        [
          'url' => '/order',
          'name' => 'Заказ',
        ]
      ]]) ?>
      <h1 class="block-header__title">Заказ</h1>
    </div>
  </div>
</div>
<div class="checkout block">

  <?php if (!count($cart)) { ?>
    <div class="container container--max--xl">
      <div class="wishlist">
        <div style="padding:10px">Необходимо сформировать заказ</div>
      </div>
    </div>
  <?php } else { ?>
  <div class="container container--max--xl">
    <div class="row">
      <?php if (Yii::$app->user->isGuest) { ?>
        <div class="col-12 mb-3">
          <div class="alert alert-lg alert-primary">Уже зарегистрированы? <a href="/login">Вход</a></div>
        </div>
      <?php } ?>

      <div class="col-12 col-lg-6 col-xl-7">

        <div class="card mb-lg-0">
          <?php $form = ActiveForm::begin(['id' => 'order-form', 'method' => 'POST']); ?>
          <?php if (Yii::$app->params['cdek']) { ?>
            <div class="card-body card-body--padding--2">
              <h3 class="card-title">Адрес доставки</h3>

              <?= $form->field($orderForm, 'city_id')->widget(Select2::classname(), [
                'data' => $cities,
                'pluginEvents' => [
                  'change' => "function() {
                     $('.delivery-items').html('');
                  }"
                ],
                'options' => [
                  'id' => 'city-id',
                  'placeholder' => 'Выберите город'
                ],
              ]); ?>

              <?= $form->field($orderForm, 'point_id')->widget(DepDrop::classname(), [
                'type' => DepDrop::TYPE_SELECT2,
                'options' => ['placeholder' => 'Выберите регион'],
                'language' => 'ru',
                'pluginEvents' => [
                  'change' => "function() {
                    if($(this).val() && $(this).val() != '') {

                      tariffs();
                    }
                  }"
                ],
                'pluginOptions' => [
                  'initialize' => empty($orderForm->point_id) ? false : true,
                  'depends' => ['city-id'],
                  'url' => Url::to(['/order/delivery-points']),
                  'loadingText' => 'загрузка ...'
                ]
              ]); ?>

            </div>
            <div class="card-body card-body--padding--2 delivery-info">
              <h3 class="card-title">Способ и стоимость доставки</h3>
              <div id="forpvz" style="width:100%; height:600px;"></div>
              <div class="delivery-items"></div>
            </div>
          <?php } ?>
          <div class="card-divider"></div>
          <div class="card-body card-body--padding--2">
            <h3 class="card-title">Платежные реквизиты</h3>

            <?= $form->field($orderForm, 'user_id')->hiddenInput()->label(false); ?>
            <?= $form->field($orderForm, 'tariff_sum')->hiddenInput()->label(false); ?>
            <?= $form->field($orderForm, 'first_name')->textInput(['autofocus' => true]) ?>
            <?= $form->field($orderForm, 'last_name')->textInput() ?>
            <?= $form->field($orderForm, 'phone')->textInput() ?>
            <?php if(0) { ?>
            <?= $form->field($orderForm, 'country')->textInput() ?>
            <?php } ?>
            <?= $form->field($orderForm, 'city')->textInput() ?>
            <?= $form->field($orderForm, 'address')->textInput() ?>
            
            <?= $form->field($orderForm, 'comment')->textarea() ?>

          </div>

          <?php ActiveForm::end(); ?>

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
                <th class="checkout-total">Итого</th>
              </tr>
              </thead>
              <tbody class="checkout__totals-products">

              <?php foreach ($cart as $item) { 
                
                ?>
                <tr>
                  <td><?= $item['quantity'] . ' * ' . ($item['name']??'') ?></td>
                  <td><?= $item['price'] * $item['quantity'] ?> руб.</td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
            <table class="checkout__totals">
              <tbody class="checkout__totals-subtotals">
              <?php if (0) { ?>
                <tr>
                  <td>Итого</td>
                  <td><?= $total ?></td>
                </tr>
                <tr>
                  <th>Скидка магазина</th>
                  <td>$-20.00</td>
                </tr>
              <?php } ?>
              <?php if (Yii::$app->params['cdek']) { ?>
                <tr>
                  <th>Доставка</th>
                  <td class="delivery-price"><span></span> руб.</td>
                </tr>
              <?php } ?>
              </tbody>
              <tfoot class="checkout__totals-footer">
              <tr>
                <th>Итого</th>
                <td class="total-amount"><span><?= $total ?></span> руб.</td>
              </tr>
              </tfoot>
            </table>
            <?php if (0) { ?>
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
                        Сделайте платеж прямо на наш банковский счет. Используйте свой идентификатор заказа в качестве
                        ссылки для оплаты. Ваш заказ не будет отправлен, пока средства не будут зачислены на наш счет.
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
                        Отправьте чек на адрес магазина, улицу магазина, город магазина, штат / округ магазина, почтовый
                        индекс магазина.
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
                        Оплатить через PayPal; если у вас нет учетной записи PayPal, вы можете расплачиваться кредитной
                        картой.
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            <?php } ?>

            <button type="submit" onclick="javascript:$('#order-form').submit()"
                    class="btn btn-primary btn-xl btn-block">Заказать
            </button>
            <BR>
            <div class="checkout__agree form-group">
              <div class="form-check">

                <?php if (0) { ?>
                  <span class="input-check form-check-input">
                    <span class="input-check__body">
                        <input class="input-check__input" type="checkbox" id="checkout-terms">
                        <span class="input-check__box"></span>
                        <span class="input-check__icon"><svg width="9px" height="7px">
                                <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/>
                            </svg>
                        </span>
                    </span>
                </span>
                <?php } ?>
                <label class="form-check-label" for="checkout-terms">
                  Отправляя заказ, я соглашаюсь <a target="_blank" href="/terms">с условиями использования сайта</a>
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php } ?>

    </div>
  </div>
</div>
<div class="block-space block-space--layout--before-footer"></div>

<?php

$js = <<<JS

    function tariffs() {

                var cartWidjet = new ISDEKWidjet ({
                'defaultCity': 'Новый Уренгой', //какой город отображается по умолчанию
                'cityFrom': 'Москва', // из какого города будет идти доставка
                'country': 'Россия', // можно выбрать страну, для которой отображать список ПВЗ
                'link': 'forpvz', // id элемента страницы, в который будет вписан виджет
                'path': 'http://store/js/pvzwidget/widget/scripts/', //директория с библиотеками виджета
                'servicepath': 'http://store/service.php' //ссылка на файл service.php на вашем сайте
            });

                cartWidjet.open();

                $('#forpvz').removeClass('hide');
                $('#forpvz').addClass('show');


      $.ajax({
        url: '/order/delivery-tariffs',
        data: $('#order-form').serialize(),
        method: 'post',
        dataType: 'json',
        success: function (data) {

            var tariff =
            '<label class=\"vehicles-list__item delivery-tariff\" data-id=\"{{tariff_code}}\" data-price=\"{{data-price}}\">' +
              '<span class=\"vehicles-list__item-radio input-radio\">' +
                 '<span class=\"input-radio__body\">' +
                      '<input class=\"input-radio__input\" name=\"tariff[]\" value=\"{{value}}\" type=\"radio\">' +
                      '<span class=\"input-radio__circle\"></span>' +
                  '</span>' +
              '</span>' +
              '<span class=\"vehicles-list__item-info\">' +
                  '<span class=\"vehicles-list__item-name\">{{delivery_sum}} руб. ( {{tariff_name}} )</span>' +
                  '<span class=\"vehicles-list__item-details\">от {{calendar_min}} до {{calendar_max}} дней</span>' +
              '</span>' +
            '</label>';

             $('.delivery-items').html('');

             var index = 0;
             data.forEach(function callback(item) {

                var deliveryTariff = tariff;

                deliveryTariff = deliveryTariff.replace("{{value}}", item.info.tariff_code);
                deliveryTariff = deliveryTariff.replace("{{tariff_code}}", item.info.tariff_code);
                deliveryTariff = deliveryTariff.replace("{{delivery_sum}}", item.info.delivery_sum);
                deliveryTariff = deliveryTariff.replace("{{data-price}}", item.info.delivery_sum);
                deliveryTariff = deliveryTariff.replace("{{tariff_name}}", item.info.tariff_name);
                deliveryTariff = deliveryTariff.replace("{{calendar_min}}", item.info.calendar_min);
                deliveryTariff = deliveryTariff.replace("{{calendar_max}}", item.info.calendar_max);


                console.log('sdfsdf')

                deliveryTariff = $(deliveryTariff);

                deliveryTariff.on('click', function(e) {

                    var price = this.getAttribute('data-price');
                    $('.delivery-price').find('span').html(price);
                    $('[name="tariff_sum"]').val(price);

                    $('.total-amount').find('span').html(parseInt($('.total-amount').find('span').html()) + parseInt(price));

                });

                $('.delivery-items').append(deliveryTariff);
            });

        }
      });
  }

JS;
$this->registerJs($js, \yii\web\View::POS_READY);

?>
