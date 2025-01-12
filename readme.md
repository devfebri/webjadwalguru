<h1 align="center">Selamat datang di Febri Dev! 👋</h1>

 ### 👤 Default Account for testing
	
**Admin Default Account**
- Username: admin
- Password: admin

------------

## 💻 Install

1. **Clone Repository**
```bash
git clone https://github.com/devfebri/webjadwalguru.git
cd webjadwalguru
composer install
npm install
copy .env.example .env
```

2. **Buka ```.env``` lalu ubah baris berikut sesuai dengan databasemu yang ingin dipakai**
```
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

3. **Instalasi website**
```bash
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan storage:link
```

4. **Jalankan website**
```bash
php artisan serve
```


## 🤝 Contributing
Contributions, issues and feature requests di persilahkan.
Jangan ragu untuk memeriksa halaman masalah jika Anda ingin berkontribusi. **Berhubung Project ini saya sudah selesaikan sendiri, namun banyak fitur yang kalian dapat tambahkan silahkan berkontribusi yaa!**


## 📝 License
- **DevFebri is open-sourced software licensed under the MIT license.**

------------

- Thanks to <a href="https://devover.or.id">DevoverID</a>
- DevFebri is open-sourced software licensed under the MIT license.

