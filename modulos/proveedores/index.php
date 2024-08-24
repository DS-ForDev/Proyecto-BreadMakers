<?php
include("../../bd.php");

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    //Buscar el archivo relacionado con el empleado 
    $sentencia=$conexion->  prepare("SELECT foto,info FROM tbl_proveedores WHERE id=:id" );
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute(); 
    $registro_recuperado=$sentencia->fetch(PDO::FETCH_LAZY);

    if(isset($registro_recuperado["foto"]) && $registro_recuperado["foto"]!="" ){
        if(file_exists("./".$registro_recuperado["foto"])){
                unlink("./".$registro_recuperado["foto"]);
        }
    }

    if(isset($registro_recuperado["info"]) && $registro_recuperado["info"]!="" ){
        if(file_exists("./".$registro_recuperado["info"])){
                unlink("./".$registro_recuperado["info"]);
        }
    }

    
    $sentencia=$conexion->prepare("DELETE FROM tbl_proveedores WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);

    $sentencia->execute();

    $mensaje="Proveedor Eliminado";
    header("Location:index.php?mensaje=".$mensaje);
    
}


//Se prepara la consulta para mostrar la infromacion, ademas de hacer una subcolsulta para mostar el idpuesto de la tbl_puestos
$sentencia=$conexion->prepare("SELECT *,
(SELECT nombremateriaprima 
FROM tbl_materiaprima 
WHERE tbl_materiaprima.id=tbl_proveedores.idmateria limit 1) as materiaprima 
FROM tbl_proveedores");
//Toda la subconsulta quedo alojada en el alias de "materiaprima" usando la palabra reservada as

$sentencia->execute(); 
$lista_tbl_proveedores=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include("../../templates/header.php"); ?> 
<?php include("fondo.html");?>

<br/>

<div class="card animate__animated animate__backInDown" style="width: 80%; margin-left: 10%; margin-right: 10%;">

    <div class="card-header text-center"><h3>Proveedores</h3></div>

    <a
        name=""
        id=""
        class="btn btn-primary hvr-pulse"
        href="crear.php"
        role="button"
        >Agregar Un Proveedor Nuevo
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
                    <th scope="col">ID Del Proveedor</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Informacion Detallada(PDF)</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Fecha De Ingreso</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

            <?php foreach ($lista_tbl_proveedores as $registro) { ?>
                <tr class="">
                    <td><?php echo $registro ['id']?></td>
                    <td scope="row">
                    <?php echo $registro ['nombre']?>
                    </td>
                    <td>
                        <img width="100"
                            src="<?php echo $registro ['foto']?>"
                            class="img-fluid rounded"alt=""/>
                         
                    </td>
                    <td>
                        <a href="<?php echo $registro ['info']?>">
                        <?php echo $registro ['info']?>
                         </a>
                </td>
                    <td><?php echo $registro ['materiaprima']?></td>
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
                    href="factura.php"
                    class="btn btn-primary hvr-wobble-horizontal"
                    role="button"
                >
                    Orden
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


<?php include("../../templates/footer.php"); ?> 