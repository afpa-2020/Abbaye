/**
 * Fonction connexion qui permet de se connecter a la page accueilvip en tant qu'utilisateur
 * @param {string} inputEmail
 * @param {string} inputPassword
 * @param {boolean} connect
 */

function connexion() {
    let inputidentifiant = $('#inputIdentifiant').val(); // inputEmail prend la valeur entrée dans #inputEmail
    let inputPassword = $('#inputPassword').val(); // inputPassword prend la valeur entrée dans #inputPassword
   
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let data = xhr.responseText;

            alert(JSON.parse(data));
            console.log(data['name']);
            console.log(data.mdp);
        }
    };

    const data = {
        name: inputidentifiant,
        mdp: inputPassword
    };

    xhr.open('POST', '/login', true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(JSON.stringify(data));


}

function solution(){
    let inputidentifiant = $('#inputIdentifiant').val(); 
    let inputPassword = $('#inputPassword').val(); 
    $.post('/login', {name: inputidentifiant, mdp: inputPassword}, function(data) {
        console.log(JSON.parse(data));
    } )
}


/*function conne() {
    let inputidentifiant = $('#inputIdentifiant').val(); // inputEmail prend la valeur entrée dans #inputEmail
    let inputPassword = $('#inputPassword').val(); //

    fetch('/login', {method:'post', body: JSON.parse('{"name":'+ inputidentifiant + '", mdp":' + inputPassword + '}')})
    .then(function(response) {
        return response;
    })
    .then(function(data) {
        console.log(data);
    })
}
*/