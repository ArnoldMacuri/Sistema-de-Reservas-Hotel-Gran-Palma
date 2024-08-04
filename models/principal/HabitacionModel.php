<?php
class HabitacionModel extends Query{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getEmpresa() {
        return $this->select("SELECT * FROM empresa");
    }

    //RECUPERAR LAS HABITACIONES
    public function getHabitaciones() {
        return $this->selectAll("SELECT * FROM habitaciones WHERE estado = 1");
    }

    public function getCalificaciones($id_habitacion){
        $sql = "SELECT c.*, CONCAT(u.nombre, ' ', u.apellido) AS usuario FROM calificaciones c INNER JOIN usuarios u ON c.id_usuario = u.id WHERE c.id_habitacion = $id_habitacion";
        return $this->selectAll($sql);
    }

    public function getTotalCalificaciones($id_habitacion){
        $sql = "SELECT SUM(cantidad) AS total FROM calificaciones WHERE id_habitacion = $id_habitacion";
        return $this->select($sql);
    }
}
?>