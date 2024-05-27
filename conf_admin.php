<?php
require 'config.php';
require 'auth_conf.php';

if (isset($_POST['btnInsertAdmin'])) {
    $id_admin = $_POST['idAdmin'];
    $nama_Admin = $_POST['namaAdmin'];
    $alamat_Admin = $_POST['alamatAdmin'];
    $posisi_admin = $_POST['posisiAdmin'];
    $password = $_POST['password'];

    $stmt = $db->prepare("INSERT INTO admin VALUES(:id_admin, :nama_admin,:alamat_admin,:posisi_admin,:password)");
    $stmt->bindParam(':id_admin', $id_admin);
    $stmt->bindParam(':nama_admin', $nama_Admin);
    $stmt->bindParam(':alamat_admin', $alamat_Admin);
    $stmt->bindParam(':posisi_admin', $posisi_admin);
    $stmt->bindParam(':password', $password);

    try {
        $stmt->execute();
        header("Location: admin.php");
        exit;
    } catch (PDOException $e) {
        echo "error" . $e->getMessage();
        header("Location: insert_Admin.php");
        exit;
    }
}


if (isset($_GET['idAdminDel'])) {
    $idAdminDel = $_GET['idAdminDel'];
    $stmtDelAdmin = $db->prepare("DELETE FROM admin WHERE id_admin = :idAdminDel");
    $stmtDelAdmin->bindParam(":idAdminDel", $idAdminDel);
    try {
        $stmtDelAdmin->execute();
        header("Location: admin.php");
        exit;
    } catch (PDOException $e) {
        echo "Error" . $e->getMessage();
        header("Location: admin.php");
        exit;
    }
}


if (isset($_POST['btnUpdateAdmin'])) {
    $id_admin = $_POST['id_admin'];
    $nama_admin = $_POST['nama_admin'];
    $alamat_admin = $_POST['alamat_admin'];
    $posisi_admin = $_POST['posisi_admin'];
    $password = $_POST['password'];

    $stmtUpdateAdmin = $db->prepare("UPDATE admin SET
        nama_admin = :nama_admin,
        alamat_admin = :alamat_admin,
        posisi_admin = :posisi_admin,
        password = :password
        WHERE id_admin = :id_admin
    ");

    $stmtUpdateAdmin->bindParam(":nama_admin", $nama_admin);
    $stmtUpdateAdmin->bindParam(":alamat_admin", $alamat_admin);
    $stmtUpdateAdmin->bindParam(":posisi_admin", $posisi_admin);
    $stmtUpdateAdmin->bindParam(":password", $password);
    $stmtUpdateAdmin->bindParam(":id_admin", $id_admin);

    try {
        $stmtUpdateAdmin->execute();
        header("Location: admin.php");
        exit;
    } catch (PDOException $e) {
        echo "Error" . $e->getMessage();
        header("Location: admin.php");
        exit;
    }
}

if (isset($_POST['btnUpdateProfile'])) {
    $id_admin = $_POST['id_admin'];
    $nama_admin = $_POST['nama_admin'];
    $alamat_admin = $_POST['alamat_admin'];
    $posisi_admin = $_POST['posisi_admin'];
    $password = $_POST['password'];

    $stmtUpdateAdmin = $db->prepare("UPDATE admin SET
        nama_admin = :nama_admin,
        alamat_admin = :alamat_admin,
        posisi_admin = :posisi_admin,
        password = :password
        WHERE id_admin = :id_admin
    ");

    $stmtUpdateAdmin->bindParam(":nama_admin", $nama_admin);
    $stmtUpdateAdmin->bindParam(":alamat_admin", $alamat_admin);
    $stmtUpdateAdmin->bindParam(":posisi_admin", $posisi_admin);
    $stmtUpdateAdmin->bindParam(":password", $password);
    $stmtUpdateAdmin->bindParam(":id_admin", $id_admin);

    try {
        $stmtUpdateAdmin->execute();
        header("Location: index.php");
        session_destroy();
        exit;
    } catch (PDOException $e) {
        echo "Error" . $e->getMessage();
        header("Location: profileMe.php");
        exit;
    }
}
