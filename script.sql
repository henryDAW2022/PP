CREATE TABLE `Admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `tlfn` int(9) NOT NULL,
  `fechaNac` date not NULL,
  `status` varchar(20) NOT NULL,
  `login_dt` datetime NOT NULL,
  `baja_dt` datetime NOT NULL,
  `modificado_dt` datetime NOT NULL,
  `creado_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO `Admin`(`id`,`nombre`,`apellidos`,`email`,`pass`,`tlfn`,`fechaNac`,`status`,`login_dt`,`baja_dt`,`modificado_dt`,`creado_dt`)
       VALUES(1, 'Henry', 'Villa Fuerte','admin@email.com', '12345', 684789521, '1990-05-05','activo', '2023-03-20 03:45:52', '', '2023-03-20 03:45:52', '2023-03-20 03:45:52');



CREATE TABLE `Usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `tlfn` int(9) NOT NULL,
  `fechaNac` datetime not NULL,
  `status` varchar(20) NOT NULL,
  `login_dt` datetime NOT NULL,
  `baja_dt` datetime NOT NULL,
  `modificado_dt` datetime NOT NULL,
  `creado_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;


INSERT INTO `Usuario` (`id`,`nombre`,`apellidos`,`email`,`pass`,`tlfn`,`fechaNac`,`status`,`login_dt`,`baja_dt`,`modificado_dt`,`creado_dt`)
       VALUES (1, 'Usuario', 'Primer Usuario','usuario1@email.com', '12345', 675489521, '1992-05-05','activo', '2023-03-21 03:45:52', '', '2023-03-21 03:45:52', '2023-03-21 03:45:52'),
              (2, 'Segundo', 'Segundo Usuario','usuario2@email.com', '12354', 675847952, '1995-01-05','activo', '2023-03-21 04:45:52', '', '2023-03-21 04:45:52', '2023-03-21 04:45:52');




CREATE TABLE `Vehiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `matricula` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `numPlazas` varchar(200) NOT NULL,
  `poliza` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `baja_dt` datetime NOT NULL,
  `creado_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;


INSERT INTO `Vehiculo`(`id`,`matricula`,`marca`,`modelo`,`numPlazas`, `poliza`,`status`, `baja_dt`,`creado_dt`)
       VALUES (1, '123-ABC', 'Ford','Mondeo', '5', 'pol-12345689077','activo', '', '2023-03-21 03:45:52');




CREATE TABLE `Conductor` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `carnetConducir` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `tlfn` int(9) NOT NULL,
  `fechaNac` datetime not NULL,
  `status` tinyint(4) NOT NULL,
  `login_dt` datetime NOT NULL,
  `baja_dt` datetime NOT NULL,
  `modificado_dt` datetime NOT NULL,
  `creado_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;


INSERT INTO `Conductor` (`id`,`nombre`,`apellidos`,`carnetConducir`,`email`,`pass`,`tlfn`,`fechaNac`,`status`,`login_dt`,`baja_dt`,`modificado_dt`,`creado_dt`)
       VALUES (1, 'Conductor', 'Primer Conductor','12345678A','conductor1@email.com', '12543', 675481123, '1992-05-05','activo', '2023-03-21 03:45:52', '', '2023-03-21 03:45:52', '2023-03-21 03:45:52');



CREATE TABLE `Horario` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `idConductor` int(11) NOT NULL,
  `entrada_dt` datetime NOT NULL,
  `salida_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO `Horario` (`id`, `entrada_dt`,`salida_dt`) VALUES (1, '2023-03-21 04:45:52','2023-03-21 12:45:52');




--RESTRICT no deja eliminar al conductor si existe un foreign key
ALTER TABLE `Horario` ADD CONSTRAINT `Conductor_Horario` FOREIGN KEY (`idConductor`) REFERENCES `Conductor`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; 
-- ALTER TABLE `Horario` DROP FOREIGN KEY `Conductor_Horario`; Esto es para eliminar la clave foranea
-- CASCADE eliminará todo lo que este relacionado con el conductor, si este es eliminado. esto no nos interesa.
ALTER TABLE `Horario` ADD CONSTRAINT `Conductor_Horario` FOREIGN KEY (`idConductor`) REFERENCES `Conductor`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--SET NULL, dejara el campo como nulo, y permitira eliminar el usuario.
ALTER TABLE `Horario` ADD CONSTRAINT `Conductor_Horario` FOREIGN KEY (`idConductor`) REFERENCES `Conductor`(`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--NO ACTION, dejara el campo , y permitira eliminar el usuario.
ALTER TABLE `Horario` ADD CONSTRAINT `Conductor_Horario` FOREIGN KEY (`idConductor`) REFERENCES `Conductor`(`id`) ON DELETE NO ACTION ON UPDATE CASCADE;



CREATE TABLE `Trayecto` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `idUsuario` int(11) NOT NULL,
  `idConductor` int(11) NOT NULL,
  `idVehiculo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `fechaInicio` datetime NOT NULL,
  `fechaFin` datetime NOT NULL,
  `LatLongInicio` varchar(80) NOT NULL,
  `LatLongFinal` varchar (80) NOT NULL,
  `importe` int(11) NOT NULL,
  `observacion` varchar(200) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

INSERT INTO `Trayecto` (`id`,`idUsuario`,`idConductor`,`idVehiculo`,`fecha`,`fechaInicio`,`fechaFin`,`LatLongInicio`,`LatLongFinal`,`importe`,`Observacion`,`status`)
       VALUES (1, 1, 1,1, '2023-03-21', '2023-03-21 03:45:52', '', '2023-03-21 04:45:52', '37.39954735662718, -5.98982882872291','37.42387134267757, -5.970642642059499',25,'Todo Ok','realizado'),



ALTER TABLE `Trayecto` ADD CONSTRAINT `Trayecto_Conductor` FOREIGN KEY (`idConductor`) REFERENCES `Conductor`(`id`) ON DELETE SET NULL ON UPDATE SET NULL;
ALTER TABLE `Trayecto` ADD CONSTRAINT `Trayecto_Usuario` FOREIGN KEY (`idUsuario`) REFERENCES `Usuario`(`id`) ON DELETE SET NULL ON UPDATE SET NULL;
 ALTER TABLE `Trayecto` ADD CONSTRAINT `Trayecto_Vehiculo` FOREIGN KEY (`idVehiculo`) REFERENCES `Vehiculo`(`id`) ON DELETE SET NULL ON UPDATE SET NULL;


 CREATE TABLE `TotalConductores` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `status` varchar(5) NOT NULL,
  `cant` int(5) NOT NULL
 )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `totalconductores` (`id`, `status`, `cant`) VALUES ('1', 'activo', '2'), ('2', 'baja', '1');