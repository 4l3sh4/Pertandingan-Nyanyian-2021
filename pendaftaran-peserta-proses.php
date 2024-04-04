<?php
# Memulakan fungsi session.
session_start();

# Menyemak kewujudan data POST.
if(!empty($_POST))
{
    # Jika data POST wujud.

    # Panggil fail connection.php
    include ('connection.php');

    # Data Validation : Had Atas & Had Bawah
    if(strlen($_POST['nokp']) != 12 or !is_numeric($_POST['nokp']))
    {
        die("<script>alert('Sila masukkan nombor kad pengenalan anda dengan betul.');
        window.location.href='pendaftaran-peserta.php';</script>");
    }

    # Arahan (Query) untuk menyimpan data peserta baharu.
	$kod_peserta = mt_rand(1000, 5000);
	
    $query_peserta = "insert into peserta
    (nama_peserta,jantina_peserta,tingkatan_peserta,kelas_peserta,nokp_peserta,kod_peserta)
    values
    ('".strtoupper($_POST['nama'])."','".$_POST['jantina']."','".$_POST['tingkatan']."',
    '".$_POST['kelas']."', '".$_POST['nokp']."','$kod_peserta') ";
	
    $query_markah = "insert into markah
    (kod_peserta)
	values
	('$kod_peserta') ";

    # Melaksanakan Arahan Menyimpan data peserta baharu.
    $laksana_query = mysqli_query($condb,$query_peserta) and mysqli_query($condb,$query_markah);

    # Menyemak proses penyimpanan data.
    if($laksana_query)
    {
        # Jika data berjaya disimpan.
        die("<script>alert('Peserta baharu berjaya didaftarkan. Anda hendak menilai peserta selepas ini.');
        window.location.href='penilaian-peserta.php';</script>");
    }
    else
    {
        # Jika data gagal disimpan.
        die("<script>alert('Pendaftaran gagal didaftarkan. Sila cuba lagi.');
        window.location.href='pendaftaran-peserta.php';</script>");
    }

}
else
{
    # Jika data POST tidak wujud (empty).
    die("<script>alert('Sila lengkapkan maklumat berdasarkan pendaftaran peserta.');
    window.location.href='pendaftaran-peserta.php';</script>");
}

?>