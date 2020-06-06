import {validateFormFields} from "./commom/forms/forms";
import * as loginView from "./views/system/auth/login_view";
import * as userView from "./views/system/users/users_all"


/**
 * Application bootstrap
 */
$(function () {

    validateFormFields();

    $(".date_field").daterangepicker({
        "singleDatePicker": true,
        "showDropdowns": true,
        "locale": {
            "format": "YYYY-MM-DD"
        }
    });

    $(".datatable").DataTable({
        "pageLength": 50,
        "columnDefs": [],
        "ordering": true
    });

    $(".datatable_simple").DataTable({
        "paging": false,
        "odering": true,
        "search": false
    })


    loginView.start();
    userView.all();


})