<?php

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

    <form>
        <div class="container text-center">
            <div class="row row-invert">
                <div class="col colCenter">
                    <input type="text" placeholder="Nombre" name="perfil[nombre]" autocomplete="off">
                </div>
                <div class="col">
                    <h1>Campuslads</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" placeholder="Apellido" name="perfil[apellido]" autocomplete="off">
                </div>
                <div class="col">
                    <input type="text" placeholder="Edad" name="perfil[edad]" autocomplete="off">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" placeholder="Direccion" name="perfil[direccion]" autocomplete="off">
                </div>
                <div class="col">
                    <input type="text" placeholder="Email" name="perfil[email]" autocomplete="off">
                </div>
            </div>
            <div class="row">
                <div class="col d-flex flex-column gap-2">
                    <input type="text" placeholder="Horario de entrada" name="perfil[horarioEntrada]" autocomplete="off">
                    <input type="text" placeholder="Team" name="perfil[team]" autocomplete="off">
                    <input type="text" placeholder="Trainer" name="perfil[trainer]" autocomplete="off">
                </div>
                <div class="col gap-3">
                    <div class="gap">
                        <button><i class="bi bi-check-lg"></i></button>
                        <button><i class="bi bi-x"></i></button>
                    </div>
                    <div class="gap">
                        <button><i class="bi bi-pencil"></i></button>
                        <button><i class="bi bi-search"></i></button>
                    </div>
                    <div class="gap">
                        <input type="text" placeholder="Cedula" name="perfil[cedula]" >
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
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>John</td>
                                <td>Doe</td>
                                <td>123 Calle Principal</td>
                                <td>25</td>
                                <td>johndoe@example.com</td>
                                <td>9:00 AM</td>
                                <td>Team A</td>
                                <td>Trainer 1</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
    </section>

</body>
</html>