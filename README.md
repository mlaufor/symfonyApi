# symfonyApi_kk
Es un proyecto api rest.
Mi  controller  Api  esta  en  App\Controller\Api\UserRestController.php
Uso Dto  para  ingresar datos en formato Json, en el caso de LoginForm, que simula ingreso de login con email y password.
El otro Dto se relaciona con la entidad Usuario y me sirve para ingresar un objeto tipo usuario en el verbo post.
El prefijo de las rutas del controlador Api se configura en  config\routes\api.yaml
En el archivo Usuario.yaml configuro los atributos de la entidad usuario y lo muestra con id,nombre,apellido,email y 
password. 
Los archivos del ejemplo del curso quedaron con extension txt para no interferir en las acciones post, get , delete de mi controlador Api.
Pero los probe y funcionaron cuando clone el repositorio  https://github.com/aventex94/curso_symfony_4
accion  post  http://localhost/symfonyApi_kk/public/index.php/api/user
 
 {   "nombre": "Yamila",
     "apellido":"Zetta",
     "email": "yamil@hotmail.com",
     "password": "222"
}

es la entrada como objeto json para mi accion de crear un usuario nuevo y quedaria:

{
    "id": 18,
    "nombre": "Yamila",
    "apellido": "Zetta",
    "email": "yamil@hotmail.com",
    "password": "222"
}
