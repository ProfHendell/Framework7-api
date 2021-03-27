# Clonar y preparación del repositorio

Abre el proyecto de tu repositorio clonado dentro de Visual Code y abre una terminal desde `View` -> `Terminal` o con `CTRL + `\`, dentro de ella usa este comando: 

> `git pull https://github.com/ProfHendell/Framework7-api.git main`

Esto se hace para sincronizar los datos con el repositorio principal.

Una ves hecho esto, realiza un `push` a tu repositorio puedes hacerlo desde la misma terminal haciendo uso del comando `git push origin master` o desde la pestaña de cambios en Visual Code.

Localizar la carpeta `"DB 2"`, confirma que tengas la carpeta `Framework7-api`, en caso de no tenerla es posible que este dentro de la carpeta de XAMPP, `C:\xampp\htdocs`, copia la carpeta `vendor/` que esta dentro de `Framework7-api` por ahora cortala en el escritorio (_Es posible que tengas algunos cambios en tus archivos que quieras mantener, si es asi simplemente copia esos archivos a otro lugar_).

Cuando tengas la carpeta `vendor/` en el escritorio puedes **borrar** la carpeta `Framework7-api` que esta dentro de `C:\xampp\htdocs`.

Ahora con el repositorio clonado (_El repositorio personal, el Fork puedes ver mas información [aquí](Instrucciones.md)_) que posiblemente este en la carpeta del escritorio `Repositorios` localiza la carpeta `Framework7-api` y mueve dentro la carpeta `vendor/` que se copio antes, ahora ya podemos mover esta nueva carpeta con el repositorio clonado con la carpeta `vendor/` (_que recordemos `vendor/` es la carpeta que genera composer y que contiene las librerías y las clases de auto-carga_). Dentro de la carpeta `C:\xampp\htdocs`

# TL;DR

- Copiar la carpeta `vendor/` de `Framework7-api` a la carpeta `Framework7-api` del repositorio clonado.
- Borrar esa carpeta y mover la nueva a `C:\xampp\htdocs`