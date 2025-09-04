<div class="app-content-header"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-3">Edit Akun</h3>
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
                        <div class="card-title">Isi data akun</div>
                    </div> <!--end::Header--> <!--begin::Form-->
                    <form method="post" enctype="multipart/form-data"> <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-3"> <label for="nama" class="form-label">Nama Lengkap</label> <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" name="nama" required value="<?= $akun['nama'] ?>">
                            </div>
                            <div class="mb-3"> <label for="email" class="form-label">Email</label> <input type="text" class="form-control" id="email" aria-describedby="emailHelp" name="email" required value="<?= $akun['email'] ?>">
                            </div>
                            <div class="mb-3"> <label for="peran" class="form-label">Peran Akun</label> 
                                <select class="form-select" id="peran" name="peran" <?= $akun['peran'] != 'admin' ? 'disabled' : '' ?>>
                                    <option value="admin" <?= $akun['peran'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                                    <option value="pengguna" <?= $akun['peran'] === 'pengguna' ? 'selected' : '' ?>>Pengguna</option>
                                </select>
                            </div>
                            <div class="mb-3"> <label for="aktif" class="form-label">Status Akun</label> 
                                <select class="form-select" id="aktif" name="aktif" <?= $akun['peran'] != 'admin' ? 'disabled' : '' ?>>
                                    <option value="aktif" <?= $akun['aktif'] ? 'selected' : '' ?>>Aktif</option>
                                    <option value="tidak_aktif" <?= !$akun['aktif'] ? 'selected' : '' ?>>Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="mb-3"> <label for="new_password" class="form-label">Password Baru</label> <input type="text" class="form-control" id="new_password" aria-describedby="emailHelp" name="new_password">
                            </div>
                        </div> <!--end::Body--> <!--begin::Footer-->
                        <div class="card-footer"> <button type="submit" class="btn btn-primary" style="background:#30645b;border-color:#30645b;">Simpan</button>                            <a type="submit" class="btn btn-secondary" href="/">Kembali</a> </div> <!--end::Footer-->
                    </form> <!--end::Form-->
                </div> <!--end::Quick Example-->
            </div> <!-- /.Start col -->
        </div> <!-- /.row (main row) -->
    </div> <!--end::Container-->
</div> <!--end::App Content-->