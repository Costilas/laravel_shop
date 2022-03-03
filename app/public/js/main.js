function showCart(cart) {
    $('#cart-modal .modal-body').html(cart)
    $('#cart-modal').modal();
    let cartQty = $('#modal-cart-qty').text() ? $('#modal-cart-qty').text() : 0;
    $('.mini-cart-qty').text(cartQty);

    if (cartQty) {
        $('#cart-modal .modal-footer .btn-cart').removeClass('d-none');
    } else {
        $('#cart-modal .modal-footer .btn-cart').addClass('d-none');
    }
}

function getCart(action) {
    $.ajax({
        url: action,
        type: 'get',
        success: function (result) {
            showCart(result);
        },
        error: function () {
            alert('getCart error');
        }
    })
}
//clear cart
function clearCart(action) {
    $.ajax({
        url: action,
        type: 'get',
        success: function (result) {
            showCart(result);
        },
        error: function (msg) {
            alert('Clear Error!')
        }
    });
}

$(function () {
    //Cart
    $('.addtocart').on('submit', function () {
        let form = $(this);
        $.ajax({
            url: form.attr('action'),
            data: form.serialize(),
            type: 'post',
            success: function (result) {
                showCart(result);
            },
            error: function (msg) {
                alert('add Error!')
                console.log(msg.responseJSON);
                form[0].reset();
            }
        });
        return false;
    });
    //delete cart item
    $('#cart-modal .modal-body').on('click', '.delete_item', function () {
        $.ajax({
            url: $(this).data('action'),
            type: 'get',
            success: function (result) {
                showCart(result);
            },
            error: function (msg) {
                alert('Delete Error!')
            }
        });
    });
});


