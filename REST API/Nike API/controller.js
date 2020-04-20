'use strict';

var response = require('./res');
var connection = require('./conn');

exports.index = function(req, res) {
    response.ok("Hello from the Node JS RESTful side! This is API for NIKE Apps...", res)
};

exports.users = function(req, res) {
    connection.query('SELECT * FROM users', function (error, rows, fields){
        if(error){
            console.log(error)
        } else{
            response.ok(rows, res)
        }
    });
};

exports.products = function(req, res) {
    connection.query('SELECT stocks.*, photos.file, photos.filename FROM stocks '+
                    'INNER JOIN photos ON stocks.id = photos.stock_id '+
                    'GROUP BY (stocks.id)', function (error, rows, fields){
        if(error){
            console.log(error)
        } else{
            response.ok(rows, res)
        }
    });
};

exports.photos = function(req, res) {
    connection.query('SELECT * FROM photos', function (error, rows, fields){
        if(error){
            console.log(error)
        } else{
            response.ok(rows, res)
        }
    });
};

exports.photos_id = function(req, res) {
    connection.query('SELECT * FROM photos WHERE id = ? ', [req.params.id], function (error, rows, fields){
        if(error){
            console.log(error)
        } else{
            response.ok(rows, res)
        }
    });
};

exports.photos_stockid = function(req, res) {
    connection.query('SELECT * FROM photos WHERE stock_id = ? ', [req.params.stock_id], function (error, rows, fields){
        if(error){
            console.log(error)
        } else{
            response.ok(rows, res)
        }
    });
};

exports.photosDetail_stockid = function(req, res) {
    connection.query('SELECT * FROM photos WHERE stock_id = ? and id = ? ', [req.params.stock_id, req.params.id], function (error, rows, fields){
        if(error){
            console.log(error)
        } else{
            response.ok(rows, res)
        }
    });
};