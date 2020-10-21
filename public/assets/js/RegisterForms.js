$("#registerForms").submit(function (event) {
    event.preventDefault();
    let identifiant = $(this).find("input[name=identifiant]").val();
    let email = $(this).find("input[name=email]").val();
    let password = $(this).find("input[name=password]").val();
    let confirmPassword = $(this).find("input[name=confirmPassword]").val();

    let msg = "Vous venez de vous inscrire : \n" + 
    "identifiant : " + identifiant + "\n" + 
    "email : " + email + "\n" + 
    "password : " + password + "\n" + 
    "confirmPassword : " + confirmPassword + "\n" ; 

    if(identifiantIsValid(identifiant) && emailIsValid(email) && passwordIsValid(password) && confirmPasswordIsValid(confirmPassword)) {
        alert(msg);
    } else {
        $("#registerForms input").each(function () {
            $(this).focusout();
        })
    }
})


$("#registerForms input").focusout(function () {
    let id = $(this).attr('name');
    let functionisValid = id + 'IsValid';
    if (window[functionisValid]($(this).val ())) {
        $(this).removeClass('is-invalid');
        $(this).addClass('is-valid');

    }else{
        $(this).removeClass('is-valid');
        $(this).addClass('is-valid');
    }
})




function identifiantIsValid(string) {
    let regex = /[a-zA-Z0-9]{2,}$/;
    return regex.test(string);
}

function emailIsValid(string) {
    let regex = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return regex.test(string);
}

function passwordIsValid(string) {
    let regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
    return regex.test(string);
}

function confirmPasswordIsValid(string) {
    let regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
    return regex.test(string);
}