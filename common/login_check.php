<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    echo "
    <script>
      alert('로그인 정보가 없거나 만료되어 초기 화면으로 돌아갑니다.');
      location.replace('./');
    </script>";            
}
else {
    $user_id = $_SESSION['user_id'];
    $name = $_SESSION['name'];
} 
?>
