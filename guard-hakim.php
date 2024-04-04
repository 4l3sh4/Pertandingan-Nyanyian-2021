<?php
# Menyemak nilai pembolehubah session['tahap'].
if($_SESSION['tahap'] != "hakim")
{
     # Jika nilainya tidak sama dengan hakim, aturcara akan dihentikan.
    die("<script>alert('Sila log masuk.'); window.location.href='logout.php';</script>");
}

?>