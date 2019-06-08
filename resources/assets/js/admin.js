window.base_api = '/admin';

if(['admin.user','admin.users'].includes(window.route)) {
    require('./admin/user');
}

if(['admin.post','admin.posts'].includes(window.route)) {
    require('./admin/post');
}

if(['admin.asset','admin.assets'].includes(window.route)) {
    require('./admin/asset');
}

if(['admin.category','admin.categories'].includes(window.route)) {
    require('./admin/category');
}

if(['admin.page','admin.pages'].includes(window.route)) {
    require('./admin/page');
}



