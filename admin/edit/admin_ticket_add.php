<?php
include '../../common/db.php';

$type = $_POST["type"];
$price = $_POST["price"];
$duration_min = $_POST["duration_min"];

try {
  $mysqli = connect();
  $query = "INSERT INTO P_TICKET (Type, Price, Duration_min) 
  VALUES ('$type', $price, $duration_min)";  
  $res = mysqli_query($mysqli, $query);

  echo "
  <script>
    alert('추가가 완료되었습니다.');
    location.replace('../admin_ticket.php');
  </script>
  ";

} catch (Exception $e){
  echo $query;
  echo $e;
}
?>
