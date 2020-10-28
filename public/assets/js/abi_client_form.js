/*
Auteur : Maxime MONTAGNE
Dernière modification le 26/08/20
*/
/**
 * Enables "edit mode".
 * Allows the user to modify selected client's information.
 * Triggers when clicking on the "Modifier" button (#modif).
 */
function editClient() {
    $('#modif, #valider, #annuler, #delete').toggle();
    $('.editableClient').prop("disabled", false);
    $('.editableClient').toggleClass("form-control-plaintext");
};
/**
 * Checks every single .editableClient inputs.
 * If all are valid, enables the user to save the modification to the targeted client.
 * Triggers when clicking on the "Enregistrer" button (#valider).
 */
function validClient() {
    if ($('.editableClient.is-valid').length > 0 &&
        $('.editableClient.is-invalid').length === 0) {

        let update = {
            id: $('#clientId').html(),
            companyName: $('#clientName').html(),
            type: $('#clientType').html(),
            address: $('#clientAdresse').val(),
            zip: $('#clientCp').val(),
            city: $('#clientVille').val(),
            phone: $('#clientTelephone').val(),
            activity: $('#clientDomaine').val(),
            nature: $('#clientNature').val(),
            turnover: $('#clientCa').val(),
            workforce: $('#clientEffectif').val(),
            comment : $('#clientCommentaire').val(),
        }

        $.post('/updatecustomer', update, function(reponse) {
            console.log(reponse);
            alert('Client mis à jour avec succès !');
            annulation();
        })
    }
    else {
        alert('Client non-conforme.');
    }

};
/**
 * Allows the user to exit "edit mode".
 * All .editableClient inputs return to a "disabled" state.
 */
function annulation() {
    $('#modif, #valider, #annuler, #delete').toggle();
    $('.editableClient').removeClass("is-valid is-invalid");
    $('.editableClient').prop("disabled", true);
    $('.editableClient').toggleClass("form-control-plaintext");
};

$("#formNewCustomer").submit(function (event) {
    event.preventDefault();
    if ($('.editableModal.is-valid').length == $('.editableModal').length) {
        let newCustomer = {
            companyName: $('#newRaisonSociale').val(),
            type: $('#newType').val(),
            address: $('#newAdresse').val(),
            zip: $('#newCp').val(),
            city: $('#newVille').val(),
            phone: $('#newTelephone').val(),
            activity: $('#newDomaine').val(),
            nature: $('#newNature option:selected').val(),
            turnover: $('#newCa').val(),
            workforce: $('#newEffectif').val(),
            form: "ok"
        }

        $.post('/addcustomer', newCustomer, function (reponse) {
            if (reponse === "1") {
                alert('Nouveau client ajouté avec succès');
                $('.editableModal').val("").removeClass('is-valid');
                $('#editModal').modal('hide');
            } else {
                alert(reponse);
            }
        });

    }
    else {
        alert('Client non-conforme.');
    }
});

function deleteClient() {

    let confirmation = confirm('Ce client sera définitivement supprimé. Continuer ?')
    if (confirmation){
        let toDelete = {
            id: $('#clientId').html()
        }
    
        $.post('/deletecustomer', toDelete, function(reponse) {
            alert('Client supprimé !');
            annulation();
            Location.reload;
        })
    }

};
/**
 * User Input Control Function
 * @param {string} input The Id of the input which is to be verified.
 * @param {string} regex The method of control which is to be applied. 
 */
function verifNewInput(input, regex) {
    if (regex.test($(input).val())) {
        $(input).removeClass('is-invalid').addClass('is-valid');
    }
    else {
        $(input).removeClass('is-valid').addClass('is-invalid');
    }
}
/**
 * This function filters the information needed by the verifNewInput function.
 */
$('.editableClient, .editableModal').focusout(function () {
    /**
     * @type {string} The selected input's id is stored in this variable.
     */
    let idInput = $(this).attr('id');
    /**
     * @type {Object} Empty variable which is to accept one of seven possible regular expressions.
     */
    let regexAuto;
    /**
     * @type {Array<string>} Array including keywords which help to identify if the current input
     * needs to be verified by the verifString regex.
     */
    let tabInputName = ["Adresse", "Domaine", "RaisonSociale", "Ville"];
    /**
     * @type {Array<string>} Array including keywords which help to identify if the current input
     * needs to be verified by the verifInteger regex.
     */
    let tabInputInteger = ["Ca", "Effectif"];

    let verifString = new RegExp('^[a-zA-Z0-9À-ÿ.\'\,_\s-][a-zA-Z0-9À-ÿ. \'\,_\s-]{0,40}[a-zA-Z0-9À-ÿ.\'_\s-]$');
    let verifCP = new RegExp('^[0-9]{5}$');
    let verifTelephone = new RegExp('^(([0-9]{2} ){4}[0-9]{2})$|^[0-9]{10}$');
    let verifMail = new RegExp('^([a-zA-Z]{1,})([a-zA-Z._-]{0,1})[a-zA-Z]+@[a-zA-Z]+\.[a-zA-Z]{2,6}$');
    let verifInteger = new RegExp('^[1-9]{1,}[0-9]{0,}$');
    let verifNature = new RegExp('^principale$|^secondaire$|^ancienne$', 'i');
    let verifCommentaire = new RegExp('^[a-zA-Z0-9À-ÿ. \'_\!\?\,\s-]{0,255}$');

    //Considering the current input (idInput), we determine which regex needs to be applied.
    if (tabInputName.some(el => idInput.includes(el))) {
        regexAuto = verifString;
    } else if (tabInputInteger.some(el => idInput.includes(el))) {
        regexAuto = verifInteger;
    } else if (idInput.includes('Cp')) {
        regexAuto = verifCP;
    } else if (idInput.includes('Email')) {
        regexAuto = verifMail;
    } else if (idInput === 'clientCommentaire') {
        regexAuto = verifCommentaire;
    } else if (idInput.includes('Telephone')) {
        regexAuto = verifTelephone;
    } else if (idInput === 'clientNature') {
        regexAuto = verifNature;
    }
    verifNewInput('#' + idInput, regexAuto);
});