<?php require_once 'auth_conf.php' ?>
<?php
require 'config.php';
if (isset($_GET['id_karyawanUpd'])) {
    $id = $_GET['id_karyawanUpd'];
    // Query untuk mendapatkan data karyawan berdasarkan id_karyawan
    $stmt404 = $db->prepare("SELECT * FROM karyawan WHERE id_karyawan = :id");
    $stmt404->bindParam(":id", $id);
    $stmt404->execute();
    // Jika data tidak ditemukan, arahkan ke halaman 404
    if ($stmt404->rowCount() == 0) {
        header("Location: 404.html");
        exit;
    }
    $stmtDataById = $db->prepare("SELECT * FROM karyawan WHERE id_karyawan = :id");
    $stmtDataById->bindParam(":id", $id);
    $stmtDataById->execute();
    $result = $stmtDataById->fetchAll(PDO::FETCH_ASSOC);
    if ($stmtDataById->rowCount() > 0) {
        foreach ($result as $row) {
            $d = $row;
        }
    }
}
?>
<?php require 'header.php'; ?>
<!-- body tenplate -->
<div class="row mt-2">
    <div class="col"></div>
    <div class="col-8">
        <!-- content -->
        <!-- change this to your content -->
        <div class="card">
            <div class="card-body">
                <div class="card-title text-center ">
                    <h4 class="fw-bold">Update Data Karyawan</h4>
                </div>
                <form action="conf_karyawan.php" method="POST">
                    <div class="mb-3 mt-5">
                        <div class="row">
                            <div class="col-3">
                                <label for="idKaryawan" class="form-label ">ID Karyawan <strong class="text-danger">*</strong></label>
                                <input type="text" name="id_karyawan" class="form-control " id="idKaryawan" value="<?= $d['id_karyawan']; ?>" readonly required autofocus>
                            </div>
                            <div class="col-5">
                                <label for="namaKaryawan" class="form-label ">Nama Karyawan <strong class="text-danger">*</strong></label>
                                <input type="text" name="nama_karyawan" class="form-control " value="<?= $d['nama_karyawan']; ?>" id="namaKaryawan" required>
                            </div>
                            <div class="col-4">
                                <label for="posisiKaryawan" class="form-label ">Posisi Karyawan <strong class="text-danger">*</strong></label>
                                <select name="posisi_karyawan" id="posisiKaryawan" class="form-control">
                                    <option selected value="<?= $d['posisi_karyawan']; ?>"><?= $d['posisi_karyawan']; ?></option>
                                    <option value="Posisi 1">Posisi 1</option>
                                    <option value="Posisi 2">Posisi 2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="mb-3">
                                <label for="alamatKaryawan" class="form-label ">Alamat Karyawan <strong class="text-danger">*</strong></label>
                                <input type="text" name="alamat_karyawan" class="form-control " value="<?= $d['alamat_karyawan']; ?>" id="alamatKaryawan" required>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mb-3 ">
                        <button type="submit" class="btn btn-primary" name="btnUpdateKaryawan">Save</button>
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