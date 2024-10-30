-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 30-10-2024 a les 12:19:48
-- Versió del servidor: 10.4.32-MariaDB
-- Versió de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `fenosa`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `bens_exposats`
--

CREATE TABLE `bens_exposats` (
  `id_exposicio` int(11) NOT NULL,
  `id_obra` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `bens_exposats`
--

INSERT INTO `bens_exposats` (`id_exposicio`, `id_obra`) VALUES
(1, 'B001'),
(1, 'B003'),
(2, 'B001'),
(2, 'B002'),
(3, 'B002'),
(3, 'B004'),
(4, 'B002'),
(4, 'B003'),
(5, 'B001'),
(5, 'B004'),
(6, 'B003'),
(6, 'B004'),
(7, 'B001'),
(7, 'B002'),
(8, 'B002'),
(8, 'B003'),
(9, 'B003'),
(9, 'B004'),
(10, 'B004');

-- --------------------------------------------------------

--
-- Estructura de la taula `bens_patrimonials`
--

CREATE TABLE `bens_patrimonials` (
  `Num_Registro` varchar(255) NOT NULL,
  `Nom_Museu` varchar(255) DEFAULT NULL,
  `Fotografia` varchar(255) DEFAULT NULL,
  `Classificacio_Generica` int(11) DEFAULT NULL,
  `Nom_Objecte` varchar(255) DEFAULT NULL,
  `Colleccio_Procedencia` varchar(255) DEFAULT NULL,
  `Mides_Maxima_Alcada_cm` decimal(10,2) DEFAULT NULL,
  `Mides_Maxima_Amplada_cm` decimal(10,2) DEFAULT NULL,
  `Mides_Maxima_Profunditat_cm` decimal(10,2) DEFAULT NULL,
  `Material` int(11) DEFAULT NULL,
  `Tecnica` int(11) DEFAULT NULL,
  `Autor` int(11) DEFAULT NULL,
  `Titol` varchar(255) DEFAULT NULL,
  `Any_Inicial` int(11) DEFAULT NULL,
  `Any_Final` int(11) DEFAULT NULL,
  `Datacio` int(11) DEFAULT NULL,
  `Comentari_Ubicacio` text DEFAULT NULL,
  `Data_Registro` date DEFAULT NULL,
  `Nombre_Exemplars` int(11) DEFAULT NULL,
  `Forma_Ingres` int(11) DEFAULT NULL,
  `Data_Ingres` date DEFAULT NULL,
  `Font_Ingres` varchar(255) DEFAULT NULL,
  `Baixa` varchar(3) DEFAULT NULL,
  `Causa_Baixa` int(11) DEFAULT NULL,
  `Data_Baixa` date DEFAULT NULL,
  `Persona_Autoritz_Baixa` varchar(255) DEFAULT NULL,
  `Estat_Conservacio` int(11) DEFAULT NULL,
  `Lloc_Execucio` varchar(255) DEFAULT NULL,
  `Lloc_Procedencia` varchar(255) DEFAULT NULL,
  `Num_Tiratge` int(11) DEFAULT NULL,
  `Altres_Numeros_Identificacio` varchar(255) DEFAULT NULL,
  `Valoracio_Economica_Euros` decimal(10,2) DEFAULT NULL,
  `Bibliografia` text DEFAULT NULL,
  `Descripcio` text DEFAULT NULL,
  `Historia_Objecte` text DEFAULT NULL,
  `ID_Ubicacio` int(11) DEFAULT NULL,
  `ID_Expo` int(11) DEFAULT NULL,
  `ID_Moviment` int(11) DEFAULT NULL,
  `usuario_registra` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `bens_patrimonials`
--

INSERT INTO `bens_patrimonials` (`Num_Registro`, `Nom_Museu`, `Fotografia`, `Classificacio_Generica`, `Nom_Objecte`, `Colleccio_Procedencia`, `Mides_Maxima_Alcada_cm`, `Mides_Maxima_Amplada_cm`, `Mides_Maxima_Profunditat_cm`, `Material`, `Tecnica`, `Autor`, `Titol`, `Any_Inicial`, `Any_Final`, `Datacio`, `Comentari_Ubicacio`, `Data_Registro`, `Nombre_Exemplars`, `Forma_Ingres`, `Data_Ingres`, `Font_Ingres`, `Baixa`, `Causa_Baixa`, `Data_Baixa`, `Persona_Autoritz_Baixa`, `Estat_Conservacio`, `Lloc_Execucio`, `Lloc_Procedencia`, `Num_Tiratge`, `Altres_Numeros_Identificacio`, `Valoracio_Economica_Euros`, `Bibliografia`, `Descripcio`, `Historia_Objecte`, `ID_Ubicacio`, `ID_Expo`, `ID_Moviment`, `usuario_registra`) VALUES
('B001', 'Museu d\'Art Antic', 'B001.jpg', 1, 'Vasija de cerámica maya', 'Colección Arqueológica', 25.00, 15.00, 10.00, 2, 1, 3, 'Vasija ceremonial', 1200, NULL, 6, 'Almacén arqueología', '2024-10-01', 1, 2, '2020-05-20', 'Donación de particular', 'no', NULL, NULL, NULL, 4, 'Chichén Itzá', 'Chichén Itzá', NULL, 'B001-2020', 1500.00, 'Referencias en el catálogo arqueológico maya.', 'Vasija utilizada en ceremonias de ofrendas.', 'Esta pieza fue descubierta durante excavaciones en Chichén Itzá.', 2, 1, NULL, 1),
('B002', 'Museu Històric', 'B002.jpg', 2, 'Estatua romana de mármol', 'Colección Romana', 180.00, 60.00, 50.00, 3, 2, 4, 'Escultura de patricio', 150, NULL, 7, 'Sala de exposición permanente', '2024-10-02', 1, 3, '2019-04-15', 'Adquisición en subasta', 'no', NULL, NULL, NULL, 5, 'Roma', 'Roma', NULL, 'B002-2019', 50000.00, 'Mencionada en textos de historia del arte romano.', 'Estatua de mármol representando a un patricio romano.', 'Descubierta en una villa romana cerca de Pompeya.', 1, 1, NULL, 2),
('B003', 'Museu Egipci', 'B003.jpg', 3, 'Máscara funeraria egipcia', 'Colección Egipcia', 45.00, 30.00, 20.00, 1, 3, 5, 'Máscara funeraria', -200, NULL, 8, 'Exposición temporal', '2024-10-03', 1, 4, '2021-06-10', 'Donación por parte de una fundación', 'si', 1, '2023-03-22', 'Directora del museo', 4, 'Giza', 'Giza', NULL, 'B003-2021', 100000.00, 'Documentada en varias investigaciones sobre el periodo predinástico.', 'Máscara funeraria perteneciente a un dignatario egipcio.', 'Encontrada en una tumba real durante excavaciones en Giza.', 2, 2, NULL, 3),
('B004', 'Museu Viking', 'B004.jpg', 4, 'Espada vikinga', 'Colección de Armas', 90.00, 15.00, 5.00, 2, 4, 6, 'Espada ceremonial', 900, 950, 6, 'Almacén de armas', '2024-10-04', 1, 5, '2018-07-30', 'Compra directa', 'no', NULL, NULL, NULL, 5, 'Escandinavia', 'Oslo', NULL, 'B004-2018', 20000.00, 'Citada en varios estudios sobre armamento vikingo.', 'Espada utilizada en ceremonias rituales.', 'Esta espada fue encontrada en un barco vikingo durante excavaciones en Oslo.', 1, 4, NULL, 1),
('B006', 'Museu del Renaixement', 'B006.jpg', 5, 'Retrato de noble', 'Colección Renacentista', 100.00, 75.00, 5.00, 4, 1, 7, 'Retrato de un noble italiano', 1500, 1505, 10, 'Galería de retratos', '2024-10-06', 1, 3, '2018-12-25', 'Compra en galería', 'no', NULL, NULL, NULL, 5, 'Florencia', 'Florencia', NULL, 'B006-2018', 45000.00, 'Catalogado en la historia de arte renacentista.', 'Retrato en óleo de un noble florentino.', 'Recuperado de una colección privada en Florencia.', 1, 2, NULL, 3),
('B007', 'Museu de Ciències Naturals', 'B007.jpg', 6, 'Esqueleto de dinosaurio', 'Colección Paleontológica', 500.00, 200.00, 100.00, 3, 2, NULL, 'Esqueleto completo', -66000000, NULL, 11, 'Sala de paleontología', '2024-10-07', 1, 2, '2017-09-10', 'Donación de museo', 'no', NULL, NULL, NULL, 6, 'Patagonia', 'Patagonia', NULL, 'B007-2017', 200000.00, 'Estudios paleontológicos recientes.', 'Esqueleto fósil de un dinosaurio herbívoro.', 'Encontrado en excavaciones paleontológicas en la Patagonia.', 3, 5, NULL, 1),
('B008', 'Museu del Medievo', 'B008.jpg', 4, 'Armadura de caballero', 'Colección Medieval', 180.00, 60.00, 30.00, 2, 4, 8, 'Armadura completa', 1300, 1350, 9, 'Sala de armas medievales', '2024-10-08', 1, 5, '2015-06-18', 'Adquisición en subasta', 'no', NULL, NULL, NULL, 5, 'Normandía', 'Normandía', NULL, 'B008-2015', 75000.00, 'Referencias en historia medieval.', 'Armadura utilizada en el periodo medieval.', 'Esta armadura fue recuperada de una colección privada en Normandía.', 2, 4, NULL, 2),
('B009', 'Museu Asiàtic', 'B009.jpg', 7, 'Estatua de Buda', 'Colección Budista', 150.00, 50.00, 40.00, 5, 3, 9, 'Escultura de Buda', 600, 650, 12, 'Sala de arte asiático', '2024-10-09', 1, 2, '2019-03-22', 'Donación de templo budista', 'no', NULL, NULL, NULL, 4, 'Nepal', 'Kathmandu', NULL, 'B009-2019', 120000.00, 'Documentado en estudios sobre arte budista.', 'Representación de Buda en piedra.', 'Esta estatua fue donada por un templo en Nepal.', 3, 1, NULL, 2),
('B010', 'Museu del Antic Egipte', 'B010.jpg', 3, 'Sarcófago egipcio', 'Colección Egipcia', 200.00, 70.00, 50.00, 1, 5, 5, 'Sarcófago de noble', -1200, NULL, 8, 'Galería de tumbas', '2024-10-10', 1, 4, '2021-05-30', 'Donación de expedición arqueológica', 'si', 2, '2022-12-01', 'Curador jefe', 4, 'El Cairo', 'Luxor', NULL, 'B010-2021', 150000.00, 'Estudios recientes sobre momificación.', 'Sarcófago de un dignatario egipcio.', 'Encontrado en una tumba en Luxor durante una excavación.', 2, 3, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de la taula `exposicions`
--

CREATE TABLE `exposicions` (
  `ID_Expo` int(11) NOT NULL,
  `Nom_Expo` varchar(255) DEFAULT NULL,
  `Data_Inici_Expo` date DEFAULT NULL,
  `Data_Fi_Expo` date DEFAULT NULL,
  `Tipus_Expo` int(11) DEFAULT NULL,
  `Lloc_Exposicio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `exposicions`
--

INSERT INTO `exposicions` (`ID_Expo`, `Nom_Expo`, `Data_Inici_Expo`, `Data_Fi_Expo`, `Tipus_Expo`, `Lloc_Exposicio`) VALUES
(1, 'Exposición de Arte Moderno', '2024-01-01', '2024-03-31', 1, 'Museu Nacional d\'Art de Catalunya'),
(2, 'Historia del Arte', '2024-04-01', '2024-06-30', 1, 'Museu d\'Història de Catalunya'),
(3, 'Maestros del Renacimiento', '2024-07-01', '2024-09-30', 2, 'Museu Picasso'),
(4, 'El Impresionismo', '2024-10-01', '2024-12-31', 2, 'Museu del Disseny de Barcelona'),
(5, 'Arte Contemporáneo', '2024-01-15', '2024-04-15', 2, 'Centre de Cultura Contemporània de Barcelona'),
(6, 'La Escultura a Través de los Siglos', '2024-05-01', '2024-07-31', 1, 'Museu de les Arts Decoratives'),
(7, 'Pinturas de la Naturaleza', '2024-08-01', '2024-10-31', 2, 'Museu d\'Art de Girona'),
(8, 'Arte Urbano', '2024-11-01', '2025-01-31', 1, 'Museu d\'Art Contemporani de Barcelona'),
(9, 'Fotografía Artística', '2025-02-01', '2025-04-30', 1, 'Fundació Foto Colectania'),
(10, 'Colección de Arte Local', '2025-05-01', '2025-07-31', 2, 'Museu de la Ciutat de Barcelona');

-- --------------------------------------------------------

--
-- Estructura de la taula `moviments`
--

CREATE TABLE `moviments` (
  `ID_Moviment` int(11) NOT NULL,
  `Museu_Procedencia` varchar(255) DEFAULT NULL,
  `Data_Inici` date DEFAULT NULL,
  `Data_Fi` date DEFAULT NULL,
  `Obra_moguda` varchar(255) DEFAULT NULL,
  `Museu_Actual` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `moviments`
--

INSERT INTO `moviments` (`ID_Moviment`, `Museu_Procedencia`, `Data_Inici`, `Data_Fi`, `Obra_moguda`, `Museu_Actual`) VALUES
(1, 'Museo de Arte Moderno', '2023-03-01', '2023-05-01', 'B002', 'Museu Apel·les Fenosa'),
(2, 'Museu Apel·les Fenosa', '2023-06-01', '2023-09-01', 'B003', 'Museo Nacional');

-- --------------------------------------------------------

--
-- Estructura de la taula `restauracions`
--

CREATE TABLE `restauracions` (
  `id` int(11) NOT NULL,
  `data_inici` date DEFAULT NULL,
  `data_fi` date DEFAULT NULL,
  `comentari` text DEFAULT NULL,
  `nom_restaurador` text DEFAULT NULL,
  `id_obra` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `restauracions`
--

INSERT INTO `restauracions` (`id`, `data_inici`, `data_fi`, `comentari`, `nom_restaurador`, `id_obra`) VALUES
(1, '2022-01-15', '2022-02-10', 'Restauración completa de la superficie dañada.', 'Joan Pérez', 'B001'),
(2, '2022-03-05', '2022-03-20', 'Limpieza y conservación preventiva.', 'Marta González', 'B002'),
(3, '2022-06-10', '2022-07-15', 'Reparación de grietas y pulido.', 'Carlos López', 'B003'),
(4, '2023-01-25', '2023-02-05', 'Sustitución de piezas faltantes.', 'Ana Fernández', 'B004'),
(5, '2023-03-12', '2023-03-30', 'Restauración de color original.', 'Luis Sánchez', 'B001'),
(6, '2023-04-05', '2023-04-18', 'Conservación de los detalles dorados.', 'María Díaz', 'B002'),
(7, '2023-05-20', '2023-06-10', 'Reparación de daños estructurales.', 'José García', 'B003'),
(8, '2023-08-01', '2023-08-15', 'Limpieza profunda de la superficie.', 'Clara Morales', 'B004'),
(9, '2023-09-10', '2023-09-25', 'Aplicación de capa protectora.', 'Pablo Ruiz', 'B001'),
(10, '2023-10-12', '2023-10-28', 'Reparación de daños por humedad.', 'Sofía Hernández', 'B002');

-- --------------------------------------------------------

--
-- Estructura de la taula `ubicacions`
--

CREATE TABLE `ubicacions` (
  `ID_Ubicacio` int(11) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `padre` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `ubicacions`
--

INSERT INTO `ubicacions` (`ID_Ubicacio`, `Nom`, `padre`, `descripcion`) VALUES
(1, 'Sala 1', NULL, 'Primera planta del museo'),
(2, 'Sala 2', NULL, 'Segunda planta del museo'),
(3, 'Sub-Sala 1', 1, 'Subdivisión de Sala 1');

-- --------------------------------------------------------

--
-- Estructura de la taula `usuaris`
--

CREATE TABLE `usuaris` (
  `ID_Usuari` int(11) NOT NULL,
  `Nom_Usuari` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Rol` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `usuaris`
--

INSERT INTO `usuaris` (`ID_Usuari`, `Nom_Usuari`, `Email`, `Password`, `Rol`) VALUES
(1, 'admin', 'admin@example.com', 'admin', 'admin'),
(2, 'tecnico', 'tecnico@example.com', 'tecnico', 'tecnico'),
(3, 'invitado', 'invitado@example.com', 'invitado', 'invitado');

-- --------------------------------------------------------

--
-- Estructura de la taula `vocabulario_autores`
--

CREATE TABLE `vocabulario_autores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `vocabulario_autores`
--

INSERT INTO `vocabulario_autores` (`id`, `nombre`) VALUES
(9, 'Andy Warhol'),
(5, 'Claude Monet'),
(3, 'Frida Kahlo'),
(7, 'Georgia O\'Keeffe'),
(8, 'Jackson Pollock'),
(4, 'Leonardo da Vinci'),
(10, 'Michelangelo'),
(1, 'Pablo Picasso'),
(6, 'Salvador Dalí'),
(2, 'Vincent van Gogh');

-- --------------------------------------------------------

--
-- Estructura de la taula `vocabulario_causas_baja`
--

CREATE TABLE `vocabulario_causas_baja` (
  `id` int(11) NOT NULL,
  `causa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `vocabulario_causas_baja`
--

INSERT INTO `vocabulario_causas_baja` (`id`, `causa`) VALUES
(1, 'Confiscacio'),
(2, 'Destrucció'),
(3, 'Estat de conservació molt deficient'),
(4, 'Manteniment i restauració'),
(5, 'Pèrdua'),
(6, 'Robatori'),
(7, 'Successió interadministrativa'),
(8, 'Valor patrimonial insuficient');

-- --------------------------------------------------------

--
-- Estructura de la taula `vocabulario_classificacio_generica`
--

CREATE TABLE `vocabulario_classificacio_generica` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `vocabulario_classificacio_generica`
--

INSERT INTO `vocabulario_classificacio_generica` (`id`, `nombre`) VALUES
(1, 'Arte Prehistórico'),
(2, 'Arte Antiguo'),
(3, 'Arte Medieval'),
(4, 'Arte Renacentista'),
(5, 'Arte Barroco'),
(6, 'Arte Neoclásico'),
(7, 'Arte Moderno'),
(8, 'Arte Contemporáneo'),
(9, 'Arqueología'),
(10, 'Historia Natural');

-- --------------------------------------------------------

--
-- Estructura de la taula `vocabulario_codis_getty`
--

CREATE TABLE `vocabulario_codis_getty` (
  `id` int(11) NOT NULL,
  `codi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `vocabulario_datacions`
--

CREATE TABLE `vocabulario_datacions` (
  `id` int(11) NOT NULL,
  `datacio` varchar(255) DEFAULT NULL,
  `any_inici` int(11) DEFAULT NULL,
  `any_final` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `vocabulario_datacions`
--

INSERT INTO `vocabulario_datacions` (`id`, `datacio`, `any_inici`, `any_final`) VALUES
(1, 'segle IV ante', -400, -301),
(2, 'primera meitat segle IV ante', -400, -351),
(3, 'primer quart segle IV ante', -400, -376),
(4, 'segon quart segle IV ante', -375, -351),
(5, 'segona meitat segle IV ante', -350, -301),
(6, 'tercer quart segle IV ante', -350, -326),
(7, 'últim quart segle IV ante', -325, -301),
(8, 'segle III ante', -300, -201),
(9, 'primera meitat segle III ante', -300, -251),
(10, 'primer quart segle III ante', -300, -276),
(11, 'segon quart segle III ante', -275, -251),
(12, 'segona meitat segle III ante', -250, -201),
(13, 'tercer quart segle III ante', -250, -226),
(14, 'últim quart segle III ante', -225, -201),
(15, 'segle II ante', -200, -101),
(16, 'primera meitat segle II ante', -200, -151),
(17, 'primer quart segle II ante', -200, -176),
(18, 'segon quart segle II ante', -175, -151),
(19, 'segona meitat segle II ante', -150, -101),
(20, 'tercer quart segle II ante', -150, -126),
(21, 'últim quart segle II ante', -125, -101),
(22, 'segle I ante', -100, -1),
(23, 'primera meitat segle I ante', -100, -51),
(24, 'primer quart segle I ante', -100, -76),
(25, 'segon quart segle I ante', -75, -51),
(26, 'segona meitat segle I ante', -50, -1),
(27, 'tercer quart segle I ante', -50, -26),
(28, 'últim quart segle I ante', -25, -1),
(29, 'segle I', 0, 100),
(30, 'primera meitat segle I', 0, 50),
(31, 'primer quart segle I', 0, 25),
(32, 'segon quart segle I', 25, 50),
(33, 'segona meitat segle I', 50, 100),
(34, 'tercer quart segle I', 50, 75),
(35, 'últim quart segle I', 75, 100),
(36, 'segle II', 100, 200),
(37, 'primera meitat segle II', 100, 150),
(38, 'primer quart segle II', 100, 125),
(39, 'segon quart segle II', 125, 150),
(40, 'segona meitat segle II', 150, 200),
(41, 'tercer quart segle II', 150, 175),
(42, 'últim quart segle II', 175, 200),
(43, 'segle III', 200, 300),
(44, 'primera meitat segle III', 200, 250),
(45, 'primer quart segle III', 200, 225),
(46, 'segon quart segle III', 225, 250),
(47, 'segona meitat segle III', 250, 300),
(48, 'tercer quart segle III', 250, 275),
(49, 'últim quart segle III', 275, 300),
(50, 'segle IV', 300, 400),
(51, 'primera meitat segle IV', 300, 350),
(52, 'primer quart segle IV', 300, 325),
(53, 'segon quart segle IV', 325, 350),
(54, 'segona meitat segle IV', 350, 400),
(55, 'tercer quart segle IV', 350, 375),
(56, 'últim quart segle IV', 375, 400),
(57, 'segle V', 400, 500),
(58, 'primera meitat segle V', 400, 450),
(59, 'primer quart segle V', 400, 425),
(60, 'segon quart segle V', 425, 450),
(61, 'segona meitat segle V', 450, 500),
(62, 'tercer quart segle V', 450, 475),
(63, 'últim quart segle V', 475, 500),
(64, 'segle VI', 500, 600),
(65, 'primera meitat segle VI', 500, 550),
(66, 'primer quart segle VI', 500, 525),
(67, 'segon quart segle VI', 525, 550),
(68, 'segona meitat segle VI', 550, 600),
(69, 'tercer quart segle VI', 550, 575),
(70, 'últim quart segle VI', 575, 600),
(71, 'segle VII', 600, 700),
(72, 'primera meitat segle VII', 600, 650),
(73, 'primer quart segle VII', 600, 625),
(74, 'segon quart segle VII', 625, 650),
(75, 'segona meitat segle VII', 650, 700),
(76, 'tercer quart segle VII', 650, 675),
(77, 'últim quart segle VII', 675, 700),
(78, 'segle VIII', 700, 800),
(79, 'primera meitat segle VIII', 700, 750),
(80, 'primer quart segle VIII', 700, 725),
(81, 'segon quart segle VIII', 725, 750),
(82, 'segona meitat segle VIII', 750, 800),
(83, 'tercer quart segle VIII', 750, 775),
(84, 'últim quart segle VIII', 775, 800),
(85, 'segle IX', 800, 900),
(86, 'primera meitat segle IX', 800, 850),
(87, 'primer quart segle IX', 800, 825),
(88, 'segon quart segle IX', 825, 850),
(89, 'segona meitat segle IX', 850, 900),
(90, 'tercer quart segle IX', 850, 875),
(91, 'últim quart segle IX', 875, 900),
(92, 'segle X', 900, 1000),
(93, 'primera meitat segle X', 900, 950),
(94, 'primer quart segle X', 900, 925),
(95, 'segon quart segle X', 925, 950),
(96, 'segona meitat segle X', 950, 1000),
(97, 'tercer quart segle X', 950, 975),
(98, 'últim quart segle X', 975, 1000),
(99, 'segle XI', 1000, 1100),
(100, 'primera meitat segle XI', 1000, 1050),
(101, 'primer quart segle XI', 1000, 1025),
(102, 'segon quart segle XI', 1025, 1050),
(103, 'segona meitat segle XI', 1050, 1100),
(104, 'tercer quart segle XI', 1050, 1075),
(105, 'últim quart segle XI', 1075, 1100),
(106, 'segle XII', 1100, 1200),
(107, 'primera meitat segle XII', 1100, 1150),
(108, 'primer quart segle XII', 1100, 1125),
(109, 'segon quart segle XII', 1125, 1150),
(110, 'segona meitat segle XII', 1150, 1200),
(111, 'tercer quart segle XII', 1150, 1175),
(112, 'últim quart segle XII', 1175, 1200),
(113, 'segle XIII', 1201, 1300),
(114, 'primera meitat segle XIII', 1201, 1250),
(115, 'primer quart segle XIII', 1201, 1225),
(116, 'segon quart segle XIII', 1226, 1250),
(117, 'segona meitat segle XIII', 1251, 1300),
(118, 'tercer quart segle XIII', 1251, 1275),
(119, 'últim quart segle XIII', 1276, 1300),
(120, 'segle XIV', 1301, 1400),
(121, 'primera meitat segle XIV', 1301, 1350),
(122, 'primer quart segle XIV', 1301, 1325),
(123, 'segon quart segle XIV', 1326, 1350),
(124, 'segona meitat segle XIV', 1351, 1400),
(125, 'tercer quart segle XIV', 1351, 1375),
(126, 'últim quart segle XIV', 1376, 1400),
(127, 'segle XV', 1401, 1500),
(128, 'primera meitat segle XV', 1401, 1450),
(129, 'primer quart segle XV', 1401, 1425),
(130, 'segon quart segle XV', 1426, 1450),
(131, 'segona meitat segle XV', 1451, 1500),
(132, 'tercer quart segle XV', 1451, 1475),
(133, 'últim quart segle XV', 1476, 1500),
(134, 'segle XVI', 1501, 1600),
(135, 'primera meitat segle XVI', 1501, 1550),
(136, 'primer quart segle XVI', 1501, 1525),
(137, 'segon quart segle XVI', 1526, 1550),
(138, 'segona meitat segle XVI', 1551, 1600),
(139, 'tercer quart segle XVI', 1551, 1575),
(140, 'últim quart segle XVI', 1576, 1600),
(141, 'segle XVII', 1601, 1700),
(142, 'primera meitat segle XVII', 1601, 1650),
(143, 'primer quart segle XVII', 1601, 1625),
(144, 'segon quart segle XVII', 1626, 1650),
(145, 'segona meitat segle XVII', 1651, 1700),
(146, 'tercer quart segle XVII', 1651, 1675),
(147, 'últim quart segle XVII', 1676, 1700),
(148, 'segle XVIII', 1701, 1800),
(149, 'primera meitat segle XVIII', 1701, 1750),
(150, 'primer quart segle XVIII', 1701, 1725),
(151, 'segon quart segle XVIII', 1726, 1750),
(152, 'segona meitat segle XVIII', 1751, 1800),
(153, 'tercer quart segle XVIII', 1751, 1775),
(154, 'últim quart segle XVIII', 1776, 1800),
(155, 'segle XIX', 1801, 1900),
(156, 'primera meitat segle XIX', 1801, 1850),
(157, 'primer quart segle XIX', 1801, 1825),
(158, 'dècada de 1800', 1801, 1810),
(159, 'dècada de 1810', 1811, 1820),
(160, 'dècada de 1820', 1821, 1830),
(161, 'segon quart segle XIX', 1826, 1850),
(162, 'dècada de 1830', 1831, 1840),
(163, 'dècada de 1840', 1841, 1850),
(164, 'segona meitat segle XIX', 1851, 1900),
(165, 'tercer quart segle XIX', 1851, 1875),
(166, 'dècada de 1850', 1851, 1860),
(167, 'dècada de 1860', 1861, 1870),
(168, 'dècada de 1870', 1871, 1880),
(169, 'últim quart segle XIX', 1826, 1850),
(170, 'dècada de 1880', 1881, 1890),
(171, 'dècada de 1890', 1891, 1900),
(172, 'segle XX', 1901, 2000),
(173, 'primera meitat del segle XX', 1901, 1950),
(174, 'primer quart del segle XX', 1901, 1925),
(175, 'dècada de 1900', 1901, 1910),
(176, 'dècada de 1910', 1911, 1920),
(177, 'dècada de 1920 i 1930', 1921, 1940),
(178, 'dècada de 1920', 1921, 1930),
(179, 'segon quart del segle XX', 1926, 1950),
(180, 'dècada de 1930 i 1940', 1931, 1950),
(181, 'dècada de 1930', 1931, 1940),
(182, 'dècada de 1940', 1941, 1950),
(183, 'segona meitat del segle XX', 1951, 2000),
(184, 'tercer quart del segle XX', 1951, 1975),
(185, 'dècada de 1950', 1951, 1960),
(186, 'dècada de 1960', 1961, 1970),
(187, 'dècada de 1970', 1971, 1980),
(188, 'quart quart del segle XX', 1976, 2000),
(189, 'dècada de 1980', 1981, 1990),
(190, 'dècada de 1990', 1991, 2000),
(191, 'segle XXI', 2001, 2100),
(192, 'primera meitat segle XXI', 2001, 2050),
(193, 'primer quart segle XXI', 2001, 2025),
(194, 'segon quart segle XXI', 2026, 2050),
(195, 'abans', NULL, NULL),
(196, 'circa', NULL, NULL),
(197, 'posterior', NULL, NULL),
(198, 'precís', NULL, NULL),
(199, 'Paleolític', -3000000, -9000),
(200, 'Paleolític Inferior', -3000000, -120000),
(201, 'Paleolític Inferior Arcaic', -3000000, -600000),
(202, 'Paleolític Inferior Peixos Evolucionades', -599999, -120000),
(203, 'Paleolític Inferior-Mig Indiferenciat', -119999, -50000),
(204, 'Paleolític Mig', -89999, -33000),
(205, 'Paleolític Superior', -22999, -9000),
(206, 'Paleolític-Epipaleolític', -10999, -7000),
(207, 'Epipaleolític', -8999, -5000),
(208, 'Neolític', -5499, -2200),
(209, 'Neolític Antic', -5499, -3500),
(210, 'Neolític Antic Cardial', -5499, -4000),
(211, 'Neolític Antic Postcardial', -3999, -3500),
(212, 'Neolític Mig-Recent', -3499, -2500),
(213, 'Neolític Final', -2499, -2000),
(214, 'Calcolític', -2199, -1800),
(215, 'Bronze', -1799, -650),
(216, 'Bronze Antic', -1799, -1500),
(217, 'Bronze Mig', -1499, -1200),
(218, 'Bronze Final', -1199, -650),
(219, 'Ferro-Ibèric-Colonitzacions', -649, 50),
(220, 'Ferro-Ibèric Antic', -649, -450),
(221, 'Ferro-Ibèric Ple', -449, -200),
(222, 'Romà', -218, 476),
(223, 'Romà República', -218, -50),
(224, 'Ferro-Ibèric Final', -199, -50),
(225, 'Romà August', -27, 14),
(226, 'Romà Alt Imperi', 14, 192),
(227, 'Romà Segle III', 192, 284),
(228, 'Romà Baix Imperi', 284, 476),
(229, 'Medieval', 400, 1492),
(230, 'Medieval Domini Visigòtic', 401, 715),
(231, 'Medieval Ocupació i Domini Musulmà', 715, 799),
(232, 'Medieval Món Islàmic', 800, 1150),
(233, 'Medieval Catalunya Vella sota Carolingis', 800, 988),
(234, 'Medieval Món Islàmic Emirat', 800, 899),
(235, 'Medieval Món Islàmic Califat', 900, 1015),
(236, 'Medieval Comtes de Barcelona', 988, 1150),
(237, 'Medieval Món Islàmic Taifes', 1016, 1150),
(238, 'Medieval Consolidació Corona d\'Aragó', 1150, 1230),
(239, 'Medieval Baixa Edat Mitjana', 1230, 1492),
(240, 'Modern', 1492, 1789),
(241, 'Contemporani', 1798, NULL),
(245, 'Futuro ', 2050, 2075);

-- --------------------------------------------------------

--
-- Estructura de la taula `vocabulario_estados_conservacion`
--

CREATE TABLE `vocabulario_estados_conservacion` (
  `id` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `vocabulario_estados_conservacion`
--

INSERT INTO `vocabulario_estados_conservacion` (`id`, `estado`) VALUES
(1, 'Bo'),
(5, 'desconeguda'),
(2, 'Dolent'),
(3, 'Excel·lent'),
(4, 'Indeterminat'),
(6, 'Regular');

-- --------------------------------------------------------

--
-- Estructura de la taula `vocabulario_formas_ingreso`
--

CREATE TABLE `vocabulario_formas_ingreso` (
  `id` int(11) NOT NULL,
  `forma` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `vocabulario_formas_ingreso`
--

INSERT INTO `vocabulario_formas_ingreso` (`id`, `forma`) VALUES
(1, 'cessió'),
(2, 'comodat'),
(3, 'compra'),
(4, 'dació'),
(5, 'desconeguda'),
(6, 'dipòsit'),
(7, 'donació'),
(8, 'entrega obligatòria'),
(9, 'excavació'),
(10, 'expropiació'),
(11, 'herència'),
(12, 'intercanvi'),
(13, 'llegat'),
(14, 'ocupació'),
(15, 'ofrena'),
(16, 'permuta'),
(17, 'premi'),
(18, 'propietat directa'),
(19, 'recol·lecció'),
(20, 'recuperació'),
(21, 'successió interadministrativa');

-- --------------------------------------------------------

--
-- Estructura de la taula `vocabulario_material`
--

CREATE TABLE `vocabulario_material` (
  `id` int(11) NOT NULL,
  `material` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `vocabulario_material`
--

INSERT INTO `vocabulario_material` (`id`, `material`) VALUES
(1, 'Madera'),
(2, 'Metal'),
(3, 'Piedra'),
(4, 'Cerámica'),
(5, 'Textil'),
(6, 'Vidrio'),
(7, 'Papel'),
(8, 'Plástico'),
(9, 'Compuesto'),
(10, 'Resina');

-- --------------------------------------------------------

--
-- Estructura de la taula `vocabulario_tecnica`
--

CREATE TABLE `vocabulario_tecnica` (
  `id` int(11) NOT NULL,
  `tecnica` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `vocabulario_tecnica`
--

INSERT INTO `vocabulario_tecnica` (`id`, `tecnica`) VALUES
(1, 'Óleo sobre lienzo'),
(2, 'Acuarela'),
(3, 'Escultura en mármol'),
(4, 'Fotografía'),
(5, 'Grabado'),
(6, 'Cerámica esmaltada'),
(7, 'Pintura acrílica'),
(8, 'Dibujo a lápiz'),
(9, 'Técnica mixta'),
(10, 'Collage');

-- --------------------------------------------------------

--
-- Estructura de la taula `vocabulario_tipos_exposicion`
--

CREATE TABLE `vocabulario_tipos_exposicion` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `vocabulario_tipos_exposicion`
--

INSERT INTO `vocabulario_tipos_exposicion` (`id`, `tipo`) VALUES
(1, 'Aliena'),
(2, 'Pròpia');

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `bens_exposats`
--
ALTER TABLE `bens_exposats`
  ADD KEY `fk_id_expo` (`id_exposicio`),
  ADD KEY `fk_id_obra` (`id_obra`);

--
-- Índexs per a la taula `bens_patrimonials`
--
ALTER TABLE `bens_patrimonials`
  ADD PRIMARY KEY (`Num_Registro`),
  ADD KEY `ID_Ubicacio` (`ID_Ubicacio`),
  ADD KEY `ID_Expo` (`ID_Expo`),
  ADD KEY `ID_Moviment` (`ID_Moviment`),
  ADD KEY `usuario_registra` (`usuario_registra`),
  ADD KEY `fk_vocabulario_autor` (`Autor`),
  ADD KEY `fk_vocabulario_causa_baixa` (`Causa_Baixa`),
  ADD KEY `fk_vocabulario_classificacio_generica` (`Classificacio_Generica`),
  ADD KEY `fk_vocabulario_datacio` (`Datacio`),
  ADD KEY `fk_vocabulario_estat_conservacio` (`Estat_Conservacio`),
  ADD KEY `fk_vocabulario_forma_ingres` (`Forma_Ingres`),
  ADD KEY `fk_vocabulario_material` (`Material`),
  ADD KEY `fk_vocabulario_tecnica` (`Tecnica`);

--
-- Índexs per a la taula `exposicions`
--
ALTER TABLE `exposicions`
  ADD PRIMARY KEY (`ID_Expo`),
  ADD KEY `Tipus_Expo` (`Tipus_Expo`);

--
-- Índexs per a la taula `moviments`
--
ALTER TABLE `moviments`
  ADD PRIMARY KEY (`ID_Moviment`),
  ADD KEY `fk_obra_moguda` (`Obra_moguda`);

--
-- Índexs per a la taula `restauracions`
--
ALTER TABLE `restauracions`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `ubicacions`
--
ALTER TABLE `ubicacions`
  ADD PRIMARY KEY (`ID_Ubicacio`),
  ADD KEY `padre` (`padre`);

--
-- Índexs per a la taula `usuaris`
--
ALTER TABLE `usuaris`
  ADD PRIMARY KEY (`ID_Usuari`);

--
-- Índexs per a la taula `vocabulario_autores`
--
ALTER TABLE `vocabulario_autores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Índexs per a la taula `vocabulario_causas_baja`
--
ALTER TABLE `vocabulario_causas_baja`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `causa` (`causa`);

--
-- Índexs per a la taula `vocabulario_classificacio_generica`
--
ALTER TABLE `vocabulario_classificacio_generica`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `vocabulario_datacions`
--
ALTER TABLE `vocabulario_datacions`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `vocabulario_estados_conservacion`
--
ALTER TABLE `vocabulario_estados_conservacion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `estado` (`estado`);

--
-- Índexs per a la taula `vocabulario_formas_ingreso`
--
ALTER TABLE `vocabulario_formas_ingreso`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `forma` (`forma`);

--
-- Índexs per a la taula `vocabulario_material`
--
ALTER TABLE `vocabulario_material`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `vocabulario_tecnica`
--
ALTER TABLE `vocabulario_tecnica`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `exposicions`
--
ALTER TABLE `exposicions`
  MODIFY `ID_Expo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la taula `moviments`
--
ALTER TABLE `moviments`
  MODIFY `ID_Moviment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la taula `restauracions`
--
ALTER TABLE `restauracions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la taula `ubicacions`
--
ALTER TABLE `ubicacions`
  MODIFY `ID_Ubicacio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la taula `usuaris`
--
ALTER TABLE `usuaris`
  MODIFY `ID_Usuari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la taula `vocabulario_autores`
--
ALTER TABLE `vocabulario_autores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la taula `vocabulario_causas_baja`
--
ALTER TABLE `vocabulario_causas_baja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la taula `vocabulario_classificacio_generica`
--
ALTER TABLE `vocabulario_classificacio_generica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la taula `vocabulario_datacions`
--
ALTER TABLE `vocabulario_datacions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT per la taula `vocabulario_estados_conservacion`
--
ALTER TABLE `vocabulario_estados_conservacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la taula `vocabulario_formas_ingreso`
--
ALTER TABLE `vocabulario_formas_ingreso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT per la taula `vocabulario_material`
--
ALTER TABLE `vocabulario_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la taula `vocabulario_tecnica`
--
ALTER TABLE `vocabulario_tecnica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `bens_exposats`
--
ALTER TABLE `bens_exposats`
  ADD CONSTRAINT `fk_id_expo` FOREIGN KEY (`id_exposicio`) REFERENCES `exposicions` (`ID_Expo`),
  ADD CONSTRAINT `fk_id_obra` FOREIGN KEY (`id_obra`) REFERENCES `bens_patrimonials` (`Num_Registro`);

--
-- Restriccions per a la taula `bens_patrimonials`
--
ALTER TABLE `bens_patrimonials`
  ADD CONSTRAINT `fk_usuario_registra` FOREIGN KEY (`usuario_registra`) REFERENCES `usuaris` (`ID_Usuari`),
  ADD CONSTRAINT `fk_vocabulario_autor` FOREIGN KEY (`Autor`) REFERENCES `vocabulario_autores` (`id`),
  ADD CONSTRAINT `fk_vocabulario_causa_baixa` FOREIGN KEY (`Causa_Baixa`) REFERENCES `vocabulario_causas_baja` (`id`),
  ADD CONSTRAINT `fk_vocabulario_classificacio_generica` FOREIGN KEY (`Classificacio_Generica`) REFERENCES `vocabulario_classificacio_generica` (`id`),
  ADD CONSTRAINT `fk_vocabulario_datacio` FOREIGN KEY (`Datacio`) REFERENCES `vocabulario_datacions` (`id`),
  ADD CONSTRAINT `fk_vocabulario_estat_conservacio` FOREIGN KEY (`Estat_Conservacio`) REFERENCES `vocabulario_estados_conservacion` (`id`),
  ADD CONSTRAINT `fk_vocabulario_forma_ingres` FOREIGN KEY (`Forma_Ingres`) REFERENCES `vocabulario_formas_ingreso` (`id`),
  ADD CONSTRAINT `fk_vocabulario_material` FOREIGN KEY (`Material`) REFERENCES `vocabulario_material` (`id`),
  ADD CONSTRAINT `fk_vocabulario_tecnica` FOREIGN KEY (`Tecnica`) REFERENCES `vocabulario_tecnica` (`id`),
  ADD CONSTRAINT `fk_vocabulario_tipos_exposicion` FOREIGN KEY (`ID_Expo`) REFERENCES `exposicions` (`ID_Expo`);

--
-- Restriccions per a la taula `moviments`
--
ALTER TABLE `moviments`
  ADD CONSTRAINT `fk_obra_moguda` FOREIGN KEY (`Obra_moguda`) REFERENCES `bens_patrimonials` (`Num_Registro`);

--
-- Restriccions per a la taula `ubicacions`
--
ALTER TABLE `ubicacions`
  ADD CONSTRAINT `fk_padre` FOREIGN KEY (`padre`) REFERENCES `ubicacions` (`ID_Ubicacio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
