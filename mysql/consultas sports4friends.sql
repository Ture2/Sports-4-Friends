
-- EN MYSQL --

-- RESPECTO A LA TABLA USUARIOS --

--------- INSERT ---------

-- CUANDO SE REGISTRA UNA PERSONA Y SE CONVIERTE EN USUARIO: OK
INSERT INTO USUARIOS (NICKNAME, NOMBRE, CORREO, PASSWORD) VALUES ("sofi7", "Sofia", "susanalopez@gmail.com", "ss77");
-- CUANDO SE REGISTRA UNA PERSONA, CON EL MISMO NOMBRE QUE OTRA PERSONA, PERO DISTINTO, NICKNAME, CORREO ELECTRONICO Y CON LA MISMA CONTRASEÑA QUE OTRO USUARIO YA REGISTRADO. OK
INSERT INTO USUARIOS (NICKNAME, NOMBRE, CORREO, PASSWORD) VALUES ("sofi8", "Sofia", "susanaalegria@gmail.com", "ss77");
-- CUANDO SE REGISTA UNA PERSONA CON DISTINTO NOMBRE QUE OTROS USUARIOS, PERO LO HACE CON UNA CUENTA YA REGISTRADA EN LA APP Y DISTINTA CONTRASEÑA. NO OK
INSERT INTO USUARIOS (NICKNAME, NOMBRE, CORREO, PASSWORD) VALUES ("juli9", "Julia", "susanaalegria@gmail.com", "yy44");

/* DA UN ERROR DICIENDO QUE NO SE PUEDE PORQUE LA ENTRADA ESTA DUPLICADA, ES DECIR, QUE YA COMO ESTA REGISTRADO ESE CORREO, NO SE PUEDE UTILIZAR EL MISMO CORREO PARA 
UN DISTINTO USUARIO */

-- REGISTRAR UNA PERSONA SOLO CON UN NOMBRE.OK
INSERT INTO USUARIOS (NICKNAME, NOMBRE,  CORREO, PASSWORD) VALUES ("robert10", "Roberto", "robertoruiz@gmail.com", "2223B");

-- INSERTAR UN USUARIO SIN CONTRASEÑA, DEBERIA NO DEJAR INTRODUCIRLO. NO OK, AL FINAL NO DEJA INTRODUCIRLO
INSERT INTO USUARIOS (NICKNAME, NOMBRE,  CORREO, PASSWORD) VALUES ("marta11", "Marta", "marta4@gmail.com", NULL);

-- INSERTAR UNA PERSONA SIN QUE PONGA NICKNAME. NO OK
INSERT INTO USUARIOS (NICKNAME, NOMBRE,  CORREO, PASSWORD) VALUES (NULL, "Ruben", "rueben4@gmail.com", "DFEFDSD");

-- INSERTAR UN USUARIO SIN QUE PONGA UN NOMBRE O SIN NIGUN APELLIDO. NO OK
INSERT INTO USUARIOS (NICKNAME, NOMBRE,  CORREO, PASSWORD) VALUES ("marcos345", "Marcos", "marcosper@gmail.com", "ASDSDF");

--------- UPDATE -----------

-- CAMBIAR EL NICKNAME DE UN USUARIO. OK
UPDATE USUARIOS
SET NICKNAME = 'sofi7best'
WHERE NICKNAME = 'sofi7';
-- CAMBIAR VARIOS CAMBIOS DEL USUARIO. OK
UPDATE USUARIOS
SET NICKNAME = 'sofi7', CORREO = 'susanafeliz@gmail.com', PASSWORD = 'pp775'
WHERE NICKNAME = 'sofi7best';

--CAMBIAR EL NICKNAME A UNO QUE YA EXISTE, POR EJEMPLO YA EXISTE 'alv1', POR LO TANTO NOS SALDRÍA ERROR. LO MISMO PASARÍA SI QUEREMOS CAMBIARLO A UN CORREO
-- YA EXISTENTE, NO OK.
UPDATE USUARIOS
SET NICKNAME = 'alv1', CORREO = 'susanafelizz@gmail.com', PASSWORD = 'pp776'
WHERE NICKNAME = 'sofi7';

