# Prueba Técnica - Laravel

Este proyecto corresponde a una prueba técnica para el rol de **Desarrollador PHP Laravel**.

## 📌 Descripción

La aplicación permite gestionar usuarios, incluyendo funcionalidades como:

- Autenticación (login).
- Registro, edición y desactivación de usuarios.
- Control de acceso mediante roles.
- Validación de formularios y estructura modular del frontend.

Desarrollado utilizando **Laravel 10**, Bootstrap y MySQL.

## 🔗 Acceso al sistema en línea

Puedes ver la versión desplegada en el siguiente enlace:

👉 [https://4sides-prueba-tecnica.mateomartinez.dev/seguridad/auth/login](https://4sides-prueba-tecnica.mateomartinez.dev/seguridad/auth/login)

## ⚙️ Tecnologías utilizadas

- PHP 8.2
- Laravel 10
- MySQL
- Bootstrap 5
- jQuery
- Nginx
- Certbot + HTTPS

## 🚀 Instalación local

```bash
git clone https://github.com/CarlosMateoM/4sides-prueba-tecnica.git
cd 4sides-prueba-tecnica
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
