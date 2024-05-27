<?php
require 'config.php';
require 'auth_conf.php';

if (isset($_POST['btnUnsetCart'])) {
    $kode = $_POST['kode_barang'];

    foreach ($_SESSION['cart'] as $index => $item) {
        if ($item['kode_barang'] == $kode) {
            // Hapus barang dari keranjang
            unset($_SESSION['cart'][$index]);

            // Atur ulang indeks array
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            header("Location: dashboard.php");
            break;
        }
    }
}
