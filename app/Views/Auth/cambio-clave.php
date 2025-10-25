<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Recuperacion de contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/styles.css"> 
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Recuperacion de contraseña</h3>

                        <?php if (isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
                        <?php endif; ?>

                        <p>Ingrese el codigo que le fue enviado a su correo junto con su nueva contraseña.</p>

                        <form action="<?php echo BASE_URL; ?>/Auth/cambioClavePost" method="POST">
                            <div class="mb-3">
                                <label for="codigo" class="form-label">Codigo</label>
                                <input type="codigo" class="form-control" id="codigo" name="codigo" required>
                            </div>
                             <div class="mb-3">
                                <label for="contrasena" class="form-label">Nueva contraseña</label>
                                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                            </div>
                            <div class="mb-3">
                                <label for="password2" class="form-label">Repetir Contraseña</label>
                                <input type="password" class="form-control" id="password2" name="contrasena2" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Confirmar</button>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>


