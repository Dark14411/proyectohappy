<?php
// Mostrar todos los errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configuración de la base de datos MySQL en Somee.com (¡REEMPLAZA ESTOS VALORES!)
$servidor = "tu_servidor_mysql_somee.com"; // Por ejemplo: mysql.somee.com o localhost si es local
$usuario = "tu_usuario_mysql";
$password = "tu_contraseña_mysql";
$nombre_base_datos = "tu_nombre_base_de_datos";

echo "Intentando conectar a MySQL...\n";
echo "Servidor: $servidor\n";
echo "Base de datos: $nombre_base_datos\n";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$nombre_base_datos", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa a MySQL";
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage() . "\n";
    echo "Código de error: " . $e->getCode() . "\n";
    echo "Trace: " . $e->getTraceAsString() . "\n";
}
?> 