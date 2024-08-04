<?php
class UsuariosModel extends Query{
    public function __construct() {
        parent::__construct();
    }
    public function getUsuarios($estado)
    {
        $sql = "SELECT id, CONCAT(nombre, ' ', apellido) AS nombres, correo, rol FROM usuarios WHERE rol != 3 AND estado = $estado";
        return $this->selectAll($sql);
    }
    public function registrar($nombres, $apellidos, $correo,
    $usuario, $direccion, $clave, $rol)
    {
        $sql = "INSERT INTO usuarios (nombre, apellido, correo, usuario, direccion, clave, rol) VALUES (?,?,?,?,?,?,?)";
        $array = array($nombres, $apellidos, $correo, $usuario, $direccion, $clave, $rol);
        return $this->insert($sql, $array);
    }
    public function getValidar($campo, $valor, $accion, $id)
    {
        if ($accion == 'registrar' && $id == 0) {
            $sql = "SELECT id, correo, usuario FROM usuarios WHERE $campo = '$valor'";
        }else{
            $sql = "SELECT id, correo, usuario FROM usuarios WHERE $campo = '$valor' AND id != $id";
        }
        return $this->select($sql);
    }
    public function eliminar($estado, $id)
    {
        $sql = "UPDATE usuarios SET estado = ? WHERE id = ?";
        return $this->save($sql, [$estado, $id]);
    }
    public function editar($id)
    {
        $sql = "SELECT id, nombre, apellido, correo, usuario, direccion, foto, clave, fecha, rol FROM usuarios WHERE id = $id";
        return $this->select($sql);
    }
    public function actualizar($nombres, $apellidos, $correo,
    $usuario, $direccion, $rol, $id)
    {
        $sql = "UPDATE usuarios SET nombre=?, apellido=?, correo=?, usuario=?, direccion=?, rol=? WHERE id=?";
        $array = array($nombres, $apellidos, $correo, $usuario, $direccion, $rol, $id);
        return $this->save($sql, $array);
    }

    public function modificarDatos($nombre, $apellidos, $correo,
    $usuario, $direccion, $clave, $perfil, $id)
    {
        $sql = "UPDATE usuarios SET nombre=?, apellido=?, correo=?, usuario=?, direccion=?, clave=?, perfil=? WHERE id=?";
        $array = array($nombre, $apellidos, $correo, $usuario, $direccion, $clave, $perfil, $id);
        return $this->save($sql, $array);
    }

    //registrar log
    public function registrarAcceso($evento, $ip, $detalle)
    {
        $sql = "INSERT INTO acceso (evento, ip, detalle) VALUES (?,?,?)";
        return $this->insert($sql, [$evento, $ip, $detalle]);
    }
}
?>