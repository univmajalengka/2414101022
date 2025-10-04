<?php include "controller/LoginRegister.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FarhanLogin | Register</title>
   <link rel="icon" type="image/png" href="img/icon.png">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body, html {
      height: 100%;
      margin: 0;
      background: linear-gradient(135deg, #fceabb, #f8b500); /* cerah dan hangat */
      font-family: Arial, sans-serif;
    }

    .register-container {
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .register-card {
      width: 100%;
      max-width: 400px;
      padding: 2rem;
      border-radius: 1rem;
      background-color: #ffffff;
      box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .register-card h3 {
      color: #333;
    }

    .btn-primary {
      background-color: #0d6efd;
      border-color: #0d6efd;
    }

    .btn-primary:hover {
      background-color: #0b5ed7;
      border-color: #0b5ed7;
    }

    .register-card a {
      color: #0d6efd;
      text-decoration: none;
    }

    .register-card a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="register-container">
  <div class="register-card">
    <h3 class="text-center mb-4">Register</h3>
    <form method="post" action="register.php" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan username">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password">
  </div>
  <div class="mb-3">
    <label for="confirm-password" class="form-label">Confirm Password</label>
    <input type="password" name="confirmpassword" class="form-control" id="confirm-password" placeholder="Ulangi password">
  </div>
  <!-- Input file gambar -->
  <div class="mb-3">
    <label for="gambar" class="form-label">Upload Foto Profil</label>
    <input type="file" name="image" class="form-control" id="gambar" accept="image/*">
  </div>
  <button type="submit" name="register" class="btn btn-primary w-100 mb-3">Register</button>
  <p class="text-center mb-0">Sudah punya akun? <a href="login.php">Login</a></p>
</form>

  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
