var SUCCESS = 1;
var FAIL = 2;
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $("#csrf-token").val(),
    },
});
$(document).ready(function () {
    validateForm($("#contact-form"));
    initRules();
    $(".btn-close-md").on("click", function () {
        location.reload();
    });
    $("#btn-submit").on("click", function () {
        return formSubmit();
    });
});

function formSubmit() {
    if ($("#contact-form").valid()) {
        var data = {
            name: $("#name").val(),
            email: $("#email").val(),
            phone: $("#phone").val(),
            message: $("#message").val(),
            url: window.location.href,
        };
        submitContact(data);
        return false;
    }
    return false;
}

function submitContact(formData) {
    var flg = true;
    $.ajax({
        url: "/contact/save",
        type: "POST",
        data: formData,
        //async: false,
        dataType: "json",
        beforeSend: function () {
            console.log("beforeSend");
            showPopupMessage(
                "notification",
                '<img class="md-image" src="/client/home/assets/img/loading.gif"/>   Sending...'
            );
        },
        success: function (data) {
            console.log(data);
            if (data.status == false) {
                flg = false;
                showPopupMessage(
                    "notification",
                    "Contact Us fail, please try ..."
                );
            } else {
                showPopupMessage(
                    "notification",
                    "Thank you for the inquiry. We'll be in touch soon!"
                );
            }
        },
        error: function (error) {
            flg = false;
            closeModal("notification");
        },
    });
    return flg;
}
/**
 *validate
 */
function validateForm($form) {
    $form.validate({
        ignore: "",
        onsubmit: false,
        onfocusout: function (element, event) {
            if ($(element).valid()) {
                $(element).closest("div.form-group").removeClass("has-error");
                $(element)
                    .closest("div.form-group")
                    .find("label.error")
                    .remove();
            }
        },

        onkeyup: function (element, event) {
            $(element).valid();
        },

        errorPlacement: function (error, element) {
            $(element).closest("div.formfield").addClass("has-error");
            if ($(element).hasClass("phone")) {
                $(error).insertAfter($(element).closest("div.intl-tel-input"));
            } else if ($(element).hasClass("ckbox")) {
                $(element)
                    .closest("div.form-group")
                    .find(".ckbox-error")
                    .append(error);
            } else {
                error.insertAfter(element);
            }
        },

        invalidHandler: function (form, validator) {
            if (!validator.numberOfInvalids()) {
                return;
            }
            //scrollToTopElement($(validator.errorList[0].element));
        },
    });
}

function initRules() {
    $("#name").rules("add", {
        required: true,
        minlength: 2,
    });
    $("#email").rules("add", {
        required: true,
        email: true,
    });
    $("#phone").rules("add", {
        required: true,
    });
}
function showPopupMessage(idModal, msg) {
    $("#" + idModal)
        .find(".modal-body")
        .html(msg);
    $("#" + idModal).modal("show");
}
function closeModal(idModal) {
    $("#" + idModal).modal("hide");
}
