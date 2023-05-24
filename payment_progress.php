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
</head>

<body>
  <?php
    $ticket_type=$_GET['ticket_type'];
    $ticket_id=$_GET['ticket_id'];
    $seat_id=$_GET['seat_id'];
    $payment_progress=$_GET['payment_progress'];
  ?>
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
        <h2>결제 완료</h2>
        <i class="bi bi-check text-warning h1"></i>
        <p>잠시 후 초기화면으로 돌아갑니다.</p>
      </div>
    </div>
  </div>
</body>

</html>