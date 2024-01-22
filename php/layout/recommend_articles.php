
<?php 
  include($_SERVER['DOCUMENT_ROOT'].'/php/common/pdo.php');
  if (empty($_POST['page'])) {
    $sql = "SELECT id, title, contents, DATE_FORMAT(created_date, '%Y-%m-%d') AS created_date, category, thumb
    FROM totomedia_db.articles
    WHERE status = 'public'
    ORDER BY id DESC
    LIMIT 10";
  } else {
    $sql = "SELECT id, title, contents, DATE_FORMAT(created_date, '%Y-%m-%d') AS created_date, category, thumb
    FROM totomedia_db.articles
    WHERE status = 'public'
    ORDER BY id DESC
    LIMIT 10
    OFFSET ".$_POST['page'];
  }
  $stmt = $dbh->query($sql);
  $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if(array_key_exists("filter",$_POST)) {
  $stmt = $dbh->query("SELECT title, contents, created_date, category, thumb FROM totomedia_db.articles WHERE category = '".$_POST['filter']."'");
  $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $recommends = $dbh->query("SELECT title, thumb FROM totomedia_db.articles WHERE recommend = 1 AND category = '".$_POST['filter']."'")->fetchAll(PDO::FETCH_ASSOC);
  } else {
    $recommends = $dbh->query("SELECT title, thumb FROM totomedia_db.articles WHERE recommend = 1 ")->fetchAll(PDO::FETCH_ASSOC);
  }
?>
<section class="recommend-area"><?php if (empty($recommends)) : ?>
  <h2 class="headline"><i class="fa-regular fa-thumbs-up awesome"></i><?= array_key_exists("filter",$_POST)?$_POST['filter']."のオススメ記事一覧":"オススメ記事一覧"; ;?></h2>
  <div class="recommend-carousel">
    <div class="recommend">
      <?php foreach ($recommends as $recommend) : ?>
        <div class="recommend-item">
          <a class="recommend-item-a" href="<?= '/php/article/'.$recommend['title'].'.php';?>">
            <img src="<?= '/img/article_thumb_img/'.$recommend['thumb']; ?>">
            <span class="recommend-title"><?= $recommend['title']; ?></span>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div><?php endif; ?>
</section>