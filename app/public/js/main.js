function showCart(cart) {
    $('#cart-modal .modal-body').html(cart)
    $('#cart-modal').modal();
    let cartQty = $('#modal-cart-qty').text() ? $('#modal-cart-qty').text() : 0;
    $('.mini-cart-qty').text(cartQty);
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

$(function() {

    //Cart
    $('.addtocart').on('submit', function () {
        /*console.log($(this).serialize());
        console.log($(this).attr('action'));*/

        let form = $(this);
        $.ajax({
            url: form.attr('action'),
            data: form.serialize(),
            type: 'post',
            success: function (result) {
                showCart(result);
            },
            error: function (msg) {
                alert('Error!')
                console.log(msg.responseJSON);
                form[0].reset();
            }
        });
        return false;
    });

});
