<?php
$nombre = $_POST['nombre'];
$sms = "";
$res = "";
$conexion = mysqli_connect("localhost", "root", "", "profesor", "3306");
$comando = "SELECT * FROM datos WHERE nombre = '$nombre'";
$envio = mysqli_query($conexion, $comando);
if ($fila = mysqli_fetch_assoc($envio)) {
    $materia = $fila['materia'];
    $especialidad = $fila['especialidad'];

    $res = "S";
} else {
    $sms = "No se encontró el nombre: " . $nombre . "<br>";
}
mysqli_close($conexion);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body style="background-image: url(https://i.pinimg.com/736x/b8/21/8f/b8218f2e133298f1ba3b960c1ebb605a.jpg); background-repeat: no-repeat; background-size: cover;">

    <!-- Inicio Header -->
    <div class="container mt-3">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
        </ul>
    </div>
    <!-- Fin Header -->

    <div class="container vh-100 d-flex justify-content-center align-items-center" style="opacity: calc(0.9);">
        <div class="container text-center" style="width: 50rem; height: 15rem; background-color: rgba(234, 237, 241, 1); margin-bottom: 10px;">
            <div class="card-header fs-3 fw-bolder">
                Resultados de la consulta
            </div>
            <div class="card-body">
                <h5 class="card-title" style="margin-bottom: 15px;">Nombre consultado: <?php echo $nombre ?></h5>
                <div class="card-title" style="margin-bottom: 15px;">
                    <h4>Materia: </h4>
                    <h5>
                        <?php if ($res == "S") {
                            echo $materia . "<br>";
                        } else {
                            echo "No hay registro";
                        } ?>
                    </h5>
                </div>
                <div class="card-title">
                    <h4>Especialidad: </h4>
                    <h5>
                        <?php if ($res == "S") {
                            echo $especialidad . "<br>";
                        } else {
                            echo "No hay registro";
                        } ?>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>