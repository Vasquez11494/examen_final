<?php

require_once 'Conexion.php';

echo json_encode($_POST);
exit;
class Usuario extends Conexion
{

    public  $usuario_id;
    public  $NombreUsuario;
    public  $pais;
    public  $telefono;
    public  $correo;
    public  $situacion;



    public function __construct( $args = []){
        $this->usuario_id = $args['usuario_id'] ?? '' ;
        $this->NombreUsuario = $args['NombreUsuario'] ?? '' ;
        $this->pais = $args['pais'] ?? '' ;
        $this->telefono = $args['telefono'] ?? '' ;
        $this->correo = $args['correo'] ?? '' ;
        $this->situacion = $args['situacion'] ?? '1' ;
  
    }

    public function guardar()
    {
        $sql = "INSERT INTO USUARIOS(nombreusuario,pais,telefono,correo,) values  ('$this->NombreUsuario', '$this->pais','$this->telefono','$this->correo')";

        $resultado = $this->ejecutar($sql);
        return $resultado;
    }

    public function buscar (){
        $sql = "SELECT * FROM usuarios";

        $resultado =  self::servir($sql);
        return $resultado;
    }


}
