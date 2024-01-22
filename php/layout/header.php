
<header>
  <h1 class="logo"><a class="gradient-text" href="<?= '/index.php';?>">WELCOME TO TOTOMEDIA</a></h1>
  <div>
    <?php 
      include($_SERVER['DOCUMENT_ROOT'].'/php/process/setting/nav_item.php');
    ?>
    <nav>
      <form class="nav-filter" method="post"><?php if (empty($nav1)) {; ?>
<?php echo ""; ?>
<?php } else { ;?>
<button class="nav-keyword btn btn--liquidBtn" type="submit" name="filter" value="<?= $nav1;?>">
<span>ブログ</span>
<div class="btn--liquidBtn--liquid"></div>
</button>
<?php if (empty($nav2)) {; ?>
<?php echo ""; ?>
<?php } else { ;?>
<button class="nav-keyword btn btn--liquidBtn" type="submit" name="filter" value="<?= $nav2;?>">
<span>メンタ</span>
<div class="btn--liquidBtn--liquid"></div>
</button>
<?php if (empty($nav3)) {; ?>
<?php echo ""; ?>
<?php } else { ;?>
<button class="nav-keyword btn btn--liquidBtn" type="submit" name="filter" value="<?= $nav3;?>">
<span>コーヒー</span>
<div class="btn--liquidBtn--liquid"></div>
</button>
<?php if (empty($nav4)) {; ?>
<?php echo ""; ?>
<?php } else { ;?>
<button class="nav-keyword btn btn--liquidBtn" type="submit" name="filter" value="<?= $nav4;?>">
<span>健康</span>
<div class="btn--liquidBtn--liquid"></div>
</button>
<?php }; ?> 
<?php }; ?> 
<?php }; ?>
<?php }; ?>
      </form>
    </nav><br/>
  </div>
</header>