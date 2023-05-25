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
</head>

<body>
  <?php
  $ticket_type=$_GET['ticket_type']
  ?>
  <div class="container-sm center">
    <img src="images/logo.png" id="logo">
    <div class="justify-content-center border py-4 px-5 mx-md-3">
      <h2 class="mb-4 text-center">이용권 선택</h2>
      <hr />
      <div class="row">
        <?php
          for($i=1;$i<=7;$i++){
            echo"
            <div class='col-4'>
              <a href='./seat.php?ticket_type=$ticket_type?ticket_id=$i'>
                <button class='btn btn-dark btn-lg my-1 w-100'>
              <i class='bi bi-clock'></i> 4시간 이용권<br />5,000원</button>
              </a>
            </div>
      ";
      }
      ?>
    </div>
  </div>
  </div>
</body>

</html>