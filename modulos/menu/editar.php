<?php
include("../../bd.php");

if($_POST){
    $txtID = isset($_POST["txtID"]) ? $_POST["txtID"] : "";
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $ingredientes = isset($_POST["ingredientes"]) ? $_POST["ingredientes"] : "";
    $precio = isset($_POST["precio"]) ? $_POST["precio"] : "";

    $sentencia = $conexion->prepare("UPDATE tbl_menu SET 
        nombre = :nombre,
        ingredientes = :ingredientes,
        precio = :precio 
        WHERE id = :id ");

    $sentencia->bindValue(":nombre", $nombre);
    $sentencia->bindValue(":ingredientes", $ingredientes);
    $sentencia->bindValue(":precio", $precio);
    $sentencia->bindValue(":id", $txtID);
    $sentencia->execute();

$foto = isset($_FILES['foto']["name"]) ? $_FILES['foto']["name"] : "";
$tmp_foto = isset($_FILES["foto"]["tmp_name"]) ? $_FILES["foto"]["tmp_name"] : "";

if ($foto !== "") {
    $fecha_foto = new DateTime();
    $nombre_foto = $fecha_foto->getTimestamp() . "_" . $foto;
    move_uploaded_file($tmp_foto, "./" . $nombre_foto);

    $sentencia_select = $conexion->prepare("SELECT * FROM tbl_menu WHERE ID = :id");
    $sentencia_select->bindParam(":id", $txtID);
    $sentencia_select->execute();
    $registro_foto = $sentencia_select->fetch(PDO::FETCH_LAZY);

    if (isset($registro_foto['foto'])) {
        if (file_exists("./" . $registro_foto['foto'])) {
            unlink("./" . $registro_foto['foto']);
        }
    }

    $sentencia_update = $conexion->prepare("UPDATE tbl_menu
            SET 
            foto=:foto
            WHERE ID=:id");

    $sentencia_update->bindParam(":foto", $nombre_foto);
    $sentencia_update->bindParam(":id", $txtID);
    $sentencia_update->execute();
}
    header("Location:index.php");
}



if(isset($_GET['txtID'])){
    $txtID = $_GET["txtID"];
    $sentencia = $conexion->prepare("SELECT * FROM tbl_menu WHERE ID=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $nombre = $registro["nombre"];
    $ingredientes = $registro["ingredientes"];
    $foto = $registro["foto"];
    $precio = $registro["precio"];
}

include("../../templates/header.php");
include("fondo.html");?>


<br>
<div class="card animate__animated animate__backInDown" style="width: 80%; margin-left: 10%; margin-right: 10%;">
<div class="card-header text-center"><h3>Formulario Editar Plato</h3></div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="txtID" class="form-label">ID:</label>
                <input type="text" class="form-control" value="<?php echo $txtID;?>" name="txtID" id="txtID" aria-describedby="helpId" placeholder=""/>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" value="<?php echo $nombre;?>" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre"/>
            </div>
            <div class="mb-3">
                <label for="ingredientes" class="form-label">Ingredientes</label>
                <input type="text" class="form-control" value="<?php echo $ingredientes;?>" name="ingredientes" id="ingredientes" aria-describedby="helpId" placeholder="Ingredientes"/>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <br>
                <img width="90" src="./<?php echo $foto;?>" />
                <input type="file" class="form-control" name="foto" id="foto" placeholder="" aria-describedby="fileHelpId"/>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" class="form-control" value="<?php echo $precio;?>" name="precio" id="precio" aria-describedby="helpId" placeholder="Precio"/>
            </div>
            <button type="submit" class="btn btn-success hvr-pulse">Agregar</button>
            <a name="" id="" class="btn btn-danger hvr-wobble-horizontal" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../templates/footer.php");