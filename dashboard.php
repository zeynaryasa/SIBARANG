<?php require_once 'auth_conf.php' ?>
<?php require 'header.php'; ?>
<style>
    .my-row {
        margin-bottom: -10px !important;
    }
</style>
<?php
require 'config.php';
$tgl = date('Y-m-d');
$tglP = date('Ymd', strtotime($tgl));

// Query untuk mendapatkan index terakhir pada tanggal tersebut
$stmt = $db->prepare("SELECT kode_peminjaman FROM peminjaman WHERE kode_peminjaman LIKE :kode ORDER BY kode_peminjaman DESC LIMIT 1");
$stmt->execute(['kode' => "P$tglP%"]);

// Jika ada hasil, tambahkan 1 ke index. Jika tidak, index adalah 001.
if ($stmt->rowCount() > 0) {
    $last_kode = $stmt->fetch(PDO::FETCH_ASSOC)['kode_peminjaman'];
    $last_index = (int) substr($last_kode, -3);
    $next_index = str_pad($last_index + 1, 3, '0', STR_PAD_LEFT);
} else {
    $next_index = '001';
}

// Buat kode peminjaman baru
$kode_peminjaman = "P$tglP$next_index";


?>
<!-- body template -->
<div class="row mt-2">
    <div class="col-6">
        <!-- content -->
        <!-- change this to your content -->
        <div class="card mb-5">
            <div class="card-body">
                <!-- form cari data barang by kode Barang -->
                <form action="conf_keranjangBarang.php" method="POST">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3 mt-2">
                                    <input type="text" name="kodeBarang" class="form-control fw-bold" id="kodeBarang" placeholder="Masukan Kode Barang" required autofocus>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col">
                        <a href="resetCart.php"><button class="btn btn-danger btn-sm"><i class="bi bi-trash">Reset</i></button></a>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="bi bi-person"></i>
                        </button>

                    </div>
                </div>
                <form action="conf_cart.php" method="post">
                    <table class="table table-striped">
                        <thead>
                            <tr class="f-small">
                                <th scope="col" class="fw-bold">Kode Barang</th>
                                <th scope="col" class=" fw-bold">Nama Barang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($_SESSION['cart'])) : ?>
                                <?php foreach ($_SESSION['cart'] as $bKeranjang) : ?>
                                    <tr>
                                        <td class="f-small"><?= $bKeranjang['kode_barang']; ?></td>
                                        <td class="f-small"><?= $bKeranjang['nama_barang']; ?></td>
                                        <!-- <td class="f-small">
                                            <form action="" method="post">
                                                <input type="text" name="kode_barang" value="<?= $bKeranjang['kode_barang']; ?>" hidden>
                                                <button class="btn btn-danger btn-sm" name="btnUnsetCart"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td> -->
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </form>

            </div>
        </div>
        <!-- end content -->
    </div>

    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <form action="conf_Peminjaman.php" method="post">
                    <div class="row mb-3">
                        <div class="col text-center">
                            <strong class="fw-bold fs-5">Data Peminjaman</strong>
                        </div>
                    </div>
                    <div class="my-row">
                        <div class="col">
                            <p class="f-small"><strong>Kode Peminjaman : </strong><?= $kode_peminjaman; ?>
                                <input type="text" name="kode_peminjaman" value="<?= $kode_peminjaman; ?>" hidden>
                                <button class="btn btn-success btn-sm" name="btnInsertPeminjaman"><i class="bi bi-check2"></i></button>
                            </p>
                        </div>
                    </div>
                    <div class="my-row">
                        <div class="col">
                            <input type="text" name="tgl_peminjaman" value="<?= date('Y-m-d'); ?>" hidden>
                            <p class="f-small"><strong>Tgl. Peminjaman : </strong><?= date('d F Y'); ?></p>
                        </div>
                    </div>
                    <div class="my-row">
                        <div class="col-6">
                            <input type="text" name="id_admin" value="<?= $_SESSION['id_admin']; ?>" hidden>
                            <p class="f-small"><strong>Admin : </strong><?= $_SESSION['nama_admin']; ?></p>
                        </div>
                    </div>
                    <div class="my-row">
                        <div class="col-12">
                            <?php if (isset($_SESSION['id_karyawan']) && isset($_SESSION['nama_karyawan'])) : ?>
                                <input type="text" name="id_karyawan" value="<?= $_SESSION['id_karyawan']; ?>" hidden>
                                <p class="f-small"><strong>Peminjam : </strong><?= $_SESSION['nama_karyawan'] ?>
                                    <button class=" ms-3 btn btn-danger btn-sm" name="btnUnsetSesionKaryawan"><i class="bi bi-x"></i></button>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="my-row mt-2">
                        <div class="col-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="f-small">No</th>
                                        <th class="f-small">Kode Barang</th>
                                        <th class="f-small">Nama Barang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($_SESSION['cart'])) : ?>
                                        <?php $no = 1;
                                        foreach ($_SESSION['cart'] as $bKeranjang) : ?>
                                            <tr>
                                                <td class="f-small"><?= $no++; ?></td>
                                                <td class="f-small"><?= $bKeranjang['kode_barang']; ?></td>
                                                <td class="f-small"><?= $bKeranjang['nama_barang']; ?></td>

                                                <!-- area input hidden -->
                                                <input type="text" name="kode_barang[]" value="<?= $bKeranjang['kode_barang']; ?>" hidden>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="my-row mt-2">
                        <div class=" text-center">
                            <p class="fw-bold"><?= $nameApp; ?></p>
                        </div>
                    </div>
                    <div class="my-row">
                        <div class="col text-center">
                            <p class="fw-bold"><?= $companyName; ?></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end body template -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form action="conf_keranjangBarang.php" method="post">
                    <div class="row">
                        <div class="col">
                            <input type="text" name="id_karyawan" class="form-control" placeholder="Masukan ID Karyawan" required autofocus>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require 'foother.php'; ?>