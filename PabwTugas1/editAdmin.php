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
</head>
<body>

<!-- FORM Tambah Film -->
<div class="container my-5">
  <h2 class="text-center mb-4">Edit Film</h2>
  <div class="card shadow-sm p-4">
    <form action="editAdmin.php" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <?php 
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM video WHERE video_id = $id");
$data = mysqli_fetch_assoc($query);
        ?>
        <label for="judul" class="form-label">Judul Film</label>
        <input type="text" value="<?= $data['judul']?>" name="judul" id="judul" class="form-control" placeholder="Masukkan judul film" required>
      </div>
      <input type="hidden" name="id" value="<?= $data['video_id']?>"
      <div class="mb-3">
        <label for="sinopsis" class="form-label">Sinopsis</label>
        <textarea name="sinopsis" id="sinopsis" class="form-control" rows="4" placeholder="Tulis sinopsis film" required><?= $data['sinopsis']?></textarea>
      </div>
      <div class="mb-3">
        <label for="gambar" class="form-label">Upload Gambar</label>
        <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*" required>
      </div>
      <div class="mb-3">
        <label for="video" class="form-label">Upload Video</label>
        <input type="file" name="video" id="video" class="form-control" accept="video/*" required>
      </div>
      <button type="submit" name="edit" class="btn btn-primary w-100">Update Film</button>
    </form>
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
