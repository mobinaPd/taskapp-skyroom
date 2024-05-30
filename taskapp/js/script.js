var baseUrl = "http://localhost/taskapp/taskapp-skyroom/taskapp/";
$(document).ready(function () {

    // validating forms
    $("#form-add-users").validate();
    $("#form-Edit-users").validate();

    loadUsersData(baseUrl);
});

$("#form-add-users").submit(function (e) {

    e.preventDefault();

    var formdata = "action=save_users&" + $("#form-add-users").serialize();
    $.ajax({
        url: baseUrl + "functions.php",
        data: formdata,
        type: "post",
        success: function (response) {
            var data = $.parseJSON(response);
            if (data.status == 1) {
                toastr.success(data.message);
            } else {
                toastr.error(data.message);
            }
            setTimeout(function () {
                window.location.reload();
            }, 3000)
        }
    });
});

function loadUsersData(baseUrl) {
    var formData = "action=load_users";
    $.ajax({
        url: baseUrl + "functions.php",
        type: "get",
        data: formData,
        success: function (response) {
            var data = $.parseJSON(response);
            var usersTable = "";
            $.each(data.data, function (index, users) {
                usersTable += '<tr>';
                usersTable += '<td>' + users.id + '</td>';
                usersTable += '<td>' + users.name + '</td>';
                usersTable += '<td>' + users.email + '</td>';
                usersTable += '<td>' + users.designation + '</td>';
                usersTable += '<td><a href="javascript:void(0)" data_id="' + users.id + '" class="btn btn-warning" data-toggle="modal" data-target="#modal-users-edit"><i class="fa fa-pencil"></i>Edit</a>  <a href="#" data_id="' + users.id + '" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a></td>';
                usersTable += '</tr>';
            });
            $("#tbl-users").html(usersTable);
        }
    });
}