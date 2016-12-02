Stripe.setPublishableKey('pk_test_6XFT1rpRKu0OKhgWnwL0Qm8g');

var form = $("#payment-form");
    paymentErrors = $('#payment-errors');
form.submit(function (e) {
    console.log('true3');
    paymentErrors.addClass('hidden');
    form.find('button').prop('disabled', true);
    console.log('true');
    Stripe.card.createToken({
        number: $('#cardNumber').val(),
        cvc: $('#cardCVC').val(),
        exp_month: $('#cardExpMM').val(),
        exp_year: $('#cardExpYY').val()
    }, stripeResponseHandler);
    console.log('true1');
    return false;
});

function stripeResponseHandler(status, response) {
    if (response.error) {
        console.log('true2');
        paymentErrors.removeClass('hidden');
        paymentErrors.text(response.error.message);
        form.find('button').prop('disabled', false);
    } else {
        var token = response.id;

        form.append($('<input type="hidden" name="stripeToken" />').val(token));
        form.get(0).submit();
    }
}
