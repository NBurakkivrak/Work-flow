example.env dosyasını kendi DB'nize göre yapılandırınız.

# Bu repository  Forwardie firması için Task Case içerir.

Örnek Data için  php artisan "db:seed --class=TaskSeeder" Çalıştırılabilir.  

End Point testi Postman Aracılığı ile yapıldı.


# API Endpointleri

# Görev Oluşturma:

POST /tasks: Yeni bir görev eklemek için bu endpoint kullanılır.
 # Göreve Ön Koşul Ekleme:

POST /tasks/{taskId}/prerequisites: Mevcut bir göreve ön koşul (bağımlılık) eklemek için bu endpoint kullanılır.

# Tüm Görevleri Görüntüleme:

GET /tasks: Mevcut tüm görevleri görüntülemek için bu endpoint kullanılır.


# Görevleri Yapılma Sırasına Göre Sıralama:

GET /tasks/order: Görevleri yapılan sıraya göre sıralamak için bu endpoint kullanılır.
