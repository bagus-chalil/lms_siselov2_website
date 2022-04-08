<?php
//memanggil file example.pdf yang berada di folder bernama file

$filePath = base_url("assets/Dokumen/Laporan_1_-_Bachtiar_Nur_Yogi_Pratama-1-49.pdf");
//Membuat kondisi jika file tidak ada
if (!file_exists($filePath)) {
    echo "The file $filePath does not exist";
    die();
}
//nama file untuk tampilan
$filename="Laporan_1_-_Bachtiar_Nur_Yogi_Pratama-1-49.pdf";
header('Content-type:application/pdf');
header('Content-disposition: inline; filename="'.$filename.'"');
header('content-Transfer-Encoding:binary');
header('Accept-Ranges:bytes');
//membaca dan menampilkan file
readfile($filePath);
?>