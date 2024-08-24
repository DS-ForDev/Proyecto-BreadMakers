<?php
include("../../bd.php");

if($_POST){

    // Recolectamos los datos del método POST
    $usuario = (isset($_POST["usuario"]) ? $_POST["usuario"] : "");
    $password = (isset($_POST["password"]) ? $_POST["password"] : "");
    $correo = (isset($_POST["correo"]) ? $_POST["correo"] : "");

    // Encriptamos la contraseña
    $password_encrypted = password_hash($password, PASSWORD_BCRYPT);

    // Preparar la inserción de los datos
    $sentencia = $conexion->prepare("INSERT INTO tbl_usuarios (id, usuario, password, correo)
                VALUES (null, :usuario, :password, :correo)");
    
    // Asignando los valores que vienen del método POST (los que vienen del formulario)
    $sentencia->bindParam(":usuario", $usuario);
    $sentencia->bindParam(":password", $password_encrypted);
    $sentencia->bindParam(":correo", $correo);
    $sentencia->execute();

    // Redireccionamos con un mensaje
    $mensaje = "Usuario Agregado";
    header("Location:index.php?mensaje=".$mensaje);
}
?>
<?php include("../../templates/header.php"); ?> 
<?php include("fondo.html");?>
<br/>
<div class="card animate__animated animate__rollIn" style="width: 80%; margin-left: 10%; margin-right: 10%;">
    <div class="card-header text-center"><h3>Datos del nuevo usuario</h3></div>
    <div class="card-body">

    <form action="" method="post" enctype="multipart/form-data">

    <div class="mb-3">
        <label for="usuario" class="form-label">Nombre del usuario</label>
        <input
            type="text"
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
