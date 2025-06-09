# Proyecto Manga (MySQL con PHP)

Este proyecto contiene scripts PHP para la gestión de una base de datos de usuarios de manga, incluyendo la conexión a MySQL y la generación de datos falsos.

## Requisitos

Asegúrate de tener instalado lo siguiente en tu entorno local:

*   **XAMPP** (o cualquier otro servidor web que incluya Apache y MySQL/MariaDB y PHP 8.2+)
*   **PHP 8.2 o superior**
*   **Composer** (gestor de dependencias de PHP)

## Configuración del Proyecto

Sigue estos pasos para configurar el proyecto en tu entorno local:

### 1. Clonar el Repositorio

```bash
git clone <URL_DEL_REPOSITORIO>
cd manga
```

### 2. Configuración de la Base de Datos MySQL

Este proyecto espera una base de datos MySQL con una tabla `usuarios`.

#### a. Crear la Base de Datos

Si no tienes una base de datos, créala en tu servidor MySQL (por ejemplo, a través de phpMyAdmin o la consola MySQL).
**Nombre de la Base de Datos de Ejemplo:** `ProyectoHappy`

#### b. Crear la Tabla de Usuarios

Ejecuta el script SQL `create_users_table.sql` para crear la tabla `usuarios`.

1.  Accede a tu herramienta de gestión de bases de datos (phpMyAdmin).
2.  Selecciona tu base de datos (`ProyectoHappy`).
3.  Ve a la pestaña SQL o "Importar" y pega el contenido de `create_users_table.sql`.
4.  Ejecuta la consulta.

### 3. Instalar Dependencias de PHP (Faker)

El script `generar_usuarios_falsos.php` utiliza la librería `Faker` para generar datos aleatorios. Necesitarás instalarla usando Composer.

1.  Abre tu terminal (PowerShell o CMD).
2.  Navega a la raíz del proyecto (donde se encuentra `composer.json`):
    ```bash
    cd C:\xampp\htdocs\manga
    ```
3.  Ejecuta el siguiente comando para instalar las dependencias:
    ```bash
    composer install
    ```
    Esto creará la carpeta `vendor/` que contiene la librería `Faker`.

### 4. Configurar las Credenciales de la Base de Datos

Los archivos PHP `conexion_mysql.php` y `generar_usuarios_falsos.php` contienen marcadores de posición para las credenciales de la base de datos.

Abre ambos archivos y reemplaza los valores de ejemplo con tus credenciales reales de MySQL:

```php
$servidor = "tu_servidor_mysql_somee.com"; // O "localhost" si es local
$usuario = "tu_usuario_mysql";
$password = "tu_contraseña_mysql";
$nombre_base_datos = "tu_nombre_base_de_datos"; // Ejemplo: "ProyectoHappy"
```

### 5. Probar la Conexión a la Base de Datos

Puedes verificar que la conexión a la base de datos funciona ejecutando el script `conexion_mysql.php`:

```bash
php conexion_mysql.php
```

Deberías ver "Conexión exitosa a MySQL" si todo está configurado correctamente.

### 6. Generar Datos Falsos

Para llenar la tabla `usuarios` con datos de prueba, ejecuta el script `generar_usuarios_falsos.php`:

```bash
php generar_usuarios_falsos.php
```

Este script insertará 3,500 registros falsos en tu tabla `usuarios`.

## Contribuidores

* [Dark14411](https://github.com/Dark14411) - Creador del proyecto
* [TuNombre](https://github.com/TuUsuario) - Mejoras en la documentación y estructura del proyecto

## Mejoras Recientes

* Actualización de la documentación para mejor claridad
* Optimización de la estructura del proyecto
* Mejora en las instrucciones de instalación

## Próximas Características

* Interfaz web para visualizar los registros
* Sistema de búsqueda de usuarios
* Exportación de datos a diferentes formatos

---

**Nota Importante para Somee.com:**

*   Si estás usando Somee.com, asegúrate de que tu base de datos MySQL esté activa y de que uses las credenciales correctas proporcionadas por Somee.
*   En Somee, podrías necesitar un servidor MySQL remoto, no `localhost`. Verifica la información de conexión en tu panel de Somee.com. 