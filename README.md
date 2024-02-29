
Nombre del Proyecto: Concesionaria Tutankamon

------------------------------------------------------------------------------------------------------------

Persona a cargo de la administracion y programacion del proyecto:  Masson Nicolas
Link de la pagina de inicio: http://proyecto-concesionaria.com/public/home
------------------------------------------------------------------------------------------------------------

Requisitos de desarrolo para la integracion:

WampServer: Version 3.3.0 64 Bits
Visual Studios: 1.84.2

------------------------------------------------------------------------------------------------------------

Tecnologias utilizadas:
PHP: Version 8.2
Apache: Version 2.4.54
MySql: Version 8.0.31

Laravel: Version 10.10
Bootstrap: Version 5.2.3
Jquery: Version 3.7.1
barryvdh/laravel-dompdf (Para la gestion de los informes en PDF) : Version 2.0
Spatie/Laravel-medialibrary (Para la gestion de imagenes) : Version 10.0

------------------------------------------------------------------------------------------------------------

Descripcion general:
La pagina web fue creada para la gestion de una concesionaria, realizando las siguientes acciones:


*Vehiculo*
-En la parte de alta se tendra que registrar los siguientes datos (Marca, Tipo de Motor, Modelo, Año, Color, Descripcion, Stock, Precio y/o Imagenes).

-En la modificacion del mismo, tiene los mismos datos que en el alta, el unico cambio se da en la parte de Imagenes teniendo 3 opciones No realizar ningun cambio/Agregar a las imagenes existentes/Borrar todas las imagenes y cargar nuevas.

-En el listado se podra Habilitar y Deshabilitar un vehiculo para que pueda ser utilizado o no.


*Marca de Vehiculo*
-En el alta se ingresa solo el nombre a ingresar
-En la modificacion se procede a seleccionar una marca y luego modificar el nombre


*Tipo de Motor de Vehiculo*
-En el alta se ingresa solo el nombre a ingresar
-En la modificacion se procede a seleccionar un tipo de motor y luego modificar el nombre


*Cliente*
-En la parte de alta se tendra que registrar los siguientes datos (Nombre, Apellido, DNI, Email, Telefono, Direccion, Codigo Postal, Ciudad, Provincia).

-En la modificacion del mismo, tiene los mismos datos que en el alta.

-En el listado se podra Habilitar y Deshabilitar un cliente para que pueda ser utilizado o no al momento de realizar un informe o registrar una venta.


*Venta*
-En el listado se podra Anular una venta realizada. Teniendo una tabla mostrando los siguientes datos Id (De la venta), Vehiculo (marca, modelo, año y Id del mismo), Vendedor (Nombre completo, Id del mismo), Cliente (Nombre completo, Id del mismo), Estado, Precio, Fecha Compra, Fecha Actualizacion.


En la parte superior tenemos la barra de navegacion, la cual esta compuesta por los siguientes items y desplegables
-Inicio
-Vehiculo (Listado, Añadir)
-Marca (Listado, Añadir, Modificar)
-Tipo de Motor (Listado, Añadir, Modificar)
-Cliente (Listado, Añadir)
-Ventas
-Nombre de la persona logeada (Configuracion [Se podra actualizar la clave de inicio de session y tambien podes cambiar la contraseña] , Salir)

------------------------------------------------------------------------------------------------------------

Datos Adicionales:
/Si la persona logeada es el administrador, se añade la parte de Alta/Baja/Modificacion/Habilitacion para el personal administrativo.
/Para la vista de la pagina web sin estar logeado, solo se podran ver los vehiculos, fotos y descripcion de los mismos.
/Tanto al estar logeado como cuando no, existe un filtrado de vehiculo por Marcas y/o Tipo de Motor.
/Si un vehiculo o cliente quiere ser eliminado, no debe estar relacion con ninguna venta, caso contrario, solo se podra Deshabiltiar el mismo para que no pueda ser usado en el sistema.


Clave de ingreso del administrador: Admin
Contraseña: 123

claves de prueba:

pruebaAdmin - 123
pruebaGerente - 123
pruebaVendedor - 123

------------------------------------------------------------------------------------------------------------

Estado del proyecto: Terminado

------------------------------------------------------------------------------------------------------------

Registro de actividad:

17/11/23 
acomodar el tamaño de la imagen al inicio
redireccionar al hacer click en "ver mas imagenes"

21/11/23
mostrar todas las imagenes en miniatura

25/11/23
al hacer click cambiar de imagen

27/11/23
maquetado de las iamgenes

29/11/23
Verificado qeu las imagenes con espacio las toma de igual manera

30/11/23
actualizar mas fotos
testeo de borrado de 1 sola foto

1/12/23
poner la opcion de agregar 1 o mas fotos en el update

3/12/23
Testeado el eliminar las carpetas de las fotos cargadas al eliminar la foto
Testeado el eliminar las carpetas de las fotos al eliminar un vehiculo

4/12/23
se agrego item para seleccionar configuracion de usuario
Testeo de modificacion de usuario

6/12/23
Se creo y modifico Tipo de Motor
Se creo y modifico Marca
Se testeo guardado y modificacion de Tipo de Motor
Se testeo guardado y modificacion de Marca
cambiar nombre de "laravel" al inicio del proyecto

9/12/23
Creo la vista de venta de Vehiculo
Testeo de venta y descuento en el stock al terminar la misma

12/12/23
Testeo de restriccion de accesibilidad tanto del usuario como del administrador
si no hay stock de vehiculo que no lo muestro al cliente (si para ser editado por si hay que agregar)
registrar la venta de un vehiculo
revisar que al realizar la venta se descuente el stock
separar las paginas de "marca" , "tipo de motor" y "Cliente"

13/12/23
Se crearon las vistas y testeo de la parte de "Marca","Tipo de motor","Clientes"
Se añadio una lista de Clientes y Vehiculos

14/12/23
Se testeo la restriccion de personal logeado a cada pagina
Se añadio el estado de Habilitar y Deshabilitar tanto a un vehiculo como un usuario

15/12/23
Se añadio una lista de Ventas
Se testeo la eliminacion de una venta y la actualizacion del stock

19/12/23
Se testeo la validacion de campos
Se agrego un buscado por Marca y/o Tipo de Motor

22/12/23
Se agrego reportes para Clientes, Vehiculos y Ventas

23/12/23
Se agrego la opcion que el administrador pueda cambiar la contraseña

25/12/23
Se restringio la parte de Personal Administrativo solamente al Administrador

27/12/23
Se modifico y testeo el cambio de clave de acceso y/o contraseña
Si el personal Administrativo no esta habilitado, no podra ingresar a ninguna solapa dentro del sistema
Proyecto comentado y Codigo organizado
Se agrego la validacion de valores unicos para los campos de las tablas
