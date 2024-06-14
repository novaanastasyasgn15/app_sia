<div class="card mb-3">
    <div class="card-body">
        <form action="modul/suplier/aksi_suplier.php?act=insert" method="post">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="nama_suplier" class="form-label">Nama suplier</label>
                    <input type="text" class="form-control" name="nama_supplier" required>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="telp" class="form-label">Telp</label>
                    <input type="tel" class="form-control" name="telepon" pattern="[0-9]{10,}" required>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="d-flex">
                    <span class="me-auto text-gray">
                        <?php
                        if (isset($_SESSION['pesan'])) {
                            echo $_SESSION['pesan'];
                            unset($_SESSION['pesan']);
                        }
                        ?>
                    </span>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h3>Data Suplier</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Suplier</th>
                        <th>Alamat</th>
                        <th>Telp</th>
                        <th>Email</th>
                        <th><i class="bi bi-gear-fill"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM supplier";
                    $exec = mysqli_query($koneksi, $query);
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($exec)) {
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nama_supplier'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td><?= $data['telepon'] ?></td>
                            <td><?= $data['email'] ?></td>
                            <td>
                            <a href= "#editSupplier<?= $data['id_supplier']; ?>"class="text-decoration-none" data-bs-toggle="modal">
                                <i class="bi bi-pencil-square text-success"></i>
                            </a>
                            <a href="./modul/suplier/aksi_suplier.php?act=delete&id_supplier=<?= $data['id_supplier']; ?>" class="text-decoration-none">
                                <i class="bi bi-trash text-danger"></i>
                            </a>
                            </td>
                        </tr>
                        <!-- Modal Edit Supplier -->
                        <div class="modal fade" id="editSupplier<?= $data['id_supplier'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="modul/suplier/aksi_suplier.php?act=update&id_supplier=<?= $data['id_supplier'] ?>" method="post">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Supplier</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label" for="nama_supplier">Nama Supplier</label>
                                                <input type="text" class="form-control" name="nama_supplier" value="<?= $data['nama_supplier'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="alamat">Alamat</label>
                                                <input type="text" class="form-control" name="alamat" value="<?= $data['alamat'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="telp">Telp</label>
                                                <input type="tel" class="form-control" name="telepon" value="<?= $data['telepon'] ?>" pattern="[0-9]{10,}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="email">Email</label>
                                                <input type="email" class="form-control" name="email" value="<?= $data['email'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>