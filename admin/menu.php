<link rel="stylesheet" href="styles/menu.css">
<link rel="icon" href="../images/favicon.ico">

<ul id="menu" class="navbar-nav pt-3">
  <div class="mx-3">
    <a class="nav-link" href="../index.php">
      <i class="bi bi-arrow-left-square-fill"></i>
      돌아가기
    </a>
    <hr class="my-1" />
  </div>
  <img id="logo" src="../images/logo2.png" class="px-lg-4 px-1 my-3">
  <li id="notice" class="p-3">
    <a class="nav-link" href="./admin_notice.php">공지 사항</a>
  </li>
  <li id="user" class="p-3">
    <a class="nav-link" href="./admin_user.php">회원 관리</a>
  </li>
  <li id="ticket" class="p-3">
    <a class="nav-link" href="./admin_ticket.php">사용권 관리</a>
  </li>
  <li id="seat" class="p-3">
    <a class="nav-link" href="./admin_seat.php">좌석 관리</a>
  </li>
  <li id="seat_status" class="p-3">
    <a class="nav-link" href="./admin_seat_status.php">좌석 현황</a>
  </li>
  <li id="reservation" class="p-3">
    <a class="nav-link" href="./admin_reservation.php">예약 내역</a>
  </li>
  <li id="payment" class="p-3">
    <a class="nav-link" href="./admin_payment.php">결제 내역</a>
  </li>
  <hr/>
  <li class="p-3">
    <a class="nav-link" href='#' onclick=resetDB()>!! DB 초기화 !!</a>
  </li>
</ul>

<script>
  function setSelectedMenu(menuId) {
    menu = document.getElementById(menuId);
    menu.classList.add("selected");
  }

  function resetDB() {
    const pw = prompt('DB를 초기화화고, 테스트 데이터를 생성합니다.\n비밀번호를 입력하세요.');
    if (pw==null){
      return;
    }
    if (pw.toLowerCase()=='ie213') {
      location.replace('./responses/admin_reset.php');
    } else {
      alert('비밀번호가 일치하지 않습니다.');
    }
  }
</script>

<?php
  $menu=$_GET['selected'];
  echo "<script>setSelectedMenu('$menu')</script>"
?>
