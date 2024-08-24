<?php
include("../../bd.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$query_cad_event = "INSERT INTO tbl_eventos (title, color, start, end) VALUES (:title, :color, :start, :end)";

$cad_event = $conexion->prepare($query_cad_event);

$colores = [
    'orange' => '#FF5722', 
    'yellow' => '#FFC107',
    'lime' => '#8BC34A',
    'teal' => '#009688',
    'skyblue' => '#2196F3',
    'indigo' => '#9c27b0',
    
];

$cad_event->bindParam(':title', $dados['cad_title']);
$cad_event->bindParam(':color', $dados['cad_color']);
$cad_event->bindParam(':start', $dados['cad_start']);
$cad_event->bindParam(':end', $dados['cad_end']);

if ($cad_event->execute()){
    $retorna = ['status' => true, 'msg' => 'Evento agregado con exito!', 'id' 
    => $conexion->lastInsertId(),
    'title' => $dados['cad_title'],
    'color' => $dados['cad_color'],
    'start' => $dados['cad_start'],
    'end' => $dados['cad_end']];
}else {
    $retorna = ['status' => false, 'msg' => 'Evento NO agregado con exito!'];
}

echo json_encode($retorna);