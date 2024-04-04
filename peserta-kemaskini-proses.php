<?php
# Memulakan fungsi session.
session_start();

# Memanggil fail guard-hakim.php
include('guard-hakim.php');

# Menyemak kewujudan data POST.
if(!empty($_POST))
{
    # Memanggil fail connection.php
    include('connection.php');

    # Pengesahan data (validation) nokp peserta.
    if(strlen($_POST['nokp_peserta']) != 12 or !is_numeric($_POST['nokp_peserta']))
    {
        die("<script>alert('Ralat pada no. kad pengenalan.');
        window.history.back();</script>");
    }

    # Arahan(query) untuk kemaskini maklumat peserta.
    $arahan     =   "update peserta set
	nama_peserta            =   '".strtoupper($_POST['nama_peserta'])."',
    jantina_peserta         =   '".$_POST['jantina']."',
	tingkatan_peserta       =   '".$_POST['tingkatan']."',
	kelas_peserta           =   '".$_POST['kelas']."',
	nokp_peserta            =   '".$_POST['nokp_peserta']."'
    where       
    nokp_peserta            =   '".$_GET['nokp_lama']."' ";

    # Melaksana dan menyemak proses kemaskini.
    if(mysqli_query($condb,$arahan))
    {
        # Kemaskini berjaya.
        echo "<script>alert('Kemas kini telah berjaya.');
        window.location.href='senarai-peserta.php';</script>";
    }
    else
    {
        # Kemaskini gagal.
        echo "<script>alert('Kemas kini gagal. Sila cuba lagi.');
        window.history.back();</script>";
    }
}
else
{
    # Data POST empty.
    die("<script>alert('Sila lengkapkan data.');
    window.location.href='senarai-hakim.php';</script>");
}
?>