<?php require_once 'auth_conf.php' ?>

<!-- menampilkan data -->
<?php
require 'config.php';
$stmt = $db->prepare("SELECT * FROM barang ORDER BY kode_barang DESC");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
if ($stmt->rowCount() > 0) {
    foreach ($result as $row) {
        $dataBarang[] = $row;
    }
}

?>

<?php require 'header.php'; ?>
<!-- body tenplate -->
<div class="row mt-2">
    <div class="col-3">
        <a href="insert_barang.php"><button class="btn btn-primary btn-sm"><i class="bi bi-plus"></i></button></a>
        <button class="btn btn-secondary btn-sm " disabled><i class="bi bi-printer">Cetak Barcode<span class="badge text-bg-danger">*soon</span> </i></button>
    </div>

</div>

<div class="row mt-2">
    <div class="col">
        <!-- content -->
        <!-- change this to your content -->
        <div class="card">
            <div class="card-body">
                <div class="card-title text-center fw-bold">Data Barang</div>
                <table class="table">
                    <thead>
                        <tr class="f-small">
                            <th scope="col" class="col-1">No</th>
                            <th scope="col" class="col-2">Kode Barang</th>
                            <th scope="col" class="col-2">Nama Barang</th>
                            <th scope="col" class="col-2">Jumlah</th>
                            <th scope="col" class="col-1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="f-small">
                        <?php
                        if (empty($dataBarang)) {
                            echo "<tr class='text-center fw-bold'><td colspan='5' class='bg-secondary'>Data Barang Tidak Ditemukan</td></tr>";
                        } else {
                            $no = 1;
                            foreach ($dataBarang as $dBarang) :
                        ?>
                                <tr>
                                    <th scope="row"><?= $no++; ?></th>
                                    <td><?= $dBarang['kode_barang']; ?></td>
                                    <td><?= $dBarang['nama_barang']; ?></td>
                                    <td><?= $dBarang['jumlah']; ?></td>
                                    <td>
                                        <a href="update_barang.php?kode_barangUpd=<?= $dBarang['kode_barang']; ?>">
                                            <button class="btn btn-warning btn-sm"><i class="bi bi-tools"></i></button>
                                        </a>
                                        <a href="conf_barang.php?kode_barang=<?= $dBarang['kode_barang']; ?>">
                                            <button class="btn btn-danger btn-sm" name="btnDeleteBarang"><i class="bi bi-trash"></i></button>
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