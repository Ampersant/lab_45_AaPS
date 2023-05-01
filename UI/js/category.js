$(document).ready(function() {
  $('#category-select').change(function() {
    
    // Отримання значення category_id з елементу select
    var category_id = $(this).val();

    // Відправка запиту AJAX на сервер
    $.ajax({
      url: 'http://localhost/lab_45_AaPS/BLL/category.php',
      type: 'GET',
      data: { category_id: category_id },
      success: function(data) {
        $('#items').html(data);
      }
    });
  });
});