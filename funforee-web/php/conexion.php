<?php
<<<<<<< HEAD
$host = '127.0.0.1'; // Mejor que 'localhost' en muchos casos de PHP
$usuario = 'funforee';
$contrasena = 'Mathi@3109';
$baseDatos = 'db_funforee';
$puerto = 3308;

$conn = new mysqli($host, $usuario, $contrasena, $baseDatos, $puerto);

if ($conn->connect_error) {
    http_response_code(500);
    exit('Error de conexión a la base de datos: ' . $conn->connect_error);
}

=======
// Parámetros de conexión
$host       = 'localhost';
$usuario    = 'root';
$contrasena = '';
$baseDatos  = 'bd_funforee';

// Crear la conexión
$conn = new mysqli($host, $usuario, $contrasena, $baseDatos);

// Verificar la conexión
if ($conn->connect_error) {
    // Loguear el error, pero mostrar un mensaje genérico al usuario final
    error_log('Error de conexión a la base de datos: ' . $conn->connect_error);
    http_response_code(500);
    exit('Error de conexión a la base de datos. Intente más tarde.');
}

// Forzar UTF-8 en toda la sesión
>>>>>>> f744de1 (funforee)
if (!$conn->set_charset('utf8mb4')) {
    error_log('Error al configurar utf8mb4: ' . $conn->error);
}
?>



<<<<<<< HEAD


=======
>>>>>>> f744de1 (funforee)
