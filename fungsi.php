<?PHP 
# Fungi untuk menyemak keputusan pertandingan.
function semak(){
    include('connection.php');
    $arahan = "Select* from markah where jumlah_markah is null";
    $laksana=mysqli_query($condb,$arahan);
    $bil_tidak_nilai = mysqli_num_rows($laksana);
    if($bil_tidak_nilai>0)
    {
        $umum =  "<p1 style='font-family:Century Gothic;'>Penilaian peserta belum selesai.<br>
        Keputusan rasmi belum dikeluarkan lagi.</p1>";
    }
    else
    {
         $umum = "<p1 style='font-family:Century Gothic;'>Semua peserta telah dinilai.</p1>";
    }
    return $umum;
}

# Fungsi untuk memaparkan keputusan individu.
function keputusan_keseluruhan()
{
    include('connection.php');
    echo" <table width='100%' border='1'>   
        <tr style='font-family:Century Gothic; font-weight:bold; background-color:#a79bcf;'>
	      <td>Tempat</td>
          <td>Nama</td>
          <td>Kelas</td>
		  <td>Pilihan Lagu</td>
		  <td>Kualiti Vokal</td>
		  <td>Intonasi</td>
		  <td>Jumlah Markah</td>
        </tr>  ";

$arahan_papar="SELECT* FROM peserta
LEFT JOIN markah
ON peserta.kod_peserta = markah.kod_peserta
LEFT JOIN hakim
ON peserta.nokp_hakim = hakim.nokp_hakim
order by markah.jumlah_markah DESC limit 5 "; 

$laksana = mysqli_query($condb,$arahan_papar); 
$bil=0;
while($m=mysqli_fetch_array($laksana)) 
{ 
    echo"<tr style='font-family:Century Gothic; background-color:white;'> 
    <td><center>".++$bil."</center></td>
    <td>".$m['nama_peserta']."</td>
	<td>".$m['tingkatan_peserta']." ".$m['kelas_peserta']."</td>
	<td><center>".$m['pilihan_lagu']."</center></td>
	<td><center>".$m['kualiti_vokal']."</center></td>
	<td><center>".$m['intonasi']."</center></td>
	<td><center><b>".$m['jumlah_markah']."</b></center></td>
	</tr>"; 
}
echo "</table>";
}

function keputusan_lelaki()
{
    include('connection.php');
    echo" <table width='100%' border='1'>   
        <tr style='font-family:Century Gothic; font-weight:bold; background-color:#a79bcf;'>
	      <td>Tempat</td>
          <td>Nama</td>
          <td>Kelas</td>
		  <td>Pilihan Lagu</td>
		  <td>Kualiti Vokal</td>
		  <td>Intonasi</td>
		  <td>Jumlah Markah</td>
        </tr>  ";

$arahan_papar="SELECT* FROM peserta
LEFT JOIN markah
ON peserta.kod_peserta = markah.kod_peserta
LEFT JOIN hakim
ON peserta.nokp_hakim = hakim.nokp_hakim
WHERE peserta.jantina_peserta ='L'
order by markah.jumlah_markah DESC limit 3 "; 

$laksana = mysqli_query($condb,$arahan_papar); 
$bil=0;
while($m=mysqli_fetch_array($laksana)) 
{ 
    echo"<tr style='font-family:Century Gothic; background-color:white;'> 
    <td><center>".++$bil."</center></td>
    <td>".$m['nama_peserta']."</td>
	<td>".$m['tingkatan_peserta']." ".$m['kelas_peserta']."</td>
	<td><center>".$m['pilihan_lagu']."</center></td>
	<td><center>".$m['kualiti_vokal']."</center></td>
	<td><center>".$m['intonasi']."</center></td>
	<td><center><b>".$m['jumlah_markah']."</b></center></td>
	</tr>"; 
}
echo "</table>";
}

function keputusan_perempuan()
{
    include('connection.php');
    echo" <table width='100%' border='1'>   
        <tr style='font-family:Century Gothic; font-weight:bold; background-color:#a79bcf;'>
	      <td>Tempat</td>
          <td>Nama</td>
          <td>Kelas</td>
		  <td>Pilihan Lagu</td>
		  <td>Kualiti Vokal</td>
		  <td>Intonasi</td>
		  <td>Jumlah Markah</td>
        </tr>  ";

$arahan_papar="SELECT* FROM peserta
LEFT JOIN markah
ON peserta.kod_peserta = markah.kod_peserta
LEFT JOIN hakim
ON peserta.nokp_hakim = hakim.nokp_hakim
WHERE peserta.jantina_peserta ='P'
order by markah.jumlah_markah DESC limit 3 "; 

$laksana = mysqli_query($condb,$arahan_papar); 
$bil=0;
while($m=mysqli_fetch_array($laksana)) 
{ 
    echo"<tr style='font-family:Century Gothic; background-color:white;'> 
    <td><center>".++$bil."</center></td>
    <td>".$m['nama_peserta']."</td>
	<td>".$m['tingkatan_peserta']." ".$m['kelas_peserta']."</td>
	<td><center>".$m['pilihan_lagu']."</center></td>
	<td><center>".$m['kualiti_vokal']."</center></td>
	<td><center>".$m['intonasi']."</center></td>
	<td><center><b>".$m['jumlah_markah']."</b></center></td>
	</tr>"; 
}
echo "</table>";
}

?>