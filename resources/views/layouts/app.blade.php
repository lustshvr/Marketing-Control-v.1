<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nerko+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- DataTables CSS -->
    <style>
        .below-minimum {
            color: red;
        }

        .not-passed {
            background-color: rgba(255, 0, 0, 0.1);
        }
    </style>

    <style>
        :root {
            --primary-color: #3b82f6;
            --primary-dark: #2563eb;
            --secondary-color: #64748b;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --info-color: #06b6d4;
            --light-bg: #f8fafc;
            --border-color: #e2e8f0;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --radius: 12px;
            --radius-sm: 8px;
        }

        * {
            box-sizing: border-box;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1020;
            width: 100%;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%) !important;
            border-color: var(--primary-color) !important;
            color: white !important;
            font-weight: 600;
            border-radius: var(--radius-sm);
            padding: 0.75rem 1.5rem;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-dark) 0%, #1d4ed8 100%) !important;
            border-color: var(--primary-dark) !important;
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .btn-primary:active,
        .btn-primary:focus {
            background: linear-gradient(135deg, var(--primary-dark) 0%, #1d4ed8 100%) !important;
            border-color: var(--primary-dark) !important;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2) !important;
        }

        .text-primary {
            --bs-text-opacity: 1;
            color: var(--primary-color) !important;
        }
        .poppins-thin {
          font-family: "Poppins", sans-serif;
          font-weight: 100;
          font-style: normal;
        }

        .poppins-extralight {
          font-family: "Poppins", sans-serif;
          font-weight: 200;
          font-style: normal;
        }

        .poppins-light {
          font-family: "Poppins", sans-serif;
          font-weight: 300;
          font-style: normal;
        }

        .poppins-regular {
          font-family: "Poppins", sans-serif;
          font-weight: 400;
          font-style: normal;
        }

        .poppins-medium {
          font-family: "Poppins", sans-serif;
          font-weight: 500;
          font-style: normal;
        }

        .poppins-semibold {
          font-family: "Poppins", sans-serif;
          font-weight: 600;
          font-style: normal;
        }

        .poppins-bold {
          font-family: "Poppins", sans-serif;
          font-weight: 700;
          font-style: normal;
        }

        .poppins-extrabold {
          font-family: "Poppins", sans-serif;
          font-weight: 800;
          font-style: normal;
        }

        .poppins-black {
          font-family: "Poppins", sans-serif;
          font-weight: 900;
          font-style: normal;
        }

        .poppins-thin-italic {
          font-family: "Poppins", sans-serif;
          font-weight: 100;
          font-style: italic;
        }

        .poppins-extralight-italic {
          font-family: "Poppins", sans-serif;
          font-weight: 200;
          font-style: italic;
        }

        .poppins-light-italic {
          font-family: "Poppins", sans-serif;
          font-weight: 300;
          font-style: italic;
        }

        .poppins-regular-italic {
          font-family: "Poppins", sans-serif;
          font-weight: 400;
          font-style: italic;
        }

        .poppins-medium-italic {
          font-family: "Poppins", sans-serif;
          font-weight: 500;
          font-style: italic;
        }

        .poppins-semibold-italic {
          font-family: "Poppins", sans-serif;
          font-weight: 600;
          font-style: italic;
        }

        .poppins-bold-italic {
          font-family: "Poppins", sans-serif;
          font-weight: 700;
          font-style: italic;
        }

        .poppins-extrabold-italic {
          font-family: "Poppins", sans-serif;
          font-weight: 800;
          font-style: italic;
        }

        .poppins-black-italic {
          font-family: "Poppins", sans-serif;
          font-weight: 900;
          font-style: italic;
        }
    </style>
    <?php if(isset($user->id)): ?>
    <style>
        body {
            display: flex;
            position: relative;
            overflow-x: hidden;
        }

        .sidebar {
            width: 280px;
            height: 100vh;
            background: linear-gradient(180deg, #1e293b 0%, #334155 100%);
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            box-shadow: var(--shadow-lg);
            overflow-y: auto;
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            padding: 14px 24px;
            text-decoration: none;
            color: #cbd5e1;
            font-weight: 500;
            transition: all 0.2s ease;
            border-radius: 0;
            margin: 0;
            position: relative;
            border-left: 3px solid transparent;
        }

        .sidebar a:hover {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.1);
            border-left-color: var(--primary-color);
            transform: translateX(4px);
        }

        .sidebar i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .sidebar h4 a {
            color: white !important;
            font-weight: 700;
            padding: 20px 24px;
            margin: 0;
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar h4 a:hover {
            background-color: transparent !important;
            border-left-color: transparent;
            transform: none;
        }

        .menu-category {
            color: #94a3b8;
            font-size: 11px;
            font-weight: 600;
            padding: 20px 24px 8px 24px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-top: 8px;
            opacity: 0.8;
        }

        .content {
            margin-left: 280px;
            padding: 20px;
            width: 100%;
            transition: margin-left 0.3s ease;
            min-height: 100vh;
        }

        .menu-toggle {
            display: none;
            position: fixed;
            top: 2px;
            left: 6px;
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            z-index: 1100;
            background: #00000066;
            border-radius: 50%;
            width: 48px;
            height: 48px;
        }

        .backdrop {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 900;
            backdrop-filter: blur(4px);
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .content {
                margin-left: 0;
            }
            .menu-toggle {
                display: block;
            }
        }

        div.dt-container div.dt-layout-row div.dt-layout-cell{
            overflow: auto;
        }

        /* Navbar Top */
        .top-navbar {
            background: linear-gradient(180deg, #1e293b 0%, #334155 100%) !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 0.5rem 0;
            position: fixed;
            top: 0;
            z-index: 1030;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Card Styles */
        .card {
            border: none;
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
            transition: all 0.2s ease;
            background: #ffffff;
            overflow: hidden;
        }

        .card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .card-header {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-bottom: 1px solid var(--border-color);
            padding: 1.5rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Table Styles */
        .table {
            margin-bottom: 0;
        }

        .table th {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border: none;
            font-weight: 600;
            color: var(--text-primary);
            padding: 1rem;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table td {
            padding: 1rem;
            vertical-align: middle;
            border-color: var(--border-color);
            color: var(--text-secondary);
        }

        .table tbody tr {
            transition: all 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: #f8fafc;
            transform: scale(1.01);
        }

        /* Badge Styles */
        .badge {
            font-size: 11px;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Form Styles */
        .form-control, .form-select {
            border-radius: var(--radius-sm);
            border: 2px solid var(--border-color);
            padding: 0.75rem 1rem;
            font-size: 14px;
            transition: all 0.2s ease;
            background-color: #ffffff;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            outline: none;
        }

        .form-label {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            font-size: 14px;
        }

        /* Button Styles */
        .btn {
            border-radius: var(--radius-sm);
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            font-size: 14px;
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .btn-success {
            background: linear-gradient(135deg, var(--success-color) 0%, #059669 100%);
            color: white;
        }

        .btn-info {
            background: linear-gradient(135deg, var(--info-color) 0%, #0891b2 100%);
            color: white;
        }

        .btn-warning {
            background: linear-gradient(135deg, var(--warning-color) 0%, #d97706 100%);
            color: white;
        }

        .btn-danger {
            background: linear-gradient(135deg, var(--danger-color) 0%, #dc2626 100%);
            color: white;
        }

        .btn-secondary {
            background: linear-gradient(135deg, var(--secondary-color) 0%, #475569 100%);
            color: white;
        }

        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 13px;
        }

        /* Content Header */
        .app-content-header {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border-bottom: 1px solid var(--border-color);
            padding: 2rem 0;
            margin-bottom: 2rem;
        }

        .app-content-header h3 {
            color: var(--text-primary);
            font-weight: 700;
            margin: 0;
            font-size: 1.75rem;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        /* Animation Classes */
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .slide-in {
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from { transform: translateX(-20px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
        }

        @media (max-width: 991.98px) {
            .top-navbar {
                padding-left: 16px;
                padding-right: 16px;
            }
        }

        /* Adjust content margin when navbar is present */
        body {
            padding-top: 56px;
        }

        @media (min-width: 992px) {
            body {
                padding-top: 0;
            }
            .content {
                margin-left: 250px;
                padding-top: 20px;
            }
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: white;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 0;
            transition: 0.3s;
            z-index: 1040;
            overflow: auto;
            border-right: 1px solid gainsboro;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
            margin-top: 0;
        }

        @media (max-width: 991.98px) {
            body {
                padding-top: 56px;
            }
            .sidebar {
                top: 52px;
                height: calc(100vh - 52px);
            }
            .content {
                margin-left: 0;
                width: 100%;
            }
        }

/*        style for archives status*/
        .revision-none{
            background-color: lightgray;
            color: gray !important;
            padding: 5px;
            border-radius: 5px;
            justify-content: center;
            font-size: 14px;
        }
        .revision-pending{
            background-color: #2f8aff;
            color: white !important;
            padding: 5px;
            border-radius: 5px;
            justify-content: center;
            font-size: 14px;
        }
        .revision-rejected{
            background-color: #ff4a4a;
            color: white;
            padding: 5px;
            border-radius: 5px;
            justify-content: center;
            font-size: 14px;
        }
        .revision-finished{
            background-color: #31cb31;
            color: white;
            padding: 5px;
            border-radius: 5px;
            justify-content: center;
            font-size: 14px;
        }
    </style>
    <?php endif ?>
    <style>

      table.dataTable thead {
        background-color: #d9d9d9;
        color: #000000;
      }

      table.dataTable tbody tr:nth-child(even) {
        background-color: #f4f4f4;
      }

      table.dataTable tbody tr:hover {
        background-color: #eaeaea;
      }

      table.dataTable td, table.dataTable th {
        padding: 10px 14px;
        border: 1px solid #ddd;
      }

      table.dataTable tr{
      	border-color: transparent !important;
      }

      .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #ccc;
        padding: 6px;
        border-radius: 4px;
      }

      .card-title{
        margin-bottom: 0 !important;
      }
    	.sticky-left{
    		position: sticky !important;
    		left: 63px !important;
    		z-index: 1;
            backdrop-filter: blur(50px);
    	}
    	thead tr th.sticky-left{
    		background: #d9d9d9;
    	}
    	.sticky-left-number{
    		left: 0 !important;
    	}
        .form-sub-title{
            margin-bottom: 15px;
            border-left: 5px solid lightgray;
            padding-left: 8px;
            font-size: 18px;
        }
        .form-sub-input{
            margin-left: 20px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 15px;
            border-bottom: 1px solid gainsboro;
            padding-bottom: 15px;
        }
        .form-sub-input input{
            height: 12px;
            width: 12px;
            margin-top: 3px;
        }
        .form-sub-input label{
            font-size: 13px !important;
        }
        body{
            background: whitesmoke;
        }
        .container{
            max-width: 100% !important;
        }
    </style>


</head>
<body class="poppins-thin">
    <body class="poppins-thin">
    <!-- Navbar Baru -->
    <nav class="top-navbar navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="menu-toggle d-lg-none me-2" onclick="toggleMenu()">
                <i class="bi bi-list"></i>
            </button>

            <?php if(isset($user)): ?>
            <div class="ms-auto d-flex align-items-center">
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" style="color: white;" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="me-2 text-end d-none d-sm-block">
                            <div class="fw-bold poppins-semibold" style="color: white;"><?= $user->nama ?></div>
                            <div class="small text-muted text-capitalize" style="color: white;"><?= $user->peran ?></div>
                        </div>
                        <div class="user-avatar">
                            <i class="bi bi-person-circle fs-3"></i>
                            <!-- Jika ingin pakai foto:
                            <img src="/uploads/<?= $user->photo ?? '' ?>" class="rounded-circle" width="32" height="32" onerror="this.onerror=null;this.src='data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_18a5b9a7e8a%20text%20%7B%20fill%3A%23ffffff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_18a5b9a7e8a%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.546875%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E'">
                            -->
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                        <li><a class="dropdown-item" href="{{ url('/profile') }}"><i class="bi bi-person me-2"></i> Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ url('/logout') }}"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
            <?php endif ?>
        </div>
    </nav>
    <button class="menu-toggle" onclick="toggleMenu()"><i class="bi bi-list"></i></button>
    <div class="backdrop" id="backdrop" onclick="toggleMenu()"></div>
    <style type="text/css">
        .menu-category {
            padding: 10px 15px;
            margin-top: 15px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            color: #918e8e;
        }
    </style>
    <nav class="sidebar" id="sidebar" style="padding-top:0;">
        <h4 class="mb-3">
            <a style="margin-right:0;margin-right: 0;
            white-space: pre-wrap;
            text-align: center;
            border-bottom: 2px solid white;
            background: rgb(255, 255, 255) !important;
            padding-top:20px;
            padding-bottom: 20px;" class="navbar-brand d-flex align-items-center flex-column gap-2" href="{{ url('/') }}">
                  <div style="font-size:18px;text-transform: uppercase;font-weight: bold;color: #1e293b;"><?= str_replace('<br>', ' ',$settings->web_title) ?></div>
              </a>
        </h4>
        <?php if(isset($user)): ?>
        <?php if($user->peran === 'admin'): ?>
        <div class="menu-category">Administrator</div>
        <a href="{{ url('/admin/') }}"><i class="bi bi-house-door"></i> Dashboard</a>
        <div class="menu-category">Master Data</div>
        <a href="{{ url('/admin/users') }}"><i class="bi bi-people"></i> Data Pengguna</a>
        <a href="{{ url('/admin/calon-klien') }}"><i class="bi bi-people"></i> Data Calon Klien</a>
        <a href="{{ url('/admin/aktivitas-prospek') }}"><i class="bi bi-activity"></i> Aktivitas Prospek</a>
        <a href="{{ url('/admin/klien') }}"><i class="bi bi-people"></i> Data Klien</a>
        <a href="{{ url('/admin/tagihan-klien') }}"><i class="bi bi-receipt"></i> Data Tagihan Klien</a>
        <a href="{{ url('/admin/notifikasi-tagihan') }}"><i class="bi bi-bell"></i> Notifikasi Tagihan</a>
        <a href="{{ url('/admin/catatan') }}"><i class="bi bi-journal-text"></i> Data Catatan</a>
        <a href="{{ url('/admin/modul') }}"><i class="bi bi-book"></i> Data Modul</a>
        <a href="{{ url('/admin/penggunaan-modul') }}"><i class="bi bi-activity"></i> Penggunaan Modul</a>
        <div class="menu-category">Sistem</div>
        <a href="{{ url('/admin/logs') }}"><i class="bi bi-clock-history"></i> Log Pengguna</a>
        <a href="{{ url('/admin/settings') }}"><i class="bi bi-gear"></i> Pengaturan Web</a>
        <a href="{{ url('/profile') }}"><i class="bi bi-person"></i> Profil Akun</a>
        <?php else: ?>
        <div class="menu-category">Pengguna</div>
        <a href="{{ url('/pengguna/') }}"><i class="bi bi-house-door"></i> Dashboard</a>
        <div class="menu-category">Master Data</div>
        <a href="{{ url('/pengguna/calon-klien') }}"><i class="bi bi-people"></i> Data Calon Klien</a>
        <a href="{{ url('/pengguna/aktivitas-prospek') }}"><i class="bi bi-activity"></i> Aktivitas Prospek</a>
        <a href="{{ url('/pengguna/klien') }}"><i class="bi bi-people"></i> Data Klien</a>
        <a href="{{ url('/pengguna/tagihan-klien') }}"><i class="bi bi-receipt"></i> Data Tagihan Klien</a>
        <a href="{{ url('/pengguna/notifikasi-tagihan') }}"><i class="bi bi-bell"></i> Notifikasi Tagihan</a>
        <a href="{{ url('/pengguna/catatan') }}"><i class="bi bi-journal-text"></i> Data Catatan</a>
        <a href="{{ url('/pengguna/modul') }}"><i class="bi bi-book"></i> Data Modul</a>
        <a href="{{ url('/pengguna/penggunaan-modul') }}"><i class="bi bi-activity"></i> Penggunaan Modul</a>
        <div class="menu-category">Sistem</div>
        <a href="{{ url('/profile') }}"><i class="bi bi-person"></i> Profil Akun</a>
        <?php endif ?>
        <a href="{{ url('/logout') }}"><i class="bi bi-box-arrow-right"></i> Logout</a>
        <?php endif ?>
    </nav>
    <div class="content">
        <div class="container my-5" style="margin-top: 70px !important;">
            <?php include $content ?>
        </div>
    </div>

    <script>
        function toggleMenu() {
            let sidebar = document.getElementById("sidebar");
            let backdrop = document.getElementById("backdrop");
            if (sidebar.style.width === "250px") {
                sidebar.style.width = "0";
                backdrop.style.display = "none";
            } else {
                sidebar.style.width = "250px";
                backdrop.style.display = "block";
            }
        }

        function handleResize() {
            let sidebar = document.getElementById("sidebar");
            let backdrop = document.getElementById("backdrop");
            if (window.innerWidth > 991.98) {
                sidebar.style.width = "250px";
                backdrop.style.display = "none";
            } else {
                sidebar.style.width = "0";
            }
        }

        window.addEventListener("resize", handleResize);
        handleResize();
    </script>
    <!-- Bootstrap JS dan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <script type="text/javascript">
        // working on button style
        document.querySelectorAll('.btn').forEach((item)=>{
            if(!item.classList.contains('btn-sm')){
                item.classList.add('btn-sm');
            }
        })
        // working on card top border color
        document.querySelectorAll('div.card.card-primary.card-outline').forEach((item)=>{
            item.style.borderTopColor = '#33b2ff';
        })
    </script>

</body>
</html>
