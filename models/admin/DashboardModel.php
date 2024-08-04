<?php
class DashboardModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }    
    /**
     * obtener datos de la empresa
     *
     * @return void
     */
    public function getDatos()
    {
        return $this->select("SELECT * FROM empresa");
    }

    public function getReservasNuevas() {
        $sql = "SELECT r.*, h.estilo, h.numero, h.foto, CONCAT(u.nombre, ' ', u.apellido) AS cliente FROM reservas r
        INNER JOIN habitaciones h ON r.id_habitacion = h.id
        INNER JOIN usuarios u ON r.id_usuario = u.id ORDER BY r.id DESC LIMIT 10";
        return $this->selectAll($sql);
    }
    
    /**
     * verificar datos de usuarios para admin
     *
     * @param  mixed $correo
     * @return void
     */
    public function getUsuario($correo)
    {
        return $this->select("SELECT id, nombre, correo, perfil, clave, rol FROM usuarios WHERE correo = '$correo' AND rol != 3");
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

    public function calcularReservas($table, $campo1, $campo2, $desde, $hasta, $id_usuario)
    {
        $existe = ($id_usuario > 1) ? " AND id_usuario = $id_usuario" : '';
        $sql = "SELECT SUM(IF(MONTH($campo1) = 1, $campo2, 0)) AS ene,
        SUM(IF(MONTH($campo1) = 2, $campo2, 0)) AS feb,
        SUM(IF(MONTH($campo1) = 3, $campo2, 0)) AS mar,
        SUM(IF(MONTH($campo1) = 4, $campo2, 0)) AS abr,
        SUM(IF(MONTH($campo1) = 5, $campo2, 0)) AS may,
        SUM(IF(MONTH($campo1) = 6, $campo2, 0)) AS jun,
        SUM(IF(MONTH($campo1) = 7, $campo2, 0)) AS jul,
        SUM(IF(MONTH($campo1) = 8, $campo2, 0)) AS ago,
        SUM(IF(MONTH($campo1) = 9, $campo2, 0)) AS sep,
        SUM(IF(MONTH($campo1) = 10, $campo2, 0)) AS oct,
        SUM(IF(MONTH($campo1) = 11, $campo2, 0)) AS nov,
        SUM(IF(MONTH($campo1) = 12, $campo2, 0)) AS dic 
        FROM $table WHERE $campo1 BETWEEN '$desde' AND '$hasta' $existe";
        return $this->select($sql);
    }

    public function montoReservas($table, $campo1, $campo2, $desde, $hasta, $id_usuario)
    {
        $existe = ($id_usuario > 1) ? " AND id_usuario = $id_usuario" : '';
        $sql = "SELECT SUM($campo2) AS total FROM $table WHERE $campo1 BETWEEN '$desde' AND '$hasta' AND estado = 1 $existe";
        return $this->select($sql);
    }
}
 
?>