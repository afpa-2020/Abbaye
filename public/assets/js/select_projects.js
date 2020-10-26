function select_project(id) {
  $.post("/selectproject", { id: id }, function(data) {
    let project = JSON.parse(data);
    $('#projectClient').html(project.clientName + "\n" + project.clientPhone)
    $('#projectName').html(project.shortname.replace("é", "É"));
    $('#projectContact').html(project.fullname);
    $('#projectContract').html(project.type);
    $('#projectStart').html(moment(project.started.date, "YYYY-MM-DD hh:mm:ss.SSSSSS").format("DD/MM/YYYY"));
  });
}