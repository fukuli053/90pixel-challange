# 90Pixel Akademi 2020 - Backend Code Challenge

Not: Projeyi Laradock ile dockerize edildi ama Laradock dosyalarını repostory içine atamadım. Laradock repositorysini laravel klasörünün dışına cloneladıktan sonra Laradock içindeki .env dosyasında `APP_CODE_PATH_HOST=../laravel/` ayarını yapmanız gerekmektedir.

`localhost/category` adresine GET isteği yapıldığında

![](https://i.imgur.com/NWOq5Gq.png)


## İhtiyaç
FTP’de bir klasöre bir sistem tarafından otomatik olarak Excel dosyası olarak atılan kategori ağacının veritabanına aktarılarak sistem yöneticisine bildirim gönderilmesi. Bu işlem verilecek bir hook URL’ine herhangi bir GET isteği geldiğinde tetiklenecek ve kuyruğa gönderilerek arka planda işlenecektir.

## Yapılanlar

- Laravel framework kullanıldı
- DB modelini oluşturuldu
- Kategori ağacının model yapısı olarak “nested tree model” kullanıldı
- İşlemi kuyruk yapısıyla arkaplanda yapıldı
- OOP ve SOLID prensiplerine uyuldu
- PSR-2 standartlarına uyuldu
- İhtiyaç duyabileceğiniz kütüphaneleri bularak bu kütüphanelerle çalışıldı


## Bonus
- Proje Dockerize edildi
- Database seeding, Model Factory yazmak
- Kod standartlaştırma araçlarının kullanımı


- Test işlemlerinde eksiklerimin olduğunu fark ettim en kısa sürede Test işlemleri hakkında olan eksiklerimi kapatacağım.

## Çalıştırmak İçin
Terminalde Laradock klasörüne gidin ve alttaki komutu çalıştırın.
- `docker-compose up -d nginx mysql phpmyadmin` 

### Kullanılan kütüphaneler
- [laravel-excel](https://laravel-excel.com/)
- [laravel-nestedset](https://github.com/lazychaser/laravel-nestedset)
