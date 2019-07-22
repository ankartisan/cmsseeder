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

$(document).on('submit', '#create-order', function(event){
    Helper.startLoading();
    let data = Helper.getFormResults(this);

    axios.post(base_api +'/order', data)
        .then(function (response) {
            console.log(response.data.data);
            window.location.href = base_api;
            Helper.endLoading();
        })
        .catch(function (error) {
            Helper.endLoading();
            errors.record(error.response.data.details);
            errors.show();
        });

    event.preventDefault();

});


function initHSComponents () {
    // initialization of unfold component
    $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));
}
