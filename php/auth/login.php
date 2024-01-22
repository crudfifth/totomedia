<!DOCTYPE html>
<html lang="ja">
  <head>
     <?php include($_SERVER['DOCUMENT_ROOT'].'/php/layout/head.php'); ?>
    <link rel="stylesheet" href="<?= '/css/admin.css'; ?>">
  </head>
  <body> 
    <section class="admin-login">
      <form class="admin-login-form" action="/php/process/login_process.php" method="POST">
        <h1 class="admin-login-head">Log In</h1>
        <div class="mail-address"><i class="fa-solid fa-at"></i>
          <input type="text" name="mail_address" placeholder="Your Email">
        </div>
        <div class="password"><i class="fa-solid fa-key"></i>
          <input type="password" name="password" placeholder="Your Password">
        </div>
        <div class="login-button">
          <button type="submit">SUBMIT</button>
        </div>
      </form>
    </section>
  </body>
</html>