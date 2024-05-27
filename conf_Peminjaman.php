<?php
require 'config.php';
require 'auth_conf.php';

if (isset($_POST['btnInsertPeminjaman'])) {
    // var_dump($_POST);
    $kode_peminjaman = $_POST['kode_peminjaman'];
    $id_admin = $_POST['id_admin'];
    $id_karyawan = $_POST['id_karyawan'];
    $status = "dipinjam";
    $tgl_peminjaman = $_POST['tgl_peminjaman'];
    $kode_barang = $_POST['kode_barang']; //untuk insert ke detail peminjaman

    if (empty($kode_peminjaman) || empty($id_admin) || empty($id_karyawan) || empty($tgl_peminjaman) || empty($kode_barang)) {
        header("Location: dashboard.php");
        exit;
    }

    try {
        // Mulai transaksi
        $db->beginTransaction();

        //insert kedalam tabel peminjaman
        $stmt = $db->prepare("INSERT INTO peminjaman VALUES(:kode_peminjaman,:id_admin,:id_karyawan,:status,:tgl_peminjaman)");
        $stmt->bindParam(":kode_peminjaman", $kode_peminjaman);
        $stmt->bindParam(":id_admin", $id_admin);
        $stmt->bindParam(":id_karyawan", $id_karyawan);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":tgl_peminjaman", $tgl_peminjaman);
        $stmt->execute();

        //insert kedalam tabel detail peminjaman
        // Jika kode barang adalah array (lebih dari satu barang)
        if (is_array($kode_barang)) {
            foreach ($kode_barang as $kode) { //pecah array
                $stmtDetail = $db->prepare("INSERT INTO detail_peminjaman (kode_peminjaman, kode_barang) VALUES (:kode_peminjaman, :kode_barang)");
                $stmtDetail->bindParam(":kode_peminjaman", $kode_peminjaman);
                $stmtDetail->bindParam(":kode_barang", $kode);
                $stmtDetail->execute();
            }
        } else { // Jika hanya satu barang
            $stmtDetail = $db->prepare("INSERT INTO detail_peminjaman (kode_peminjaman, kode_barang)  VALUES (:kode_peminjaman, :kode_barang)");
            $stmtDetail->bindParam(":kode_peminjaman", $kode_peminjaman);
            $stmtDetail->bindParam(":kode_barang", $kode_barang);
            $stmtDetail->execute();
        }

        // Jika semua operasi berhasil, commit transaksi
        $db->commit();

        unset($_SESSION['cart']);
        unset($_SESSION['id_karyawan']);
        unset($_SESSION['nama_karyawan']);
        header("Location: dashboard.php");
        exit;
    } catch (PDOException $e) {
        // Jika ada error, batalkan transaksi
        $db->rollBack();
        $a = "Error" . $e->getMessage();
        // var_dump($a);
        header("Location: dashboard.php");
        exit;
    }
}

if (isset($_GET['kodePDel'])) {
    $kode = $_GET['kodePDel'];
    $stmtDelP = $db->prepare("DELETE FROM peminjaman WHERE kode_peminjaman = :kode");
    $stmtDelP->bindParam(":kode", $kode);

    try {
        $stmtDelP->execute();
        header("Location: peminjaman.php");
        exit;
    } catch (PDOException $e) {
        echo "error" . $e->getMessage();
        header("Location: peminjaman.php");
        exit;
    }
}


if (isset($_POST['btnKembali'])) {
    $aprove = $_POST['btnKembali'];
    $kode = $_POST['kode_peminjaman'];
    $stmt = $db->prepare("UPDATE peminjaman SET status = :status WHERE kode_peminjaman = :kode");
    $stmt->bindParam(":status", $aprove);
    $stmt->bindParam(":kode", $kode);

    try {
        $stmt->execute();
        header("Location: peminjaman.php");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        header("Location: peminjaman.php");
        exit;
    }
}


if (isset($_POST['btnDipinjam'])) {
    $aprove = $_POST['btnDipinjam'];
    $kode = $_POST['kode_peminjaman'];
    $stmt = $db->prepare("UPDATE peminjaman SET status = :status WHERE kode_peminjaman = :kode");
    $stmt->bindParam(":status", $aprove);
    $stmt->bindParam(":kode", $kode);

    try {
        $stmt->execute();
        header("Location: peminjaman.php");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        header("Location: peminjaman.php");
        exit;
    }
}


if (isset($_POST['btnUnsetSesionKaryawan'])) {
    unset($_SESSION['id_karyawan']);
    unset($_SESSION['nama_karyawan']);
    header("Location: dashboard.php");
}
