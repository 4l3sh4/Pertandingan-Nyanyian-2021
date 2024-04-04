<?php
# Memulakan fungsi session.
session_start();

# Memanggil fail guard-hakim.php
include('guard-hakim.php');

# Menyemak kewujudan data GET nokp peserta.
if(!empty($_GET))
{
    # Memanggil fail connection.
    include('connection.php');

    # Arahan untuk memadam data peserta berdasarkan kod peserta yang dihantar.
    $arahan_1     =   "delete from peserta where kod_peserta='".$_GET['kod_peserta']."'";
	$arahan_2     =   "delete from markah where kod_peserta='".$_GET['kod_peserta']."'";

    # Melaksanakan arahan dan menguji proses padam rekod.
    if(mysqli_query($condb,$arahan_1) and mysqli_query($condb,$arahan_2))
    {
        # Jika data berjaya dipadam.
        echo "<script>alert('Padam data peserta berjaya.');
        window.location.href='senarai-peserta.php';</script>";
    }
    else
    {
        # Jika data gagal dipadam.
        echo "<script>alert('Padam data peserta gagal.');
        window.history.back();</script>";
    }
}
else
{
    # Jika data GET tidak wujud (empty).
    die("<script>alert('Ralat! Akses secara terus.');
    window.location.href='senarai-peserta.php';</script>");
}
?>