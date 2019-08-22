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

            swal({
                title: "Successfully added",
                type: "success",
                text: "Product is added to your cart. You wish to continue shopping or review your cart?",
                icon: "success",
                buttons: ["Continue Shopping", "Review Cart"]
            }).then((reviewCart) => {
                   if(reviewCart) {
                       window.location.href = '/cart'
                   }
             });

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

/***************
 * Products search page
 ***************/
$(document).ready(function() {

    /**
     * Search
     */
    let inputTypingTimer;
    $('#product-search-form input[name="search"]').on('keyup', function () {
        clearTimeout(inputTypingTimer);
        inputTypingTimer = setTimeout(function() {
            submitSearchForm({reset_pagination: true});
        },300);
    });
    $('#product-search-form input[name="search"]').on('keydown', function () {
        clearTimeout(inputTypingTimer);
    });

    $(document).on('change', '#product-search-form input[data-submit-on-change="1"]', function(event){
        clearTimeout(inputTypingTimer);
        inputTypingTimer = setTimeout(function() {
            submitSearchForm({reset_pagination: true});
        },300);

    });

    $("#product-search-form").submit(function( event ) {
        Helper.startLoading();
        let data = Helper.getFormResults(this);
        let query = Helper.encodeQueryData(data);

        window.history.pushState("ajax", "Search", base_api + '/products?'+query);

        axios.get(base_api + '/products/search?'+query)
            .then(function (response) {
                $('.list-container').html(response.data);
                $.HSCore.components.HSSelectPicker.init('.js-select');
                Helper.endLoading();
            })
            .catch(function (error) {
                Helper.endLoading();
            });

        event.preventDefault();

    });

    function submitSearchForm(options = {}) {

        if(options.reset_pagination) {
            updatePage(1);
        }

        $( "#product-search-form").submit();
    }

    /**
     * Sorting
     */

    $(document).on('change', 'select.product-sort', function(event){
        let sort = 'created_at';
        let order = 'asc';

        let value = $(this).val();

        if(value !== "") {
            let arr = value.split("|");
            sort = arr[0];
            order = arr[1];
        }

        $("#product-search-form input[name='sort']").val(sort);
        $("#product-search-form input[name='order']").val(order);

        submitSearchForm();
    });


    /**
     * Pagination
     */

    function updatePage(page) {
        $("#product-search-form input[name='page']").val(page);
    }

    $(document).on('click', 'ul.pagination a', function(event){
        updatePage($(this).attr('data-page'));
        submitSearchForm();

        event.preventDefault();
    });
});



