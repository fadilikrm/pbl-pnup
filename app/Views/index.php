<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Sotang Mangga Tiga</title>
  <base href="<?php echo base_url('/frontend') ?>/">
  <?php $session = session(); ?>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="keywords" />
  <meta content="" name="description" />
  <link rel="icon" type="image/png" href="img/logo.png">
  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playball&display=swap" rel="stylesheet" />

  <!-- Icon Font Stylesheet -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet" />
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet" />
  <link href="lib/owlcarousel/owl.carousel.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet" />
</head>

<body>
  <!-- Spinner Start -->
  <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
  </div>
  <!-- Spinner End -->

  <!-- Navbar start -->
  <div class="container-fluid nav-bar">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn fixed-top" style="background-color: var(--bs-light)" data-wow-delay="0.1s">
        <a href="index.html" class="navbar-brand ms-3 ms-lg-0">
          <img class="custom-logo" src="img/logo.png">
        </a>
        <button style="margin-right: 30px;" class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="fa fa-bars text-primary"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav mx-auto">
            <a href="<?= base_url('home') ?>" class="nav-item nav-link active">Home</a>
            <a href="<?= base_url('#About') ?>" class="nav-item nav-link">About</a>
            <div class="nav-item dropdown">
              <a href="<?= base_url('#Produk') ?>" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Produk</a>
              <div class="dropdown-menu bg-light">
                <a href="<?= base_url('#Menu') ?>" class="nav-item nav-link">Menu</a>
                <a href="<?= base_url('#Order') ?>" class="nav-item nav-link">Order</a>
                <?php if (session()->has('pelanggan')) : ?>
                  <a href="<?= base_url('#Testimoni') ?>" class="nav-item nav-link">Komentar</a>
                <?php endif ?>
                <a href="<?= base_url('#TestimoniReview') ?>" class="nav-item nav-link">Review</a>
              </div>
            </div>
            <a href="<?= base_url('#Gallery') ?>" class="nav-link nav-item">Gallery</a>
            <?php if (!session()->has('pelanggan')) : ?>
              <a href="<?= route_to('pelangganlogin') ?>" class="nav-item nav-link">Login</a>
            <?php else : ?>
              <a href="<?= route_to('pelangganlogout') ?>" class="nav-item nav-link">Logout</a>
          </div>
          <div class="nav-item">
            <a href="#" data-bs-toggle="modal" data-bs-target="#keranjangModal">
              <i class="fa fa-shopping-cart"></i>
            </a>
          </div>
          <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span style="padding-right:10px" class="mr-2 d-none d-lg-inline text-gray-600 large with-divider border-left"><?= session('nama_pelanggan') ?></span>
              <img class="img-profile rounded-circle" src="<?= base_url('/public/pelanggan/img/' . $session->get('foto')) ?>" style="width: 70px;" />
            </a>
            <div class="dropdown-menu bg-light" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="<?= route_to('pelangganeditprofile', session('id_pelanggan')) ?>">Profile</a>
              <a class="dropdown-item" href="<?= route_to('pelangganlogout') ?>">Logout</a>
            </div>
          </div>
        <?php endif; ?>
        </div>
      </nav>
    </div>
  </div>
  <br><br>
  <!-- Navbar End -->

  <!-- Hero Start -->
  <div class="container-fluid bg-light py-6 my-6 mt-0">
    <div class="container">
      <div class="row g-5 align-items-center">
        <div class="col-lg-7 col-md-12">
          <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-4 animated bounceInDown">Welcome to Sotang Mangga Tiga</small>
          <h1 class="display-1 mb-4 animated bounceInDown">Cemilan <span class="text-primary"> Enak</span> Dan<span class="text-primary"> Mengenyangkan</span></h1>
          <a href="#Order" class="btn btn-primary border-0 rounded-pill py-3 px-4 px-md-5 me-4 animated bounceInLeft">Book Now</a>
          <a href="#About" class="btn btn-primary border-0 rounded-pill py-3 px-4 px-md-5 animated bounceInLeft">Know More</a>
        </div>
        <div class="col-lg-5 col-md-12">
          <img src="img/home website.png" class="img-fluid rounded animated zoomIn" alt="" />
        </div>
      </div>
    </div>
  </div>
  <!-- Hero End -->

  <!-- About Satrt -->
  <section id="About">
    <div class="container-fluid py-6">
      <div class="container">
        <div class="row g-5 align-items-center">
          <div class="col-lg-4 wow bounceInUp " data-wow-delay="0.1s">
            <img src="img/about.jpg" class="img-fluid rounded center" alt="" style="width: 100%;" />
          </div>
          <div class="col-lg-8 wow bounceInUp" data-wow-delay="0.3s">
            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">About Us</small>
            <h1 class="display-5 mb-4">Cemilan Viral dari Korea</h1>
            <p class="mb-4">
              Sotang Mangga Tiga adalah UMKM yang menyajikan makanan viral dari Korea, terutama cemilan enak dan mengenyangkan yang sangat digemari oleh anak muda. Berdiri sejak 2021, usaha ini dirintis dari awal dan telah meraih rating 4.7 dalam penjualan online melalui platform seperti Gojek GoFood. Sotang adalah hidangan Korea yang memikat dengan cita rasa khas, dan mereka telah menjadi pilihan favorit bagi kalangan muda yang mencari camilan lezat dan mengenyangkan.
            </p>
            <div class="row g-4 text-dark mb-5">
              <div class="col-sm-6"><i class="fas fa-share text-primary me-2"></i>Fresh and Fast food Delivery</div>
              <div class="col-sm-6"><i class="fas fa-share text-primary me-2"></i>24/7 Customer Support</div>
              <div class="col-sm-6"><i class="fas fa-share text-primary me-2"></i>Easy Customization Options</div>
              <div class="col-sm-6"><i class="fas fa-share text-primary me-2"></i>Delicious Deals for Delicious Meals</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- About End -->

  <!-- Menu Start -->
  <section id="Menu">
    <div class="container-fluid menu bg-light py-6 my-6">
      <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
          <h1 class="display-5 mb-5">Menu</h1>
        </div>
        <div class="tab-class text-center">
          <div class="tab-content">
            <div id="tab-6" class="tab-pane fade show p-0 active">
              <div class="row g-4">
                <?php foreach ($produk as $pr) : ?>
                  <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s">
                    <div class="menu-item d-flex align-items-center">
                      <img class="flex-shrink-0" style="max-width:125px;" src="<?= base_url('public/produk/img/' . $pr['foto']); ?>" alt="Product Image" />
                      <div class="w-100 d-flex flex-column text-start ps-4">
                        <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                          <h4><?= $pr['nama_produk']; ?></h4>
                          <h4 class="text-primary"><?= 'Rp ' . number_format($pr['harga'], 0, ",", "."); ?></h4>
                        </div>
                        <p class="mb-0"><?= $pr['deskripsi_produk']; ?></p>
                        <p class="mb-0"><b><?= $pr['status']; ?></b></p>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
  </section>
  <!-- Menu End -->

  <!--  Order Start -->
  <section id="Order">
    <div class="container-fluid service py-6">
      <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
          <h1 class="display-5 mb-5">Order Here</h1>
        </div>
        <div class="row g-4">
          <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
            <div class="bg-light rounded service-item">
              <div class="service-content d-flex align-items-center justify-content-center p-4">
                <div class="service-content-icon text-center">
                  <img class="flex-shrink-0 img-fluid rounded-circle" src="img/order_grab.png" alt="">
                  <h4 class="mb-3">Grab Food</h4>
                  <a href="#" class="btn btn-primary px-4 py-2 rounded-pill">Order Now</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.3s">
            <div class="bg-light rounded service-item">
              <div class="service-content d-flex align-items-center justify-content-center p-4">
                <div class="service-content-icon text-center">
                  <img class="flex-shrink-0 img-fluid rounded-circle" src="img/order_gojek.png" alt="">
                  <h4 class="mb-3">Go Food</h4>
                  <a href="https://gofood.co.id/id/makassar/restaurant/sotang-mangga-tiga-22ffdad7-a121-4f04-9398-51ae5db51383" class="btn btn-primary px-4 py-2 rounded-pill">Order Now</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.5s">
            <div class="bg-light rounded service-item">
              <div class="service-content d-flex align-items-center justify-content-center p-4">
                <div class="service-content-icon text-center">
                  <img class="flex-shrink-0 img-fluid rounded-circle" src="img/order_shopee.png" alt="">
                  <h4 class="mb-3">Shopee Food</h4>
                  <a href="https://shopee.co.id/universal-link/now-food/shop/1027111?deep_and_deferred=1&shareChannel=copy_link" class="btn btn-primary px-4 py-2 rounded-pill">Order Now</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.7s">
            <div class="bg-light rounded service-item">
              <div class="service-content d-flex align-items-center justify-content-center p-4">
                <div class="service-content-icon text-center">
                  <img class="flex-shrink-0 img-fluid rounded-circle" src="img/order_wat.png" alt="">
                  <h4 class="mb-3">Whatsapp</h4>
                  <a href="https://api.whatsapp.com/send/?phone=628991587184&text&type=phone_number&app_absent=0" class="btn btn-primary px-4 py-2 rounded-pill">Order Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Order End -->

  <!-- Testimoni Start -->
  <!-- Form -->
  <?php if (session()->has('pelanggan')) : ?>
    <section id="Testimoni">
      <div class="container">
        <div class="row text-center mb-3">
          <h1>Testimoni</h1>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <!-- Form untuk submit testimoni -->
          <form action="<?= route_to('testimonitambahstore') ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <input type="hidden" class="form-control" name="date" readonly>
            </div>
            <div class="mb-3">
              <input type="hidden" class="form-control" value="<?= session('nama_pelanggan') ?>" name="nama_pelanggan" readonly>
            </div>
            <div class="mb-3">
              <input type="hidden" class="form-control" value="<?= session('email') ?>" name="email" readonly>
            </div>
            <div class="mb-3">
              <input type="hidden" class="form-control" value="<?= session('foto') ?>" name="foto" readonly>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Judul Komentar</label>
              <input type="text" class="form-control" name="judul">
            </div>
            <br>
            <div class="mb-3">
              <label for="deskripsi" class="form-label">Deskripsi</label>
              <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
          </form>
        </div>
      </div>
    </section>
  <?php endif; ?>


  <br><br>
  <!-- Testimoni Review-->
  <section id="CustomerReview">
    <div class="container-fluid bg-light bg-icon py-6 mb-5" id="testimoni">
      <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
          <h1 class="display-5 mb-3">Customer Review</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
          <?php foreach ($testimoniData as $testimoni) : ?>
            <div class="testimonial-item position-relative bg-white p-5 mt-4">
              <span class="testimonial-date position-absolute top-0 end-0 me-5 mt-2 text-end"><?= $testimoni['date'] ?></span>
              <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
              <h4 class="mb-0"><?= esc($testimoni['judul']) ?></h4>
              <p class="mb-4"><?= esc($testimoni['deskripsi']) ?></p>
              <div class="d-flex align-items-center">
                <img class="flex-shrink-0 rounded-circle" style="width: 50px; height:50px;" src="<?= base_url('public/pelanggan/img/' . $testimoni['foto']) ?>" alt="">
                <div class="ms-3">
                  <h5 class="mb-1"><?= $testimoni['nama_pelanggan'] ?></h5>
                  <span><?= $testimoni['email'] ?></span>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>
  <!-- Testimoni End -->
  <!-- Galery Start -->
  <section id="Gallery">
    <div class="container-fluid event py-6">
      <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
          <h1 class="display-5 mb-5">Dokumentasi UMKM</h1>
        </div>
        <?php foreach ($galerifoto as $gf) : ?>
          <div class="tab-class text-center" id="Foto">
            <div class="tab-content">
              <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                  <div class="col-lg-12">
                    <div class="row g-4">
                      <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s">
                        <div class="event-img position-relative">
                          <img class="img-fluid rounded w-100" src="<?= base_url('public/galerifoto/img/' . $gf['foto']) ?>" alt="">
                          <div class="event-overlay d-flex flex-column p-4">
                            <h4 class="me-auto"><?= $gf['nama_foto'] ?></h4>
                            <a href="<?= base_url('public/galerifoto/img/' . $gf['foto']) ?>" data-lightbox="event-1" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                          </div>
                        </div>
                        <h5 style="margin-top: 10px;"><?= $gf['deskripsi_foto'] ?></h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <!-- Events End -->

  <!-- Footer Start -->
  <div class="container-fluid footer py-6 my-6 mb-0 bg-light wow bounceInUp" data-wow-delay="0.1s">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="footer-item">
            <h1 class="text-primary">Sotang<span class="text-dark">Mangga tiga</span></h1>
            <p class="lh-lg mb-4">Cemilan Enak Dan Mengenyangkan</p>
            <p class="lh-lg mb-4">follow our social media to get more information</p>
            <div class="footer-icon d-flex">
              <a class="btn btn-primary btn-sm-square me-2 rounded-circle" href="https://www.facebook.com/profile.php?id=100095358068792&mibextid=LQQJ4d"><i class="fab fa-facebook-f"></i></a>
              <a class="btn btn-primary btn-sm-square me-2 rounded-circle" href="https://api.whatsapp.com/send/?phone=628991587184&text&type=phone_number&app_absent=0"><i class="fab fa-whatsapp"></i></a>
              <a href="https://www.instagram.com/sotang_manggatiga/" class="btn btn-primary btn-sm-square me-2 rounded-circle"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="footer-item">
            <h4 class="mb-4">Contact Us</h4>
            <div class="d-flex flex-column align-items-start">
              <p><i class="fa fa-map-marker-alt text-primary me-2"></i> Indonesia,Sulawesi Selatan,Makassar</p>
              <p><i class="fa fa-phone-alt text-primary me-2"></i> +62 899-1587-184</p>
              <p><i class="fas fa-envelope text-primary me-2"></i> sotang3@gmail.com</p>
              <p><i class="fa fa-clock text-primary me-2"></i> 24/7 Hours Service</p>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6">
          <div class="footer-item">
            <h4 class="mb-4">Maps</h4>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31851.142335608496!2d119.49288301983734!3d-5.146403873213386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbefd44aa16d629%3A0x53e64efe9e1d4a16!2sSotang%20mangga%20tiga!5e0!3m2!1sen!2sid!4v1698998503611!5m2!1sen!2sid" width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- Footer End -->

  <!-- Copyright Start -->
  <div class="container-fluid copyright  py-4" style="background: #D4A672;">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
          <span class="text-light"><a href="#"><i class="fas fa-copyright text-dark me-2"></i></a>Sotang Mangga Tiga, All right reserved.</span>
        </div>

      </div>
    </div>
  </div>
  <!-- Copyright End -->

  <!-- Modal Logout -->
  <section id="logoutModal">
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Modal Logout -->

  <!-- Back to Top -->
  <a href="#" class="btn btn-md-square btn-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

  <div class="modal" id="keranjangModal" tabindex="-1" role="dialog" aria-labelledby="keranjangModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <!-- Isi dari modal di sini -->
        <div class="modal-header">
          <h5 class="modal-title" id="keranjangModalLabel">Keranjang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
          <form action="<?= route_to('keranjangtambahstore') ?>" method="post" enctype="multipart/form-data" class="checkout-button">
            <div class="table-responsive">
              <!-- Tabel Produk -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Produk</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah Pembelian</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($produk as $pr) : ?>
                    <!-- Product Row -->
                    <tr class="product-row">
                      <th scope="row">
                        <div class="d-flex align-items-center">
                          <img src="<?= base_url('public/produk/img/' . $pr['foto']); ?>" alt="Product Image" class="flex-shrink-0" style="max-width:125px;">
                        </div>
                      </th>
                      <td>
                        <p class="mb-0 mt-4"><?= $pr['nama_produk'] ?></p>
                      </td>
                      <td class="price">
                        <p class="mb-0 mt-4"><?= 'Rp ' . number_format($pr['harga'], 0, ",", "."); ?></p>
                      </td>
                      <td>
                        <div class="input-group quantity mt-4" style="width: 100px;">
                          <input type="number" name="quantity_<?= $pr['id_produk'] ?>" class="form-control form-control-sm text-center border-0 quantity-input" value="1">
                        </div>
                      </td>
                      <td class="total">
                        <p class="mb-0 mt-4">Rp 0</p>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- Subtotal Section -->
            <div class="subtotal-section">
              <h4 class="mt-4">Total: <span id="subtotal">Rp 0</span></h4>
            </div>
            <!-- Checkout Button -->
            <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4">Checkout</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- JavaScript Libraries -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
</body>

</html>