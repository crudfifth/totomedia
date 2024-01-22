<?php
$filename = debug_backtrace()[0]['file'];
$filename = basename($filename,'.php');
$stmt = $dbh->query("select title, comment, handle_name, created_date from totomedia_db.comments where title = '".basename($filename)."'");
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
$content_sql = $dbh->query("select contents, thumb from totomedia_db.articles where title = '".basename($filename)."'");
$content = $content_sql->fetch(PDO::FETCH_ASSOC);
$comment_cnt = $dbh->query("select count(*) as cnt from totomedia_db.comments where title = '".basename($filename)."'");
$cnt = $comment_cnt->fetch(PDO::FETCH_ASSOC);
$bread = $dbh->query("select title, category from totomedia_db.articles where title = '".basename($filename)."'");
$bread = $bread->fetch(PDO::FETCH_ASSOC);
$date = $dbh->query("select id, date_format(created_date, '%Y年%m月%d日') as created_date, date_format(updated_date, '%Y年%m月%d日') as updated_date from totomedia_db.articles where title = '".basename($filename,'.php')."'")->fetch(PDO::FETCH_ASSOC);
?>