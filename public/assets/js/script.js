
// Toggle password visibility
$(".form-password-toggle i").click(function () {
    var passwordInput = $("#password");
    var icon = $(".form-password-toggle i");

    // Toggle the type attribute of the password input
    if (passwordInput.attr("type") === "password") {
        passwordInput.attr("type", "text");
        icon.removeClass("bx-hide").addClass("bx-show");
    } else {
        passwordInput.attr("type", "password");
        icon.removeClass("bx-show").addClass("bx-hide");
    }
});

// Toggle confirm password visibility
$(".form-confirm-password-toggle i").click(function () {
    var confirmPasswordInput = $("#password_confirmation");
    var confirmIcon = $(".form-confirm-password-toggle i");

    // Toggle the type attribute of the password input
    if (confirmPasswordInput.attr("type") === "password") {
        confirmPasswordInput.attr("type", "text");
        confirmIcon.removeClass("bx-hide").addClass("bx-show");
    } else {
        confirmPasswordInput.attr("type", "password");
        confirmIcon.removeClass("bx-show").addClass("bx-hide");
    }
});

