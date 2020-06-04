import {validateFormFields} from "./commom/forms/forms";
import * as loginView from "./views/system/auth/login.view";
import * as userView from "./views/system/users/users.all"
import toastr from "./libs/toastr"

window.toastr = toastr;

toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}


/**
 * Application bootstrap
 */
$(function () {
    validateFormFields();

    loginView.start();
    userView.all();


})