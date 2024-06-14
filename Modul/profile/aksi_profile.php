<?php
if (isset($_POST['submit'])) {
    session_start();
    include_once('../../koneksi.php');
    
    $username = $_POST['username'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_baru = $_POST['password_baru'];
    $password_ulang = $_POST['password_ulang'];

    if (empty($password)) {
        // Update profil tanpa mengubah password
        $query = "UPDATE tbl_pengguna SET nama_lengkap='$nama_lengkap', email='$email' WHERE username='$username'";
        $exec = mysqli_query($koneksi, $query);
        
        if ($exec) {
            $_SESSION['pesan'] = "Data profil telah diperbarui";
            header('Location: ../../dashboard.php?modul=profile');
        } else {
            $_SESSION['pesan'] = "Data profil gagal diperbarui";
            header('Location: ../../dashboard.php?modul=profile');
        }
        
    } else {
        // Update profil dengan mengubah password
        $query = "SELECT password FROM tbl_pengguna WHERE username='$username'";
        $exec = mysqli_query($koneksi, $query);

        if (!$exec) {
            $_SESSION['pesan'] = "Query gagal: " . mysqli_error($koneksi);
            header('Location: ../../dashboard.php?modul=profile');
            exit();
        }

        $data = mysqli_fetch_array($exec);
        if ($data) {
            if (password_verify($password, $data['password'])) {
                if ($password_baru == $password_ulang) {
                    $password_hashed = password_hash($password_baru, PASSWORD_BCRYPT);
                    $query = "UPDATE tbl_pengguna SET password='$password_hashed', nama_lengkap='$nama_lengkap', email='$email' WHERE username='$username'";
                    $exec = mysqli_query($koneksi, $query);
                    
                    if ($exec) {
                        $_SESSION['pesan'] = "Data profil telah diperbarui";
                        header('Location: ../../dashboard.php?modul=profile');
                    } else {
                        $_SESSION['pesan'] = "Gagal memperbarui data profil";
                        header('Location: ../../dashboard.php?modul=profile');
                    }
                } else {
                    $_SESSION['pesan'] = "Password baru tidak sesuai";
                    header('Location: ../../dashboard.php?modul=profile');
                }
            } else {
                $_SESSION['pesan'] = "Password lama tidak sesuai";
                header('Location: ../../dashboard.php?modul=profile');
            }
        } else {
            $_SESSION['pesan'] = "Pengguna tidak ditemukan";
            header('Location: ../../dashboard.php?modul=profile');
        }
    }
} else {
    header('Location:../../index.php');
}
?>