<?php
require 'common/login_check.php';
include 'common/db.php';

$ticket_type=$_GET['ticket_type'];
$ticket_id=$_GET['ticket_id'];
$room_id=$_GET['room_id'];
$seat_id=$_GET['seat_id'];
$payment_type=$_GET['payment_type'];
?>

<!DOCTYPE html>
<html lang="ko">

<head>
  <title>결제</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="scripts/payment.js"></script>
  <!-- for bootstrap library -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- for bootstrap icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
  <!-- for custom-->
  <link rel="stylesheet" href="styles/style.css">
  <link rel="icon" href="images/favicon.ico">
</head>

<body>
  <div class="container-sm center">
    <img src="images/logo.png" id="logo">
    <div class="justify-content-center border py-4 px-5 mx-md-3">
      <div id="step1">
        <h2 class="text-center m-4">결제중입니다</h2>
        <div class="d-flex justify-content-center">
          <div class="spinner-border text-warning" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
      </div>
        <div class="progress m-4" role="progressbar">
          <div id="progress_bar" class="progress-bar bg-warning progress-bar-striped progress-bar-animated" style="width: 0%">
          </div>
        </div>
      </div>
      <div id="step2" class="text-center" style="display:none">
        <?php
        date_default_timezone_set("Asia/Seoul");
        $currentTime = date("y-m-d H:i:s");

        try {
          $mysqli = connect();
          $query_ticket = "SELECT Price, Duration_min FROM P_TICKET WHERE Ticket_id=$ticket_id;";
          $res = mysqli_query($mysqli, $query_ticket);
          $rows_ticket = $res->fetch_all(MYSQLI_ASSOC);
          $price = $rows_ticket[0]['Price'];
          $duration_min = $rows_ticket[0]['Duration_min'];

          $endTime = date("y-m-d H:i:s",strtotime("$currentTime + $duration_min minutes"));

          # payment
          $query_payment = "INSERT INTO P_PAYMENT (User_id, Ticket_id, Price, Time, Type) 
          VALUES($user_id, $ticket_id, $price, '$currentTime', '$payment_type')";  
          $res = mysqli_query($mysqli, $query_payment);

          # reserve
          $query_reserve = "INSERT INTO P_RESERVE (User_id, Room_id, Seat_id, Ticket_id, Start_time, End_time) 
          VALUES($user_id, $room_id, $seat_id, $ticket_id, '$currentTime', '$endTime')";  
          $res = mysqli_query($mysqli, $query_reserve);
          $reserve_id = mysqli_insert_id($mysqli);

           # user-reserve
          $query_user_reserve = "INSERT INTO P_USER_RESERVE (User_id, Reserve_id) 
          VALUES($user_id, $reserve_id)";  
          $res = mysqli_query($mysqli, $query_user_reserve);
          
          # user
          $query_user = "UPDATE P_USER SET Total_payment=Total_payment+$price WHERE User_id=$user_id;";
          $res = mysqli_query($mysqli, $query_user);

          echo "<h2>결제 완료</h2>";
          echo "<i class='bi bi-check text-warning h1'></i>";
        } catch (Exception $e){
          echo "<h2>결제 실패</h2>";
          echo $query_ticket."<br/>";
          echo $query_payment."<br/>";
          echo $query_reserve."<br/>";
          echo $query_user_reserve."<br/>";
          echo $query_user."<br/>";
          echo $e."<br/><br/>";
        }
        session_destroy();
        ?>
        <p>잠시 후 초기화면으로 돌아갑니다.</p>
      </div>
    </div>
  </div>
</body>

</html>