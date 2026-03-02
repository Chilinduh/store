<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use frontnd\components\BreadCrumbsWidget;



// $this->title = 'Order';

// if(Yii::$app->user->isGuest){
//     $cust_type = \common\models\Order::GUEST;
// }else{
//     $cust_type = \common\models\Order::USER;
// }

?>
<?= BreadCrumbsWidget::widget(['message' => 'Good morning']) ?>

<div id="shopify-section-cart-template" class="shopify-section">
<div class="container page-cart" data-section-id="cart-template" data-section-type="cart-template">


    <div class="page-carts">
      <h1 class="title-cart">Your cart
    </h1></div>

    <form action="/cart" method="post" novalidate="" class="cart">
      <table>
        <thead class="cart__row cart__header">
          <tr><th class="text-left" colspan="2">Product</th>
          <th>Price</th>
          <th class="text-left">Quantity</th>
          <th class="text-left">Total</th>
        </tr></thead>
        <tbody>

            <tr class="cart__row border-bottom line1 cart-flex border-top">
              <td class="cart__image-wrapper cart-flex-item">
                <a href="/products/boudin-capicola?variant=12636652404802">
                  <img class="cart__image" src="//cdn.shopify.com/s/files/1/0017/0770/4386/products/34_7c971304-2de6-47b7-9996-a055deff14a3_50x50@2x.jpg?v=1524710318" alt="Filet mignon capico">
                </a>
              </td>
              <td class="cart__meta small--text-left cart-flex-item">
                <div class="list-view-item__title">
                  <a href="/products/boudin-capicola?variant=12636652404802">
                    Filet mignon capico

                  </a>
                </div>






              </td>
              <td class="cart__price-wrapper cart-flex-item">
                <span class="money" data-currency-usd="$123.00">$123.00</span>


              </td>
              <td class="cart__update-wrapper cart-flex-item text-left">

                <div class="cart__qty">
                  <label for="updates_12636652404802:3e7684277c9fd705785369cc10f425bc" class="cart__qty-label">Quantity</label>
                  <input class="cart__qty-input" type="number" name="updates[]" id="updates_12636652404802:3e7684277c9fd705785369cc10f425bc" value="1" min="0" pattern="[0-9]*">
                </div>
                <a href="/cart/change?line=1&amp;quantity=0" class="btn btn--small btn--secondary cart__remove medium-up--hide">Remove</a>
                <input type="submit" name="update" class="btn btn--small cart__update medium-up--hide" value="Update">
              </td>
              <td class="text-left small--hide">


                <div>
                  <span class="money" data-currency-usd="$123.00">$123.00</span>
                </div>


              </td>
          </tr>

        </tbody>
      </table>

      <footer class="cart__footer">
        <div class="row">

          <div class="col-sm-6 col-12 medium-up--one-half cart-note">
            <div class="cart_border">
              <label for="CartSpecialInstructions" class="cart-note__label small--text-center"><span>Note</span>Add a note to your order</label>
              <textarea rows="6" name="note" id="CartSpecialInstructions" class="cart-note__input"></textarea>
            </div>
          </div>

          <div class="col-sm-6 col-12 text-right small--text-center medium-up--one-half">
            <div class="cart_border">
              <div>
                <span class="cart__subtotal-title"><span id="bk-cart-subtotal-label">Subtotal</span></span>
                <span class="cart__subtotal"><span id="bk-cart-subtotal-price"><span class="money" data-currency-usd="$123.00">$123.00</span></span></span>
              </div>

              <div class="cart__shipping">Shipping &amp; taxes calculated at checkout</div>
              <a href="collections/all" class="btn btn--secondary cart__update cart__continue--large small--hide">Continue shopping</a>
              <input type="submit" name="update" class="btn btn--secondary cart__update cart__update--large small--hide" value="Update">
              <input type="submit" name="checkout" class="btn btn--small-wide" value="Check out">

            </div>
          </div>
        </div>
      </footer>
    </form>

</div>


</div>
