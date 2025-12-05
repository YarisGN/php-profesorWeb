<?php
/* Conexión */
$conexion = mysqli_connect('localhost', 'root', '', 'profesor', '3306');
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

/* Mostrar datos GET */
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (!isset($_GET['id_profesor'])) {
        die("ID no enviado.");
    }

    $id_profesor = $_GET['id_profesor'];

    // Obtener datos del profesor
    $sql = "SELECT * FROM datos WHERE id_profesor = '$id_profesor'";
    $resultado = mysqli_query($conexion, $sql);

    if (!$resultado || mysqli_num_rows($resultado) == 0) {
        die("No se encontró el profesor.");
    }

    $fila = mysqli_fetch_assoc($resultado);
}

/* Actualizar POST */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_profesor = $_POST['id_profesor'];
    $nombre = $_POST['nombre'];
    $materia = $_POST['materia'];
    $especialidad = $_POST['especialidad'];

    $sql = "UPDATE datos 
            SET nombre='$nombre', materia='$materia', especialidad='$especialidad'
            WHERE id_profesor='$id_profesor'";

    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "<script>
                alert('Registro actualizado correctamente');
                window.location.href = '../index.php';
              </script>";
        exit();
    } else {
        die("Error al actualizar: " . mysqli_error($conexion));
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actualizar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body
    style="background-image: url(https://i.pinimg.com/736x/b8/21/8f/b8218f2e133298f1ba3b960c1ebb605a.jpg); background-repeat: no-repeat; background-size: cover;">
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card text-center">
            <div class="card-header fs-3 fw-bolder">
                Actualizar datos
            </div>

            <!-- Formulario -->
            <form action="update.php" method="post">

                <!-- Campo oculto con el ID -->
                <input type="hidden" name="id_profesor" value="<?= $fila['id_profesor']; ?>">

                <div class="input-group mb-3">
                    <span class="input-group-text">Nombre</span>
                    <input type="text" class="form-control" name="nombre" value="<?= $fila['nombre']; ?>">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Materia</span>
                    <input type="text" class="form-control" name="materia" value="<?= $fila['materia']; ?>">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Especialidad</span>
                    <input type="text" class="form-control" name="especialidad" value="<?= $fila['especialidad']; ?>">
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-dark" type="submit">Guardar cambios</button>
                </div>
            </form>

        </div>
    </div>
</body>

</html>