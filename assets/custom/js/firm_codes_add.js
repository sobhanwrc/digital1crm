
$(function () {
    $('#code_category').change(function () {
        var b = BASE_URL;
        $.ajax({
            url: b + 'address/fetch-code-description/',
            type: 'post',
            dataType: 'json',
            data: {
                code_category: this.value
            },
            success: function (data) {
                $('#code_description').html(data);
            }
        });
    });
});
