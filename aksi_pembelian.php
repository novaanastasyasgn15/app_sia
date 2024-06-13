<?php
include_once "../../koneksi.php";
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_GET['act'] == "insert"){
        $invoice_pembelian = $_POST['invoice_pembelian'];
        $tgl_pembelian = $_POST['tgl_pembelian'];
        $id_suplier = $_POST['id_supplier'];
        $jumlah = $_POST['jumlah'];
        $harga_pembelian = $_POST['harga_pembelian'];
11. $total_pembelian = $_POST['total_pembelian'];
12. $keterangan = $_POST['keterangan'];
13. $query = "INSERT INTO pembelian (invoice, tanggal, id_supplier,
jumlah, harga, total, keterangan) VALUES
('$invoice','$tanggal','$id_suplier','$jumlah','$harga','$total','$keterangan
')";
14. $exec = mysqli_query($koneksi, $query);
15. if($exec){
16. $_SESSION['pesan'] = "Data pembelian telah ditambahkan";
17. header('location:../../dashboard.php?modul=pembelian');
18. }else{
19. $_SESSION['error'] = "Data pembelian gagal ditambahkan";
20. header('location:../../dashboard.php?modul=pembelian');
21. }
22. }elseif($_GET['act'] == "update"){
23. $id = $_GET['id'];
24. $invoice = $_POST['invoice'];
25. $tanggal = $_POST['tanggal'];
26. $id_suplier = $_POST['id_suplier'];
27. $jumlah = $_POST['jumlah'];
28. $harga = $_POST['harga'];
29. $total = $_POST['total'];
30. $keterangan = $_POST['keterangan'];
31. $query = "UPDATE tbl_pembelian SET invoice='$invoice',
tanggal='$tanggal', id_suplier='$id_suplier', jumlah='$jumlah',
harga='$harga', total='$total', keterangan='$keterangan' WHERE id='$id'";
32. $exec = mysqli_query($koneksi, $query);
33. if($exec){
34. $_SESSION['pesan'] = "Data pembelian telah diubah";
35. header('location:../../dashboard.php?modul=pembelian');
36. }else{
37. $_SESSION['error'] = "Data pembelian gagal diubah";
38. header('location:../../dashboard.php?modul=pembelian');
39. }
40. }
41.}else{
42. if($_GET['act'] == "delete"){
43. $id = $_GET['id'];
44. $query = "DELETE FROM tbl_pembelian WHERE id='$id'";
45. $exec = mysqli_query($koneksi, $query);
46. if($exec){
47. $_SESSION['pesan'] = "Data pembelian telah dihapus";
48. header('location:../../dashboard.php?modul=pembelian');
49. }else{
50. $_SESSION['error'] = "Data pembelian gagal dihapus";
51. header('location:../../dashboard.php?modul=pembelian');
52. }
53. }
54.}
?>