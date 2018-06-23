window.base_api = '';
require('./main');

console.log(route);

if(route.indexOf('settings') > -1) {
    require('./settings');
}
