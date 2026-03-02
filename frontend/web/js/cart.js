jQuery(document).ready(function(){

  var cartItems = {};

  let cartComponent = function () {

    return {

      init: function (cart) {

        this.cart = cart;

        this.itemTemplate =
          '<li class="dropcart__item">' +
          '<div class="dropcart__item-image image image--type--product">' +
          '<a class="image__body" href="/products/{id}">' +
          '<img class="image__tag" src="{original}" alt="">' +
          '</a>' +
          '</div>' +
          '<div class="dropcart__item-info">' +
          '<div class="dropcart__item-name">' +
          '<a href="/products/{id}">{name}</a>' +
          '</div>' +
          '<div class="dropcart__item-meta">' +
          '<div class="dropcart__item-quantity">{quantity}</div>' +
          '<div class="dropcart__item-price" id="cartTotalPopup"><span>{price}</span> руб.' +
          '</div>' +
          '</div>' +
          '</div>' +
          '</li>' +
          '<li class="dropcart__divider" role="presentation"></li>';

        //this.refreshCart();

        $('.cart-open').each(function () {

          $(this).on('click', function (e) {

            document.location = '/cart';
          });
        });

        $('.cart-add').each(function () {

          $(this).on('click', function (e) {

            let productId = this.getAttribute('data-id');
            let icon = this.getAttribute('data-icon');
            let elem = $(this);

            $.ajax({
              url: "/cart/" + productId,
              data: $('#form-order-' + productId).serialize(),
              method: 'post',
              dataType: 'json',
              success: function (data) {

                toastr.success("Товар <span style='color:#000000;font-weight:bold'>" + data.name + "</span> добавлен в корзину!", "",{});
                elem.addClass('cart-open');
                elem.removeClass('cart-add');
                if(icon) {
                  elem.find('i').addClass('in-cart');
                } else {
                  elem.html('В корзине');
                }

                $('#cartItemTotalCount').find('span').html(data.cartTotal);
                $('.indicator__counter').html(data.cartTotalCount);

                elem.on('click', function (e) {
                  document.location = '/cart';
                });
              },
              error: function (response) {

                console.log(response)
                dialog.open(response);
              }
            });
          });
        });

        $('.cart-item-remove').each(function () {

          $(this).on('click', function (e) {

            let productId = this.getAttribute('data-cart-item-id');
            let elem = $(this);

            $.ajax({
              url: "/cart/" + productId,
              date: {},
              method: 'DELETE',
              dataType: 'json',
              success: function (data) {

                $('#cartItem' + productId).addClass('hide');
                $('.indicator__counter').html(data.cartTotalCount);
                $('.cart-total').find('span').html(data.cartTotal);
                $('.cart-general').find('span').html(data.cartTotal);
                $('#cartItemTotalCount').find('span').html(data.cartTotal);
              },
              error: function (response) {
                console.log(response);
              }
            });
          });
        });

        $('.cart-item-quantity-sub').each(function () {

          $(this).on('click', function (e) {

            let productId = this.getAttribute('data-id');
            $.ajax({
              url: "/cart/" + productId + '/sub-quantity',
              date: {},
              method: 'PUT',
              dataType: 'json',
              success: function (data) {
                if (data) {

                  toastr.success("Сохранено!", "",{});
                  $('#cart-item-total' + productId).find('span').html(data.total);

                  let total = $('.cart-total').find('span').html();
                  $('.cart-total').find('span').html(data.cartTotal);
                  $('.cart-general').find('span').html(data.cartTotal);
                  $('#cartItemTotalCount').find('span').html(data.cartTotal);
                  $('.indicator__counter').html(data.cartTotalCount);
                }
              },
              error: function (response) {
                console.log(response);
              }
            });
          });
        });

        $('.cart-item-quantity-add').each(function () {

          $(this).on('click', function (e) {

            let productId = this.getAttribute('data-id');
            $.ajax({
              url: "/cart/" + productId + '/add-quantity',
              date: {},
              method: 'PUT',
              dataType: 'json',
              success: function (data) {
                if (data) {
                  toastr.success("Сохранено!", "",{});
                  $('#cart-item-total' + productId).find('span').html(data.total);
                  $('.cart-total').find('span').html(data.cartTotal);
                  $('.cart-general').find('span').html(data.cartTotal);
                  $('#cartItemTotalCount').find('span').html(data.cartTotal);
                  $('.indicator__counter').html(data.cartTotalCount);
                }
              },
              error: function (response) {
                console.log(response);
              }
            });
          });
        });

      },
      refreshCart: function () {

        this.cartContainer = $('.dropcart__list');

        if(this.cart) {

          let items = '';

          items = String(this.itemTemplate);

          $.each(this.cart, function(i,item) {

            items = items.replace("{id}", item.id);
            items = items.replace("{original}", item.original);
            items = items.replace("{name}", item.name);
            items = items.replace("{price}", item.price);
            items = items.replace("{quantity}", item.quantity);
            $(this.cartContainer[0]).append(items);
          });
        }
      },
      add: function (product_id) {

      }

    }

  }

  let cart = cartComponent();
  cart = cart.init(cartItems);

});
