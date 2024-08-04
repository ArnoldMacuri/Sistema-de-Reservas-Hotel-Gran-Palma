<?php
class EmpresaModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getEmpresa()
    {
        $sql = "SELECT * FROM empresa";
        return $this->select($sql);
    }

    public function actualizar(
        $num_identidad,$nombre,$telefono,$correo,$direccion,$facebook,$instagram,$twitter,$whatsapp,$mensaje,$id
    ) {
        $sql = "UPDATE empresa SET num_identidad=?,
        nombre=?,telefono=?,correo=?,direccion=?,facebook=?,instagram=?,twitter=?,whatsapp=?,mensaje=? WHERE id=?";
        $array = array(
            $num_identidad,
            $nombre,
            $telefono,
            $correo,
            $direccion,
            $facebook,
            $instagram,
            $twitter,
            $whatsapp,
            $mensaje,
            $id
        );
        return $this->save($sql, $array);
    }
}
