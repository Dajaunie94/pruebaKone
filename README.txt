1. instalar 
  https://www.apachefriends.org/es/index.html XAMPP
puede instalar la ultima version recomendada 
2. ejecute el XAMPP y active Apache y MYSQL
3. en git descargar la carpeta del proyecto con nombre pruebaKone 
4. luego de descargar acomede la carpeta en la siquiete ruta C:\xampp\htdocs
5. dentro de la carpeta Base datos ecuentra el SQL pruebakone.sql 
este tiene que ejucutarlo en phpMyAdmin creando previamente la base de datos vacia con el mismo nombre
6. ejecutar el programa con esta url 
http://localhost/pruebaKone/index.php

Gracias 

Consultas 
SELECT * FROM producto WHERE stock=(select max(stock) from producto)
SELECT * FROM producto WHERE precio=(select max(precio) from producto)
tambien las encuentras en el modulo de COMPRA 