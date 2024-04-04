<?php
# Memulakan fungsi session.
session_start();
# Memanggil fail guard-hakim.
include('guard-hakim.php');

# Menyemak kewujudan data POST.
if(!empty($_POST))
{
    # Memanggil fail connection.
    include('connection.php');

    # Pengesahan data nokp & had atas / bawah.
    if(strlen($_POST['nokp']) != 12 or strlen($_POST['notelefon']) != 10)
    {
        die("<script>alert('Sila masukkan nombor kad pengenalan atau nombor telefon hakim dengan betul.');
        window.location.href='hakim-daftar-borang.php';</script>");
    }

    # Arahan untuk menyimpan data hakim baru ke dalam jadual hakim.
    $arahan     =   "insert into hakim
    (nama_hakim,jantina_hakim,nokp_hakim,notelefon_hakim)
    values
    ('".strtoupper($_POST['nama'])."','".$_POST['jantina']."','".$_POST['nokp']."','".$_POST['notelefon']."')";

    # Melaksanakan arahan simpan dan menguji proses menyimpan data.
    if(mysqli_query($condb,$arahan))
    {
        # Jika data berjaya disimpan. papar popup berjaya.
        echo "<script>alert('Hakim baharu berjaya didaftarkan.');
        window.location.href='senarai-hakim.php';</script>";
    }
    else
    {
        # Jika data gagal disimpan, papar popup gagal.
        echo "<script>alert('Hakim baharu gagal didaftarkan. Sila cuba lagi.');
        window.location.href='hakim-daftar-borang.php';</script>";
    }

}
else
{
    # Jika data POST empty.
    die("<script>alert('sila lengkapkan data');
    window.location.href='hakim-daftar-borang.php';</script>");
}

?>