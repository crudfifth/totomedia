<?php
$filename = debug_backtrace()[0]['file'];
$filename = basename($filename,'.php');
include('../common/pdo.php');
$writers = $dbh->query("
  SELECT writer_name, writer_img
  FROM totomedia_db.writer
  WHERE writer_name != '匿名'
")->fetchAll(PDO::FETCH_ASSOC);
$introduce = $dbh->query("
  SELECT self_introduce
  FROM totomedia_db.writer
  WHERE writer_name = '".$filename."'
")->fetch(PDO::FETCH_ASSOC);
?>
<section class="profile">
  <h1 class="headline"><?= $filename == "profile"?"プロフィール":"ライター: ".$filename ?></h1>
  <?php if ($filename != 'profile') : ?>
    <img class='profile-img' src='<?= '/img/writer_img/'.$filename.'.png';?>'>
  <?php endif; ?>
  <div class="profile-wrapper">
    <?php if ($filename == "profile") :
      foreach ($writers as $writer) : ?>
        <section class='profile-box'>
          <a href="<?= '../profile/'.$writer['writer_name'].'.php';?>">
            <img class="profile-box-img" src="<?= '/img/writer_img/'.$writer['writer_img'];?>">
            <span><?= $writer['writer_name']; ?></span>
          </a><br>
        </section>
    <?php endforeach ; 
     else :
      echo($introduce['self_introduce']);
     endif ;
    ?>
  </div>
</section>