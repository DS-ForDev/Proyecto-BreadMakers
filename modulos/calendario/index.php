
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../modulos/calendario/css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <title>Bread Makers</title>

<?php include("../../templates/header.php"); ?>
<?php include("fondo.html");?>


</head>
<body>
    <div class="row">
    <div class="col-md-12 mb-3">
    <h3 class="text-center" id="title"> Calendario de Eventos </h3>
    </div>
    </div>

    <span id="msg"></span>

    <div  id="calendar-container">
    <div id='calendar'></div>
    </div>

        <!-- Modal Visualizar-->
    <div class="modal fade" id="visualizarModal" tabindex="-1" aria-labelledby="visualizarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">

            <h1 class="modal-title fs-5" id="visualizarModalLabel">Detalles del evento</h1>

            <h1 class="modal-title fs-5" id="editarModalLabel" style="display: none;" >Editar evento</h1>

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div id="visualizarEvento" >

                <dl class="row">

                    <dt class="col-sm-3">ID:</dt>
                    <dd class="col-sm-9" id="visualizar_id"></dd>

                    <dt class="col-sm-3">Titulo:</dt>
                    <dd class="col-sm-9" id="visualizar_title"></dd>

                    <dt class="col-sm-3">Inicio:</dt>
                    <dd class="col-sm-9" id="visualizar_start"></dd>

                    <dt class="col-sm-3">Fin:</dt>
                    <dd class="col-sm-9" id="visualizar_end"></dd>

                </dl>
                
                <button class="btn btn-warning" id="btnViewEditEvento" >Editar</button>

            </div>

            <div id="editarEvento" style="display: none;" >

            <span id="msgEditEvento"></span>
        <br>

        <form method="POST" id="formEditEvento">

        <input type="hidden" name="edit_id" id="edit_id">

        <div class="row mb-3">
            <label for="edit_title" class="col-sm-2 col-form-label">Titulo</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="edit_title" name="edit_title" placeholder="Titulo Del Evento">
            </div>
        </div>

        <div class="row mb-3">
            <label for="edit_start" class="col-sm-2 col-form-label">Inicio</label>
            <div class="col-sm-10">
            <input type="datetime-local" class="form-control" id="edit_start" name="edit_start">
            </div>
        </div>

        <div class="row mb-3">
            <label for="edit_end" class="col-sm-2 col-form-label">Fin</label>
            <div class="col-sm-10">
            <input type="datetime-local" class="form-control" id="edit_end" name="edit_end">
            </div>
        </div>

        <div class="row mb-3">
        <div class="col-md-12" id="grupoRadio">
  
            <input type="radio" name="edit_color" id="orange" value="orange">
            <label for="orange" class="circu" style="background-color: #FF5722;"> </label>

            <input type="radio" name="edit_color" id="yellow" value="yellow">  
            <label for="yellow" class="circu" style="background-color: #FFC107;"> </label>

            <input type="radio" name="cad_color" id="lime" value="lime">  
            <label for="lime" class="circu" style="background-color: #8BC34A;"> </label>

            <input type="radio" name="cad_color" id="teal" value="teal">  
            <label for="teal" class="circu" style="background-color: #009688;"> </label>

            <input type="radio" name="cad_color" id="skyblue" value="skyblue">  
            <label for="skyblue" class="circu" style="background-color: #2196F3;"> </label>

            <input type="radio" name="cad_color" id="indigo" value="indigo">  
            <label for="indigo" class="circu" style="background-color: #9c27b0;"> </label>

        </div>

        </div>
        
        <div style="text-align: center;">
            <button type="button" name="btnViewEvento" class="btn btn-primary hvr-wobble-horizontal" id="btnViewEvento">Cancelar</button>
        </div>

        <br>


        <div style="text-align: center;">
            <button type="submit" name="btnEditEvento" class="btn btn-warning hvr-wobble-horizontal" id="btnEditEvento">Guardar</button>
        </div>

            </div>

        </div>
        </div>
    </div>
    </div>

        <!-- Modal Agregar-->
        <div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="agregarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="agregarModalLabel">AGREGAR EVENTO</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

        <span id="msgCadEvento"></span>
        <br>

        <form method="POST" id="formCadEvento">
        <div class="row mb-3">
            <label for="cad_title" class="col-sm-2 col-form-label">Titulo</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="cad_title" name="cad_title" placeholder="Titulo Del Evento">
            </div>
        </div>

        <div class="row mb-3">
            <label for="cad_start" class="col-sm-2 col-form-label">Inicio</label>
            <div class="col-sm-10">
            <input type="datetime-local" class="form-control" id="cad_start" name="cad_start">
            </div>
        </div>

        <div class="row mb-3">
            <label for="cad_end" class="col-sm-2 col-form-label">Fin</label>
            <div class="col-sm-10">
            <input type="datetime-local" class="form-control" id="cad_end" name="cad_end">
            </div>
        </div>

        <div class="row mb-3">
        <div class="col-md-12" id="grupoRadio">
  
            <input type="radio" name="cad_color" id="orange" value="orange">
            <label for="orange" class="circu" style="background-color: #FF5722;"> </label>

            <input type="radio" name="cad_color" id="yellow" value="yellow">  
            <label for="yellow" class="circu" style="background-color: #FFC107;"> </label>

            <input type="radio" name="cad_color" id="lime" value="lime">  
            <label for="lime" class="circu" style="background-color: #8BC34A;"> </label>

            <input type="radio" name="cad_color" id="teal" value="teal">  
            <label for="teal" class="circu" style="background-color: #009688;"> </label>

            <input type="radio" name="cad_color" id="skyblue" value="skyblue">  
            <label for="skyblue" class="circu" style="background-color: #2196F3;"> </label>

            <input type="radio" name="cad_color" id="indigo" value="indigo">  
            <label for="indigo" class="circu" style="background-color: #9c27b0;"> </label>

        </div>

        </div>
        
        <div style="text-align: center;">
            <button type="submit" name="btnCadEvento" class="btn btn-success hvr-wobble-horizontal" id="btnCadEvento">Agregar</button>
        </div>



            
        </div>
        </div>
    </div>
    </div>

    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src='../../modulos/calendario/js/index.global.min.js'></script>
    <script src='../../modulos/calendario/js/bootstrap5/index.global.min.js'></script> 
    <script src='../../modulos/calendario/js/core/locales-all.global.min.js'></script>
    <!-- <script src='../../modulos/calendario/js/custom1.js'></script>   -->
    <!-- <script src='../../modulos/calendario/js/custom.js'></script> -->
    <script src='../../modulos/calendario/js/prueba.js'></script>  
    
    

    

</body>
</html>
