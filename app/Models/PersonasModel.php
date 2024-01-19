<?php
namespace App\Models;

use CodeIgniter\Model;

class PersonasModel extends Model
{
    protected $table = 'personas'; // Nombre de la tabla existente en tu base de datos
    protected $primaryKey = 'id'; // Clave primaria de la tabla
    
    // Método para obtener todos los registros de la tabla 'personas'
    public function listarNombres() {
        $Nombres = $this->db->query("SELECT * FROM personas");
        return $Nombres->getResult();
    }
    
    // Método para insertar un nuevo registro en la tabla 'personas'
    public function insertar($datos) {
        $Nombres = $this->db->table('personas');
        $Nombres->insert($datos);

        return $this->db->insertID(); // Retorna el ID del último registro insertado
    }

    // Método para obtener un registro específico de la tabla 'personas' según los datos proporcionados
    public function obtenerNombre($data) {
        $Nombres =  $this->db->table('personas');
        $Nombres->where($data);
        return $Nombres->get()->getResultArray();
    }

    // Método para actualizar un registro en la tabla 'personas' según el ID proporcionado
    public function actualizar($data, $idNombre) {
        $Nombres = $this->db->table('personas');
        $Nombres->set($data);
        $Nombres->where('id', $idNombre);
        return $Nombres->update();
    }

    // Método para eliminar un registro de la tabla 'personas' según los datos proporcionados
    public function eliminar($data) {
        $Nombres = $this->db->table('personas');
        $Nombres->where($data);
        return $Nombres->delete();
    }
}
