<?php
require 'vendor/autoload.php';

$servidor = "ProyectoHappy.mssql.somee.com";
$usuario = "dark1444467_SQLLogin_1";
$password = "fhuqiyrtkf";
$basedatos = "ProyectoHappy";

// Crear conexión
try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$basedatos", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Crear instancia de Faker con localización en español
    $faker = Faker\Factory::create('es_ES');
    
    // Preparar la consulta SQL
    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, correo, direccion, telefono, fecha_de_registro) 
                               VALUES (:nombre, :correo, :direccion, :telefono, :fecha_de_registro)");
    
    // Generar 3,500 registros
    for ($i = 0; $i < 3500; $i++) {
        // Generar nombre completo con formato más realista
        $nombre = $faker->firstName . ' ' . $faker->lastName;
        
        // Generar correo basado en el nombre
        $correo = strtolower(
            str_replace(' ', '.', $nombre) . '@' . 
            $faker->randomElement(['gmail.com', 'hotmail.com', 'yahoo.com', 'outlook.com'])
        );
        
        // Generar dirección más detallada
        $direccion = $faker->streetAddress . ', ' . 
                    $faker->city . ', ' . 
                    $faker->state . ' ' . 
                    $faker->postcode;
        
        // Generar teléfono con formato español
        $telefono = '+34 ' . $faker->numberBetween(600000000, 999999999);
        
        // Generar fecha de registro en el último año
        $fecha = $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s');
        
        $stmt->execute([
            ':nombre' => $nombre,
            ':correo' => $correo,
            ':direccion' => $direccion,
            ':telefono' => $telefono,
            ':fecha_de_registro' => $fecha
        ]);
        
        // Mostrar progreso cada 100 registros
        if (($i + 1) % 100 === 0) {
            echo "Registros generados: " . ($i + 1) . "\n";
            // Mostrar ejemplo del último registro generado
            echo "Ejemplo de registro:\n";
            echo "Nombre: $nombre\n";
            echo "Correo: $correo\n";
            echo "Dirección: $direccion\n";
            echo "Teléfono: $telefono\n";
            echo "Fecha: $fecha\n";
            echo "------------------------\n";
        }
    }
    
    echo "¡Proceso completado! Se han generado 3,500 registros exitosamente.";
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?> 