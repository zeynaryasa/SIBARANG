# SIBARANG (Sistem Informasi Manajemen Data Barang)

Tentang sistem
- Dibuat dengan bahasa pemrograman PHP (PHP native) tanpa framework
- PHP yang digunakan adalah PHP versi 8.3.6, jika web server yang digunakan menggunakan versi php dibawah versi 8 kemungkinan akan ada beberapa eror yang muncul. (Disarankan upgrade ke versi 8 jika masih dibawah versi 8)
- Menggunakan database mysql
- Keamanan sistem hanya dengan autentikasi login (Rendah)
- Menggunakan Bootsrap css
- Dibuat sebagai bahan pembelajaran
- Fitur delete masih menggunakan method GET, kedepannya akan menggunakan POST
- Fitur Flash message & konfirmasi belum di set

# Instalasi Sistem

- Simpan folder sistem kedalam localhost
- Buka folder didalam code editor
- Buka folder _database_ lalu load salah satu file .sql yang ada kedalam database server yang digunakan
- Pastikan nama database sesuai dengan konfigurasi yang ada pada file _config.php_

# Menu Pada Sistem

- Dashboard ( Menu Utama Sistem, digunakan untuk proses pencatatan Peminjaman)
- Barang ( Digunakan untuk mengelola data Barang)
- Admin ( Digunakan untuk mengelola data Admin)
- Karyawan ( Digunakan untuk mengelola data karyawan)
- Peminjaman ( Digunakan untuk mengelola data peminjaman)
- Profile sistem ( Digunakan untuk mengelola App Name & Company Name sistem)
- Profile ( Digunakan untuk update data admin yang sedang login)

# Penggunaan Sistem

Login
- Pastikan komputer/laptop terkoneksi ke internet untuk load css
- Pada browser ketikan _localhost/sibarang_ untuk mengakses folder sistem
- Pada halaman login masukan username & password :
Username :K202405001
Password :ch1

Merubah App Name & Company Name
- Masuk ke menu _profile sistem_
- Masukan App Name & Company Name yang sesuai
- Save

Update Profile (admin)
- Masuk ke menu _profile_
- Update data yang diperlukan
- Save

Kelola Data Admin,Karyawan,Barang,Peminjaman
- Masuk ke Menu
- Kelola data sesuai kebutuhan
Noted : Insert data pada menu Barang & Menu Peminjaman, Untuk _kode barang_ dan _kode Peminjaman_ digenerate otomatis oleh sistem, sedangkan untuk _id karyawan_ dan _id admin_ diinputkan manual sesuai dengan id yang diberikan perusahaan
atau sesuai rancangan pengguna sistem

Input Data Peminjaman
- Pastikan telah memiliki data _Barang, Admin, Karyawan_ sebelum melakukan input Data Peminjaman
- Pada form input _Kode Barang_ Masukan kode barang yang akan dipinjam lalu _Enter_ maka barang akan ditambahkan kedalam keranjang
- Tekan tombol _Reset_ untuk mereset semua data pada keranjang jika diperlukan
- Jika semua barang telah selesai dimasukan kedalam keranjang, tekan tombol _Biru_ disamping tombol _reset_
- Lalu masukan _id Karyawan_ yang meminjam lalu tekan enter
- Pada Kartu data peminjaman (Sebelah kanan) akan muncul informasi dari peminjaman yang akan dilakukan
- Gunakan tombol _Merah_ (disebelah kanan nama peminjam) untuk mereset data peminjam lalu menggunakan tombol _biru_ kembali untuk menambahkan peminjam jika diperlukan
- Tekan tombol _Hijau_ (sebelah kanan kode peminjaman) untuk menyimpan data peminjaman

- Developer : I Kadek Naryasa
- Contact : https://t.me/Chitos9
