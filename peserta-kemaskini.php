<?php 
# Memulakan fungsi session.
session_start();

# Memanggil fail header, guard-hakim dan fungsi.
include('header.php');
include('guard-hakim.php');
include('fungsi.php');

# Menyemak kewujudan data GET. Jika data GET empty, buka fail senarai-peserta.
if(empty($_GET)) { die("<script>window.location.href='penilaian-peserta.php';</script>"); }
?>
<style> 
input[type=submit]{
  background-color: white;
  border: gray;
  border-style: solid;
  border-width: 2px;
  border-radius: 10% / 50%;
  color: black;
  font-size: 20px;
  font-family: Verdana;
  padding: 8px 30px;
  margin: 2px 2px;
  cursor: pointer;
}

button[type=submit]{
  background-color: white;
  border: gray;
  border-style: solid;
  border-width: 2px;
  border-radius: 10% / 50%;
  color: black;
  font-size: 15px;
  font-family: Verdana;
  padding: 4px 20px;
  margin: 2px 2px;
  cursor: pointer;
}

input[type=text]{
  font-size: 20px;
  text-transform:uppercase;
}

input[type=number]{
  font-size: 20px;
}

select {
   font-family: Century Gothic;
   font-size: 18px;
}

</style>

<center><h3 style="border:#905d5d; background-color:#ffdab9; border-radius: 10px 100px / 120px; border-width:3px; border-style:solid;"><p1 style="font-family:Century Gothic; font-size:25px;"><u><br>Pengubahan Data Peserta</u></p1>
<!-- 
    Borang yang akan digunakan untuk menukar maklumat peserta. 
    Pada setiap input pengguna akan diumpukkan dengan value
    yang akan diambil dari data GET yang telah dihantar dari 
    fail senarai-peserta.php.
-->
<form action='peserta-kemaskini-proses.php?nokp_lama=<?= $_GET['nokp_peserta'] ?>' method='POST'><p1 style="font-family: Century Gothic; font-size:20;"><b>

    <br>Nama :                 <input  type='text' name='nama_peserta' value='<?= $_GET['nama_peserta'] ?>' required><br><br>
	Jantina :              <input type='radio' name='jantina' value="L">Lelaki
	                         <input type='radio' name='jantina' value="P">Perempuan<br><br>
    Tingkatan :    <select name="tingkatan" id='tingkatan'>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option></select>
	| Kelas :        <select name="kelas" id='kelas'>
	                  <option value="ABU BAKAR">ABU BAKAR</option>
					  <option value="AL-GHAZALI">AL-GHAZALI</option>
					  <option value="ALI">ALI</option>
					  <option value="BUKHARI">BUKHARI</option>
					  <option value="UMAR">UMAR</option>
					  <option value="ADIL">ADIL</option>
					  <option value="AKTIF">AKTIF</option>
					  <option value="ARIF">ARIF</option>
					  <option value="BAKTI">BAKTI</option>
					  <option value="BESTARI">BESTARI</option>
					  <option value="BIJAK">BIJAK</option>
					  <option value="CEKAL">CEKAL</option>
                      <option value="CERDAS">CERDAS</option>
					  <option value="PERALIHAN">PERALIHAN</option></select><br><br>
    Nombor Kad Pengenalan : <input type='number' name='nokp_peserta' value='<?= $_GET['nokp_peserta'] ?>' required><br><br>
					  
    <input type='submit' value='Kemas Kini'><br>
	
</b></p1></h3></form>
<?php include ('footer.php'); ?>