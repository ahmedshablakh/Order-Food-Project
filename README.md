# Order-Food-Project
# Proje Başlığı 
   Yemek Siparişi 
# Projenin amacı  
   İnternetten sipariş vermek isteyen ve Siparişler Yönetimi 
# Projenin Hedef kitlesi 
  Mahalledeki Restorandan sipariş vermek isteyen  internet kullanıcılarını aynı ortamda buluşturmak 
# Projede Kullanılan Teknolojiler 
 Html / Css / JS / Php / Mysql  
# Projeden Beklentileriniz
    - Sipariş verme işlemleri
    - Yönetim paneli  
  + Raporlama İşlemleri
    - Ürün bilgileri ve Sipariş takibi
    - Faturalandırma

# Proje nasıl çalıştırılır
  1- Bilgisayarınızda bir yerel sunucu olmaması girekerir  Sunucu Yazılımı (XAMPP, WAMP, MAMP, vb.):

Bilgisayarınıza bir sunucu yazılımı yükleyin. XAMPP (Windows, Linux, macOS için), WAMP (Windows için) veya MAMP (macOS için) gibi araçlar, Apache (web sunucusu), MySQL (veritabanı sunucusu) ve PHP’yi bir arada getirir.
İlgili yazılımı indirip kurun. Kurulum sırasında Apache ve MySQL servislerinin çalıştığından emin olun.

2. Veritabanı Oluşturma
PhpMyAdmin ile Veritabanı Oluşturma

Tarayıcınızda http://localhost/phpmyadmin adresine gidin.
“Databases” sekmesine gidin ve yeni bir veritabanı oluşturun. Veritabanınıza bir isim verin ve “Create” butonuna tıklayın.
Tablolar Oluşturma:
Veritabanınız oluşturulduktan sonra, tablolar eklemek için veritabanınızı seçin.
“SQL” sekmesine gidin ve tablolarınızı oluşturacak SQL sorgularını yazın veya “Structure” sekmesinden tablo ekleyin.
3. PHP Dosyaları Oluşturma
PHP Dosyası Oluşturma:

htdocs (XAMPP) veya www (WAMP) gibi dizinlere gidin ve projeleriniz için bir klasör oluşturun.
Bu klasörde bir PHP dosyası oluşturun (örneğin, index.php).
Temel PHP Dosyası:

php
نسخ الكود
<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "root"; // XAMPP/WAMP varsayılan kullanıcı adı
$password = ""; // Varsayılan olarak boş olabilir
$dbname = "veritabani_adiniz"; // Daha önce oluşturduğunuz veritabanı adı

// Bağlantıyı oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı başarısız: " . $conn->connect_error);
}
echo "Bağlantı başarılı!";
?>
Veritabanı ile Etkileşim:

Veritabanına veri ekleme, veri çekme ve güncelleme gibi işlemler yapmak için PHP kodları yazabilirsiniz.
Örnek: Veritabanından Veri Çekme

php
نسخ الكود
<?php
// Veritabanı bağlantısı
$conn = new mysqli($servername, $username, $password, $dbname);

// Sorgu oluştur
$sql = "SELECT id, isim FROM kullanicilar";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Her bir satırı göster
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - İsim: " . $row["isim"]. "<br>";
    }
} else {
    echo "0 sonuç";
}
$conn->close();
?>
4. Web Sunucusunu Çalıştırma
Sunucuyu Başlatma:

XAMPP veya WAMP kontrol panelinden Apache ve MySQL servislerini başlatın.
Tarayıcıdan Erişim:

Tarayıcınızda http://localhost/projeniz adresine gidin. PHP dosyalarınız çalışmaya başlayacaktır.
5. Güvenlik ve Hata Ayıklama
Güvenlik:

SQL enjeksiyonlarına karşı önlemler almak için prepared statements veya mysqli_real_escape_string() gibi yöntemleri kullanın.
Giriş bilgilerinizin ve şifrelerin güvenliğini sağlamak için uygun yöntemleri kullanın.
Hata Ayıklama:

Hataları anlamak ve düzeltmek için PHP hata raporlamayı aktif edin:
php
نسخ الكود
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
Bu temel adımlar, PHP ve MySQL kullanarak bir proje geliştirmek için gerekli olan süreçlerin genel bir özetidir. Projeye özgü daha detaylı gereksinimler ve özellikler için ek kaynaklar ve dokümantasyonlara başvurabilirsiniz.
  
