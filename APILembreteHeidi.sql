CREATE DATABASE apilembretesdb

USE apilembretesdb

CREATE TABLE lembrete (
idLembrete INT NOT NULL AUTO_INCREMENT PRIMARY key,
tituloLembrete VARCHAR(100) NOT NULL,
corpoLembrete TEXT NOT NULL);
 