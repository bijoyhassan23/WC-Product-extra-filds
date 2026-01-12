jQuery(function ($) {

    let selectedVariant = '';
    let selectedTime = '';

    $('form.variations_form').on('found_variation', function (e, variation) {
        selectedVariant = $('.variations select option:selected').text();
    });

    $('.crystal-book-now').on('click', function () {
        if (!selectedVariant || selectedVariant === 'Choose an option') {
            alert('Please select a variation first');
            return;
        }
        $('#booking-service').val(selectedVariant);
        $('#booking-modal-1').fadeIn();
    });

    $('.crystal-close').on('click', function () {
        $(this).closest('.crystal-modal').fadeOut();
    });

    $('.time-slot').on('click', function () {
        $('.time-slot').removeClass('selected');
        $(this).addClass('selected');
        selectedTime = $(this).data('time');
    });

    $('#goto-modal-2').on('click', function () {
        if (!$('#booking-date').val() || !selectedTime || !$('#booking-team-member').val()) {
            alert('Please complete all fields');
            return;
        }
        $('#booking-modal-1').fadeOut();
        $('#booking-modal-2').fadeIn();
    });

    $('#goto-modal-3').on('click', function () {
        $('#booking-modal-2').fadeOut();
        $('#booking-modal-3').fadeIn();
    });

    $('#back-to-modal-1').on('click', () => {
        $('#booking-modal-2').fadeOut();
        $('#booking-modal-1').fadeIn();
    });

    $('#back-to-modal-2').on('click', () => {
        $('#booking-modal-3').fadeOut();
        $('#booking-modal-2').fadeIn();
    });

    $('#add-to-cart-booking').on('click', function () {

        const payment = $('input[name="payment-type"]:checked').val();
        if (!payment) {
            alert('Select payment option');
            return;
        }

        $.post(crystalBooking.ajax_url, {
            action: 'save_booking_data',
            nonce: crystalBooking.nonce,
            date: $('#booking-date').val(),
            time: selectedTime,
            service: selectedVariant,
            team_member: $('#booking-team-member').val(),
            language: $('#booking-language').val(),
            notes: $('#booking-notes').val(),
            payment_type: payment
        }, function (response) {
            if (response.success) {
                $('form.variations_form button[type="submit"]').trigger('click');
                $('.crystal-modal').fadeOut();
            }
        });
    });

});
