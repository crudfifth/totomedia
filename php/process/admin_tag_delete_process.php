<?php
  include('../common/pdo.php');
  $dbh->query("DELETE FROM totomedia_db.tags WHERE id = ".$_GET['id']);
  $dbh->query("SET @i := 0");
  $dbh->query("UPDATE totomedia_db.tags SET id = (@i := @i +1)");
  $dbh = null;
  header('Location: ../admin/admin_tag_controller.php');
?>