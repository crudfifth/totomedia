
<?php 
  include($_SERVER['DOCUMENT_ROOT'].'/php/common/pdo.php');
  $id = $_GET['id'];
  $stmt = $dbh->prepare('select id, title, contents from totomedia_db.articles where id ='.$id);
  $stmt->execute();
  $subject = $stmt->fetch();
?><!DOCTYPE html>
<html lang="ja">
  <head>
     <?php include($_SERVER['DOCUMENT_ROOT'].'/php/layout/head.php'); ?>
    <link rel="stylesheet" href="<?= '/css/admin.css'; ?>">
  </head>
  <body>
     <?php include($_SERVER['DOCUMENT_ROOT'].'/php/object/_admin_menu.php'); ?>
    <section>
      <form action="/php/process/admin_article_delete_process.php" method="post"><span>以下の記事を削除しますがよろしいですか？</span><br>
        <h1><?= $subject['title'];?></h1><br><span><?= nl2br($subject['contents']);?></span><br><br>
        <input type="hidden" name="id" value="<?= $id;?>">
        <input type="hidden" name="title" value="<?= $subject['title'];?>">
        <input type="submit" value="削除">
      </form>
    </section>
  </body>
</html>