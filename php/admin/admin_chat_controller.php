
<?php 
include($_SERVER['DOCUMENT_ROOT'].'/php/common/pdo.php');
$num = $dbh->query("
  SELECT count(*)
  FROM totomedia_db.articles
")->fetch(PDO::FETCH_ASSOC);
?><!DOCTYPE html>
<html lang="ja">
  <head>
     <?php include($_SERVER['DOCUMENT_ROOT'].'/php/layout/head.php'); ?>
    <link rel="stylesheet" href="<?= '/css/admin.css'; ?>">
  </head>
  <body>
     <?php include($_SERVER['DOCUMENT_ROOT'].'/php/object/_admin_menu.php'); ?>
    <section class="admin-section"> 
      <p>チャット機能は未実装です。</p>
    </section>
  </body>
</html>