# Login de usuario

Es necesario comprobar que las credenciales que estamos mandando sean las correctas para definir si el usuario es valido o no.


Primero creamos un archivo `login.php` dentro de la raíz del proyecto.


Incluimos las librerías de composer

```php
require_once __DIR__ . '/vendor/autoload.php';
```

```php
use Bulk\Database;
$db = new Database();
```

Declaramos nuestra base de datos.

```php
$correo = $_GET['correo'];
$password = $_GET['password'];
```

Creamos las dos variables para comprobar los datos de la base de datos.

```php
$sql = "SELECT * FROM usuarios WHERE correo = :correo";
```

Es buena practica siempre guardar los query en una variable aparte, en este caso estamos pidiendo todos los campos de la tabla usuarios donde el correo sea igual al correo que le enviamos mediante **POST**.


```php
$stmt = $db->prepare_fetch_result($sql, [
    'correo' => $correo
]);
```

Creamos una variable que va contener `false` o un `object` con el resultado del query, hacemos uso de la variable `$db` que contienen los métodos para interactuar con la base de datos, dentro de ella invocamos la función `prepare_fetch_result` que regresara un solo resultado (como es el caso, solo nos interesa un usuario y no una lista de ellos). seguido de un `array` de parámetros, en este caso solo estamos comprobando el correo

```php
$json = [];
```

Para enviar los resultados de la comprobación del query vamos a crear un espacio en memoria/buffer del tipo arreglo que imprimiremos posteriormente con la función `json_encode`

```php
if ($stmt && password_verify($password, $stmt->password)) {
    $json['valid'] = true;
} else {
    $json['valid'] = false;
    $json['error'] = 'Usuario o contraseña incorrecta';
}
```

Se comprueba la variable $stmt que no sea `false` y que la contraseña de la base de datos sea la correcta, si es asi entonces dentro del la variable `$json` vamos a crear dos valores uno llamado `valid` y otro llamado `error` en caso de ser necesario, `valid` sera `true` si la contraseña es correcta y el correo es valido, en caso contrario sera `false`

```php
echo json_encode($json, JSON_PRETTY_PRINT);
```

Al finalizar las comprobaciones tenemos que regresar una salida (mensaje/output), lo realizamos usando el método `echo` con la función `json_encode` como parámetro la variable `$json` y se usa el modificador `JSON_PRETTY_PRINT` para imprimir el json de una manera mas estilizada.

> Ahora podemos ingresar al archivo desde el navegador `http://localhost/Framework7-api/login.php?correo=foo&password=bar`