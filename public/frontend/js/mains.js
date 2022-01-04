
$('.add-to-cart-link').click(function() {
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-url');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        type: "POST",
        data: {
            id
        },
        async: true,
        success: function(data) {
            console.log(data.cart);
            if (data.count) {
                alertify.success('đã thêm sản phẩm vào giỏ hàng');
                // setTimeout(function() {
                //     location.reload();
                // }, 1000);
                $('.product-count').text(data.count);
            }
        }
    });
});


$(document).on('click', '.plus', function() {
    var totalShow = $(this).parent().parent().parent().find('.total');
    var totalAll = $(this).parent().parent().parent().parent().find('.total-all');
    console.log(total);
    var quantity = parseInt($(this).parent().find('.text').val());
    quantity = quantity + 1;
    $(this).parent().find('.text').val(quantity);
    var total = parseInt($('.product-price').parent().find('.price').val());
    //   console.log(total);
    total = quantity * total;
    // console.log(total);
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-url');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            // 'Content-Type': 'Application/json',
            // 'Accept' : 'application/json'
        }
    });
    $.ajax({
        url: url,
        type: "POST",
        data: {
            id,
            quantity,
            total
        },
        async: true,
        success: function(data) {
            console.log(data.totalAll)
            totalShow.text(data.total);
            totalAll.text(data.totalAll);
            location.reload();
            // $(this).parent().find('.total').text(data.total);
        }
    });
})
$(document).on('click', '.minus', function() {
    var totalShow = $(this).parent().parent().parent().find('.total');
    var totalAll = $(this).parent().parent().parent().parent().find('.total-all');
    console.log(total);
    var quantity = parseInt($(this).parent().find('.text').val());
    quantity = quantity - 1;
    $(this).parent().find('.text').val(quantity);
    var total = parseInt($('.product-price').parent().find('.price').val());
    //   console.log(total);
    total = quantity * total;
    // console.log(total);
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-url');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            // 'Content-Type': 'Application/json',
            // 'Accept' : 'application/json'
        }
    });
    $.ajax({
        url: url,
        type: "POST",
        data: {
            id,
            quantity,
            total
        },
        async: true,
        success: function(data) {
            console.log(data.totalAll)
            totalShow.text(data.total);
            totalAll.text(data.totalAll);
            location.reload();
            // $(this).parent().find('.total').text(data.total);



        }
    });
})
