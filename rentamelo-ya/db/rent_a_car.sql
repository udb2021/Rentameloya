-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2018 at 03:00 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent_a_car`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencias`
--

CREATE TABLE `agencias` (
  `id_agencia` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agencias`
--

INSERT INTO `agencias` (`id_agencia`, `nombre`, `direccion`, `telefono`) VALUES
(1, 'Toyota', 'La palma, Chalatenango', '2222-2222'),
(2, 'Nissan', 'Boulevard Heroes #104', '2222-2222'),
(3, 'Ford', 'Boulevard Los proceres', '7879-9999');

-- --------------------------------------------------------

--
-- Table structure for table `automoviles`
--

CREATE TABLE `automoviles` (
  `id_coche` int(11) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `kilometraje` int(255) NOT NULL,
  `num_pasajeros` tinyint(4) NOT NULL,
  `precio_alquiler` decimal(10,0) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_estadovehiculo` int(11) NOT NULL,
  `id_agencia` int(11) NOT NULL,
  `carPic` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `automoviles`
--

INSERT INTO `automoviles` (`id_coche`, `placa`, `marca`, `modelo`, `kilometraje`, `num_pasajeros`, `precio_alquiler`, `tipo`, `id_proveedor`, `id_estadovehiculo`, `id_agencia`, `carPic`) VALUES
(1, 'P912 123', 'Ford', 'Focus', 1000, 5, '1020', 'Sedan', 1, 1, 1, '248890.jpg'),
(6, 'P912 122', 'Mazda', 'Mazda 3', 123, 4, '120', 'sedan', 2, 2, 2, '500470.jpg'),
(8, 'P912 125', 'Nissan', 'Sentra', 2630, 4, '500', 'Compacto', 3, 4, 2, '737690.png'),
(7, 'P912 121', 'Toyota', 'Corolla', 25600, 4, '60', 'Compacto', 3, 2, 1, '902350.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dui` varchar(10) DEFAULT NULL,
  `direccion` varchar(200) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(16) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `id_tipousuario` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_usuario`, `nombre`, `apellido`, `dui`, `direccion`, `pais`, `email`, `telefono`, `clave`, `id_tipousuario`) VALUES
(8, 'julio', 'Julio', 'Diaz', '12345678-9', 'San Salvador', 'El Salvador', 'julio@gmail.com', '7759-6952', '202cb962ac59075b964b07152d234b70', 4),
(9, 'jose', 'jose', 'paniagua', '12345678-1', 'colonia las margaritas', 'el salvador', 'jose@gmail.com', 'paniagua', '202cb962ac59075b964b07152d234b70', 4),
(10, 'Luis', 'Luis', 'Bardales', '12345678-2', 'Colonia Prados 2', 'El Salvador', 'luis@gmail.com', '7548-9636', '202cb962ac59075b964b07152d234b70', 4);

-- --------------------------------------------------------

--
-- Table structure for table `compra`
--

CREATE TABLE `compra` (
  `id_compra` varchar(15) NOT NULL,
  `id_coche` int(11) NOT NULL,
  `monto_compra` decimal(10,0) NOT NULL,
  `estado_compra` varchar(15) NOT NULL COMMENT 'Puede contener: "Autorizada", "Rechazada", "Pendiente"'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compra`
--

INSERT INTO `compra` (`id_compra`, `id_coche`, `monto_compra`, `estado_compra`) VALUES
('20181000001', 1, '300', 'Autorizada'),
('20181000002', 1, '400', 'Rechazada'),
('20181000003', 2, '562', 'Pendiente'),
('20181000004', 3, '256', 'Autorizada');

-- --------------------------------------------------------

--
-- Table structure for table `estado_vehiculo`
--

CREATE TABLE `estado_vehiculo` (
  `id_estadovehiculo` int(11) NOT NULL,
  `estado_vehiculo` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estado_vehiculo`
--

INSERT INTO `estado_vehiculo` (`id_estadovehiculo`, `estado_vehiculo`) VALUES
(1, 'mantenimiento'),
(2, 'proceso de venta'),
(3, 'proceso de compra'),
(4, 'rentado'),
(5, 'Posee multa');

-- --------------------------------------------------------

--
-- Table structure for table `mantenimiento_vehiculo`
--

CREATE TABLE `mantenimiento_vehiculo` (
  `id_mantenimiento` varchar(15) NOT NULL,
  `id_coche` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `descripcion_reparacion` varchar(200) NOT NULL,
  `id_taller` int(11) NOT NULL,
  `monto` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mantenimiento_vehiculo`
--

INSERT INTO `mantenimiento_vehiculo` (`id_mantenimiento`, `id_coche`, `fecha_inicio`, `fecha_fin`, `descripcion_reparacion`, `id_taller`, `monto`) VALUES
('20181000001', 1, '2018-02-23', '2018-02-25', 'llantas cambiadas', 1, '104'),
('20181000002', 2, '2018-03-26', '2018-03-27', 'Cambio de aceite', 2, '256'),
('20181000003', 2, '2018-02-01', '2018-02-04', 'Parachoques modificado', 3, '363'),
('20181000004', 1, '2018-03-23', '2018-03-25', 'Balanceo', 4, '200');

-- --------------------------------------------------------

--
-- Table structure for table `multas`
--

CREATE TABLE `multas` (
  `id_multa` int(11) NOT NULL,
  `id_renta` int(15) NOT NULL,
  `fecha_multa` date NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `monto` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `multas`
--

INSERT INTO `multas` (`id_multa`, `id_renta`, `fecha_multa`, `descripcion`, `monto`) VALUES
(1, 31, '2018-02-23', 'Parabrisas', '104');

-- --------------------------------------------------------

--
-- Table structure for table `proveedor_vehiculo`
--

CREATE TABLE `proveedor_vehiculo` (
  `id_proveedor` int(11) NOT NULL,
  `proveedor` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proveedor_vehiculo`
--

INSERT INTO `proveedor_vehiculo` (`id_proveedor`, `proveedor`) VALUES
(1, 'lamborghini'),
(2, 'Chevrolet'),
(3, 'KIA'),
(4, 'Mitshubishi'),
(5, 'BMW');

-- --------------------------------------------------------

--
-- Table structure for table `rentas`
--

CREATE TABLE `rentas` (
  `id_renta` int(15) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_agencia` int(11) NOT NULL,
  `id_coche` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_retiro` date NOT NULL,
  `fecha_devolucion` date NOT NULL,
  `estado` varchar(15) NOT NULL COMMENT 'Puede contener: "Activa", "Devuelto"',
  `precio_pagar` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rentas`
--

INSERT INTO `rentas` (`id_renta`, `id_cliente`, `id_agencia`, `id_coche`, `id_usuario`, `fecha_retiro`, `fecha_devolucion`, `estado`, `precio_pagar`) VALUES
(31, 1, 1, 2, 1, '2018-02-25', '2018-03-26', 'Devuelto', 13),
(32, 2, 1, 3, 2, '2018-03-26', '2018-03-28', 'Activa', 30),
(33, 1, 1, 1, 1, '2018-02-26', '2018-03-27', 'Activa', 10);

-- --------------------------------------------------------

--
-- Table structure for table `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` varchar(15) NOT NULL,
  `reserva_inicio` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_agencia` int(11) NOT NULL,
  `id_coche` int(11) NOT NULL,
  `reserva_fin` datetime NOT NULL,
  `fecha_retiro` date NOT NULL,
  `fecha_devolucion` date NOT NULL,
  `precio_pagar` float NOT NULL,
  `estado` varchar(15) NOT NULL COMMENT 'Puede contener: "Activa", "Realizada", "Cancelada"'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `reserva_inicio`, `id_cliente`, `id_agencia`, `id_coche`, `reserva_fin`, `fecha_retiro`, `fecha_devolucion`, `precio_pagar`, `estado`) VALUES
('20181000001', '2018-02-22', 1, 1, 1, '2018-02-23 00:00:00', '2018-02-23', '2018-02-28', 20, 'Cancelada'),
('20181000002', '2018-03-24', 2, 1, 1, '2018-03-25 00:00:00', '2018-03-25', '2018-03-30', 10, 'Realizada'),
('20181000003', '2018-02-02', 2, 1, 3, '2018-02-03 00:00:00', '2018-02-03', '2018-02-16', 45, 'Activa'),
('20181000004', '2018-03-22', 1, 1, 1, '2018-03-23 00:00:00', '2018-03-23', '2018-03-30', 20, 'Activa');

-- --------------------------------------------------------

--
-- Table structure for table `taller_vehiculo`
--

CREATE TABLE `taller_vehiculo` (
  `id_taller` int(11) NOT NULL,
  `taller` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taller_vehiculo`
--

INSERT INTO `taller_vehiculo` (`id_taller`, `taller`) VALUES
(1, 'Excel Automotriz'),
(2, 'Impresa Repuestos'),
(3, 'Freedom'),
(4, 'Taller SuperSprint');

-- --------------------------------------------------------

--
-- Table structure for table `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id_tipousuario` int(11) NOT NULL,
  `tipousuario` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipousuario`
--

INSERT INTO `tipousuario` (`id_tipousuario`, `tipousuario`) VALUES
(1, 'Administrador'),
(2, 'Agente'),
(3, 'Contador'),
(4, 'Cliente');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `id_tipousuario` int(11) NOT NULL,
  `id_agencia` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `nombre`, `apellido`, `email`, `clave`, `id_tipousuario`, `id_agencia`) VALUES
(13, 'Maria', 'Maria', 'Lainez', 'maria@gmail.com', '202cb962ac59075b964b07152d234b70', 3, 1),
(11, 'Griselda', 'Griselda', 'Guerrero', 'grismaryz@hotmail.com', '202cb962ac59075b964b07152d234b70', 1, 1),
(12, 'Amilcar', 'Amilcar', 'Hernandez', 'a_geo99@hotmail.com', '202cb962ac59075b964b07152d234b70', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--

CREATE TABLE `venta` (
  `id_venta` varchar(15) NOT NULL,
  `id_coche` int(11) NOT NULL,
  `monto_venta` decimal(10,0) NOT NULL,
  `estado_venta` varchar(15) NOT NULL COMMENT 'Puede contener: "Autorizada", "Rechazada", "Pendiente"'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venta`
--

INSERT INTO `venta` (`id_venta`, `id_coche`, `monto_venta`, `estado_venta`) VALUES
('20181000001', 1, '300', 'Autorizada'),
('20181000002', 1, '400', 'Rechazada'),
('20181000003', 2, '562', 'Pendiente'),
('20181000004', 3, '256', 'Autorizada');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencias`
--
ALTER TABLE `agencias`
  ADD PRIMARY KEY (`id_agencia`);

--
-- Indexes for table `automoviles`
--
ALTER TABLE `automoviles`
  ADD PRIMARY KEY (`id_coche`),
  ADD UNIQUE KEY `placa` (`placa`),
  ADD KEY `id_agencia` (`id_agencia`),
  ADD KEY `id_agencia_2` (`id_agencia`),
  ADD KEY `id_agencia_3` (`id_agencia`),
  ADD KEY `id_agencia_4` (`id_agencia`),
  ADD KEY `id_proveedorfk` (`id_proveedor`),
  ADD KEY `id_estadovehiculofk` (`id_estadovehiculo`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `kftipousuario` (`id_tipousuario`);

--
-- Indexes for table `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_coche` (`id_coche`);

--
-- Indexes for table `estado_vehiculo`
--
ALTER TABLE `estado_vehiculo`
  ADD PRIMARY KEY (`id_estadovehiculo`);

--
-- Indexes for table `mantenimiento_vehiculo`
--
ALTER TABLE `mantenimiento_vehiculo`
  ADD PRIMARY KEY (`id_mantenimiento`),
  ADD KEY `id_coche` (`id_coche`),
  ADD KEY `id_taller` (`id_taller`);

--
-- Indexes for table `multas`
--
ALTER TABLE `multas`
  ADD PRIMARY KEY (`id_multa`),
  ADD UNIQUE KEY `id_renta_3` (`id_renta`),
  ADD KEY `id_renta` (`id_renta`),
  ADD KEY `id_renta_2` (`id_renta`);

--
-- Indexes for table `proveedor_vehiculo`
--
ALTER TABLE `proveedor_vehiculo`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indexes for table `rentas`
--
ALTER TABLE `rentas`
  ADD PRIMARY KEY (`id_renta`),
  ADD KEY `id_cliente` (`id_cliente`,`id_agencia`,`id_coche`,`id_usuario`),
  ADD KEY `id_cliente_2` (`id_cliente`,`id_agencia`,`id_coche`,`id_usuario`),
  ADD KEY `id_agencia` (`id_agencia`,`id_coche`,`id_usuario`),
  ADD KEY `id_coche` (`id_coche`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_renta` (`id_renta`);

--
-- Indexes for table `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_cliente` (`id_cliente`,`id_agencia`,`id_coche`),
  ADD KEY `id_cliente_2` (`id_cliente`),
  ADD KEY `id_agencia` (`id_agencia`),
  ADD KEY `id_coche` (`id_coche`);

--
-- Indexes for table `taller_vehiculo`
--
ALTER TABLE `taller_vehiculo`
  ADD PRIMARY KEY (`id_taller`);

--
-- Indexes for table `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id_tipousuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `ktipousuario` (`id_tipousuario`),
  ADD KEY `kidagencia` (`id_agencia`);

--
-- Indexes for table `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_coche` (`id_coche`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencias`
--
ALTER TABLE `agencias`
  MODIFY `id_agencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `automoviles`
--
ALTER TABLE `automoviles`
  MODIFY `id_coche` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `estado_vehiculo`
--
ALTER TABLE `estado_vehiculo`
  MODIFY `id_estadovehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `multas`
--
ALTER TABLE `multas`
  MODIFY `id_multa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `proveedor_vehiculo`
--
ALTER TABLE `proveedor_vehiculo`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `rentas`
--
ALTER TABLE `rentas`
  MODIFY `id_renta` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `taller_vehiculo`
--
ALTER TABLE `taller_vehiculo`
  MODIFY `id_taller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
