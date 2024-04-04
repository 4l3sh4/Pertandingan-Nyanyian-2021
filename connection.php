<?php
# Nama host. localhost merupakan default.
$nama_host  =   "localhost";

# Usename bagi SQL. root merupakan default.
$nama_sql   =   "root";

# Password bagi SQL. masukkan password anda.
$pass_sql   =   "";

# Nama pangkalan data yang anda telah bangunkan sebelum ini.
$nama_db    =   "pertandingan_nyanyian_2021";

# Membuka hubungan antara pangkalan data dan sistem.
$condb      =   mysqli_connect($nama_host, $nama_sql, $pass_sql, $nama_db);

# Menguji adakah hubungan berjaya dibuka.
if (!$condb) 
{
    die("Sambungan ke pangkalan data gagal.");
}
else
{
    # Echo "Sambungan ke pangkalan data berjaya.";
}
?>