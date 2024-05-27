<?php
require 'config.php';
require 'auth_conf.php';

if (isset($_POST['kodeBarang'])) {
    $kodeBarang = $_POST['kodeBarang'];
    $stmt = $db->prepare("SELECT * FROM barang WHERE kode_barang = :kodeBarang");
    $stmt->bindParam(":kodeBarang", $kodeBarang);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($stmt->rowCount() > 0) {
        foreach ($result as $row) {
            $dataBarang = $row;
        }
    }

    // Cek apakah $_SESSION['cart'] sudah ada, jika tidak, definisikan sebagai array kosong
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Cek apakah barang sudah ada di keranjang
    $isExistInCart = false;
    foreach ($_SESSION['cart'] as $item) {
        if ($item['kode_barang'] == $kodeBarang) {
            $isExistInCart = true;
            break;
        }
    }

    // Jika barang belum ada di keranjang, tambahkan
    if (!$isExistInCart) {
        $barang = [
            'kode_barang' => $dataBarang['kode_barang'],
            'nama_barang' => $dataBarang['nama_barang']
        ];
        $_SESSION['cart'][] = $barang;
    }

    header("Location: dashboard.php");
}

if (isset($_POST['id_karyawan'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $stmt = $db->prepare("SELECT * FROM karyawan WHERE id_karyawan = :id_karyawan");
    $stmt->bindParam(":id_karyawan", $id_karyawan);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($stmt->rowCount() > 0) {
        $_SESSION['id_karyawan'] = $result['id_karyawan'];
        $_SESSION['nama_karyawan'] = $result['nama_karyawan'];
    }

    header("Location: dashboard.php");
}
