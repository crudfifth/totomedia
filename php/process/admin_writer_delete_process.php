<?php
  include('../common/pdo.php');
  $dbh->query("DELETE FROM totomedia_db.writer WHERE id = ".$_GET['id']);
  $dbh->query("SET @i := 0");
  $dbh->query("UPDATE totomedia_db.writer SET id = (@i := @i +1)");
  $dbh = null;
  header('Location: ../admin/admin_writer_controller.php');
?>