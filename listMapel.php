<?php
include "koneksi.php";
$a = isset($_GET['id_mapel']) ? $_GET['id_mapel'] : '';
$query = "select id_mapel,nama_mapel,ustad_pengajar from mapel where id_mapel LIKE \"%$a%\" order 
by id_mapel";
$result = mysqli_query($link, $query) or die('Errorquery: ' . $query);
$rows = array();
while ($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}
$data = "{mapel:" . json_encode($rows) . "}";
echo $data;
