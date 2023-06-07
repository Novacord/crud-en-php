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

    <section>
        <div class="container text-center">
            <div class="row row-invert">
                <div class="col colCenter">
                    <input type="text" placeholder="Nombre" name="identificacion" required>
                </div>
                <div class="col">
                    <h1>Campuslads</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" placeholder="Apellido" name="identificacion" required>
                </div>
                <div class="col">
                    <input type="text" placeholder="Edad" name="identificacion" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" placeholder="Direccion" name="identificacion" required>
                </div>
                <div class="col">
                    <input type="text" placeholder="Email" name="identificacion" required>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex flex-column gap-2">
                    <input type="text" placeholder="Horario de entrada" name="identificacion" required>
                    <input type="text" placeholder="Horario de entrada" name="identificacion" required>
                    <input type="text" placeholder="Horario de entrada" name="identificacion" required>
                </div>
                <div class="col gap-2">
                    <div>
                        <button><i class="bi bi-check-lg"></i></button>
                        <button><i class="bi bi-x"></i></button>
                    </div>
                    <div>
                        <button><i class="bi bi-check-lg"></i></button>
                        <button><i class="bi bi-x"></i></button>
                    </div>
                </div>
            </div>
    </section>

</body>
</html>