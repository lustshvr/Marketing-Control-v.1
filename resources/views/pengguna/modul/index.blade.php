<div class="app-content-header"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-3">Master Modul</h3>
            </div>
        </div> <!--end::Row-->
    </div> <!--end::Container-->
</div> <!--end::App Content Header--> <!--begin::App Content-->
<div class="app-content"> <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row"> <!-- Start col -->
            <div class="col-lg-12 col-12 connectedSortable">
                <div class="card mb-4" style="box-shadow:none;">
                    <div class="p-3 d-flex justify-content-between align-items-center" style="border-bottom:1px solid gainsboro;">
                        <h3 class="card-title">Daftar Modul</h3>
                        <div class="d-flex gap-2">
                            <a href="/pengguna/modul/export">
                                <button class="btn btn-success btn-sm" style="background:#28a745;border-color:#28a745;">
                                    <i class="bi bi-file-earmark-excel"></i> Export Excel
                                </button>
                            </a>
                            <a href="/pengguna/modul?t=add">
                                <button class="btn btn-primary btn-sm" style="background:#30645b;border-color:#30645b;"><i class="bi bi-plus"></i> Modul Baru</button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th style="width:100px !important;">No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Tanggal Diupdate</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $index = 0; ?>
                                <?php foreach($modul as $item): ?>
                                <?php $index += 1; ?>
                                <tr>
                                    <td style="width:100px !important;"><?= $index ?></td>
                                    <td><?= $item['kode'] ?></td>
                                    <td><?= $item['nama'] ?></td>
                                    <td><?= $item['deskripsi'] ?></td>
                                    <td><?= $item['created_at'] ?></td>
                                    <td><?= $item['updated_at'] ?></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="/pengguna/modul?t=edit&id=<?= $item['id'] ?>">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="bi bi-pen"></i>
                                                </button>
                                            </a>
                                            <a href="/pengguna/modul?t=delete&id=<?= $item['id'] ?>">
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- /.card -->
            </div> <!-- /.Start col -->
        </div> <!-- /.row (main row) -->
    </div> <!--end::Container-->
</div> <!--end::App Content-->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        let table = new DataTable('#myTable', {});
    });
</script>
