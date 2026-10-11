# City Farmac

[Github](https://github.com/shannon-echegaray-dv/Parcial01_Produccion_Web)

Sitio web desarrollado en PHP y TailwindCSS con un servidor Apache servido con Laragon

## Requisitos

- PHP 8.0 o posterior
- Laragon

## Instalación con Laragon

1. Ubicá el proyecto en `C:\laragon\www\` (o en la carpeta `www` de tu instalación de Laragon).
2. Iniciá Apache desde Laragon.
3. Dependiendo en que carpeta estes ejecutando el proyecto, es posible que tengas que modificar la ruta base del proyecto. Para eso hay que editar el config/app.php y el .htaccess

   config/app.php
   ```php
   $basePath = '<Tu Ruta Aqui>'; // Modificarlo por la ruta en la que corresponda
   ```

   .htaccess
   ```apache
   ErrorDocument 404 /<Tu Ruta Aqui>/404.php
   ```
4. Abrí `http://localhost/<Tu Ruta Aqui>/` en el navegador.
5. Los estilos estan construidos desde TailwindCSS CLI, si se realiza algun cambio y se reconstruir los estilos, desde la carpeta del proyecto ejecutá:

   ```bash
   npm install
   npm run build:css
   ```

   Para recompilar los estilos automáticamente mientras trabajás:

   ```bash
   npm run watch:css
   ```



## Rutas principales

### Sitio público

- `/` — inicio
- `/productos.php` — catálogo
- `/producto.php?id=1` — detalle de producto; cambiá `id` para consultar otro
- `/inicio-sesion.php` — inicio de sesión
- `/registro.php` — registro
- `/contactanos.php` — contacto
- `/404.php` — página de recurso no encontrado

### Panel de administración

- `/admin/inicio.php` — inicio del panel
- `/admin/productos.php` — listado y filtros de productos
- `/admin/categorias.php` — categorías; acepta `?padre=Nombre` para ver subcategorías
- `/admin/marcas.php` — listado de marcas
- `/admin/comentarios.php` — listado de comentarios; admite filtros opcionales `?estado=activos`, `?estado=inactivos` y `?producto=1`
- `/admin/usuarios.php` — listado de usuarios
- `/admin/perfiles.php` — listado de perfiles