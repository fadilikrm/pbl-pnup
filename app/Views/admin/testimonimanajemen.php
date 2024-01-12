<?= $this->extend('admin/layout/admin') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Table Testimoni</h1>
    <p class="mb-4">Tabel ini merupakan table yang mengelola data testimoni dengan opsi menghapus data.</p>
    <p>KETERANGAN:</p>

    <p><a  class="btn btn-danger" style="margin-right: 10px;">
    <i class="fas fa-trash-alt"></i>
    </a><span>Digunakan untuk menghapus data</span></p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Manajemen Testimoni</h6>
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
                                    <th>Foto</th>
                                    <th>Email</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Foto</th>
                                    <th>Email</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($testimoniData as $t) : ?>
                                    <tr>
                                        <td><?= $t['date']; ?></td>
                                        <td><?= $t['nama_pelanggan']; ?></td>
                                        <td> <img src="<?= base_url('public/pelanggan/img/' . $t['foto']); ?>" alt="Foto Profil" style="max-width: 100px;"></td>
                                        <td><?= $t['email']; ?></td>
                                        <td><?= $t['judul']; ?></td>
                                        <td><?= $t['deskripsi']; ?></td>
                                        <td>
                                            <!-- Tombol untuk membuka modal -->
                                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal<?= $t['id_testimoni']; ?>"><i class="fas fa-trash-alt"></i></a>
                                            <!-- Modal Konfirmasi Delete -->
                                            <div class="modal fade" id="confirmDeleteModal<?= $t['id_testimoni']; ?>" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel<?= $t['id_testimoni']; ?>" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirmDeleteModalLabel<?= $t['id_testimoni']; ?>">Konfirmasi Penghapusan</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus testimoni ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <a href="<?= site_url('admin/testimonidestroy/' . $t['id_testimoni']); ?>" class="btn btn-danger">Hapus</a>
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
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?= $this->endSection() ?>