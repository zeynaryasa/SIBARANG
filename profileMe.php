<?php require_once 'auth_conf.php' ?>
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
                    <h4 class="fw-bold">Profile</h4>
                </div>
                <form action="conf_admin.php" method="post">
                    <?php foreach ($_SESSION['dataLogin'] as $dLogin) : ?>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-4 ">
                                    <label for="id" class="form-label">ID <strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control" id="id" name="id_admin" readonly value="<?= $dLogin['id_admin']; ?>" required>
                                </div>
                                <div class="col-4">
                                    <label for="nama" class="form-label">Nama <strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control" id="nama" name="nama_admin" value="<?= $dLogin['nama_admin']; ?>" required oninput="this.value = this.value.toUpperCase()">
                                </div>
                                <div class="col-4">
                                    <label for="password" class="form-label">Password <strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control" id="password" name="password" value="<?= $dLogin['password']; ?>" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-8">
                                    <label for="alamat" class="form-label">Alamat <strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control" id="alamat" name="alamat_admin" value="<?= $dLogin['alamat_admin']; ?>" required>
                                </div>
                                <div class="col-4">
                                    <label for="posisi" class="form-label">Posisi <strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control" id="posisi" name="posisi_admin" value="<?= $dLogin['posisi_admin']; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="btnUpdateProfile">Submit</button>
                        </div>
                    <?php endforeach; ?>
                </form>
            </div>
        </div>
        <!-- end content -->
    </div>

    <div class="col"></div>
</div>
<!-- end body template -->
<?php require 'foother.php'; ?>