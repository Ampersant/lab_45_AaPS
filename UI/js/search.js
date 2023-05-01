$(document).ready(function() {
    $('#search-input').keyup(function() {
      var searchQuery = $('#search-input').val();
      $.ajax({
        type: 'POST',
        url: 'http://localhost/lab_45_AaPS/BLL/search.php',
        data: { search: searchQuery },
        success: function(data) {
          $('#items').html(data);
        }
      });
    });
  });