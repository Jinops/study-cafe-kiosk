<!-- controller -->
<ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
<?php
include './db.php';
try {
  $mysqli = connect();
  $query = "SELECT DISTINCT * FROM P_ROOM;";  
  $res = mysqli_query($mysqli, $query);
  $rows_room = $res->fetch_all(MYSQLI_ASSOC);

  $active='active';
  foreach ($rows_room as $row){
    $room_id = $row['Room_id'];
    $name = $row['Name'];
    echo "
    <li class='col nav-item $active' role='presentation'>
      <button class='nav-link $active' data-bs-toggle='pill' data-bs-target='#pills-$room_id'
      type='button' role='tab' aria-controls='pills-$room_id'>$name</button>
    </li>
    ";
    $active='';
  }
} catch (Exception $e){
  echo $query;
  echo $e;
}
?>
</ul>

<!-- content -->
<div class="tab-content text-center border p-5" id="pills-tabContent">
  <?php
  date_default_timezone_set("Asia/Seoul");
  $currentTime = date("y-m-d H:i:s");

  $active='active';
    foreach ($rows_room as $row_room){
      $room_id = $row_room['Room_id'];
      $room_width = $row_room['Width'];
      $room_height = $row_room['Height'];
      
      echo "<div class='tab-pane fade show $active' id='pills-$room_id' role='tabpanel'>
      <div class='room' style='width: $room_width%; padding-bottom:$room_height%;'>";
      
      try {
      $query = "SELECT * FROM P_SEAT WHERE Room_id=$room_id;";  
      $res = mysqli_query($mysqli, $query);
      $rows_seat = $res->fetch_all(MYSQLI_ASSOC);

      $query_taken_seat = "SELECT Seat_id FROM P_RESERVE WHERE Start_time < '$currentTime' AND End_time > '$currentTime'";
      $res = mysqli_query($mysqli, $query_taken_seat);
      $rows_taken_seat = $res->fetch_all(MYSQLI_ASSOC);
      $taken_seats = array_map(function($row){return $row['Seat_id'];}, $rows_taken_seat);

      foreach ($rows_seat as $row){
        $seat_id = $row['Seat_id'];
        $width = $row['Width'];
        $height = $row['Height'];
        $x = $row['X'];
        $y = $row['Y'];
        $style = "width:$width%; height:$height%; left:$x%; top:$y%;";

        $disabled = in_array($seat_id,$taken_seats) ? 'disabled' : '';

        echo "
          <a href='./payment.php?ticket_type=$ticket_type&ticket_id=$ticket_id&room_id=$room_id&seat_id=$seat_id'>
          <button class='seat btn btn-sm btn-outline-dark' style='$style' $disabled>$seat_id</button>
          </a>
          ";
      }
      echo "</div>";
      echo "</div>";
      
      $active = '';
      } catch(Exception $e){
        echo $query;
        echo $query_taken;
        echo $e;
      }
    }
  ?>
</div>
