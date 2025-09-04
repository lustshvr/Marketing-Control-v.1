<div class="app-content-header"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-3">Edit Aktivitas</h3>
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
                        <div class="card-title">Isi data aktivitas</div>
                    </div> <!--end::Header--> <!--begin::Form-->
                    <form method="post" enctype="multipart/form-data"> <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-3"> <label for="calon_id" class="form-label">Calon Klien</label>
                                <select class="form-control form-select" name="calon_id" id="calon_id" required>
                                    <option value="">Pilih Calon Klien</option>
                                    <?php foreach($calon_klien as $index => $calon): ?>
                                    <option value="<?= $calon['id'] ?>" <?= $aktivitas_prospek['calon_id'] === $calon['id'] ? 'selected' : '' ?>><?= $calon['nama'] ?> | <?= $calon['no_hp'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="mb-3"> <label for="tgl_aktivitas" class="form-label">Tanggal Aktivitas</label> <input type="date" class="form-control" id="tgl_aktivitas" aria-describedby="emailHelp" name="tgl_aktivitas" required value="<?= $aktivitas_prospek['tgl_aktivitas'] ?>">
                            </div>
                            <div class="mb-3"> <label for="jenis" class="form-label">Jenis</label>
                                <select class="form-control form-select" name="jenis">
                                    <option value="undangan" <?= $aktivitas_prospek['jenis'] === 'undangan' ? 'selected' : '' ?>>Undangan</option>
                                    <option value="proposal" <?= $aktivitas_prospek['jenis'] === 'proposal' ? 'selected' : '' ?>>Proposal</option>
                                    <option value="kunjungan" <?= $aktivitas_prospek['jenis'] === 'undangan' ? 'selected' : '' ?>>Kunjungan</option>
                                    <option value="webinar" <?= $aktivitas_prospek['jenis'] === 'webinar' ? 'selected' : '' ?>>Webinar</option>
                                    <option value="call" <?= $aktivitas_prospek['jenis'] === 'call' ? 'selected' : '' ?>>Call</option>
                                </select>
                            </div>
                            <div class="mb-3"> <label for="hasil" class="form-label">Hasil</label>
                                <select class="form-control form-select" name="hasil">
                                    <option value="positif" <?= $aktivitas_prospek['hasil'] === 'positif' ? 'selected' : '' ?>>Positif</option>
                                    <option value="followup" <?= $aktivitas_prospek['hasil'] === 'followup' ? 'selected' : '' ?>>Follow Up</option>
                                    <option value="negatif" <?= $aktivitas_prospek['hasil'] === 'negatif' ? 'selected' : '' ?>>Negatif</option>
                                </select>
                            </div>
                            <div class="mb-3"> <label for="catatan" class="form-label">Catatan</label> 
                                <textarea class="form-control" id="catatan" name="catatan" required><?= $aktivitas_prospek['catatan'] ?></textarea>
                            </div>
                        </div> <!--end::Body--> <!--begin::Footer-->
                        <div class="card-footer"> <button type="submit" class="btn btn-primary" style="background:#30645b;border-color:#30645b;">Simpan</button>                            <a type="submit" class="btn btn-secondary" href="/pengguna/aktivitas-prospek">Kembali</a> </div> <!--end::Footer-->
                    </form> <!--end::Form-->
                </div> <!--end::Quick Example-->
            </div> <!-- /.Start col -->
        </div> <!-- /.row (main row) -->
    </div> <!--end::Container-->
</div> <!--end::App Content-->