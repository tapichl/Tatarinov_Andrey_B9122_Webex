<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password); // В уязвимой версии хэш не используется

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        $error = "Пользователь уже существует";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Регистрация</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Регистрация</h2>
  <form method="post">
    <input type="text" name="username" required placeholder="Имя пользователя">
    <input type="password" name="password" required placeholder="Пароль">
    <button type="submit">Зарегистрироваться</button>
  </form>
  <p>Уже есть аккаунт? <a href="index.php">Войти</a></p>
  <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
</div>
</body>
</html>