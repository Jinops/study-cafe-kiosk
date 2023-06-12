<?php
include '../../common/db.php';

$ticket_id = $_GET['ticket_id'];

try {
  $mysqli = connect();
  $deactive_FK_query = "SET foreign_key_checks = 0;";
  $delete_query = "DELETE FROM P_TICKET WHERE Ticket_id=$ticket_id;";  
  $active_FK_query = "SET foreign_key_checks = 1";
  
  $query = $deactive_FK_query.$delete_query.$active_FK_query;
  mysqli_multi_query($mysqli, $query);

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
