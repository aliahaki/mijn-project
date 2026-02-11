-- Step: 01
-- ***********************************************
-- Doel : Maak een nieuwe database aan met de naam MVC_Basics_2509AB
-- ***********************************************
-- Versie   Datum       Auteur              Omschrijving
-- ******   *****       *******             ************
-- 01       10-02-2026  Arjan de Ruijter    Smartphones
-- ***********************************************

-- Verwijder database MVC_Basics_2509AB
DROP DATABASE IF EXISTS `MVC_Basics_2509AB`;

-- Maak een nieuwe database aan MVC_Basics_2509AB
CREATE DATABASE `MVC_Basics_2509AB`;

-- Gebruik database MVC_Basics_2509AB
USE `MVC_Basics_2509AB`;

-- Step: 02
-- ***********************************************
-- Doel : Maak een nieuwe tabel aan met de naam Smartphones
-- ***********************************************
-- Versie   Datum       Auteur              Omschrijving
-- ******   *****       *******             ************
-- 01       10-02-2026  Arjan de Ruijter    Tabel Smartphones
-- ***********************************************
-- Onderstaande velden toevoegen aan de tabel Smartphones
-- Merk, Model, Prijs, Geheugen, Besturingssysteem,
-- Schermgrootte, Releasedatum, MegaPixels
-- ***********************************************

CREATE TABLE Smartphones
(
     Id                 SMALLINT     UNSIGNED     NOT NULL        AUTO_INCREMENT
    ,Merk               VARCHAR(50)               NOT NULL
    ,Model              VARCHAR(50)               NOT NULL
    ,Prijs              DECIMAL(6,2)              NOT NULL
    ,Geheugen           DECIMAL(4,0)              NOT NULL
    ,Besturingssysteem  VARCHAR(25)               NOT NULL
    ,Schermgrootte      DECIMAL(3,2)              NOT NULL
    ,Releasedatum       DATE                      NOT NULL
    ,MegaPixels         DECIMAL(3,0)              NOT NULL
    ,IsActief           BIT                       NOT NULL         DEFAULT 1
    ,Opmerking          VARCHAR(255)                  NULL         DEFAULT NULL
    ,DatumAangemaakt    DATETIME(6)               NOT NULL         DEFAULT NOW(6)
    ,DatumGewijzigd     DATETIME(6)               NOT NULL         DEFAULT NOW(6)
    ,CONSTRAINT         PK_Smartphones_Id   PRIMARY KEY            (Id)
) ENGINE=InnoDB;

-- Step: 03
-- ********************************************
-- Doel : Vul de tabel Smartphones met gegevens
-- ********************************************
-- Versie     Datum       Auteur              Omschrijving
-- *****      *****       ******              ************
-- 01         10-02-2026  Arjan de Ruijter    Vulling Smartphones
-- ********************************************

INSERT INTO Smartphones
(
   Merk
  ,Model
  ,Prijs
  ,Geheugen
  ,Besturingssysteem
  ,Schermgrootte
  ,Releasedatum
  ,MegaPixels
)
VALUES
('Apple', 'iPhone 16 Pro', 1256.56, 64, 'iOS 18', 6.7, '2025-01-19', 50),
('Samsung', 'Galaxy S25 Ultra', 1539, 128, 'Android 15', 6.1, '2025-02-01', 200),
('Google', 'Pixel 9 Pro', 890, 1024, 'Android 15', 6.3, '2024-12-20', 100),
('OnePlus', 'Nord 5', 699, 128, 'Android 15', 6.4, '2024-11-05', 48),
('Xiaomi', 'Mi 14', 849, 256, 'Android 15', 6.6, '2025-01-10', 108),
('Huawei', 'P60 Pro', 999, 512, 'HarmonyOS 4', 6.5, '2024-12-01', 100),
('Sony', 'Xperia 1 V', 1199, 256, 'Android 15', 6.8, '2024-10-15', 48),
('Motorola', 'Edge 60', 749, 128, 'Android 15', 6.6, '2024-09-20', 50);
-- Voeg nog minimaal 5 extra smartphones toe




-- Step: 04
-- ******************************************************************************************
-- Doel : Maak een nieuwe tabel aan met de naam Sneakers
-- ******************************************************************************************
-- Versie        Datum           Auteur                  Omschrijving
-- *****         ********        ***************         *************
-- 01            10-02-2026      Arjan de Ruijter        Tabel Sneakers
-- ******************************************************************************************
-- Onderstaande velden toevoegen aan de tabel Sneakers
-- Type (Hardloop, Basketbal, Casual), Prijs, Materiaal (Leer, Mesh, Synthetisch), Gewicht, Releasedatum
-- ******************************************************************************************

CREATE TABLE Sneakers
(
     Id               SMALLINT       UNSIGNED     NOT NULL     AUTO_INCREMENT
    ,Merk             VARCHAR(50)                 NOT NULL
    ,Model            VARCHAR(50)                 NOT NULL
    ,Type             VARCHAR(25)                 NOT NULL
    ,Prijs            DECIMAL(6,2)                NOT NULL
    ,Materiaal        VARCHAR(50)                 NOT NULL
    ,Gewicht          DECIMAL(5,2)                NOT NULL
    ,Releasedatum     DATE                        NOT NULL
    ,IsActief         BIT                         NOT NULL     DEFAULT 1
    ,Opmerking        VARCHAR(255)                    NULL     DEFAULT NULL
    ,DatumAangemaakt  DATETIME(6)                 NOT NULL     DEFAULT NOW(6)
    ,DatumGewijzigd   DATETIME(6)                 NOT NULL     DEFAULT NOW(6)
    ,CONSTRAINT       PK_Sneakers_Id              PRIMARY KEY (Id)
) ENGINE=InnoDB;


