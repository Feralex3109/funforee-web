<?php
<<<<<<< HEAD
// Habilita la visualización de errores en desarrollo
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Encabezado para respuestas en texto plano
header('Content-Type: text/plain; charset=utf-8');
require_once 'conexion.php';

// Solo acepta POST
=======
header('Content-Type: text/plain; charset=utf-8');
require_once 'conexion.php';

// Hacer que MySQLi lance excepciones para errores (opcional, si no lo tienes global)
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Solo procesar POST
>>>>>>> f744de1 (funforee)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit("❌ Método no permitido");
}

// Lista de campos del formulario (sin fecha_registro)
$campos = [
    'tipo_documento', 'identificacion', 'nombre', 'apellidos', 'estado_civil',
    'genero', 'edad', 'fecha_nacimiento', 'departamento_nacimiento',
    'municipio_nacimiento', 'fecha_expedicion', 'departamento_expedicion',
    'municipio_expedicion', 'departamento_residencia', 'municipio_residencia',
    'direccion', 'correo', 'eps', 'regimen', 'rh', 'tipo_enfermedad', 'estrato'
];

<<<<<<< HEAD
// Recoge y limpia datos
=======
// Recoger y limpiar datos
>>>>>>> f744de1 (funforee)
$datos = [];
foreach ($campos as $c) {
    $datos[$c] = isset($_POST[$c]) ? trim($_POST[$c]) : '';
}
$datos['edad'] = (int)$datos['edad'];
<<<<<<< HEAD
// $datos['estrato'] se queda como string porque la tabla espera ENUM('1','2',...)
// NO hacer: $datos['estrato'] = (int)$datos['estrato'];
=======
$datos['estrato'] = (int)$datos['estrato'];
>>>>>>> f744de1 (funforee)
$datos['fecha_registro'] = date('Y-m-d H:i:s');

// Validar obligatorios
$oblig = ['tipo_documento','identificacion','nombre','apellidos','correo'];
$faltan = array_filter($oblig, fn($c) => $datos[$c] === '');
if (!empty($faltan)) {
    exit("❌ Faltan campos obligatorios: " . implode(', ', $faltan));
}

try {
    $sql = <<<SQL
INSERT INTO pacientes (
    tipo_documento, identificacion, nombre, apellidos, estado_civil, genero, edad, fecha_nacimiento,
    departamento_nacimiento, municipio_nacimiento, fecha_expedicion, departamento_expedicion,
    municipio_expedicion, departamento_residencia, municipio_residencia, direccion, correo, eps, regimen,
    rh, tipo_enfermedad, estrato, fecha_registro
) VALUES (
    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
)
SQL;

    $stmt = $conn->prepare($sql);

<<<<<<< HEAD
    // 23 parámetros: 1-6 s, 7 i (edad), 8-23 s
    $stmt->bind_param(
        'ssssssi' . str_repeat('s', 16),
=======
    // Cadena de tipos: 6s + i + 14s + i + s = 23 parámetros
    $stmt->bind_param(
        'ssssssisssssssssssssiss',
>>>>>>> f744de1 (funforee)
        $datos['tipo_documento'],
        $datos['identificacion'],
        $datos['nombre'],
        $datos['apellidos'],
        $datos['estado_civil'],
        $datos['genero'],
<<<<<<< HEAD
        $datos['edad'], // Solo este es int
=======
        $datos['edad'],
>>>>>>> f744de1 (funforee)
        $datos['fecha_nacimiento'],
        $datos['departamento_nacimiento'],
        $datos['municipio_nacimiento'],
        $datos['fecha_expedicion'],
        $datos['departamento_expedicion'],
        $datos['municipio_expedicion'],
        $datos['departamento_residencia'],
        $datos['municipio_residencia'],
        $datos['direccion'],
        $datos['correo'],
        $datos['eps'],
        $datos['regimen'],
        $datos['rh'],
        $datos['tipo_enfermedad'],
        $datos['estrato'],
        $datos['fecha_registro']
    );

<<<<<<< HEAD
    if (!$stmt->execute()) {
        throw new Exception("Error en el insert: " . $stmt->error);
    }

    echo "✅ Datos guardados correctamente";
    $stmt->close();

} catch (Exception $e) {
=======
    $stmt->execute();
    echo "✅ Datos guardados correctamente";
    $stmt->close();

} catch (mysqli_sql_exception $e) {
>>>>>>> f744de1 (funforee)
    http_response_code(500);
    echo "❌ Error al guardar los datos: " . $e->getMessage();
} finally {
    if (isset($conn) && $conn) $conn->close();
}





<<<<<<< HEAD

=======
>>>>>>> f744de1 (funforee)
