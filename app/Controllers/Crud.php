<?php namespace App\Controllers;

	use App\Models\PersonasModel;

class Crud extends BaseController
{
	// Método para cargar la vista principal y listar los nombres
	public function index()
	{
		$Crud = new PersonasModel();
		$datos = $Crud->listarNombres(); // Obtiene los registros de la tabla 'personas'

		$mensaje = session('mensaje'); // Obtiene el mensaje de la sesión (puede ser de éxito o error)

		$data = [
					"datos" => $datos,
					"mensaje" => $mensaje
				];

		return view('principal', $data); // Carga la vista 'principal' con los datos y el mensaje
	}

	// Método para crear un nuevo registro
	public function crear() {
		$datos = [
					"nombre" => $_POST['nombre'],
					"apellido" => $_POST['apellido'],
					"edad" => $_POST['edad'],
                    "correo" => $_POST['correo']
				];
		$Crud = new PersonasModel();
		$respuesta = $Crud->insertar($datos); // Inserta un nuevo registro en la tabla 'personas'

		if ($respuesta > 0) {
			return redirect()->to(base_url().'/')->with('mensaje','1'); // Redirige a la vista principal con mensaje de éxito
		} else {
			return redirect()->to(base_url().'/')->with('mensaje','0'); // Redirige a la vista principal con mensaje de error
		}

	}

	// Método para actualizar un registro
	public function actualizar(){
        
		// Verificamos si el botón Cancelar fue presionado
        if (isset($_POST['cancelar'])) {
            return redirect()->to(base_url())->with('mensaje', '3'); // Mensaje de cancelación
        }
    
        // Si no se presionó Cancelar, procedemos con la lógica de actualización
        $datos = [
            "nombre" => $_POST['nombre'],
            "apellido" => $_POST['apellido'],
            "edad" => $_POST['edad'],
            "correo" => $_POST['correo']
        ];
        $idNombre = $_POST['id'];
        $Crud = new PersonasModel();
        $respuesta = $Crud->actualizar($datos, $idNombre); // Actualiza el registro en la tabla 'personas'
    
        if ($respuesta) {
            return redirect()->to(base_url().'/')->with('mensaje','2'); // Redirige a la vista principal con mensaje de éxito
        } else {
            return redirect()->to(base_url().'/')->with('mensaje','3'); // Redirige a la vista principal con mensaje de error
        }
    }

	// Método para obtener un registro por ID y cargar la vista de actualización
	public function obtenerNombre($id) {
		$data = ["id" => $id];
		$Crud = new PersonasModel();
		$respuesta = $Crud->obtenerNombre($data);

		$datos = ["datos" => $respuesta];

		return view('actualizar', $datos); // Carga la vista 'actualizar' con los datos obtenidos
	}

	// Método para eliminar un registro por ID
	public function eliminar($id){
		$Crud = new PersonasModel();
		$data = ["id" => $id];

		$respuesta = $Crud->eliminar($data); // Elimina el registro de la tabla 'personas'

		if ($respuesta) {
			return redirect()->to(base_url().'/')->with('mensaje','4'); // Redirige a la vista principal con mensaje de éxito
		} else {
			return redirect()->to(base_url().'/')->with('mensaje','5'); // Redirige a la vista principal con mensaje de error
		}
	}

	//--------------------------------------------------------------------

}
