CREATE DATABASE gasolinera;

USE gasolinera;

CREATE TABLE ventas (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  tipo_combustible VARCHAR(50) NOT NULL,
  galones_despachados DECIMAL(10, 2) NOT NULL,
  total_dinero DECIMAL(10, 2) NOT NULL,
  fecha_hora DATETIME NOT NULL,
  tanque_id INT(11) UNSIGNED NOT NULL,
  CONSTRAINT fk_tanque_id
    FOREIGN KEY (tanque_id)
    REFERENCES tanques (id)
);

CREATE TABLE tanques (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  capacidad_galones DECIMAL(10, 2) NOT NULL,
  cantidad_actual DECIMAL(10, 2) NOT NULL
);

INSERT INTO tanques (nombre, capacidad_galones, cantidad_actual) 
VALUES 
  ('Tanque 1', 1000, 1000),
  ('Tanque 2', 1500, 1500),
  ('Tanque 3', 2000, 2000),
  ('Tanque 4', 2500, 2500),
  ('Tanque 5', 3000, 3000);
