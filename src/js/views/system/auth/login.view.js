import * as helper from "../../../commom/helper";
let axios = require('axios').default;


export function start() {
    if (document.getElementById("view_login") == null) return null;

    processLogin();

}

function processLogin() {

    let fields = {
        'username': $("#field_username"),
        'password': $("#field_password")
    }

    $("#btn_login").click(function () {

        axios.post(`${helper.getSiteUrl()}/api/auth/process-login`, {
            'username': fields.username.val(),
            'password': fields.password.val()
        })
            .then(function (response) {

                helper.redirect(`${helper.getSiteUrl()}`);

            })
            .catch(function (error) {

                toastr["error"](error.response.data.data);

            });

    });

}