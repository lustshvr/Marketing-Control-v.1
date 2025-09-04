<div class="app-content-header"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-3">Notifikasi Tagihan Baru</h3>
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
                                <select class="form-control form-select" name="tagihan_id" id="tagihan_id" required>
                                    <option value="">Pilih Tagihan</option>
                                    <?php foreach($tagihan_klien as $index => $tagihan): ?>
                                    <option value="<?= $tagihan['id'] ?>"><?= $tagihan['keterangan'] ?> | <?= $tagihan['klien']['nama'] ?> | Rp <?= number_format($tagihan['jumlah_tagihan']) ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="mb-3"> <label for="saluran" class="form-label">Saluran</label>
                                <select class="form-control form-select" name="saluran" id="saluran" required>
                                    <option value="Email">Email</option>
                                    <option value="WA">WA</option>
                                    <option value="SMS">SMS</option>
                                </select>
                            </div>
                            <div class="mb-3"> <label for="isi_pesan" class="form-label">Isi Pesan</label> 
                                <textarea class="form-control" id="isi_pesan" name="isi_pesan" required></textarea>
                            </div>
                            <div class="mb-3"> <label for="status" class="form-label">Status</label>
                                <select class="form-control form-select" name="status" id="status" required>
                                    <option value="Antri">Antri</option>
                                    <option value="Terkirim">Terkirim</option>
                                    <option value="Gagal">Gagak</option>
                                </select>
                            </div>
                        </div> <!--end::Body--> <!--begin::Footer-->
                        <div class="card-footer"> <button type="submit" class="btn btn-primary" style="background:#30645b;border-color:#30645b;">Simpan</button>                            <a type="submit" class="btn btn-secondary" href="/pengguna/notifikasi-tagihan">Kembali</a> </div> <!--end::Footer-->
                    </form> <!--end::Form-->
                </div> <!--end::Quick Example-->
            </div> <!-- /.Start col -->
        </div> <!-- /.row (main row) -->
    </div> <!--end::Container-->
</div> <!--end::App Content-->