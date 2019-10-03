import Helper from './../common/helper';
import Errors from './../common/error';
import swal from 'sweetalert';
let errors = new Errors();


/** =====================================
 *  Product
 * =====================================
 */


/**
 * Update/create product
 */
$(document).on('submit', '#update-product', function(event){
    errors.clear();
    let data = Helper.getFormResults(this);
    Helper.startLoading();

    if(data['id'] != undefined) {
        axios.put(base_api +'/products/'+ data['id'], data)
            .then(function (response) {
                location.reload();
                Helper.endLoading();
            })
            .catch(function (error) {
                Helper.endLoading();
                errors.record(error.response.data.details);
                errors.show();
            });
    } else {
        axios.post(base_api +'/products', data)
            .then(function (response) {
                var entity_id = response.data.data;
                window.location.href = base_api + '/products/'+entity_id;
                Helper.endLoading();
            })
            .catch(function (error) {
                Helper.endLoading();
                errors.record(error.response.data.details);
                errors.show();
            });
    }

    event.preventDefault();
});

/**
 * Delete page
 */
$("#btn-delete-entity").on('click', function(evt) {

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this product!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                let entity_id = $(this).attr("data-entity-id");
                axios.delete(base_api + '/products/'+entity_id, {})
                    .then(function (response) {
                        window.location.href = base_api + '/products';
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        });
});

/**
 * Search
 */
let inputTypingTimer;
$('#search-form input[name="search"]').on('keyup', function () {
    clearTimeout(inputTypingTimer);
    inputTypingTimer = setTimeout(function() {
        submitSearchForm({reset_pagination: true});
    },300);
});
$('#search-form input[name="search"]').on('keydown', function () {
    clearTimeout(inputTypingTimer);
});

$("#search-form").submit(function( event ) {
    Helper.startLoading();
    let data = Helper.getFormResults(this);
    let query = Helper.encodeQueryData(data);

    window.history.pushState("ajax", "Search", base_api + '/products?'+query);

    axios.get(base_api + '/products/search?'+query)
        .then(function (response) {
            $('.list-container').html(response.data);
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

    $( "#search-form").submit();
}

/**
 * Sorting
 */

$(document).on('click', 'span.sort', function(event){
    let sort = $(this).attr('data-sort');
    let order = $("#search-form input[name='order']").val();

    if(order === "asc") {
        order = "desc"
    } else if(order === "asc") {
        order = "desc"
    } else {
        order = "asc"
    }

    $("#search-form input[name='sort']").val(sort);
    $("#search-form input[name='order']").val(order);

    submitSearchForm();
});


/**
 * Pagination
 */

function updatePage(page) {
    $("#search-form input[name='page']").val(page);
}

$(document).on('click', 'ul.pagination a', function(event){
    updatePage($(this).attr('data-page'));
    submitSearchForm();

    event.preventDefault();
});

/**
 * Open upload dialog
 */
$("#btn-photo-upload").on('click', function(evt) {
    $("#input-photo-upload").click();
});

/**
 * Upload asset
 */
$("#input-photo-upload").on('change', function(evt) {
    let files = evt.target.files;
    let formData = new FormData();
    formData.append('file',files[0]);
    formData.append('entity_type',$(this).attr("data-entity-type"));
    formData.append('return',"assets_container");

    let entity_id = ($(this).attr("data-entity-id") === 'new') ? 0 : $(this).attr("data-entity-id");
    formData.append('entity_id', entity_id);

    let config = {
        headers: {
            'content-type': 'multipart/form-data'
        }
    };

    Helper.startLoading();
    axios.post(base_api + '/assets/upload', formData, config)
        .then(response => {

            $('.assets-container').html(response.data);

            Helper.endLoading();
        }).catch(function (error) {
        console.log(error);
        Helper.endLoading();
    })
});

/**
 * Delete asset
 */
$(document).on('click', '.btn-asset-delete', function(event){
    let entity_id = $(this).attr("data-entity-id");

    Helper.startLoading();
    axios.delete(base_api + '/assets/' + entity_id)
        .then(response => {

            $("#container-asset-"+entity_id).remove();

            Helper.endLoading();
        }).catch(function (error) {
        console.log(error);
        Helper.endLoading();
    });
});

/**
 * Update asset
 */
$(document).on('change', '.chb-asset-featured-update', function(event){
    let entity_id = $(this).attr("data-entity-id");

    let data = { featured: $(this).is(':checked')};

    axios.put(base_api + '/assets/' + entity_id, data)
        .then(response => {


        }).catch(function (error) {
        console.log(error);
    });
});

/**
 * Add variant
 */

$(document).on('click', '.btn-variant-add', function(event){
    $('.variant-container').last().after($('.variant-container').last().clone())

    $( ".variant-container" ).each(function( index ) {
        $(this).find('input.name').attr('name', 'variants['+index+'].name');
        $(this).find('input.options').attr('name', 'variants['+index+'].options');
    });
});

/**
 * Update variants
 */
$(document).on('submit', '#update-product-variants', function(event){
    errors.clear();
    let data = Helper.getFormResults(this);

    axios.put(base_api +'/products/' + data['id'] + '/variants' , data)
        .then(function (response) {
            //location.reload();
            console.log(response);
            Helper.endLoading();
        })
        .catch(function (error) {
            Helper.endLoading();
            errors.record(error.response.data.details);
            errors.show();
        });

    event.preventDefault();
});