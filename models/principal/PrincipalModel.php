<?php
class PrincipalModel extends Query{
    
    public function __construct() {
        parent::__construct();
    }
    //RECUPERAR LOS SLIDERS
    public function getSliders() {
        return $this->selectAll("SELECT * FROM sliders");
    }
    //RECUPERAR LAS HABITACIONES
    public function getHabitaciones() {
        return $this->selectAll("SELECT * FROM habitaciones WHERE estado = 1 ORDER BY id DESC LIMIT 12");
    }

    public function getCalificacionesGeneral(){
        $sql = "SELECT c.*, CONCAT(u.nombre, ' ', u.apellido) AS usuario, u.correo FROM calificaciones c INNER JOIN usuarios u ON c.id_usuario = u.id WHERE c.comentario != ''";
        return $this->selectAll($sql);
    }

    public function getCalificaciones($id_habitacion){
        $sql = "SELECT c.*, CONCAT(u.nombre, ' ', u.apellido) AS usuario FROM calificaciones c INNER JOIN usuarios u ON c.id_usuario = u.id WHERE c.id_habitacion = $id_habitacion";
        return $this->selectAll($sql);
    }

    public function getTotalCalificaciones($id_habitacion){
        $sql = "SELECT SUM(cantidad) AS total FROM calificaciones WHERE id_habitacion = $id_habitacion";
        return $this->select($sql);
    }

    public function getEmpresa() {
        return $this->select("SELECT * FROM empresa");
    }
}
?>