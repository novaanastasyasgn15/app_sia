<?php
2. include_once "koneksi.php";
3. $password = password_hash('123', PASSWORD_BCRYPT);
4. $query = "INSERT INTO tbl_pengguna (
5. username,
6. password,
7. nama_lengkap,
8. email,
9. jabatan,
10. hak_akses
11. )
12. VALUES (
13. 'admin',
14. '$password',
15. 'Administrator Web',
16. 'admin@gmail.com',
'Administrator',
18. 'admin'
19. )
20. ";
21. if($koneksi->query($query)){
22. echo "Data user berhasil di tambah";
23. }else{
24. echo "Data user gagal di tambah";
25. }
mysqli_close($koneksi);
27. ?>
