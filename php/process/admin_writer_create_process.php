<?php
  include('../common/pdo.php');
  $dbh->query("INSERT INTO totomedia_db.writer (writer_name) VALUE ('".$_POST['writer']."')");
  $dbh->query("SET @i := 0");
  $dbh->query("UPDATE totomedia_db.writer SET id = (@i := @i +1)");
  $dbh = null;
  header('Location: ../admin/admin_writer_controller.php');
?>