let colorComponent = function () {

  let container = $('.size-list');
  let loading = $('.quickview').find('.btn-loading');
  let itemTemplate =
    '<label class="input-radio-label__item" data-size-id="{data-size-id}" data-product-id="{data-product-id}">' +
    '<input type="radio" name="size_id" value="{size-id}" class="input-radio-label__input">' +
    '<span class="input-radio-label__title">{size}</span>' +
    '</label>';


  return {

    init: function (cart) {

      this.cart = cart;

      $('.input-radio-color-button').each(function () {

        let colorId = this.getAttribute('data-color-id');
        let productId = this.getAttribute('data-product-id');
        let categoryId = this.getAttribute('data-category-id');

        $(this).on('click', function (evt) {

          $('#color_id').val(colorId);

          $('.input-radio-color-button').find('span').each(function () {
            $(this).removeClass('color-border-fill');
          });

          $(this).find('span').addClass('color-border-fill');

          container.html("");

          $.ajax({
            url: "/products/" + productId,
            method: 'get',
            dataType: 'json',
            beforeSend: function () {
              loading.removeClass('hide');
            },
            success: function (data) {

              let color = $.grep(data.colors, function(e){ return e.id == colorId; });

              if (typeof color[0].sizes != 'undefined') {

                color[0].sizes.forEach(function (item, index) {
                  let size = itemTemplate;
                  size = size.replace("{data-product-id}", productId);
                  size = size.replace("{data-size-id}", item.id);
                  size = size.replace("{size-id}", item.id);
                  size = size.replace("{size}", item.eu_size + ' (' + item.ru_size + ')');
                  container.append($(size))

                })
              }

              loading.addClass('hide');
            },
            error: function (response) {

            }
          });

          evt.preventDefault();
        });
      });
    }

  }

}

let colors = colorComponent();
colors = colors.init();



