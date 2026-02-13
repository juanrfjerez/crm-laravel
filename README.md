## CRM en Laravel – Segunda Entrega

### Descripción del proyecto
En esta fase se amplía la funcionalidad creada en la primera entrega, añadiendo:
- DataTables en los listados
- Paginación con Laravel
- Subida de imágenes (Productos)
- Subida y gestión de archivos PDF (Productos)
- Sistema de roles (Admin y Usuario)
- Control de permisos en vistas
- CRUD completos de Clientes, Productos, Proveedores, Ventas y Compras

## Funcionalidades añadidas en la Segunda Entrega

### DataTables
- Búsqueda instantánea
- Ordenación
- Mejor visualización de datos

### Paginación con Laravel
Los listados utilizan:
->paginate(10)

### Subida de imágenes

- Guardadas en storage/app/public/productos
- Validación de tamaño y formato
- Vista previa en el listado

### Subida y gestión de PDF

- Guardados en storage/app/public/pdfs
- Validación de tipo y tamaño
- Enlace “Ver PDF” en el listado
- Reemplazo del archivo al editar
- Eliminación del PDF anterior

### Roles y permisos

- Admin: Crear, Editar, Eliminar
- Usuario: Crear, Editar
Control en vistas:
- El botón Eliminar solo aparece para Admin
- Usuarios normales no pueden borrar registros

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

## Estructura de archivos subidos

### Imágenes

- storage/app/public/productos

### PDFs

- storage/app/public/pdfs

## Usuario y contraseña de prueba

- Admin: Admin@gmail.com -- Admin1234
- Usuario: Usuario@gmail.com -- Usuario1234

## Autor

- Juan Ramón Fernández Parra.
- Proyecto académico – Segunda Entrega CRM en Laravel.
