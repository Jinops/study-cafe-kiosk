<?php
include '../../common/db.php';

$reserve_id = $_GET['reserve_id'];


try {
  date_default_timezone_set("Asia/Seoul");
  $currentTime = date("y-m-d H:i:s");

  $mysqli = connect();
  $query = "UPDATE P_RESERVE SET End_time='$currentTime' WHERE reserve_id=$reserve_id;";  
  $res = mysqli_query($mysqli, $query);

  echo "
  <script>
    alert('퇴실 처리가 완료되었습니다.');
    location.replace('../admin_reservation.php');
  </script>
  ";

} catch (Exception $e){
  echo $query;
  echo $e;
}
?>