--CAMBIAR EL CAMPO TELEFONO A NULL. ESO SI SE ACEPTA. CON EL RESTO DE CAMPOS DARIA ERROR. EN ESTE CASO OK.
UPDATE USUARIOS
SET NICKNAME = 'sofi7best', CORREO = 'susanafelizz@gmail.com', PASSWORD = 'pp776'
WHERE NICKNAME = 'sofi7';

--OJO, HE COMPROBADO QUE SI MODIFICAMOS EL PASSWORD O/Y CORREO Y LO DEJAMOS A NULL, SE REALIZA LA ACTUALIZACION Y NO DEBERIA.
--HAY QUE AVERGIGUAR POSIBLE FALLO EN LA BBDD O COMO REALIZAR LA ACTUALIZACION PARA QUE NO DEJE HACERLO DESDE PHP. NO SE.
UPDATE USUARIOS
SET NICKNAME = 'sofi7', CORREO = 'susanafelizzz@gmail.com', PASSWORD = NULL
WHERE NICKNAME = 'sofi7best';


-------- DELETE -----------

-- DARSE DE BAJA IKER, POR CONSIGUIENTE TAMBIEN SE ELIMINA EN LA TABLA JUGADORES TODAS LAS DUPLAS DONDE EL PERTENECIA A ALGÚN EQUIPO.
DELETE FROM usuarios WHERE nickname = 'iif4'; 

-------- SELECT -----------

--SABER TODAS LOS USUARIOS Y PASSWORDS CORRESPONDIENTES QUE TENEMOS.PARA LOGIN 
SELECT usuarios.correo, usuarios.password
FROM usuarios;

--SABER TODOS LOS NICKNAMES Y PASSWORDS CORRESPONDIENTES QUE TENEMOS.PARA LOGIN 
SELECT usuarios.nickname, usuarios.password
FROM usuarios;

-- PARA SACAR EL CORREO Y PASSWORD DE UN USUARIO EN CONCRETO
SELECT usuarios.correo, usuarios.password
FROM usuarios
WHERE NICKNAME = 'jvp3';

/*
-- PARA SACAR EL CORREO Y PASSWORD DEL USUARIO QUE HEMOS METIDO EN LOGIN 
SELECT usuarios.correo, usuarios.password
FROM usuarios
WHERE correo = 'jvalma01@ucm.es' AND password = '3333';
*/

-- PARA SABER EL NUMERO DE USUARIOS (TOTAL USUARIOS + ADMIN) QUE TENEMOS EN LA APLICACION WEB
SELECT COUNT(id_usuario) AS num_total FROM usuarios;

-- PARA SABER EL NUMERO DE ADMINISTRADORES QUE TENEMOS EN NUESTRA PAGINA WEB.
SELECT COUNT(id_usuario) AS num_admin FROM usuarios WHERE rol_usuario = 'ADMIN';

-- PARA SABER EL NUMERO DE USUARIOS QUE TENEMOS EN NUESTRA PAGINA WEB.
SELECT COUNT(id_usuario) AS num_user FROM usuarios WHERE rol_usuario = 'USER';

--- OTRAS CONSULTAS ---

-- CONSULTA PARA AVERIGUAR EL NOMBRE DE LOS USUARIOS QUE JUEGAN A UN DEPORTE. POR EJEMPLO AQUI SABER EL NOMBRE DE LOS USUARIOS QUE JUEGAN AL FÚTBOL

SELECT u.NOMBRE
FROM usuarios u
JOIN jugadores j ON u.ID_USUARIO = j.USUARIO
JOIN equipos e ON j.EQUIPO = e.ID_EQUIPO
JOIN deportes d ON e.DEPORTE = d.ID_DEPORTE AND d.NOMBRE_DEPORTE = 'Futbol';

