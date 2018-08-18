$(document).on('change', '.edit-modal', function() {
  $.ajax({
    type: 'post',
    url: 'change',
    data: {
      '_token':$('input[name=_token]').val(),
      'id': $(this).data('id'),
      'quantity':$('#quantity'+$(this).data('id')).val()
    },
    success: function(data) {
      $('#dinamic').replaceWith(data);
    }
  });
});

$(document).on('click','.delete-modal', function() {
  $.ajax({
    type: 'get',
    url: 'deleteCoupon/'+$(this).data('id'),
    success: function(data) {
      $('#dinamic').replaceWith(data);
    }
  });
});
