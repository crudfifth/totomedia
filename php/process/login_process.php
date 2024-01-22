<?php 
  session_set_cookie_params(60*60*24*365);
  session_start();
  include($_SERVER['DOCUMENT_ROOT'].'/php/common/pdo.php');
  $login = $dbh->query("
    SELECT writer_name, mail_address, password
    FROM totomedia_db.writer
    WHERE mail_address = '".$_POST['mail_address']."'
    AND password = '".$_POST['password']."'
  ")->fetch(PDO::FETCH_ASSOC);
  setcookie('name',$login['writer_name'],time()+60*60*24*365);
  echo $_COOKIE['name'];
  $_SESSION['name'] = $_COOKIE['name'];
  if (empty($login)) {
    echo("データが存在しませんでした。");
    header('Location: /php/auth/login.php');
  } else {
    echo("データは存在します。");
    header('Location: /php/admin/admin_controller.php');
  }
?>