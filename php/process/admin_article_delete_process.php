<?php

  include('../common/pdo.php');

  $stmt = $dbh->query
  (
    "DELETE FROM totomedia_db.articles
     WHERE id = ".$_POST['id']
  )->execute();

  $dbh->query("SET @i := 0");

  $dbh->query
  (
    "UPDATE totomedia_db.articles
     SET id = (@i := @i +1)"
  );

  unlink('../article/'.$_POST['title'].'.php');

?>

<span>記事の削除が完了しました。</span><br>
<a href="../../index.php">トップページへ戻る</a>