import {validateFormFields} from "./commom/forms/forms";
let $ = require('jquery');
let axios = require('axios').default;


/**
 * Application bootstrap
 */
$(function () {
    validateFormFields();

})