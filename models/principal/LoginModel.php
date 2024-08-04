<?php
class LoginModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function validarAcceso($usuario)
    {
        $sql = "SELECT * FROM usuarios WHERE estado = 1 AND rol = 3 AND (usuario = '$usuario' OR correo = '$usuario')";
        return $this->select($sql);
    }

    public function getEmpresa() {
        return $this->select("SELECT * FROM empresa");
    }
}
