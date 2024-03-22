<?php
 $active_dashboard = "";
 $active_transaksi = "";
 $active_pelanggan = "";
 $active_suplier = "";
 $active_barang = "";
 $active_laporan = "";
 $active_riwayat = "";
 $active_pengaturan = "";
if(isset($_GET['modul'])){
 if($_GET['modul']=="transaksi"){
 $active_transaksi="active";
 }elseif($_GET['modul']=="akun"){
 $active_akun="active";
 }elseif($_GET['modul']=="pelanggan"){
 $active_pelanggan="active";
 }elseif($_GET['modul']=="suplier"){
 $active_suplier="active";
 }elseif($_GET['modul']=="barang"){
 $active_barang="active";
 }elseif($_GET['modul']=="pembayaran"){
 $active_pembayaran="active";
 }elseif($_GET['modul']=="jurnal-umum"){
 $active_jurnalumum="active";
 }
}else{
 $active_dashboard="active";
}
?>
<ul class="nav nav-pills flex-column ms-2">
 <li class="nav-item">
 <a href="dashboard.php" class="nav-link text-white <?=
$active_dashboard;?>">
 <i class="bi bi-speedometer2 me-2"></i>Dashboard
 </a>
 </li>
 <li class="nav-item">
 <a href="?modul=akun" class="nav-link text-white <?= $active_akun;?>">
 <i class="bi bi-cash-stack me-2"></i></i>Data Akun
 </a>
 </li>
 <li class="nav-item">
 <a href="?modul=transaksi" class="nav-link text-white <?=
$active_transaksi;?>">
 <i class="bi bi-cart-check-fill me-2"></i>Transaksi
 </a>
 </li>
 <li class="nav-item">
 <a href="?modul=pelanggan" class="nav-link text-white <?=
$active_pelanggan;?>">
 <i class="bi bi-people-fill me-2"></i>Data Pelanggan
 </a>
 </li>
 <li class="nav-item">
 <a href="?modul=suplier" class="nav-link text-white <?= $active_suplier;?
>">
 <i class="bi bi-people-fill me-2"></i>Data Suplier
 </a>
 </li>
 <li class="nav-item">
 <a href="?modul=barang" class="nav-link text-white <?= $active_barang;?
>">
 <i class="bi bi-box2-fill me-2"></i>Data Barang
 </a>
 </li>
 <li class="nav-item">
 <a href="?modul=pembayaran" class="nav-link text-white <?=
$active_pembayaran;?>">
 <i class="bi bi-pencil-square me-2"></i>Pembayaran
 </a>
 </li>
 <li class="nav-item">
 <a href="?modul=jurnal-umum" class="nav-link text-white <?=
$active_jurnalumum;?>">
 <i class="bi bi-pencil-square me-2"></i>Jurnal Umum
 </a>
 </li>
</ul>