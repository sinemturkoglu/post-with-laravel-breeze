# Laravel Breeze ile Post Projesi

Bu proje, Laravel ve Tailwind CSS kullanılarak geliştirilmiş, temel blog özelliklerine sahip basit bir web uygulamasıdır. Kullanıcılar makale yazabilir ve silebilir; ayrıca diğer kullanıcıların makalelerini görüntüleyebilir.

## Özellikler

- **Kullanıcı Yönetimi:** Laravel Breeze ile hızlı ve güvenli kayıt, giriş ve şifre sıfırlama.
- **Makale Yönetimi:** Giriş yapan kullanıcılar kendi makalelerini oluşturabilir ve silebilir.
- **Tarihe Göre Listeleme:** Makaleler en yeniden en eskiye doğru sıralanır.
- **Kullanıcı İlişkisi:** Her makale, yazar bilgisiyle birlikte görüntülenir.
- **Basit ve Temiz Arayüz:** Tailwind CSS ile oluşturulmuş modern ve minimalist tasarım.

## Kurulum

Projenin yerel makinenizde çalıştırılması için aşağıdaki adımları izleyin.

### Gereksinimler

- [Docker](https://www.docker.com/)
- [Composer](https://getcomposer.org/)

### Adımlar

1.  Projeyi klonlayın:
    ```bash
    git clone [https://github.com/KULLANICI_ADINIZ/PROJE_ADINIZ.git](https://github.com/KULLANICI_ADINIZ/PROJE_ADINIZ.git)
    cd PROJE_ADINIZ
    ```

2.  `.env` dosyasını oluşturun:
    ```bash
    cp .env.example .env
    ```

3.  `.env` dosyasındaki veritabanı ayarlarını Docker'a uyacak şekilde güncelleyin:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=sail
    DB_PASSWORD=
    ```
    *(Not: Eğer Laravel Sail kullanıyorsanız, varsayılan ayarlar genellikle bu şekildedir.)*

4.  Docker konteynerlerini başlatın ve Composer bağımlılıklarını yükleyin:
    ```bash
    docker-compose up -d
    docker-compose exec laravel.test composer install
    ```

5.  Veritabanı tablolarını oluşturun (migration):
    ```bash
    docker-compose exec laravel.test php artisan migrate
    ```

6.  Gerekli NPM paketlerini kurun ve ön yüz varlıklarını derleyin:
    ```bash
    docker-compose exec laravel.test npm install
    docker-compose exec laravel.test npm run dev
    ```

7.  Uygulamayı başlatın:
    ```bash
    docker-compose exec laravel.test php artisan serve
    ```

Artık uygulamaya **`http://localhost`** veya **`http://127.0.0.1:8000`** adresinden erişebilirsiniz.

## Kullanım

- **Giriş ve Kayıt:** Uygulamaya giriş yaparak veya yeni bir hesap oluşturarak başlayın.
- **Makale Oluşturma:** Giriş yaptıktan sonra "Yeni Post Ekle" butonu ile ilk makalenizi yazın.
- **Makaleleri Görüntüleme:** Ana sayfada tüm kullanıcıların makalelerini görüntüleyebilirsiniz.

## Katkıda Bulunma

Eğer projeye katkıda bulunmak isterseniz, lütfen bir Pull Request (PR) açmaktan çekinmeyin.

## Lisans

Bu proje [MIT Lisansı](https://opensource.org/licenses/MIT) ile lisanslanmıştır.

---