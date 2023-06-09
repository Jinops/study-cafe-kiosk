<?php
require 'common/login_check.php';
require 'common/db.php';
$ticket_type=$_GET['ticket_type'];
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
      <h2 class="mb-4 text-center">이용권 선택</h2>
      <hr />
      <div class="row">
      <?php
      try {
        $mysqli = connect();
        $query = "SELECT * FROM P_TICKET WHERE Type='$ticket_type';";
        $res = mysqli_query($mysqli, $query);
        $rows = $res->fetch_all(MYSQLI_ASSOC);

        foreach($rows as $row){
          $ticket_id = $row['Ticket_id'];
          $price = number_format($row['Price']); 
          $duration = $row['Duration_min'];

          if($ticket_type=='basic'){
            $duration = $duration/60 .'시간';
          } else if ($ticket_type=='fixed'){
            $duration = $duration/(60*24) .'일';
          } else {
            $duration = $duration .'분';
          }
          
          echo "
          <div class='col-4'>
            <a href='./seat.php?ticket_type=$ticket_type&ticket_id=$ticket_id'>
              <button class='btn btn-dark btn-lg my-1 w-100'>
            <i class='bi bi-clock'></i> $duration 이용권<br />".$price."원</button>
            </a>
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