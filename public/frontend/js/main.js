(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner(0);
    
    
    // Initiate the wowjs
    new WOW().init();
    
    
   // Back to top button
   $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
        $('.back-to-top').fadeIn('fast');
    } else {
        $('.back-to-top').fadeOut('fast');
    }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 500, 'easeInOutExpo');
        return false;
    });


    // Modal Video
    $(document).ready(function () {
        var $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);

        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Testimonial carousel

    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 25,
        loop: true,
        center: true,
        dots: false,
        nav: true,
        navText : [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });

    
})(jQuery);




  // Fungsi untuk memperbarui total per produk
function updateProductTotal(quantityInput, price, totalElement) {
    const quantity = parseInt(quantityInput.value);
    const total = quantity * price;
    totalElement.textContent = 'Rp ' + total.toLocaleString('id-ID');
  }
  
  // Fungsi untuk menghitung dan memperbarui subtotal
  function updateSubtotal() {
    let subtotal = 0;
    document.querySelectorAll('.product-row').forEach(row => {
      const quantityInput = row.querySelector('.quantity-input');
      const price = parseInt(row.querySelector('.price').textContent.replace(/Rp|\./g, ''));
      const totalElement = row.querySelector('.total');
      updateProductTotal(quantityInput, price, totalElement);
      subtotal += parseInt(totalElement.textContent.replace(/Rp|\./g, ''));
    });
    document.getElementById('subtotal').textContent = 'Rp ' + subtotal.toLocaleString('id-ID');
  }
  
  // Event listener untuk setiap input jumlah pembelian
  document.querySelectorAll('.quantity-input').forEach(input => {
    input.addEventListener('change', function() {
      updateSubtotal();
    });
  });
  
  // Panggil fungsi updateSubtotal saat halaman dimuat
  window.onload = updateSubtotal;
  