
<?php 

  include($_SERVER['DOCUMENT_ROOT'].'/php/common/pdo.php');

  if ($cat_cnt["cnt"] == 0) {

    $default = $dbh->query("
      INSERT INTO totomedia_db.categories(category_name) 
      VALUE ('未分類')
    ")->fetch(PDO::FETCH_ASSOC);

    header('Location: admin_article_create.php');

  }

  if ($wri_cnt["cnt"] == 0) {

    $default = $dbh->query("
      INSERT INTO totomedia_db.writer(writer_name)
      VALUE ('匿名')
    ")->fetch(PDO::FETCH_ASSOC);

    header('Location: admin_article_create.php');

  }

  $dbh = null;

?>
<!DOCTYPE html>
<html lang="ja">
  <head>
     <?php include($_SERVER['DOCUMENT_ROOT'].'/php/layout/head.php'); ?>
    <link rel="stylesheet" href="<?= '/css/admin.css'; ?>">
  </head>
  <body>
     <?php include($_SERVER['DOCUMENT_ROOT'].'/php/object/_admin_menu.php'); ?>
    <form class="article-create-form" action="/php/process/admin_article_create_process.php" method="post" enctype="multipart/form-data">
      <section class="admin-operation">
        <h2 style="font-size:1.2rem;">①記事内容</h2><span onclick="a(this)">タイトル</span><br>
        <input id="headline" name="title" style="display:block;width:50%;" type="text" onkeyup="ShowLenT(value)" required>
        <button type="button" onclick="convertH1()">反映</button><br><span id="outLenT">0文字</span><br><br><span>記事</span><br>
        <section id="article-headline"></section>
        <section id="img" style="display:block;width:50%;margin:0 auto;"><img id="preview2" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:200px;"></section>
        <section id="article"></section><br>
        <textarea id="element" name="contents" style="height:5rem;" onkeyup="ShowLenC(value);"></textarea><br>
        <button type="button" onclick="convertH2()">小見出し</button>
        <button type="button" onclick="convertP()">段落</button><br><span id="outLenC">0文字</span><br><br>
      </section>
      <section class="admin-article-property"> 
        <h2 style="font-size:1.2rem;">②記事設定</h2>
        <label>サムネイル</label><br>
        <input type="file" accept="image/*" name="thumb" onchange="previewImage(this);"><br>プレビュー:<br><img id="preview1" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:200px;"><br><br>
        <label>カテゴリ:</label>
        <select name="category">
          <?php 
            foreach ($categories as $category) {
              echo "<option value=".$category['category_name'].">".$category['category_name']."</option>";
            }
          ?>
        </select><br><br>
        <label>執筆者:</label><?= $_SESSION['name']; ?>
        <input type="hidden" name="writer" value="<?= $_SESSION['name']; ?>"><br><br>
        <label>公開設定:</label>
        <input type="radio" name="status" value="private" checked><span>非公開</span>
        <input type="radio" name="status" value="public"><span>公開</span><br><br>
        <label>オススメ:</label>
        <input type="radio" name="recommend" value="0" checked><span>しない</span>
        <input type="radio" name="recommend" value="1"><span>する</span><br><br>
        <input type="submit" name="add_article" value="送信"><br><br>
      </section>
    </form>
    <script type="text/javascript" src="/js/main.js"></script>
  </body>
</html>