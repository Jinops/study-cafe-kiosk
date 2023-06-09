<?php require '../common/db.php'; ?>
<!DOCTYPE html>
<html lang="ko">

<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- for bootstrap library -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- for bootstrap icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
</head>

<body>
  <div class="row">
    <div class="col-2">
      <?php 
      $_GET['selected']='user';
      include "menu.php" 
      ?>
    </div>
    <div class="col-10 p-5">
      <h3>회원 관리</h3>
      <hr />
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">User_id</th>
            <th scope="col">Phone</th>
            <th scope="col">Name</th>
            <th scope="col">Total_payment</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $mysqli = connect();
          $query = "SELECT * FROM P_USER";
          $res = mysqli_query($mysqli, $query);
          $rows = $res->fetch_all(MYSQLI_ASSOC);

          foreach($rows as $row){
            $user_id = $row['User_id'];
            $phone = $row['Phone'];
            $name = $row['Name'];
            $total_payment = $row['Total_payment'];

            echo"
            <tr>
            <td>$user_id</td>
            <td>$phone</td>
            <td>$name</td>
            <td>$total_payment</td>
            <td><button type='button' class='btn btn-info' data-bs-toggle='modal' data-bs-target='#editModal'
                data-bs-whatever='@m1'>Edit</button></td>
            <td><button class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteModal' data-bs-whatever='@m1'>Delete</button></td>
            </tr>
            ";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5">Edit</h1>
          </div>
          <div class="modal-body">
            <form>
  
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Save</button>
          </div>
        </div>
      </div>
    </div>
  
    <div class="modal fade" id="deleteModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5">Delete</h1>
          </div>
          <div class="modal-body">
            Are you sure?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger">Delete</button>
          </div>
        </div>
      </div>
    </div>
    <!-- -->

</body>

</html>