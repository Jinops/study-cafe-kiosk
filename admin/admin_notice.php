<!DOCTYPE html>
<html lang="ko">

<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- for bootstrap library -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- for bootstrap icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
</head>

<body>
  <div class="row">
    <div class="col-2">
      <?php 
      $_GET['selected']='notice';
      include "menu.php" 
      ?>
    </div>
    <div class="col-10 p-5 text">
      <h3>공지사항</h3>
      <hr />
      <div>
        <div class="text-center">
          <?php 
          $mysqli = new mysqli("localhost", "root", "", "jwpark");
          $query = "SELECT * FROM Notice";
          $res = mysqli_query($mysqli, $query);
          
          while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
            $content = $row['Content']; 
            echo ("<textarea class='form-control my-3' rows='8' name=content'>"
                .$content.
              "</textarea>");
           }
           echo "
          </div>
            <div class='text-end'>
              <form action='admin_notice_update.php' method=post>
                <input type='submit' name='update' class='btn btn-primary' value='저장'></button>
              </form>
            </div>
          </div>
           "
        ?>
          <br />
        </div>
      </div>
    </div>

</body>

</html>