<?php
session_start();

$phone = $_POST['phone'];
$password = $_POST['password'];

try {
  include '../common/db.php';
  $mysqli = connect();
  $query = "SELECT * FROM P_USER WHERE Phone='$phone' AND Password='$password';";  
  $res = mysqli_query($mysqli, $query);
  $rows = $res->fetch_all(MYSQLI_ASSOC);
  $row = $rows[0];
  
  if($row==null){
    echo "
    <script>
      alert('계정이 존재하지 않습니다!');
      location.replace('../index.php');
    </script>
    ";
  } else{
    $_SESSION['user_id'] = $row['User_id'];
    $_SESSION['name'] = $row['Name'];
    echo "<script>location.replace('../ticket.php');</script>";
    exit;
  }

} catch (Exception $e){
  echo $query;
  echo $e;
}
?>
