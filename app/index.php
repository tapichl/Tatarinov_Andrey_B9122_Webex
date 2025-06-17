<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    $res = $stmt->get_result();
    if ($res->num_rows === 1) {
        setcookie("username", $username, time() + 3600, "/");
        header("Location: welcome.php");
    } else {
        $error = "Неверные данные";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Вход</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Вход</h2>
  <form method="post">
    <input type="text" name="username" required placeholder="Имя пользователя">
    <input type="password" name="password" required placeholder="Пароль">
    <button type="submit">Войти</button>
  </form>
  <p>Нет аккаунта? <a href="register.php">Регистрация</a></p>
  <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
</div>
</body>
</html>
