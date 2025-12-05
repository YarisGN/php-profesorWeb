<?php
$id_profesor = $_GET['id_profesor'];

/* Conectamos con la base de datos y verificamos */
$conexion = mysqli_connect('localhost', 'root', '', 'profesor', '3306');
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

/* Seleccionamos todos los datos y verificamos la consulta */
$comando = "DELETE FROM datos WHERE id_profesor = '$id_profesor'";
$resultado = mysqli_query($conexion, $comando);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
} else {
    echo "Registro eliminado correctamente";
}

/* Redirigimos a la página donde está la tabla */
header("Location: ../index.php");
exit;

?>

