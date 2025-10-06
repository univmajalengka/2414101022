<?php
$conn = mysqli_connect('localhost','root','','farhanvideo');
if(isset($_POST['upload'])){
    $judul = $_POST['judul'];
    $sinopsis = $_POST['sinopsis'];
    $namaFoto = date("YmdHis")."_".$_FILES['gambar']['name'];
    $targetFoto = "img/".$namaFoto;
    move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFoto);
    $namaVideo = date("YmdHis")."_".$_FILES['video']['name'];
    $targetVideo = "vid/".$namaVideo;
    move_uploaded_file($_FILES['video']['tmp_name'], $targetVideo);
    mysqli_query($conn,"INSERT INTO video VALUES('','$judul','$sinopsis','$namaFoto','$namaVideo')");
    header('location:admin.php');
}
if(isset($_POST['edit'])){
    $id       = $_POST['id'];
    $judul    = $_POST['judul'];
    $sinopsis = $_POST['sinopsis'];

    // ambil data lama
    $result = mysqli_query($conn, "SELECT * FROM video WHERE video_id = $id");
    $old    = mysqli_fetch_assoc($result);

    $namaFoto = $old['img']; // default pakai lama
    $namaVideo = $old['vid']; // default pakai lama

    // kalau upload gambar baru
    if($_FILES['gambar']['name']){
        // hapus lama
        if(file_exists("img/".$old['img'])){
            unlink("img/".$old['img']);
        }
        // simpan baru
        $namaFoto = date("YmdHis")."_".$_FILES['gambar']['name'];
        $targetFoto = "img/".$namaFoto;
        move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFoto);
    }

    // kalau upload video baru
    if($_FILES['video']['name']){
        // hapus lama
        if(file_exists("vid/".$old['vid'])){
            unlink("vid/".$old['vid']);
        }
        // simpan baru
        $namaVideo = date("YmdHis")."_".$_FILES['video']['name'];
        $targetVideo = "vid/".$namaVideo;
        move_uploaded_file($_FILES['video']['tmp_name'], $targetVideo);
    }

    // update ke database
    $sql = "UPDATE video 
            SET judul='$judul', sinopsis='$sinopsis', img='$namaFoto', vid='$namaVideo' 
            WHERE video_id=$id";
    mysqli_query($conn, $sql);

    header('location:admin.php');
}
if(isset($_GET['delete'])){
    $id = $_GET['id'];
    // Ambil data dulu supaya bisa hapus file gambar + video
    $result = mysqli_query($conn, "SELECT * FROM video WHERE video_id = $id");
    $data = mysqli_fetch_assoc($result);

    if ($data) {
        // Hapus file gambar jika ada
        if (!empty($data['img']) && file_exists("img/" . $data['img'])) {
            unlink("img/" . $data['img']);
        }

        // Hapus file video jika ada
        if (!empty($data['vid']) && file_exists("vid/" . $data['vid'])) {
            unlink("vid/" . $data['vid']);
        }

        // Hapus data dari database
        mysqli_query($conn, "DELETE FROM video WHERE video_id = $id");
    }

    // Redirect kembali ke admin.php
    header("Location: admin.php");
    exit;
}

?>