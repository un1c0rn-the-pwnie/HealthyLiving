
$(document).ready(function () {
    // Check if passwords match
    // #pwd for first password, rpwd for re-enter password.
    $('#pwd, #rpwd').on('keyup', function () { // add an event handler for every key press check for validity.
        if ($('#pwd').val() != '' && $('#rpwd').val() != '' && $('#pwd').val() == $('#rpwd').val()) { // Check if pwd or rpwd is empty and if they match.
            // Congrats you are secure!
            // Hide error divs and set is-valid class to rpwd.
            $("#pass-invalid-feedback").hide(); 
            $("#rpwd").removeClass('is-invalid');
            $("#rpwd").addClass('is-valid');
            $("#rpwd").get(0).setCustomValidity(''); 
        } else {
            // You are not secure!
            // Show error divs and mark rpwd as invalid.
            $("#pass-invalid-feedback").show();
            $("#rpwd").removeClass('is-valid');
            $("#rpwd").addClass('is-invalid');
            $("#rpwd").get(0).setCustomValidity('passwords don\'t match!');
        }
    });
});


