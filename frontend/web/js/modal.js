/*
// Dialog
*/
let dialog = {
  open: function (text = '12313131') {

    const modal = $('#modal');

    modal.find('.modal-body').html(text)
    modal.find('.modal_close').on('click', function () {
      modal.modal('hide');
    });
    modal.modal('show');
  }
};


(function ($) {
  "use strict";
  /*
  // Quickview
  */
  const quickview = {
    cancelPreviousModal: function () {
    },
    clickHandler: function () {
      const modal = $('#quickview-modal');
      const button = $(this);
      const doubleClick = button.is('.product-card__action--loading');

      quickview.cancelPreviousModal();

      let productId = this.getAttribute('data-product-id');

      if (doubleClick) {
        return;
      }

      button.addClass('product-card__action--loading');

      let xhr = null;
      // timeout ONLY_FOR_DEMO!
      const timeout = setTimeout(function () {
        xhr = $.ajax({
          url: '/products/' + productId + '/detail',
          success: function (data) {
            quickview.cancelPreviousModal = function () {
            };
            button.removeClass('product-card__action--loading');

            modal.html(data);
            modal.find('.quickview__close').on('click', function () {
              modal.modal('hide');
            });
            modal.modal('show');
          }
        });
      }, 0);

      quickview.cancelPreviousModal = function () {
        button.removeClass('product-card__action--loading');

        if (xhr) {
          xhr.abort();
        }

        // timeout ONLY_FOR_DEMO!
        clearTimeout(timeout);
      };
    }
  };
  //
  // $(function () {
  //   const modal = $('#quickview-modal');
  //
  //   modal.on('shown.bs.modal', function () {
  //     modal.find('.product-gallery').each(function (i, gallery) {
  //       initProductGallery(gallery, $(this).data('layout'));
  //     });
  //
  //     $('.input-number', modal).customNumber();
  //   });
  //
  //   $('.product-card-quickview').on('click', function () {
  //     quickview.clickHandler.apply(this, arguments);
  //   });
  // });


})(jQuery);

