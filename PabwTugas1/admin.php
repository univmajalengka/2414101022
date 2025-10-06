<?php include "controller/AdminSettings.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FarhanFilm | Admin</title>
  <link rel="icon" type="image/png" href="img/icon.png">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .card-title {
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .card-img-top {
      height: 200px;
      object-fit: cover;
    }
  </style>
</head>
<body>

<!-- FORM Tambah Film -->
<div class="container my-5">
  <h2 class="text-center mb-4">Tambah Film</h2>
  <div class="card shadow-sm p-4">
    <form action="admin.php" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="judul" class="form-label">Judul Film</label>
        <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul film" required>
      </div>
      <div class="mb-3">
        <label for="sinopsis" class="form-label">Sinopsis</label>
        <textarea name="sinopsis" id="sinopsis" class="form-control" rows="4" placeholder="Tulis sinopsis film" required></textarea>
      </div>
      <div class="mb-3">
        <label for="gambar" class="form-label">Upload Gambar</label>
        <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*" required>
      </div>
      <div class="mb-3">
        <label for="video" class="form-label">Upload Video</label>
        <input type="file" name="video" id="video" class="form-control" accept="video/*" required>
      </div>
      <button type="submit" name="upload" class="btn btn-primary w-100">Simpan Film</button>
    </form>
  </div>
</div>

<!-- Cards Film -->
<div class="container my-5">
  <h2 class="text-center mb-4">Daftar Film</h2>
  <div class="row g-4">
    <?php 
    $query = mysqli_query($conn, "SELECT * FROM video");
    while($row = mysqli_fetch_assoc($query)):
    ?>
    <div class="col-6 col-md-4 col-lg-3">
      <div class="card h-100 shadow-sm">
        <img src="img/<?= $row['img']?>" class="card-img-top" alt="Film 1">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title"><?= $row['judul']?></h5>
          <a href="viewAdmin.php?id=<?= $row['video_id']?>" class="btn btn-primary mt-auto w-100">View</a>
        </div>
      </div>
    </div>
        <?php endwhile;?>
  </div>
</div>

<!-- Footer -->
<footer class="footer bg-dark text-white text-center py-3">
  <p class="mb-0">&copy; 2025 MyFilm. All Rights Reserved.</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
