<div class="app-content-header" style="background: white; color: black; padding: 2rem 0; margin: -20px -20px 2rem -20px; border-radius: 0;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-3" style="color: black;">Data Catatan</h3>
            </div>
        </div>
    </div>
</div>
<!--begin::App Content-->
<div class="app-content"> <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row"> <!-- Start col -->
            <div class="col-lg-12 col-12 connectedSortable">
                <div class="card mb-4" style="box-shadow:none;">
                    <div class="p-3 d-flex justify-content-between align-items-center" style="border-bottom:1px solid gainsboro;">
                        <h3 class="card-title">Daftar Catatan</h3>
                        <div class="d-flex gap-2">
                            <form method="GET" action="/admin/catatan" class="d-flex gap-2">
                                <select name="filter" class="form-select form-select-sm" style="width: auto;">
                                    <option value="semua" <?= $filter === 'semua' ? 'selected' : '' ?>>Semua</option>
                                    <option value="calon_klien" <?= $filter === 'calon_klien' ? 'selected' : '' ?>>Calon Klien</option>
                                    <option value="klien" <?= $filter === 'klien' ? 'selected' : '' ?>>Klien</option>
                                    <option value="prospek" <?= $filter === 'prospek' ? 'selected' : '' ?>>Aktivitas Prospek</option>
                                </select>
                                <button type="submit" class="btn btn-info btn-sm">
                                    <i class="bi bi-funnel"></i> Filter
                                </button>
                            </form>

                        </div>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th style="width:100px !important;">No</th>
                                    <th>Jenis</th>
                                    <th>Nama</th>
                                    <th>Catatan</th>
                                    <th>Pembuat/Milik</th>
                                    <th>Tanggal Dibuat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $index = 0; ?>
                                <?php foreach($data_catatan as $item): ?>
                                <?php $index += 1; ?>
                                <tr>
                                    <td style="width:100px !important;"><?= $index ?></td>
                                    <td>
                                        <?php
                                            $warna = '';
                                            switch($item['jenis']) {
                                                case 'Calon Klien':
                                                    $warna = '#ffc107'; // kuning
                                                    break;
                                                case 'Klien':
                                                    $warna = '#28a745'; // hijau
                                                    break;
                                                case 'Aktivitas Prospek':
                                                    $warna = '#17a2b8'; // biru
                                                    break;
                                            }
                                        ?>
                                        <span class="badge" style="background-color: <?= $warna ?>">
                                            <?= $item['jenis'] ?>
                                        </span>
                                    </td>
                                    <td><?= $item['nama'] ?></td>
                                    <td><?= $item['catatan'] ?></td>
                                    <td><?= $item['pembuat'] ?></td>
                                    <td><?= date('d-m-Y H:i:s', strtotime($item['tanggal'])) ?></td>
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
