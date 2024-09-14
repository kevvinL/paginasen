<?php

$host = 'localhost';
$dbname = 'formulario_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Error de conexión: ' . $e->getMessage());
}

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$apellido2 = $_POST['apellido2'];
$correo_institucional = $_POST['correo_institucional'];
$correo_personal = $_POST['correo_personal'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$estudio = $_POST['estudio'];
$genero = $_POST['genero'];
$discapacidad = $_POST['discapacidad'];
$tipo_sangre = $_POST['tipo_sangre'];
$convive = isset($_POST['convive']) ? $_POST['convive'] : [];
$deporte = isset($_POST['deporte']) ? $_POST['deporte'] : [];
$descripcion = $_POST['descripcion'];
$contrasena = $_POST['contrasena'];

try {
    $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, apellido, apellido2, correo_institucional, correo_personal, fecha_nacimiento, estudio, genero, discapacidad, tipo_sangre, convive, deporte, descripcion, contrasena) VALUES (:nombre, :apellido, :apellido2, :correo_institucional, :correo_personal, :fecha_nacimiento, :estudio, :genero, :discapacidad, :tipo_sangre, :convive, :deporte, :descripcion, :contrasena)");

    $stmt->execute([
        ':nombre' => $nombre,
        ':apellido' => $apellido,
        ':apellido2' => $apellido2,
        ':correo_institucional' => $correo_institucional,
        ':correo_personal' => $correo_personal,
        ':fecha_nacimiento' => $fecha_nacimiento,
        ':estudio' => $estudio,
        ':genero' => $genero,
        ':discapacidad' => $discapacidad,
        ':tipo_sangre' => $tipo_sangre,
        ':convive' => implode(', ', $convive),
        ':deporte' => implode(', ', $deporte),
        ':descripcion' => $descripcion,
        ':contrasena' => $contrasena,
    ]);

    echo 'Datos guardados exitosamente.';
} catch (PDOException $e) {
    echo 'Error al guardar los datos: ' . $e->getMessage();
}
?>
