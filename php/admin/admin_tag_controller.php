
<?php 
  include($_SERVER['DOCUMENT_ROOT'].'/php/common/pdo.php');

  $tags = $dbh->query("
    SELECT t.id, t.tag_name, a.title, a.tag, COUNT(a.tag) AS cnt
    FROM totomedia_db.tags AS t
    LEFT OUTER JOIN totomedia_db.articles AS a
    ON t.tag_name = a.tag
    GROUP BY t.tag_name
    ORDER BY t.id ASC
  ")->fetchAll(PDO::FETCH_ASSOC);

  $cntt = $dbh->query("
    SELECT COUNT(tag_name) AS cnt 
    FROM totomedia_db.tags
  ")->fetch(PDO::FETCH_ASSOC);
  
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
      <form action="/php/process/admin_tag_create_process.php" method="post"><span class="subheading">タグ新規追加</span><br>
        <input style="display:block;text-align:center;" type="text" name="tag">
        <input style="display:block;text-align:center;" type="submit" value="追加">
      </form>
      <label>登録済タグ数: <?= $cntt["cnt"]."件";?></label><br><span class="subheading">タグ一覧</span>
      <table class="admin-table">
        <thead>
          <tr>
            <th class="admin-th">タグ名</th>
            <th class="admin-th">関連記事数</th>
            <th class="admin-th">操作</th>
          </tr>
        </thead><?php foreach ($tags as $tag) : ?>
          <tbody>
            <tr>
              <td class="admin-td"><?= $tag['tag_name']; ?></td>
              <td class="admin-td"><?= $tag['cnt']; ?></td>
              <td class="admin-td"><form action='/php/process/admin_tag_delete_process.php' method='get' style='display:inline;'><input value="<?= $tag['id']; ?>" type='hidden' name='id'><button type='submit'>削除</button></form></td>
            </tr>
          </tbody>
        <?php endforeach ; ?>
      </table>
    </section>
  </body>
</html>