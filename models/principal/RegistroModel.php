<?php
class RegistroModel extends Query{
    
    public function __construct() {
        parent::__construct();
    }
    public function registrarse($nombre, $apellido, $usuario, $correo, $hash, $rol) {
        $sql = "INSERT INTO usuarios (nombre, apellido, usuario, correo, clave, rol) VALUES (?,?,?,?,?,?)";
        return $this->insert($sql, [$nombre, $apellido, $usuario, $correo, $hash, $rol]);
    }
    
    public function validarUnique($item, $valor, $id_usuario) {
        if ($id_usuario == 0) {
            $sql = "SELECT * FROM usuarios WHERE $item = '$valor'";
        }else{
            $sql = "SELECT * FROM usuarios WHERE $item = '$valor' AND id != $id_usuario";
        }
        return $this->select($sql);
    }

    public function getEmpresa() {
        return $this->select("SELECT * FROM empresa");
    }
}
?>