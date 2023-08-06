START TRANSACTION;
CREATE DATABASE Reservar_Viajes;
USE Reservar_Viajes;

CREATE TABLE `asientos` (
  `id_asiento` int(11) NOT NULL,
  `id_viaje` int(11) NOT NULL,
  `lugar` varchar(6) NOT NULL,
  `id_reserva` int(11) DEFAULT NULL
);

INSERT INTO `asientos` (`id_asiento`, `id_viaje`, `lugar`, `id_reserva`) VALUES
(81, 19, 'A1', NULL),
(82, 19, 'B1', NULL),
(83, 19, 'C1', NULL),
(84, 19, 'D1', NULL),
(85, 19, 'A2', NULL),
(86, 19, 'B2', NULL),
(87, 19, 'C2', NULL),
(88, 19, 'D2', NULL),
(89, 19, 'A3', NULL),
(90, 19, 'B3', NULL),
(91, 19, 'C3', NULL),
(92, 19, 'D3', NULL),
(93, 19, 'A4', NULL),
(94, 19, 'B4', NULL),
(95, 19, 'C4', NULL),
(96, 19, 'D4', NULL),
(97, 19, 'A5', NULL),
(98, 19, 'B5', NULL),
(99, 19, 'C5', NULL),
(100, 19, 'D5', NULL),
(101, 19, 'A6', NULL),
(102, 19, 'B6', NULL),
(103, 19, 'C6', NULL),
(104, 19, 'D6', NULL),
(105, 19, 'A7', NULL),
(106, 19, 'B7', NULL),
(107, 19, 'C7', NULL),
(108, 19, 'D7', NULL),
(109, 19, 'A8', NULL),
(110, 19, 'B8', NULL),
(111, 19, 'C8', NULL),
(112, 19, 'D8', NULL),
(113, 19, 'A9', NULL),
(114, 19, 'B9', NULL),
(115, 19, 'C9', NULL),
(116, 19, 'D9', NULL),
(117, 19, 'A10', NULL),
(118, 19, 'B10', NULL),
(119, 19, 'C10', NULL),
(120, 19, 'D10', NULL),
(121, 20, 'A1', NULL),
(122, 20, 'B1', NULL),
(123, 20, 'C1', NULL),
(124, 20, 'D1', NULL),
(125, 20, 'A2', NULL),
(126, 20, 'B2', NULL),
(127, 20, 'C2', NULL),
(128, 20, 'D2', NULL),
(129, 20, 'A3', NULL),
(130, 20, 'B3', NULL),
(131, 20, 'C3', NULL),
(132, 20, 'D3', NULL),
(133, 20, 'A4', NULL),
(134, 20, 'B4', NULL),
(135, 20, 'C4', NULL),
(136, 20, 'D4', NULL),
(137, 20, 'A5', NULL),
(138, 20, 'B5', NULL),
(139, 20, 'C5', NULL),
(140, 20, 'D5', NULL),
(141, 20, 'A6', NULL),
(142, 20, 'B6', NULL),
(143, 20, 'C6', NULL),
(144, 20, 'D6', NULL),
(145, 20, 'A7', NULL),
(146, 20, 'B7', NULL),
(147, 20, 'C7', NULL),
(148, 20, 'D7', NULL),
(149, 20, 'A8', NULL),
(150, 20, 'B8', NULL),
(151, 20, 'C8', NULL),
(152, 20, 'D8', NULL),
(153, 20, 'A9', NULL),
(154, 20, 'B9', NULL),
(155, 20, 'C9', NULL),
(156, 20, 'D9', NULL),
(157, 20, 'A10', NULL),
(158, 20, 'B10', NULL),
(159, 20, 'C10', NULL),
(160, 20, 'D10', NULL),
(161, 21, 'A1', NULL),
(162, 21, 'B1', NULL),
(163, 21, 'C1', NULL),
(164, 21, 'D1', NULL),
(165, 21, 'A2', NULL),
(166, 21, 'B2', NULL),
(167, 21, 'C2', NULL),
(168, 21, 'D2', NULL),
(169, 21, 'A3', NULL),
(170, 21, 'B3', NULL),
(171, 21, 'C3', NULL),
(172, 21, 'D3', NULL),
(173, 21, 'A4', NULL),
(174, 21, 'B4', NULL),
(175, 21, 'C4', NULL),
(176, 21, 'D4', NULL),
(177, 21, 'A5', NULL),
(178, 21, 'B5', NULL),
(179, 21, 'C5', NULL),
(180, 21, 'D5', NULL),
(181, 21, 'A6', NULL),
(182, 21, 'B6', NULL),
(183, 21, 'C6', NULL),
(184, 21, 'D6', NULL),
(185, 21, 'A7', NULL),
(186, 21, 'B7', NULL),
(187, 21, 'C7', NULL),
(188, 21, 'D7', NULL),
(189, 21, 'A8', NULL),
(190, 21, 'B8', NULL),
(191, 21, 'C8', NULL),
(192, 21, 'D8', NULL),
(193, 21, 'A9', NULL),
(194, 21, 'B9', NULL),
(195, 21, 'C9', NULL),
(196, 21, 'D9', NULL),
(197, 21, 'A10', NULL),
(198, 21, 'B10', NULL),
(199, 21, 'C10', NULL),
(200, 21, 'D10', NULL);

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
  `precio_total` decimal(10,2) DEFAULT NULL,
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
  `psw` varchar(150) DEFAULT NULL,
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
  `precio` decimal(10,2) DEFAULT NULL,
  `placa` varchar(8) DEFAULT NULL
);

INSERT INTO `viaje` (`id_viaje`, `lugar_origen`, `lugar_destino`, `fecha`, `hora`, `precio`, `placa`) VALUES
(19, 'Riobamba', 'Desierto de Palmira', '2023-09-09', '03:16:00', 13.00, 'ASD-9034'),
(20, 'Riobamba', 'Chimborazo', '2023-08-02', '03:12:00', 12.67, 'DFA-0934'),
(21, 'Riobamba', 'Carihuairazo', '2023-09-08', '10:15:00', 90.15, 'DFG-0905');

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
  MODIFY `id_asiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

ALTER TABLE `viaje`
  MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
COMMIT;