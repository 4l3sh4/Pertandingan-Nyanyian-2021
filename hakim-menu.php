<?php 
# Memulakan fail session.
session_start();

# Memanggil fail header.php dan guard-hakim.php
include('header.php');
include('guard-hakim.php');
?>

<!-- Memaparkan nama hakim. -->
<center><p style="font-size: 20px; font-family:Century Gothic;">Selamat datang, <?= $_SESSION['nama'] ?>.</p></center>
<hr>
<!-- Memaparkan tugas-tugas sebagai hakim pertandingan. -->
<h3 style="background-color:#FFE5B4; border-radius:15px;">
<p style="font-size: 20px; font-family:Century Gothic;">➜ <u>Tugas Hakim</u></p>
<ol style="font-size: 16px; font-family:Century Gothic;">
    <li>Setiap hakim boleh mendaftar peserta baharu dengan memasukkan data peserta.</li>
    <li>Setiap hakim boleh menilai mana-mana peserta yang telah disenaraikan.</li>
    <li>Peserta terakhir akan dinilai dan diberikan markah pada hari terakhir pertandingan.</li><br>
    
</ol>
</h3>

<?php include ('footer.php'); ?>
