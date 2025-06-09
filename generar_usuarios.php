<?php
// Incluir la librería Faker
require 'vendor/autoload.php';

// Configuración de la base de datos para Somee.com SQL Server
$servidor = "ProyectoHappy.mssql.somee.com";
$usuario = "dark1444467_SQLLogin_1";
$password = "fhuqiyrtkf";
$basedatos = "ProyectoHappy";

try {
    // Conectar a la base de datos
    $conexion = new PDO("sqlsrv:Server=$servidor;Database=$basedatos", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Inicializar Faker en español
    $faker = Faker\Factory::create('es_ES');
    
    // Preparar la consulta SQL
    $sql = "INSERT INTO usuarios (nombre, correo, direccion, telefono, fecha_de_registro) 
            VALUES (:nombre, :correo, :direccion, :telefono, :fecha)";
    $stmt = $conexion->prepare($sql);
    
    // Contador para mostrar progreso
    $total = 3500;
    
    // Generar e insertar los registros
    for ($i = 0; $i < $total; $i++) {
        // Generar datos falsos
        $datos = [
            ':nombre' => $faker->name,
            ':correo' => $faker->unique()->email,
            ':direccion' => $faker->address,
            ':telefono' => $faker->phoneNumber,
            ':fecha' => $faker->dateTimeThisYear()->format('Y-m-d H:i:s')
        ];
        
        // Insertar el registro
        $stmt->execute($datos);
        
        // Mostrar progreso cada 500 registros
        if (($i + 1) % 500 === 0) {
            echo "Progreso: " . ($i + 1) . " de $total registros insertados\n";
        }
    }
    
    echo "\n¡Proceso completado! Se han insertado $total registros exitosamente en Somee.com SQL Server";
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?> 