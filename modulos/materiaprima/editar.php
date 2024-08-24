<?php
include("../../bd.php");

if(isset($_GET['txtID'])){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("SELECT * FROM tbl_materiaprima WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    $nombremateriaprima=$registro["nombremateriaprima"];
    
}
if($_POST){  
        
        //Recolectamos los datos del metodo POST
        $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
        $nombremateriaprima=(isset($_POST["nombremateriaprima"])?$_POST["nombremateriaprima"]:"");
        //Preparar La insercion de los datos
        $sentencia=$conexion->prepare("UPDATE tbl_materiaprima SET nombremateriaprima=:nombremateriaprima 
        WHERE id=:id ");
        //Asignando los valores que vienen del metodo POST (los que vienen del formualrio)
        $sentencia->bindParam(":nombremateriaprima",$nombremateriaprima);
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
    <div class="card-header">Materia Prima</div>
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
        <label for="nombremateriaprima" class="form-label">Nombre de la materia prima:</label>
        <input
            type="text"
            value="<?php echo $nombremateriaprima;?>"
            class="form-control"
            name="nombremateriaprima"
            id="nombremateriaprima"
            aria-describedby=""
            placeholder="Nombre De La Materia Prima"
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