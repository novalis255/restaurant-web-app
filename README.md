# 🍽️ Restaurant Web Application

Sistem Informasi Restoran berbasis web yang dibangun menggunakan **PHP Native** dan **Docker**.  
Aplikasi ini dirancang untuk membantu pengelolaan restoran dengan sistem **multi-role** serta fitur CRUD yang lengkap.

---

## 📌 Fitur Utama

### 🔐 Multi Role User
- **Admin**
  - Dashboard Admin
  - Kelola Kategori Menu (CRUD)
  - Kelola Menu (CRUD + Upload Gambar)
  - Kelola Semua Pesanan
- **Kasir**
  - Dashboard Kasir
  - Membuat Pesanan
  - Melihat Daftar Pesanan
  - Menyelesaikan Pesanan
- **Pelayan**
  - Dashboard Pelayan
  - Membuat Pesanan
  - Melihat Pesanan Baru
  - Update Status Pesanan (BARU → PROSES)

---

## 🧩 Fitur Sistem
- Authentication & Authorization (Role Based Access Control)
- CRUD Kategori
- CRUD Menu (dengan upload gambar)
- CRUD Pesanan
- Update Status Pesanan (BARU, PROSES, SELESAI)
- Landing Page Publik
- Dashboard berdasarkan Role
- Styling Manual menggunakan CSS
- Environment Development menggunakan Docker

---

## 🛠️ Teknologi yang Digunakan

- **Backend** : PHP Native
- **Database** : MySQL
- **Web Server** : Apache
- **Containerization** : Docker & Docker Compose
- **Frontend** : HTML, CSS
- **Database Manager** : phpMyAdmin
- **Version Control** : Git & GitHub

---

## 📂 Struktur Folder

restaurant-system/
├── docker/
│ └── php/
│ └── Dockerfile
├── src/
│ ├── assets/
│ │ ├── css/
│ │ └── images/
│ ├── auth/
│ ├── config/
│ ├── dashboard/
│ ├── landing/
│ ├── modules/
│ └── uploads/
├── .gitignore
├── docker-compose.yml
├── README.md
└── .env.example

---

## ⚙️ Cara Menjalankan Aplikasi (Local Development)

### 1️⃣ Clone Repository
```bash
git clone https://github.com/novalis255/restaurant-web-app.git
cd restaurant-web-app

---

2️⃣ Buat File Environment

Salin file .env.example menjadi .env

cp .env.example .env
Isi konfigurasi database sesuai kebutuhan.

---

3️⃣ Jalankan Docker
docker compose up -d

Akun Login Default
Role	Username	Password
Admin	admin	admin123
Kasir	kasir	kasir123
Pelayan	pelayan	pelayan123

⚠️ Catatan:
Password sebaiknya diganti jika digunakan di lingkungan production.

---

🔒 Keamanan
- File .env tidak disertakan di repository
- Hak akses halaman dibatasi berdasarkan role
- Upload file dibatasi hanya untuk gambar

---

📈 Status Project
- BETA / Development
- Project ini dikembangkan untuk:
- Tugas kuliah
- Pembelajaran PHP Native & Docker
- Portfolio pribadi

--- 

👤 Author

Novalis Ramadhan Syah
Github: https://github.com/novalis255