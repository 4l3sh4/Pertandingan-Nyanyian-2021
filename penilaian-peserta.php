<?php 
# Memulakan fungsi session.
session_start();

# Memanggil fail header, guard-hakim dan connection.
include('header.php');
include('guard-hakim.php');
include('connection.php');
?>

<style> 
input[type=submit]{
  background-color: white;
  border: gray;
  border-style: solid;
  border-width: 2px;
  border-radius: 10% / 50%;
  color: black;
  font-size: 16px;
  font-family: Verdana;
  padding: 8px 16px;
  margin: 2px 2px;
  cursor: pointer;
}
</style>

<!-- Tajuk Laman -->
<h3 style="font-family:Century Gothic; font-size:24px;"><center><u>Penilaian Peserta</u></center></h3>

<?php include('butang-saiz.php'); ?>

<!-- Header jadual bagi memaparkan senarai peserta -->
<table width='100%' border='1' id='saiz'> 
    <tr style="font-family:Century Gothic; font-weight:bold; text-align:center;"> 
        <td>Nama</td> 
        <td>Nombor Kad Pengenalan</td> 
        <td>Tingkatan</td>
        <td>Kelas</td>  
		<td>Markah</td>
		<td>Pemarkahan</td>
    </tr> 

<?php

# arahan query untuk mencari senarai nama peserta 
$arahan_papar="SELECT* FROM peserta
LEFT JOIN markah
ON peserta.kod_peserta = markah.kod_peserta
order by nama_peserta ASC";

# laksanakan arahan mencari data peserta 
$laksana = mysqli_query($condb,$arahan_papar);

# Mengambil data yang ditemui 
    while($m=mysqli_fetch_array($laksana)) 
    { 

        #umpukkan data kepada tatasusunan bagi tujuan kemaskini peserta
        $data_get=array(
			'nama_peserta'      => $m['nama_peserta'],
			'jantina_peserta'   => $m['jantina_peserta'],
			'nokp_peserta'      => $m['nokp_peserta'],
			'kod_peserta'       => $m['kod_peserta'],
			'tingkatan_peserta' => $m['tingkatan_peserta'],
			'kelas_peserta'     => $m['kelas_peserta'],
	    );
		
        # memaparkan senarai nama dalam jadual 
        echo"<tr style='font-family:Century Gothic; text-align:center; font-size:18px;'> 
        <td>".$m['nama_peserta']."</td>
        <td>".$m['nokp_peserta']."</td> 
        <td>".$m['tingkatan_peserta']."</td> 
        <td>".$m['kelas_peserta']."</td>
        <td>".$m['jumlah_markah']."</td>
        <td></center>

        <form action='penilaian-proses.php' method='POST'>
            <input type='hidden' value='".$m['kod_peserta']."' name='kod_peserta'>
			<center><br>Pilihan Lagu<br>
			<input type='number' name='pilihan_lagu' max='10' min='0' required><br><br>
			Kualiti Vokal<br>
			<input type='number' name='kualiti_vokal' max='10' min='0' required><br><br>
			Intonasi<br>
			<input type='number' name='intonasi' max='10' min='0' required><br><br>
	        <a href='peserta-kemaskini.php?".http_build_query($data_get)."'>⚙️</a><input type='submit' value='Ubah Markah'><a href='peserta-padam-proses.php?kod_peserta=".$m['kod_peserta']."' onClick=\"return confirm('Anda pasti anda ingin memadam peserta ini?')\">🗑️</a>
        </form>
        </td></tr>"; 
    }
?> 
</table>
<?php include ('footer.php'); ?>