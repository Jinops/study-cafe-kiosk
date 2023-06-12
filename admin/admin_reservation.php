<?php 
require '../common/db.php'; 
$user_id = $_GET['user_id'];
?>
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
      $_GET['selected']='reservation';
      include "menu.php" 
      ?>
    </div>
    <div class="col-10 p-5">
      <h3>예약 내역
        <?php
        if($user_id){
          echo "(User id=$user_id)";
        }
        ?>
      </h3>
      <hr/>
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">Reserve_id</th>
            <th scope="col">User_id</th>
            <th scope="col">Room_id</th>
            <th scope="col">Seat_id</th>
            <th scope="col">Ticket_id</th>
            <th scope="col">Start_time</th>
            <th scope="col">End_time</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          date_default_timezone_set("Asia/Seoul");
          $currentTime = date("y-m-d H:i:s");

          $mysqli = connect();
          $query = "SELECT * FROM P_RESERVE";

          if($user_id){
            $query = $query.' WHERE User_id='.$user_id;
          }
          $res = mysqli_query($mysqli, $query);
          $rows = $res->fetch_all(MYSQLI_ASSOC);

          foreach($rows as $row){
            $reserve_id = $row['Reserve_id'];
            $user_id = $row['User_id'];
            $room_id = $row['Room_id'];
            $seat_id = $row['Seat_id'];
            $ticket_id = $row['Ticket_id'];
            $start_time = $row['Start_time'];
            $end_time = $row['End_time'];

            $action = '';
            if(strtotime($currentTime) < strtotime($end_time)){
              $action = "
              <a href='edit/admin_reservation_leave.php?reserve_id=$reserve_id'>
                <button class='btn btn-danger'>강제퇴실</button>
              </a>
              ";
            } else{
              $action = "퇴실 완료";
            }

            echo "
            <tr>
              <td>$reserve_id</td>
              <td>$user_id</td>
              <td>$room_id</td>
              <td>$seat_id</td>
              <td>$ticket_id</td>
              <td>$start_time</td>
              <td>$end_time</td>
              <td>$action</td>
            </tr>
            ";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

</body>

</html>