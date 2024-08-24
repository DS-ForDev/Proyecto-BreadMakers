<?php
include("../../bd.php");
//Instruccion De Borrado
if(isset($_GET['txtID'])){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("DELETE FROM tbl_puestos WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $mensaje="Puesto Eliminado";
    header("Location:index.php?mensaje=".$mensaje);

}
///...
$sentencia=$conexion->  prepare("SELECT * FROM tbl_puestos");
$sentencia->execute(); 
$lista_tbl_puestos=$sentencia->fetchAll(PDO::FETCH_ASSOC);


?>
<?php include("../../templates/header.php"); ?> 
<?php
include("fondo.html");?>
<br/>
<div class="card animate__animated animate__backInUp" style="width: 80%; margin-left: 10%; margin-right: 10%;">

    <div class="card-header text-center"><h3>Puestos</h3></div>

    <a
        name=""
        id=""
        class="btn btn-primary hvr-pulse"
        href="crear.php"
        role="button"
        >Agregar Un Puesto Nuevo
        <box-icon name='user-plus' color='#fffafa' ></box-icon>
    </a
    >

    <div class="card-body">
<div   class="table-responsive-sm">
        <table class="table " id="tabla_id"> 
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre Del Puesto</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>

        <?php foreach ($lista_tbl_puestos as $registro) { ?>
            <tr class="">
                <td scope="row"><?php echo $registro ['id']?></td>
                <td><?php echo $registro ['nombre_puesto']?></td>
                <td><a
                    class="btn btn-success hvr-wobble-horizontal"
                    href="editar.php?txtID=<?php echo $registro ['id']?>"
                    role="button"
                    >Editar
                    <box-icon name='edit-alt' color='#ffffff'></box-icon>
                    </a
                >
                <a
                    class="btn btn-danger hvr-buzz"
                    href="javascript:borrar(<?php echo $registro['id'];?>);"   
                    role="button"
                    >Eliminar
                    <box-icon name='user-x' type='solid' color='#ffffff'></box-icon>
                    </a>
                
                
                </td>
            </tr>
            <?php } ?>
            
        </tbody>
    </table>
</div>
        </div>

<?php include("../../templates/footer.php"); ?>   

