<?= $this->extend('admin/layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tabel Omset Harian</h1>
    <p class="mb-4">Tabel ini merupakan table yang menampilkan data omset harian</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #d4a762;">Data Omset Harian</h6>
        </div>
        <div class="card-body">
            <div class="text-weight mb-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Omset</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($detail_harian as $row) : ?>
                                    <tr>
                                        <td><?= $row->date; ?></td>
                                        <td><?= 'Rp ' . number_format($row->detail_harian, 0, ',', '.'); ?></td>
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

<?= $this->endSection() ?>
