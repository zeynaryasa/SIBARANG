<?php require_once 'auth_conf.php' ?>
<?php
require 'config.php';
if (isset($_GET['idAdminUpd'])) {
    $id_admin = $_GET['idAdminUpd'];
    // Query untuk mendapatkan data admin berdasarkan id_admin
    $stmt404 = $db->prepare("SELECT * FROM admin WHERE id_admin = :id");
    $stmt404->bindParam(":id", $id_admin);
    $stmt404->execute();
    // Jika data tidak ditemukan, arahkan ke halaman 404
    if ($stmt404->rowCount() == 0) {
        header("Location: 404.html");
        exit;
    }

    //jika ditemukan lanjutkan proses
    $idAdminUpd = $_GET['idAdminUpd'];
    $stmtData = $db->prepare("SELECT * FROM admin WHERE id_admin = :id_admin");
    $stmtData->bindParam(":id_admin", $idAdminUpd);
    $stmtData->execute();
    $result = $stmtData->fetchAll(PDO::FETCH_ASSOC);
    if ($stmtData->rowCount() > 0) {
        foreach ($result as $row) {
            $dataAdminById = $row;
        }
    }
}
?>
<?php require 'header.php'; ?>
<!-- body tenplate -->
<div class="row mt-2 ">
    <div class="col"></div>

    <div class="col-10">
        <!-- content -->
        <!-- change this to your content -->
        <div class="card">
            <div class="card-body">
                <div class="card-title text-center ">
                    <h4 class="fw-bold">Update Data Admin</h4>
                </div>
                <form action="conf_admin.php" method="Post">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-4 ">
                                <label for="id" class="form-label">ID <strong class="text-danger">*</strong></label>
                                <input type="text" class="form-control" name="id_admin" id="id" value="<?= $dataAdminById['id_admin']; ?>" required readonly>
                            </div>
                            <div class="col-4">
                                <label for="nama" class="form-label">Nama <strong class="text-danger">*</strong></label>
                                <input type="text" class="form-control" name="nama_admin" id="nama" value="<?= $dataAdminById['nama_admin']; ?>" required>
                            </div>
                            <div class="col-4">
                                <label for="password" class="form-label">Password <strong class="text-danger">*</strong></label>
                                <input type="text" class="form-control" name="password" id="password" value="<?= $dataAdminById['password']; ?>" required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-8">
                                <label for="alamat" class="form-label">Alamat <strong class="text-danger">*</strong></label>
                                <input type="text" class="form-control" name="alamat_admin" id="alamat" value="<?= $dataAdminById['alamat_admin']; ?>" required>
                            </div>
                            <div class="col-4">
                                <label for="posisiAdmin" class="form-label ">Posisi Admin <strong class="text-danger">*</strong></label>
                                <select name="posisi_admin" id="posisiAdmin" class="form-control">
                                    <option selected value="<?= $dataAdminById['posisi_admin']; ?>"><?= $dataAdminById['posisi_admin']; ?></option>
                                    <option value="Posisi 1">Posisi 1</option>
                                    <option value="Posisi 2">Posisi 2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="btnUpdateAdmin">Submit</button>
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