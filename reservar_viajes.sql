CREATE DATABASE reservar_viajes;
USE reservar_viajes;
/* --------------------------------------------------------

Estructura de tabla para la tabla `cargo`

*/

CREATE TABLE `cargo` (
  `ID` int(11) NOT NULL PRIMARY KEY,
  `Descripcion` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `cargo` (`ID`, `Descripcion`)
VALUES (1, 'Admin'),(2, 'User');

CREATE TABLE `transporte` (
  	`placa` varchar(8) PRIMARY KEY,
  	`nombre_responsable` varchar(20) DEFAULT NULL
);

INSERT INTO `transporte` (`placa`, `nombre_responsable`)
VALUES ('ASD-9034', 'Fernando'), ('DFA-0934', 'LORE'), ('DFG-0905', 'Ariel'),
	   ('FDJ-9034', 'Alejandro'), ('IOR-9043', 'Ricardo'), ('JKL-9034', 'Daniel');

CREATE TABLE `usuario` (
  `cedula` char(10) NOT NULL PRIMARY KEY,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `psw` varchar(1000) DEFAULT NULL,
  `telefono` char(10) DEFAULT NULL,
  `ID_CARGO` int(1) DEFAULT NULL,
  foreign key (ID_CARGO) references cargo(ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/* --------------------------------------------------------

Estructura de tabla para la tabla `viaje`

*/

CREATE TABLE `viaje` (
  	`id_viaje` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  	`lugar_origen` varchar(20) DEFAULT NULL,
  	`lugar_destino` varchar(20) DEFAULT NULL,
  	`fecha` date DEFAULT NULL,
  	`hora` time DEFAULT NULL,
 	`precio` decimal(10,2) DEFAULT NULL,
  	`placa` varchar(8) DEFAULT NULL,
    FOREIGN KEY (placa) REFERENCES transporte(placa)
);

INSERT INTO `viaje` (`lugar_origen`, `lugar_destino`, `fecha`, `hora`, `precio`, `placa`)
VALUES ('Riobamba', 'Desierto de Palmira', '2023-09-09', '03:16:00', 13.00, 'ASD-9034'),
       ('Riobamba', 'Chimborazo', '2023-08-02', '03:12:00', 12.67, 'DFA-0934'),
       ('Riobamba', 'Carihuairazo', '2023-08-04', '10:15:00', 45.00, 'DFG-0905');
       
CREATE TABLE `reserva` (
  	`id_reserva` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  	`fecha_reserva` date DEFAULT NULL,
  	`cantidad_adul` int(11) DEFAULT NULL,
  	`cantidad_ni` int(11) DEFAULT NULL,
  	`cedula` char(10) DEFAULT NULL,
  	`precio_total` decimal(10,2) DEFAULT NULL,
  	`id_viaje` int(11) DEFAULT NULL,
  	FOREIGN KEY (id_viaje) REFERENCES viaje(id_viaje),
  	FOREIGN KEY (cedula) REFERENCES usuario(cedula)
);

CREATE TABLE `asientos` (
  `id_asiento` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_viaje` int(11) NOT NULL,
  `lugar` varchar(6) NOT NULL,
  `id_reserva` int(11) DEFAULT NULL,
  foreign key(id_viaje) references viaje(id_viaje),
  foreign key (id_reserva) references reserva(id_reserva)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `asientos` (`id_viaje`, `lugar`, `id_reserva`)VALUES
(1, 'A1', NULL),
(1, 'B1', NULL),
(1, 'C1', NULL),
(1, 'D1', NULL),
(1, 'A2', NULL),
(1, 'B2', NULL),
(1, 'C2', NULL),
(1, 'D2', NULL),
(1, 'A3', NULL),
(1, 'B3', NULL),
(1, 'C3', NULL),
(1, 'D3', NULL),
(1, 'A4', NULL),
(1, 'B4', NULL),
(1, 'C4', NULL),
(1, 'D4', NULL),
(1, 'A5', NULL),
(1, 'B5', NULL),
(1, 'C5', NULL),
(1, 'D5', NULL),
(1, 'A6', NULL),
(1, 'B6', NULL),
(1, 'C6', NULL),
(1, 'D6', NULL),
(1, 'A7', NULL),
(1, 'B7', NULL),
(1, 'C7', NULL),
(1, 'D7', NULL),
(1, 'A8', NULL),
(1, 'B8', NULL),
(1, 'C8', NULL),
(1, 'D8', NULL),
(1, 'A9', NULL),
(1, 'B9', NULL),
(1, 'C9', NULL),
(1, 'D9', NULL),
(1, 'A10', NULL),
(1, 'B10', NULL),
(1, 'C10', NULL),
(1, 'D10', NULL),
(2, 'A1', NULL),
(2, 'B1', NULL),
(2, 'C1', NULL),
(2, 'D1', NULL),
(2, 'A2', NULL),
(2, 'B2', NULL),
(2, 'C2', NULL),
(2, 'D2', NULL),
(2, 'A3', NULL),
(2, 'B3', NULL),
(2, 'C3', NULL),
(2, 'D3', NULL),
(2, 'A4', NULL),
(2, 'B4', NULL),
(2, 'C4', NULL),
(2, 'D4', NULL),
(2, 'A5', NULL),
(2, 'B5', NULL),
(2, 'C5', NULL),
(2, 'D5', NULL),
(2, 'A6', NULL),
(2, 'B6', NULL),
(2, 'C6', NULL),
(2, 'D6', NULL),
(2, 'A7', NULL),
(2, 'B7', NULL),
(2, 'C7', NULL),
(2, 'D7', NULL),
(2, 'A8', NULL),
(2, 'B8', NULL),
(2, 'C8', NULL),
(2, 'D8', NULL),
(2, 'A9', NULL),
(2, 'B9', NULL),
(2, 'C9', NULL),
(2, 'D9', NULL),
(2, 'A10', NULL),
(2, 'B10', NULL),
(2, 'C10', NULL),
(2, 'D10', NULL),
(3, 'A1', NULL),
(3, 'B1', NULL),
(3, 'C1', NULL),
(3, 'D1', NULL),
(3, 'A2', NULL),
(3, 'B2', NULL),
(3, 'C2', NULL),
(3, 'D2', NULL),
(3, 'A3', NULL),
(3, 'B3', NULL),
(3, 'C3', NULL),
(3, 'D3', NULL),
(3, 'A4', NULL),
(3, 'B4', NULL),
(3, 'C4', NULL),
(3, 'D4', NULL),
(3, 'A5', NULL),
(3, 'B5', NULL),
(3, 'C5', NULL),
(3, 'D5', NULL),
(3, 'A6', NULL),
(3, 'B6', NULL),
(3, 'C6', NULL),
(3, 'D6', NULL),
(3, 'A7', NULL),
(3, 'B7', NULL),
(3, 'C7', NULL),
(3, 'D7', NULL),
(3, 'A8', NULL),
(3, 'B8', NULL),
(3, 'C8', NULL),
(3, 'D8', NULL),
(3, 'A9', NULL),
(3, 'B9', NULL),
(3, 'C9', NULL),
(3, 'D9', NULL),
(3, 'A10', NULL),
(3, 'B10', NULL),
(3, 'C10', NULL),
(3, 'D10', NULL);