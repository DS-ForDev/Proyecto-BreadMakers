<?php
include("../../bd.php");

if($_POST){
print_r($_POST);   
    
    //Recolectamos los datos del metodo POST
    $nombremateriaprima=(isset($_POST["nombremateriaprima"])?$_POST["nombremateriaprima"]:"");
    //Preparar La insercion de los datos
    $sentencia=$conexion->prepare("INSERT INTO tbl_materiaprima(id,nombremateriaprima)
                VALUES (null, :nombremateriaprima)");
    //Asignando los valores que vienen del metodo POST (los que vienen del formualrio)
    $sentencia->bindParam(":nombremateriaprima",$nombremateriaprima);
    $sentencia->execute();
    $mensaje="Nueva Materia Prima Agregada";
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
        <label for="nombremateriaprima" class="form-label">Nombre de la materia prima</label>
        <input
            type="text"
            class="form-control"
            name="nombremateriaprima"
            id="nombremateriaprima"
            aria-describedby="helpId"
            placeholder="Nombre De La Materia Prima"
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
    <div class="card-footer text-muted">
</div>


<?php include("../../templates/footer.php"); ?> 