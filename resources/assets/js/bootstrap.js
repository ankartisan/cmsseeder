/**
 * Jquery include
 */
try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {
    console.log(e);
}
/**
 * Jquery validate include
 */
define(["jquery-validation"], function( $ ) {
    $("form").validate();
});
/**
 * Axios include
 */
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
/**
 * CSRF token
 */
let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});





