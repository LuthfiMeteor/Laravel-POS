<p align="center">
    <a href="https://github.com/LuthfiMeteor" target="_blank"><img src="https://github.com/LuthfiMeteor/laravel-Ujikom-2023/assets/106295051/487a4e49-78a7-47b6-89e4-b1a6ebf8e0fb" width="120"></a>
</p>

## Tentang Aplikasi

Aplikasi POS atau point of sales adalah aplikasi yang digunakan untuk mengelola transaksi pada sebuah toko atau oleh kasir. Aplikasi ini dibuat menggunakan Laravel v10.* dan minimal PHP v8.1 jadi apabila pada saat proses instalasi atau penggunaan terdapat error atau bug kemungkinan karena versi dari PHP yang tidak support, Aplikasi Ini Hanya Untuk Tugas Uji KOmpetensi Semata

### Beberapa Fitur yang tersedia:
- Manajemen Kategori Produk
- Manajemen Produk
  - Multiple Delete
  - Cetak Barcode
- Manajemen Member atau Anggota
  - Cetak Kartu Member
- Manajemen Supplier
- Transaksi Pengeluaran
- Transaksi Pembelian
- Transaksi Penjualan
- Laporan Pendapatan atau Laba & Rugi
  - Bulanan
  - Harian
  - Custom Tanggal
- Custom Tipe Nota
  - Nota Besar
  - Nota Kecil / Thermal Nota
- Manajemen User dan Profil
- Pengaturan Toko
  - Identitas
  - Upload Desain Kartu Member
  - Setting Diskon Member
- User (Administrator, Kasir)
- Grafik ChartJS pada Dashboard

## Instalasi
#### Via Git
```bash
git clone https://github.com/LuthfiMeteor/laravel-Ujikom-2023.git
```

### Download ZIP
[Link](https://github.com/LuthfiMeteor/laravel-Ujikom-2023/archive/refs/heads/main.zip)

### Setup Aplikasi
Jalankan perintah 
```bash
composer update
```
atau:
```bash
composer install
```
Copy file .env dari .env.example
```bash
cp .env.example .env
```
Konfigurasi file .env
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=example_app
DB_USERNAME=root
DB_PASSWORD=
```
Opsional
```bash
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:7ny8i06U6BGjRyeIDxeiJ1Oz3+SLjK3QIDaeesQdqWo=
APP_DEBUG=true
APP_URL=http://localhost
```
Generate key
```bash
php artisan key:generate
```
Migrate database
```bash
php artisan migrate
```
Seeder table User, Pengaturan
```bash
php artisan db:seed
```
Menjalankan aplikasi
```bash
php artisan serve
```
```bash
USERNAME ADMIN : admin@gmail.com
PASSWORD ADMIN : 200512

USERNAME KASIR : kasir1@gmail.com
PASSWORD KASIR : 200512
```
## License

[MIT license](https://opensource.org/licenses/MIT)