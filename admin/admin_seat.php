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
  <link rel="stylesheet" href="styles/style.css">
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

      <h4>Room</h4>
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">Room_id</th>
            <th scope="col">Name</th>
            <th scope="col">Width</th>
            <th scope="col">Height</th>
            <th scope="col">Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $mysqli = connect();
          $query = "SELECT * FROM P_ROOM;";
          $res = mysqli_query($mysqli, $query);
          $rows = $res->fetch_all(MYSQLI_ASSOC);

          foreach($rows as $row){
            $room_id = $row['Room_id'];
            $name = $row['Name'];
            $width = $row['Width'];
            $height = $row['Height'];

            echo "
            <form method='post' action='./responses/admin_seat_room_edit.php'>
              <tr>
                <td><input type='number' name='room_id' value='$room_id' readonly></td>
                <td><input name='name' value='$name' minlength=1 maxlength=20></td>
                <td><input type='number' name='width' value='$width' min=1 max=100></td>
                <td><input type='number' name='height' value='$height' min=1 max=100></td>
                <td><input type='submit' value='수정' class='btn btn-info'></td>
              </tr>
            </form>";
          }
          ?>
        </tbody>
      </table>
      <h4>Seat</h4>
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
          </tr>
        </thead>
        <tbody>
        <?php
        $mysqli = connect();
        $query = "SELECT * FROM P_SEAT;";
        $res = mysqli_query($mysqli, $query);
        $rows = $res->fetch_all(MYSQLI_ASSOC);

        foreach($rows as $row){
          $seat_id = $row['Seat_id'];
          $room_id = $row['Room_id'];
          $width = $row['Width'];
          $height = $row['Height'];
          $x = $row['X'];
          $y = $row['Y'];

          echo "
          <form method='post' action='./responses/admin_seat_edit.php'>
            <tr>
              <td><input type='number' value='$room_id' readonly></td>
              <td><input type='number' name='seat_id' value='$seat_id' readonly></td>
              <td><input type='number' name='width' value='$width' min=1 max=100></td>
              <td><input type='number' name='height' value='$height' min=1 max=100></td>
              <td><input type='number' name='x' value='$x' min=1 max=100></td>
              <td><input type='number' name='y' value='$y' min=1 max=100></td>
              <td><input type='submit' value='수정' class='btn btn-info'></td>
            </tr>
          </form>
          ";
        }
        ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>