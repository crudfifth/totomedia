<!DOCTYPE html>
<html lang="ja">
  <head>
     <?php include($_SERVER['DOCUMENT_ROOT'].'/php/layout/head.php'); ?>
    <link rel="stylesheet" href="<?= '/css/admin.css'; ?>">
  </head>
  <body>
     <?php include($_SERVER['DOCUMENT_ROOT'].'/php/object/_admin_menu.php'); ?>
    <section style="height:100px;">
      <?php 
        include($_SERVER['DOCUMENT_ROOT'].'/php/common/pdo.php');
        $comments = $dbh->query("
          SELECT title, comment, created_date, handle_name, email
          FROM totomedia_db.comments
          ORDER BY created_date DESC
        ")->fetchAll(PDO::FETCH_ASSOC);
        $dbh = null;
        if (empty($comments)) :
          echo("まだコメントはありません");
        else :
          foreach ($comments as $comment) : ?>
            <div style="margin:20px;border:1px solid #333;">
              <span>ハンドルネーム:<?= $comment['handle_name']; ?></span><br>
              <span>メールアドレス:<?= $comment['email']; ?></span><br>
              <span>タイトル:<?= $comment['title']; ?></span><br>
              <span>書き込まれた日付:<?= $comment['created_date']; ?></span><br>
              <p>内容:<?= $comment['comment']; ?></p>
            </div>
          <?php endforeach; endif; ?>
    </section>
  </body>
</html>