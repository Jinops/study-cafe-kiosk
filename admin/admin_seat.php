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
  <!-- for custom -->
  <link rel="stylesheet" href="./styles/admin_seat.css">
</head>

<body>
  <div class="row">
    <div class="col-2">
      <?php 
      $_GET['selected']='seat';
      include "menu.php" 
      ?>
    </div>
    <div class="col-10 p-5">
      <h3>좌석 관리</h3>
      <hr/>
      <?php
      require '../common/room_seat.php';
      ?>

      <div class="text-end m-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Add</button>
      </div>
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">Room_id</th>
            <th scope="col">Seat_id</th>
            <th scope="col">Width</th>
            <th scope="col">Height</th>
            <th scope="col">X</th>
            <th scope="col">Y</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>2</td>
            <td>10</td>
            <td>5</td>
            <td>0</td>
            <td>0</td>
            <td><button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editModal"
                data-bs-whatever="@m1">Edit</button></td>
            <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-whatever="@m1">Delete</button></td>
          </tr>
          <tr>
            <td>1</td>
            <td>2</td>
            <td>10</td>
            <td>5</td>
            <td>0</td>
            <td>0</td>
            <td><button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editModal"
                data-bs-whatever="@m1">Edit</button></td>
            <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-whatever="@m1">Delete</button></td>
          </tr>
          <tr>
            <td>1</td>
            <td>2</td>
            <td>10</td>
            <td>5</td>
            <td>0</td>
            <td>0</td>
            <td><button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editModal"
                data-bs-whatever="@m1">Edit</button></td>
                <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-whatever="@m1">Delete</button></td>
          </tr>
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