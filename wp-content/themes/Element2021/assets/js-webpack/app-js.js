// importing JQuery as global variable and Foundation core JS
window.$ = window.jQuery = require("jquery"); // passing jquery to $ and jQuery variables and making them global
import 'foundation-sites';

$(document).foundation();

// importing custom JS from assets/scripts/js-webpack-compiled folder
requireAll(require.context('../scripts/js', true, /\.js$/));

function requireAll(r) { r.keys().forEach(r); }