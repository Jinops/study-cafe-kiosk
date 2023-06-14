<?php
include '../common/db.php';

$phone = $_POST['phone'];
$password = $_POST['password'];

try {
  $mysqli = connect();
  $query = "SELECT * FROM P_USER WHERE Phone='$phone' AND Password='$password';";  
  $res = mysqli_query($mysqli, $query);
  $rows = $res->fetch_all(MYSQLI_ASSOC);
  
  if(!count($rows)){
    echo "
    <script>
      alert('계정이 존재하지 않거나, 비밀번호가 틀렸습니다!');
      location.replace('../index.php');
    </script>
    ";
  } else{
    session_start();
    $user_id = $rows[0]['User_id'];

    $_SESSION['user_id'] = $user_id;
    $_SESSION['name'] = $rows[0]['Name'];

    # Check reservation
    date_default_timezone_set("Asia/Seoul");
    $currentTime = date("y-m-d H:i:s");

    $query = "SELECT * FROM P_RESERVE WHERE User_id=$user_id AND Start_time < '$currentTime' AND End_time > '$currentTime'";
    $res = mysqli_query($mysqli, $query);
    $rows_reserve = $res->fetch_all(MYSQLI_ASSOC);

    if(count($rows_reserve)){
      $reserve_id=$rows_reserve[0]['Reserve_id'];
      echo "<script>location.replace('../leave.php?reserve_id=$reserve_id');</script>";
    } else{
      echo "<script>location.replace('../ticket.php');</script>";
    }
  }
} catch (Exception $e){
  echo $query;
  echo $e;
}
?>
