<?php 
include("bd.php");

$sentencia=$conexion->prepare("SELECT * FROM tbl_menu ORDER BY id DESC limit 60");
$sentencia->execute();
$lista_menu=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Productos - Aromas y Masas</title>
        <link rel="icon" type="image/x-icon" href="assets/fav.ico" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles1.css" rel="stylesheet" />
        <link href="css/whatsapp.css" rel="stylesheet" />
        <link href="css/imagen.css" rel="stylesheet" />
        
    </head>
    <body>
        <header>
            <h1 class="site-heading text-center text-faded d-none d-lg-block">
                <span class="site-heading-lower">Aromas y Masas</span>
                <br>
                <span class="site-heading-upper text-primary mb-3">Donde la excelencia se hornea</span>
            </h1>
        </header>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
            <div class="container">
                <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.html">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="index.html">Home</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="about.html">Nosotros</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="products.php">Productos</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="store.html">Horarios</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="login.php">Iniciar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="page-section">
            <div class="container">
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 d-flex ms-auto rounded">
                            <h2 class="section-heading mb-0">
                                <span class="section-heading-upper">Conoce nuestros</span>
                                <span class="section-heading-lower">Productos</span>
                            </h2>
                        </div>
                    </div>
                    <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="assets/img/desa.jpeg" alt="..." />
                    <div class="product-item-description d-flex me-auto">
                        <div class="bg-faded p-5 rounded" style="text-align: justify;">Enorgulleciéndonos de nuestro legado culinario colombiano, cada desayuno que servimos es una experiencia única y deliciosa.   
                                                        Desde los omelettes hasta los caldos, nos aseguramos de que cada bocado celebre la riqueza de los sabores colombianos.    
                                                        Ya sea disfrutando de un tradicional tinto con almojábana o sumergiéndote en la exquisita variedad de brownies y palitos de queso, cada elección te sumergirá en la autenticidad y calidez de nuestros desayunos, 
                                                        haciendo que cada mañana sea inolvidable.<p class="mb-0"></p></div>
                    </div>
                </div>
            </div>
            <br>
        </section>
        
        <section class="container mt-4">
        <h2 class="text-center" style="color: white;">NUESTRO MENÚ</h2>
        <br>


        <div class="row row-cols-1 row-cols-md-4 g-4">


            <?php foreach($lista_menu as $registro) {?>
            <div class="col d-flex">
                <div class="card">
                <img src="../../../Proyecto/modulos/menu/<?php echo $registro["foto"];?>" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $registro["nombre"];?></h5>
                        <p class="card-text small"><strong>Ingredientes:</strong><?php echo $registro["ingredientes"];?></p>
                        <p class="card-text"><strong>Precio:</strong><?php echo $registro["precio"];?></p>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>

        </section>
        <br>
        <div class="whatsapp-icon">
            <a href="https://wa.me/573042357831" target="_blank">
                <img src="whatsapp.png" alt="WhatsApp">
            </a>
        </div>
        </section>
        <footer class="footer text-faded text-center py-5">
            <div class="container"><p class="m-0 small">Copyright &copy; BreadMakers 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
