<?php namespace App\Controllers;

	use App\Models\PersonasModel;

class Crud extends BaseController
{
	public function index()
	{
		$Crud = new PersonasModel();
		$datos = $Crud->listarNombres();

		$mensaje = session('mensaje');

		$data = [
					"datos" => $datos,
					"mensaje" => $mensaje
				];

		return view('principal', $data);
	}

	public function crear() {
		$datos = [
					"nombre" => $_POST['nombre'],
					"apellido" => $_POST['apellido'],
					"edad" => $_POST['edad'],
                    "correo" => $_POST['correo']
				];
		$Crud = new PersonasModel();
		$respuesta = $Crud->insertar($datos);

		if ($respuesta > 0) {
			return redirect()->to(base_url().'/')->with('mensaje','1');
		} else {
			return redirect()->to(base_url().'/')->with('mensaje','0');
		}

	}

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
        $respuesta = $Crud->actualizar($datos, $idNombre);
    
        if ($respuesta) {
            return redirect()->to(base_url().'/')->with('mensaje','2');
        } else {
            return redirect()->to(base_url().'/')->with('mensaje','3');
        }
    }

	public function obtenerNombre($id) {
		$data = ["id" => $id];
		$Crud = new PersonasModel();
		$respuesta = $Crud->obtenerNombre($data);

		$datos = ["datos" => $respuesta];

		return view('actualizar', $datos);
	}

	public function eliminar($id){
		$Crud = new PersonasModel();
		$data = ["id" => $id];

		$respuesta = $Crud->eliminar($data);

		if ($respuesta) {
			return redirect()->to(base_url().'/')->with('mensaje','4');
		} else {
			return redirect()->to(base_url().'/')->with('mensaje','5');
		}
	}

	//--------------------------------------------------------------------

}
