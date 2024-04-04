<?php
# Memulakan fungsi session.
session_start();

# Menyemak kewujudan data post yang dihantar dari peserta-login-borang.php
if(!empty($_POST[nokp]))
{
    # Jika data yang dihantar tidak empty.

    # Memanggil fail connection.php
    include ('connection.php');

    # Arahan(query) untuk membandingkan data yang dimasukkan.
    $query_login = "select * from peserta
    where 
            nokp_peserta = '".$_POST['nokp']."' ";

    # Melaksakan arahan membandingkan data.
    $laksana_query = mysqli_query($condb,$query_login);

    # Jika terdapat 1 data yang sepadan, login berjaya.
    if(mysqli_num_rows($laksana_query)==1)
    {
        # Mengambil data yang ditemui.
        $m  =   mysqli_fetch_array($laksana_query);

        # Mengumpukkan kepada pembolehubah session.
        $_SESSION['nama']   =   $m['nama_peserta'];
        $_SESSION['nokp']   =   $m['nokp_peserta'];
        $_SESSION['tahap']  =   "peserta";

        # Membuka laman peserta-menu.php
        echo "<script>window.location.href='peserta-menu.php';</script>";
    }
    else
    {
        # Log-in gagal. Kembali ke laman peserta-login-borang.php
        die("<script>alert('Sila masukkan nombor kad pengenalan anda dengan betul.');
        window.location.href='peserta-login-borang.php';</script>");
    }
}
else
{
    # Data yang dihantar dari laman peserta-login-borang.php kosong.
    die("<script>alert('Sila masukkan nombor kad pengenalan anda.');
    window.location.href='peserta-login-borang.php';</script>");
}

?>