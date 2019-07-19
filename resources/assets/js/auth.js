import Helper from './common/helper';
import Errors from './common/error';
let errors = new Errors();
import swal from 'sweetalert';

// LOGIN
$( "#login-form" ).submit(function( event ) {
    Helper.startLoading();
    errors.clear();
    let credentials = Helper.getFormResults(this);

    axios.post('/login', credentials)
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

    axios.post('/logout', data)
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

    axios.post('/register', data)
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