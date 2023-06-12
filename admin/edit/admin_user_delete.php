<?php
include '../../common/db.php';

$user_id = $_GET['user_id'];

try {
  $mysqli = connect();
  $query = "DELETE FROM P_USER WHERE User_id=$user_id";  
  $res = mysqli_query($mysqli, $query);

  echo "
  <script>
    alert('삭제가 완료되었습니다.');
    location.replace('../admin_user.php');
  </script>
  ";

} catch (Exception $e){
  echo $query;
  echo $e;
}
?>
