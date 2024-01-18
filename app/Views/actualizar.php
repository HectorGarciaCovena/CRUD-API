<?php 
  
    $id = $datos[0]['id'];
    $nombre = $datos[0]['nombre'];
    $apellido = $datos[0]['apellido'];
    $edad = $datos[0]['edad']; 
    $correo = $datos[0]['correo'];
 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Actualiza un Registro</title>
  </head>
  <body>
  <div class="container">
        <h1 class="text-center">Actualizar Registro</h1>
        <div class="row">
            <div class="col-sm-12">
            <form method="POST" action="<?= base_url('actualizar') ?>" style="max-width: 300px; margin: auto;">
            <input type="text" id="id" name="id" value="<?php echo $id; ?>" hidden>

                    <label for="nombre">Nombre:</label>
					          <input type="text" name="nombre" class="form-control" required value="<?php echo $nombre ?>"> 
                    

                    <label for="apellido">Apellido:</label>
					          <input type="text" name="apellido" class="form-control" required value="<?php echo $apellido ?>"> 
                    

                    <label for="edad">Edad:</label>
					          <input type="text" name="edad" class="form-control" required value="<?php echo $edad ?>">
                    

                    <label for="correo">Correo:</label>
					          <input type="text" name="correo" class="form-control" required value="<?php echo $correo ?>">
                      

                    <br>
                    <button class="btn btn-primary">Actualizar</button>
                    <button name="cancelar" class="btn btn-primary float-right">Cancelar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>