-- CONSULTA PARA AVERIGUAR EL NOMBRE DEL LIDER O LIDERES DE LOS EQUIPOS DE FUTBOL 
SELECT u.NOMBRE
FROM usuarios u
JOIN jugadores j ON u.ID_USUARIO = j.USUARIO
JOIN equipos e ON j.EQUIPO = e.ID_EQUIPO
JOIN deportes d ON e.DEPORTE = d.ID_DEPORTE AND d.NOMBRE_DEPORTE = 'Futbol'
WHERE j.ROL_JUGADOR = TRUE;


-- CONSULTA PARA SABER EL NÚMERO TOTAL DE JUGADORES(USUARIOS) QUE JUEGAN AL FÚTBOL.

SELECT COUNT(U.ID_USUARIO) AS TOTAL_JUGADORES
FROM usuarios u
JOIN jugadores j ON u.ID_USUARIO = j.USUARIO
JOIN equipos e ON j.EQUIPO = e.ID_EQUIPO
JOIN deportes d ON e.DEPORTE = d.ID_DEPORTE AND d.NOMBRE_DEPORTE = 'Futbol';

-- CONSULTA PARA SABER EL NUMERO DE JUGADORES QUE JUEGAN AL BALONCESTO EN EL EQUIPO REAL MADRID

SELECT COUNT(U.ID_USUARIO) AS TOTAL_JUGADORES
FROM usuarios u
JOIN jugadores j ON u.ID_USUARIO = j.USUARIO
JOIN equipos e ON j.EQUIPO = e.ID_EQUIPO
JOIN deportes d ON e.DEPORTE = d.ID_DEPORTE AND d.NOMBRE_DEPORTE = 'Baloncesto' AND e.NOMBRE_EQUIPO = 'REAL MADRID';

-- CONSULTA PARA SABER LOS USUARIOS QUE JUEGAN AL BALONCESTO EN EL EQUIPO REAL MADRID

SELECT u.NOMBRE AS TOTAL_JUGADORES
FROM usuarios u
JOIN jugadores j ON u.ID_USUARIO = j.USUARIO
JOIN equipos e ON j.EQUIPO = e.ID_EQUIPO
JOIN deportes d ON e.DEPORTE = d.ID_DEPORTE AND d.NOMBRE_DEPORTE = 'Baloncesto' AND e.NOMBRE_EQUIPO = 'REAL MADRID';

-- RESPECTO A LA TABLA DEPORTES --

--------- INSERT ---------

-- PARA INSERTAR UN NUEVO DEPORTE --
INSERT INTO `sports4friends`.`deportes` (`NOMBRE_DEPORTE`, `NUMERO_MAXIMO_JUGADORES`, `DURACION_MIN` , `FECHA_CDEPORTE`, `HORA_CDEPORTE` ) VALUES ('HOCKEY', '20', '60' , CURDATE(), CURTIME());

--------- UPDATE -----------

-- PARA ACTUALIZAR EL NUMERO DE JUGADORES MAXIMO EN UN DEPORTE, EN ESTE CASO DE EJEMPLO HEMOS PUESTO EL DEPORTE HOCKEY --
UPDATE `sports4friends`.`deportes` SET `NUMERO_MAXIMO_JUGADORES` = '15' WHERE (`NOMBRE_DEPORTE` = 'HOCKEY');

--------- DELETE -----------

-- BORRAMOS UN DEPORTE EN CONCRETO, EN ESTE CASO EL DEPORTE HOCKEY, AUTOMATICAMENTE SE BORRARÁ TODOS LOS EQUIPOS DE HOCKEY QUE ESTEN EN LA TABLA EQUIPOS 
-- Y A SU VEZ SE BORRARAN TODOS LOS JUGADORES DE LA TABLA JUGADORES QUE PERTENECIAN A ALGUNO EQUIPO DE HOCKEY. 
DELETE FROM `sports4friends`.`deportes` WHERE nombre_deporte = 'HOCKEY'; 


-------- SELECT -----------

--PARA SABER EL NUMERO DE DEPORTES QUE TENEMOS --
SELECT COUNT(d.nombre_deporte) AS NUM_DEPOR
FROM deportes d;

--PARA SABER EL NUMERO DE DEPORTES QUE TENEMOS CON UNA DURACION SUPERIOR A 40 MINUTOS --
SELECT COUNT(d.nombre_deporte) AS NUM_DEPOR
FROM deportes d
WHERE d.DURACION_MIN > 40;

