<div class="card mb-3">
    <div class="card-body">
        <form action="modul/akun/aksi_akun.php?act=insert" method="post">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label" for="nama_akun">Nama akun</label>
                    <input type="text" class="form-control" name="nama_akun">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="jenis_akun">Jenis akun</label>
                    <input type="text" class="form-control" name="jenis_akun">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="tipe_saldo">Tipe saldo</label>
                    <select class="form-select" name="tipe_saldo">
                        <option value="debit">Debit</option>
                        <option value="kredit">Kredit</option>
                    </select>
                </div>
            </div>
            <hr class="text-secondary">
            <div class="text-end">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h3>Data Akun</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
               
                    <tr>
                        <th>#</th>
                        <th>Nama Akun</th>
                        <th>Jenis Akun</th>
                        <th>Tipe Saldo</th>
                        <th><i class="bi bi-gear-fill"></i></th>
                    </tr>
                </thead>
                <tbody>
                <?php
$query = "SELECT * from akun";
$exec = mysqli_query($koneksi, $query);
$no = 1;
while($data = mysqli_fetch_array($exec)){
?>
<tr>
 <td><?= $no++ ?></td>
 <td><?= $data['nama_akun'] ?></td>
 <td><?= $data['jenis_akun'] ?></td>
 <td><?= $data['tipe_saldo'] ?></td>
<td>
                        <td>
                            <a href= "#editAkun<?= $data['id_akun']; ?>"class="text-decoration-none" data-bs-toggle="modal">
                                <i class="bi bi-pencil-square text-success"></i>
                            </a>
                            <a href="modul/akun/aksi_akun.php?act=delete&id_akun=<?= $data['id_akun']; ?>" class="text-decoration-none">
                                <i class="bi bi-trash text-danger"></i>
                            </a>
                        </td>
                        <!-- Modal -->
                        <div class="modal fade" id="editAkun<?= $data['id_akun']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form action="modul/akun/aksi_akun.php?act=update&id_akun=<?= $data['id_akun']; ?>" method="post">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" akun_id="exampleModalLabel">Edit Data Akun</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label" for="nama_akun">Nama akun</label>
                                                <input type="text" class="form-control" name="nama_akun" value="<?= $data['nama_akun'] ;?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="jenis_akun">Jenis akun</label>
                                                <input type="text" class="form-control" name="jenis_akun" value="<?= $data['jenis_akun']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="tipe_saldo">Tipe saldo</label>
                                                <select class="form-select" name="tipe_saldo" id="tipe_saldo">
                                                <option value="debit" <?php if($data['tipe_saldo'] =='debit') echo 'selected' ?>>Debit</option>
                                                <option value="kredit" <?php if($data['tipe_saldo'] =='kredit') echo 'selected' ?>>Kredit</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </tr>
                    <?php
            }
?>

                </tbody>
            </table>
        </div>
 </div>
</div>