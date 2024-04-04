<?php 
# Memulakan fungsi SESSION.
session_start();

# Memanggil fail header.php dan fail fungsi.php
include('header.php'); 
include ('fungsi.php');

?>

<!-- Memaparkan pautan (hyperlink). -->
<center>| <a href='hakim-login-borang.php'><b>Log Masuk</b></a> | </center>
<br>

<!-- Memaparkan syarat-syarat pertandingan. -->

<hr>
<h3 style="background-image: linear-gradient(to right, #e7968b, #FFE5B4, #e7968b); border-radius:15px;">
<br>
<p style="font-family:Century Gothic; font-weight: bold; margin:5px 1px;"><u>Syarat Pertandingan</u></p>
<li style="font-family:Century Gothic;">Seorang peserta hanya boleh menghantar 1 penyertaan sahaja.</li>
<li style="font-family:Century Gothic;">Peserta perlu naik video pendek sendiri ke YouTube, dan hantar link video tersebut kepada seorang hakim semasa pendaftaran.</li><br>
<p style="font-family:Century Gothic; font-weight: bold; margin:5px 1px;"><u>Informasi</u></p>
<li style="font-family:Century Gothic;">Terdapat 3 kategori pertandingan ini, iaitu kategori keseluruhan, kategori lelaki dan kategori perempuan.</li>
<li style="font-family:Century Gothic;">Bagi kategori keseluruhan, pemenang ke-1 hingga ke-5 akan mendapat satu medal serta sijil penghargaan.</li>
<li style="font-family:Century Gothic;">Bagi kategori lelaki dan kategori perempuan, pemenang ke-1 hingga ke-3 akan mendapat sijil penghargaan.</li>
<li style="font-family:Century Gothic;">Setiap peserta akan mendapat sijil penyertaan.</li>
<li style="font-family:Century Gothic;">Keputusan hanya akan dipaparkan setelah semua peserta telah dinilai.</li>
<br>
</h3>
<hr>
<!-- Memaparkan Keputusan Keseluruhan -->
<p style="font-family:Century Gothic; font-weight: bold; margin:5px 1px;"><u>Keputusan <i>Keseluruhan</i></u></p>
<?PHP
# Memanggil fungsi semak() dari fail fungsi.php
$k=semak();

# Semakan nilai yang dipulangkan.
if($k=="<p1 style='font-family:Century Gothic;'>Semua peserta telah dinilai.</p1>")
{
    # Jika nilai dipulangkan 'Semua peserta telah dinilai'.
    # Panggil fungsi keputusan individu dari fail fungsi.
    # Dan papar keputusan 5 individu terbaik keseluruhan.
    keputusan_keseluruhan();
}
else
{
    # Paparan jika proses penilaian masih belum tamat.
    echo "<br><p1 style='font-family:Century Gothic;'>Proses penilaian masih dibuat.</p1>";
}

?>
<hr>
<!-- Memaparkan Keputusan Lelaki -->
<p style="font-family:Century Gothic; font-weight: bold; margin:5px 1px;"><u>Keputusan <i>Kategori Lelaki</i></u></p>
<?PHP
# Memanggil fungsi semak() dari fail fungsi.php
$k=semak();
if($k=="<p1 style='font-family:Century Gothic;'>Semua peserta telah dinilai.</p1>")
{
    # Jika nilai dipulangkan 'Semua peserta telah dinilai'.
    # Panggi fungsi keputusan sekolah dari fail fungsi.
    # Dan paparkan keputusan bagi lelaki.
    keputusan_lelaki();
}
else
{
    # Paparan jika proses penilaian masih belum tamat.
    echo "<br><p1 style='font-family:Century Gothic;'>Proses penilaian masih dibuat.</p1>";
}
?>
<hr>
<!-- Memaparkan Keputusan Perempuan -->
<p style="font-family:Century Gothic; font-weight: bold; margin:5px 1px;"><u>Keputusan <i>Kategori Perempuan</i></u></p>
<?PHP
# Memanggil fungsi semak() dari fail fungsi.php
$k=semak();
if($k=="<p1 style='font-family:Century Gothic;'>Semua peserta telah dinilai.</p1>")
{
    # Jika nilai dipulangkan 'Semua peserta telah dinilai'.
    # Panggil fungsi keputusan sekolah dari fail fungsi.
    # Dan paparkan keputusan bagi kategori perempuan.
    keputusan_perempuan();
}
else
{
    # Paparan jika proses penilaian masih belum tamat.
    echo "<br><p1 style='font-family:Century Gothic;'>Proses penilaian masih dibuat.</p1>";
}
?>
<?php include ('footer.php'); ?>