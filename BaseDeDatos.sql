
create database demo;
use demo;

CREATE TABLE `adquisicion` (
  `NroAdquisicion` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `PrecioTotal` decimal(10,2) NOT NULL,
  `CodProveedor` int(11) NOT NULL,
  `NroAlmacen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `adquisicion`
--

INSERT INTO `adquisicion` (`NroAdquisicion`, `Fecha`, `PrecioTotal`, `CodProveedor`, `NroAlmacen`) VALUES
(100, '2015-10-02', 14100.00, 3, 2),
(123, '2018-10-01', 6000.00, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `NroAlmacen` int(11) NOT NULL,
  `Direccion` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`NroAlmacen`, `Direccion`, `Estado`) VALUES
(1, 'Calle Bolívar #54', 1),
(2, 'Plan 3000 B/san agustin', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `baja`
--

CREATE TABLE `baja` (
  `NroBaja` int(11) NOT NULL,
  `FechaHora` datetime NOT NULL,
  `Descripcion` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `NroRevision` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `baja`
--

INSERT INTO `baja` (`NroBaja`, `FechaHora`, `Descripcion`, `NroRevision`) VALUES
(27, '2019-10-03 06:24:21', 'mal', 2),
(28, '2019-11-21 08:39:35', 'no tiene reparacion', 11),
(29, '2019-12-16 23:23:15', 'se jodio', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bien`
--

CREATE TABLE `bien` (
  `CodBien` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `FechaAdquisicion` date NOT NULL,
  `ValorCompra` decimal(10,2) NOT NULL,
  `Estado` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `UbicacionDepartamento` int(11) DEFAULT NULL,
  `UbicacionAlmacen` int(11) DEFAULT NULL,
  `CodCategoria` int(11) NOT NULL,
  `CodRubro` int(11) DEFAULT NULL,
  `EstadoBien` varchar(10) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `bien`
--

INSERT INTO `bien` (`CodBien`, `Nombre`, `FechaAdquisicion`, `ValorCompra`, `Estado`, `UbicacionDepartamento`, `UbicacionAlmacen`, `CodCategoria`, `CodRubro`, `EstadoBien`) VALUES
('102-1-3075-58', 'silla de madera', '2019-11-12', 56.40, 'Nuevo', 10, 1, 1, 2, 'activo'),
('103-10-4033-47', 'auto suzuki alto mod 2017', '2019-10-03', 12355.00, 'Nuevo', 10, 1, 7, 3, 'activo'),
('106-4-2415-36', 'lg', '2017-03-06', 4655.00, 'Nuevo', 10, 1, 4, 6, 'activo'),
('106-4-5104-04', 'Lenovo', '2017-05-12', 6450.00, 'Nuevo', 10, 1, 4, 6, 'activo'),
('106-4-6608-54', 'Mouse razer', '2019-12-17', 250.00, 'Nuevo', 10, 1, 4, 6, 'activo'),
('106-4-7075-27', 'toshiba', '2019-03-05', 4050.00, 'Nuevo', 10, 1, 4, 6, 'activo'),
('106-4-7867-32', 'HP', '2016-03-07', 5020.00, 'Nuevo', 10, 1, 4, 6, 'activo'),
('106-4-8219-93', 'Portatil HP', '2019-12-11', 3200.00, 'Nuevo', 10, 1, 4, 6, 'activo'),
('106-6-0976-66', 'Impresora Canon L3000', '2019-11-28', 1500.00, 'Nuevo', 10, 1, 6, 6, 'activo'),
('106-6-9609-79', 'Epson 300', '2019-12-09', 900.00, 'Nuevo', 10, 2, 6, 6, 'activo'),
('112-1-1561-88', 'escritorio barato', '2019-10-03', 500.00, 'Nuevo', 11, 2, 1, 2, 'inactivo'),
('112-1-6398-50', 'Silla', '2019-10-12', 50.00, 'Nuevo', 11, 2, 1, 2, 'inactivo'),
('122-1-2391-35', 'silla de madera', '2019-12-21', 20.00, 'Usado', 12, 1, 1, 2, 'activo'),
('122-1-8213-90', 'portatil', '2019-10-08', 1234.00, 'Nuevo', 12, 1, 4, 2, 'inactivo'),
('122-3-8034-45', 'escritorio', '2019-10-10', 200000.00, 'Nuevo', 12, 1, 3, 2, 'activo'),
('133-9-1757-89', 'impresora multifuncional', '2019-10-03', 1234.00, 'Nuevo', 13, 2, 9, 3, 'activo'),
('136-4-6737-53', 'mouse', '2018-03-05', 250.00, 'Nuevo', 13, 2, 4, 6, 'activo'),
('153-9-4248-94', 'Rodamiento 3505', '2018-07-12', 60.00, 'Nuevo', 15, 1, 9, 3, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `CodCategoria` int(11) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `CodRubro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`CodCategoria`, `Nombre`, `CodRubro`) VALUES
(1, 'SILLAS', 2),
(2, 'Mesas', 2),
(3, 'Escritorios', 2),
(4, 'Computadoras portátil', 6),
(5, 'Scanners', 6),
(6, 'Impresoras', 6),
(7, 'Automóviles', 5),
(8, 'Camionetas', 5),
(9, 'Batidoras', 3),
(10, 'Hornos', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `custodio`
--

CREATE TABLE `custodio` (
  `CodCustodio` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellido` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Estado` tinyint(1) NOT NULL,
  `CodDepartamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `custodio`
--

INSERT INTO `custodio` (`CodCustodio`, `Nombre`, `Apellido`, `Telefono`, `Estado`, `CodDepartamento`) VALUES
(100, 'Alfredo', 'López', 73100923, 1, 12),
(102, 'Alex', 'Párraga', 70004875, 1, 11),
(104, 'Geysa', 'Céspedes', 74585486, 1, 14),
(105, 'Wilfredo', 'Meneses', 77001128, 1, 15),
(108, 'Telma', 'Orellana', 778898958, 1, 10),
(109, 'Oscar', 'Saavedra', 76062174, 1, 13),
(200, 'Matías', 'Santiago', 9437263, 1, 10),
(201, 'Jorge', 'Saavedra', 76062153, 1, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `CodDepartamento` int(11) NOT NULL,
  `Descripcion` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Estado` tinyint(1) NOT NULL,
  `CodUbicacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`CodDepartamento`, `Descripcion`, `Estado`, `CodUbicacion`) VALUES
(10, 'Contabilidad', 1, 1),
(11, 'RR HH', 1, 3),
(12, 'PRODUCCIóN', 1, 2),
(13, 'Administración', 1, 4),
(14, 'Ventas', 1, 3),
(15, 'Almacen', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depreciacion`
--

CREATE TABLE `depreciacion` (
  `NroDepreciacion` int(11) NOT NULL,
  `DepreciacionAcumulada` decimal(10,2) NOT NULL,
  `Descripcion` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Fecha` date NOT NULL,
  `CodBien` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleadquisicion`
--

CREATE TABLE `detalleadquisicion` (
  `NroDetalleAdquisicion` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `NroAdquisicion` int(11) NOT NULL,
  `CodCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `detalleadquisicion`
--

INSERT INTO `detalleadquisicion` (`NroDetalleAdquisicion`, `Cantidad`, `Precio`, `NroAdquisicion`, `CodCategoria`) VALUES
(1, 200, 30.00, 123, 1),
(2, 3, 3000.00, 100, 4),
(3, 2, 600.00, 100, 5),
(4, 3, 1300.00, 100, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallebien`
--

CREATE TABLE `detallebien` (
  `NroDetalle` int(11) NOT NULL,
  `CodBien` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `NroMovimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesolicitud`
--

CREATE TABLE `detallesolicitud` (
  `NroDetalleSolicitud` int(11) NOT NULL,
  `Descripcion` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Cantidad` int(11) NOT NULL,
  `CodCategoria` int(11) NOT NULL,
  `NroSolicitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_change`
--

CREATE TABLE `log_change` (
  `id` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `accion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fechaAccion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `log_change`
--

INSERT INTO `log_change` (`id`, `id_user`, `accion`, `fechaAccion`) VALUES
(14, 7, 'Registro a un nuevo usuario', '16/12/2019 18:18:35'),
(20, 6, 'Registro a un nuevo usuario', '16/12/2019 22:42:47'),
(21, 7, 'Registro a un nuevo usuario', '17/12/2019 00:10:14'),
(22, 7, 'Registro a un nuevo usuario', '17/12/2019 00:11:03'),
(23, 7, 'Registro a una nueva ubicacion', '17/12/2019 02:39:05'),
(24, 7, 'Actualizo el registro a una ubicacion', '17/12/2019 02:39:47'),
(25, 7, 'Registro un nuevo bien', '17/12/2019 02:50:32'),
(26, 6, 'Registro a un nuevo custodio desde el movil', '17/12/2019 06:47:42'),
(42, 6, 'Elimino el registro deuna ubicacion', '17/12/2019 07:25:19'),
(43, 6, 'Registro a un nuevo bien desde el movil', '17/12/2019 07:26:57'),
(58, 7, 'Registro a un nuevo custodio desde el movil', '17/12/2019 11:36:00'),
(59, 7, 'Registro una nueva adquisicion', '17/12/2019 11:38:43'),
(60, 6, 'Registro un nuevo bien', '21/12/2019 17:20:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `NroMantenimiento` int(11) NOT NULL,
  `Problema` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Solucion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaFinalizo` date NOT NULL,
  `HoraIncio` time NOT NULL,
  `HoraFinalizo` time NOT NULL,
  `Duraccion` time NOT NULL,
  `Costo` decimal(10,2) NOT NULL,
  `NroRevision` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`NroMantenimiento`, `Problema`, `Solucion`, `FechaInicio`, `FechaFinalizo`, `HoraIncio`, `HoraFinalizo`, `Duraccion`, `Costo`, `NroRevision`) VALUES
(1, 'mal estado', 'cambio de patas', '2019-11-14', '2019-11-21', '14:04:05', '26:06:08', '12:00:00', 200.00, 12),
(3, 'su bateria se desgasta rapido', 'cambio de bateria', '2019-12-16', '2019-12-16', '12:12:12', '15:15:15', '00:00:03', 50.00, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(9, '2019_10_04_202106_create_roles_table', 1),
(10, '2019_10_04_202457_create_role_user_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 2),
(13, '2019_10_02_201420_create_cache_table', 2),
(14, '2019_12_16_001811_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'activofijo\\User', 5),
(1, 'activofijo\\User', 6),
(1, 'activofijo\\User', 7),
(1, 'activofijo\\User', 9),
(2, 'activofijo\\User', 10),
(3, 'activofijo\\User', 11),
(4, 'activofijo\\User', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE `movimiento` (
  `NroMovimiento` int(11) NOT NULL,
  `FechaMovimiento` date NOT NULL,
  `CodDepartamento` int(11) NOT NULL,
  `CodResponsable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operador`
--

CREATE TABLE `operador` (
  `CodOperador` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellido` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Gmail` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `operador`
--

INSERT INTO `operador` (`CodOperador`, `Nombre`, `Apellido`, `Telefono`, `Gmail`, `Estado`) VALUES
(1, 'Carlos', 'Rojas', 74146523, 'crojas@gmail.com', 1),
(2, 'Marcelo', 'Landa', 67824895, 'clanda@gmail.com', 1),
(3, 'Matías', 'Chuvirú', 78176328, 'mchuviru@gmail.com', 1),
(4, 'Lucas', 'Rojas', 74146523, 'crojas@gmail.com', 1),
(5, 'Santino', 'Landa', 67824895, 'clanda@gmail.com', 1),
(6, 'Fernando', 'Chuvirú', 78176328, 'mchuviru@gmail.com', 1),
(7, 'Juan', 'salguero', 65412378, 'juan@gmail.com', 1),
(8, 'Rony', 'Salguero', 9843300, 'Rony@gmail.com', 0),
(9, 'Rony', 'Salguero', 96451254, 'Rony@gmail.com', 1),
(10, 'Maria', 'Sanchez', 94323542, 'Maria@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create user', 'web', '2019-12-16 06:13:31', '2019-12-16 06:13:31'),
(2, 'read user', 'web', '2019-12-16 06:13:31', '2019-12-16 06:13:31'),
(3, 'update user', 'web', '2019-12-16 06:13:31', '2019-12-16 06:13:31'),
(4, 'delete user', 'web', '2019-12-16 06:13:32', '2019-12-16 06:13:32'),
(5, 'create responsable', 'web', '2019-12-16 06:13:32', '2019-12-16 06:13:32'),
(6, 'read responsable', 'web', '2019-12-16 06:13:32', '2019-12-16 06:13:32'),
(7, 'update responsable', 'web', '2019-12-16 06:13:33', '2019-12-16 06:13:33'),
(8, 'delete responsable', 'web', '2019-12-16 06:13:33', '2019-12-16 06:13:33'),
(9, 'create custodio', 'web', '2019-12-16 06:13:33', '2019-12-16 06:13:33'),
(10, 'read custodio', 'web', '2019-12-16 06:13:33', '2019-12-16 06:13:33'),
(11, 'update custodio', 'web', '2019-12-16 06:13:33', '2019-12-16 06:13:33'),
(12, 'delete custodio', 'web', '2019-12-16 06:13:33', '2019-12-16 06:13:33'),
(13, 'create operador', 'web', '2019-12-16 06:13:34', '2019-12-16 06:13:34'),
(14, 'read operador', 'web', '2019-12-16 06:13:34', '2019-12-16 06:13:34'),
(15, 'update operador', 'web', '2019-12-16 06:13:34', '2019-12-16 06:13:34'),
(16, 'delete operador', 'web', '2019-12-16 06:13:34', '2019-12-16 06:13:34'),
(17, 'create proveedor', 'web', '2019-12-16 06:13:34', '2019-12-16 06:13:34'),
(18, 'read proveedor', 'web', '2019-12-16 06:13:35', '2019-12-16 06:13:35'),
(19, 'update proveedor', 'web', '2019-12-16 06:13:35', '2019-12-16 06:13:35'),
(20, 'delete proveedor', 'web', '2019-12-16 06:13:35', '2019-12-16 06:13:35'),
(21, 'create adquisicion', 'web', '2019-12-16 06:13:35', '2019-12-16 06:13:35'),
(22, 'read adquisicion', 'web', '2019-12-16 06:13:35', '2019-12-16 06:13:35'),
(23, 'update adquisicion', 'web', '2019-12-16 06:13:36', '2019-12-16 06:13:36'),
(24, 'delete adquisicion', 'web', '2019-12-16 06:13:36', '2019-12-16 06:13:36'),
(25, 'create almacen', 'web', '2019-12-16 06:13:36', '2019-12-16 06:13:36'),
(26, 'read almacen', 'web', '2019-12-16 06:13:36', '2019-12-16 06:13:36'),
(27, 'update almacen', 'web', '2019-12-16 06:13:37', '2019-12-16 06:13:37'),
(28, 'delete almacen', 'web', '2019-12-16 06:13:37', '2019-12-16 06:13:37'),
(29, 'create baja', 'web', '2019-12-16 06:13:37', '2019-12-16 06:13:37'),
(30, 'read baja', 'web', '2019-12-16 06:13:38', '2019-12-16 06:13:38'),
(31, 'update baja', 'web', '2019-12-16 06:13:38', '2019-12-16 06:13:38'),
(32, 'delete baja', 'web', '2019-12-16 06:13:38', '2019-12-16 06:13:38'),
(33, 'create bien', 'web', '2019-12-16 06:13:38', '2019-12-16 06:13:38'),
(34, 'read bien', 'web', '2019-12-16 06:13:38', '2019-12-16 06:13:38'),
(35, 'update bien', 'web', '2019-12-16 06:13:39', '2019-12-16 06:13:39'),
(36, 'delete bien', 'web', '2019-12-16 06:13:39', '2019-12-16 06:13:39'),
(37, 'create categoria', 'web', '2019-12-16 06:13:39', '2019-12-16 06:13:39'),
(38, 'read categoria', 'web', '2019-12-16 06:13:39', '2019-12-16 06:13:39'),
(39, 'update categoria', 'web', '2019-12-16 06:13:40', '2019-12-16 06:13:40'),
(40, 'delete categoria', 'web', '2019-12-16 06:13:40', '2019-12-16 06:13:40'),
(41, 'create departamento', 'web', '2019-12-16 06:13:41', '2019-12-16 06:13:41'),
(42, 'read departamento', 'web', '2019-12-16 06:13:41', '2019-12-16 06:13:41'),
(43, 'update departamento', 'web', '2019-12-16 06:13:41', '2019-12-16 06:13:41'),
(44, 'delete departamento', 'web', '2019-12-16 06:13:41', '2019-12-16 06:13:41'),
(45, 'read log_change', 'web', '2019-12-16 06:13:42', '2019-12-16 06:13:42'),
(46, 'create depresiacion', 'web', '2019-12-16 06:13:42', '2019-12-16 06:13:42'),
(47, 'read depresiacion', 'web', '2019-12-16 06:13:43', '2019-12-16 06:13:43'),
(48, 'update depresiacion', 'web', '2019-12-16 06:13:43', '2019-12-16 06:13:43'),
(49, 'delete depresiacion', 'web', '2019-12-16 06:13:44', '2019-12-16 06:13:44'),
(50, 'create detalleAdquisicion', 'web', '2019-12-16 06:13:44', '2019-12-16 06:13:44'),
(51, 'read detalleAdquisicion', 'web', '2019-12-16 06:13:44', '2019-12-16 06:13:44'),
(52, 'update detalleAdquisicion', 'web', '2019-12-16 06:13:44', '2019-12-16 06:13:44'),
(53, 'delete detalleAdquisicion', 'web', '2019-12-16 06:13:45', '2019-12-16 06:13:45'),
(54, 'create mantenimiento', 'web', '2019-12-16 06:13:45', '2019-12-16 06:13:45'),
(55, 'read mantenimiento', 'web', '2019-12-16 06:13:45', '2019-12-16 06:13:45'),
(56, 'update mantenimiento', 'web', '2019-12-16 06:13:46', '2019-12-16 06:13:46'),
(57, 'delete mantenimiento', 'web', '2019-12-16 06:13:46', '2019-12-16 06:13:46'),
(58, 'create revaluo', 'web', '2019-12-16 06:13:46', '2019-12-16 06:13:46'),
(59, 'read revaluo', 'web', '2019-12-16 06:13:46', '2019-12-16 06:13:46'),
(60, 'update revaluo', 'web', '2019-12-16 06:13:47', '2019-12-16 06:13:47'),
(61, 'delete revaluo', 'web', '2019-12-16 06:13:47', '2019-12-16 06:13:47'),
(62, 'create revision', 'web', '2019-12-16 06:13:48', '2019-12-16 06:13:48'),
(63, 'read revision', 'web', '2019-12-16 06:13:48', '2019-12-16 06:13:48'),
(64, 'update revision', 'web', '2019-12-16 06:13:48', '2019-12-16 06:13:48'),
(65, 'delete revision', 'web', '2019-12-16 06:13:49', '2019-12-16 06:13:49'),
(66, 'create rubro', 'web', '2019-12-16 06:13:49', '2019-12-16 06:13:49'),
(67, 'read rubro', 'web', '2019-12-16 06:13:49', '2019-12-16 06:13:49'),
(68, 'update rubro', 'web', '2019-12-16 06:13:49', '2019-12-16 06:13:49'),
(69, 'delete rubro', 'web', '2019-12-16 06:13:50', '2019-12-16 06:13:50'),
(70, 'create solicitud', 'web', '2019-12-16 06:13:50', '2019-12-16 06:13:50'),
(71, 'read solicitud', 'web', '2019-12-16 06:13:51', '2019-12-16 06:13:51'),
(72, 'update solicitud', 'web', '2019-12-16 06:13:52', '2019-12-16 06:13:52'),
(73, 'delete solicitud', 'web', '2019-12-16 06:13:52', '2019-12-16 06:13:52'),
(74, 'create transferencia', 'web', '2019-12-16 06:13:52', '2019-12-16 06:13:52'),
(75, 'read transferencia', 'web', '2019-12-16 06:13:53', '2019-12-16 06:13:53'),
(76, 'update transferencia', 'web', '2019-12-16 06:13:54', '2019-12-16 06:13:54'),
(77, 'delete transferencia', 'web', '2019-12-16 06:13:55', '2019-12-16 06:13:55'),
(78, 'create ubicacion', 'web', '2019-12-16 06:13:56', '2019-12-16 06:13:56'),
(79, 'read ubicacion', 'web', '2019-12-16 06:13:57', '2019-12-16 06:13:57'),
(80, 'update ubicacion', 'web', '2019-12-16 06:13:57', '2019-12-16 06:13:57'),
(81, 'delete ubicacion', 'web', '2019-12-16 06:13:58', '2019-12-16 06:13:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `CodProveedor` int(11) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellido` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Direccion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`CodProveedor`, `Nombre`, `Apellido`, `Telefono`, `Direccion`, `Estado`) VALUES
(1, 'Alberto', 'Perez', 78945612, 'Parque Industrial, Mz 40', 1),
(2, 'Juan Luis', 'Moraga Ramirez', 71548623, '4to Anillo, Santos Dumont #210', 1),
(3, 'Julio Ancelmo', 'Ortiz Taboada', 76045821, 'Av. 3 pasos al Frente y Av. Juan Pablo II', 1),
(4, 'Marcelo', 'Pando', 76359862, 'Av. Banzer 7mo Anillo #62', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reingreso`
--

CREATE TABLE `reingreso` (
  `NroReingreso` int(11) NOT NULL,
  `FechaHoraReingreso` datetime NOT NULL,
  `NroAlmacen` int(11) NOT NULL,
  `CodBien` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `NroRevaluo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable`
--

CREATE TABLE `responsable` (
  `CodResponsable` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellido` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `responsable`
--

INSERT INTO `responsable` (`CodResponsable`, `Nombre`, `Apellido`, `Telefono`, `Estado`) VALUES
(1000, 'Wilfredo', 'Meneses', 74511011, 1),
(1001, 'Oscar P.', 'Chimuelo', 45878965, 1),
(1002, 'Maria', 'Sanchez', 9456618, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revalorizacion`
--

CREATE TABLE `revalorizacion` (
  `NroRevalorizacion` int(11) NOT NULL,
  `Monto` decimal(10,2) NOT NULL,
  `Descripcion` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `NroRevaluo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revaluo`
--

CREATE TABLE `revaluo` (
  `NroRevaluo` int(11) NOT NULL,
  `Estado` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `FechaHora` datetime NOT NULL,
  `NroRevision` int(11) NOT NULL,
  `Monto` decimal(10,2) DEFAULT NULL,
  `Descripcion` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `revaluo`
--

INSERT INTO `revaluo` (`NroRevaluo`, `Estado`, `FechaHora`, `NroRevision`, `Monto`, `Descripcion`) VALUES
(1, 'Casi Nuevo', '2019-11-21 00:00:00', 10, 100.00, 'Tiene algunos defectos'),
(2, 'nuevo', '2019-12-17 00:29:18', 14, 100.00, 'sufrio cambio de bateria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revisiontecnica`
--

CREATE TABLE `revisiontecnica` (
  `NroRevision` int(11) NOT NULL,
  `FechaHora` datetime NOT NULL,
  `CodCustodio` int(11) NOT NULL,
  `CodBien` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `CodOperador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `revisiontecnica`
--

INSERT INTO `revisiontecnica` (`NroRevision`, `FechaHora`, `CodCustodio`, `CodBien`, `CodOperador`) VALUES
(2, '2019-10-03 04:30:31', 100, '112-1-1561-88', 1),
(10, '2019-11-21 08:28:38', 100, '102-1-3075-58', 1),
(11, '2019-11-21 08:35:29', 100, '112-1-6398-50', 4),
(12, '2019-11-21 08:46:58', 105, '122-3-8034-45', 3),
(13, '2019-11-29 02:11:12', 102, '122-1-8213-90', 2),
(14, '2019-12-16 23:25:07', 100, '106-4-5104-04', 3),
(15, '2019-12-17 00:30:36', 100, '106-4-7867-32', 7),
(16, '2019-12-17 00:30:46', 108, '136-4-6737-53', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'web', '2019-12-16 06:13:58', '2019-12-16 06:13:58'),
(2, 'responsable', 'web', '2019-12-16 06:14:25', '2019-12-16 06:14:25'),
(3, 'custodio', 'web', '2019-12-16 06:14:30', '2019-12-16 06:14:30'),
(4, 'operador', 'web', '2019-12-16 06:14:31', '2019-12-16 06:14:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(6, 3),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(18, 2),
(19, 1),
(20, 1),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(34, 3),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(42, 2),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(50, 2),
(51, 1),
(51, 2),
(52, 1),
(52, 2),
(53, 1),
(53, 2),
(54, 1),
(54, 4),
(55, 1),
(55, 2),
(55, 4),
(56, 1),
(56, 4),
(57, 1),
(57, 4),
(58, 1),
(58, 4),
(59, 1),
(59, 4),
(60, 1),
(60, 4),
(61, 1),
(61, 4),
(62, 1),
(62, 4),
(63, 1),
(63, 4),
(64, 1),
(64, 4),
(65, 1),
(65, 4),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(70, 3),
(71, 1),
(71, 2),
(71, 3),
(72, 1),
(72, 3),
(73, 1),
(73, 3),
(74, 1),
(74, 2),
(75, 1),
(75, 2),
(76, 1),
(76, 2),
(77, 1),
(77, 2),
(78, 1),
(79, 1),
(80, 1),
(81, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubro`
--

CREATE TABLE `rubro` (
  `CodRubro` int(11) NOT NULL,
  `Descripcion` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `vidautil` float(10,5) NOT NULL,
  `coeficiente` float(10,5) NOT NULL,
  `deprecia` tinyint(1) NOT NULL,
  `actualiza` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `rubro`
--

INSERT INTO `rubro` (`CodRubro`, `Descripcion`, `vidautil`, `coeficiente`, `deprecia`, `actualiza`) VALUES
(1, 'EDIFICACIONES', 40.00000, 2.50000, 1, 1),
(2, 'MUEBLES Y ENSERES DE OFICINA', 10.00000, 10.00000, 1, 1),
(3, 'MAQUINARIAS EN GENERAL', 8.00000, 12.50000, 1, 1),
(4, 'Equipos e instalaciones', 8.00000, 12.50000, 1, 1),
(5, 'Vehículos y automotores', 5.00000, 20.00000, 1, 1),
(6, 'Equipos de Computación', 4.00000, 25.00000, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `NroSolicitud` int(11) NOT NULL,
  `FechaHora` datetime NOT NULL,
  `CodResponsable` int(11) NOT NULL,
  `CodCustodio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tranferencia`
--

CREATE TABLE `tranferencia` (
  `NroTranferencia` int(11) NOT NULL,
  `FechaTranferencia` date NOT NULL,
  `CodCustodioOrigen` int(11) NOT NULL,
  `CodCustodioDestino` int(11) NOT NULL,
  `CodResponsable` int(11) NOT NULL,
  `CodBien` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `EstadoBien` varchar(10) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tranferencia`
--

INSERT INTO `tranferencia` (`NroTranferencia`, `FechaTranferencia`, `CodCustodioOrigen`, `CodCustodioDestino`, `CodResponsable`, `CodBien`, `EstadoBien`) VALUES
(1, '2019-10-03', 100, 100, 1000, '133-9-1757-89', ''),
(2, '2019-10-03', 104, 108, 1001, '112-1-1561-88', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `CodUbicacion` int(11) NOT NULL,
  `Edificio` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Ciudad` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Pais` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`CodUbicacion`, `Edificio`, `Ciudad`, `Pais`, `Estado`) VALUES
(1, 'CENTRAL', 'SANTA CRUZ', 'BOLIVIA', 1),
(2, 'Sucursal Beni', 'Beni', 'Bolivia', 1),
(3, 'Sucursal Indana', 'Santa Cruz', 'Bolivia', 1),
(4, 'Sucursal Ventura Mall', 'Santa Cruz', 'Bolivia', 1),
(5, 'DISMART', 'SANTA CRUZ', 'BOLIVIA', 1),
(6, 'WALMAR', 'COCHABAMBA', 'BOLIVIA', 1),
(7, 'SUCURSAL BENI', 'BENI', 'BOLIVIA', 1),
(8, 'SUCURSAL MUTUALISTA', 'SANTA CRUZ', 'BOLIVIA', 1),
(9, 'contabilidad', 'santa criz', 'bolivia', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `Estado`) VALUES
(6, 'carlos', 'car2854@gmail.com', NULL, '$2y$10$wYyKhQ7r6pvvmDmGmnU1a.Bidj5pLWcwhfIZsdSPu3g/3PQn6B6w.', 'gwEUKYugV6Tenfv8GInBQiJsGBGVit6jwqzfjZ2Enh9S56P9UuhjxVA2NoBZ', '2019-11-21 07:39:50', '2019-11-21 07:39:50', 1),
(7, 'admin', 'admin@gmail.com', NULL, '$2y$10$Lhs22799Lbs1XqhKICOylOGqo/4APv.kC9eoIivXhCiLNiTRyfxi.', NULL, '2019-12-16 06:14:35', '2019-12-16 06:14:35', 1),
(8, 'operador1', 'operador@gmail.com', NULL, '$2y$10$cv7uWMUmiAVkP3cLQlB5xujK9sdxyZZtIH.EPi8s.BKOTedVtqZha', NULL, '2019-12-16 18:18:35', '2019-12-16 21:37:33', 1),
(9, 'Arnoldo Quiroga', 'arnoldQui@gmail.com', NULL, '$2y$10$C/Tad/19T8/hsH1ducpsRex6HUONI4ikTQXnKczod2hKtQEftztRG', '6HQDFRcgM1vsDKGGTgZvBGVjV13fyMcZgJOIinXNQxApouHzNy8Y6ceCNhe4', '2019-12-16 22:42:47', '2019-12-16 22:42:47', 1),
(10, 'responsable1', 'resp@gmail.com', NULL, '$2y$10$338JZudQ9O6up4rPldbSnuSVxKnypAhCPX0b4DjfjDCn3Lxp5IcE2', NULL, '2019-12-17 00:10:13', '2019-12-17 00:10:13', 1),
(11, 'custodio1', 'cust@gmail.com', NULL, '$2y$10$Vyj6W8eOq3Y7JBoJ8NHM1Ong9pGafV8l/h7a7Vz9fX/2ewlPRyNQq', NULL, '2019-12-17 00:11:03', '2019-12-17 00:11:03', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adquisicion`
--
ALTER TABLE `adquisicion`
  ADD PRIMARY KEY (`NroAdquisicion`),
  ADD KEY `CodProveedor` (`CodProveedor`),
  ADD KEY `NroAlmacen` (`NroAlmacen`);

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`NroAlmacen`);

--
-- Indices de la tabla `baja`
--
ALTER TABLE `baja`
  ADD PRIMARY KEY (`NroBaja`),
  ADD KEY `NroRevision` (`NroRevision`);

--
-- Indices de la tabla `bien`
--
ALTER TABLE `bien`
  ADD PRIMARY KEY (`CodBien`),
  ADD KEY `UbicacionDepartamento` (`UbicacionDepartamento`),
  ADD KEY `UbicacionAlmacen` (`UbicacionAlmacen`),
  ADD KEY `CodCategoria` (`CodCategoria`),
  ADD KEY `CodRubro` (`CodRubro`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD UNIQUE KEY `cache_key_unique` (`key`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`CodCategoria`),
  ADD KEY `CodRubro` (`CodRubro`);

--
-- Indices de la tabla `custodio`
--
ALTER TABLE `custodio`
  ADD PRIMARY KEY (`CodCustodio`),
  ADD KEY `CodDepartamento` (`CodDepartamento`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`CodDepartamento`),
  ADD KEY `CodUbicacion` (`CodUbicacion`);

--
-- Indices de la tabla `depreciacion`
--
ALTER TABLE `depreciacion`
  ADD PRIMARY KEY (`NroDepreciacion`),
  ADD KEY `CodBien` (`CodBien`);

--
-- Indices de la tabla `detalleadquisicion`
--
ALTER TABLE `detalleadquisicion`
  ADD PRIMARY KEY (`NroDetalleAdquisicion`),
  ADD KEY `CodCategoria` (`CodCategoria`),
  ADD KEY `NroAdquisicion` (`NroAdquisicion`);

--
-- Indices de la tabla `detallebien`
--
ALTER TABLE `detallebien`
  ADD PRIMARY KEY (`NroDetalle`,`CodBien`),
  ADD KEY `CodBien` (`CodBien`),
  ADD KEY `NroMovimiento` (`NroMovimiento`);

--
-- Indices de la tabla `detallesolicitud`
--
ALTER TABLE `detallesolicitud`
  ADD PRIMARY KEY (`NroDetalleSolicitud`),
  ADD KEY `CodCategoria` (`CodCategoria`),
  ADD KEY `NroSolicitud` (`NroSolicitud`);

--
-- Indices de la tabla `log_change`
--
ALTER TABLE `log_change`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`NroMantenimiento`),
  ADD KEY `NroRevision` (`NroRevision`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`NroMovimiento`),
  ADD KEY `CodDepartamento` (`CodDepartamento`),
  ADD KEY `CodResponsable` (`CodResponsable`);

--
-- Indices de la tabla `operador`
--
ALTER TABLE `operador`
  ADD PRIMARY KEY (`CodOperador`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`CodProveedor`);

--
-- Indices de la tabla `reingreso`
--
ALTER TABLE `reingreso`
  ADD PRIMARY KEY (`NroReingreso`),
  ADD KEY `NroAlmacen` (`NroAlmacen`),
  ADD KEY `CodBien` (`CodBien`),
  ADD KEY `NroRevaluo` (`NroRevaluo`);

--
-- Indices de la tabla `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`CodResponsable`);

--
-- Indices de la tabla `revalorizacion`
--
ALTER TABLE `revalorizacion`
  ADD PRIMARY KEY (`NroRevalorizacion`),
  ADD KEY `NroRevaluo` (`NroRevaluo`);

--
-- Indices de la tabla `revaluo`
--
ALTER TABLE `revaluo`
  ADD PRIMARY KEY (`NroRevaluo`),
  ADD KEY `NroRevision` (`NroRevision`);

--
-- Indices de la tabla `revisiontecnica`
--
ALTER TABLE `revisiontecnica`
  ADD PRIMARY KEY (`NroRevision`),
  ADD KEY `CodCustodio` (`CodCustodio`),
  ADD KEY `CodBien` (`CodBien`),
  ADD KEY `CodOperador` (`CodOperador`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `rubro`
--
ALTER TABLE `rubro`
  ADD PRIMARY KEY (`CodRubro`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`NroSolicitud`),
  ADD KEY `CodResponsable` (`CodResponsable`),
  ADD KEY `CodCustodio` (`CodCustodio`);

--
-- Indices de la tabla `tranferencia`
--
ALTER TABLE `tranferencia`
  ADD PRIMARY KEY (`NroTranferencia`),
  ADD KEY `CodBien` (`CodBien`),
  ADD KEY `CodResponsable` (`CodResponsable`),
  ADD KEY `CodCustodioDestino` (`CodCustodioDestino`),
  ADD KEY `CodCustodioOrigen` (`CodCustodioOrigen`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`CodUbicacion`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adquisicion`
--
ALTER TABLE `adquisicion`
  MODIFY `NroAdquisicion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de la tabla `baja`
--
ALTER TABLE `baja`
  MODIFY `NroBaja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `CodCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `depreciacion`
--
ALTER TABLE `depreciacion`
  MODIFY `NroDepreciacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalleadquisicion`
--
ALTER TABLE `detalleadquisicion`
  MODIFY `NroDetalleAdquisicion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detallesolicitud`
--
ALTER TABLE `detallesolicitud`
  MODIFY `NroDetalleSolicitud` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `log_change`
--
ALTER TABLE `log_change`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `NroMantenimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `NroMovimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `operador`
--
ALTER TABLE `operador`
  MODIFY `CodOperador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `CodProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `reingreso`
--
ALTER TABLE `reingreso`
  MODIFY `NroReingreso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `revalorizacion`
--
ALTER TABLE `revalorizacion`
  MODIFY `NroRevalorizacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `revaluo`
--
ALTER TABLE `revaluo`
  MODIFY `NroRevaluo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `revisiontecnica`
--
ALTER TABLE `revisiontecnica`
  MODIFY `NroRevision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rubro`
--
ALTER TABLE `rubro`
  MODIFY `CodRubro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `NroSolicitud` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tranferencia`
--
ALTER TABLE `tranferencia`
  MODIFY `NroTranferencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `CodUbicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adquisicion`
--
ALTER TABLE `adquisicion`
  ADD CONSTRAINT `adquisicion_ibfk_1` FOREIGN KEY (`CodProveedor`) REFERENCES `proveedor` (`CodProveedor`),
  ADD CONSTRAINT `adquisicion_ibfk_2` FOREIGN KEY (`NroAlmacen`) REFERENCES `almacen` (`NroAlmacen`);

--
-- Filtros para la tabla `baja`
--
ALTER TABLE `baja`
  ADD CONSTRAINT `baja_ibfk_1` FOREIGN KEY (`NroRevision`) REFERENCES `revisiontecnica` (`NroRevision`);

--
-- Filtros para la tabla `bien`
--
ALTER TABLE `bien`
  ADD CONSTRAINT `CodRubro` FOREIGN KEY (`CodRubro`) REFERENCES `rubro` (`CodRubro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `bien_ibfk_1` FOREIGN KEY (`UbicacionDepartamento`) REFERENCES `departamento` (`CodDepartamento`),
  ADD CONSTRAINT `bien_ibfk_2` FOREIGN KEY (`UbicacionAlmacen`) REFERENCES `almacen` (`NroAlmacen`),
  ADD CONSTRAINT `bien_ibfk_3` FOREIGN KEY (`CodCategoria`) REFERENCES `categoria` (`CodCategoria`);

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`CodRubro`) REFERENCES `rubro` (`CodRubro`);

--
-- Filtros para la tabla `custodio`
--
ALTER TABLE `custodio`
  ADD CONSTRAINT `custodio_ibfk_1` FOREIGN KEY (`CodDepartamento`) REFERENCES `departamento` (`CodDepartamento`);

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `departamento_ibfk_1` FOREIGN KEY (`CodUbicacion`) REFERENCES `ubicacion` (`CodUbicacion`);

--
-- Filtros para la tabla `depreciacion`
--
ALTER TABLE `depreciacion`
  ADD CONSTRAINT `depreciacion_ibfk_1` FOREIGN KEY (`CodBien`) REFERENCES `bien` (`CodBien`);

--
-- Filtros para la tabla `detalleadquisicion`
--
ALTER TABLE `detalleadquisicion`
  ADD CONSTRAINT `detalleadquisicion_ibfk_1` FOREIGN KEY (`NroAdquisicion`) REFERENCES `adquisicion` (`NroAdquisicion`),
  ADD CONSTRAINT `detalleadquisicion_ibfk_2` FOREIGN KEY (`CodCategoria`) REFERENCES `categoria` (`CodCategoria`),
  ADD CONSTRAINT `detalleadquisicion_ibfk_3` FOREIGN KEY (`NroAdquisicion`) REFERENCES `adquisicion` (`NroAdquisicion`);

--
-- Filtros para la tabla `detallebien`
--
ALTER TABLE `detallebien`
  ADD CONSTRAINT `detallebien_ibfk_1` FOREIGN KEY (`CodBien`) REFERENCES `bien` (`CodBien`),
  ADD CONSTRAINT `detallebien_ibfk_2` FOREIGN KEY (`NroMovimiento`) REFERENCES `movimiento` (`NroMovimiento`);

--
-- Filtros para la tabla `detallesolicitud`
--
ALTER TABLE `detallesolicitud`
  ADD CONSTRAINT `detallesolicitud_ibfk_1` FOREIGN KEY (`CodCategoria`) REFERENCES `categoria` (`CodCategoria`),
  ADD CONSTRAINT `detallesolicitud_ibfk_2` FOREIGN KEY (`NroSolicitud`) REFERENCES `solicitud` (`NroSolicitud`);

--
-- Filtros para la tabla `log_change`
--
ALTER TABLE `log_change`
  ADD CONSTRAINT `log_change_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `mantenimiento_ibfk_1` FOREIGN KEY (`NroRevision`) REFERENCES `revisiontecnica` (`NroRevision`);

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `movimiento_ibfk_1` FOREIGN KEY (`CodDepartamento`) REFERENCES `departamento` (`CodDepartamento`),
  ADD CONSTRAINT `movimiento_ibfk_2` FOREIGN KEY (`CodResponsable`) REFERENCES `responsable` (`CodResponsable`);

--
-- Filtros para la tabla `reingreso`
--
ALTER TABLE `reingreso`
  ADD CONSTRAINT `reingreso_ibfk_1` FOREIGN KEY (`NroAlmacen`) REFERENCES `almacen` (`NroAlmacen`),
  ADD CONSTRAINT `reingreso_ibfk_2` FOREIGN KEY (`CodBien`) REFERENCES `bien` (`CodBien`),
  ADD CONSTRAINT `reingreso_ibfk_3` FOREIGN KEY (`NroRevaluo`) REFERENCES `revaluo` (`NroRevaluo`);

--
-- Filtros para la tabla `revalorizacion`
--
ALTER TABLE `revalorizacion`
  ADD CONSTRAINT `revalorizacion_ibfk_1` FOREIGN KEY (`NroRevaluo`) REFERENCES `revaluo` (`NroRevaluo`);

--
-- Filtros para la tabla `revaluo`
--
ALTER TABLE `revaluo`
  ADD CONSTRAINT `revaluo_ibfk_1` FOREIGN KEY (`NroRevision`) REFERENCES `revisiontecnica` (`NroRevision`);

--
-- Filtros para la tabla `revisiontecnica`
--
ALTER TABLE `revisiontecnica`
  ADD CONSTRAINT `revisiontecnica_ibfk_1` FOREIGN KEY (`CodCustodio`) REFERENCES `custodio` (`CodCustodio`),
  ADD CONSTRAINT `revisiontecnica_ibfk_2` FOREIGN KEY (`CodBien`) REFERENCES `bien` (`CodBien`),
  ADD CONSTRAINT `revisiontecnica_ibfk_3` FOREIGN KEY (`CodOperador`) REFERENCES `operador` (`CodOperador`);

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`CodResponsable`) REFERENCES `responsable` (`CodResponsable`),
  ADD CONSTRAINT `solicitud_ibfk_2` FOREIGN KEY (`CodCustodio`) REFERENCES `custodio` (`CodCustodio`);

--
-- Filtros para la tabla `tranferencia`
--
ALTER TABLE `tranferencia`
  ADD CONSTRAINT `tranferencia_ibfk_1` FOREIGN KEY (`CodBien`) REFERENCES `bien` (`CodBien`),
  ADD CONSTRAINT `tranferencia_ibfk_2` FOREIGN KEY (`CodResponsable`) REFERENCES `responsable` (`CodResponsable`),
  ADD CONSTRAINT `tranferencia_ibfk_3` FOREIGN KEY (`CodCustodioDestino`) REFERENCES `custodio` (`CodCustodio`),
  ADD CONSTRAINT `tranferencia_ibfk_4` FOREIGN KEY (`CodCustodioOrigen`) REFERENCES `custodio` (`CodCustodio`);
COMMIT;
