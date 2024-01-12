<?= $this->extend('admin/layout/admin') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Table Transaksi</h1>
    <p class="mb-4">Tabel ini merupakan table yang mengelola data Transaksi dengan opsi menghapus data.</p>
    <p>KETERANGAN:</p>
    <a class="btn btn-info" style="margin-right: 10px;">
        <i class="fas fa-eye"></i>
    </a><span style="vertical-align: middle;">Digunakan untuk melihat data</span></p>
    <p><a class="btn btn-warning" style="margin-right: 10px;">
            <i class="fas fa-pencil-alt"></i>
        </a><span>Digunakan untuk mengubah data</span></p>
    <p><a class="btn btn-danger" style="margin-right: 10px;">
            <i class="fas fa-trash-alt"></i>
        </a><span>Digunakan untuk menghapus data</span></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold " style="color: #d4a762;">DataTables Manajemen Transaksi</h6>
        </div>
        <div class="card-body">
            <div class="text-weight mb-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Nomor WhatsApp</th>
                                    <th>Alamat</th>
                                    <th>Total Harga</th>
                                    <th>Status Transaksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Nomor WhatsApp</th>
                                    <th>Alamat</th>
                                    <th>Total Harga</th>
                                    <th>Status Transaksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($transaksi as $t) : ?>
                                    <tr>
                                        <td><?= $t['tanggal_transaksi']; ?></td>
                                        <td><?= $t['nama_pelanggan']; ?></td>
                                        <td><?= $t['nomor_telepon']; ?></td>
                                        <td><?= $t['alamat']; ?></td>
                                        <td><?= 'Rp ' . number_format($t['total_harga'], 0, ",", "."); ?></td>
                                        <td><?= $t['status_transaksi']; ?></td>
                                        <td>
                                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#lihatModal<?= $t['id_transaksi']; ?>"><i class="fas fa-eye"></i></a>
                                            <div class="modal fade" id="lihatModal<?= $t['id_transaksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="lihatModalLabel<?= $t['id_transaksi']; ?>" aria-hidden="true">
                                                <div class="modal-dialog" role="document" style="max-width: 540px; width: 100%; margin: 1.75rem auto;">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                            <h3 class="modal-title" id="lihatModalLabel<?= $t['id_transaksi']; ?>"></h3>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4 class="h2 mb-3" style="color: #d4a762; font-family: 'Playball', cursive; text-align: center;">
                                                                <strong>Sotang Mangga Tiga</strong>
                                                                <h6 class="text-center">Jl Poros Mangga 3 Blok B2</h6>
                                                                <h6 class="text-center mb-4"><?= $t['tanggal_transaksi']; ?></h6>
                                                                <div style="display: flex; flex-direction: column;">
                                                                    <div style="display: flex; align-items: center;">
                                                                        <p style="min-width: 150px; margin-right: 20px;">Nama Pelanggan</p>
                                                                        <p>: <?= $t['nama_pelanggan']; ?></p>
                                                                    </div>
                                                                    <div style="display: flex; align-items: center;">
                                                                        <p style="min-width: 150px; margin-right: 20px;">Nomor Telepon</p>
                                                                        <p>: <?= $t['nomor_telepon']; ?></p>
                                                                    </div>
                                                                    <div style="display: flex; align-items: center;">
                                                                        <p style="min-width: 150px; margin-right: 20px;">Alamat</p>
                                                                        <p>: <?= $t['alamat']; ?></p>
                                                                    </div>
                                                                </div>
                                                                <table class="table table-borderless" style="border: 1px solid #808080;">
                                                                    <thead>
                                                                        <tr style="background-color: #d4a762; color: white; border: 1px solid #808080;">
                                                                            <th style="border: 1px solid #808080; text-align: center;">Nama Produk</th>
                                                                            <th style="border: 1px solid #808080; text-align: center;">Jumlah Pembelian</th>
                                                                            <th style="border: 1px solid #808080; text-align: center;">Harga Satuan</th>
                                                                            <th style="border: 1px solid #808080; text-align: center;">Total Harga</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach ($t['detailTransaksi'] as $detail) : ?>
                                                                            <tr style="background-color: #F5DEB3; border: 1px solid #808080;">
                                                                                <td style="border: 1px solid #808080; text-align: center;"><?= $detail['nama_produk']; ?></td>
                                                                                <td style="border: 1px solid #808080; text-align: center;"><?= $detail['jumlah_pembelian']; ?></td>
                                                                                <td style="border: 1px solid #808080; text-align: center;"><?= 'Rp ' . number_format($detail['harga'], 0, ",", "."); ?></td>
                                                                                <td style="border: 1px solid #808080; text-align: center;"><?= 'Rp ' . number_format($detail['total_harga_pembelian'], 0, ",", "."); ?></td>
                                                                            </tr>
                                                                        <?php endforeach; ?>
                                                                    </tbody>
                                                                </table>
                                                                <div style="display: flex; flex-direction: column;">
                                                                    <div style="display: flex; align-items: center;">
                                                                        <p style="min-width: 150px; margin-right: 20px;">Total Keseluruhan</p>
                                                                        <p>: <?= 'Rp ' . number_format($t['total_harga'], 0, ",", "."); ?></p>
                                                                    </div>
                                                                    <div style="display: flex; align-items: center;">
                                                                        <p style="min-width: 150px; margin-right: 20px;">Catatan Pelanggan</p>
                                                                        <p>: <?= $t['catatan']; ?></p>
                                                                    </div>
                                                                    <div style="display: flex; align-items: center;">
                                                                        <p style="min-width: 150px; margin-right: 20px;">Status Transaksi</p>
                                                                        <p>: <?= $t['status_transaksi']; ?></p>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="<?= site_url('admin/transaksiedit/' . $t['id_transaksi']); ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <!-- Tombol untuk membuka modal -->
                                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal<?= $t['id_transaksi']; ?>"><i class="fas fa-trash-alt"></i></a>

                                            <!-- Modal Konfirmasi Delete -->
                                            <div class="modal fade" id="confirmDeleteModal<?= $t['id_transaksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel<?= $t['id_transaksi']; ?>" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirmDeleteModalLabel<?= $t['id_transaksi']; ?>">Konfirmasi Penghapusan</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus transaksi ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <a href="<?= site_url('admin/transaksidestroy/' . $t['id_transaksi']); ?>" class="btn btn-danger">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
<?= $this->endSection() ?>