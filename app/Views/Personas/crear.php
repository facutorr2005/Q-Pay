<div class="row">
    <div class="col-md-8 offset-md-2">
        <h2>Nueva Persona</h2>
        <form action="<?php echo BASE_URL; ?>/personas/guardar" method="POST">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <button class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
