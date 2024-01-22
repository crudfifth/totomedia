
<?php 
  include($_SERVER['DOCUMENT_ROOT'].'/php/common/pdo.php');

  $categories = $dbh->query("
    SELECT c.id, c.category_name, a.title, a.category, COUNT(a.category) AS cnt
    FROM totomedia_db.categories AS c
    LEFT OUTER JOIN totomedia_db.articles AS a
    ON c.category_name = a.category
    WHERE c.category_name != '未分類'
    GROUP BY c.category_name
    ORDER BY c.id asc
  ")->fetchAll(PDO::FETCH_ASSOC);
  
  $cntt = $dbh->query("
    SELECT COUNT(category_name) AS cnt 
    FROM totomedia_db.categories 
    WHERE category_name != '未分類'
  ")->fetch(PDO::FETCH_ASSOC);

  if ($cat_cnt["cnt"] == 0) {
    $dbh->query("
      INSERT INTO totomedia_db.categories(category_name)
      VALUE ('未分類')
    ")->fetch(PDO::FETCH_ASSOC);
  }

  $dbh = null;
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
     <?php include($_SERVER['DOCUMENT_ROOT'].'/php/layout/head.php'); ?>
    <link rel="stylesheet" href="<?= '/css/admin.css'; ?>">
  </head>
  <body>
     <?php include($_SERVER['DOCUMENT_ROOT'].'/php/object/_admin_menu.php'); ?>
    <section class="admin-section">
      <form action="/php/process/admin_category_create_process.php" method="post"><span class="subheading">カテゴリ新規追加</span><br>
        <input type="text" name="category">
        <input type="submit" value="追加">
      </form>
      <label style="display:block;text-align:right;">登録済カテゴリ数<?= $cntt["cnt"]."件";?></label><br>
      <label style="display:block;text-align:center;">カテゴリ一覧</label>
      <table class="admin-table">
        <thead>
          <tr>
            <th class="admin-th">カテゴリ名</th>
            <th class="admin-th">関連記事数</th>
            <th class="admin-th">操作</th>
          </tr>
        </thead><?php foreach ($categories as $category) : ?>
          <tbody>
            <tr>
              <td class="admin-td"><?= $category['category_name']; ?></td>
              <td class="admin-td"><?= $category['cnt']; ?></td>
              <td class="admin-td"><form action='/php/process/admin_category_delete_process.php' method='get' style='display:inline;'><input value="<?= $category['id']; ?>" type='hidden' name='id'><button type='submit'>削除</button></form></td>
            </tr>
          </tbody>
        <?php endforeach ; ?>
      </table>
    </section>
  </body>
</html>