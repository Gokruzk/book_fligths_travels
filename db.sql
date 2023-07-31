CREATE DATABASE Reservar_Viajes;
USE Reservar_Viajes;

CREATE TABLE Transporte(
    placa VARCHAR(8) PRIMARY KEY,
    nombre_responsable VARCHAR(20)
);

CREATE TABLE Viaje(
    id_viaje INT PRIMARY KEY AUTO_INCREMENT,
    lugar_origen VARCHAR(20),
    lugar_destino VARCHAR(20),
    fecha DATE,
    hora TIME,
    precio FLOAT,
    placa VARCHAR(8),
    FOREIGN KEY (placa) REFERENCES Transporte(placa)
);

CREATE TABLE Cargo(
    ID int PRIMARY KEY,
    Descripcion VARCHAR(5)
);

CREATE TABLE Usuario(
    cedula CHAR(10) PRIMARY KEY,
    nombre VARCHAR(20),
    apellido VARCHAR(20),
    fecha_nacimiento DATE,
    correo VARCHAR(50),
    telefono CHAR(10),
    ID_CARGO int,
    FOREIGN KEY (ID_CARGO) REFERENCES Cargo(ID)
);

CREATE TABLE Reserva(
    id_reserva INT PRIMARY KEY AUTO_INCREMENT,
    fecha_reserva DATE,
    cantidad_adul INT,
    cantidad_ni INT,
    cedula CHAR(10),
    precio_total FLOAT,
    id_viaje INT,
    FOREIGN KEY (cedula) REFERENCES Usuario(cedula),
    FOREIGN KEY (id_viaje) REFERENCES Viaje(id_viaje)
);

CREATE TABLE Asiento(
    id_asiento INT PRIMARY KEY AUTO_INCREMENT,
    codigo_asiento VARCHAR(3),
    estado CHAR(1)
);

CREATE TABLE ReservaAsiento(
    id_reserAsi INT PRIMARY KEY AUTO_INCREMENT,
    id_reserva INT,
    id_asiento INT,
    FOREIGN KEY (id_reserva) REFERENCES Reserva(id_reserva),
    FOREIGN KEY (id_asiento) REFERENCES Asiento(id_asiento)
);

INSERT INTO Transporte(`placa`, `nombre_responsable`) VALUES
('ASD-9034', 'Fernando'),
('DFA-0934', 'LORE'),
('DFG-0905', 'Ariel'),
('FDJ-9034', 'Alejandro'),
('HBA-6745', 'FErnando'),
('IOR-9043', 'Ricardo'),
('JKL-9034', 'Daniel'),
('JKL-9067', 'Julio'),
('POR-4356', 'Jesus');

INSERT INTO viaje(`id_viaje`, `lugar_origen`, `lugar_destino`, `fecha`, `hora`, `precio`, `placa`) VALUES
(10, 'hola', '65465456', '2023-08-02', '11:40:00', 34, 'HBA-6745'),
(11, 'Riobamba', 'Chimborazo', '2023-08-02', '01:18:00', 23.45, 'ASD-9034'),
(12, 'Riobamba', 'Altar', '2023-07-31', '00:17:00', 12.45, 'DFA-0934'),
(13, 'Riobamba', 'Carihuairazo', '2023-08-17', '11:17:00', 23.78, 'JKL-9067'),
(14, 'Riobamba', 'Nariz del Diablo', '2023-07-23', '01:20:00', 12.34, 'POR-4356'),
(15, 'Riobamba', 'Desierto de Palmira', '2023-08-01', '01:20:00', 12.34, 'JKL-9034'),
(16, 'Riobamba', 'Chimborazo', '2023-08-10', '01:20:00', 12.34, 'HBA-6745');

INSERT INTO cargo(ID, Descripcion) VALUES
    (1, 'Admin'),
    (2, 'User')