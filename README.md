🦁 Zoo Management System

Sistem Pengelolaan Data Hewan dengan PHP, Session, Upload Gambar, dan JSON Storage

Project ini merupakan aplikasi web sederhana untuk mengelola data hewan.
Fitur yang tersedia meliputi login, manajemen data hewan, upload gambar, dan penyimpanan data menggunakan file JSON (tanpa database).

🧩 Fitur Utama
✔ 1. Login + Session

Pengguna harus login dulu untuk dapat mengakses fitur manajemen data hewan.

Session digunakan untuk:

menyimpan status login

membatasi akses halaman (requireLogin())

✔ 2. Tambah Data Hewan

Kamu dapat memasukkan:

nama hewan

umur hewan

jenis hewan (Mamalia, Burung, Reptil, Ikan)

keterangan hewan

upload gambar hewan

Data yang diinput akan disimpan ke file JSON.

✔ 3. Upload Gambar Hewan
✔ 4. Penyimpanan Data Menggunakan JSON
✔ 5. Menampilkan Data Hewan

index.php akan menampilkan semua data hewan dalam tampilan grid card:

Setiap card berisi:

gambar hewan

nama

umur

jenis

deskripsi/keterangan

Tampilan dibuat simple dan rapi.

✔ 6. Upload File Biasa

File seperti:

PDF

DOC

DOCX

ZIP

TXT

dapat diupload melalui upload.php.
🔐 Keamanan Dasar

Session digunakan untuk membatasi halaman khusus.

Validasi format file dan gambar.

Sanitasi output menggunakan htmlspecialchars().

🚀 Rencana Pengembangan (Opsional)

Jika ingin meningkatkan aplikasi:

Tambahkan fitur edit / delete hewan

Tambah validasi ukuran file & gambar

Gunakan database MySQL (upgrade dari JSON)

Buat role user admin dan staff

Tambahkan pagination daftar hewan

🎉 Penutup

Project ini dibuat untuk membantu pemahaman tentang:

PHP dasar

session

upload file

manipulasi JSON

OOP sederhana

struktur aplikasi web