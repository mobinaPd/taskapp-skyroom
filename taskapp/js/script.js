var baseUrl = "http://localhost/taskapp/taskapp-skyroom/taskapp/";
$(document).ready(function () {

    // validating forms
    $("#form-add-users").validate();
    $("#form-Edit-users").validate();

    loadUsersData(baseUrl);
    $(document).on("click", ".btn-edit-user", function () {
        var userId = $(this).attr("data_id");
        var formData = "action=get_user&user_id=" + userId;
        $.ajax({
            url: baseUrl + "functions.php",
            type: "get",
            data: formData,
            success: function (response) {
                var data = $.parseJSON(response);
                if (data.status == 1) {
                    var userData = data.data;
                    $("#modal-users-edit").modal("show");
                    $("#edit-name").val(userData.name);
                    $("#edit-email").val(userData.email);
                    $("#edit-designation").val(userData.designation);
                    $("#edit-id").val(userData.id);
                } else {
                    toastr.error(data.message);
                }

            }
        });
    })
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

$("#form-edit-users").submit(function (e) {

    e.preventDefault();

    var formdata = "action=update_users&" + $("#form-edit-users").serialize();
    $.ajax({
        url: baseUrl + "functions.php",
        type: "post",
        data: formdata,
        success: function (response) {
            var data = $.parseJSON(response);
            if (data.status == 1) {
                toastr.success(data.message);
            }else {
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
                usersTable += '<td><a href="javascript:void(0)" data_id="' + users.id + '" class="btn btn-warning btn-edit-user" data-toggle="modal" data-target="#modal-users-edit"><i class="fa fa-pencil"></i>Edit</a>  <a href="#" data_id="' + users.id + '" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a></td>';
                usersTable += '</tr>';
            });
            $("#tbl-users").html(usersTable);
        }
    });
}