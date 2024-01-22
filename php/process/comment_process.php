<?php

include('../common/pdo.php');

$article = $_POST['article'];
if(empty($_POST['handle_name'])) {
  $_POST['handle_name'] = "anonymous";
}
$sql = "INSERT INTO totomedia_db.comments(title, comment, handle_name, email) VALUE ('".basename($article,'.php')."','".$_POST['comment']."','".$_POST['handle_name']."','".$_POST['email']."')";
$stmt = $dbh->query($sql);
$dbh = null;

mb_language('Japanese');
mb_internal_encoding('UTF-8');
mb_send_mail(
    "unibearsite@gmail.com",
    "記事:「".basename($article, '.php')."」からコメントが届きました",
    $_POST['comment']
);

$article = urlencode($article);
header('Location: ../article/'.$article.'.php');

?>