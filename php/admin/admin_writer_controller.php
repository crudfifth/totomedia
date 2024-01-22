
<?php 
  include($_SERVER['DOCUMENT_ROOT'].'/php/common/pdo.php');

  $writers = $dbh->query("
    SELECT w.id, w.writer_name, w.user_name, a.title, a.writer, COUNT(a.writer) AS cnt
    FROM totomedia_db.writer AS w
    LEFT OUTER JOIN totomedia_db.articles AS a
    ON w.writer_name = a.writer
    WHERE w.writer_name != '匿名'
    GROUP BY w.writer_name
    ORDER BY w.id asc
  ")->fetchAll(PDO::FETCH_ASSOC);

  $cntt = $dbh->query("
    SELECT COUNT(writer_name) AS cnt 
    FROM totomedia_db.writer 
    WHERE writer_name != '匿名'
  ")->fetch(PDO::FETCH_ASSOC);

  if ($cat_cnt["cnt"] == 0) {
    $dbh->query("
    INSERT INTO totomedia_db.writer(writer_name) 
    VALUE ('匿名')
    ")->fetch(PDO::FETCH_ASSOC);
  }

  $dbh = null;
?><!DOCTYPE html>
<html lang="ja">
  <head>
     <?php include($_SERVER['DOCUMENT_ROOT'].'/php/layout/head.php'); ?>
    <link rel="stylesheet" href="<?= '/css/admin.css'; ?>">
  </head>
  <body>
     <?php include($_SERVER['DOCUMENT_ROOT'].'/php/object/_admin_menu.php'); ?>
    <section class="admin-section">
      <form action="/php/process/admin_writer_create_process.php" method="post"><span class="subheading">ライター新規追加</span><br>
        <input type="text" name="writer">
        <input type="submit" value="追加">
      </form><span class="subheading">ライター一覧<?= "(".$cntt["cnt"]."人)";?></span>
      <table class="admin-table">
        <thead>
          <tr> 
            <th class="admin-th">名前 </th>
            <th class="admin-th">ハンドルネーム</th>
            <th class="admin-th">執筆数 </th>
            <th class="admin-th">実績</th>
            <th class="admin-th">操作</th>
          </tr>
        </thead><?php foreach ($writers as $writer) : ?>
          <tbody>
            <tr>
              <td class="admin-td"><?= $writer['writer_name'];?></td>
              <td class="admin-td"><?= $writer['user_name'];?></td>
              <td class="admin-td"><?= $writer["cnt"]; ?></td>
              <td class="admin-td"><button>詳細</button></td>
              <td class="admin-td"><form action='/php/process/admin_writer_delete_process.php' method='GET' style='display:inline;'><input value=".$writer['id']." type='hidden' name='id'><button type='submit'>削除</button></form></td>
            </tr>
          </tbody>
        <?php endforeach ; ?>
      </table>
    </section>
  </body>
</html>