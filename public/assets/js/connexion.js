/**
 * Fonction connexion qui permet de se connecter a la page accueilvip en tant qu'utilisateur
 * @param {string} inputEmail
 * @param {string} inputPassword
 * @param {boolean} connect
 */

function connexion() {
  let inputidentifiant = $('#inputIdentifiant').val(); // inputEmail prend la valeur entrée dans #inputEmail
  let inputPassword = $('#inputPassword').val(); // inputPassword prend la valeur entrée dans #inputPassword
  let connect = false;
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
      console.log(xhr.responseText);
    }
  };
  var data = { password: inputPassword, identifiant: inputidentifiant };
  xhr.open('POST', '/login', false);
  xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
  xhr.send(JSON.stringify(data));
  console.log(xhr);
}