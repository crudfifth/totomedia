<div class="breadcrumbs">
  <?php 
    include($_SERVER['DOCUMENT_ROOT'].'/php/common/pdo.php');
  ?>
  <?php if(array_key_exists("filter",$_POST)) : ?>
    現在地: <a href="index.php"><i class="fa-sharp fa-solid fa-house"></i></a> > [ <?= $_POST['filter']; ?> ]
  <?php else : ?>
    現在地: [ <a href="index.php"><i class="fa-sharp fa-solid fa-house"></i></a> ]
  <?php endif ; ?>
</div>
