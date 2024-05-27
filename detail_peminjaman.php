<?php require_once 'auth_conf.php' ?>
<?php
require 'config.php';
$stmt = $db->prepare("SELECT * FROM detail_peminjaman 
INNER JOIN peminjaman ON detail_peminjaman.kode_peminjaman = peminjaman.kode_peminjaman
INNER JOIN barang ON detail_peminjaman.kode_barang = barang.kode_barang
WHERE detail_peminjaman.kode_peminjaman = '" . $_GET['kode_peminjaman'] . "'
");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
if ($stmt->rowCount() > 0) {
    foreach ($result as $row) {
        $dataDetailPeminjaman[] = $row;
    }
}
?>

<?php require 'header.php'; ?>
<!-- body tenplate -->
<div class="col">
    <button class="btn btn-secondary btn-sm"><i class="bi bi-printer"></i></button>
</div>
<div class="row mt-2">
    <div class="col">
        <!-- content -->
        <!-- change this to your content -->
        <div class="card">
            <div class="card-body">
                <div class="card-title text-center fw-bold">Data Peminjaman</div>
                <table class="table">
                    <thead>
                        <tr class="f-small">
                            <th scope="col" class="col-1">No</th>
                            <th scope="col" class="col-2">Kode Peminjaman</th>
                            <th scope="col" class="col-2">Kode Barang</th>
                            <th scope="col" class="col-2"> Barang</th>
                            <th scope="col" class="col-1 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="f-small">
                        <?php
                        if (empty($dataDetailPeminjaman)) {
                            echo "<tr class='text-center fw-bold'><td colspan='5' class='bg-secondary'>Detail Data Peminjaman Tidak Ditemukan</td></tr>";
                        } else {
                            $no = 1;
                            foreach ($dataDetailPeminjaman as $dDPinjam) :
                        ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $dDPinjam['kode_peminjaman']; ?></td>
                                    <td><?= $dDPinjam['kode_barang']; ?></td>
                                    <td><?= $dDPinjam['nama_barang']; ?></td>
                                    <td class="text-center">
                                        <a href="peminjaman.php"><button class="btn btn-success btn-sm"><i class="bi  bi-arrow-left-square"></i></button></a>
                                        <a href="conf_detailPeminjaman.php?kBarangDetail=<?= $dDPinjam['kode_barang']; ?>&kodeP=<?= $dDPinjam['kode_peminjaman']; ?>"><button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button></a>
                                    </td>
                                </tr>
                        <?php endforeach;
                        } ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end content -->
    </div>
</div>
<!-- end body template -->
<?php require 'foother.php'; ?>