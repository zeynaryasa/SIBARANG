<?php require_once 'auth_conf.php' ?>
<?php
require 'config.php';
$stmt = $db->prepare("SELECT * FROM admin ORDER BY id_admin DESC");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
if ($stmt->rowCount() > 0) {
    foreach ($result as $row) {
        $dataAdmin[] = $row;
    }
}
?>

<?php require 'header.php'; ?>
<!-- body tenplate -->
<div class="col">
    <a href="insert_admin.php"><button class="btn btn-primary btn-sm"><i class="bi bi-plus"></i></button> </a>
</div>
<div class="row mt-2">
    <div class="col">
        <!-- content -->
        <!-- change this to your content -->
        <div class="card">
            <div class="card-body">
                <div class="card-title text-center fw-bold">Data Admin</div>
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
                        <?php
                        if (empty($dataAdmin)) {
                            echo "<tr class='text-center fw-bold'><td colspan='5' class='bg-secondary'>Data Admin Tidak Ditemukan</td></tr>";
                        } else {
                            foreach ($dataAdmin as $dAdmin) :
                        ?>
                                <tr>
                                    <td><?= $dAdmin['id_admin']; ?></td>
                                    <td><?= $dAdmin['nama_admin']; ?></td>
                                    <td><?= $dAdmin['alamat_admin']; ?></td>
                                    <td><?= $dAdmin['posisi_admin']; ?></td>
                                    <td>
                                        <a href="update_admin.php?idAdminUpd=<?= $dAdmin['id_admin']; ?>">
                                            <button class="btn btn-warning btn-sm"><i class="bi bi-tools"></i></button>
                                        </a>
                                        <a href="conf_admin.php?idAdminDel=<?= $dAdmin['id_admin']; ?>">
                                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                        </a>
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