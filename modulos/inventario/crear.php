<?php
include("../../bd.php");
if ($_POST) {
    print_r($_POST);    

    // Recolectamos los datos del método POST
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $categoria = isset($_POST["categoria"]) ? $_POST["categoria"] : "";
    $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
    $cantidad = isset($_POST["cantidad"]) ? $_POST["cantidad"] : "";
    $unidad = isset($_POST["unidad"]) ? $_POST["unidad"] : "";
    $fechaingreso = isset($_POST["fechaingreso"]) ? $_POST["fechaingreso"] : "";
    $fechacaducidad = isset($_POST["fechacaducidad"]) ? $_POST["fechacaducidad"] : "";
    $costo = isset($_POST["costo"]) ? $_POST["costo"] : "";
    $precio = isset($_POST["precio"]) ? $_POST["precio"] : "";

    // Preparar la inserción de los datos
    $sentencia = $conexion->prepare("INSERT INTO tbl_inventario (id, nombre, categoria, descripcion, cantidad, unidad, fechaingreso, fechacaducidad, costo, precio)
                                     VALUES (null, :nombre, :categoria, :descripcion, :cantidad, :unidad, :fechaingreso, :fechacaducidad, :costo, :precio)");
    
    // Asignando los valores que vienen del método POST (los que vienen del formulario)
    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":categoria", $categoria);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->bindParam(":cantidad", $cantidad);
    $sentencia->bindParam(":unidad", $unidad);
    $sentencia->bindParam(":fechaingreso", $fechaingreso);
    $sentencia->bindParam(":fechacaducidad", $fechacaducidad);
    $sentencia->bindParam(":costo", $costo);
    $sentencia->bindParam(":precio", $precio);

    // Ejecutar la sentencia
    $sentencia->execute();

    // Mensaje y redirección
    $mensaje = "Nuevo Producto Agregado";
    header("Location:index.php?mensaje=" . $mensaje);
}


include("../../templates/header.php"); ?>
<?php include("fondo.html");?>


<br/><br>

<div class="card animate__animated animate__rollIn" style="width: 80%; margin-left: 10%; margin-right: 10%;">

    <div class="card-header text-center"><h3>Formulario Nuevo Producto</h3></div>
    <div class="card-body">
        
    <form action="" method="post" enctype="multipart/form-data">

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input
            type="text"
            class="form-control"
            name="nombre"
            id="nombre"
            aria-describedby="helpId"
            placeholder="Nombre Del Producto"
        />
    </div>
    <div class="mb-3">
    <label for="categoria" class="form-label">Categoria</label>
    <select class="form-control" name="categoria" id="categoria" aria-describedby="helpId">
        <option value="Panes">Panes</option>
        <option value="Frutas">Frutas</option>
        <option value="Lacteos">Lacteos</option>
        <option value="Ingredientes">Ingredientes</option>
        <option value="Pasabocas">Pasabocas</option>
    </select>
</div>

     
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion</label>
        <input
            type="text"
            class="form-control"
            name="descripcion"
            id="descripcion"
            aria-describedby="helpId"
            placeholder="Descripcion"
        />
    </div>

    <div class="mb-3">
        <label for="cantidad" class="form-label">Cantidad En Stock</label>
        <input
            type="text"
            class="form-control"
            name="cantidad"
            id="cantidad"
            aria-describedby="helpId"
            placeholder="Cantidad"
        />
    </div>

    <div class="mb-3">
    <label for="unidad" class="form-label">Unidad De Medida</label>
    <select class="form-control" name="unidad" id="unidad" aria-describedby="helpId">
        <option value="unidad">Unidad</option>
        <option value="kg">Kilogramos (kg)</option>
        <option value="g">Gramos (g)</option>
        <option value="l">Litros (l)</option>
        <option value="ml">Mililitros (ml)</option>
    </select>
    </div>


    <div class="mb-3">
        <label for="fechaingreso" class="form-label">Fecha De Ingreso</label>
        <input
            type="date"
            class="form-control"
            name="fechaingreso"
            id="fechaingreso"
            aria-describedby="helpId"
            placeholder="Fecha Ingreso"
        />
    </div>


    <div class="mb-3">
        <label for="fechacaducidad" class="form-label">Fecha De Caducidad</label>
        <input
            type="date"
            class="form-control"
            name="fechacaducidad"
            id="fechacaducidad"
            aria-describedby="helpId"
            placeholder="Fecha De Caducidad"
        />
    </div>

    <div class="mb-3">
        <label for="costo" class="form-label">Costo Unitario</label>
        <input
            type="text"
            class="form-control"
            name="costo"
            id="costo"
            aria-describedby="helpId"
            placeholder="Costo Unitario"
        />
    </div>

    <div class="mb-3">
        <label for="precio" class="form-label">Precio Venta</label>
        <input
            type="text"
            class="form-control"
            name="precio"
            id="precio"
            aria-describedby="helpId"
            placeholder="Precio Venta"
        />
    </div>

    <button
        type="submit"
        class="btn btn-success hvr-pulse">Agregar Producto</button>
    <a
        name=""
        id=""
        class="btn btn-danger hvr-wobble-horizontal"
        href="index.php"
        role="button"
        >Cancelar</a
    >
    
    </button>
    
    
    
    
    

    </form>
    </div>
    <div class="card-footer text-muted text-center">FORMULARIO PARA INGRESO DE NUEVOS EMPLEADOS</div>
</div>

<?php include("../../templates/footer.php"); ?>   















<?php include("../../templates/footer.php"); ?>