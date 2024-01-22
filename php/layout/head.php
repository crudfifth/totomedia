<?php $filename = basename(debug_backtrace()[0]['file'],'.php'); ?>
<head>
  <meta charset="UTF-8"/>
  <title><?php if (basename($filename,'.php') === 'index') {echo 'TOPページ';} else if (basename($filename,'.php') === 'profile_top') {echo 'プロフィール';} else {echo basename($filename,'.php');} ?> | TOTOメディア</title>
  <link rel="icon" href="<?= '/img/site_img/favicon1.ico'; ?>"/>
  <link rel="stylesheet" href="<?= '/css/core.css'; ?>"/>
  <script src="https://kit.fontawesome.com/9e60ceb4fc.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&amp;display=swap" rel="stylesheet"/>
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</head>