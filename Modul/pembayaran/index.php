<div class="card mb-3">

<div class="card-body">
    <form action="modul/pembayaran/aksi_pembayaran.php?act=insert" method="post">
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="invoice" class="form-label">Invoice</label>
                <input type="text" class="form-control" name="invoice">
            </div>
            <div class="col-md-6">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
            <label for="total" class="form-label">Total</label>
            <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="number" class="form-control" name="total">
            </div>                
        </div>
        <div class="col-md-6">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control" name="keterangan">
        </div>
    </div>
    <hr class="text-secondary">
    <div class="text-end">
    <div class="row">
        <div class="d-flex">
            <span class="me-auto text-gray">
                <?php
                if(isset($_SESSION['pesan'])){
                    echo $_SESSION['pesan'];
                    unset($_SESSION['pesan']);
                }
                ?>
                </span>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" name="submit" class="btn btnprimary">Simpan</button>
        </div>
    </div>
    </form>
</div>
</div>
<div class="card">
    <div class="card-header">
        <h3>Data Pembayaran</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM pembayaran");
                    $no = 0;
                    while($row = mysqli_fetch_array($query)){
                        $no++;
                        ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['invoice'] ?></td>
                            <td><?= $row['tanggal'] ?></td>
                            <td><?= "Rp. " . number_format($row['total'], 2, ',', '.'); ?></td>
                            <td><?= $row['keterangan'] ?></td>
                            <td>
                                <a href="#editPembayaran<?= $row['id'] ?>" class="text-decorationnone" data-bs-toggle="modal">
                                <i class="bi bi-pencil-square text-success"></i>
                            </a>
                            <a href="modul/pembayaran/aksi_pembayaran.php?act=delete&id=<?=$row['id']; ?>" class="text-decoration-none">
                                <i class="bi bi-trash text-danger"></i>
                            </a>
                        </td>
                        <!-- Modal -->
                        <div class="modal fade" id="editPembayaran<?= $row['id'] ?>" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form action="modul/pembayaran/aksi_pembayaran.php?act=update&id=<?=$row['id'] ?>" method="post">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pembayaran</h1>
                                    <button type="button" class="btn-close" data-bsdismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="invoice" class="form-label">Invoice</label>
                                            <input type="text" class="form-control" name="invoice" value="<?= $row['invoice'] ?>" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" name="tanggal"
                                            value="<?= $row['tanggal'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="total" class="form-label">Total</label>
                                            <div class="input-group">
                                                <span class="input-group-text">Rp.</span>
                                                <input type="number" class="form-control" name="total" value="<?= $row['total'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="keterangan" class="formlabel">Keterangan</label>
                                            <input type="text" class="form-control" name="keterangan"
                                            value="<?= $row['keterangan'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bsdismiss="modal">Close</button>
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
