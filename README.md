
# ProdTest Server
[![MIT License](https://img.shields.io/apm/l/atomic-design-ui.svg?)](https://github.com/tterb/atomic-design-ui/blob/master/LICENSEs)

Prodtest Sunucusu, Prodtest platformu için temel arka uç altyapısıdır.
## Kurulum

Composer yardımıyla kurulum:

Aşağıdaki komut yardımıyla uygulamanın ihtiyaç duyduğu paketlerin indirilmesi gerekmektedir.
```bash
    composer install
```

Enviroment dosyasının kopyalanması.
```bash
    cp .env.example .env
```

Enviroment dosyasını kopyaladıktan sonra ilgili değerleri doldurmanız gerekmektedir. Örneğin;
```bash
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=DATABASE_NAME
    DB_USERNAME=USERNAME
    DB_PASSWORD=PASSWORD
```

Laravel uygulaması için key oluşturulması gerekmektedir. Aynı zamanda authentication sistemi için jwt secret anahtarı oluşturulmalıdır:
```bash
    php artisan key:generate
    php artisan jwt:secret
```

Database bağlantısı yapıldıktan sonra tabloların oluşması ve default değerlerin oluşturulması için aşağıdaki komutların çalıştırılması gerekmektedir.
```bash
    php artisan migrate
    php artisan db:seed
```

## Çalıştırma

Uygulama ile ilgili kurulumları tamamladık. Sırada uygulamayı çalıştırmak kaldı.
```bash
    php artisan serve
```

## Authors

- [@orcuntuna](https://github.com/orcuntuna)
- [@ahmetkorkmaz3](https://www.github.com/ahmetkorkmaz3)



