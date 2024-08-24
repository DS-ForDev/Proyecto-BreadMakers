<?php
include("../../bd.php");

if(isset($_GET['txtID'])){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("SELECT * FROM tbl_puestos WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    $nombredelpuesto=$registro["nombre_puesto"];
    
}
if($_POST){  
        
        //Recolectamos los datos del metodo POST
        $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
        $nombredelpuesto=(isset($_POST["nombre_puesto"])?$_POST["nombre_puesto"]:"");
        //Preparar La insercion de los datos
        $sentencia=$conexion->prepare("UPDATE tbl_puestos SET nombre_puesto=:nombre_puesto 
        WHERE id=:id ");
        //Asignando los valores que vienen del metodo POST (los que vienen del formualrio)
        $sentencia->bindParam(":nombre_puesto",$nombredelpuesto);
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        $mensaje="Registro Actualizado";
        header("Location:index.php?mensaje=".$mensaje);

        
    }

?>
<?php include("../../templates/header.php"); ?> 
<?php include("fondo.html");?>

<br/>   
<div class="card animate__animated animate__rollIn" style="width: 80%; margin-left: 10%; margin-right: 10%;">
    <div class="card-header">Puestos</div>
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
        <small id="helpId" class="form-text text-muted"></small>
    </div>
    
    <div class="mb-3">
        <label for="nombredelpuesto" class="form-label">Nombre del puesto</label>
        <input
            type="text"
            value="<?php echo $nombredelpuesto;?>"
            class="form-control"
            name="nombre_puesto"
            id="nombre_puesto"
            aria-describedby=""
            placeholder="Nombre Del Puesto"
        />
    </div>

    <button
        type="submit"
        class="btn btn-success hvr-pulse"
    >
        Actualizar
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
    <div class="card-footer text-muted">
</div>

<?php include("../../templates/footer.php"); ?> 