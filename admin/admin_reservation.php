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
      $_GET['selected']='reservation';
      include "menu.php" 
      ?>
    </div>
    <div class="col-10 p-5">
      <h3>예약 내역</h3>
      <hr/>
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">Res_id</th>
            <th scope="col">User_id</th>
            <th scope="col">Room_id</th>
            <th scope="col">Seat_id</th>
            <th scope="col">Start_time</th>
            <th scope="col">End_time</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>4</td>
            <td>1</td>
            <td>10</td>
            <td>2023년 5월 22일 월요일 오후 7:06:50</td>
            <td>2023년 5월 22일 월요일 오후 7:06:50</td>
          </tr>
          <tr>
            <td>1</td>
            <td>4</td>
            <td>1</td>
            <td>10</td>
            <td>2023년 5월 22일 월요일 오후 7:06:50</td>
            <td>2023년 5월 22일 월요일 오후 7:06:50</td>
          </tr>
          <tr>
            <td>1</td>
            <td>4</td>
            <td>1</td>
            <td>10</td>
            <td>2023년 5월 22일 월요일 오후 7:06:50</td>
            <td>2023년 5월 22일 월요일 오후 7:06:50</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</body>

</html>