<!DOCTYPE html>
<html lang="ja">
  <head>
     <?php include($_SERVER['DOCUMENT_ROOT'].'/php/layout/head.php'); ?>
    <link rel="stylesheet" href="<?= '/css/admin.css'; ?>">
  </head>
  <body>
     <?php include($_SERVER['DOCUMENT_ROOT'].'/php/object/_admin_menu.php'); ?>
    <section>
      <form action="/php/process/setting/nav_item_process.php" method="post">
        <?php 
          include($_SERVER['DOCUMENT_ROOT'].'/php/common/pdo.php');
          $categories = $dbh->query("
            SELECT category_name
            FROM totomedia_db.categories
            WHERE category_name != '未分類'
          ")->fetchAll(PDO::FETCH_ASSOC);
          $dbh = null;
          
          $cnt = 1;
          echo("<label>グローバルナビゲーションのタグ設定:</label><br>");
        
          if (empty($categories)) { 
            echo "タグが未作成の為、グローバルナビゲーションにタグをセットすることができません。";
          } else {
            foreach( $categories as $category) {
              if ($cnt <= 4 ) {
                echo("<select name='item".$cnt."'>");
                  foreach($categories as $category) {
                    echo("<option value=".$category['category_name'].">".$category['category_name']."</option>");
                  }
                echo("</select>");
              }
              $cnt++;
            }
            echo("<input type='submit' value='セット'>");
          }
        ?>
      </form>
    </section>
  </body>
</html>