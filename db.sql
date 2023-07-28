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
    FOREIGN KEY (cedula) REFERENCES Cliente(cedula),
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