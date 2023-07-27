CREATE DATABASE Reserva_Viajes;
USE Reserva_Viajes;

CREATE TABLE Bus(
    id_bus INT PRIMARY KEY AUTO_INCREMENT,
    nombre_responsable VARCHAR(20),
    placa VARCHAR(8)
);

CREATE TABLE Viaje(
    id_viaje INT PRIMARY KEY AUTO_INCREMENT,
    lugar_origen VARCHAR(20),
    lugar_destino VARCHAR(20),
    fecha DATE,
    hora TIME,
    precio FLOAT,
    id_bus INT,
    FOREIGN KEY (id_bus) REFERENCES Bus(id_bus) ON DELETE CASCADE
);

CREATE TABLE Cliente(
    cedula CHAR(10) PRIMARY KEY,
    nombre VARCHAR(20),
    apellido VARCHAR(20),
    fecha_nacimiento DATE,
    correo VARCHAR(50),
    telefono CHAR(10)
);

CREATE TABLE Reserva(
    id_reserva INT PRIMARY KEY AUTO_INCREMENT,
    fecha_reserva DATE,
    cantidad_adul INT,
    cantidad_ni INT,
    cedula CHAR(10),
    precio_total FLOAT,
    id_viaje INT,
    FOREIGN KEY (cedula) REFERENCES Cliente(cedula) ON DELETE CASCADE,
    FOREIGN KEY (id_viaje) REFERENCES Viaje(id_viaje) ON DELETE CASCADE
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
    FOREIGN KEY (id_reserva) REFERENCES Reserva(id_reserva) ON DELETE CASCADE,
    FOREIGN KEY (id_asiento) REFERENCES Asiento(id_asiento) ON DELETE CASCADE
);