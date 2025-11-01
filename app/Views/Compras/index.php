<h1>Nueva Compra</h1>
<hr>
<div class="row">
    <form action="<?php echo BASE_URL; ?>/Compras/BuscarProducto" method="post">
     <div class="col-4">
        Id Articulo:
        <input name="id" type="text" class="form-control" require>
    </div>
    <div class="col-2">
        <button class="btn btn-success btn-block mt-4">
            Agregar 
        </button>
    </div>
    </form>
</div>
<?php var_dump($_SESSION['productos']); ?>
<?php if(isset($_SESSION['productos'])): ?>
<div class="row">
    <div class="col">
        <?php foreach($_SESSION['productos'] as $p): 
            echo $p->Id . ' ' . $p->descripcion . ' ' . $p->precio;
        endforeach; ?>
    </div>
</div>
<?php endif;?>