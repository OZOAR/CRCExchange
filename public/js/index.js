$('#payment-form input').attr('disabled', true);
$('#payment-form select').attr('disabled', true);

function calcCurse(update = 'btc') {
    let currency = $('#curr-select').val();
    let crypto = $('#crypto-select').val();
    let euros = $('#eur-field').val();
    let btc = $('#btc-field').val();

    if (update == 'btc') {
        let BTC = (euros / currencies[currency][crypto]).toFixed(5);
        $('#btc-field').val(BTC);
    } else {
        let euros = (currencies[currency][crypto] * btc).toFixed(5);
        $('#eur-field').val(Math.ceil(euros));
    }
}

$(document).ready(function () {
    $('.owl-carousel').owlCarousel({
        loop: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        items: 2,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
        }
    });

    $.ajax({
        url: '/currencies',
        dataType: 'json',
        success: function (response) {
            window.currencies = response.currencies;
            console.log(currencies);
            $('#courses-loading-bar').slideUp();

            let euros = $('#eur-field').val();
            let BTC = (euros / currencies['EUR']['BTC']).toFixed(5);

            window.minAmount = {
                'EUR': '30 EUR.',
                'USD': '30 USD.',
                'RUB': '2000 RUB.'
            };
            $('#btc-field').val(BTC);
            $('#payment-form').on('change', '#curr-select', function () {
                let crypto = $('#crypto-select').val(),
                    currency = $(this).val();
                $('#current-curse').text('1 ' + crypto + ' = ' + currencies[currency][crypto].toFixed(5) + ' ' + currency);
                $('#min-amount').text(minAmount[currency]);
                calcCurse('euro');
            });
            $('#payment-form').on('change', '#btc-field', function () {
                calcCurse('euro');
            });

            $('#payment-form').on('change', '#crypto-select', function () {
                let crypto = $(this).val(),
                    currency = $('#curr-select').val();
                $('#current-curse').text('1 ' + crypto + ' = ' + currencies[currency][crypto].toFixed(5) + ' ' + currency);
                calcCurse('btc');
            });

            $('#payment-form').on('change', '#eur-field', function () {
                let money = $(this).val(),
                    currency = $('#curr-select').val(),
                    crypto = $('#crypto-select').val();
                console.log(money);

                let BTC = (money / currencies[currency][crypto]).toFixed(5);
                $('#btc-field').val(BTC);
                console.log(BTC);
            });

            $('#payment-form input').attr('disabled', false);
            $('#payment-form select').attr('disabled', false);

            let _crypto = $('#crypto-select').val();
            let _curr = $('#curr-select').val();

            $('#current-curse').text('1 ' + _crypto + ' = ' + currencies[_curr][_crypto].toFixed(5) + ' ' + _curr);
        },
        error: function (error) {
            console.log(error);
            $('#courses-loading-bar').text("{{ __('homepage.payment.form.loading_error_text') }}");
        }
    });

    let checked = $('#locale-switcher input').prop('checked');

    if (!checked) {
        $('#payment-process h1').css('font-size', '36px')
    }
});