import Helper from './helper.js';
import Errors from './classes/Errors';
let errors = new Errors();
import swal from 'sweetalert';


// LOGIN
$( "#login-form" ).submit(function( event ) {
    Helper.startLoading();
    errors.clear();
    let credentials = Helper.getFormResults(this);

    axios.post(base_api + '/login', credentials)
        .then(function (response) {
            console.log(response);
            Helper.endLoading();
            window.location.href = '/admin/dashboard';
        })
        .catch(function (error) {
            Helper.endLoading();
            errors.record(error.response.data);
            errors.show();
        });

    event.preventDefault();

});

// LOGOUT
$("#btn-logout").on('click', function(evt) {
    $("#logout-form").submit();
});

$("#logout-form").submit(function(event) {

    let data = Helper.getFormResults(this);

    axios.post(base_api + '/logout', data)
        .then(function (response) {
            // window.location.href = '/';
        })
        .catch(function (error) {
            console.log(error);
        });

    event.preventDefault();

});

// SIGN UP
$( "#sign-up-form" ).submit(function( event ) {
    Helper.startLoading();
    errors.clear();
    let data = Helper.getFormResults(this);

    axios.post(base_api + '/register', data)
        .then(function (response) {
            Helper.endLoading();
            $('#sign-up-modal').modal('hide');
            window.location.href = '/';
        })
        .catch(function (error) {
            Helper.endLoading();
            errors.record(error.response.data.details);
            errors.show();

            console.log(errors);
        });

    event.preventDefault();

});

$('#login-modal').on('shown.bs.modal', function (e) {
    errors.clear();
});

$('#sign-up-modal').on('shown.bs.modal', function (e) {
    errors.clear();
});

/**
 * Submit contact form
 */
$("#contact-form").validate({
    submitHandler: function(form) {
        Helper.startLoading();
        errors.clear();
        let data = Helper.getFormResults(form);

        axios.post(base_api + '/contact', data)
            .then(function (response) {
                Helper.endLoading();
                swal("Your message is sent", "We'll get back to you soon.", "success");
                // Clear
                $("#contact-form input").val("");
                $("#contact-form textarea").val("");
            })
            .catch(function (error) {
                Helper.endLoading();
                errors.record(error.response.data.details);
                errors.show();
                swal("Oops something went wrong", error.response.data.message, "error");
                console.log(errors);
            });
    },
    errorPlacement: function(error, element) {
        //error.appendTo( element.parent(".form-group"));
    }
});


