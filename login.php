<?php
// Oturumu başlat
session_start();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Giriş</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>Giriş Yap</h2>
        <form action="index.php" method="post">
            <label for="username">Kullanıcı Adı:</label>
            <input type="text" name="username" id="username" required><br><br>

            <label for="password">Şifre:</label>
            <input type="password" name="password" id="password" required><br><br>

            <button type="submit">Giriş Yap</button>
        </form>

        <?php
        // Basit bir kullanıcı doğrulama örneği
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Örnek kullanıcı doğrulaması
            if ($username == 'kullanici_adi' && $password == 'sifre') {
                $_SESSION['user_id'] = 1; // Örnek kullanıcı ID'si
                $_SESSION['username'] = $username;
                echo "<p class='success'>Giriş başarılı! <a href='upload.php'>Yayın yüklemeye devam et</a>.</p>";
            } else {
                echo "<p class='error'>Kullanıcı adı veya şifre hatalı.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
