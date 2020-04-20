'use strict';

module.exports = function(app) {
    var todoList = require('./controller');

    app.route('/')
        .get(todoList.index);

    app.route('/users')
        .get(todoList.users);

    app.route('/products')
        .get(todoList.products);

    app.route('/photos')
        .get(todoList.photos);
    
    app.route('/photos/:id')
        .get(todoList.photos_id);
    
    app.route('/stocksPhotos/:stock_id')
        .get(todoList.photos_stockid);
    
    app.route('/stocksPhotos/:stock_id/:id')
        .get(todoList.photosDetail_stockid);
};