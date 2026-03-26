const filterUrl = '';
const state = [];
let firstRun = false;
let collection = [];

$('.button-search').on('click', function () {

  const url = new URL(window.location.href);
  url.searchParams.delete('page');
  history.pushState({}, '', url);
  window.location.reload();
});

$('.filter-collections').each(function (index) {


  const key = $(this).data('collection');
  if ($(this).data('filter-scope') != '' && typeof $(this).data('filter-scope') != 'undefined' && collection.indexOf(key) == -1) {

    let fields = $(this).data('filter-scope').split("|");

    console.log(fields)

    let from = $('[name="' + fields[0] + '"]').val();
    let to = $('[name="' + fields[1] + '"]').val();
    let main = $(this).data('main');
    let field = $(this).data('field');

    let type = 'slider';
    state.push({'type': type, 'main': main, 'key': $(this).data('collection'), 'from': from, 'to': to});
    collection.push(key);
  } else {
    let main = $(this).data('main');
    let attr = $(this).data('attribute');
    const key = $(this).data('collection');
    if ($(this).prop('checked')) {
      let type = 'checkbox';
      state.push({'type': type, 'main': main, 'value': attr, 'attr': key});
    }
  }

  $(this).on('change', function () {

    if ($(this).data('attribute') !== 'undefined' && $(this).data('attribute') != '') {

      let fields = '';
      const key = $(this).data('collection');

      if ($(this).data('filter-scope') != '' && typeof $(this).data('filter-scope') != 'undefined') {

        fields = $(this).data('filter-scope').split("|");
        let from = $('[name="' + fields[0] + '"]').val();
        let to = $('[name="' + fields[1] + '"]').val();

        $.each(state, function (index, item) {
          if (item.type == 'slider' && item.key == key) {
            item.from = from;
            item.to = to;
          }
        });

      } else {

        let attr = $(this).data('attribute');
        if ($(this).prop('checked')) {

          state.push({'type': 'checkbox', 'value': attr, 'attr': key});
        } else {

          $.each(state, function (index, item) {

            if (typeof item != 'undefined') {
              if (item.type == 'checkbox' && item.value == attr) {
                state.splice(index, 1);
              }
            }
          });
        }
      }
      console.log(state)
    }

    let stateUrl = '';
    $.each(state, function (index, item) {
      if (item.type == 'slider') {
        stateUrl = stateUrl + 'slider_' + item.key + ':' + item.from + '|' + item.to + ',';
      }

      if (item.type == 'checkbox') {
        stateUrl = stateUrl + 'checkbox_' + item.attr + ':' + item.value + ',';
      }
    });
    const url = new URL(window.location.href);
    url.searchParams.set('filter', stateUrl);
    history.pushState({}, '', url);
  });
});
