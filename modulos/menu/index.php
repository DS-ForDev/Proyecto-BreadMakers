<?php 

include("../../bd.php"); 

$sentencia=$conexion->  prepare("SELECT * FROM tbl_menu");
$sentencia->execute(); 
$lista_menu=$sentencia->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['txtID'])){

    $txtID = isset($_GET["txtID"]) ? $_GET["txtID"] : "";

    $sentencia = $conexion->prepare("SELECT * FROM tbl_menu WHERE ID=:id");
    $sentencia->bindParam(":id", $txtID); // Usar bindValue en lugar de bindParam
    $sentencia->execute();

    $registro_foto = $sentencia->fetch(PDO::FETCH_LAZY);

    if(isset($registro_foto['foto'])){
        if(file_exists("./".$registro_foto['foto'])){
            unlink("./".$registro_foto['foto']);
        }
    }
    $sentencia = $conexion->prepare("DELETE FROM tbl_menu WHERE ID=:id");
    $sentencia->bindParam(":id", $txtID); // Usar bindValue en lugar de bindParam
    $sentencia->execute();

    header("Location: index.php");
    exit();

}

include("../../templates/header.php"); ?>
<?php include("fondo.html");?>
<br/><br>
<div class="card animate__animated animate__backInDown" style="width: 80%; margin-left: 10%; margin-right: 10%;">
    <div class="card-header text-center"><h3>Menu</h3></div>
    <a
        name=""
        id=""
        class="btn btn-primary hvr-pulse"
        href="crear.php"
        role="button"
        >Agregar Nuevo Plato
        <box-icon name='user-plus' color='#fffafa' ></box-icon>
        </a
    >
    
    <div class="card-body">
    <div   class="table-responsive-sm">
        <table class="table " id="tabla_id">
        <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Ingredientes</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Acciones</th>
                    </tr>
        </thead>
        <tbody>
                    

                    <?php foreach($lista_menu as $registro){?>
                        <tr class="">
                        <td><?php echo $registro["id"]?></td>
                        <td><?php echo $registro["nombre"]?></td>
                        <td><?php echo $registro["ingredientes"]?></td>
                        <td><img src="./<?php echo $registro['foto'];?>" width="90" alt="" srcset=""></td>
                        <td><?php echo $registro["precio"]?></td>
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
                            <a class="btn btn-success hvr-wobble-horizontal" href="editar.php?txtID=<?= $registro['id'] ?>" role="button">Editar<box-icon name='edit-alt' color='#ffffff'></box-icon></a>
                            <a class="btn btn-danger hvr-buzz" href="javascript:borrar(<?= $registro['id'] ?>);" role="button">Eliminar<box-icon name='user-x' type='solid' color='#ffffff'></box-icon></a>
                        </td>
                        </tr>
                    <?php } ?>
                    
                
        </tbody>

    </div>
    </tbody>
    </table>
</div>
<?php include("../../templates/footer.php"); ?>