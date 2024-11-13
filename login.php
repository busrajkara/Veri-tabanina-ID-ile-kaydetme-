<?php
// login.php
session_start(); // Oturumu başlat

// Örnek kullanıcı giriş işlemi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Giriş bilgilerinin veritabanı ile karşılaştırıldığı varsayılıyor
    if ($_POST['username'] === 'kullanici_adi' && $_POST['password'] === 'sifre') {
        // Kullanıcı veritabanında bulunduysa, örneğin user_id 1 olarak atanıyor
        $user_id = 1;

        // Session değişkenlerine kullanıcı bilgilerini kaydet
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $_POST['username'];

        echo "Giriş başarılı!";
    } else {
        echo "Giriş başarısız!";
    }
}
?>
