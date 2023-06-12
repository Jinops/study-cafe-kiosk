<?php
include '../../common/db.php';

$user_id = $_POST['user_id'];
$phone = $_POST['phone'];
$name = $_POST['name'];

try {
  $mysqli = connect();
  $query = "UPDATE P_USER SET Phone='$phone', Name='$name' WHERE User_id=$user_id";  
  $res = mysqli_query($mysqli, $query);

  echo "
  <script>
    alert('수정이 완료되었습니다.');
    location.replace('../admin_user.php');
  </script>
  ";

} catch (Exception $e){
  echo $query;
  echo $e;
}
?>
