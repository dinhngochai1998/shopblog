
$("#search-post").keyup(function () {
    var title = $('#search-post').val();
    var url = $(this).attr('data-url');
    console.log(title);
    $.ajax({
        url: url,
        type: "GET",
        data: {
            title
        },
    })
        .done(function (data) {
            if (data.html == " ") {
                $('.ajax-load').html("No more records found");
                return;
            }
            $('#list-post tr').remove();
            $("#list-post").append(data.html);
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            alert('server not responding...');
        });
});