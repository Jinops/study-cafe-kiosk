<?php
include '../../common/db.php';

try {
  $mysqli = connect();
  $query_drop_table = file_get_contents('../../query/drop_table.sql');
  $query_create_table = file_get_contents('../../query/create_table.sql');
  $query_test_data = file_get_contents('../../query/test_data.sql');

  $query=$query_drop_table.$query_create_table.$query_test_data;

  mysqli_multi_query($mysqli, $query);

  echo "
  <script>
    alert('초기화가 완료되었습니다.');
    location.replace('../admin_notice.php');
  </script>
  ";

} catch (Exception $e){
  echo $drop_table;
  echo $create_table;
  echo $test_data;
  echo $e;
}
?>
