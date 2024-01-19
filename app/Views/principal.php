<!doctype html>
<html lang="en">
  <head>
    <!-- Etiquetas meta requeridas -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>CRUD CON CODEIGNITER</title>
  </head>
  <body>
  
  <!-- Contenedor principal -->
  <div class="container">
  		
        <!-- Encabezado centrado -->
        <h1 class="text-center">CRUD con Codeigniter 4</h1>
        
        <!-- Formulario para agregar nuevos registros -->
        <div class="row"> <!-- Crea un contenedor de fila en Bootstrap -->
            <div class="col-sm-12"> <!-- Dentro de la fila, crea una columna que ocupa todo el ancho (col-sm-12). -->
				
                <!-- Establece un ancho máximo de 300 píxeles y centrando el formulario horizontalmente con margin: auto; -->
                <form method="POST" action="<?= base_url('crear') ?>" style="max-width: 300px; margin: auto;">
					
                    <!-- Campo de entrada para el nombre -->
                    <label for="nombre">Nombre:</label>
					<input type="text" name="nombre" class="form-control" required>

					<!-- Campo de entrada para el apellido -->
                    <label for="apellido">Apellido:</label>
					<input type="text" name="apellido" class="form-control" required>

					<!-- Campo de entrada para la edad -->
                    <label for="edad">Edad:</label>
					<input type="text" name="edad" class="form-control" required>

					<!-- Campo de entrada para el correo -->
                    <label for="correo">Correo:</label>
					<input type="text" name="correo" class="form-control" required>

					<br>

					<!-- Botón para enviar el formulario -->
                    <button type="submit" class="btn btn-primary">Guardar</button>
				</form>
            </div>
        </div>

		<!-- Línea horizontal para separar el formulario del listado -->
        <hr>

        <!-- Título para la sección de listado de personas -->
        <h2>Listado de personas</h2>
		
        <div class="row">
            <div class="col-sm-12">
                
                <!-- Tabla de Bootstrap para mostrar registros -->
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered">
                        
                        <!-- Encabezados de la tabla -->
                        <tr>
							<th>Id_Nombres</th>
							<th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Edad</th>
                            <th>Correo</th>
                            <th>Editar</th>
							<th>Eliminar</th>
                        </tr>
						
                        <!-- Bucle para mostrar registros -->
                        <?php foreach($datos as $key): ?>
							<tr>
								<td><?php echo $key->id ?></td>
								<td><?php echo $key->nombre ?></td>
								<td><?php echo $key->apellido ?></td>
								<td><?php echo $key->edad ?></td>
								<td><?php echo $key->correo ?></td>
								
                                <!-- Enlaces para editar y eliminar registros -->
                                <td>
									<a href="<?php echo base_url().'/obtenerNombre/'.$key->id ?>" class="btn btn-warning btn-sm">Editar</a>
								</td>
								<td>
									<a href="<?php echo base_url().'/eliminar/'.$key->id ?>" class="btn btn-danger btn-sm">Eliminar</a>
								</td>
							</tr>
                    	<?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery primero, luego Popper.js, luego Bootstrap JS -->
    <!-- necesarios para el correcto funcionamiento de Bootstrap en el lado del cliente. Estos scripts se están cargando desde CDN. -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
    <!-- Script de SweetAlert para mensajes emergentes -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<!-- Script PHP para mostrar mensajes según el resultado del servidor -->
    <script type="text/javascript">
        let mensaje = '<?php echo $mensaje ?>';

        if (mensaje == '1') {
            swal(':D','Agregado con exito!','success');
        } else if (mensaje == '0'){
            swal(':(','Fallo al agregar!','error');
        } else if (mensaje == '2'){
            swal(':D','Actualizado con exito!','success');
        } else if (mensaje == '3'){
            swal(':(','Actualización cancelada','error');
        } else if (mensaje == '4'){
            swal(':D','Eliminado con exito!','success');
        } else if (mensaje == '5'){
            swal(':(','Fallo al eliminar!','error');
        }
    </script>

</body>
</html>

