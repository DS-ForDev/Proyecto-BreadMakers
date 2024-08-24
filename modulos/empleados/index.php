
<?php
include("../../bd.php");

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    //Buscar el archivo relacionado con el empleado 
    $sentencia=$conexion->  prepare("SELECT foto,cv FROM tbl_empleados WHERE id=:id" );
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute(); 
    $registro_recuperado=$sentencia->fetch(PDO::FETCH_LAZY);

    if(isset($registro_recuperado["foto"]) && $registro_recuperado["foto"]!="" ){
        if(file_exists("./".$registro_recuperado["foto"])){
                unlink("./".$registro_recuperado["foto"]);
        }
    }

    if(isset($registro_recuperado["cv"]) && $registro_recuperado["cv"]!="" ){
        if(file_exists("./".$registro_recuperado["cv"])){
                unlink("./".$registro_recuperado["cv"]);
        }
    }

    
    $sentencia=$conexion->prepare("DELETE FROM tbl_empleados WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);

    $sentencia->execute();

    $mensaje="Empleado Eliminado";
    header("Location:index.php?mensaje=".$mensaje);
    
}


//Se prepara la consulta para mostrar la infromacion, ademas de hacer una subcolsulta para mostar el idpuesto de la tbl_puestos
$sentencia=$conexion->prepare("SELECT *,
(SELECT nombre_puesto 
FROM tbl_puestos 
WHERE tbl_puestos.id=tbl_empleados.idpuesto limit 1) as puesto 
FROM tbl_empleados");
//Toda la subconsulta quedo alojada en el alias de "puesto" usando la palabra reservada as

$sentencia->execute(); 
$lista_tbl_empleados=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include("../../templates/header.php"); ?> 
<?php include("fondo.html");?>



<br/>

<div class="card animate__animated animate__backInDown" style="width: 80%; margin-left: 10%; margin-right: 10%;">

    <div class="card-header text-center"><h3>Empleados</h3></div>

    <a
        name=""
        id=""
        class="btn btn-primary hvr-pulse"
        href="crear.php"
        role="button"
        >Agregar Un Empleado Nuevo
        <box-icon name='user-plus' color='#fffafa' ></box-icon>
        </a
    >
    
    <div class="card-body">
        
    </div>
    
    <div
        class="table-responsive-sm"
    >
        <table class="table " id="tabla_id">
            <thead>
                <tr>
                    <th scope="col">ID Del Empleado</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Foto</th>
                    <th scope="col">cv(PDF)</th>
                    <th scope="col">Puesto</th>
                    <th scope="col">Fecha De Ingreso</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

            <?php foreach ($lista_tbl_empleados as $registro) { ?>
                <tr class="">
                    <td><?php echo $registro ['id']?></td>
                    <td scope="row">
                    <?php echo $registro ['primernombre']?>
                    <?php echo $registro ['segundonombre']?>
                    <?php echo $registro ['primerapellido']?>
                    <?php echo $registro ['segundoapellido']?>
                    </td>
                    <td>
                        <img width="80"
                            src="<?php echo $registro ['foto']?>"
                            class="img-fluid rounded"alt=""/>
                         
                    </td>
                    <td>
                        <a href="<?php echo $registro ['cv']?>">
                        <?php echo $registro ['cv']?>
                         </a>
                </td>
                    <td><?php echo $registro ['puesto']?></td>
                    <td><?php echo $registro ['fechaingreso']?></td>

                    <style>
                    .centered-buttons {
                    text-align: center;
                    }
                    .centered-buttons a {
                        display: flex; /* Usar flex para alinear el contenido horizontalmente */
                        align-items: center; /* Alinear el contenido verticalmente al centro */
                        justify-content: center; /* Centrar el contenido horizontalmente */
                        margin: 5px 0;
                        padding: 5px 10px;
                        text-decoration: none;
                    }
                    .centered-buttons a box-icon {
                        margin-left: 5px; /* Espacio entre el texto y el icono */
                    }
                    </style>

                <td class="centered-buttons">
                    <a
                        href="carta_recomendacion.php?txtID=<?php echo $registro ['id']?>"
                        class="btn btn-primary hvr-wobble-horizontal"
                        role="button"
                    >
                        Carta
                        <box-icon name='file-doc' type='solid' color='#ffffff'></box-icon>
                    </a>
                    <a
                        class="btn btn-success hvr-wobble-horizontal"
                        href="editar.php?txtID=<?php echo $registro ['id']?>"
                        role="button"
                    >
                        Editar
                        <box-icon name='edit-alt' color='#ffffff'></box-icon>
                    </a>
                    <a
                        class="btn btn-danger hvr-buzz"
                        href="javascript:borrar(<?php echo $registro['id'];?>);"
                        role="button"
                    >
                        Eliminar
                        <box-icon name='user-x' type='solid' color='#ffffff'></box-icon>
                    </a>
                </td>


                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    
</div>

</div>


<?php include("../../templates/footer.php"); ?> 