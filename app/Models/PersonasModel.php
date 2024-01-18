<?php
namespace App\Models;

use CodeIgniter\Model;

class PersonasModel extends Model
{
    protected $table = 'personas'; // Nombre de la tabla existente en tu base de datos
    protected $primaryKey = 'id'; // Clave primaria de la tabla
    
    public function listarNombres() {
        $Nombres = $this->db->query("SELECT * FROM personas");
        return $Nombres->getResult();
    }
    public function insertar($datos) {
        $Nombres = $this->db->table('personas');
        $Nombres->insert($datos);

        return $this->db->insertID(); 
    }

    public function obtenerNombre($data) {
        $Nombres =  $this->db->table('personas');
        $Nombres->where($data);
        return $Nombres->get()->getResultArray();
    }

    public function actualizar($data, $idNombre) {
        $Nombres = $this->db->table('personas');
        $Nombres->set($data);
        $Nombres->where('id', $idNombre);
        return $Nombres->update();
    }

    public function eliminar($data) {
        $Nombres = $this->db->table('personas');
        $Nombres->where($data);
        return $Nombres->delete();
    }
}
