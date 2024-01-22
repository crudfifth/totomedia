<!DOCTYPE html>
<html lang="ja">
  <head>
     <?php include($_SERVER['DOCUMENT_ROOT'].'/php/layout/head.php'); ?>
    <link rel="stylesheet" href="<?= '/css/admin.css'; ?>">
  </head>
  <body>
     <?php include($_SERVER['DOCUMENT_ROOT'].'/php/object/_admin_menu.php'); ?>
    <section class="admin-section"><?= $_SESSION['name']; ?>
      <form action="/php/auth/logout.php" method="POST"> 
        <button type="submit">ログアウト</button>
      </form><?php 
        include($_SERVER['DOCUMENT_ROOT'].'/php/common/pdo.php');
        $profile = $dbh->query("
          SELECT writer_name, user_name, mail_address, password, self_introduce, writer_img
          FROM totomedia_db.writer
          WHERE writer_name = '".$_SESSION['name']."'
        ")->fetch(PDO::FETCH_ASSOC);
      $dbh = null;
      ?>
      <form action="/php/auth/profile-setting-complete.php" method="POST">
        <table class="admin-table"> 
          <tbody>
            <tr> 
              <td class="admin-td">
                <label>ユーザー名</label>
              </td>
              <td class="admin-td">
                <input style="width:100%;" type="text" value="<?= $profile['user_name']; ?>" name="user_name">
              </td>
              <td class="admin-td">
                <button type="submit">更新</button>
              </td>
            </tr>
            <tr>
              <td class="admin-td">
                <label>メールアドレス</label>
              </td>
              <td class="admin-td">
                <input style="width:100%;" type="text" value="<?= $profile['mail_address'];?>" name="mail_address">
              </td>
              <td class="admin-td">
                <button type="submit">更新</button>
              </td>
            </tr>
            <tr> 
              <td class="admin-td">
                <label>パスワード</label>
              </td>
              <td class="admin-td">
                <input style="width:100%;" type="text" value="<?= $profile['password']; ?>" name="password">
              </td>
              <td class="admin-td">
                <button type="submit">更新</button>
              </td>
            </tr>
          </tbody>
        </table>
      </form>
    </section>
  </body>
</html>