Stripe.setPublishableKey('pk_test_6XFT1rpRKu0OKhgWnwL0Qm8g');

var paymentErrors = $('#payment-errors');

$("#payment-form").submit(function (e) {
    paymentErrors.addClass('hidden');
    $("#payment-form").find('button').prop('disabled', true);
    Stripe.card.createToken({
        number: $('#cardNumber').val(),
        cvc: $('#cardCVC').val(),
        exp_month: $('#cardExpMM').val(),
        exp_year: $('#cardExpYY').val()
    }, stripeResponseHandler);
    return false;
});

function stripeResponseHandler(status, response) {
    var $form = $('#payment-form');
    if (response.error) {
        paymentErrors.removeClass('hidden');
        paymentErrors.text(response.error.message);
        $form.find('button').prop('disabled', false);
    } else {
        var token = response.id;
        $form.append('<input type="hidden" name="stripeToken" value="' + token + '" />');
        $form.get(0).submit();
    }
}
