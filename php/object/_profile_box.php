<?php
$filename = debug_backtrace()[0]['file'];
$filename = basename($filename,'.php');
include('../common/pdo.php');
$writer = $dbh->query("
SELECT writer
FROM totomedia_db.articles
WHERE writer != '匿名'
AND title = '".$filename."'
")->fetch(PDO::FETCH_ASSOC);
?>
<section class="profile-box">
  <a href="<?= "/totomedia/php/profile/".$writer['writer'].".php"; ?>">
    <span><?= $writer['writer'] ;?></span>
  </a>
</section>