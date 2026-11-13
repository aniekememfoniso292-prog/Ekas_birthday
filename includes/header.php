<?php
$title   = $title ?? 'EKAS | Web Developer | Birthday Dec 2nd 👑';
$current = basename($_SERVER['SCRIPT_NAME']);
$menu = [
  'index.php'  => 'Home',
  'gifts.php'  => 'Gifts',
  'wishes.php' => 'Wishes',
  'work.php'   => 'Work',
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($title) ?></title>
<meta name="description" content="EKAS is a web developer turning another year on December 2nd. Send a wish or a gift, and see the websites she builds.">
<meta name="theme-color" content="#000000">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,700;1,500&family=Outfit:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="nav" aria-label="Main">
  <div class="wrap navin">
    <a class="brand" href="index.php">EKAS 👑</a>
    <div class="links">
      <?php foreach ($menu as $file => $label): ?>
        <a href="<?= $file ?>"<?= $current === $file ? ' aria-current="page"' : '' ?>><?= $label ?></a>
      <?php endforeach; ?>
    </div>
  </div>
</nav>