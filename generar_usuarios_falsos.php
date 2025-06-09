<?php

require_once __DIR__ . '/vendor/autoload.php'; // Carga de Composer

// Configuración de la base de datos MySQL en Somee.com (¡REEMPLAZA ESTOS VALORES!)
// Estos valores DEBEN coincidir con los que usas en conexion_mysql.php
$servidor = "tu_servidor_mysql_somee.com"; 
$usuario = "tu_usuario_mysql";
$password = "tu_contraseña_mysql";
$nombre_base_datos = "tu_nombre_base_de_datos";

$num_registros = 3500;

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$nombre_base_datos", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa a MySQL.\n";

    $faker = Faker\Factory::create('es_ES'); // Usar Faker en español

    // Preparar la consulta SQL para inserción
    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, correo, direccion, telefono, fecha_de_registro) VALUES (:nombre, :correo, :direccion, :telefono, :fecha_de_registro)");

    echo "Generando e insertando $num_registros registros...\n";

    for ($i = 0; $i < $num_registros; $i++) {
        $nombre = $faker->name;
        $correo = $faker->unique()->safeEmail;
        $direccion = $faker->address;
        $telefono = $faker->phoneNumber;
        $fecha_de_registro = $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s');

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':fecha_de_registro', $fecha_de_registro);
        
        $stmt->execute();

        if (($i + 1) % 100 === 0) {
            echo "Insertados " . ($i + 1) . " registros...\n";
        }
    }

    echo "\n¡Se han insertado $num_registros registros falsos correctamente!\n";

} catch(PDOException $e) {
    echo "\nError en la conexión o inserción: " . $e->getMessage() . "\n";
    echo "Código de error: " . $e->getCode() . "\n";
    echo "Trace: " . $e->getTraceAsString() . "\n";
}

?> 