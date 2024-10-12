-- Script généré par WinDev le 13/12/2011 18:31:44
-- Tables de l'analyse Cloking.wda
-- pour MySQL

-- Création de la table groupe
CREATE TABLE `groupe` (
    `IDgroupe` INTEGER  PRIMARY KEY ,
    `Nom` VARCHAR(50) ,
    `Description` LONGTEXT );
CREATE INDEX `WDIDX_groupe_Nom` ON `groupe` (`Nom`);

-- Création de la table Tache
CREATE TABLE `Tache` (
    `IDTache` INTEGER  PRIMARY KEY ,
    `Tache` VARCHAR(255) ,
    `Description` LONGTEXT ,
    `IDgroupe` INTEGER ,
    `Duree` REAL DEFAULT 0,
    `Historiser` TINYINT DEFAULT 0);
CREATE INDEX `WDIDX_Tache_Tache` ON `Tache` (`Tache`);
CREATE INDEX `WDIDX_Tache_IDgroupe` ON `Tache` (`IDgroupe`);
CREATE INDEX `WDIDX_Tache_Historiser` ON `Tache` (`Historiser`);

-- Création de la table Tache_utilisateur
CREATE TABLE `Tache_utilisateur` (
    `IDutilisateur` INTEGER ,
    `IDTache` INTEGER ,
    `Temps` TIME ,
    `Date` DATE ,
    `Description` LONGTEXT ,
    `IDUnique` VARCHAR(30)  UNIQUE  DEFAULT '0',
    `IDgroupe` INTEGER );
CREATE INDEX `WDIDX_Tache_utilisateur_IDutilisateur` ON `Tache_utilisateur` (`IDutilisateur`);
CREATE INDEX `WDIDX_Tache_utilisateur_IDTache` ON `Tache_utilisateur` (`IDTache`);
CREATE INDEX `WDIDX_Tache_utilisateur_Temps` ON `Tache_utilisateur` (`Temps`);
CREATE INDEX `WDIDX_Tache_utilisateur_Date` ON `Tache_utilisateur` (`Date`);
CREATE INDEX `WDIDX_Tache_utilisateur_IDgroupe` ON `Tache_utilisateur` (`IDgroupe`);
CREATE INDEX `WDIDX_Tache_utilisateur_IDTache_utilisateur` ON `Tache_utilisateur` (`IDTache`,`IDutilisateur`);

-- Création de la table utilisateur
CREATE TABLE `utilisateur` (
    `IDutilisateur` INTEGER  PRIMARY KEY ,
    `User` VARCHAR(50)  UNIQUE ,
    `Mdp` VARCHAR(50) ,
    `IDgroupe` INTEGER );
CREATE INDEX `WDIDX_utilisateur_IDgroupe` ON `utilisateur` (`IDgroupe`);
--Contraintes d'intégrité
ALTER TABLE `Tache_utilisateur` ADD FOREIGN KEY (`IDgroupe`) REFERENCES `groupe` (`IDgroupe`);
ALTER TABLE `Tache` ADD FOREIGN KEY (`IDgroupe`) REFERENCES `groupe` (`IDgroupe`);
ALTER TABLE `Tache_utilisateur` ADD FOREIGN KEY (`IDutilisateur`) REFERENCES `utilisateur` (`IDutilisateur`);
ALTER TABLE `Tache_utilisateur` ADD FOREIGN KEY (`IDTache`) REFERENCES `Tache` (`IDTache`);
ALTER TABLE `utilisateur` ADD FOREIGN KEY (`IDgroupe`) REFERENCES `groupe` (`IDgroupe`);
