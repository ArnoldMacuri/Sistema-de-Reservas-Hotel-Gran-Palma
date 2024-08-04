<?php
class CategoriasModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getCategorias($estado)
    {
        // Construir la consulta SQL con los parámetros de DataTables
        $sql = "SELECT * FROM categorias WHERE estado = $estado";
        return $this->selectAll($sql);
    }

    public function getTotalCategorias($estado)
    {
        // Consulta para obtener el número total de registros sin aplicar filtros
        $sql = "SELECT COUNT(*) as total FROM categorias WHERE estado = $estado";
        $result = $this->select($sql);

        return $result['total'];
    }
    
    public function registrar($categoria)
    {
        $sql = "INSERT INTO categorias (categoria) VALUES (?)";
        return $this->insert($sql, [$categoria]);
    }

    public function getValidar($campo, $valor, $id)
    {
        if ($id == 0) {
            $sql = "SELECT id FROM categorias WHERE $campo = '$valor'";
        } else {
            $sql = "SELECT id FROM categorias WHERE $campo = '$valor' AND id != $id";
        }
        return $this->select($sql);
    }

    public function eliminar($estado, $idCategoria)
    {
        $sql = "UPDATE categorias SET estado = ? WHERE id = ?";
        return $this->save($sql, [$estado, $idCategoria]);
    }
    
    public function getCategoria($idCategoria)
    {
        return $this->select("SELECT * FROM categorias WHERE id = $idCategoria");
    }

    public function actualizar($categoria, $id)
    {
        $sql = "UPDATE categorias SET categoria = ? WHERE id = ?";
        return $this->save($sql, [$categoria, $id]);
    }
}
