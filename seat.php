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
  <link rel="icon" href="images/favicon.ico">
</head>

<body>
  <div class="container-sm center">
    <img src="images/logo.png" id="logo">
    <div class="justify-content-center border py-4 px-5 m-5">
      <h2 class="text-center mb-4">좌석 선택</h2>
      <hr />
      <?php
        require 'common/room_seat.php';
      ?>
    </div>
  </div>
</body>

</html>
