-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 28, 2021 at 02:57 AM
-- Server version: 5.6.50
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemam_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_expenses`
--

CREATE TABLE `add_expenses` (
  `id` int(5) NOT NULL,
  `dg_id` int(20) NOT NULL,
  `pmc_quantity_of_people` varchar(255) NOT NULL,
  `pmc_working_days` varchar(255) NOT NULL,
  `pmc_hours` varchar(255) NOT NULL,
  `pmc_cost` varchar(255) NOT NULL,
  `project_manager_cost` varchar(255) NOT NULL,
  `pmot_quantity_of_people` varchar(255) NOT NULL,
  `pmot_working_days` varchar(255) NOT NULL,
  `pmtot_hours` varchar(255) NOT NULL,
  `pmtot_cost` varchar(255) NOT NULL,
  `project_manager_overtime_cost` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_expenses`
--

INSERT INTO `add_expenses` (`id`, `dg_id`, `pmc_quantity_of_people`, `pmc_working_days`, `pmc_hours`, `pmc_cost`, `project_manager_cost`, `pmot_quantity_of_people`, `pmot_working_days`, `pmtot_hours`, `pmtot_cost`, `project_manager_overtime_cost`) VALUES
(1, 55, '5', '5', '5', '5', '', '5', '5', '5', '5', ''),
(2, 57, '2', '2', '2', '2', '', '2', '2', '2', '2', ''),
(3, 58, '2', '2', '2', '2', '', '3', '4', '4', '4', ''),
(4, 59, '2', '2', '2', '2', '', '2', '2', '2', '2', ''),
(5, 60, '2', '2', '2', '2', '', '3', '3', '3', '3', ''),
(6, 61, '2', '2', '2', '2', '', '2', '2', '2', '2', ''),
(7, 62, '2', '3', '2', '2', '', '2', '2', '2', '2', ''),
(8, 63, '2', '2', '2', '2', '', '2', '2', '2', '2', ''),
(9, 64, '9', '9', '9', '9', '', '9', '9', '9', '9', ''),
(10, 65, '2', '2', '1', '12', '', '', '', '', '', ''),
(11, 66, '', '', '', '', '', '', '', '', '', ''),
(12, 67, '', '', '', '', '', '', '', '', '', ''),
(13, 68, '2', '2', '2', '2', '', '2', '2', '2', '2', ''),
(14, 70, '6', '6', '6', '6', '', '6', '6', '6', '6', ''),
(15, 71, '', '', '', '', '', '', '', '', '', ''),
(16, 72, '2', '2', '2', '2', '', '2', '2', '2', '2', ''),
(17, 74, '2', '2', '2', '2', '', '2', '2', '2', '2', ''),
(18, 73, '2', '2', '2', '2', '', '2', '2', '2', '2', ''),
(19, 75, '2', '2', '2', '2', '', '3', '4', '5', '6', ''),
(20, 76, '2', '2', '2', '2', '', '2', '2', '2', '2', ''),
(21, 77, '2', '2', '2', '2', '', '2', '2', '2', '2', ''),
(22, 80, '2', '2', '2', '2', '', '2', '2', '2', '2', ''),
(23, 82, '2', '2', '2', '2', '', '2', '2', '2', '2', ''),
(24, 83, '2', '2', '2', '2', '', '2', '2', '2', '4', ''),
(25, 83, '2', '2', '2', '3', '', '2', '2', '2', '6', ''),
(26, 83, '2', '2', '2', '4', '', '2', '2', '2', '6', ''),
(27, 84, '2', '2', '2', '2', '', '3', '3', '3', '3', ''),
(28, 85, '2', '3', '2', '2', '', '2', '3', '4', '3', ''),
(29, 86, '2', '2', '2', '2', '', '2', '2', '2', '5', ''),
(30, 86, '2', '2', '2', '2', '', '2', '9', '4', '5', ''),
(31, 87, '2', '2', '2', '2', '', '2', '2', '2', '2', ''),
(32, 88, '2', '2', '2', '2', '', '3', '3', '3', '3', ''),
(33, 89, '2', '2', '2', '2', '', '2', '2', '2', '3', ''),
(34, 90, '', '', '', '', '', '', '', '', '', ''),
(35, 91, '', '', '', '', '', '', '', '', '', ''),
(36, 93, '2', '2', '2', '2', '', '2', '2', '2', '3', ''),
(37, 94, '2', '2', '2', '2', '', '2', '2', '2', '2', ''),
(38, 95, '2', '2', '2', '2', '', '2', '2', '2', '2', ''),
(39, 96, '2', '2', '2', '2', '', '2', '2', '2', '2', ''),
(40, 97, '2', '2', '2', '2', '', '2', '2', '2', '2', ''),
(41, 98, '2', '2', '2', '2', '', '2', '2', '2', '2', ''),
(42, 99, '', '', '', '', '', '', '', '', '', ''),
(43, 100, '2', '2', '2', '11', '', '', '', '', '', ''),
(44, 101, '2', '2', '2', '21', '', '', '', '', '', ''),
(45, 102, '', '', '', '', '', '', '', '', '', ''),
(46, 103, '2', '2', '2', '2', '', '', '', '', '', ''),
(47, 104, '2', '2', '2', '500', '', '2', '2', '2', '500', '');

-- --------------------------------------------------------

--
-- Table structure for table `bancos`
--

CREATE TABLE `bancos` (
  `id` int(11) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `nombre_corto` varchar(100) NOT NULL,
  `razon_social` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bancos`
--

INSERT INTO `bancos` (`id`, `clave`, `nombre_corto`, `razon_social`) VALUES
(1, '002', 'BANAMEX', 'Banco Nacional de México, S.A., Institución de Banca Múltiple, Grupo Financiero Banamex'),
(2, '006', 'BANCOMEXT', 'Banco Nacional de Comercio Exterior, Sociedad Nacional de Crédito, Institución de Banca de Desarrollo'),
(3, '009', 'BANOBRAS', 'Banco Nacional de Obras y Servicios Públicos, Sociedad Nacional de Crédito, Institución de Banca de Desarrollo'),
(4, '012', 'BBVA BANCOMER', 'BBVA Bancomer, S.A., Institución de Banca Múltiple, Grupo Financiero BBVA Bancomer'),
(5, '014', 'SANTANDER', 'Banco Santander (México), S.A., Institución de Banca Múltiple, Grupo Financiero Santander'),
(6, '019', 'BANJERCITO', 'Banco Nacional del Ejército, Fuerza Aérea y Armada, Sociedad Nacional de Crédito, Institución de Banca de Desarrollo'),
(7, '021', 'HSBC', 'HSBC México, S.A., institución De Banca Múltiple, Grupo Financiero HSBC'),
(8, '030', 'BAJIO', 'Banco del Bajío, S.A., Institución de Banca Múltiple'),
(9, '032', 'IXE', 'IXE Banco, S.A., Institución de Banca Múltiple, IXE Grupo Financiero'),
(10, '036', 'INBURSA', 'Banco Inbursa, S.A., Institución de Banca Múltiple, Grupo Financiero Inbursa'),
(11, '037', 'INTERACCIONES', 'Banco Interacciones, S.A., Institución de Banca Múltiple'),
(12, '042', 'MIFEL', 'Banca Mifel, S.A., Institución de Banca Múltiple, Grupo Financiero Mifel'),
(13, '044', 'SCOTIABANK', 'Scotiabank Inverlat, S.A.'),
(14, '058', 'BANREGIO', 'Banco Regional de Monterrey, S.A., Institución de Banca Múltiple, Banregio Grupo Financiero'),
(15, '059', 'INVEX', 'Banco Invex, S.A., Institución de Banca Múltiple, Invex Grupo Financiero'),
(16, '060', 'BANSI', 'Bansi, S.A., Institución de Banca Múltiple'),
(17, '062', 'AFIRME', 'Banca Afirme, S.A., Institución de Banca Múltiple'),
(18, '072', 'BANORTE', 'Banco Mercantil del Norte, S.A., Institución de Banca Múltiple, Grupo Financiero Banorte'),
(19, '102', 'THE ROYAL BANK', 'The Royal Bank of Scotland México, S.A., Institución de Banca Múltiple'),
(20, '103', 'AMERICAN EXPRESS', 'American Express Bank (México), S.A., Institución de Banca Múltiple'),
(21, '106', 'BAMSA', 'Bank of America México, S.A.,Institución de Banca Múltiple, Grupo Financiero Bank of America'),
(22, '108', 'TOKYO', 'Bank of Tokyo-Mitsubishi UFJ (México), S.A.'),
(23, '110', 'JP MORGAN', 'Banco J.P. Morgan, S.A., Institución de Banca Múltiple, J.P. Morgan Grupo Financiero'),
(24, '112', 'BMONEX', 'Banco Monex, S.A., Institución de Banca Múltiple'),
(25, '113', 'VE POR MAS', 'Banco Ve Por Mas, S.A. Institución de Banca Múltiple'),
(26, '116', 'ING', 'ING Bank (México), S.A., Institución de Banca Múltiple, ING Grupo Financiero'),
(27, '124', 'DEUTSCHE', 'Deutsche Bank México, S.A., Institución de Banca Múltiple'),
(28, '126', 'CREDIT SUISSE', 'Banco Credit Suisse (México), S.A. Institución de Banca Múltiple, Grupo Financiero Credit Suisse (México)'),
(29, '127', 'AZTECA', 'Banco Azteca S.A. Institución de Banca Múltiple'),
(30, '128', 'AUTOFIN', 'Banco Autofin México, S.A. Institución de Banca Múltiple'),
(31, '129', 'BARCLAYS', 'Barclays Bank México, S.A., Institución de Banca Múltiple, Grupo Financiero Barclays México'),
(32, '130', 'COMPARTAMOS', 'Banco Compartamos, S.A., Institución de Banca Múltiple'),
(33, '131', 'BANCO FAMSA', 'Banco Ahorro Famsa, S.A., Institución de Banca Múltiple'),
(34, '132', 'BMULTIVA', 'Banco Multiva, S.A., Institución de Banca Múltiple, Multivalores Grupo Financiero'),
(35, '133', 'ACTINVER', 'Banco Actinver, S.A. Institución de Banca Múltiple, Grupo Financiero Actinver'),
(36, '134', 'WAL-MART', 'Banco Wal-Mart de México Adelante, S.A., Institución de Banca Múltiple'),
(37, '135', 'NAFIN', 'Nacional Financiera, Sociedad Nacional de Crédito, Institución de Banca de Desarrollo'),
(38, '136', 'INTERBANCO', 'Inter Banco, S.A. Institución de Banca Múltiple'),
(39, '137', 'BANCOPPEL', 'BanCoppel, S.A., Institución de Banca Múltiple'),
(40, '138', 'ABC CAPITAL', 'ABC Capital, S.A., Institución de Banca Múltiple'),
(41, '139', 'UBS BANK', 'UBS Bank México, S.A., Institución de Banca Múltiple, UBS Grupo Financiero'),
(42, '140', 'CONSUBANCO', 'Consubanco, S.A. Institución de Banca Múltiple'),
(43, '141', 'VOLKSWAGEN', 'Volkswagen Bank, S.A., Institución de Banca Múltiple'),
(44, '143', 'CIBANCO', 'CIBanco, S.A.'),
(45, '145', 'BBASE', 'Banco Base, S.A., Institución de Banca Múltiple'),
(46, '166', 'BANSEFI', 'Banco del Ahorro Nacional y Servicios Financieros, Sociedad Nacional de Crédito, Institución de Banca de Desarrollo'),
(47, '168', 'HIPOTECARIA FEDERAL', 'Sociedad Hipotecaria Federal, Sociedad Nacional de Crédito, Institución de Banca de Desarrollo'),
(48, '600', 'MONEXCB', 'Monex Casa de Bolsa, S.A. de C.V. Monex Grupo Financiero'),
(49, '601', 'GBM', 'GBM Grupo Bursátil Mexicano, S.A. de C.V. Casa de Bolsa'),
(50, '602', 'MASARI', 'Masari Casa de Bolsa, S.A.'),
(51, '605', 'VALUE', 'Value, S.A. de C.V. Casa de Bolsa'),
(52, '606', 'ESTRUCTURADORES', 'Estructuradores del Mercado de Valores Casa de Bolsa, S.A. de C.V.'),
(53, '607', 'TIBER', 'Casa de Cambio Tiber, S.A. de C.V.'),
(54, '608', 'VECTOR', 'Vector Casa de Bolsa, S.A. de C.V.'),
(55, '610', 'B&B', 'B y B, Casa de Cambio, S.A. de C.V.'),
(56, '614', 'ACCIVAL', 'Acciones y Valores Banamex, S.A. de C.V., Casa de Bolsa'),
(57, '615', 'MERRILL LYNCH', 'Merrill Lynch México, S.A. de C.V. Casa de Bolsa'),
(58, '616', 'FINAMEX', 'Casa de Bolsa Finamex, S.A. de C.V.'),
(59, '617', 'VALMEX', 'Valores Mexicanos Casa de Bolsa, S.A. de C.V.'),
(60, '618', 'UNICA', 'Unica Casa de Cambio, S.A. de C.V.'),
(61, '619', 'MAPFRE', 'MAPFRE Tepeyac, S.A.'),
(62, '620', 'PROFUTURO', 'Profuturo G.N.P., S.A. de C.V., Afore'),
(63, '621', 'CB ACTINVER', 'Actinver Casa de Bolsa, S.A. de C.V.'),
(64, '622', 'OACTIN', 'OPERADORA ACTINVER, S.A. DE C.V.'),
(65, '623', 'SKANDIA', 'Skandia Vida, S.A. de C.V.'),
(66, '626', 'CBDEUTSCHE', 'Deutsche Securities, S.A. de C.V. CASA DE BOLSA'),
(67, '627', 'ZURICH', 'Zurich Compañía de Seguros, S.A.'),
(68, '628', 'ZURICHVI', 'Zurich Vida, Compañía de Seguros, S.A.'),
(69, '629', 'SU CASITA', 'Hipotecaria Su Casita, S.A. de C.V. SOFOM ENR'),
(70, '630', 'CB INTERCAM', 'Intercam Casa de Bolsa, S.A. de C.V.'),
(71, '631', 'CI BOLSA', 'CI Casa de Bolsa, S.A. de C.V.'),
(72, '632', 'BULLTICK CB', 'Bulltick Casa de Bolsa, S.A., de C.V.'),
(73, '633', 'STERLING', 'Sterling Casa de Cambio, S.A. de C.V.'),
(74, '634', 'FINCOMUN', 'Fincomún, Servicios Financieros Comunitarios, S.A. de C.V.'),
(75, '636', 'HDI SEGUROS', 'HDI Seguros, S.A. de C.V.'),
(76, '637', 'ORDER', 'Order Express Casa de Cambio, S.A. de C.V'),
(77, '638', 'AKALA', 'Akala, S.A. de C.V., Sociedad Financiera Popular'),
(78, '640', 'CB JPMORGAN', 'J.P. Morgan Casa de Bolsa, S.A. de C.V. J.P. Morgan Grupo Financiero'),
(79, '642', 'REFORMA', 'Operadora de Recursos Reforma, S.A. de C.V., S.F.P.'),
(80, '646', 'STP', 'Sistema de Transferencias y Pagos STP, S.A. de C.V.SOFOM ENR'),
(81, '647', 'TELECOMM', 'Telecomunicaciones de México'),
(82, '648', 'EVERCORE', 'Evercore Casa de Bolsa, S.A. de C.V.'),
(83, '649', 'SKANDIA', 'Skandia Operadora de Fondos, S.A. de C.V.'),
(84, '651', 'SEGMTY', 'Seguros Monterrey New York Life, S.A de C.V'),
(85, '652', 'ASEA', 'Solución Asea, S.A. de C.V., Sociedad Financiera Popular'),
(86, '653', 'KUSPIT', 'Kuspit Casa de Bolsa, S.A. de C.V.'),
(87, '655', 'SOFIEXPRESS', 'J.P. SOFIEXPRESS, S.A. de C.V., S.F.P.'),
(88, '656', 'UNAGRA', 'UNAGRA, S.A. de C.V., S.F.P.'),
(89, '659', 'OPCIONES EMPRESARIALES DEL NOROESTE', 'OPCIONES EMPRESARIALES DEL NORESTE, S.A. DE C.V., S.F.P.'),
(90, '901', 'CLS', 'Cls Bank International'),
(91, '902', 'INDEVAL', 'SD. Indeval, S.A. de C.V.'),
(92, '670', 'LIBERTAD', 'Libertad Servicios Financieros, S.A. De C.V.'),
(93, '999', 'N/A', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(2) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Labor - Own'),
(2, 'Labor - Subcontractors'),
(3, 'Additional Expenses'),
(4, 'Travel Time'),
(5, 'Travel cost'),
(6, 'Rigging, equipment, tools and trucks'),
(7, 'Freight - Our Equipment'),
(8, 'Freight - Customer\'s Assets'),
(9, 'Materials'),
(10, 'Rentals & Subcontracts');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(4) NOT NULL,
  `user_id` int(20) NOT NULL,
  `plaza_id` int(11) NOT NULL,
  `estatus_id` int(11) NOT NULL DEFAULT '3',
  `analisis_id` int(11) NOT NULL,
  `legal_id` int(11) NOT NULL,
  `implementacion_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL DEFAULT '',
  `domicilio` varchar(255) DEFAULT NULL,
  `colonia` varchar(200) DEFAULT NULL,
  `municipio` varchar(200) DEFAULT NULL,
  `ciudad` varchar(200) DEFAULT NULL,
  `estado` varchar(200) DEFAULT NULL,
  `pais` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `zip` varchar(6) DEFAULT NULL,
  `rfc` varchar(100) DEFAULT NULL,
  `eliminado` int(11) DEFAULT '0',
  `rol` varchar(100) DEFAULT 'Cliente',
  `password` varchar(255) DEFAULT 'temporal02',
  `notas` varchar(500) DEFAULT NULL,
  `status_update_date` varchar(20) DEFAULT NULL,
  `entre_calles` varchar(100) NOT NULL,
  `valor_del_cliente` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `user_id`, `plaza_id`, `estatus_id`, `analisis_id`, `legal_id`, `implementacion_id`, `nombre`, `domicilio`, `colonia`, `municipio`, `ciudad`, `estado`, `pais`, `email`, `telefono`, `zip`, `rfc`, `eliminado`, `rol`, `password`, `notas`, `status_update_date`, `entre_calles`, `valor_del_cliente`) VALUES
