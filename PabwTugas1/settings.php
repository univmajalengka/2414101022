<?php include "controller/UserSettings.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarhanFilm | Settings</title>
     <link rel="icon" type="image/png" href="img/icon.png">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<style>
body.dark-mode {
  background-color: #121212;
  color: #f1f1f1;
}

body.dark-mode .navbar {
  background-color: #1f1f1f !important;
}

/* Card dan profil */
body.dark-mode .profile-card {
  background-color: #1f1f1f;
  color: #f1f1f1;
  border-color: #2c2c2c;
}

body.dark-mode .card-header {
  background-color: #0d6efd; /* tetap biru header */
  color: #fff;
}

/* Label & input */
body.dark-mode .form-label {
  color: #f1f1f1;
}

body.dark-mode .form-control {
  background-color: #2c2c2c;
  color: #f1f1f1;
  border: 1px solid #444;
}

/* Tombol */
body.dark-mode .btn-primary {
  background-color: #0b5ed7;
  border-color: #0b5ed7;
}

body.dark-mode .btn-danger {
  background-color: #d9534f;
  border-color: #d9534f;
}

/* Avatar tetap terang agar terlihat */
body.dark-mode .avatar {
  border: 3px solid #fff;
  background-color: #6c757d;
}

    .profile-card { max-width: 400px; margin: 3rem auto; border-radius: .8rem; }
    .avatar { width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 3px solid #fff; margin-top: -60px; background: #dee2e6; }
    .card-header { background-color: #0d6efd; color: #fff; border-top-left-radius: .8rem; border-top-right-radius: .8rem; }
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
        <li class="nav-item"><a class="nav-link active" href="settings.php">Settings</a></li>
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
     <?php 
     $id = $_SESSION['user_id'];
     $result = mysqli_query($conn, "SELECT * FROM user WHERE user_id = $id");
     $data = mysqli_fetch_assoc($result);
     ?>
      <div class="d-flex align-items-center">
        <img src="img/<?= $data['image']?>" alt="Avatar" class="rounded-circle" style="width:40px; height:40px; object-fit:cover; border:2px solid #fff;">
      </div>
    </div>
  </div>
</nav>
<br>
<div class="card profile-card shadow-sm">
  <div class="card-header text-center py-5 position-relative">
    <!-- Avatar -->
    <img src="img/<?= $data['image'] ?>" class="avatar position-absolute top-0 start-50 translate-middle-x" alt="Avatar">
    <h4 class="mt-5">Profil Pengguna</h4>
  </div>
  <div class="card-body text-center pt-5">
    <form method="post" action="settings.php" enctype="multipart/form-data">

    <div class="mb-3 text-start">
        <label for="avatar" class="form-label">Foto Profil</label>
        <input type="file" id="avatar" name="avatar" class="form-control" accept="image/*" onchange="previewAvatar(event)">
      </div>

      <div class="mb-3 text-start">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-control" value="<?= $data['username'] ?>">
      </div>

      <div class="mb-3 text-start">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" value="<?= $data['password'] ?>">
      </div>

      <div class="d-flex justify-content-between">
        <button name="edit" type="submit" class="btn btn-primary">Edit Account</button>
        <a href="settings.php?delete=true" class="btn btn-danger">Delete Account</a>
      </div>
    </form>
  </div>
</div>


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