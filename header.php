<!-- Tajuk sistem. Akan dipaparkan disebelah atas. -->

<style>

hr {
    border: 0;
    height: 1px;
    background: #333;
    background-image: linear-gradient(to right, #ccc, #333, #ccc);
}

a:link {
  color: black;
  background-color: transparent;
  text-decoration: none;
  font-family: Century Gothic;
}

a:visited {
  color: black;
  background-color: transparent;
  text-decoration: none;
}

a:hover {
  color: black;
  background-color: transparent;
  text-decoration: underline;
}

</style>

<body style="background-color:#D8BFD8;">
<h1 style="border:black; border-width:4px; border-style:double; border-radius: 15px; background-color:white; font-family:Century Gothic;"><center>PERTANDINGAN NYANYIAN 2021</center></h1>
<center><img src="logo_sekolah.gif" alt="Logo Sekolah" width="84" height="128"></center>
<br>
<hr>

<!-- Bahagian Menu Asas. 
     Menu terbahagi kepada 3 jenis iaitu
     1. Menu hakim dimana hakim dapat akses semua perkara
     2. Menu peserta dimana peserta hanya boleh memeriksa 
        keputusan pertandingan. peserta perlu login.
     3. Menu di laman utama - bagi pelawat yang tidak login
-->
<?PHP 

# Menu Hakim
if(!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "hakim")
{
    echo "
     <center><a href='hakim-menu.php'>Menu</a><br>
    <a href='senarai-hakim.php'>Senarai Hakim</a><br>
    <a href='senarai-peserta.php'>Senarai Peserta</a>
    | <a href='pendaftaran-peserta.php'>Mendaftar Peserta Baharu</a>
    | <a href='penilaian-peserta.php'>Penilaian Peserta</a><br>
    <a href='keputusan-keseluruhan.php'>Keputusan Keseluruhan</a>
    | <a href='keputusan-lelaki.php'>Keputusan bagi Lelaki</a>
	| <a href='keputusan-perempuan.php'>Keputusan bagi Perempuan</a><br>
    <a href='logout.php'>Log Keluar</a></center>
     <hr>";
}
# Menu Peserta
else if(!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "peserta")
{
    echo "
    | <a href='peserta-menu.php'>Menu Peserta</a>
    | <a href='logout.php'>Logout</a>
    | <hr> ";

} else {

    # Menu Laman Utama
    echo "<center><a href='index.php'>Laman Utama</a></center><hr><br>";
}
?>