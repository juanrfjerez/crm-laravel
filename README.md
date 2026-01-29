# CRM en Laravel – Primera Entrega

Este proyecto es un **CRM básico desarrollado en Laravel**, creado como parte de la primera entrega del módulo de Desarrollo Web.  
Incluye **5 módulos CRUD completos**, navegación funcional y conexión a base de datos.

## Módulos incluidos

### Clientes (obligatorio)
- Listar
- Crear
- Editar
- Eliminar

### CRUD adicionales
- Productos
- Proveedores
- Ventas
- Compras

Cada módulo incluye:
- Modelo
- Migración
- Controlador
- Rutas
- Vistas Blade (index, create, edit)

## Requisitos para ejecutarlo

- PHP 8 o superior  
- Composer  
- Laravel  
- Servidor local (XAMPP, Laragon, etc.)  
- MySQL  
- Git  

## Pasos básicos de instalación

1. Clonar el repositorio:

   git clone https://github.com/juanrfjerez/crm-laravel.git

2. Entrar en la carpeta del proyecto:

    cd crm-laravel

3. Instalar dependencias:

    composer install

4. Copiar el archivo de entorno:

    cp .env.example .env

5. Generar la clave de la aplicación:

    php artisan key:generate

6. Configurar la base de datos en el archivo .env

7. Ejecutar las migraciones:

    php artisan migrate

8. Iniciar el servidor de desarrollo:

    php artisan serve

## Usuario y contraseña de prueba

- Este proyecto no requiere autenticación, por lo que no es necesario usuario ni contraseña para acceder al CRM.

## Autor

- Juan Ramón
- Proyecto académico – Primera Entrega CRM en Laravel