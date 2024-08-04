<?php
class LoginModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function validarAcceso($usuario)
    {
        $sql = "SELECT * FROM usuarios WHERE estado = 1 AND (usuario = '$usuario' OR correo = '$usuario')";
        return $this->select($sql);
    }
}
