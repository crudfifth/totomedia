<section class="comment">
  <form class="comment-form" action='../process/comment_process.php' method='post'>
    <label>コメント<?= "(".$cnt['cnt']."件)";?></label>
    <br>
    <textarea name='comment'></textarea>
    <label name="handle_name">ハンドルネーム(任意):</label>
    <input type="text" name="handle_name">
    <label type="mailadress">メールアドレス(任意):</label>
    <input type="email" name="email">
    <input type='hidden' name='article' value='<?= basename($filename); ?>'>
    <input type='submit' value='送信'>
  </form>
  <br>
  <ul class="comment-list">
    <?php foreach ($comments as $comment) : ?>
        <li><?= $comment['handle_name'];?></li>
        <li><?= $comment['created_date'];?></li>
        <li><?= $comment['comment'];?></li>
    <?php endforeach;?>
  </ul>
</section>