# Actualizar control de usuarios para saber que tipo de usuario es

Actualmente el login y el registro de usuarios solo toma en cuenta el correo y una contraseña ademas de un id, pero no se tiene ninguna manera de saber que tipo de usuario es, para eso es necesario agregar un nuevo campo a la tabla de usuarios al que llamaremos tipo, de la siguiente manera:

Código actual

```sql
CREATE TABLE IF NOT EXISTS `usuarios` (
	`id_usuario` INT NOT NULL AUTO_INCREMENT,
    `correo` VARCHAR(150) NOT NULL,
    `password` VARCHAR(250) NOT NULL,
    PRIMARY KEY (`id_usuario`)
);
```

Nuevo código

```sql
CREATE TABLE IF NOT EXISTS `usuarios` (
	`id_usuario` INT NOT NULL AUTO_INCREMENT,
    `correo` VARCHAR(150) NOT NULL,
    `password` VARCHAR(250) NOT NULL,
    `tipo` VARCHAR(50) NOT NULL DEFAULT 'Pendiente'
    PRIMARY KEY (`id_usuario`)
);
```

Simplemente agregamos una nueva columna a nuestra tabla de usuarios a la que llamaremos tipo en la cual guardaremos una cadena de texto de no mas (espero) de 50 caracteres, esta contendrá los tipos validos que son:

+ Pendiente
+ Profesor
+ Estudiante
+ Administrador

Cada uno de estos "roles" tendrá distintos tipos de permisos dentro del sistema.

# Actualizando endpoints

El archivo `crear.php` quedara igual a como esta actualmente, este cambio no lo afecta; en cambio el archivo `login.php` es necesario hacerle algunos ajustes.

# El `login.php`

Agregar la cabecera correspondiente para el funcionamiento AJAX

```php
header('Access-Control-Allow-Origin: *');
```

Dentro de la respuesta cuando el usuario es correcto veremos este código:

```php
$json['valid'] = true;
```

Agregaremos a la respuesta los datos del usuario

```php
    $json['usuario'] = [
        'id' => $stmt->id_usuario,
        'tipo' => $stmt->tipo,
        'correo' => $stmt->correo
    ];
```

Al realizar una consulta correcta el api no regresaría una respuesta como esta:

```json
{
    "valid": true,
    "usuario": {
        "id": 6,
        "tipo": "Pendiente",
        "correo": "hendelporras@hotmail.com"
    }
}
```

Estos datos ya los podremos guardar dentro de nuestra app para futuros fines.