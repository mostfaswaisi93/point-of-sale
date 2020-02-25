$(document).ready(function() {

    // Add Product btn
    $('.add-product-btn').on('click', function(e) {

        e.preventDefault();
        var name = $(this).data('name');
        var id = $(this).data('id');
        var price = $.number($(this).data('price'), 2);

        $(this).removeClass('btn-success').addClass('btn-default disabled');

        var html =
            `<tr>
                <td>${name}</td>
                <td><input type="number" name="products[${id}][quantity]" data-price="${price}" class="form-control input-sm product-quantity" min="1" value="1"></td>
                <td class="product-price">${price}</td>               
                <td><button class="btn btn-danger btn-sm remove-product-btn" data-id="${id}"><span class="fa fa-trash"></span></button></td>
            </tr>`;

        $('.order-list').append(html);

        // Calculate Total Price
        calculateTotal();
    });

    // $('.add-product-btn').on('click', function(e) {
    //     $('#discount').addClass("discountShow")
    // });

    // Disabled btn
    $('body').on('click', '.disabled', function(e) {

        e.preventDefault();

    });

    // Remove Product btn
    $('body').on('click', '.remove-product-btn', function(e) {

        e.preventDefault();
        var id = $(this).data('id');

        $(this).closest('tr').remove();
        $('#product-' + id).removeClass('btn-default disabled').addClass('btn-success');

        // Calculate Total Price
        calculateTotal();

    });

    // Change Product Quantity
    $('body').on('keyup change', '.product-quantity', function() {

        var quantity = Number($(this).val()); //2
        var unitPrice = parseFloat($(this).data('price')); //150
        console.log(unitPrice);

        $(this).closest('tr').find('.product-price').html($.number(quantity * unitPrice, 2));
        calculateTotal();

    });



    // All Order Products
    $('.order-products').on('click', function(e) {

        e.preventDefault();

        $('#loading').css('display', 'flex');

        var url = $(this).data('url');
        var method = $(this).data('method');
        $.ajax({
            url: url,
            method: method,
            success: function(data) {

                $('#loading').css('display', 'none');
                $('#order-product-list').empty();
                $('#order-product-list').append(data);

            }
        })

    });

    // Print Order
    $(document).on('click', '.print-btn', function() {

        $('#print-area').printThis();

    });

    // Print Order - Before
    $(document).on('click', '.print-before', function() {

        $('.remove-product-btn').css('display', 'none');

        $('#print-area').printThis();

        // printBTN();

    });


    // function printBTN() {
    //     var content = document.getElementById(".print-before-area").innerHTML;


    //     mywindow.document.write("<html><head><title>Print</title>");
    //     mywindow.document.write("<style>" + text + "</style>");
    //     mywindow.document.write("</head><body >");
    //     mywindow.document.write(content);
    //     mywindow.document.write("</body></html>");

    //     mywindow.document.close();
    //     mywindow.focus();
    //     mywindow.print();
    //     mywindow.close();
    // }


});

// Calculate The Total
function calculateTotal() {

    var price = 0;

    $('.order-list .product-price').each(function(index) {

        price += parseFloat($(this).html().replace(/,/g, ''));

    });

    $('#total-price').html(Math.round(price));

    // Check if Price > 0
    if (price > 0) {

        $('#add-order-form-btn').removeClass('disabled')

    } else {

        $('#add-order-form-btn').addClass('disabled')

    }

}

function discount() {
    // var sssss = Number($(this).val()); //2

    // num1 = document.getElementById("total-price").value;
    // valDicount = document.getElementById("discount").value;


    // document.getElementById("result").innerHTML = num1 - valDicount;
    alert("HHH");
}


// $('body').on('onkeypress', '.discount', function() {

//     discount();

// });