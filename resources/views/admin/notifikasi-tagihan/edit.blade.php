<div class="app-content-header"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-3">Edit Notifikasi Tagihan</h3>
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
                        <div class="card-title">Isi data notifikasi</div>
                    </div> <!--end::Header--> <!--begin::Form-->
                    <form method="post" enctype="multipart/form-data"> <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-3"> <label for="tagihan_id" class="form-label">Tagihan</label>
                                <input class="form-control" id="tagihan_id" disabled value="<?= $notifikasi['tagihan']['keterangan'] ?>">
                            </div>
                            <div class="mb-3"> <label for="saluran" class="form-label">Saluran</label>
                                <select class="form-control form-select" name="saluran" id="saluran" required>
                                    <option value="Email" <?= $notifikasi['saluran'] === 'Email' ? 'selected' : '' ?>>Email</option>
                                    <option value="WA" <?= $notifikasi['saluran'] === 'WA' ? 'selected' : '' ?>>WA</option>
                                    <option value="SMS" <?= $notifikasi['saluran'] === 'SMS' ? 'selected' : '' ?>>SMS</option>
                                </select>
                            </div>
                            <div class="mb-3"> <label for="isi_pesan" class="form-label">Isi Pesan</label> 
                                <textarea class="form-control" id="isi_pesan" name="isi_pesan" required><?= $notifikasi['isi_pesan'] ?></textarea>
                            </div>
                            <div class="mb-3"> <label for="status" class="form-label">Status</label>
                                <select class="form-control form-select" name="status" id="status" required>
                                    <option value="Antri" <?= $notifikasi['status'] === 'Antri' ? 'selected' : '' ?>>Antri</option>
                                    <option value="Terkirim" <?= $notifikasi['status'] === 'Terkirim' ? 'selected' : '' ?>>Terkirim</option>
                                    <option value="Gagal" <?= $notifikasi['status'] === 'Gagal' ? 'selected' : '' ?>>Gagak</option>
                                </select>
                            </div>
                        </div> <!--end::Body--> <!--begin::Footer-->
                        <div class="card-footer"> <button type="submit" class="btn btn-primary" style="background:#30645b;border-color:#30645b;">Simpan</button>                            <a type="submit" class="btn btn-secondary" href="/admin/notifikasi-tagihan">Kembali</a> </div> <!--end::Footer-->
                    </form> <!--end::Form-->
                </div> <!--end::Quick Example-->
            </div> <!-- /.Start col -->
        </div> <!-- /.row (main row) -->
    </div> <!--end::Container-->
</div> <!--end::App Content-->