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
      $_GET['selected']='notice';
      include "menu.php" 
      ?>
    </div>
    <div class="col-10 p-5 text">
      <h3>공지사항</h3>
      <hr />
      <?php
      $notice_id = $_POST['notice_id'];
      $content = $_POST['content'];

      $mysqli = new mysqli("localhost", "root", "", "jwpark");
      $query = "UPDATE NOTICE SET Content='$content' WHERE Notice_id=$notice_id";
      # TODO: 따옴표 처리
      echo $query;
      $res = mysqli_query($mysqli, $query);
      ?>
      <div>
        
      </div>
    </div>

</body>

</html>