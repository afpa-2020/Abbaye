/*
Auteur : Maxime MONTAGNE
Dernière modification le 26/08/20
*/
$('document').ready(function () {
    $('.editableClient').val("");
    defaultAffichage(1);
    alert();
});

/**
 * @type {number} : Set the quantity of displayed results
 * when using the defaultAffichage() function.
 * The value can be set by the user (5, 10 or 15).
 */
let nbResultats = parseInt($('#nb_resultats_selec').val());
document.getElementById('nb_resultats_selec').onchange = function () {

    nbResultats = parseInt(this.value);
    defaultAffichage(1);
};

/**
 * Displays targeted element's information
 * @param {number} index : Position of the targeted element in the database
 * Also automatically generates a table with every single targeted element's contacts.
 */
function afficheClient(index) {
    $('#clientName').html(bddClients[index].raisonSociale);
    $('#clientAdresse').val(bddClients[index].adresse);
    $('#clientCp').val(bddClients[index].cp);
    $('#clientVille').val(bddClients[index].ville);
    $('#clientTelephone').val(bddClients[index].telephone);
    $('#clientEmail').val(bddClients[index].mail);
    $('#clientMailTo').attr('href', 'mailto:' + bddClients[index].mail);
    $('#clientDomaine').val(bddClients[index].domaine);
    $('#clientNature').val(bddClients[index].nature);
    $('#clientCa').val(bddClients[index].ca + ' k €');
    $('#clientEffectif').val(bddClients[index].effectif);
    $('#clientId').html(bddClients[index].id);
    $('#clientType').html(bddClients[index].type);
    $('#clientCommentaire').val(bddClients[index].commentaire);

    //Generating a table with the associated client's contacts.
    $('#contactsListe').empty();
    for (let i = 0; i < bddContacts.length; i++) {
        if (bddContacts[i].clientId === bddClients[index].id)
            $('#contactsListe').append(
                '<tr><td>' + bddContacts[i].nom +
                '</td><td>' + bddContacts[i].prenom +
                '</td><td><a href="mailto:' + bddContacts[i].mail +
                '">' + bddContacts[i].mail + '</a></td></tr>');
    }
    //Switching to another client's info will disable the "edit mode".
    if (!$('.editableClient').hasClass('form-control-plaintext')) {
        annulation();
    }
};
/**
 * Generates and displays clients in a table.
 * The number of clients displayed is set by the variable nbResultats.
 * @param {number} indexpage : Current Page
 */
function defaultAffichage(indexpage) {
    if (indexpage === 1) {
        $('#clientsListe').empty();
        for (let r = 0; r < nbResultats; r++) {
            if (r < bddClients.length) {
                $('#clientsListe').append(
                    '<tr onclick="afficheClient(' + r + ')"><td>' + bddClients[r].id +
                    '</td><td>' + bddClients[r].raisonSociale +
                    '</td><td>' + bddClients[r].cp[0] + bddClients[r].cp[1] + '</td></tr>');
            }
        };
    }
    else {
        $('#clientsListe').empty();
        /**
         * @type {number} start defines the position of the first client to be displayed.
         */
        let start = (nbResultats * (indexpage - 1));
        /**
         * @type {number} limite defines the position of the last client to be displayed.
         */
        let limite = start + nbResultats;

        for (let r = start; r < limite; r++) {
            if (r < bddClients.length) {
                $('#clientsListe').append(
                    '<tr onclick="afficheClient(' + r + ')"><td>' + bddClients[r].id +
                    '</td><td>' + bddClients[r].raisonSociale +
                    '</td><td>' + bddClients[r].cp[0] + bddClients[r].cp[1] + '</td></tr>');
            }
        };
    }
    pagination(indexpage);
}

/**
 * Search Function
 * User's input is verified by verifSearch and then injected in searchRegex
 * to dynamically update the #clientsListe table.
 */
