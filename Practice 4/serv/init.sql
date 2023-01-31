CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT, UPDATE, INSERT, DELETE ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;

CREATE TABLE IF NOT EXISTS login(
	id_login INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  	person_name VARCHAR(50) NOT NULL,
  	pasword VARCHAR(50) NOT NULL
);

INSERT INTO login (person_name, pasword) 
VALUES 
('admin', 'admin'),
('user1', 'admin'),
('user2', 'admin');
CREATE TABLE IF NOT EXISTS weather_day(
    day_id SERIAL PRIMARY KEY NOT NULL,
    day VARCHAR(10) NOT NULL,
    day_temperature INTEGER NOT NULL,
    night_temperature INTEGER NOT NULL,
    pressure INTEGER NOT NULL,
    humidity INTEGER NOT NULL,
    wind FLOAT NOT NULL,
    wind_direction VARCHAR(10) NOT NULL,
    status VARCHAR(50) NOT NULL
);

INSERT INTO weather_day(day, day_temperature, night_temperature, pressure, humidity, wind, wind_direction, status)
VALUES
('22 jan', -3, -3, 764, 79, 1.0, 'Southeast', 'Cloudy'),
('23 jan', -2, -9, 767, 90, 1.9, 'Southeast', 'Cloudy'),
('24 jan', -1, -3, 764, 89, 2.3, 'Southwest', 'Cloudy'),
('25 jan', -1, -2, 758, 85, 2.9, 'Southwest', 'Cloudy'),
('26 jan', -1, -2, 751, 85, 3.0, 'Southwest', 'Cloudy'),
('27 jan', -1, -4, 750, 90, 2.4, 'Northwest', 'Light snow'),
('28 jan', -5, -9, 752, 86, 2.3, 'Northwest', 'Light snow'),
('29 jan', -3, -5, 744, 83, 3.0, 'South', 'Light snow');

ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password'; 