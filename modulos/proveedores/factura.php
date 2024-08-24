<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden De Compra</title>
    <link rel="icon" type="image/x-icon" href="pro.ico" />
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .order-header {
            display: flex; /* Para alinear los elementos en una fila */
            align-items: center; /* Para alinear verticalmente los elementos */
            justify-content: center; /* Para alinear horizontalmente los elementos */
            margin-bottom: 20px;
        }
        .order-header img {
            max-width: 200px;
            margin-bottom: 10px;
        }
        .order-details {
            margin-bottom: 20px;
        }
        .order-details table {
            width: 100%;
            border-collapse: collapse;
        }
        .order-details table th,
        .order-details table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        .order-items {
            margin-bottom: 20px;
        }
        .order-items table {
            width: 100%;
            border-collapse: collapse;
        }
        .order-items table th,
        .order-items table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        .order-footer {
            text-align: right;
        }
    </style>
</head>
<body>
    <br><br><br>
    <div class="container">
        <div class="order-header">
            
            <h1>Orden de Compra</h1>
        </div>
        <div class="order-details">
            <table>
                <tr>
                    <th>Proveedor:</th>
                    <td>Nombre del proveedor</td>
                </tr>
                <tr>
                    <th>Fecha de emisión:</th>
                    <td>19 de marzo de 2024</td>
                </tr>
                <tr>
                    <th>Número de orden:</th>
                    <td>123456789</td>
                </tr>
                <!-- Agrega más detalles de la orden según tus necesidades -->
            </table>
        </div>
        <div class="order-items">
            <h2>Ítems de la orden</h2>
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio unitario</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Producto 1</td>
                        <td>2</td>
                        <td>$10.00</td>
                        <td>$20.00</td>
                    </tr>
                    <!-- Agrega más ítems de la orden según tus necesidades -->
                </tbody>
            </table>
        </div>
        <div class="order-footer">
            <p>Total: $20.00</p>
        </div>
    </div>
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

