<?php
class SlidersModel extends Query{
    public function __construct() {
        parent::__construct();
    }

    public function getSliders()
    {
        $sql = "SELECT * FROM sliders";
        return $this->selectAll($sql);
    }

    public function registrar($foto, $titulo, $subtitulo)
    {
        $sql = "INSERT INTO sliders (foto, titulo, subtitulo) VALUES (?,?,?)";
        $array = array($foto, $titulo, $subtitulo);
        return $this->insert($sql, $array);
    }

    public function getValidar($campo, $valor, $accion, $id)
    {
        if ($accion == 'registrar' && $id == 0) {
            $sql = "SELECT id FROM sliders WHERE $campo = '$valor'";
        }else{
            $sql = "SELECT id FROM sliders WHERE $campo = '$valor' AND id != $id";
        }
        return $this->select($sql);
    }

    public function eliminar($estado, $idPlato)
    {
        $sql = "UPDATE sliders SET estado = ? WHERE id = ?";
        $array = array($estado, $idPlato);
        return $this->save($sql, $array);
    }

    public function editar($idPlato)
    {
        $sql = "SELECT * FROM sliders WHERE id = $idPlato";
        return $this->select($sql);
    }

    public function actualizar($foto, $titulo, $subtitulo, $id)
    {
        $sql = "UPDATE sliders SET foto=?, titulo=?, subtitulo=? WHERE id=?";
        $array = array($foto, $titulo, $subtitulo, $id);
        return $this->save($sql, $array);
    }

}