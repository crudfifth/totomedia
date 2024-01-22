
<?php
  include($_SERVER['DOCUMENT_ROOT'].'/php/common/pdo.php');

  $subject = $dbh->query("
    SELECT id, title, contents, status, thumb, writer, recommend
    FROM totomedia_db.articles
    WHERE id = ".$_GET['id']
  )->fetch(PDO::FETCH_ASSOC);

?><!DOCTYPE html>
<html lang="ja">
  <head>
     <?php include($_SERVER['DOCUMENT_ROOT'].'/php/layout/head.php'); ?>
    <link rel="stylesheet" href="<?= '/css/admin.css'; ?>">
  </head>
  <body>
     <?php include('../object/_admin_menu.php'); ?>
    <form action="/php/process/admin_article_update_process.php" method="post">
      <label>サムネイル</label><br>
      <input type="file" accept="image/*" name="thumb" onchange="previewImage(this);"><?php if ($subject['thumb']) { ?><img src="<?= '/img/article_thumb_img/'.$subject['thumb'];?>" style="max-width:200px;"><img id="preview1" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:200px;"><?php } else { ?>
<?php } ?>  <br><br><br><span>タイトル</span><br>
      <input type="text" name="title" onLoad="ShowLenT(value)" value="<?= $subject['title'];?>" required><br><span id="outLenT">0文字</span><br><br><span>記事</span><br>
      <textarea style="height:20rem;" name="contents" onLoad="ShowLenC(value)" required><?= $subject['contents'];?></textarea><br><span id="outLenC">0文字</span><br><br>
      <label>カテゴリ:</label>
      <select name="category">
        <?php 
          foreach ($categories as $category) {
            echo "<option value=".$category['category_name'].">".$category['category_name']."</option>";
          }
        ?>
      </select><br><br>
      <label>ライター:</label>
      <select name="writer">
        <?php 
          foreach ($writers as $writer) {
            echo "<option value=".$writer['writer_name'].">".$writer['writer_name']."</option>";
          }
        ?>
      </select><br><br>
      <label>公開設定:</label>
      <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
      <input type="hidden" name="old_title" value="<?= $subject['title'];?>"><?php if ( $subject['status'] == 'private') : ?>
        <input type='radio'name='status' value='private' checked>非公開
        <input type='radio'name='status' value='public'>公開
      <?php else : ?>
        <input type='radio'name='status' value='private'>非公開
        <input type='radio'name='status' value='public' checked>公開
      <?php endif ; ?><br><br>
      <label>オススメ:</label><?php if ($subject['recommend'] == 0) : ?>
        <input type='radio' name='recommend' value='0' checked>
        <span>しない</span>
        <input type='radio' name='recommend' value='1'>
        <span>する</span>
      <?php  else : ?>
        <input type='radio' name='recommend' value='0' checked>
        <span>しない</span>
        <input type='radio' name='recommend' value='1'>
        <span>する</span>
      <?php endif ; ?><br><br>
      <input type="submit" value="更新"><br><br>
    </form>
    <script type="text/javascript" src="/js/main.js"></script>
  </body>
</html>