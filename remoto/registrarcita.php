<?php
require_once 'funciones.php';
$database = new Funciones();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header("Contet-Type: application/json");
    $response = array();
    if (isset($_POST['iduser']) && isset($_POST['date']) && isset($_POST['time'])){
        $iduser = $_POST['iduser'];
        $dateappmt = $_POST['date'];
        $timeappmt = $_POST['time'];
        $today = date("Y-m-d");
        if ($today > $dateappmt) {
            $response['message'] = "La fecha ingresada ya paso, por favor registre una fecha actual, o proxima.";
            $response['title'] = "Solicitud no realizada";
            $response['schedule_complete'] = false;
        } else {
            if ($database->getUser($iduser)) {
                $result = $database->requestAppointment($iduser, $dateappmt, $timeappmt);
                if ($result) {
                    $response['message'] = "Se ha realizado el proceso correctamente, la solicitud esta en espera";
                    $response['title'] = "Solicitud realizada";
                    $response['schedule_complete'] = true;
                } else {
                    $response['message'] = "Ha ocurrido un 404 inesperado";
                    $response['title'] = "No se puede solicitar";
                    $response['schedule_complete'] = false;
                }
            } else {
                $response['message'] = "El usuario identificado con " . $iduser . " no existe, intente registrando el usuario y realizando nuevamente el proceso";
                $response['title'] = "No se puede solicitar";
                $response['schedule_complete'] = false;
            }
        }
        echo json_encode($response);
    } else {
        $response['message'] = "Los campos estan nulos o vacios y no hacen referencia a los datos";
        $response['title'] = "No se puede solicitar";
        $response['schedule_complete'] = false;
    }
} else {
    echo json_encode("Las cabeceras de la peticion son incorrectas");
    exit("Las cabeceras de la peticion son incorrectas");
}