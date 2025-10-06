<?php
session_start();
$conn = mysqli_connect('localhost','root','','farhanvideo');
$id = $_SESSION['user_id'];

if(isset($_POST['edit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_SESSION['user_id'];
    $result = mysqli_query($conn, "SELECT image FROM user WHERE user_id = $id");
    $oldData = mysqli_fetch_assoc($result);
    $oldImage = $oldData['image'];
    if(!empty($_FILES['avatar']['name'])){
        // Hapus gambar lama
        if(file_exists("img/".$oldImage)){
            unlink("img/".$oldImage);
        }

        // Buat nama file baru
        $newImage = date("YmdHis")."_".basename($_FILES['avatar']['name']);
        $target = "img/".$newImage;

        // Pindahkan file baru
        move_uploaded_file($_FILES['avatar']['tmp_name'], $target);

        // Update dengan gambar baru
        $query = "UPDATE user 
                  SET username = '$username', password = '$password', image = '$newImage'
                  WHERE user_id = $id";
    } else {
        // Update tanpa ubah gambar
        $query = "UPDATE user 
                  SET username = '$username', password = '$password'
                  WHERE user_id = $id";
    }

    mysqli_query($conn, $query);
    header("Location: settings.php");
    exit;
}

if(isset($_GET['delete'])){
$id = $_SESSION['user_id'];
$result = mysqli_query($conn, "SELECT * FROM user WHERE user_id = $id");
$data   = mysqli_fetch_assoc($result);
if(!empty($data['image']) && file_exists("img/".$data['image'])){
    unlink("img/".$data['image']); 
}

// Hapus data user di database
mysqli_query($conn, "DELETE FROM user WHERE user_id = $id");

// Hapus semu
session_destroy();    // hancurkan session

// Redirect ke halaman login
header("Location: index.php");
}
?>