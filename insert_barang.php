<?php require_once 'auth_conf.php' ?>
<?php
require 'config.php';
$stmtKodeBarang = $db->prepare("SELECT kode_barang FROM barang ORDER BY kode_barang DESC LIMIT 1");
$stmtKodeBarang->execute();
$resultKodeBarang = $stmtKodeBarang->fetch(PDO::FETCH_ASSOC);

if ($stmtKodeBarang->rowCount() > 0) {
    // Mengambil bagian angka dari kode barang
    $kodeTerbesar = substr($resultKodeBarang['kode_barang'], 3);
    // Menambahkan 1 ke kode barang terbesar
    $kodeBaru = $kodeTerbesar + 1;
    // Membuat format kode barang baru
    $kodeBarang = 'BRG' . sprintf('%03s', $kodeBaru);
} else {
    // Jika tidak ada barang, set kode barang menjadi BRG001
    $kodeBarang = 'BRG001';
}
?>
<?php require 'header.php'; ?>
<!-- body tenplate -->
<div class="row ">
    <div class="col"></div>

    <div class="col-5">
        <!-- content -->
        <!-- change this to your content -->
        <div class="card">
            <div class="card-body">
                <div class="card-title text-center ">
                    <h4 class="fw-bold">Insert Data Barang</h4>
                </div>
                <form action="conf_barang.php" method="POST">
                    <div class="mb-3 mt-5">
                        <div class="row">
                            <div class="col-5">
                                <label for="kodeBarang" class="form-label ">Kode Barang <strong class="text-danger">*</strong></label>
                                <input type="text" name="kodeBarang" class="form-control " value='<?= $kodeBarang; ?>' readonly id="kodeBarang" required>
                            </div>
                            <div class="col-3">
                                <label for="jumlahBarang" class="form-label ">Jumlah<strong class="text-danger">*</strong></label>
                                <input type="number" name="jumlahBarang" class="form-control " id="jumlahBarang" autofocus required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="namaBarang" class="form-label ">Nama Barang <strong class="text-danger">*</strong></label>
                        <input type="text" name="namaBarang" class="form-control " id="namaBarang" required>
                    </div>
                    <div class="text-center mb-3 ">
                        <button type="submit" class="btn btn-primary" name="btnInsertBarang">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end content -->
    </div>

    <div class="col"></div>
</div>
<!-- end body template -->
<?php require 'foother.php'; ?>