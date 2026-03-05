# Evaluasi 1: Sistem Web Sederhana (Multi-Page App)

Proyek ini adalah pengembangan struktur aplikasi web menjadi *multi-page* yang saling terhubung melalui navigasi *sidebar*. Terdiri dari 3 halaman interaktif utama: **Home**, **Menu (Kasir)**, dan **Calculator**, yang didesain secara seragam menggunakan satu file CSS eksternal.

## Struktur Direktori
EVALUASI1/
├── asset/
│   ├── itenas_cover.jpeg
│   └── logoitenas.jpeg
├── style.css
├── index.html       (Halaman Home)
├── menu.html        (Halaman Menu/Kasir)
└── calculator.html  (Halaman Kalkulator)

## Konsep Layouting (CSS)
CSS Grid: Digunakan pada area header untuk menyusun 6 gambar (tiled) secara presisi dalam format matriks 3 kolom x 2 baris tanpa adanya celah (gap).

Flexbox: Diterapkan pada wadah utama konten (.content-wrapper) untuk membagi area layar menjadi sidebar (20%) dan main content (80%) secara sejajar dan responsif.

External Stylesheet: Seluruh aturan visual dan UI components (tombol, tabel, form) dipusatkan pada file style.css untuk menjaga konsistensi tampilan di ketiga halaman HTML.

## Fitur Teknis per Halaman

1.index.html (Home)

Halaman awal statis yang mendemonstrasikan pemanggilan fungsi dasar JavaScript. Menggunakan event listener onclick pada sebuah tombol ("Shout") untuk menampilkan pop-up dialog alert() berisi ucapan selamat datang.

2.menu.html (Sistem Kasir)

Lifecycle Event (window.onload): Memicu instruksi penggunaan via alert() secara otomatis sesaat setelah elemen DOM selesai dirender oleh browser.

Real-time Calculation (oninput): Menggunakan event handler pada elemen <input type="number">. Setiap kali user mengetik atau mengubah jumlah (quantity) pesanan, fungsi hitungTotal() akan langsung dieksekusi secara sinkron tanpa memerlukan tombol submit.

Conditional Logic: Menerapkan blok if (total > 50000) untuk memberikan potongan diskon sebesar 10% secara dinamis pada variabel perhitungan akhir (Jumlah Bayar).

3.calculator.html (Kalkulator Sederhana)

Error Handling & Form Validation: Memiliki fungsi validasi untuk mencegah kalkulasi kosong. Jika input dibiarkan kosong ("") atau bernilai kurang dari sama dengan 0, eksekusi kode akan dihentikan paksa dengan perintah return dan akan memunculkan error via alert().

Operasi Aritmatika Dinamis: Membaca value operator matematika dari elemen dropdown (<select>) dan mengeksekusi perhitungan menggunakan blok switch...case.

Objek Math Built-in: Memanfaatkan method Math.pow(num1, num2) untuk menangani operasi bilangan berpangkat (^).