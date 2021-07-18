require('./bootstrap');
require('bootstrap');

window.$ = window.jQuery = require('jquery');

$(document).ready(function () {
    $('.dropdown-toggle').dropdown();
});