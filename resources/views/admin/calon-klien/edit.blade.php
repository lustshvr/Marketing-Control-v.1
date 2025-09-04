<div class="app-content-header"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-3">Edit Calon Klien</h3>
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
                        <div class="card-title">Isi data klien</div>
                    </div> <!--end::Header--> <!--begin::Form-->
                    <form method="post" enctype="multipart/form-data"> <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-3"> <label for="nama" class="form-label">Nama</label> <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" name="nama" required value="<?= $calon_klien['nama'] ?>">
                            </div>
                            <div class="mb-3"> <label for="alamat" class="form-label">Alamat</label> 
                                <textarea class="form-control" id="alamat" name="alamat" required><?= $calon_klien['alamat'] ?></textarea>
                            </div>
                            <div class="mb-3"> <label for="no_hp" class="form-label">No HP</label> <input type="text" class="form-control" id="no_hp" aria-describedby="emailHelp" name="no_hp" required value="<?= $calon_klien['no_hp'] ?>">
                            </div>
                            <div class="mb-3"> <label for="tahap" class="form-label">Tahap</label>
                                <select class="form-control form-select" name="tahap">
                                    <option value="prospek" <?= $calon_klien['tahap'] === 'prospek' ? 'selected' : '' ?>>Prospek</option>
                                    <option value="followup" <?= $calon_klien['tahap'] === 'followup' ? 'selected' : '' ?>>FollowUp</option>
                                    <option value="negosiasi" <?= $calon_klien['tahap'] === 'negosiasi' ? 'selected' : '' ?>>Negosiasi</option>
                                    <option value="mou" <?= $calon_klien['tahap'] === 'mou' ? 'selected' : '' ?>>MOU</option>
                                    <option value="tidak_terpakai" <?= $calon_klien['tahap'] === 'tidak_terpakai' ? 'selected' : '' ?>>Tidak Terpakai</option>
                                </select>
                            </div>
                            <div class="mb-3"> <label for="sumber" class="form-label">Sumber</label> <input type="text" class="form-control" id="sumber" aria-describedby="emailHelp" name="sumber" required value="<?= $calon_klien['sumber'] ?>">
                            </div>
                            <div class="mb-3"> <label for="catatan" class="form-label">Catatan</label> 
                                <textarea class="form-control" id="catatan" name="catatan" required><?= $calon_klien['catatan'] ?></textarea>
                            </div>
                        </div> <!--end::Body--> <!--begin::Footer-->
                        <div class="card-footer"> <button type="submit" class="btn btn-primary" style="background:#30645b;border-color:#30645b;">Simpan</button>                            <a type="submit" class="btn btn-secondary" href="/admin/calon-klien">Kembali</a> </div> <!--end::Footer-->
                    </form> <!--end::Form-->
                </div> <!--end::Quick Example-->
            </div> <!-- /.Start col -->
        </div> <!-- /.row (main row) -->
    </div> <!--end::Container-->
</div> <!--end::App Content-->