--PARA SABER EL NUMERO DE DEPORTES QUE PODEMOS TENER MAS DE 10 JUGADORES POR PLANTILLA --
SELECT COUNT(d.nombre_deporte) AS NUM_DEPOR
FROM deportes d
WHERE d.NUMERO_MAXIMO_JUGADORES > 10;

-- RESPECTO A LA TABLA EQUIPOS --

--------- INSERT ---------

--Insertar un nuevo equipo en la tabla equipos.OK
INSERT INTO `sports4friends`.`equipos` (`DEPORTE`, `NOMBRE_EQUIPO`, `FECHA_CEQUIPO`, `HORA_CEQUIPO`, `DESCRIPCION_EQUIPO`) VALUES ('880001', 'VALENCIA', CURDATE(), CURTIME(), 'Somos un equipo de hockey');

--Insertar un nuevo equipo en la tabla equipos con el mismo nombre que un equipo ya creado, aunque sea de diferente deporte, dara ERROR.NO OK
INSERT INTO `sports4friends`.`equipos` (`DEPORTE`, `NOMBRE_EQUIPO`, `FECHA_CEQUIPO`, `HORA_CEQUIPO`, `DESCRIPCION_EQUIPO`) VALUES ('880004', 'VALENCIA', CURDATE(), CURTIME(), 'Somos un equipo de hockey');


--------- UPDATE -----------

-- Para actualizar el nombre de un equipo.
UPDATE `sports4friends`.`equipos` SET `nombre_equipo` = 'BARCELONA' WHERE (`ID_EQUIPO` = '550001');

-------- DELETE -----------

-- Cuando borramos un equipo de la tabla equipos, automaticame se borrara de la tabla jugadores, todos los jugadores que pertenecian a ese equipo.
DELETE FROM equipos WHERE nombre_equipo = 'REAL MADRID'; 

-------- SELECT -----------

-- PARA SABER EL NUMERO DE EQUIPOS QUE HAY DE FUTBOL.
SELECT COUNT(e.deporte) AS NUM_EQUIP_DEP
FROM equipos e
JOIN deportes d ON e.deporte = d.id_deporte
WHERE d.nombre_deporte ='Futbol'
GROUP BY e.deporte;


-- RESPECTO A LA TABLA JUGADORES --


--------- INSERT ---------

--Insertar mas duplas en la tabla jugadores
INSERT INTO `sports4friends`.`jugadores` (`EQUIPO`, `USUARIO`, `ROL_JUGADOR` , `FECHA_PJUGADOR`, `HORA_PJUGADOR`) VALUES ('550001', '7', FALSE, CURDATE(), CURTIME());
INSERT INTO `sports4friends`.`jugadores` (`EQUIPO`, `USUARIO`, `ROL_JUGADOR` , `FECHA_PJUGADOR`, `HORA_PJUGADOR`) VALUES ('550001', '8', FALSE, CURDATE(), CURTIME());
INSERT INTO `sports4friends`.`jugadores` (`EQUIPO`, `USUARIO`, `ROL_JUGADOR` , `FECHA_PJUGADOR`, `HORA_PJUGADOR`) VALUES ('550001', '9', FALSE, CURDATE(), CURTIME());
INSERT INTO `sports4friends`.`jugadores` (`EQUIPO`, `USUARIO`, `ROL_JUGADOR` , `FECHA_PJUGADOR`, `HORA_PJUGADOR`) VALUES ('550002', '10', FALSE, CURDATE(), CURTIME());
INSERT INTO `sports4friends`.`jugadores` (`EQUIPO`, `USUARIO`, `ROL_JUGADOR` , `FECHA_PJUGADOR`, `HORA_PJUGADOR`) VALUES ('550002', '11', FALSE, CURDATE(), CURTIME());
INSERT INTO `sports4friends`.`jugadores` (`EQUIPO`, `USUARIO`, `ROL_JUGADOR` , `FECHA_PJUGADOR`, `HORA_PJUGADOR`) VALUES ('550002', '12', FALSE, CURDATE(), CURTIME());
INSERT INTO `sports4friends`.`jugadores` (`EQUIPO`, `USUARIO`, `ROL_JUGADOR` , `FECHA_PJUGADOR`, `HORA_PJUGADOR`) VALUES ('550002', '13', FALSE, CURDATE(), CURTIME());
INSERT INTO `sports4friends`.`jugadores` (`EQUIPO`, `USUARIO`, `ROL_JUGADOR` , `FECHA_PJUGADOR`, `HORA_PJUGADOR`) VALUES ('550003', '14', FALSE, CURDATE(), CURTIME());
INSERT INTO `sports4friends`.`jugadores` (`EQUIPO`, `USUARIO`, `ROL_JUGADOR` , `FECHA_PJUGADOR`, `HORA_PJUGADOR`) VALUES ('550003', '15', FALSE, CURDATE(), CURTIME());
INSERT INTO `sports4friends`.`jugadores` (`EQUIPO`, `USUARIO`, `ROL_JUGADOR` , `FECHA_PJUGADOR`, `HORA_PJUGADOR`) VALUES ('550003', '16', FALSE, CURDATE(), CURTIME());
INSERT INTO `sports4friends`.`jugadores` (`EQUIPO`, `USUARIO`, `ROL_JUGADOR` , `FECHA_PJUGADOR`, `HORA_PJUGADOR`) VALUES ('550003', '17', FALSE, CURDATE(), CURTIME());


