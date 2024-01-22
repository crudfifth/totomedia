<?php
  include($_SERVER['DOCUMENT_ROOT'].'/php/common/pdo.php');
  $dbh->query("DELETE FROM totomedia_db.categories WHERE id = ".$_GET['id']);
  $dbh->query("SET @i := 0");
  $dbh->query("UPDATE totomedia_db.categories SET id = (@i := @i +1)");
  $dbh = null;
  header('Location: /php/admin/admin_category_controller.php');
?>