<?php
$title = 'EKAS | Web Developer | Birthday Dec 2nd 👑';
require __DIR__ . '/includes/header.php';
?>
<header class="hero">
  <canvas id="sparkle" aria-hidden="true"></canvas>
  <div class="wrap">
    <div class="crown" aria-hidden="true">👑</div>
    <h1 class="name">EKAS</h1>
    <p class="tag">Web developer building sleek, secure websites</p>
    <p class="sub">Dec 2nd baby</p>
    <p class="open"><span class="dot" aria-hidden="true"></span>Web developer open for work</p>
    <div id="clock" class="clock" role="timer" aria-live="off">
      <div class="unit"><b id="d">0</b><span>days</span></div>
      <div class="unit"><b id="h">0</b><span>hours</span></div>
      <div class="unit"><b id="m">0</b><span>minutes</span></div>
      <div class="unit"><b id="s">0</b><span>seconds</span></div>
    </div>
    <p id="bday" class="bday" hidden>Happy Birthday, EKAS! 🎉</p>
    <p><a class="cta" href="wishes.php">Leave a birthday wish</a> <a class="cta ghost" href="work.php">See my work</a></p>
  </div>
</header>
<main>
  <section id="about"><div class="wrap about">
    <div class="photo">
      <span class="mono" aria-hidden="true">E</span>
      <img src="IMG_20260830_133821 (3).jpg" alt="Portrait of EKAS" onerror="this.style.display='none'">
    </div>
    <div>
      <h2>Meet EKAS</h2>
      <p class="lead">I build websites from the screen people see to the server behind it, and I am growing into cyber security. This page is my birthday, my portfolio, and a small thank-you to everyone who shows up for me.</p>
      <ul class="chips"><li>Web developer</li><li>Full stack</li><li>Cyber security in progress</li></ul>
    </div>
  </div></section>
  <section class="explore"><div class="wrap grid">
    <a class="card" href="gifts.php"><h3>Send a gift</h3><p>Pick a gift and send it with Opay.</p></a>
    <a class="card" href="wishes.php"><h3>Leave a wish</h3><p>Write a message for my birthday.</p></a>
    <a class="card" href="work.php"><h3>See my work</h3><p>Websites I build, and how to hire me.</p></a>
  </div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>