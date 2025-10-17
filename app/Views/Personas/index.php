<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Personas</h2>
            <a href="<?php echo BASE_URL; ?>/personas/crear" class="btn btn-success">Nueva Persona</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($personas as $p): ?>
                        <tr>
                            <td><?php echo $p->Id ?? $p->id; ?></td>
                            <td><?php echo htmlspecialchars($p->Nombre ?? $p->nombre); ?></td>
                            <td><?php echo htmlspecialchars($p->Email ?? $p->email); ?></td>
                            <td>
                                <a href="<?php echo BASE_URL; ?>/personas/editar/<?php echo $p->Id ?? $p->id; ?>" class="btn btn-sm btn-primary">Editar</a>
                                <a href="<?php echo BASE_URL; ?>/personas/eliminar/<?php echo $p->Id ?? $p->id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
