$('#form').click(function (data) {
    $.ajax({
        url: "{{url('/form')}}",
        type: 'post',
        dataType: 'json',
        data: $('#form').serialize(),

        success: function (res) {
            console.log("Esta bien");
        },

        error: function(data) {
            $('#data').html(data.responseJSON.tlfnFijo);
            $('#data').html(data.responseJSON.tlfnMovil);
            $('#data-error').fadeIn();
        }
    })
});