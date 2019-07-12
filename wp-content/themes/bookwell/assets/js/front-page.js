jQuery(document).ready(function () {
    var owl = jQuery('.owl-carousel');
    owl.owlCarousel({
        margin: 20,
        nav: true,
        loop: true,
        autoplay: true,
        smartSpeed: 1000,
        autoplayTimeout: 7000,
        autoplayHoverPause: true,

        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1025: {
                items: 3
            }
        }
    })
    jQuery('#rs-home-contact-industry-select').select2();
    jQuery('#home_reference_select').select2();

    jQuery(document).on('submit', '#rs-home-contact-form', function (e) {
        e.preventDefault();
        let url = wp_options.ajax_url;
        let form = jQuery(this);
        let data = {};
        jQuery.each(form.serializeArray(), function(_, kv) {
            if (data.hasOwnProperty(kv.name)) {
                data[kv.name] = $.makeArray(paramObj[kv.name]);
                data[kv.name].push(kv.value);
            }
            else {
                data[kv.name] = kv.value;
            }
        });
        data.action = 'send_lead';
        data.nonce = wp_options.ajax_nonce;
        jQuery.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function (response) {
                jQuery('.a-validate-message-container').html('');
                if(response != 'success'){
                    let errors = JSON.parse(response);
                    for(let error in errors){
                        console.log(errors[error]);
                        let selector = '[data-field="'+error+'"]';
                        jQuery(selector).html(errors[error])
                    }
                }else{
                    jQuery('#rs-home-contact-form input[type="submit"]').val('success').prop('disabled', true);
                }
                console.log(response)
            }
        });
    })

})