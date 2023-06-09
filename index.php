<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    

    if (isset($_POST['agregar'])) {
        $credenciales["http"]["method"] = "POST";
        $credenciales["http"]["header"] = "Content-type: application/json";
        $data = [
            "nombre" => $_POST['perfil']['nombre'],
            "apellido" => $_POST['perfil']['apellido'],
            "direcccion" => $_POST['perfil']['direccion'],
            "edad" => $_POST['perfil']['edad'],
            "email" => $_POST['perfil']['email'],
            "horarioEntrada" => $_POST['perfil']['horarioEntrada'],
            "team" => $_POST['perfil']['team'],
            "trainer" => $_POST['perfil']['trainer'],
            "cc" => $_POST['perfil']['cedula'],
        ];
        $data = json_encode($data);
        $credenciales["http"]["content"] = $data;
        $config = stream_context_create($credenciales);

        $_DATA = file_get_contents("https://6481e26229fa1c5c50323e5f.mockapi.io/formulario", false, $config);
    }
    if (isset($_POST['eliminar'])) {
  
        $cedulaEliminar = $_POST['perfil']['cedula'];

        $url = 'https://6481e26229fa1c5c50323e5f.mockapi.io/formulario';
        $data = file_get_contents($url);
        $response = json_decode($data, true);

        $idEliminar = null;
        foreach ($response as $item) {
            if ($item['cc'] === $cedulaEliminar) {
                $idEliminar = $item['id'];
                break;
            }
        }

        if ($idEliminar !== null) {
            $urlEliminar = $url . '/' . $idEliminar;
            $credencialesD["http"]["method"] = "DELETE";
            $credencialesD["http"]["header"] = "Content-type: application/json";
            $config = stream_context_create($credencialesD);
            $resultado = file_get_contents($urlEliminar, false, $config);

        }
        
    }
 
        
        if (isset($_POST['editar'])) {
            $urlE = 'https://6481e26229fa1c5c50323e5f.mockapi.io/formulario/'.$_SESSION['numero'];
            $data = [
                "nombre" => $_POST['perfil']['nombre'],
                "apellido" => $_POST['perfil']['apellido'],
                "direccion" => $_POST['perfil']['direccion'],
                "edad" => $_POST['perfil']['edad'],
                "email" => $_POST['perfil']['email'],
                "horarioEntrada" => $_POST['perfil']['horarioEntrada'],
                "team" => $_POST['perfil']['team'],
                "trainer" => $_POST['perfil']['trainer'],
                "cc" => $_POST['perfil']['cc'],
            ];
            $data = json_encode($data);
    
            $credenciales["http"]["method"] = "PUT";
            $credenciales["http"]["header"] = "Content-type: application/json";
            $credenciales["http"]["content"] = $data;
            $config = stream_context_create($credenciales);
    
            $resultado = file_get_contents($urlE, false, $config);
        }
    




    if (isset($_POST['dar'])) {
        $_SESSION['numero'] = $_POST['dar'];
        $urlG = 'https://6481e26229fa1c5c50323e5f.mockapi.io/formulario';
        $urlGet = $urlG . '/' . $_POST['dar'];
        $credencialesG["http"]["method"] = "GET";
        $credencialesG["http"]["header"] = "Content-type: application/json";
        $config = stream_context_create($credencialesG);
        $resultado = file_get_contents($urlGet, false, $config);
        $data = json_decode($resultado, true);

        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $direccion = $data['direcccion'];
        $edad = $data['edad'];
        $email = $data['email'];
        $horarioEntrada = $data['horarioEntrada'];
        $team = $data['team'];
        $trainer = $data['trainer'];
        $cc = $data['cc'];
    }

    if(isset($_POST['buscar'])){
        $cedulaBuscar = $_POST['perfil']['cedula'];
        $urlb = 'https://6481e26229fa1c5c50323e5f.mockapi.io/formulario';
        $datab = file_get_contents($urlb);
        $responseb = json_decode($datab, true);
    
        $idBuscar = null;
        foreach ($responseb as $item) {
            if ($item['cc'] === $cedulaBuscar) {
                $idBuscar = $item['id'];
                break;
            }
        }
            $urlBu = 'https://6481e26229fa1c5c50323e5f.mockapi.io/formulario/'.$idBuscar;
            $credencialesBu["http"]["method"] = "GET";
            $credencialesBu["http"]["header"] = "Content-type: application/json"; 
            $config = stream_context_create($credencialesBu);  
            $resultado = file_get_contents($urlBu, false, $config);
            $datab = json_decode($resultado, true);
    
            $nombre = $datab['nombre'];
            $apellido = $datab['apellido'];
            $direccion = $datab['direccion'];
            $edad = $datab['edad'];
            $email = $datab['email'];
            $horarioEntrada = $datab['horarioEntrada'];
            $team = $datab['team'];
            $trainer = $datab['trainer'];
            $cc = $datab['cc'];
            $id = $datab['id'];
    }

}
    
    $url = 'https://6481e26229fa1c5c50323e5f.mockapi.io/formulario';
    $data = file_get_contents($url);
    $response = json_decode($data, true);

    $tabla = '';

    if (is_array($response)) {
        foreach ($response as $item) {
            $tabla .= '
                <tr>
                    <td>'.$item['nombre'].'</td>
                    <td>'.$item['apellido'].'</td>
                    <td>'.$item['direcccion'].'</td>
                    <td>'.$item['edad'].'</td>
                    <td>'.$item['email'].'</td>
                    <td>'.$item['horarioEntrada'].'</td>
                    <td>'.$item['team'].'</td>
                    <td>'.$item['trainer'].'</td>
                    <td><button class="extraer" type="submit" name="dar" value="'.$item['id'].'"><i class="bi bi-caret-up-fill"></i></button></td>
                </tr>
            ';
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>

    <form method="POST">
        <div class="container text-center">
            <div class="row row-invert">
                <div class="col colCenter">
                    <input type="text" placeholder="Nombre" name="perfil[nombre]" autocomplete="off" value="<?php echo isset($nombre) ? $nombre : null; ?>">
                </div>
                <div class="col">
                    <h1>Campuslads</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" placeholder="Apellido" name="perfil[apellido]" autocomplete="off" value="<?php echo isset($apellido) ? $apellido : null; ?>">
                </div>
                <div class="col">
                    <input type="text" placeholder="Edad" name="perfil[edad]" autocomplete="off" value="<?php echo isset($edad) ? $edad :null;?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" placeholder="Direccion" name="perfil[direccion]" autocomplete="off" value="<?php echo isset($direccion) ? $direccion :null;?>">
                </div>
                <div class="col">
                    <input type="text" placeholder="Email" name="perfil[email]" autocomplete="off" value="<?php echo isset($email) ? $email :null;?>">
                </div>
            </div>
            <div class="row">
                <div class="col d-flex flex-column gap-2">
                    <input type="text" placeholder="Horario de entrada" name="perfil[horarioEntrada]" autocomplete="off" value="<?php echo isset($horarioEntrada) ? $horarioEntrada :null;?>">
                    <input type="text" placeholder="Team" name="perfil[team]" autocomplete="off" value="<?php echo isset($team) ? $team :null;?>">
                    <input type="text" placeholder="Trainer" name="perfil[trainer]" autocomplete="off" value="<?php echo isset($trainer) ? $trainer :null;?>">
                </div>
                <div class="col gap-3 row-invert">
                    <div class="gap">
                        <button type="submit" name="agregar" value="Botón 1"><i class="bi bi-check-lg"></i></button>
                        <button type="submit" name="eliminar" value="Botón 2"><i class="bi bi-x"></i></button>
                    </div>
                    <div class="gap">
                        <button type="submit" name="editar" value="Botón 3"><i class="bi bi-pencil"></i></button>
                        <button type="submit" name="buscar" value="Botón 4"><i class="bi bi-search"></i></button>
                    </div>
                    <div class="gap">
                        <input type="text" placeholder="Cedula" name="perfil[cedula]" autocomplete="off" value="<?php echo isset($cc) ? $cc : null; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col" id="sector-con-scroll">
                    <div>
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Dirección</th>
                                <th>Edad</th>
                                <th>Email</th>
                                <th>Horario de entrada</th>
                                <th>Team</th>
                                <th>Trainer</th>
                                <th>extraer</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($tabla)){ 
                                echo $tabla; 
                            } 
                            ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
    </form>

</body>
</html>