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
    if (window[function])
})