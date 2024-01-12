<?= $this->extend('admin/layout/admin') ?>
<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4  mb-4"  style="color: #d4a762;"><strong>Edit Data Produk</strong></h1>
                    </div>
                    <form class="user" action="<?= route_to('produkeditstore') ?>" method="post" enctype="multipart/form-data">
                        <!-- Tambahkan input hidden untuk menyimpan ID produk yang diubah -->
                        <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
                        <div class="form-group row">
                            <label for="exampleName" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <!-- Isi value dengan data produk yang ingin diubah -->
                                <input type="text" class="form-control" id="exampleName" name="nama_produk" value="<?= $produk['nama_produk'] ?>" placeholder="Masukkan Nama Produk">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleEmail" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <!-- Isi value dengan data produk yang ingin diubah -->
                                <input type="text" class="form-control" id="exampleEmail" name="deskripsi_produk" value="<?= $produk['deskripsi_produk'] ?>" placeholder="Masukkan Deskripsi Produk">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleEmail" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <!-- Isi value dengan data produk yang ingin diubah -->
                                <input type="number" class="form-control" id="exampleEmail" name="harga" value="<?= $produk['harga'] ?>" placeholder="Masukkan Harga Produk (Hanya Angka)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputGroupSelect01" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="inputGroupSelect01" name="status">
                                    <!-- Pilih opsi sesuai dengan data produk yang ingin diubah -->
                                    <option value="Tersedia" <?= ($produk['status'] == 'Tersedia') ? 'selected' : '' ?>>Tersedia</option>
                                    <option value="Tidak tersedia" <?= ($produk['status'] == 'Tidak Tersedia') ? 'selected' : '' ?>>Tidak Tersedia</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleFile" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <!-- Isi value dengan data produk yang ingin diubah -->
                                <input style="border: none;" type="file" class="form-control" id="exampleFile" name="foto" value="<?= $produk['foto'] ?>" placeholder="Masukkan Foto Anda">
                            </div>
                        </div>
                        <td>
                                      <button class="col-sm-6 offset-sm-3 btn btn-primary" type="button" data-toggle="modal" data-target="#Modaledit"  style="background-color: #d4a762; border-color: #d4a762;">
                                      Simpan Perubahan
                                      </button>
                                    </td>

                                    <div class="modal fade" id="Modaledit" tabindex="-1" role="dialog" aria-labelledby="ModaleditLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="ModaleditLabel">Konfirmasi Edit</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            Apakah Anda yakin ingin mengedit ini?
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary" id="tombolEdit2" style="background-color: #d4a762; border-color: #d4a762; color: white;">Ya, Edit</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                      </div>
                                    </div>
                                  </form>


                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>