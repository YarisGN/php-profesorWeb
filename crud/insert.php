<?php
$nombre = $_POST['nombre'];
$materia = $_POST['materia'];
$especialidad = $_POST['especialidad'];
$sms = "";

$conexion = mysqli_connect("localhost", "root", "", "profesor", "3306");
$comando = "INSERT INTO datos (nombre,materia,especialidad) VALUES ('$nombre','$materia','$especialidad')";
$envio = mysqli_query($conexion, $comando);
if ($envio) {
    $sms = "Envio exitoso, datos agregados.";
} else {
    $sms = "Envio no exitoso";
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

<body style="background-image: url(https://img.freepik.com/vector-gratis/fondo-lujo-gradiente-espacio-copiar_23-2148962647.jpg?semt=ais_hybrid&w=740&q=80); background-repeat: no-repeat; background-size: cover;">

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
        <div class="container text-center" style="width: 50rem; height: 18rem; background-color: rgba(193, 216, 219, 1); margin-bottom: 10px;">
            <div class="card-header fs-3 fw-bolder">
                Datos guardados
            </div>
            <div class="card-body">
                <h5 class="card-title">Nombre completo: <h4><?php echo $nombre . "<br>"; ?></h4>
                </h5>
                <h5 class="card-title">Materia: <h4><?php echo $materia . "<br>"; ?></h4>
                </h5>
                <h5 class="card-title">Especialidad: <h4><?php echo $especialidad . "<br>"; ?></h4>
                </h5>
                <h3 class="card-title"><?php echo $sms ?></h3>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>