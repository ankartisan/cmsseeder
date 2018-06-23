import Helper from './../helper.js';
import Errors from './../classes/Errors';
import swal from 'sweetalert';
let errors = new Errors();

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

    window.history.pushState("ajax", "Search", base_api + '/assets?'+query);

    axios.get(base_api + '/assets/search?'+query)
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
 * Delete asset
 */
$(document).on('click', '.btn-delete-asset', function(event){
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                let entity_id = $(this).attr("data-entity-id");
                axios.delete(base_api + '/assets/'+entity_id, {})
                    .then(function (response) {
                        window.location.href = base_api + '/assets';
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        });
});

