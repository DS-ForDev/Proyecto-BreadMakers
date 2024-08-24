<?php

session_start();
$url_base = "http://localhost/proyecto/";
if (!isset($_SESSION['usuario'])) {
    header("Location:" . $url_base . "login.php");
}
?>

<!doctype html>
<html lang="en">

<head>

    <title>BreadMakers</title>
    <meta charset="utf-8" />
    <link rel="icon" type="image/x-icon" href="assets/pro.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    

</head>

<style>
    
  .nav-link {
    font-family: Helvetica, sans-serif; /* Reemplaza 'TuTipografia' con el nombre de la tipografía que desees usar */
    color: #ffffff; /* Reemplaza #FF0000 con el código de color que desees usar */ 
  }

  /* Añade estilos para el contenedor principal */
  .container-main {
    position: relative; /* Asegura que los elementos dentro del contenedor se posicionen relativamente */
    z-index: 1; /* Asegura que el contenido esté delante del canvas */
  }
</style>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">


<body>
    <nav class="navbar navbar-expand navbar-light" style="background-color: #C77C37;">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo $url_base; ?>" aria-current="page"><strong>HOME</strong><span class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base; ?>modulos/empleados/"><strong>Empleados</strong></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base; ?>modulos/puestos/"><strong>Puestos</strong></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base; ?>modulos/proveedores/"><strong>Proveedores</strong></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base; ?>modulos/materiaprima/"><strong>Materia Prima</strong></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base; ?>modulos/inventario/"><strong>Detalles</strong></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base; ?>modulos/menu/"><strong>Menú</strong></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base; ?>modulos/calendario/"><strong>Calendario</strong></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base; ?>modulos/usuarios/"><strong>Administradores</strong></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="javascript:logout();"><strong>CERRAR SESIÓN</strong></a>
            </li>

        </ul>
    </nav>
    <div class="container-main">
        <?php if (isset($_GET['mensaje'])) { ?>
            <script>
                Swal.fire({ icon: "success", title: "<?php echo $_GET['mensaje']; ?>" });
            </script>
        <?php } ?>

        <script>
            // Función para mostrar SweetAlert y cerrar la sesión si el usuario confirma
            function logout() {
                Swal.fire({
                    title: 'Cerrar Sesión',
                    text: '¿Estás seguro de que quieres cerrar la sesión?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, cerrar sesión'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '<?php echo $url_base; ?>cerrar.php';
                    }
                });
            }
        </script>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <!-- Agrega el canvas al final del cuerpo del documento -->
   
    </script>
</body>

</html>






