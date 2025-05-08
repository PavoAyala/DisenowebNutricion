# Diseño Web Nutrición

## Descripción
Sistema de gestión de nutrición y recetas saludables desarrollado con Laravel.

## Tecnologías Utilizadas
- **Laravel**: Framework PHP
- **MySQL**: Base de datos relacional
- **Bootstrap**: Framework CSS
- **JavaScript**: Lenguaje de programación del lado del cliente

## Estructura del Proyecto

```
diseñowebnutricion/
├── app/                 # Lógica principal de la aplicación
├── bootstrap/          # Archivos de arranque
├── config/            # Archivos de configuración
├── database/          # Migraciones y seeders
├── public/            # Archivos públicos accesibles
├── resources/         # Vistas, assets y archivos compilados
├── routes/            # Definición de rutas
├── storage/           # Archivos generados por la aplicación
├── tests/             # Pruebas de la aplicación
└── vendor/            # Dependencias de Composer
```

## Modelo Entidad-Relación

### Entidades Principales

1. **Usuario (User)**
   - userID (PK)
   - name
   - email
   - password
   - role
   - age
   - gender
   - weight
   - height
   - activity_level
   - created_at
   - updated_at

2. **Receta (Recipe)**
   - id (PK)
   - recipename
   - descripcion
   - ingredients
   - instructions
   - calories
   - protein
   - carbs
   - fats
   - category
   - image_url
   - userID (FK)
   - created_at
   - updated_at

3. **Ticket**
   - id (PK)
   - userID (FK)
   - title
   - description
   - status
   - created_at
   - updated_at

4. **Orden (Order)**
   - id (PK)
   - userID (FK)
   - plan_type
   - requirements
   - status
   - price
   - delivery_photo
   - route_photo
   - delivered_at
   - cancelled_at
   - created_at
   - updated_at

### Relaciones Principales

1. **Usuario - Receta**
   - Un usuario puede crear muchas recetas (1:N)
   - Una receta pertenece a un usuario (N:1)

2. **Usuario - Ticket**
   - Un usuario puede crear muchos tickets (1:N)
   - Un ticket pertenece a un usuario (N:1)

3. **Usuario - Orden**
   - Un usuario puede hacer muchas órdenes (1:N)
   - Una orden pertenece a un usuario (N:1)

### Diagrama de Relaciones

```
+---------------+       +----------------+       +----------------+
|    Usuario    |       |    Receta     |       |    Ticket     |
+---------------+       +----------------+       +----------------+
| userID (PK)   |       | id (PK)       |       | id (PK)       |
| name          |       | recipename    |       | userID (FK)   |
| email         |       | descripcion   |       | title         |
| password      |       | ingredients   |       | description   |
| role          |       | instructions  |       | status        |
| age           |       | calories      |       | created_at    |
| gender        |       | protein       |       | updated_at    |
| weight        |       | carbs         |       +----------------+
| height        |       | fats          |
| activity_level|       | category      |
| created_at    |       | image_url     |
| updated_at    |       | userID (FK)   |
+---------------+       | created_at    |
        |               | updated_at    |
        |               +----------------+
        |                      |
        v                      v
+---------------+       +----------------+
|    Orden     |       |    Ticket     |
+---------------+       +----------------+
| id (PK)      |       | id (PK)       |
| userID (FK)  |       | userID (FK)   |
| plan_type    |       | title         |
| requirements |       | description   |
| status       |       | status        |
| price        |       | created_at    |
| delivery_photo|      | updated_at    |
| route_photo  |       +----------------+
| delivered_at |
| cancelled_at |
| created_at   |
| updated_at   |
+---------------+
```

## Funcionalidades Principales

1. **Gestión de Usuarios**
   - Registro y autenticación
   - Perfiles de usuario
   - Roles de administrador y usuario normal

2. **Gestión de Recetas**
   - Creación y edición de recetas
   - Visualización de recetas
   - Categorización de recetas
   - Información nutricional detallada

3. **Sistema de Tickets**
   - Creación de solicitudes
   - Seguimiento de estado
   - Gestión por administradores

4. **Gestión de Órdenes**
   - Creación de órdenes
   - Seguimiento de estado
   - Gestión de entregas
   - Historial de órdenes

## Instalación

1. Clonar el repositorio
```bash
git clone [URL_DEL_REPOSITORIO]
```

2. Instalar dependencias de PHP
```bash
composer install
```

3. Instalar dependencias de Node.js
```bash
npm install
```

4. Configurar el archivo .env
```bash
cp .env.example .env
php artisan key:generate
```

5. Configurar la base de datos en .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=disenowebnutricion
DB_USERNAME=root
DB_PASSWORD=
```

6. Ejecutar migraciones y seeders
```bash
php artisan migrate
php artisan db:seed
```

7. Iniciar el servidor de desarrollo
```bash
php artisan serve
```

## Contribución
1. Fork el proyecto
2. Crear una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abrir un Pull Request

## Licencia
Este proyecto está bajo la Licencia MIT - ver el archivo [LICENSE.md](LICENSE.md) para más detalles.
