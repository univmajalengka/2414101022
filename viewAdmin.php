<?php include "controller/AdminSettings.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarhanFilm | ViewAdmin</title>
     <link rel="icon" type="image/png" href="img/icon.png">
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<body>

<style>
.poster-wrapper {
  width: 100%;
  aspect-ratio: 16 / 9; /* Landscape */
  overflow: hidden;
}

.poster-wrapper img {
  width: 100%;
  height: 100%;
  object-fit: cover; /* crop jika perlu agar tetap landscape */
}

    
</style>


<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card text-center">
        <!-- Judul Film -->
    <?php 
    $conn = mysqli_connect('localhost','root','','farhanvideo');
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM video WHERE video_id = $id");
    while($row = mysqli_fetch_assoc($query)):
    ?>
        <div class="card-header">
          <h3 class="card-title"><?= $row['judul']?></h3>
        </div>

        <!-- Poster -->
        <div class="poster-wrapper">
  <img src="img/<?= $row['img']?>" class="card-img-top" alt="Poster Film">
</div>
        <!-- Sinopsis -->
        <div class="card-body">
          <p class="card-text">
          <?= $row['sinopsis'] ?>
          <!-- Video -->
          <div class="ratio ratio-16x9">
            <video controls>
              <source src="vid/<?= $row['vid']?>" type="video/mp4">
            </video>
          </div>

          <br>
            <div class="d-flex justify-content-between">
    <a href="editAdmin.php?id=<?= $row['video_id']?>" class="btn btn-primary w-50 me-2">✏️ Edit</a>
    <a href="viewAdmin.php?id=<?= $row['video_id']?>&delete=true" 
       class="btn btn-danger w-50 ms-2"
       onclick="return confirm('Yakin ingin menghapus video ini?')">🗑️ Delete</a>
  </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</div>




<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>