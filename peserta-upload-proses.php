<?PHP
if (isset($_POST['btn-upload']))
{
    # Memanggil fail connection.
    include ('connection.php');

    # Mengambil nama sementara fail.
    $namafailsementara=$_FILES["data_peserta"]["tmp_name"];

    # Mengambil nama fail.
    $namafail=$_FILES['data_peserta']['name'];

    # Mengambil jenis fail.
    $jenisfail=pathinfo($namafail,PATHINFO_EXTENSION);

    # Menguji jenis fail dan saiz fail.
    if($_FILES["data_peserta"]["size"]>0 AND $jenisfail=="txt")
    {
        # Membuka fail yang diambil.
        $fail_data_peserta=fopen($namafailsementara,"r");

        # Mendapatkan data dari fail baris demi baris.
        while (!feof($fail_data_peserta))
        {
            # Mengambil data sebaris sahaja bg setiap pusingan.
            $ambilbarisdata = fgets($fail_data_peserta);

            # Memecahkan baris data mengikut tanda pipe.
            $pecahkanbaris = explode("|",$ambilbarisdata);

            # Selepas pecahan tadi akan diumpukan kepada 3.
            list($nokp_peserta,$nama_peserta,$jantina_peserta,$tingkatan_peserta,$kelas_peserta) = $pecahkanbaris;
			$nama_peserta = strtoupper($nama_peserta);
			$jantina_peserta = strtoupper($jantina_peserta);
			$kelas_peserta = strtoupper($kelas_peserta);

            # Arahan SQL untuk menyimpan data.
			$kod_peserta = mt_rand(1000, 5000);
			
            $arahan_sql_simpan="insert into peserta
            (nokp_peserta,nama_peserta,jantina_peserta,tingkatan_peserta,kelas_peserta,kod_peserta) values
            ('$nokp_peserta','$nama_peserta','$jantina_peserta','$tingkatan_peserta','$kelas_peserta','$kod_peserta')";
			
			$arahan_sql_markah = "insert into markah
            (kod_peserta) values
	        ('$kod_peserta') ";

            # Memasukkan data ke dalam jadual peserta.
            $laksana_arahan_simpan = mysqli_query($condb, $arahan_sql_simpan) and mysqli_query($condb, $arahan_sql_markah);
            echo"<script>alert('Pemuatan naik fail data peserta telah selesai.');
         window.location.href='penilaian-peserta.php';</script>";
        }
    fclose($fail_data_peserta);
    }
    else
    {
        echo "<script>alert('Hanya fail berformat .txt sahaja dibenarkan.');
		window.location.href='pendaftaran-peserta.php';</script>";
    }
}
else
{
    die("<script>alert('Ralat! Akses secara terus.');
    window.location.href='pendaftaran-peserta.php';</script>");
}
?>