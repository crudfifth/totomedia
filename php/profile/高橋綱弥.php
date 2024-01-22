<!DOCTYPE html>
  <html lang="ja">
    <?php 
      include($_SERVER['DOCUMENT_ROOT'].'/totomedia/php/common/pdo.php');
      include($_SERVER['DOCUMENT_ROOT'].'/totomedia/php/common/article_query.php');
      include($_SERVER['DOCUMENT_ROOT'].'/totomedia/php/layout/head.php');
    ?>
    <body class="aurora">
      <?php include($_SERVER['DOCUMENT_ROOT'].'/totomedia/php/layout/header.php');?>
      <main class="main">
        <?php include($_SERVER['DOCUMENT_ROOT'].'/totomedia/php/object/_profile.php'); ?>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/totomedia/php/layout/aside.php'); ?>
      </main>
      <?php include($_SERVER['DOCUMENT_ROOT'].'/totomedia/php/layout/footer.php'); ?>
    </body>
  </html>