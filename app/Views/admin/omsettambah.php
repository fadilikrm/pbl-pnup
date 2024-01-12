<?= $this->extend('admin/layout/admin') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
    <div class="table-responsive">
        <form action="<?= route_to('omsettambahstore') ?>" method="post" enctype="multipart/form-data">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah Produk Terjual</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produk as $pr) : ?>
                        <tr>
                            <td>
                                <input type="date" class="form-control form-control-sm text-center border-0" name="date" value="<?= date('Y-m-d'); ?>">
                            </td>

                            <th scope="row">
                                <div class="d-flex align-items-center">
                                    <img src="<?= base_url('public/produk/img/' . $pr['foto']); ?>" alt="Foto Profil" style="max-width: 100px;">
                                </div>
                            </th>
                            <td>
                                <p class="mb-0 mt-4"><?= $pr['nama_produk']; ?></p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4"><?= 'Rp ' . number_format($pr['harga'], 0, ",", "."); ?></p>
                            </td>
                            <td>
                                <div class="input-group quantity mt-4" style="width: 100px;">
                                    <input type="hidden" name="id_produk[<?= $index; ?>]" value="<?= $pr['id_produk']; ?>">
                                    <input type="number" class="form-control form-control-sm text-center border-0" name="jumlah_beli_produk[<?= $index; ?>]">
                                    <?php $index++; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="container">
                <div class="row">
                    <!-- Right Section -->
                    <td>
                                        <button class="mx-auto btn btn-primary" type="button" data-toggle="modal" data-target="#konfirmasiModal"  style="background-color: #d4a762; border-color: #d4a762;">
                                          Tambahkan
                                        </button>
                                      </td>
                                      
                                      <div class="modal fade" id="konfirmasiModal" tabindex="-1" role="dialog" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi Penambahan Data</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              Apakah Anda yakin ingin menambahkan data ini?
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                              <button type="submit" class="btn btn-primary" id="tambahkanBtn5" style="background-color: #d4a762; border-color: #d4a762; color: white;">Ya, Tambahkan</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                        </div>
                                      </div>
                                  </form>
    </div>
</div>
<?= $this->endSection() ?>