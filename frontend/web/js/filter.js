const filterUrl = '';
const state = [];
let firstRun = false;
let collection = [];

$('.filter-collections').each(function (index) {

  const key = $(this).data('collection');
  if ($(this).data('filter-scope') != '' && typeof $(this).data('filter-scope') != 'undefined' && collection.indexOf(key) == -1) {

    let fields = $(this).data('filter-scope').split("|");
    let from = $('[name="' + fields[0] + '"]').val();
    let to = $('[name="' + fields[1] + '"]').val();
    state.push({'type': 'slider', 'key': $(this).data('collection'), 'from': from, 'to': to});
    collection.push(key);
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

            if (item.type == 'checkbox' && item.value == attr) {
              state.splice(index, 1);
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
        stateUrl = stateUrl + 'checkbox_' + item.attr + ': ' + item.value + ',';
      }
    });

    history.replaceState({}, 'dsfsf', '?filter=' + stateUrl);
  });
});
