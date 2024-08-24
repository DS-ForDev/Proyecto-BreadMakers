<?php
include("../../bd.php");

if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    $sentencia = $conexion->prepare("SELECT * FROM tbl_inventario WHERE id = :id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    if ($registro) {
        $nombre = $registro["nombre"];
        $categoria = $registro["categoria"];
        $descripcion = $registro["descripcion"];
        $cantidad = $registro["cantidad"];
        $unidad = $registro["unidad"];
        $fechaingreso = $registro["fechaingreso"];
        $fechacaducidad = $registro["fechacaducidad"];
        $costo = $registro["costo"];
        $precio = $registro["precio"];
    }
}

if ($_POST) {
    // Recolectamos los datos del método POST
    $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $categoria = isset($_POST["categoria"]) ? $_POST["categoria"] : "";
    $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
    $cantidad = isset($_POST["cantidad"]) ? $_POST["cantidad"] : "";
    $unidad = isset($_POST["unidad"]) ? $_POST["unidad"] : "";
    $fechaingreso = isset($_POST["fechaingreso"]) ? $_POST["fechaingreso"] : "";
    $fechacaducidad = isset($_POST["fechacaducidad"]) ? $_POST["fechacaducidad"] : "";
    $costo = isset($_POST["costo"]) ? $_POST["costo"] : "";
    $precio = isset($_POST["precio"]) ? $_POST["precio"] : "";

    // Preparar la actualización de los datos
    $sentencia = $conexion->prepare("UPDATE tbl_inventario SET nombre = :nombre, categoria = :categoria, descripcion = :descripcion, cantidad = :cantidad, unidad = :unidad, fechaingreso = :fechaingreso, fechacaducidad = :fechacaducidad, costo = :costo, precio = :precio WHERE id = :id");

    // Asignando los valores que vienen del método POST
    $sentencia->bindParam(":id", $txtID);
    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":categoria", $categoria);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->bindParam(":cantidad", $cantidad);
    $sentencia->bindParam(":unidad", $unidad);
    $sentencia->bindParam(":fechaingreso", $fechaingreso);
    $sentencia->bindParam(":fechacaducidad", $fechacaducidad);
    $sentencia->bindParam(":costo", $costo);
    $sentencia->bindParam(":precio", $precio);
    $sentencia->execute();

    $mensaje = "Registro Actualizado";
    header("Location:index.php?mensaje=" . $mensaje);
    exit();
}
include("../../templates/header.php"); ?>
<?php include("fondo.html");?>


<br/><br>

<div class="card animate__animated animate__rollIn" style="width: 80%; margin-left: 10%; margin-right: 10%;">

    <div class="card-header text-center"><h3>Formulario Editar Producto</h3></div>
    <div class="card-body">
        
    <form action="" method="post" enctype="multipart/form-data">

    <div class="mb-3">
        <label for="txtID" class="form-label">ID:</label>
        <input
            type="text"
            value="<?php echo $txtID;?>"
            class="form-control"
            readonly
            name="txtID"
            id="txtID"
            aria-describedby="helpId"
            placeholder="ID"
        />
    </div>

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input
            type="text"
            value="<?php echo $nombre;?>"
            class="form-control"
            name="nombre"
            id="nombre"
            aria-describedby="helpId"
            placeholder="Nombre Del Producto"
        />
    </div>
    <div class="mb-3">
    <label for="categoria" class="form-label">Categoria</label>
    <select class="form-control" value="<?php echo $categoria;?>" name="categoria" id="categoria" aria-describedby="helpId">
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
            value="<?php echo $descripcion;?>"
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
            value="<?php echo $cantidad;?>"
            class="form-control"
            name="cantidad"
            id="cantidad"
            aria-describedby="helpId"
            placeholder="Cantidad"
        />
    </div>

    <div class="mb-3">
    <label for="unidad" class="form-label">Unidad De Medida</label>
    <select class="form-control" value="<?php echo $unidad;?>" name="unidad" id="unidad" aria-describedby="helpId">
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
            value="<?php echo $fechaingreso;?>"
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
            value="<?php echo $fechacaducidad;?>"
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
            value="<?php echo $costo;?>"
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
            value="<?php echo $precio;?>"
            class="form-control"
            name="precio"
            id="precio"
            aria-describedby="helpId"
            placeholder="Precio Venta"
        />
    </div>

    <button
        type="submit"
        class="btn btn-success hvr-pulse">Actualizar Producto</button>
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