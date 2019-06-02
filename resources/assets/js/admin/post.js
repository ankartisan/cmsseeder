import Helper from './../common/helper';
import Errors from './../common/error';
import swal from 'sweetalert';
let errors = new Errors();


/** =====================================
 *  Posts
 * =====================================
 */


/**
 * Update/create post
 */
$(document).on('submit', '#update-post', function(event){
    errors.clear();
    let data = Helper.getFormResults(this);
    // User
    let users = $.map($('#select-user').select2('data'), function(value, key) {
        return value.id;
    });
    data.user_id = users[0];

    console.log(data);
    Helper.startLoading();

    if(data['id'] != undefined) {
        axios.put(base_api +'/posts/'+ data['id'], data)
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
        axios.post(base_api +'/posts', data)
            .then(function (response) {
                var entity_id = response.data.data;
                window.location.href = base_api + '/posts/'+entity_id;
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
 * Delete post
 */
$("#btn-delete-post").on('click', function(evt) {

     swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this post!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
     .then((willDelete) => {
         if (willDelete) {
             let post_id = $(this).attr("data-post-id");
             axios.delete(base_api + '/posts/'+post_id, {})
                 .then(function (response) {
                     window.location.href = base_api + '/posts';
                 })
                 .catch(function (error) {
                     console.log(error);
                 });
         }
     });
});

$("#select-user").select2({
    placeholder: "Select user",
    allowClear: true,
    multiple: false
});

/**
 * Open upload post photos dialog
 */
$("#btn-photo-upload").on('click', function(evt) {
    $("#input-photo-upload").click();
});

/**
 * Upload post photo
 */
$("#input-photo-upload").on('change', function(evt) {
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
    axios.post(base_api + '/posts/'+entity_id+'/photos-upload', formData, config)
        .then(response => {

            $(".post-image").html(response.data);

            Helper.endLoading();
        }).catch(function (error) {
        console.log(error);
        Helper.endLoading();
    })
});

/**
 * Delete post photo
 */
$(".btn-delete-post-image").on('click', function(evt) {

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

    window.history.pushState("ajax", "Search", base_api + '/posts?'+query);

    axios.get(base_api + '/posts/search?'+query)
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
