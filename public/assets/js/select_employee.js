function select_employee(id) {
  $.post('/selectemployee', { id: id }, function(data) {
    let employee = JSON.parse(data);
    $('#employeeContract').html(employee.contract);
    $('#employeeId').html(employee.id);
    $('#employeeName').html(employee.firstname + " " + employee.lastname)
    $('#employeeHire').html(moment(employee.hired.date, "YYYY-MM-DD hh:mm:ss.SSSSSS").format("DD/MM/YYYY"));
    $('#employeeDismissed').html((moment(employee.dismissed, "YYYY-MM-DD hh:mm:ss.SSSSSS").format("DD/MM/YYYY") === "Invalid date") ? "Contrat en cours" : moment(employee.dismissed, "YYYY-MM-DD hh:mm:ss.SSSSSS").format("DD/MM/YYYY"));
    $('#employeeRole').html(employee.role);
    $('#employeeSalary').html(employee.salary + " €");
  })
}