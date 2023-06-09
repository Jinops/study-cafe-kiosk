<?php
require 'common/login_check.php';
require 'common/db.php';
$ticket_type=$_GET['ticket_type'];
$ticket_id=$_GET['ticket_id'];
?>
<!DOCTYPE html>
<html lang="ko">

<head>
  <title>좌석 선택</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- for bootstrap library -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- for bootstrap icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
  <!-- for custom-->
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/seat.css">
  <link rel="icon" href="images/favicon.ico">
</head>

<body>
  <div class="container-sm center">
    <img src="images/logo.png" id="logo">
    <div class="justify-content-center border py-4 px-5 m-5">
      <h2 class="text-center mb-4">좌석 선택</h2>
      <hr />
      <!-- controller -->
      <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
      <?php
      try {
        $mysqli = connect();
        $query = "SELECT DISTINCT * FROM P_ROOM;";  
        $res = mysqli_query($mysqli, $query);
        $rows_room = $res->fetch_all(MYSQLI_ASSOC);

        $active='active';
        foreach ($rows_room as $row){
          $room_id = $row['Room_id'];
          $name = $row['Name'];
          echo "
          <li class='col nav-item $active' role='presentation'>
            <button class='nav-link $active' data-bs-toggle='pill' data-bs-target='#pills-$room_id'
            type='button' role='tab' aria-controls='pills-$room_id'>$name</button>
          </li>
          ";
          $active='';
        }
      } catch (Exception $e){
        echo $query;
        echo $e;
      }
      ?>
      </ul>

      <!-- content -->
      <div class="tab-content text-center border p-5" id="pills-tabContent">
        <?php
        $active='active';
          foreach ($rows_room as $row_room){
            $room_id = $row_room['Room_id'];
            $room_width = $row_room['Width'];
            $room_height = $row_room['Height'];
            
            try {
            $query = "SELECT * FROM P_SEAT WHERE Room_id=$room_id;";  
            $res = mysqli_query($mysqli, $query);
            $rows_seat = $res->fetch_all(MYSQLI_ASSOC);
            echo "<div class='tab-pane fade show $active' id='pills-$room_id' role='tabpanel'>
            <div class='room' style='width: $room_width%; padding-bottom:$room_height%;'>";
            
            foreach ($rows_seat as $row){
              $seat_id = $row['Seat_id'];
              $width = $row['Width'];
              $height = $row['Height'];
              $x = $row['X'];
              $y = $row['Y'];
              $style = "width:$width%; height:$height%; left:$x%; top:$y%;";

              echo "
                <a href='./payment.php?ticket_type=$ticket_type&ticket_id=$ticket_id&room_id=$room_id&seat_id=$seat_id'>
                <button class='seat btn btn-sm btn-outline-dark' style='$style'>$seat_id</button>
                </a>
                ";
            }
            echo "</div>";
            echo "</div>";
            
            $active = '';
            } catch(Exception $e){
              echo $query;
              echo $e;
            }
          }
        ?>
      </div>
      <!-- -->
    </div>
  </div>
</body>

</html>