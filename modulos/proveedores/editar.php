<?php
include("../../bd.php");

if(isset($_GET['txtID'])){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("SELECT * FROM tbl_proveedores WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);


    $nombre=$registro["nombre"];

    $foto=$registro["foto"];
    $info=$registro["info"];

    $idmateria=$registro["idmateria"];
    $fechaingreso=$registro["fechaingreso"];

    $sentencia=$conexion->  prepare("SELECT * FROM tbl_materiaprima");
    $sentencia->execute(); 
    $lista_tbl_materiaprima=$sentencia->fetchAll(PDO::FETCH_ASSOC);
 
}
if($_POST){

    //Recolectamos los datos del metodo POST
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $nombre=(isset($_POST["nombre"])?$_POST["nombre"]:"");
    $idmateria=(isset($_POST["idmateria"])?$_POST["idmateria"]:"");
    $fechaingreso=(isset($_POST["fechaingreso"])?$_POST["fechaingreso"]:"");

    $sentencia=$conexion->prepare("
    UPDATE tbl_proveedores 
    SET 
        nombre=:nombre,
        idmateria=:idmateria,
        fechaingreso=:fechaingreso
    WHERE id=:id
    ");

     $sentencia->bindParam(":nombre",$nombre);
     $sentencia->bindParam(":idmateria",$idmateria);
     $sentencia->bindParam(":fechaingreso",$fechaingreso);
     $sentencia->bindParam(":id",$txtID);
     $sentencia->execute();

    $foto=(isset($_FILES["foto"]['name'])?$_FILES["foto"]['name']:"");

    $fecha_=new DateTime();
    
    $nombreArchivo_foto=($foto!='')?$fecha_->getTimestamp()."_".$_FILES["foto"]['name']:"";
    $tmp_foto=$_FILES["foto"]['tmp_name'];
    if($tmp_foto!=''){
       move_uploaded_file($tmp_foto,"./".$nombreArchivo_foto);

       $sentencia=$conexion->  prepare("SELECT foto FROM tbl_proveedores WHERE id=:id" );
       $sentencia->bindParam(":id",$txtID);
       $sentencia->execute(); 
       $registro_recuperado=$sentencia->fetch(PDO::FETCH_LAZY);
        if(isset($registro_recuperado["foto"]) && $registro_recuperado["foto"]!="" ){
            if(file_exists("./".$registro_recuperado["foto"])){
                unlink("./".$registro_recuperado["foto"]);
            }
        }
        
        $sentencia=$conexion->prepare("UPDATE tbl_proveedores SET foto=:foto WHERE id=:id");
        $sentencia->bindParam(":foto",$nombreArchivo_foto);
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
    }
    
    $info=(isset($_FILES["info"]['name'])?$_FILES["info"]['name']:"");

    $nombreArchivo_info=($info!='')?$fecha_->getTimestamp()."_".$_FILES["info"]['name']:"";
    $tmp_info=$_FILES["info"]['tmp_info'];
    if($tmp_info!=''){
        move_uploaded_file($tmp_info,"./".$nombreArchivo_info);

        $sentencia=$conexion->  prepare("SELECT info FROM tbl_proveedores WHERE id=:id" );
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute(); 
        $registro_recuperado=$sentencia->fetch(PDO::FETCH_LAZY);

        if(isset($registro_recuperado["info"]) && $registro_recuperado["info"]!="" ){
            if(file_exists("./".$registro_recuperado["info"])){
                    unlink("./".$registro_recuperado["info"]);
            }
        }

        $sentencia=$conexion->prepare("UPDATE tbl_proveedores SET info=:info WHERE id=:id");
        $sentencia->bindParam(":info",$nombreArchivo_info);
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
    }

    $mensaje="Registro Actualizado";
    header("Location:index.php?mensaje=".$mensaje);
}

?>

<?php include("../../templates/header.php"); ?> 
<?php include("fondo.html");?>

<br/>

<div class="card animate__animated animate__rollIn" style="width: 80%; margin-left: 10%; margin-right: 10%;">
    <div class="card-header text-center"><h3>Formulario Editar Proveedores</h3></div>
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
            aria-describedby=""
            placeholder="ID"
        />

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input
            type="text"
            value=<?php echo $nombre;?>
            class="form-control"
            name="nombre"
            id="nombre"
            aria-describedby="helpId"
            placeholder="Nombre Del Proveedores"
        />

    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <br/>
        <img width="100"
                            src="<?php echo $foto; ?>"
                            class="rounded"alt=""/>
        <br/> 
        <br/> 
                        
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
        <label for="info" class="form-label">Informacion Detallada(PDF)</label>
            <br/>
        <a href="<?php echo $info;?>"><?php echo $info;?></a>

        <input
            type="file"
            class="form-control"
            name="info"
            id="info"
            aria-describedby="helpId"
            placeholder="Informacion.pdf"
        />
    </div>

    <div class="mb-3">
        <label for="idmateria" class="form-label">Materia Prima</label>
        
        <select class="form-select form-select-sm" name="idmateria" id="idmateria">
             <?php foreach ($lista_tbl_materiaprima as $registro) { ?>
                
            <option <?php echo ($idmateria==$registro['id'])?"selected":"";?>value="<?php echo $registro['id']?>">
                 <?php echo $registro['nombremateriaprima']?>
            </option>

                <?php } ?>
        </select>
            
    </div>

    <div class="mb-3">
        <label for="fechaingreso" class="form-label">Fecha De Ingreso</label>
        <input
            type="date"
            value=<?php echo $fechaingreso;?>
            class="form-control"
            name="fechaingreso"
            id="fechaingreso"
            aria-describedby="helpId"
            placeholder="Fecha De Ingreso"
        />
    </div>

    <button
        type="submit"
        class="btn btn-success hvr-pulse">Actualizar Registro</button>
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
    <div class="card-footer text-muted text-center">FORMULARIO PARA INGRESO DE NUEVOS PROVEEDORES</div>
</div>

<?php include("../../templates/footer.php"); ?> 