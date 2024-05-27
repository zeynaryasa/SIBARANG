<?php require_once 'auth_conf.php' ?>
<?php
require 'config.php';
$stmt = $db->prepare("SELECT * FROM karyawan ORDER BY id_karyawan DESC");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
if ($stmt->rowCount() > 0) {
    foreach ($result as $row) {
        $dataKaryawan[] = $row;
    }
}
?>
<?php require 'header.php'; ?>
<!-- body tenplate -->
<div class="col">
    <a href="insert_karyawan.php"> <button class="btn btn-primary btn-sm"><i class="bi bi-plus"></i></button></a>
</div>
<div class="row mt-2">
    <div class="col">
        <!-- content -->
        <!-- change this to your content -->
        <div class="card">
            <div class="card-body">
                <div class="card-title text-center fw-bold">Data Karyawan</div>
                <table class="table">
                    <thead>
                        <tr class="f-small">
                            <th scope="col" class="col-1">ID</th>
                            <th scope="col" class="col-2">Nama</th>
                            <th scope="col" class="col-2">Alamat</th>
                            <th scope="col" class="col-2">Posisi</th>
                            <th scope="col" class="col-1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="f-small">
                        <tr>
                            <?php
                            if (empty($dataKaryawan)) {
                                echo "<tr class='text-center fw-bold'><td colspan='5' class='bg-secondary'>Data Karyawan Tidak Ditemukan</td></tr>";
                            } else {
                                foreach ($dataKaryawan as $dataKaryawan) :
                            ?>
                                    <td><?= $dataKaryawan['id_karyawan']; ?></td>
                                    <td><?= $dataKaryawan['nama_karyawan']; ?></td>
                                    <td><?= $dataKaryawan['alamat_karyawan']; ?></td>
                                    <td><?= $dataKaryawan['posisi_karyawan']; ?></td>
                                    <td>
                                        <a href="update_karyawan.php?id_karyawanUpd=<?= $dataKaryawan['id_karyawan']; ?>"><button class="btn btn-warning btn-sm"><i class="bi bi-tools"></i></button></a>
                                        <a href="conf_karyawan.php?id_karyawanDel=<?= $dataKaryawan['id_karyawan']; ?>"><button class="btn btn-danger btn-sm" name="btnDeleteKaryawan"><i class="bi bi-trash"></i></button></a>
                                    </td>
                        </tr>
                <?php endforeach;
                            } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end content -->
    </div>
</div>
<!-- end body template -->
<?php require 'foother.php'; ?>