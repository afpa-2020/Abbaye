/**
 * Fonction connexion qui permet de se connecter a la page accueilvip en tant qu'utilisateur
 * @param {string} inputEmail
 * @param {string} inputPassword
 * @param {boolean} connect
 */

function connexion(){
    let inputEmail = $('#inputEmail').val(); // inputEmail prend la valeur entrée dans #inputEmail
    let inputPassword = $('#inputPassword').val(); // inputPassword prend la valeur entrée dans #inputPassword
    let connect = false ;
    for (let i=0; i<bddUsers.length; i++){
        if (inputEmail === bddUsers[i].email){ // Si inputEmail correspond a l'un des email de la bddUsers
            if (inputPassword === bddUsers[i].password){ // Si inputPassword correspond au password de l'inputEmail rentré
                connect = true ;
            } 
        }
    }
    if (connect == true) { // Accés a la page accueilvip
        window.open("abi_accueilvip.html", "_self" );
    } else {
        alert('Identifiant ou mot de passe incorrect')
    }
}