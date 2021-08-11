-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-08-2021 a las 01:24:56
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carrito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `imagen` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `descripcion` text NOT NULL,
  `ingredientes` text NOT NULL,
  `inf_nutricional` text NOT NULL,
  `caducidad` date DEFAULT NULL,
  `precio` double NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `inventario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `cantidad` varchar(100) NOT NULL,
  `sabor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `ingredientes`, `inf_nutricional`, `caducidad`, `precio`, `imagen`, `inventario`, `id_categoria`, `cantidad`, `sabor`) VALUES
(1, 'Fanta Japonesa Premium de Naranja | 16% Zumo | 380 ml', 'Deliciosa bebida de naranja, lista para tomar', 'Agua, zumo de naranja, isoglucosa, pulpa de naranja, dióxido de carbono (E290), aroma, acidulante, colorantes (caléndula, caroteno), antioxidante: vitamina C.', 'por cada 100 ml:\r\n8 kcal, Grasas: 0g, Saturadas: 0g, Carbohidratos: 12g, Azúcares: 12g, Proteínas: 0g y Sal: 0.02g.', '2022-05-13', 100, '005-Fanta.jpg', 10, 2, '380 ml', 'naranja'),
(2, 'Fanta Japonesa Premium de Uva | 16% Zumo | 380 ml', 'deliciosa bebida de uva lista para tomar', 'agua, zumo de naranja, isoglucosa, pulpa de naranja, dióxido de carbono (E290), aroma, acidulante, colorantes (caléndula, caroteno), antioxidante: vitamina C.', '48 kcal, Grasas: 0g, Saturadas: 0g, Carbohidratos: 12g, Azúcares: 12g, Proteínas: 0g y Sal: 0.02g', '2023-07-13', 100, '006-Fanta.jpg', 10, 2, '380 ml', 'uva'),
(3, 'Pocky Choco Banana Parfait 70 gr', '5656565', 'galleta, chocolate, harina', '0.65kl por cada 100 grms', '2023-09-13', 120, '001-Pocky.png', 3, 1, '62gr', 'choco banana'),
(4, 'Pocky Chocolate Cacao Intenso 62 grs', 'inserte una descripcion aqui xd', 'galleta, chocolate, almendraz', '65kl cada 100gr', '2023-09-14', 110, '002-Pocky.jpg', 4, 1, '62gr', 'Chocolate Cacao Intenso'),
(5, 'Pocky con Almendra', 'inserte una descripcion aqui :v', 'galleta, chocolate, harina', '66kl cada 100gr', '2022-07-21', 130, '003-Pocky.png', 4, 1, '62gr', 'almendra'),
(6, 'Pocky Te Verde Matcha 70 grs.', 'Sticks Pocky recubiertos de crema de chocolate blanco y te verde japones matcha. Receta Clasica', 'Harina de TRIGO, manteca de cacao, chocolate blanco, LECHE entera en polvo, LECHE condensada, azucar, sal, aceite de palma, te verde en polvo, especias comestibles, levadura, aditivo alimentario (emulsionante E322 (lecitina de SOJA), E473, E476, antiaglomerante E500ii).', '', '2024-02-08', 120, '\r\n	004-Pocky.jpg', 20, 1, '70grms', 'Te Verde'),
(7, 'Mini Kit Kats de Banana y Caramelo 118 grs.', 'Te traemos el nuevo Kit kat japones de Banana y Caramelo, un sabor que ha triunfado entre los japoneses. Disfruta de sus barritas recubiertas de chocolate blanco con una deliciosa combinacion de banana y dulce caramelo, con un interior de crujiente barquillo.', 'Azucar, LECHE entera en polvo, aceite vegetal, harina de TRIGO, masa de cacao, LACTOSA, manteca de cacao, semola de SOJA en polvo, platano en polvo, caramelo en polvo, cacao en polvo, levadura, lecitina de SOJA, aromas, bicarbonato sodico, levadura en polvo.', 'por cada 100 ml:\r\n8 kcal, Grasas: 0g, Saturadas: 0g, Carbohidratos: 12g, Azucares: 12g, Proteinas: 0g y Sal: 0.02g.', '2024-03-20', 130, '\r\n	00013-KitKat.jpg', 50, 1, '118grms', 'Banana y Caramelo '),
(8, 'Refresco Sabor Chupa Chups Limon Cream 250 ml.', '¡Refresco de Chupa Chups! Disfruta de su sabor a Chupa Chups de Limon con Nata. Todo el sabor de Chupa Chups, ahora en extraordinario refresco.', 'Agua, jarabe de glucosa-fructosa, azucar, 1% de zumo de limon, LECHE fermentada concentrada [LECHE, LECHE en polvo desnatada, cultivo iniciador (I.Acidophilus, B.lactis), lactasa], LECHE en polvo [LECHE en polvo desnatada, suero en polvo (LECHE)], dioxido de carbono, estabilizador: hemicelulosa de SOJA, reguladores de la acidez (E330, E338), colorante E105, espirulina, aromas.', '48 kcal, Grasas: 0g, Saturadas: 0g, Carbohidratos: 12g, Azucares: 12g, Proteinas: 0g y Sal: 0.02g', '2024-05-21', 80, '\r\n	007-Chups.jpg', 50, 2, '250ml', 'Limon'),
(9, 'Refresco Sabor Chupa Chups Fresa Cream 250 ml.', '¡Refresco de Chupa Chups! Disfruta de su sabor a Chupa Chups de Fresa con Nata. Todo el sabor de Chupa Chups, ahora en extraordinario refresco.', 'Agua, jarabe de glucosa-fructosa, azucar, 1% de zumo de limon, LECHE fermentada concentrada [LECHE, LECHE en polvo desnatada, cultivo iniciador (I.Acidophilus, B.lactis), lactasa], LECHE en polvo [LECHE en polvo desnatada, suero en polvo (LECHE)], dioxido de carbono, estabilizador: hemicelulosa de SOJA, reguladores de la acidez (E330, E338), colorante E105, espirulina, aromas.', '48 kcal, Grasas: 0g, Saturadas: 0g, Carbohidratos: 12g, Azucares: 12g, Proteinas: 0g y Sal: 0.02g', '2021-11-18', 80, '\r\n	008-Chups.jpg', 50, 2, '250ml', 'Fresa'),
(12, 'Cookies Milka de Cacao y Relleno de Crema Oreo 182 grs.', 'Pastelitos de bizcocho esponjoso con un delicioso relleno de crema de Frutas del Bosque. ¡Descubre los pastelitos más vendidos en USA, son tan populares que su producción alcanza a los quinientos millones cada año!', 'Azúcar, harina de TRIGO, aceites vegetales (girasol, canola), aceite de palma, NATA, cacao en polvo, suero de LECHE en polvo, almidón, LECHE entera en polvo, masa de cacao, manteca de cacao, almidón de TRIGO, leudantes (E503, E500, E450), LACTOSA, lecitina de SOJA, sal, aromas, LECHE desnatada en polvo.', '514 kcal, Grasas: 28g, Saturadas: 9.8g, Carbohidratos: 60g, Azúcares: 38g, Proteínas: 4.1g & Sal: 0.58g', '2022-01-29', 115, '\r\n	00011-Oreo.jpg', 10, 1, '182 gr', 'Cacao y crema Oreo'),
(13, 'Mini Kit Kats de Helado de Melocotón | 12 Unidades', 'Te traemos el nuevo Kit kat japonés de Helado Parfait de Melocotón, un sabor que ha triunfado entre los japoneses. Disfruta de sus barritas recubiertas de chocolate blanco con sabor a melocotón japonés con crema de leche, con un interior de crujiente barquillo.', 'chocolate (azúcar, LACTOSA, grasa vegetal, LECHE entera en polvo, manteca de cacao), harina de TRIGO, grasa vegetal, LACTOSA, azúcar, zumo de melocotón en polvo, CREMA en polvo, zumo de limón en polvo, levadura, cacao en polvo, LECHE entera en polvo, masa de cacao, manteca de cacao, sémola de SOJA en polvo, lecitina de SOJA, aromas, bicarbonato sódico, colorantes (E169, monascus), levadura en polvo.', '556 kcal, Grasas: 31.3g, Carbohidratos: 63.6g, Proteínas: 3.6g & Sal: 0.1g', '2021-12-31', 150, '\r\n	00014-KitKat.jpg', 12, 1, ' 118,8 grs', 'Helado de Melocotón'),
(14, 'Galletas Snack Chocobi Shin Chan Sorbete de Limón', 'Las famosas Galletas chocobi Shin Chan de Sorbete de Limón ahora te las llevamos a casa!\r\nDisfruta de las populares y deliciosas \"galletas\" snack de Shin Chan, con sabor a sorbete de limón. Edición Limitada.', 'Ingredientes: sémola de maíz, azúcar, aceite de palma, margarina, LECHE azucarada, sal, miel, limón en polvo, sorbitol, calcio de cáscara de HUEVO, aromas, emulsionantes, colorante E160b, acidulantes. Contiene SOJA.', '544 kcal, Grasas: 31.7g, Carbohidratos: 62g, Proteínas: 2.8g & Sal: 0.72g', '2021-10-21', 150, '\r\n	00040-Chocobi.jpg', 15, 1, '18 grs.', 'Sorbete de Limón'),
(15, 'Refresco Mitsuya Luxury Momo Akatsuki Sparkling | Premium | 450 ml.', 'Disfruta de este elegante refresco con un hermoso color melocotón intenso y brillante, y ligeramente gasificado, elaborado con el zumo de los delicados melocotones blancos japoneses combinado con la pulpa. Gíralo para mezclarlo correctamente y disfrutar de todo su sabor.', 'Agua, jarabe de maíz alto en fructosa, azúcar, zumo de melocotón, ácido carbónico, acidulantes, aromas, vitamina C, goma xantana.', '52 kcal, Grasas: 0g, Saturadas: 0g, Carbohidratos: 13g, Proteínas: 0g & Sal: 0.04g', '2021-09-10', 70, '\r\n	00020-Mitsuya.jpg', 10, 2, '450 ml.', 'Akatsuki Sparkling'),
(16, 'Bebida Japonesa de Uva Blanca y Aloe Vera | Minute Maid 280 ml', 'Bebida Japonesa de Uva Blanca y Aloe Vera | Minute Maid\r\nMinute Maid Japan nos trae su exquisita y refrescante bebida de zumo de Uva blanca, Aloe Vera y Biotina. ¡Disfruta de una bebida excepcional y muy veraniega!', '\r\nIngredientes: jarabe de maíz alto en fructosa, aloe vera, zumo de uva, acidulante, aromas, vitamina C, biotina.', '40 kcal, Grasas: 0g, Saturadas: 0g, Carbohidratos: 10g, Proteínas: 0g & Sal: 0g', '2021-10-31', 50, '\r\n	00041-uva.jpg', 20, 2, '280 ml.', 'Uva Blanca y Aloe Vera'),
(17, 'Refresco de Yogur y Limón Milky Chichiyasu 350 ml.', 'Te sorprenderá nuestro Refresco de Yogur y Limón Milky Chichiyasu 350 ml\r\nRefresco de yogur de Chichiyasu con un toque a limón. Dulce como una ramune, y nutritivo como un yogur. Contiene bacterias de ácido láctico que contribuyen al buen funcionamiento del aparato digestivo.', 'agua, azúcares (isoglucosa, azúcar), LECHE desnatada en polvo, LECHE fermentada, pasta de limón, producto lácteo probiótico pasteurizado en polvo, dióxido de carbono, espesantes (polisacáridos de SOJA, pectina), aroma, acidulante, antioxidante: Vit. C.', '40 kcal, Grasas: 0g, Saturadas: 0g, Carbohidratos: 9.8g, Azúcares: 9.8g, Proteínas: 0.3g & Sal: 0.02g', '2021-08-31', 50, '\r\n	00042-limon.jpg', 15, 2, '350 ml.', 'Yogur y Limón Milky Chichiyasu'),
(18, 'Fanta Japonesa de Yogur de Uva | 380 ml', 'Presentamos la Fanta Japonesa de Yogur de Uva\r\nFanta japonesa elaborada con yogur y uva verde. Contiene 10 mil millones de bacterias de ácido láctico. Una delicia refrescante que llega desde Japón de forma limitada.', 'agua carbonatada, isoglucosa, LECHE fermentada, LECHE desnatada en polvo, crema, bacterias de ácido láctico (esterilización) en polvo, acidulante, aromas, estabilizantes [polisacáridos de SOJA, pectina (E440)], edulcorantes (E950, E955), antiespumante E900.', '36 kcal, Grasas: 0g, Saturadas: 0g, Carbohidratos: 9g, Azúcares: 9g, Proteínas: 0g & Sal: 0.05g', '2021-09-21', 65, '\r\n	00043-fanta.jpg', 20, 2, '380 ml.', 'Yogur de Uva'),
(19, 'Pringles Sabor a Pollo Japonés Karaage 53 grs', 'Ahora disfruta del sabor de Pringles Japonesas Sabor a Pollo Japonés Karaage\r\nDisfruta de las auténticas y genuinas Pringles japonesas con sabor a pollo frito japonés, Kaarage. Edición Pocket.', 'copos de patata, aceite vegetal, almidón de TRIGO, condimento en polvo (sal, maltodextrina, especias, azúcar, extracto de levadura, ajo en polvo, cebolla en polvo, proteínas hidrolizadas), harina de arroz, maltodextrina, glucosa, lecitina de SOJA, aminoácidos, especias (contiene derivados de la SOJA, LECHE), corrector del pH.', '530 kcal, Grasas: 30g, Carbohidratos: 58.7g, Proteínas: 6.6g & Sal: 1.7g', '2022-03-31', 75, '\r\n	009-Pringles.jpg', 30, 3, '53 GRS.', 'Pollo Japonés Karaage'),
(20, 'Pringles Genuine Sabor a Parmesano con Ajo Tostado 158 grs', 'Ahora disfruta de los sabores de Pringles Genuine Sabor a Parmesano con Ajo Tostado.\r\nDisfruta de las auténticas y genuinas Pringles con sabor a Parmesano con ajo tostado.', 'patatas deshidratadas, aceite vegetal (maíz, semilla de algodón, SOJA alto oleico y/o girasol), harina de maíz desgerminado, maltodextrina, mono y diglicéridos. Contiene 2% o menos de: sal, ajo, suero de LECHE, ácido cítrico, glutamato monosódico, azúcar, cebolla, queso parmesano (LECHE semidesnatada, cultivos de queso, sal, enzimas), especias, aromas naturales, almidón de TRIGO.', '536 kcal, Grasas: 32.1g, Saturadas: 8.9g, Carbohidratos: 57.1g, Azúcares: 0.9g, Proteínas: 0g & Sal: 0.64g', '2022-03-21', 75, '\r\n	010-Pringles.jpg', 15, 3, '158 grs.', 'Parmesano con Ajo Tostado.'),
(21, 'Patatas Kokeiya de Carne con Miso Picante 60 grs.', 'Deliciosas Patatas Fritas Chips sazonadas con sabor a carne condimentada con miso y especias picantes. Muy Crujientes y sabrosas. Sabor muy picante.\r\nMarca N.º 1 en Japón', 'patatas, aceite de palma, glucosa, azúcar, sal, especias, proteína hidrolizada de SOJA, condimento de extracto de carne en polvo (contiene LÁCTEOS, TRIGO, ternera, SÉSAMO, SOJA, pollo, cerdo), MISO en polvo, aceite aromatizante (contiene TRIGO, SOJA), aminoácidos, extracto de especias, colorante E160c, acidulante, edulcorante E960, aromas (contiene SOJA).', '558 kcal, Grasas: 35g, Carbohidratos: 56.2g, Proteínas: 4.7g & Sal: 1.7g', '2021-08-16', 50, '\r\n	011-Kokeiya.jpg', 30, 3, '60 grs.', 'Carne con Miso Picante'),
(22, 'Patatas Calbee Sabor Yuzu y Guindilla Verde | 36 grs. |', 'patata, aceite de palma, sal, pasta de yuzukosho (chile, piel de yuzu, sal), dextrina, azúcar, almidón de maíz, proteína hidrolizada de SOJA, extracto de pollo en polvo, extracto de levadura fermentada en polvo, zumo de yuzu en polvo, chile en polvo, aminoácidos, aromas, acidulantes, stevia, extracto de especias, colorantes (cártamo, E160b, E164), vitamina C.', 'Disfruta las exquisitas Patatas Calbee Sabor Yuzu y Guindilla Verde\r\nExquisitas patatas kanage, fritas en rodajas gruesas con yuzu y guindilla verde. Resalta su aroma y su acidez refrescante. Disfruta de las Calbee Yuzukosho.', '508 kcal, Grasas: 26.2g, Saturadas: 14.6g, Carbohidratos: 62g, Azúcares: 2.6g, Proteínas: 6.17g & Sal: 1.33g', '2022-06-30', 50, '\r\n	012-Yuzu.jpg', 15, 3, '36 grs.', 'Yuzu y Guindilla Verde'),
(23, 'Patatas Lays Sabor a Queso 140 grs', 'Descubre las Patatas Lays Sabor a Queso\r\nDeliciosas patatas Lays extra crujientes con sabor a queso fundido.', 'patatas, aceites vegetales (girasol, canola), suero de LECHE en polvo (contiene proteína de la LECHE, LACTOSA), sal, dextrosa, aromas, QUESO en polvo (contiene proteína de la LECHE, LACTOSA), extracto de pimiento rojo.\r\n', '525 kcal, Grasas: 33g, Saturadas: 2.7g, Carbohidratos: 48g, Azúcares: 3.2g, Proteínas: 6.9g & Sal: 1.2g', '2022-07-19', 65, '\r\n	00008-Cheetos.jpg', 35, 3, '140 grs.', 'Queso fundido.'),
(24, 'Patatas Chips Calbee Hot & Spicy 55 grs.', '¡Qué sabrosas están nuestras Patatas Chips Calbee Hot & Spicy!\r\nDeliciosas Patatas Fritas Chips de Calbee sazonadas con especias picantes. Muy Crujientes y sabrosas.', 'patata, aceite de palma, aceite de canola, especias, azúcar, potenciadores del sabor (E621, E627, E631, E640), sal, salsa de SOJA en polvo (SOJA, TRIGO, potenciadores del sabor (E621, E631), colorante E150c), extracto de levadura, proteína de SOJA hidrolizada, antiaglomerante (E551, E535, E500), especias (contiene emulgente E471), aromas , maltodextrina, edulcorante: aspartamo E951).', '544 kcal, Grasas: 36g, Saturadas: 14.6g, Carbohidratos: 53.1g, Azúcares: 2.2g, Proteínas: 5.9g & Sal: 1.3g', '2022-08-26', 60, '\r\n	00044-Calbee.jpg', 30, 3, '55 grs.', 'Calbee Hot & Spicy'),
(25, 'Mix de Snack de Arroz Senbei y Cacahuetes con Wasabi Big 182 grs.', 'Saborea el snack más japonés. Mix de Snack de Arroz Senbei y Cacahuetes con Wasabi Big.\r\nEl snack de arroz y cacahuetes más popular de Japón. Un delicioso mix de snack de arroz tostado con soja y wasabi con cacahuetes para disfrutar en cualquier momento.', 'CACAHUETES (CACAHUETES, aceites vegetales (palma, SOJA), sal), harina de arroz, almidón, salsa de SOJA (TRIGO, SOJA), condimentos con sabor a wasabi (TRIGO, SOJA), azúcar, extracto de BONITO, proteínas hidrolizadas (HUEVO, TRIGO, SOJA, pollo, carne de cerdo), extracto de kombu, wasabi, aminoácidos, almidón modificado, extracto de especias, sorbitol, aroma, colorantes (E160c, E150a), lecitina de SOJA.', '476 kcal, Grasas: 19.2g, Saturadas: 1.6g, Carbohidratos: 61.6g, Azúcares: 0.8g, Proteínas: 14.2g & Sal: 1.85g', '2022-08-25', 40, '\r\n	00045-wasabi.jpg', 45, 3, '182 grs.', 'Arroz Senbei y Cacahuetes con Wasabi'),
(26, 'Patatas Kettle de Brisket de Ternera BBQ | 135 grs.', 'Te traemos las patatas con el sabor más exquisito. Patatas Kettle de Brisket de Ternera BBQ\r\nPatatas elaboradas y fritas a mano, condimentadas con exquisita Brisket (pecho) de ternera asado a la barbacoa. Ideal para disfrutar durante cualquier fiesta.', 'patatas, aceite de girasol, extracto de levadura, azúcar molida, azúcar glas, sal marina, tomate seco, sal, aromas naturales, pimentón ahumado, harina de arroz ahumado, cebolla seca, azúcar caramelizada, vinagre de alcohol en polvo, extracto de melaza seco, ácido cítrico, bistec de ternera asado en polvo, pimienta negra, hinojo.', '505 kcal, Grasas: 27.9g, Saturadas: 2.8g, Carbohidratos: 53.6g, Azúcares: 2.3g, Proteínas: 7.3g & Sal: 1.3g', '2022-08-28', 70, '\r\n	00046-bbq.jpg', 10, 3, '135 grs.', 'Brisket de Ternera BBQ'),
(27, 'Fideos Ramen Miso Tonkotsu | Nihon Golden Premium', 'aborea nuestros estupendos Fideos Ramen Miso Tonkotsu | Nihon Golden Premium\r\nDeliciosos ramen gruesos elaborados sopa de miso fresco, cerdo y especias para ramen. Receta Premium.', 'FIDEOS: harina de TRIGO, sal, proteína vegetal, aceite vegetal, clara de HUEVO. SOBRE DE SOPA: miso (SOJA), extracto de cerdo, sal, especias, aceites y grasas aromatizados, extracto vegetal, aceite de palma, manteca de cerdo, azúcar, condimentos fermentados, zumo de fruta, proteína hidrolizada de SOJA, almidón modificado, aminoácidos (SÉSAMO), trehalosa, alcohol, agua salada, carbonato de calcio, colorante caramelo, lecitina de SOJA, antioxidantes (vitamina E), colorante gardenia.', '329 kcal, Grasas: 6.11g, Carbohidratos: 59g, Proteínas: 9.54g & Sal: 4.91g', '2023-09-08', 60, '\r\n	00021-Miso.jpg', 20, 4, '108 grs. (500 ml.)', 'Miso Tonkotsu'),
(28, 'Fideos Ramen Shio Tonkotsu | Nihon Golden Premium', 'Hoy toca: Fideos Ramen Shio Tonkotsu | Nihon Golden Premium\r\nDeliciosos ramen gruesos elaborados con caldo claro shio, sésamo, pollo, cerdo y especias para ramen.', 'FIDEOS: harina de TRIGO, sal, aceite vegetal, clara de HUEVO. SOPA: extracto de pollo, sal, extracto de cerdo, aceite aromatizado, salsa de SOJA, extracto vegetal, azúcar, especias, extracto de MARISCO,  proteína hidrolizada. Almidón procesado, aminoácidos, alcohol, trehalosa, agua salada, carbonato de calcio, lecitina (SOJA), antioxidantes (Vit. C, Vit E), espesante polisacárido, aromas, colorante de gardenia. Contiene LECHE y SÉSAMO.', '315 kcal, Grasas: 5.54g, Carbohidratos: 57.68g, Proteínas: 8.66g & Sal: 6.1g', '2022-09-12', 60, '\r\n	00022-Shio.jpg', 45, 4, '112 grs. (500 ml.)', 'Shio Tonkotsu'),
(29, 'Fideos Ramen Shoyu Seimen | Nihon Golden Premium 105 grs', '\r\nPreparación:\r\nCocinar los fideos en 500 ml. de agua hirviendo, durante 2 minutos. En un bol, verter la salsa y mezclar con un poco del agua de la cocción, después añadir los fideos con el agua. ¡Ya están listos para saborear! Puedes añadirles los toppings que quieras.\r\n\r\nPaís de origen: Japón.\r\n\r\n', 'TALLARINES: harina de TRIGO, aceite de palma, sal, proteína vegetal, clara de HUEVO. CONDIMENTOS: salsa de SOJA, manteca de cerdo, extracto de MARISCOS, sal, extracto de pollo, extracto de cerdo, aceite aromatizante, azúcar, especias, extracto de levadura, almidón procesado, aminoácidos, trehalosa, pollo, sake, carbonato cálcico, lecitina de SOJA, vitaminas (C, E), colorantes (E150c, tinta de CALAMAR), espesante polisacárido, aromas.', '321 kcal, Grasas: 7.1g, Carbohidratos: 54g, Proteínas: 10.2g & Sal: 5.4g', '2022-09-26', 60, '\r\n	00023-Shoyu.jpg', 25, 4, '105 grs. (500 ml.)', 'Shoyu Seimen'),
(30, 'Fideos Ramen Soja y Pollo | Nihon Golden Premium', 'Saborea nuestros estupendos Fideos Ramen Soja Pollo | Nihon Golden Premium\r\nDeliciosos ramen gruesos elaborados sopa de miso fresco, cerdo y especias para ramen. Receta Premium.', 'FIDEOS: harina de TRIGO, sal, proteína vegetal, aceite de palma, clara de HUEVO. SOBRE DE CONDIMENTOS: salsa de SOJA, extracto de pollo, sal, aceite de palma, grasa de pollo, extracto de carne de cerdo, azúcar, especias, extractos vegetales, condimentos fermentados, proteína hidrolizada, extracto de levadura, aceite aromatizado, almidón modificado, aminoácidos, trehalosa, salmuera, alcohol, carbonato de calcio, lecitina, colorante E150c, aromas, vitamina E, extractos de especias, colorante E164, polisacáridos, edulcorante regaliz. Contiene LECHE.', '315 kcal, Grasas: 4.1g, Saturadas: 2.1g, Carbohidratos: 60.19g, Azúcares: 2g, Proteínas: 9.33g & Sal: 5.24g', '2022-09-28', 60, '\r\n	00024-Soja.jpg', 50, 4, '105 grs. (500 ml.)', 'Soja Pollo'),
(31, 'Fideos Ramen Shio Yasai no Dashi | Summer Ramen 85 grs.', 'El auténtico sabor de Japón ahora en tu mesa. Prueba nuestros Fideos Ramen Shio  Yasai no Dashi \r\nUn ramen ideal para el verano. Elaborado con vegetales variados, col china, cebolletas, zanahoria, maíz, dashi no moto (caldo de virutas de bonito) y marisco. Receta Gyokai de Itomen.', 'TALLARINES: harina de TRIGO, grasas y aceites vegetales. CONDIMENTOS: sal, azúcar, vegetales en polvo (cebolla, ajo), especias, extracto de BONITO, extracto de levadura, extracto de col china, MARISCOS en polvo (BONITO en polvo, SARDINAS en polvo), cebolletas, aminoácidos, agua kanshui, lecitina de SOJA, colorante E150c, vitamina E. Contiene LÁCTEOS, CRUSTÁCEOS, MOLUSCOS.', '467 kcal, Grasas: 21.3g, Carbohidratos: 58.2g, Proteínas: 10.7g & Sal: 4.8g', '2022-06-21', 40, '\r\n	00025-Yasai.jpg', 5, 4, '85 grs. (250 ml.)', ' dashi no moto'),
(32, 'Fideos Ramen Shoyu Yasai no Dashi | Summer Ramen 85 grs.', 'El auténtico sabor de Japón ahora en tu mesa. Prueba nuestros Fideos Ramen Shoyu Yasai no Dashi | Summer Ramen\r\nUn ramen ideal para el verano. Elaborado con Soja y vegetales variados, col china, cebolletas, zanahoria, maíz, dashi no moto (caldo de virutas de bonito) y marisco. Receta Gyokai de Itomen.', 'TALLARINES: harina de TRIGO, aceite vegetal. CONDIMENTOS: sal, salsa de SOJA en polvo, vegetales en polvo (cebolla, ajo), especias, extracto de col china, MARISCOS en polvo (SARDINAS en polvo, BONITO en polvo), cebolletas, aminoácidos, colorante E150c, agua kanshui, lecitina de SOJA, acidulante, vitamina E. Contiene LÁCTEOS, CRUSTÁCEOS, MOLUSCOS.', '475 kcal, Grasas: 22.2g, Carbohidratos: 58g, Proteínas: 10.7g & Sal: 5g', '2022-07-15', 50, '\r\n	00027-Yasai.jpg', 10, 4, '85 grs. (250 ml.)', 'Shoyu Yasai no Dashi'),
(33, 'Fideos Soba de Pollo Nanban 71 grs.', 'Nuevos y exquisitos Fideos Soba de Pollo Nanban.\r\nExquisitos fideos ramen soba de sarraceno, elaborados con caldo pollo y albóndigas de pollo, algas y verduras. Receta de Nanban. Salsa picante de miso, puerro y shichimi. Sabor picante', 'TALLARINES: harina de TRIGO, harina de trigo sarraceno, aceites vegetales (palma, canola, SOJA), sal, proteínas vegetales, harina de HUEVO, salsa de SOJA. SOPA: azúcares, salsa de SOJA, sal, dextrina, hidrolizado de proteínas, BONITO en polvo, aceites vegetales (palma, canola, SOJA), especias, extracto de BONITO en polvo, aceite aromatizado, extracto de algas marinas, condimento aromatizante. TOPPINGS: pollo sazonado, cebolleta, sal inorgánica, almidón procesado, trehalosa, colorante E150c, fosfato sódico, carbonato de magnesio, carbonato de calcio, lecitina de SOJA, acidulante, espesante polisacárido, vitamina E, aromas, vitaminas (B2, B1), sucralosa. Contiene LÁCTEOS, CRUSTÁCEOS, SÉSAMO.', '454 kcal, Grasas: 18.9g, Saturadas: 9.2g, Carbohidratos: 58.5g, Azúcares: 0.1g, Proteínas: 12.4g & Sal: 4.37g', '2022-07-21', 35, '\r\n	00026-Dashi.jpg', 6, 4, '71 grs. (300 ml.)', 'Pollo Nanban'),
(34, 'Fideos Soba kon no Kitsune 88 grs', 'Deliciosos Fideos Soba kon no Kitsune\r\nFideos Soba elaborados con delicioso caldo dashi no moto y kombu, salsa soja, cebolla, puerro, aburaáge frito, con topping de tempura y naruto.', 'TALLARINES: harina de TRIGO, harina de trigo sarraceno, aceites vegetales (palma, canola, SOJA), proteína vegetal, sal, ñame, clara de HUEVO. TOPPINGS: TOFU frito sazonado, cebolla frita, pastel de PESCADO. SOPA: sal, salsa de SOJA, azúcar, extracto de MARISCO, proteínas hidrolizadas, especias, cebolla, extracto de kombu, aceite vegetal, harina de TRIGO procesada, aminoácidos, carbonato cálcico, fosfato sódico, espesante polisacárido, colorante E150c, vitamina E, acidulantes, lecitina de SOJA, colorante de arroz de levadura roja, vitaminas (B2, B1), colorante E160b. Contiene LÁCTEOS.', '438 kcal, Grasas: 19.2g, Saturadas: 3.4g, Carbohidratos: 51g, Azúcares: 0.1g, Proteínas: 15.5g & Sal: 6.02g', '2022-08-12', 35, '\r\n	00028-Soba.jpg', 6, 4, '88 grs. (360 ml.)', 'Soba kon no Kitsune'),
(35, 'Fanta Japonesa de Gelatina Furu Furu | Sabor Uva 180 ml', 'No te pierdas nuestra Fanta Japonesa de Gelatina | Sabor Uva\r\nDivertida y refrescante Fanta de Uva japonesa con trocitos de gelatina. La única Fanta del mundo que se debe agitar antes de beber.', 'agua carbonatada, azúcar (fructosa), aromas, carbonato, acidulante (ácido fosfórico), agente gelificante (polisacárido), lactato de calcio, colorantes (150a, antocianinas), Vit. C, Vit B6.', 'agua carbonatada, azúcar (fructosa), aromas, carbonato, acidulante (ácido fosfórico), agente gelificante (polisacárido), lactato de calcio, colorantes (150a, antocianinas), Vit. C, Vit B6.', '2022-03-25', 40, '\r\n	00047-jelly.jpg', 100, 2, '180 ml.', 'Uva'),
(36, 'Cereales de Pokemon | Berry Bolt 292 grs', 'Desayuna diferente con nuestros Cereales de Pokemon | Berry Bolt\r\nCereales Pokemon de maíz inflado con sabor a frutas del bosque, y marshmallows con forma de Pikachu. ¡Prepárate para el 25 aniversario de Pokémon con estos nuevos cereales! Edición limitada.', 'maíz integral, azúcar, harina de maíz, jarabe de maíz, almidón modificado de maíz, dextrosa, aceites vegetales (canola y/o girasol), sal, acidulantes (E341iii, E339iii), colorantes (E129*, E102*, E110*, E133), gelatina, aromas naturales y artificiales. Vitaminas y minerales: carbonato cálcico, Vit. C, hierro y zinc, Vitaminas (B3, B6, B1, B2, B12, ácido fólico, D3). *Puede tener efectos negativos sobre la actividad y atención de los niños.', '384 kcal, Grasas: 2.56g, Saturadas: 0g, Carbohidratos: 87g, Azúcares: 31g, Proteínas: 5g & Sal: 1.3g', '2023-02-03', 100, '\r\n	00048-poke.jpg', 100, 3, '292 grs.', 'Berry Bolt');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_venta`
--

CREATE TABLE `productos_venta` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `precio` double NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img_perfil` varchar(300) NOT NULL,
  `nivel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total` double NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_venta`
--
ALTER TABLE `productos_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `productos_venta`
--
ALTER TABLE `productos_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
