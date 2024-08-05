<?php
require '../model/Usuarios.php';
header('Content-Type: application/json; charset=UTF-8');

$metodo = $_SERVER['REQUEST_METHOD'];
$tipo = $_REQUEST['tipo'];

try {
    $mensaje = "";
    $codigo = 0;

    switch ($metodo) {
        case 'POST':
            if ($tipo === '1') {
                $Usuario = new Usuario($_POST);
                $ejecucion = $Usuario->guardar();
                $mensaje = "Usuario Guardado correctamente";
                $codigo = 1;
            } else {
                $mensaje = 'Tipo No encontrado';
                $codigo = 5;
            }
            break;

        case 'GET':
            $Usuario = new Usuario($_GET);
            $UsuarioNuevo = $Usuario->buscar();
            echo json_encode($UsuarioNuevo);
            exit;

        default:
            http_response_code(405);
            $mensaje = "Método no permitido";
            $codigo = 9;
            break;
    }

    echo json_encode([
        "mensaje" => $mensaje,
        "codigo" => $codigo
    ]);
} catch (Exception $e) {
    echo json_encode([
        "detalle" => $e->getMessage(),
        "mensaje" => "Error de ejecución",
        "codigo" => 0,
    ]);
}

exit;
