<?php 
require '../common/db.php'; 
$user_id = (isset($_GET['user_id'])) ? $_GET['user_id'] : NULL;
?>
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
</head>

<body>
  <div class="row">
    <div class="col-2">
      <?php 
      $_GET['selected']='payment';
      include "menu.php" 
      ?>
    </div>
    <div class="col-10 p-5">
      <h3>결제 내역
        <?php
        if($user_id){
          echo "(User id=$user_id)";
        }
        ?>
      </h3>
      <hr/>
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">Payment_id</th>
            <th scope="col">User_id</th>
            <th scope="col">Ticket_id</th>
            <th scope="col">Price</th>
            <th scope="col">Time</th>
            <th scope="col">Type</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $mysqli = connect();
          $query = "SELECT * FROM P_PAYMENT";

          if($user_id){
            $query = $query.' WHERE User_id='.$user_id;
          }
          $res = mysqli_query($mysqli, $query);
          $rows = $res->fetch_all(MYSQLI_ASSOC);

          foreach($rows as $row){
            $payment_id = $row['Payment_id'];
            $user_id = $row['User_id'];
            $ticket_id = $row['Ticket_id'];
            $price = $row['Price'];
            $time = $row['Time'];
            $type = $row['Type'];

            $type_fit = '';
            $price_fit = number_format($price).'원';

            if($type=='card'){
              $type_fit = '카드';
            }else if($type=='cash'){
              $type_fit = '현금';
            }

            echo "
            <tr>
              <td>$payment_id</td>
              <td>$user_id</td>
              <td>$ticket_id</td>
              <td>$price_fit</td>
              <td>$time</td>
              <td>$type_fit</td>
            </tr>
            ";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

</body>

</html>