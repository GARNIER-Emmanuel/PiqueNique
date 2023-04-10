#------------------------------------------------------------
# BD: bdPiqueNique (script mysql)
#------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `AP.3Pique-Nique` DEFAULT CHARACTER SET utf8 COLLATE
utf8_general_ci;USE `AP.3Pique-Nique`;
#------------------------------------------------------------
# Table: Classe
#------------------------------------------------------------
CREATE TABLE Classe(
        idC      Int  Auto_increment  NOT NULL ,
        libelle Varchar (10) NOT NULL
	,CONSTRAINT Classe_PK PRIMARY KEY (idC)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: Etudiant
#------------------------------------------------------------


CREATE TABLE Etudiant(
        idE            Int  Auto_increment  NOT NULL ,
        nom   Varchar (25) NOT NULL ,
        prenom       Varchar(20) NOT NULL ,
        idC Int NOT NULL
	,CONSTRAINT Etudiant_PK PRIMARY KEY (idE)
,CONSTRAINT Etudiant_Classe_FK FOREIGN KEY (idC) REFERENCES Classe(idC)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: TypeApport
#------------------------------------------------------------
CREATE TABLE TypeApport(
        idT      Int  Auto_increment  NOT NULL ,
        libelle Varchar (10) NOT NULL,
CONSTRAINT TypeApport_PK PRIMARY KEY (idT) )ENGINE=InnoDB;
#------------------------------------------------------------
# Table: Apport
#------------------------------------------------------------
CREATE TABLE Apport(
        idA            Int  Auto_increment  NOT NULL ,
        description   Varchar (25) NOT NULL ,
        nbParts       Int NOT NULL ,
        idT Int NOT NULL
	,CONSTRAINT Apport_PK PRIMARY KEY (idA)
,CONSTRAINT Apport_TypeApport_FK FOREIGN KEY (idT) REFERENCES TypeApport(idT)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: Faire
#------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Faire` (  
`idE` Int NOT NULL,  
`idA` Int NOT NULL, 
`qte` varchar(3) NOT NULl) 
ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `Faire` ADD PRIMARY KEY (`idE`, `idA`);
ALTER TABLE `Faire` ADD CONSTRAINT FOREIGN KEY (`idE`) REFERENCES `Etudiant`(`idE`);
ALTER TABLE `Faire` ADD CONSTRAINT FOREIGN KEY (`idA`) REFERENCES `Apport`(`idA`);


#------------------------------------------------------------
# Données de départ
#------------------------------------------------------------
INSERT INTO `AP.3Pique-Nique`.`classe` (`idC`, `libelle`) VALUES ('1', 'SIO1'), ('2', 'SIO2');
INSERT INTO `AP.3Pique-Nique`.`etudiant` (`idE`, `nom`, `prenom`, `idC`) VALUES ('1', 'TOUILLE', 'Sacha', '1'),('2', 'VERSAIRE', 'Annie', '1'), ('3', 'TEU', 'Thomas', '2');
INSERT INTO `AP.3Pique-Nique`.`typeapport` (`idT`, `libelle`) VALUES ('1', '1-Entrée'), ('2', '2-Plat'),('3', '3-Dessert'),('4', '4-Boisson'),('5', '5-Couverts');
INSERT INTO `apport` (`idA`, `description`, `nbParts`, `idT`) VALUES
(1, 'Pizza au chèvre', 8, 1),
(2, 'Taboulé', 6, 2),
(3, 'Crêpes', 24, 3),
(4, 'Eau pétillante (1 l)', 3, 4),
(5, 'Assiettes réutilisables', 12, 5);
INSERT INTO `AP.3Pique-Nique`.`Faire` (`idA`, `idE`) VALUES ('1', '2'), ('2', '2'),('3', '3'), ('4', '3'), ('5', '1');