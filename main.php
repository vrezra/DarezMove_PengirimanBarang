<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DarezMove - Kirim Lebih Cepat</title>

  <!-- CSS -->
  <link rel="stylesheet" href="style.css">

  <!-- Font & Icon -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css">
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css">
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css">
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-brands/css/uicons-brands.css">
</head>
<body onload="welcome()">

  <!-- Welcome Alert -->
  <script>
    function welcome() {
      alert("Selamat datang di website resmi DarezMove!");
    }
  </script>

  <!-- Navigation -->
  <div class="navigation">
    <a href="main.php">
      <img class="navimg" src="png/Dare.png" alt="Logo DarezMove">
    </a>
    <nav>
      <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#review">Benefit</a></li>
        <li><a href="#armada">Armada</a></li>
        <li><a href="#owner">Owner</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="form_login.php">Login</a></li>
      </ul>
    </nav>
  </div>

  <!-- Header -->
  <header id="home">
    <div class="header-content">
      <div class="left">
        <img src="png/Dare.png" alt="Logo Besar" height="350px">
      </div>
      <div class="right">
        <h1>Solusi Kirim Barang<br>Cepat dan Aman!</h1>
      </div>
    </div>
  </header>

  <!-- Review Section -->
  <section id="review" class="review">
    <div class="flex-container">
      <div>
        <img src="png/image_review.png" alt="Review" height="320px">
      </div>
      <div class="jasa">
        <h2>Jasa Pengiriman Instant 24 jam</h2>
        <h2>Terjangkau - Cepat - Aman</h2>

        <div class="icon-text">
          <i class="fi fi-ss-star"></i>
          <h3>Cepat</h3>
        </div>
        <p>Terjamin datang tepat waktu dengan berbagai pilihan kendaraan untuk pengiriman kamu.</p>

        <div class="icon-text">
          <i class="fi fi-ss-star"></i>
          <h3>Aman</h3>
        </div>
        <p>Pengiriman dilindungi asuransi dengan garansi penggantian barang bila rusak.</p>

        <div class="icon-text">
          <i class="fi fi-ss-star"></i>
          <h3>Terjangkau</h3>
        </div>
        <p>Banyak promo dan diskon menarik hanya untuk kamu.</p>
      </div>
    </div>
  </section>

  <!-- Armada Section -->
  <section id="armada" class="armada">
    <h1>Berbagai Jenis Kendaraan untuk Pengiriman Barang Kamu</h1>
    <div class="armada-grid">
      <div class="card"><i class="fi fi-rr-car-side"></i><h3>Mobil</h3></div>
      <div class="card"><i class="fi fi-rr-moped"></i><h3>Motor</h3></div>
      <div class="card"><i class="fi fi-rs-truck-moving"></i><h3>Truk</h3></div>
      <div class="card"><i class="fi fi-rr-truck-pickup"></i><h3>Pickup</h3></div>
      <div class="card"><i class="fi fi-rs-car-side-bolt"></i><h3>ECO</h3></div>
      <div class="card"><i class="fi fi-rr-shuttle-van"></i><h3>Van</h3></div>
    </div>
  </section>

  <!-- Owner Section -->
  <section id="owner" class="owner">
    <div class="owners flex-container">
      <div class="darrez">
        <img src="png/image_owner.png" alt="Owner" height="280px">
        <p>@vrezrana<br>@darrell__hd</p>
      </div>
      <div>
        <h1>Owner Kami</h1>
        <h2 class="quotes">"With DarezMove nothing is impossible"</h2>
        <h2>Darrell & Ezra</h2>
        <h2 class="orange">DarezMove</h2>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="contact">
    <div class="flex-container">
      <div>
        <img src="png/Dare1.png" alt="Contact" height="280px">
      </div>
      <div class="right">
        <div class="right1">
          <h1>Ready To Order?</h1>
          <a href="form_login.php">Order Now</a>
        </div>
        <div class="right2">
          <h3>Need Help?</h3>
          <h5>Contact Us</h5>
          <p><i class="fi fi-rr-phone-call"></i> +62-851-9838-8898</p>
          <p><i class="fi fi-rs-comment"></i> +62-851-8060-1344</p>
          <p><i class="fi fi-rr-envelope"></i> darez@gmail.com</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="flex-container">
      <div>
        <img src="png/Dare.png" alt="Logo" height="120px">
      </div>
      <div class="kanan">
        <h3>Follow Us On</h3>
        <i class="fi fi-brands-instagram"></i>
        <i class="fi fi-brands-youtube"></i>
        <i class="fi fi-brands-twitter-alt"></i>
      </div>
    </div>
  </footer>

</body>
</html>
