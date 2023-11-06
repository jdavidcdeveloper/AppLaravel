APLICACIÓN DESARROLLADA EN EL FRAMEWORK LARAVEL DE PHP APLICANDO UN CRUD PARA USUARIOS DE UNA EMPRESA

screenshots/Crear_empleado.png

screenshots/Editar_empleado.png

screenshots/Vista_empleados.png







Instrucciones para correr la aplicación del laravel en otro servidor local


#HERRAMIENTAS

Laravel v10
Bootstrap v5.3
Node.js v21.0.0
XAMPP v8.2.4-0
Composer v2.6.5

#EXTENSIONES
Bootstrap 5 Quick Snippets
Laravel Snippets


#INSTRUCCIONES
1. Ingresar el siguiente comando en la terminal (importante: estar situados en Htdocs):

	composer create-project laravel/appLaravel


2. Crear la base de datos con el nombre "app_laravel"

3. Sincronizar la base de datos con la aplicación dentro del archivo ".env" en visual studio code. Allí debemos canbiar el nombre de la base de datos "DB_DATABASE=app_laravel".

4. Realizar las migraciones en la carpeta "database>migrations" usando el siguiente comando:
	
	cd appLaravel
	php artisan migrate

5. Crear el modelo, el controlador y el recurso de las migraciones con el siguiente comando:

	php artisan make:model Empleado -mcr


6. Actualizar la libreria de Bootstrap de ser necesario

	composer require laravel/ui 

7. Correr la interfaz de Bootstrap para visualizar los elementos por defecto en el front

	npm run dev
	
8. Registrar usuario y contraseña para ingresar a la interfaz principal





	








  