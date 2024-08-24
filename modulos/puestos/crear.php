<?php
include("../../bd.php");

if($_POST){
print_r($_POST);   
    
    //Recolectamos los datos del metodo POST
    $nombredelpuesto=(isset($_POST["nombre_puesto"])?$_POST["nombre_puesto"]:"");
    //Preparar La insercion de los datos
    $sentencia=$conexion->prepare("INSERT INTO tbl_puestos(id,nombre_puesto)
                VALUES (null, :nombre_puesto)");
    //Asignando los valores que vienen del metodo POST (los que vienen del formualrio)
    $sentencia->bindParam(":nombre_puesto",$nombredelpuesto);
    $sentencia->execute();
    $mensaje="Nuevo Puesto Agregado";
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
        <label for="nombredelpuesto" class="form-label">Nombre del puesto</label>
        <input
            type="text"
            class="form-control"
            name="nombre_puesto"
            id="nombre_puesto"
            aria-describedby="helpId"
            placeholder="Nombre Del Puesto"
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