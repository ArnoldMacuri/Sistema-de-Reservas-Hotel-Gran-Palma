<?php
class DashboardModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }  
    
    public function getTotales($table, $estado)
    {
        return $this->select("SELECT COUNT(id) AS total FROM $table WHERE estado = $estado");
    }

    public function totalClientes($estado)
    {
        return $this->select("SELECT COUNT(id) AS total FROM usuarios WHERE rol = 3 AND estado = $estado");
    }

    public function totalReservas()
    {
        return $this->select("SELECT COUNT(id) AS total FROM reservas");
    }

    public function totalReservaHabitacion($id_habitacion)
    {
        return $this->select("SELECT COUNT(id) AS total FROM reservas WHERE id_habitacion = $id_habitacion");
    }

    public function getReserva($id_reserva) {
        $sql = "SELECT r.*, h.estilo, h.descripcion, h.precio, 
        h.numero, h.capacidad, h.foto, CONCAT(u.nombre, ' ', u.apellido) AS cliente
         FROM reservas r
        INNER JOIN habitaciones h ON r.id_habitacion = h.id
        INNER JOIN usuarios u ON r.id_usuario = u.id 
        WHERE r.id = $id_reserva";
        return $this->select($sql);
    }

    public function getCalificacion($id_habitacion, $id_usuario){
        $sql = "SELECT id FROM calificaciones WHERE id_habitacion = $id_habitacion AND id_usuario = $id_usuario";
        return $this->select($sql);
    }

    public function agregarCalificacion($cantidad, $comentario, $id_habitacion, $id_usuario)
    {
        $sql = "INSERT INTO calificaciones (cantidad, comentario, id_habitacion, id_usuario) VALUES (?,?,?,?)";
        return $this->insert($sql, [$cantidad, $comentario, $id_habitacion, $id_usuario]);
    }

    public function modificarCalificacion($cantidad, $comentario, $id)
    {
        $sql = "UPDATE calificaciones SET cantidad=?, comentario=? WHERE id = ?";
        return $this->save($sql, [$cantidad, $comentario, $id]);
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