<?php
require 'config.php';
require 'auth_conf.php';


if (isset($_POST['btnInsertBarang'])) {
    $kodeBarang = $_POST['kodeBarang'];
    $jumlahBarang = $_POST['jumlahBarang'];
    $namaBarang = htmlspecialchars($_POST['namaBarang']);

    $stmt = $db->prepare("INSERT INTO barang VALUES(:kodeBarang,:namaBarang,:jumlahBarang)");
    $stmt->bindParam(':kodeBarang', $kodeBarang);
    $stmt->bindParam(':namaBarang', $namaBarang);
    $stmt->bindParam(':jumlahBarang', $jumlahBarang);

    try {
        $stmt->execute();
        header("Location: barang.php");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        header("Location: insert_barang.php"); // Arahkan kembali ke halaman insertBarang jika gagal
        exit;
    }
}

if (isset($_GET['kode_barang'])) {
    $kode_barang = $_GET['kode_barang'];
    $stmtDeleteBarang = $db->prepare("DELETE FROM barang WHERE kode_barang = :kode_barang");
    $stmtDeleteBarang->bindParam(":kode_barang", $kode_barang);

    try {
        $stmtDeleteBarang->execute();
        header("Location: barang.php");
        exit;
    } catch (PDOException $e) {
        echo "Error" . $e->getMessage();
        header("Location: barang.php");
        exit;
    }
}


if (isset($_POST['btnUpdateBarang'])) {
    // var_dump($_POST);
    $kode_barang = $_POST['kode_barang'];
    $jumlah = $_POST['jumlahBarang'];
    $nama_barang = $_POST['nama_barang'];

    $stmtUpdate = $db->prepare("UPDATE barang SET
    nama_barang = :nama_barang,
    jumlah = :jumlah
    WHERE kode_barang = :kode_barang
    ");

    $stmtUpdate->bindParam(":nama_barang", $nama_barang);
    $stmtUpdate->bindParam(":jumlah", $jumlah);
    $stmtUpdate->bindParam(":kode_barang", $kode_barang);

    try {
        $stmtUpdate->execute();
        header("Location: barang.php");
        exit;
    } catch (PDOException $e) {
        echo 'Error' . $e->getMessage();
        header("Location: barang.php");
        exit;
    }
}
