<?php
// Oturumu başlat
session_start();

// Kullanıcının giriş yapıp yapmadığını kontrol et
if (!isset($_SESSION['user_id'])) {
    die("Lütfen önce <a href='index.php'>giriş yapın</a>.");
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yayın Yükleme</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>Yayın Bilgilerini Girin</h2>
        <form action="save_publication.php" method="post">
            <label for="publication_date">Yayın Tarihi:</label>
            <input type="date" name="publication_date" id="publication_date" required><br><br>

            <label for="publication_name">Yayın Adı:</label>
            <input type="text" name="publication_name" id="publication_name" required><br><br>

            <label for="media_structure">Medya Yapısı:</label>
            <input type="text" name="media_structure" id="media_structure" required><br><br>

            <button type="submit">Yayın Kaydet</button>
        </form>
    </div>
</body>
</html>
