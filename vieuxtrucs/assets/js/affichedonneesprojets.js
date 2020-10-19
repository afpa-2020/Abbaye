/**
 * Fonction d'affichage des données selectionnées dans le tableau
 * La méthode .on() permet de lier l'événement "click-row.bs.table" a la fonction et ainsi afficher
 * les 2 valeur a l'endroit souhaité.
 */
$('table').on('click-row.bs.table', function(e, row){
    
    $('#nomProjet').val(row.nomProjet);
    $('#codeProjet').val(row.codeProjet);
});

