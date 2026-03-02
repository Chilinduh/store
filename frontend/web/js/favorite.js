$('.add-favorite').each(function () {

  $(this).on('click', function (e) {

    let productId = this.getAttribute('data-id');
    let elem = $(this);

    $.ajax({
      url: "/favorites/" + productId,
      date: {},
      method: elem.hasClass('in-favorite') ? 'DELETE' : 'POST',
      dataType: 'json',
      success: function (data) {

        toastr.success("Товар <span style='color:#000000;font-weight:bold'>"
          + "</span> " + (elem.hasClass('in-favorite') ? 'удален из избранного!' : 'добавлен в избранное!'), "",{});
        if(elem.hasClass('in-favorite')) {
          elem.removeClass('in-favorite');
        } else {
          elem.addClass('in-favorite');
        }
      }
    });

  });
});
