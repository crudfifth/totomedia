<?php
  $item1 = $_POST["item1"];
  $nav_item_doc1 = <<< 'EOD'
  $nav1 = 
  EOD;
  $nav_item_here1 = <<< EOD
  "$item1";
  EOD;
  $item2 = $_POST['item2'];
  $nav_item_doc2 = <<< 'EOD'
  $nav2 = 
  EOD;
  $nav_item_here2 = <<< EOD
  "$item2";
  EOD;
  $item3 = $_POST['item3'];
  $nav_item_doc3 = <<< 'EOD'
  $nav3 = 
  EOD;
  $nav_item_here3 = <<< EOD
  "$item3";
  EOD;
  $item4 = $_POST['item4'];
  $nav_item_doc4 = <<< 'EOD'
  $nav4 = 
  EOD;
  $nav_item_here4 = <<< EOD
  "$item4";
  EOD;
  
  file_put_contents(
  "nav_item.php",
"<?php
"
.$nav_item_doc1.$nav_item_here1."\n"
.$nav_item_doc2.$nav_item_here2."\n"
.$nav_item_doc3.$nav_item_here3."\n"
.$nav_item_doc4.$nav_item_here4."\n".
"?>"
  );
//   header('Location: ../../admin/admin_website_controller.php');
?>
<p>値がセットされました</p>
<a href="../../../index.php">トップへ戻る</a>