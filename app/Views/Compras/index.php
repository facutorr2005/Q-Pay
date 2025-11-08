<h1>Nueva Compra</h1>
<hr>
<form action="<?php echo BASE_URL; ?>/Compras/BuscarProducto" method="post">
<div class="row">
        <div class="col-4">
        Id Articulo:
        <input name="id" type="text" class="form-control" required>
    </div>
    <div class="col-2">
        <button class="btn btn-success btn-block mt-4">
            Agregar 
        </button>
    </div>
</div>
</form>
<?php if(isset($_SESSION['productos'])): ?>
    <?php $Total= 0; ?>
    <?php foreach($_SESSION['productos'] as $indice => $p): ?>
    <div class="row">
        <div class="col">
            <?php $prod = json_decode($p);
            $Total = $Total + $prod->precio;
            ?>
            <form action="<?php echo BASE_URL; ?>/Compras/EliminarProducto" method="post">
            <?php echo $prod->Id . ' ' . $prod->descripcion . ' ' . $prod->precio;?>
            <input name="posicion" type="hidden" value="<?= $indice ?>">
            <button class="btn btn-danger btn-block mt-1">Eliminar</button>
            </form>
            <hr>
        </div>
    </div>
    <?php endforeach; ?>
    <div>Total:</div> <?= $Total; ?>
    <div>
        <form action="<?php echo BASE_URL; ?>/Compras/Finalizar" method="post">
        <button class="btn btn-success btn-lg">Finalizar Compra</button>
        </form>
    </div>
<?php endif;?>