<?php 
# Memulakan fungsi session.
session_start();

# Memanggil fail header, guard-hakim dan connection.
include('header.php');
include('guard-hakim.php');
include('connection.php');
?>

<h3 style="font-family:Century Gothic; font-size:24px;"><center><u>Senarai Hakim</u></center></h3>

<!-- Navigasi untuk mendaftar hakim baru -->
<a href='hakim-daftar-borang.php' style='font-size:20px;'><b>[+] Daftar Hakim Baharu</b></a>

<!-- Memanggil fail butang-saiz -->
<?php include('butang-saiz.php'); ?> 
<!-- Header bagi jadual untuk memaparkan senarai peserta -->

<table width='100%' border='1' id='saiz'> 
    <tr style="font-family:Century Gothic; font-weight:bold;"> 
        <td>Nama</td> 
        <td>Nombor Kad Pengenalan</td> 
        <td>Nombor Telefon</td> 
    </tr> 

<?php 
# Arahan query untuk mencari senarai nama hakim.
$arahan_papar="Select* from hakim"; 

# Laksanakan arahan mencari data hakim.
$laksana = mysqli_query($condb,$arahan_papar); 

# Mengambil data yang ditemui.
    while($data=mysqli_fetch_array($laksana)) 
    { 
        # Memaparkan senarai nama dalam jadual.
        echo"<tr style='font-family:Century Gothic;'> 
        <td>".$data['nama_hakim']."</td> 
        <td>".$data['nokp_hakim']."</td> 
        <td>".$data['notelefon_hakim']."</td> 
        </tr>"; 
    }

?> 
</table>
<?php include ('footer.php'); ?>