
<aside>
  <section class="aside-search">
    <form class="search-form" method="get">
      <input class="search-input" type="text" name="search" placeholder="SEARCH"/>
      <button class="search-button" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
  </section>
  <section class="aside-profile"><a href="<?= '/php/other/profile.php'; ?>"> PROFILE<i class="fa-regular fa-id-card"></i><br/><img src="<?= '/img/site_img/totomedia.jpg'; ?>"/>
      <p>当サイトを運営しているメンバープロフィールの詳細はこちらから</p></a></section>
  <section class="aside-request">
    <div class="aside-headline"> REQUEST<i class="fa-solid fa-envelope-open-text"></i></div>
    <ul> 
      <li><a href="#">WEBサイト制作</a></li>
      <li><a href="#">ゲーム制作</a></li>
      <li><a href="#">システム開発</a></li>
      <li><a href="#">動画編集/映像制作</a></li>
      <li><a href="#">イラスト制作</a></li>
      <li><a href="#">ライティング</a></li>
      <li><a href="#">ミキシング</a></li>
      <li><a href="#">モデリング</a></li>
      <li><a href="#">歌唱</a></li>
      <li><a href="#">楽曲制作</a></li>
      <li><a href="#">ギター演奏</a></li>
      <li><a href="#">ピアノ演奏</a></li>
    </ul>
  </section>
  <section class="aside-category"> CATEGORY<i class="fa-solid fa-sitemap"></i><br/><?php foreach ($categories as $category) : ?>
      <label class="cat"><?= $category['category_name']; ?></label>
    <?php endforeach; ?>
  </section>
  <section class="aside-tags"> TAG<i class="fa-solid fa-tags"></i></section>
</aside>