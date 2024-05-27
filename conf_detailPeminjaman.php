<?php
require 'config.php';
require 'auth_conf.php';

if (isset($_GET['kBarangDetail'])) {
    // var_dump($_GET);
    $kode = $_GET['kBarangDetail'];
    $kodeP = $_GET['kodeP'];
    $stmtDelDetailBarang = $db->prepare("DELETE FROM detail_peminjaman WHERE kode_barang = :kode");
    $stmtDelDetailBarang->bindParam(":kode", $kode);

    try {
        $stmtDelDetailBarang->execute();
        header("Location: detail_peminjaman.php?kode_peminjaman=$kodeP");
        exit;
    } catch (PDOException $e) {
        echo " Error" . $e->getMessage();
        header("location: peminjaman.php");
        exit;
    }
}
