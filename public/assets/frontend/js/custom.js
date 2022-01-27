$(document).ready(function() {

    $('.addToCartBtn').click(function (e) { 
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.product_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty_product').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "/add-to-cart",
            data: {
                'product_id' : product_id,
                'product_qty' : product_qty,
            },
            success: function (response) {
              alert(response.status);
              window.location.reload();
            }
        });
        
    });


    $('.update-cart-item').click(function (e) { 
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.product_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty_product').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "/update-cart-item",
            data: {
                'product_id' : product_id,
                'product_qty' : product_qty, 
            },
            success: function (response) {
                alert(response.status);
                window.location.reload();
            }
        });
        
    });

    $('.delete-cart-item').click(function (e) { 
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.product_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "/delete-cart-item",
            data: {
                'product_id' : product_id, 
            },
            success: function (response) {
                alert(response.status);
                window.location.reload();
            }
        });
        
    });

});