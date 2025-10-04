<?php include "controller/LoginRegister.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FarhanFilm</title>
  <link rel="icon" type="image/png" href="img/icon.png">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Card title truncate */
.card-title {
  display: -webkit-box;
  -webkit-line-clamp: 2;       /* maksimal 2 baris */
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;     /* ini akan muncul di multi-line */
}


    /* Carousel fixed height */
    .carousel-item img {
      height: 400px;
      object-fit: cover;
    }

    @media (max-width: 992px) { .carousel-item img { height: 350px; } }
    @media (max-width: 576px) { .carousel-item img { height: 300px; } }

    /* Card images */
    .card-img-top {
      height: 200px;
      object-fit: cover;
    }

    /* Dark mode */
    body.dark-mode {
      background-color: #121212;
      color: #f1f1f1;
    }

    body.dark-mode .navbar {
      background-color: #1f1f1f !important;
    }

    body.dark-mode .card {
      background-color: #1f1f1f;
      color: #f1f1f1;
    }

    body.dark-mode .btn-primary {
      background-color: #0d6efd;
      border-color: #0d6efd;
    }

    body.dark-mode .footer {
      background-color: #1f1f1f;
      color: #f1f1f1;
    }
  </style>
</head>
<body>

 <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">FarhanFilm</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
        <?php if(isset($_SESSION['user_id'])): ?>
        <li class="nav-item"><a class="nav-link" href="settings.php">Settings</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?logout=true">Logout</a></li>
        <?php else:?>
        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
        <?php endif;?>
        <li class="nav-item"><a class="nav-link" href="admin.php">Login as Admin</a></li>
      </ul>

      <!-- Search bar -->
      <form class="d-flex me-2" role="search" action="index.php" method="get">
        <input class="form-control me-2" name="titlesearch" type="search" placeholder="Cari film..." aria-label="Search">
        <button class="btn btn-outline-light" name="search" type="submit">Search</button>
      </form>

      <!-- Dark mode toggle -->
      <button id="toggleDark" class="btn btn-outline-light me-2">🌙</button>
       <div class="d-flex align-items-center">
        <?php
      if(isset($_SESSION['user_id'])):
     $id = $_SESSION['user_id'];
     $result = mysqli_query($conn, "SELECT * FROM user WHERE user_id = $id");
     $data = mysqli_fetch_assoc($result);
     ?>
        <img src="img/<?= $data['image']?>" alt="Avatar" class="rounded-circle" style="width:40px; height:40px; object-fit:cover; border:2px solid #fff;">
     <?php else :?>
      <img src="img/icon.png" alt="Avatar" class="rounded-circle" style="width:40px; height:40px; object-fit:cover; border:2px solid #fff;">
      <?php endif?>
      </div>
    </div>
  </div>
</nav>

<!-- Carousel -->
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/bgf2.jpg" class="d-block w-100" alt="Film 1">
    </div>
    <div class="carousel-item">
      <img src="img/wai.jpg" class="d-block w-100" alt="Film 2">
    </div>
    <div class="carousel-item">
      <img src="img/bgf2.jpg" class="d-block w-100" alt="Film 3">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<!-- Cards Film -->
<div class="container my-5">
  <h2 class="text-center mb-4">Daftar Film</h2>
  <div class="row g-4">
<!-- Search Video -->
 <?php 
 if(isset($_GET['search'])):
  $judul = $_GET['titlesearch'];
  $query = mysqli_query($conn, "SELECT * FROM video WHERE judul LIKE '%$judul%'");
  while($row = mysqli_fetch_assoc($query)):
 ?>
     <div class="col-6 col-md-4 col-lg-3">
      <div class="card h-100 shadow-sm">
        <img src="img/<?= $row['img']?>" class="card-img-top" alt="Film">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title"><?= $row['judul']?></h5>
          <a href="viewVideo.php?id=<?= $row['video_id']?>" class="btn btn-primary mt-auto w-100">Watch</a>
        </div>
      </div>
    </div>
    <?php  endwhile; ?>

    <?php 
    else:
    // All Video
    $query = mysqli_query($conn, "SELECT * FROM video");
    while($row = mysqli_fetch_assoc($query)):
    ?>
    <div class="col-6 col-md-4 col-lg-3">
      <div class="card h-100 shadow-sm">
        <img src="img/<?= $row['img']?>" class="card-img-top" alt="Film">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title"><?= $row['judul']?></h5>
          <a href="viewVideo.php?id=<?= $row['video_id']?>" class="btn btn-primary mt-auto w-100">Watch</a>
        </div>
      </div>
    </div>
    <?php endwhile;
    endif;
    ?>
  </div>
</div>

<!-- Footer -->
<footer class="footer bg-dark text-white text-center py-3">
  <p class="mb-0">&copy; 2025 MyFilm. All Rights Reserved.</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Toggle dark/light mode
  const toggleBtn = document.getElementById('toggleDark');
  toggleBtn.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
    toggleBtn.textContent = document.body.classList.contains('dark-mode') ? '☀️' : '🌙';
  });
</script>
</body>
</html>
