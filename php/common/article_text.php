<?php
$filename = debug_backtrace()[0]['file'];
$filename = basename($filename, '.php');
?>
<article class="article">
  <?= "<a href='/totomedia/index.php'><i class='fa-sharp fa-solid fa-house'></i></a>"." > ".$bread['category']." > ".$bread['title'];?>
  <br>
  <br>
  <time class="article-date">
    <?php
      if($date['created_date'] < $date['updated_date']):
        echo "<strike>".$date['created_date']."</strike> >> ".$date['updated_date'];
      else:
        echo $date['created_date'];
      endif;
    ?>
  </time>
  <h1 class="headline h-plus card"><?= basename($filename,'.php'); ?></h1>
  <?=  "<img class='article-image' src='/img/article_thumb_img/".$content['thumb']."'>"; ?>
  <section class="article-text"><?= nl2br($content['contents']); ?></section>
  
</article>