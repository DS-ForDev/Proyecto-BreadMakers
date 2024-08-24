<?php
include("../../bd.php");

if($_POST){

    //Recolectamos los datos del metodo POST
    $nombre=(isset($_POST["nombre"])?$_POST["nombre"]:"");
    

    $foto=(isset($_FILES["foto"]['name'])?$_FILES["foto"]['name']:"");
    $info=(isset($_FILES["info"]['name'])?$_FILES["info"]['name']:"");

    $idmateria=(isset($_POST["idmateria"])?$_POST["idmateria"]:"");
    $fechaingreso=(isset($_POST["fechaingreso"])?$_POST["fechaingreso"]:"");

    //Preparar La insercion de los datos
    $sentencia=$conexion->prepare("INSERT INTO
     `tbl_proveedores` (`id`, `nombre`, `foto`, `info`, `idmateria`, `fechaingreso`) 
     VALUES (NULL, :nombre, :foto,:info,:idmateria,:fechaingreso);");

     $sentencia->bindParam(":nombre",$nombre);
    
    //Codigo que nos permite adjuntar la foto
     $fecha_=new DateTime();
    //Permite adjuntar la foto
     $nombreArchivo_foto=($foto!='')?$fecha_->getTimestamp()."_".$_FILES["foto"]['name']:"";

     $tmp_foto=$_FILES["foto"]['tmp_name'];

     if($tmp_foto!=''){
        move_uploaded_file($tmp_foto,"./".$nombreArchivo_foto);
     }
     $sentencia->bindParam(":foto",$nombreArchivo_foto);
     //Fin del codigo paea Adjuntar foto
     //Permite adjuntar la Info
     $nombreArchivo_info=($info!='')?$fecha_->getTimestamp()."_".$_FILES["info"]['name']:"";

     $tmp_info=$_FILES["info"]['tmp_name'];

     if($tmp_info!=''){
        move_uploaded_file($tmp_info,"./".$nombreArchivo_info);
     }
     $sentencia->bindParam(":info",$nombreArchivo_info);
     //Fin del codigo paea Adjuntar CV
     $sentencia->bindParam(":idmateria",$idmateria);
     $sentencia->bindParam(":fechaingreso",$fechaingreso);
     $sentencia->execute();

     $mensaje="Proveedor Agregado";
     header("Location:index.php?mensaje=".$mensaje);
}

$sentencia = $conexion->prepare("SELECT id, nombremateriaprima FROM tbl_materiaprima");
$sentencia->execute(); 
$lista_tbl_materiaprima = $sentencia->fetchAll(PDO::FETCH_ASSOC);


?>

<?php include("../../templates/header.php"); ?> 
<?php include("fondo.html");?>

<br/>

<div class="card animate__animated animate__rollIn" style="width: 80%; margin-left: 10%; margin-right: 10%;">
    <div class="card-header text-center"><h3>Formulario Nuevo Proveedor</h3></div>
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
            placeholder="Nombre Del Proveedor"
        />
    

    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input
            type="file"
            class="form-control"
            name="foto"
            id="foto"
            aria-describedby="helpId"
            placeholder="Foto"
        />
    </div>

    <div class="mb-3">
        <label for="info" class="form-label">Informacion Detallada.pdf</label>
        <input
            type="file"
            class="form-control"
            name="info"
            id="info"
            aria-describedby="helpId"
            placeholder="Informacion Detallada (PDF)"
        />
    </div>

    <div class="mb-3">
        <label for="idmateria" class="form-label">Materia Prima</label>

        <select class="form-select form-select-sm" name="idmateria" id="idmateria">
            <?php foreach ($lista_tbl_materiaprima as $registro) { ?>
                <option value="<?php echo $registro['id']?>">
                    <?php echo $registro['nombremateriaprima']?>
                </option>
            <?php } ?>
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
            placeholder="Fecha De Ingreso"
        />
    </div>

    <button
        type="submit"
        class="btn btn-success hvr-pulse">Agregar Proveedor</button>
    <a
        name=""
        id=""
        class="btn btn-primary hvr-wobble-horizontal"
        href="index.php"
        role="button"
        >Cancelar</a
    >
    
    </button>
    
    
    
    
    

    </form>
    </div>
    <div class="card-footer text-muted text-center">FORMULARIO PARA INGRESO DE NUEVOS PROVEEDORES</div>
</div>


<?php include("../../templates/footer.php"); ?> 