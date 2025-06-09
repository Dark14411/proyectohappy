CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    correo VARCHAR(255) NOT NULL UNIQUE,
    direccion VARCHAR(255),
    telefono VARCHAR(20),
    fecha_de_registro DATETIME DEFAULT CURRENT_TIMESTAMP
); 