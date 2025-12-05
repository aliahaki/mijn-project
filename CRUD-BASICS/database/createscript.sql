-- step: 01
-- ************************************
-- Doel : Maak een nieuwe database aan Rollercoaster
-- ************************************
-- Versie       Datum        Auteur         Omschrijving
-- ********  **********  **************  *******************************
-- 01      04.12.2025      Alia Haki         database met
--                                           de hoogsteachtbanen 
--                                           van Euroopa
-- ********************************************************************


-- Verwijder de database
DROP DATABASE IF EXISTS Rollercoaster_2509b;

-- Maak de database aan
CREATE DATABASE Rollercoaster_2509b;

-- Gebruik de database Rollercoaster_2509b
USE Rollercoaster_2509b;

-- step: 01
-- ************************************
-- Doel : Maak een nieuwe database aan Rollercoaster
-- ************************************
-- Versie       Datum        Auteur         Omschrijving
-- ********  **********  **************  *******************************
-- 01      04.12.2025      Alia Haki         tabel met
--                                           de hoogste achtbanen 
--                                           van Euroopa
-- ********************************************************************


--Maak de tabel rollercoaster aan


CREATE TABLE Rollercoaster
(
    Id                  SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary key of the Rollercoaster table'
    ,RollerCoaster       VARCHAR(50)       NOT NULL                COMMENT 'Name of the rollercoaster'
    ,AmusementPark       VARCHAR(50)       NOT NULL                COMMENT 'Name of the amusementpark'
    ,Country             VARCHAR(50)       NOT NULL                COMMENT 'Country where it is located'
    ,TopSpeed            SMALLINT UNSIGNED NOT NULL                COMMENT 'Topspeed in km/h'
    ,Height              TINYINT  UNSIGNED NOT NULL                COMMENT 'Height in meters'
    ,YearOfConstruction  DATE              NOT NULL                COMMENT 'Year of construction'
    ,IsActive            BIT               NOT NULL DEFAULT 1      COMMENT 'Indicates whether the rollercoaster is Active(1)'
    ,Remark              VARCHAR(255)               DEFAULT NULL   COMMENT 'Optional remark or additional information'
    ,DateCreated         DATETIME(6)       NOT NULL DEFAULT NOW(6) COMMENT 'Timestamp when the record was created'
    ,DateChanged         DATETIME(6)       NOT NULL DEFAULT NOW(6) COMMENT 'Timestamp of the latest update'
    ,CONSTRAINT    PK_Rollercoaster_Id       PRIMARY KEY (Id)
) ENGINE=InnoDB;


-- Step : 03
-- *********************************************************************
-- Doel : Vul de tabel Rollercoaster met data
-- **********************************************************************
-- Versie   Datum       Auteur              Omschrijving
-- ******   *****       *******             ************
-- 01       04-12-2025  Alia Haki            Vul tabel hoogste
--                                           achtbanen van Europa
-- ***********************************************************************

-- Vul de tabel

INSERT INTO Rollercoaster
(
   RollerCoaster
   ,AmusementPark
   ,Country
   ,TopSpeed
   ,Height
   ,YearOfConstruction
)
VALUES
('Kingda Ka', 'Six Flags Great Adventure', 'Verenigd Koninkrijk', 206, 127, '2005-10-21')
,('Red Force', 'Ferrari Land', 'Spanje', 180, 112, '2017-04-07')
,('Hyperion', 'Energylandia', 'Polen', 142, 77, '2018-08-14')
,('Shambhala', 'PortAventura Park', 'Spanje', 134, 76, '2012-04-07')
,('Schwur des Karnen', 'Hansa Park', 'Duitsland', 127, 73, '2017-02-25');
    