<?php
class ClientesModel extends Query{
    public function __construct() {
        parent::__construct();
    }
    public function getClientes($estado)
    {
        $sql = "SELECT * FROM usuarios WHERE estado = $estado AND rol = 3";
        return $this->selectAll($sql);
    }
    public function registrar($identidad, $num_identidad, $nombre, $apellido,
    $telefono, $correo, $direccion, $rol)
    {
        $sql = "INSERT INTO usuarios (identidad, num_identidad, nombre, apellido, telefono, correo, direccion, rol) VALUES (?,?,?,?,?,?,?,?)";
        return $this->insert($sql, [$identidad, $num_identidad, $nombre, $apellido,$telefono, $correo, $direccion, $rol]);
    }

    public function getValidar($campo, $valor, $id)
    {
        if ($id == 0) {
            $sql = "SELECT id FROM usuarios WHERE $campo = '$valor'";
        }else{
            $sql = "SELECT id FROM usuarios WHERE $campo = '$valor' AND id != $id";
        }
        return $this->select($sql);
    }

    public function eliminar($estado, $idCliente)
    {
        $sql = "UPDATE usuarios SET estado = ? WHERE id = ?";
        $array = array($estado, $idCliente);
        return $this->save($sql, $array);
    }
    public function getCliente($idCliente)
    {
        $sql = "SELECT * FROM usuarios WHERE id = $idCliente";
        return $this->select($sql);
    }

    public function actualizar($identidad, $num_identidad, $nombre, $apellido,
    $telefono, $correo, $direccion, $id)
    {
        $sql = "UPDATE usuarios SET identidad=?, num_identidad=?, nombre=?, apellido=?, telefono=?, correo=?, direccion=? WHERE id=?";
        $array = array($identidad, $num_identidad, $nombre, $apellido,
        $telefono, $correo, $direccion, $id);
        return $this->save($sql, $array);
    }

    public function buscarPorNombre($valor)
    {
        $sql = "SELECT id, nombre, telefono, direccion FROM usuarios WHERE nombre LIKE '%".$valor."%' AND estado = 1 AND rol = 3 LIMIT 10";
        return $this->selectAll($sql);
    }
}

?>