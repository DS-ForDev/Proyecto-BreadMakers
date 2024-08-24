<?php   
include("../../bd.php");

if(isset($_GET['txtID'])){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("SELECT * ,(SELECT nombre_puesto 
    FROM tbl_puestos 
    WHERE tbl_puestos.id=tbl_empleados.idpuesto limit 1) as puesto  FROM tbl_empleados WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    $primernombre=$registro["primernombre"];
    $segundonombre=$registro["segundonombre"];
    $primerapellido=$registro["primerapellido"];
    $segundoapellido=$registro["segundoapellido"];

    $nommbreCompleto=$primernombre." ".$segundonombre." ".$primerapellido." ".$segundoapellido;

    $foto=$registro["foto"];
    $cv=$registro["cv"];

    $idpuesto=$registro["idpuesto"];
    $puesto=$registro["puesto"];
    $fechaingreso=$registro["fechaingreso"];

    $fechaInicio= new DateTime ($fechaingreso);
    $fechaFin= new DateTime (date('y-m-d'));
    $diferencia= date_diff($fechaInicio,$fechaFin);

    
 
}
ob_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carta De Recomendación</title>
</head>
<body>

<h1> Carta De Recomendación Laboral </h1>

<br/><br/>
Bogotá D.C, Colombia <strong> <?php echo date('d - M - Y');?></strong>
<br/><br/>
A quien pueda interesar:
<br/><br/>
Reciba un cordial y respetuoso saludo.
<br/><br/>
Con la presente deseo hacer saber que el Sr(a) <strong> <?php echo $nommbreCompleto;?></strong>,
quien laboró en mi organizacion durante <strong> <?php echo $diferencia->y;?> años </strong>
es un ciudadano con una conducta intachable. Ha demostrado ser un gran trabajador,
comprometido, responsable y fiel cumplidro de sus tareas.
Siempre ha manifestado preocupacióm por mejorar, capacitarse y actualizar sus conocimientos.  
<br/><br/>
Durante estos años se ha desempeñado como: <strong> <?php echo $puesto;?> </strong>
Es por ello le sugiero considere esta recomendación, con la confianza de que estará siempre a la altura de sus compromisos y responsabilidades.
<br/><br/>
Sin más nada a que referirme y, esperando que esta misiva sea tomada en cuenta, dejo mi número de contacto para cualquier información de interés.
<br/><br/><br/><br/><br/><br/><br/><br/>
______________________________<br/>
Atentamente, 
<br/>
BreadMakers
</body>
</html>
<?php 
$HTML=ob_get_clean();
require_once("../../libreria/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf= new Dompdf();

$opciones=$dompdf->getOptions();
$opciones->set(array("isRemoteEnabled"=>true));

$dompdf->setOptions($opciones);

$dompdf->loadHTML($HTML);

$dompdf->setPaper('letter');
$dompdf->render();
$dompdf->stream("archivo.pdf", array("Attachment"=>false))




?>