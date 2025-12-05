<?php
/* Conectamos con la base de datos y verificamos */
$conexion = mysqli_connect('localhost', 'root', '', 'profesor', '3306');
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

/* Seleccionamos todos los datos y verificamos la consulta */
$comando = "SELECT * FROM `datos`";
$resultado = mysqli_query($conexion, $comando);
if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body
    style="background-image: url(https://i.pinimg.com/736x/b8/21/8f/b8218f2e133298f1ba3b960c1ebb605a.jpg); background-repeat: no-repeat; background-size: cover;">
    <!-- Inicio Header -->
    <div class="container mt-3">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./crud/insert.html">Insertar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./crud/select.html">Consultar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Profesor</a>
            </li>
        </ul>
    </div>
    <!-- Fin Header -->

    <!-- Inicio Tabla de contenido -->
    <div class="container mt-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Materia</th>
                    <th scope="col">Especialidad</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Borrar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <th scope="row"><?= $fila['id_profesor'] ?></th>
                        <td><?= $fila['nombre'] ?></td>
                        <td><?= $fila['materia'] ?></td>
                        <td>@<?= $fila['especialidad'] ?></td>
                        <td>
                            <a href="./crud/update.php?id_profesor=<?= $fila['id_profesor'] ?>">
                                <img width="25px" src="./img/editar.png" alt="Editar" srcset="">
                            </a>
                        </td>
                        <td>
                            <a href="./crud/delete.php?id_profesor=<?= $fila['id_profesor'] ?>"
                                onclick="return confirm('¿Estás seguro de que quieres eliminar este registro?');">
                                <img width="25px" src="./img/borrar.png" alt="Borrar" srcset="">
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Fin Tabla de contenido -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>