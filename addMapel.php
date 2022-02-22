<?php
include "koneksi.php";
$kode = '';
if (isset($_POST['id_mapel'])) {
    $kode = $_POST['id_mapel'];
}
if ($kode != '') {
    $query = "select id_mapel from mapel where id_mapel='$kode'";
    $result = mysqli_query($link, $query) or die('Errorquery: ' . $query);
    $ketemuno = mysqli_num_rows($result);
    if ($ketemuno > 0) {
        $query = "UPDATE mapel set 
nama_mapel='$_POST[nama_mapel]',ustad_pengajar='$_POST[ustad_pengajar]' where 
id_mapel='$kode'";
        $result = mysqli_query($link, $query) or die('Errorquery: ' . $query);
        echo "Update " . $kode;
    } else {
        $query = "INSERT INTO mapel(id_mapel,nama_mapel,ustad_pengajar) 
VALUES('$kode','$_POST[nama_mapel]','$_POST[ustad_pengajar]')";
        $result = mysqli_query($link, $query) or die('Errorquery: ' . $query);
        echo "Insert " . $kode;
    }
}
