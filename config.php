<?php
include '404.php';

$host = "localhost";
$username = "root";
$password = "";
$dbName = "db_sibarang";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Gagal terhubung: " . $e->getMessage();
}


//profile sistem
$stmt = $db->prepare("SELECT * FROM profile");
$stmt->execute();

$dataProfile = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $dataProfile[] = $row;
}

foreach ($dataProfile as $profile) :
    $idProfileSistem = $profile['id'];
    $nameApp = $profile['appName'];
    $companyName = $profile['companyName'];
endforeach;

// test data
// $admin = mysqli_query($db, "SELECT * FROM admin");
// $a = mysqli_fetch_array($admin);

// $karyawan = mysqli_query($db, "SELECT * FROM karyawan");
// $k = mysqli_fetch_array($karyawan);

// $barang = mysqli_query($db, "SELECT * FROM barang");
// $b = mysqli_fetch_array($barang);

// $profile = mysqli_query($db, "SELECT * FROM profile");
// $p = mysqli_fetch_array($profile);

// $pinjam = mysqli_query($db, "SELECT * FROM peminjaman 
// inner join admin on peminjaman.id_admin = admin.id_admin 
// inner join karyawan on peminjaman.id_karyawan = karyawan.id_karyawan");
// $pi = mysqli_fetch_array($pinjam);

// $dpinjam = mysqli_query($db, "SELECT * FROM detail_peminjaman
// inner join peminjaman on detail_peminjaman.kode_peminjaman = peminjaman.kode_peminjaman 
// inner join barang on detail_peminjaman.kode_barang = barang.kode_barang");
// $dpi = mysqli_fetch_array($dpinjam);


// var_dump($a, $k, $b, $p, $pi, $dpi);
