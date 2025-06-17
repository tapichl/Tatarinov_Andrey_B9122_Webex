<?php
if (!isset($_COOKIE['username'])) {
    header("Location: index.php");
    exit;
}
$user = htmlspecialchars($_COOKIE['username']);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Добро пожаловать</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Привет, <?php echo $user; ?>!</h2>
  <a href="logout.php"><button>Выйти</button></a>
</div>
</body>
</html>
