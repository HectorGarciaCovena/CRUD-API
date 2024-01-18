<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>CRUD CON CODEIGNITER</title>
  </head>
  <body>
  <div class="container">
  		<h1 class="text-center">CRUD con Codeigniter 4</h1>
        <div class="row">
            <div class="col-sm-12">
				<form method="POST" action="<?= base_url('crear') ?>" style="max-width: 300px; margin: auto;">
					<label for="nombre">Nombre:</label>
					<input type="text" name="nombre" class="form-control" required>

					<label for="apellido">Apellido:</label>
					<input type="text" name="apellido" class="form-control" required>

					<label for="edad">Edad:</label>
					<input type="text" name="edad" class="form-control" required>

					<label for="correo">Correo:</label>
					<input type="text" name="correo" class="form-control" required>

					<br>

					<button type="submit" class="btn btn-primary">Guardar</button>
				</form>
            </div>
        </div>

		<hr>
        <h2>Listado de personas</h2>
		
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered">
                        <tr>
							<th>Id_Nombres</th>
							<th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Edad</th>
                            <th>Correo</th>
                            <th>Editar</th>
							<th>Eliminar</th>
                        </tr>
						<?php foreach($datos as $key): ?>
							<tr>
								<td><?php echo $key->id ?></td>
								<td><?php echo $key->nombre ?></td>
								<td><?php echo $key->apellido ?></td>
								<td><?php echo $key->edad ?></td>
								<td><?php echo $key->correo ?></td>
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


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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

