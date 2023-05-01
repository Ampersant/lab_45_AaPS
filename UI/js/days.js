$(document).ready(function() {

    $('.day-menu').on('click', function(e){
            e.preventDefault();
            let day = $(this).data('id');
            $.ajax({
                url: 'http://localhost/lab_45_AaPS/BLL/days.php',
                type: 'GET',
                data: {id: day},
                success: function (data) {
                    $('#day-items').html(data);
                },
                error: function () {
                    alert('Error days');
                }
            });
    });
});