-- Step: 05
-- ******************************************************************************************
-- Doel : Vul de tabel Sneakers met gegevens
-- ******************************************************************************************
-- Versie        Datum           Auteur                  Omschrijving
-- *****         ********        ***************         *************
-- 01            10-02-2026      Arjan de Ruijter        Vulling Sneakers
-- ******************************************************************************************

INSERT INTO Sneakers
(
     Merk
    ,Model 
    ,Type
    ,Prijs
    ,Materiaal
    ,Gewicht
    ,Releasedatum
)
VALUES
('Nike', 'Air Jordan 1', 'Hardloop', 199.99, 'Leer', 0.85, '2023-03-15'),
('Adidas', 'Yeezy Boost 350', 'Basketbal', 220.00, 'Mesh', 0.78, '2022-09-10'),
('New Balance', 'Pixel 9 Pro', 'Casual', 150.50, 'Synthetisch', 0.65, '2024-01-20'),
('Trico', 'New Age', 'Casual', 120.00, 'Leer', 0.70, '2023-06-05'),
('Overlord', 'Tristar 6', 'Hardloop', 180.00, 'Mesh', 0.80, '2022-11-11'),
('Puma', 'Runner X', 'Hardloop', 140.00, 'Synthetisch', 0.77, '2023-02-28'),
('Reebok', 'Classic 2023', 'Casual', 130.00, 'Leer', 0.72, '2023-08-15'),
('Asics', 'Gel Nimbus 25', 'Hardloop', 210.00, 'Mesh', 0.83, '2024-01-05');


-- Step: 06
-- ******************************************************************************************
-- Doel : Maak een nieuwe tabel aan met de naam Horloges
-- ******************************************************************************************
-- Versie        Datum           Auteur                  Omschrijving
-- *****         ********        ***************         *************
-- 01            10-02-2026      Arjan de Ruijter        Tabel Horloges
-- ******************************************************************************************
-- Onderstaande velden toevoegen aan de tabel Horloges
-- Materiaal (Goud, Diamant, RVS), Gewicht, Releasedatum, Waterdichtheid(m), Type (Analoog, Digitaal),
-- Uniek kenmerk
-- *********************************************************************************************

CREATE TABLE Horloges
(
     Id               SMALLINT       UNSIGNED     NOT NULL     AUTO_INCREMENT
    ,Merk             VARCHAR(50)                 NOT NULL
    ,Model            VARCHAR(50)                 NOT NULL
    ,Prijs            DECIMAL(6,0)                NOT NULL
    ,Materiaal        VARCHAR(50)                 NOT NULL
    ,Gewicht          DECIMAL(5,2)                NOT NULL
    ,Releasedatum     DATE                        NOT NULL
    ,Waterdichtheid   DECIMAL(5,2)                NOT NULL
    ,Type             VARCHAR(25)                 NOT NULL
    ,UniekKenmerk     VARCHAR(255)                             DEFAULT NULL
    ,IsActief         BIT                          NOT NULL    DEFAULT 1
    ,Opmerking        VARCHAR(255)                     NULL    DEFAULT NULL
    ,DatumAangemaakt  DATETIME(6)                 NOT  NULL     DEFAULT NOW(6)
    ,DatumGewijzigd   DATETIME(6)                 NOT  NULL     DEFAULT NOW(6)
    ,CONSTRAINT       PK_Horloges_Id                    PRIMARY KEY (Id)
) ENGINE=InnoDB;

-- Step: 07
-- ******************************************************************************************
-- Doel : Vul de tabel Horloges met gegevens
-- ******************************************************************************************
-- Versie        Datum           Auteur                  Omschrijving
-- *****         ********        ***************         *************
-- 01            10-02-2026      Arjan de Ruijter        Vulling Horloges
-- ******************************************************************************************

INSERT INTO Horloges
(
     Merk
    ,Model
    ,Prijs
    ,Materiaal
    ,Gewicht
    ,Releasedatum
    ,Waterdichtheid
    ,Type
    ,UniekKenmerk
)
VALUES
('Rolex', 'Daytona 126500LN', 19000, 'Goud', 0.15, '2023-01-10', 100, 'Analoog', 'Chronograaf'),
('Omega', 'Speedmaster Moonwatch Professional', 8500, 'RVS', 0.12, '2022-05-20', 50, 'Analoog', 'NASA goedgekeurd'),
('Vacheron Constantin', 'Overseas Perpetual Calendar Ultra-Thin', 98000, 'Diamant', 0.10, '2023-09-15', 30, 'Analoog', 'Ultra-dun ontwerp'),
('Jaeger-LeCoultre', 'Reverso Tribute Duoface', 17000, 'RVS', 0.13, '2022-11-05', 20, 'Analoog', 'Draaibare kast'),
('Tag Heuer', 'Carrera Calibre 16', 5500, 'RVS', 0.14, '2023-03-25', 100, 'Analoog', 'Saffierglas'),
('Seiko', 'Prospex LX', 3000, 'RVS', 0.11, '2023-06-12', 200, 'Digitaal', 'Solar aangedreven'),
('Casio', 'G-Shock Mudmaster', 450, 'Synthetisch', 0.10, '2024-01-15', 300, 'Digitaal', 'Schokbestendig'); 