<?php 
# Memulakan fungsi session.
session_start();

# Memanggil fail header.php  fungsi.php
include('header.php');
include('guard-hakim.php');
include('connection.php');
include('fungsi.php');
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

input[type=reset]{
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

.custom-file-input::-webkit-file-upload-button {
  visibility: hidden;
}
.custom-file-input::before {
  content: 'Pilih...';
  display: inline-block;
  background: white;
  border: 2px solid gray;
  border-radius: 10px;
  padding: 10px 20px;
  outline: none;
  white-space: nowrap;
  -webkit-user-select: none;
  cursor: pointer;
  font-weight: 600;
  font-size: 10pt;
}
.custom-file-input:hover::before {
  border-color: black;
}
.custom-file-input:active::before {
  background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
}
</style>

<!-- Tajuk antaramuka -->
<center><h3 style="border:black; background-color:#BDB5D5; border-radius: 10px 100px / 120px; border-width:3px; border-style:solid;"><p1 style="font-family:Century Gothic; font-size:25px;"><u><br>Pendaftaran Peserta Baru</u></p1>
<!-- Borang Pendaftaran Peserta Baharu -->
<form action='pendaftaran-peserta-proses.php' method='POST'><p1 style="font-family: Century Gothic; font-size:20;"><b>

    <br>Nama :                 <input type='text' name='nama' required><br><br>
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
    Nombor Kad Pengenalan : <input type='number' name='nokp' required><br><br>
                      <input type='reset' value='Reset'>	
                      <input type='submit' value='Submit'>

</b></p1></h3></form>
<!-- Tajuk laman. -->
<h3 style="font-family:Century Gothic;">atau...</h3>
<h3 style="border:black; background-color:#BDB5D5; border-radius: 10px 100px / 120px; border-width:3px; border-style:solid;"><p1 style="font-family:Century Gothic; font-size:25px;"><u><br>Muat Naik Data Peserta Baharu</u></p1>

<!-- Borang untuk memuat naik fail. -->
<form action='peserta-upload-proses.php' method='POST' enctype='multipart/form-data'><p1 style="font-family: Century Gothic; font-size:20;">

   <h3><b>Sila pilih fail .txt yang ingin diupload.</b></h3>
   <input       type='file'     name='data_peserta' class='custom-file-input'><br><br>
   <button      type='submit'   name='btn-upload'>Submit</button> 
</p1></h3></form></center>
<?php include ('footer.php'); ?>