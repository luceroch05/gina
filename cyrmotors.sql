-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2024 a las 03:11:02
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cyrmotors`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`) VALUES
(1, 'Motor'),
(2, 'Transmisión'),
(3, 'Suspensión'),
(4, 'Frenos'),
(5, 'Sistema Eléctrico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `correo`, `direccion`, `telefono`) VALUES
(1, 'Juan Pérez', 'juan.perez@example.com', 'Av. Siempre Viva 123', '987654321'),
(2, 'Ana Gómez', 'ana.gomez@example.com', 'Calle Falsa 456', '987123456'),
(3, 'Luis Fernández', 'luis.fernandez@example.com', 'Av. Los Olivos 789', '987321654'),
(4, 'María Rodríguez', 'maria.rodriguez@example.com', 'Jr. Las Flores 987', '987456123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id_detalle` int(11) NOT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `id_repuesto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `preciounitario` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`id_detalle`, `id_pedido`, `id_repuesto`, `cantidad`, `preciounitario`) VALUES
(1, 1, 1, 2, 50.00),
(2, 1, 2, 1, 120.00),
(3, 2, 3, 1, 200.00),
(4, 3, 4, 1, 400.00),
(5, 4, 5, 1, 1500.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `id_metodopago` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `metodo_pago`
--

INSERT INTO `metodo_pago` (`id_metodopago`, `nombre`) VALUES
(1, 'Yape'),
(2, 'Plin'),
(3, 'Tarjeta de Crédito'),
(4, 'Tarjeta de Débito'),
(5, 'Transferencia Bancaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_metodopago` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_cliente`, `fecha`, `id_metodopago`) VALUES
(1, 1, '2024-10-01', 1),
(2, 2, '2024-10-02', 2),
(3, 3, '2024-10-03', 3),
(4, 4, '2024-10-04', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion`
--

CREATE TABLE `promocion` (
  `id_promocion` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `porcentaje_descuento` decimal(5,2) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `promocion`
--

INSERT INTO `promocion` (`id_promocion`, `nombre`, `descripcion`, `porcentaje_descuento`, `fecha_inicio`, `fecha_fin`, `activo`) VALUES
(1, 'Descuento de Verano', 'Promoción del 15% en repuestos seleccionados.', 15.00, '2024-01-01', '2024-02-28', 1),
(2, 'Black Friday', '50% de descuento en toda la tienda.', 50.00, '2024-11-25', '2024-11-30', 1),
(3, 'Navidad', '20% de descuento en compras superiores a S/500.', 20.00, '2024-12-15', '2024-12-31', 1),
(4, 'Descuento Especial', '30% en repuestos para motor.', 30.00, '2024-05-01', '2024-05-31', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion_repuesto`
--

CREATE TABLE `promocion_repuesto` (
  `id_promorepuesto` int(11) NOT NULL,
  `id_promocion` int(11) DEFAULT NULL,
  `id_repuesto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `promocion_repuesto`
--

INSERT INTO `promocion_repuesto` (`id_promorepuesto`, `id_promocion`, `id_repuesto`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 2, 2),
(4, 3, 4),
(5, 4, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuesto`
--

CREATE TABLE `repuesto` (
  `id_repuesto` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `repuesto`
--

INSERT INTO `repuesto` (`id_repuesto`, `descripcion`, `precio`, `stock`, `id_categoria`, `imagen`) VALUES
(1, 'Filtro de aceite', 50.00, 30, 1, 'filtro_aceite.jpg'),
(2, 'Juego de pastillas de freno', 120.00, 50, 4, 'pastillas_freno.jpg'),
(3, 'Amortiguador delantero', 200.00, 20, 3, 'amortiguador.jpg'),
(4, 'Batería 12V', 400.00, 15, 5, 'bateria_12v.jpg'),
(5, 'Caja de cambios', 1500.00, 5, 2, 'caja_cambios.jpg'),
(6, 'Filtro de aceite para motor de 4 cilindros', 35.50, 15, 1, 'filtro_aceite.jpg'),
(7, 'Juego de pastillas de freno delantero', 90.99, 20, 2, 'pastillas_freno.jpg'),
(8, 'Amortiguador trasero de alta resistencia', 185.00, 10, 3, 'amortiguador.jpg'),
(9, 'Bujía de encendido para autos a gasolina', 18.20, 50, 1, 'bujia_encendido.jpg'),
(10, 'Correa de distribución para motor diésel', 150.00, 8, 1, 'correa_distribucion.jpg'),
(11, 'Filtro de aire de alto rendimiento', 45.00, 25, 1, 'filtro_aire.jpg'),
(12, 'Kit de embrague completo', 550.00, 5, 4, 'kit_embrague.jpg'),
(13, 'Sensor de oxígeno para motor de 6 cilindros', 130.75, 12, 5, 'sensor_oxigeno.jpg'),
(14, 'Bomba de agua para sistema de refrigeración', 200.00, 7, 3, 'bomba_agua.jpg'),
(15, 'Alternador para autos eléctricos', 750.50, 3, 4, 'alternador.jpg'),
(16, 'Juego de cables para bujías', 60.99, 20, 1, 'cables_bujias.jpg'),
(17, 'Filtro de combustible para vehículos GLP', 25.50, 18, 1, 'filtro_combustible.jpg'),
(18, 'Disco de freno ventilado', 110.00, 16, 2, 'disco_freno.jpg'),
(19, 'Resorte de suspensión delantera', 75.00, 10, 3, 'resorte_suspension.jpg'),
(20, 'Termostato para sistema de enfriamiento', 35.99, 22, 1, 'termostato.jpg'),
(21, 'Caja de cambios automática', 1450.00, 2, 4, 'caja_cambios.jpg'),
(22, 'Sensor de temperatura del refrigerante', 85.00, 13, 5, 'sensor_temperatura.jpg'),
(23, 'Filtro de partículas para autos diésel', 400.50, 4, 1, 'filtro_particulas.jpg'),
(24, 'Radiador para camionetas', 750.00, 3, 3, 'radiador.jpg'),
(25, 'Batería para auto de 12V', 320.00, 6, 4, 'bateria_12v.jpg'),
(26, 'Inyector de combustible para motor de 4 cilindros', 215.50, 8, 5, 'inyector_combustible.jpg'),
(27, 'Ventilador de radiador', 280.00, 5, 3, 'ventilador_radiador.jpg'),
(28, 'Líquido de frenos DOT 4', 12.50, 30, 2, 'liquido_frenos.jpg'),
(29, 'Juego de llantas para SUV', 1250.00, 4, 3, 'llantas_suv.jpg'),
(30, 'Aceite de motor sintético 5W-30', 45.00, 20, 1, 'aceite_motor.jpg'),
(31, 'Cilindro maestro de frenos', 210.00, 9, 2, 'cilindro_frenos.jpg'),
(32, 'Sensor de posición del cigüeñal', 135.99, 7, 5, 'sensor_cigueñal.jpg'),
(33, 'Plumillas para parabrisas', 35.00, 15, 3, 'plumillas_parabrisas.jpg'),
(34, 'Bomba de gasolina para autos a gasolina', 310.00, 3, 1, 'bomba_gasolina.jpg'),
(35, 'Kit de frenos ABS', 950.00, 5, 2, 'kit_abs.jpg'),
(36, 'Suspensión de aire para autos de lujo', 2200.00, 2, 3, 'suspension_aire.jpg'),
(37, 'Lubricante de transmisión automática', 95.00, 12, 1, 'lubricante_transmision.jpg'),
(38, 'Alternador de alta capacidad', 670.00, 6, 4, 'alternador_alta.jpg'),
(39, 'Bobina de encendido para motor de 8 cilindros', 215.50, 8, 5, 'bobina_encendido.jpg'),
(40, 'Rueda de repuesto para sedán', 380.00, 4, 3, 'rueda_repuesto.jpg'),
(41, 'Juego de luces LED para faros', 150.00, 12, 4, 'luces_led.jpg'),
(42, 'Freno de mano hidráulico', 120.00, 10, 2, 'freno_mano.jpg'),
(43, 'Refrigerante para motores', 25.00, 25, 3, 'refrigerante_motor.jpg'),
(44, 'Filtro de aceite para motos', 15.00, 30, 1, 'filtro_aceite_moto.jpg'),
(45, 'Eje delantero para vehículos pesados', 1250.00, 2, 3, 'eje_delantero.jpg'),
(46, 'Bomba de freno para camiones', 550.00, 3, 2, 'bomba_freno.jpg'),
(47, 'Kit de inyección de combustible', 1150.00, 5, 5, 'kit_inyeccion.jpg'),
(48, 'Radiador de aluminio', 850.00, 2, 3, 'radiador_aluminio.jpg'),
(49, 'Sensor de velocidad del vehículo', 175.00, 7, 5, 'sensor_velocidad.jpg'),
(50, 'Luz trasera LED', 135.50, 12, 4, 'luz_trasera.jpg'),
(51, 'Silenciador para sistema de escape', 240.00, 6, 3, 'silenciador.jpg'),
(52, 'Disco de embrague', 340.00, 9, 4, 'disco_embrague.jpg'),
(53, 'Batería de gel 12V', 385.00, 5, 4, 'bateria_gel.jpg'),
(54, 'Kit de poleas para correa de distribución', 245.00, 7, 1, 'kit_poleas.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre`) VALUES
(1, 'Admin'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `password`, `id_rol`) VALUES
(1, 'admin', 'admin123', 1),
(2, 'juanperez', 'cliente123', 2),
(3, 'anagomez', 'cliente123', 2),
(4, 'luisfernandez', 'cliente123', 2),
(5, 'mariarodriguez', 'cliente123', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_repuesto` (`id_repuesto`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`id_metodopago`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_metodopago` (`id_metodopago`);

--
-- Indices de la tabla `promocion`
--
ALTER TABLE `promocion`
  ADD PRIMARY KEY (`id_promocion`);

--
-- Indices de la tabla `promocion_repuesto`
--
ALTER TABLE `promocion_repuesto`
  ADD PRIMARY KEY (`id_promorepuesto`),
  ADD KEY `id_promocion` (`id_promocion`),
  ADD KEY `id_repuesto` (`id_repuesto`);

--
-- Indices de la tabla `repuesto`
--
ALTER TABLE `repuesto`
  ADD PRIMARY KEY (`id_repuesto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `id_metodopago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `promocion`
--
ALTER TABLE `promocion`
  MODIFY `id_promocion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `promocion_repuesto`
--
ALTER TABLE `promocion_repuesto`
  MODIFY `id_promorepuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `repuesto`
--
ALTER TABLE `repuesto`
  MODIFY `id_repuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`),
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`id_repuesto`) REFERENCES `repuesto` (`id_repuesto`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_metodopago`) REFERENCES `metodo_pago` (`id_metodopago`);

--
-- Filtros para la tabla `promocion_repuesto`
--
ALTER TABLE `promocion_repuesto`
  ADD CONSTRAINT `promocion_repuesto_ibfk_1` FOREIGN KEY (`id_promocion`) REFERENCES `promocion` (`id_promocion`),
  ADD CONSTRAINT `promocion_repuesto_ibfk_2` FOREIGN KEY (`id_repuesto`) REFERENCES `repuesto` (`id_repuesto`);

--
-- Filtros para la tabla `repuesto`
--
ALTER TABLE `repuesto`
  ADD CONSTRAINT `repuesto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
