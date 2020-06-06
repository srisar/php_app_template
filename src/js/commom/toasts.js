toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
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

export function showInfoToast(message) {
    toastr.info(message);
}

export function showWarningToast(message) {
    toastr.warning(message);
}

export function showErrorToast(message) {
    toastr.error(message);
}

export function showSuccessToast(message) {
    toastr.success(message);
}