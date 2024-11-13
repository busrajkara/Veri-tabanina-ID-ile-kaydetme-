<?php
// Oturumu başlat
session_start();

// Kullanıcının giriş yapıp yapmadığını kontrol et
if (!isset($_SESSION['user_id'])) {
    die("Lütfen önce giriş yapın.");
}

// Veritabanı bilgilerini tanımla
$servername = "localhost";
$username = "veritabani_kullanici";
$password = "veritabani_sifre";
$dbname = "veritabani_adi";

// Form verilerini al
$publication_date = $_POST['publication_date'];
$publication_name = $_POST['publication_name'];
$media_structure = $_POST['media_structure'];
$user_id = $_SESSION['user_id'];

// Veritabanı bağlantısını oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// SQL sorgusunu hazırla
$sql = "INSERT INTO publications (publication_date, publication_name, media_structure, user_id) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $publication_date, $publication_name, $media_structure, $user_id);

if ($stmt->execute()) {
    echo "Yayın başarıyla kaydedildi!";
} else {
    echo "Hata: " . $stmt->error;
}

// Bağlantıyı kapat
$stmt->close();
$conn->close();
?>
