<?php
include("../../bd.php");

if(isset($_GET['txtID'])){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("DELETE FROM tbl_inventario WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $mensaje="Puesto Eliminado";
    header("Location:index.php?mensaje=".$mensaje);

}

    $sentencia=$conexion->prepare("SELECT * FROM tbl_inventario");
    $sentencia->execute(); 
    $lista_tbl_inventario=$sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php"); ?>
<?php include("fondo.html");?>
<br/>

<div class="card animate__animated animate__backInDown" style="width: 90%; margin-left: 5%; margin-right: 5%;">

    <div class="card-header text-center"><h3>Detalles Del Producto</h3></div>

    <a
        name=""
        id=""
        class="btn btn-primary hvr-pulse"
        href="crear.php"
        role="button"
        >Agregar Producto Nuevo
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
                    <th scope="col">ID Del Producto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Cantidad En Stock</th>
                    <th scope="col">Unidad De Medida</th>
                    <th scope="col">Fecha Ingreso</th>
                    <th scope="col">Fecha Caducidad</th>
                    <th scope="col">Costo Unitario</th>
                    <th scope="col">Precio Venta</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($lista_tbl_inventario as $registro) { ?>
            
                <tr class="">
                    <td><?php echo $registro ['id']?></td>
                    <td><?php echo $registro ['nombre']?></td>
                    <td><?php echo $registro ['categoria']?></td>
                    <td><?php echo $registro ['descripcion']?></td>
                    <td><?php echo $registro ['cantidad']?></td>
                    <td><?php echo $registro ['unidad']?></td>
                    <td><?php echo $registro ['fechaingreso']?></td>
                    <td><?php echo $registro ['fechacaducidad']?></td>
                    <td><?php echo $registro ['costo']?></td>
                    <td><?php echo $registro ['precio']?></td>
                    

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
                <?php  } ?>
            </tbody>










<?php include("../../templates/footer.php"); ?>