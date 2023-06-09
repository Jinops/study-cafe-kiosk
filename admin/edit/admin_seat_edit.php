<?php
include '../../common/db.php';

$seat_id = $_POST['seat_id'];
$width = $_POST['width'];
$height = $_POST['height'];
$x = $_POST['x'];
$y = $_POST['y'];

try {
  $mysqli = connect();
  $query = "UPDATE P_SEAT SET Width=$width, Height=$height, X=$x, Y=$y WHERE Seat_id=$seat_id;";  
  $res = mysqli_query($mysqli, $query);

  echo "
  <script>
    alert('수정이 완료되었습니다.');
    location.replace('../admin_seat.php');
  </script>
  ";

} catch (Exception $e){
  echo $query;
  echo $e;
}
?>
