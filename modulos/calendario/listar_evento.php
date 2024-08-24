<?php
include("../../bd.php");

//QUERY para recuperar los eventos

$query_events = "SELECT id, title, color, start, end FROM tbl_eventos";

$result_events = $conexion->prepare($query_events);

$result_events->execute();

$eventos = [];

while($row_events = $result_events->fetch(PDO::FETCH_ASSOC)){
    extract($row_events);

    $eventos[] = [
        'id' => $id,
        'title' => $title,
        'color' => $color,
        'start' => $start,
        'end' => $end,
    ];
}

echo json_encode($eventos);