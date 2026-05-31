# API de Gestión de Tareas
Proyecto desarrollado como parte de una prueba técnica utilizando Laravel 12, PostgreSQL y Laravel Sanctum.

# Objetivo
Desarrollar una API REST que permita a los usuarios registrarse, autenticarse mediante tokens y gestionar sus propias tareas.

# Tecnologías utilizadas
- Laravel 12
- PHP
- PostgreSQL
- Laravel Sanctum
- Composer
- Postman

# Funcionalidades implementadas

## Autenticación
- Registro de usuarios
- Inicio de sesión
- Obtención de usuario autenticado
- Cierre de sesión mediante invalidación de token

## Gestión de tareas
- Crear tarea
- Consultar tareas
- Consultar una tarea específica
- Actualizar tarea
- Eliminar tarea

## Seguridad
* Rutas protegidas mediante Laravel Sanctum.
* Autenticación utilizando Bearer Token.
* Cada usuario únicamente puede acceder a sus propias tareas.

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
5.- Ejecutar migraciones

```bash
php artisan migrate
```
6.- Iniciar servidor

```bash
php artisan serve
```

La API estará disponible en:

```text
http://127.0.0.1:8000
```

## Endpoints principales

## Autenticación

```http
POST /api/register
POST /api/login
GET /api/me
POST /api/logout
```
## Tareas

```http
GET /api/tasks
POST /api/tasks
GET /api/tasks/{id}
PUT /api/tasks/{id}
DELETE /api/tasks/{id}
```

## Autenticación

Los endpoints protegidos requieren enviar el token en el encabezado:

```http
Authorization: Bearer TOKEN
```

## Aprendizajes

Durante el desarrollo del proyecto se trabajó con migraciones, relaciones entre modelos, autenticación mediante tokens, protección de rutas y validaciones utilizando Form Requests.
