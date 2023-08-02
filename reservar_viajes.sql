CREATE DATABASE Reservar_Viajes;
USE Reservar_Viajes;

CREATE TABLE `asientos` (
  `id_asiento` int(11) NOT NULL,
  `id_viaje` int(11) NOT NULL,
  `lugar` varchar(6) NOT NULL,
  `id_reserva` int(11) DEFAULT NULL
) ;


CREATE TABLE `cargo` (
  `ID` int(11) NOT NULL,
  `Descripcion` varchar(5) DEFAULT NULL
);


INSERT INTO `cargo` (`ID`, `Descripcion`) VALUES
(1, 'Admin'),
(2, 'User');

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `fecha_reserva` date DEFAULT NULL,
  `cantidad_adul` int(11) DEFAULT NULL,
  `cantidad_ni` int(11) DEFAULT NULL,
  `cedula` char(10) DEFAULT NULL,
  `precio_total` float DEFAULT NULL,
  `id_viaje` int(11) DEFAULT NULL
);

CREATE TABLE `transporte` (
  `placa` varchar(8) NOT NULL,
  `nombre_responsable` varchar(20) DEFAULT NULL
);

INSERT INTO `transporte` (`placa`, `nombre_responsable`) VALUES
('ASD-9034', 'Fernando'),
('DFA-0934', 'LORE'),
('DFG-0905', 'Ariel'),
('FDJ-9034', 'Alejandro'),
('HBA-6745', 'FErnando'),
('IOR-9043', 'Ricardo'),
('JKL-9034', 'Daniel'),
('JKL-9067', 'Julio'),
('POR-4356', 'Jesus');

CREATE TABLE `usuario` (
  `cedula` char(10) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `psw` varchar(10) DEFAULT NULL,
  `telefono` char(10) DEFAULT NULL,
  `ID_CARGO` int(11) DEFAULT NULL
);

INSERT INTO `usuario` (`cedula`, `nombre`, `apellido`, `fecha_nacimiento`, `correo`, `psw`, `telefono`, `ID_CARGO`) VALUES
('0850106188', 'Nigell', 'Jama', '2002-01-06', 'nigelljama@gmail.com', 'nigell123', '0992297549', 2),
('9999999999', 'Admin', 'Sistema', '2002-01-06', 'admin@gmail.com', 'admin123', '0999999999', 1);

CREATE TABLE `viaje` (
  `id_viaje` int(11) NOT NULL,
  `lugar_origen` varchar(20) DEFAULT NULL,
  `lugar_destino` varchar(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `placa` varchar(8) DEFAULT NULL
);

ALTER TABLE `asientos`
  ADD PRIMARY KEY (`id_asiento`),
  ADD KEY `asiento_ibfk_1` (`id_viaje`),
  ADD KEY `asiento_ibfk_2` (`id_reserva`);

ALTER TABLE `cargo`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `cedula` (`cedula`),
  ADD KEY `id_viaje` (`id_viaje`);


ALTER TABLE `transporte`
  ADD PRIMARY KEY (`placa`);


ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `ID_CARGO` (`ID_CARGO`);


ALTER TABLE `viaje`
  ADD PRIMARY KEY (`id_viaje`),
  ADD KEY `placa` (`placa`);


ALTER TABLE `asientos`
  MODIFY `id_asiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;


ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

ALTER TABLE `viaje`
  MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

ALTER TABLE `asientos`
  ADD CONSTRAINT `asiento_ibfk_1` FOREIGN KEY (`id_viaje`) REFERENCES `viaje` (`id_viaje`),
  ADD CONSTRAINT `asiento_ibfk_2` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`);

ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `usuario` (`cedula`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_viaje`) REFERENCES `viaje` (`id_viaje`);

ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_CARGO`) REFERENCES `cargo` (`ID`);


ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`placa`) REFERENCES `transporte` (`placa`);