<?php
require 'config.php';
session_start();


if (isset($_POST['btn_login'])) {
    $id = $_POST['id'];
    $pass = $_POST['password'];

    // Membuat prepared statement dan mencari data pada tabel
    $stmt = $db->prepare("SELECT * FROM admin WHERE id_admin = :id AND password = :pass");
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":pass", $pass);

    // Eksekusi query dan simpan hasilnya
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $dataLogin = array();
    // Cek jika user ditemukan
    if ($stmt->rowCount() > 0) {
        foreach ($result as $row) {
            $dataLogin[] = $row;
        }
        $_SESSION['login'] = true;
        $_SESSION['dataLogin'] = $dataLogin;
        foreach ($dataLogin as $data) {
            $ses_id_admin = $data['id_admin'];
            $ses_nama_admin = $data['nama_admin'];
        }
        $_SESSION['id_admin'] = $ses_id_admin;
        $_SESSION['nama_admin'] = $ses_nama_admin;
        header("Location: dashboard.php");
    } else {
        header("Location: index.php");
    }
}
