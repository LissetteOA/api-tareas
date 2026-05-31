# API de Gestión de Tareas
Proyecto desarrollado como parte de una prueba técnica utilizando Laravel 12, PostgreSQL y Laravel Sanctum.

# Objetivo
Desarrollar una API REST que permita a los usuarios registrarse, autenticarse mediante tokens y gestionar sus propias tareas.

# Tecnologías utilizadas
- Laravel 12
- PHP 8+
- PostgreSQL
- Laravel Sanctum
- Composer
- Postman
- Git y GitHub

## Funcionalidades implementadas

# Autenticación
- Registro de usuarios
- Inicio de sesión
- Obtención de usuario autenticado
- Cierre de sesión mediante invalidación de token
- Subida de avatar de usuario

## Gestión de tareas
- Crear tarea
- Consultar tareas
- Consultar una tarea específica
- Actualizar tarea
- Eliminar tarea

## Gestión de etiquetas (Tags)
- Crear etiqueta
- Consultar etiquetas
- Eliminar etiqueta
- Asignar etiquetas a tareas
- Eliminar etiquetas de tareas

## Características adicionales
- Fecha límite para tareas
- Latitud y longitud asociadas a tareas
- Relación muchos a muchos entre tareas y etiquetas
- Seeders para generación de datos de prueba

## Seguridad
- Rutas protegidas mediante Laravel Sanctum.
- Autenticación utilizando Bearer Token.
- Cada usuario únicamente puede acceder a sus propias tareas.
- Validación de datos mediante Form Requests.

## Instalación

1.- Clonar el repositorio
```bash
git clone https://github.com/LissetteOA/api-tareas.git
cd api-tareas
```
2.- Instalar dependencias
```bash
composer install
```
3.- Configurar variables de entorno
Copiar el archivo de ejemplo:
```bash
cp .env.example .env
```
Configurar la conexión a PostgreSQL:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=tareas_db
DB_USERNAME=postgres
DB_PASSWORD=tu_password
```

4.- Generar clave de aplicación

```bash
php artisan key:generate
```

5.- Ejecutar migraciones y seeders

```bash
php artisan migrate
php artisan db:seed
```
6.- Crear enlace para almacenamiento público

```bash
php artisan storage:link
```

7.- Iniciar servidor

```bash
php artisan serve
```

La API estará disponible en:

```text
http://127.0.0.1:8000
```

## Endpoints principales

### Autenticación

```http
POST /api/register
POST /api/login
GET /api/me
POST /api/logout
POST /api/me/avatar
```

### Tareas

```http
GET /api/tasks
POST /api/tasks
GET /api/tasks/{id}
PUT /api/tasks/{id}
DELETE /api/tasks/{id}
```

### Tags

```http
GET /api/tags
POST /api/tags
DELETE /api/tags/{id}

POST /api/tasks/{task}/tags
DELETE /api/tasks/{task}/tags/{tag}
```

## Autenticación mediante token

Los endpoints protegidos requieren enviar el token en el encabezado:

```http
Authorization: Bearer TOKEN
```

## Base de datos

### Relación de entidades
- Un usuario puede tener muchas tareas.
- Una tarea pertenece a un usuario.
- Una tarea puede tener múltiples etiquetas.
- Una etiqueta puede pertenecer a múltiples tareas.

## Seeders
El proyecto incluye seeders para generar datos de prueba:

* Usuario de ejemplo
* Tareas de ejemplo
* Etiquetas de ejemplo

## Colección Postman

La colección utilizada para probar la API se encuentra en:

```text
docs/API_Tareas_Lissette.postman_collection.json
```

## Repositorio

GitHub:

```text
https://github.com/LissetteOA/api-tareas
```

## Aprendizajes

Durante el desarrollo del proyecto se trabajó con:

* Laravel Sanctum para autenticación basada en tokens.
* Relaciones Eloquent (One To Many y Many To Many).
* Migraciones y seeders.
* Validación mediante Form Requests.
* Gestión de archivos para carga de avatar.
* PostgreSQL como motor de base de datos.

