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
            var errors = data.parseJSON;
            console.log(errors);
        }
    })
});