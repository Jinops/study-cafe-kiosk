<?php
require 'common/login_check.php';
$ticket_type=$_GET['ticket_type'];
$ticket_id=$_GET['ticket_id'];
$room_id=$_GET['room_id'];
$seat_id=$_GET['seat_id'];
?>

<!DOCTYPE html>
<html lang="ko">

<head>
  <title>결제</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- for bootstrap library -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- for bootstrap icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
  <!-- for custom-->
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/ticket.css">
  <link rel="icon" href="images/favicon.ico">
</head>

<body>
  <div class="container-sm center">
    <img src="images/logo.png" id="logo">
    <div class="justify-content-center border py-4 px-5 mx-md-3">
      <h2 class="text-center mb-4">결제 수단 선택</h2>
      <hr />
      <div class="row">
        <div class="col text-end">
          <?php
          $data="ticket_type=$ticket_type&ticket_id=$ticket_id&room_id=$room_id&seat_id=$seat_id";
          ?>
          <a href="payment_process.php?<?php echo $data?>&payment_type=card">
            <button class="btn btn-dark fs-1 btn_ticket_type"><i class="bi bi-credit-card"></i><br />신용카드</button>
          </a>
        </div>
        <div class="col text-start">
          <a href="payment_process.php?<?php echo $data?>&payment_type=cash">
            <button class="btn btn-secondary fs-1 btn_ticket_type"><i class="bi bi-cash"></i><br />현금</button>
          </a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>