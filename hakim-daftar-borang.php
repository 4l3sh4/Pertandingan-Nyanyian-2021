<?php 
# Memulakan fungsi session.
session_start();

# Memanggil fail header dan guard-hakim.
include('header.php');
include('guard-hakim.php');
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

</style>

<!-- Tajuk antaramuka. -->
<center><h3 style="border:black; background-color:#BDB5D5; border-radius: 10px 100px / 120px; border-width:3px; border-style:solid;"><p1 style="font-family:Century Gothic; font-size:25px;"><u><br>Pendaftaran Hakim Baharu</u>

<!-- Borang pentaftaran hakim baru. -->
<form action='hakim-daftar-proses.php' method='POST'>
    <br>Nama :        <input  type='text'     name='nama' required><br><br>
	Jantina :              <input type='radio' name='jantina' value="L">Lelaki
	                       <input type='radio' name='jantina' value="P">Perempuan<br><br>
    Nombor Kad Pengenalan :       <input  type='number'     name='nokp'><br><br>
    Nombor Telefon :  <input  type='number' name='notelefon'><br><br>
                <input type='reset' value='Reset'>
                <input  type='submit'   value='Submit'>
</b></p1></h3></form></center>

<?php include ('footer.php'); ?>