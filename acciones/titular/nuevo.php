<?php

header('Content-Type: application/json');

require_once 'request/nuevoRequest.php';
require_once 'responses/nuevoResponse.php';

$json = file_get_contents('php://input', true);
$req = json_decode($json);

$r = new NuevoResponse();
$r->IsOK = true;

if ($req->Titular->Direccion == null) {
    $r->IsOK = false;
    $r->Mensaje = 'La dirección es obligatoria';
}

if ($req->Titular->NroDocumento == null) {
    $r->IsOK = false;
    $r->Mensaje = $r->Mensaje . ' - El numero de documento es obligatorio';
}

if ($req->Titular->ApellidoNombre == null) {
    $r->IsOK = false;
    $r->Mensaje = $r->Mensaje . ' - El apellido y el nombre son obligatorios';
}

if ($r->IsOK == true) {
    $r->Mensaje = 'Titular agregado correctamente';
}

echo json_encode($r);