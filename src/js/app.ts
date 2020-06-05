import {validateFormFields} from "./commom/forms/forms";
import * as loginView from "./views/system/auth/login.view";
import * as userView from "./views/system/users/users.all"


/**
 * Application bootstrap
 */
$(function () {

    validateFormFields();

    loginView.start();
    userView.all();


})