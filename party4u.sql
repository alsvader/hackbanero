-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 21-11-2015 a las 23:22:14
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `party4u`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `anfitrion_comentario`
-- 

CREATE TABLE `anfitrion_comentario` (
  `id` int(11) NOT NULL auto_increment,
  `id_user` int(11) default NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_actualizacion` date NOT NULL,
  `rate` int(11) NOT NULL,
  `comentario` mediumtext NOT NULL,
  `id_anfintrion` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_anfintrion` (`id_anfintrion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `anfitrion_comentario`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cuentas_usuario`
-- 

CREATE TABLE `cuentas_usuario` (
  `id` int(11) NOT NULL auto_increment,
  `id_pago_prom` int(11) default NULL,
  `id_user` int(11) default NULL,
  `numero_cuenta` varchar(16) NOT NULL,
  `caducidad` varchar(4) NOT NULL,
  `codigo` varchar(4) NOT NULL,
  `saldo_favor` varchar(10) NOT NULL,
  `saldo_contra` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `cuentas_usuario`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `fiesta`
-- 

CREATE TABLE `fiesta` (
  `id` int(11) NOT NULL auto_increment,
  `id_ubicacion` int(11) default NULL,
  `id_user` int(11) default NULL,
  `nombre_fiesta` varchar(255) NOT NULL,
  `max_participantes` varchar(7) NOT NULL,
  `min_cuota` varchar(10) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `status` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id_ubicacion` (`id_ubicacion`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `fiesta`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `fiesta_comentario`
-- 

CREATE TABLE `fiesta_comentario` (
  `id` int(11) NOT NULL auto_increment,
  `id_fiesta` int(11) default NULL,
  `id_user` int(11) default NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_actualizacion` date NOT NULL,
  `comentario` mediumtext NOT NULL,
  `rate` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id_fiesta` (`id_fiesta`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `fiesta_comentario`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `fiesta_fondeador`
-- 

CREATE TABLE `fiesta_fondeador` (
  `id` int(11) NOT NULL auto_increment,
  `id_fiesta` int(11) default NULL,
  `id_user` int(11) default NULL,
  `monto` varchar(5) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id_fiesta` (`id_fiesta`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `fiesta_fondeador`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `follower`
-- 

CREATE TABLE `follower` (
  `id` int(11) NOT NULL auto_increment,
  `id_user` int(11) default NULL,
  `id_user_follower` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_user_follower` (`id_user_follower`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `follower`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pago_promedio`
-- 

CREATE TABLE `pago_promedio` (
  `id` int(11) NOT NULL auto_increment,
  `monto` decimal(9,2) NOT NULL,
  `efectuado` int(11) NOT NULL,
  `id_cuenta` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id_cuenta` (`id_cuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `pago_promedio`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `privilegio`
-- 

CREATE TABLE `privilegio` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- Volcar la base de datos para la tabla `privilegio`
-- 

INSERT INTO `privilegio` VALUES (1, 'admin');
INSERT INTO `privilegio` VALUES (2, 'secretaria_admin');
INSERT INTO `privilegio` VALUES (3, 'jefe_oficina_servicio');
INSERT INTO `privilegio` VALUES (4, 'personal_oficina_servicio');
INSERT INTO `privilegio` VALUES (5, 'jefe_departamento');
INSERT INTO `privilegio` VALUES (6, 'secretaria_departamento');
INSERT INTO `privilegio` VALUES (7, 'jefe_oficina');
INSERT INTO `privilegio` VALUES (8, 'secretaria_oficina');
INSERT INTO `privilegio` VALUES (9, 'personal');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `profiles`
-- 

CREATE TABLE `profiles` (
  `user_id` int(11) NOT NULL auto_increment,
  `apellido_paterno` varchar(50) NOT NULL,
  `apellido_materno` varchar(50) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `id_privilegio` int(11) NOT NULL,
  `foto` varchar(255) default NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `profiles`
-- 

INSERT INTO `profiles` VALUES (1, 'Cardenas', 'Pimentel', 'Francisco', 1, NULL);
INSERT INTO `profiles` VALUES (2, 'mariomoreno', 'mariomoreno', 'mariomoreno', 2, NULL);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `profiles_fields`
-- 

CREATE TABLE `profiles_fields` (
  `id` int(10) NOT NULL auto_increment,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` varchar(15) NOT NULL default '0',
  `field_size_min` varchar(15) NOT NULL default '0',
  `required` int(1) NOT NULL default '0',
  `match` varchar(255) NOT NULL default '',
  `range` varchar(255) NOT NULL default '',
  `error_message` varchar(255) NOT NULL default '',
  `other_validator` varchar(5000) NOT NULL default '',
  `default` varchar(255) NOT NULL default '',
  `widget` varchar(255) NOT NULL default '',
  `widgetparams` varchar(5000) NOT NULL default '',
  `position` int(3) NOT NULL default '0',
  `visible` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Volcar la base de datos para la tabla `profiles_fields`
-- 

INSERT INTO `profiles_fields` VALUES (1, 'apellido_paterno', 'Apellido Paterno', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3);
INSERT INTO `profiles_fields` VALUES (2, 'apellido_materno', 'Apellido Materno', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3);
INSERT INTO `profiles_fields` VALUES (3, 'nombres', 'Nombre(s)', 'VARCHAR', '200', '2', 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3);
INSERT INTO `profiles_fields` VALUES (4, 'id_privilegio', 'Privilegio', 'INT', '11', '1', 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3);
INSERT INTO `profiles_fields` VALUES (7, 'foto', 'Foto de perfil', 'VARCHAR', '255', '1', 0, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `users`
-- 

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL default '',
  `create_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL default '0',
  `status` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `users`
-- 

INSERT INTO `users` VALUES (1, 'administrador', '91f5167c34c400758115c2a6826ec2e3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', '2015-01-19 16:16:24', '2015-11-16 10:17:21', 1, 1);
INSERT INTO `users` VALUES (2, 'mariomoreno', 'f9bf69bc8e5737522bbbbeda499848bd', 'mariomoreno@itm.cm', '0747225f3bbdea3b21778fdb66f73f1b', '2015-11-16 18:46:05', '0000-00-00 00:00:00', 0, 1);

-- 
-- Filtros para las tablas descargadas (dump)
-- 

-- 
-- Filtros para la tabla `anfitrion_comentario`
-- 
ALTER TABLE `anfitrion_comentario`
  ADD CONSTRAINT `anfitrion_comentario_ibfk_2` FOREIGN KEY (`id_anfintrion`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `anfitrion_comentario_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

-- 
-- Filtros para la tabla `cuentas_usuario`
-- 
ALTER TABLE `cuentas_usuario`
  ADD CONSTRAINT `cuentas_usuario_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

-- 
-- Filtros para la tabla `fiesta`
-- 
ALTER TABLE `fiesta`
  ADD CONSTRAINT `fiesta_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

-- 
-- Filtros para la tabla `fiesta_comentario`
-- 
ALTER TABLE `fiesta_comentario`
  ADD CONSTRAINT `fiesta_comentario_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fiesta_comentario_ibfk_1` FOREIGN KEY (`id_fiesta`) REFERENCES `fiesta` (`id`);

-- 
-- Filtros para la tabla `fiesta_fondeador`
-- 
ALTER TABLE `fiesta_fondeador`
  ADD CONSTRAINT `fiesta_fondeador_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fiesta_fondeador_ibfk_1` FOREIGN KEY (`id_fiesta`) REFERENCES `fiesta` (`id`);

-- 
-- Filtros para la tabla `follower`
-- 
ALTER TABLE `follower`
  ADD CONSTRAINT `follower_ibfk_2` FOREIGN KEY (`id_user_follower`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `follower_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

-- 
-- Filtros para la tabla `pago_promedio`
-- 
ALTER TABLE `pago_promedio`
  ADD CONSTRAINT `pago_promedio_ibfk_1` FOREIGN KEY (`id_cuenta`) REFERENCES `cuentas_usuario` (`id`);
