<?php
# Menyemak nilai pembolehubah session['tahap'].
if($_SESSION['tahap'] != "peserta")
{
    # Jika nilainya tidak sama dengan peserta. aturcara akan dihentikan.
    die("<script>alert('Sila log masuk.'); 
    window.location.href='logout.php';</script>");
}
?>