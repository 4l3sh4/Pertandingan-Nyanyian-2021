<?php
# Memulakan fungsi session.
session_start();

# Memanggil fail guard-hakim dan connection.
include('guard-hakim.php');
include('connection.php');

# Menyemak kewujudan data POST.
if(!empty($_POST))
{
    # Mengambil data yang diPOST.
	$pilihan_lagu= $_POST['pilihan_lagu'];
	$kualiti_vokal= $_POST['kualiti_vokal'];
	$intonasi= $_POST['intonasi'];
	$jumlah_markah= $pilihan_lagu + $kualiti_vokal + $intonasi;
    $kod= $_POST['kod_peserta'];

    # Arahan (query) mengemaskini jadual peserta.
    $query_pemarkahan = "update markah
	set pilihan_lagu   = '".$pilihan_lagu."',
	    kualiti_vokal  = '".$kualiti_vokal."',
	    intonasi       = '".$intonasi."',
		jumlah_markah  = '".$jumlah_markah."'
	    where
	    kod_peserta   = '$kod' ";
	
	$query_peserta = "update peserta
	set nokp_hakim = '".$_SESSION['nokp']."'
	where
	kod_peserta   = '$kod' ";

    # Melaksanakan proses kemaskini.
    $laksana_update =   mysqli_query($condb,$query_pemarkahan) and mysqli_query($condb,$query_peserta);

    # Menyemak adakah data telah berjaya dikemaskini.
    if($laksana_update)
    {
        echo "<script>alert('Penilaian anda berjaya disimpan.'); 
        window.location.href='penilaian-peserta.php';</script>";
    }
    else
    {
        
        echo "<script>alert('Penilaian anda gagal disimpan.');
        window.location.href='penilaian-peserta.php';</script>";

    }
}
else
{
    # Jika data post tidak wujud (empty).
    die("<script>alert('Sila masukkan markah.');
    window.location.href='penilaian-peserta.php';</script>");
}
?>