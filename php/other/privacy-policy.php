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
        <?php include($_SERVER['DOCUMENT_ROOT'].'/php/object/_privacy-policy.php'); ?>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/php/layout/aside.php'); ?>
      </main>
      <?php include($_SERVER['DOCUMENT_ROOT'].'/php/layout/footer.php'); ?>
    </body>
  </html>