<?php
$title = 'Birthday wishes for EKAS 💌';
require __DIR__ . '/includes/header.php';
?>
<main>
  <section id="wishes" class="details"><div class="wrap">
    <h2>Drop a birthday wish</h2>
    <p class="lead">Write something sweet. EKAS will read every one.</p>
    <form id="wishForm" action="save_wish.php" method="POST">
      <label>Your name<input type="text" name="name" maxlength="60" required autocomplete="name"></label>
      <label>Your wish<textarea name="wish" maxlength="500" required></textarea></label>
      <div class="hp" aria-hidden="true"><label>Leave empty<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
      <div><button class="btn" id="send" type="submit">Send wish 💖</button></div>
      <p class="note" id="note" role="status"></p>
    </form>
  </div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>