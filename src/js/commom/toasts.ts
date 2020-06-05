import * as toastr from "./../libs/toastr";

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

export function showInfoToast(message: string) {
    toastr['info'](message);
}

export function showWarningToast(message: string) {
    toastr['warning'](message);
}

export function showErrorToast(message: string) {
    toastr['error'](message);
}

export function showSuccessToast(message: string) {
    toastr['success'](message);
}