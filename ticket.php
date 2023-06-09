<?php
require 'common/login_check.php';
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
  <link rel="stylesheet" href="styles/ticket.css">
  <link rel="icon" href="images/favicon.ico">
</head>

<body>
  <div class="container-sm center">
    <img src="images/logo.png" id="logo">
    <div class="justify-content-center border py-4 px-5 mx-md-3">
      <h2 class="text-center mb-4">이용권 종류 선택</h2>
      <hr />
      <div class="row">
        <div class="col text-end">
          <a href="ticket_list.php?ticket_type=basic">
            <button class="btn btn-dark fs-1 btn_ticket_type">
              <i class="bi bi-clock"></i><br />시간권
            </button>
          </a>
        </div>
        <div class="col text-start">
          <a href="ticket_list.php?ticket_type=fixed">
            <button class="btn btn-dark fs-1 btn_ticket_type">
              <i class="bi bi-calendar-week"></i><br />고정석
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>