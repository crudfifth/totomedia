
<?php 
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/php/common/pdo.php');

$profile = $dbh->query("
  SELECT user_name, mail_address, password
  FROM totomedia_db.writer
  WHERE writer_name = '".$_SESSION['name']."'
")->fetch(PDO::FETCH_ASSOC);

if ($_POST['user_name'] != $profile['user_name']) :
  $dbh->query("
    UPDATE totomedia_db.writer
    SET user_name = '".$_POST['user_name']."'
    WHERE writer_name = '".$_SESSION['name']."'
  ")->execute();
  echo("ユーザ名を「".$profile['user_name']."」から「".$_POST['user_name']."」へ変更しました。");
endif;

if ($_POST['mail_address'] != $profile['mail_address']) :
  $dbh->query("
    UPDATE totomedia_db.writer
    SET mail_address = '".$_POST['mail_address']."''
    WHERE writer_name = '".$_SESSION['name']."'
  ")->execute();
  echo("メールアドレスを「".$profile['mail_address']."」から「".$_POST['mail_address']."」へ変更しました。");
endif;

if ($_POST['password'] != $profile['password']) :
  $dbh->query("
    UPDATE totomedia_db.writer
    SET password = '".$_POST['password']."'
    WHERE writer_name = '".$_SESSION['name']."'
  ")->execute();
  echo("パスワードを「".$profile['password']."」から「".$_POST['password']."」へ変更しました。");
endif;

?>