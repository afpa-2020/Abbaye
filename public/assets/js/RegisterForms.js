$("#registerForms").submit(function (event) {
    event.preventDefault();
    let identifiant = $(this).find("input[name=identifiant]").val();
    let email = $(this).find("input[name=email]").val();
    let password = $(this).find("input[name=password]").val();
    let confirmPassword = $(this).find("input[name=confirmPassword]").val();


    if (identifiantIsValid(identifiant) && emailIsValid(email) && passwordIsValid(password) && confirmPasswordIsValid(confirmPassword)) {
        $.post("/registration", {
            identifiant: identifiant,
            email: email,
            password: password,
            confirmPassword: confirmPassword
        }, function (reponse) {
            console.log(reponse);
            if (reponse === "true") {
                location.href = "/";
            } else if (reponse.includes("Identifiant") !== false) {
                $('#getError').html(reponse);
                $("#identifiant").removeClass('is-valid');
                $("#identifiant").addClass('is-invalid');
            } else if (reponse.includes("Email") !== false){
                $('#getError').html(reponse);
                $("#identifiant").removeClass('is-valid');
                $("#identifiant").addClass('is-invalid');

              
            } 
        });
    } else {
        $("#registerForms input").each(function () {
            $(this).focusout();
        })
    }

})


$("#registerForms input").focusout(function () {
    let id = $(this).attr('name');
    let functionisValid = id + 'IsValid';
    if (window[functionisValid]($(this).val())) {
        $(this).removeClass('is-invalid');
        $(this).addClass('is-valid');

    } else {
        $(this).removeClass('is-valid');
        $(this).addClass('is-invalid');
    }
})




function identifiantIsValid(identifiant) {
    let regex = /[a-zA-ZÀ-ÿ]{2,}$/;
    return regex.test(identifiant);
}

function emailIsValid(email) {
    let regex = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return regex.test(email);
}

function passwordIsValid(password) {
    let regex = /([a-zA-Z0-9]){8,}$/;
    return regex.test(password);
}

function confirmPasswordIsValid(confirmPassword) {
    let password = $('#password').val();
    if (password === confirmPassword && confirmPassword !== "") {
        return true
    } else {
        return false
    }
}

