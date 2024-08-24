<?php 
include("../../bd.php"); 
if($_POST){


    $nombre=(isset($_POST["nombre"]))?$_POST["nombre"]:"";
    $ingredientes=(isset($_POST["ingredientes"]))?$_POST["ingredientes"]:"";
    $precio=(isset($_POST["precio"]))?$_POST["precio"]:"";

    $sentencia=$conexion->prepare("INSERT INTO tbl_menu(id,nombre, ingredientes, foto, precio)
    VALUES (null, :nombre, :ingredientes, :foto , :precio)");

    $foto=(isset($_FILES["foto"]["name"]))?$_FILES["foto"]["name"]:"";
    $fecha_foto= new DateTime();
    $nombre_foto=$fecha_foto->getTimestamp()."_".$foto;
    $tmp_foto= $_FILES["foto"]["tmp_name"];

    if ($tmp_foto!=""){
        move_uploaded_file($tmp_foto, "./".$nombre_foto);
    }

    $sentencia->bindParam(":foto",$nombre_foto);
    $sentencia->bindParam(":nombre",$nombre);
    $sentencia->bindParam(":ingredientes",$ingredientes);
    $sentencia->bindParam(":precio",$precio);

    $sentencia->execute();


    $mensaje="Plato Agregado";
    header("Location:index.php?mensaje=".$mensaje);

    

}

include("../../templates/header.php"); ?>
<?php include("fondo.html");?>
<br>
<div class="card animate__animated animate__backInDown" style="width: 80%; margin-left: 10%; margin-right: 10%;">
<div class="card-header text-center"><h3>Formulario Nuevo Plato</h3></div>
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
                placeholder="Nombre"
            />
        </div>
        <div class="mb-3">
            <label for="ingredientes" class="form-label">Ingredientes</label>
            <input
                type="text"
                class="form-control"
                name="ingredientes"
                id="ingredientes"
                aria-describedby="helpId"
                placeholder="Ingredientes"
            />
            
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input
                type="file"
                class="form-control"
                name="foto"
                id="foto"
                placeholder=""
                aria-describedby="fileHelpId"
            />
            
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input
                type="text"
                class="form-control"
                name="precio"
                id="precio"
                aria-describedby="helpId"
                placeholder="Precio"
            />
        </div>
        
        <button
            type="submit"
            class="btn btn-success hvr-pulse"
        >
            Agregar
        </button>

        <a
            name=""
            id=""
            class="btn btn-danger hvr-wobble-horizontal"
            href="index.php"
            role="button"
            >Cancelar</a
        >
    </form>

    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../templates/footer.php"); ?>

