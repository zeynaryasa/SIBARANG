<?php require_once 'auth_conf.php' ?>
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
                    <h4 class="fw-bold">Insert Data Admin</h4>
                </div>
                <form action="conf_admin.php" method="POST">
                    <div class="mb-3 mt-5">
                        <div class="row">
                            <div class="col-3">
                                <label for="idAdmin" class="form-label ">ID Admin <strong class="text-danger">*</strong></label>
                                <input type="text" name="idAdmin" class="form-control " id="idAdmin" required autofocus>
                            </div>
                            <div class="col-5">
                                <label for="namaAdmin" class="form-label ">Nama Admin <strong class="text-danger">*</strong></label>
                                <input type="text" name="namaAdmin" class="form-control " id="namaAdmin" required>
                            </div>
                            <div class="col-4">
                                <label for="posisiAdmin" class="form-label ">Posisi Admin <strong class="text-danger">*</strong></label>
                                <select name="posisiAdmin" id="posisiAdmin" class="form-control">
                                    <option disabled selected>Choose...</option>
                                    <option value="Posisi 1">Posisi 1</option>
                                    <option value="Posisi 2">Posisi 2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="mb-3">
                                <label for="alamatAdmin" class="form-label ">Alamat Admin <strong class="text-danger">*</strong></label>
                                <input type="text" name="alamatAdmin" class="form-control " id="alamatAdmin" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="password" class="form-label ">Password <strong class="text-danger">*</strong></label>
                                <input type="password" name="password" class="form-control " id="password" required>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mb-3 ">
                        <button type="submit" class="btn btn-primary" name="btnInsertAdmin">Save</button>
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