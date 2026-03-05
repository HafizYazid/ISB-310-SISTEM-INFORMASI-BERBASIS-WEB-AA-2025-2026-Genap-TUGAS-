# Tugas Week 4: Program Garis Hidup Tanggal Lahir

Aplikasi berbasis web *single-page* yang berfungsi untuk menghitung "Garis Hidup" (Life Path Number) seseorang berdasarkan input tanggal lahir. Program ini kemudian akan menampilkan deskripsi karakter dan kepribadian berdasarkan hasil perhitungan matematika tersebut.

## Detail Teknis & Fitur

* **Manipulasi DOM Dinamis (JavaScript)**
  Menggunakan fungsi `window.onload` untuk men-generate opsi angka pada elemen dropdown (`<select>`) secara otomatis saat halaman dimuat (Tanggal 1-31 dan Tahun 1950-2024). Pendekatan ini menghemat penulisan tag `<option>` HTML berulang secara manual.

* **Logika Perulangan & Manipulasi String**
  * Input dari user (tanggal, bulan, tahun) digabungkan menjadi satu buah string utuh.
  * Menggunakan perulangan `while` dan `for` untuk memecah string tersebut dan menjumlahkan setiap digit angkanya secara berulang.
  * Perulangan akan terus berjalan dinamis selama panjang karakter hasil penjumlahan masih lebih dari 1 digit (belum menjadi angka satuan 1-9).

* **Penyimpanan *State* (Array)**
  Menggunakan struktur data *Array* (`steps[]`) untuk merekam setiap tahap penjumlahan. Hal ini memungkinkan sistem untuk mendistribusikan hasil *step-by-step* secara presisi ke dalam form keluaran (Hasil 1, Hasil 2, Hasil Akhir). Jika proses hanya memakan 2 langkah, program secara otomatis akan menyesuaikan letak outputnya.

* **Pengkondisian (Switch-Case)**
  Hasil akhir yang bernilai 1 hingga 9 dievaluasi menggunakan statemen `switch...case` untuk me-render teks deskripsi kepribadian spesifik ke dalam DOM.