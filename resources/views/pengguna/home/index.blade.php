<div class="app-content-header" style="background: linear-gradient(180deg, #1e293b 0%, #334155 100%); color: white; padding: 2rem 0; margin: -20px -20px 2rem -20px; border-radius: 0;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-3" style="color: white;">Dashboard Pengguna</h3>
                <p class="text-muted mb-0" style="color: #cbd5e1;">Ringkasan data dan statistik sistem</p>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <!-- Total Klien -->
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-circle bg-primary-light mb-3">
                            <i class="bi bi-people-fill text-primary" style="font-size: 1.5rem;"></i>
                        </div>
                        <h5 class="card-title text-muted mb-3">Total Klien</h5>
                        <h2 class="card-text mb-2"><?= number_format($klien) ?></h2>
                        <small class="text-muted">Klien aktif</small>
                    </div>
                </div>
            </div>

            <!-- Total Calon Klien -->
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-circle bg-warning-light mb-3">
                            <i class="bi bi-person-plus-fill text-warning" style="font-size: 1.5rem;"></i>
                        </div>
                        <h5 class="card-title text-muted mb-3">Total Calon Klien</h5>
                        <h2 class="card-text mb-2"><?= number_format($calon_klien) ?></h2>
                        <small class="text-muted">Prospek baru</small>
                    </div>
                </div>
            </div>

            <!-- Total Modul -->
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-circle bg-info-light mb-3">
                            <i class="bi bi-collection-fill text-info" style="font-size: 1.5rem;"></i>
                        </div>
                        <h5 class="card-title text-muted mb-3">Total Modul</h5>
                        <h2 class="card-text mb-2"><?= number_format($modul) ?></h2>
                        <small class="text-muted">Modul tersedia</small>
                    </div>
                </div>
            </div>

            <!-- Total Pengguna -->
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-circle bg-danger-light mb-3">
                            <i class="bi bi-person-badge-fill text-danger" style="font-size: 1.5rem;"></i>
                        </div>
                        <h5 class="card-title text-muted mb-3">Total Pengguna</h5>
                        <h2 class="card-text mb-2"><?= number_format($pengguna) ?></h2>
                        <small class="text-muted">User terdaftar</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-lightning-charge me-2"></i>
                            Akses Cepat
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <a href="/pengguna/calon-klien?t=add" class="text-decoration-none">
                                    <div class="d-flex align-items-center p-3 rounded border">
                                        <i class="bi bi-person-plus-fill text-primary me-3 fs-4"></i>
                                        <div>
                                            <h6 class="mb-1">Tambah Calon Klien</h6>
                                            <small class="text-muted">Input prospek baru</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 mb-3">
                                <a href="/pengguna/klien?t=add" class="text-decoration-none">
                                    <div class="d-flex align-items-center p-3 rounded border">
                                        <i class="bi bi-people-fill text-success me-3 fs-4"></i>
                                        <div>
                                            <h6 class="mb-1">Tambah Klien</h6>
                                            <small class="text-muted">Input klien baru</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 mb-3">
                                <a href="/pengguna/aktivitas-prospek?t=add" class="text-decoration-none">
                                    <div class="d-flex align-items-center p-3 rounded border">
                                        <i class="bi bi-activity text-info me-3 fs-4"></i>
                                        <div>
                                            <h6 class="mb-1">Tambah Aktivitas</h6>
                                            <small class="text-muted">Input aktivitas baru</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 mb-3">
                                <a href="/pengguna/catatan" class="text-decoration-none">
                                    <div class="d-flex align-items-center p-3 rounded border">
                                        <i class="bi bi-journal-text text-warning me-3 fs-4"></i>
                                        <div>
                                            <h6 class="mb-1">Lihat Catatan</h6>
                                            <small class="text-muted">Kelola catatan</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .icon-circle {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    .bg-primary-light {
        background-color: rgba(13, 110, 253, 0.1);
    }
    .bg-warning-light {
        background-color: rgba(255, 193, 7, 0.1);
    }
    .bg-info-light {
        background-color: rgba(13, 202, 240, 0.1);
    }
    .bg-danger-light {
        background-color: rgba(220, 53, 69, 0.1);
    }
    .card-text{
        margin-top: 15px;
    }
    .border {
        transition: all 0.3s ease;
    }
    .border:hover {
        border-color: var(--primary-color) !important;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }
</style>
