-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS manga_db;

-- Usar la base de datos
USE manga_db;

-- Crear la tabla de usuarios
IF NOT EXISTS (SELECT * FROM sys.tables WHERE name = 'usuarios')
BEGIN
    CREATE TABLE usuarios (
        id INT IDENTITY(1,1) PRIMARY KEY,
        nombre NVARCHAR(100) NOT NULL,
        correo NVARCHAR(100) NOT NULL UNIQUE,
        direccion NVARCHAR(200) NOT NULL,
        telefono NVARCHAR(20) NOT NULL,
        fecha_de_registro DATETIME DEFAULT GETDATE()
    );
END

CREATE TABLE Mangas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT,
    fecha_publicacion DATE,
    estado VARCHAR(50),
    genero VARCHAR(100)
);

CREATE TABLE Autores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    biografia TEXT
);

CREATE TABLE Personajes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    manga_id INT,
    FOREIGN KEY (manga_id) REFERENCES Mangas(id)
);

CREATE TABLE Capitulos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero INT NOT NULL,
    titulo VARCHAR(255),
    manga_id INT,
    fecha_publicacion DATE,
    FOREIGN KEY (manga_id) REFERENCES Mangas(id)
);

CREATE TABLE MangaAutor (
    manga_id INT,
    autor_id INT,
    PRIMARY KEY (manga_id, autor_id),
    FOREIGN KEY (manga_id) REFERENCES Mangas(id),
    FOREIGN KEY (autor_id) REFERENCES Autores(id)
); 