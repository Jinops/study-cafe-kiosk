<?php
include '../../common/db.php';

$room_id = $_POST['room_id'];
$name = $_POST['name'];
$width = $_POST['width'];
$height = $_POST['height'];

try {
  $mysqli = connect();
  $query = "UPDATE P_ROOM SET Name='$name', Width=$width, Height=$height WHERE Room_id=$room_id;";  
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
