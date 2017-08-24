$(function () {
    $('#country').change(function () {
        var b = BASE_URL; //alert(b);
        $.ajax({ 
            url: b + 'address/fetch-state/',
            type: 'post',
            dataType: 'json',
            data: {country_id: this.value},
            success: function (data) {
                //alert(data);
                $('#state').html(data);
                $('#county').html('<option value="">County</option>');
                $('#city').html('<option value="">City/Town</option>');
            }
        });
    });

    $('#state').change(function () {
        var b = BASE_URL;
        $.ajax({
            url: b + 'address/fetch-county/',
            type: 'post',
            dataType: 'json',
            data: {
                country_id: $('#country').val(),
                state_id: this.value
            },
            success: function (data) {
                $('#county').html(data.county);
                $('#city').html(data.city);
            }
        });
    });

    $('#county').change(function () {
        var b = BASE_URL;
        $.ajax({
            url: b + 'address/fetch-city/',
            type: 'post',
            dataType: 'json',
            data: {country_id: $('#country').val(), state_id: $('#state').val(), county_seq_no: this.value},
            success: function (data) {
                $('#city').html(data);
            }
        });
    });

    $('#postal_code').on("blur", function () {
        var b = BASE_URL;
        var state = $('#state').val();
        var city = $('#city').val();
        var postal_code = $(this).val();
        $.ajax({
            url: b + 'address/zip_code_check/',
            type: 'post',
//            dataType : 'json',
            data: {state: state, city: city, zip: postal_code},
            success: function (data) {
                $('#postal_code').html(data);
            }
        });
    });
    $.get(BASE_URL + 'address/fetch-country/', function (data, status) {
        $('.country').html(data);
        //console.log(data);
    });
});