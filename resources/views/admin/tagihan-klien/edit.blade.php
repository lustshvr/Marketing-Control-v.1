<div class="app-content-header"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-3">Edit Tagihan Klien</h3>
            </div>
        </div> <!--end::Row-->
    </div> <!--end::Container-->
</div> <!--end::App Content Header--> <!--begin::App Content-->
<div class="app-content"> <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row"> <!-- Start col -->
            <div class="col-lg-12 col-12 connectedSortable">
                <div class="card card-primary card-outline mb-4" style="box-shadow:none;border-top: 3px solid #ff5733;"> <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Isi data tagihan</div>
                    </div> <!--end::Header--> <!--begin::Form-->
                    <form method="post" enctype="multipart/form-data"> <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-3"> <label for="klien_id" class="form-label">Klien</label>
                                <select class="form-control form-select" name="klien_id" id="klien_id" required>
                                    <option value="">Pilih Klien</option>
                                    <?php foreach($klien as $index => $calon): ?>
                                    <option value="<?= $calon['id'] ?>" <?= $tagihan_klien['klien_id'] === $calon['id'] ? 'selected' : '' ?>><?= $calon['nama'] ?> | <?= $calon['no_hp'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="mb-3"> <label for="keterangan" class="form-label">Keterangan</label> 
                                <textarea class="form-control" id="keterangan" name="keterangan" required><?= $tagihan_klien['keterangan'] ?></textarea>
                            </div>
                            <div class="mb-3"> <label for="jumlah_tagihan" class="form-label">Jumlah Tagihan</label> <input type="number" class="form-control" id="jumlah_tagihan" aria-describedby="emailHelp" name="jumlah_tagihan" required value="<?= $tagihan_klien['jumlah_tagihan'] ?>">
                            </div>
                            <div class="mb-3"> <label for="jatuh_tempo" class="form-label">Jatuh Tempo</label> <input type="date" class="form-control" id="jatuh_tempo" aria-describedby="emailHelp" name="jatuh_tempo" required value="<?= $tagihan_klien['jatuh_tempo'] ?>">
                            </div>
                            <div class="mb-3"> <label for="jumlah_bayar" class="form-label">Jumlah Bayar</label> <input type="number" class="form-control" id="jumlah_bayar" aria-describedby="emailHelp" name="jumlah_bayar" required value="<?= $tagihan_klien['jumlah_bayar'] ?>">
                            </div>
                            <div class="mb-3"> <label for="dibayar_pada" class="form-label">Dibayar Pada</label> <input type="date" class="form-control" id="dibayar_pada" aria-describedby="emailHelp" name="dibayar_pada" required value="<?= $tagihan_klien['dibayar_pada'] ?>">
                            </div>
                            <div class="mb-3"> <label for="status" class="form-label">Status</label>
                                <select class="form-control form-select" name="status" id="status" required>
                                    <option value="Belum" <?= $tagihan_klien['status'] === 'Belum' ? 'selected' : '' ?>>Belum</option>
                                    <option value="Sebagian" <?= $tagihan_klien['status'] === 'Sebagian' ? 'selected' : '' ?>>Sebagian</option>
                                    <option value="Lunas" <?= $tagihan_klien['status'] === 'Lunas' ? 'selected' : '' ?>>Lunas</option>
                                </select>
                            </div>
                        </div> <!--end::Body--> <!--begin::Footer-->
                        <div class="card-footer"> <button type="submit" class="btn btn-primary" style="background:#30645b;border-color:#30645b;">Simpan</button>                            <a type="submit" class="btn btn-secondary" href="/admin/tagihan-klien">Kembali</a> </div> <!--end::Footer-->
                    </form> <!--end::Form-->
                </div> <!--end::Quick Example-->
            </div> <!-- /.Start col -->
        </div> <!-- /.row (main row) -->
    </div> <!--end::Container-->
</div> <!--end::App Content-->