<?php

$json = file_get_contents('php://input', true);
$req = json_decode($json);

$r = new NuevoResponse();
$r->IsOK= true;

if ($req->Direccion == null) {
    $r->IsOK = false;
    $r->Mensaje = 'La dirección es obligatoria';
}

if ($req->$NroDocumento == null) {
    $r->IsOK = false;
    $r->Mensaje =  $r->Mensaje . 'El numero de documento es obligatorio';
}

if ($req->$ApellidoNombre == null) {
    $r->IsOK = false;
    $r->Mensaje =   $r->Mensaje . 'El apellido y el nombre son obligatorios';
}

if ($r->IsOK=true) {
    $r->Mensaje = '';
}