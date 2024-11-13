---

# Yayın Kaydetme İşlemi - PHP

Bu rehberde, PHP ile bir yayını kaydederken belirtilen verileri ve kullanıcı ID'sini nasıl saklayabileceğinizi öğreneceksiniz. Adımlar, kullanıcı ID'sini almayı, yayın bilgilerini form ile almayı ve bu bilgileri veri tabanına eklemeyi içerir.

## 1. Kullanıcı ID'sini Alma

Kullanıcının ID’sini giriş yaptığında saklayarak, diğer sayfalarda erişim sağlayabilirsiniz. Bunun için genellikle PHP’de **session** mekanizması kullanılır.

- Kullanıcı giriş yaparken, doğrulama başarılıysa, kullanıcının ID'sini veya kullanıcı adını (username) bir `$_SESSION` değişkenine atayabilirsiniz. Örneğin:

  ```php
  // Kullanıcı giriş yaptıktan sonra
  session_start();
  $_SESSION['user_id'] = $user_id; // user_id veri tabanından gelen kullanıcı ID'si
  $_SESSION['username'] = $username; // username veri tabanından gelen kullanıcı adı
  ```

Bu sayede, kullanıcı ID'sine veya kullanıcı adına başka sayfalardan erişim sağlayabilirsiniz.

## 2. Yayın Bilgilerini Alma ve Kaydetme

Yayın yükleme sayfasında, tarih, yayın adı, medya yapıları gibi bilgileri bir form ile alabilirsiniz. Formdaki bu verileri PHP tarafında işleyerek veri tabanına eklemek için `$_POST` ile alabilirsiniz:

```php
// Örnek bir POST işlemi
$publication_date = $_POST['publication_date'];
$publication_name = $_POST['publication_name'];
$media_structure = $_POST['media_structure'];
```

## 3. Kullanıcı ID’sini Yayın Verilerine Eklemek

Artık yayını kaydederken kullanıcı ID'sini de ekleyebilirsiniz. Kullanıcı giriş yapıp `$_SESSION['user_id']` değişkeninde ID’sini sakladıysanız, bu ID'yi form verilerinin yanında kullanabilirsiniz.

## 4. Veri Tabanına Ekleme İşlemi

Elde ettiğiniz tüm verileri (yayın tarihini, adını, medya yapısını ve kullanıcı ID’sini) SQL sorgusu ile veri tabanına ekleyin:

```php
// Veri tabanı bağlantısını oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// SQL sorgusunu hazırla
$sql = "INSERT INTO publications (publication_date, publication_name, media_structure, user_id) VALUES (?, ?, ?, ?)";

// SQL sorgusunu çalıştır
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $publication_date, $publication_name, $media_structure, $_SESSION['user_id']);
$stmt->execute();
```

Burada:
- `publication_date`, `publication_name`, `media_structure` ve `user_id` alanlarını tabloya ekliyorsunuz.
- `$_SESSION['user_id']` ile giriş yapan kullanıcının ID'sini kullanıyorsunuz.

## Özet

- Kullanıcı giriş yaptığında, kullanıcı ID’sini `$_SESSION` ile saklayın.
- Yayın yükleme formunda alınan verileri `$_POST` ile alın.
- Bu verileri ve kullanıcı ID'sini SQL sorgusu ile veri tabanına ekleyin.

--- 

Bu adımları takip ederek PHP ile kullanıcının yayınlarını güvenli bir şekilde kaydedebilirsiniz.
