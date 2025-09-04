<div class="app-content-header"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-3">Akun Baru</h3>
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
                            <div class="mb-3"> <label for="nama" class="form-label">Nama Lengkap</label> <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" name="nama" required>
                            </div>
                            <div class="mb-3"> <label for="email" class="form-label">Email</label> <input type="text" class="form-control" id="email" aria-describedby="emailHelp" name="email" required>
                            </div>
                            <div class="mb-3"> <label for="peran" class="form-label">Peran Akun</label> 
                                <select class="form-select" id="peran" name="peran">
                                    <option value="pengguna">Pengguna</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="mb-3"> <label for="aktif" class="form-label">Status Akun</label> 
                                <select class="form-select" id="aktif" name="aktif">
                                    <option value="aktif">Aktif</option>
                                    <option value="tidak_aktif">Tidak Aktif</option>
                                </select>
                            </div>
                        </div> <!--end::Body--> <!--begin::Footer-->
                        <div class="card-footer"> <button type="submit" class="btn btn-primary btn-sm" style="background:#30645b;border-color:#30645b;">Simpan</button>                            <a type="submit" class="btn btn-secondary btn-sm" href="/admin/users">Kembali</a> </div> <!--end::Footer-->
                    </form> <!--end::Form-->
                </div> <!--end::Quick Example-->
            </div> <!-- /.Start col -->
        </div> <!-- /.row (main row) -->
    </div> <!--end::Container-->
</div> <!--end::App Content-->