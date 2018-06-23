import Helper from './helper.js';
import Errors from './classes/Errors';
let errors = new Errors();

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

// FACEBOOK LOGIN
$(document).ready(function() {
    function checkLoginState() {
        FB.getLoginStatus(function(response) {
            //statusChangeCallback(response);
        });
    }
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '339394523139551',
            cookie     : true,
            xfbml      : true,
            version    : 'v2.7'
        });
        FB.AppEvents.logPageView();
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
});

function facebookLogin() {
    let on_success = $('#on-success').val();

    FB.login(function(response) {
        if (response.status === 'connected') {
            FB.api('/me', {fields: 'id,email,gender,birthday,first_name,last_name,picture,location,hometown'}, function(response) {

                axios.post(base_api + '/login-facebook', response)
                    .then(function (response) {
                        $('#sign-up-modal').modal('hide');
                        console.log(response);
                        if(on_success === "submit-job") {
                            app.submitJob();
                        } else {
                            window.location.href = 'dashboard';
                        }

                    })
                    .catch(function (error) {
                        console.log(error.response.data);
                    });

            });
        } else {
            console.log(response);
        }
    }, {scope: 'public_profile,email'});
}


$("#btn-sign-up-fb").on('click', function(evt) {
    facebookLogin();
});

$("#btn-login-fb").on('click', function(evt) {
    facebookLogin();
});

$('#login-modal').on('shown.bs.modal', function (e) {
    errors.clear();
});

$('#sign-up-modal').on('shown.bs.modal', function (e) {
    errors.clear();
});


