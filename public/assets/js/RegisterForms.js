/**
 * @file Ce fichier permet de faire une vérification d'un formulaire en JS et en Ajax pour que le PHP puisse fonctionner 
 * @author Léa MERLEY <lea.merley@orange.fr>
 */

/**
 * Cette fonction permet d'aller récuperer les éléments que l'on as besoin pour faire la vérification de notre formulaire
 */
$("#registerForms").submit(function (event) {
    event.preventDefault();
    let identifiant = $(this).find("input[name=identifiant]").val();
    let email = $(this).find("input[name=email]").val();
    let password = $(this).find("input[name=password]").val();
    let confirmPassword = $(this).find("input[name=confirmPassword]").val();

/**
 * Cette requete AJAX nous permet de relier le PHP et le JS pour faire fonctionner les deux ensembles
 */
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
                $("#email").removeClass('is-valid');
                $("#email").addClass('is-invalid'); 
            } else if (reponse.includes("Le mot de passe") !== false) {
                $('#getError').html(reponse);
                $("#password").removeClass('is-valid');
                $("#password").addClass('is-invalid'); 
                
                $("#confirmPassword").removeClass('is-valid');
                $("#confirmPassword").addClass('is-invalid'); 
            }
        });
    } else {
        $("#registerForms input").each(function () {
            $(this).focusout();
        })
    }

})

/**
 * Cette fonction permet d'appliquer la vérification valide et invalide
 */
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


/**
 * Cette fonction permet de dire si l'identifiant est valide 
 * On demande un certain nombre de caractère
 * @param {string} identifiant 
 */

function identifiantIsValid(identifiant) {
    let regex = /[a-zA-ZÀ-ÿ]{2,}$/;
    return regex.test(identifiant);
}

/**
 * Cette fonction permet de verifier si l'email est valide
 * L'email doit respecter un certain nombre de caractère
 * @param {string} email 
 */
function emailIsValid(email) {
    let regex = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return regex.test(email);
}

/**
 * Cette fonction permet de verifier si le mot de passe est valide 
 * Le mot de passe doit au moins contenir 8 caractère
 * @param {string} password 
 */
function passwordIsValid(password) {
    let regex = /([a-zA-Z0-9]){8,}$/;
    return regex.test(password);
}

/**
 * Cette fonction permet de verifier si la confirmation du  mot de passe est valide
 * La confirmation du mot de passe doit etre exactement la meme que celle du mot de passe  
 * @param {string} confirmPassword 
 */
function confirmPasswordIsValid(confirmPassword) {
    let password = $('#password').val();
    if (password === confirmPassword && confirmPassword !== "") {
        return true
    } else {
        return false
    }
}

