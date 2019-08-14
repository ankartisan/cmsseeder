import Helper from './common/helper';
import Errors from './common/error';
let errors = new Errors();
import swal from 'sweetalert';
window.base_api = '';

/***************
 * Cart container
 ***************/

/**
 * Add product to cart
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
/**
 * Remove product from cart
 */
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

function initHSComponents () {
    // initialization of unfold component
    $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));
}

/***************
 * Checkout page
 ***************/

/**
 * Create order without account or create new one
 */
$("#create-order").validate({
    submitHandler: function(form) {
        Helper.startLoading();
        errors.clear();
        let data = Helper.getFormResults(form);

        axios.post(base_api +'/order', data)
            .then(function (response) {
                console.log(response.data.data);
                window.location.href = '/order/completed';
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
/**
 * Login and refresh page to refill data
 */
$("#login-order").validate({
    submitHandler: function(form) {
        Helper.startLoading();
        errors.clear();
        let data = Helper.getFormResults(form);

        axios.post(base_api +'/login', data)
            .then(function (response) {
                console.log(response.data.data);
                Helper.endLoading();
                location.reload();
            })
            .catch(function (error) {
                Helper.endLoading();
                errors.record(error.response.data);
                errors.show();
            });
    },
    errorPlacement: function(error, element) {
        error.appendTo( element.parent(".form-group"));
    }
});


/**
 *  Toggle password container
 */
$(document).on('change', '#checkbox-create-account', function(event){
        if($(this).is(':checked')) {
            $('.password-container').removeClass('hidden');
        } else {
            $('.password-container').addClass('hidden');
        }
});
/**
 *  Toggle delivery address container
 */
$(document).on('change', '#checkbox-delivery-billing-address', function(event){
    if($(this).is(':checked')) {
        $('.delivery-address-container').addClass('hidden');
    } else {
        $('.delivery-address-container').removeClass('hidden');
    }
});

/***************
 * Cart review page
 ***************/

/**
 * Remove product from cart
 */
$(document).on('click', '.cart-product-remove', function(){
    let cart_product_id = $(this).attr('data-cart-product-id');
    let remove_id = $(this).attr('data-remove-id');

    axios.post(base_api + '/cart/remove/' + cart_product_id)
        .then(function (response) {
            console.log(response);
            // Update sidebar cart
            $('.cart-container').html(response.data.cart_container_html);
            initHSComponents();
            // Update order summary
            $('.order-summary-container').html(response.data.order_summary_container_html);
            // Remove container
            $('#'+remove_id).remove();
            // Update cart products items
            $('#cart-products-count').html(response.data.cart_products_count);

        })
        .catch(function (error) {
            //swal("Oops something went wrong", error.response.data.message, "error");
            console.log(error);
        });
});

/**
 * Update cart product
 */
$(document).on('change', '.cart-product-update', function(){
    let cart_product_id = $(this).attr('data-cart-product-id');
    let quantity = $(this).val();

    axios.post(base_api + '/cart/update/' + cart_product_id, { quantity: quantity })
        .then(function (response) {
            console.log(response);
            // Update sidebar cart
            $('.cart-container').html(response.data.cart_container_html);
            initHSComponents();
            // Update order summary
            $('.order-summary-container').html(response.data.order_summary_container_html);
            // Update product price
            $('#cart-product-' + cart_product_id +'-price').html(response.data.cart_product.total_price);


        })
        .catch(function (error) {
            //swal("Oops something went wrong", error.response.data.message, "error");
            console.log(error);
        });
});