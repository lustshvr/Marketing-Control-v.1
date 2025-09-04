<div class="app-content-header"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-3">Klien Baru</h3>
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
                            <div class="mb-3"> <label for="nama" class="form-label">Nama</label> <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" name="nama" required>
                            </div>
                            <div class="mb-3"> <label for="alamat" class="form-label">Alamat</label> 
                                <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                            </div>
                            <div class="mb-3"> <label for="no_hp" class="form-label">No HP</label> <input type="text" class="form-control" id="no_hp" aria-describedby="emailHelp" name="no_hp" required>
                            </div>
                            <div class="mb-3"> <label for="narahubung" class="form-label">Narahubung</label> <input type="text" class="form-control" id="narahubung" aria-describedby="emailHelp" name="narahubung" required>
                            </div>
                            <div class="mb-3"> <label for="jenjang" class="form-label">Jenjang</label>
                                <select class="form-control form-select" name="jenjang">
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="SMK">SMK</option>
                                    <option value="Kursus">Kursus</option>
                                    <option value="Lain">Lain</option>
                                </select>
                            </div>
                            <div class="mb-3"> <label for="jumlah_siswa" class="form-label">Jumlah Siswa</label> <input type="text" class="form-control" id="jumlah_siswa" aria-describedby="emailHelp" name="jumlah_siswa" required>
                            </div>
                            <div class="mb-3"> <label for="tgl_mou" class="form-label">Tanggal MOU</label> <input type="date" class="form-control" id="tgl_mou" aria-describedby="emailHelp" name="tgl_mou" required>
                            </div>
                            <div class="mb-3"> <label for="catatan" class="form-label">Catatan</label> 
                                <textarea class="form-control" id="catatan" name="catatan" required></textarea>
                            </div>
                        </div> <!--end::Body--> <!--begin::Footer-->
                        <div class="card-footer"> <button type="submit" class="btn btn-primary" style="background:#30645b;border-color:#30645b;">Simpan</button>                            <a type="submit" class="btn btn-secondary" href="/pengguna/klien">Kembali</a> </div> <!--end::Footer-->
                    </form> <!--end::Form-->
                </div> <!--end::Quick Example-->
            </div> <!-- /.Start col -->
        </div> <!-- /.row (main row) -->
    </div> <!--end::Container-->
</div> <!--end::App Content-->