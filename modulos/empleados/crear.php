<?php
include("../../bd.php");

if($_POST){

    //Recolectamos los datos del metodo POST
    $primernombre=(isset($_POST["primernombre"])?$_POST["primernombre"]:"");
    $segundonombre=(isset($_POST["segundonombre"])?$_POST["segundonombre"]:"");
    $primerapellido=(isset($_POST["primerapellido"])?$_POST["primerapellido"]:"");
    $segundoapellido=(isset($_POST["segundoapellido"])?$_POST["segundoapellido"]:"");

    $foto=(isset($_FILES["foto"]['name'])?$_FILES["foto"]['name']:"");
    $cv=(isset($_FILES["cv"]['name'])?$_FILES["cv"]['name']:"");

    $idpuesto=(isset($_POST["idpuesto"])?$_POST["idpuesto"]:"");
    $fechaingreso=(isset($_POST["fechaingreso"])?$_POST["fechaingreso"]:"");

    //Preparar La insercion de los datos
    $sentencia=$conexion->prepare("INSERT INTO
    `tbl_empleados` (`id`, `primernombre`, `segundonombre`, `primerapellido`, `segundoapellido`, `foto`, `cv`, `idpuesto`, `fechaingreso`) 
    VALUES (NULL, :primernombre, :segundonombre, :primerapellido, :segundoapellido,:foto,:cv,:idpuesto,:fechaingreso);");

    $sentencia->bindParam(":primernombre",$primernombre);
    $sentencia->bindParam(":segundonombre",$segundonombre);
    $sentencia->bindParam(":primerapellido",$primerapellido);
    $sentencia->bindParam(":segundoapellido",$segundoapellido);
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
     //Permite adjuntar el CV
    $nombreArchivo_cv=($cv!='')?$fecha_->getTimestamp()."_".$_FILES["cv"]['name']:"";

    $tmp_cv=$_FILES["cv"]['tmp_name'];

    if($tmp_cv!=''){
        move_uploaded_file($tmp_cv,"./".$nombreArchivo_cv);
    }
    $sentencia->bindParam(":cv",$nombreArchivo_cv);
     //Fin del codigo paea Adjuntar CV
    $sentencia->bindParam(":idpuesto",$idpuesto);
    $sentencia->bindParam(":fechaingreso",$fechaingreso);
    $sentencia->execute();

    $mensaje="Empleado Agregado";
    header("Location:index.php?mensaje=".$mensaje);
}

$sentencia=$conexion->  prepare("SELECT * FROM tbl_puestos");
$sentencia->execute(); 
$lista_tbl_puestos=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include("../../templates/header.php"); ?> 
<?php include("fondo.html");?>

<br/><br>

<div class="card animate__animated animate__rollIn" style="width: 80%; margin-left: 10%; margin-right: 10%;">

    <div class="card-header text-center"><h3>Formulario Nuevo Empleado</h3></div>
    <div class="card-body">
        
    <form action="" method="post" enctype="multipart/form-data">

    <div class="mb-3">
        <label for="primernombre" class="form-label">Primer Nombre</label>
        <input
            type="text"
            class="form-control"
            name="primernombre"
            id="primernombre"
            aria-describedby="helpId"
            placeholder="Primer Nombre"
        />
    </div>
    <div class="mb-3">
        <label for="segundonombre" class="form-label">Segundo Nombre</label>
        <input
            type="text"
            class="form-control"
            name="segundonombre"
            id="segundonombre"
            aria-describedby="helpId"
            placeholder="Segundo Nombre"
        />
    </div>
    
    <div class="mb-3">
        <label for="primerapellido" class="form-label">Primer apellido</label>
        <input
            type="text"
            class="form-control"
            name="primerapellido"
            id="primerapellido"
            aria-describedby="helpId"
            placeholder="Primer apellido"
        />
    </div>

    <div class="mb-3">
        <label for="segundoapellido" class="form-label">Segundo Apellido</label>
        <input
            type="text"
            class="form-control"
            name="segundoapellido"
            id="segundoapellido"
            aria-describedby="helpId"
            placeholder="Segundo Apellido"
        />
    </div>

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
        <label for="cv" class="form-label">cv.pdf</label>
        <input
            type="file"
            class="form-control"
            name="cv"
            id="cv"
            aria-describedby="helpId"
            placeholder="cv.pdf"
        />
    </div>

    <div class="mb-3">
        <label for="idpuesto" class="form-label">Puesto</label>

        <select class="form-select form-select-sm" name="idpuesto" id="idpuesto">
            <?php foreach ($lista_tbl_puestos as $registro) { ?>
                <option value="<?php echo $registro['id']?>">
                <?php echo $registro['nombre_puesto']?></option>
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
        class="btn btn-success hvr-pulse">Agregar Empleado</button>
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