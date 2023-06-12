<?php
include '../../common/db.php';

$ticket_id = $_POST["ticket_id"];
$price = $_POST["price"];
$duration_min = $_POST["duration_min"];

try {
  $mysqli = connect();
  $query = "UPDATE P_TICKET SET Price='$price', Duration_min='$duration_min' WHERE Ticket_id=$ticket_id";  
  $res = mysqli_query($mysqli, $query);

  echo "
  <script>
    alert('수정이 완료되었습니다.');
    location.replace('../admin_ticket.php');
  </script>
  ";

} catch (Exception $e){
  echo $query;
  echo $e;
}
?>
