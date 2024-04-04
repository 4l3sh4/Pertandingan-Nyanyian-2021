<?php  
# Memulakan fungsi session.
session_start();

# Memanggil fail header.php
include('header.php'); 
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

input[type=text]{
  font-size: 20px;
}
</style>

<!-- Tajuk antaramuka log masuk peserta-->
<h3 style="border:orange; background-color:#FFD580; border-radius: 10px 100px / 120px; border-width:3px; border-style:solid; font-size:35; font-family: Century Gothic;"><center>Log Masuk<br>Peserta</center></h3>
<p1 style="font-family: Verdana; font-size:20"><center>Sila masukkan nombor kad pengenalan anda.</center></p1>
<br>
<!-- Borang daftar masuk peserta -->
<form action='peserta-login-proses.php' method='POST'><center>

                    <input type='text' name='nokp' size='30'><br>
					<br>
                    <input type='submit' value='Submit'>
                    
</center></form>

<?php include ('footer.php'); ?>