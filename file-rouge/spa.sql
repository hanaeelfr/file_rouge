CREATE TABLE Clients (
  ID_Client INT PRIMARY KEY Not NULL AUTO_INCREMENT,
  Nom VARCHAR(50),
  Prénom VARCHAR(50),
  Email VARCHAR(50),
  Telephone VARCHAR(20)
);

CREATE TABLE Professionnels (
  ID_Professionnel INT PRIMARY KEY Not NULL AUTO_INCREMENT,
  Nom VARCHAR(50),
  Prénom VARCHAR(50)
);

CREATE TABLE Services (
  ID_Service INT PRIMARY KEY Not NULL AUTO_INCREMENT,
  image varchar(255) NOT NULL,
  Nom VARCHAR(50),
  Description VARCHAR(255),
  Prix varchar(250) DEFAULT NULL,
  Durée varchar(10) NOT NULL DEFAULT '',
  Catégorie varchar(250) NOT NULL
);



CREATE TABLE Reservations (
  ID_Reservation INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  ID_Client INT NOT NULL,
  ID_Professionnel INT NOT NULL,
  ID_Service INT NOT NULL,
  Date DATE,
  Heure TIME,
  FOREIGN KEY (ID_Client) REFERENCES Clients(ID_Client),
  FOREIGN KEY (ID_Professionnel) REFERENCES Professionnels(ID_Professionnel),
  FOREIGN KEY (ID_Service) REFERENCES Services(ID_Service)
);