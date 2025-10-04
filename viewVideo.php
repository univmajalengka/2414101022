<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarhanFilm | View</title>
     <link rel="icon" type="image/png" href="img/icon.png">
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<body>

<style>
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


     <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">FarhanFilm</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
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
      <button id="toggleDark" class="btn btn-outline-light">🌙</button>
    </div>
  </div>
</nav>



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
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</div>




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