-------- SELECT -----------

-- ver numero de integrantes de un equipo.

SELECT equipo, count(*) AS integrantes_equipo
FROM sports4friends.jugadores 
WHERE equipo = 550001
GROUP BY equipo;

--lista los usuario de un equipo y relacionarlo con la tabla usuarios

SELECT usuario FROM 
sports4friends.jugadores 
WHERE equipo = 550001;

SELECT nickname FROM
sports4friends.usuarios u, sports4friends.jugadores j 
WHERE
u.id_usuario = j.usuario 
AND j.equipo = 550001;

--esto es estrapolable para mostar nombre , correo .. lo que queramos 
--en la sentencia select

--mostrar el administrador del equipo
--para ponerle mas enfasis o lo que queramos

SELECT nickname FROM
sports4friends.usuarios u, sports4friends.jugadores j 
WHERE
u.id_usuario = j.usuario 
AND j.equipo = 550001
AND j.rol_jugador = 1;


--implementacin de borra un equipo y solo el admin puede hacerlo
--problemas a la hora de implementarlo (una hora pensado)
/*

el admin se puede ir, pero antes de  hacerlo que deje a otro usuario
como admin.
*/

SELECT nickname FROM
sports4friends.usuarios u, sports4friends.jugadores j 
WHERE
u.id_usuario = j.usuario 
AND j.equipo = 550001;

--al seleccionar uno 

SELECT id_usuario FROM usuarios WHERE nickname = 'el que sea';

--consultas para ver esto de forma mas ordeanas
--y utilizamos la agrupacion (group by, count) y join on para relacionar
--tablas 

--------- UPDATE -----------

-- Para que se ponga administrador quien ha creado el equipo.
UPDATE `sports4friends`.`jugadores` SET `ROL_JUGADOR` = '1' WHERE (`ID_JUGADOR` = '330001');
UPDATE `sports4friends`.`jugadores` SET `ROL_JUGADOR` = '1' WHERE (`ID_JUGADOR` = '330003');
UPDATE `sports4friends`.`jugadores` SET `ROL_JUGADOR` = '1' WHERE (`ID_JUGADOR` = '330005');

--quedarnos con el id y actualizar

UPDATE sports4friends.jugadores SET ROL_JUGADOR = 1
WHERE usuario = 2 AND equipo = 1001 ;

-------- DELETE -----------

--y eliminar al ex admin con una select anidada
--me comprueba que el count de admin_team en un equipo 1001 por ejemplo
--sea mayor estrictamente que 1 si es asi se elimina

DELETE FROM sports4friends.jugadores ...

