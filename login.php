<?php 
session_start();
if($_POST){
    include("./bd.php");

    $sentencia = $conexion->prepare("SELECT *,count(*) as n_usuario
    FROM tbl_usuarios 
    WHERE usuario=:usuario");

    $usuario = $_POST["usuario"];

    $sentencia->bindParam(":usuario", $usuario);
    $sentencia->execute(); 

    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    if ($registro["n_usuario"] > 0) {
        // Verificar la contraseña
        $contrasenia = $_POST["contrasenia"];
        if (password_verify($contrasenia, $registro['password'])) {
            $_SESSION['usuario'] = $registro["usuario"];
            $_SESSION['logueado'] = true;
            header("Location: index.php");
        } else {
            $mensaje = "Error: La contraseña es incorrecta";
        }
    } else {
        $mensaje = "Error: El usuario no existe";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="assets/pro.ico" />
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <style>
        #particles-js {
            background: #C77C37;
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
    </style>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        
</head>

<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<body>
    <div id="particles-js"></div>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 180,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 0
                    },
                    "image": {
                        "src": "img/github.svg",
                        "width": 100,
                        "height": 100
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 10,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "window",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "grab"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 400,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });
    </script>

    <header>
        <!-- place navbar here -->
    </header>
    <main class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <br /><br />
                <div class="card animate__animated animate__tada">
    <div class="card-header text-center">
        <strong>INICIAR SESIÓN</strong>
    </div>
    <div class="card-body">
        <div class="position-relative">
            <div class="position-relative d-flex justify-content-center align-items-center" style="height: 100%;">
                <img src="imagenes/logobd.jpeg" alt="" class="img-fluid w-50" style="bottom: 0;" />
            </div>
            <?php if (isset($mensaje)): ?>
                <div class="alert alert-danger" role="alert">
                    <strong><?php echo $mensaje; ?></strong>
                </div>
            <?php endif; ?>

            <form action="" method="post">
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario:</label>
                    <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Escriba su usuario">
                </div>

                <div class="mb-3">
                    <label for="contrasenia" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" name="contrasenia" id="contrasenia" aria-describedby="helpId" placeholder="Escriba su contraseña" />
                </div>

                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary">
                        Entrar al sistema
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

            </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min
