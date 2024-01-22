<?php
  $article = <<< 'EOF'
  <!DOCTYPE html>
  <html lang="ja">
    <?php 
      include($_SERVER['DOCUMENT_ROOT'].'/php/common/pdo.php');
      include($_SERVER['DOCUMENT_ROOT'].'/php/common/article_query.php');
      include($_SERVER['DOCUMENT_ROOT'].'/php/layout/head.php');
    ?>
    <body class="aurora">
      <?php include($_SERVER['DOCUMENT_ROOT'].'/php/layout/header.php');?>
      <main class="main">
        <section class="article-wrapper">
          <?php include($_SERVER['DOCUMENT_ROOT'].'/php/common/article_text.php'); ?>
          <?php include($_SERVER['DOCUMENT_ROOT'].'/php/common/article_comment.php'); ?>
          <?php include($_SERVER['DOCUMENT_ROOT'].'/php/object/_profile_box.php'); ?>
        </section>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/php/layout/aside.php'); ?>
      </main>
      <?php include($_SERVER['DOCUMENT_ROOT'].'/php/layout/footer.php'); ?>
    </body>
  </html>
  EOF;
?>