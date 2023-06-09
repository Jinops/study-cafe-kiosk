<?php
include '../../common/db.php';

$ticket_id = $_GET['ticket_id'];


try {
  $mysqli = connect();
  $query = "DELETE FROM P_TICKET WHERE Ticket_id=$ticket_id;";  
  $res = mysqli_query($mysqli, $query);

  echo "
  <script>
    alert('삭제가 완료되었습니다.');
    location.replace('../admin_ticket.php');
  </script>
  ";

} catch (Exception $e){
  echo $query;
  echo $e;
}
?>
