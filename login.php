<?php include "controller/LoginRegister.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FarhanFilm | Login</title>
   <link rel="icon" type="image/png" href="img/icon.png">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body, html {
      height: 100%;
      margin: 0;
      /* Background gradient cerah */
      background: linear-gradient(135deg, #a1c4fd, #c2e9fb); 
      font-family: Arial, sans-serif;
    }

    .login-container {
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-card {
      width: 100%;
      max-width: 400px;
      padding: 2rem;
      border-radius: 1rem;
      background-color: #ffffff; /* putih agar teks jelas */
      box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .login-card h3 {
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

    .login-card a {
      color: #0d6efd;
      text-decoration: none;
    }

    .login-card a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="login-container">
  <div class="login-card">
    <h3 class="text-center mb-4">Login</h3>
    <form method="post" action="login.php">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan username">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password">
      </div>
      <button type="submit" name="login" class="btn btn-primary w-100 mb-3">Login</button>
      <p class="text-center mb-0">Belum punya akun? <a href="register.php">Register</a></p>
    </form>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
