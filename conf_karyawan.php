<?php
require 'config.php';
require 'auth_conf.php';

if (isset($_POST['btnInsertKaryawan'])) {
    $id_karyawan = $_POST['idKaryawan'];
    $nama_karyawan = $_POST['namaKaryawan'];
    $alamat_karyawan = $_POST['alamatKaryawan'];
    $posisi_karyawan = $_POST['posisiKaryawan'];

    $stmt = $db->prepare("INSERT INTO karyawan VALUES(:id_karyawan,:nama_karyawan,:alamat_karyawan,:posisi_karyawan)");
    $stmt->bindParam(":id_karyawan", $id_karyawan);
    $stmt->bindParam(":nama_karyawan", $nama_karyawan);
    $stmt->bindParam(":alamat_karyawan", $alamat_karyawan);
    $stmt->bindParam(":posisi_karyawan", $posisi_karyawan);

    try {
        $stmt->execute();
        header("Location: karyawan.php");
        exit;
    } catch (PDOException $e) {
        echo "Error" . $e->getMessage();
        header("Location: insert_karyawan.php");
        exit;
    }
}

if (isset($_GET['id_karyawanDel'])) {
    $id_karyawanDel = $_GET['id_karyawanDel'];
    $stmtDelKaryawan = $db->prepare("DELETE FROM karyawan WHERE id_karyawan=:id_karyawanDel");
    $stmtDelKaryawan->bindParam(":id_karyawanDel", $id_karyawanDel);

    try {
        $stmtDelKaryawan->execute();
        header("Location: karyawan.php");
        exit;
    } catch (PDOException $e) {
        echo "Error" . $e->getMessage();
        header("Location: karyawan.php");
        exit;
    }
}


if (isset($_POST['btnUpdateKaryawan'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $nama_karyawan = $_POST['nama_karyawan'];
    $alamat_karyawan = $_POST['alamat_karyawan'];
    $posisi_karyawan = $_POST['posisi_karyawan'];

    $stmtUpdateKaryawan =  $db->prepare("UPDATE karyawan SET
   nama_karyawan = :nama,
   alamat_karyawan = :alamat,
   posisi_karyawan = :posisi
   WHERE id_karyawan = :id
   ");

    $stmtUpdateKaryawan->bindParam(":nama", $nama_karyawan);
    $stmtUpdateKaryawan->bindParam(":alamat", $alamat_karyawan);
    $stmtUpdateKaryawan->bindParam(":posisi", $posisi_karyawan);
    $stmtUpdateKaryawan->bindParam(":id", $id_karyawan);

    try {
        $stmtUpdateKaryawan->execute();
        header("Location: karyawan.php");
        exit;
    } catch (PDOException $e) {
        echo "Error" . $e->getMessage();
        header("Location: karyawan.php");
        exit;
    }
}
