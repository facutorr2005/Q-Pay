<div class="row">
    <div class="col-md-8 offset-md-2">
        <h2>Editar Persona</h2>
        <form action="<?= BASE_URL ?>/personas/actualizar/<?= $persona->Id; ?>" method="POST">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($persona->Nombre); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($persona->Email); ?>" required>
            </div>
            <button class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>
