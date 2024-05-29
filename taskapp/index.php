<!DOCTYPE html>
<html lang="en">

<head>
  <title>Users CRUD App</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>

<body>

  <div class="container">
    <h3>PHP & Mysql CRUD App</h3>
    <div class="panel panel-primary">
      <div class="panel-heading">Users List
        <a href="#" style="margin-top: -7px;" class="btn btn-info pull-right" data-toggle="modal" data-target="#modal-users-add"><i class="fa fa-plus"></i>Add users</a>
      </div>
      <div class="panel-body">
        <table class="table table-condensed" id="tbl-usersList">
          <thead>
            <tr>
              <th>#ID</th>
              <th>#Name</th>
              <th>#Email</th>
              <th>#Disignation</th>
              <th>#Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Doe</td>
              <td>john@example.com</td>
              <td>normal</td>
              <td>
                <a href="javascript:void(0)" class="btn btn-warning" data-toggle="modal" data-target="#modal-users-edit"><i class="fa fa-pencil"></i>Edit</a>
                <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Add Users modal -->
  <!-- Modal -->
  <div id="modal-users-add" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">users</h4>
        </div>
        <div class="modal-body">
          <form action="javascript:void(0)" id="form-add-users">
            <div class="form-group">
              <label for="Name">Name:</label>
              <input type="text" required class="form-control" id="name" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" required class="form-control" id="email" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="designation">Designation:</label>
              <select name="designation" required id="designation" class="form-control">
                <option value="">Select designation</option>
                <option value="Normal-user">Normal user</option>
                <option value="pro-user">Pro user</option>
              </select>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- Edit Users modal -->
  <!-- Modal -->
  <div id="modal-users-edit" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit users</h4>
        </div>
        <div class="modal-body">
          <form action="javascript:void(0)" id="form-edit-users">
            <div class="form-group">
              <label for="edit-Name">Name:</label>
              <input type="text" required class="form-control" id="edit-name" name="edit-name" placeholder="Enter name">
            </div>
            <div class="form-group">
              <label for="edit-email">Email address:</label>
              <input type="edit-email" required class="form-control" id="edit-email" name="edit-email" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="edit-designation">Designation:</label>
              <select name="edit-designation" required id="edit-designation" class="form-control">
                <option value="">Select designation</option>
                <option value="Normal-user">Normal user</option>
                <option value="pro-user">Pro user</option>
              </select>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <script src="./js/jquery.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script src="./js/jquery.dataTables.min.js"></script>
  <script src="./js/jquery.validate.min.js"></script>
  <script src="./js/script.js"></script>
</body>

</html>