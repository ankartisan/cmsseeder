import Helper from './helper.js';
import Errors from './classes/Errors';
let errors = new Errors();

/**
 * Settings / Profile
 */

$("#update-user").submit(function( event ) {
    errors.clear();
    let data = Helper.getFormResults(this);
    Helper.startLoading();

    axios.put(base_api +'/users/settings-profile', data)
        .then(function (response) {
             location.reload();
             Helper.endLoading();
        })
        .catch(function (error) {
            errors.record(error.response.data.details);
            errors.show();
            Helper.endLoading();
        });

    event.preventDefault();
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
    Helper.startLoading();
    axios.post(base_api + '/users/avatar-upload', formData, config)
        .then(response => {
        console.log(response.data);
        $("#img-user-avatar").attr("src","/"+response.data);
        $("#input-user-avatar").val(response.data);
        Helper.endLoading();
    }).catch(function (error) {
        console.log(error);
        Helper.endLoading();
    })

});

