<?php
include_once "../../koneksi.php";
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $invoice_pembayaran = $_POST['invoice_pembayaran'];
    $tanggal = $_POST['tanggal'];
    $total = $_POST['total'];
    $keterangan = $_POST['keterangan'];
    if($_GET['act'] == "insert"){
        $query = "INSERT INTO pembayaran (invoice_pembayaran, tanggal, total,keterangan) VALUES ('$invoice_pembayaran','$tanggal','$total','$keterangan')";
        $exec = mysqli_query($koneksi, $query);
        if($exec){
            $_SESSION['pesan'] = "Data pembayaran telah ditambahkan";
            header('location:../../dashboard.php?modul=pembayaran');
        }else{
            $_SESSION['error'] = "Data pembayaran gagal ditambahkan";
            header('location:../../dashboard.php?modul=pembayaran');
        }
    }elseif($_GET['act'] == "update"){
        $id = $_GET['id'];
        $query = "UPDATE pembayaran SET invoice = '$invoice', tanggal ='$tanggal', total = '$total', keterangan = '$keterangan' WHERE id = '$id'";
        $exec = mysqli_query($koneksi, $query);
        if($exec){
            $_SESSION['pesan'] = "Data pembayaran telah diubah";
            header('location:../../dashboard.php?modul=pembayaran');
        }else{
            $_SESSION['error'] = "Data pembayaran gagal diubah";
            header('location:../../dashboard.php?modul=pembayaran');
        }
    }
}else{
    if($_GET['act'] == "delete"){
        $id = $_GET['id'];
        $query = "DELETE FROM pembayaran WHERE id = '$id'";
        $exec = mysqli_query($koneksi, $query);
        if($exec){
            $_SESSION['pesan'] = "Data pembayaran telah dihapus";
            header('location:../../dashboard.php?modul=pembayaran');
        }else{
            $_SESSION['error'] = "Data pembayaran gagal dihapus";
            header('location:../../dashboard.php?modul=pembayaran');
        }
    }
}
?>