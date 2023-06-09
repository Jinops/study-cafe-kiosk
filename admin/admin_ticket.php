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
      $_GET['selected']='ticket';
      include "menu.php" 
      ?>
    </div>
    <div class="col-10 p-5">
      <h3>사용권 관리</h3>
      <hr />
      <div class="text-end m-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Add</button>
      </div>
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">Ticket_id</th>
            <th scope="col">Ticket_type</th>
            <th scope="col">Ticket_price</th>
            <th scope="col">Duration_min</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $mysqli = connect();
          $query = "SELECT * FROM P_TICKET";
          $res = mysqli_query($mysqli, $query);
          $rows = $res->fetch_all(MYSQLI_ASSOC);

          foreach($rows as $row){
            $ticket_id = $row["Ticket_id"];
            $type = $row["Type"];
            $price = $row["Price"];
            $duration_min = $row["Duration_min"];

            $price_fit = number_format($price).'원';
            $type_fit = '';
            $duration_fit = number_format($duration_min).'분';
            $duration_unit = '';

            if($type=='basic'){
              $type_fit = '시간권';
              $duration_unit = $duration_min/60 .'시간';
            }else if($type=='fixed'){
              $type_fit = '정기권';
              $duration_unit = $duration_min/(60*24) .'일';
            }

            echo "
            <tr>
              <td>$ticket_id</td>
              <td>$type ($type_fit)</td>
              <td>$price_fit</td>
              <td>$duration_fit ($duration_unit)</td>
              <td><button class='btn btn-info' data-bs-toggle='modal' data-bs-target='#editModal'
                  data-bs-whatever='@m1'>Edit</button></td>
              <td><button class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteModal'
                  data-bs-whatever='@m1'>Delete</button></td>
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