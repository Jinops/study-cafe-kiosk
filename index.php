<?php
  include 'common/db.php';
  session_destroy();
?>
<!DOCTYPE html>
<html lang="ko">

<head>
  <title>메인 페이지</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- for bootstrap library -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- for bootstrap icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
  <!-- for custom -->
  <link rel="stylesheet" href="styles/style.css">
  <link rel="icon" href="images/favicon.ico">
</head>

<body>
  <div class="container-sm center">
    <img src="images/logo.png" id="logo">
    <div class="justify-content-center border py-4 px-5 mx-md-3">
      <div class="row">
        <div class="col-5">
          <div class="row">
            <div class="col-6">
              <h2>공지사항</h2>
            </div>
            <div class="col-6 text-end">
              <div class="btn" onclick="window.open('./admin/admin_notice.php')">
                <i class="bi bi-gear"></i>
                관리자 페이지
              </div>
            </div>
          </div>
          <?php
          try {
            $mysqli = connect();
            $query = "SELECT * FROM P_NOTICE;";
            $res = mysqli_query($mysqli, $query);
            $rows = $res->fetch_all(MYSQLI_ASSOC);

            foreach($rows as $row){
              $content = $row['Content']; 
              echo "<textarea class='form-control' rows='8' readonly>$content</textarea>";
            }
          } catch (Exception $e){
            echo $query;
            echo $e;
          }
          ?>
        </div>
        <div class="col-4">
          <form id="form_login" method="post" action="./common/login.php">
            <label for="input_phone" class="col-form-label col-form-label-lg">전화번호</label>
            <div class="input-group input-group-lg">
              <div class="input-group-text"><i class="bi bi-phone"></i></div>
              <input name="phone" id="input_phone input-xl" class="form-control" placeholder="하이픈(-) 빼고 입력" inputmode="numeric">
            </div>
            <label for="input_password" class="col-form-label col-form-label-lg">비밀번호</label>
            <div class="input-group input-group-lg">
              <div class="input-group-text"><i class="bi bi-lock"></i></div>
              <input name="password" id="input_password" class="form-control" type="password" placeholder="4자리 숫자"
                inputmode="numeric" maxlength="4">
            </div>
          </form>
            <br />
            <p class="text-end">
              서비스 이용을 위해 회원가입이 필요합니다.
              <button class="btn btn-secondary btn-block" data-bs-toggle="modal" data-bs-target="#registerModal">회원가입</button>
            </p>
        </div>
        <div class="col-3">
          <button type="submit" class="btn btn-dark btn-lg btn-block mt-3" form="form_login"
            style="width:100%; height:80%">
            <i class="bi bi-box-arrow-in-right"></i><br />
            로그인
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="registerModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">회원가입</h1>
        </div>
        <div class="modal-body">
          <form id="form_register" method="post" action="./common/register.php" >
            <label for="r_input_name" class="col-form-label">이름</label>
            <input name="name" id="r_input_phone" class="form-control" required>
            <label for="r_input_phone" class="col-form-label">전화번호</label>
            <input name="phone" id="r_input_phone" class="form-control" placeholder="하이픈(-) 빼고 입력" inputmode="numeric" required>
            <label for="r_input_password" class="col-form-label">비밀번호</label>
            <input name="password" id="r_input_password" class="form-control" type="password" placeholder="4자리 숫자" inputmode="numeric" maxlength="4" required>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" form="form_register">가입</button>
          <button class="btn btn-secondary" data-bs-dismiss="modal">취소</button>
        </div>
      </div>
    </div>
  </div>

</body>

</html>