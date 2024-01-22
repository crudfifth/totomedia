<?php
  include('../common/pdo.php');
  $dbh->query("INSERT INTO totomedia_db.categories (category_name) VALUE ('".$_POST['category']."')");
  $dbh->query("SET @i := 0");
  $dbh->query("UPDATE totomedia_db.categories SET id = (@i := @i +1)");
  $dbg = null;
  header('Location: ../admin/admin_category_controller.php');
?>