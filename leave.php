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
</head>

<body>
  <div class="container-sm center">
    <img src="images/logo.png" id="logo">
    <div class="justify-content-center border py-4 px-5 mx-md-3 text-center">
      <h2 class="mb-4">퇴실하기</h2>
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
        $start_time = $row['Start_time'];
        $end_time = $row['End_time'];

        echo"<p>Room Id: $room_id / Seat Id: $seat_id<br/>";
        echo"입실 시간: $start_time<br/>";
        echo"퇴실 예정 시간: $end_time</p>";

        echo "
        <a href='leave_process.php?reserve_id=$reserve_id'>
          <button class='btn btn-xs btn-dark fs-1 btn_leave_type'>
            <i class='bi bi-clock'></i><br />퇴실하기
          </button>
        </a>
        ";
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