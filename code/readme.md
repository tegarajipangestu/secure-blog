# Simple Blog

Tugas 1 IF3110.

![Simple Blog](http://i655.photobucket.com/albums/uu275/sonnylazuardi/ss-5.jpg)

## Deskripsi

Gunakan template ini untuk membuat sebuah blog sederhana dengan menggunakan bahasa pemrograman PHP.

## Spesifikasi

### List Post

List Post merupakan halaman awal blog yang berisi daftar post yang sudah pernah dibuat. Setiap item pada list post mengandung `Judul`, `Tanggal`, `Konten`. Terdapat juga menu untuk mengedit dan menghapus item post tersebut.

### Add Post

Add Post merupakan halaman untuk menambahkan post baru.  Post baru memiliki form untuk mengisi `Judul`, `Tanggal`, dan `Konten`. Lakukan **validasi** untuk tanggal dengan javascript agar tanggal yang dimasukkan lebih besar atau sama dengan tanggal saat menambahkan post baru tersebut.

### Edit Post

Mengedit post yang sudah pernah dibuat. Form yang ditampilkan sama seperti saat menambahkan form baru.

### Delete Post

Menghapus post yang sudah pernah dibuat. Lakukan **konfimasi** dengan javascript untuk konfirmasi pengguna terhadap penghapusan post tersebut. Keluarkan konfirmasi berisi pesan berikut

    Apakah Anda yakin menghapus post ini?

Jika pengguna memilih `yes` maka post terhapus, jika tidak maka post tidak jadi dihapus.

### View Post

Halaman View Post merupakan halaman untuk melihat suatu post. Pada halaman ini terdapat informasi `Judul`, `Tanggal`, dan `Konten`, serta **Komentar** (spesifikasi di bawah).

### Komentar

Komentar berisi daftar komentar yang ditulis untuk post tertentu. Form komentar terdiri dari `Nama`, `Email`, dan `Komentar`, simpan juga tanggal dibuatnya komentar tersebut. Setiap item pada list komentar berisi `Nama`, `Tanggal`, `Komentar`.

Lakukan **validasi** email pada form komentar dengan menggunakan javascript. Komentar dibuat dengan menggunakan AJAX. Pemanggilan AJAX dilakukan saat

- Load list komentar
- Menambahkan komentar baru

## Tools

Pembuatan blog ini tidak boleh menggunakan framework PHP dan javascript.

## Deliverable

Masing-masing orang lakukan Fork pada repo ini. Jika sudah selesai tambahkan pull request ke repo ini.

## Lisensi

&copy; 2014 Asisten IF3110

Yogi | [Sonny](http://github.com/sonnylazuardi) | Fathan | Renusa | Kelvin | Yanuar

Dosen: [Yudistira Dwi Wardhana](http://github.com/yudis)