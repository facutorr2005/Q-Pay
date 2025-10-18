<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title ?? 'Aplicación MVC'; ?></title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/styles.css">
    <?php if(isset($css_specific)): ?>
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/<?= $css_specific ?>.css">
    <?php endif; ?>
</head>
<body>

<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="border-end bg-light" id="sidebar-wrapper" style="min-width:220px;">
        <div class="sidebar-heading border-bottom bg-white py-3 px-3">ISEI - MVC</div>
        <div class="list-group list-group-flush">
            <a href="<?php echo BASE_URL; ?>/dashboard" class="list-group-item list-group-item-action list-group-item-light p-3">Dashboard</a>
            <a href="<?php echo BASE_URL; ?>/personas" class="list-group-item list-group-item-action list-group-item-light p-3">Personas</a>
            <a href="<?php echo BASE_URL; ?>/direcciones" class="list-group-item list-group-item-action list-group-item-light p-3">Direcciones</a>
        </div>
    </div>

    <!-- Page content wrapper -->
    <div id="page-content-wrapper" class="w-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
            <div class="container-fluid">
                <button class="btn btn-primary d-md-none" id="sidebarToggle" aria-label="Alternar menú">
                    <span class="navbar-toggler-icon">☰</span>
                </button>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <?php if (isset($_SESSION['email'])): ?>
                            <li class="nav-item"><span class="nav-link">Hola, <?php echo htmlspecialchars($_SESSION['email']); ?></span></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>/auth/logout">Cerrar sesión</a></li>
                        <?php else: ?>
                            <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>/login">Iniciar sesión</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid mt-4">
            <?php include $content; ?>
        </div>
    </div>
    </div>

    <!-- Overlay para pantallas pequeñas -->
    <div id="sidebarOverlay" class="d-none"></div>

    <!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<script>
    // Simple sidebar toggle + overlay behavior
    const wrapper = document.getElementById('wrapper');
    const overlay = document.getElementById('sidebarOverlay');
    const toggleBtn = document.getElementById('sidebarToggle');

    function openSidebar() {
        wrapper.classList.add('toggled');
        overlay.classList.remove('d-none');
    }

    function closeSidebar() {
        wrapper.classList.remove('toggled');
        overlay.classList.add('d-none');
    }

    toggleBtn?.addEventListener('click', function () {
        if (wrapper.classList.contains('toggled')) {
            closeSidebar();
        } else {
            openSidebar();
        }
    });

    // Cerrar al hacer click fuera (overlay)
    overlay?.addEventListener('click', function () {
        closeSidebar();
    });
</script>
</body>
</html>
</body>
</html>
