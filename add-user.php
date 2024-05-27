<?php
include_once "koneksi.php";
$pass = password_hash('123', PASSWORD_BCRYPT);
$query = "INSERT INTO tbl_pengguna (
    username,
    password,
    nama_lengkap,
    email,
    jabatan,
    hak_akses
)
VALUES (
    'admin',
    '$pass',
    'Administartor Web',
    'admin@gmail.com',
    'admin',
    'admin'
)
";
if($koneksi -> query($query)){
    echo "Data User berhasil ditambah";
}else {
    echo "Data User gagal ditambah";
}
mysqli_close($koneksi);
?>