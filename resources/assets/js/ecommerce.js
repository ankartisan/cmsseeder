import Helper from './common/helper';
import Errors from './common/error';
let errors = new Errors();
import swal from 'sweetalert';
window.base_api = '';

/**
 * E-commerce
 */

$(".btn-product-add").on('click', function (evt) {
    Helper.startLoading();
    let product_id = $(this).attr('data-product-id');

    axios.post(base_api + '/cart/add/' + product_id)
        .then(function (response) {
            $('.cart-container').html(response.data);
            initHSComponents();
            Helper.endLoading();

        })
        .catch(function (error) {
            Helper.endLoading();
            //swal("Oops something went wrong", error.response.data.message, "error");
            console.log(error);
        });
});

$(document).on('click', '.btn-product-remove', function(){
    Helper.startLoading();
    let cart_product_id = $(this).attr('data-cart-product-id');

    axios.post(base_api + '/cart/remove/' + cart_product_id)
        .then(function (response) {
            $('.cart-container').html(response.data);
            initHSComponents();
            Helper.endLoading();

        })
        .catch(function (error) {
            Helper.endLoading();
            //swal("Oops something went wrong", error.response.data.message, "error");
            console.log(error);
        });
});

$("#create-order").validate({
    submitHandler: function(form) {
        Helper.startLoading();
        errors.clear();
        let data = Helper.getFormResults(form);

        axios.post(base_api +'/order', data)
            .then(function (response) {
                console.log(response.data.data);
                Helper.endLoading();
            })
            .catch(function (error) {
                Helper.endLoading();
                errors.record(error.response.data.details);
                errors.show();
            });
    },
    errorPlacement: function(error, element) {
        error.appendTo( element.parent(".form-group"));
    }
});

function initHSComponents () {
    // initialization of unfold component
    $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));
}
// Toggle password container
$(document).on('change', '#checkbox-create-account', function(event){
        if($(this).is(':checked')) {
            $('.password-container').removeClass('hidden');
        } else {
            $('.password-container').addClass('hidden');
        }
});

// Toggle delivery address container
$(document).on('change', '#checkbox-delivery-billing-address', function(event){
    if($(this).is(':checked')) {
        $('.delivery-address-container').addClass('hidden');
    } else {
        $('.delivery-address-container').removeClass('hidden');
    }
});