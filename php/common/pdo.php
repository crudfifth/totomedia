<?php

$dsn = 'mysql:
        dbname=totomedia_db;
        host=127.0.0.1';
$username = 'root';
$password = '';

try {
  $dbh = new PDO( $dsn, $username, $password );
} catch (PDOException $e) {
  echo '接続失敗: ' . $e->getMessage() . "\n";
  var_dump(__FILE__);
  exit();
}

//admin_article_create
$cat_cnt = $dbh->query("select count(category_name) as cnt from totomedia_db.categories")->fetch(PDO::FETCH_ASSOC);
$categories= $dbh->query("select category_name from totomedia_db.categories order by id asc")->fetchAll(PDO::FETCH_ASSOC);

$wri_cnt = $dbh->query("select count(writer_name) as cnt from totomedia_db.writer")->fetch(PDO::FETCH_ASSOC);
$writers = $dbh->query('select id, writer_name from totomedia_db.writer ORDER BY id ASC')->fetchAll(PDO::FETCH_ASSOC);
?>