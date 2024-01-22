<?php

  include($_SERVER['DOCUMENT_ROOT'].'/php/common/pdo.php');
  include($_SERVER['DOCUMENT_ROOT'].'/php/common/article_base.php');

  $articles = $dbh->query
  (
    "INSERT INTO totomedia_db.articles (
                                        title,
                                        contents,
                                        status,
                                        category,
                                        thumb,
                                        writer,
                                        recommend
                               ) VALUE (
                                        '".$_POST['title']."',
                                        '".$_POST['contents']."',
                                        '".$_POST['status']."',
                                        '".$_POST['category']."',
                                        '".$_FILES['thumb']['name']."',
                                        '".$_POST['writer']."',
                                        '".$_POST['recommend']."'
                                        )
  ")->fetchAll(PDO::FETCH_ASSOC);

  $dbh = null;

  $result = "";

  if( !(is_dir($_SERVER['DOCUMENT_ROOT'].'/php/article')) ) {
    mkdir($_SERVER['DOCUMENT_ROOT'].'/php/article');
  }

  if( !(is_dir($_SERVER['DOCUMENT_ROOT'].'/img/article_img')) ) {
    mkdir($_SERVER['DOCUMENT_ROOT'].'/img/article_img');
  }

  if( !(is_dir($_SERVER['DOCUMENT_ROOT'].'/img/article_thumb_img')) ) {
    mkdir($_SERVER['DOCUMENT_ROOT'].'/img/article_thumb_img');
  }

  file_put_contents
  (
    $_SERVER['DOCUMENT_ROOT']."/php/article/".$_POST['title'].".php",
    $article
  );

  if ( isset($_POST['add_article']) ) {
    $result = "という".$_POST['category']."記事の生成が完了しました\n";
  }

  echo "「".$_POST['title']."」<br>".$result;

  if (isset($_FILES['thumb'])) {

    touch($_SERVER['DOCUMENT_ROOT'].'/img/article_thumb_img/'.$_FILES['thumb']['name']);

    move_uploaded_file
    (
      $_FILES['thumb']['tmp_name'],
      $_SERVER['DOCUMENT_ROOT'].'/img/article_thumb_img/'.$_FILES['thumb']['name']
    );

  }
?>

<html>
  <body>
    <br>
    <a href="/index.php">トップページで確認</a>
  </body>
</html>