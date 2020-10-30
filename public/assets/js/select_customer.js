

/**
 * Assure l'affichage du détail des informations du client selectionné.
 * @param {int} id 
 */
function select_customer(id) {
    let inputs = document.getElementById('clientAdresse');
    if (!inputs.disabled){
        annulation(); // Si le mode d'édition est actif, on le quitte.
    }

  const xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        //La réponse est un objet json que l'on parse pour l'exploiter et assurer l'affichage.
        let customer = JSON.parse(this.response);
        document.getElementById('clientName').innerHTML = customer.company_name;
        document.getElementById('clientAdresse').value = customer.address;
        document.getElementById('clientCp').value = customer.zip;
        document.getElementById('clientVille').value = customer.city;
        document.getElementById('clientTelephone').value = customer.phone;
        document.getElementById('clientDomaine').value = customer.activity;
        document.getElementById('clientNature').value = customer.nature;
        document.getElementById('clientCa').value = customer.income;
        document.getElementById('clientEffectif').value = customer.workforce;
        document.getElementById('clientCommentaire').value = customer.comment;
        document.getElementById('clientType').innerHTML = customer.type;
        document.getElementById('clientId').innerHTML = customer.id;

        //On récupére également un tableau d'échantillon de Contacts correspondant au Client (max. 3)
        document.getElementById('contactsListe').innerHTML = "";
        if (customer.contacts.length > 0) {
            customer.contacts.forEach(contact => {
                let row = '<tr>\
                            <th scope="col">'+ contact.lastname + '</th>\
                            <th scope="col">'+ contact.firstname + '</th>\
                            <th scope="col"><a href="mailto:'+ contact.email +'">'+ contact.email + '</a></th>\
                        </tr>';

                document.getElementById('contactsListe').innerHTML += row;
            })
        }
    }
};

  xhr.open("POST", "/selectcustomer", true);
  xhr.setRequestHeader("Content-type", "application/json");
  xhr.send(JSON.stringify({ id: id }));

  /*VERSION jQuery
  $.post('/selectcustomer', {id: id}, function(reponse) {
      
      let customer = JSON.parse(reponse);
      console.log(customer);
      $('#clientAdresse').val(customer.company_name);
      
  })*/
}