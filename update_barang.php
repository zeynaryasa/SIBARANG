<?php require_once 'auth_conf.php' ?>
<?php
require 'config.php';
if (isset($_GET['kode_barangUpd'])) {
    $kode_barang = $_GET['kode_barangUpd'];
    // Query untuk mendapatkan data barang berdasarkan id_barang
    $stmt404 = $db->prepare("SELECT * FROM barang WHERE kode_barang = :kode");
    $stmt404->bindParam(":kode", $kode_barang);
    $stmt404->execute();
    // Jika data tidak ditemukan, arahkan ke halaman 404
    if ($stmt404->rowCount() == 0) {
        header("Location: 404.html");
        exit;
    }
    $stmtData = $db->prepare("SELECT * FROM barang WHERE kode_barang = :kode_barang");
    $stmtData->bindParam(":kode_barang", $kode_barang);
    $stmtData->execute();
    $result = $stmtData->fetchAll(PDO::FETCH_ASSOC);
    if ($stmtData->rowCount() > 0) {
        foreach ($result as $row) {
            $dataBarangByKode = $row;
        }
    }
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
                    <h4 class="fw-bold">Update Data Barang</h4>
                </div>
                <form action="conf_barang.php" method="POST">
                    <div class="mb-3 mt-5">
                        <div class="row">
                            <div class="col-5">
                                <label for="kodeBarang" class="form-label ">Kode Barang <strong class="text-danger">*</strong></label>
                                <input type="text" name="kode_barang" class="form-control " value='<?= $dataBarangByKode['kode_barang']; ?>' readonly id="kodeBarang" required>
                            </div>
                            <div class="col-3">
                                <label for="jumlahBarang" class="form-label ">Jumlah<strong class="text-danger">*</strong></label>
                                <input type="number" name="jumlahBarang" class="form-control " value="<?= $dataBarangByKode['jumlah']; ?>" id="jumlahBarang" autofocus required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="namaBarang" class="form-label ">Nama Barang <strong class="text-danger">*</strong></label>
                        <input type="text" name="nama_barang" class="form-control " id="namaBarang" value="<?= $dataBarangByKode['nama_barang']; ?>" required>
                    </div>
                    <div class="text-center mb-3 ">
                        <button type="submit" class="btn btn-primary" name="btnUpdateBarang">Save</button>
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