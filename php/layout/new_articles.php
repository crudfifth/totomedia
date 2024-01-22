
<?php 
  $article_count = $dbh->query("SELECT COUNT(*) FROM totomedia_db.articles")->fetch(PDO::FETCH_ASSOC);
  $categories = $dbh->query("SELECT category_name FROM totomedia_db.categories ORDER BY id ASC");
  if (isset($_GET['search'])) {
  $articles = $dbh->query('SELECT title, contents, created_date, category, thumb 
                           FROM totomedia_db.articles 
                           WHERE title LIKE "%'.$_GET['search'].'%" 
                           OR contents LIKE "%'.$_GET['search'].'%"
                           AND status = "public"
                           ORDER BY id DESC
                           LIMIT 10')->fetchAll(PDO::FETCH_ASSOC);
  }
?>
<section class="new-area">
  <h2 class="headline"><i class="fa-regular fa-newspaper awesome"></i>新着記事一覧</h2>
  <ul>
    <?php foreach ($articles as $article) : ?>
      <li class="article-wrapper"> 
        <a class='article-box' href="<?= '/php/article/'.$article['title'].'.php';?>">
          <span class="line-animation"></span>
          <span class="line-animation"></span>
          <span class="line-animation"></span>
          <span class="line-animation"></span>
          <div class="article-image">
            <img class='photo' src="<?= '/img/article_thumb_img/'.$article['thumb']; ?>">
            <span class="photo-motion"></span>
            <span class="photo-motion"></span>
            <span class="photo-motion"></span>
            <span class="photo-motion"></span>
          </div>
          <div class='article-text'>
            <label class='category-label'>カテゴリ: <?= $article['category']; ?></label>
            <h2><?= $article['title']; ?></h2>
            <time><i class="fa-solid fa-pen-nib" style="margin-right:10px;color:#cfcf6e;"></i><?= $article['created_date']; ?></time>
            <p class='min-text'><?= $article['contents']; ?></p>
            <div class="read-more">
              <span>
                <p class="rm">READ MORE</p>
                <p class="cm">CLICK ME</p>
              </span>
              <i class="fa-solid fa-forward"></i>
            </div>
          </div>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
  <div class="pagination">
    <form method="post">
      <?php 
      $i = 0;
      while ($i < ($article_count['COUNT(*)']/10)) {
        echo("<button class='pagination-btn' type='submit' name='page' value='".($i*10)."'>".($i+1)."</button>");
        $i++;
      }
      ?>
    </form>
  </div>
</section>