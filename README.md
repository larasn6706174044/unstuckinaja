# unstuckinaja
Sebuah platform tanya jawab pemrograman untuk unstuckin stuck kamu.

# workflow daftar
- pastikan input tidak boleh kosong
- ambil dan filter input
- jika nim tidak terdaftar, tampilkan error
- jika username telah dipakai tampilkan error
- jika oke, simpan

# workflow login
- validasi, filter, dan enkripsi input
- logic username atau password salah
- logic username dan password oke
- logic session untuk ke profile

# workflow menampilkan tag pada input stuck
- select semua kategori
- tampilkan id nya ke select option 

# workflow input stuck
- ambil dan filter input data
- generated stuck id menggunakan md5 nim dan date time
- simpan data
- reload ke profile atau index

# workflow reload history
- select semua stuck yang memiliki nim bersangkutan
- tampilkan ke history

# workflow menampilkan data berdasarkan recent
- select 10 stuck dan sort berdasarkan tanggal
- tampilkan ke section recent

# workflow lihat detail
- select stuck dengan id tersebut
- tampilkan detail stuck
- jika login tampilkan button edit dan delete
- tampilkan button tersebut jika stuck tersebut cocok dengan nim tersebut
- yang bisa mengedit atau menghapus hanya yang memiliki stuck tersebut
- setiap kali load, maka view akan bertambah
- jika delete, konfirmasi terlebih dahulu
- selesai delete kembali ke halaman profile

# workflow hapus stuck
- konfirmasi terlebih dahulu
- pastikan req auth.php
- hapus stuck
- redirect ke profile


# workflow load emblem
- logic user emblem pertama
- jika belum, maka masuk ke tahap berikutnya
- jangkauan user poin untuk mendapatkan emblem

# workflow load emblems
- jika userEmblem dengan nim bersangkutan ada, maka load

# workflow menampilkan top stuck
- menampilkan stuck top 10
- kriteria nya :
  - votes
  - answer
  - views

