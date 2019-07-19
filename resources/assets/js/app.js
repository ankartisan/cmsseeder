import Helper from './common/helper';
import Errors from './common/error';
let errors = new Errors();
import swal from 'sweetalert';
window.base_api = '';

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

/**
 * Change language
 */

$(".btn-language").on('click', function (evt) {
    console.log(evt);
    let lang = $(this).attr('data-lang');

    let url = window.location.origin + '/' + lang + '/';
    let path = window.location.pathname.substr(4);

    window.location.replace(url + path);
});
