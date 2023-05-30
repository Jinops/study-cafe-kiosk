<?php
include '../common/db.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$password = $_POST['password'];

try {
  $mysqli = connect();
  $query ="SELECT count(*) as count FROM P_USER WHERE Phone='$phone';";
  $res = mysqli_query($mysqli, $query);
  $count = mysqli_num_rows($res);
  
if($count>0){
    echo "
    <script>
      alert('이미 가입된 회원입니다.');
      location.replace('../');
    </script>
    ";
  } else {
    $query = "INSERT INTO P_USER(Phone, Password, Name) VALUES('$phone','$password','$name')";  
    $res = mysqli_query($mysqli, $query);

    echo "
    <script>
      alert('회원가입이 완료되었습니다.');
      location.replace('../');
    </script>
    ";
  }
} catch (Exception $e){
  echo $query;
  echo $e;
}
?>