$('#searchValue').keyup(function () {
    $('#clientsListe').empty();
    $('#paginationSearch').empty();
    /**
     * @type {string} This variable is to be injected into searchRegex, hence "^" at the beginning.
     * The variable will receive user's inputs from the #searchValue bar.
     */
    let recherche = "^";
    /**
     * @type {Object} Regular Expression made to control user input before injecting it
     * into searchRegex.
     */
    let verifSearch = new RegExp('^[a-zA-Z0-9À-ÿ.\'_\s-][a-zA-Z0-9À-ÿ. \'_\s-]{0,40}$');
    /**
     * @type {Object} Dynamically generated regular expression used to find matches in bddClients database
     */
    let searchRegex;

    if (verifSearch.test($('#searchValue').val().toLowerCase())) {
        recherche += $('#searchValue').val().toLowerCase();
        searchRegex = new RegExp(recherche);
    }
    if (recherche != "^") {
        for (let y = 0; y < bddClients.length; y++) {
            if (searchRegex.test(bddClients[y].raisonSociale.toLowerCase()) ||
                searchRegex.test(bddClients[y].cp)) {
                $('#clientsListe').append(
                    '<tr onclick="afficheClient(' + y + ')"><td>' + bddClients[y].id +
                    '</td><td>' + bddClients[y].raisonSociale +
                    '</td><td>' + bddClients[y].cp[0] + bddClients[y].cp[1] + '</td></tr>');
            }
        }
        if ($('#clientsListe').is(':empty')) {
            $('#clientsListe').append('<tr><td colspan="3" style="text-align:center">Aucun Résultat</td></tr>');
        }
    }
    else {
        defaultAffichage(1);
    }
});

/**
 * Generates the pagination dynamically.
 * @param {number} indexpage : current page.
 */
function pagination(indexpage) {
    /**
     * @type {number} How many pages we need to display our full database "bddClients".
     * Dynamically generated using the length of bddClients and the selected nbResultats.
     */
    let nbPages = Math.ceil(bddClients.length / nbResultats);

    $('#paginationSearch').empty().append('\
    <li id="previousPage" class="page-item disabled">\
        <span class="page-link">Préc.</span>\
    </li >');

    for (let v = 1; v <= nbPages; v++) {
        $('#paginationSearch').append('\
        <li class="page-item autresPages" role="button" id="pageIndex'+ v + '"\
         onclick="defaultAffichage('+ v + ')"><span class="page-link">' + v + '</span></li>');
    }

    $('#paginationSearch').append('\
    <li id="nextPage" class="page-item disabled">\
        <span class="page-link">Suiv.</span>\
    </li>');

    //If the current page is not the first one, the "previous" button activates.
    if (indexpage != 1) {
        $('#previousPage').removeClass('disabled');
        $('#previousPage').attr('role', 'button');
        $('#previousPage').attr('onclick', 'defaultAffichage(' + (indexpage - 1) + ')');
    }
    //If the current page is not the last one, the "next" button activates.
    if (indexpage != nbPages) {
        $('#nextPage').removeClass('disabled');
        $('#nextPage').attr('role', 'button');
        $('#nextPage').attr('onclick', 'defaultAffichage(' + (indexpage + 1) + ')');
    }
    $('#pageIndex' + indexpage).addClass('active');
}

/**
 * Sort Function
 * Depending on the selected sort type (triRs, triDpt, triId) thsi function
 * re-arranges our entire database bddClients and then displays the new results.
 */
$('[name=tri]').change(function () {
    if ($('input[name=tri]:checked').val() === 'triRs') {
        bddClients.sort(function (a, b) {
            return a.raisonSociale.localeCompare(b.raisonSociale);
        })
    }
    else if ($('input[name=tri]:checked').val() === 'triDpt') {
        bddClients.sort((a, b) => parseInt(a.cp) - parseInt(b.cp));
    }
    else {
        bddClients.sort((a, b) => parseInt(a.id) - parseInt(b.id));
    }
    defaultAffichage(1);
})