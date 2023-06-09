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
  <style>
  .room {
    pointer-events : none;
  }
  </style>
</head>

<body>
  <div class="row">
    <div class="col-2">
      <?php 
      $_GET['selected']='seat_status';
      include "menu.php" 
      ?>
    </div>
    <div class="col-10 p-5">
      <h3>좌석 현황</h3>
      <hr/>
      <div id="room_seat">
      <?php
      ini_set('display_errors', '0');
      include '../common/room_seat.php';
      ?>
      </div>
  </div>
</body>

</html>