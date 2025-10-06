<?php
session_start();
$conn = mysqli_connect('localhost','root','','farhanvideo');
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    if($password == $confirmpassword){
        $namaFile = date("YmdHis")."_".$_FILES['image']['name'];
        $target = "img/".$namaFile;
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        mysqli_query($conn,"INSERT INTO user VALUES('','$username','$password','$namaFile')");
        $user_id = mysqli_insert_id($conn);
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['namaFile'] = $namaFile;
        header('location:index.php');
    } else{
        header('location:register.php');
    }
}
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $view = mysqli_fetch_assoc($query);
    if($username == $view['username'] && $password == $view['password']){
    $_SESSION['user_id']  = $view['user_id'];
    $_SESSION['username'] = $view['username'];
    $_SESSION['password'] = $view['password'];
    $_SESSION['namaFile'] = $view['image'];
    header("Location: index.php");
    } else{
        header('location:login.php');
    }
}
if(isset($_GET['logout'])){
    session_destroy();
    header('location:index.php');
}
?>