<?php 
# Memulakan fungsi session.
session_start();

# Memanggil fail header, guard-hakim, connection dan fungsi.
include('header.php');
include('guard-hakim.php');
include('connection.php');
include ('fungsi.php');
?>

<style>
select{
  font-size: 16px;
  font-family: Century Gothic;
  padding: 10px 4px 8px 14px;
  background: white;
  border: 2px solid black;
  border-radius: 6px;
}

input[type=submit]{
  background-color: white;
  border: black;
  border-style: solid;
  border-width: 2px;
  border-radius: 4px;
  color: black;
  font-size: 16px;
  font-family: Verdana;
  padding: 4px 10px;
  margin: 2px 2px;
  cursor: pointer;
}

input[type=text]{
  font-size: 20px;
  text-transform:uppercase;
}

</style>

<h3 style="font-family:Century Gothic; font-size:24px;"><center><u>Senarai Peserta</u></center></h3>

<!-- Memanggil fail butang-saiz bagi membolehkan pengguna mengubah saiz tulisan. -->
<?php include('butang-saiz.php'); ?>

<form action='' method='POST'>
    <p1 style='font-family:Century Gothic; font-weight:bold;'>Jantina:</p1> <select name='jantina_peserta'>
        <option value=''> Keseluruhan... </option>
        <!-- Memaparkan senarai jantina peserta dalam bentuk drop down list. -->
        <option value='L'>Lelaki</option>
        <option value='P'>Perempuan</option>
    </select> 
    <p1 style='font-family:Century Gothic; font-weight:bold;'>Tingkatan:</p1> <select name='tingkatan_peserta'>
        <option value=''> Keseluruhan... </option>
        <!-- Memaparkan senarai tingkatan peserta dalam bentuk drop down list. -->
        <option value='1'>1</option>
        <option value='2'>2</option>
		<option value='3'>3</option>
		<option value='4'>4</option>
		<option value='5'>5</option>
    </select> <br><br>
	<input type='submit' value='Papar'>
</form>

<!-- Header bagi jadual untuk memaparkan senarai peserta. -->
<table width='100%' border='1' id='saiz'> 
    <tr style='font-family:Century Gothic; font-weight:bold;'> 
        <td>Nama</td>
		<td>Jantina</td>
        <td>Kelas</td>
		<td>Pilihan Lagu</td>
		<td>Kualiti Vokal</td>
		<td>Intonasi</td>
		<td>Jumlah Markah</td>
    </tr>

<?php 

if(!empty($_POST['jantina_peserta']) and !empty($_POST['tingkatan_peserta']))
{
	$arahan_papar="Select* from peserta
	left join markah ON peserta.kod_peserta = markah.kod_peserta
    where peserta.jantina_peserta = '".$_POST['jantina_peserta']."' and peserta.tingkatan_peserta = '".$_POST['tingkatan_peserta']."'
	order by nama_peserta ASC";
}
elseif(!empty($_POST['jantina_peserta']) or !empty($_POST['tingkatan_peserta']))
{
	$arahan_papar="Select* from peserta
	left join markah ON peserta.kod_peserta = markah.kod_peserta
    where peserta.jantina_peserta = '".$_POST['jantina_peserta']."' or peserta.tingkatan_peserta = '".$_POST['tingkatan_peserta']."'
	order by nama_peserta ASC";
}
else
{
	$arahan_papar="Select* from peserta
    left join markah on peserta.kod_peserta = markah.kod_peserta
    order by peserta.nokp_peserta ASC;";
}

# Laksanakan arahan mencari data peserta.
$laksana = mysqli_query($condb,$arahan_papar);
# Mengambil data yang ditemui.
    while($m=mysqli_fetch_array($laksana)) 
    { 

        # Memaparkan senarai nama dalam jadual.
        echo"<tr style='font-family:Century Gothic;'> 
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