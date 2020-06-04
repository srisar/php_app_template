export function validateFormFields() {
    'use strict';
    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        let forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        let validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
}


export function makeInputFieldValid(field) {
    field.addClass('is-valid');
    field.removeClass('is-invalid');
}

export function makeInputFieldInvalid(field) {
    field.addClass('is-invalid');
    field.removeClass('is-valid');
}

/**
 * This resets any is-invalid class applied to any of the input fields
 * in the given container
 * @param container
 */
export function resetInputFields(container) {
    let fields = $(container).find('.form-control');

    $.each(fields, function (i, obj) {
        $(obj).removeClass('is-invalid');
    })
}