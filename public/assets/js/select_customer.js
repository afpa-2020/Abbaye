


function select_customer(id) {
  const xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      let customer = JSON.parse(this.response);
      document.getElementById('clientName').innerHTML = customer.company_name;
      console.log(customer);
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