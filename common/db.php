<?php
  function connect($isLocal=FALSE){
    include 'config.php';
    if ($isLocal || $_SERVER['SERVER_NAME'] == '127.0.0.1'){
      return  new mysqli($db_local_host, $db_local_username, $db_local_password, $db_local_schema);
    }
    return  new mysqli($db_host, $db_username, $db_password, $db_schema);
  }
?>
