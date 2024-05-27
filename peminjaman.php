<?php require_once 'auth_conf.php' ?>
<?php
require 'config.php';
$stmt = $db->prepare("SELECT * FROM peminjaman 
INNER JOIN admin ON peminjaman.id_admin = admin.id_admin
INNER JOIN karyawan ON peminjaman.id_karyawan = karyawan.id_karyawan
ORDER BY kode_peminjaman DESC
");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
if ($stmt->rowCount() > 0) {
    foreach ($result as $row) {
        $dataPeminjaman[] = $row;
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
                            <th scope="col" class="col-1">Kode Peminjaman</th>
                            <th scope="col" class="col-1">Admin</th>
                            <th scope="col" class="col-1">Peminjam</th>
                            <th scope="col" class="col-1">Tgl. Peminjam</th>
                            <th scope="col" class="col-1 text-center">status</th>
                            <th scope="col" class="col-1 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="f-small">
                        <?php
                        if (empty($dataPeminjaman)) {
                            echo "<tr class='text-center fw-bold'><td colspan='7' class='bg-secondary'>Data Peminjaman Tidak Ditemukan</td></tr>";
                        } else {
                            $no = 1;
                            foreach ($dataPeminjaman as $dPinjam) :
                        ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $dPinjam['kode_peminjaman']; ?></td>
                                    <td><?= $dPinjam['nama_admin']; ?></td>
                                    <td><?= $dPinjam['nama_karyawan']; ?></td>
                                    <td><?= $dPinjam['tgl_peminjaman']; ?></td>
                                    <td class="text-center">
                                        <?php
                                        if ($dPinjam['status'] == "kembali") {
                                            echo "<i class='badge text-bg-success'>kembali</i>";
                                        } else {
                                            echo "<i class='badge text-bg-danger'>dipinjam</i>";
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#aprove<?= $dPinjam['kode_peminjaman']; ?>"><i class="bi bi-check2-circle"></i></button>
                                        <a href="detail_peminjaman.php?kode_peminjaman=<?= $dPinjam['kode_peminjaman']; ?>"><button class="btn btn-primary btn-sm"><i class="bi bi-arrow-right-square"></i></button></a>
                                        <a href="conf_Peminjaman.php?kodePDel=<?= $dPinjam['kode_peminjaman']; ?>"><button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button></a>
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

<!-- Button trigger modal -->

<!-- Modal -->
<?php foreach ($dataPeminjaman as $dPinjam) : ?>
    <div class="modal fade" id="aprove<?= $dPinjam['kode_peminjaman']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="conf_peminjaman.php" method="post">
                                <input type="text" name="kode_peminjaman" value="<?= $dPinjam['kode_peminjaman']; ?>" hidden>
                                <div class="col-12 text-center">
                                    <p class="fw-bold text-center">Konfirmasi Pengembalian Barang</p>
                                    <button class="btn btn-success" value="kembali" name="btnKembali"><i class="bi bi-check2"></i></button>
                                    <button class="btn btn-danger" value="dipinjam" name="btnDipinjam"><i class="bi bi-x"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php require 'foother.php'; ?>