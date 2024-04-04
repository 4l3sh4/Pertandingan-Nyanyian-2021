<?php
# Memulakan fungsi session.
session_start();

# Menyemak kewujudan data post yang dihantar dari peserta-login-borang.php
if(!empty($_POST['nokp']))
{
    # Jika data yang dihantar tidak empty.

    # Memanggil fail connection.php
    include ('connection.php');

    # Arahan(query) untuk membandingkan data yang dimasukkan.
    $query_login = "select * from hakim
    where 
            nokp_hakim = '".$_POST['nokp']."' ";
    
    # Melaksanakan arahan membandingkan data.
    $laksana_query = mysqli_query($condb,$query_login);

    # Jika terdapat 1 data yang sepadan, login berjaya.
    if(mysqli_num_rows($laksana_query)==1)
    {
        # Mengambil data yang ditemui.
        $m  =   mysqli_fetch_array($laksana_query);

        # Mengumpukkan kepada pembolehubah session.
        $_SESSION['nama']=$m['nama_hakim'];
        $_SESSION['nokp']=$m['nokp_hakim'];
        $_SESSION['tahap']="hakim";

         # Membuka laman hakim-menu.php
        echo "<script> window.location.href='hakim-menu.php'; </script>";
    }
    else
    {
        # Login gagal. Kembali ke laman hakim-login-borang.php
        die("<script>alert('Sila masukkan nombor kad pengenalan anda dengan betul.');
        window.location.href='hakim-login-borang.php';</script>");
    }

}
else
{
    # Data yang dihantar dari laman hakim-login-borang.php kosong
    die("<script>alert('Sila masukkan nombor kad pengenalan anda.');
    window.location.href='hakim-login-borang.php';</script>");
}

?>