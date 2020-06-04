import * as helper from "../../../commom/helper";
import {makeInputFieldInvalid, resetInputFields} from "../../../commom/forms/forms";

let axios = require('axios').default;

export function start() {
    if (document.getElementById("view_add_user") == null) return false;

    processAddUser();

}

function processAddUser() {


    $("#btn_add_user").click(function () {

        resetInputFields($("#form_add_user"));


        let fields = {
            'display_name': $("#field_display_name"),
            'username': $("#field_username"),
            'password': $("#field_password"),
            'role': $("#dropdown_user_role"),
        };

        let validated = true;

        if (fields.display_name.val().trim() === "") {
            validated = false;
            makeInputFieldInvalid(fields.display_name);
        }
        if (fields.username.val().trim() === "") {
            validated = false;
            makeInputFieldInvalid(fields.username);
        }
        if (fields.password.val() === "") {
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
                toastr['error'](error.response.data.data);

            });

    });


}