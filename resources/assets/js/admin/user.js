import Helper from './../common/helper';
import Errors from './../common/error';
import swal from 'sweetalert';
let errors = new Errors();


/**
 * Update/create user
 */
$("#update-user").submit(function( event ) {
    errors.clear();
    let data = Helper.getFormResults(this);
    Helper.startLoading();

    if(data['id'] != undefined) { // UPDATE USER
        axios.put(base_api +'/users/'+ data['id'], data)
            .then(function (response) {
                location.reload();
                Helper.endLoading();
            })
            .catch(function (error) {
                errors.record(error.response.data.details);
                errors.show();
                Helper.endLoading();
            });
    } else { // NEW USER
        axios.post(base_api +'/users', data)
            .then(function (response) {
                window.location.href = '/admin/users';
            })
            .catch(function (error) {
                errors.record(error.response.data.details);
                errors.show();
                Helper.endLoading();
            });
    }

    event.preventDefault();
});

/**
 * Delete user
 */
$("#btn-delete-user").on('click', function(evt) {

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this user!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                let user_id = $(this).attr("data-user-id");
                axios.delete(base_api + '/users/'+user_id, {})
                    .then(function (response) {
                        window.location.href = '/admin/users';
                    })
                    .catch(function (error) {
                        console.log(error);
                        Helper.endLoading();
                    });
            }
        });
});

/**
 * Open user avatar upload dialog
 */
$("#btn-avatar-upload").on('click', function(evt) {
    $("#input-avatar-upload").click();
});

/**
 * Upload user avatar
 */
$("#input-avatar-upload").on('change', function(evt) {
    let files = evt.target.files;
    let formData = new FormData();
    formData.append('file',files[0]);
    let config = {
        headers: {
            'content-type': 'multipart/form-data'
        }
    };
    let entity_id = $(this).attr("data-entity-id");

    Helper.startLoading();
    axios.post(base_api + '/users/'+ entity_id +'/avatar-upload', formData, config)
        .then(response => {
            console.log(response.data);
            $(".user-image").html(response.data);
            Helper.endLoading();
        }).catch(function (error) {
        console.log(error);
        Helper.endLoading();
    })

});

/**
 * Delete post photo
 */
$(".btn-delete-avatar").on('click', function(evt) {

    let entity_id = $(this).attr("data-entity-id");

    Helper.startLoading();
    axios.delete(base_api + '/assets/'+entity_id)
        .then(response => {

            $("#container-file-"+entity_id).remove();
            Helper.endLoading();
        }).catch(function (error) {
        console.log(error);
        Helper.endLoading();
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

    window.history.pushState("ajax", "Search", base_api + '/users?'+query);

    axios.get(base_api + '/users/search?'+query)
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