<?php
  include('../common/pdo.php');
  $dbh->query("INSERT INTO totomedia_db.tags (tag_name) VALUE ('".$_POST['tag']."')");
  $dbh->query("SET @i := 0");
  $dbh->query("UPDATE totomedia_db.tags SET id = (@i := @i +1)");
  $dbh = null;
  header('Location: ../admin/admin_tag_controller.php');
?>