// Funcion crear mostrar
$(document).on('click','.create-modal', function() {
  $.ajax({
    type: 'get',
    url: 'redeem/add',
    success: function(data){
      var materials="";
      $.each(data.materials,function(key,material){
        materials=materials+"<option value='"+material.id+"'>"+material.name+"</option>";
      });
      $('#list').append(
        "<div class='col-md-12 detail"+data.id+"'>"+
          "<div class='col-md-4'>"+
            "<div class='form-group'>"+
              "<label for='material"+data.id+"'>Material</label>"+
              "<select id='material"+data.id+"' name='material"+data.id+"' class='form-control' style='-webkit-appearance: menulist;'>"+
                materials+
              "</select>"+
            "</div>"+
          "</div>"+
        "<div class='col-md-4'>"+
          "<div class='form-group'>"+
              "<label for='kg"+data.id+"'>Kilogramos</label>"+
              "<input id='kg"+data.id+"' type='number' placeholder='0.0' step='0.01' min='0' class='form-control' name='kg"+data.id+"'>"+
          "</div>"+
        "</div>"+
        "<div class='col-md-4'>"+
          "<br>"+
          "<div class='form-group'>"+
            "<a href='#' data-id='"+data.id+"' style='border: 1px solid red;background-color:red;' class='btn btn-primary delete-modal'>"+
              "Eliminar material"+
            "</a>"+
          "</div>"+
        "</div></div>");
      }
    });
});

$(document).on('click','.delete-modal', function() {
  $.ajax({
    type: 'get',
    url: 'redeem/delete/'+$(this).data('id'),
    success: function(data) {
      $('.detail'+data).replaceWith();
    }
  });
});
