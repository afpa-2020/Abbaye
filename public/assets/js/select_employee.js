function select_employee(id) {
  $.post('/selectemployee', { id: id }, function(data) {
    let project = JSON.parse(data);
    $('#employeeContract').html(employee.contract);
    $('#employeeHire').html(employee.hired);
    $('#employeeDimissed').html(employee.dissmissed);
    $('#employeeRole').html(employee.role);
    $('#employeeSalary').html(employee.salary);
  })
}