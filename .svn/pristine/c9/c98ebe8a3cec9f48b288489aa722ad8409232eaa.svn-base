$(function () {
    $('#user_id').change(function () {
        var b = BASE_URL;
        var user_id = $(this).val();
        $.ajax({
            url: b + 'app-profiles/fetch_user_name/',
            type: 'post',
            //dataType : 'json',
            data: {user_id: user_id},
            success: function (data) {
                $('#user_name').html(data);

            }
        });
    });
});


