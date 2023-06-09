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
  <li id="reservation" class="p-3">
    <a class="nav-link" href="./admin_reservation.php">예약 내역</a>
  </li>
  <li id="payment" class="p-3">
    <a class="nav-link" href="./admin_payment.php">결제 내역</a>
  </li>
</ul>

<script>
  function setSelectedMenu(menuId) {
    menu = document.getElementById(menuId);
    menu.classList.add("selected");
  }
</script>

<?php
  $menu=$_GET['selected'];
  echo "<script>setSelectedMenu('$menu')</script>"
?>