
<?php 
session_start();
if (empty($_SESSION['name'])) :
  header('Location: /php/auth/login.php');
endif ;
?>
<div class="height-block">
  <section class="admin-menu"><a class="admin-a" href="/php/admin/admin_controller.php">
      <h1><img class="admin-icon" src="<?= '/img/site_img/transparent.png'; ?>"/></h1></a>
    <button class="admin-button" onclick="location.href=&quot;/php/admin/admin_controller.php&quot;"><i class="fa-solid fa-house"></i>ホーム</button>
    <button class="admin-button" onclick="location.href=&quot;/php/admin/admin_article_controller.php&quot;"><i class="fa-solid fa-newspaper"></i>アーティクル</button>
    <button class="admin-button" onclick="location.href=&quot;/php/admin/admin_category_controller.php&quot;"><i class="fa-solid fa-sitemap"></i>カテゴリ</button>
    <button class="admin-button" onclick="location.href=&quot;/php/admin//admin_tag_controller.php&quot;"><i class="fa-solid fa-tag"></i>タグ</button>
    <button class="admin-button" onclick="location.href=&quot;/php/admin/admin_writer_controller.php&quot;"><i class="fa-solid fa-user-pen"></i>ライター</button>
    <button class="admin-button" onclick="location.href=&quot;/php/admin/admin_comment_controller.php&quot;"><i class="fa-solid fa-comment"></i>コメント</button>
    <button class="admin-button" onclick="location.href=&quot;/php/admin/admin_facade_controller.php&quot;"><i class="fa-solid fa-brush"></i>ファサード</button>
    <button class="admin-button" onclick="location.href=&quot;/php/admin/admin_document_controller.php&quot;"><i class="fa-solid fa-folder-open"></i>ドキュメント</button>
    <button class="admin-button" onclick="location.href=&quot;/php/admin/admin_analytics_controller.php&quot;"><i class="fa-solid fa-chart-line"></i>アナリティクス</button>
    <button class="admin-button" onclick="location.href=&quot;/php/admin/admin_chat_controller.php&quot;"><i class="fa-solid fa-chalkboard-user"></i>チャット</button>
    <div class="admin-menu-login"><a href="/php/auth/profile-setting.php"><span style="color:white;"><?= $_SESSION["name"]; ?></span></a></div>
  </section>
</div>