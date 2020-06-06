import * as helper from "../../../commom/helper";
import {makeInputFieldInvalid, resetInputFields} from "../../../commom/forms/forms";

import * as toast from "../../../commom/toasts";

let axios = require('axios').default;

export function start() {
    if (document.getElementById("view_add_user") == null) return false;

    processAddUser();

}

function processAddUser() {


    $("#btn_add_user").on("click", function () {

        resetInputFields($("#form_add_user"));


        let fields = {
            'display_name': $("#field_display_name"),
            'username': $("#field_username"),
            'password': $("#field_password"),
            'role': $("#dropdown_user_role"),
        };

        let validated = true;

        if (fields.display_name.val().toString().trim() === "") {
            validated = false;
            makeInputFieldInvalid(fields.display_name);
        }
        if (fields.username.val().toString().trim() === "") {
            validated = false;
            makeInputFieldInvalid(fields.username);
        }
        if (fields.password.val().toString() === "") {
            validated = false;
            makeInputFieldInvalid(fields.password);
        }


        if (!validated) return false;

        axios.post(`${helper.getSiteUrl()}/api/users/process-add`, {
            'display_name': fields.display_name.val(),
            'username': fields.username.val(),
            'password': fields.password.val(),
            'role': fields.role.val(),
        })
            .then(function (response) {

                helper.redirect(`${helper.getSiteUrl()}/users`);

            })
            .catch(function (error) {
                console.log(error.response.data);
                toast.showErrorToast(error.response.data.data);
                toast.showInfoToast(error.response.data.data);
                toast.showSuccessToast(error.response.data.data);

            });

    });


}