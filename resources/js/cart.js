(function ($) {
    $('.item-quantity').on('change', function () {
        $.ajax({
            url: "/cart/" + $(this).data('id'),
            method: 'PUT',
            data: {
                quantity: $(this).val(),
                _token: csrf_token
            },
        }).done(function (response) {
            window.location.reload();
        });
    });

    $('.remove-item').on('click', function () {
        $.ajax({
            url: "/cart/" + $(this).data('id'),
            method: 'DELETE',
            data: {
                _token: csrf_token
            },
        }).done(function (response) {
            window.location.reload();
        });
    });
})(jQuery);
