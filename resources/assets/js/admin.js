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

if(['admin.product','admin.products', 'admin.product.variants'].includes(window.route)) {
    require('./admin/product');
}

if(['admin.order','admin.orders'].includes(window.route)) {
    require('./admin/order');
}

if(['admin.config','admin.configs'].includes(window.route)) {
    require('./admin/config');
}



