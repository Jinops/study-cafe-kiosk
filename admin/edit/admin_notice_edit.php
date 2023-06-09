<?php
include '../../common/db.php';

$notice_id = $_POST['notice_id'];
$content = $_POST['content'];

$content = str_replace("'", '', $content);

try {  
  $mysqli = connect();
  $query = "UPDATE P_NOTICE SET Content='$content' WHERE Notice_id=$notice_id";
  # TODO: 따옴표 처리
  echo $query;
  $res = mysqli_query($mysqli, $query);

  echo "
  <script>
    alert('수정이 완료되었습니다.');
    location.replace('../admin_notice.php');
  </script>
  ";

} catch (Exception $e){
  echo $query;
  echo $e;
}
