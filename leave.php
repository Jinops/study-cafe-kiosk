<?php
require 'common/login_check.php';
require 'common/db.php';

$reserve_id=$_GET['reserve_id'];
$reserve_id=$_GET['reserve_id'];
?>
<!DOCTYPE html>
<html lang="ko">

<head>
  <title>이용권 선택</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- for bootstrap library -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- for bootstrap icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
  <!-- for custom-->
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/leave.css">
  <link rel="icon" href="images/favicon.ico">
</head>

<body>
  <div class="container-sm center">
    <img src="images/logo.png" id="logo">
    <div class="justify-content-center border py-4 px-5 mx-md-3 text-center">
      <h2 class="mb-4">사용중인 회원</h2>
      <hr />
      <h3>이미 사용중인 이용권이 있습니다.</h2>
      <div class="row text-center">
      <?php
      try {
        $mysqli = connect();
        $query = "SELECT * FROM P_RESERVE WHERE Reserve_id=$reserve_id And User_id=$user_id;";
        $res = mysqli_query($mysqli, $query);
        $rows = $res->fetch_all(MYSQLI_ASSOC);
        $row = $rows[0];

        $room_id = $row['Room_id'];
        $seat_id = $row['Seat_id'];
        $ticket_id = $row['Ticket_id'];
        $start_time = $row['Start_time'];
        $end_time = $row['End_time'];

        echo"<p>Room Id: $room_id / Seat Id: $seat_id<br/>";
        echo"입실 시간: $start_time<br/>";
        echo"퇴실 예정 시간: $end_time</p>";

        $query_ticket = "SELECT Type FROM P_TICKET WHERE Ticket_id=$ticket_id";
        $res = mysqli_query($mysqli, $query_ticket);
        $rows_ticket = $res->fetch_all(MYSQLI_ASSOC);
        $type = $rows_ticket[0]['Type'];

        if ($type=='basic'){
          echo "
          <a href='leave_process.php?reserve_id=$reserve_id'>
            <button class='btn btn-xs btn-dark fs-1 btn_leave_type'>
            <i class='bi bi-box-arrow-left'></i><br />퇴실하기
            </button>
          </a>
          ";
        } else if ($type=='fixed'){
          session_destroy();
          echo "
          <h4>정기권 사용자 - 입실하세요</h4>
          ";
          echo "
          <div>
            <a href='./'><button class='btn btn-lg btn-dark'>
              초기화면
            </button></a>
          </div>
          ";
        }
      } catch (Exception $e){
        echo $query;
        echo $e;
      }
      ?>
      </div>
        
    </div>
  </div>
</body>

</html>