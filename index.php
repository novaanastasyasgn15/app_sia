<div class="card mb-3">
    <div class="card-body">
        <form action="modul/pembelian/aksi_pembelian.php?act=insert" method="post">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="invoice" class="form-label">Invoice</label>
                    <input type="text" class="form-control" name="invoice">
                </div>
                <div class="col-md-4">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal">
                </div>
                <div class="col-md-4">
                    <label for="suplier" class="form-label">Supplier</label>
                    <select name="supplier" class="form-select">
                        <option value="1">PT Suplier Jaya</option>
                        <option value="2">CV Maju Jaya</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <span class="me-auto text-gray">
                        <?php
                        if(isset($_SESSION['pesan'])){
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
        <h3>Data Pembelian</h3>    
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Suplier</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th>Keterangan</th>
                        <th><i class="bi bi-gear-fill"></i></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT p.id_pembelian, p.invoice_pembelian, p.tgl_pembelian, s.id_supplier, s.nama_supplier, p.jumlah_pembelian, p.harga_pembelian, p.total_pembelian, p.keterangan 
                          FROM pembelian p 
                          INNER JOIN supplier s ON p.id_supplier = s.id_supplier";
                $exec = mysqli_query($koneksi, $query);
                $id = 0;
                while($row = mysqli_fetch_array($exec)){
                    $id++;?>
                    <tr>
                        <td><?= $id?></td>
                        <td><?= $row['invoice_pembelian']?></td>
                        <td><?= $row['tgl_pembelian']?></td>
                        <td><?= $row['nama_supplier']?></td>
                        <td><?= $row['jumlah_pembelian']?></td>
                        <td><?= "Rp. ". number_format($row['harga_pembelian'], 2, ',', '.');?></td>
                        <td><?= "Rp. ". number_format($row['total_pembelian'], 2, ',', '.');?></td>
                        <td><?= $row['keterangan']?></td>
                        <td>
                            <a href="#editPembelian<?= $row['id_pembelian']?>" class="text-decoration-none" data-bs-toggle="modal">
                                <i class="bi bi-pencil-square text-success"></i>
                            </a>
                            <a href="modul/pembelian/aksi_pembelian.php?act=delete&id=<?=$row['id_pembelian'];?>" class="text-decoration-none">
                                <i class="bi bi-trash text-danger"></i>
                            </a>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="editPembelian<?= $row['id_pembelian']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pembelian</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="modul/pembelian/aksi_pembelian.php?act=update&id=<?=$row['id_pembelian'];?>" method="post">
                            <div class="modal-body">
                               <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="invoice" class="form-label">Invoice</label>
                                        <input type="text" class="form-control" name="invoice" value="<?= $row['invoice_pembelian']?>" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" value="<?= $row['tgl_pembelian']?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="suplier" class="form-label">Suplier</label>
                                        <select name="id_suplier" class="form-select">
                                            <?php
                                            $q_sup = "SELECT * from supplier";
                                            $exec_sup = mysqli_query($koneksi, $q_sup);
                                            while($r_sup = mysqli_fetch_array($exec_sup)){
                                              ?>
                                                <option value="<?= $r_sup['id_supplier']?>" <?= $row['id_supplier'] === $r_sup['id_supplier']? 'elected' : '';?>>
                                                    <?= $r_sup['nama_supplier']?>
                                                </option>
                                                <?php
                                            }
                                          ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="jumlah" class="form-label">Jumlah</label>
                                        <input type="number" class="form-control" name="jumlah" id="jumlah_edit_<?= $row['id_pembelian']?>" value="<?= $row['jumlah_pembelian']?>" oninput="hitungTotalEdit(<?= $row['id_pembelian']?>);">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="harga" class="form-label">Harga</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp.</span>
                                            <input type="number" class="form-control" name="harga" id="harga_edit_<?= $row['id_pembelian']?>" value="<?= $row['harga_pembelian']?>" oninput="hitungTotalEdit(<?= $row['id_pembelian']?>);">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="total" class="form-label">Total</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp.</span>
                                            <input type="number" class="form-control" name="total" id="total_edit_<?= $row['id_pembelian']?>" value="<?= $row['total_pembelian']?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <textarea name="keterangan" class="form-control"><?=$row['keterangan']?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            </form>
                        </div>
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