(1, 22, 3, 4, 0, 0, 0, 'AIDA', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'XAXX010101000', 0, 'Cliente', 'temporal02', '', '28/10/2016 18:34', '', '0'),
(3, 22, 3, 4, 0, 0, 0, 'GRUAS INTERNACIONALES SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'GIN011004IG3', 0, 'Cliente', 'temporal04', '', '30/10/2016 18:34', '', '0'),
(4, 22, 3, 4, 0, 0, 0, 'Ice Monterrey Stamping S de RL de CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'IMS0707196T6', 0, 'Cliente', 'temporal05', '', '31/10/2016 18:34', '', '0'),
(5, 22, 3, 4, 0, 0, 0, 'CBRE MEXICO GWS, S. DE R.L. DE C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'JCM1501096PA', 0, 'Cliente', 'temporal06', '', '01/11/2016 18:34', '', '0'),
(6, 22, 3, 4, 0, 0, 0, 'IPESSA', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'IPE990101GE2', 0, 'Cliente', 'temporal07', '', '02/11/2016 18:34', '', '0'),
(7, 22, 3, 4, 0, 0, 0, 'MPE', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'MPE0008085K3', 0, 'Cliente', 'temporal08', '', '03/11/2016 18:34', '', '0'),
(8, 22, 3, 4, 0, 0, 0, 'LONGHORN GENERAL CONTRACTORS S.A. DE C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'LGC140715G38', 0, 'Cliente', 'temporal09', '', '04/11/2016 18:34', '', '0'),
(9, 22, 3, 4, 0, 0, 0, 'PRESMEC INTERNATIONAL X', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'EXX010101000', 0, 'Cliente', 'temporal10', '', '05/11/2016 18:34', '', '0'),
(10, 22, 3, 4, 0, 0, 0, 'GRUPO ELECTRICO VARELEC, SA. DE C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'GEV950920N4A', 0, 'Cliente', 'temporal11', '', '06/11/2016 18:34', '', '0'),
(11, 22, 3, 4, 0, 0, 0, 'Panasonic Automotive Systems Monterrey Mexico S. A de C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'PHA000221QA3', 0, 'Cliente', 'temporal12', '', '07/11/2016 18:34', '', '0'),
(12, 22, 3, 4, 0, 0, 0, 'Industrias en Servicios Plasticos Manufactura, SAPI de CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'ISP071115LR7', 0, 'Cliente', 'temporal13', '', '08/11/2016 18:34', '', '0'),
(13, 22, 3, 4, 0, 0, 0, 'RIGGERS GROUP SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'RGR060529QL9', 0, 'Cliente', 'temporal14', '', '09/11/2016 18:34', '', '0'),
(14, 22, 3, 4, 0, 0, 0, 'CIA. CONSTRUCTORA Y COMERCIALIZADORA, S.A. DE C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'CCO9508223N5', 0, 'Cliente', 'temporal15', '', '10/11/2016 18:34', '', '0'),
(15, 22, 3, 4, 0, 0, 0, 'IZONE S DE RL DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'IZO150430G81', 0, 'Cliente', 'temporal16', '', '11/11/2016 18:34', '', '0'),
(16, 22, 3, 4, 0, 0, 0, 'HUSSMANN AMERICAN S DE RL DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'HAS971114LE6', 0, 'Cliente', 'temporal17', '', '12/11/2016 18:34', '', '0'),
(17, 22, 3, 4, 0, 0, 0, 'RIGGERS GROUP SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'RGR060529QL9', 0, 'Cliente', 'temporal18', '', '13/11/2016 18:34', '', '0'),
(18, 22, 3, 4, 0, 0, 0, 'ABB Electrical Control Systems S. de R.L. de C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'GED980513952', 0, 'Cliente', 'temporal19', '', '14/11/2016 18:34', '', '0'),
(19, 22, 3, 4, 0, 0, 0, 'VU ENTERPRISE, INC. X', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'EXX010101000', 0, 'Cliente', 'temporal20', '', '15/11/2016 18:34', '', '0'),
(20, 22, 3, 4, 0, 0, 0, 'DOW MACHINE X', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'EXX010101000', 0, 'Cliente', 'temporal21', '', '16/11/2016 18:34', '', '0'),
(21, 22, 3, 4, 0, 0, 0, 'JUAN ANGEL FLORES AGUIRRE F', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'OAJ6608113Y1', 0, 'Cliente', 'temporal22', '', '17/11/2016 18:34', '', '0'),
(22, 22, 3, 4, 0, 0, 0, 'COMPA&Nacute,IA INDUSTRIAL ASOCIADA, SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'IAS080904VE9', 0, 'Cliente', 'temporal23', '', '18/11/2016 18:34', '', '0'),
(23, 22, 3, 4, 0, 0, 0, 'JOSE ANTONIO HUITRON CHAVARRIA H', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'UCA550228M20', 0, 'Cliente', 'temporal24', '', '19/11/2016 18:34', '', '0'),
(24, 22, 3, 4, 0, 0, 0, 'Noranco Manufacturing Mexico SA de CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'NMM140710TI8', 0, 'Cliente', 'temporal25', '', '20/11/2016 18:34', '', '0'),
(25, 22, 3, 4, 0, 0, 0, 'Global Mechanical S de RL de CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'GME0110317K5', 0, 'Cliente', 'temporal26', '', '21/11/2016 18:34', '', '0'),
(26, 22, 3, 4, 0, 0, 0, 'Viskase del Norte S.A. de C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'VNO0505188S5', 0, 'Cliente', 'temporal27', '', '22/11/2016 18:34', '', '0'),
(27, 22, 3, 4, 0, 0, 0, 'Control Total Industrial y Comercial SA de CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'CTI09100164A', 0, 'Cliente', 'temporal28', '', '23/11/2016 18:34', '', '0'),
(28, 22, 3, 4, 0, 0, 0, 'ORIIMEC DE MEXICO SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'OME130215U3A', 0, 'Cliente', 'temporal29', '', '24/11/2016 18:34', '', '0'),
(29, 22, 3, 4, 0, 0, 0, 'ONNERA MEXICO SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'FIM970306PH5', 0, 'Cliente', 'temporal30', '', '25/11/2016 18:34', '', '0'),
(30, 22, 3, 4, 0, 0, 0, 'POWER RIGGING MEXICO SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'PRM160528924', 0, 'Cliente', 'temporal31', '', '26/11/2016 18:34', '', '0'),
(31, 22, 3, 4, 0, 0, 0, 'ARRENDA AGUASCALIENTES SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'AAG130115AM3', 0, 'Cliente', 'temporal32', '', '27/11/2016 18:34', '', '0'),
(32, 22, 3, 4, 0, 0, 0, 'IACNA MEXICO II S DE RL DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'IMI0708287XA', 0, 'Cliente', 'temporal33', '', '28/11/2016 18:34', '', '0'),
(33, 22, 3, 4, 0, 0, 0, 'TALLERES BARRERA SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'TBA7504018B4', 0, 'Cliente', 'temporal34', '', '29/11/2016 18:34', '', '0'),
(34, 22, 3, 4, 0, 0, 0, 'Obras y Construcciones Chaires, SA. de CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'OCC030129SV5', 0, 'Cliente', 'temporal35', '', '30/11/2016 18:34', '', '0'),
(35, 22, 3, 4, 0, 0, 0, 'TG4MEX, S. de R.L. de C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'TGM150310V38', 0, 'Cliente', 'temporal36', '', '01/12/2016 18:34', '', '0'),
(36, 22, 3, 4, 0, 0, 0, 'Leadec Mexico S. de R.L. de C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'PMS931026B89', 0, 'Cliente', 'temporal37', '', '02/12/2016 18:34', '', '0'),
(37, 22, 3, 4, 0, 0, 0, 'MAGNA ELECTRONICS SYSTEMS DE MEXICO SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'MES070327G12', 0, 'Cliente', 'temporal38', '', '03/12/2016 18:34', '', '0'),
(38, 22, 3, 4, 0, 0, 0, 'NOVA AUTOMATION ENGINEERING SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'NAE140626225', 0, 'Cliente', 'temporal39', '', '04/12/2016 18:34', '', '0'),
(39, 22, 3, 4, 0, 0, 0, 'MEGA ALIMENTOS SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'MAL870225MAA', 0, 'Cliente', 'temporal40', '', '05/12/2016 18:34', '', '0'),
(40, 22, 3, 4, 0, 0, 0, 'IACNA MEXICO II S DE RL DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'IMI0708287XA', 0, 'Cliente', 'temporal41', '', '06/12/2016 18:34', '', '0'),
(41, 22, 3, 4, 0, 0, 0, 'Varroc Lighting Systems, S. de R.L. de C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'VLS120517HTA', 0, 'Cliente', 'temporal42', '', '07/12/2016 18:34', '', '0'),
(42, 22, 3, 4, 0, 0, 0, 'Talleres industriales de Maquinados, S.A. de C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'TIM8404063E4', 0, 'Cliente', 'temporal43', '', '08/12/2016 18:34', '', '0'),
(43, 22, 3, 4, 0, 0, 0, 'OMEGA MORGAN X', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'EXX010101000', 0, 'Cliente', 'temporal44', '', '09/12/2016 18:34', '', '0'),
(44, 22, 3, 4, 0, 0, 0, 'RIGGING INDUSTRIAL DE MEXICO SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'RIM1706092AA', 0, 'Cliente', 'temporal45', '', '10/12/2016 18:34', '', '0'),
(45, 22, 3, 4, 0, 0, 0, 'GRUPO DE INYECCIONES PM DE MEXICO SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'GIP100707T17', 0, 'Cliente', 'temporal46', '', '11/12/2016 18:34', '', '0'),
(46, 22, 3, 4, 0, 0, 0, 'TEAYL TECNICOS EN ADUANA Y LOGISTICA SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'TTA090909VA2', 0, 'Cliente', 'temporal47', '', '12/12/2016 18:34', '', '0'),
(47, 22, 3, 4, 0, 0, 0, 'PACKERMEX S. DE R.L DE C.V', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'PAC120810LU6', 0, 'Cliente', 'temporal48', '', '13/12/2016 18:34', '', '0'),
(48, 22, 3, 4, 0, 0, 0, 'PRESSEN HAAS GMBH X', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'EXX010101000', 0, 'Cliente', 'temporal49', '', '14/12/2016 18:34', '', '0'),
(49, 22, 3, 4, 0, 0, 0, 'AIDA ENGINEERING DE MEXICO S DE RL DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'AEM080821670', 0, 'Cliente', 'temporal50', '', '15/12/2016 18:34', '', '0'),
(50, 22, 3, 4, 0, 0, 0, 'Toledo Press Industries Inc. X', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'EXX010101000', 0, 'Cliente', 'temporal51', '', '16/12/2016 18:34', '', '0'),
(51, 22, 3, 4, 0, 0, 0, 'INTERSTAMPING AUTOMOTOR SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'IAU120912RG6', 0, 'Cliente', 'temporal52', '', '17/12/2016 18:34', '', '0'),
(52, 22, 3, 4, 0, 0, 0, 'KSR INMOBILIARIA MEXICO S DE RL DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'KIM0701244F7', 0, 'Cliente', 'temporal53', '', '18/12/2016 18:34', '', '0'),
(53, 22, 3, 4, 0, 0, 0, 'EQUIPOS Y MANUFACTURAS T/A, S.A. DE C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'EMT951204P99', 0, 'Cliente', 'temporal54', '', '19/12/2016 18:34', '', '0'),
(54, 22, 3, 4, 0, 0, 0, 'Pressensysteme Schuler-Mexiko, S.A. de C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'MWM0502218I9', 0, 'Cliente', 'temporal55', '', '20/12/2016 18:34', '', '0'),
(56, 22, 3, 4, 0, 0, 0, 'DOCUFORMAS SAPI DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'DOC960723EK2', 0, 'Cliente', 'temporal57', '', '22/12/2016 18:34', '', '0'),
(57, 22, 3, 4, 0, 0, 0, 'MANUFACTURAS T/A, SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'MTA040130I3A', 0, 'Cliente', 'temporal58', '', '23/12/2016 18:34', '', '0'),
(58, 22, 3, 4, 0, 0, 0, 'HAITIAN HUAYUAN MEXICO MACHINERY S DE RL DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'HHM150624VE4', 0, 'Cliente', 'temporal59', '', '24/12/2016 18:34', '', '0'),
(59, 22, 3, 4, 0, 0, 0, 'MATERIAS PRIMAS SIDERURGICAS SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'MPS100106SK9', 0, 'Cliente', 'temporal60', '', '25/12/2016 18:34', '', '0'),
(60, 22, 3, 4, 0, 0, 0, 'IPATEK', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'IPA0401306P4', 0, 'Cliente', 'temporal61', '', '26/12/2016 18:34', '', '0'),
(61, 22, 3, 4, 0, 0, 0, 'METALSA SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'MET920131CN5', 0, 'Cliente', 'temporal62', '', '27/12/2016 18:34', '', '0'),
(62, 22, 3, 4, 0, 0, 0, 'IACNA MEXICO S DE RL DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'IME070108PX7', 0, 'Cliente', 'temporal63', '', '28/12/2016 18:34', '', '0'),
(63, 22, 3, 4, 0, 0, 0, 'IACG HOLDINGS II LUX S.A.R.L. X', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'EXX010101000', 0, 'Cliente', 'temporal64', '', '29/12/2016 18:34', '', '0'),
(64, 22, 3, 4, 0, 0, 0, 'RUSKIN DE MEXICO SAPI DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'RME040213EC5', 0, 'Cliente', 'temporal65', '', '30/12/2016 18:34', '', '0'),
(65, 22, 3, 4, 0, 0, 0, 'CONMET DE MEXICO SA de CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'CME990423373', 0, 'Cliente', 'temporal66', '', '31/12/2016 18:34', '', '0'),
(66, 22, 3, 4, 0, 0, 0, 'FABRICAS MONTERREY SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'FMO840702R81', 0, 'Cliente', 'temporal67', '', '01/01/2017 18:34', '', '0'),
(67, 22, 3, 4, 0, 0, 0, 'FULL CONTROL TECHNOLOGY SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'FCT170830F26', 0, 'Cliente', 'temporal68', '', '02/01/2017 18:34', '', '0'),
(68, 22, 3, 4, 0, 0, 0, 'CARLOS DANIEL CERVANTES CASTILLO C', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'ECC840316QL8', 0, 'Cliente', 'temporal69', '', '03/01/2017 18:34', '', '0'),
(69, 22, 3, 4, 0, 0, 0, 'NISTRANS INTERNACIONAL DE MEXICO', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'NIM000721S53', 0, 'Cliente', 'temporal70', '', '04/01/2017 18:34', '', '0'),
(70, 22, 3, 4, 0, 0, 0, 'Panasonic Automotive Systems Company of America - MTY X', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'EXX010101000', 0, 'Cliente', 'temporal71', '', '05/01/2017 18:34', '', '0'),
(71, 22, 3, 4, 0, 0, 0, 'RASSINI SUSPENSIONES S.A. DE C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'RAS861211T16', 0, 'Cliente', 'temporal72', '', '06/01/2017 18:34', '', '0'),
(72, 22, 3, 4, 0, 0, 0, 'MACHINERY NETWORK INC. X', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'EXX010101000', 0, 'Cliente', 'temporal73', '', '07/01/2017 18:34', '', '0'),
(73, 22, 3, 4, 0, 0, 0, 'KEUMGANG S.A. de C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'KEU1505266B4', 0, 'Cliente', 'temporal74', '', '08/01/2017 18:34', '', '0'),
(74, 22, 3, 4, 0, 0, 0, 'BRITISH AMERICAN TOBACCO MEXICO S.A. de C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'BAT910607F43', 0, 'Cliente', 'temporal75', '', '09/01/2017 18:34', '', '0'),
(75, 22, 3, 4, 0, 0, 0, 'INNOVAREG S.A DE C.V', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'INN1308201IA', 0, 'Cliente', 'temporal76', '', '10/01/2017 18:34', '', '0'),
(76, 22, 3, 4, 0, 0, 0, 'SOPORTE DINAMICO INDUSTRIAL SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'SDI060830KK1', 0, 'Cliente', 'temporal77', '', '11/01/2017 18:34', '', '0'),
(78, 22, 3, 4, 0, 0, 0, 'Rheem Mexicali, S. de R.L de C.V', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'RME000601HY4', 0, 'Cliente', 'temporal79', '', '13/01/2017 18:34', '', '0'),
(79, 22, 3, 4, 0, 0, 0, 'BRAXICO MANUFACTURING SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'BMA101208LHA', 0, 'Cliente', 'temporal80', '', '14/01/2017 18:34', '', '0'),
(80, 22, 3, 4, 0, 0, 0, 'SPIRAX SARCO MEXICANA. S.A.P.I. DE C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'SSM850101PV7', 0, 'Cliente', 'temporal81', '', '15/01/2017 18:34', '', '0'),
(81, 22, 3, 4, 0, 0, 0, 'GAMA TEC SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'GTE0303208Y9', 0, 'Cliente', 'temporal82', '', '16/01/2017 18:34', '', '0'),
(82, 22, 3, 4, 0, 0, 0, 'ALFA INTEGRACION TECNOLOGICA, S.A. DE C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'AIT131209DKA', 0, 'Cliente', 'temporal83', '', '17/01/2017 18:34', '', '0'),
(83, 22, 3, 4, 0, 0, 0, 'IBERTECNIA SERVICIOS SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'ISE120322UJ5', 0, 'Cliente', 'temporal84', '', '18/01/2017 18:34', '', '0'),
(84, 22, 3, 4, 0, 0, 0, 'Enprotech Industrial Technologies LLC X', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'EXX010101000', 0, 'Cliente', 'temporal85', '', '19/01/2017 18:34', '', '0'),
(85, 22, 3, 4, 0, 0, 0, 'SPECIALTY INTERNATIONAL DE MEXICO SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'SIM0302216S2', 0, 'Cliente', 'temporal86', '', '20/01/2017 18:34', '', '0'),
(86, 22, 3, 4, 0, 0, 0, 'LAU INDUSTRIES DE MEXICO S DE RL de CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'RME040213EC5', 0, 'Cliente', 'temporal87', '', '21/01/2017 18:34', '', '0'),
(87, 22, 3, 4, 0, 0, 0, 'ACCURIDE DEL NORTE SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'ANO070531QR7', 0, 'Cliente', 'temporal88', '', '22/01/2017 18:34', '', '0'),
(88, 22, 3, 4, 0, 0, 0, 'INDUSTRIAS RHEEM S.A. de C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'IRH890217I36', 0, 'Cliente', 'temporal89', '', '23/01/2017 18:34', '', '0'),
(89, 22, 3, 4, 0, 0, 0, 'TROAX SAFETY SYSTEMS MEXICO SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'TSS140321PN3', 0, 'Cliente', 'temporal90', '', '24/01/2017 18:34', '', '0'),
(91, 22, 3, 4, 0, 0, 0, 'BERGSTROM INC. X', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'EXX010101000', 0, 'Cliente', 'temporal92', '', '26/01/2017 18:34', '', '0'),
(92, 22, 3, 4, 0, 0, 0, 'NGK CERAMICS MEXICO, S DE RL DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'NCM080123TZ1', 0, 'Cliente', 'temporal93', '', '27/01/2017 18:34', '', '0'),
(93, 22, 3, 4, 0, 0, 0, 'STEELINE DE MEXICO', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'SME091119L32', 0, 'Cliente', 'temporal94', '', '28/01/2017 18:34', '', '0'),
(94, 22, 3, 4, 0, 0, 0, 'HDH Instruments, LP X', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'EXX010101000', 0, 'Cliente', 'temporal95', '', '29/01/2017 18:34', '', '0'),
(95, 22, 3, 4, 0, 0, 0, 'PILSA', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'PIL0407138F7', 0, 'Cliente', 'temporal96', '', '30/01/2017 18:34', '', '0'),
(96, 22, 3, 4, 0, 0, 0, 'ABM Estampados S.A. de C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'AES110413MI5', 0, 'Cliente', 'temporal97', '', '31/01/2017 18:34', '', '0'),
(97, 22, 3, 4, 0, 0, 0, 'A.B.M. TOOL & DIE Co. LTD. X', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'EXX010101000', 0, 'Cliente', 'temporal98', '', '01/02/2017 18:34', '', '0'),
(98, 22, 3, 4, 0, 0, 0, 'MORALES EXPRESS LOGISTICS SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'MEL150407MB0', 0, 'Cliente', 'temporal99', '', '02/02/2017 18:34', '', '0'),
(99, 22, 3, 4, 0, 0, 0, 'Protev International, Inc. X', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'EXX010101000', 0, 'Cliente', 'temporal100', '', '03/02/2017 18:34', '', '0'),
(100, 22, 3, 4, 0, 0, 0, 'Procesadora Industrial del Acero, SA de CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'PIA860915113', 0, 'Cliente', 'temporal101', '', '04/02/2017 18:34', '', '0'),
(101, 22, 3, 4, 0, 0, 0, 'SacVill Comercializadora Advisors & Consultants SA de CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'SCA1601259R6', 0, 'Cliente', 'temporal102', '', '05/02/2017 18:34', '', '0'),
(102, 22, 3, 4, 0, 0, 0, 'CORPORACION ELECTRICA DEL BRAVO SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'CEB920323S92', 0, 'Cliente', 'temporal103', '', '06/02/2017 18:34', '', '0'),
(103, 22, 3, 4, 0, 0, 0, 'DRONES SERVICIOS PROFESIONALES SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'DSP1602116Q9', 0, 'Cliente', 'temporal104', '', '07/02/2017 18:34', '', '0'),
(104, 22, 3, 4, 0, 0, 0, 'CRG METAL COMPANY S.A. DE C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'CME180626JK7', 0, 'Cliente', 'temporal105', '', '08/02/2017 18:34', '', '0'),
(105, 22, 3, 4, 0, 0, 0, 'Ryder Capital S de RL de CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'RCA940729470', 0, 'Cliente', 'temporal106', '', '09/02/2017 18:34', '', '0'),
(106, 22, 3, 4, 0, 0, 0, 'Real Packing Mexico S de RL de CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'RPM180607SY0', 0, 'Cliente', 'temporal107', '', '10/02/2017 18:34', '', '0'),
(107, 22, 3, 4, 0, 0, 0, 'Ruhrpumpen SA de CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'RUH910710R96', 0, 'Cliente', 'temporal108', '', '11/02/2017 18:34', '', '0'),
(108, 22, 3, 4, 0, 0, 0, 'LIMEX FORMADO Y DECORADO S DE RL DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'LFD041022AR6', 0, 'Cliente', 'temporal109', '', '12/02/2017 18:34', '', '0'),
(110, 22, 3, 4, 0, 0, 0, 'LUBRICANTES DE AMERICA SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'LAM951127KF6', 0, 'Cliente', 'temporal111', '', '14/02/2017 18:34', '', '0'),
(112, 22, 3, 4, 0, 0, 0, 'HANSIN M&C', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'HMC1603249J8', 0, 'Cliente', 'temporal113', '', '16/02/2017 18:34', '', '0'),
(113, 22, 3, 4, 0, 0, 0, 'Papeles Higienicos de Mexico S.A. de C.V', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'PHM8803286S2', 0, 'Cliente', 'temporal114', '', '17/02/2017 18:34', '', '0'),
(114, 22, 3, 4, 0, 0, 0, 'MEKRA LANG MEXICO', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'LME080505HT2', 0, 'Cliente', 'temporal115', '', '18/02/2017 18:34', '', '0'),
(115, 22, 3, 4, 0, 0, 0, 'Superior Industrial X', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'EXX010101000', 0, 'Cliente', 'temporal116', '', '19/02/2017 18:34', '', '0'),
(116, 22, 3, 4, 0, 0, 0, 'RIGGING & RELOCATION INDUSTRIAL, S. DE R.L. DE C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'RAR161219PV8', 0, 'Cliente', 'temporal117', '', '20/02/2017 18:34', '', '0'),
(117, 22, 3, 4, 0, 0, 0, 'MONTOI, S.A. DE C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'MON841121M56', 0, 'Cliente', 'temporal118', '', '21/02/2017 18:34', '', '0'),
(119, 22, 3, 4, 0, 0, 0, 'GAIM REGIOMONTANA SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'GRE131205P64', 0, 'Cliente', 'temporal120', '', '23/02/2017 18:34', '', '0'),
(120, 22, 3, 4, 0, 0, 0, 'GARBUIO SPA X', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'EXX010101000', 0, 'Cliente', 'temporal121', '', '24/02/2017 18:34', '', '0'),
(121, 22, 3, 4, 0, 0, 0, 'ROMAR DIELECTRICS DE MEXICO S.A. DE C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'RDM920810222', 0, 'Cliente', 'temporal122', '', '25/02/2017 18:34', '', '0'),
(122, 22, 3, 4, 0, 0, 0, 'DANA DE MEXICO CORPORACION, S DE RL DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'DMC750410C41', 0, 'Cliente', 'temporal123', '', '26/02/2017 18:34', '', '0'),
(123, 22, 3, 4, 0, 0, 0, 'High End Defense Solutions X', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'EXX010101000', 0, 'Cliente', 'temporal124', '', '27/02/2017 18:34', '', '0'),
(124, 22, 3, 4, 0, 0, 0, 'AM Industrial Group, LLC X', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'EXX010101000', 0, 'Cliente', 'temporal125', '', '28/02/2017 18:34', '', '0'),
(125, 22, 3, 4, 0, 0, 0, 'TERMO PUERTAS AJUSTABLES SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'TPA8306136DA', 0, 'Cliente', 'temporal126', '', '01/03/2017 18:34', '', '0'),
(126, 22, 3, 4, 0, 0, 0, 'TARIPALLETS MONTERREY SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'TMO1512079R6', 0, 'Cliente', 'temporal127', '', '02/03/2017 18:34', '', '0'),
(127, 22, 3, 4, 0, 0, 0, 'Embraco NA Manufacturing LLC X', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'EXX010101000', 0, 'Cliente', 'temporal128', '', '03/03/2017 18:34', '', '0'),
(128, 22, 3, 4, 0, 0, 0, 'NAVISTAR MEXICO S DE RL DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'CMI950920TR8', 0, 'Cliente', 'temporal129', '', '04/03/2017 18:34', '', '0'),
(129, 22, 3, 4, 0, 0, 0, 'ZIMMER, S.A. DE C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'ZIM9408055K6', 0, 'Cliente', 'temporal130', '', '05/03/2017 18:34', '', '0'),
(131, 22, 3, 4, 0, 0, 0, 'Maria Teresa Zavala Morales Z', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'AMT700423T61', 0, 'Cliente', 'temporal132', '', '07/03/2017 18:34', '', '0'),
(132, 22, 3, 4, 0, 0, 0, 'HUSSMANN INTERNATIONAL HOLDING X', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'EXX010101000', 0, 'Cliente', 'temporal133', '', '08/03/2017 18:34', '', '0'),
(133, 22, 3, 4, 0, 0, 0, 'Arlington Plastics Machinery, Inc X', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'EXX010101000', 0, 'Cliente', 'temporal134', '', '09/03/2017 18:34', '', '0'),
(134, 22, 3, 4, 0, 0, 0, 'CEMM MEX S.A. DE C.V.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'CME010607N58', 0, 'Cliente', 'temporal135', '', '10/03/2017 18:34', '', '0'),
(135, 22, 3, 4, 0, 0, 0, 'Nidec Global Appliance Mexico', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'EME040130FK8', 0, 'Cliente', 'temporal136', '', '11/03/2017 18:34', '', '0'),
(136, 22, 3, 4, 0, 0, 0, 'FASTER ENTERPRISES X', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'EXX010101000', 0, 'Cliente', 'temporal137', '', '12/03/2017 18:34', '', '0'),
(137, 22, 3, 4, 0, 0, 0, 'Crown Famosa S.A de CV.', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'TER0701088V6', 0, 'Cliente', 'temporal138', '', '13/03/2017 18:34', '', '0'),
(138, 22, 3, 4, 0, 0, 0, 'CORTINAS DE SEGURIDAD ALBA SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'CSA9103197K1', 0, 'Cliente', 'temporal139', '', '14/03/2017 18:34', '', '0'),
(139, 22, 3, 4, 0, 0, 0, 'TECNICOS EN TRANSMISIONES ELECTROMECANICAS SA DE CV', '.', '.', '.', '.', '.', 'MEXICO', 'correo@dominio.com', '0', '64000', 'TTE8605128C7', 0, 'Cliente', 'temporal140', '', '15/03/2017 18:34', '', '0'),
(140, 22, 3, 4, 0, 0, 0, 'Cliente de prueba', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101000', 0, 'Cliente', 'temporal141', '', '16/03/2017 18:34', '', '0'),
(141, 22, 3, 4, 0, 0, 0, 'Cliente de prueba 3', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101001', 0, 'Cliente', 'temporal142', '', '17/03/2017 18:34', '', '0'),
(142, 22, 3, 4, 0, 0, 0, 'AAM', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101002', 0, 'Cliente', 'temporal143', '', '18/03/2017 18:34', '', '0'),
(143, 22, 3, 4, 0, 0, 0, 'ABASTELEC', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101003', 0, 'Cliente', 'temporal144', '', '19/03/2017 18:34', '', '0'),
(144, 22, 3, 4, 0, 0, 0, 'ABC Group', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101004', 0, 'Cliente', 'temporal145', '', '20/03/2017 18:34', '', '0'),
(145, 22, 3, 4, 0, 0, 0, 'ABMTOOL/Ready Machinery', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101005', 0, 'Cliente', 'temporal146', '', '21/03/2017 18:34', '', '0'),
(146, 22, 3, 4, 0, 0, 0, 'AceroPrime', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101006', 0, 'Cliente', 'temporal147', '', '22/03/2017 18:34', '', '0'),
(147, 22, 3, 4, 0, 0, 0, 'Aceros Tangamanga', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101007', 0, 'Cliente', 'temporal148', '', '23/03/2017 18:34', '', '0'),
(148, 22, 3, 4, 0, 0, 0, 'Acuity Brands', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101008', 0, 'Cliente', 'temporal149', '', '24/03/2017 18:34', '', '0'),
(149, 22, 3, 4, 0, 0, 0, 'Acument', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101009', 0, 'Cliente', 'temporal150', '', '25/03/2017 18:34', '', '0'),
(150, 22, 3, 4, 0, 0, 0, 'Acurride', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101010', 0, 'Cliente', 'temporal151', '', '26/03/2017 18:34', '', '0'),
(151, 22, 3, 4, 0, 0, 0, 'AIDA EUROPA', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101011', 0, 'Cliente', 'temporal152', '', '27/03/2017 18:34', '', '0'),
(152, 22, 3, 4, 0, 0, 0, 'AIT', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101012', 0, 'Cliente', 'temporal153', '', '28/03/2017 18:34', '', '0'),
(153, 22, 3, 4, 0, 0, 0, 'AOC', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101013', 0, 'Cliente', 'temporal154', '', '29/03/2017 18:34', '', '0'),
(154, 22, 3, 4, 0, 0, 0, 'AOL', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101014', 0, 'Cliente', 'temporal155', '', '30/03/2017 18:34', '', '0'),
(155, 22, 3, 4, 0, 0, 0, 'AsociadosA', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101015', 0, 'Cliente', 'temporal156', '', '31/03/2017 18:34', '', '0'),
(156, 22, 3, 4, 0, 0, 0, 'Atlas', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101016', 0, 'Cliente', 'temporal157', '', '01/04/2017 18:34', '', '0'),
(157, 22, 3, 4, 0, 0, 0, 'AVIREX', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101017', 0, 'Cliente', 'temporal158', '', '02/04/2017 18:34', '', '0'),
(158, 22, 3, 4, 0, 0, 0, 'AZSATEGRA', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101018', 0, 'Cliente', 'temporal159', '', '03/04/2017 18:34', '', '0'),
(159, 22, 3, 4, 0, 0, 0, 'BENSA', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101019', 0, 'Cliente', 'temporal160', '', '04/04/2017 18:34', '', '0'),
(160, 22, 3, 4, 0, 0, 0, 'BERPAR', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101020', 0, 'Cliente', 'temporal161', '', '05/04/2017 18:34', '', '0'),
(161, 22, 3, 4, 0, 0, 0, 'BIMEX', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101021', 0, 'Cliente', 'temporal162', '', '06/04/2017 18:34', '', '0'),
(162, 22, 3, 4, 0, 0, 0, 'Bits', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101022', 0, 'Cliente', 'temporal163', '', '07/04/2017 18:34', '', '0'),
(163, 22, 3, 4, 0, 0, 0, 'BMB', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101023', 0, 'Cliente', 'temporal164', '', '08/04/2017 18:34', '', '0'),
(164, 22, 3, 4, 0, 0, 0, 'CEB', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101024', 0, 'Cliente', 'temporal165', '', '09/04/2017 18:34', '', '0'),
(165, 22, 3, 4, 0, 0, 0, 'Central Foods', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101025', 0, 'Cliente', 'temporal166', '', '10/04/2017 18:34', '', '0'),
(166, 22, 3, 4, 0, 0, 0, 'CIE PEMSA', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101026', 0, 'Cliente', 'temporal167', '', '11/04/2017 18:34', '', '0'),
(167, 22, 3, 4, 0, 0, 0, 'CINSA', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101027', 0, 'Cliente', 'temporal168', '', '12/04/2017 18:34', '', '0'),
(168, 22, 3, 4, 0, 0, 0, 'Clarkson Inc', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101028', 0, 'Cliente', 'temporal169', '', '13/04/2017 18:34', '', '0'),
(169, 22, 3, 4, 0, 0, 0, 'Connor', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101029', 0, 'Cliente', 'temporal170', '', '14/04/2017 18:34', '', '0'),
(170, 22, 3, 4, 0, 0, 0, 'Coverpack', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101030', 0, 'Cliente', 'temporal171', '', '15/04/2017 18:34', '', '0'),
(171, 22, 3, 4, 0, 0, 0, 'CTI', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101031', 0, 'Cliente', 'temporal172', '', '16/04/2017 18:34', '', '0'),
(172, 22, 3, 4, 0, 0, 0, 'Cuprum', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101032', 0, 'Cliente', 'temporal173', '', '17/04/2017 18:34', '', '0'),
(173, 22, 3, 4, 0, 0, 0, 'Danfoss', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101033', 0, 'Cliente', 'temporal174', '', '18/04/2017 18:34', '', '0'),
(174, 22, 3, 4, 0, 0, 0, 'Daniel Vargas', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101034', 0, 'Cliente', 'temporal175', '', '19/04/2017 18:34', '', '0'),
(175, 22, 3, 4, 0, 0, 0, 'DFW Movers', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101035', 0, 'Cliente', 'temporal176', '', '20/04/2017 18:34', '', '0'),
(176, 22, 3, 4, 0, 0, 0, 'Dinamec Systems', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101036', 0, 'Cliente', 'temporal177', '', '21/04/2017 18:34', '', '0'),
(177, 22, 3, 4, 0, 0, 0, 'Dinsa Mty', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101037', 0, 'Cliente', 'temporal178', '', '22/04/2017 18:34', '', '0'),
(178, 22, 3, 4, 0, 0, 0, 'Doiter Casting', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101038', 0, 'Cliente', 'temporal179', '', '23/04/2017 18:34', '', '0'),
(179, 22, 3, 4, 0, 0, 0, 'DTR', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101039', 0, 'Cliente', 'temporal180', '', '24/04/2017 18:34', '', '0'),
(180, 22, 3, 4, 0, 0, 0, 'DTRVMS', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101040', 0, 'Cliente', 'temporal181', '', '25/04/2017 18:34', '', '0'),
(181, 22, 3, 4, 0, 0, 0, 'Ecominerali', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101041', 0, 'Cliente', 'temporal182', '', '26/04/2017 18:34', '', '0'),
(182, 22, 3, 4, 0, 0, 0, 'EJV', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101042', 0, 'Cliente', 'temporal183', '', '27/04/2017 18:34', '', '0'),
(183, 22, 3, 4, 0, 0, 0, 'EMA', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101043', 0, 'Cliente', 'temporal184', '', '28/04/2017 18:34', '', '0'),
(184, 22, 3, 4, 0, 0, 0, 'Embraco', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101044', 0, 'Cliente', 'temporal185', '', '29/04/2017 18:34', '', '0'),
(185, 22, 3, 4, 0, 0, 0, 'EMPAC', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101045', 0, 'Cliente', 'temporal186', '', '30/04/2017 18:34', '', '0'),
(186, 22, 3, 4, 0, 0, 0, 'Enprotech', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101046', 0, 'Cliente', 'temporal187', '', '01/05/2017 18:34', '', '0'),
(187, 22, 3, 4, 0, 0, 0, 'Europartners Group', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101047', 0, 'Cliente', 'temporal188', '', '02/05/2017 18:34', '', '0'),
(188, 22, 3, 4, 0, 0, 0, 'Fabesa', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101048', 0, 'Cliente', 'temporal189', '', '03/05/2017 18:34', '', '0'),
(189, 22, 3, 4, 0, 0, 0, 'FAGOR', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101049', 0, 'Cliente', 'temporal190', '', '04/05/2017 18:34', '', '0'),
(190, 22, 3, 4, 0, 0, 0, 'Fagor Ederlan', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101050', 0, 'Cliente', 'temporal191', '', '05/05/2017 18:34', '', '0'),
(191, 22, 3, 4, 0, 0, 0, 'Fletes Modernos', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101051', 0, 'Cliente', 'temporal192', '', '06/05/2017 18:34', '', '0'),
(192, 22, 3, 4, 0, 0, 0, 'Fortacero', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101052', 0, 'Cliente', 'temporal193', '', '07/05/2017 18:34', '', '0'),
(193, 22, 3, 4, 0, 0, 0, 'FORZE', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101053', 0, 'Cliente', 'temporal194', '', '08/05/2017 18:34', '', '0'),
(194, 22, 3, 4, 0, 0, 0, 'GASA', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101054', 0, 'Cliente', 'temporal195', '', '09/05/2017 18:34', '', '0'),
(195, 22, 3, 4, 0, 0, 0, 'General Electric', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101055', 0, 'Cliente', 'temporal196', '', '10/05/2017 18:34', '', '0'),
(196, 22, 3, 4, 0, 0, 0, 'GESTAMP', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101056', 0, 'Cliente', 'temporal197', '', '11/05/2017 18:34', '', '0'),
(197, 22, 3, 4, 0, 0, 0, 'Gohnherr Plasts', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101057', 0, 'Cliente', 'temporal198', '', '12/05/2017 18:34', '', '0'),
(198, 22, 3, 4, 0, 0, 0, 'GRINSA Manufacturas', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101058', 0, 'Cliente', 'temporal199', '', '13/05/2017 18:34', '', '0'),
(199, 22, 3, 4, 0, 0, 0, 'Gruas Rocha', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101059', 0, 'Cliente', 'temporal200', '', '14/05/2017 18:34', '', '0'),
(200, 22, 3, 4, 0, 0, 0, 'Grupo Rema', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101060', 0, 'Cliente', 'temporal201', '', '15/05/2017 18:34', '', '0'),
(201, 22, 3, 4, 0, 0, 0, 'Grupo RYL', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101061', 0, 'Cliente', 'temporal202', '', '16/05/2017 18:34', '', '0'),
(202, 22, 3, 4, 0, 0, 0, 'Grupo Tampico Global', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101062', 0, 'Cliente', 'temporal203', '', '17/05/2017 18:34', '', '0'),
(203, 22, 3, 4, 0, 0, 0, 'Hakkai', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101063', 0, 'Cliente', 'temporal204', '', '18/05/2017 18:34', '', '0'),
(204, 22, 3, 4, 0, 0, 0, 'Hellermann Tyton', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101064', 0, 'Cliente', 'temporal205', '', '19/05/2017 18:34', '', '0'),
(205, 22, 3, 4, 0, 0, 0, 'Henke Industrial MX', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101065', 0, 'Cliente', 'temporal206', '', '20/05/2017 18:34', '', '0'),
(206, 22, 3, 4, 0, 0, 0, 'HERSA', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101066', 0, 'Cliente', 'temporal207', '', '21/05/2017 18:34', '', '0'),
(207, 22, 3, 4, 0, 0, 0, 'HFI', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101067', 0, 'Cliente', 'temporal208', '', '22/05/2017 18:34', '', '0'),
(208, 22, 3, 4, 0, 0, 0, 'Horizon Plastics', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101068', 0, 'Cliente', 'temporal209', '', '23/05/2017 18:34', '', '0'),
(209, 22, 3, 4, 0, 0, 0, 'HPM', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101069', 0, 'Cliente', 'temporal210', '', '24/05/2017 18:34', '', '0'),
(210, 22, 3, 4, 0, 0, 0, 'HUSSMANN', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101070', 0, 'Cliente', 'temporal211', '', '25/05/2017 18:34', '', '0'),
(211, 22, 3, 4, 0, 0, 0, 'Hutchinson', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101071', 0, 'Cliente', 'temporal212', '', '26/05/2017 18:34', '', '0'),
(212, 22, 3, 4, 0, 0, 0, 'IAC Group', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101072', 0, 'Cliente', 'temporal213', '', '27/05/2017 18:34', '', '0'),
(213, 22, 3, 4, 0, 0, 0, 'IACNA', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101073', 0, 'Cliente', 'temporal214', '', '28/05/2017 18:34', '', '0'),
(214, 22, 3, 4, 0, 0, 0, 'IAMDMEX', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101074', 0, 'Cliente', 'temporal215', '', '29/05/2017 18:34', '', '0'),
(215, 22, 3, 4, 0, 0, 0, 'IDTEC', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101075', 0, 'Cliente', 'temporal216', '', '30/05/2017 18:34', '', '0'),
(216, 22, 3, 4, 0, 0, 0, 'IILMEX', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101076', 0, 'Cliente', 'temporal217', '', '31/05/2017 18:34', '', '0'),
(217, 22, 3, 4, 0, 0, 0, 'Impulsora MC', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101077', 0, 'Cliente', 'temporal218', '', '01/06/2017 18:34', '', '0'),
(218, 22, 3, 4, 0, 0, 0, 'Industrial machine tools', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101078', 0, 'Cliente', 'temporal219', '', '02/06/2017 18:34', '', '0'),
(219, 22, 3, 4, 0, 0, 0, 'Innova Global', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101079', 0, 'Cliente', 'temporal220', '', '03/06/2017 18:34', '', '0'),
(220, 22, 3, 4, 0, 0, 0, 'Insertec', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101080', 0, 'Cliente', 'temporal221', '', '04/06/2017 18:34', '', '0'),
(221, 22, 3, 4, 0, 0, 0, 'Instant Food', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101081', 0, 'Cliente', 'temporal222', '', '05/06/2017 18:34', '', '0'),
(222, 22, 3, 4, 0, 0, 0, 'Ipatek', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101082', 0, 'Cliente', 'temporal223', '', '06/06/2017 18:34', '', '0'),
(223, 22, 3, 4, 0, 0, 0, 'IPL', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101083', 0, 'Cliente', 'temporal224', '', '07/06/2017 18:34', '', '0'),
(224, 22, 3, 4, 0, 0, 0, 'Isgo', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101084', 0, 'Cliente', 'temporal225', '', '08/06/2017 18:34', '', '0'),
(225, 22, 3, 4, 0, 0, 0, 'ISGO', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101085', 0, 'Cliente', 'temporal226', '', '09/06/2017 18:34', '', '0'),
(226, 22, 3, 4, 0, 0, 0, 'Ital Presse', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101086', 0, 'Cliente', 'temporal227', '', '10/06/2017 18:34', '', '0'),
(227, 22, 3, 4, 0, 0, 0, 'JA Servicios', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101087', 0, 'Cliente', 'temporal228', '', '11/06/2017 18:34', '', '0'),
(228, 22, 3, 4, 0, 0, 0, 'JAN CRANE&SERVICE', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101088', 0, 'Cliente', 'temporal229', '', '12/06/2017 18:34', '', '0'),
(229, 22, 3, 4, 0, 0, 0, 'JCI', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101089', 0, 'Cliente', 'temporal230', '', '13/06/2017 18:34', '', '0'),
(230, 22, 3, 4, 0, 0, 0, 'JetFix', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101090', 0, 'Cliente', 'temporal231', '', '14/06/2017 18:34', '', '0'),
(231, 22, 3, 4, 0, 0, 0, 'Jumbocel', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101091', 0, 'Cliente', 'temporal232', '', '15/06/2017 18:34', '', '0'),
(232, 22, 3, 4, 0, 0, 0, 'Jundiai', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101092', 0, 'Cliente', 'temporal233', '', '16/06/2017 18:34', '', '0'),
(233, 22, 3, 4, 0, 0, 0, 'K Acero', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101093', 0, 'Cliente', 'temporal234', '', '17/06/2017 18:34', '', '0'),
(234, 22, 3, 4, 0, 0, 0, 'K Flex', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101094', 0, 'Cliente', 'temporal235', '', '18/06/2017 18:34', '', '0'),
(235, 22, 3, 4, 0, 0, 0, 'KE Electronik', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101095', 0, 'Cliente', 'temporal236', '', '19/06/2017 18:34', '', '0'),
(236, 22, 3, 4, 0, 0, 0, 'KEISER', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101096', 0, 'Cliente', 'temporal237', '', '20/06/2017 18:34', '', '0'),
(237, 22, 3, 4, 0, 0, 0, 'Kemet', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101097', 0, 'Cliente', 'temporal238', '', '21/06/2017 18:34', '', '0'),
(238, 22, 3, 4, 0, 0, 0, 'Kishida Gumi', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101098', 0, 'Cliente', 'temporal239', '', '22/06/2017 18:34', '', '0'),
(239, 22, 3, 4, 0, 0, 0, 'KYEONGDONG', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101099', 0, 'Cliente', 'temporal240', '', '23/06/2017 18:34', '', '0'),
(240, 22, 3, 4, 0, 0, 0, 'Kyrios', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101100', 0, 'Cliente', 'temporal241', '', '24/06/2017 18:34', '', '0'),
(241, 22, 3, 4, 0, 0, 0, 'LEGO', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101101', 0, 'Cliente', 'temporal242', '', '25/06/2017 18:34', '', '0'),
(242, 22, 3, 4, 0, 0, 0, 'Lubral', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101102', 0, 'Cliente', 'temporal243', '', '26/06/2017 18:34', '', '0'),
(243, 22, 3, 4, 0, 0, 0, 'Mabe', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101103', 0, 'Cliente', 'temporal244', '', '27/06/2017 18:34', '', '0'),
(244, 22, 3, 4, 0, 0, 0, 'Mahle', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101104', 0, 'Cliente', 'temporal245', '', '28/06/2017 18:34', '', '0'),
(245, 22, 3, 4, 0, 0, 0, 'Manufacturas en Acero', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101105', 0, 'Cliente', 'temporal246', '', '29/06/2017 18:34', '', '0'),
(246, 22, 3, 4, 0, 0, 0, 'Mapal', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101106', 0, 'Cliente', 'temporal247', '', '30/06/2017 18:34', '', '0'),
(247, 22, 3, 4, 0, 0, 0, 'MAQINGPRO', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101107', 0, 'Cliente', 'temporal248', '', '01/07/2017 18:34', '', '0'),
(248, 22, 3, 4, 0, 0, 0, 'MARAT MEXICO', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101108', 0, 'Cliente', 'temporal249', '', '02/07/2017 18:34', '', '0'),
(249, 22, 3, 4, 0, 0, 0, 'Marubeni', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101109', 0, 'Cliente', 'temporal250', '', '03/07/2017 18:34', '', '0'),
(250, 22, 3, 4, 0, 0, 0, 'Matriceria Especializada Monterrey', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101110', 0, 'Cliente', 'temporal251', '', '04/07/2017 18:34', '', '0'),
(251, 22, 3, 4, 0, 0, 0, 'May Steel', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101111', 0, 'Cliente', 'temporal252', '', '05/07/2017 18:34', '', '0'),
(252, 22, 3, 4, 0, 0, 0, 'MEIKO', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101112', 0, 'Cliente', 'temporal253', '', '06/07/2017 18:34', '', '0'),
(253, 22, 3, 4, 0, 0, 0, 'Mekra Lang', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101113', 0, 'Cliente', 'temporal254', '', '07/07/2017 18:34', '', '0'),
(254, 22, 3, 4, 0, 0, 0, 'MEL', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101114', 0, 'Cliente', 'temporal255', '', '08/07/2017 18:34', '', '0'),
(255, 22, 3, 4, 0, 0, 0, 'MEN', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101115', 0, 'Cliente', 'temporal256', '', '09/07/2017 18:34', '', '0'),
(256, 22, 3, 4, 0, 0, 0, 'Mercado Industrial', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101116', 0, 'Cliente', 'temporal257', '', '10/07/2017 18:34', '', '0'),
(257, 22, 3, 4, 0, 0, 0, 'MESA', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101117', 0, 'Cliente', 'temporal258', '', '11/07/2017 18:34', '', '0'),
(258, 22, 3, 4, 0, 0, 0, 'MG', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101118', 0, 'Cliente', 'temporal259', '', '12/07/2017 18:34', '', '0'),
(259, 22, 3, 4, 0, 0, 0, 'Mi Alegria', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101119', 0, 'Cliente', 'temporal260', '', '13/07/2017 18:34', '', '0'),
(260, 22, 3, 4, 0, 0, 0, 'MICSA', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101120', 0, 'Cliente', 'temporal261', '', '14/07/2017 18:34', '', '0'),
(261, 22, 3, 4, 0, 0, 0, 'Minghua', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101121', 0, 'Cliente', 'temporal262', '', '15/07/2017 18:34', '', '0');
INSERT INTO `clientes` (`id`, `user_id`, `plaza_id`, `estatus_id`, `analisis_id`, `legal_id`, `implementacion_id`, `nombre`, `domicilio`, `colonia`, `municipio`, `ciudad`, `estado`, `pais`, `email`, `telefono`, `zip`, `rfc`, `eliminado`, `rol`, `password`, `notas`, `status_update_date`, `entre_calles`, `valor_del_cliente`) VALUES
(262, 22, 3, 4, 0, 0, 0, 'MINTH', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101122', 0, 'Cliente', 'temporal263', '', '16/07/2017 18:34', '', '0'),
(263, 22, 3, 4, 0, 0, 0, 'MMI', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101123', 0, 'Cliente', 'temporal264', '', '17/07/2017 18:34', '', '0'),
(264, 22, 3, 4, 0, 0, 0, 'MPE Group', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101124', 0, 'Cliente', 'temporal265', '', '18/07/2017 18:34', '', '0'),
(265, 22, 3, 4, 0, 0, 0, 'Myron Bowling', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101125', 0, 'Cliente', 'temporal266', '', '19/07/2017 18:34', '', '0'),
(266, 22, 3, 4, 0, 0, 0, 'Nicro Bolta', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101126', 0, 'Cliente', 'temporal267', '', '20/07/2017 18:34', '', '0'),
(267, 22, 3, 4, 0, 0, 0, 'Nissan', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101127', 0, 'Cliente', 'temporal268', '', '21/07/2017 18:34', '', '0'),
(268, 22, 3, 4, 0, 0, 0, 'Norican Group', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101128', 0, 'Cliente', 'temporal269', '', '22/07/2017 18:34', '', '0'),
(269, 22, 3, 4, 0, 0, 0, 'Nortech Systems', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101129', 0, 'Cliente', 'temporal270', '', '23/07/2017 18:34', '', '0'),
(270, 22, 3, 4, 0, 0, 0, 'Novasi', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101130', 0, 'Cliente', 'temporal271', '', '24/07/2017 18:34', '', '0'),
(271, 22, 3, 4, 0, 0, 0, 'OLEF INC', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101131', 0, 'Cliente', 'temporal272', '', '25/07/2017 18:34', '', '0'),
(272, 22, 3, 4, 0, 0, 0, 'Orion', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101132', 0, 'Cliente', 'temporal273', '', '26/07/2017 18:34', '', '0'),
(273, 22, 3, 4, 0, 0, 0, 'Ovisa', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101133', 0, 'Cliente', 'temporal274', '', '27/07/2017 18:34', '', '0'),
(274, 22, 3, 4, 0, 0, 0, 'P&G', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101134', 0, 'Cliente', 'temporal275', '', '28/07/2017 18:34', '', '0'),
(275, 22, 3, 4, 0, 0, 0, 'Packermex', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101135', 0, 'Cliente', 'temporal276', '', '29/07/2017 18:34', '', '0'),
(276, 22, 3, 4, 0, 0, 0, 'Panasonic', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101136', 0, 'Cliente', 'temporal277', '', '30/07/2017 18:34', '', '0'),
(277, 22, 3, 4, 0, 0, 0, 'PCC', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101137', 0, 'Cliente', 'temporal278', '', '31/07/2017 18:34', '', '0'),
(278, 22, 3, 4, 0, 0, 0, 'Pedro Mtz', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101138', 0, 'Cliente', 'temporal279', '', '01/08/2017 18:34', '', '0'),
(279, 22, 3, 4, 0, 0, 0, 'Phillipsmedisize', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101140', 0, 'Cliente', 'temporal280', '', '02/08/2017 18:34', '', '0'),
(280, 22, 3, 4, 0, 0, 0, 'PIASA', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101141', 0, 'Cliente', 'temporal281', '', '03/08/2017 18:34', '', '0'),
(281, 22, 3, 4, 0, 0, 0, 'Planta Moran', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101142', 0, 'Cliente', 'temporal282', '', '04/08/2017 18:34', '', '0'),
(282, 22, 3, 4, 0, 0, 0, 'Plastic Omnium', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101143', 0, 'Cliente', 'temporal283', '', '05/08/2017 18:34', '', '0'),
(283, 22, 3, 4, 0, 0, 0, 'PM Industrias', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101144', 0, 'Cliente', 'temporal284', '', '06/08/2017 18:34', '', '0'),
(284, 22, 3, 4, 0, 0, 0, 'PMdeMexico', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101145', 0, 'Cliente', 'temporal285', '', '07/08/2017 18:34', '', '0'),
(285, 22, 3, 4, 0, 0, 0, 'Polypro', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101146', 0, 'Cliente', 'temporal286', '', '08/08/2017 18:34', '', '0'),
(286, 22, 3, 4, 0, 0, 0, 'PPG', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101147', 0, 'Cliente', 'temporal287', '', '09/08/2017 18:34', '', '0'),
(287, 22, 3, 4, 0, 0, 0, 'Prince Manufacturing', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101148', 0, 'Cliente', 'temporal288', '', '10/08/2017 18:34', '', '0'),
(288, 22, 3, 4, 0, 0, 0, 'Pro Service', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101149', 0, 'Cliente', 'temporal289', '', '11/08/2017 18:34', '', '0'),
(289, 22, 3, 4, 0, 0, 0, 'PROLEC GE', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101150', 0, 'Cliente', 'temporal290', '', '12/08/2017 18:34', '', '0'),
(290, 22, 3, 4, 0, 0, 0, 'Quin decor', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101151', 0, 'Cliente', 'temporal291', '', '13/08/2017 18:34', '', '0'),
(291, 22, 3, 4, 0, 0, 0, 'Ranchacero', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101152', 0, 'Cliente', 'temporal292', '', '14/08/2017 18:34', '', '0'),
(292, 22, 3, 4, 0, 0, 0, 'Raven Group', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101153', 0, 'Cliente', 'temporal293', '', '15/08/2017 18:34', '', '0'),
(293, 22, 3, 4, 0, 0, 0, 'Reciclados del Norte', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101154', 0, 'Cliente', 'temporal294', '', '16/08/2017 18:34', '', '0'),
(294, 22, 3, 4, 0, 0, 0, 'Regiopet', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101155', 0, 'Cliente', 'temporal295', '', '17/08/2017 18:34', '', '0'),
(295, 22, 3, 4, 0, 0, 0, 'REMA', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101156', 0, 'Cliente', 'temporal296', '', '18/08/2017 18:34', '', '0'),
(296, 22, 3, 4, 0, 0, 0, 'RIM', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101157', 0, 'Cliente', 'temporal297', '', '19/08/2017 18:34', '', '0'),
(297, 22, 3, 4, 0, 0, 0, 'ROSCO', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101158', 0, 'Cliente', 'temporal298', '', '20/08/2017 18:34', '', '0'),
(298, 22, 3, 4, 0, 0, 0, 'RR Industrial', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101159', 0, 'Cliente', 'temporal299', '', '21/08/2017 18:34', '', '0'),
(299, 22, 3, 4, 0, 0, 0, 'SABCAR', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101160', 0, 'Cliente', 'temporal300', '', '22/08/2017 18:34', '', '0'),
(300, 22, 3, 4, 0, 0, 0, 'SALIYC', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101161', 0, 'Cliente', 'temporal301', '', '23/08/2017 18:34', '', '0'),
(301, 22, 3, 4, 0, 0, 0, 'SAMIRAM', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101162', 0, 'Cliente', 'temporal302', '', '24/08/2017 18:34', '', '0'),
(302, 22, 3, 4, 0, 0, 0, 'Sanmina', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101163', 0, 'Cliente', 'temporal303', '', '25/08/2017 18:34', '', '0'),
(303, 22, 3, 4, 0, 0, 0, 'Schott Gemtron', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101164', 0, 'Cliente', 'temporal304', '', '26/08/2017 18:34', '', '0'),
(304, 22, 3, 4, 0, 0, 0, 'Schuler', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101165', 0, 'Cliente', 'temporal305', '', '27/08/2017 18:34', '', '0'),
(305, 22, 3, 4, 0, 0, 0, 'SDI', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101166', 0, 'Cliente', 'temporal306', '', '28/08/2017 18:34', '', '0'),
(306, 22, 3, 4, 0, 0, 0, 'Sedena', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101167', 0, 'Cliente', 'temporal307', '', '29/08/2017 18:34', '', '0'),
(307, 22, 3, 4, 0, 0, 0, 'SEI', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101168', 0, 'Cliente', 'temporal308', '', '30/08/2017 18:34', '', '0'),
(308, 22, 3, 4, 0, 0, 0, 'Senter', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101169', 0, 'Cliente', 'temporal309', '', '31/08/2017 18:34', '', '0'),
(309, 22, 3, 4, 0, 0, 0, 'SERMAQ', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101170', 0, 'Cliente', 'temporal310', '', '01/09/2017 18:34', '', '0'),
(310, 22, 3, 4, 0, 0, 0, 'Servicios Electromecanicos Union', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101171', 0, 'Cliente', 'temporal311', '', '02/09/2017 18:34', '', '0'),
(311, 22, 3, 4, 0, 0, 0, 'Sielectrica', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101172', 0, 'Cliente', 'temporal312', '', '03/09/2017 18:34', '', '0'),
(312, 22, 3, 4, 0, 0, 0, 'SIM', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101173', 0, 'Cliente', 'temporal313', '', '04/09/2017 18:34', '', '0'),
(313, 22, 3, 4, 0, 0, 0, 'Sisamex', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101174', 0, 'Cliente', 'temporal314', '', '05/09/2017 18:34', '', '0'),
(314, 22, 3, 4, 0, 0, 0, 'Slyrsa', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101175', 0, 'Cliente', 'temporal315', '', '06/09/2017 18:34', '', '0'),
(315, 22, 3, 4, 0, 0, 0, 'Sonoco', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101176', 0, 'Cliente', 'temporal316', '', '07/09/2017 18:34', '', '0'),
(316, 22, 3, 4, 0, 0, 0, 'Soy Sanna', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101177', 0, 'Cliente', 'temporal317', '', '08/09/2017 18:34', '', '0'),
(317, 22, 3, 4, 0, 0, 0, 'SPS Aerospace', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101178', 0, 'Cliente', 'temporal318', '', '09/09/2017 18:34', '', '0'),
(318, 22, 3, 4, 0, 0, 0, 'SQN Latina', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101179', 0, 'Cliente', 'temporal319', '', '10/09/2017 18:34', '', '0'),
(319, 22, 3, 4, 0, 0, 0, 'Stamping and Finishing de Mexico', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101180', 0, 'Cliente', 'temporal320', '', '11/09/2017 18:34', '', '0'),
(320, 22, 3, 4, 0, 0, 0, 'Stamping Machine', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101181', 0, 'Cliente', 'temporal321', '', '12/09/2017 18:34', '', '0'),
(321, 22, 3, 4, 0, 0, 0, 'Sungwoo', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101182', 0, 'Cliente', 'temporal322', '', '13/09/2017 18:34', '', '0'),
(322, 22, 3, 4, 0, 0, 0, 'Sungwoo Hitech', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101183', 0, 'Cliente', 'temporal323', '', '14/09/2017 18:34', '', '0'),
(323, 22, 3, 4, 0, 0, 0, 'Sunnen', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101184', 0, 'Cliente', 'temporal324', '', '15/09/2017 18:34', '', '0'),
(324, 22, 3, 4, 0, 0, 0, 'Syndema', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101185', 0, 'Cliente', 'temporal325', '', '16/09/2017 18:34', '', '0'),
(325, 22, 3, 4, 0, 0, 0, 'TG4MEX', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101186', 0, 'Cliente', 'temporal326', '', '17/09/2017 18:34', '', '0'),
(326, 22, 3, 4, 0, 0, 0, 'Thermo Fisher', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101187', 0, 'Cliente', 'temporal327', '', '18/09/2017 18:34', '', '0'),
(327, 22, 3, 4, 0, 0, 0, 'TIMSA', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101188', 0, 'Cliente', 'temporal328', '', '19/09/2017 18:34', '', '0'),
(328, 22, 3, 4, 0, 0, 0, 'Top Metal Solutions', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101189', 0, 'Cliente', 'temporal329', '', '20/09/2017 18:34', '', '0'),
(329, 22, 3, 4, 0, 0, 0, 'Torcar', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101190', 0, 'Cliente', 'temporal330', '', '21/09/2017 18:34', '', '0'),
(330, 22, 3, 4, 0, 0, 0, 'Toshiba Machine', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101191', 0, 'Cliente', 'temporal331', '', '22/09/2017 18:34', '', '0'),
(331, 22, 3, 4, 0, 0, 0, 'Tostadas Delicias', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101192', 0, 'Cliente', 'temporal332', '', '23/09/2017 18:34', '', '0'),
(332, 22, 3, 4, 0, 0, 0, 'Tracto Servicios y Remolques', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101193', 0, 'Cliente', 'temporal333', '', '24/09/2017 18:34', '', '0'),
(333, 22, 3, 4, 0, 0, 0, 'Trane', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101194', 0, 'Cliente', 'temporal334', '', '25/09/2017 18:34', '', '0'),
(334, 22, 3, 4, 0, 0, 0, 'TRC', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101195', 0, 'Cliente', 'temporal335', '', '26/09/2017 18:34', '', '0'),
(335, 22, 3, 4, 0, 0, 0, 'Tyden Brooks', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101196', 0, 'Cliente', 'temporal336', '', '27/09/2017 18:34', '', '0'),
(336, 22, 3, 4, 0, 0, 0, 'UBE', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101197', 0, 'Cliente', 'temporal337', '', '28/09/2017 18:34', '', '0'),
(337, 22, 3, 4, 0, 0, 0, 'UFI FILTERS', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101198', 0, 'Cliente', 'temporal338', '', '29/09/2017 18:34', '', '0'),
(338, 22, 3, 4, 0, 0, 0, 'Util Group', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101199', 0, 'Cliente', 'temporal339', '', '30/09/2017 18:34', '', '0'),
(339, 22, 3, 4, 0, 0, 0, 'Valeo', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101200', 0, 'Cliente', 'temporal340', '', '01/10/2017 18:34', '', '0'),
(340, 22, 3, 4, 0, 0, 0, 'Varroc', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101201', 0, 'Cliente', 'temporal341', '', '02/10/2017 18:34', '', '0'),
(341, 22, 3, 4, 0, 0, 0, 'Vestas', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101202', 0, 'Cliente', 'temporal342', '', '03/10/2017 18:34', '', '0'),
(342, 22, 3, 4, 0, 0, 0, 'VIELMA', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101203', 0, 'Cliente', 'temporal343', '', '04/10/2017 18:34', '', '0'),
(343, 22, 3, 4, 0, 0, 0, 'Villacero', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101204', 0, 'Cliente', 'temporal344', '', '05/10/2017 18:34', '', '0'),
(344, 22, 3, 4, 0, 0, 0, 'Warren Automotive de Mexico', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101205', 0, 'Cliente', 'temporal345', '', '06/10/2017 18:34', '', '0'),
(345, 22, 3, 4, 0, 0, 0, 'Webasto', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101206', 0, 'Cliente', 'temporal346', '', '07/10/2017 18:34', '', '0'),
(346, 22, 3, 4, 0, 0, 0, 'Wolverine', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101207', 0, 'Cliente', 'temporal347', '', '08/10/2017 18:34', '', '0'),
(347, 22, 3, 4, 0, 0, 0, 'Yanfeng', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101208', 0, 'Cliente', 'temporal348', '', '09/10/2017 18:34', '', '0'),
(348, 22, 3, 4, 0, 0, 0, 'Zu Gill', '.', '.', '.', '.', '.', '.', 'correo@cualquiera.com', '0', '64000', 'AAAA010101209', 0, 'Cliente', 'temporal349', '', '10/10/2017 18:34', '', '0'),
(350, 22, 3, 4, 0, 0, 0, 'Grupo Collado', '.', '.', '.', '.', '.', '.', 'sin@correo.com', '0', '64000', 'XAXX010101110', 0, 'Cliente', 'temporal351', '', '12/10/2017 18:34', '', '0'),
(351, 22, 3, 4, 0, 0, 0, 'ILCM LOGISTICS MEXICO,S.A.DE C.V.', 'Boulevard Diaz Ordaz 1370 Despacho 801-803 Jardines de Irapuato. Irapuato, Guanajuato,36660', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'XAXX010101103', 0, 'Cliente', 'temporal352', '', '13/10/2017 18:34', '', '0'),
(352, 22, 3, 4, 0, 0, 0, 'TUBOMAX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'XAXX010101104', 0, 'Cliente', 'temporal353', '', '14/10/2017 18:34', '', '0'),
(353, 22, 3, 4, 0, 0, 0, 'Darana Hybrid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'XAXX010101105', 0, 'Cliente', 'temporal354', '', '15/10/2017 18:34', '', '0'),
(354, 22, 3, 4, 0, 0, 0, 'DANA MANUFACTURING SWITZERLAND GMBH, ', 'Cham, ZUG, 6330  Switzerland', NULL, 'Zug', 'Zug', 'Cham', 'Switzerland', NULL, NULL, NULL, 'XAXX010101106', 0, 'Cliente', 'temporal355', '', '16/10/2017 18:34', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `puesto` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono1` bigint(20) NOT NULL,
  `telefono2` bigint(20) NOT NULL,
  `notas` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactos`
--

INSERT INTO `contactos` (`id`, `client_id`, `nombre`, `puesto`, `correo`, `telefono1`, `telefono2`, `notas`) VALUES
(1, 17, 'Antonio', 'Alvarado', 'developer@sancherodriguez.com', 9567840942, 8606255948, 'hi testing form'),
(4, 21, 'Juan Andres', 'Lopez GonzÃ¡lez', 'developer@sanchezrodriguez.com', 9658475865, 8545254578, ''),
(5, 27, 'Developer', 'hr', 'developer@sanchezrodriguez.com', 965847586, 8545254578, ''),
(7, 23, 'Contacto en Cemex', 'Gerente', 'correo@12.com', 818181, 81818, 'Notas del ejecutivo contacto en CEMEX'),
(19, 38, 'Americo', 'El jefe de jefes', 'acardenas@arquitecturafiscal.com', 18141655569, 18141655569, 'Es el picudo'),
(20, 41, 'Jose Cruz', 'developer', 'demo@cruz.org.mx', 17776161, 0, 'demo');

-- --------------------------------------------------------

--
-- Table structure for table `datos_cio_general`
--

CREATE TABLE `datos_cio_general` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `facturadora_id` int(11) NOT NULL,
  `suministradoras_id` int(11) NOT NULL,
  `fondo_de_pension` varchar(20) NOT NULL,
  `alimentos` int(11) NOT NULL,
  `alimentos_others` varchar(250) NOT NULL,
  `numero_de_trabajadores` bigint(50) NOT NULL,
  `fecha_en_la_que` varchar(50) NOT NULL,
  `fecha_en_que` varchar(50) NOT NULL,
  `tipo_de_ingresos` int(11) NOT NULL,
  `periodo_de_la_nomina` int(11) NOT NULL,
  `monto_mensual` bigint(50) NOT NULL,
  `los_trabajadores` int(11) NOT NULL,
  `banco_actual` varchar(100) NOT NULL,
  `que_prestaciones_adicionales` varchar(100) NOT NULL,
  `el_cliente_le_otorgo` int(11) NOT NULL,
  `infonavit` int(11) NOT NULL,
  `creditc` int(11) NOT NULL,
  `pension_alimenticia` int(11) NOT NULL,
  `pension` int(11) NOT NULL,
  `el_cliente_la` int(11) NOT NULL,
  `el_cliente_la_cual` text NOT NULL,
  `se_ofrecio_financiamientos` int(11) NOT NULL,
  `se_les_ofrecio` int(11) NOT NULL,
  `se_les_ofrecio_cual` varchar(100) NOT NULL,
  `algun_otro_acuerdo` varchar(100) NOT NULL,
  `el_cliente_administra` varchar(100) NOT NULL,
  `se_le_solicito` int(11) NOT NULL,
  `numero_socios_remunerar` varchar(100) NOT NULL,
  `periodo_de_ingreso` int(11) NOT NULL,
  `monto_mensual_dispersar` varchar(100) NOT NULL,
  `fecha_en_la_que_iniciar` varchar(100) NOT NULL,
  `fecha_en_la_que_primera` varchar(100) NOT NULL,
  `fecha_de_empresa` varchar(100) NOT NULL,
  `honorarios_cobrar_cliente` varchar(100) NOT NULL,
  `el_deposito_del_cliente` int(11) NOT NULL,
  `se_proporciono_cliente` int(11) NOT NULL,
  `se_comento_cliente` int(11) NOT NULL,
  `nombre_de_la_persona` int(11) NOT NULL,
  `solicitaron_hojas_membretadas` int(11) NOT NULL,
  `cliente_actualmente_cuenta` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datos_cio_general`
--

INSERT INTO `datos_cio_general` (`id`, `client_id`, `facturadora_id`, `suministradoras_id`, `fondo_de_pension`, `alimentos`, `alimentos_others`, `numero_de_trabajadores`, `fecha_en_la_que`, `fecha_en_que`, `tipo_de_ingresos`, `periodo_de_la_nomina`, `monto_mensual`, `los_trabajadores`, `banco_actual`, `que_prestaciones_adicionales`, `el_cliente_le_otorgo`, `infonavit`, `creditc`, `pension_alimenticia`, `pension`, `el_cliente_la`, `el_cliente_la_cual`, `se_ofrecio_financiamientos`, `se_les_ofrecio`, `se_les_ofrecio_cual`, `algun_otro_acuerdo`, `el_cliente_administra`, `se_le_solicito`, `numero_socios_remunerar`, `periodo_de_ingreso`, `monto_mensual_dispersar`, `fecha_en_la_que_iniciar`, `fecha_en_la_que_primera`, `fecha_de_empresa`, `honorarios_cobrar_cliente`, `el_deposito_del_cliente`, `se_proporciono_cliente`, `se_comento_cliente`, `nombre_de_la_persona`, `solicitaron_hojas_membretadas`, `cliente_actualmente_cuenta`) VALUES
(1, 1, 1, 0, '2', 1, 'sdafcasd', 6, 'dsfgsg', 'dsfgdsfg', 1, 1, 77, 1, 'sdfdsf', 'dsfsdf', 1, 0, 0, 0, 0, 0, '', 0, 0, '', 'dsgdsg', 'En este caso hay que solixitarie su base dsfsdfdatos de todos los trabajadores: Base datos SUA', 0, 'gfhjgf', 1, 'gfhgfh', 'gfhgfh', 'gfhfgh', 'gfhgfhfg', '44', 1, 2, 2, 4, 2, 1),
(18, 1, 0, 0, '1', 1, '', 12, '2098', '2097', 1, 1, 12, 1, '2098', '123', 1, 0, 0, 0, 0, 0, '', 1, 1, '12', '12', '123', 1, '', 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0),
(27, 1, 0, 0, '1', 1, '', 68, 'dsfgsg', 'dsfgdsfg', 1, 3, 55, 1, '16', 'dsfsdf', 0, 0, 0, 0, 0, 0, '', 0, 0, '', 'dsgdsg', 'En este caso hay que solicitarle su base de datos de todos los trabajadores: Base datos SUA', 0, 'gfhjgf', 1, 'gfhgfh', 'gfhgfh', 'gfhfgh', 'gfhgfhfg', '44', 1, 2, 1, 7, 2, 2),
(28, 1, 0, 0, '1', 0, '', 55, '', '', 0, 0, 25, 0, '', '', 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', '', 0, '', 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0),
(29, 1, 21, 0, '1', 0, '', 4, '', '', 0, 0, 33, 0, '', '', 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', '', 0, '', 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0),
(33, 23, 17, 42, '', 0, '', 89, 'yyyyyyyyy', 'yyyyyyy', 1, 1, 95, 1, '1', 'dffffffffff', 1, 0, 0, 1, 1, 0, '', 0, 0, '', 'hjbbytjbtjt', 'En este caso hay que solicitarle su base de datos de todos los trabajadores: Base datos SUA', 0, '', 0, '', '', '', '', '45654', 1, 1, 1, 1, 1, 1),
(34, 17, 17, 42, '', 0, '', 8, '', '', 0, 0, 45, 0, '', '', 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', '', 0, '', 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0),
(35, 17, 17, 42, '', 0, '', 32, 'yyyyyyyyy', 'yyyyyyy', 1, 2, 35, 0, '1', 'dffffffffff', 0, 0, 0, 0, 0, 0, '', 0, 0, '', 'hjbbytjbtjt', 'jnijnij', 0, '', 0, '', '', '', '', '45654', 1, 2, 1, 7, 1, 1),
(36, 17, 17, 42, '', 0, '', 0, '', '', 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', '', 0, '', 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0),
(37, 17, 17, 42, '', 0, '', 0, '', '', 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, '', 0, 0, '', '', '', 0, '', 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `datos_contratos`
--

CREATE TABLE `datos_contratos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `facturadora_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datos_contratos`
--

INSERT INTO `datos_contratos` (`id`, `user_id`, `facturadora_id`, `name`, `content`, `date`) VALUES
(1, 42, 44, 'sdfgs', 'sgs', '2019-02-18 11:15:45'),
(2, 34, 2, 'sfdf', 'fafafaf', '2016-04-12 15:30:35');

--
-- Triggers `datos_contratos`
--
DELIMITER $$
CREATE TRIGGER `contrato_template_change_log` BEFORE UPDATE ON `datos_contratos` FOR EACH ROW INSERT INTO datos_contratos_log(id_contratos, id_facturadora, name, content, date) VALUES(OLD.id, OLD.facturadora_id, OLD.name, OLD.content, NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `datos_contratos_generated`
--

CREATE TABLE `datos_contratos_generated` (
  `id` int(11) NOT NULL,
  `id_emp` int(11) NOT NULL,
  `id_contract` int(11) NOT NULL,
  `completed` int(11) NOT NULL DEFAULT '-1',
  `datas` text NOT NULL,
  `file` varchar(150) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datos_contratos_generated`
--

INSERT INTO `datos_contratos_generated` (`id`, `id_emp`, `id_contract`, `completed`, `datas`, `file`, `date`) VALUES
(1, 3, 3, -1, 'sdfdsf', 'sfsdf', '2019-02-18 11:15:45'),
(2, 45, 55, -1, 'sdfdsf', 'sfsdf', '2019-02-18 11:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `datos_contratos_log`
--

CREATE TABLE `datos_contratos_log` (
  `id_contratos_log` int(11) NOT NULL,
  `id_contratos` int(11) NOT NULL,
  `id_facturadora` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `datos_del_beneficiario`
--

CREATE TABLE `datos_del_beneficiario` (
  `id` int(11) NOT NULL,
  `dg_id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido_paterno` varchar(200) NOT NULL,
  `apellido_materno` varchar(200) NOT NULL,
  `parentesco` varchar(200) NOT NULL,
  `fecha_de_nacimiento` date NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `rstado_civil` varchar(200) NOT NULL,
  `rfc` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datos_del_beneficiario`
--

INSERT INTO `datos_del_beneficiario` (`id`, `dg_id`, `nombre`, `apellido_paterno`, `apellido_materno`, `parentesco`, `fecha_de_nacimiento`, `direccion`, `rstado_civil`, `rfc`) VALUES
(1, 36, '21', '21', '21', '21', '2013-01-21', '21', '21', '21'),
(2, 46, 'BENE 1', 'APELLIDO 1', 'MATERNO', 'PARENTESCO', '0000-00-00', 'DIRE', 'CASADO', 'RFC'),
(3, 47, '1', '1', '1', '1', '0000-00-00', '1', '1', '1'),
(4, 59, '', '', '', '', '0000-00-00', '', '', ''),
(5, 65, '', '', '', '', '0000-00-00', '', '', ''),
(6, 75, '', '', '', '', '0000-00-00', '', '', ''),
(7, 0, '', '', '', '', '0000-00-00', '', '', ''),
(8, 97, '', '', '', '', '0000-00-00', '', '', ''),
(9, 100, '', '', '', '', '0000-00-00', '', '', ''),
(10, 102, '', '', '', '', '0000-00-00', '', '', ''),
(11, 110, '', '', '', '', '0000-00-00', '', '', ''),
(12, 117, '', '', '', '', '0000-00-00', '', '', ''),
(13, 120, '', '', '', '', '0000-00-00', '', '', ''),
(14, 121, '0', '1', '0', '', '0000-00-00', '', '', ''),
(15, 123, '0', '1', '0', '', '0000-00-00', '', '', ''),
(16, 125, 'BENE 1', 'APELLIDO 1', 'MATERNO', 'PARENTESCO', '0000-00-00', 'DIRE', 'CASADO', 'RFC'),
(17, 126, 'BENE 1', 'APELLIDO 1', 'MATERNO', 'PARENTESCO', '0000-00-00', 'DIRE', 'CASADO', 'RFC'),
(18, 127, 'BENE 1', 'APELLIDO 1', 'MATERNO', 'PARENTESCO', '0000-00-00', 'DIRE', 'CASADO', 'RFC'),
(19, 128, 'BENE 1', 'APELLIDO 1', 'MATERNO', 'PARENTESCO', '0000-00-00', 'DIRE', 'CASADO', 'RFC');

-- --------------------------------------------------------

--
-- Table structure for table `datos_del_fecha_contrato`
--

CREATE TABLE `datos_del_fecha_contrato` (
  `id` int(11) NOT NULL,
  `dg_id` int(11) NOT NULL,
  `contract_initial_day` int(11) NOT NULL,
  `contract_initial_month` int(11) NOT NULL,
  `contract_initial_year` int(11) NOT NULL,
  `contract_final_day` int(11) NOT NULL,
  `contract_final_month` int(11) NOT NULL,
  `contract_final_year` int(11) NOT NULL,
  `work_initial_day` int(11) NOT NULL,
  `work_initial_month` int(11) NOT NULL,
  `work_initial_year` int(11) NOT NULL,
  `employee_payment_periodicity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datos_del_fecha_contrato`
--

INSERT INTO `datos_del_fecha_contrato` (`id`, `dg_id`, `contract_initial_day`, `contract_initial_month`, `contract_initial_year`, `contract_final_day`, `contract_final_month`, `contract_final_year`, `work_initial_day`, `work_initial_month`, `work_initial_year`, `employee_payment_periodicity`) VALUES
(4, 46, 1, 1, 2013, 4, 5, 2016, 7, 8, 2019, '10'),
(5, 121, 0, 1, 0, 0, 0, 0, 0, 0, 0, ''),
(6, 123, 0, 1, 0, 0, 0, 0, 0, 0, 0, ''),
(7, 125, 1, 1, 2013, 4, 5, 2016, 7, 8, 2019, '10'),
(8, 126, 1, 1, 2013, 4, 5, 2016, 7, 8, 2019, '10'),
(9, 127, 1, 1, 2013, 4, 5, 2016, 7, 8, 2019, '10'),
(10, 128, 1, 1, 2013, 4, 5, 2016, 7, 8, 2019, '10');

-- --------------------------------------------------------

--
-- Table structure for table `datos_economicos`
--

CREATE TABLE `datos_economicos` (
  `id` int(11) NOT NULL,
  `dg_id` int(11) NOT NULL,
  `posee_bienes_inmuebles` int(1) NOT NULL,
  `ubicacion_bienes_inmuebles` varchar(200) NOT NULL,
  `valor_aprox_bienes_inmuebles` varchar(200) NOT NULL,
  `posee_automovil` int(1) NOT NULL,
  `marca_automovil` varchar(200) NOT NULL,
  `modelo_automovil` varchar(200) NOT NULL,
  `valor_automovil` varchar(200) NOT NULL,
  `pagado_automovil` int(1) NOT NULL,
  `deudas_pendientes` int(1) NOT NULL,
  `tipo_de_deuda` varchar(200) NOT NULL,
  `monto_de_deuda` varchar(200) NOT NULL,
  `pagos_vencidos` int(1) NOT NULL,
  `tarjeta_de_credito` int(1) NOT NULL,
  `banco_de_tarjeta_de_credito` varchar(200) NOT NULL,
  `tarjeta_de_nomina` int(1) NOT NULL,
  `banco_de_tarjeta_de_nomina` varchar(200) NOT NULL,
  `credito_hipotecario` int(1) NOT NULL,
  `credito_comercial` int(1) NOT NULL,
  `credito_departamental` int(1) NOT NULL,
  `credito_automotriz` int(1) NOT NULL,
  `credito_bancario` int(1) NOT NULL,
  `credito_otro` int(1) NOT NULL,
  `cantidad_de_adeudo_infonavit` varchar(200) NOT NULL,
  `cantidad_de_adeudo_fonacot` varchar(200) NOT NULL,
  `cantidad_de_adeudo_departamental` varchar(200) NOT NULL,
  `cantidad_de_adeudo_hipotecario` varchar(200) NOT NULL,
  `cantidad_de_adeudo_automotriz` varchar(200) NOT NULL,
  `cantidad_de_adeudo_otros` varchar(200) NOT NULL,
  `cantidad_de_adeudo_bancario` varchar(200) NOT NULL,
  `cantidad_de_adeudo_comercial` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datos_economicos`
--

INSERT INTO `datos_economicos` (`id`, `dg_id`, `posee_bienes_inmuebles`, `ubicacion_bienes_inmuebles`, `valor_aprox_bienes_inmuebles`, `posee_automovil`, `marca_automovil`, `modelo_automovil`, `valor_automovil`, `pagado_automovil`, `deudas_pendientes`, `tipo_de_deuda`, `monto_de_deuda`, `pagos_vencidos`, `tarjeta_de_credito`, `banco_de_tarjeta_de_credito`, `tarjeta_de_nomina`, `banco_de_tarjeta_de_nomina`, `credito_hipotecario`, `credito_comercial`, `credito_departamental`, `credito_automotriz`, `credito_bancario`, `credito_otro`, `cantidad_de_adeudo_infonavit`, `cantidad_de_adeudo_fonacot`, `cantidad_de_adeudo_departamental`, `cantidad_de_adeudo_hipotecario`, `cantidad_de_adeudo_automotriz`, `cantidad_de_adeudo_otros`, `cantidad_de_adeudo_bancario`, `cantidad_de_adeudo_comercial`) VALUES
(1, 42, 0, '2', '2', 0, '2', '2', '2', 0, 0, '2', '2', 0, 0, '2', 0, '2', 0, 0, 0, 0, 0, 0, '2', '2', '2', '2', '2', '2', '2', '2'),
(2, 42, 0, '2', '2', 0, '2', '2', '2', 0, 0, '2', '2', 0, 0, '2', 0, '2', 0, 0, 0, 0, 0, 0, '2', '2', '2', '2', '2', '2', '2', '2'),
(3, 42, 0, '2', '2', 0, '2', '2', '2', 0, 0, '2', '2', 0, 0, '2', 0, '2', 0, 0, 0, 0, 0, 0, '2', '2', '2', '2', '2', '2', '2', '2'),
(4, 42, 0, '2', '2', 0, '2', '2', '2', 0, 0, '2', '2', 0, 0, '2', 0, '2', 0, 0, 0, 0, 0, 0, '2', '2', '2', '2', '2', '2', '2', '2'),
(5, 43, 1, '3', '3', 1, '3', '3', '3', 1, 1, '3', '3', 1, 1, '3', 1, '3', 1, 1, 1, 1, 1, 1, '3', '3', '3', '3', '3', '3', '3', '3'),
(6, 44, 0, '', '', 0, '', '', '', 0, 0, '', '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(7, 36, 0, '21', '21', 1, '21', '21', '21', 0, 1, '21', '21', 0, 1, '21', 0, '21', 1, 0, 1, 0, 1, 0, '21', '21', '21', '21', '21', '21', '21', '21'),
(8, 46, 1, '1', '1', 1, '1', '123', '1', 1, 0, '1', '1', 0, 0, 'BANORTE', 0, '123', 0, 0, 0, 0, 0, 0, '123', '123', '123', '123', '123', '123', '123', '123'),
(9, 47, 0, '1', '1', 0, '1', '1', '1', 0, 0, '1', '1', 0, 0, '1', 0, '1', 0, 0, 0, 0, 0, 0, '1', '1', '1', '1', '1', '1', '1', '1'),
(10, 59, 0, '', '', 0, '', '', '', 0, 0, '', '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(11, 63, 0, '', '', 0, '', '', '', 0, 0, '', '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(12, 65, 0, '', '', 0, '', '', '', 0, 0, '', '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(13, 75, 0, '', '', 0, '', '', '', 0, 0, '', '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(14, 93, 0, '', '', 0, '', '', '', 0, 0, '', '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(15, 97, 0, '', '', 0, '', '', '', 0, 0, '', '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(16, 100, 0, '', '', 0, '', '', '', 0, 0, '', '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(17, 102, 0, '', '', 0, '', '', '', 0, 0, '', '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(18, 110, 0, '', '', 0, '', '', '', 0, 0, '', '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(19, 117, 0, '', '', 0, '', '', '', 0, 0, '', '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(20, 120, 0, '', '', 0, '', '', '', 0, 0, '', '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(21, 121, 0, '1', '0', 0, '', '', '', 0, 0, '', '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(22, 123, 0, '1', '0', 0, '', '', '', 0, 0, '', '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(23, 125, 1, '1', '1', 1, '1', '123', '1', 1, 0, '1', '1', 0, 0, 'BANORTE', 0, '123', 0, 0, 0, 0, 0, 0, '123', '123', '123', '123', '123', '123', '123', '123'),
(24, 126, 1, '1', '1', 1, '1', '123', '1', 1, 0, '1', '1', 0, 0, 'BANORTE', 0, '123', 0, 0, 0, 0, 0, 0, '123', '123', '123', '123', '123', '123', '123', '123'),
(25, 127, 1, '1', '1', 1, '1', '123', '1', 1, 0, '1', '1', 0, 0, 'BANORTE', 0, '123', 0, 0, 0, 0, 0, 0, '123', '123', '123', '123', '123', '123', '123', '123'),
(26, 128, 1, '1', '1', 1, '1', '123', '1', 1, 0, '1', '1', 0, 0, 'BANORTE', 0, '123', 0, 0, 0, 0, 0, 0, '123', '123', '123', '123', '123', '123', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `datos_escolares`
--

CREATE TABLE `datos_escolares` (
  `id` int(11) NOT NULL,
  `dg_id` int(11) NOT NULL,
  `primaria_nombre_de_la_institucion` varchar(200) NOT NULL,
  `primaria_entidad_federativa` varchar(200) NOT NULL,
  `primaria_anos_cursados` varchar(200) NOT NULL,
  `primaria_certificado_titulo` varchar(200) NOT NULL,
  `secuandaria_nombre_de_la_institucion` varchar(200) NOT NULL,
  `secuandaria_entidad_federativa` varchar(200) NOT NULL,
  `secuandaria_anos_cursados` varchar(200) NOT NULL,
  `secuandaria_certificado_titulo` varchar(200) NOT NULL,
  `preparatoria_nombre_de_la_institucion` varchar(200) NOT NULL,
  `preparatoria_entidad_federativa` varchar(200) NOT NULL,
  `preparatoria_anos_cursados` varchar(200) NOT NULL,
  `preparatoria_certificado_titulo` varchar(200) NOT NULL,
  `universidad_nombre_de_la_institucion` varchar(200) NOT NULL,
  `universidad_entidad_federativa` varchar(200) NOT NULL,
  `universidad_anos_cursados` varchar(200) NOT NULL,
  `universidad_certificado_titulo` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datos_escolares`
--

INSERT INTO `datos_escolares` (`id`, `dg_id`, `primaria_nombre_de_la_institucion`, `primaria_entidad_federativa`, `primaria_anos_cursados`, `primaria_certificado_titulo`, `secuandaria_nombre_de_la_institucion`, `secuandaria_entidad_federativa`, `secuandaria_anos_cursados`, `secuandaria_certificado_titulo`, `preparatoria_nombre_de_la_institucion`, `preparatoria_entidad_federativa`, `preparatoria_anos_cursados`, `preparatoria_certificado_titulo`, `universidad_nombre_de_la_institucion`, `universidad_entidad_federativa`, `universidad_anos_cursados`, `universidad_certificado_titulo`) VALUES
(1, 43, '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2'),
(2, 36, '21', '21', '21', '21', '21', '21', '21', '21', '21', '21', '21', '21', '21', '21', '21', '21'),
(3, 46, 'PRIMARIA', 'NUEVO LEON', '1', 'CERTIFICADO', 'SECUNDARIA', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(4, 47, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(5, 59, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 63, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 65, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 75, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 97, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 100, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 102, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 110, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 117, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, 120, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, 121, '0', '1', '0', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 123, '0', '1', '0', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 125, 'PRIMARIA', 'NUEVO LEON', '1', 'CERTIFICADO', 'SECUNDARIA', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(19, 126, 'PRIMARIA', 'NUEVO LEON', '1', 'CERTIFICADO', 'SECUNDARIA', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(20, 127, 'PRIMARIA', 'NUEVO LEON', '1', 'CERTIFICADO', 'SECUNDARIA', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(21, 128, 'PRIMARIA', 'NUEVO LEON', '1', 'CERTIFICADO', 'SECUNDARIA', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(22, 31, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(23, 33, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `datos_familiares`
--

CREATE TABLE `datos_familiares` (
  `id` int(11) NOT NULL,
  `dg_id` int(11) NOT NULL,
  `padre` varchar(200) NOT NULL,
  `padre_vive` int(1) NOT NULL,
  `padre_depende_economicamente` varchar(200) NOT NULL,
  `padre_ocupacion` varchar(200) NOT NULL,
  `madre` varchar(200) NOT NULL,
  `madre_vive` int(1) NOT NULL,
  `madre_depende_economicamente` varchar(200) NOT NULL,
  `madre_ocupacion` varchar(200) NOT NULL,
  `esposo` varchar(200) NOT NULL,
  `esposo_vive` int(1) NOT NULL,
  `esposo_depende_economicamente` varchar(200) NOT NULL,
  `esposo_ocupacion` varchar(200) NOT NULL,
  `hijo` varchar(200) NOT NULL,
  `hijo_vive` int(1) NOT NULL,
  `hijo_depende_economicamente` varchar(200) NOT NULL,
  `hijo_ocupacion` varchar(200) NOT NULL,
  `hijo2` varchar(200) NOT NULL,
  `hijo2_vive` int(1) NOT NULL,
  `hijo2_depende_economicamente` varchar(200) NOT NULL,
  `hijo2_ocupacion` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datos_familiares`
--

INSERT INTO `datos_familiares` (`id`, `dg_id`, `padre`, `padre_vive`, `padre_depende_economicamente`, `padre_ocupacion`, `madre`, `madre_vive`, `madre_depende_economicamente`, `madre_ocupacion`, `esposo`, `esposo_vive`, `esposo_depende_economicamente`, `esposo_ocupacion`, `hijo`, `hijo_vive`, `hijo_depende_economicamente`, `hijo_ocupacion`, `hijo2`, `hijo2_vive`, `hijo2_depende_economicamente`, `hijo2_ocupacion`) VALUES
(1, 31, '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', ''),
(2, 42, '2', 0, '2', '2', '2', 1, '2', '2', '2', 0, '2', '2', '2', 0, '2', '2', '2', 0, '2', '2'),
(3, 42, '2', 0, '2', '2', '2', 1, '2', '2', '2', 0, '2', '2', '2', 0, '2', '2', '2', 0, '2', '2'),
(4, 43, '3', 1, '3', '3', '3', 1, '3', '3', '3', 1, '3', '3', '3', 1, '3', '3', '3', 1, '3', '3'),
(5, 44, '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', ''),
(6, 36, '21', 1, '21', '21', '21', 0, '21', '21', '21', 1, '21', '21', '21', 0, '21', '21', '21', 0, '21', '21'),
(7, 46, 'PADRE', 1, 'NO', 'OCUPACION PADRE', 'MADRE', 1, '0', 'OCUPACION MADRE', 'ESPOSO', 1, 'ESPOSO DPENDE', 'ESPOSO OCUPACION', 'HIJO 1', 1, '1', 'HIJO OCUPACION', 'HIJO 2', 1, 'NO', 'HIJO 2 OCUPACION'),
(8, 47, '0', 1, '0', '0', '0', 1, '0', '0', '0', 1, '0', '0', '0', 1, '0', '0', '0', 1, '0', '0'),
(9, 48, 'sdfsd', 1, 'dvsdv', 'xcvxv', 'dfvdfv', 1, 'fddf', 'xcvxcv', 'fdbdf', 1, 'xdvdsv', 'xcvxcv', 'xvdfv', 1, 'xcvxv', 'xcvxcv', 'xcvxv', 1, 'cxvxcv', 'xcvxv'),
(10, 59, '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', ''),
(11, 63, 'x', 0, 'x', 'x', 'x', 0, 'x', '', 'x', 0, '', '', '', 0, '', '', '', 0, '', ''),
(12, 65, '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', ''),
(13, 75, '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', ''),
(14, 93, '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', ''),
(15, 97, '0', 0, '0', '', '0', 0, '0', '', '0', 0, '0', '', '0', 0, '0', '', '0', 0, '0', ''),
(16, 100, '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', ''),
(17, 102, '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', ''),
(18, 110, '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', ''),
(19, 117, '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', ''),
(20, 120, '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', ''),
(21, 121, '0', 1, '0', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', ''),
(22, 123, '0', 1, '0', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', ''),
(23, 125, 'PADRE', 1, 'NO', 'OCUPACION PADRE', 'MADRE', 1, '0', 'OCUPACION MADRE', 'ESPOSO', 1, 'ESPOSO DPENDE', 'ESPOSO OCUPACION', 'HIJO 1', 1, '1', 'HIJO OCUPACION', 'HIJO 2', 1, 'NO', 'HIJO 2 OCUPACION'),
(24, 126, 'PADRE', 1, 'NO', 'OCUPACION PADRE', 'MADRE', 1, '0', 'OCUPACION MADRE', 'ESPOSO', 1, 'ESPOSO DPENDE', 'ESPOSO OCUPACION', 'HIJO 1', 1, '1', 'HIJO OCUPACION', 'HIJO 2', 1, 'NO', 'HIJO 2 OCUPACION'),
(25, 127, 'PADRE', 1, 'NO', 'OCUPACION PADRE', 'MADRE', 1, '0', 'OCUPACION MADRE', 'ESPOSO', 1, 'ESPOSO DPENDE', 'ESPOSO OCUPACION', 'HIJO 1', 1, '1', 'HIJO OCUPACION', 'HIJO 2', 1, 'NO', 'HIJO 2 OCUPACION'),
(26, 128, 'PADRE', 1, 'NO', 'OCUPACION PADRE', 'MADRE', 1, '0', 'OCUPACION MADRE', 'ESPOSO', 1, 'ESPOSO DPENDE', 'ESPOSO OCUPACION', 'HIJO 1', 1, '1', 'HIJO OCUPACION', 'HIJO 2', 1, 'NO', 'HIJO 2 OCUPACION');

-- --------------------------------------------------------

--
-- Table structure for table `DATOS_GENERALES`
--

CREATE TABLE `DATOS_GENERALES` (
  `id` int(11) NOT NULL,
  `cliente_id` int(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cio_id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido_paterno` varchar(100) NOT NULL,
  `apellido_materno` varchar(100) NOT NULL,
  `estado_civil` varchar(50) NOT NULL,
  `curp` varchar(50) DEFAULT NULL,
  `fecha_de_nacimiento` date DEFAULT NULL,
  `lugar_de_nacimiento` varchar(100) NOT NULL,
  `nss` varchar(50) DEFAULT NULL,
  `rfc` varchar(100) DEFAULT NULL,
  `domicilio_calle` text NOT NULL,
  `domicilio_numero` varchar(100) NOT NULL,
  `domicilio_colonia` varchar(100) NOT NULL,
  `domicilio_municipio` varchar(100) NOT NULL,
  `domicilio_ciudad` varchar(100) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `cp` varchar(100) NOT NULL,
  `tiempo_de_radicar` varchar(75) NOT NULL,
  `tel_hogar` bigint(20) NOT NULL,
  `celular` bigint(15) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sueldo_mensul` bigint(15) DEFAULT NULL,
  `puesto` bigint(15) NOT NULL,
  `unidad_medica_familiar` varchar(100) NOT NULL,
  `afore_que_administra_su_cuenta` varchar(100) NOT NULL,
  `credito_infonavit` int(1) NOT NULL,
  `no_de_credito_infonavit` int(11) NOT NULL,
  `credito_fonacot` int(1) NOT NULL,
  `no_de_credito_fonacot` int(11) NOT NULL,
  `pension_alimenticia` int(1) NOT NULL,
  `procentaje_o_importe_de_pension` double NOT NULL,
  `tiene_otro_empleo` int(1) NOT NULL,
  `tiene_otro_ingreso` int(1) NOT NULL,
  `presentara_declaracion_anual` int(1) NOT NULL,
  `employee_sex` int(11) DEFAULT '1',
  `employee_education` varchar(150) NOT NULL,
  `estatus` varchar(20) DEFAULT NULL,
  `step_count` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `DATOS_GENERALES`
--

INSERT INTO `DATOS_GENERALES` (`id`, `cliente_id`, `user_id`, `cio_id`, `nombre`, `apellido_paterno`, `apellido_materno`, `estado_civil`, `curp`, `fecha_de_nacimiento`, `lugar_de_nacimiento`, `nss`, `rfc`, `domicilio_calle`, `domicilio_numero`, `domicilio_colonia`, `domicilio_municipio`, `domicilio_ciudad`, `estado_id`, `cp`, `tiempo_de_radicar`, `tel_hogar`, `celular`, `email`, `sueldo_mensul`, `puesto`, `unidad_medica_familiar`, `afore_que_administra_su_cuenta`, `credito_infonavit`, `no_de_credito_infonavit`, `credito_fonacot`, `no_de_credito_fonacot`, `pension_alimenticia`, `procentaje_o_importe_de_pension`, `tiene_otro_empleo`, `tiene_otro_ingreso`, `presentara_declaracion_anual`, `employee_sex`, `employee_education`, `estatus`, `step_count`) VALUES
(130, 17, 2, 34, 'Alex.', 'G', '.', 'HGVUHGVUH', 'BOXW310820HNERXN09', '1972-04-01', 'UHGUGYH', 'HHHHHHHHHHH', 'SABJ7501107X1', 'UHYGUHBJ', 'JHUBUHB', 'UHYBGUIHB', 'UGUYBH', 'HYGBUYHB', 18, 'HUBUHU', 'UHGUHBIH', 9654594956, 49849849849854, 'HGFVYGFY@GUHG.JBHJ', 59465465465, 0, '98498498', 'HGVHGUBHJ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'HGVGHHG', '', 1),
(131, 17, 2, 34, 'Joel', 'Sanchez', 'B', 'HGVUHGVUH', 'BOXW310820HNERXN09', '1972-04-01', 'UHGUGYH', 'HHHHHHHHHHH', 'SABJ7501107X1', 'UHYGUHBJ', 'JHUBUHB', 'UHYBGUIHB', 'UGUYBH', 'HYGBUYHB', 18, 'HUBUHU', 'UHGUHBIH', 9654594956, 49849849849854, 'HGFVYGFY@GUHG.JBHJ', 59465465465, 0, '98498498', 'HGVHGUBHJ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'HGVGHHG', '', 1),
(132, 1, 2, 1, 'Alex.', 'G', '', '', NULL, NULL, '', NULL, NULL, '', '', '', '', '', 1, '', '', 0, 0, NULL, 0, 1, '', '', 0, 1, 0, 1, 0, 0, 0, 0, 0, 1, '', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `datos_propuesta`
--

CREATE TABLE `datos_propuesta` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `propuesta_file` text NOT NULL,
  `propuesta_notas` text NOT NULL,
  `propuesta_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datos_propuesta`
--

INSERT INTO `datos_propuesta` (`id`, `id_cliente`, `propuesta_file`, `propuesta_notas`, `propuesta_date`) VALUES
(4, 41, 'uploads/propuesta demo.txt', 'comentarios', '2017-01-11 19:23:14'),
(3, 17, 'uploads/F11438 Volkswagen.pdf', 'test', '2016-11-15 19:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `datos_propuesta_notes`
--

CREATE TABLE `datos_propuesta_notes` (
  `id` int(11) NOT NULL,
  `id_propuesta` int(11) NOT NULL,
  `notes` text NOT NULL,
  `post_date` datetime NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datos_propuesta_notes`
--

INSERT INTO `datos_propuesta_notes` (`id`, `id_propuesta`, `notes`, `post_date`, `id_user`) VALUES
(1, 2, 'hiiii', '2016-11-15 20:10:59', 40),
(2, 3, 'NOTA de la propuestas', '2016-11-22 20:32:14', 2),
(3, 4, 'nota demo', '2017-01-11 19:23:30', 44);

-- --------------------------------------------------------

--
-- Table structure for table `datos_salarios_minimos_profesionales`
--

CREATE TABLE `datos_salarios_minimos_profesionales` (
  `id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `minimun_wage` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datos_salarios_minimos_profesionales`
--

INSERT INTO `datos_salarios_minimos_profesionales` (`id`, `description`, `minimun_wage`) VALUES
(1, 'Oficial de albaÃ±ilerÃ­a', '106.49'),
(2, 'Dependiente(a) de mostrador en boticas, farmacias y droguerÃ­as', '92.63'),
(3, 'Operador(a) de buldÃ³zer y/o traxcavo', '112.17'),
(4, 'Cajero(a) de mÃ¡quina registradora', '94.46'),
(5, 'Cantinero(a) preparador(a) de bebidas', '96.65'),
(6, 'Carpintero(a)', '106.49'),
(7, 'Oficial carpintero(a) en fabricaciÃ³n y reparaciÃ³n de muebles', '104.51'),
(8, 'Cocinero(a), mayor(a) en restaurantes, fondas y demÃ¡s establecimientos de preparaciÃ³n y venta de alimentos', '103.65'),
(9, 'Oficial en fabricaciÃ³n y reparaciÃ³n de colchones', '93.8'),
(10, 'Oficial colocador(a) de mosaicos y azulejos', '99.9'),
(11, 'Yesero(a) enÂ construcciÃ³n de edificios y casas habitaciÃ³n', '94.33'),
(12, 'Oficial cortador(a) en talleres y fÃ¡bricas de manufactura de calzado', '91.75'),
(13, 'Costurero(a) en confecciÃ³n de ropa en talleres o fÃ¡bricas', '90.5'),
(14, 'Costurero(a) en confecciÃ³n de ropa en trabajo a domicilio', '93.2'),
(15, 'Chofer acomodador(a) de automÃ³viles en estacionamientos', '95.25'),
(16, 'Chofer de camiÃ³n de carga en general', '104.55'),
(17, 'Chofer de camioneta de carga en general', '101.25'),
(18, 'Chofer operador(a) de vehÃ­culos con grÃºa', '96.2'),
(19, 'Operador(a) de draga', '108.75'),
(20, 'Oficial ebanista en fabricaciÃ³n y reparaciÃ³n de muebles', '101.95'),
(21, 'Oficial electricista instalador(a) y reparador(a) de instalaciones elÃ©ctricas', '99.9'),
(22, 'Oficial electricista en la reparaciÃ³n de automÃ³viles y camiones', '101'),
(23, 'Oficial electricista reparador(a) de motores y/o generadores en talleres de servicio', '96.9'),
(24, 'Empleado(a) de gÃ³ndola, anaquel o secciÃ³n en tiendas de autoservicio', '88.6'),
(25, 'Encargado(a) de bodega y/o almacÃ©n', '92.2'),
(26, 'Dependiente(a) de mostrador en ferreterÃ­as y tlapalerÃ­as', '94.3'),
(27, 'Fogonero(a) de calderas de vapor', '97.7'),
(28, 'Oficial gasolinero(a)', '90.5'),
(29, 'Oficial de herrerÃ­a', '98.45'),
(30, 'Oficial hojalatero(a) en la reparaciÃ³n de automÃ³viles y camiones', '100.3'),
(31, 'Lubricador(a) de automÃ³viles, camiones y otros vehÃ­culos de motor', '91.3'),
(32, 'Manejador(a) en granja avÃ­cola', '87.5'),
(33, 'Operador(a) de maquinaria agrÃ­cola', '102.75'),
(34, 'Oficial operador(a) de mÃ¡quinas para madera en general', '97.7'),
(35, 'Oficial mecÃ¡nico(a) en reparaciÃ³n de automÃ³viles y camiones', '105.95'),
(36, 'Oficial cortador(a) en talleres y fÃ¡bricas de manufactura de calzado', '94.3'),
(37, 'Peluquero(a) y cultor(a) de belleza en general', '95.25'),
(38, 'Oficial pintor(a) de automÃ³viles y camiones', '102.58'),
(39, 'Oficial pintor(a) de casas, edificios y construcciones en general', '101.8'),
(40, 'Planchador(a) a mÃ¡quina en tintorerÃ­as, lavanderÃ­as y establecimientos similares', '94.46'),
(41, 'Oficial plomero(a) en instalaciones sanitarias', '102.01'),
(42, 'Oficial radiotÃ©cnico(a) reparador(a) de aparatos elÃ©ctricos y electrÃ³nicos', '106.23'),
(43, 'Recamarero(a) en hoteles, moteles y otros establecimientos de hospedaje', '96.07'),
(44, 'Dependiente(a) de mostrador en refaccionarias de automÃ³viles y camiones', '100.55'),
(45, 'Oficial reparador(a) de aparatos elÃ©ctricos para el hogar', '218.87'),
(46, 'Reportero(a) grÃ¡fico(a) en prensa diaria impresa', '218.87'),
(47, 'Repostero(a) o pastelero(a)', '106.49'),
(48, 'Oficial de sastrerÃ­a en trabajo a domicilio', '107.07'),
(49, 'Secretario(a) auxiliar', '110.14'),
(50, 'Soldador(a) con soplete o con arco elÃ©ctrico', '105.24'),
(51, 'Tablajero(a) y/o carnicero(a) en mostrador', '99.25'),
(52, 'Oficial tapicero(a) de vestiduras de automÃ³viles', '100.97'),
(53, 'Oficial tapicero(a) en reparaciÃ³n de muebles', '100.97'),
(54, 'TÃ©cnico(a) en trabajo social', '120.4'),
(55, 'Vaquero(a) ordeÃ±ador(a) a mÃ¡quina', '92.32'),
(56, 'Velador(a)', '94.3'),
(57, 'Vendedor(a) de piso de aparatos de uso domÃ©stico', '97.11'),
(58, 'Oficial zapatero(a) en talleres de reparaciÃ³n de calzado', '95.6');

-- --------------------------------------------------------

--
-- Table structure for table `DOCUMENTACION`
--

CREATE TABLE `DOCUMENTACION` (
  `id` int(11) NOT NULL,
  `dg_id` int(11) NOT NULL,
  `credencial_de_elector` int(1) DEFAULT NULL,
  `no_de_credencial_de_elector` int(11) DEFAULT NULL,
  `cedula_profesional` int(1) DEFAULT NULL,
  `no_de_Cedula` int(11) DEFAULT NULL,
  `cartilla_militar` int(1) DEFAULT NULL,
  `no_de_cartilla_militar` int(11) DEFAULT NULL,
  `licencia_de_manejo` int(1) DEFAULT NULL,
  `no_de_licencia_de_manejo` int(11) DEFAULT NULL,
  `tipo_de_licencia_de_manejo` varchar(50) NOT NULL,
  `acta_de_nacimiento` varchar(200) NOT NULL,
  `file_de_credencial_de_elector` varchar(200) NOT NULL,
  `file_de_Cedula` varchar(200) NOT NULL,
  `file_de_cartilla_militar` varchar(200) NOT NULL,
  `file_de_licencia_de_manejo` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `DOCUMENTACION`
--

INSERT INTO `DOCUMENTACION` (`id`, `dg_id`, `credencial_de_elector`, `no_de_credencial_de_elector`, `cedula_profesional`, `no_de_Cedula`, `cartilla_militar`, `no_de_cartilla_militar`, `licencia_de_manejo`, `no_de_licencia_de_manejo`, `tipo_de_licencia_de_manejo`, `acta_de_nacimiento`, `file_de_credencial_de_elector`, `file_de_Cedula`, `file_de_cartilla_militar`, `file_de_licencia_de_manejo`) VALUES
(1, 17, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
(2, 18, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
(3, 19, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
(4, 20, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
(5, 21, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
(6, 22, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
(7, 23, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
(8, 24, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
(9, 25, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
(10, 26, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
(11, 27, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
(12, 28, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
(13, 29, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
(14, 30, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
(15, 31, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
(16, 32, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
(17, 39, 0, 1, 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
(18, 42, 0, 2, 0, 2, 1, 2, 1, 2, '2', '', '', '', '', ''),
(19, 43, 1, 3, 1, 3, 1, 3, 1, 3, '3', '', '', '', '', ''),
(20, 44, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
(21, 45, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
(22, 36, 1, 21, 0, 21, 1, 21, 0, 21, '21', '', '', '', '', ''),
(23, 46, 1, 123, 1, 123, 1, 123, 1, 123, 'A', '', 'documents/ALFA SA DE CV/Joel-1975-01-10/OC 4590045135 (1).pdf', '', '', ''),
(24, 48, 1, 1, 1, 1, 1, 1, 1, 1, '1', '', '', '', '', ''),
(25, 47, 0, 0, 0, 0, 0, 0, 0, 0, '0', '', '', '', '', ''),
(26, 57, 1, 0, 1, 0, 1, 0, 1, 0, '0', '', '', '', '', ''),
(27, 51, 1, 0, 1, 0, 1, 0, 1, 0, '0', '', '', '', '', ''),
(28, 59, 0, 0, 0, 0, 0, 0, 0, 0, '0', 'documents/PUBLICO EN GENERAL/Suneesh-1979-09-13/5A.pdf', 'documents/PUBLICO EN GENERAL/Suneesh-1979-09-13/5B (2).pdf', 'documents/PUBLICO EN GENERAL/Suneesh-1979-09-13/5A.pdf', 'documents/PUBLICO EN GENERAL/Suneesh-1979-09-13/4B.pdf', 'documents/PUBLICO EN GENERAL/Suneesh-1979-09-13/5B.pdf'),
(29, 63, 0, 0, 0, 0, 0, 0, 0, 0, 'a', '', 'documents/ALFA SA DE CV/JUAN-1986-01-10/RECIBOLUZ.pdf', '', '', ''),
(30, 64, 1, 0, 1, 0, 1, 0, 0, 0, '0', 'implementacion/documents/PUBLICO EN GENERAL/suneesh-1983-01-17/F10667 Volkswagen Mexico.pdf', 'implementacion/documents/PUBLICO EN GENERAL/suneesh-1983-01-17/4B.pdf', 'implementacion/documents/PUBLICO EN GENERAL/suneesh-1983-01-17/5B (2).pdf', 'implementacion/documents/PUBLICO EN GENERAL/suneesh-1983-01-17/5A.pdf', 'implementacion/documents/PUBLICO EN GENERAL/suneesh-1983-01-17/5B.pdf'),
(31, 66, 0, 0, 0, 0, 0, 0, 0, 0, '10', '', '', '', '', ''),
(32, 67, 0, 0, 0, 0, 0, 0, 0, 0, '10', '', '', '', '', ''),
(33, 65, 0, 0, 0, 0, 0, 0, 0, 0, '2', '', '', '', '', ''),
(34, 75, 1, 6, 1, 6, 1, 6, 1, 6, '2', '', '', '', '', ''),
(35, 84, 1, 6, 0, 0, 0, 0, 0, 0, '2', '', '', '', '', ''),
(36, 85, 0, 0, 0, 0, 0, 0, 0, 0, '2', '', '', '', '', ''),
(37, 87, 0, 0, 0, 0, 0, 0, 0, 0, '2', '', '', '', '', ''),
(38, 89, 0, 0, 0, 0, 0, 0, 0, 0, '2', '', '', '', '', ''),
(39, 93, 0, 0, 0, 0, 0, 0, 0, 0, '0', '', 'implementacion/documents/sunus/suneesh-1980-01-02/4B.pdf', '', '', ''),
(40, 97, 0, 0, 0, 0, 0, 0, 0, 0, '0', '', '', '', '', ''),
(41, 99, 0, 0, 0, 0, 0, 0, 0, 0, '10', '', '', '', '', ''),
(42, 100, 0, 0, 0, 0, 0, 0, 0, 0, '0', '', '', '', '', ''),
(43, 101, 0, 0, 0, 0, 0, 0, 0, 0, '0', '', '', '', '', ''),
(44, 102, 0, 0, 0, 0, 0, 0, 0, 0, '0', '', '', '', '', ''),
(45, 110, 0, 0, 0, 0, 0, 0, 0, 0, '2', '', '', '', '', ''),
(46, 116, 0, 0, 0, 0, 0, 0, 0, 0, '2', '', '', '', '', ''),
(47, 117, 0, 0, 0, 0, 0, 0, 0, 0, '2', '', '', '', '', ''),
(48, 120, 0, 0, 0, 0, 0, 0, 0, 0, '2', '', '', '', '', ''),
(49, 121, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '', '', '0', '', '', ''),
(50, 122, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '', '', '0', '', '', ''),
(51, 123, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '', '', '0', '', '', ''),
(52, 124, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '', '', '0', '', '', ''),
(53, 125, 1, 123, 1, 123, 1, 123, 1, 123, 'A', '', 'documents/ALFA SA DE CV/Joel-1975-01-10/OC 4590045135 (1).pdf', '', '', ''),
(54, 126, 1, 123, 1, 123, 1, 123, 1, 123, 'A', '', 'documents/ALFA SA DE CV/Joel-1975-01-10/OC 4590045135 (1).pdf', '', '', ''),
(55, 127, 1, 123, 1, 123, 1, 123, 1, 123, 'A', '', 'documents/ALFA SA DE CV/Joel-1975-01-10/OC 4590045135 (1).pdf', '', '', ''),
(56, 128, 1, 123, 1, 123, 1, 123, 1, 123, 'A', '', 'documents/ALFA SA DE CV/Joel-1975-01-10/OC 4590045135 (1).pdf', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `dg_id` varchar(255) NOT NULL,
  `pmc_quantity_of_people` varchar(255) NOT NULL,
  `padre_vive` varchar(255) NOT NULL,
  `pmc_months` varchar(255) NOT NULL,
  `pmc_weeks` varchar(255) NOT NULL,
  `pmc_days` varchar(255) NOT NULL,
  `pmc_hours` varchar(255) NOT NULL,
  `pmc_cost` varchar(255) NOT NULL,
  `project_manager_cost` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `dg_id`, `pmc_quantity_of_people`, `padre_vive`, `pmc_months`, `pmc_weeks`, `pmc_days`, `pmc_hours`, `pmc_cost`, `project_manager_cost`) VALUES
(1, '59', '2', '1', '2', '', '', '2', '2', ''),
(2, '59', '4', '1', '2', '', '', '2', '4', ''),
(3, '59', '4', '1', '2', '', '', '2', '3', ''),
(4, '63', '3', '1', '3', '3', '3', '3', '3', ''),
(5, '64', '9', '0', '9', '9', '9', '9', '9', ''),
(6, '65', '3', '1', '3', '1', '1', '1', '2', ''),
(7, '68', '2', '1', '2', '', '', '', '10', ''),
(8, '71', '', '', '', '', '', '', '', ''),
(9, '72', '3', '1', '3', '3', '3', '3', '3', ''),
(10, '70', '2', '1', '2', '2', '2', '2', '2', ''),
(11, '75', '2', '', '2', '', '', '2', '2', ''),
(12, '80', '2', '1', '2', '', '', '', '2', ''),
(13, '83', '2', '1', '3', '', '', '', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estados`
--

INSERT INTO `estados` (`id`, `nombre`) VALUES
(1, 'Aguascalientes'),
(2, 'Baja California'),
(3, 'Baja California Sur'),
(4, 'Campeche'),
(5, 'Coahuila de Zaragoza'),
(6, 'Colima'),
(7, 'Chiapas'),
(8, 'Chihuahua'),
(9, 'Distrito Federal'),
(10, 'Durango'),
(11, 'Guanajuato'),
(12, 'Guerrero'),
(13, 'Hidalgo'),
(14, 'Jalisco'),
(15, 'MÃ©xico'),
(16, 'MichoacÃ¡n de Ocampo'),
(17, 'Morelos'),
(18, 'Nayarit'),
(19, 'Nuevo LeÃ³n'),
(20, 'Oaxaca'),
(21, 'Puebla'),
(22, 'QuerÃ©taro'),
(23, 'Quintana Roo'),
(24, 'San Luis PotosÃ­'),
(25, 'Sinaloa'),
(26, 'Sonora'),
(27, 'Tabasco'),
(28, 'Tamaulipas'),
(29, 'Tlaxcala'),
(30, 'Veracruz de Ignacio de la Llave'),
(31, 'YucatÃ¡n'),
(32, 'Zacatecas');

-- --------------------------------------------------------

--
-- Table structure for table `estatus`
--

CREATE TABLE `estatus` (
  `id` int(11) NOT NULL,
  `description` varchar(75) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estatus`
--

INSERT INTO `estatus` (`id`, `description`, `order`) VALUES
(1, 'Empresas', 0),
(2, 'Archivos generados', 0),
(3, 'Otro estatus', 0);

-- --------------------------------------------------------

--
-- Table structure for table `facturadoras`
--

CREATE TABLE `facturadoras` (
  `id` int(4) NOT NULL,
  `nombre` varchar(255) NOT NULL DEFAULT '',
  `domicilio` varchar(255) DEFAULT NULL,
  `colonia` varchar(200) DEFAULT NULL,
  `municipio` varchar(200) DEFAULT NULL,
  `ciudad` varchar(200) DEFAULT NULL,
  `estado` varchar(200) DEFAULT NULL,
  `pais` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `zip` varchar(6) DEFAULT NULL,
  `rfc` varchar(100) DEFAULT NULL,
  `eliminado` int(11) DEFAULT '0',
  `rol` varchar(100) DEFAULT 'Cliente',
  `password` varchar(255) DEFAULT 'temporal02',
  `notas` varchar(500) DEFAULT NULL,
  `status_update_date` datetime NOT NULL,
  `apoderado` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facturadoras`
--

INSERT INTO `facturadoras` (`id`, `nombre`, `domicilio`, `colonia`, `municipio`, `ciudad`, `estado`, `pais`, `email`, `telefono`, `zip`, `rfc`, `eliminado`, `rol`, `password`, `notas`, `status_update_date`, `apoderado`) VALUES
(1, '123', 'Conocido', 'Centro', 'Monterrey', 'Monterrey', 'Nuevo Leon', 'Mexico', 'sin@correo.com', 'omjom', '64000', 'XOXX010101000', 0, 'Cliente', 'temporal02', '', '2016-08-22 20:16:11', 'ccccccccccccc'),
(17, '321', 'Ricardo Margain 9', 'Valle', 'San Pedro Garza Garcia', 'San Pedro Garza GarcÃ­a', 'Nuevo LeÃ³n', 'MÃ©xico', 'sin@correo.com', '12-21-2222', '64000', 'XOXX010101000', 0, 'Cliente', 'temporal02', 'No', '2016-09-06 22:50:15', '.');

-- --------------------------------------------------------

--
-- Table structure for table `freight`
--

CREATE TABLE `freight` (
  `id` int(11) NOT NULL,
  `dg_id` int(11) NOT NULL,
  `padre` varchar(255) NOT NULL,
  `padre_vive` varchar(255) NOT NULL,
  `padre_depende_economicamente` varchar(255) NOT NULL,
  `padre_ocupacion` varchar(255) NOT NULL,
  `madre` varchar(255) NOT NULL,
  `madre_vive` varchar(255) NOT NULL,
  `project_manager_overtime_cost` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `freight`
--

INSERT INTO `freight` (`id`, `dg_id`, `padre`, `padre_vive`, `padre_depende_economicamente`, `padre_ocupacion`, `madre`, `madre_vive`, `project_manager_overtime_cost`) VALUES
(1, 59, '2', '2', '2', '2', '2', '2', ''),
(2, 61, '2', '2', '2', '2', '2', '2', ''),
(3, 62, '2', '2', '3', '3', '4', '4', ''),
(4, 63, '2', '2', '3', '3', '4', '4', ''),
(5, 64, '9', '9', '9', '9', '9', '9', ''),
(6, 65, '2', '1', '0', '0', '0', '0', ''),
(7, 68, '1', '2', '2', '3', '2', '', ''),
(8, 72, '2', '2', '2', '2', '2', '2', ''),
(9, 75, '2', '2', '2', '2', '2', '2', ''),
(10, 80, '2', '3', '2', '5', '2', '7', ''),
(11, 83, '2', '2', '3', '3', '4', '4', ''),
(12, 84, '2', '2', '3', '3', '4', '4', ''),
(13, 86, '2', '2', '3', '3', '4', '4', ''),
(14, 87, '2', '2', '3', '3', '4', '4', ''),
(15, 88, '3', '2', '1', '3', '2', '2', ''),
(16, 89, '2', '2', '3', '3', '4', '4', ''),
(17, 90, '2', '2', '3', '3', '4', '4', ''),
(18, 91, '', '', '', '', '', '', ''),
(19, 93, '2', '2', '3', '3', '4', '4', ''),
(20, 94, '', '', '', '', '2', '2', ''),
(21, 95, '2', '2', '2', '2', '2', '2', ''),
(22, 96, '2', '2', '2', '2', '2', '2', ''),
(23, 97, '2', '2', '2', '2', '2', '2', ''),
(24, 98, '2', '2', '', '', '', '', ''),
(25, 99, '2', '2', '2', '200', '', '', ''),
(26, 100, '2', '23', '', '', '', '', ''),
(27, 101, '2', '23', '4', '23', '', '', ''),
(28, 102, '', '', '', '', '', '', ''),
(29, 103, '2', '5', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `gastos_mensuales`
--

CREATE TABLE `gastos_mensuales` (
  `id` int(11) NOT NULL,
  `dg_id` int(11) NOT NULL,
  `luz` varchar(200) NOT NULL,
  `agua` varchar(200) NOT NULL,
  `predial` varchar(200) NOT NULL,
  `gas` varchar(200) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `transporte_publico` varchar(200) NOT NULL,
  `alimentos` varchar(200) NOT NULL,
  `calzado` varchar(200) NOT NULL,
  `articulos_de_aseo` varchar(200) NOT NULL,
  `agua_potable` varchar(200) NOT NULL,
  `servicios_medicos` varchar(200) NOT NULL,
  `gastos_vacacionales` varchar(200) NOT NULL,
  `ahorro` varchar(200) NOT NULL,
  `mantenimiento_de_vivienda` varchar(200) NOT NULL,
  `mantenimiento_de_vehiculo` varchar(200) NOT NULL,
  `servicio_domestico` varchar(200) NOT NULL,
  `utiles_escolares` varchar(200) NOT NULL,
  `uniformes_escolares` varchar(200) NOT NULL,
  `transporte_escolar` varchar(200) NOT NULL,
  `cuotas_escolares` varchar(200) NOT NULL,
  `otros_gastos` varchar(200) NOT NULL,
  `total_de_gastos` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gastos_mensuales`
--

INSERT INTO `gastos_mensuales` (`id`, `dg_id`, `luz`, `agua`, `predial`, `gas`, `telefono`, `transporte_publico`, `alimentos`, `calzado`, `articulos_de_aseo`, `agua_potable`, `servicios_medicos`, `gastos_vacacionales`, `ahorro`, `mantenimiento_de_vivienda`, `mantenimiento_de_vehiculo`, `servicio_domestico`, `utiles_escolares`, `uniformes_escolares`, `transporte_escolar`, `cuotas_escolares`, `otros_gastos`, `total_de_gastos`) VALUES
(1, 43, '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2'),
(2, 44, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 43, '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2'),
(4, 43, '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2'),
(5, 36, '21', '21', '21', '21', '21', '21', '21', '21', '21', '21', '21', '21', '21', '21', '21', '21', '21', '21', '21', '21', '21', '21'),
(6, 46, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(7, 47, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(8, 59, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 63, '1', '2', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 65, '5', '', '5', '', '7', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 75, '7', '', '', '', '', '', '6', '', '', '', '5', '', '', '', '', '', '', '', '', '', '', '18'),
(12, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 97, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 100, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, 102, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, 110, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 117, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 120, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, 121, '0', '1', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, 123, '0', '1', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, 125, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(22, 126, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(23, 127, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(24, 128, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(25, 31, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(26, 33, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `labor`
--

CREATE TABLE `labor` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `crsno` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `pmc_quantity_of_people` decimal(10,2) NOT NULL,
  `pmc_hours` decimal(10,2) NOT NULL,
  `pmc_cost` decimal(10,2) NOT NULL,
  `pmtot_cost` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labor`
--

INSERT INTO `labor` (`id`, `id_customer`, `crsno`, `category`, `subcategory`, `pmc_quantity_of_people`, `pmc_hours`, `pmc_cost`, `pmtot_cost`, `created_at`, `description`) VALUES
(1, 1, 123, '1', '2', 2.00, 8.00, 35.00, 560.00, '2021-01-13 15:43:05', ''),
(2, 1, 123, '6', '90', 2.00, 0.00, 22800.00, 45600.00, '2021-01-13 15:43:59', ''),
(3, 1, 123, '6', '119', 1.00, 0.00, 10800.00, 10800.00, '2021-01-13 15:45:57', ''),
(4, 1, 123, '1', '22', 2.00, 2.00, 8.00, 32.00, '2021-01-13 15:47:32', ''),
(5, 1, 1234, '1', '2', 2.00, 3.00, 35.00, 210.00, '2021-01-13 17:18:10', ''),
(6, 1, 123, '1', '2', 1.00, 1.00, 35.00, 35.00, '2021-01-20 13:48:24', ''),
(7, 5, 1234, '1', '2', 2.00, 2.00, 35.00, 140.00, '2021-01-20 13:48:58', ''),
(8, 7, 321, '1', '8', 2.00, 2.00, 10.00, 40.00, '2021-01-20 13:49:29', ''),
(9, 7, 99, '1', '3', 2.00, 2.00, 30.00, 120.00, '2021-01-20 13:50:04', ''),
(10, 9, 98, '1', '2', 2.00, 2.00, 35.00, 140.00, '2021-01-20 13:58:00', ''),
(11, 7, 99, '3', '15', 2.00, 2.00, 25.00, 100.00, '2021-01-20 14:03:04', ''),
(12, 7, 99, '1', '1', 2.00, 2.00, 25.00, 100.00, '2021-01-20 14:08:28', ''),
(13, 6, 97, '1', '2', 2.00, 2.00, 35.00, 140.00, '2021-01-20 14:11:59', ''),
(14, 1, 123, '1', '2', 123.00, 123.00, 35.00, 529515.00, '2021-01-21 09:03:18', '123123'),
(15, 1, 123, '1', '2', 2.00, 22.00, 35.00, 1540.00, '2021-01-21 14:52:55', 'Test of descripcion '),
(16, 1, 123, '9', '81', 1.00, 1.00, 35.00, 35.00, '2021-01-21 15:04:47', ''),
(17, 1, 99, '1', '2', 1.00, 2.00, 35.00, 70.00, '2021-01-21 15:28:21', ''),
(18, 1, 123, '1', '2', 2.00, 2.00, 35.00, 140.00, '2021-01-21 15:33:13', ''),
(19, 1, 123, '1', '2', 1.00, 3.00, 35.00, 105.00, '2021-01-21 15:45:48', ''),
(20, 4, 12, '5', '70', 12.00, 12.00, 150.00, 21600.00, '2021-01-21 21:00:26', '123'),
(21, 1, 97, '1', '2', 2.00, 2.00, 35.00, 140.00, '2021-01-21 21:03:08', ''),
(22, 1, 123, '1', '2', 2.00, 1.00, 35.00, 70.00, '2021-01-21 21:14:41', 'Notas, aqui van las notas que puede ser una descripciÃ³n o cualquier cosa'),
(23, 15, 321, '2', '49', 2.00, 2.00, 7.00, 28.00, '2021-01-21 22:43:35', ''),
(24, 1, 123, '1', '1', 2.00, 2.00, 25.00, 100.00, '2021-01-21 22:45:02', ''),
(114, 5, 2565, '1', '3', 5.00, 5.00, 30.00, 757.50, '2021-01-25 04:22:37', ''),
(26, 16, 2194, '1', '20', 4.00, 20.00, 10.00, 800.00, '2021-01-22 00:15:15', ''),
(27, 16, 2194, '6', '121', 1.50, 0.00, 900.00, 1350.00, '2021-01-22 02:36:35', ''),
(28, 16, 2194, '6', '129', 2.00, 0.00, 50.00, 100.00, '2021-01-22 02:38:52', ''),
(113, 5, 2565, '1', '1', 5.00, 5.00, 25.00, 637.50, '2021-01-25 04:21:50', ''),
(30, 1, 123, '2', '12', 2.00, 5.00, 25.00, 250.00, '2021-01-23 13:15:04', 'my test task'),
(32, 8, 1, '1', '2', 1.00, 8.00, 35.00, 280.00, '2021-01-23 13:48:11', ''),
(33, 1, 56565, '1', '1', 5.00, 5.00, 25.00, 625.00, '2021-01-23 13:50:35', ''),
(34, 1, 56565, '6', '84', 5.00, 0.00, 5500.00, 27500.00, '2021-01-23 13:51:03', ''),
(35, 1, 56565, '2', '40', 5.00, 54.00, 7.00, 1890.00, '2021-01-23 13:51:52', ''),
(36, 8, 1, '1', '9', 2.00, 2.00, 12.00, 48.00, '2021-01-23 13:51:57', ''),
(37, 3, 1234, '1', '2', 2.00, 5.00, 35.00, 350.00, '2021-01-23 14:25:44', 'my test task'),
(76, 5, 1, '3', '16', 2.00, 2.00, 35.00, 189.00, '2021-01-24 04:50:35', ''),
(75, 5, 1, '3', '16', 1.20, 10.00, 35.00, 567.00, '2021-01-24 04:50:06', ''),
(77, 5, 1, '1', '2', 1.00, 1.00, 35.00, 47.00, '2021-01-24 04:51:42', ''),
(78, 3, 4587, '1', '2', 1.00, 8.00, 35.00, 282.80, '2021-01-24 06:39:24', 'my test task'),
(80, 3, 4587, '1', '2', 1.00, 8.00, 35.00, 313.60, '2021-01-24 08:18:48', 'my test task'),
(97, 7, 12547, '5', '65', 2.00, 10.00, 700.00, 14000.00, '2021-01-24 18:02:51', ''),
(96, 7, 12547, '2', '12', 2.00, 2.00, 25.00, 110.00, '2021-01-24 18:01:51', ''),
(46, 1, 56565, '1', '2', 2.00, 2.00, 35.00, 140.00, '2021-01-23 17:01:34', ''),
(103, 3, 4578999, '2', '13', 1.00, 8.00, 35.00, 282.80, '2021-01-24 18:07:45', 'my test task'),
(84, 3, 45678999, '3', '61', 4.00, 8.00, 15.00, 528.00, '2021-01-24 11:27:27', 'my test task'),
(107, 1, 4578999, '1', '2', 1.00, 8.00, 35.00, 282.80, '2021-01-24 18:12:01', 'my test task'),
(86, 3, 12, '1', '2', 5.00, 5.00, 35.00, 918.75, '2021-01-24 11:40:53', ''),
(87, 3, 12, '2', '14', 5.00, 5.00, 10.00, 262.50, '2021-01-24 11:41:03', ''),
(93, 6, 7474, '1', '2', 1.00, 2.00, 50.00, 110.00, '2021-01-24 17:56:54', ''),
(94, 3, 4578999, '1', '2', 1.00, 8.00, 35.00, 282.80, '2021-01-24 17:57:21', 'my test task'),
(95, 6, 7474, '4', '63', 2.00, 5.00, 20.00, 204.00, '2021-01-24 17:57:27', ''),
(98, 11, 12547, '5', '70', 5.00, 1.00, 150.00, 765.00, '2021-01-24 18:03:14', ''),
(108, 5, 6598, '1', '2', 10.00, 52.00, 35.00, 20020.00, '2021-01-24 18:12:07', ''),
(106, 6, 5642, '2', '14', 4.00, 2.00, 10.00, 80.00, '2021-01-24 18:10:03', ''),
(104, 6, 5642, '1', '1', 5.00, 2.00, 25.00, 255.00, '2021-01-24 18:09:35', ''),
(102, 4, 2365, '3', '61', 2.00, 2.00, 15.00, 63.00, '2021-01-24 18:04:42', ''),
(109, 5, 6598, '2', '38', 32.00, 10.00, 10.00, 3520.00, '2021-01-24 18:12:23', ''),
(112, 16, 2194, '1', '9', 2.00, 10.00, 12.00, 240.00, '2021-01-24 20:41:35', ''),
(111, 1, 4578999, '4', '63', 2.00, 5.00, 20.00, 202.00, '2021-01-24 18:12:40', 'my test task'),
(115, 3, 999888, '1', '11', 1.00, 8.00, 10.00, 80.80, '2021-01-25 04:53:22', 'Cat descriptions'),
(116, 3, 999888, '2', '50', 2.00, 2.00, 7.00, 28.28, '2021-01-25 04:53:43', 'Cap descriptions'),
(117, 3, 999888, '3', '15', 2.00, 3.00, 25.00, 151.50, '2021-01-25 04:54:08', 'Cap descriptions'),
(118, 3, 999888, '5', '65', 2.00, 3.00, 700.00, 4242.00, '2021-01-25 04:54:50', 'test descritipn'),
(119, 3, 999888, '6', '82', 1.00, 0.00, 88000.00, 89760.00, '2021-01-25 04:55:26', 'my test desccription'),
(120, 3, 999888, '7', '73', 4.00, 5.00, 0.00, 0.00, '2021-01-25 04:56:05', 'my new test'),
(121, 1, 895, '1', '1', 5.00, 2.00, 25.00, 0.00, '2021-01-25 05:00:12', ''),
(122, 1, 895, '3', '61', 6.00, 5.00, 15.00, 450.00, '2021-01-25 05:00:31', ''),
(123, 1, 895, '1', '2', 5.00, 2.00, 35.00, 350.00, '2021-01-25 05:01:10', ''),
(124, 1, 895, '7', '73', 5.00, 2.00, 25.00, 250.00, '2021-01-25 05:03:31', ''),
(125, 1, 85462, '1', '1', 5.00, 5.00, 25.00, 687.50, '2021-01-25 05:12:35', ''),
(126, 1, 85462, '5', '66', 5.00, 2.00, 100.00, 1100.00, '2021-01-25 05:13:36', ''),
(127, 1, 85462, '7', '72', 5.00, 10.00, 1.00, 50.00, '2021-01-25 05:14:52', ''),
(128, 1, 85462, '3', '15', 2.00, 10.00, 25.00, 600.00, '2021-01-25 05:15:36', ''),
(129, 1, 8756, '6', '87', 5.00, 0.00, 12000.00, 66000.00, '2021-01-25 05:27:26', ''),
(130, 15, 9999, '6', '93', 1.00, 0.00, 100.00, 110.00, '2021-01-25 05:28:33', ''),
(131, 1, 8756, '6', '92', 6.00, 0.00, 1900.00, 11400.00, '2021-01-25 05:29:05', ''),
(132, 3, 999888, '1', '1', 1.00, 8.00, 25.00, 202.00, '2021-01-25 05:51:51', 'my test desccription'),
(133, 11, 123, '1', '8', 1.00, 2.00, 10.00, 20.00, '2021-01-25 13:31:23', ''),
(134, 4, 65423, '6', '86', 5.00, 0.00, 36000.00, 181800.00, '2021-01-25 13:42:49', 'Jeans descriptions'),
(137, 16, 2194, '7', '74', 2.00, 1.00, 350.00, 770.00, '2021-01-25 13:52:48', ''),
(136, 10, 123, '7', '74', 2.00, 1.00, 350.00, 770.00, '2021-01-25 13:49:34', ''),
(138, 127, 2209, '1', '8', 1.00, 24.00, 10.00, 240.00, '2021-01-25 23:12:18', ''),
(139, 127, 2209, '1', '9', 1.00, 6.00, 12.00, 72.00, '2021-01-25 23:12:40', ''),
(140, 127, 2209, '1', '19', 4.00, 24.00, 8.00, 768.00, '2021-01-25 23:13:23', ''),
(141, 127, 2209, '2', '44', 4.00, 6.00, 10.00, 240.00, '2021-01-25 23:13:57', ''),
(142, 127, 2009, '6', '130', 3.00, 0.00, 200.00, 720.00, '2021-01-25 23:35:54', ''),
(146, 127, 2209, '6', '132', 3.00, 0.00, 100.00, 300.00, '2021-01-26 00:07:27', ''),
(145, 127, 2209, '6', '130', 3.00, 0.00, 200.00, 600.00, '2021-01-26 00:07:15', ''),
(147, 127, 2209, '6', '129', 3.00, 0.00, 50.00, 150.00, '2021-01-26 00:07:46', ''),
(148, 127, 2209, '7', '74', 2.00, 1.00, 150.00, 330.00, '2021-01-26 00:09:51', ''),
(149, 127, 2209, '9', '133', 150.00, 1.00, 0.90, 155.25, '2021-01-26 00:37:09', ''),
(150, 1, 85426, '1', '19', 1.00, 1.00, 8.00, 8.80, '2021-01-27 05:13:02', 'kjghfighj'),
(151, 1, 85426, '1', '10', 1.00, 2.00, 12.00, 24.00, '2021-01-27 05:13:28', 'hkhjjg'),
(152, 3, 789789, '1', '1', 2.00, 1.00, 25.00, 50.50, '2021-01-27 05:48:50', 'my test task'),
(153, 1, 60593, '1', '1', 1.00, 5.00, 25.00, 125.00, '2021-01-27 06:51:06', ''),
(154, 3, 60593, '5', '67', 4.00, 10.00, 600.00, 24000.00, '2021-01-27 06:56:54', ''),
(155, 7, 414141, '2', '51', 1.00, 7.00, 10.00, 71.40, '2021-01-27 08:36:17', 'aaaaa'),
(156, 20, 414141, '3', '15', 1.00, 5.00, 25.00, 125.00, '2021-01-27 08:38:18', 'knfdgjikgnv'),
(158, 15, 9635, '6', '83', 25.00, 0.00, 22000.00, 687500.00, '2021-01-27 09:21:15', 'knfdgjikgnv'),
(159, 15, 9635, '4', '64', 4.00, 5.00, 15.00, 306.00, '2021-01-27 09:24:39', 'knfdgjikgnv'),
(160, 12, 9635, '4', '63', 1.00, 2.00, 20.00, 40.80, '2021-01-27 09:26:28', 'knfdgjikgnv'),
(161, 19, 9635, '1', '17', 1.00, 2.00, 25.00, 51.00, '2021-01-27 09:27:25', 'mjjhgyyh'),
(162, 8, 9635, '5', '69', 2.00, 24.00, 50.00, 2448.00, '2021-01-27 09:28:37', 'yguyg'),
(163, 18, 414141, '5', '68', 1.00, 20.00, 50.00, 1020.00, '2021-01-27 09:32:45', 'knfdgjikgnv'),
(164, 19, 9635, '1', '23', 1.00, 5.00, 10.00, 51.00, '2021-01-27 09:35:48', 'knfdgjikgnv');

-- --------------------------------------------------------

--
-- Table structure for table `labor.prices`
--

CREATE TABLE `labor.prices` (
  `id` int(5) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `notes` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labor.prices`
--

INSERT INTO `labor.prices` (`id`, `description`, `price`, `notes`) VALUES
(1, 'Test', 1.00, 'notes'),
(2, 'Project Manager', 25.00, 'Cost per hour'),
(3, 'Project Manager OT', 35.00, 'Cost per hour'),
(4, 'Project Manager Sunday/Holidays', 30.00, 'Cost per hour'),
(5, 'Mechanical Supervisor', 10.00, 'Cost per hour'),
(6, 'Mechanical Supervisor OT', 12.00, 'Cost per hour'),
(7, 'Mechanical Supervisor Sunday/Holidays', 12.00, 'Cost per hour'),
(8, 'EHS', 10.00, 'Cost per hour'),
(9, 'EHS OT', 25.00, 'Cost per hour'),
(10, 'EHS Sunday/Hollidays Cost', 25.00, 'Cost per hour'),
(11, 'Riggers / Mechanics', 8.00, 'Cost per hour'),
(12, 'Riggers / Mechanics OT', 10.00, 'Cost per hour'),
(13, 'Riggers / Mechanics Sunday/Hollidays', 10.00, 'Cost per hour'),
(14, 'Unskilled Mechanics', 8.00, 'Cost per hour'),
(15, 'Unskilled Mechanics OT', 10.00, 'Cost per hour'),
(16, 'Unskilled Mechanics Sunday/Holliday', 10.00, 'Cost per hour'),
(17, 'Electricians', 8.00, 'Cost per hour'),
(18, 'Electricians OT', 10.00, 'Cost per hour'),
(19, 'Electricians Sunday/Hollidays', 10.00, 'Cost per hour'),
(20, 'Welders', 6.00, 'Cost per hour'),
(21, 'Welders OT', 8.00, 'Cost per hour'),
(22, 'Widers Sunday/Hollidays Cost', 18.00, 'Cost per hour'),
(23, 'Pipe-fitters', 8.00, 'Cost per hour'),
(24, 'Pipe-fitters OT', 10.00, 'Cost per hour'),
(25, 'Pipe-filters Sunday/Hollidays Cost', 10.00, 'Cost per hour'),
(26, 'Steel Fabricators', 12.00, 'Cost per hour'),
(27, 'Steel Fabricators OT', 18.00, 'Cost per hour'),
(28, 'Steel Fabricators Sunday/Hollidays', 18.00, 'Cost per hour');

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `id` int(11) NOT NULL,
  `dg_id` int(11) NOT NULL,
  `mst_final_total` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `dg_id` int(11) NOT NULL,
  `madre` varchar(255) NOT NULL,
  `packing_materials` varchar(255) NOT NULL,
  `madre_vive` varchar(255) NOT NULL,
  `markup` varchar(255) NOT NULL,
  `project_manager_overtime_cost` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `dg_id`, `madre`, `packing_materials`, `madre_vive`, `markup`, `project_manager_overtime_cost`) VALUES
(1, 63, '2', '2', '2', '', ''),
(2, 83, '2', '2', '2', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `plaza`
--

CREATE TABLE `plaza` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plaza`
--

INSERT INTO `plaza` (`id`, `nombre`) VALUES
(1, 'Monterrey 1'),
(2, 'Monterrey 2'),
(3, 'Monterrey 3'),
(4, 'Monterrey 4'),
(5, 'Distrito Federal 1'),
(6, 'Distrito Federal 2'),
(7, 'Morelia'),
(8, 'QuerÃ©taro 1'),
(9, 'QuerÃ©taro 2'),
(10, 'LeÃ³n'),
(11, 'CancÃºn'),
(12, 'Guadalajara'),
(13, 'San Luis PotosÃ­');

-- --------------------------------------------------------

--
-- Table structure for table `prices_labor_own`
--

CREATE TABLE `prices_labor_own` (
  `id` int(4) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `notes` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prices_labor_own`
--

INSERT INTO `prices_labor_own` (`id`, `description`, `price`, `notes`) VALUES
(1, 'Test', 1.00, 'notes'),
(2, 'Project Manager', 25.00, 'Cost per hour'),
(3, 'Project Manager OT', 35.00, 'Cost per hour'),
(4, 'Project Manager Sunday/Holidays', 30.00, 'Cost per hour'),
(5, 'Mechanical Supervisor', 10.00, 'Cost per hour'),
(6, 'Mechanical Supervisor OT', 12.00, 'Cost per hour'),
(7, 'Mechanical Supervisor Sunday/Holidays', 12.00, 'Cost per hour'),
(8, 'EHS', 10.00, 'Cost per hour'),
(9, 'EHS OT', 25.00, 'Cost per hour'),
(10, 'EHS Sunday/Hollidays Cost', 25.00, 'Cost per hour'),
(11, 'Riggers / Mechanics', 8.00, 'Cost per hour'),
(12, 'Riggers / Mechanics OT', 10.00, 'Cost per hour'),
(13, 'Riggers / Mechanics Sunday/Hollidays', 10.00, 'Cost per hour'),
(14, 'Unskilled Mechanics', 8.00, 'Cost per hour'),
(15, 'Unskilled Mechanics OT', 10.00, 'Cost per hour'),
(16, 'Unskilled Mechanics Sunday/Holliday', 10.00, 'Cost per hour'),
(17, 'Electricians', 8.00, 'Cost per hour'),
(18, 'Electricians OT', 10.00, 'Cost per hour'),
(19, 'Electricians Sunday/Hollidays', 10.00, 'Cost per hour'),
(20, 'Welders', 6.00, 'Cost per hour'),
(21, 'Welders OT', 8.00, 'Cost per hour'),
(22, 'Widers Sunday/Hollidays Cost', 18.00, 'Cost per hour'),
(23, 'Pipe-fitters', 8.00, 'Cost per hour'),
(24, 'Pipe-fitters OT', 10.00, 'Cost per hour'),
(25, 'Pipe-filters Sunday/Hollidays Cost', 10.00, 'Cost per hour'),
(26, 'Steel Fabricators', 12.00, 'Cost per hour'),
(27, 'Steel Fabricators OT', 18.00, 'Cost per hour'),
(28, 'Steel Fabricators Sunday/Hollidays', 18.00, 'Cost per hour');

-- --------------------------------------------------------

--
-- Table structure for table `prices_labor_subcontractors`
--

CREATE TABLE `prices_labor_subcontractors` (
  `id` int(4) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `notes` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prices_labor_subcontractors`
--

INSERT INTO `prices_labor_subcontractors` (`id`, `description`, `price`, `notes`) VALUES
(1, 'Test', 1.00, 'notes'),
(2, 'Project Manager', 25.00, 'Cost per hour'),
(3, 'Project Manager OT', 35.00, 'Cost per hour'),
(4, 'Project Manager Sunday/Holidays', 30.00, 'Cost per hour'),
(5, 'Mechanical Supervisor', 10.00, 'Cost per hour'),
(6, 'Mechanical Supervisor OT', 12.00, 'Cost per hour'),
(7, 'Mechanical Supervisor Sunday/Holidays', 12.00, 'Cost per hour'),
(8, 'EHS', 10.00, 'Cost per hour'),
(9, 'EHS OT', 25.00, 'Cost per hour'),
(10, 'EHS Sunday/Hollidays Cost', 25.00, 'Cost per hour'),
(11, 'Riggers / Mechanics', 8.00, 'Cost per hour'),
(12, 'Riggers / Mechanics OT', 10.00, 'Cost per hour'),
(13, 'Riggers / Mechanics Sunday/Hollidays', 10.00, 'Cost per hour'),
(14, 'Unskilled Mechanics', 8.00, 'Cost per hour'),
(15, 'Unskilled Mechanics OT', 10.00, 'Cost per hour'),
(16, 'Unskilled Mechanics Sunday/Holliday', 10.00, 'Cost per hour'),
(17, 'Electricians', 8.00, 'Cost per hour'),
(18, 'Electricians OT', 10.00, 'Cost per hour'),
(19, 'Electricians Sunday/Hollidays', 10.00, 'Cost per hour'),
(20, 'Welders', 6.00, 'Cost per hour'),
(21, 'Welders OT', 8.00, 'Cost per hour'),
(22, 'Widers Sunday/Hollidays Cost', 18.00, 'Cost per hour'),
(23, 'Pipe-fitters', 8.00, 'Cost per hour'),
(24, 'Pipe-fitters OT', 10.00, 'Cost per hour'),
(25, 'Pipe-filters Sunday/Hollidays Cost', 10.00, 'Cost per hour'),
(26, 'Steel Fabricators', 12.00, 'Cost per hour'),
(27, 'Steel Fabricators OT', 18.00, 'Cost per hour'),
(28, 'Steel Fabricators Sunday/Hollidays', 18.00, 'Cost per hour');

-- --------------------------------------------------------

--
-- Table structure for table `REFERENCIAS_PERSONALES`
--

CREATE TABLE `REFERENCIAS_PERSONALES` (
  `id` int(11) NOT NULL,
  `dg_id` int(11) NOT NULL,
  `nombre_completo_1` varchar(200) NOT NULL,
  `domicilio_1` mediumtext NOT NULL,
  `telefono_1` bigint(20) NOT NULL,
  `tiempo_de_conocerlo_1` varchar(75) NOT NULL,
  `nombre_completo_2` varchar(200) NOT NULL,
  `domicilio_2` mediumtext NOT NULL,
  `telefono_2` bigint(20) NOT NULL,
  `tiempo_de_conocerlo_2` varchar(75) NOT NULL,
  `nombre_completo_3` varchar(200) NOT NULL,
  `domicilio_3` mediumtext NOT NULL,
  `telefono_3` bigint(20) NOT NULL,
  `tiempo_de_conocerlo_3` varchar(75) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `REFERENCIAS_PERSONALES`
--

INSERT INTO `REFERENCIAS_PERSONALES` (`id`, `dg_id`, `nombre_completo_1`, `domicilio_1`, `telefono_1`, `tiempo_de_conocerlo_1`, `nombre_completo_2`, `domicilio_2`, `telefono_2`, `tiempo_de_conocerlo_2`, `nombre_completo_3`, `domicilio_3`, `telefono_3`, `tiempo_de_conocerlo_3`) VALUES
(1, 17, '', '', 0, '00:00:00', '', '', 0, '00:00:00', '', '', 0, '00:00:00'),
(2, 18, '1', '', 0, '00:00:00', '', '', 0, '00:00:00', '', '', 0, '00:00:00'),
(3, 19, '1', '', 0, '00:00:00', '', '', 0, '00:00:00', '', '', 0, '00:00:00'),
(4, 20, '1', '', 0, '00:00:00', '', '', 0, '00:00:00', '', '', 0, '00:00:00'),
(5, 21, '', '', 0, '00:00:00', '', '', 0, '00:00:00', '', '', 0, '00:00:00'),
(6, 22, '', '', 0, '00:00:00', '', '', 0, '00:00:00', '', '', 0, '00:00:00'),
(7, 23, '', '', 0, '00:00:00', '', '', 0, '00:00:00', '', '', 0, '00:00:00'),
(8, 24, '', '', 0, '00:00:00', '', '', 0, '00:00:00', '', '', 0, '00:00:00'),
(9, 25, '', '', 0, '00:00:00', '', '', 0, '00:00:00', '', '', 0, '00:00:00'),
(10, 26, '', '', 0, '00:00:00', '', '', 0, '00:00:00', '', '', 0, '00:00:00'),
(11, 27, '', '', 0, '00:00:00', '', '', 0, '00:00:00', '', '', 0, '00:00:00'),
(12, 28, '', '', 0, '00:00:00', '', '', 0, '00:00:00', '', '', 0, '00:00:00'),
(13, 29, '', '', 0, '00:00:00', '', '', 0, '00:00:00', '', '', 0, '00:00:00'),
(14, 30, '', '', 0, '00:00:00', '', '', 0, '00:00:00', '', '', 0, '00:00:00'),
(15, 31, '', '', 0, '00:00:00', '', '', 0, '00:00:00', '', '', 0, '00:00:00'),
(16, 32, '', '', 0, '00:00:00', '', '', 0, '00:00:00', '', '', 0, '00:00:00'),
(17, 39, '', '', 0, '00:00:00', '', '', 0, '00:00:00', '', '', 0, '00:00:00'),
(18, 42, '2', '2', 2, '02:02:02', '2', '2', 2, '02:02:02', '2', '2', 2, '02:02:02'),
(19, 43, '3', '3', 3, '03:03:03', '3', '3', 3, '03:03:03', '3', '3', 3, '03:03:03'),
(20, 44, '', '', 0, '00:00:00', '', '', 0, '00:00:00', '', '', 0, '00:00:00'),
(21, 45, '', '', 0, '00:00:00', '', '', 0, '00:00:00', '', '', 0, '00:00:00'),
(22, 36, '21', '21', 21, '21:21:21', '21', '21', 21, '21:21:21', '21', '21', 21, '21:21:21'),
(23, 46, 'REF 1', 'DOM 1', 0, '1 aÃ±o', 'NOM 2', 'DOM 2', 0, '00:00:00', 'NOM 3', 'DOM 3', 0, '00:00:00'),
(24, 48, '1', '1', 1, '00:00:00', '1', '1', 1, '00:00:00', '1', '1', 1, '00:00:00'),
(25, 47, '0', '0000', 0, '11:22:33', '0', '000', 0, '11:22:33', '0', '000', 0, '11:22:33'),
(26, 51, '0', '0000', 0, '11:22:33', '0', '000', 0, '11:22:33', '0', '000', 0, '11:22:33'),
(27, 59, '', '', 45896325869, '11:22:33', '', '', 45896325869, '11:22:33', '', '', 45896325869, ''),
(28, 63, '', '', 12, '00:00:00', '', '', 12, '00:00:00', '', '', 123, '00:00:00'),
(29, 66, '', '', 45896325869, '', '', '', 45896325869, '', '', '', 45896325869, ''),
(30, 65, '', '', 5646, '', '5757', '', 4574574, '', '', '', 5474, ''),
(31, 75, '', '', 5646, '', '', '', 4574574, '', '', '', 5474, ''),
(32, 84, '', '', 5646, '', '', '', 4574574, '', '', '', 5474, ''),
(33, 93, '0', '', 0, '', '', '', 0, '', '0', '', 0, ''),
(34, 97, '', '', 45896325869, '', '', '', 45896325869, '', '', '', 45896325869, ''),
(35, 99, '', '', 45896325869, '', '', '', 45896325869, '', '', '', 45896325869, ''),
(36, 100, '', '', 45896325869, '', '', '', 45896325869, '', '', '', 45896325869, ''),
(37, 102, '', '', 45896325869, '', '', '', 45896325869, '', '', '', 45896325869, ''),
(38, 110, '', '', 5646, '', '', '', 4574574, '', '', '', 5474, ''),
(39, 117, '', '', 5646, '', '', '', 4574574, '', '', '', 5474, ''),
(40, 120, '', '', 5646, '', '', '', 4574574, '', '', '', 5474, ''),
(41, 121, '0', '1', 0, '', '', '', 0, '', '', '', 0, ''),
(42, 122, '0', '1', 0, '', '', '', 0, '', '', '', 0, ''),
(43, 123, '0', '1', 0, '', '', '', 0, '', '', '', 0, ''),
(44, 124, '0', '1', 0, '', '', '', 0, '', '', '', 0, ''),
(45, 125, 'REF 1', 'DOM 1', 0, '1 aÃ±o', 'NOM 2', 'DOM 2', 0, '00:00:00', 'NOM 3', 'DOM 3', 0, '00:00:00'),
(46, 126, 'REF 1', 'DOM 1', 0, '1 aÃ±o', 'NOM 2', 'DOM 2', 0, '00:00:00', 'NOM 3', 'DOM 3', 0, '00:00:00'),
(47, 127, 'REF 1', 'DOM 1', 0, '1 aÃ±o', 'NOM 2', 'DOM 2', 0, '00:00:00', 'NOM 3', 'DOM 3', 0, '00:00:00'),
(48, 128, 'REF 1', 'DOM 1', 0, '1 aÃ±o', 'NOM 2', 'DOM 2', 0, '00:00:00', 'NOM 3', 'DOM 3', 0, '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rent_subcontracts`
--

CREATE TABLE `rent_subcontracts` (
  `id` int(11) NOT NULL,
  `dg_id` int(11) NOT NULL,
  `madre` varchar(255) NOT NULL,
  `description_of_equipment` varchar(255) NOT NULL,
  `madre_vive` varchar(255) NOT NULL,
  `USD_cost` varchar(255) NOT NULL,
  `markup` varchar(255) NOT NULL,
  `project_manager_overtime_cost` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent_subcontracts`
--

INSERT INTO `rent_subcontracts` (`id`, `dg_id`, `madre`, `description_of_equipment`, `madre_vive`, `USD_cost`, `markup`, `project_manager_overtime_cost`) VALUES
(1, 62, '9', '4', '9', '9', '', ''),
(2, 65, '2', '', '2', '12', '', ''),
(3, 68, '2', 'sdf', '2', '2', '', ''),
(4, 75, '2', '', '2', '2', '', ''),
(5, 83, '2', '', '2', '2', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL DEFAULT '',
  `order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `descripcion`, `order`) VALUES
(1, 'Director Comercial', 2),
(2, 'Gerente Comercial', 3),
(3, 'Gerente de desarrollo', 4),
(4, 'Asociado', 11),
(5, 'Afiliado', 12),
(6, 'Administración de plaza', 5),
(8, 'Empresa', 14),
(9, 'Empleado', 15),
(7, 'Director regional', 1),
(10, 'Sistemas', 13),
(11, 'Análisis', 6),
(12, 'Atención a clientes', 7),
(13, 'Juridico', 8),
(14, 'Implementación', 9),
(15, 'Fiscalista', 10),
(16, 'Fiscalista VIP', 16);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `Categories` varchar(255) NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `Categories`, `subcategory_name`, `price`) VALUES
(2, '1 ', 'Project Manager OT', 35),
(1, '1 ', 'Project Manager', 25),
(3, '1 ', 'Project Manager Sunday/Holidays', 30),
(8, '1 ', 'Mechanical Supervisor', 10),
(9, '1 ', 'Mechanical Supervisor OT', 12),
(10, '1 ', 'Mechanical Supervisor Sunday/Holidays', 12),
(11, '1 ', 'EHS', 10),
(12, '2 ', 'Project Manager', 25),
(13, '2 ', 'Project Manager OT', 35),
(14, '2 ', 'Project Manager Sunday/Holidays', 10),
(15, '3 ', 'Project Mgr & PLC guy ST', 25),
(16, '3 ', 'Project Mgr & PLC guy OT', 35),
(17, '1 ', 'EHS OT', 25),
(18, '1 ', 'EHS Sunday/Hollidays Cost', 25),
(19, '1 ', 'Riggers / Mechanics', 8),
(20, '1 ', 'Riggers / Mechanics OT', 10),
(21, '1 ', 'Riggers / Mechanics Sunday/Hollidays', 10),
(22, '1 ', 'Unskilled Mechanics', 8),
(23, '1 ', 'Unskilled Mechanics OT', 10),
(24, '1 ', 'Unskilled Mechanics Sunday/Holliday', 10),
(25, '1 ', 'Electricians', 8),
(26, '1 ', 'Electricians OT', 10),
(27, '1 ', 'Electricians Sunday/Hollidays ', 10),
(28, '1 ', 'Welders', 6),
(29, '1 ', 'Welders OT', 8),
(30, '1 ', 'Widers Sunday/Hollidays Cost', 18),
(31, '1 ', 'Pipe-fitters', 8),
(32, '1 ', 'Pipe-fitters OT', 10),
(33, '1 ', 'Pipe-filters Sunday/Hollidays Cost', 10),
(34, '1 ', 'Steel Fabricators', 12),
(35, '1 ', 'Steel Fabricators OT', 18),
(36, '1 ', 'Steel Fabricators Sunday/Hollidays', 18),
(37, '2 ', 'Mechanical Supervisor', 12),
(38, '2 ', 'Mechanical Supervisor OT', 10),
(39, '2 ', 'Mechanical Supervisor Sunday/Holidays', 12),
(40, '2 ', 'EHS', 7),
(41, '2 ', 'EHS OT', 7),
(42, '2 ', 'EHS Sunday/Hollidays Cost', 30),
(43, '2 ', 'Riggers / Mechanics', 7),
(44, '2 ', 'Riggers / Mechanics OT', 7),
(45, '2 ', 'Riggers / Mechanics Sunday/Hollidays', 25),
(46, '2 ', 'Unskilled Mechanics', 7),
(47, '2 ', 'Unskilled Mechanics OT', 7),
(48, '2 ', 'Unskilled Mechanics Sunday/Hollidays', 25),
(49, '2 ', 'Electricians', 7),
(50, '2 ', 'Electricians OT', 7),
(51, '2 ', 'Electricians Sunday/Hollidays Cost', 10),
(52, '2 ', 'Welders', 7),
(53, '2 ', 'Welders OT', 7),
(54, '2 ', 'Widers Sunday/Hollidays Cost', 10),
(55, '2 ', 'Pipe-fitters', 7),
(56, '2 ', 'Pipe-fitters OT', 7),
(57, '2 ', 'Steel Fabricators', 10),
(58, '2 ', 'Steel Fabricators', 7),
(59, '2 ', 'Steel Fabricators OT', 7),
(60, '2 ', 'Steel Fabricators Sunday/Hollidays', 10),
(61, '3 ', 'Electricians ST', 15),
(62, '3 ', 'Electricians OT', 20),
(63, '4 ', 'Supervisor ', 20),
(64, '4 ', 'Journeymen', 15),
(65, '5 ', 'Tickets', 700),
(66, '5 ', 'Hotel room', 100),
(67, '5 ', 'Car Rental', 600),
(68, '5 ', 'Taxi service', 50),
(69, '5 ', 'Toll roads', 50),
(70, '5 ', 'Fuel', 150),
(71, '5 ', 'Others', 500),
(72, '7 ', 'Markup', 1),
(73, '7 ', 'Flat-bed', 0),
(74, '7 ', 'Step-deck', 0),
(75, '7 ', 'Low-Boy', 0),
(76, '8 ', 'Dry-van', 0),
(77, '8 ', 'Flat-bed', 0),
(78, '8 ', 'Step-deck', 0),
(79, '8 ', 'Double-drop', 0),
(80, '8 ', 'Low boy', 0),
(81, '9 ', 'Per Diem', 35),
(82, '6 ', 'Crane-300 ton-month', 88000),
(83, '6 ', 'Crane-300 ton-week', 22000),
(84, '6 ', 'Crane-300ton-day', 5500),
(85, '6 ', 'Crane-300ton-hour', 0),
(86, '6 ', 'Crane-150ton-month', 36000),
(87, '6 ', 'Crane-150 ton-week', 12000),
(88, '6 ', 'Crane-150 ton-day', 3000),
(89, '6 ', 'Crane-150 ton-hour', 0),
(90, '6 ', 'Crane-80 ton-month', 22800),
(91, '6 ', 'Crane-80 ton-week', 7600),
(92, '6 ', 'Crane-80 ton-day', 1900),
(93, '6 ', 'Crane-80 ton-hour', 0),
(94, '6 ', 'Crane-40 ton-month', 15600),
(95, '6 ', 'Crane-40 ton-week', 5200),
(96, '6 ', 'Crane-40 ton-day', 1300),
(97, '6 ', 'Crane-40 ton-hour', 0),
(98, '6 ', 'Crane-35 ton-month', 13200),
(99, '6 ', 'Crane-35 ton-week', 4400),
(100, '6 ', 'Crane-35 ton-day', 1100),
(101, '6 ', 'Crane-35 ton-hour', 0),
(102, '6 ', 'Crane-25 ton-month', 10800),
(103, '6 ', 'Crane-25 ton-week', 3600),
(104, '6 ', 'Crane-25 ton-day', 1000),
(105, '6 ', 'Crane-25 ton-hour', 0),
(106, '6 ', 'Crane-7 ton-month', 5400),
(107, '6 ', 'Crane-7 ton-week', 1800),
(108, '6 ', 'Crane-7 ton-day', 450),
(109, '6 ', 'Crane-7 ton-hour', 0),
(110, '6 ', 'Fork-Trucks-60 ton-month', 18000),
(111, '6 ', 'Fork-Trucks-60 ton-week', 6000),
(112, '6 ', 'Fork-Trucks-60 ton-day', 1500),
(113, '6 ', 'Fork-Trucks-60 ton-hour', 0),
(114, '6 ', 'Fork-Trucks-40 ton-month', 14400),
(115, '6 ', 'Fork-Trucks-40 ton-week', 4800),
(116, '6 ', 'Fork-Trucks-40 ton-week', 4800),
(117, '6 ', 'Fork-Trucks-40 ton-day', 1200),
(118, '6 ', 'Fork-Trucks-40 ton-hour', 0),
(119, '6 ', 'Fork-Trucks-40/60 Versalift -month', 10800),
(120, '6 ', 'Fork-Trucks-40/60 Versalift -week', 3600),
(121, '6 ', 'Fork-Trucks-40/60 Versalift -day', 900),
(122, '6 ', 'Fork-Trucks-40/60 Versalift -hour', 0),
(123, '6 ', 'Fork-Trucks-25/35 Versalift -month', 8400),
(124, '6 ', 'Fork-Trucks-25/35 Versalift -week', 2800),
(125, '6 ', 'Fork-Trucks-25/35 Versalift -day', 700),
(128, '1 ', 'new cat', 1),
(129, '6 ', 'Pickup-day', 50),
(130, '6', 'Scissor-lift   26 - day', 200),
(131, '6', 'Other', 0),
(132, '6 ', 'Welding machine  250A - day', 100),
(133, '9', 'Other', 0);

-- --------------------------------------------------------

--
-- Table structure for table `suministradoras`
--

CREATE TABLE `suministradoras` (
  `id` int(4) NOT NULL,
  `facturadora_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL DEFAULT '',
  `domicilio` varchar(255) DEFAULT NULL,
  `colonia` varchar(200) DEFAULT NULL,
  `municipio` varchar(200) DEFAULT NULL,
  `ciudad` varchar(200) DEFAULT NULL,
  `estado` varchar(200) DEFAULT NULL,
  `pais` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `zip` varchar(6) DEFAULT NULL,
  `rfc` varchar(100) DEFAULT NULL,
  `eliminado` int(11) DEFAULT '0',
  `rol` varchar(100) DEFAULT 'Cliente',
  `password` varchar(255) DEFAULT 'temporal02',
  `notas` varchar(500) DEFAULT NULL,
  `status_update_date` datetime NOT NULL,
  `apoderado` varchar(100) NOT NULL,
  `tipo_de_empresa` varchar(75) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suministradoras`
--

INSERT INTO `suministradoras` (`id`, `facturadora_id`, `nombre`, `domicilio`, `colonia`, `municipio`, `ciudad`, `estado`, `pais`, `email`, `telefono`, `zip`, `rfc`, `eliminado`, `rol`, `password`, `notas`, `status_update_date`, `apoderado`, `tipo_de_empresa`) VALUES
(42, 17, 'DREAM', 'bbb', 'ccc', 'LÃ³pez Mateos - AtizapÃ¡n de Zaragoza - AtizapÃ¡n de Zaragoza', 'San Nicolas de los Garza', 'Nuevo  LeÃ³n', 'Mexico', 'empleado@arquitecturafiscal.com', '435464645646599999999', '111111', '2222222222222222', 0, 'Cliente', 'temporal02', NULL, '0000-00-00 00:00:00', 'ccccccccccccc', 'fondo_de_pension'),
(43, 1, 'JACE', 'dffvv', 'fefe666', 'LÃ³pez Mateos - AtizapÃ¡n de Zaragoza - AtizapÃ¡n de Zaragoza', 'San Nicolas de los Garza', 'Nuevo  LeÃ³n', 'Mexico', 'empleado@arquitecturafiscal.com', '435464645646599999999', '111111', '55666556yv65', 0, 'Cliente', 'temporal02', NULL, '0000-00-00 00:00:00', 'jhiniu', 'alimentos'),
(44, 17, 'GRUMAFE', '.', '.', '.', '.', '.', '.', 'grumafe@arquitecturafiscal.com', '.', '0', '0', 0, 'Cliente', 'temporal02', NULL, '0000-00-00 00:00:00', '0', 'fondo_de_pension'),
(45, 1, 'DE ALIMENTOS', '.', '.', '.', '.', '.', '.', 'sin@correo.com', '.', '.', '.', 0, 'Cliente', 'temporal02', NULL, '0000-00-00 00:00:00', '.', 'alimentos');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_logs`
--

CREATE TABLE `tbl_user_logs` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `action` varchar(50) NOT NULL,
  `details` varchar(200) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `table_name` varchar(100) NOT NULL,
  `id_table_field` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_logs`
--

INSERT INTO `tbl_user_logs` (`id`, `id_user`, `action`, `details`, `ip`, `table_name`, `id_table_field`, `date`) VALUES
(3, 38, 'INSERT', 'New user is created', '137.97.81.198', 'users', 46, '2016-12-29 19:47:32'),
(4, 40, 'INSERT', 'New empresa is created', '137.97.81.198', 'clientes', 39, '2016-12-29 19:51:52'),
(5, 2, 'INSERT', 'New empresa is created', '187.161.153.29', 'clientes', 40, '2017-01-02 18:18:37'),
(6, 40, 'INSERT', 'New Expediente is created', '137.97.81.4', 'DATOS_GENERALES', 130, '2017-01-02 19:55:03'),
(7, 44, 'INSERT', 'New empresa is created', '187.163.143.143', 'clientes', 41, '2017-01-10 02:15:01'),
(8, 2, 'InserciÃ³n', 'Nueva empresa Nueva empresa Abril ha sido creada', '187.160.11.108', 'clientes', 42, '2018-04-23 21:13:46'),
(9, 38, 'INSERT', 'New Expediente is created', '187.161.146.2', 'DATOS_GENERALES', 132, '2020-10-28 15:26:03'),
(10, 38, 'INSERT', 'New Expediente is created', '103.240.79.248', 'labor', 1, '2020-11-04 16:55:37'),
(11, 38, 'INSERT', 'New Expediente is created', '103.240.79.248', 'labor', 2, '2020-11-04 18:12:12'),
(12, 38, 'INSERT', 'New Expediente is created', '103.240.79.248', 'labor', 3, '2020-11-04 18:19:33'),
(13, 38, 'INSERT', 'New Expediente is created', '103.240.79.248', 'labor', 4, '2020-11-04 18:22:55'),
(14, 38, 'INSERT', 'New Expediente is created', '103.240.79.248', 'labor', 5, '2020-11-04 18:24:01'),
(15, 38, 'INSERT', 'New Expediente is created', '103.240.79.248', 'labor', 6, '2020-11-04 18:26:04'),
(16, 38, 'INSERT', 'New Expediente is created', '103.240.79.248', 'labor', 7, '2020-11-04 18:27:09'),
(17, 38, 'INSERT', 'New Expediente is created', '103.240.79.248', 'labor', 8, '2020-11-04 18:31:08'),
(18, 38, 'INSERT', 'New Expediente is created', '103.240.79.248', 'labor', 9, '2020-11-04 19:14:28'),
(19, 38, 'INSERT', 'New Expediente is created', '103.240.79.248', 'labor', 10, '2020-11-04 19:25:14'),
(20, 38, 'INSERT', 'New Expediente is created', '103.240.79.248', 'labor', 11, '2020-11-04 19:25:39'),
(21, 38, 'INSERT', 'New Expediente is created', '103.240.79.248', 'labor', 12, '2020-11-04 19:25:54'),
(22, 38, 'INSERT', 'New Expediente is created', '103.240.79.248', 'labor', 13, '2020-11-04 19:26:05'),
(23, 38, 'INSERT', 'New Expediente is created', '103.240.79.248', 'labor', 14, '2020-11-04 19:27:22'),
(24, 38, 'INSERT', 'New Expediente is created', '103.240.79.248', 'labor', 15, '2020-11-04 19:28:01'),
(25, 38, 'INSERT', 'New Expediente is created', '103.240.79.248', 'labor', 16, '2020-11-04 19:29:10'),
(26, 38, 'INSERT', 'New Expediente is created', '103.240.79.248', 'labor', 17, '2020-11-04 19:29:53'),
(27, 38, 'INSERT', 'New Expediente is created', '187.161.146.66', 'labor', 18, '2020-11-04 19:33:55'),
(28, 38, 'INSERT', 'New Expediente is created', '187.161.146.66', 'labor', 19, '2020-11-04 19:34:03'),
(29, 38, 'INSERT', 'New Expediente is created', '187.161.146.66', 'labor', 20, '2020-11-04 19:34:52'),
(30, 38, 'INSERT', 'New Expediente is created', '103.240.79.248', 'labor', 21, '2020-11-04 19:45:12'),
(31, 38, 'INSERT', 'New Expediente is created', '187.161.146.66', 'labor', 22, '2020-11-04 20:07:49'),
(32, 38, 'INSERT', 'New Expediente is created', '187.161.144.66', 'labor', 23, '2020-11-05 13:52:36'),
(33, 38, 'INSERT', 'New Expediente is created', '187.161.144.66', 'labor', 24, '2020-11-05 13:52:55'),
(34, 38, 'INSERT', 'New Expediente is created', '187.161.144.66', 'labor', 25, '2020-11-05 16:57:05'),
(35, 38, 'INSERT', 'New Expediente is created', '187.161.144.66', 'labor', 26, '2020-11-05 16:58:26'),
(36, 38, 'INSERT', 'New Expediente is created', '187.161.144.66', 'labor', 27, '2020-11-05 16:58:49'),
(37, 38, 'INSERT', 'New Expediente is created', '187.161.144.66', 'labor', 28, '2020-11-05 16:59:40'),
(38, 38, 'INSERT', 'New Expediente is created', '103.251.19.137', 'labor', 29, '2020-11-05 17:02:30'),
(39, 38, 'INSERT', 'New Expediente is created', '103.251.19.137', 'labor', 30, '2020-11-05 17:02:56'),
(40, 38, 'INSERT', 'New Expediente is created', '103.251.19.137', 'labor', 31, '2020-11-05 17:23:29'),
(41, 38, 'INSERT', 'New Expediente is created', '103.251.19.137', 'labor', 32, '2020-11-05 18:38:27'),
(42, 38, 'INSERT', 'New Expediente is created', '187.161.144.66', 'labor', 33, '2020-11-05 20:42:25'),
(43, 38, 'INSERT', 'New Expediente is created', '187.161.144.66', 'labor', 34, '2020-11-06 04:35:35'),
(44, 38, 'INSERT', 'New Expediente is created', '187.161.144.66', 'labor', 35, '2020-11-06 14:02:08'),
(45, 38, 'INSERT', 'New Expediente is created', '187.161.144.66', 'labor', 36, '2020-11-06 21:37:02'),
(46, 38, 'INSERT', 'New Expediente is created', '187.161.144.66', 'labor', 37, '2020-11-06 23:48:59'),
(47, 38, 'INSERT', 'New Expediente is created', '187.161.144.66', 'labor', 38, '2020-11-09 14:32:36'),
(48, 38, 'INSERT', 'New Expediente is created', '187.161.144.66', 'labor', 39, '2020-11-11 18:00:46'),
(49, 38, 'INSERT', 'New Expediente is created', '187.161.144.66', 'labor', 40, '2020-11-11 18:28:46'),
(50, 38, 'INSERT', 'New Expediente is created', '103.41.27.203', 'labor', 41, '2020-11-11 19:13:03'),
(51, 38, 'INSERT', 'New Expediente is created', '103.41.27.203', 'labor', 42, '2020-11-11 19:31:06'),
(52, 38, 'INSERT', 'New Expediente is created', '89.22.173.67', 'labor', 43, '2020-11-11 19:40:02'),
(53, 38, 'INSERT', 'New Expediente is created', '89.22.173.67', 'labor', 44, '2020-11-11 19:41:16'),
(54, 38, 'INSERT', 'New Expediente is created', '187.161.144.66', 'labor', 45, '2020-11-12 14:09:38'),
(55, 38, 'INSERT', 'New Expediente is created', '187.161.144.66', 'labor', 46, '2020-11-12 14:11:11'),
(56, 38, 'INSERT', 'New Expediente is created', '187.161.144.66', 'labor', 47, '2020-11-12 14:45:25'),
(57, 38, 'INSERT', 'New Expediente is created', '42.111.31.63', 'labor', 48, '2020-11-12 15:34:50'),
(58, 38, 'INSERT', 'New Expediente is created', '187.161.144.66', 'labor', 49, '2020-11-12 16:02:29'),
(59, 38, 'INSERT', 'New Expediente is created', '106.78.66.140', 'labor', 50, '2020-11-12 16:08:39'),
(60, 38, 'INSERT', 'New Expediente is created', '187.161.144.66', 'labor', 51, '2020-11-12 16:29:26'),
(61, 38, 'INSERT', 'New Expediente is created', '106.78.66.140', 'labor', 52, '2020-11-12 17:04:06'),
(62, 38, 'INSERT', 'New Expediente is created', '106.78.66.140', 'labor', 53, '2020-11-12 17:44:33'),
(63, 38, 'INSERT', 'New Expediente is created', '106.78.66.140', 'labor', 54, '2020-11-12 18:44:57'),
(64, 38, 'INSERT', 'New Expediente is created', '106.78.66.140', 'labor', 55, '2020-11-12 18:50:51'),
(65, 38, 'INSERT', 'New Expediente is created', '49.14.100.35', 'labor', 57, '2020-11-12 19:07:06'),
(66, 38, 'INSERT', 'New Expediente is created', '187.161.144.66', 'labor', 58, '2020-11-12 19:50:26'),
(67, 38, 'INSERT', 'New Expediente is created', '42.111.28.89', 'labor', 59, '2020-11-13 01:45:42'),
(68, 38, 'INSERT', 'New Expediente is created', '42.111.28.89', 'labor', 60, '2020-11-13 02:55:29'),
(69, 38, 'INSERT', 'New Expediente is created', '42.109.240.65', 'labor', 61, '2020-11-13 05:00:18'),
(70, 38, 'INSERT', 'New Expediente is created', '42.109.240.65', 'labor', 62, '2020-11-13 05:16:54'),
(71, 38, 'INSERT', 'New Expediente is created', '42.109.232.50', 'labor', 63, '2020-11-13 07:10:26'),
(72, 38, 'INSERT', 'New Expediente is created', '42.109.244.27', 'labor', 64, '2020-11-13 11:24:28'),
(73, 38, 'INSERT', 'New Expediente is created', '187.161.146.2', 'labor', 65, '2020-11-13 14:19:20'),
(74, 38, 'INSERT', 'New Expediente is created', '187.161.146.2', 'labor', 66, '2020-11-13 14:33:06'),
(75, 38, 'INSERT', 'New Expediente is created', '187.161.147.66', 'labor', 67, '2020-11-14 14:10:09'),
(76, 38, 'INSERT', 'New Expediente is created', '187.161.147.66', 'labor', 68, '2020-11-14 14:10:29'),
(77, 38, 'INSERT', 'New Expediente is created', '42.109.252.41', 'labor', 69, '2020-11-14 14:13:12'),
(78, 38, 'INSERT', 'New Expediente is created', '42.109.252.41', 'labor', 70, '2020-11-14 14:23:19'),
(79, 38, 'INSERT', 'New Expediente is created', '187.161.147.66', 'labor', 71, '2020-11-14 15:33:15'),
(80, 38, 'INSERT', 'New Expediente is created', '42.109.238.73', 'labor', 72, '2020-11-14 15:59:02'),
(81, 38, 'INSERT', 'New Expediente is created', '42.109.238.73', 'labor', 73, '2020-11-14 16:48:17'),
(82, 38, 'INSERT', 'New Expediente is created', '42.109.250.43', 'labor', 74, '2020-11-14 18:31:06'),
(83, 38, 'INSERT', 'New Expediente is created', '42.109.238.69', 'labor', 75, '2020-11-15 13:40:55'),
(84, 38, 'INSERT', 'New Expediente is created', '42.109.238.69', 'labor', 76, '2020-11-15 14:10:58'),
(85, 38, 'INSERT', 'New Expediente is created', '42.109.238.69', 'labor', 77, '2020-11-15 14:23:16'),
(86, 38, 'INSERT', 'New Expediente is created', '42.109.238.69', 'labor', 78, '2020-11-15 14:45:33'),
(87, 38, 'INSERT', 'New Expediente is created', '42.109.238.69', 'labor', 79, '2020-11-15 14:48:24'),
(88, 38, 'INSERT', 'New Expediente is created', '42.109.238.69', 'labor', 80, '2020-11-15 14:54:41'),
(89, 38, 'INSERT', 'New Expediente is created', '42.109.240.60', 'labor', 81, '2020-11-15 16:19:35'),
(90, 38, 'INSERT', 'New Expediente is created', '42.109.240.60', 'labor', 82, '2020-11-15 16:20:43'),
(91, 38, 'INSERT', 'New Expediente is created', '42.109.240.60', 'labor', 83, '2020-11-15 16:50:06'),
(92, 38, 'INSERT', 'New Expediente is created', '187.161.147.66', 'labor', 84, '2020-11-16 16:45:13'),
(93, 38, 'INSERT', 'New Expediente is created', '42.109.232.32', 'labor', 85, '2020-11-16 16:49:27'),
(94, 38, 'INSERT', 'New Expediente is created', '42.109.232.19', 'labor', 86, '2020-11-16 16:55:50'),
(95, 38, 'INSERT', 'New Expediente is created', '42.109.232.9', 'labor', 87, '2020-11-16 17:21:29'),
(96, 38, 'INSERT', 'New Expediente is created', '187.161.147.66', 'labor', 88, '2020-11-16 17:47:57'),
(97, 38, 'INSERT', 'New Expediente is created', '42.109.232.10', 'labor', 89, '2020-11-16 17:53:58'),
(98, 38, 'INSERT', 'New Expediente is created', '42.109.232.16', 'labor', 90, '2020-11-16 18:00:46'),
(99, 38, 'INSERT', 'New Expediente is created', '187.161.147.66', 'labor', 91, '2020-11-16 18:04:14'),
(100, 38, 'INSERT', 'New Expediente is created', '187.161.147.66', 'labor', 92, '2020-11-16 18:14:13'),
(101, 38, 'INSERT', 'New Expediente is created', '42.109.232.12', 'labor', 93, '2020-11-16 18:34:04'),
(102, 38, 'INSERT', 'New Expediente is created', '187.161.147.66', 'labor', 94, '2020-11-16 19:58:57'),
(103, 38, 'INSERT', 'New Expediente is created', '42.109.232.1', 'labor', 95, '2020-11-16 20:03:12'),
(104, 38, 'INSERT', 'New Expediente is created', '42.109.232.29', 'labor', 96, '2020-11-16 20:32:39'),
(105, 38, 'INSERT', 'New Expediente is created', '42.111.30.3', 'labor', 97, '2020-11-17 17:30:20'),
(106, 38, 'INSERT', 'New Expediente is created', '187.161.147.66', 'labor', 98, '2020-11-18 19:23:31'),
(107, 38, 'INSERT', 'New Expediente is created', '187.161.147.66', 'labor', 99, '2020-11-18 22:32:39'),
(108, 38, 'INSERT', 'New Expediente is created', '187.161.147.66', 'labor', 100, '2020-11-18 22:46:16'),
(109, 38, 'INSERT', 'New Expediente is created', '187.161.147.66', 'labor', 101, '2020-11-18 23:45:03'),
(110, 38, 'INSERT', 'New Expediente is created', '187.161.147.66', 'labor', 102, '2020-11-18 23:47:38'),
(111, 38, 'INSERT', 'New Expediente is created', '187.161.147.66', 'labor', 103, '2020-11-19 00:03:48'),
(112, 38, 'INSERT', 'New Expediente is created', '47.247.140.233', 'labor', 104, '2020-12-21 07:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `reset_password_request` int(11) NOT NULL DEFAULT '0',
  `reset_request_time` datetime NOT NULL,
  `all_companies` int(11) NOT NULL DEFAULT '0',
  `all_plazas` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `email`, `password`, `fname`, `lname`, `date`, `reset_password_request`, `reset_request_time`, `all_companies`, `all_plazas`) VALUES
(2, 10, 'joel.sanchez@sanchezrodriguez.com', '825a0e8e434754187a059a9c97ed1517', 'Joel', 'Sanchez', '2016-07-14 17:19:04', 0, '2018-04-21 21:58:19', 0, 0),
(38, 8, 'alex@m-3.mx', 'e10adc3949ba59abbe56e057f20f883e', 'Alex', '.', '2016-09-02 13:33:34', 0, '0000-00-00 00:00:00', 1, 1),
(47, 10, 'joel.sanchezt@sanchezrodriguez.com', 'andy123', 'Joel', 'Sanchez', '2016-07-14 17:19:04', 0, '2018-04-21 21:58:19', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_empresa`
--

CREATE TABLE `users_empresa` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_plaza` int(11) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_empresa`
--

INSERT INTO `users_empresa` (`id`, `id_user`, `id_plaza`, `id_client`) VALUES
(79, 38, 3, 21),
(94, 2, 3, 1),
(59, 35, 11, 17),
(78, 38, 3, 1),
(70, 36, 11, 17),
(39, 24, 11, 17),
(89, 8, 3, 1),
(88, 8, 3, 27),
(87, 8, 3, 23),
(69, 34, 3, 27),
(68, 34, 3, 21),
(80, 38, 3, 24),
(67, 22, 11, 17),
(54, 23, 3, 21),
(55, 25, 11, 17),
(95, 45, 3, 21),
(93, 42, 3, 1),
(90, 41, 3, 23);

-- --------------------------------------------------------

--
-- Table structure for table `users_plaza`
--

CREATE TABLE `users_plaza` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_plaza` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_plaza`
--

INSERT INTO `users_plaza` (`id`, `id_user`, `id_plaza`) VALUES
(87, 2, 3),
(47, 35, 11),
(67, 38, 3),
(53, 36, 11),
(24, 24, 11),
(82, 8, 3),
(81, 8, 11),
(52, 34, 3),
(51, 22, 11),
(42, 23, 3),
(43, 25, 11),
(88, 45, 3),
(85, 42, 3),
(83, 41, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_appointments`
--

CREATE TABLE `user_appointments` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `post_from` int(11) NOT NULL,
  `appointmentDate` datetime NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `tipo_de_cita` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `lugar_de_cita` int(11) NOT NULL,
  `otro_lugar` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_appointments`
--

INSERT INTO `user_appointments` (`id`, `client_id`, `post_from`, `appointmentDate`, `title`, `description`, `tipo_de_cita`, `date`, `lugar_de_cita`, `otro_lugar`) VALUES
(98, 21, 2, '2016-11-19 11:55:00', 'Reunion', 'formulario/vista/notas listo', 0, '2016-11-10 20:53:37', 1, ''),
(97, 23, 40, '2016-11-18 22:35:00', 'hii', 'testing', 1, '2016-11-10 20:06:17', 1, ''),
(99, 17, 40, '2016-11-27 20:30:00', 'hiii', 'testing', 0, '2016-11-11 18:07:07', 1, ''),
(100, 21, 40, '2016-12-26 22:10:00', 'hi', 'hiii', 1, '2016-12-26 19:39:44', 1, ''),
(101, 1, 40, '2016-12-28 22:50:00', 'hii', 'hiiiii', 1, '2016-12-27 20:16:55', 1, ''),
(102, 41, 44, '2017-01-12 10:20:00', 'cita demo', 'descripcion', 1, '2017-01-11 19:21:14', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_appointments_notes`
--

CREATE TABLE `user_appointments_notes` (
  `id_note` int(11) NOT NULL,
  `id_cita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `notes` text NOT NULL,
  `post_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_appointments_notes`
--

INSERT INTO `user_appointments_notes` (`id_note`, `id_cita`, `id_user`, `notes`, `post_date`) VALUES
(10, 97, 40, 'hi testing', '2016-11-10 20:06:49'),
(11, 98, 2, 'AquÃ­ van las notas de resultado', '2016-11-10 20:54:44'),
(12, 97, 2, 'nota demo', '2016-11-16 03:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_appointment_fiscalistavip_user`
--

CREATE TABLE `user_appointment_fiscalistavip_user` (
  `id_fiscalistaVIP` int(11) NOT NULL,
  `id_appointment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_appointment_fiscalistavip_user`
--

INSERT INTO `user_appointment_fiscalistavip_user` (`id_fiscalistaVIP`, `id_appointment`, `id_user`) VALUES
(2, 102, 45);

-- --------------------------------------------------------

--
-- Table structure for table `user_appointment_fiscalista_user`
--

CREATE TABLE `user_appointment_fiscalista_user` (
  `id_fiscalista` int(11) NOT NULL,
  `id_appointment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_appointment_fiscalista_user`
--

INSERT INTO `user_appointment_fiscalista_user` (`id_fiscalista`, `id_appointment`, `id_user`) VALUES
(4, 97, 36),
(5, 98, 36),
(6, 99, 36),
(7, 100, 36),
(8, 101, 36),
(9, 102, 36);

-- --------------------------------------------------------

--
-- Table structure for table `user_appointment_list`
--

CREATE TABLE `user_appointment_list` (
  `id` int(11) NOT NULL,
  `id_appointment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Por confirmar',
  `status_update` int(11) NOT NULL DEFAULT '0',
  `status_updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_appointment_list`
--

INSERT INTO `user_appointment_list` (`id`, `id_appointment`, `id_user`, `status`, `status_update`, `status_updated_date`) VALUES
(24, 97, 2, 'Por confirmar', 0, '0000-00-00 00:00:00'),
(25, 97, 8, 'Por confirmar', 0, '0000-00-00 00:00:00'),
(26, 97, 25, 'Por confirmar', 0, '0000-00-00 00:00:00'),
(27, 98, 37, 'Por confirmar', 0, '0000-00-00 00:00:00'),
(28, 99, 25, 'Por confirmar', 0, '0000-00-00 00:00:00'),
(29, 100, 8, 'Por confirmar', 0, '0000-00-00 00:00:00'),
(30, 101, 22, 'Por confirmar', 0, '0000-00-00 00:00:00'),
(31, 102, 2, 'Confirmado', 1, '2017-01-11 19:32:33');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL DEFAULT '',
  `login` varchar(250) NOT NULL DEFAULT '',
  `passw` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(150) NOT NULL DEFAULT '',
  `habilitado` int(1) NOT NULL DEFAULT '0',
  `sucursal` int(4) NOT NULL DEFAULT '0',
  `rol` varchar(250) NOT NULL DEFAULT '',
  `id_empresa` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=0;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombre`, `login`, `passw`, `email`, `habilitado`, `sucursal`, `rol`, `id_empresa`) VALUES
(3, 'La Bodega - Demo -', 'admin', 'temporal01', 'administracion@abagraf.com', 0, 0, '1', 1),
(4, 'Tester', 'tester', 'Temporal01', 'tester@mail.com', 0, 0, '4', 1),
(10, 'Cajero', 'cajero', 'cajero', 'info@abagraf.com', 0, 0, '5', 1),
(12, 'David Lozano', 'Davidlozano', '3284', 'david@abagraf.com', 0, 0, '5', 1),
(13, 'Azael Ramirez', 'Azaelramirez', '2923', 'diseno1@abagraf.com', 0, 0, '5', 1),
(14, 'Diego Zadrak', 'Diegozadrak', '3434', 'diseno@abagraf.com', 0, 0, '5', 1),
(15, 'Jesus Villanueva', 'Impresiondeluxe', '3358', 'info@abagraf.com', 0, 0, '5', 1),
(16, 'Ruben Montoya', 'Impresionestandar', '3782', 'ruben@abagraf.com', 0, 0, '5', 1),
(17, 'Luis Herrera', 'Luisherrera', '5847', 'luis@abagraf.com', 0, 0, '5', 1),
(18, 'Juan Pablo Patiño', 'Juanpablo', '5826', 'produccion@abagraf.com', 0, 0, '5', 1),
(19, 'Lourdes Arenas', 'Lourdesarenas', '5687', 'lourdes@abagraf.com', 0, 0, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vivienda`
--

CREATE TABLE `vivienda` (
  `id` int(11) NOT NULL,
  `dg_id` int(11) NOT NULL,
  `zona_ubicada` int(1) NOT NULL COMMENT '0 - Urbana, 1 - Alta, 2 - Media, 3 - Lujo',
  `caractaeristicas` int(1) NOT NULL COMMENT '0 - Casa en condominio, 1 - Departamento, 2 - Unidad Habitacional, 3 - Vivienda Popular, 4 - Residencial, 5 - Lujo',
  `tipo` int(1) NOT NULL COMMENT '0 - Propia, 1 - Pagándola, 2 - De familiares, 3 - De amigos, 4 - Alquiler',
  `recamaras` int(1) NOT NULL COMMENT '0 - Una, 1 - Dos, 2 - Tres, 3 - Más de Tres',
  `banos` int(1) NOT NULL COMMENT '0 - Uno, 1 - Dos, 2 - Tres, 3 - Más de Tres',
  `pisos_o_plantas` int(1) NOT NULL COMMENT '0 - Uno, 1 - Dos, 2 - Más de Dos',
  `areas_de_la_vivienda` varchar(100) NOT NULL COMMENT '0 - Sala, 1 - Comedor, 2 - Cocina, 3 - Jardin, 4 - Estacionamiento, 5 - Patio'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vivienda`
--

INSERT INTO `vivienda` (`id`, `dg_id`, `zona_ubicada`, `caractaeristicas`, `tipo`, `recamaras`, `banos`, `pisos_o_plantas`, `areas_de_la_vivienda`) VALUES
(1, 42, 0, 0, 0, 0, 0, 0, '2'),
(2, 43, 0, 0, 0, 0, 0, 0, ''),
(3, 43, 1, 0, 0, 0, 0, 0, '1,2,3,5'),
(4, 43, 1, 0, 0, 0, 0, 0, '1,2,3,5'),
(5, 44, 0, 0, 0, 0, 0, 0, ''),
(6, 36, 1, 4, 3, 2, 2, 0, '1,3,5'),
(7, 46, 0, 0, 0, 1, 1, 0, '2,3,5'),
(8, 47, 0, 0, 0, 0, 0, 0, ''),
(9, 59, 0, 0, 0, 0, 0, 0, ''),
(10, 63, 0, 0, 0, 0, 0, 0, '2'),
(11, 65, 0, 0, 0, 0, 0, 0, ''),
(12, 75, 0, 0, 0, 0, 0, 0, ''),
(13, 0, 0, 0, 0, 0, 0, 0, '1'),
(14, 97, 0, 0, 0, 0, 0, 0, ''),
(15, 100, 0, 0, 0, 0, 0, 0, ''),
(16, 102, 0, 0, 0, 0, 0, 0, ''),
(17, 110, 0, 0, 0, 0, 0, 0, ''),
(18, 117, 0, 0, 0, 0, 0, 0, ''),
(19, 120, 0, 0, 0, 0, 0, 0, ''),
(20, 121, 0, 1, 0, 0, 0, 0, ''),
(21, 123, 0, 1, 0, 0, 0, 0, ''),
(22, 125, 0, 0, 0, 1, 1, 0, '2,3,5'),
(23, 126, 0, 0, 0, 1, 1, 0, '2,3,5'),
(24, 127, 0, 0, 0, 1, 1, 0, '2,3,5'),
(25, 128, 0, 0, 0, 1, 1, 0, '2,3,5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_expenses`
--
ALTER TABLE `add_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datos_cio_general`
--
ALTER TABLE `datos_cio_general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datos_contratos`
--
ALTER TABLE `datos_contratos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datos_contratos_generated`
--
ALTER TABLE `datos_contratos_generated`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datos_contratos_log`
--
ALTER TABLE `datos_contratos_log`
  ADD PRIMARY KEY (`id_contratos_log`);

--
-- Indexes for table `datos_del_beneficiario`
--
ALTER TABLE `datos_del_beneficiario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datos_del_fecha_contrato`
--
ALTER TABLE `datos_del_fecha_contrato`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datos_economicos`
--
ALTER TABLE `datos_economicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datos_escolares`
--
ALTER TABLE `datos_escolares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datos_familiares`
--
ALTER TABLE `datos_familiares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `DATOS_GENERALES`
--
ALTER TABLE `DATOS_GENERALES`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datos_propuesta`
--
ALTER TABLE `datos_propuesta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datos_propuesta_notes`
--
ALTER TABLE `datos_propuesta_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datos_salarios_minimos_profesionales`
--
ALTER TABLE `datos_salarios_minimos_profesionales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `DOCUMENTACION`
--
ALTER TABLE `DOCUMENTACION`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facturadoras`
--
ALTER TABLE `facturadoras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freight`
--
ALTER TABLE `freight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gastos_mensuales`
--
ALTER TABLE `gastos_mensuales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labor`
--
ALTER TABLE `labor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labor.prices`
--
ALTER TABLE `labor.prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plaza`
--
ALTER TABLE `plaza`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices_labor_own`
--
ALTER TABLE `prices_labor_own`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices_labor_subcontractors`
--
ALTER TABLE `prices_labor_subcontractors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `REFERENCIAS_PERSONALES`
--
ALTER TABLE `REFERENCIAS_PERSONALES`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent_subcontracts`
--
ALTER TABLE `rent_subcontracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suministradoras`
--
ALTER TABLE `suministradoras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_logs`
--
ALTER TABLE `tbl_user_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_empresa`
--
ALTER TABLE `users_empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_plaza`
--
ALTER TABLE `users_plaza`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_appointments`
--
ALTER TABLE `user_appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_appointments_notes`
--
ALTER TABLE `user_appointments_notes`
  ADD PRIMARY KEY (`id_note`);

--
-- Indexes for table `user_appointment_fiscalistavip_user`
--
ALTER TABLE `user_appointment_fiscalistavip_user`
  ADD PRIMARY KEY (`id_fiscalistaVIP`);

--
-- Indexes for table `user_appointment_fiscalista_user`
--
ALTER TABLE `user_appointment_fiscalista_user`
  ADD PRIMARY KEY (`id_fiscalista`);

--
-- Indexes for table `user_appointment_list`
--
ALTER TABLE `user_appointment_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indexes for table `vivienda`
--
ALTER TABLE `vivienda`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_expenses`
--
ALTER TABLE `add_expenses`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `bancos`
--
ALTER TABLE `bancos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=355;

--
-- AUTO_INCREMENT for table `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `datos_cio_general`
--
ALTER TABLE `datos_cio_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `datos_contratos`
--
ALTER TABLE `datos_contratos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `datos_contratos_generated`
--
ALTER TABLE `datos_contratos_generated`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `datos_contratos_log`
--
ALTER TABLE `datos_contratos_log`
  MODIFY `id_contratos_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `datos_del_beneficiario`
--
ALTER TABLE `datos_del_beneficiario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `datos_del_fecha_contrato`
--
ALTER TABLE `datos_del_fecha_contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `datos_economicos`
--
ALTER TABLE `datos_economicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `datos_escolares`
--
ALTER TABLE `datos_escolares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `datos_familiares`
--
ALTER TABLE `datos_familiares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `DATOS_GENERALES`
--
ALTER TABLE `DATOS_GENERALES`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `datos_propuesta`
--
ALTER TABLE `datos_propuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `datos_propuesta_notes`
--
ALTER TABLE `datos_propuesta_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `datos_salarios_minimos_profesionales`
--
ALTER TABLE `datos_salarios_minimos_profesionales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `DOCUMENTACION`
--
ALTER TABLE `DOCUMENTACION`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `estatus`
--
ALTER TABLE `estatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `facturadoras`
--
ALTER TABLE `facturadoras`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `freight`
--
ALTER TABLE `freight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `gastos_mensuales`
--
ALTER TABLE `gastos_mensuales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `labor`
--
ALTER TABLE `labor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `labor.prices`
--
ALTER TABLE `labor.prices`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plaza`
--
ALTER TABLE `plaza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `prices_labor_own`
--
ALTER TABLE `prices_labor_own`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `REFERENCIAS_PERSONALES`
--
ALTER TABLE `REFERENCIAS_PERSONALES`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `rent_subcontracts`
--
ALTER TABLE `rent_subcontracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `suministradoras`
--
ALTER TABLE `suministradoras`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_user_logs`
--
ALTER TABLE `tbl_user_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users_empresa`
--
ALTER TABLE `users_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `users_plaza`
--
ALTER TABLE `users_plaza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `user_appointments`
--
ALTER TABLE `user_appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `user_appointments_notes`
--
ALTER TABLE `user_appointments_notes`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_appointment_fiscalistavip_user`
--
ALTER TABLE `user_appointment_fiscalistavip_user`
  MODIFY `id_fiscalistaVIP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_appointment_fiscalista_user`
--
ALTER TABLE `user_appointment_fiscalista_user`
  MODIFY `id_fiscalista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_appointment_list`
--
ALTER TABLE `user_appointment_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `vivienda`
--
ALTER TABLE `vivienda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
