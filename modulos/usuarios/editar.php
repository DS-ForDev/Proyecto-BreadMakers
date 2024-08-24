<?php
include("../../bd.php");
if(isset($_GET['txtID'])){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("SELECT * FROM tbl_usuarios WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    $usuario=$registro["usuario"];
    $password=$registro["password"];
    $correo=$registro["correo"];

    
}
if($_POST){
  

    //Recolectamos los datos del metodo POST
    $txtID=(isset($_POST["txtID"])?$_POST["txtID"]:"");
    $usuario=(isset($_POST["usuario"])?$_POST["usuario"]:"");
    $password=(isset($_POST["password"])?$_POST["password"]:"");
    $correo=(isset($_POST["correo"])?$_POST["correo"]:"");
    //Preparar La insercion de los datos
    $sentencia=$conexion->prepare("UPDATE tbl_usuarios SET
    usuario=:usuario,
    password=:password,
    correo=:correo
    WHERE id=:id");
    //Asignando los valores que vienen del metodo POST (los que vienen del formualrio)
    $sentencia->bindParam(":usuario",$usuario);
    $sentencia->bindParam(":password",$password);
    $sentencia->bindParam(":correo",$correo);
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    //header("Location:index.php");
    $mensaje="Usuario Actualizado";
    header("Location:index.php?mensaje=".$mensaje);
}
?>
<?php include("../../templates/header.php"); ?> 
<?php include("fondo.html");?>

<br/>
<div class="card animate__animated animate__rollIn" style="width: 80%; margin-left: 10%; margin-right: 10%;">
    <div class="card-header text-center"><h3>Datos para editar usuario</h3></div>
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
        <label for="usuario" class="form-label">Nombre del usuario</label>
        <input
            type="text"
            value="<?php echo $usuario;?>"
            class="form-control"
            name="usuario"
            id="usuario"
            aria-describedby="helpId"
            placeholder="Nombre Del Usuario"
        />
    </div>

    <div class="mb-3">
        <label for="Password" class="form-label">Password</label>
        <input
            type="password"
            value="<?php echo $password;?>"
            class="form-control"
            name="password"
            id="password"
            aria-describedby="helpId"
            placeholder="Escriba su password"
        />
    </div>

    <div class="mb-3">
        <label for="correo" class="form-label">Correo Electronico</label>
        <input
            type="email"
            value="<?php echo $correo;?>"
            class="form-control"
            name="correo"
            id="correo"
            aria-describedby="helpId"
            placeholder="Escriba su Correo"
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