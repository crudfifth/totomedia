
<?php
include($_SERVER['DOCUMENT_ROOT'].'/php/common/pdo.php');

$articles = $dbh->query("
  SELECT id, title, contents, DATE_FORMAT(created_date, '%Y-%m-%d') AS created_date, category, writer, case status when 'private' then '非公開' when 'public' then '公開' end as status
  FROM totomedia_db.articles
  ORDER BY updated_date DESC
")->fetchAll(PDO::FETCH_ASSOC);

$dbh = null;
?><!DOCTYPE html>
<html lang="ja">
  <head>
     <?php include($_SERVER['DOCUMENT_ROOT'].'/php/layout/head.php'); ?>
    <link rel="stylesheet" href="<?= '/css/admin.css'; ?>">
  </head>
  <body>
     <?php include($_SERVER['DOCUMENT_ROOT'].'/php/object/_admin_menu.php'); ?>
    <section class="admin-section"><span class="subheading">記事新規作成</span>
      <form style="display:block;text-align:center;margin-bottom:30px;" action="admin_article_create.php" method="post">
        <input type="submit" name="post" value="執筆">
      </form><span class="subheading">記事一覧</span>
      <table class="admin-table">
        <thead>
          <tr class="admin-tr">
            <th class="admin-th">タイトル</th>
            <th class="admin-th">カテゴリ</th>
            <th class="admin-th">作成者</th>
            <th class="admin-th">作成日</th>
            <th class="admin-th">ステータス</th>
            <th class="admin-th">操作</th>
          </tr>
        </thead><?php foreach ( $articles as $article ) : ?>
          <tbody>
            <tr>
              <td class="admin-td"><a href="<?= '/php/article/'.$article['title'].'.php';?>"><?= $article['title']; ?></a></td>
              <td class="admin-td"><?= $article['category']; ?></td>
              <td class="admin-td"><?= $article['writer']; ?></td>
              <td class="admin-td"><?= $article['created_date']; ?></td>
              <td class="admin-td"><?= $article['status']; ?></td>
              <td class="admin-td"><form style='display:inline;' action='/php/admin/admin_article_update.php' method='GET'><input type='hidden' value="<?= $article['id']; ?>" name=id><button type='submit'><i class="fa-solid fa-pen-nib"></i> 更新</button></form>
                                   <form style='display:inline;' action='/php/admin/admin_article_delete.php' method='GET'><input type='hidden' value="<?= $article['id']; ?>" name=id><button type='submit'><i class="fa-solid fa-delete-left"></i> 削除</button></form></td>
            </tr>
          </tbody>
        <?php endforeach ; ?>
      </table>
    </section>
  </body>
</html>