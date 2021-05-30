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

http://localhost/symfonyApi_kk/public/index.php/api/users

GET

trae

[
    {
        "id": 1,
        "nombre": "Jorge",
        "apellido": "Fornes",
        "email": "abril@hotmail.com",
        "password": "22669613"
    },
    {
        "id": 2,
        "nombre": "Matias",
        "apellido": "Miletich",
        "email": "matiasmiletich.informatica@gmail.com",
        "password": "27858264"
    },
    {
        "id": 3,
        "nombre": "Jorge",
        "apellido": "Ferrero",
        "email": "jorgeferrero@gmail.com",
        "password": "589584"
    },
    {
        "id": 4,
        "nombre": "Francisco",
        "apellido": "Gomez",
        "email": "pancho@hotmail.com",
        "password": "154"
    },
    {
        "id": 5,
        "nombre": "Pablo",
        "apellido": "Asad",
        "email": "Asad@hotmail.com",
        "password": "589154"
    },
    {
        "id": 7,
        "nombre": "Karina",
        "apellido": "Carlos",
        "email": "karicarlos@gmail.com",
        "password": "4569"
    },
    {
        "id": 8,
        "nombre": "Gabriela",
        "apellido": "Nuñez",
        "email": "gaby@gmail.com",
        "password": "4569"
    },
    {
        "id": 10,
        "nombre": "Ignacio",
        "apellido": "Gomez",
        "email": "Nacho@hotmail.com",
        "password": "555"
    },
    {
        "id": 12,
        "nombre": "Ana",
        "apellido": "Sara",
        "email": "ana@hotmail.com",
        "password": "aaa"
    },
    {
        "id": 13,
        "nombre": "Agustina",
        "apellido": "Giacomo",
        "email": "agus@hotmail.com",
        "password": "kkk"
    },
    {
        "id": 15,
        "nombre": "Hugo",
        "apellido": "Serji",
        "email": "hugoser@gmail.com",
        "password": "hhh3"
    },
    {
        "id": 17,
        "nombre": "Flavio",
        "apellido": "Juarez",
        "email": "flavio@hotmail.com",
        "password": "1111"
    },
    {
        "id": 18,
        "nombre": "Yamila",
        "apellido": "Zetta",
        "email": "yamil@hotmail.com",
        "password": "222"
    }
]
