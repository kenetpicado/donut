# donut
![Backend](https://img.shields.io/badge/Backend-blue)

Este proyecto, se encarga de realizar el scraping de la página de [consulta de notas de la UNAN-Leon](https://portalestudiantes.unanleon.edu.ni/consulta_estudiantes.php). Utilizando las credenciales del estudiante, el backend realiza una solicitud al sitio oficial y extrae los datos relevantes de la respuesta recibida. Luego, se formatea y estructura esta información para generar un JSON que contiene los datos de manera organizada y fácilmente procesable.

La versatilidad de **donut** permite que el backend pueda ser utilizado en diferentes proyectos de frontend, como Vue.js o aplicaciones Android y asi mostrar las calificaciones de los estudiantes de una manera más conveniente y personalizada.

#### Ejemplo


## 🚀 Instalación

Sigue estos pasos para instalar y ejecutar el proyecto en tu máquina local:

1. Clona este repositorio: `git clone https://github.com/kenetpicado/donut.git`
2. Ve al directorio del proyecto: `cd donut`
3. Ejecuta: `composer install`

## ⚙️ Configuración
- Crea el archivo `.env` con el contenido de `.env.example`
- Ejecuta `php artisan key:generate`

De ser necesario establece los permisos para `storage/` y `bootstrap/`

## 📦 Uso

- Inicia la aplicación en modo de desarrollo: `php artisan serve`

## 🛠️ Construido con

El proyecto ha sido construido utilizando las siguientes tecnologías y herramientas:

- [Laravel 💜](https://laravel.com/): Framework de desarrollo web de PHP que proporciona una estructura sólida y elegante para la construcción de aplicaciones web.
- [Composer 🎵](https://getcomposer.org/): Administrador de paquetes para PHP que se utiliza para administrar las dependencias del proyecto y facilitar la incorporación de bibliotecas de terceros.

Estas tecnologías han sido utilizadas en conjunto para desarrollar y dar vida al proyecto, aprovechando sus características y ventajas para lograr una aplicación web robusta, escalable y de alto rendimiento.


## 🤝 Contribución

¡Las contribuciones son bienvenidas! Para contribuir al proyecto, sigue estos pasos:

1. Haz un fork del repositorio.
2. Crea una nueva rama: `git checkout -b feature/nueva-funcionalidad`
3. Realiza los cambios y haz commit: `git commit -am 'Agrega una nueva funcionalidad'`
4. Haz push a la rama: `git push origin feature/nueva-funcionalidad`
5. Envía un Pull Request.

## 👥 Autores
- [Kenet Picado](https://github.com/kenetpicado)

## 📋 Licencia

Este proyecto se encuentra bajo la [Licencia MIT](https://opensource.org/licenses/MIT).

