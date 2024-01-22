<?php

  include($_SERVER['DOCUMENT_ROOT'].'/php/common/pdo.php');
  include($_SERVER['DOCUMENT_ROOT'].'/php/common/article_base.php');

  $subject = $dbh->query
  (
    'UPDATE totomedia_db.articles
     SET title = "'.$_POST['title'].'",
        contents = "'.$_POST['contents'].'",
        status = "'.$_POST['status'].'",
        category = "'.$_POST['category'].'",
        thumb = "'.$_POST['thumb'].'",
        writer = "'.$_POST['writer'].'",
        recommend = "'.$_POST['recommend'].'"
     WHERE id = '.$_POST['id']
  )->execute();

  rename
  (
    '../article/'.$_POST['old_title'].'.php',
    '../article/'.$_POST['title'].'.php'
  );

  file_put_contents
  (
    "../article/" . $_POST['title'] . ".php",
    $article
  );
  if (isset($_FILES['thumb'])) {

    touch($_SERVER['DOCUMENT_ROOT'].'/img/article_thumb_img/'.$_FILES['thumb']['name']);

    move_uploaded_file
    (
      $_FILES['thumb']['tmp_name'],
      $_SERVER['DOCUMENT_ROOT'].'/img/article_thumb_img/'.$_FILES['thumb']['name']
    );

  }
?>

<br>
<span>記事の更新が完了しました。</span><br>
<a href="../../index.php">トップページへ戻る</a>