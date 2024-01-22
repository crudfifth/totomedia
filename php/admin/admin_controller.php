
<?php 
include($_SERVER['DOCUMENT_ROOT'].'/php/common/pdo.php');

$num = $dbh->query("
  SELECT count(*)
  FROM totomedia_db.articles
")->fetch(PDO::FETCH_ASSOC);

?><!DOCTYPE html>
<html lang="ja">
  <head>
     <?php include($_SERVER['DOCUMENT_ROOT'].'/php/layout/head.php'); ?>
    <link rel="stylesheet" href="<?= '/css/admin.css'; ?>">
  </head>
  <body>
     <?php include($_SERVER['DOCUMENT_ROOT'].'/php/object/_admin_menu.php'); ?>
    <section class="admin-section"><span class="subheading">2024年の目標「記事を100本作成する」</span><br><span>2024年に書いた記事数は<?= $num['count(*)'];?>本です。</span><br>
      <div class="circle-graph">
        <svg class="admin-graph"> 
          <circle class="admin-circle base" CX="90" cy="90" r="70"></circle>
          <circle class="admin-circle line" CX="90" cy="90" r="70"></circle>
        </svg>
        <div class="number"> 
          <h3 class="title"><?= $num['count(*)']; ?><span>%</span></h3>
        </div>
      </div>
      <p class="text">ノルマ達成率</p>
    </section>
    <script type="text/javascript" src="/js/main.js"></script>
    <script>
       let num = 440-(440*'<?= $num['count(*)'];?>')/100;
      $(function(){
        $('.line').css({'stroke-dashoffset':num,'color':'#03a9f4'});
      });
    </script>
  </body>
</html>