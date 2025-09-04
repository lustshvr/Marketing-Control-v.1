<div class="app-content-header"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-3">Aktivitas Baru</h3>
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
                        <div class="card-title">Isi aktivitas</div>
                    </div> <!--end::Header--> <!--begin::Form-->
                    <form method="post" enctype="multipart/form-data"> <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-3"> <label for="calon_id" class="form-label">Calon Klien</label>
                                <select class="form-control form-select" name="calon_id" id="calon_id" required>
                                    <option value="">Pilih Calon Klien</option>
                                    <?php foreach($calon_klien as $index => $calon): ?>
                                    <option value="<?= $calon['id'] ?>"><?= $calon['nama'] ?> | <?= $calon['no_hp'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="mb-3"> <label for="tgl_aktivitas" class="form-label">Tanggal Aktivitas</label> <input type="date" class="form-control" id="tgl_aktivitas" aria-describedby="emailHelp" name="tgl_aktivitas" required>
                            </div>
                            <div class="mb-3"> <label for="jenis" class="form-label">Jenis</label>
                                <select class="form-control form-select" name="jenis">
                                    <option value="undangan">Undangan</option>
                                    <option value="proposal">Proposal</option>
                                    <option value="kunjungan">Kunjungan</option>
                                    <option value="webinar">Webinar</option>
                                    <option value="call">Call</option>
                                </select>
                            </div>
                            <div class="mb-3"> <label for="hasil" class="form-label">Hasil</label>
                                <select class="form-control form-select" name="hasil">
                                    <option value="positif">Positif</option>
                                    <option value="followup">Follow Up</option>
                                    <option value="negatif">Negatif</option>
                                </select>
                            </div>
                            <div class="mb-3"> <label for="catatan" class="form-label">Catatan</label> 
                                <textarea class="form-control" id="catatan" name="catatan" required></textarea>
                            </div>
                        </div> <!--end::Body--> <!--begin::Footer-->
                        <div class="card-footer"> <button type="submit" class="btn btn-primary" style="background:#30645b;border-color:#30645b;">Simpan</button>                            <a type="submit" class="btn btn-secondary" href="/admin/aktivitas-prospek">Kembali</a> </div> <!--end::Footer-->
                    </form> <!--end::Form-->
                </div> <!--end::Quick Example-->
            </div> <!-- /.Start col -->
        </div> <!-- /.row (main row) -->
    </div> <!--end::Container-->
</div> <!--end::App Content-->