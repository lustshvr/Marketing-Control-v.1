<div class="app-content-header"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-3">Penggunaan Modul Baru</h3>
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
                        <div class="card-title">Isi data penggunaan modul</div>
                    </div> <!--end::Header--> <!--begin::Form-->
                    <form method="post" enctype="multipart/form-data"> <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-3"> <label for="klien_id" class="form-label">Klien</label>
                                <select class="form-control form-select" name="klien_id" id="klien_id" required>
                                    <option value="">Pilih Klien</option>
                                    <?php foreach($klien as $index => $calon): ?>
                                    <option value="<?= $calon['id'] ?>"><?= $calon['nama'] ?> | <?= $calon['no_hp'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="mb-3"> <label for="modul_id" class="form-label">Modul</label>
                                <select class="form-control form-select" name="modul_id" id="modul_id" required>
                                    <option value="">Pilih Modul</option>
                                    <?php foreach($modul as $index => $item): ?>
                                    <option value="<?= $item['id'] ?>"><?= $item['nama'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="mb-3"> <label for="tgl_mulai" class="form-label">Tanggal Mulai</label> <input type="date" class="form-control" id="tgl_mulai" aria-describedby="emailHelp" name="tgl_mulai" required>
                            </div>
                            <div class="mb-3"> <label for="tgl_akhir" class="form-label">Tanggal Akhir</label> <input type="date" class="form-control" id="tgl_akhir" aria-describedby="emailHelp" name="tgl_akhir" required>
                            </div>
                            <div class="mb-3"> <label for="pelatihan_terakhir" class="form-label">Tanggal Pelatihan Terakhir</label> <input type="date" class="form-control" id="pelatihan_terakhir" aria-describedby="emailHelp" name="pelatihan_terakhir" required>
                            </div>
                            <div class="mb-3"> <label for="catatan" class="form-label">Catatan</label> 
                                <textarea class="form-control" id="catatan" name="catatan" required></textarea>
                            </div>
                        </div> <!--end::Body--> <!--begin::Footer-->
                        <div class="card-footer"> <button type="submit" class="btn btn-primary" style="background:#30645b;border-color:#30645b;">Simpan</button>                            <a type="submit" class="btn btn-secondary" href="/admin/penggunaan-modul">Kembali</a> </div> <!--end::Footer-->
                    </form> <!--end::Form-->
                </div> <!--end::Quick Example-->
            </div> <!-- /.Start col -->
        </div> <!-- /.row (main row) -->
    </div> <!--end::Container-->
</div> <!--end::App Content-->