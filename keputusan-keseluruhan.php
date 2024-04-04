<?php 
# Memulakan fungsi session.
session_start();

# Memanggil fail header, guard-hakim, connection dan fungsi.
include('header.php');
include('guard-hakim.php');
include('connection.php');
include ('fungsi.php');
?>
<h3 style="font-family:Century Gothic; font-size:24px;"><center><u>Keputusan</u><br><i>Keseluruhan</i></center></h3>

<!-- Memanggil fail butang-saiz -->
<?php include('butang-saiz.php'); ?>

<!-- Header jadual keputusan -->
<table width='100%' border='1' id='saiz'> 
    <caption><?= $k=semak(); ?></caption>
    <tr style='font-family:Century Gothic; font-weight:bold;'>
	    <td>Tempat</td>
        <td>Nama</td>
		<td>Jantina</td>
        <td>Kelas</td>
		<td>Pilihan Lagu</td>
		<td>Kualiti Vokal</td>
		<td>Intonasi</td>
		<td>Jumlah Markah</td>
    </tr> 

<?php 
# Arahan query untuk mencari senarai nama peserta.
$arahan_papar="SELECT* FROM peserta
LEFT JOIN markah
ON peserta.kod_peserta = markah.kod_peserta
LEFT JOIN hakim
ON peserta.nokp_hakim = hakim.nokp_hakim
order by markah.jumlah_markah DESC
"; 

# Laksanakan arahan mencari data peserta.
$laksana = mysqli_query($condb,$arahan_papar); 
$bil=0;
# Mengambil data yang ditemui.
    while($m=mysqli_fetch_array($laksana)) 
    { 
        # Memaparkan senarai nama dalam jadual.
        echo"<tr style='font-family:Century Gothic;'> 
        <td>".++$bil."</td>
        <td>".$m['nama_peserta']."</td>
		<td>".$m['jantina_peserta']."</td>
		<td>".$m['tingkatan_peserta']." ".$m['kelas_peserta']."</td>
		<td><center>".$m['pilihan_lagu']."</center></td>
		<td><center>".$m['kualiti_vokal']."</center></td>
		<td><center>".$m['intonasi']."</center></td>
		<td><center><b>".$m['jumlah_markah']."</b></center></td>
		</tr>";
    }

?> 
</table>
<?php include ('footer.php'); ?>