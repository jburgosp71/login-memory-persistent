# login-memory-persistent

***         
Ejercicio principal: El objetivo de la prueba es desarrollar una aplicación en PHP, sin UI, capaz de solucionar el problema usando persistencia en memoria.         

Desarrolla un sistema tolerante a errores responsable de comprobar el login y password de una lista usuarios con las siguientes condiciones:         
- Devuelva si un usuario existe en el sistema o no.         
- Devuelve si el usuario/password coinciden o no.         

 Añade la cobertura de tests que consideres necesaria para validar el funcionamiento de la aplicación.         

Ejercicio bonus: El objetivo de la prueba es desarrollar sólo el juego de tests (unitarios, funcionales o aceptación), sin implementación, con la idea de que un/a tercer/a desarrollador/a pudiera implementar la solución sólo leyendo los tests.         

En el sistema anterior, añade un nuevo caso de uso:         

- Si el usuario/password es correcto, cambiar la password sólo de su mismo usuario (utilizando el mecanismo de autenticación que considere oportuno).         
***    

- La aplicación se ha desarrollado con la premisa de no tener UI por lo que todas las funcionalidades se comprueban mediante los test unitarios y de integración.

- La persistencia en memoria se ha creado a través de un repositorio que genera un array asociativo con usuario y password.

- En el repositorio se gestiona una entidad de dominio User, compuesta de dos ValueObjects, Username y Password. Cada uno de ellos engloban carácterísticas particulares, por ejemplo a la hora de crear el password se genera un hash automaticamente para ser persistido. O a la hora de
almacenar el username nos aseguramos que lo haga siempre en minúsculas. No obstante me hubiera gustado poder crear ValueObjects genéricos (primitivos) de los cuales extender. También quedaría pendiente las reglas de negocio a aplicar, como la longitud mínima y máxima
de dichos objetos, o que carácteres son aceptados, por poner algún ejemplo.

- La parte de Aplicación tiene dos casos de uso para poder crear usuarios (comprobando la no duplicidad de los mismos) y el de comprobar el login, es en este último donde se realizan las dos comprobaciones que se pide en el enunciado, de la siguiente manera:
      * se comprueba la existencia del usuario, si no existe se devuelve la excepción de unavailableUser, si existe 
      * se comprueba que el password introducido corresponda con el usuario, de no ser así salta la excepcion de ErrorLoginException
      
- Se han realizado la mayoría de test unitarios como para poder quitar el código y en base a estos desarrollar las funcionalidades necesarias para que el sistema funcione. 

Pendiente, el caso de uso para cambiar el password (UserUpdateRepository), mejorar la implementación de los valueObjects y sus tests, y seguro que más cosas que siempre se pueden mejorar ...
