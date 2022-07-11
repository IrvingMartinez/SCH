SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `levels`
--

INSERT INTO `levels` (`id`, `code`, `title`) VALUES
(1, '{sysadmin}', 'Administrador de sistemas'),
(2, '{administrator}', 'Administrador'),
(11, '{employee}', 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `code`, `title`) VALUES
(1, '{users_read}', 'Ver los usuarios.'),
(2, '{users_create}', 'Crear usuarios.'),
(3, '{users_update}', 'Modificar usuarios.'),
(4, '{users_delete}', 'Eliminar usuarios.'),
(5, '{permissions_read}', 'Ver los permisos de usuario.'),
(6, '{permissions_create}', 'Crear permisos de usuario.'),
(7, '{permissions_delete}', 'Eliminar permisos de usuario.'),
(8, '{help_development}', 'Ayuda para desarrolladores.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) NOT NULL,
  `id_user` bigint(20) DEFAULT NULL,
  `token` longtext NOT NULL,
  `login_date` datetime DEFAULT NULL,
  `logout_date` datetime DEFAULT NULL,
  `connection` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `id_level` bigint(20) DEFAULT NULL,
  `id_person` bigint(20) DEFAULT NULL,
  `permissions` text DEFAULT NULL,
  `avatar` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `id_level`, `id_person`, `permissions`, `avatar`, `status`) VALUES
(1, 'admin', 'f893bd2ab7862b776319e5e33e2225b3e6a20db1:tKqjUwdXDyIE60O8BSEWVOmk7cclorGrkcFU7Qpf0hNQe2Jjjssx0KWBikNH5YEN', 1, 1, 'a:15:{i:0;s:12:\"{users_read}\";i:1;s:14:\"{users_create}\";i:2;s:14:\"{users_update}\";i:3;s:14:\"{users_delete}\";i:4;s:18:\"{permissions_read}\";i:5;s:20:\"{permissions_create}\";i:6;s:20:\"{permissions_delete}\";i:7;s:11:\"{blog_read}\";i:8;s:13:\"{blog_create}\";i:9;s:13:\"{blog_update}\";i:10;s:13:\"{blog_delete}\";i:11;s:22:\"{categories_blog_read}\";i:12;s:24:\"{categories_blog_create}\";i:13;s:24:\"{categories_blog_delete}\";i:14;s:18:\"{help_development}\";000}', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persons`
--

CREATE TABLE `persons` (
    `id` bigint(20) NOT NULL,
    `curp` varchar(18) DEFAULT NULL,
    `full name` text NOT NULL,
    `imss` text NOT NULL,
    `rfc` varchar(13) DEFAULT NULL
    ENGINE=InnoDB DEFAULT CHARSET=latin1;
)

--
-- Indices de la tabla `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`id_level`);
  ADD KEY `level` (`id_person`);

--
-- Indices de la tabla `persons`
--
  ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`);

  --
  -- Indices de la tabla `persons`
  --
    ALTER TABLE `employee`
    ADD PRIMARY KEY (`id`);
    ADD PRIMARY KEY (`id_person`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `blog_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `blog_categories` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `levels` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;
