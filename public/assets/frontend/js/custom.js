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
              swal(response.status);
              window.setTimeout(function(){location.reload()},2500);
              
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
                swal(response.status, {
                    icon : "success",
                    buttons: false,
                });
                window.setTimeout(function(){location.reload()},2500);
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
        swal({
            title: "Seriously?",
            text: "Are you sure wanna remove this?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "/delete-cart-item",
                    data: {
                        'product_id' : product_id, 
                    },
                    success: function (response) {
                        swal(response.status, {
                            buttons : true,
                            icon : "success",
                        });
                        window.setTimeout(function(){location.reload()},2500);
                    }
                });
            } else {
              swal("Oh Shit im shocked!!!");
            }
          });
    });

});