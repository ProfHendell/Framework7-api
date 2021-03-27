# Creación de la tabla de usuario


Todo sistema tiene que tener un sistema de usuarios en este caso es necesario que el sistema sepa identificar los usuarios de alguna manera, el caso mas común es un usuario y una contraseña, (también puede ser mediante un token o mediante verificación de dos pasos).


Antes que nada vamos a crear dentro del archivo `src/sql/tables.sql` la estructura de la tabla usuarios. (Esto es solo para referencias futuras)

```sql
CREATE TABLE IF NOT EXISTS `usuarios` (
	`id_usuario` INT NOT NULL AUTO_INCREMENT,
    `correo` VARCHAR(150) NOT NULL,
    `password` VARCHAR(250) NOT NULL,
    PRIMARY KEY (`id_usuario`)
);
```

En esta tabla almacenaremos los datos de los usuarios, ten en cuenta que esta tabla la expandiremos en el futuro ahora mismo la crearemos de la manera mas básica.


> Este código lo ejecutamos dentro phpMyAdmin `http://localhost/phpmyadmin`

- Ubicar el nombre la base de datos que vamos a realizar la consulta `asistencia`, dar click en la base de datos. click en el botón **SQL**, pegamos el código anterior y damos click en continuar.

Este proceso nos creara nuestra tabla que podremos acceder mediante PHP.

# Crear endpoint para crear usuarios

Los endpoint son las url dentro del servidor que modificaran y enviaran datos a nuestra aplicación, en esta ocasión vamos a crear el endpoint para la creación de usuarios, la funcionalidad de ella sera:

> Ingresar un usuario y una contraseña encriptada dentro de la tabla usuarios del sistema, estos campos serán enviados mediante una llamada **POST** (GET para pruebas).

Crear un archivo `crear.php` en la raíz de nuestro proyecto.


```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

```

Iniciamos la syntax PHP, y incluimos la auto-carga generada por composer que nos permitirá el uso de los componentes dentro del proyecto.


```php
use Bulk\Database;

$db = new Database();
```

Incluimos la clase `Database` dentro del archivo.
Ademas generamos una variable de nombre `$db` con una instancia de `Database` (La configuración ya viene definida de las clases anteriores del sistema)

```php
$correo = $_GET['correo'];
$password = $_GET['password'];
```

Declaramos las dos variables que usaremos para guardar los datos de la tabla, en este caso al ser una prueba usamos llamadas `GET`, pero posteriormente se cambiaran a llamadas `POST`.

```php
if ($correo && $password) {
    $sql = "INSERT INTO usuarios (correo, password) VALUES (:correo, :password)";
    $stmt = $db->prepare_execute($sql, [
        'correo' => $correo,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);
    $json = [];
    if ($stmt) {
        $json['ingreso'] =  true;
    } else {
        $json['ingreso'] = false;
    }
    echo json_encode($json);
} else {
    $json = [];
    $json['error'] = 'No se encontraron las variables';
    echo json_encode($json);
}
```


Se comprueba que las variables tengan datos para realizar el `query sql`. al ser correcto entonces se llama la función `prepare_execute` de la base de datos, esta función necesita un código SQL y unos parámetros en formato de arreglo para ejecutarse, al terminar la función esta regresa verdadero si fue correcta o falso si falla.


Ya podemos ingresar a nuestro archivo `crear.php` con la siguiente url codificada.

> `http://localhost/Framework7-api/crear.php?correo=hendelporras@hotmail.com&password=foo`

Notaras que la url esta codificada de la siguiente manera:

- El archivo en este caso `crear.php`
- El signo de `?` para indicar que vamos a escribir parámetro.
- El nombre los parámetros `nombre` igualado a un valor `=` en este caso `hendelporras@hotmail.com` y la `password` separado por el símbolo `&`, en caso de tener mas parámetros simplemente los separaríamos con el símbolo `&` y siempre teniendo cuidado que el primer símbolo luego del nombre del archivo tiene que ser `?`

> Si todo esta correcto tendríamos que ver que al momento de ingresar al url veremos un json con

```json
{
    "ingreso": true
}
```

Indicando que el valor fue ingresado correctamente.