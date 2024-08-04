<?php
class HabitacionesModel extends Query{
    public function __construct() {
        parent::__construct();
    }
    public function getHabitaciones($estado)
    {
        return $this->selectAll("SELECT * FROM habitaciones WHERE estado != $estado");
    }

    public function getDatos($table)
    {
        return $this->selectAll("SELECT * FROM $table WHERE estado = 1");
    }

    public function registrar($estilo, $numero, $capacidad, $slug, $descripcion, $precio, $foto)
    {
        $sql = "INSERT INTO habitaciones (estilo, numero, capacidad, slug, descripcion, precio, foto) VALUES (?,?,?,?,?,?,?)";
        return $this->insert($sql, [$estilo, $numero, $capacidad, $slug, $descripcion, $precio, $foto]);
    }

    public function getValidar($campo, $valor, $id)
    {
        if ($id == 0) {
            $sql = "SELECT id FROM habitaciones WHERE $campo = '$valor'";
        }else{
            $sql = "SELECT id FROM habitaciones WHERE $campo = '$valor' AND id != $id";
        }
        return $this->select($sql);
    }

    public function eliminar($estado, $idHabitacion)
    {
        $sql = "UPDATE habitaciones SET estado = ? WHERE id = ?";
        return $this->save($sql, [$estado, $idHabitacion]);
    }

    public function getHabitacion($idHabitacion)
    {
        return $this->select("SELECT * FROM habitaciones WHERE id = $idHabitacion");
    }

    public function actualizar($estilo, $numero, $capacidad, $slug, $descripcion, $precio, $foto, $id)
    {
        $sql = "UPDATE habitaciones SET estilo=?, numero=?, capacidad=?, slug=?, descripcion=?, precio=?, foto=? WHERE id=?";
        return $this->save($sql, [$estilo, $numero, $capacidad, $slug, $descripcion, $precio, $foto, $id]);
    }

    public function getSlug($slug)
    {
        return $this->select("SELECT * FROM habitaciones WHERE slug = '$slug'");
    }

    public function getTestimonios($id_habitacion)
    {
        $sql = "SELECT t.*, u.nombre FROM testimonios t INNER JOIN usuarios u ON t.id_usuario = u.id WHERE t.id_habitacion = $id_habitacion";
        return $this->selectAll($sql);
    }

}
