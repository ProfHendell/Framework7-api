# Instrucciones/funcionalidad del proyecto


Este proyecto **Framework7-API** tiene como finalidad proporcionar una via de comunicación entre la base de datos (MySQL-PHP).


Las clases principales son: (Estas están ubicadas en la carpeta `src/Database` del proyecto, las cuales son accesibles desde el `namespace` ubicado en `Bulk/Database`)


- `Database.php` Contiene las funciones principales de consultas SQL, ademas de encapsular los demás objetos necesarios para la conexión al servidor MySQL (Configuración por ejemplo).

- `DatabaseConnection.php` Contienen los métodos que permiten la conexión PDO es la encargada de realizar la conexión usando los parámetros de la clase `DatabaseConfig.php`

- `DatabaseConfig.php` Esta clase contiene los parámetros usados para la conexión PDO de PHP, por defecto al crear una instancia se crea con los siguientes valores (Puede ser cambiada usando el constructor o los métodos `setter`.)

---
| Campo           | Valor            | 
| --------------- |:----------------:|
| **protocol**    | `mysql`          |
| **server**      | `127.0.0.1`      |
| **username**    | `root`           |
| **password**    |                  |
| **database**    | `framework7_api` |
---

# Tecnologías usadas

- **Composer**: Es un gestor de dependencias para PHP
Mas información: [Que es composer?](https://academy.leewayweb.com/que-es-composer/)

Básicamente es el encargado de gestionar las librerías del proyecto, aunque en este caso no se incluye ninguna, otra funcionalidad es que gestiona nuestros `namespace` 


[Mas información sobre los namespace](https://www.php.net/manual/es/language.namespaces.rationale.php)


# Empezando con el proyecto

Lo ideal antes de empezar a clonar y editar el proyecto es, crear una copia personal para que podamos realizar cambios sin preocuparnos de molestar la integridad del proyecto base o el de los demás.


> Desde nuestra de Github vamos a realizar un Fork del repositorio.

### Requisitos

- Tener una cuenta de Github activa (Puede ser personal o académica) e iniciar session en ella, puedes hacerlo desde aquí: [Github](https://github.com/login)

- Instalar Visual Studio Code [Descargar Visual Code](https://code.visualstudio.com/download)

- Instalar XAMPP [Descargar XAMPP](https://www.apachefriends.org/es/download.html)

- Instalar Git [Descargar Git](https://git-scm.com/downloads)

- (_Opcional_) Instalar HeidiSQL [Descargar HeidiSQL](https://www.heidisql.com/download.php)


# Fork
Una ves instalado todos nuestros programas nos dirigimos a la url del repositorio en este caso:

> `https://github.com/ProfHendell/Framework7-api`


_Buscaremos el botón que dice **Fork** en la esquina superior derecha_

Esto nos creara una copia del repositorio en el estado actual, nota que ahora la url del repositorio no es `https://github.com/ProfHendell/Framework7-api` si no, `https://github.com/**<usuario>**/Framework7-api`; es importante que tengas el usuario en el url, en caso contrario repite los pasos y comprueba que en la parte inferior de la pagina de Github veas un mensaje que diga `forked from ProfHendell/Framework7-api`


# Clonar el repositorio

_Para realizar un **clone** del repositorio es necesario tener instalado Git, si no lo haces el proceso no se podrá completar._

Identifica la url de tu repositorio por ejemplo si la url principal es:

> `https://github.com/ProfHendell/Framework7-api`

La url a clonar seria (con mi usuario, en este caso **NT5**):
> `https://github.com/NT5/Framework7-api`

En nuestro repositorio veremos un botón de color verde con el texto `Code`, damos click en el, nos aparecen las opciones de clonar mediante `https`, `SSH` o `Github CLI`; en este caso clonaremos mediante `https`; simplemente hacemos click en el botón con el icono de portapapeles al lado de la url del repositorio; copiando un url similar a este:

> `https://github.com/NT5/Framework7-api.git`


_Nota el .git del final del url_

Clonar el repositorio en el escritorio:

- Abre una terminal de Windows (`CTRL + R` -> `cmd` -> `Enter`)
- Cambiamos a nuestro escritorio con el comando `cd` _Podemos auto-completar los comandos en la terminal de Windows usando la tecla TAB_
  - `cd Desktop`
  - `mkdir Repositorios`
  - `cd Repositorios`


_Los comandos realizan estas acciones: Primero entramos al escritorio, luego creamos una carpeta nombrada Repositorios, entremos a ella._


- `git clone https://github.com/NT5/Framework7-api.git`

_Esperamos que termine el clonado del repositorio_


Al terminar tendremos una carpeta llamada `Framework7-api` dentro de la carpeta `Repositorios` ubicada en el escritorio. 


# Instalar composer


> _El objetivo de este paso es crear la carpeta `vendor/` dentro de nuestro proyecto, si ya la tienes puedes omitir este paso._


Es necesario crear las clases de auto-carga `autoload`, el encargado de esto es composer.

- Descargar el `.phar` de composer desde [aquí](https://getcomposer.org/composer-stable.phar)
- Abrir una terminal `php` y entrar a la carpeta del repositorio, en este caso `C:\Users\<usuario>\Desktop\Repositorios\Framework7-api>`
- `php composer-stable.phar install`

Esto generara una carpeta llamada `vendor/` dentro de nuestro proyecto, una ves realizado esto podemos mover la carpeta `Framework7-api` dentro de **XAMPP**.


# Instalar proyecto dentro de XAMPP

Es necesario mover toda la carpeta de `Framework7-api` al directorio de instalación de XAMPP, que por defecto es: `C:\xampp`.


Podemos hacerlo desde el explorador de windows, Desde nuestro escritorio, entramos a `Repositorios`, cortamos la carpeta `Framework7-api` y nos dirigimos al directorio http de xampp ubicado en: `C:\xampp\htdocs`

Recuerda CORTAR toda la carpeta al directorio `htdocs` (comprueba que lleve la carpeta `vendor/` dentro de `Framework7-api`).

Una ves hecho eso podemos iniciar el panel de control de XAMPP, e iniciamos el servidor **Apache**, y el servidor **MySQL**, una ves hecho esto podemos abrir nuestro navegador e ir a la url del proyecto que por defecto seria:

> `http://localhost/Framework7-api`

Esto nos mostrara una lista de los directorios del proyecto; podemos probar dar click en el archivo que dice `api.php`


Es posible que tengamos un error de ejecución debido a que no tenemos instalada la base de datos dentro del servidor MySQL.

# Instalar la base de datos dentro de MySQL

**Recuerda tener iniciado los servicios de `Apache` y `MySQL` dentro del XAMPP.**

Para evitar ese error de ejecución que tenemos al entrar al archivo `api.php` tenemos que crear una base de datos valida que el sistema pueda acceder, por defecto el intenta conectar usando las credenciales y la configuración anterior.

- Primero abrimos el panel de phpMyAdmin, lo podemos hacer desde el mismo panel de control del XAMPP, haciendo click en `Admin` en el apartado de `MySQL`, esto nos abrirá una ventana en nuestro navegador, o podemos ingresar directamente desde `http://localhost/phpmyadmin`


_Por defecto el usuario de phpMyAdmin es `root` sin ninguna contraseña_


- Dentro de phpMyAdmin, en la parte izquierda veremos una lista de las bases de datos que tenemos, hacemos click en **Nueva**, veremos un menu con el texto _Crear base de datos_, escribimos un nombre por ejemplo este proyecto al ser un sistema de asistencia podemos nombrarla de esa manera. `asistencia` y click en **Crear**

- Ademas de crear la base de datos necesitamos indicarle a la conexión que se conecte específicamente a esta base de datos, notaras que por defecto el sistema se intentara conectar a una base de datos llamada `framework7_api`, la cual no existe, para cambiar eso:

  - Abrimos el archivo `src/Database/DatabaseConfig.php`
  - Bajamos a al método constructor `__construct`

```php
    public function __construct($protocol = NULL, $server = NULL, $username = NULL, $password = NULL, $database = NULL) {
        $this->protocol = ($protocol) ?: "mysql";
        $this->server = ($server) ?: "127.0.0.1";
        $this->username = ($username) ?: "root";
        $this->password = ($password) ?: "";
        $this->database = ($database) ?: "framework7_api";
    }
```

Notaras que el apartado `database` esta haciendo referencia a `framework7_api`; lo cambiamos por `asistencia`.

```php
        $this->database = ($database) ?: "asistencia";
```

El resto lo podemos dejar tal como esta.


Ahora regresamos a nuestro navegador en `http://localhost/Framework7-api/api.php`

Una ves realizado esto notaremos solo la información de conexión de la base de datos sin ningún `warning` o `fatal error`.
