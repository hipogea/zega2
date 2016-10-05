-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.13-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para nautilus
DROP DATABASE IF EXISTS `prod`;
CREATE DATABASE IF NOT EXISTS `prod` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `prod`;


-- Volcando estructura para tabla nautilus.activerecordlog
DROP TABLE IF EXISTS `activerecordlog`;
CREATE TABLE IF NOT EXISTS `activerecordlog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idModel` int(10) unsigned DEFAULT NULL,
  `field` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userid` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idModelReal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `oldvalue` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `newvalue` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nombrecampo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `campo1` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `campo2` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `campo3` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `model` (`model`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.cruge_authassignment
DROP TABLE IF EXISTS `cruge_authassignment`;
CREATE TABLE IF NOT EXISTS `cruge_authassignment` (
  `userid` int(11) NOT NULL,
  `bizrule` text,
  `data` text,
  `itemname` varchar(64) NOT NULL,
  PRIMARY KEY (`userid`,`itemname`),
  KEY `fk_cruge_authassignment_cruge_authitem1` (`itemname`),
  KEY `fk_cruge_authassignment_user` (`userid`),
  CONSTRAINT `fk_cruge_authassignment_cruge_authitem1` FOREIGN KEY (`itemname`) REFERENCES `cruge_authitem` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cruge_authassignment_user` FOREIGN KEY (`userid`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.cruge_authitem
DROP TABLE IF EXISTS `cruge_authitem`;
CREATE TABLE IF NOT EXISTS `cruge_authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.cruge_authitemchild
DROP TABLE IF EXISTS `cruge_authitemchild`;
CREATE TABLE IF NOT EXISTS `cruge_authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `crugeauthitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `crugeauthitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.cruge_field
DROP TABLE IF EXISTS `cruge_field`;
CREATE TABLE IF NOT EXISTS `cruge_field` (
  `idfield` int(11) NOT NULL AUTO_INCREMENT,
  `fieldname` varchar(20) NOT NULL,
  `longname` varchar(50) DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  `required` int(11) DEFAULT '0',
  `fieldtype` int(11) DEFAULT '0',
  `fieldsize` int(11) DEFAULT '20',
  `maxlength` int(11) DEFAULT '45',
  `showinreports` int(11) DEFAULT '0',
  `useregexp` varchar(512) DEFAULT NULL,
  `useregexpmsg` varchar(512) DEFAULT NULL,
  `predetvalue` mediumblob,
  PRIMARY KEY (`idfield`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.cruge_fieldvalue
DROP TABLE IF EXISTS `cruge_fieldvalue`;
CREATE TABLE IF NOT EXISTS `cruge_fieldvalue` (
  `idfieldvalue` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `idfield` int(11) NOT NULL,
  `value` blob,
  PRIMARY KEY (`idfieldvalue`),
  KEY `fk_cruge_fieldvalue_cruge_user1` (`iduser`),
  KEY `fk_cruge_fieldvalue_cruge_field1` (`idfield`),
  CONSTRAINT `fk_cruge_fieldvalue_cruge_field1` FOREIGN KEY (`idfield`) REFERENCES `cruge_field` (`idfield`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_cruge_fieldvalue_cruge_user1` FOREIGN KEY (`iduser`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.cruge_session
DROP TABLE IF EXISTS `cruge_session`;
CREATE TABLE IF NOT EXISTS `cruge_session` (
  `idsession` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `created` bigint(20) DEFAULT NULL,
  `expire` bigint(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `ipaddress` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `usagecount` int(11) DEFAULT NULL,
  `lastusage` bigint(20) DEFAULT NULL,
  `logoutdate` bigint(20) DEFAULT NULL,
  `ipaddressout` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`idsession`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.cruge_system
DROP TABLE IF EXISTS `cruge_system`;
CREATE TABLE IF NOT EXISTS `cruge_system` (
  `idsystem` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `largename` varchar(45) DEFAULT NULL,
  `sessionmaxdurationmins` int(11) DEFAULT '30',
  `sessionmaxsameipconnections` int(11) DEFAULT '10',
  `sessionreusesessions` int(11) DEFAULT '1' COMMENT '1yes 0no',
  `sessionmaxsessionsperday` int(11) DEFAULT '-1',
  `sessionmaxsessionsperuser` int(11) DEFAULT '-1',
  `systemnonewsessions` int(11) DEFAULT '0' COMMENT '1yes 0no',
  `systemdown` int(11) DEFAULT '0',
  `registerusingcaptcha` int(11) DEFAULT '0',
  `registerusingterms` int(11) DEFAULT '0',
  `terms` blob,
  `registerusingactivation` int(11) DEFAULT '1',
  `defaultroleforregistration` varchar(64) DEFAULT NULL,
  `registerusingtermslabel` varchar(100) DEFAULT NULL,
  `registrationonlogin` int(11) DEFAULT '1',
  PRIMARY KEY (`idsystem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.cruge_user
DROP TABLE IF EXISTS `cruge_user`;
CREATE TABLE IF NOT EXISTS `cruge_user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `regdate` bigint(30) DEFAULT NULL,
  `actdate` bigint(30) DEFAULT NULL,
  `logondate` bigint(30) DEFAULT NULL,
  `username` varchar(64) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL COMMENT 'Hashed password',
  `authkey` varchar(100) DEFAULT NULL COMMENT 'llave de autentificacion',
  `state` int(11) DEFAULT '0',
  `totalsessioncounter` int(11) DEFAULT '0',
  `currentsessioncounter` int(11) DEFAULT '0',
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.diccionario
DROP TABLE IF EXISTS `diccionario`;
CREATE TABLE IF NOT EXISTS `diccionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prefijo` varchar(25) CHARACTER SET utf8 NOT NULL,
  `nombre` varchar(60) CHARACTER SET utf8 NOT NULL,
  `orden` int(11) NOT NULL,
  `rutina` mediumtext CHARACTER SET utf8 NOT NULL,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_alconversiones
DROP TABLE IF EXISTS `public_alconversiones`;
CREATE TABLE IF NOT EXISTS `public_alconversiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `um1` varchar(3) DEFAULT NULL,
  `um2` varchar(3) DEFAULT NULL,
  `numerador` double DEFAULT NULL,
  `denominador` double DEFAULT NULL,
  `codart` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `um1` (`um1`,`um2`,`codart`),
  KEY `fki_conamagerial` (`codart`),
  KEY `fki_flflkf` (`um2`),
  KEY `fki_ums` (`um1`),
  CONSTRAINT `public_4ersffiones_ibfk_1` FOREIGN KEY (`codart`) REFERENCES `public_maestrocomponentes` (`codigo`),
  CONSTRAINT `public_alco343nveones_ibfk_1` FOREIGN KEY (`um1`) REFERENCES `public_ums` (`um`),
  CONSTRAINT `public_alcon4654iones_ibfk_2` FOREIGN KEY (`um2`) REFERENCES `public_ums` (`um`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_alentregas
DROP TABLE IF EXISTS `public_alentregas`;
CREATE TABLE IF NOT EXISTS `public_alentregas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `iddetcompra` bigint(20) DEFAULT NULL,
  `cant` double DEFAULT NULL,
  `fecha` char(19) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `idkardex` bigint(20) DEFAULT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `final` varchar(1) DEFAULT NULL,
  `estado` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `punit` double NOT NULL,
  `CODOCU` char(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_detcvompas` (`iddetcompra`),
  KEY `fki_oetret` (`idkardex`),
  CONSTRAINT `public_alentregas_ibfk_1` FOREIGN KEY (`idkardex`) REFERENCES `public_alkardex` (`id`),
  CONSTRAINT `public_alentregas_ibfk_2` FOREIGN KEY (`iddetcompra`) REFERENCES `public_docompra` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_alinventario
DROP TABLE IF EXISTS `public_alinventario`;
CREATE TABLE IF NOT EXISTS `public_alinventario` (
  `codalm` varchar(3) NOT NULL,
  `fechainicio` char(19) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechafin` char(19) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `periodocontable` varchar(4) DEFAULT NULL,
  `codresponsable` varchar(4) DEFAULT NULL,
  `codart` varchar(10) DEFAULT NULL,
  `codcen` varchar(4) DEFAULT NULL,
  `cantlibre` double DEFAULT NULL,
  `canttran` double DEFAULT NULL,
  `cantres` double DEFAULT NULL,
  `ubicacion` varchar(12) DEFAULT NULL,
  `lote` varchar(10) DEFAULT NULL,
  `siid` bigint(20) DEFAULT NULL,
  `ssiduser` varchar(30) DEFAULT NULL,
  `punit` double DEFAULT NULL,
  `punitdif` double NOT NULL DEFAULT '0',
  `codmon` varchar(3) DEFAULT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_registroinv` (`codart`,`codalm`,`codcen`),
  KEY `bk_codart` (`codart`),
  KEY `k_centros` (`codcen`),
  KEY `k_almacend` (`codalm`),
  KEY `public_alinventario_ibf55k_2` (`codmon`),
  CONSTRAINT `public_alinventario_ibf55k_2` FOREIGN KEY (`codmon`) REFERENCES `public_monedas` (`codmoneda`),
  CONSTRAINT `public_alinventario_ibfk_1` FOREIGN KEY (`codart`) REFERENCES `public_maestrocomponentes` (`codigo`),
  CONSTRAINT `public_alinventario_ibfk_2` FOREIGN KEY (`codalm`) REFERENCES `public_almacenes` (`codalm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_alkardex
DROP TABLE IF EXISTS `public_alkardex`;
CREATE TABLE IF NOT EXISTS `public_alkardex` (
  `codart` varchar(10) DEFAULT NULL,
  `codmov` varchar(2) DEFAULT NULL,
  `cant` double DEFAULT NULL,
  `alemi` varchar(3) DEFAULT NULL,
  `aldes` varchar(3) DEFAULT NULL,
  `fecha` char(19) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `coddoc` varchar(3) DEFAULT NULL,
  `numdoc` varchar(15) DEFAULT NULL,
  `usuario` varchar(25) DEFAULT NULL,
  `um` varchar(3) DEFAULT NULL,
  `comentario` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `codocuref` varchar(3) DEFAULT NULL,
  `numdocref` varchar(15) DEFAULT NULL,
  `codcentro` varchar(4) DEFAULT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `codestado` varchar(2) DEFAULT NULL,
  `prefijo` varchar(2) DEFAULT NULL,
  `fechadoc` char(19) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `correlativo` varchar(12) DEFAULT NULL,
  `numkardex` varchar(14) DEFAULT NULL,
  `solicitante` varchar(18) DEFAULT NULL,
  `hidvale` bigint(20) DEFAULT NULL,
  `idref` bigint(20) DEFAULT NULL,
  `lote` varchar(10) DEFAULT NULL,
  `valido` varchar(1) DEFAULT NULL,
  `checki` varchar(1) DEFAULT NULL,
  `destino` varchar(20) DEFAULT NULL,
  `preciounit` double DEFAULT NULL,
  `correlativ` bigint(20) DEFAULT NULL,
  `codcendes` varchar(4) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `idusertemp` int(11) DEFAULT NULL,
  `idstatus` int(11) DEFAULT NULL,
  `idtemp` bigint(20) DEFAULT NULL,
  `textolargo` text NOT NULL,
  `colector` varchar(18) NOT NULL,
  `montomovido` double NOT NULL,
  `idotrokardex` bigint(20) NOT NULL,
  `codmoneda` char(3) NOT NULL,
  `saldo` double DEFAULT NULL,
  `umsaldo` char(3) DEFAULT NULL,
  `cantbase` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_movis` (`codmov`),
  KEY `fki_oetoetee` (`hidvale`),
  KEY `fki_codigomat` (`codart`),
  KEY `fki_cemitr` (`codcentro`),
  KEY `fki_docirer` (`codocuref`),
  KEY `fki_deod` (`coddoc`),
  KEY `bk_codcendes` (`codcendes`),
  KEY `um` (`um`),
  KEY `Índice 10` (`alemi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_alkardextraslado
DROP TABLE IF EXISTS `public_alkardextraslado`;
CREATE TABLE IF NOT EXISTS `public_alkardextraslado` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `hidkardexemi` bigint(20) NOT NULL,
  `cant` double NOT NULL,
  `codestado` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `hidkardexdes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hidkardexemi` (`hidkardexemi`),
  CONSTRAINT `public_alkardextraslado_ibfk_1` FOREIGN KEY (`hidkardexemi`) REFERENCES `public_alkardex` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_almacendocs
DROP TABLE IF EXISTS `public_almacendocs`;
CREATE TABLE IF NOT EXISTS `public_almacendocs` (
  `fechavale` date DEFAULT NULL,
  `creadopor` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `modificadopor` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `creadoel` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modificadoel` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codmovimiento` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `numvale` char(12) CHARACTER SET utf8 DEFAULT NULL,
  `codtipovale` char(2) CHARACTER SET utf8 DEFAULT NULL,
  `codtrabajador` char(4) CHARACTER SET utf8 DEFAULT NULL,
  `codalmacen` char(3) CHARACTER SET utf8 DEFAULT NULL,
  `codcentro` char(4) CHARACTER SET utf8 DEFAULT NULL,
  `cestadovale` char(2) CHARACTER SET utf8 DEFAULT NULL,
  `codocu` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `fechacont` date DEFAULT NULL,
  `fechacre` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `numdocref` char(15) CHARACTER SET utf8 DEFAULT NULL,
  `posic` char(3) CHARACTER SET utf8 DEFAULT NULL,
  `codocuref` varchar(3) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `correlativo` bigint(20) DEFAULT NULL,
  `textolargo` text COLLATE utf8_unicode_ci,
  `codaldestino` char(3) CHARACTER SET utf8 DEFAULT NULL,
  `codcendestino` char(4) CHARACTER SET utf8 DEFAULT NULL,
  `codsociedad` char(1) CHARACTER SET utf8 NOT NULL,
  `ceco` varchar(15) CHARACTER SET utf8 NOT NULL,
  `iduser` int(11) NOT NULL,
  `idref` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `codmovimiento` (`codmovimiento`),
  KEY `fk_sdlktrabaja` (`codtrabajador`),
  KEY `codcentro` (`codcentro`),
  KEY `codalmacen` (`codalmacen`),
  KEY `codocu` (`codocu`,`cestadovale`),
  CONSTRAINT `FK_public_almacendocs_public_documentos` FOREIGN KEY (`codocu`) REFERENCES `public_documentos` (`coddocu`),
  CONSTRAINT `public_almacendocs_ibfk_1` FOREIGN KEY (`codmovimiento`) REFERENCES `public_almacenmovimientos` (`codmov`),
  CONSTRAINT `public_almacendocs_ibfk_2` FOREIGN KEY (`codtrabajador`) REFERENCES `public_trabajadores` (`codigotra`),
  CONSTRAINT `public_almacendocs_ibfk_3` FOREIGN KEY (`codcentro`) REFERENCES `public_centros` (`codcen`),
  CONSTRAINT `public_almacendocs_ibfk_4` FOREIGN KEY (`codalmacen`) REFERENCES `public_almacenes` (`codalm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_almacenes
DROP TABLE IF EXISTS `public_almacenes`;
CREATE TABLE IF NOT EXISTS `public_almacenes` (
  `codalm` varchar(3) NOT NULL,
  `nomal` varchar(35) DEFAULT NULL,
  `desalm` longtext,
  `tipo` varchar(2) DEFAULT NULL,
  `codcen` varchar(4) NOT NULL,
  `creadopor` varchar(25) DEFAULT NULL,
  `reposicionsololibre` char(1) DEFAULT NULL,
  `creadoel` varchar(20) DEFAULT NULL,
  `modificadopor` varchar(25) DEFAULT NULL,
  `modificadoel` varchar(20) DEFAULT NULL,
  `codsoc` varchar(1) NOT NULL,
  `tipovaloracion` varchar(2) DEFAULT NULL,
  `estructura` varchar(15) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `hiddirec` int(11) NOT NULL,
  `gestionadespacho` char(1) NOT NULL,
  `verprecios` char(1) NOT NULL,
  `novalorado` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tolstockres` decimal(4,2) DEFAULT NULL,
  `fecharefpronostico` date NOT NULL,
  `codmon` varchar(4) NOT NULL,
  `agregarauto` char(1) NOT NULL,
  `bloqueado` char(1) DEFAULT NULL,
  PRIMARY KEY (`codalm`),
  KEY `FKI_AL_234` (`codcen`),
  KEY `FKI_AL_1234` (`codsoc`),
  KEY `codmon` (`codmon`),
  CONSTRAINT `public_almacenes_ibfk_1` FOREIGN KEY (`codcen`) REFERENCES `public_centros` (`codcen`),
  CONSTRAINT `public_almacenes_ibfk_2` FOREIGN KEY (`codsoc`) REFERENCES `public_sociedades` (`socio`),
  CONSTRAINT `public_almacenes_ibfk_3` FOREIGN KEY (`codmon`) REFERENCES `public_monedas` (`codmoneda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_almacenmovimientos
DROP TABLE IF EXISTS `public_almacenmovimientos`;
CREATE TABLE IF NOT EXISTS `public_almacenmovimientos` (
  `codmov` varchar(2) NOT NULL,
  `movimiento` varchar(35) DEFAULT NULL,
  `signo` int(11) DEFAULT NULL,
  `codigo_objeto` varchar(3) DEFAULT NULL,
  `ingreso` varchar(1) DEFAULT NULL,
  `codocu` varchar(3) DEFAULT NULL,
  `anticodmov` varchar(2) DEFAULT NULL,
  `escontable` char(1) DEFAULT NULL,
  `permcodcondicion` char(1) DEFAULT NULL,
  `permiteparciales` char(1) DEFAULT NULL,
  `campoafectadoinv` varchar(35) DEFAULT NULL,
  `permitereversiones` char(1) DEFAULT NULL,
  `actualizaprecio` char(1) DEFAULT NULL,
  `campodestino` varchar(35) DEFAULT NULL,
  `activo` char(1) DEFAULT NULL,
  `idevento` int(11) NOT NULL,
  `esconsumo` char(1) NOT NULL,
  `itemsdeterministicos` char(1) NOT NULL,
  `borraritems` char(1) NOT NULL,
  `editarcantidad` char(1) NOT NULL,
  `verifconversionmoneda` char(1) NOT NULL,
  `esreal` char(1) DEFAULT NULL COMMENT 'Determina si es una movimientro real o ficticio (auxiliar)',
  PRIMARY KEY (`codmov`),
  KEY `fki_docui` (`codocu`),
  KEY `idevento` (`idevento`),
  CONSTRAINT `public_almacenmovimientos_ibfk_1` FOREIGN KEY (`idevento`) REFERENCES `public_eventos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_almacentransacciones
DROP TABLE IF EXISTS `public_almacentransacciones`;
CREATE TABLE IF NOT EXISTS `public_almacentransacciones` (
  `codal` varchar(3) NOT NULL,
  `codmov` varchar(2) NOT NULL,
  `activo` char(1) DEFAULT NULL,
  PRIMARY KEY (`codal`,`codmov`),
  KEY `FK__public_almacenmovimientos` (`codmov`),
  CONSTRAINT `FK__public_almacenes` FOREIGN KEY (`codal`) REFERENCES `public_almacenes` (`codalm`),
  CONSTRAINT `FK__public_almacenmovimientos` FOREIGN KEY (`codmov`) REFERENCES `public_almacenmovimientos` (`codmov`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_alreserva
DROP TABLE IF EXISTS `public_alreserva`;
CREATE TABLE IF NOT EXISTS `public_alreserva` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `hidesolpe` bigint(20) DEFAULT NULL,
  `estadoreserva` varchar(2) DEFAULT NULL,
  `fechares` char(19) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario` varchar(25) DEFAULT NULL,
  `cant` double DEFAULT NULL,
  `codocu` varchar(3) DEFAULT NULL,
  `numreserva` int(11) NOT NULL,
  `flag` varchar(1) DEFAULT NULL,
  `rex` varchar(100) DEFAULT NULL,
  `atendido` char(19) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `constr_ID` (`hidesolpe`,`codocu`),
  KEY `fki_fk` (`codocu`),
  KEY `fki_eitet` (`codocu`,`estadoreserva`),
  CONSTRAINT `public_alreserva_ibfk_1` FOREIGN KEY (`hidesolpe`) REFERENCES `public_desolpe` (`id`),
  CONSTRAINT `public_alreserva_ibfk_2` FOREIGN KEY (`codocu`, `estadoreserva`) REFERENCES `public_estado` (`codocu`, `codestado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_archivador
DROP TABLE IF EXISTS `public_archivador`;
CREATE TABLE IF NOT EXISTS `public_archivador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codocu` varchar(3) DEFAULT NULL,
  `desarchivo` varchar(40) DEFAULT NULL,
  `obsarchivo` longtext,
  `fechasubida` char(19) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ndescargas` int(11) DEFAULT NULL,
  `autor` varchar(40) DEFAULT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `peso` double DEFAULT NULL,
  `extension` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_documn` (`codocu`),
  CONSTRAINT `public_archivador_ibfk_1` FOREIGN KEY (`codocu`) REFERENCES `public_documentos` (`coddocu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_areas
DROP TABLE IF EXISTS `public_areas`;
CREATE TABLE IF NOT EXISTS `public_areas` (
  `codarea` varchar(3) NOT NULL,
  `codsoc` char(1) NOT NULL,
  `area` varchar(25) DEFAULT NULL,
  `explica` longtext,
  PRIMARY KEY (`codarea`),
  KEY `codsoc` (`codsoc`),
  CONSTRAINT `public_areas_ibfk_1` FOREIGN KEY (`codsoc`) REFERENCES `public_sociedades` (`socio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_atencionconsignaciones
DROP TABLE IF EXISTS `public_atencionconsignaciones`;
CREATE TABLE IF NOT EXISTS `public_atencionconsignaciones` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cant` double DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `hidconsi` bigint(20) DEFAULT NULL,
  UNIQUE KEY `Índice 1` (`id`),
  KEY `FK_public_atencionconsignaciones_public_otconsignacion` (`hidconsi`),
  CONSTRAINT `FK_public_atencionconsignaciones_public_otconsignacion` FOREIGN KEY (`hidconsi`) REFERENCES `public_otconsignacion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='guarada la atencion de las consignaciones';

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_atencionfacturacion
DROP TABLE IF EXISTS `public_atencionfacturacion`;
CREATE TABLE IF NOT EXISTS `public_atencionfacturacion` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cant` double NOT NULL DEFAULT '0',
  `hidatenciones` bigint(20) NOT NULL,
  `hidfacturacion` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_public_atencionfacturacion_public_alentregas` (`hidatenciones`),
  KEY `FK_public_atencionfacturacion_public_detingfactura` (`hidfacturacion`),
  CONSTRAINT `FK_public_atencionfacturacion_public_alentregas` FOREIGN KEY (`hidatenciones`) REFERENCES `public_alentregas` (`id`),
  CONSTRAINT `FK_public_atencionfacturacion_public_detingfactura` FOREIGN KEY (`hidfacturacion`) REFERENCES `public_detingfactura` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_atencionreserva
DROP TABLE IF EXISTS `public_atencionreserva`;
CREATE TABLE IF NOT EXISTS `public_atencionreserva` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cant` double NOT NULL,
  `hidreserva` bigint(20) NOT NULL,
  `hidkardex` bigint(20) NOT NULL,
  `estadoatencion` char(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hidkardex` (`hidkardex`,`hidreserva`),
  KEY `hidreserva` (`hidreserva`),
  CONSTRAINT `public_atencionreserva_ibfk_1` FOREIGN KEY (`hidreserva`) REFERENCES `public_alreserva` (`id`),
  CONSTRAINT `public_atencionreserva_ibfk_2` FOREIGN KEY (`hidkardex`) REFERENCES `public_alkardex` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_bloqueos
DROP TABLE IF EXISTS `public_bloqueos`;
CREATE TABLE IF NOT EXISTS `public_bloqueos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `codocu` char(3) NOT NULL,
  `iduser` int(11) NOT NULL,
  `fechabloqueo` datetime NOT NULL,
  `iddocu` bigint(20) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `idsesion` bigint(10) NOT NULL,
  `url` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `codocu_index` (`codocu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_cajachica
DROP TABLE IF EXISTS `public_cajachica`;
CREATE TABLE IF NOT EXISTS `public_cajachica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hidperiodo` int(11) NOT NULL,
  `fechaini` date NOT NULL,
  `fechafin` date NOT NULL,
  `codtra` varchar(4) NOT NULL,
  `codcen` varchar(4) NOT NULL,
  `iduser` int(11) NOT NULL,
  `descripcion` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `liquidada` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `codocu` char(3) NOT NULL,
  `codestado` char(2) NOT NULL,
  `codarea` varchar(3) NOT NULL,
  `hidfondo` int(11) NOT NULL,
  `valornominal` decimal(10,3) NOT NULL,
  `serie` char(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_canales
DROP TABLE IF EXISTS `public_canales`;
CREATE TABLE IF NOT EXISTS `public_canales` (
  `codcanal` varchar(3) CHARACTER SET utf8 NOT NULL,
  `canal` varchar(40) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`codcanal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_cargainventariofisico
DROP TABLE IF EXISTS `public_cargainventariofisico`;
CREATE TABLE IF NOT EXISTS `public_cargainventariofisico` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `hidpadre` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `iduser` smallint(6) DEFAULT NULL,
  `idinicio` bigint(20) DEFAULT NULL,
  `nregistros` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Índice 2` (`hidpadre`),
  CONSTRAINT `FK_public_cargainventariofisico_public_inventariofisicopadre` FOREIGN KEY (`hidpadre`) REFERENCES `public_inventariofisicopadre` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_cargamasiva
DROP TABLE IF EXISTS `public_cargamasiva`;
CREATE TABLE IF NOT EXISTS `public_cargamasiva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(60) NOT NULL,
  `iduser` int(11) NOT NULL,
  `fechacreac` date NOT NULL,
  `fechaejec` date NOT NULL,
  `insercion` char(1) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `escenario` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_cargamasivadet
DROP TABLE IF EXISTS `public_cargamasivadet`;
CREATE TABLE IF NOT EXISTS `public_cargamasivadet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hidcarga` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `nombrecampo` varchar(60) NOT NULL,
  `esclave` char(1) NOT NULL,
  `aliascampo` varchar(60) NOT NULL,
  `orden` tinyint(4) NOT NULL,
  `activa` char(1) NOT NULL,
  `requerida` char(1) NOT NULL,
  `longitud` int(11) NOT NULL,
  `tipo` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hidcarga` (`hidcarga`),
  CONSTRAINT `public_cargamasivadet_ibfk_1` FOREIGN KEY (`hidcarga`) REFERENCES `public_cargamasiva` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_catvaloracion
DROP TABLE IF EXISTS `public_catvaloracion`;
CREATE TABLE IF NOT EXISTS `public_catvaloracion` (
  `codcatval` varchar(4) NOT NULL,
  `descat` varchar(30) DEFAULT NULL,
  `tipo` char(1) DEFAULT NULL,
  PRIMARY KEY (`codcatval`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_cc
DROP TABLE IF EXISTS `public_cc`;
CREATE TABLE IF NOT EXISTS `public_cc` (
  `codc` varchar(12) NOT NULL,
  `cc` varchar(30) DEFAULT NULL,
  `centro` varchar(4) DEFAULT NULL,
  `desceco` varchar(35) DEFAULT NULL,
  `vale` varchar(1) DEFAULT NULL,
  `validodel` date DEFAULT NULL,
  `validoal` date DEFAULT NULL,
  `explicacion` longtext,
  `clasecolector` char(1) NOT NULL,
  `semaforopresup` char(1) NOT NULL,
  `codgrupo` varchar(4) NOT NULL,
  `codclase` char(2) NOT NULL,
  `correlativo` varchar(6) NOT NULL,
  PRIMARY KEY (`codc`),
  KEY `public_cc_ibfk_1` (`codgrupo`),
  KEY `public_cc_eibfk_2` (`centro`),
  KEY `public_cc_ibfk_3` (`codclase`),
  CONSTRAINT `public_cc_eibfk_2` FOREIGN KEY (`centro`) REFERENCES `public_centros` (`codcen`),
  CONSTRAINT `public_cc_ibfk_1` FOREIGN KEY (`codgrupo`) REFERENCES `public_grupocc` (`codgrupo`),
  CONSTRAINT `public_cc_ibfk_3` FOREIGN KEY (`codclase`) REFERENCES `public_clasecc` (`codclasecolector`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_ccgastos
DROP TABLE IF EXISTS `public_ccgastos`;
CREATE TABLE IF NOT EXISTS `public_ccgastos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ceco` varchar(12) DEFAULT NULL,
  `fechacontable` date DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `codmoneda` varchar(3) DEFAULT NULL,
  `usuario` varchar(25) DEFAULT NULL,
  `idref` bigint(20) DEFAULT NULL,
  `tipo` varchar(1) DEFAULT NULL,
  `ano` char(4) NOT NULL,
  `mes` char(2) NOT NULL,
  `clasecolector` char(1) NOT NULL,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ceco` (`ceco`),
  KEY `public_ctytycgastos_ibfk_1` (`codmoneda`),
  CONSTRAINT `public_ccgastos_ibfk_1` FOREIGN KEY (`ceco`) REFERENCES `public_cc` (`codc`),
  CONSTRAINT `public_ctytycgastos_ibfk_1` FOREIGN KEY (`codmoneda`) REFERENCES `public_monedas` (`codmoneda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_centros
DROP TABLE IF EXISTS `public_centros`;
CREATE TABLE IF NOT EXISTS `public_centros` (
  `codcen` varchar(4) NOT NULL,
  `codsoc` varchar(2) NOT NULL,
  `nomcen` varchar(35) DEFAULT NULL,
  `descricen` longtext,
  PRIMARY KEY (`codcen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_choferes
DROP TABLE IF EXISTS `public_choferes`;
CREATE TABLE IF NOT EXISTS `public_choferes` (
  `nombre` varchar(20) DEFAULT NULL,
  `brevete` varchar(10) NOT NULL,
  `creadopor` varchar(25) DEFAULT NULL,
  `creadoel` varchar(20) DEFAULT NULL,
  `modificadopor` varchar(25) DEFAULT NULL,
  `modificadoel` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`brevete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_clasecc
DROP TABLE IF EXISTS `public_clasecc`;
CREATE TABLE IF NOT EXISTS `public_clasecc` (
  `codclasecolector` char(2) NOT NULL,
  `desclasecolector` varchar(40) NOT NULL,
  `signo` int(11) NOT NULL,
  PRIMARY KEY (`codclasecolector`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_clipro
DROP TABLE IF EXISTS `public_clipro`;
CREATE TABLE IF NOT EXISTS `public_clipro` (
  `codpro` varchar(6) NOT NULL,
  `despro` varchar(100) DEFAULT NULL,
  `rucpro` varchar(11) NOT NULL,
  `telpro` varchar(30) DEFAULT NULL,
  `emailpro` varchar(60) DEFAULT NULL,
  `tipo` varchar(1) DEFAULT NULL,
  `socio` varchar(1) DEFAULT NULL,
  `correlativo` int(11) NOT NULL,
  `prefijo` char(2) NOT NULL,
  `codocu` char(3) NOT NULL,
  `nombrecomercial` varchar(100) NOT NULL,
  `direcciontemp` varchar(60) NOT NULL,
  `codestado` char(2) NOT NULL,
  PRIMARY KEY (`codpro`),
  UNIQUE KEY `rucpro` (`rucpro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_confignoticias
DROP TABLE IF EXISTS `public_confignoticias`;
CREATE TABLE IF NOT EXISTS `public_confignoticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iduseradm` int(11) NOT NULL,
  `column_3` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_contactos
DROP TABLE IF EXISTS `public_contactos`;
CREATE TABLE IF NOT EXISTS `public_contactos` (
  `c_hcod` varchar(6) NOT NULL,
  `c_nombre` varchar(30) NOT NULL,
  `c_cargo` varchar(30) DEFAULT NULL,
  `c_tel` varchar(30) DEFAULT NULL,
  `c_mail` varchar(30) DEFAULT NULL,
  `correlativo` varchar(5) DEFAULT NULL,
  `fecnacimiento` char(19) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `calificacion` varchar(1) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `c_hcod` (`c_hcod`),
  CONSTRAINT `public_contactos_ibfk_1` FOREIGN KEY (`c_hcod`) REFERENCES `public_clipro` (`codpro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_contactosadicio
DROP TABLE IF EXISTS `public_contactosadicio`;
CREATE TABLE IF NOT EXISTS `public_contactosadicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hidcontacto` int(11) NOT NULL,
  `mail` varchar(120) CHARACTER SET utf8 NOT NULL,
  `activo` int(11) NOT NULL,
  `codocu` char(3) CHARACTER SET utf8 NOT NULL,
  `idevento` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `codocu` (`codocu`),
  KEY `public_contYYactosadicio_ibfk_1` (`hidcontacto`),
  CONSTRAINT `public_contYYactosadicio_ibfk_1` FOREIGN KEY (`hidcontacto`) REFERENCES `public_contactos` (`id`),
  CONSTRAINT `public_contactosadicio_ibfk_1` FOREIGN KEY (`codocu`) REFERENCES `public_documentos` (`coddocu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_coordocs
DROP TABLE IF EXISTS `public_coordocs`;
CREATE TABLE IF NOT EXISTS `public_coordocs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `xgeneral` int(5) NOT NULL,
  `ygeneral` int(5) NOT NULL,
  `xlogo` int(5) NOT NULL,
  `ylogo` int(11) NOT NULL,
  `codocu` char(3) NOT NULL,
  `codcen` char(4) NOT NULL,
  `modelo` varchar(40) NOT NULL,
  `nombrereporte` varchar(40) NOT NULL,
  `detalle` text NOT NULL,
  `campofiltro` varchar(30) NOT NULL,
  `tamanopapel` varchar(20) NOT NULL,
  `x_grilla` int(11) NOT NULL,
  `y_grilla` int(11) NOT NULL,
  `registrosporpagina` int(11) NOT NULL,
  `estilo` varchar(25) NOT NULL,
  `tienepie` char(1) NOT NULL,
  `tienelogo` char(1) NOT NULL,
  `sociedad` int(11) NOT NULL,
  `campoestado` varchar(30) NOT NULL,
  `xresumen` int(11) NOT NULL,
  `yresumen` int(11) DEFAULT NULL,
  `campototal` varchar(30) NOT NULL,
  `comercial` char(1) NOT NULL,
  `tienecabecera` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_coordocu` (`codocu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_coordreporte
DROP TABLE IF EXISTS `public_coordreporte`;
CREATE TABLE IF NOT EXISTS `public_coordreporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codocu` varchar(3) NOT NULL,
  `left_` varchar(10) DEFAULT NULL,
  `top` varchar(10) DEFAULT NULL,
  `font_size` varchar(10) DEFAULT '12px',
  `font_family` varchar(11) NOT NULL DEFAULT 'arial',
  `font_weight` varchar(10) DEFAULT NULL,
  `font_color` varchar(11) DEFAULT NULL,
  `nombre_campo` varchar(60) NOT NULL,
  `lbl_left` varchar(10) DEFAULT NULL,
  `lbl_top` varchar(10) DEFAULT NULL,
  `lbl_font_size` varchar(10) DEFAULT '12px',
  `lbl_font_weight` varchar(10) NOT NULL DEFAULT 'bold',
  `lbl_font_family` varchar(35) NOT NULL DEFAULT 'arial',
  `lbl_font_color` varchar(25) NOT NULL DEFAULT '#000',
  `visiblelabel` char(1) NOT NULL DEFAULT '1',
  `visiblecampo` char(1) NOT NULL DEFAULT '1',
  `hidreporte` int(11) NOT NULL,
  `aliascampo` varchar(40) NOT NULL,
  `longitudcampo` int(11) NOT NULL,
  `tipodato` varchar(30) NOT NULL,
  `esdetalle` char(2) NOT NULL,
  `esatributo` char(1) NOT NULL,
  `hidcoordocs` int(11) NOT NULL,
  `totalizable` char(1) NOT NULL,
  `esnumerico` char(1) NOT NULL,
  `adosaren` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `codocu` (`codocu`),
  KEY `fk_coordreport` (`hidreporte`),
  KEY `hidcoordocs` (`hidcoordocs`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_cuentas
DROP TABLE IF EXISTS `public_cuentas`;
CREATE TABLE IF NOT EXISTS `public_cuentas` (
  `codcuenta` varchar(18) CHARACTER SET utf8 NOT NULL,
  `descuenta` varchar(35) CHARACTER SET utf8 NOT NULL,
  `clase` varchar(2) CHARACTER SET utf8 NOT NULL,
  `contrapartida` varchar(18) CHARACTER SET utf8 NOT NULL,
  `grupo` varchar(1) CHARACTER SET utf8 NOT NULL,
  `codigo` varchar(10) CHARACTER SET utf8 NOT NULL,
  `n2` varchar(4) CHARACTER SET utf8 NOT NULL,
  `n3` varchar(4) CHARACTER SET utf8 NOT NULL,
  `registro` char(1) CHARACTER SET utf8 NOT NULL,
  `desclase` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`codcuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_dcajachica
DROP TABLE IF EXISTS `public_dcajachica`;
CREATE TABLE IF NOT EXISTS `public_dcajachica` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `hidcaja` int(11) NOT NULL,
  `hidcargo` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `glosa` varchar(60) NOT NULL,
  `referencia` varchar(60) NOT NULL,
  `debe` decimal(10,2) DEFAULT NULL,
  `haber` decimal(10,2) DEFAULT NULL,
  `monedahaber` char(3) NOT NULL,
  `saldo` decimal(10,2) DEFAULT NULL,
  `codtra` varchar(4) NOT NULL,
  `ceco` varchar(12) NOT NULL,
  `fechacre` datetime NOT NULL,
  `iduser` int(11) NOT NULL,
  `codocu` char(3) NOT NULL,
  `tipoflujo` varchar(3) NOT NULL,
  `codestado` char(2) NOT NULL,
  `coddocu` char(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `monto` decimal(9,4) NOT NULL,
  `tipimputacion` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_departamentos
DROP TABLE IF EXISTS `public_departamentos`;
CREATE TABLE IF NOT EXISTS `public_departamentos` (
  `id` int(11) NOT NULL,
  `coddepa` varchar(2) NOT NULL,
  `departamento` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `coddepa` (`coddepa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_desolcot
DROP TABLE IF EXISTS `public_desolcot`;
CREATE TABLE IF NOT EXISTS `public_desolcot` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `hidsolcot` int(11) NOT NULL,
  `hiddesolpe` bigint(20) NOT NULL,
  `codispo` varchar(3) NOT NULL,
  `cant` double NOT NULL,
  `preciounit` double NOT NULL,
  `indicaciones` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hidsolcot` (`hidsolcot`),
  KEY `hiddesolpe` (`hiddesolpe`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_desolpe
DROP TABLE IF EXISTS `public_desolpe`;
CREATE TABLE IF NOT EXISTS `public_desolpe` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `numero` varchar(10) NOT NULL,
  `tipimputacion` char(1) NOT NULL,
  `centro` varchar(4) NOT NULL,
  `hcodoc` char(3) NOT NULL,
  `idusertemp` int(11) NOT NULL,
  `codal` varchar(3) NOT NULL,
  `codart` varchar(10) NOT NULL,
  `txtmaterial` varchar(40) NOT NULL,
  `grupocompras` varchar(4) NOT NULL,
  `usuario` varchar(35) DEFAULT NULL,
  `textodetalle` text,
  `fechacrea` datetime DEFAULT NULL,
  `fechaent` date DEFAULT NULL,
  `fechalib` datetime DEFAULT NULL,
  `imputacion` varchar(12) DEFAULT NULL,
  `hidsolpe` bigint(20) DEFAULT NULL,
  `codocu` char(3) DEFAULT NULL,
  `tipsolpe` char(1) DEFAULT NULL,
  `est` char(2) DEFAULT NULL,
  `cant` float DEFAULT NULL,
  `item` char(3) DEFAULT NULL,
  `cantaten` float DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  `estadolib` char(1) DEFAULT NULL,
  `solicitanet` varchar(25) DEFAULT NULL,
  `um` char(3) DEFAULT NULL,
  `firme` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `idreserva` bigint(20) NOT NULL,
  `punitplan` double NOT NULL DEFAULT '0',
  `punitreal` double NOT NULL DEFAULT '0',
  `codservicio` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `iduser` int(11) NOT NULL,
  `idtemp` bigint(20) NOT NULL,
  `hidot` bigint(20) NOT NULL,
  `hidlabor` bigint(20) NOT NULL,
  `idstatus` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `codart` (`codart`),
  KEY `k_codal` (`codal`),
  KEY `k_centro` (`centro`),
  KEY `bk_hidesolpe` (`hidsolpe`),
  KEY `fk_Pdfdffd` (`um`),
  KEY `bk_registroinv` (`codart`,`codal`,`centro`),
  KEY `FK_public_desolpe_public_grupocompras` (`grupocompras`),
  KEY `codocu` (`codocu`,`est`),
  CONSTRAINT `FK_public_desolpe_public_desolpe` FOREIGN KEY (`hidsolpe`) REFERENCES `public_solpe` (`id`),
  CONSTRAINT `public_desolpe_ibfk_2` FOREIGN KEY (`codart`) REFERENCES `public_maestrocomponentes` (`codigo`),
  CONSTRAINT `public_desolpe_ibfk_3` FOREIGN KEY (`um`) REFERENCES `public_ums` (`um`),
  CONSTRAINT `public_desolpe_ibfk_4` FOREIGN KEY (`codocu`, `est`) REFERENCES `public_estado` (`codocu`, `codestado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_desolpecompra
DROP TABLE IF EXISTS `public_desolpecompra`;
CREATE TABLE IF NOT EXISTS `public_desolpecompra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iddesolpe` bigint(20) DEFAULT NULL,
  `iddocompra` bigint(20) DEFAULT NULL,
  `cant` double DEFAULT NULL,
  `fecha` char(19) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user` varchar(25) DEFAULT NULL,
  `codestado` char(2) NOT NULL,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `iddesolpe` (`iddesolpe`),
  KEY `iddocompra` (`iddocompra`),
  CONSTRAINT `public_desolpecompra_ibfk_1` FOREIGN KEY (`iddesolpe`) REFERENCES `public_desolpe` (`id`),
  CONSTRAINT `public_desolpecompra_ibfk_2` FOREIGN KEY (`iddocompra`) REFERENCES `public_docompra` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_despacho
DROP TABLE IF EXISTS `public_despacho`;
CREATE TABLE IF NOT EXISTS `public_despacho` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `hidpunto` int(11) NOT NULL,
  `hidkardex` bigint(20) NOT NULL,
  `fechacreac` date NOT NULL,
  `fechaprog` date NOT NULL,
  `descripcion` varchar(60) CHARACTER SET utf8 NOT NULL,
  `responsable` varchar(4) CHARACTER SET utf8 NOT NULL,
  `iduser` int(11) NOT NULL,
  `vigente` char(1) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hidpunto` (`hidpunto`),
  KEY `hidkardex` (`hidkardex`),
  KEY `responsable` (`responsable`),
  CONSTRAINT `public_despacho_ibfk_1` FOREIGN KEY (`hidkardex`) REFERENCES `public_alkardex` (`id`),
  CONSTRAINT `public_despacho_ibfk_2` FOREIGN KEY (`hidpunto`) REFERENCES `public_puntodespacho` (`id`),
  CONSTRAINT `public_despacho_ibfk_3` FOREIGN KEY (`responsable`) REFERENCES `public_trabajadores` (`codigotra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_despachoguia
DROP TABLE IF EXISTS `public_despachoguia`;
CREATE TABLE IF NOT EXISTS `public_despachoguia` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `hidespacho` bigint(20) DEFAULT '0',
  `hiddetgui` bigint(20) DEFAULT NULL,
  `cant` bigint(20) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `iduser` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Índice 2` (`hidespacho`),
  KEY `Índice 3` (`hiddetgui`),
  CONSTRAINT `FK_public_despachoguia_public_despacho` FOREIGN KEY (`hidespacho`) REFERENCES `public_despacho` (`id`),
  CONSTRAINT `FK_public_despachoguia_public_detgui` FOREIGN KEY (`hiddetgui`) REFERENCES `public_detgui` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Controla las cantidades del kardes pedientes vs las cantidades despachadas en aguia';

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_detercuentas
DROP TABLE IF EXISTS `public_detercuentas`;
CREATE TABLE IF NOT EXISTS `public_detercuentas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codcatval` varchar(4) DEFAULT NULL,
  `codop` varchar(3) DEFAULT NULL,
  `cuentadebe` varchar(18) DEFAULT NULL,
  `cuentahaber` varchar(18) DEFAULT NULL,
  `hcodmov` varchar(2) NOT NULL,
  `activo` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `codcatval` (`codcatval`),
  KEY `cuentadebe` (`cuentadebe`),
  KEY `cuentahaber` (`cuentahaber`),
  KEY `codop` (`codop`),
  CONSTRAINT `public_detercuentas_ibfk_1` FOREIGN KEY (`codcatval`) REFERENCES `public_catvaloracion` (`codcatval`),
  CONSTRAINT `public_detercuentas_ibfk_2` FOREIGN KEY (`cuentadebe`) REFERENCES `public_cuentas` (`codcuenta`),
  CONSTRAINT `public_detercuentas_ibfk_3` FOREIGN KEY (`cuentahaber`) REFERENCES `public_cuentas` (`codcuenta`),
  CONSTRAINT `public_detercuentas_ibfk_4` FOREIGN KEY (`codop`) REFERENCES `public_opcontables` (`codop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_detgui
DROP TABLE IF EXISTS `public_detgui`;
CREATE TABLE IF NOT EXISTS `public_detgui` (
  `c_itguia` varchar(3) DEFAULT NULL,
  `n_cangui` double DEFAULT NULL,
  `c_codgui` varchar(8) DEFAULT NULL,
  `c_edgui` varchar(2) DEFAULT NULL,
  `c_descri` varchar(40) DEFAULT NULL,
  `m_obs` longtext,
  `c_um` varchar(3) DEFAULT NULL,
  `c_codep` varchar(3) DEFAULT NULL,
  `ndeenvio` bigint(20) DEFAULT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `l_libre` varchar(1) DEFAULT NULL,
  `n_hconformidad` double DEFAULT NULL,
  `c_estado` varchar(2) DEFAULT NULL,
  `n_libre` int(11) DEFAULT NULL,
  `n_idconformidad` bigint(20) DEFAULT NULL,
  `c_af` varchar(1) DEFAULT NULL,
  `c_codactivo` varchar(13) DEFAULT NULL,
  `c_img` varchar(1) DEFAULT NULL,
  `c_codsap` varchar(5) DEFAULT NULL,
  `docref` varchar(12) DEFAULT NULL,
  `docrefext` varchar(15) DEFAULT NULL,
  `hidref` bigint(20) DEFAULT NULL,
  `codocu` varchar(3) DEFAULT NULL,
  `codlugar` varchar(6) DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  `idtemp` bigint(20) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `n_hguia` bigint(11) NOT NULL,
  `hidespacho` bigint(20) NOT NULL,
  `modo` varchar(1) NOT NULL,
  `codob` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `I_CODSAP` (`c_codsap`),
  KEY `i_pc_estado` (`c_estado`),
  KEY `fki_detgui_paraqueva` (`c_edgui`),
  KEY `I_CDOAF` (`c_codactivo`),
  KEY `i_citguia` (`c_itguia`),
  KEY `n_hguia` (`n_hguia`),
  KEY `hidespacho` (`hidespacho`),
  KEY `codocu` (`codocu`,`c_estado`),
  KEY `c_codep` (`c_codep`),
  KEY `Índice 11` (`codob`),
  CONSTRAINT `public_detgui_ibfk_1` FOREIGN KEY (`n_hguia`) REFERENCES `public_guia` (`id`),
  CONSTRAINT `public_detgui_ibfk_2` FOREIGN KEY (`codocu`, `c_estado`) REFERENCES `public_estado` (`codocu`, `codestado`),
  CONSTRAINT `public_detgui_ibfk_3` FOREIGN KEY (`c_edgui`) REFERENCES `public_paraqueva` (`cmotivo`),
  CONSTRAINT `public_detgui_ibfk_4` FOREIGN KEY (`c_codep`) REFERENCES `public_embarcaciones` (`codep`),
  CONSTRAINT `public_detgui_ibfk_5` FOREIGN KEY (`c_edgui`) REFERENCES `public_paraqueva` (`cmotivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_detingfactura
DROP TABLE IF EXISTS `public_detingfactura`;
CREATE TABLE IF NOT EXISTS `public_detingfactura` (
  `hidfactura` bigint(20) NOT NULL,
  `item` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hidkardex` bigint(20) NOT NULL,
  `cant` double NOT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `fechacrea` datetime NOT NULL,
  `hidalentrega` bigint(20) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `idtemp` bigint(20) NOT NULL,
  `codestado` char(2) NOT NULL,
  `idusertemp` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ingfactf` (`hidfactura`),
  KEY `fk_ingfactfw` (`hidkardex`),
  KEY `public_detingfactura_ibfk_2` (`hidalentrega`),
  CONSTRAINT `public_detingfactura_ibfk_1` FOREIGN KEY (`hidfactura`) REFERENCES `public_ingfactura` (`id`),
  CONSTRAINT `public_detingfactura_ibfk_2` FOREIGN KEY (`hidalentrega`) REFERENCES `public_alentregas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_detot
DROP TABLE IF EXISTS `public_detot`;
CREATE TABLE IF NOT EXISTS `public_detot` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nhoras` int(11) NOT NULL DEFAULT '0',
  `hidorden` bigint(20) NOT NULL,
  `codgrupoplan` varchar(3) NOT NULL,
  `nhombres` int(11) NOT NULL,
  `item` varchar(3) NOT NULL,
  `textoactividad` varchar(40) NOT NULL,
  `codresponsable` varchar(6) NOT NULL,
  `fechainic` date NOT NULL,
  `fechafinprog` date NOT NULL,
  `fechacre` date NOT NULL,
  `flaginterno` varchar(1) NOT NULL,
  `codocu` varchar(3) NOT NULL,
  `codestado` varchar(2) NOT NULL,
  `codmaster` varchar(12) NOT NULL,
  `idinventario` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idusertemp` int(11) NOT NULL,
  `idtemp` bigint(20) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `idaux` bigint(20) DEFAULT NULL,
  `txt` text,
  `tipo` char(1) DEFAULT NULL,
  `cc` varchar(12) DEFAULT NULL,
  `codmon` char(50) DEFAULT NULL,
  `monto` decimal(12,3) DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `fechainiprog` date DEFAULT NULL,
  `avance` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hidorden` (`hidorden`),
  KEY `item` (`item`),
  KEY `codmaster` (`codmaster`),
  KEY `idinventario` (`idinventario`),
  KEY `codresponsable_2` (`codresponsable`),
  KEY `codocu` (`codocu`,`codestado`),
  CONSTRAINT `public_detot_ibfk_1` FOREIGN KEY (`hidorden`) REFERENCES `public_ot` (`id`),
  CONSTRAINT `public_detot_ibfk_2` FOREIGN KEY (`codocu`, `codestado`) REFERENCES `public_estado` (`codocu`, `codestado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_dfactur
DROP TABLE IF EXISTS `public_dfactur`;
CREATE TABLE IF NOT EXISTS `public_dfactur` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `hidfactu` bigint(20) NOT NULL,
  `item` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `codart` varchar(10) NOT NULL,
  `cant` float NOT NULL,
  `punit` float NOT NULL,
  `um` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pventa` float NOT NULL,
  `igv` float NOT NULL,
  `igv_monto` float NOT NULL,
  `igv_tipoafecta` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `igv_codtributo` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `igv_codinternac` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `isc` float NOT NULL,
  `isc_montoitem` float NOT NULL,
  `isc_montolinea` float NOT NULL,
  `isc_codsistema` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `isc_codtributo` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `isc_codinternac` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `valorventa` float NOT NULL,
  `valor_op_no_onerosas` float NOT NULL,
  `descuento` float NOT NULL,
  `idtemp` int(11) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `texto` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `idref` bigint(20) NOT NULL,
  `idusertemp` int(11) NOT NULL,
  `codocu` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `codestado` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hidfactu` (`hidfactu`),
  KEY `hidGfactu` (`hidfactu`),
  KEY `codart` (`codart`),
  KEY `codart_2` (`codart`),
  CONSTRAINT `public_dfactur_ibfk_1` FOREIGN KEY (`hidfactu`) REFERENCES `public_factur` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_direcciones
DROP TABLE IF EXISTS `public_direcciones`;
CREATE TABLE IF NOT EXISTS `public_direcciones` (
  `c_hcod` varchar(6) DEFAULT NULL,
  `c_direc` varchar(100) DEFAULT NULL,
  `l_vale` bit(1) DEFAULT NULL,
  `c_nomlug` varchar(25) DEFAULT NULL,
  `n_valor` int(11) DEFAULT NULL,
  `c_distrito` varchar(40) DEFAULT NULL,
  `c_prov` varchar(40) DEFAULT NULL,
  `c_departam` varchar(40) DEFAULT NULL,
  `n_direc` int(11) NOT NULL AUTO_INCREMENT,
  `socio` varchar(1) DEFAULT NULL,
  `codlugar` varchar(6) DEFAULT NULL,
  `codplanta` varchar(4) DEFAULT NULL,
  `ubigeo` varchar(6) NOT NULL,
  `coddepa` varchar(2) NOT NULL,
  `codprov` varchar(2) NOT NULL,
  `coddist` varchar(2) NOT NULL,
  `codpais` char(3) NOT NULL,
  `cospostal` varchar(3) NOT NULL,
  `esembarque` char(1) NOT NULL,
  `tienereceptor` char(1) NOT NULL,
  PRIMARY KEY (`n_direc`),
  KEY `FKI_CLIPRO_DIRECCIONES` (`c_hcod`),
  KEY `coddepa` (`coddepa`),
  KEY `codprov` (`codprov`),
  KEY `coddist` (`coddist`),
  KEY `c_hcod` (`c_hcod`),
  KEY `coddepa_2` (`coddepa`,`codprov`,`coddist`),
  CONSTRAINT `FK_public_direcciones_public_clipro` FOREIGN KEY (`c_hcod`) REFERENCES `public_clipro` (`codpro`),
  CONSTRAINT `FK_public_direcciones_public_ubigeos` FOREIGN KEY (`coddepa`, `codprov`, `coddist`) REFERENCES `public_ubigeos` (`coddep`, `codprov`, `coddist`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_disponiblidad
DROP TABLE IF EXISTS `public_disponiblidad`;
CREATE TABLE IF NOT EXISTS `public_disponiblidad` (
  `codisp` varchar(2) CHARACTER SET utf8 NOT NULL,
  `dedispo` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`codisp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_distritos
DROP TABLE IF EXISTS `public_distritos`;
CREATE TABLE IF NOT EXISTS `public_distritos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coddist` varchar(2) NOT NULL,
  `distrito` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `coddist` (`coddist`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_dlistamaeriales
DROP TABLE IF EXISTS `public_dlistamaeriales`;
CREATE TABLE IF NOT EXISTS `public_dlistamaeriales` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `hidlista` bigint(20) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `cant` double NOT NULL,
  `um` char(3) NOT NULL,
  `tipsolpe` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hidlista` (`hidlista`),
  KEY `codigo` (`codigo`),
  KEY `bk_euri` (`um`),
  CONSTRAINT `public_dlistamaeriales_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `public_maestrocomponentes` (`codigo`),
  CONSTRAINT `public_dlistamaeriales_ibfk_2` FOREIGN KEY (`hidlista`) REFERENCES `public_listamateriales` (`id`),
  CONSTRAINT `public_dlistamaeriales_ibfk_3` FOREIGN KEY (`um`) REFERENCES `public_ums` (`um`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_dlote
DROP TABLE IF EXISTS `public_dlote`;
CREATE TABLE IF NOT EXISTS `public_dlote` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `hidlote` bigint(20) NOT NULL,
  `cant` double NOT NULL,
  `hidkardex` bigint(20) NOT NULL,
  `stock` varchar(12) DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hidlote_2` (`hidlote`),
  KEY `hidkardex` (`hidkardex`),
  KEY `Índice 4` (`stock`),
  CONSTRAINT `public_dlote_ibfk_1` FOREIGN KEY (`hidlote`) REFERENCES `public_lotes` (`id`),
  CONSTRAINT `public_dlote_ibfk_2` FOREIGN KEY (`hidkardex`) REFERENCES `public_alkardex` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='GUARDA LOS DESPACHOS DEL LOTE AL DETALLE';

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_docompra
DROP TABLE IF EXISTS `public_docompra`;
CREATE TABLE IF NOT EXISTS `public_docompra` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `codart` varchar(8) NOT NULL,
  `disp` varchar(2) NOT NULL,
  `cant` double NOT NULL,
  `punit` double NOT NULL,
  `item` varchar(3) NOT NULL,
  `descri` varchar(40) NOT NULL,
  `stock` double DEFAULT NULL,
  `detalle` longtext,
  `tipoitem` varchar(1) NOT NULL,
  `estadodetalle` varchar(2) NOT NULL,
  `coddocu` varchar(3) NOT NULL,
  `um` varchar(3) NOT NULL,
  `hidguia` int(11) NOT NULL,
  `codservicio` varchar(6) DEFAULT NULL,
  `tipoimputacion` varchar(1) DEFAULT NULL,
  `ceco` varchar(12) DEFAULT NULL,
  `orden` varchar(12) DEFAULT NULL,
  `codentro` varchar(4) DEFAULT NULL,
  `codigoalma` varchar(3) DEFAULT NULL,
  `punitdes` double DEFAULT NULL,
  `iddesolpe` bigint(20) DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  `idtemp` bigint(20) NOT NULL,
  `idusertemp` int(11) NOT NULL,
  `idstatus` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_centrterot` (`codentro`),
  KEY `fki_fK-ocapmra` (`hidguia`),
  KEY `fki_maestrocompotrn e` (`codart`),
  KEY `coddocu` (`coddocu`,`estadodetalle`),
  KEY `fki_oeteoyjeyet` (`codart`,`codigoalma`,`codentro`),
  KEY `fki_almandetete` (`codigoalma`),
  KEY `fk_docompra_docu` (`coddocu`),
  KEY `fk_56565entregas` (`um`),
  KEY `codigoalma` (`codigoalma`),
  CONSTRAINT `public_docompra_ibfk_3` FOREIGN KEY (`codart`) REFERENCES `public_maestrocomponentes` (`codigo`),
  CONSTRAINT `public_docompra_ibfk_4` FOREIGN KEY (`coddocu`, `estadodetalle`) REFERENCES `public_estado` (`codocu`, `codestado`),
  CONSTRAINT `public_docompra_ibfk_5` FOREIGN KEY (`hidguia`) REFERENCES `public_ocompra` (`idguia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_docompratemp
DROP TABLE IF EXISTS `public_docompratemp`;
CREATE TABLE IF NOT EXISTS `public_docompratemp` (
  `idtemp` bigint(20) NOT NULL AUTO_INCREMENT,
  `codart` varchar(8) NOT NULL,
  `disp` varchar(2) NOT NULL,
  `cant` double NOT NULL,
  `punit` double NOT NULL,
  `item` varchar(3) NOT NULL,
  `descri` varchar(40) NOT NULL,
  `stock` double DEFAULT NULL,
  `detalle` longtext,
  `tipoitem` varchar(1) NOT NULL,
  `estadodetalle` varchar(2) NOT NULL,
  `coddocu` varchar(3) NOT NULL,
  `um` varchar(3) NOT NULL,
  `hidguia` int(11) DEFAULT NULL,
  `codservicio` varchar(6) DEFAULT NULL,
  `tipoimputacion` varchar(1) DEFAULT NULL,
  `ceco` varchar(12) DEFAULT NULL,
  `orden` varchar(12) DEFAULT NULL,
  `codentro` varchar(4) DEFAULT NULL,
  `codigoalma` varchar(3) DEFAULT NULL,
  `punitdes` double DEFAULT NULL,
  `iddesolpe` bigint(20) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `idusertemp` int(11) DEFAULT NULL,
  `idstatus` int(11) DEFAULT NULL,
  `id` int(20) DEFAULT NULL,
  PRIMARY KEY (`idtemp`),
  KEY `codart` (`codart`),
  KEY `estadodetalle` (`estadodetalle`),
  KEY `coddocu` (`coddocu`),
  KEY `um` (`um`),
  KEY `hidguia` (`hidguia`),
  KEY `codentro` (`codentro`),
  KEY `codigoalma` (`codigoalma`),
  KEY `codart_2` (`codart`,`codigoalma`,`codentro`),
  KEY `coddocu_2` (`coddocu`,`estadodetalle`),
  CONSTRAINT `public_docompratemp_ibfk_1` FOREIGN KEY (`hidguia`) REFERENCES `public_ocompra` (`idguia`),
  CONSTRAINT `public_docompratemp_ibfk_2` FOREIGN KEY (`um`) REFERENCES `public_ums` (`um`),
  CONSTRAINT `public_docompratemp_ibfk_4` FOREIGN KEY (`coddocu`, `estadodetalle`) REFERENCES `public_estado` (`codocu`, `codestado`),
  CONSTRAINT `public_docompratemp_ibfk_5` FOREIGN KEY (`codart`) REFERENCES `public_maestrocomponentes` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_documentos
DROP TABLE IF EXISTS `public_documentos`;
CREATE TABLE IF NOT EXISTS `public_documentos` (
  `coddocu` varchar(3) CHARACTER SET utf8 NOT NULL,
  `desdocu` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `clase` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  `tipo` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `creadopor` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `creadoel` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `modificadopor` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `modificadoel` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `coddocupadre` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `tabla` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `anuladesde` int(11) DEFAULT NULL,
  `cactivo` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  `abreviatura` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `prefijo` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `x_report` int(11) NOT NULL,
  `y_report` int(11) NOT NULL,
  `comprobante` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `idreportedefault` int(11) NOT NULL,
  PRIMARY KEY (`coddocu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_dpeticion
DROP TABLE IF EXISTS `public_dpeticion`;
CREATE TABLE IF NOT EXISTS `public_dpeticion` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `hidpeticion` bigint(20) NOT NULL,
  `um` char(3) NOT NULL,
  `codart` varchar(10) NOT NULL,
  `punit` double NOT NULL,
  `plista` float NOT NULL,
  `igv_monto` float NOT NULL,
  `descuento` float NOT NULL,
  `pventa` float NOT NULL,
  `cant` double NOT NULL,
  `comentario` text NOT NULL,
  `codestado` char(2) NOT NULL,
  `codcen` varchar(4) NOT NULL,
  `codal` varchar(3) NOT NULL,
  `codocu` char(3) NOT NULL,
  `iduser` int(11) NOT NULL,
  `disponibilidad` varchar(2) NOT NULL,
  `idtemp` bigint(20) NOT NULL,
  `item` char(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `idusertemp` int(11) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `idstatus` int(1) NOT NULL,
  `tipo` char(1) NOT NULL,
  `imputacion` varchar(12) NOT NULL,
  `idparent` varchar(3) NOT NULL,
  `codservicio` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ux_file_custom` (`id`,`codocu`),
  KEY `hidpeticion` (`hidpeticion`),
  KEY `um` (`um`),
  KEY `codart` (`codart`),
  KEY `codestado` (`codestado`),
  KEY `codcen` (`codcen`),
  KEY `codocu` (`codocu`),
  KEY `codal` (`codal`),
  KEY `codservicio` (`codservicio`),
  KEY `disponibilidad` (`disponibilidad`),
  KEY `imputacion` (`imputacion`),
  CONSTRAINT `public_dpeticion_ibfk_11` FOREIGN KEY (`codestado`) REFERENCES `public_estado` (`codestado`),
  CONSTRAINT `public_dpeticion_ibfk_12` FOREIGN KEY (`codocu`) REFERENCES `public_documentos` (`coddocu`),
  CONSTRAINT `public_dpeticion_ibfk_13` FOREIGN KEY (`imputacion`) REFERENCES `public_cc` (`codc`),
  CONSTRAINT `public_dpeticion_ibfk_14` FOREIGN KEY (`hidpeticion`) REFERENCES `public_peticion` (`id`),
  CONSTRAINT `public_dpeticion_ibfk_2` FOREIGN KEY (`um`) REFERENCES `public_ums` (`um`),
  CONSTRAINT `public_dpeticion_ibfk_4` FOREIGN KEY (`codart`) REFERENCES `public_maestrocomponentes` (`codigo`),
  CONSTRAINT `public_dpeticion_ibfk_5` FOREIGN KEY (`codcen`) REFERENCES `public_centros` (`codcen`),
  CONSTRAINT `public_dpeticion_ibfk_6` FOREIGN KEY (`codal`) REFERENCES `public_almacenes` (`codalm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_embarcaciones
DROP TABLE IF EXISTS `public_embarcaciones`;
CREATE TABLE IF NOT EXISTS `public_embarcaciones` (
  `codep` varchar(3) CHARACTER SET utf8 NOT NULL,
  `nomep` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `matricula` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `cbodega` int(11) DEFAULT NULL,
  `activa` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  `codsap` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`codep`),
  KEY `i_c_codepw` (`codep`),
  KEY `IK_BARCOS` (`codep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_estado
DROP TABLE IF EXISTS `public_estado`;
CREATE TABLE IF NOT EXISTS `public_estado` (
  `codestado` char(2) NOT NULL,
  `codocu` char(3) NOT NULL,
  `estado` varchar(25) DEFAULT NULL,
  `ordenn` smallint(6) DEFAULT NULL,
  `eseditable` int(11) DEFAULT NULL,
  `esanulable` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nocalculable` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Índice 4` (`codocu`,`codestado`),
  KEY `i_pc_estado1` (`codocu`),
  KEY `i_codestado` (`codestado`),
  CONSTRAINT `public_estado_ibfk_1` FOREIGN KEY (`codocu`) REFERENCES `public_documentos` (`coddocu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_eventos
DROP TABLE IF EXISTS `public_eventos`;
CREATE TABLE IF NOT EXISTS `public_eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codocu` varchar(3) DEFAULT NULL,
  `estadofinal` varchar(2) DEFAULT NULL,
  `estadoinicial` varchar(2) DEFAULT NULL,
  `descripcion` varchar(30) DEFAULT NULL,
  `creadopor` varchar(20) DEFAULT NULL,
  `creadoel` varchar(15) DEFAULT NULL,
  `titulomsg1` varchar(40) DEFAULT NULL,
  `titulomsg2` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_docioure` (`codocu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_factur
DROP TABLE IF EXISTS `public_factur`;
CREATE TABLE IF NOT EXISTS `public_factur` (
  `numero` varchar(13) CHARACTER SET utf8 DEFAULT NULL,
  `codpro` varchar(6) CHARACTER SET utf8 DEFAULT NULL,
  `codproadqui` varchar(6) CHARACTER SET utf8 NOT NULL,
  `fechaemision` date NOT NULL,
  `versionubl` varchar(10) CHARACTER SET utf8 NOT NULL,
  `versionestruc` varchar(10) CHARACTER SET utf8 NOT NULL,
  `fechaconsumo` date NOT NULL,
  `codestado` varchar(2) CHARACTER SET utf8 NOT NULL,
  `texto` varchar(40) CHARACTER SET utf8 NOT NULL,
  `textolargo` longtext CHARACTER SET utf8,
  `tipodocumento` varchar(2) CHARACTER SET utf8 NOT NULL,
  `moneda` char(3) CHARACTER SET utf8 NOT NULL,
  `orcli` varchar(12) CHARACTER SET utf8 DEFAULT NULL,
  `descuento` smallint(6) DEFAULT NULL,
  `coddocu` varchar(3) CHARACTER SET utf8 NOT NULL,
  `codtipofac` varchar(2) CHARACTER SET utf8 NOT NULL,
  `codsociedad` varchar(1) CHARACTER SET utf8 NOT NULL,
  `codgrupoventas` varchar(3) CHARACTER SET utf8 NOT NULL,
  `ordenventa` varchar(13) CHARACTER SET utf8 NOT NULL,
  `codcentro` varchar(4) CHARACTER SET utf8 NOT NULL,
  `codobjeto` varchar(3) CHARACTER SET utf8 NOT NULL,
  `fechapresentacion` date DEFAULT NULL,
  `fechanominal` date DEFAULT NULL,
  `fechacancelacion` date DEFAULT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tenorsup` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  `tenorinf` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  `numerocheque` varchar(24) CHARACTER SET utf8 DEFAULT NULL,
  `firmadigital` text CHARACTER SET utf8 NOT NULL,
  `tipodocadqui` varchar(2) CHARACTER SET utf8 NOT NULL,
  `codleyenda` varchar(4) CHARACTER SET utf8 NOT NULL,
  `codal` varchar(3) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `codproadqui` (`codproadqui`),
  KEY `codpro` (`codpro`),
  KEY `codproadqui_2` (`codproadqui`),
  KEY `codal` (`codal`),
  KEY `codobjeto` (`codobjeto`),
  KEY `coddocu` (`coddocu`),
  KEY `codtipofac` (`codtipofac`),
  KEY `codgrupoventas` (`codgrupoventas`),
  KEY `codcentro` (`codcentro`),
  KEY `codal_2` (`codal`),
  KEY `moneda` (`moneda`),
  KEY `moneda_2` (`moneda`),
  CONSTRAINT `public_factur_ibfk_1` FOREIGN KEY (`codpro`) REFERENCES `public_clipro` (`codpro`),
  CONSTRAINT `public_factur_ibfk_10` FOREIGN KEY (`codal`) REFERENCES `public_almacenes` (`codalm`),
  CONSTRAINT `public_factur_ibfk_11` FOREIGN KEY (`moneda`) REFERENCES `public_monedas` (`codmoneda`),
  CONSTRAINT `public_factur_ibfk_2` FOREIGN KEY (`codproadqui`) REFERENCES `public_clipro` (`codpro`),
  CONSTRAINT `public_factur_ibfk_5` FOREIGN KEY (`coddocu`) REFERENCES `public_documentos` (`coddocu`),
  CONSTRAINT `public_factur_ibfk_6` FOREIGN KEY (`codtipofac`) REFERENCES `public_tipofacturacion` (`codtipofac`),
  CONSTRAINT `public_factur_ibfk_8` FOREIGN KEY (`codgrupoventas`) REFERENCES `public_grupoventas` (`codgrupo`),
  CONSTRAINT `public_factur_ibfk_9` FOREIGN KEY (`codcentro`) REFERENCES `public_centros` (`codcen`),
  CONSTRAINT `public_fagfgctur_ibfk_2` FOREIGN KEY (`codpro`) REFERENCES `public_clipro` (`codpro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_fondofijo
DROP TABLE IF EXISTS `public_fondofijo`;
CREATE TABLE IF NOT EXISTS `public_fondofijo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desfondo` varchar(60) NOT NULL,
  `codtra` varchar(4) NOT NULL,
  `codcen` varchar(4) NOT NULL,
  `iduser` int(11) NOT NULL,
  `fondo` decimal(10,2) DEFAULT NULL,
  `codmon` varchar(3) NOT NULL,
  `numerodias` int(11) NOT NULL,
  `socio` char(1) NOT NULL,
  `gastomax` decimal(10,2) DEFAULT NULL,
  `rojo` decimal(10,2) DEFAULT NULL,
  `naranja` decimal(10,2) DEFAULT NULL,
  `azul` decimal(10,2) DEFAULT NULL,
  `codarea` varchar(3) DEFAULT NULL,
  `ejercicio` varchar(4) NOT NULL,
  `porctolerancia` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `codtra` (`codtra`),
  KEY `codcen` (`codcen`),
  KEY `codmon` (`codmon`),
  KEY `codarea` (`codarea`),
  KEY `socio` (`socio`),
  CONSTRAINT `public_fondofijo_ibfk_1` FOREIGN KEY (`codtra`) REFERENCES `public_trabajadores` (`codigotra`),
  CONSTRAINT `public_fondofijo_ibfk_2` FOREIGN KEY (`codcen`) REFERENCES `public_centros` (`codcen`),
  CONSTRAINT `public_fondofijo_ibfk_3` FOREIGN KEY (`codmon`) REFERENCES `public_monedas` (`codmoneda`),
  CONSTRAINT `public_fondofijo_ibfk_4` FOREIGN KEY (`codarea`) REFERENCES `public_areas` (`codarea`),
  CONSTRAINT `public_fondofijo_ibfk_5` FOREIGN KEY (`socio`) REFERENCES `public_sociedades` (`socio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_grupocc
DROP TABLE IF EXISTS `public_grupocc`;
CREATE TABLE IF NOT EXISTS `public_grupocc` (
  `codgrupo` varchar(4) NOT NULL,
  `desgrupo` varchar(40) NOT NULL,
  `clasegrupo` char(1) NOT NULL,
  `codclase` char(2) NOT NULL,
  PRIMARY KEY (`codgrupo`),
  KEY `codclase` (`codclase`),
  CONSTRAINT `public_grupocc_ibfk_1` FOREIGN KEY (`codclase`) REFERENCES `public_clasecc` (`codclasecolector`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_grupocompras
DROP TABLE IF EXISTS `public_grupocompras`;
CREATE TABLE IF NOT EXISTS `public_grupocompras` (
  `codgrupo` varchar(4) NOT NULL,
  `codalm` varchar(3) DEFAULT NULL,
  `nomgru` varchar(20) DEFAULT NULL,
  `desgru` longtext,
  `codsociedad` varchar(1) NOT NULL,
  PRIMARY KEY (`codgrupo`),
  KEY `codsociedad` (`codsociedad`),
  CONSTRAINT `public_grupocompras_ibfk_1` FOREIGN KEY (`codsociedad`) REFERENCES `public_sociedades` (`socio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_grupoplan
DROP TABLE IF EXISTS `public_grupoplan`;
CREATE TABLE IF NOT EXISTS `public_grupoplan` (
  `codgrupo` varchar(3) NOT NULL,
  `desgrupo` varchar(45) DEFAULT NULL,
  `codcen` varchar(4) DEFAULT NULL,
  `tarifa` decimal(10,2) DEFAULT NULL,
  `codmon` char(3) DEFAULT NULL,
  `interno` char(1) DEFAULT NULL,
  PRIMARY KEY (`codgrupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_grupoventas
DROP TABLE IF EXISTS `public_grupoventas`;
CREATE TABLE IF NOT EXISTS `public_grupoventas` (
  `codgrupo` varchar(3) NOT NULL,
  `codalm` varchar(3) DEFAULT NULL,
  `nomgru` varchar(20) DEFAULT NULL,
  `desgru` longtext,
  `codsociedad` varchar(1) NOT NULL,
  PRIMARY KEY (`codgrupo`),
  KEY `codalm` (`codalm`),
  KEY `codsociedad` (`codsociedad`),
  CONSTRAINT `public_grupoventas_ibfk_1` FOREIGN KEY (`codalm`) REFERENCES `public_almacenes` (`codalm`),
  CONSTRAINT `public_grupoventas_ibfk_2` FOREIGN KEY (`codsociedad`) REFERENCES `public_sociedades` (`socio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_guia
DROP TABLE IF EXISTS `public_guia`;
CREATE TABLE IF NOT EXISTS `public_guia` (
  `c_numgui` varchar(8) DEFAULT NULL,
  `c_coclig` varchar(6) DEFAULT NULL,
  `d_fecgui` char(19) DEFAULT NULL,
  `c_estgui` varchar(2) DEFAULT NULL,
  `c_rsguia` varchar(1) DEFAULT NULL,
  `c_codtra` varchar(6) DEFAULT NULL,
  `c_trans` varchar(20) DEFAULT NULL,
  `c_motivo` varchar(3) DEFAULT NULL,
  `c_placa` varchar(15) DEFAULT NULL,
  `c_licon` varchar(10) DEFAULT NULL,
  `d_fectra` char(19) DEFAULT NULL,
  `c_desgui` longtext,
  `n_direc` int(11) DEFAULT NULL,
  `c_texto` longtext,
  `c_dirsoc` varchar(1) DEFAULT NULL,
  `c_serie` varchar(3) DEFAULT NULL,
  `n_direcformaldes` int(11) DEFAULT NULL,
  `n_directran` int(11) DEFAULT NULL,
  `n_guia` bigint(20) NOT NULL,
  `c_estado` varchar(1) DEFAULT NULL,
  `n_dirsoc` int(11) DEFAULT NULL,
  `c_modificado` varchar(40) DEFAULT NULL,
  `n_agencia` int(11) DEFAULT NULL,
  `codcentro` varchar(3) DEFAULT NULL,
  `codobjeto` varchar(3) DEFAULT NULL,
  `d_fecentrega` char(19) DEFAULT NULL,
  `c_salida` varchar(1) DEFAULT NULL,
  `codocu` varchar(3) DEFAULT NULL,
  `cod_cen` varchar(4) DEFAULT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `codocuaux` varchar(3) DEFAULT NULL,
  `iddocuaux` bigint(20) DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  `idreporte` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_guia_socio` (`c_rsguia`),
  KEY `FKI_HHJ` (`c_coclig`),
  KEY `i_codobjeto` (`codobjeto`),
  KEY `i_coestgui` (`c_estgui`),
  KEY `FKI_DIRECCIONES` (`n_direc`),
  KEY `i_n_directran` (`n_directran`),
  KEY `fki_guia_objetos` (`c_coclig`,`codobjeto`),
  KEY `i_c_serie` (`c_serie`),
  KEY `i_crsguia` (`c_rsguia`),
  KEY `i_n_hguias` (`n_guia`),
  KEY `FKI_GUIA_DIREC_DEST` (`n_direcformaldes`),
  KEY `FKI_GUIA_ESTADO` (`c_estgui`,`codocu`),
  KEY `fki_trans` (`c_codtra`),
  KEY `i_c_seriea` (`c_numgui`),
  KEY `i_n_direcformaldes` (`n_direcformaldes`),
  KEY `i_n_direc` (`n_direc`),
  KEY `FKI_GUIA_DIRECC_TRANSP` (`n_directran`),
  KEY `i_ndirsoc` (`n_dirsoc`),
  KEY `i_c_codtra` (`c_codtra`),
  KEY `i_c_coclig` (`c_coclig`),
  KEY `FKI_CLIPRO_GUIA_TRANSPORT` (`c_codtra`),
  KEY `codcentro` (`codcentro`),
  KEY `c_motivo` (`c_motivo`),
  KEY `codocu` (`codocu`),
  CONSTRAINT `public_guia_ibfk_1` FOREIGN KEY (`codcentro`) REFERENCES `public_centros` (`codcen`),
  CONSTRAINT `public_guia_ibfk_10` FOREIGN KEY (`n_dirsoc`) REFERENCES `public_direcciones` (`n_direc`),
  CONSTRAINT `public_guia_ibfk_11` FOREIGN KEY (`codocu`) REFERENCES `public_documentos` (`coddocu`),
  CONSTRAINT `public_guia_ibfk_2` FOREIGN KEY (`c_coclig`) REFERENCES `public_clipro` (`codpro`),
  CONSTRAINT `public_guia_ibfk_3` FOREIGN KEY (`c_estgui`) REFERENCES `public_estado` (`codestado`),
  CONSTRAINT `public_guia_ibfk_4` FOREIGN KEY (`c_rsguia`) REFERENCES `public_sociedades` (`socio`),
  CONSTRAINT `public_guia_ibfk_5` FOREIGN KEY (`c_codtra`) REFERENCES `public_clipro` (`codpro`),
  CONSTRAINT `public_guia_ibfk_6` FOREIGN KEY (`c_motivo`) REFERENCES `public_motivo` (`codmotivo`),
  CONSTRAINT `public_guia_ibfk_7` FOREIGN KEY (`n_direc`) REFERENCES `public_direcciones` (`n_direc`),
  CONSTRAINT `public_guia_ibfk_8` FOREIGN KEY (`n_direcformaldes`) REFERENCES `public_direcciones` (`n_direc`),
  CONSTRAINT `public_guia_ibfk_9` FOREIGN KEY (`n_directran`) REFERENCES `public_direcciones` (`n_direc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_impuestos
DROP TABLE IF EXISTS `public_impuestos`;
CREATE TABLE IF NOT EXISTS `public_impuestos` (
  `codimpuesto` varchar(3) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `abreviatura` varchar(8) NOT NULL,
  `codsunat` varchar(4) NOT NULL,
  `codune` varchar(3) NOT NULL,
  PRIMARY KEY (`codimpuesto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_impuestosaplicados
DROP TABLE IF EXISTS `public_impuestosaplicados`;
CREATE TABLE IF NOT EXISTS `public_impuestosaplicados` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `hidocu` bigint(20) NOT NULL,
  `codocu` char(3) NOT NULL,
  `codimpuesto` varchar(3) NOT NULL,
  `valor` decimal(10,4) NOT NULL,
  `hidocupadre` bigint(20) NOT NULL,
  `codmon` varchar(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `codocu` (`codocu`),
  KEY `hidocu` (`hidocu`),
  KEY `FK_SSF4` (`hidocu`,`codocu`),
  KEY `codimpuesto` (`codimpuesto`),
  KEY `codmon` (`codmon`),
  CONSTRAINT `public_impuestosaplicados_ibfk_1` FOREIGN KEY (`codocu`) REFERENCES `public_documentos` (`coddocu`),
  CONSTRAINT `public_impuestosaplicados_ibfk_2` FOREIGN KEY (`codimpuesto`) REFERENCES `public_impuestos` (`codimpuesto`),
  CONSTRAINT `public_impuestosaplicados_ibfk_3` FOREIGN KEY (`codmon`) REFERENCES `public_monedas` (`codmoneda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_impuestosdocu
DROP TABLE IF EXISTS `public_impuestosdocu`;
CREATE TABLE IF NOT EXISTS `public_impuestosdocu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codocu` varchar(3) CHARACTER SET utf8 NOT NULL,
  `codimpuesto` varchar(3) CHARACTER SET utf8 NOT NULL,
  `obligatorio` char(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `codocu` (`codocu`),
  KEY `codimpuesto` (`codimpuesto`),
  CONSTRAINT `public_impuestosdocu_ibfk_1` FOREIGN KEY (`codocu`) REFERENCES `public_documentos` (`coddocu`),
  CONSTRAINT `public_impuestosdocu_ibfk_2` FOREIGN KEY (`codimpuesto`) REFERENCES `public_impuestos` (`codimpuesto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_impuestosdocuaplicado
DROP TABLE IF EXISTS `public_impuestosdocuaplicado`;
CREATE TABLE IF NOT EXISTS `public_impuestosdocuaplicado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iddocu` bigint(20) NOT NULL,
  `codocu` char(3) CHARACTER SET utf8 NOT NULL,
  `codimpuesto` char(3) CHARACTER SET utf8 NOT NULL,
  `valorimpuesto` double NOT NULL,
  `iduser` int(11) NOT NULL,
  `idusertemp` int(11) NOT NULL,
  `idstatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `codocu` (`codocu`),
  KEY `FK_IMPUESTCOD` (`codimpuesto`),
  CONSTRAINT `public_impuestosdocuaplicado_ibfk_1` FOREIGN KEY (`codocu`) REFERENCES `public_documentos` (`coddocu`),
  CONSTRAINT `public_impuestosdocuaplicado_ibfk_2` FOREIGN KEY (`codimpuesto`) REFERENCES `public_impuestos` (`codimpuesto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_ingfactura
DROP TABLE IF EXISTS `public_ingfactura`;
CREATE TABLE IF NOT EXISTS `public_ingfactura` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `codpro` varchar(8) CHARACTER SET utf8 NOT NULL,
  `fecha` date NOT NULL,
  `fechadoc` date NOT NULL,
  `numerodoc` varchar(13) CHARACTER SET utf8 NOT NULL,
  `seriedoc` varchar(5) CHARACTER SET utf8 NOT NULL,
  `numrecepcion` varchar(10) CHARACTER SET utf8 NOT NULL,
  `descripcion` varchar(40) CHARACTER SET utf8 NOT NULL,
  `iduser` int(11) NOT NULL,
  `fechacrea` datetime DEFAULT NULL,
  `codcentro` varchar(4) CHARACTER SET utf8 NOT NULL,
  `numocompra` varchar(12) CHARACTER SET utf8 NOT NULL,
  `idgarita` bigint(20) NOT NULL,
  `codocu` varchar(3) CHARACTER SET utf8 NOT NULL,
  `codestado` varchar(2) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `codpro` (`codpro`),
  KEY `numocompra` (`numocompra`),
  KEY `idgarita` (`idgarita`),
  KEY `codcentro` (`codcentro`),
  KEY `codocu` (`codocu`,`codestado`),
  CONSTRAINT `public_ingfactura_ibfk_2` FOREIGN KEY (`numocompra`) REFERENCES `public_ocompra` (`numcot`),
  CONSTRAINT `public_ingfactura_ibfk_3` FOREIGN KEY (`codcentro`) REFERENCES `public_centros` (`codcen`),
  CONSTRAINT `public_ingfactura_ibfk_4` FOREIGN KEY (`codocu`, `codestado`) REFERENCES `public_estado` (`codocu`, `codestado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_inventario
DROP TABLE IF EXISTS `public_inventario`;
CREATE TABLE IF NOT EXISTS `public_inventario` (
  `codigo` varchar(6) DEFAULT NULL,
  `c_estado` varchar(1) DEFAULT NULL,
  `codep` varchar(3) DEFAULT NULL,
  `comentario` longtext,
  `fecha` char(19) DEFAULT NULL,
  `coddocu` varchar(3) DEFAULT NULL,
  `codlugar` varchar(6) DEFAULT NULL,
  `codigosap` varchar(6) DEFAULT NULL,
  `codigoaf` varchar(14) DEFAULT NULL,
  `descripcion` varchar(40) DEFAULT NULL,
  `marca` varchar(15) DEFAULT NULL,
  `modelo` varchar(25) DEFAULT NULL,
  `serie` varchar(20) DEFAULT NULL,
  `clasefoto` varchar(30) DEFAULT NULL,
  `codigopadre` varchar(5) DEFAULT NULL,
  `numerodocumento` varchar(20) DEFAULT NULL,
  `adicional` varchar(15) DEFAULT NULL,
  `codigoafant` varchar(10) DEFAULT NULL,
  `posicion` varchar(6) DEFAULT NULL,
  `codcentro` varchar(4) DEFAULT NULL,
  `codcentrooriginal` varchar(4) DEFAULT NULL,
  `codeporiginal` varchar(3) DEFAULT NULL,
  `rocoto` varchar(1) DEFAULT NULL,
  `codepanterior` varchar(3) DEFAULT NULL,
  `codcentroanterior` varchar(4) DEFAULT NULL,
  `clase` varchar(4) DEFAULT NULL,
  `baja` varchar(1) DEFAULT NULL,
  `n_direc` bigint(20) DEFAULT NULL,
  `ubicacion` varchar(45) DEFAULT NULL,
  `tipo` varchar(2) DEFAULT NULL,
  `codestado` varchar(2) DEFAULT NULL,
  `tienecarter` varchar(1) DEFAULT NULL,
  `codarea` varchar(3) DEFAULT NULL,
  `iddocu` bigint(20) DEFAULT NULL,
  `codigodoc` varchar(3) DEFAULT NULL,
  `portransporte` varchar(1) DEFAULT NULL,
  `historial` int(11) DEFAULT NULL,
  `hidpadre` int(11) DEFAULT NULL,
  `codpropietario` varchar(4) NOT NULL,
  `idinventario` bigint(20) NOT NULL AUTO_INCREMENT,
  `codmaster` varchar(10) NOT NULL,
  `flagdesarmado` char(1) NOT NULL,
  PRIMARY KEY (`idinventario`),
  KEY `fki_PK_CODLUGAR` (`codlugar`),
  KEY `fki_estad` (`codestado`,`codigodoc`),
  KEY `fki_dlssfslkflsf` (`codlugar`),
  KEY `codpropietario` (`codpropietario`),
  KEY `coddocu` (`coddocu`),
  KEY `codep` (`codep`),
  KEY `tipo` (`tipo`),
  KEY `coddocu_2` (`coddocu`,`codestado`),
  KEY `codarea` (`codarea`),
  KEY `codmaster` (`codmaster`),
  CONSTRAINT `public_inventario_ibfk_1` FOREIGN KEY (`coddocu`) REFERENCES `public_documentos` (`coddocu`),
  CONSTRAINT `public_inventario_ibfk_2` FOREIGN KEY (`codep`) REFERENCES `public_embarcaciones` (`codep`),
  CONSTRAINT `public_inventario_ibfk_3` FOREIGN KEY (`codlugar`) REFERENCES `public_lugares` (`codlugar`),
  CONSTRAINT `public_inventario_ibfk_4` FOREIGN KEY (`tipo`) REFERENCES `public_tipomaquina` (`codtipo`),
  CONSTRAINT `public_inventario_ibfk_5` FOREIGN KEY (`coddocu`, `codestado`) REFERENCES `public_estado` (`codocu`, `codestado`),
  CONSTRAINT `public_inventario_ibfk_6` FOREIGN KEY (`codarea`) REFERENCES `public_areas` (`codarea`),
  CONSTRAINT `public_inventario_ibfk_7` FOREIGN KEY (`codpropietario`) REFERENCES `public_centros` (`codcen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_inventariofisico
DROP TABLE IF EXISTS `public_inventariofisico`;
CREATE TABLE IF NOT EXISTS `public_inventariofisico` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `hidinventario` bigint(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `iduser` int(5) DEFAULT NULL,
  `cant` double DEFAULT NULL,
  `fechacre` datetime DEFAULT NULL,
  `cantstock` double DEFAULT NULL,
  `diferencia` double DEFAULT NULL,
  `codestado` char(2) DEFAULT NULL,
  `ubicacion` varchar(12) DEFAULT NULL,
  `comentario` tinytext,
  `cuentadebe` varchar(20) NOT NULL,
  `cuentahaber` varchar(20) NOT NULL,
  `monto` double NOT NULL,
  `iduserajuste` tinyint(4) NOT NULL,
  `fechaajuste` date NOT NULL,
  `fechacreajuste` datetime NOT NULL,
  `montocontable` int(11) DEFAULT NULL,
  `hidpadre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__public_alinventario` (`hidinventario`),
  KEY `Índice 3` (`cuentadebe`),
  KEY `Índice 4` (`cuentahaber`),
  KEY `FK_public_inventariofisico_public_inventariofisicopadre` (`hidpadre`),
  CONSTRAINT `FK__public_alinventario` FOREIGN KEY (`hidinventario`) REFERENCES `public_alinventario` (`id`),
  CONSTRAINT `FK_public_inventariofisico_public_inventariofisicopadre` FOREIGN KEY (`hidpadre`) REFERENCES `public_inventariofisicopadre` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_inventariofisicopadre
DROP TABLE IF EXISTS `public_inventariofisicopadre`;
CREATE TABLE IF NOT EXISTS `public_inventariofisicopadre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ano` char(2) NOT NULL DEFAULT '0',
  `mes` char(2) NOT NULL DEFAULT '0',
  `esciego` char(1) NOT NULL DEFAULT '0',
  `descripcion` varchar(40) DEFAULT NULL,
  `numero` varchar(12) DEFAULT NULL,
  `codocu` varchar(3) DEFAULT NULL,
  `fechaprog` datetime DEFAULT NULL,
  `fechacre` datetime DEFAULT NULL,
  `paralizar` char(1) DEFAULT NULL,
  `fechafin` datetime DEFAULT NULL,
  `codresponsable` varchar(6) DEFAULT NULL,
  `codestado` char(2) DEFAULT NULL,
  `codcen` char(4) DEFAULT NULL,
  `codal` char(3) DEFAULT NULL,
  `hidcarga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Índice 3` (`codcen`),
  KEY `Índice 4` (`codal`),
  KEY `Índice 2` (`codocu`),
  KEY `FK_public_inventariofisicopadre_public_cargamasiva` (`hidcarga`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Inventario fisico padre cabecera, detrealle :  public_inventario fisico';

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_librodiario
DROP TABLE IF EXISTS `public_librodiario`;
CREATE TABLE IF NOT EXISTS `public_librodiario` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `periodo` varchar(8) NOT NULL DEFAULT '0',
  `codplan` char(2) NOT NULL DEFAULT '0',
  `codcuenta` varchar(18) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `fechacont` varchar(10) NOT NULL DEFAULT '0',
  `fecha` varchar(10) NOT NULL DEFAULT '0',
  `glosa` varchar(100) NOT NULL DEFAULT '0',
  `debe` decimal(14,2) NOT NULL DEFAULT '0.00',
  `haber` decimal(14,2) NOT NULL DEFAULT '0.00',
  `status` char(1) NOT NULL DEFAULT '0',
  `iduser` int(11) NOT NULL DEFAULT '0',
  `fechaop` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `docref` varchar(18) NOT NULL DEFAULT '0',
  `mes` char(2) NOT NULL DEFAULT '0',
  `anno` char(2) NOT NULL DEFAULT '0',
  `tipo` char(1) NOT NULL DEFAULT '0',
  `subtipo` char(2) NOT NULL DEFAULT '0',
  `idref` bigint(20) DEFAULT NULL,
  `codocu` char(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Índice 2` (`codcuenta`),
  KEY `Índice 3` (`codocu`),
  KEY `Índice 4` (`idref`),
  CONSTRAINT `FK_public_librodiario_public_cuentas` FOREIGN KEY (`codcuenta`) REFERENCES `public_cuentas` (`codcuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_listamateriales
DROP TABLE IF EXISTS `public_listamateriales`;
CREATE TABLE IF NOT EXISTS `public_listamateriales` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombrelista` varchar(60) NOT NULL,
  `comentario` text NOT NULL,
  `iduser` int(11) NOT NULL,
  `compartida` char(1) NOT NULL,
  `codequipo` varchar(15) NOT NULL,
  `codtipo` char(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `codequipo` (`codequipo`),
  KEY `FK_public_listamateriales_public_tipolista` (`codtipo`),
  CONSTRAINT `FK_public_listamateriales_public_tipolista` FOREIGN KEY (`codtipo`) REFERENCES `public_tipolista` (`codtipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_logcargamasiva
DROP TABLE IF EXISTS `public_logcargamasiva`;
CREATE TABLE IF NOT EXISTS `public_logcargamasiva` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `hidcarga` int(11) NOT NULL,
  `campo` varchar(40) NOT NULL,
  `mensaje` varchar(80) NOT NULL,
  `level` varchar(1) NOT NULL,
  `fecha` datetime NOT NULL,
  `iduser` int(11) NOT NULL,
  `numerolinea` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hidcarga` (`hidcarga`),
  CONSTRAINT `public_logcargamasiva_ibfk_1` FOREIGN KEY (`hidcarga`) REFERENCES `public_cargamasiva` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_lotes
DROP TABLE IF EXISTS `public_lotes`;
CREATE TABLE IF NOT EXISTS `public_lotes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `stock` varchar(12) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `numlote` varchar(32) CHARACTER SET utf8 NOT NULL,
  `fechafabri` date NOT NULL,
  `fechaingreso` datetime NOT NULL,
  `fechavenc` date NOT NULL,
  `usuario` varchar(35) CHARACTER SET utf8 NOT NULL,
  `cant` double NOT NULL,
  `hidinventario` bigint(20) NOT NULL,
  `loteprov` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT 'lote del proveedor',
  `comentario` text CHARACTER SET utf8 NOT NULL,
  `codestado` char(2) CHARACTER SET utf8 NOT NULL COMMENT '''10'' creado, ''20'' agotado, ',
  `cantsaldo` double NOT NULL,
  `descripcion` varchar(40) CHARACTER SET utf8 NOT NULL,
  `codocu` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `hidkardex` bigint(20) NOT NULL,
  `fechalote` date NOT NULL,
  `punit` double NOT NULL,
  `orden` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `numlote` (`numlote`),
  KEY `hidinventario` (`hidinventario`),
  KEY `loteprov` (`loteprov`),
  KEY `Índice 5` (`stock`),
  CONSTRAINT `public_lotes_ibfk_1` FOREIGN KEY (`hidinventario`) REFERENCES `public_alinventario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_lugares
DROP TABLE IF EXISTS `public_lugares`;
CREATE TABLE IF NOT EXISTS `public_lugares` (
  `codlugar` varchar(6) NOT NULL,
  `deslugar` varchar(50) NOT NULL,
  `provincia` varchar(30) DEFAULT NULL,
  `claselugar` varchar(3) DEFAULT NULL,
  `codpro` varchar(6) DEFAULT NULL,
  `n_direc` int(11) NOT NULL,
  `codplanta` varchar(4) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fDGDGDcio` (`codlugar`),
  KEY `fki_direccio` (`n_direc`),
  KEY `fki_fk-centros` (`codplanta`),
  KEY `fki_wewojfw` (`codpro`),
  CONSTRAINT `public_lugares_ibfk_1` FOREIGN KEY (`n_direc`) REFERENCES `public_direcciones` (`n_direc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_maestroclipro
DROP TABLE IF EXISTS `public_maestroclipro`;
CREATE TABLE IF NOT EXISTS `public_maestroclipro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codart` varchar(8) CHARACTER SET utf8 DEFAULT NULL,
  `codpro` varchar(6) CHARACTER SET utf8 DEFAULT NULL,
  `codmon` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `centro` varchar(4) CHARACTER SET utf8 DEFAULT NULL,
  `um` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `verfoto` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `activo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_centos_clipor_maestro` (`centro`),
  KEY `fki_oereor` (`um`),
  KEY `codart` (`codart`),
  KEY `codpro` (`codpro`),
  KEY `codmon` (`codmon`),
  CONSTRAINT `public_maestroclipro_ibfk_1` FOREIGN KEY (`codart`) REFERENCES `public_maestrocomponentes` (`codigo`),
  CONSTRAINT `public_maestroclipro_ibfk_2` FOREIGN KEY (`codpro`) REFERENCES `public_clipro` (`codpro`),
  CONSTRAINT `public_maestroclipro_ibfk_3` FOREIGN KEY (`codmon`) REFERENCES `public_monedas` (`codmoneda`),
  CONSTRAINT `public_maestroclipro_ibfk_4` FOREIGN KEY (`centro`) REFERENCES `public_centros` (`codcen`),
  CONSTRAINT `public_maestroclipro_ibfk_5` FOREIGN KEY (`um`) REFERENCES `public_ums` (`um`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_maestrocomponentes
DROP TABLE IF EXISTS `public_maestrocomponentes`;
CREATE TABLE IF NOT EXISTS `public_maestrocomponentes` (
  `codigo` varchar(10) NOT NULL,
  `marca` varchar(35) DEFAULT NULL,
  `modelo` varchar(35) DEFAULT NULL,
  `nparte` varchar(35) DEFAULT NULL,
  `codpadre` varchar(8) DEFAULT NULL,
  `um` varchar(3) DEFAULT NULL,
  `descripcion` varchar(60) DEFAULT NULL,
  `detalle` longtext,
  `clase` varchar(50) DEFAULT NULL,
  `codmaterial` varchar(16) DEFAULT NULL,
  `flag` varchar(1) DEFAULT NULL,
  `codtipo` varchar(2) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `correlativo` varchar(12) DEFAULT NULL,
  `correl` int(11) DEFAULT NULL,
  `seri` int(11) NOT NULL,
  `codocu` char(3) NOT NULL,
  `esrotativo` char(1) NOT NULL DEFAULT '0',
  `codean` varchar(14) NOT NULL,
  `iduser` int(11) NOT NULL,
  `codigoosce` varchar(20) DEFAULT NULL,
  `pesoneto` decimal(10,0) NOT NULL,
  `esservicio` char(1) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `FKI_UMS` (`um`),
  KEY `codtipo` (`codtipo`),
  CONSTRAINT `public_maestrocomponentes_ibfk_1` FOREIGN KEY (`um`) REFERENCES `public_ums` (`um`),
  CONSTRAINT `public_maestrocomponentes_ibfk_3` FOREIGN KEY (`codtipo`) REFERENCES `public_maestrotipos` (`codtipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_maestrodetalle
DROP TABLE IF EXISTS `public_maestrodetalle`;
CREATE TABLE IF NOT EXISTS `public_maestrodetalle` (
  `codart` varchar(10) NOT NULL,
  `codcentro` varchar(4) NOT NULL,
  `cantsol` double NOT NULL,
  `codal` varchar(3) NOT NULL,
  `repautomatica` char(1) NOT NULL,
  `codgrupoventas` varchar(3) DEFAULT NULL,
  `canaldist` varchar(2) DEFAULT NULL,
  `canteconomica` double DEFAULT NULL,
  `cantreposic` double DEFAULT NULL,
  `cantreorden` double DEFAULT NULL,
  `leadtime` int(11) DEFAULT NULL,
  `catval` varchar(4) DEFAULT NULL,
  `punitv` double DEFAULT NULL,
  `punitstd` double DEFAULT NULL,
  `controlprecio` varchar(1) DEFAULT NULL,
  `supervisionautomatica` varchar(1) DEFAULT NULL,
  `sujetolote` char(1) NOT NULL,
  `lifofifo` varchar(2) NOT NULL,
  `tolerancia` decimal(2,2) NOT NULL,
  `bloqueo` char(1) NOT NULL,
  PRIMARY KEY (`codart`,`codcentro`,`codal`),
  KEY `FKI_ROIOTRY` (`codart`),
  KEY `FKI_CATVAL` (`catval`),
  KEY `fki_ceejet` (`codcentro`),
  KEY `fki_alammde` (`codal`),
  CONSTRAINT `public_maestrodetalle_ibfk_1` FOREIGN KEY (`codart`) REFERENCES `public_maestrocomponentes` (`codigo`),
  CONSTRAINT `public_maestrodetalle_ibfk_2` FOREIGN KEY (`codcentro`) REFERENCES `public_centros` (`codcen`),
  CONSTRAINT `public_maestrodetalle_ibfk_3` FOREIGN KEY (`codal`) REFERENCES `public_almacenes` (`codalm`),
  CONSTRAINT `public_maestrodetalle_ibfk_4` FOREIGN KEY (`catval`) REFERENCES `public_catvaloracion` (`codcatval`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_maestrodetallecentros
DROP TABLE IF EXISTS `public_maestrodetallecentros`;
CREATE TABLE IF NOT EXISTS `public_maestrodetallecentros` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `hcodart` varchar(10) CHARACTER SET utf8 NOT NULL,
  `iqf` char(1) CHARACTER SET utf8 NOT NULL,
  `catvalor` varchar(4) CHARACTER SET utf8 DEFAULT NULL,
  `codcen` varchar(4) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hcodart` (`hcodart`),
  KEY `codcen` (`codcen`),
  CONSTRAINT `public_maestrodetallecentros_ibfk_1` FOREIGN KEY (`codcen`) REFERENCES `public_centros` (`codcen`),
  CONSTRAINT `public_maestrodetallecentros_ibfk_2` FOREIGN KEY (`hcodart`) REFERENCES `public_maestrocomponentes` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_maestroequivalente
DROP TABLE IF EXISTS `public_maestroequivalente`;
CREATE TABLE IF NOT EXISTS `public_maestroequivalente` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `codart` varchar(12) DEFAULT NULL,
  `codart2` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Índice 2` (`codart`),
  KEY `Índice 3` (`codart2`),
  CONSTRAINT `FK__public_maestrocomponentes` FOREIGN KEY (`codart`) REFERENCES `public_maestrocomponentes` (`codigo`),
  CONSTRAINT `FK__public_maestrocomponentes_2` FOREIGN KEY (`codart2`) REFERENCES `public_maestrocomponentes` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='guarda lso codigos de equivalencias o materiales alternativos para dar mayor agilidad al stock';

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_maestroservicios
DROP TABLE IF EXISTS `public_maestroservicios`;
CREATE TABLE IF NOT EXISTS `public_maestroservicios` (
  `codserv` varchar(8) CHARACTER SET utf8 NOT NULL,
  `catval` varchar(6) CHARACTER SET utf8 NOT NULL,
  `descripcion` varchar(40) CHARACTER SET utf8 NOT NULL,
  `iduser` int(11) NOT NULL,
  `fechacre` datetime NOT NULL,
  `codocu` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`codserv`),
  KEY `codocu` (`codocu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_maestrotipos
DROP TABLE IF EXISTS `public_maestrotipos`;
CREATE TABLE IF NOT EXISTS `public_maestrotipos` (
  `esrotativo` char(1) NOT NULL DEFAULT '0' COMMENT 'Especiofica si es rotativo o no',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codtipo` varchar(2) DEFAULT NULL,
  `esservicio` char(1) DEFAULT NULL,
  `destipo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `codtipo` (`codtipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_maletin
DROP TABLE IF EXISTS `public_maletin`;
CREATE TABLE IF NOT EXISTS `public_maletin` (
  `idregistro` bigint(20) NOT NULL,
  `clase` varchar(35) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idsession` int(11) NOT NULL,
  `codocu` varchar(3) NOT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `codocu` (`codocu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_masterequipo
DROP TABLE IF EXISTS `public_masterequipo`;
CREATE TABLE IF NOT EXISTS `public_masterequipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hidpadre` int(11) DEFAULT NULL,
  `codigo` varchar(10) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `marca` varchar(24) NOT NULL,
  `modelo` varchar(25) NOT NULL,
  `numeroparte` varchar(20) NOT NULL,
  `codart` varchar(14) NOT NULL,
  `codigopadre` varchar(15) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `cant` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`),
  KEY `hidpadre` (`hidpadre`),
  KEY `codart` (`codart`),
  KEY `codigopadre` (`codigopadre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_masterlistamateriales
DROP TABLE IF EXISTS `public_masterlistamateriales`;
CREATE TABLE IF NOT EXISTS `public_masterlistamateriales` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(18) DEFAULT NULL,
  `hidlista` bigint(20) DEFAULT NULL,
  `activo` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Índice 2` (`codigo`),
  KEY `Índice 3` (`hidlista`),
  CONSTRAINT `FK_public_masterlistamateriales_public_listamateriales` FOREIGN KEY (`hidlista`) REFERENCES `public_listamateriales` (`id`),
  CONSTRAINT `FK_public_masterlistamateriales_public_masterequipo` FOREIGN KEY (`codigo`) REFERENCES `public_masterequipo` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Asocia las listas de materiales con los objetos tecnicos de compoenrens y equipos(master equipo), relacion  varios a varios';

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_masterrelacion
DROP TABLE IF EXISTS `public_masterrelacion`;
CREATE TABLE IF NOT EXISTS `public_masterrelacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cant` int(11) DEFAULT NULL,
  `hidhijo` varchar(14) DEFAULT NULL,
  `hidpadre` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__public_masterequipo` (`hidhijo`),
  KEY `FK__public_masterequipo_2` (`hidpadre`),
  CONSTRAINT `FK__public_masterequipo` FOREIGN KEY (`hidhijo`) REFERENCES `public_masterequipo` (`codigo`),
  CONSTRAINT `FK__public_masterequipo_2` FOREIGN KEY (`hidpadre`) REFERENCES `public_masterequipo` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_mensajes
DROP TABLE IF EXISTS `public_mensajes`;
CREATE TABLE IF NOT EXISTS `public_mensajes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `cuando` char(19) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codocu` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `enviadoel` char(19) CHARACTER SET utf8 DEFAULT NULL,
  `nombrefichero` text CHARACTER SET utf8,
  `hidocu` bigint(20) DEFAULT NULL,
  `tipo` char(1) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `codocu` (`codocu`),
  CONSTRAINT `public_mensajes_ibfk_1` FOREIGN KEY (`codocu`) REFERENCES `public_documentos` (`coddocu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_mensajesd
DROP TABLE IF EXISTS `public_mensajesd`;
CREATE TABLE IF NOT EXISTS `public_mensajesd` (
  `correodestinatario` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `esinterno` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  `hidevento` bigint(20) DEFAULT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_monedas
DROP TABLE IF EXISTS `public_monedas`;
CREATE TABLE IF NOT EXISTS `public_monedas` (
  `codmoneda` char(3) NOT NULL,
  `desmon` varchar(60) NOT NULL,
  `simbolo` varchar(4) NOT NULL,
  `habilitado` char(1) NOT NULL,
  PRIMARY KEY (`codmoneda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_montoinventario
DROP TABLE IF EXISTS `public_montoinventario`;
CREATE TABLE IF NOT EXISTS `public_montoinventario` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `dia` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mes` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `anno` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `iduser` int(11) NOT NULL,
  `montolibre` decimal(15,3) NOT NULL,
  `montoreserva` decimal(15,3) NOT NULL,
  `montotran` decimal(15,3) NOT NULL,
  `montodif` decimal(15,3) NOT NULL,
  `codal` char(3) NOT NULL,
  `codcen` char(4) NOT NULL,
  `codgrupo` varchar(4) NOT NULL,
  `numitems` mediumint(9) NOT NULL,
  `fecha` date NOT NULL,
  `montototal` decimal(16,0) NOT NULL,
  `semana` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_motivo
DROP TABLE IF EXISTS `public_motivo`;
CREATE TABLE IF NOT EXISTS `public_motivo` (
  `codmotivo` varchar(3) NOT NULL,
  `desmotivo` varchar(35) DEFAULT NULL,
  `cretornable` char(1) NOT NULL,
  PRIMARY KEY (`codmotivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_neot
DROP TABLE IF EXISTS `public_neot`;
CREATE TABLE IF NOT EXISTS `public_neot` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `hidne` bigint(20) NOT NULL,
  `hidot` bigint(20) NOT NULL,
  `cant` double NOT NULL,
  `fecreacion` datetime NOT NULL,
  `iduser` smallint(6) NOT NULL,
  `idot` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Índice 2` (`hidne`),
  KEY `Índice 3` (`hidot`),
  KEY `Índice 4` (`idot`),
  CONSTRAINT `FK__public_detgui` FOREIGN KEY (`hidne`) REFERENCES `public_detgui` (`id`),
  CONSTRAINT `FK__public_detot` FOREIGN KEY (`hidot`) REFERENCES `public_detot` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='tabla que guarda las referencias a la OT\r\n';

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_noticias
DROP TABLE IF EXISTS `public_noticias`;
CREATE TABLE IF NOT EXISTS `public_noticias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `txtnoticia` longtext,
  `fecha` char(19) DEFAULT NULL,
  `autor` varchar(50) DEFAULT NULL,
  `expira` int(11) DEFAULT NULL,
  `tiponoticia` varchar(2) DEFAULT NULL,
  `mensaje` varchar(1) DEFAULT NULL,
  `aprobado` int(11) DEFAULT NULL,
  `fechapublicacion` char(19) DEFAULT NULL,
  `fechapropuesta` char(19) DEFAULT NULL,
  `fexpira` char(19) DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_novedades
DROP TABLE IF EXISTS `public_novedades`;
CREATE TABLE IF NOT EXISTS `public_novedades` (
  `hidparte` int(11) DEFAULT NULL,
  `codsistema` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `codigosap` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `codigoaf` varchar(13) CHARACTER SET utf8 DEFAULT NULL,
  `descri` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `descridetalle` longtext CHARACTER SET utf8,
  `criticidad` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  `idnovedad` int(11) NOT NULL,
  `idpartepesca` bigint(20) DEFAULT NULL,
  `hora` longtext CHARACTER SET utf8,
  `latitud` varchar(6) CHARACTER SET utf8 DEFAULT NULL,
  `meridiano` varchar(6) CHARACTER SET utf8 DEFAULT NULL,
  `lugar` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `ultimares` longtext CHARACTER SET utf8,
  `usuario` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`idnovedad`),
  KEY `fki_gffgf` (`idpartepesca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_objetosmaster
DROP TABLE IF EXISTS `public_objetosmaster`;
CREATE TABLE IF NOT EXISTS `public_objetosmaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hcodobmaster` varchar(15) NOT NULL,
  `hidobjeto` int(11) NOT NULL,
  `activo` char(1) NOT NULL,
  `serie` varchar(50) DEFAULT NULL,
  `textolargo` text,
  `identificador` varchar(24) DEFAULT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hidobjeto` (`hcodobmaster`),
  KEY `hidmaster` (`hidobjeto`),
  CONSTRAINT `public_objetosmaster_ibfk_1` FOREIGN KEY (`hidobjeto`) REFERENCES `public_objetos_cliente` (`id`),
  CONSTRAINT `public_objetosmaster_ibfk_2` FOREIGN KEY (`hcodobmaster`) REFERENCES `public_masterequipo` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Une los objetos clientes y el master de equipos ';

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_objetos_cliente
DROP TABLE IF EXISTS `public_objetos_cliente`;
CREATE TABLE IF NOT EXISTS `public_objetos_cliente` (
  `codpro` varchar(6) CHARACTER SET utf8 NOT NULL,
  `codobjeto` varchar(3) CHARACTER SET utf8 NOT NULL,
  `nombreobjeto` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `descripcionobjeto` longtext CHARACTER SET utf8,
  `estado` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correlativo` int(11) NOT NULL,
  `tipoobjeto` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `cebe` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codpro` (`codpro`,`codobjeto`),
  KEY `i_codobjetocli` (`codpro`),
  KEY `i_codobjetos` (`codobjeto`),
  KEY `cebe` (`cebe`),
  CONSTRAINT `public_objetos_cliente_ibfk_1` FOREIGN KEY (`codpro`) REFERENCES `public_clipro` (`codpro`),
  CONSTRAINT `public_objetos_cliente_ibfk_2` FOREIGN KEY (`cebe`) REFERENCES `public_cc` (`codc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_observaciones
DROP TABLE IF EXISTS `public_observaciones`;
CREATE TABLE IF NOT EXISTS `public_observaciones` (
  `hidinventario` bigint(20) DEFAULT NULL,
  `fecha` char(19) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descri` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `mobs` longtext CHARACTER SET utf8,
  `usuario` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codestado` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `codocu` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_inventar` (`hidinventario`),
  CONSTRAINT `public_observaciones_ibfk_1` FOREIGN KEY (`hidinventario`) REFERENCES `public_inventario` (`idinventario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_observacionesdetalle
DROP TABLE IF EXISTS `public_observacionesdetalle`;
CREATE TABLE IF NOT EXISTS `public_observacionesdetalle` (
  `hidobservaciones` bigint(20) DEFAULT NULL,
  `comentario` longtext CHARACTER SET utf8,
  `usuario` varchar(35) CHARACTER SET utf8 DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` char(19) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_ocompra
DROP TABLE IF EXISTS `public_ocompra`;
CREATE TABLE IF NOT EXISTS `public_ocompra` (
  `numcot` varchar(10) DEFAULT NULL,
  `codpro` varchar(6) NOT NULL,
  `fecdoc` char(19) NOT NULL,
  `codcon` varchar(5) DEFAULT NULL,
  `codestado` varchar(2) NOT NULL,
  `texto` varchar(40) NOT NULL,
  `textolargo` longtext,
  `tipologia` varchar(1) NOT NULL,
  `moneda` varchar(3) NOT NULL,
  `orcli` varchar(12) DEFAULT NULL,
  `descuento` smallint(6) NOT NULL,
  `usuario` varchar(35) DEFAULT NULL,
  `coddocu` varchar(3) NOT NULL,
  `codtipofac` varchar(2) NOT NULL,
  `codsociedad` varchar(1) NOT NULL,
  `codgrupoventas` varchar(3) NOT NULL,
  `codtipocotizacion` varchar(1) NOT NULL,
  `validez` int(11) NOT NULL,
  `codcentro` varchar(4) DEFAULT NULL,
  `nigv` double NOT NULL,
  `codobjeto` varchar(3) NOT NULL,
  `fechapresentacion` char(19) DEFAULT NULL,
  `fechanominal` char(19) DEFAULT NULL,
  `tenorsup` varchar(1) DEFAULT NULL,
  `tenorinf` varchar(1) DEFAULT NULL,
  `montototal` double NOT NULL,
  `idguia` int(11) NOT NULL AUTO_INCREMENT,
  `idcontacto` int(11) DEFAULT NULL,
  `correlativ` bigint(20) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idreporte` int(11) DEFAULT NULL,
  `codresponsable` varchar(8) NOT NULL,
  `direcentrega` int(11) NOT NULL,
  PRIMARY KEY (`idguia`),
  KEY `codresponsable` (`codresponsable`),
  KEY `direcentrega` (`direcentrega`),
  KEY `codpro` (`codpro`),
  KEY `codobjeto` (`codobjeto`),
  KEY `numcot` (`numcot`),
  KEY `coddocu` (`coddocu`),
  KEY `codsociedad` (`codsociedad`),
  KEY `tenorsup` (`tenorsup`),
  KEY `tenorinf` (`tenorinf`),
  KEY `tenorindex` (`coddocu`,`codsociedad`,`tenorsup`),
  KEY `codresponsable_2` (`codresponsable`),
  KEY `idcontacto` (`idcontacto`),
  KEY `codtipofac` (`codtipofac`),
  KEY `moneda` (`moneda`),
  KEY `codgrupoventas` (`codgrupoventas`),
  CONSTRAINT `public_ocompra_ibfk_1` FOREIGN KEY (`codresponsable`) REFERENCES `public_trabajadores` (`codigotra`),
  CONSTRAINT `public_ocompra_ibfk_2` FOREIGN KEY (`direcentrega`) REFERENCES `public_direcciones` (`n_direc`),
  CONSTRAINT `public_ocompra_ibfk_3` FOREIGN KEY (`codpro`) REFERENCES `public_clipro` (`codpro`),
  CONSTRAINT `public_ocompra_ibfk_4` FOREIGN KEY (`idcontacto`) REFERENCES `public_contactos` (`id`),
  CONSTRAINT `public_ocompra_ibfk_5` FOREIGN KEY (`codtipofac`) REFERENCES `public_tipofacturacion` (`codtipofac`),
  CONSTRAINT `public_ocompra_ibfk_6` FOREIGN KEY (`moneda`) REFERENCES `public_monedas` (`codmoneda`),
  CONSTRAINT `public_ocompra_ibfk_7` FOREIGN KEY (`codgrupoventas`) REFERENCES `public_grupocompras` (`codgrupo`),
  CONSTRAINT `public_ocompra_ibfk_8` FOREIGN KEY (`codsociedad`) REFERENCES `public_sociedades` (`socio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_oficios
DROP TABLE IF EXISTS `public_oficios`;
CREATE TABLE IF NOT EXISTS `public_oficios` (
  `codof` varchar(3) CHARACTER SET utf8 NOT NULL,
  `oficio` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`codof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_opcionescamposdocu
DROP TABLE IF EXISTS `public_opcionescamposdocu`;
CREATE TABLE IF NOT EXISTS `public_opcionescamposdocu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codocu` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `campo` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `nombrecampo` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `tipodato` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  `longitud` int(11) DEFAULT NULL,
  `nombredelmodelo` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `primercampolista` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `segundocampolista` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `seleccionable` longtext CHARACTER SET utf8,
  PRIMARY KEY (`id`),
  KEY `codocu` (`codocu`),
  CONSTRAINT `public_opcionescamposdocu_ibfk_1` FOREIGN KEY (`codocu`) REFERENCES `public_documentos` (`coddocu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_opcionesdocumentos
DROP TABLE IF EXISTS `public_opcionesdocumentos`;
CREATE TABLE IF NOT EXISTS `public_opcionesdocumentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `codparam` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `valor` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `tipodato` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  `seleccionador` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `codocu` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `idusuario` bigint(20) DEFAULT NULL,
  `nombrecampo` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `nombretabla` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `idopdoc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_roeruoe` (`codocu`),
  KEY `fki_ereprerre2242` (`idopdoc`),
  KEY `fki_fK_wi9weuwe` (`idusuario`),
  CONSTRAINT `public_opcionesdocumentos_ibfk_1` FOREIGN KEY (`idopdoc`) REFERENCES `public_opcionescamposdocu` (`id`),
  CONSTRAINT `public_opcionesdocumentos_ibfk_2` FOREIGN KEY (`codocu`) REFERENCES `public_documentos` (`coddocu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_opcontables
DROP TABLE IF EXISTS `public_opcontables`;
CREATE TABLE IF NOT EXISTS `public_opcontables` (
  `codop` varchar(3) NOT NULL,
  `desop` varchar(50) NOT NULL,
  `hcodmov` varchar(3) NOT NULL,
  `texto` text NOT NULL,
  `tipo` char(1) NOT NULL,
  PRIMARY KEY (`codop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_ot
DROP TABLE IF EXISTS `public_ot`;
CREATE TABLE IF NOT EXISTS `public_ot` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `numero` varchar(12) NOT NULL,
  `fechacre` date NOT NULL,
  `fechafinprog` date NOT NULL,
  `codpro` varchar(8) NOT NULL,
  `idobjeto` int(11) NOT NULL,
  `codresponsable` varchar(6) NOT NULL,
  `textocorto` varchar(40) NOT NULL,
  `textolargo` text NOT NULL,
  `grupoplan` varchar(3) NOT NULL,
  `codcen` varchar(4) NOT NULL,
  `iduser` int(11) NOT NULL,
  `codocu` varchar(3) NOT NULL,
  `codestado` varchar(2) NOT NULL,
  `clase` varchar(1) NOT NULL,
  `hidoferta` bigint(20) NOT NULL,
  `fechainiprog` date DEFAULT NULL,
  `fechainicio` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `codpro` (`codpro`),
  KEY `idobjeto` (`idobjeto`),
  KEY `codresponsable` (`codresponsable`),
  KEY `codcen` (`codcen`),
  KEY `codocu` (`codocu`),
  KEY `codestado` (`codestado`),
  KEY `hidoferta` (`hidoferta`),
  KEY `codocu_2` (`codocu`,`codestado`),
  KEY `numero` (`numero`),
  CONSTRAINT `public_ot_ibfk_1` FOREIGN KEY (`codpro`) REFERENCES `public_clipro` (`codpro`),
  CONSTRAINT `public_ot_ibfk_2` FOREIGN KEY (`idobjeto`) REFERENCES `public_objetosmaster` (`id`),
  CONSTRAINT `public_ot_ibfk_3` FOREIGN KEY (`codresponsable`) REFERENCES `public_trabajadores` (`codigotra`),
  CONSTRAINT `public_ot_ibfk_4` FOREIGN KEY (`codocu`, `codestado`) REFERENCES `public_estado` (`codocu`, `codestado`),
  CONSTRAINT `public_ot_ibfk_5` FOREIGN KEY (`codcen`) REFERENCES `public_centros` (`codcen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_otconsignacion
DROP TABLE IF EXISTS `public_otconsignacion`;
CREATE TABLE IF NOT EXISTS `public_otconsignacion` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `codcli` varchar(18) NOT NULL DEFAULT '0',
  `hidetot` bigint(20) DEFAULT NULL,
  `cant` double DEFAULT NULL,
  `um` char(3) DEFAULT NULL,
  `codart` varchar(12) DEFAULT NULL,
  `fecnec` date DEFAULT NULL,
  `idusertemp` int(11) DEFAULT NULL,
  `idtemp` bigint(20) NOT NULL,
  `identificador` bigint(20) DEFAULT NULL,
  `hidot` bigint(20) DEFAULT NULL,
  `descripcion` varchar(40) DEFAULT NULL,
  `textolargo` mediumtext,
  `idstatus` int(11) DEFAULT NULL,
  `item` varchar(3) DEFAULT NULL,
  `centro` char(4) DEFAULT NULL,
  `codal` char(3) DEFAULT NULL,
  `est` char(2) DEFAULT NULL,
  UNIQUE KEY `Índice 1` (`id`),
  KEY `Índice 2` (`codart`),
  KEY `Índice 3` (`idtemp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='tabla que guarda los registros temporales de lods repuestos yo materiales s que sesiiciutana los clientes,';

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_paraqueva
DROP TABLE IF EXISTS `public_paraqueva`;
CREATE TABLE IF NOT EXISTS `public_paraqueva` (
  `cmotivo` varchar(2) CHARACTER SET utf8 NOT NULL,
  `motivo` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`cmotivo`),
  KEY `i_parqueva` (`cmotivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_pareto
DROP TABLE IF EXISTS `public_pareto`;
CREATE TABLE IF NOT EXISTS `public_pareto` (
  `ranking` int(11) NOT NULL,
  `clase` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `acumulado` double NOT NULL,
  `porcentaje` double NOT NULL,
  `hinventario` bigint(20) NOT NULL,
  `idsesion` int(11) NOT NULL,
  `column_7` int(11) NOT NULL,
  `porcentajeac` double NOT NULL,
  PRIMARY KEY (`hinventario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_periodos
DROP TABLE IF EXISTS `public_periodos`;
CREATE TABLE IF NOT EXISTS `public_periodos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mes` char(2) CHARACTER SET utf8 NOT NULL,
  `anno` char(2) CHARACTER SET utf8 NOT NULL,
  `inicio` date NOT NULL,
  `final` date NOT NULL,
  `activo` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `toleranciaatras` int(11) NOT NULL,
  `toleranciadelante` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_pescaterceros
DROP TABLE IF EXISTS `public_pescaterceros`;
CREATE TABLE IF NOT EXISTS `public_pescaterceros` (
  `id` int(11) NOT NULL,
  `codplanta` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `pesca` int(11) DEFAULT NULL,
  `numeroep` int(11) DEFAULT NULL,
  `fecha` char(19) COLLATE utf8_unicode_ci DEFAULT NULL,
  `factor` double DEFAULT NULL,
  `idespecie` int(11) DEFAULT NULL,
  `idtemporada` int(11) DEFAULT NULL,
  `semana` int(11) DEFAULT NULL,
  `zonalitoral` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_peticion
DROP TABLE IF EXISTS `public_peticion`;
CREATE TABLE IF NOT EXISTS `public_peticion` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `codpro` varchar(6) NOT NULL,
  `tipo` char(1) NOT NULL,
  `codcen` varchar(4) NOT NULL,
  `codal` varchar(3) NOT NULL,
  `imputacion` varchar(12) NOT NULL,
  `numero` varchar(12) NOT NULL,
  `fecha` date NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `fechacreac` datetime NOT NULL,
  `comentario` text NOT NULL,
  `textocorto` varchar(40) NOT NULL,
  `idcontacto` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `codocu` char(3) NOT NULL,
  `codestado` char(2) NOT NULL,
  `correlativo` int(11) NOT NULL,
  `prefijo` varchar(3) NOT NULL,
  `codmon` char(3) NOT NULL,
  `descuento` decimal(10,0) NOT NULL,
  `idtemp` bigint(20) NOT NULL,
  `item` char(3) DEFAULT NULL,
  `grupocompras` char(3) DEFAULT NULL,
  `tenorsup` char(1) NOT NULL,
  `tenorinf` char(1) NOT NULL,
  `validez` int(11) NOT NULL,
  `codobjeto` varchar(3) NOT NULL,
  `codproadqui` varchar(6) NOT NULL,
  `direntrega` int(11) DEFAULT NULL,
  `socio` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `orcli` varchar(15) NOT NULL,
  `fpago` varchar(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `codpro` (`codpro`),
  KEY `idcontacto` (`idcontacto`),
  KEY `iduser` (`iduser`),
  KEY `codocu` (`codocu`),
  KEY `codestado` (`codestado`),
  KEY `codmon` (`codmon`),
  KEY `codproadqui` (`codproadqui`),
  KEY `codcen` (`codcen`),
  KEY `codal` (`codal`),
  KEY `imputacion` (`imputacion`),
  KEY `grupocompras` (`grupocompras`),
  KEY `codproadqui_2` (`codproadqui`,`codobjeto`),
  KEY `fpago` (`fpago`),
  CONSTRAINT `public_peticion_ibfk_1` FOREIGN KEY (`codpro`) REFERENCES `public_clipro` (`codpro`),
  CONSTRAINT `public_peticion_ibfk_10` FOREIGN KEY (`grupocompras`) REFERENCES `public_grupoventas` (`codgrupo`),
  CONSTRAINT `public_peticion_ibfk_11` FOREIGN KEY (`codproadqui`, `codobjeto`) REFERENCES `public_objetos_cliente` (`codpro`, `codobjeto`),
  CONSTRAINT `public_peticion_ibfk_12` FOREIGN KEY (`fpago`) REFERENCES `public_tipofacturacion` (`codtipofac`),
  CONSTRAINT `public_peticion_ibfk_3` FOREIGN KEY (`idcontacto`) REFERENCES `public_contactos` (`id`),
  CONSTRAINT `public_peticion_ibfk_4` FOREIGN KEY (`codestado`) REFERENCES `public_estado` (`codestado`),
  CONSTRAINT `public_peticion_ibfk_5` FOREIGN KEY (`codocu`) REFERENCES `public_documentos` (`coddocu`),
  CONSTRAINT `public_peticion_ibfk_6` FOREIGN KEY (`grupocompras`) REFERENCES `public_grupoventas` (`codgrupo`),
  CONSTRAINT `public_peticion_ibfk_7` FOREIGN KEY (`codcen`) REFERENCES `public_centros` (`codcen`),
  CONSTRAINT `public_peticion_ibfk_8` FOREIGN KEY (`imputacion`) REFERENCES `public_cc` (`codc`),
  CONSTRAINT `public_peticion_ibfk_9` FOREIGN KEY (`codmon`) REFERENCES `public_monedas` (`codmoneda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_provincias
DROP TABLE IF EXISTS `public_provincias`;
CREATE TABLE IF NOT EXISTS `public_provincias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codprov` varchar(2) NOT NULL,
  `provincia` varchar(40) NOT NULL,
  `coddepa` varchar(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `codprov` (`codprov`),
  KEY `coddepa` (`coddepa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_puntodespacho
DROP TABLE IF EXISTS `public_puntodespacho`;
CREATE TABLE IF NOT EXISTS `public_puntodespacho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hcodcanal` varchar(3) CHARACTER SET utf8 NOT NULL,
  `nombrepunto` varchar(40) CHARACTER SET utf8 NOT NULL,
  `pesaje` char(1) CHARACTER SET utf8 NOT NULL,
  `codcen` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `maxhorasespera` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `codcen` (`codcen`),
  KEY `hcodcanal` (`hcodcanal`),
  CONSTRAINT `public_puntodespacho_ibfk_1` FOREIGN KEY (`hcodcanal`) REFERENCES `public_canales` (`codcanal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_reportepesca
DROP TABLE IF EXISTS `public_reportepesca`;
CREATE TABLE IF NOT EXISTS `public_reportepesca` (
  `codep` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `id` int(11) NOT NULL,
  `semana` int(11) DEFAULT NULL,
  `fecha` char(19) COLLATE utf8_unicode_ci DEFAULT NULL,
  `harribo` longtext CHARACTER SET utf8,
  `hzarpe` longtext CHARACTER SET utf8,
  `codplantadestino` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `codplantazarpe` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `declarada` int(11) DEFAULT NULL,
  `descargada` double DEFAULT NULL,
  `d2` int(11) DEFAULT NULL,
  `codzarpe` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `r1` int(11) DEFAULT NULL,
  `r2` int(11) DEFAULT NULL,
  `r3` int(11) DEFAULT NULL,
  `r4` int(11) DEFAULT NULL,
  `r5` int(11) DEFAULT NULL,
  `r6` int(11) DEFAULT NULL,
  `r7` int(11) DEFAULT NULL,
  `r8` int(11) DEFAULT NULL,
  `r9` int(11) DEFAULT NULL,
  `r10` int(11) DEFAULT NULL,
  `r11` int(11) DEFAULT NULL,
  `r12` int(11) DEFAULT NULL,
  `zona` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  `idespecie` int(11) DEFAULT NULL,
  `idtemporada` int(11) DEFAULT NULL,
  `comenatrio` longtext CHARACTER SET utf8,
  `latitud` varchar(6) CHARACTER SET utf8 DEFAULT NULL,
  `meridiano` varchar(6) CHARACTER SET utf8 DEFAULT NULL,
  `zonapesca` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `evento` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  `fechazarpe` char(19) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechaarribo` char(19) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descargada1` double DEFAULT NULL,
  `capbodega` int(11) DEFAULT NULL,
  `zonalitoral` varchar(14) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_trt` (`idespecie`),
  KEY `fki_plantadetino` (`codplantadestino`),
  KEY `fki_tempora` (`idtemporada`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_reportepesca_coor
DROP TABLE IF EXISTS `public_reportepesca_coor`;
CREATE TABLE IF NOT EXISTS `public_reportepesca_coor` (
  `hidreporte` bigint(20) DEFAULT NULL,
  `latitud` varchar(6) CHARACTER SET utf8 DEFAULT NULL,
  `meridiano` varchar(6) CHARACTER SET utf8 DEFAULT NULL,
  `aliaszona` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_settings
DROP TABLE IF EXISTS `public_settings`;
CREATE TABLE IF NOT EXISTS `public_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(64) NOT NULL DEFAULT 'system',
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_key` (`category`,`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_sociedades
DROP TABLE IF EXISTS `public_sociedades`;
CREATE TABLE IF NOT EXISTS `public_sociedades` (
  `socio` varchar(1) CHARACTER SET utf8 NOT NULL,
  `dsocio` varchar(40) CHARACTER SET utf8 NOT NULL,
  `rucsoc` varchar(12) CHARACTER SET utf8 NOT NULL,
  `activo` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `direccionfiscal` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `web` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `socio` (`socio`),
  UNIQUE KEY `unique_rucsoc` (`rucsoc`),
  KEY `i_socio` (`socio`),
  KEY `rucsoc` (`rucsoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_solcot
DROP TABLE IF EXISTS `public_solcot`;
CREATE TABLE IF NOT EXISTS `public_solcot` (
  `codpro` varchar(8) NOT NULL,
  `idcontacto` int(11) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `vigencia` int(11) NOT NULL,
  `codmon` varchar(3) NOT NULL,
  `codocu` varchar(3) NOT NULL,
  `codestado` varchar(2) NOT NULL,
  `iduser` int(11) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `indicaciones` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idcontacto` (`idcontacto`),
  KEY `codpro` (`codpro`),
  CONSTRAINT `public_solcot_ibfk_1` FOREIGN KEY (`codpro`) REFERENCES `public_clipro` (`codpro`),
  CONSTRAINT `public_solcot_ibfk_2` FOREIGN KEY (`idcontacto`) REFERENCES `public_contactos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_solpe
DROP TABLE IF EXISTS `public_solpe`;
CREATE TABLE IF NOT EXISTS `public_solpe` (
  `numero` varchar(10) DEFAULT NULL,
  `tipo` varchar(3) DEFAULT NULL,
  `textocabecera` longtext,
  `autor` varchar(15) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `fechadoc` datetime DEFAULT NULL,
  `fechanec` char(19) DEFAULT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `codocu` char(3) DEFAULT NULL,
  `escompra` varchar(1) DEFAULT NULL,
  `correlativ` bigint(20) DEFAULT NULL,
  `hidref` bigint(20) NOT NULL,
  `codocuref` char(3) NOT NULL,
  `iduser` int(11) NOT NULL,
  `externo` char(1) NOT NULL,
  `idreporte` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_solpe_docu` (`codocu`),
  KEY `fki_solrrpe_docu` (`estado`),
  KEY `escshshsh` (`escompra`),
  KEY `hidref` (`hidref`),
  KEY `codocuref` (`codocuref`),
  CONSTRAINT `public_solpe_ibfk_1` FOREIGN KEY (`escompra`) REFERENCES `public_tiposolpe` (`codtipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_tempalkardex
DROP TABLE IF EXISTS `public_tempalkardex`;
CREATE TABLE IF NOT EXISTS `public_tempalkardex` (
  `codart` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `codmov` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `cant` double DEFAULT NULL,
  `alemi` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `aldes` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `fecha` char(19) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coddoc` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `numdoc` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `usuario` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `um` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `comentario` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `codocuref` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `numdocref` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `codcentro` varchar(4) CHARACTER SET utf8 DEFAULT NULL,
  `codestado` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `prefijo` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `fechadoc` char(19) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correlativo` varchar(12) CHARACTER SET utf8 DEFAULT NULL,
  `numkardex` varchar(14) CHARACTER SET utf8 DEFAULT NULL,
  `solicitante` varchar(18) CHARACTER SET utf8 DEFAULT NULL,
  `hidvale` bigint(20) DEFAULT NULL,
  `idref` bigint(20) DEFAULT NULL,
  `lote` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `valido` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  `checki` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  `destino` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `preciounit` double DEFAULT NULL,
  `correlativ` bigint(20) DEFAULT NULL,
  `codcendes` varchar(4) CHARACTER SET utf8 DEFAULT NULL,
  `id` bigint(20) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idusertemp` int(11) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `idtemp` bigint(20) NOT NULL AUTO_INCREMENT,
  `colector` varchar(18) CHARACTER SET utf8 NOT NULL,
  `textolargo` text CHARACTER SET utf8 NOT NULL,
  `codtrabajador` varchar(6) CHARACTER SET utf8 NOT NULL,
  `montomovido` double NOT NULL,
  `idotrokardex` bigint(20) NOT NULL,
  `codmoneda` varchar(3) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`idtemp`),
  KEY `fki_movis` (`codmov`),
  KEY `fki_oetoetee` (`hidvale`),
  KEY `fki_codigomat` (`codart`),
  KEY `fki_cemitr` (`codcentro`),
  KEY `fki_docirer` (`codocuref`),
  KEY `fki_deod` (`coddoc`),
  KEY `bk_codcendes` (`codcendes`),
  KEY `um` (`um`),
  KEY `alemi` (`alemi`),
  CONSTRAINT `public_tempalkardex_ibfk_1` FOREIGN KEY (`um`) REFERENCES `public_ums` (`um`),
  CONSTRAINT `public_tempalkardex_ibfk_2` FOREIGN KEY (`codart`) REFERENCES `public_maestrocomponentes` (`codigo`),
  CONSTRAINT `public_tempalkardex_ibfk_3` FOREIGN KEY (`codcentro`) REFERENCES `public_centros` (`codcen`),
  CONSTRAINT `public_tempalkardex_ibfk_4` FOREIGN KEY (`alemi`) REFERENCES `public_almacenes` (`codalm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_tempdesolpe
DROP TABLE IF EXISTS `public_tempdesolpe`;
CREATE TABLE IF NOT EXISTS `public_tempdesolpe` (
  `id` bigint(20) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `tipimputacion` char(1) NOT NULL,
  `idusertemp` int(11) NOT NULL,
  `hcodoc` char(3) NOT NULL,
  `centro` varchar(4) NOT NULL,
  `codal` varchar(3) NOT NULL,
  `codart` varchar(10) NOT NULL,
  `txtmaterial` varchar(40) NOT NULL,
  `grupocompras` varchar(4) NOT NULL,
  `usuario` varchar(35) DEFAULT NULL,
  `textodetalle` text,
  `fechacrea` datetime DEFAULT NULL,
  `fechaent` date DEFAULT NULL,
  `fechalib` datetime DEFAULT NULL,
  `imputacion` varchar(12) DEFAULT NULL,
  `hidsolpe` bigint(20) DEFAULT NULL,
  `codocu` char(3) DEFAULT NULL,
  `tipsolpe` char(1) DEFAULT NULL,
  `est` char(2) DEFAULT NULL,
  `cant` float DEFAULT NULL,
  `item` char(3) DEFAULT NULL,
  `cantaten` float DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  `estadolib` char(1) DEFAULT NULL,
  `solicitanet` varchar(25) DEFAULT NULL,
  `um` char(3) DEFAULT NULL,
  `firme` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `idreserva` bigint(20) NOT NULL,
  `punitplan` double NOT NULL DEFAULT '0',
  `punitreal` double NOT NULL DEFAULT '0',
  `codservicio` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `iduser` int(11) NOT NULL,
  `idtemp` bigint(20) NOT NULL AUTO_INCREMENT,
  `hidot` bigint(20) NOT NULL,
  `hidlabor` bigint(20) NOT NULL,
  `idstatus` tinyint(4) NOT NULL,
  PRIMARY KEY (`idtemp`),
  KEY `codart` (`codart`),
  KEY `k_codal` (`codal`),
  KEY `k_centro` (`centro`),
  KEY `bk_hidesolpe` (`hidsolpe`),
  KEY `fk_Pdfdffd` (`um`),
  KEY `bk_registroinv` (`codart`,`codal`,`centro`),
  KEY `FK_public_desolpe_public_grupocompras` (`grupocompras`),
  KEY `codocu` (`codocu`,`est`),
  KEY `Índice 9` (`id`),
  CONSTRAINT `public_tempdesolpe_ibfk_1` FOREIGN KEY (`hidsolpe`) REFERENCES `public_solpe` (`id`),
  CONSTRAINT `public_tempdesolpe_ibfk_2` FOREIGN KEY (`codart`) REFERENCES `public_maestrocomponentes` (`codigo`),
  CONSTRAINT `public_tempdesolpe_ibfk_3` FOREIGN KEY (`um`) REFERENCES `public_ums` (`um`),
  CONSTRAINT `public_tempdesolpe_ibfk_4` FOREIGN KEY (`codocu`, `est`) REFERENCES `public_estado` (`codocu`, `codestado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_tempdetgui
DROP TABLE IF EXISTS `public_tempdetgui`;
CREATE TABLE IF NOT EXISTS `public_tempdetgui` (
  `n_hguia` bigint(20) DEFAULT NULL,
  `c_itguia` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `n_cangui` double DEFAULT NULL,
  `c_codgui` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `c_edgui` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `c_descri` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `m_obs` longtext CHARACTER SET utf8,
  `c_um` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `c_codep` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `ndeenvio` bigint(20) DEFAULT NULL,
  `l_libre` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  `n_hconformidad` double DEFAULT NULL,
  `c_estado` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `n_libre` int(11) DEFAULT NULL,
  `n_idconformidad` bigint(20) DEFAULT NULL,
  `c_af` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  `c_codactivo` varchar(13) CHARACTER SET utf8 DEFAULT NULL,
  `c_img` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  `c_codsap` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `docref` varchar(12) CHARACTER SET utf8 DEFAULT NULL,
  `docrefext` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `hidref` bigint(20) DEFAULT NULL COMMENT 'REFERENCIA A LA OT',
  `codocu` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `codlugar` varchar(6) CHARACTER SET utf8 DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  `idtemp` bigint(20) NOT NULL AUTO_INCREMENT,
  `idstatus` int(11) NOT NULL,
  `id` bigint(20) NOT NULL,
  `idusertemp` int(11) NOT NULL,
  `hidespacho` bigint(20) NOT NULL,
  `modo` varchar(1) CHARACTER SET utf8 NOT NULL,
  `codob` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idtemp`),
  KEY `I_CODSAP` (`c_codsap`),
  KEY `i_pc_estado` (`c_estado`),
  KEY `fki_detgui_paraqueva` (`c_edgui`),
  KEY `i_n_hguia` (`n_hguia`),
  KEY `I_CDOAF` (`c_codactivo`),
  KEY `i_citguia` (`c_itguia`),
  KEY `c_codgui` (`c_codgui`),
  KEY `c_um` (`c_um`),
  KEY `hidespacho` (`hidespacho`),
  KEY `n_hguia` (`n_hguia`),
  KEY `codocu` (`codocu`,`c_estado`),
  KEY `c_codep` (`c_codep`),
  KEY `Índice 14` (`codob`),
  CONSTRAINT `public_tempdetgui_ibfk_1` FOREIGN KEY (`n_hguia`) REFERENCES `public_guia` (`id`),
  CONSTRAINT `public_tempdetgui_ibfk_2` FOREIGN KEY (`codocu`, `c_estado`) REFERENCES `public_estado` (`codocu`, `codestado`),
  CONSTRAINT `public_tempdetgui_ibfk_3` FOREIGN KEY (`c_codep`) REFERENCES `public_embarcaciones` (`codep`),
  CONSTRAINT `public_tempdetgui_ibfk_4` FOREIGN KEY (`c_edgui`) REFERENCES `public_paraqueva` (`cmotivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_tempdetingfactura
DROP TABLE IF EXISTS `public_tempdetingfactura`;
CREATE TABLE IF NOT EXISTS `public_tempdetingfactura` (
  `hidfactura` bigint(20) NOT NULL,
  `item` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `cant` double NOT NULL,
  `hidkardex` bigint(20) NOT NULL,
  `iduser` int(11) NOT NULL,
  `fechacrea` datetime NOT NULL,
  `idtemp` bigint(20) NOT NULL AUTO_INCREMENT,
  `idusertemp` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `hidalentrega` bigint(20) DEFAULT NULL,
  `idstatus` int(11) NOT NULL,
  `codestado` char(2) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idtemp`),
  KEY `fk_ingfactfv` (`hidfactura`),
  KEY `fk_ingfract56fwr4` (`hidkardex`),
  KEY `id` (`id`),
  KEY `hidalentregas` (`hidalentrega`),
  CONSTRAINT `public_detingfactutra_ibfk_1` FOREIGN KEY (`hidfactura`) REFERENCES `public_ingfactura` (`id`),
  CONSTRAINT `public_tempdetingfactura_ibfk_1` FOREIGN KEY (`hidalentrega`) REFERENCES `public_alentregas` (`id`),
  CONSTRAINT `public_tempdetingfactura_ibfk_2` FOREIGN KEY (`hidalentrega`) REFERENCES `public_alentregas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_tempdetot
DROP TABLE IF EXISTS `public_tempdetot`;
CREATE TABLE IF NOT EXISTS `public_tempdetot` (
  `id` bigint(20) NOT NULL,
  `hidorden` bigint(20) NOT NULL,
  `nhoras` int(11) NOT NULL,
  `nhombres` int(11) NOT NULL,
  `item` varchar(3) NOT NULL,
  `textoactividad` varchar(40) NOT NULL,
  `codgrupoplan` varchar(3) NOT NULL,
  `codresponsable` varchar(8) NOT NULL,
  `fechainic` date NOT NULL,
  `fechafinprog` date NOT NULL,
  `fechacre` date NOT NULL,
  `flaginterno` varchar(1) NOT NULL,
  `codocu` varchar(3) NOT NULL,
  `codestado` varchar(2) NOT NULL,
  `codmaster` varchar(12) NOT NULL,
  `idinventario` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idusertemp` int(11) NOT NULL,
  `idtemp` bigint(20) NOT NULL AUTO_INCREMENT,
  `idstatus` int(11) NOT NULL,
  `idaux` bigint(20) DEFAULT NULL,
  `tipo` char(1) DEFAULT NULL,
  `txt` text,
  `cc` varchar(12) DEFAULT NULL,
  `codmon` char(50) DEFAULT NULL,
  `monto` decimal(12,3) DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `fechainiprog` date DEFAULT NULL,
  `avance` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtemp`),
  KEY `hidorden` (`hidorden`),
  KEY `item` (`item`),
  KEY `codmaster` (`codmaster`),
  KEY `idinventario` (`idinventario`),
  KEY `codresponsable_2` (`codresponsable`),
  KEY `codocu` (`codocu`,`codestado`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_tempdpeticion
DROP TABLE IF EXISTS `public_tempdpeticion`;
CREATE TABLE IF NOT EXISTS `public_tempdpeticion` (
  `id` bigint(20) NOT NULL,
  `idusertemp` int(11) NOT NULL,
  `hidpeticion` bigint(20) NOT NULL,
  `um` char(3) CHARACTER SET utf8 NOT NULL,
  `codart` varchar(10) CHARACTER SET utf8 NOT NULL,
  `punit` double NOT NULL,
  `plista` float NOT NULL,
  `igv_monto` float NOT NULL,
  `descuento` float NOT NULL,
  `pventa` float NOT NULL,
  `cant` double NOT NULL,
  `comentario` text CHARACTER SET utf8 NOT NULL,
  `codestado` char(2) CHARACTER SET utf8 NOT NULL,
  `codcen` varchar(4) CHARACTER SET utf8 NOT NULL,
  `codal` varchar(3) CHARACTER SET utf8 NOT NULL,
  `codocu` char(3) CHARACTER SET utf8 NOT NULL,
  `iduser` int(11) NOT NULL,
  `disponibilidad` char(2) CHARACTER SET utf8 NOT NULL,
  `idtemp` bigint(20) NOT NULL AUTO_INCREMENT,
  `item` char(3) CHARACTER SET utf8 DEFAULT NULL,
  `descripcion` varchar(40) CHARACTER SET utf8 NOT NULL,
  `idstatus` int(1) NOT NULL,
  `tipo` char(1) CHARACTER SET utf8 DEFAULT NULL,
  `imputacion` varchar(12) CHARACTER SET utf8 NOT NULL,
  `idparent` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `codservicio` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idtemp`) COMMENT 'p',
  KEY `um` (`um`),
  KEY `codestado` (`codestado`),
  KEY `codocu` (`codocu`),
  KEY `codart` (`codart`),
  KEY `codcen` (`codcen`),
  KEY `codal` (`codal`),
  KEY `fk_dtemppeticion_inventario` (`codart`,`codal`,`codcen`),
  KEY `imputacion` (`imputacion`),
  CONSTRAINT `public_tempdpeticion_ibfk_1` FOREIGN KEY (`um`) REFERENCES `public_ums` (`um`),
  CONSTRAINT `public_tempdpeticion_ibfk_2` FOREIGN KEY (`um`) REFERENCES `public_ums` (`um`),
  CONSTRAINT `public_tempdpeticion_ibfk_3` FOREIGN KEY (`codestado`) REFERENCES `public_estado` (`codestado`),
  CONSTRAINT `public_tempdpeticion_ibfk_4` FOREIGN KEY (`codocu`) REFERENCES `public_documentos` (`coddocu`),
  CONSTRAINT `public_tempdpeticion_ibfk_5` FOREIGN KEY (`codart`, `codal`, `codcen`) REFERENCES `public_alinventario` (`codart`, `codalm`, `codcen`),
  CONSTRAINT `public_tempdpeticion_ibfk_6` FOREIGN KEY (`imputacion`) REFERENCES `public_cc` (`codc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_tempimpuestosdocuaplicados
DROP TABLE IF EXISTS `public_tempimpuestosdocuaplicados`;
CREATE TABLE IF NOT EXISTS `public_tempimpuestosdocuaplicados` (
  `idtemp` bigint(20) NOT NULL AUTO_INCREMENT,
  `codocu` char(3) NOT NULL,
  `column_3` int(11) NOT NULL,
  `iddocu` bigint(20) NOT NULL,
  `codimpuesto` char(3) NOT NULL,
  `valorimpuesto` decimal(5,2) NOT NULL,
  `idusertemp` int(11) NOT NULL,
  `idstatus` int(11) DEFAULT NULL,
  `id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`idtemp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_temporadas
DROP TABLE IF EXISTS `public_temporadas`;
CREATE TABLE IF NOT EXISTS `public_temporadas` (
  `id` int(11) NOT NULL,
  `destemporada` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `inicio` char(19) COLLATE utf8_unicode_ci DEFAULT NULL,
  `termino` char(19) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cuota_anchoveta` int(11) DEFAULT NULL,
  `cuota_jurel` int(11) DEFAULT NULL,
  `cuota_global_anchoveta` int(11) DEFAULT NULL,
  `zonalitoral` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_tempotconsignacion
DROP TABLE IF EXISTS `public_tempotconsignacion`;
CREATE TABLE IF NOT EXISTS `public_tempotconsignacion` (
  `id` bigint(20) NOT NULL,
  `hidetot` bigint(20) DEFAULT NULL,
  `codcli` varchar(18) DEFAULT NULL,
  `cant` double DEFAULT NULL,
  `um` char(3) DEFAULT NULL,
  `codart` varchar(12) DEFAULT NULL,
  `fecnec` date DEFAULT NULL,
  `idusertemp` int(11) DEFAULT NULL,
  `idtemp` bigint(20) NOT NULL AUTO_INCREMENT,
  `identificador` bigint(20) DEFAULT NULL,
  `hidot` bigint(20) DEFAULT NULL,
  `descripcion` varchar(40) DEFAULT NULL,
  `textolargo` mediumtext,
  `idstatus` int(11) DEFAULT NULL,
  `centro` char(4) DEFAULT NULL,
  `codal` char(3) DEFAULT NULL,
  `item` varchar(3) DEFAULT NULL,
  `est` char(2) DEFAULT NULL,
  PRIMARY KEY (`idtemp`),
  KEY `Índice 1` (`id`),
  KEY `Índice 2` (`codart`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='tabla que guarda los registros temporales de lods repuestos yo materiales s que sesiiciutana los clientes,';

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_tenores
DROP TABLE IF EXISTS `public_tenores`;
CREATE TABLE IF NOT EXISTS `public_tenores` (
  `coddocu` varchar(3) CHARACTER SET utf8 NOT NULL,
  `mensaje` longtext CHARACTER SET utf8,
  `posicion` varchar(1) CHARACTER SET utf8 NOT NULL,
  `creadoel` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `modificadopor` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `modificadoel` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `creadopor` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `activo` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  `logo` text CHARACTER SET utf8,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sociedad` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `coddocu` (`coddocu`),
  KEY `posicion` (`posicion`),
  KEY `sociedad` (`sociedad`),
  KEY `tenorindex` (`coddocu`,`sociedad`,`posicion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_tipimputa
DROP TABLE IF EXISTS `public_tipimputa`;
CREATE TABLE IF NOT EXISTS `public_tipimputa` (
  `codimpu` varchar(1) NOT NULL,
  `desimputa` varchar(15) DEFAULT NULL,
  `validacion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_tipoactivos
DROP TABLE IF EXISTS `public_tipoactivos`;
CREATE TABLE IF NOT EXISTS `public_tipoactivos` (
  `codtipo` varchar(2) NOT NULL,
  `destipo` varchar(40) NOT NULL,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`codtipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_tipocambio
DROP TABLE IF EXISTS `public_tipocambio`;
CREATE TABLE IF NOT EXISTS `public_tipocambio` (
  `codmon1` varchar(3) DEFAULT NULL,
  `codmon2` varchar(3) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `denominador` int(11) DEFAULT NULL,
  `numerador` int(11) DEFAULT NULL,
  `ultima` char(19) DEFAULT NULL,
  `creadopor` varchar(20) DEFAULT NULL,
  `modificadopor` varchar(20) DEFAULT NULL,
  `compra` double DEFAULT NULL,
  `venta` double DEFAULT NULL,
  `cambio` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codmon1_2` (`codmon1`,`codmon2`),
  UNIQUE KEY `codmon2_2` (`codmon2`,`codmon1`),
  KEY `codmon1` (`codmon1`),
  KEY `codmon2` (`codmon2`),
  CONSTRAINT `public_tipocambio_ibfk_1` FOREIGN KEY (`codmon1`) REFERENCES `public_monedas` (`codmoneda`),
  CONSTRAINT `public_tipocambio_ibfk_2` FOREIGN KEY (`codmon2`) REFERENCES `public_monedas` (`codmoneda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_tipofacturacion
DROP TABLE IF EXISTS `public_tipofacturacion`;
CREATE TABLE IF NOT EXISTS `public_tipofacturacion` (
  `codtipofac` varchar(2) CHARACTER SET utf8 NOT NULL,
  `tipofacturacion` varchar(35) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`codtipofac`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_tipoflujocaja
DROP TABLE IF EXISTS `public_tipoflujocaja`;
CREATE TABLE IF NOT EXISTS `public_tipoflujocaja` (
  `codtipo` varchar(3) NOT NULL,
  `destipo` varchar(40) NOT NULL,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`codtipo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_tipolista
DROP TABLE IF EXISTS `public_tipolista`;
CREATE TABLE IF NOT EXISTS `public_tipolista` (
  `codtipo` char(3) NOT NULL,
  `destipo` varchar(50) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  PRIMARY KEY (`codtipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='AGRUPA LOS TIPOS DE LISTAS DE MATERIALES PARA HOJAS DE RUTA ';

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_tipomaquina
DROP TABLE IF EXISTS `public_tipomaquina`;
CREATE TABLE IF NOT EXISTS `public_tipomaquina` (
  `codtipo` varchar(2) NOT NULL,
  `tipo` varchar(25) DEFAULT NULL,
  `creadopor` varchar(25) DEFAULT NULL,
  `creadoel` varchar(20) DEFAULT NULL,
  `modificadopor` varchar(25) DEFAULT NULL,
  `modificadoel` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`codtipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_tipoobjeto
DROP TABLE IF EXISTS `public_tipoobjeto`;
CREATE TABLE IF NOT EXISTS `public_tipoobjeto` (
  `codigo` varchar(3) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_tipooc
DROP TABLE IF EXISTS `public_tipooc`;
CREATE TABLE IF NOT EXISTS `public_tipooc` (
  `codtipo` char(1) NOT NULL,
  `destipo` varchar(35) NOT NULL,
  PRIMARY KEY (`codtipo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_tipoperacionactivos
DROP TABLE IF EXISTS `public_tipoperacionactivos`;
CREATE TABLE IF NOT EXISTS `public_tipoperacionactivos` (
  `codop` char(3) NOT NULL,
  `desop` varchar(40) NOT NULL,
  PRIMARY KEY (`codop`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_tiposolicitudesactivos
DROP TABLE IF EXISTS `public_tiposolicitudesactivos`;
CREATE TABLE IF NOT EXISTS `public_tiposolicitudesactivos` (
  `codtipo` varchar(1) CHARACTER SET utf8 NOT NULL,
  `destipo` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`codtipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_tiposolpe
DROP TABLE IF EXISTS `public_tiposolpe`;
CREATE TABLE IF NOT EXISTS `public_tiposolpe` (
  `codtipo` char(1) NOT NULL DEFAULT '',
  `destipo` varchar(32) DEFAULT NULL,
  `libre` char(1) DEFAULT NULL,
  `creadoel` varchar(20) DEFAULT NULL,
  `modificadopor` varchar(25) DEFAULT NULL,
  `modificadoel` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`codtipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_trabajadores
DROP TABLE IF EXISTS `public_trabajadores`;
CREATE TABLE IF NOT EXISTS `public_trabajadores` (
  `codigotra` varchar(6) NOT NULL,
  `ap` varchar(30) DEFAULT NULL,
  `am` varchar(35) DEFAULT NULL,
  `nombres` varchar(25) DEFAULT NULL,
  `dni` varchar(12) DEFAULT NULL,
  `codpuesto` varchar(3) DEFAULT NULL,
  `cumple` date DEFAULT NULL,
  `fecingreso` date DEFAULT NULL,
  `domicilio` varchar(60) DEFAULT NULL,
  `tiposangre` varchar(5) DEFAULT NULL,
  `telfijo` varchar(8) DEFAULT NULL,
  `telmoviles` varchar(30) DEFAULT NULL,
  `referencia` varchar(30) DEFAULT NULL,
  `activo` char(1) NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `prefijo` char(1) DEFAULT NULL,
  `correlativo` int(11) NOT NULL,
  `alimentacion` char(1) NOT NULL,
  PRIMARY KEY (`codigotra`),
  KEY `FKI_OFICIOS` (`codpuesto`),
  CONSTRAINT `public_trabajadores_ibfk_1` FOREIGN KEY (`codpuesto`) REFERENCES `public_oficios` (`codof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_ubigeos
DROP TABLE IF EXISTS `public_ubigeos`;
CREATE TABLE IF NOT EXISTS `public_ubigeos` (
  `coddep` varchar(2) NOT NULL,
  `codprov` varchar(2) NOT NULL,
  `coddist` varchar(2) NOT NULL,
  `departamento` varchar(40) NOT NULL,
  `provincia` varchar(40) NOT NULL,
  `distrito` varchar(40) NOT NULL,
  `id` int(11) NOT NULL,
  UNIQUE KEY `coddep` (`coddep`,`codprov`,`coddist`),
  KEY `Índice 1` (`codprov`,`coddep`,`coddist`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_ubl
DROP TABLE IF EXISTS `public_ubl`;
CREATE TABLE IF NOT EXISTS `public_ubl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codocu` char(3) CHARACTER SET utf8 NOT NULL,
  `nombrecampo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ubltag` varchar(300) CHARACTER SET utf8 NOT NULL COMMENT 'tqirqa ubl, pra hacer los taqgs XML',
  `xmltag` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_ums
DROP TABLE IF EXISTS `public_ums`;
CREATE TABLE IF NOT EXISTS `public_ums` (
  `um` varchar(3) CHARACTER SET utf8 NOT NULL,
  `desum` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `k_ums` (`um`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_usuariosfavoritos
DROP TABLE IF EXISTS `public_usuariosfavoritos`;
CREATE TABLE IF NOT EXISTS `public_usuariosfavoritos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hiduser` bigint(20) DEFAULT NULL,
  `url` text,
  `fecharegistro` char(19) DEFAULT NULL,
  `valido` varchar(1) DEFAULT NULL,
  `chapa` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla nautilus.public_valorimpuestos
DROP TABLE IF EXISTS `public_valorimpuestos`;
CREATE TABLE IF NOT EXISTS `public_valorimpuestos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hcodimpuesto` char(3) NOT NULL,
  `valor` decimal(6,2) NOT NULL,
  `finicio` date NOT NULL,
  `ffinal` date NOT NULL,
  `activo` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hcodimpuesto` (`hcodimpuesto`),
  CONSTRAINT `public_valorimpuestos_ibfk_1` FOREIGN KEY (`hcodimpuesto`) REFERENCES `public_impuestos` (`codimpuesto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para vista nautilus.vw_alinventario
DROP VIEW IF EXISTS `vw_alinventario`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_alinventario` (
	`numlote` VARCHAR(32) NULL COLLATE 'utf8_general_ci',
	`cantlote` DOUBLE NULL,
	`fechavenc` DATE NULL,
	`fechafabri` DATE NULL,
	`punitlote` DOUBLE NULL,
	`ordenlote` INT(11) NULL,
	`codalm` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`fechainicio` CHAR(19) NULL COLLATE 'utf8_unicode_ci',
	`fechafin` CHAR(19) NULL COLLATE 'utf8_unicode_ci',
	`periodocontable` VARCHAR(4) NULL COLLATE 'utf8_general_ci',
	`codresponsable` VARCHAR(4) NULL COLLATE 'utf8_general_ci',
	`codart` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`codcen` VARCHAR(4) NULL COLLATE 'utf8_general_ci',
	`um` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`cantlibre` DOUBLE NULL,
	`canttran` DOUBLE NULL,
	`cantres` DOUBLE NULL,
	`ubicacion` VARCHAR(12) NULL COLLATE 'utf8_general_ci',
	`lote` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`siid` BIGINT(20) NULL,
	`ssiduser` VARCHAR(30) NULL COLLATE 'utf8_general_ci',
	`id` BIGINT(20) NOT NULL,
	`punit` DOUBLE NULL,
	`codmon` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`descripcion` VARCHAR(60) NULL COLLATE 'utf8_general_ci',
	`codtipo` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`desum` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`ptlibre` DOUBLE(20,3) NULL,
	`pttran` DOUBLE(20,3) NULL,
	`ptres` DOUBLE(20,3) NULL,
	`pttotal` DOUBLE(20,3) NULL
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_alinventario_resumen
DROP VIEW IF EXISTS `vw_alinventario_resumen`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_alinventario_resumen` (
	`stocklibre` DOUBLE(20,3) NULL,
	`stocktran` DOUBLE(20,3) NULL,
	`stockres` DOUBLE(20,3) NULL,
	`stocktotal` DOUBLE(20,3) NULL,
	`codalm` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`codcen` VARCHAR(4) NULL COLLATE 'utf8_general_ci',
	`codtipo` VARCHAR(2) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_almacendocs
DROP VIEW IF EXISTS `vw_almacendocs`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_almacendocs` (
	`numvale` CHAR(12) NULL COLLATE 'utf8_general_ci',
	`nomal` VARCHAR(35) NULL COLLATE 'utf8_general_ci',
	`montomovido` DOUBLE NOT NULL,
	`codmoneda` CHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`nomcen` VARCHAR(35) NULL COLLATE 'utf8_general_ci',
	`nombredocumento` VARCHAR(45) NULL COLLATE 'utf8_general_ci',
	`codtrabajador` CHAR(4) NULL COLLATE 'utf8_general_ci',
	`cestadovale` CHAR(2) NULL COLLATE 'utf8_general_ci',
	`fechacont` DATE NULL,
	`fechacre` TIMESTAMP NOT NULL,
	`idvale` BIGINT(20) NOT NULL,
	`textolargo` TEXT NULL COLLATE 'utf8_unicode_ci',
	`fechavale` DATE NULL,
	`codart` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`codmov` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`valido` VARCHAR(1) NULL COLLATE 'utf8_general_ci',
	`preciounit` DOUBLE NULL,
	`lote` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`destino` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`checki` VARCHAR(1) NULL COLLATE 'utf8_general_ci',
	`cant` DOUBLE NULL,
	`idref` BIGINT(20) NULL,
	`alemi` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`aldes` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`fecha` CHAR(19) NULL COLLATE 'utf8_unicode_ci',
	`coddoc` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`numdoc` VARCHAR(15) NULL COLLATE 'utf8_general_ci',
	`usuario` VARCHAR(25) NULL COLLATE 'utf8_general_ci',
	`um` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`comentario` VARCHAR(40) NULL COLLATE 'utf8_unicode_ci',
	`codocuref` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`numdocref` VARCHAR(15) NULL COLLATE 'utf8_general_ci',
	`codcentro` VARCHAR(4) NULL COLLATE 'utf8_general_ci',
	`id` BIGINT(20) NOT NULL,
	`codestado` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`prefijo` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`fechadoc` CHAR(19) NULL COLLATE 'utf8_unicode_ci',
	`correlativo` VARCHAR(12) NULL COLLATE 'utf8_general_ci',
	`numkardex` VARCHAR(14) NULL COLLATE 'utf8_general_ci',
	`solicitante` VARCHAR(18) NULL COLLATE 'utf8_general_ci',
	`hidvale` BIGINT(20) NULL,
	`descripcion` VARCHAR(60) NULL COLLATE 'utf8_general_ci',
	`desdocu` VARCHAR(45) NULL COLLATE 'utf8_general_ci',
	`movimiento` VARCHAR(35) NULL COLLATE 'utf8_general_ci',
	`desum` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`iduser` INT(11) NOT NULL
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_alreservas
DROP VIEW IF EXISTS `vw_alreservas`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_alreservas` (
	`codart` VARCHAR(10) NOT NULL COLLATE 'utf8_general_ci',
	`txtmaterial` VARCHAR(40) NOT NULL COLLATE 'utf8_general_ci',
	`hidesolpe` BIGINT(20) NULL,
	`id` BIGINT(20) NOT NULL,
	`cant` DOUBLE NULL,
	`numreserva` INT(11) NOT NULL,
	`atendido` CHAR(19) NULL COLLATE 'utf8_general_ci',
	`usuario` VARCHAR(25) NULL COLLATE 'utf8_general_ci',
	`fechares` CHAR(19) NULL COLLATE 'utf8_unicode_ci',
	`estadoreserva` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`codocu` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`desum` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`estado` VARCHAR(25) NULL COLLATE 'utf8_general_ci',
	`desdocu` VARCHAR(45) NULL COLLATE 'utf8_general_ci',
	`numero` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`item` CHAR(3) NULL COLLATE 'utf8_general_ci',
	`um` CHAR(3) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_atencionessolpe
DROP VIEW IF EXISTS `vw_atencionessolpe`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_atencionessolpe` (
	`item` CHAR(3) NULL COLLATE 'utf8_general_ci',
	`iddesolpe` BIGINT(20) NOT NULL,
	`cantdesolpe` FLOAT NULL,
	`numvale` CHAR(12) NULL COLLATE 'utf8_general_ci',
	`desumsolpe` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`idsolpe` BIGINT(20) NULL,
	`umsolpe` CHAR(3) NULL COLLATE 'utf8_general_ci',
	`cantreserva` DOUBLE NULL,
	`codocu` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`numreserva` INT(11) NULL,
	`estadoreserva` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`id` BIGINT(20) NULL,
	`cant` DOUBLE NULL,
	`hidreserva` BIGINT(20) NULL,
	`hidkardex` BIGINT(20) NULL,
	`estadoatencion` CHAR(2) NULL COLLATE 'utf8_general_ci',
	`codmov` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`um` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`numkardex` VARCHAR(14) NULL COLLATE 'utf8_general_ci',
	`usuario` VARCHAR(25) NULL COLLATE 'utf8_general_ci',
	`codart` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`preciounit` DOUBLE NULL,
	`fecha` CHAR(19) NULL COLLATE 'utf8_unicode_ci',
	`monto` DOUBLE NULL,
	`ceco` VARCHAR(12) NULL COLLATE 'utf8_general_ci',
	`txtmaterial` VARCHAR(40) NOT NULL COLLATE 'utf8_general_ci',
	`desumkardex` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`movimiento` VARCHAR(35) NULL COLLATE 'utf8_general_ci',
	`iduser` INT(11) NULL
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_contactos
DROP VIEW IF EXISTS `vw_contactos`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_contactos` (
	`id` INT(11) NOT NULL,
	`c_nombre` VARCHAR(30) NOT NULL COLLATE 'utf8_general_ci',
	`correlativo` VARCHAR(5) NULL COLLATE 'utf8_general_ci',
	`c_hcod` VARCHAR(6) NOT NULL COLLATE 'utf8_general_ci',
	`despro` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
	`c_cargo` VARCHAR(30) NULL COLLATE 'utf8_general_ci',
	`c_mail` VARCHAR(30) NULL COLLATE 'utf8_general_ci',
	`c_tel` VARCHAR(30) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_costos
DROP VIEW IF EXISTS `vw_costos`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_costos` (
	`id` INT(11) NOT NULL,
	`ceco` VARCHAR(12) NULL COLLATE 'utf8_general_ci',
	`fechacontable` DATE NULL,
	`monto` DOUBLE NULL,
	`codmoneda` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`usuario` VARCHAR(25) NULL COLLATE 'utf8_general_ci',
	`idref` BIGINT(20) NULL,
	`tipo` VARCHAR(1) NULL COLLATE 'utf8_general_ci',
	`ano` CHAR(4) NOT NULL COLLATE 'utf8_general_ci',
	`mes` CHAR(2) NOT NULL COLLATE 'utf8_general_ci',
	`clasecolector` CHAR(1) NOT NULL COLLATE 'utf8_general_ci',
	`iduser` INT(11) NOT NULL,
	`numvale` CHAR(12) NULL COLLATE 'utf8_general_ci',
	`codart` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`codmov` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`valido` VARCHAR(1) NULL COLLATE 'utf8_general_ci',
	`destino` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`checki` VARCHAR(1) NULL COLLATE 'utf8_general_ci',
	`cant` DOUBLE NULL,
	`alemi` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`aldes` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`fecha` CHAR(19) NULL COLLATE 'utf8_unicode_ci',
	`coddoc` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`numdoc` VARCHAR(15) NULL COLLATE 'utf8_general_ci',
	`um` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`comentario` VARCHAR(40) NULL COLLATE 'utf8_unicode_ci',
	`codocuref` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`numdocref` VARCHAR(15) NULL COLLATE 'utf8_general_ci',
	`codcentro` VARCHAR(4) NULL COLLATE 'utf8_general_ci',
	`idkardex` BIGINT(20) NOT NULL,
	`codestado` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`prefijo` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`fechadoc` CHAR(19) NULL COLLATE 'utf8_unicode_ci',
	`correlativo` VARCHAR(12) NULL COLLATE 'utf8_general_ci',
	`numkardex` VARCHAR(14) NULL COLLATE 'utf8_general_ci',
	`solicitante` VARCHAR(18) NULL COLLATE 'utf8_general_ci',
	`hidvale` BIGINT(20) NULL,
	`descripcion` VARCHAR(60) NULL COLLATE 'utf8_general_ci',
	`desdocu` VARCHAR(45) NULL COLLATE 'utf8_general_ci',
	`movimiento` VARCHAR(35) NULL COLLATE 'utf8_general_ci',
	`desum` VARCHAR(20) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_despacho
DROP VIEW IF EXISTS `vw_despacho`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_despacho` (
	`id` BIGINT(20) NOT NULL,
	`hidpunto` INT(11) NOT NULL,
	`hidkardex` BIGINT(20) NOT NULL,
	`fechacreac` DATE NOT NULL,
	`fechaprog` DATE NOT NULL,
	`descripcion` VARCHAR(60) NOT NULL COLLATE 'utf8_general_ci',
	`responsable` VARCHAR(4) NOT NULL COLLATE 'utf8_general_ci',
	`iduser` INT(11) NOT NULL,
	`vigente` CHAR(1) NOT NULL COLLATE 'utf8_general_ci',
	`codart` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`codcentro` CHAR(4) NULL COLLATE 'utf8_general_ci',
	`um` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`nombrepunto` VARCHAR(40) NOT NULL COLLATE 'utf8_general_ci',
	`codalmacen` CHAR(3) NULL COLLATE 'utf8_general_ci',
	`descripmaterial` VARCHAR(60) NULL COLLATE 'utf8_general_ci',
	`cant` DOUBLE NULL,
	`desum` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`idkardex` BIGINT(20) NOT NULL,
	`numdocref` VARCHAR(15) NULL COLLATE 'utf8_general_ci',
	`numvale` CHAR(12) NULL COLLATE 'utf8_general_ci',
	`hidvale` BIGINT(20) NULL,
	`movimiento` VARCHAR(35) NULL COLLATE 'utf8_general_ci',
	`ap` VARCHAR(30) NULL COLLATE 'utf8_general_ci',
	`am` VARCHAR(35) NULL COLLATE 'utf8_general_ci',
	`nombres` VARCHAR(25) NULL COLLATE 'utf8_general_ci',
	`codocuref` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`desdocu` VARCHAR(45) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_despachogeneral
DROP VIEW IF EXISTS `vw_despachogeneral`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_despachogeneral` (
	`hidvale` BIGINT(20) NULL,
	`codcentro` CHAR(4) NULL COLLATE 'utf8_general_ci',
	`codalmacen` CHAR(3) NULL COLLATE 'utf8_general_ci',
	`nombrepunto` VARCHAR(40) NOT NULL COLLATE 'utf8_general_ci',
	`numvale` CHAR(12) NULL COLLATE 'utf8_general_ci',
	`movimiento` VARCHAR(35) NULL COLLATE 'utf8_general_ci',
	`items` BIGINT(21) NOT NULL
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_detalleingresofactura
DROP VIEW IF EXISTS `vw_detalleingresofactura`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_detalleingresofactura` (
	`idtemp` BIGINT(20) NOT NULL,
	`id` INT(11) NOT NULL,
	`moneda` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`hidfactura` BIGINT(20) NOT NULL,
	`item` VARCHAR(3) NOT NULL COLLATE 'utf8_unicode_ci',
	`hidkardex` BIGINT(20) NOT NULL,
	`iduser` INT(11) NOT NULL,
	`fechacrea` DATETIME NOT NULL,
	`hidalentrega` BIGINT(20) NULL,
	`cant` DOUBLE NOT NULL,
	`identrega` BIGINT(20) NOT NULL,
	`iddetcompra` BIGINT(20) NULL,
	`cantentregada` DOUBLE NULL,
	`fechaentrega` CHAR(19) NULL COLLATE 'utf8_unicode_ci',
	`idkardex` BIGINT(20) NULL,
	`punitentrega` DOUBLE NOT NULL,
	`codart` VARCHAR(8) NOT NULL COLLATE 'utf8_general_ci',
	`cantcompras` DOUBLE NOT NULL,
	`punitcompra` DOUBLE NOT NULL,
	`itemcompra` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`descri` VARCHAR(40) NOT NULL COLLATE 'utf8_general_ci',
	`codentro` VARCHAR(4) NULL COLLATE 'utf8_general_ci',
	`desum` VARCHAR(20) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_detalleingresofacturafirme
DROP VIEW IF EXISTS `vw_detalleingresofacturafirme`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_detalleingresofacturafirme` (
	`id` BIGINT(20) NOT NULL,
	`cant` DOUBLE NOT NULL,
	`hidfactura` BIGINT(20) NOT NULL,
	`item` VARCHAR(3) NOT NULL COLLATE 'utf8_unicode_ci',
	`hidkardex` BIGINT(20) NOT NULL,
	`montofacturado` DOUBLE NOT NULL,
	`iduser` INT(11) NOT NULL,
	`fechacrea` DATETIME NOT NULL,
	`hidalentrega` BIGINT(20) NOT NULL,
	`identrega` BIGINT(20) NOT NULL,
	`iddetcompra` BIGINT(20) NULL,
	`cantentregada` DOUBLE NULL,
	`fechaentrega` CHAR(19) NULL COLLATE 'utf8_unicode_ci',
	`idkardex` BIGINT(20) NULL,
	`punitentrega` DOUBLE NOT NULL,
	`codart` VARCHAR(8) NOT NULL COLLATE 'utf8_general_ci',
	`cantcompras` DOUBLE NOT NULL,
	`punitcompra` DOUBLE NOT NULL,
	`itemcompra` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`descri` VARCHAR(40) NOT NULL COLLATE 'utf8_general_ci',
	`codentro` VARCHAR(4) NULL COLLATE 'utf8_general_ci',
	`desum` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`numocompra` VARCHAR(12) NOT NULL COLLATE 'utf8_general_ci',
	`numrecepcion` VARCHAR(10) NOT NULL COLLATE 'utf8_general_ci',
	`seriedoc` VARCHAR(5) NOT NULL COLLATE 'utf8_general_ci',
	`numerodoc` VARCHAR(13) NOT NULL COLLATE 'utf8_general_ci',
	`codpro` VARCHAR(6) NOT NULL COLLATE 'utf8_general_ci',
	`fechadoc` DATE NOT NULL,
	`fecha` DATE NOT NULL,
	`despro` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
	`moneda` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_detalle_guia
DROP VIEW IF EXISTS `vw_detalle_guia`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_detalle_guia` (
	`m_obs` LONGTEXT NULL COLLATE 'utf8_general_ci',
	`desum` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`idtemp` BIGINT(20) NOT NULL,
	`id` BIGINT(20) NOT NULL,
	`c_af` VARCHAR(1) NULL COLLATE 'utf8_general_ci',
	`n_hguia` BIGINT(20) NULL,
	`c_itguia` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`n_cangui` DOUBLE NULL,
	`idstatus` INT(11) NOT NULL,
	`c_codgui` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`c_edgui` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`c_descri` VARCHAR(40) NULL COLLATE 'utf8_general_ci',
	`c_um` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`c_codep` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`c_estado` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`c_codactivo` VARCHAR(13) NULL COLLATE 'utf8_general_ci',
	`c_codsap` VARCHAR(5) NULL COLLATE 'utf8_general_ci',
	`nomep` VARCHAR(25) NULL COLLATE 'utf8_general_ci',
	`estado` VARCHAR(25) NULL COLLATE 'utf8_general_ci',
	`desmotivo` VARCHAR(30) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_detercuentas
DROP VIEW IF EXISTS `vw_detercuentas`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_detercuentas` (
	`codop` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`codcatval` VARCHAR(4) NULL COLLATE 'utf8_general_ci',
	`cuentadebe` VARCHAR(18) NULL COLLATE 'utf8_general_ci',
	`cuentahaber` VARCHAR(18) NULL COLLATE 'utf8_general_ci',
	`id` INT(11) NOT NULL,
	`activo` CHAR(1) NULL COLLATE 'utf8_general_ci',
	`desop` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`descat` VARCHAR(30) NULL COLLATE 'utf8_general_ci',
	`debe` VARCHAR(35) NULL COLLATE 'utf8_general_ci',
	`haber` VARCHAR(35) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_entregas
DROP VIEW IF EXISTS `vw_entregas`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_entregas` (
	`numvale` CHAR(12) NULL COLLATE 'utf8_general_ci',
	`montomovido` DOUBLE NOT NULL,
	`codmoneda` CHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`cestadovale` CHAR(2) NULL COLLATE 'utf8_general_ci',
	`fechacont` DATE NULL,
	`fechacre` TIMESTAMP NOT NULL,
	`idvale` BIGINT(20) NOT NULL,
	`textolargo` TEXT NULL COLLATE 'utf8_unicode_ci',
	`fechavale` DATE NULL,
	`codart` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`codmov` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`preciounit` DOUBLE NULL,
	`cant` DOUBLE NULL,
	`idref` BIGINT(20) NULL,
	`alemi` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`aldes` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`fecha` CHAR(19) NULL COLLATE 'utf8_unicode_ci',
	`coddoc` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`um` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`comentario` VARCHAR(40) NULL COLLATE 'utf8_unicode_ci',
	`codocuref` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`numdocref` VARCHAR(15) NULL COLLATE 'utf8_general_ci',
	`codcentro` VARCHAR(4) NULL COLLATE 'utf8_general_ci',
	`id` BIGINT(20) NOT NULL,
	`codestado` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`tipologia` VARCHAR(1) NOT NULL COLLATE 'utf8_general_ci',
	`fechaoc` CHAR(19) NULL COLLATE 'utf8_general_ci',
	`hidvale` BIGINT(20) NULL,
	`desum` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`iduser` INT(11) NOT NULL,
	`idguia` INT(11) NOT NULL,
	`numcot` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`item` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`descri` VARCHAR(40) NOT NULL COLLATE 'utf8_general_ci',
	`despro` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
	`rucpro` VARCHAR(11) NOT NULL COLLATE 'utf8_general_ci',
	`codpro` VARCHAR(6) NOT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_eventos
DROP VIEW IF EXISTS `vw_eventos`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_eventos` (
	`id` INT(11) NOT NULL,
	`codocu` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`estadofinal` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`estadoinicial` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`descripcion` VARCHAR(30) NULL COLLATE 'utf8_general_ci',
	`creadopor` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`creadoel` VARCHAR(15) NULL COLLATE 'utf8_general_ci',
	`einicial` VARCHAR(25) NULL COLLATE 'utf8_general_ci',
	`desdocu` VARCHAR(45) NULL COLLATE 'utf8_general_ci',
	`efinal` VARCHAR(25) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_guia
DROP VIEW IF EXISTS `vw_guia`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_guia` (
	`id` BIGINT(20) NOT NULL,
	`desdocu` VARCHAR(45) NULL COLLATE 'utf8_general_ci',
	`c_numgui` VARCHAR(8) NULL COLLATE 'utf8_general_ci',
	`c_coclig` VARCHAR(6) NULL COLLATE 'utf8_general_ci',
	`cod_cen` VARCHAR(4) NULL COLLATE 'utf8_general_ci',
	`d_fecgui` CHAR(19) NULL COLLATE 'utf8_general_ci',
	`c_estgui` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`c_rsguia` VARCHAR(1) NULL COLLATE 'utf8_general_ci',
	`c_codtra` VARCHAR(6) NULL COLLATE 'utf8_general_ci',
	`c_trans` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`codocu` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`c_motivo` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`c_placa` VARCHAR(15) NULL COLLATE 'utf8_general_ci',
	`c_licon` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`d_fectra` CHAR(19) NULL COLLATE 'utf8_general_ci',
	`n_direc` INT(11) NULL,
	`c_desgui` LONGTEXT NULL COLLATE 'utf8_general_ci',
	`n_guia` BIGINT(20) NOT NULL,
	`c_texto` LONGTEXT NULL COLLATE 'utf8_general_ci',
	`c_dirsoc` VARCHAR(1) NULL COLLATE 'utf8_general_ci',
	`c_serie` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`c_salida` VARCHAR(1) NULL COLLATE 'utf8_general_ci',
	`n_direcformaldes` INT(11) NULL,
	`n_directran` INT(11) NULL,
	`n_dirsoc` INT(11) NULL,
	`c_estado` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`n_hguia` BIGINT(11) NOT NULL,
	`c_itguia` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`c_af` VARCHAR(1) NULL COLLATE 'utf8_general_ci',
	`c_codsap` VARCHAR(5) NULL COLLATE 'utf8_general_ci',
	`hidref` BIGINT(20) NULL,
	`docref` VARCHAR(12) NULL COLLATE 'utf8_general_ci',
	`n_cangui` DOUBLE NULL,
	`c_codgui` VARCHAR(8) NULL COLLATE 'utf8_general_ci',
	`c_edgui` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`c_descri` VARCHAR(40) NULL COLLATE 'utf8_general_ci',
	`m_obs` LONGTEXT NULL COLLATE 'utf8_general_ci',
	`c_codactivo` VARCHAR(13) NULL COLLATE 'utf8_general_ci',
	`c_um` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`c_codep` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`l_libre` VARCHAR(1) NULL COLLATE 'utf8_general_ci',
	`ptopartida` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
	`desmotivo` VARCHAR(30) NULL COLLATE 'utf8_general_ci',
	`distpartida` VARCHAR(40) NULL COLLATE 'utf8_general_ci',
	`provpartida` VARCHAR(40) NULL COLLATE 'utf8_general_ci',
	`dptopartida` VARCHAR(40) NULL COLLATE 'utf8_general_ci',
	`direcciontransportista` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
	`direccionformaldes` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
	`ptollegada` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
	`distllegada` VARCHAR(40) NULL COLLATE 'utf8_general_ci',
	`provllegada` VARCHAR(40) NULL COLLATE 'utf8_general_ci',
	`dptollegada` VARCHAR(40) NULL COLLATE 'utf8_general_ci',
	`razondestinatario` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
	`n_hconformidad` DOUBLE NULL,
	`rucdestinatario` VARCHAR(11) NOT NULL COLLATE 'utf8_general_ci',
	`ructrans` VARCHAR(11) NOT NULL COLLATE 'utf8_general_ci',
	`razontransportista` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
	`rucsoc` VARCHAR(12) NOT NULL COLLATE 'utf8_general_ci',
	`nomep` VARCHAR(25) NULL COLLATE 'utf8_general_ci',
	`estadodetalle` VARCHAR(25) NULL COLLATE 'utf8_general_ci',
	`estado` VARCHAR(25) NULL COLLATE 'utf8_general_ci',
	`nombreobjeto` VARCHAR(40) NULL COLLATE 'utf8_general_ci',
	`y_report` INT(11) NOT NULL,
	`x_report` INT(11) NOT NULL,
	`desum` VARCHAR(20) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_hojaruta
DROP VIEW IF EXISTS `vw_hojaruta`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_hojaruta` (
	`nombrelista` VARCHAR(60) NOT NULL COLLATE 'utf8_general_ci',
	`comentario` TEXT NOT NULL COLLATE 'utf8_general_ci',
	`id` BIGINT(20) NOT NULL,
	`idmasterlistamateriales` BIGINT(20) NOT NULL,
	`descripcion` VARCHAR(60) NULL COLLATE 'utf8_general_ci',
	`codigo` VARCHAR(18) NULL COLLATE 'utf8_general_ci',
	`hidlista` BIGINT(20) NULL,
	`iddetallelista` BIGINT(20) NOT NULL,
	`codart` VARCHAR(10) NOT NULL COLLATE 'utf8_general_ci',
	`um` CHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`cant` DOUBLE NOT NULL,
	`desum` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`codtipo` CHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`destipo` VARCHAR(50) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_imputaciones
DROP VIEW IF EXISTS `vw_imputaciones`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_imputaciones` (
	`desimputa` VARCHAR(35) NULL COLLATE 'utf8_general_ci',
	`codc` VARCHAR(12) NOT NULL COLLATE 'utf8_general_ci',
	`cc` VARCHAR(30) NULL COLLATE 'utf8_general_ci',
	`centro` VARCHAR(4) NULL COLLATE 'utf8_general_ci',
	`desceco` VARCHAR(35) NULL COLLATE 'utf8_general_ci',
	`vale` VARCHAR(1) NULL COLLATE 'utf8_general_ci',
	`validodel` DATE NULL,
	`validoal` DATE NULL,
	`explicacion` LONGTEXT NULL COLLATE 'utf8_general_ci',
	`clasecolector` CHAR(1) NOT NULL COLLATE 'utf8_general_ci',
	`semaforopresup` CHAR(1) NOT NULL COLLATE 'utf8_general_ci',
	`codgrupo` VARCHAR(4) NOT NULL COLLATE 'utf8_general_ci',
	`codclase` CHAR(2) NOT NULL COLLATE 'utf8_general_ci',
	`correlativo` VARCHAR(6) NOT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_inventariosimple
DROP VIEW IF EXISTS `vw_inventariosimple`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_inventariosimple` (
	`descripcion` VARCHAR(60) NULL COLLATE 'utf8_general_ci',
	`punit` DOUBLE NULL,
	`ubicacion` VARCHAR(12) NULL COLLATE 'utf8_general_ci',
	`desum` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`codart` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`codalm` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`codcen` VARCHAR(4) NULL COLLATE 'utf8_general_ci',
	`cantlibre` DOUBLE NULL,
	`id` BIGINT(20) NOT NULL,
	`ptlibre` DOUBLE(20,3) NULL,
	`pttran` DOUBLE(20,3) NULL,
	`ptres` DOUBLE(20,3) NULL,
	`pttotal` DOUBLE(20,3) NULL
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_kardex
DROP VIEW IF EXISTS `vw_kardex`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_kardex` (
	`numvale` CHAR(12) NULL COLLATE 'utf8_general_ci',
	`codmoneda` CHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`montomovido` DOUBLE NOT NULL,
	`codart` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`codmov` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`valido` VARCHAR(1) NULL COLLATE 'utf8_general_ci',
	`destino` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`checki` VARCHAR(1) NULL COLLATE 'utf8_general_ci',
	`cant` DOUBLE NULL,
	`idref` BIGINT(20) NULL,
	`alemi` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`aldes` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`fecha` CHAR(19) NULL COLLATE 'utf8_unicode_ci',
	`coddoc` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`numdoc` VARCHAR(15) NULL COLLATE 'utf8_general_ci',
	`usuario` VARCHAR(25) NULL COLLATE 'utf8_general_ci',
	`um` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`comentario` VARCHAR(40) NULL COLLATE 'utf8_unicode_ci',
	`codocuref` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`numdocref` VARCHAR(15) NULL COLLATE 'utf8_general_ci',
	`codcentro` VARCHAR(4) NULL COLLATE 'utf8_general_ci',
	`id` BIGINT(20) NOT NULL,
	`codestado` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`prefijo` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`fechadoc` CHAR(19) NULL COLLATE 'utf8_unicode_ci',
	`correlativo` VARCHAR(12) NULL COLLATE 'utf8_general_ci',
	`numkardex` VARCHAR(14) NULL COLLATE 'utf8_general_ci',
	`solicitante` VARCHAR(18) NULL COLLATE 'utf8_general_ci',
	`hidvale` BIGINT(20) NULL,
	`descripcion` VARCHAR(60) NULL COLLATE 'utf8_general_ci',
	`desdocu` VARCHAR(45) NULL COLLATE 'utf8_general_ci',
	`movimiento` VARCHAR(35) NULL COLLATE 'utf8_general_ci',
	`desum` VARCHAR(20) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_lugares
DROP VIEW IF EXISTS `vw_lugares`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_lugares` (
	`despro` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
	`codlugar` VARCHAR(6) NOT NULL COLLATE 'utf8_general_ci',
	`deslugar` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`claselugar` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`codpro` VARCHAR(6) NULL COLLATE 'utf8_general_ci',
	`id` INT(11) NOT NULL,
	`n_direc` INT(11) NOT NULL,
	`c_direc` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
	`departamento` VARCHAR(40) NOT NULL COLLATE 'utf8_general_ci',
	`provincia` VARCHAR(40) NOT NULL COLLATE 'utf8_general_ci',
	`distrito` VARCHAR(40) NOT NULL COLLATE 'utf8_general_ci',
	`numeroactivos` BIGINT(21) NOT NULL
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_maestrodetalle
DROP VIEW IF EXISTS `vw_maestrodetalle`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_maestrodetalle` (
	`codigo` VARCHAR(10) NOT NULL COLLATE 'utf8_general_ci',
	`marca` VARCHAR(35) NULL COLLATE 'utf8_general_ci',
	`desum` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`descripcion` VARCHAR(60) NULL COLLATE 'utf8_general_ci',
	`nparte` VARCHAR(35) NULL COLLATE 'utf8_general_ci',
	`um` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`codtipo` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`esrotativo` CHAR(1) NOT NULL COLLATE 'utf8_general_ci',
	`canteconomica` DOUBLE NULL,
	`supervisionautomatica` VARCHAR(1) NULL COLLATE 'utf8_general_ci',
	`cantreposic` DOUBLE NULL,
	`canaldist` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`cantreorden` DOUBLE NULL,
	`catval` VARCHAR(4) NULL COLLATE 'utf8_general_ci',
	`codal` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`codcentro` VARCHAR(4) NOT NULL COLLATE 'utf8_general_ci',
	`controlprecio` VARCHAR(1) NULL COLLATE 'utf8_general_ci',
	`sujetolote` CHAR(1) NOT NULL COLLATE 'utf8_general_ci',
	`tolerancia` DECIMAL(2,2) NOT NULL
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_movimientos
DROP VIEW IF EXISTS `vw_movimientos`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_movimientos` (
	`m_obs` LONGTEXT NULL COLLATE 'utf8_general_ci',
	`c_serie` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`desum` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`idtemp` BIGINT(20) NOT NULL,
	`id` BIGINT(20) NOT NULL,
	`n_hguia` BIGINT(11) NOT NULL,
	`c_itguia` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`n_cangui` DOUBLE NULL,
	`idstatus` INT(11) NOT NULL,
	`c_codgui` VARCHAR(8) NULL COLLATE 'utf8_general_ci',
	`c_edgui` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`c_descri` VARCHAR(40) NULL COLLATE 'utf8_general_ci',
	`c_um` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`c_codep` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`c_estado` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`c_codactivo` VARCHAR(13) NULL COLLATE 'utf8_general_ci',
	`cod_cen` VARCHAR(4) NULL COLLATE 'utf8_general_ci',
	`c_codsap` VARCHAR(5) NULL COLLATE 'utf8_general_ci',
	`nomep` VARCHAR(25) NULL COLLATE 'utf8_general_ci',
	`estado` VARCHAR(25) NULL COLLATE 'utf8_general_ci',
	`desmotivo` VARCHAR(30) NULL COLLATE 'utf8_general_ci',
	`asignado` DOUBLE NULL,
	`numero` VARCHAR(12) NULL COLLATE 'utf8_general_ci',
	`c_numgui` VARCHAR(8) NULL COLLATE 'utf8_general_ci',
	`c_salida` VARCHAR(1) NULL COLLATE 'utf8_general_ci',
	`d_fectra` CHAR(19) NULL COLLATE 'utf8_general_ci',
	`despro` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
	`nombreobjeto` VARCHAR(40) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_movpendientes
DROP VIEW IF EXISTS `vw_movpendientes`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_movpendientes` (
	`c_salida` VARCHAR(1) NULL COLLATE 'utf8_general_ci',
	`c_numgui` VARCHAR(8) NULL COLLATE 'utf8_general_ci',
	`c_serie` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`desum` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`idtemp` BIGINT(20) NOT NULL,
	`id` BIGINT(20) NOT NULL,
	`n_hguia` BIGINT(11) NOT NULL,
	`c_itguia` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`n_cangui` DOUBLE NULL,
	`idstatus` INT(11) NOT NULL,
	`c_codgui` VARCHAR(8) NULL COLLATE 'utf8_general_ci',
	`c_edgui` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`c_descri` VARCHAR(40) NULL COLLATE 'utf8_general_ci',
	`c_um` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`c_codep` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`c_estado` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`c_codactivo` VARCHAR(13) NULL COLLATE 'utf8_general_ci',
	`cod_cen` VARCHAR(4) NULL COLLATE 'utf8_general_ci',
	`c_codsap` VARCHAR(5) NULL COLLATE 'utf8_general_ci',
	`nomep` VARCHAR(25) NULL COLLATE 'utf8_general_ci',
	`estado` VARCHAR(25) NULL COLLATE 'utf8_general_ci',
	`desmotivo` VARCHAR(30) NULL COLLATE 'utf8_general_ci',
	`asignado` DOUBLE NULL,
	`d_fectra` CHAR(19) NULL COLLATE 'utf8_general_ci',
	`despro` VARCHAR(100) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_objetos
DROP VIEW IF EXISTS `vw_objetos`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_objetos` (
	`id` INT(11) NOT NULL,
	`serie` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`codigo` VARCHAR(10) NOT NULL COLLATE 'utf8_general_ci',
	`nombreobjeto` VARCHAR(40) NULL COLLATE 'utf8_general_ci',
	`codobjeto` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`descripcion` VARCHAR(40) NOT NULL COLLATE 'utf8_general_ci',
	`marca` VARCHAR(24) NOT NULL COLLATE 'utf8_general_ci',
	`modelo` VARCHAR(25) NOT NULL COLLATE 'utf8_general_ci',
	`identificador` VARCHAR(24) NULL COLLATE 'utf8_general_ci',
	`rucpro` VARCHAR(11) NOT NULL COLLATE 'utf8_general_ci',
	`despro` VARCHAR(100) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_ocompra
DROP VIEW IF EXISTS `vw_ocompra`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_ocompra` (
	`numcot` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`codpro` VARCHAR(6) NOT NULL COLLATE 'utf8_general_ci',
	`fecdoc` CHAR(19) NOT NULL COLLATE 'utf8_general_ci',
	`codcon` VARCHAR(5) NULL COLLATE 'utf8_general_ci',
	`codestado` VARCHAR(2) NOT NULL COLLATE 'utf8_general_ci',
	`texto` VARCHAR(40) NOT NULL COLLATE 'utf8_general_ci',
	`textolargo` LONGTEXT NULL COLLATE 'utf8_general_ci',
	`tipologia` VARCHAR(1) NOT NULL COLLATE 'utf8_general_ci',
	`moneda` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`orcli` VARCHAR(12) NULL COLLATE 'utf8_general_ci',
	`descuento` SMALLINT(6) NOT NULL,
	`usuario` VARCHAR(35) NULL COLLATE 'utf8_general_ci',
	`coddocu` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`codtipofac` VARCHAR(2) NOT NULL COLLATE 'utf8_general_ci',
	`codsociedad` VARCHAR(1) NOT NULL COLLATE 'utf8_general_ci',
	`codgrupoventas` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`codtipocotizacion` VARCHAR(1) NOT NULL COLLATE 'utf8_general_ci',
	`validez` INT(11) NOT NULL,
	`codcentro` VARCHAR(4) NULL COLLATE 'utf8_general_ci',
	`nigv` DOUBLE NOT NULL,
	`codobjeto` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`fechapresentacion` CHAR(19) NULL COLLATE 'utf8_general_ci',
	`fechanominal` CHAR(19) NULL COLLATE 'utf8_general_ci',
	`idguia` INT(11) NOT NULL,
	`id` BIGINT(20) NOT NULL,
	`codentro` VARCHAR(4) NULL COLLATE 'utf8_general_ci',
	`codigoalma` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`codart` VARCHAR(8) NOT NULL COLLATE 'utf8_general_ci',
	`disp` VARCHAR(2) NOT NULL COLLATE 'utf8_general_ci',
	`cant` DOUBLE NOT NULL,
	`punit` DOUBLE NOT NULL,
	`item` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`descri` VARCHAR(40) NOT NULL COLLATE 'utf8_general_ci',
	`stock` DOUBLE NULL,
	`detalle` LONGTEXT NULL COLLATE 'utf8_general_ci',
	`tipoitem` VARCHAR(1) NOT NULL COLLATE 'utf8_general_ci',
	`descontado` DOUBLE NULL,
	`totalneto` DOUBLE NULL,
	`estadodetalle` VARCHAR(2) NOT NULL COLLATE 'utf8_general_ci',
	`um` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`hidguia` INT(11) NOT NULL,
	`codservicio` VARCHAR(6) NULL COLLATE 'utf8_general_ci',
	`tipoimputacion` VARCHAR(1) NULL COLLATE 'utf8_general_ci',
	`punitdes` DOUBLE NULL,
	`subto` DOUBLE NOT NULL,
	`desmon` VARCHAR(60) NOT NULL COLLATE 'utf8_general_ci',
	`simbolo` VARCHAR(4) NOT NULL COLLATE 'utf8_general_ci',
	`tipofacturacion` VARCHAR(35) NULL COLLATE 'utf8_general_ci',
	`estado` VARCHAR(25) NULL COLLATE 'utf8_general_ci',
	`rucsoc` VARCHAR(12) NOT NULL COLLATE 'utf8_general_ci',
	`dsocio` VARCHAR(40) NOT NULL COLLATE 'utf8_general_ci',
	`c_nombre` VARCHAR(30) NOT NULL COLLATE 'utf8_general_ci',
	`c_cargo` VARCHAR(30) NULL COLLATE 'utf8_general_ci',
	`c_tel` VARCHAR(30) NULL COLLATE 'utf8_general_ci',
	`c_mail` VARCHAR(30) NULL COLLATE 'utf8_general_ci',
	`despro` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
	`rucpro` VARCHAR(11) NOT NULL COLLATE 'utf8_general_ci',
	`emailpro` VARCHAR(60) NULL COLLATE 'utf8_general_ci',
	`desdocu` VARCHAR(45) NULL COLLATE 'utf8_general_ci',
	`textocabeza` LONGTEXT NULL COLLATE 'utf8_general_ci',
	`textopie` LONGTEXT NULL COLLATE 'utf8_general_ci',
	`ap` VARCHAR(30) NULL COLLATE 'utf8_general_ci',
	`am` VARCHAR(35) NULL COLLATE 'utf8_general_ci',
	`nombres` VARCHAR(25) NULL COLLATE 'utf8_general_ci',
	`telfijo` VARCHAR(8) NULL COLLATE 'utf8_general_ci',
	`telmoviles` VARCHAR(30) NULL COLLATE 'utf8_general_ci',
	`c_direc` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
	`desum` VARCHAR(20) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_ocomprasimple
DROP VIEW IF EXISTS `vw_ocomprasimple`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_ocomprasimple` (
	`numcot` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`codpro` VARCHAR(6) NOT NULL COLLATE 'utf8_general_ci',
	`fecdoc` CHAR(19) NOT NULL COLLATE 'utf8_general_ci',
	`tipologia` VARCHAR(1) NOT NULL COLLATE 'utf8_general_ci',
	`codestado` VARCHAR(2) NOT NULL COLLATE 'utf8_general_ci',
	`moneda` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`descuento` SMALLINT(6) NOT NULL,
	`usuario` VARCHAR(35) NULL COLLATE 'utf8_general_ci',
	`despro` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
	`rucpro` VARCHAR(11) NOT NULL COLLATE 'utf8_general_ci',
	`coddocu` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`codtipofac` VARCHAR(2) NOT NULL COLLATE 'utf8_general_ci',
	`codsociedad` VARCHAR(1) NOT NULL COLLATE 'utf8_general_ci',
	`codgrupoventas` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`codtipocotizacion` VARCHAR(1) NOT NULL COLLATE 'utf8_general_ci',
	`validez` INT(11) NOT NULL,
	`codcentro` VARCHAR(4) NULL COLLATE 'utf8_general_ci',
	`codobjeto` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`fechapresentacion` CHAR(19) NULL COLLATE 'utf8_general_ci',
	`fechanominal` CHAR(19) NULL COLLATE 'utf8_general_ci',
	`idguia` INT(11) NOT NULL,
	`numsolpe` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`id` BIGINT(20) NOT NULL,
	`codentro` VARCHAR(4) NULL COLLATE 'utf8_general_ci',
	`codigoalma` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`codart` VARCHAR(8) NOT NULL COLLATE 'utf8_general_ci',
	`disp` VARCHAR(2) NOT NULL COLLATE 'utf8_general_ci',
	`cant` DOUBLE NOT NULL,
	`punit` DOUBLE NOT NULL,
	`item` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`descri` VARCHAR(40) NOT NULL COLLATE 'utf8_general_ci',
	`stock` DOUBLE NULL,
	`detalle` LONGTEXT NULL COLLATE 'utf8_general_ci',
	`tipoitem` VARCHAR(1) NOT NULL COLLATE 'utf8_general_ci',
	`descontado` DOUBLE NULL,
	`totalneto` DOUBLE NULL,
	`estadodetalle` VARCHAR(2) NOT NULL COLLATE 'utf8_general_ci',
	`um` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`hidguia` INT(11) NOT NULL,
	`codservicio` VARCHAR(6) NULL COLLATE 'utf8_general_ci',
	`tipoimputacion` VARCHAR(1) NULL COLLATE 'utf8_general_ci',
	`punitdes` DOUBLE NULL,
	`subto` DOUBLE NOT NULL,
	`desmon` VARCHAR(60) NOT NULL COLLATE 'utf8_general_ci',
	`simbolo` VARCHAR(4) NOT NULL COLLATE 'utf8_general_ci',
	`estado` VARCHAR(25) NULL COLLATE 'utf8_general_ci',
	`desum` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`entregado` DOUBLE NULL
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_opcionesdocumentos
DROP VIEW IF EXISTS `vw_opcionesdocumentos`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_opcionesdocumentos` (
	`desdocu` VARCHAR(45) NULL COLLATE 'utf8_general_ci',
	`idopdoc` INT(11) NULL,
	`campo` VARCHAR(30) NULL COLLATE 'utf8_general_ci',
	`nombrecampo` VARCHAR(30) NULL COLLATE 'utf8_general_ci',
	`nombredelmodelo` VARCHAR(30) NULL COLLATE 'utf8_general_ci',
	`tipodato` VARCHAR(1) NULL COLLATE 'utf8_general_ci',
	`longitud` INT(11) NULL,
	`id` INT(11) NOT NULL,
	`idusuario` BIGINT(20) NULL,
	`username` VARCHAR(64) NULL COLLATE 'latin1_swedish_ci',
	`coddocu` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`valor` VARCHAR(40) NULL COLLATE 'utf8_general_ci',
	`seleccionable` LONGTEXT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_otdetalle
DROP VIEW IF EXISTS `vw_otdetalle`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_otdetalle` (
	`despro` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
	`rucpro` VARCHAR(11) NOT NULL COLLATE 'utf8_general_ci',
	`identificador` VARCHAR(24) NULL COLLATE 'utf8_general_ci',
	`serie` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`descripcion` VARCHAR(40) NOT NULL COLLATE 'utf8_general_ci',
	`marca` VARCHAR(24) NOT NULL COLLATE 'utf8_general_ci',
	`modelo` VARCHAR(25) NOT NULL COLLATE 'utf8_general_ci',
	`nombreobjeto` VARCHAR(40) NULL COLLATE 'utf8_general_ci',
	`codobjeto` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`item` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`textoactividad` VARCHAR(40) NOT NULL COLLATE 'utf8_general_ci',
	`idetot` BIGINT(20) NOT NULL,
	`id` BIGINT(20) NOT NULL,
	`numero` VARCHAR(12) NOT NULL COLLATE 'utf8_general_ci',
	`fechacre` DATE NOT NULL,
	`fechafinprog` DATE NOT NULL,
	`codpro` VARCHAR(8) NOT NULL COLLATE 'utf8_general_ci',
	`idobjeto` INT(11) NOT NULL,
	`codresponsable` VARCHAR(6) NOT NULL COLLATE 'utf8_general_ci',
	`textocorto` VARCHAR(40) NOT NULL COLLATE 'utf8_general_ci',
	`textolargo` TEXT NOT NULL COLLATE 'utf8_general_ci',
	`grupoplan` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`codcen` VARCHAR(4) NOT NULL COLLATE 'utf8_general_ci',
	`iduser` INT(11) NOT NULL,
	`codocu` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`codestado` VARCHAR(2) NOT NULL COLLATE 'utf8_general_ci',
	`clase` VARCHAR(1) NOT NULL COLLATE 'utf8_general_ci',
	`hidoferta` BIGINT(20) NOT NULL,
	`fechainiprog` DATE NULL,
	`fechainicio` DATE NULL,
	`fechafin` DATE NULL
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_otsimple
DROP VIEW IF EXISTS `vw_otsimple`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_otsimple` (
	`despro` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
	`rucpro` VARCHAR(11) NOT NULL COLLATE 'utf8_general_ci',
	`identificador` VARCHAR(24) NULL COLLATE 'utf8_general_ci',
	`serie` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`descripcion` VARCHAR(40) NOT NULL COLLATE 'utf8_general_ci',
	`marca` VARCHAR(24) NOT NULL COLLATE 'utf8_general_ci',
	`modelo` VARCHAR(25) NOT NULL COLLATE 'utf8_general_ci',
	`nombreobjeto` VARCHAR(40) NULL COLLATE 'utf8_general_ci',
	`codobjeto` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`id` BIGINT(20) NOT NULL,
	`numero` VARCHAR(12) NOT NULL COLLATE 'utf8_general_ci',
	`fechacre` DATE NOT NULL,
	`fechafinprog` DATE NOT NULL,
	`codpro` VARCHAR(8) NOT NULL COLLATE 'utf8_general_ci',
	`idobjeto` INT(11) NOT NULL,
	`codresponsable` VARCHAR(6) NOT NULL COLLATE 'utf8_general_ci',
	`textocorto` VARCHAR(40) NOT NULL COLLATE 'utf8_general_ci',
	`textolargo` TEXT NOT NULL COLLATE 'utf8_general_ci',
	`grupoplan` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`codcen` VARCHAR(4) NOT NULL COLLATE 'utf8_general_ci',
	`iduser` INT(11) NOT NULL,
	`codocu` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`codestado` VARCHAR(2) NOT NULL COLLATE 'utf8_general_ci',
	`clase` VARCHAR(1) NOT NULL COLLATE 'utf8_general_ci',
	`hidoferta` BIGINT(20) NOT NULL,
	`fechainiprog` DATE NULL,
	`fechainicio` DATE NULL,
	`fechafin` DATE NULL
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_pareto
DROP VIEW IF EXISTS `vw_pareto`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_pareto` (
	`codart` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`id` BIGINT(20) NOT NULL,
	`desum` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`punit` DOUBLE(19,2) NULL,
	`descripcion` VARCHAR(60) NULL COLLATE 'utf8_general_ci',
	`ptlibre` DOUBLE(19,2) NULL,
	`ubicacion` VARCHAR(12) NULL COLLATE 'utf8_general_ci',
	`codalm` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`codcen` VARCHAR(4) NULL COLLATE 'utf8_general_ci',
	`cantlibre` DOUBLE NULL,
	`ranking` INT(11) NOT NULL,
	`clase` CHAR(1) NOT NULL COLLATE 'utf8_unicode_ci',
	`acumulado` DOUBLE(18,1) NOT NULL,
	`porcentaje` DOUBLE NOT NULL,
	`hinventario` BIGINT(20) NOT NULL,
	`idsesion` INT(11) NOT NULL,
	`column_7` INT(11) NOT NULL,
	`porcentajeac` DOUBLE NOT NULL
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_reservaspendientes2
DROP VIEW IF EXISTS `vw_reservaspendientes2`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_reservaspendientes2` (
	`hidinventario` BIGINT(20) NOT NULL,
	`idsolpe` BIGINT(20) NOT NULL,
	`iddesolpe` INT(11) NOT NULL,
	`numero` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`imputacion` VARCHAR(12) NULL COLLATE 'utf8_general_ci',
	`fechaent` DATE NULL,
	`idusersolpe` INT(11) NOT NULL,
	`codart` VARCHAR(10) NOT NULL COLLATE 'utf8_general_ci',
	`item` CHAR(3) NULL COLLATE 'utf8_general_ci',
	`codal` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`centro` VARCHAR(4) NOT NULL COLLATE 'utf8_general_ci',
	`txtmaterial` VARCHAR(40) NOT NULL COLLATE 'utf8_general_ci',
	`desum` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`cantdesolpe` FLOAT NULL,
	`hidesolpe` BIGINT(20) NULL,
	`fecha_reserva` CHAR(19) NULL COLLATE 'utf8_unicode_ci',
	`idreserva` BIGINT(20) NOT NULL,
	`codocu` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`cantidad_reservada` DOUBLE NULL,
	`usuario_reserva` VARCHAR(25) NULL COLLATE 'utf8_general_ci',
	`estadoreserva` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`desdocu_reserva` VARCHAR(45) NULL COLLATE 'utf8_general_ci',
	`cantidad_atendida` DOUBLE NULL,
	`cantidad_pendiente` DOUBLE NULL
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_solpe
DROP VIEW IF EXISTS `vw_solpe`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_solpe` (
	`punitplan` DOUBLE NOT NULL,
	`punitreal` DOUBLE NOT NULL,
	`textocabecera` LONGTEXT NULL COLLATE 'utf8_general_ci',
	`fechadoc` DATETIME NULL,
	`iduser` INT(11) NOT NULL,
	`identidad` BIGINT(20) NOT NULL,
	`numero` VARCHAR(10) NOT NULL COLLATE 'utf8_general_ci',
	`posicion` INT(11) NULL,
	`desdocu` VARCHAR(45) NULL COLLATE 'utf8_general_ci',
	`destipo` VARCHAR(32) NULL COLLATE 'utf8_general_ci',
	`tipimputacion` CHAR(1) NOT NULL COLLATE 'utf8_general_ci',
	`centro` VARCHAR(4) NOT NULL COLLATE 'utf8_general_ci',
	`codal` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`codart` VARCHAR(10) NOT NULL COLLATE 'utf8_general_ci',
	`txtmaterial` VARCHAR(40) NOT NULL COLLATE 'utf8_general_ci',
	`grupocompras` VARCHAR(4) NOT NULL COLLATE 'utf8_general_ci',
	`usuario` VARCHAR(35) NULL COLLATE 'utf8_general_ci',
	`textodetalle` TEXT NULL COLLATE 'utf8_general_ci',
	`fechacrea` DATETIME NULL,
	`fechaent` DATE NULL,
	`escompra` VARCHAR(1) NULL COLLATE 'utf8_general_ci',
	`fechalib` DATETIME NULL,
	`estadolib` CHAR(1) NULL COLLATE 'utf8_general_ci',
	`imputacion` VARCHAR(12) NULL COLLATE 'utf8_general_ci',
	`solicitanet` VARCHAR(25) NULL COLLATE 'utf8_general_ci',
	`hidsolpe` BIGINT(20) NULL,
	`id` BIGINT(20) NOT NULL,
	`desum` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`codocu` CHAR(3) NULL COLLATE 'utf8_general_ci',
	`um` CHAR(3) NULL COLLATE 'utf8_general_ci',
	`tipsolpe` CHAR(1) NULL COLLATE 'utf8_general_ci',
	`est` CHAR(2) NULL COLLATE 'utf8_general_ci',
	`cant` FLOAT NULL,
	`item` CHAR(3) NULL COLLATE 'utf8_general_ci',
	`numsolpe` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`estado` CHAR(2) NULL COLLATE 'utf8_general_ci',
	`codigodoc` CHAR(3) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_solpeatencion
DROP VIEW IF EXISTS `vw_solpeatencion`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_solpeatencion` (
	`numero` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`um` CHAR(3) NULL COLLATE 'utf8_general_ci',
	`centro` VARCHAR(4) NOT NULL COLLATE 'utf8_general_ci',
	`codal` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`usuario` VARCHAR(35) NULL COLLATE 'utf8_general_ci',
	`fechacrea` DATETIME NULL,
	`fechaent` DATE NULL,
	`imputacion` VARCHAR(12) NULL COLLATE 'utf8_general_ci',
	`hidsolpe` BIGINT(20) NULL,
	`codocu` CHAR(3) NULL COLLATE 'utf8_general_ci',
	`id` BIGINT(20) NOT NULL,
	`item` CHAR(3) NULL COLLATE 'utf8_general_ci',
	`cant` FLOAT NULL,
	`txtmaterial` VARCHAR(40) NOT NULL COLLATE 'utf8_general_ci',
	`codart` VARCHAR(10) NOT NULL COLLATE 'utf8_general_ci',
	`desum` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`cantlibre` DOUBLE NULL,
	`umbase` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`canttran` DOUBLE NULL,
	`cantres` DOUBLE NULL
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_solpeparacomprar
DROP VIEW IF EXISTS `vw_solpeparacomprar`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_solpeparacomprar` (
	`escompra` VARCHAR(1) NULL COLLATE 'utf8_general_ci',
	`textodetalle` TEXT NULL COLLATE 'utf8_general_ci',
	`numero` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`estado` CHAR(2) NULL COLLATE 'utf8_general_ci',
	`item` CHAR(3) NULL COLLATE 'utf8_general_ci',
	`id` BIGINT(20) NOT NULL,
	`est` CHAR(2) NULL COLLATE 'utf8_general_ci',
	`tipimputacion` CHAR(1) NOT NULL COLLATE 'utf8_general_ci',
	`punitplan` DOUBLE NOT NULL,
	`identidad` BIGINT(20) NOT NULL,
	`fechaent` DATE NULL,
	`fechacrea` DATETIME NULL,
	`usuario` VARCHAR(35) NULL COLLATE 'utf8_general_ci',
	`um` CHAR(3) NULL COLLATE 'utf8_general_ci',
	`tipsolpe` CHAR(1) NULL COLLATE 'utf8_general_ci',
	`centro` VARCHAR(4) NOT NULL COLLATE 'utf8_general_ci',
	`codal` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`codart` VARCHAR(10) NOT NULL COLLATE 'utf8_general_ci',
	`imputacion` VARCHAR(12) NULL COLLATE 'utf8_general_ci',
	`cant` FLOAT NULL,
	`desum` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`txtmaterial` VARCHAR(40) NOT NULL COLLATE 'utf8_general_ci',
	`cantatendida` DOUBLE NULL,
	`cant_pendiente` DOUBLE NULL
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_stocktotal_almacenes
DROP VIEW IF EXISTS `vw_stocktotal_almacenes`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_stocktotal_almacenes` (
	`codcen` VARCHAR(4) NOT NULL COLLATE 'utf8_general_ci',
	`codalm` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`codsoc` VARCHAR(1) NOT NULL COLLATE 'utf8_general_ci',
	`nomal` VARCHAR(35) NULL COLLATE 'utf8_general_ci',
	`stocklibre` DOUBLE NULL,
	`stockreservado` DOUBLE NULL,
	`stocktransito` DOUBLE NULL
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_stock_por_tipos
DROP VIEW IF EXISTS `vw_stock_por_tipos`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_stock_por_tipos` (
	`destipo` VARCHAR(30) NULL COLLATE 'utf8_general_ci',
	`codtipo` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`codcen` VARCHAR(4) NOT NULL COLLATE 'utf8_general_ci',
	`codalm` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`codmon` VARCHAR(4) NOT NULL COLLATE 'utf8_general_ci',
	`codsoc` VARCHAR(1) NOT NULL COLLATE 'utf8_general_ci',
	`nomal` VARCHAR(35) NULL COLLATE 'utf8_general_ci',
	`stocklibre` DOUBLE NULL,
	`stockreservado` DOUBLE NULL,
	`stocktransito` DOUBLE NULL
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_stock_supervision
DROP VIEW IF EXISTS `vw_stock_supervision`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_stock_supervision` (
	`codart` VARCHAR(10) NOT NULL COLLATE 'utf8_general_ci',
	`codcentro` VARCHAR(4) NOT NULL COLLATE 'utf8_general_ci',
	`codal` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`canteconomica` DOUBLE NULL,
	`cantreposic` DOUBLE NULL,
	`cantreorden` DOUBLE NULL,
	`descripcion` VARCHAR(60) NULL COLLATE 'utf8_general_ci',
	`um` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`desum` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`supervisionautomatica` VARCHAR(1) NULL COLLATE 'utf8_general_ci',
	`cantlibre` DOUBLE NULL,
	`cantres` DOUBLE NULL,
	`canttran` DOUBLE NULL,
	`punit` DOUBLE NULL,
	`idinventario` BIGINT(20) NOT NULL
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_trabajadores
DROP VIEW IF EXISTS `vw_trabajadores`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_trabajadores` (
	`codigotra` VARCHAR(6) NOT NULL COLLATE 'utf8_general_ci',
	`nombrecompleto` VARCHAR(92) NULL COLLATE 'utf8_general_ci',
	`codpuesto` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`ap` VARCHAR(30) NULL COLLATE 'utf8_general_ci',
	`am` VARCHAR(35) NULL COLLATE 'utf8_general_ci',
	`nombres` VARCHAR(25) NULL COLLATE 'utf8_general_ci',
	`dni` VARCHAR(12) NULL COLLATE 'utf8_general_ci',
	`oficio` VARCHAR(45) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_trazabilidad_reservas
DROP VIEW IF EXISTS `vw_trazabilidad_reservas`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_trazabilidad_reservas` (
	`hidesolpe` BIGINT(20) NULL,
	`id` BIGINT(20) NOT NULL,
	`fecha_reserva` CHAR(19) NULL COLLATE 'utf8_unicode_ci',
	`codocu` VARCHAR(3) NULL COLLATE 'utf8_general_ci',
	`estadoreserva` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`montomovido` DOUBLE NULL,
	`cant` DOUBLE NULL,
	`usuario_reserva` VARCHAR(25) NULL COLLATE 'utf8_general_ci',
	`desdocu_reserva` VARCHAR(45) NULL COLLATE 'utf8_general_ci',
	`umsolic` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`umatem` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`cantidad_reservada` DOUBLE NULL,
	`cantidad_atendida` DOUBLE NULL,
	`idvale` BIGINT(20) NULL,
	`fecha_atencion_vale` DATE NULL,
	`numero_vale_atencion` CHAR(12) NULL COLLATE 'utf8_general_ci',
	`fecha_solicitud_compra` DATETIME NULL,
	`solicitud_compra` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`fecha_compra` CHAR(19) NULL COLLATE 'utf8_general_ci',
	`orden_compra` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`vale_ingreso_compra_almacen` CHAR(12) NULL COLLATE 'utf8_general_ci',
	`fecha_vale_ingreso_almacen` DATE NULL,
	`xx` DOUBLE NULL
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_trazabilidad_solpe_1
DROP VIEW IF EXISTS `vw_trazabilidad_solpe_1`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_trazabilidad_solpe_1` (
	`numero` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`centro` VARCHAR(4) NOT NULL COLLATE 'utf8_general_ci',
	`codal` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`codart` VARCHAR(10) NOT NULL COLLATE 'utf8_general_ci',
	`txtmaterial` VARCHAR(40) NOT NULL COLLATE 'utf8_general_ci',
	`fechaent` DATE NULL,
	`cant` FLOAT NULL,
	`item` CHAR(3) NULL COLLATE 'utf8_general_ci',
	`um` CHAR(3) NULL COLLATE 'utf8_general_ci',
	`desum` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`iddesolpe` BIGINT(20) NULL,
	`iddocompra` BIGINT(20) NULL,
	`cantaten` DOUBLE NULL,
	`featencion` CHAR(19) NULL COLLATE 'utf8_unicode_ci',
	`user` VARCHAR(25) NULL COLLATE 'utf8_general_ci',
	`cantcompras` DOUBLE NOT NULL,
	`itemcompra` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`umcompra` VARCHAR(20) NULL COLLATE 'utf8_general_ci',
	`numcot` VARCHAR(10) NULL COLLATE 'utf8_general_ci',
	`fecha` CHAR(19) NULL COLLATE 'utf8_unicode_ci',
	`cantkardex` DOUBLE NULL,
	`codmov` VARCHAR(2) NULL COLLATE 'utf8_general_ci',
	`numvale` CHAR(12) NULL COLLATE 'utf8_general_ci',
	`movimiento` VARCHAR(35) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_usuarios
DROP VIEW IF EXISTS `vw_usuarios`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_usuarios` (
	`iduser` INT(11) NOT NULL,
	`username` VARCHAR(64) NULL COLLATE 'latin1_swedish_ci',
	`email` VARCHAR(45) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Volcando estructura para vista nautilus.vw_alinventario
DROP VIEW IF EXISTS `vw_alinventario`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_alinventario`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_alinventario` AS select x.numlote, x.cant as cantlote, x.fechavenc, x.fechafabri, x.punit as punitlote, x.orden as ordenlote, `t`.`codalm` AS `codalm`,`t`.`fechainicio` AS `fechainicio`,
`t`.`fechafin` AS `fechafin`,`t`.`periodocontable` AS `periodocontable`,
`t`.`codresponsable` AS `codresponsable`,`t`.`codart` AS `codart`,
`t`.`codcen` AS `codcen`,`c`.`um` AS `um`,`t`.`cantlibre` AS `cantlibre`,
`t`.`canttran` AS `canttran`,`t`.`cantres` AS `cantres`,
`t`.`ubicacion` AS `ubicacion`,`t`.`lote` AS `lote`,
`t`.`siid` AS `siid`,`t`.`ssiduser` AS `ssiduser`,
`t`.`id` AS `id`,`t`.`punit` AS `punit`,`t`.`codmon` AS `codmon`,`a`.`descripcion` AS `descripcion`,
`a`.`codtipo` AS `codtipo`,`c`.`desum` AS `desum`,round((`t`.`punit` * `t`.`cantlibre`),3) AS `ptlibre`,
round((`t`.`punit` * `t`.`canttran`),3) AS `pttran`,
round((`t`.`punit` * `t`.`cantres`),3) AS `ptres`,
round((((`t`.`punit` * `t`.`cantlibre`) + (`t`.`punit` * `t`.`canttran`)) +
 (`t`.`punit` * `t`.`cantres`)),3) AS `pttotal` 
 from `public_alinventario` `t` left join
  `public_lotes` `x` on (t.id=x.hidinventario)  inner  join 
  `public_maestrocomponentes` `a`  on (`t`.`codart` = `a`.`codigo`)  inner join 
 `public_ums` `c`  on (`a`.`um` = `c`.`um`)  where x.cant is null or x.cant > 0 order by codcen,codalm, codart asc ;


-- Volcando estructura para vista nautilus.vw_alinventario_resumen
DROP VIEW IF EXISTS `vw_alinventario_resumen`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_alinventario_resumen`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_alinventario_resumen` AS select sum(`vw_alinventario`.`ptlibre`) AS `stocklibre`,
sum(`vw_alinventario`.`ptlibre`) AS `stocktran`,sum(`vw_alinventario`.`ptres`) AS `stockres`,
sum(`vw_alinventario`.`pttotal`) AS `stocktotal`,`vw_alinventario`.`codalm` AS `codalm`,
`vw_alinventario`.`codcen` AS `codcen`,`vw_alinventario`.`codtipo` AS `codtipo` from 
`vw_alinventario` group by `vw_alinventario`.`codalm`,`vw_alinventario`.`codcen`,`vw_alinventario`.`codtipo` ;


-- Volcando estructura para vista nautilus.vw_almacendocs
DROP VIEW IF EXISTS `vw_almacendocs`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_almacendocs`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_almacendocs` AS select `s`.`numvale` AS `numvale`,
`w`.`nomal` AS `nomal`,`t`.`montomovido` AS `montomovido`,`t`.`codmoneda` AS `codmoneda`,
`m`.`nomcen` AS `nomcen`,`v`.`desdocu` AS `nombredocumento`,`s`.`codtrabajador` AS `codtrabajador`,
`s`.`cestadovale` AS `cestadovale`,`s`.`fechacont` AS `fechacont`,`s`.`fechacre` AS `fechacre`,
`s`.`id` AS `idvale`,`s`.`textolargo` AS `textolargo`,`s`.`fechavale` AS `fechavale`,
`t`.`codart` AS `codart`,`t`.`codmov` AS `codmov`,`t`.`valido` AS `valido`,
`t`.`preciounit` AS `preciounit`,`t`.`lote` AS `lote`,`t`.`destino` AS `destino`,
`t`.`checki` AS `checki`,`t`.`cant` AS `cant`,`t`.`idref` AS `idref`,
`t`.`alemi` AS `alemi`,`t`.`aldes` AS `aldes`,`t`.`fecha` AS `fecha`,
`t`.`coddoc` AS `coddoc`,`t`.`numdoc` AS `numdoc`,`t`.`usuario` AS `usuario`,
`t`.`um` AS `um`,`t`.`comentario` AS `comentario`,`t`.`codocuref` AS `codocuref`,
`t`.`numdocref` AS `numdocref`,`t`.`codcentro` AS `codcentro`,`t`.`id` AS `id`,
`t`.`codestado` AS `codestado`,`t`.`prefijo` AS `prefijo`,`t`.`fechadoc` AS `fechadoc`,
`t`.`correlativo` AS `correlativo`,`t`.`numkardex` AS `numkardex`,`t`.`solicitante` AS `solicitante`,
`t`.`hidvale` AS `hidvale`,`a`.`descripcion` AS `descripcion`,`b`.`desdocu` AS `desdocu`,
`c`.`movimiento` AS `movimiento`,`x`.`desum` AS `desum`,`s`.`iduser` AS `iduser` from ((((((((`public_alkardex` `t` join 
`public_maestrocomponentes` `a`) join `public_documentos` `b`) join `public_almacenmovimientos` `c`) join 
`public_ums` `x`) join `public_almacendocs` `s`) join `public_almacenes` `w`) join `public_centros` `m`) join
 `public_documentos` `v`) where ((`s`.`id` = `t`.`hidvale`) and (`t`.`codart` = `a`.`codigo`) and 
 (`t`.`codocuref` = `b`.`coddocu`) and (`t`.`codmov` = `c`.`codmov`) and (`t`.`um` = `x`.`um`) and 
 (`s`.`codalmacen` = `w`.`codalm`) and (`s`.`codcentro` = `w`.`codcen`) and (`m`.`codcen` = `s`.`codcentro`) and 
 (`s`.`codocu` = `v`.`coddocu`)) ;


-- Volcando estructura para vista nautilus.vw_alreservas
DROP VIEW IF EXISTS `vw_alreservas`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_alreservas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_alreservas` AS select `a`.`codart` AS `codart`,`a`.`txtmaterial` AS `txtmaterial`,
`c`.`hidesolpe` AS `hidesolpe`,`c`.`id` AS `id`,`c`.`cant` AS `cant`,`c`.`numreserva` AS `numreserva`,
`c`.`atendido` AS `atendido`,`c`.`usuario` AS `usuario`,`c`.`fechares` AS `fechares`,
`c`.`estadoreserva` AS `estadoreserva`,`c`.`codocu` AS `codocu`,`d`.`desum` AS `desum`,
`e`.`estado` AS `estado`,`f`.`desdocu` AS `desdocu`,`g`.`numero` AS `numero`,
`a`.`item` AS `item`,`a`.`um` AS `um` from (((((`public_desolpe` `a` join `public_alreserva` `c`)
 join `public_ums` `d`) join `public_estado` `e`) join `public_documentos` `f`) join
  `public_solpe` `g`) where ((`a`.`hidsolpe` = `g`.`id`) and (`a`.`id` = `c`.`hidesolpe`) 
  and (`c`.`codocu` = `e`.`codocu`) and (`c`.`estadoreserva` = `e`.`codestado`) and
   (`c`.`codocu` = `f`.`coddocu`) and (`a`.`um` = `d`.`um`)) ;


-- Volcando estructura para vista nautilus.vw_atencionessolpe
DROP VIEW IF EXISTS `vw_atencionessolpe`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_atencionessolpe`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_atencionessolpe` AS select `d`.`item` AS `item`,`d`.`id` AS `iddesolpe`,`d`.`cant` AS `cantdesolpe`,`h`.`numvale` AS `numvale`,`k`.`desum` AS `desumsolpe`,`d`.`hidsolpe` AS `idsolpe`,`d`.`um` AS `umsolpe`,`u`.`cant` AS `cantreserva`,`u`.`codocu` AS `codocu`,`u`.`numreserva` AS `numreserva`,`u`.`estadoreserva` AS `estadoreserva`,`t`.`id` AS `id`,`s`.`cant` AS `cant`,`t`.`hidreserva` AS `hidreserva`,`t`.`hidkardex` AS `hidkardex`,`t`.`estadoatencion` AS `estadoatencion`,`s`.`codmov` AS `codmov`,`s`.`um` AS `um`,`s`.`numkardex` AS `numkardex`,`s`.`usuario` AS `usuario`,`s`.`codart` AS `codart`,`s`.`preciounit` AS `preciounit`,`s`.`fecha` AS `fecha`,`g`.`monto` AS `monto`,`g`.`ceco` AS `ceco`,`d`.`txtmaterial` AS `txtmaterial`,`j`.`desum` AS `desumkardex`,`f`.`movimiento` AS `movimiento`,`s`.`iduser` AS `iduser` from (((((((((`public_solpe` `x` join `public_desolpe` `d` on((`x`.`id` = `d`.`hidsolpe`))) join `public_alkardex` `s` on(((`s`.`idref` = `d`.`id`) and (`s`.`codocuref` = `x`.`codocu`)))) left join `public_atencionreserva` `t` on((`s`.`id` = `t`.`hidkardex`))) left join `public_alreserva` `u` on((`u`.`id` = `t`.`hidreserva`))) left join `public_ums` `k` on((`k`.`um` = `d`.`um`))) left join `public_ccgastos` `g` on((`g`.`idref` = `s`.`id`))) left join `public_almacendocs` `h` on((`h`.`id` = `s`.`hidvale`))) left join `public_almacenmovimientos` `f` on((`f`.`codmov` = `s`.`codmov`))) left join `public_ums` `j` on((`j`.`um` = `s`.`um`))) ;


-- Volcando estructura para vista nautilus.vw_contactos
DROP VIEW IF EXISTS `vw_contactos`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_contactos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_contactos` AS select `b`.`id` AS `id`,`b`.`c_nombre` AS `c_nombre`,
`b`.`correlativo` AS `correlativo`,`b`.`c_hcod` AS `c_hcod`,
`a`.`despro` AS `despro`,`b`.`c_cargo` AS `c_cargo`,
`b`.`c_mail` AS `c_mail`,`b`.`c_tel` AS `c_tel` from 
(`public_contactos` `b` join `public_clipro` `a`) where (`a`.`codpro` = `b`.`c_hcod`) ;


-- Volcando estructura para vista nautilus.vw_costos
DROP VIEW IF EXISTS `vw_costos`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_costos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_costos` AS select `z`.`id` AS `id`,`z`.`ceco` AS `ceco`,
`z`.`fechacontable` AS `fechacontable`,`z`.`monto` AS `monto`,`z`.`codmoneda` AS `codmoneda`,
`z`.`usuario` AS `usuario`,`z`.`idref` AS `idref`,`z`.`tipo` AS `tipo`,
`z`.`ano` AS `ano`,`z`.`mes` AS `mes`,`z`.`clasecolector` AS `clasecolector`,
`z`.`iduser` AS `iduser`,`s`.`numvale` AS `numvale`,`t`.`codart` AS `codart`,
`t`.`codmov` AS `codmov`,`t`.`valido` AS `valido`,`t`.`destino` AS `destino`,
`t`.`checki` AS `checki`,`t`.`cant` AS `cant`,`t`.`alemi` AS `alemi`,
`t`.`aldes` AS `aldes`,`t`.`fecha` AS `fecha`,`t`.`coddoc` AS `coddoc`,
`t`.`numdoc` AS `numdoc`,`t`.`um` AS `um`,`t`.`comentario` AS `comentario`,
`t`.`codocuref` AS `codocuref`,`t`.`numdocref` AS `numdocref`,
`t`.`codcentro` AS `codcentro`,`t`.`id` AS `idkardex`,
`t`.`codestado` AS `codestado`,`t`.`prefijo` AS `prefijo`,
`t`.`fechadoc` AS `fechadoc`,`t`.`correlativo` AS `correlativo`,
`t`.`numkardex` AS `numkardex`,`t`.`solicitante` AS `solicitante`,
`t`.`hidvale` AS `hidvale`,`a`.`descripcion` AS `descripcion`,
`b`.`desdocu` AS `desdocu`,`c`.`movimiento` AS `movimiento`,
`x`.`desum` AS `desum` from ((((((`public_alkardex` `t` join `public_maestrocomponentes` `a`) join
 `public_documentos` `b`) join `public_almacenmovimientos` `c`) join `public_ums` `x`) join
  `public_almacendocs` `s`) join `public_ccgastos` `z`) where ((`s`.`id` = `t`.`hidvale`) 
  and (`t`.`codart` = `a`.`codigo`) and (`t`.`codocuref` = `b`.`coddocu`) and (`t`.`codmov` = `c`.`codmov`)
   and (`t`.`um` = `x`.`um`) and (`t`.`id` = `z`.`idref`)) ;


-- Volcando estructura para vista nautilus.vw_despacho
DROP VIEW IF EXISTS `vw_despacho`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_despacho`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_despacho` AS select `t`.`id` AS `id`,`t`.`hidpunto` AS `hidpunto`,`t`.`hidkardex` AS `hidkardex`,`t`.`fechacreac` AS `fechacreac`,`t`.`fechaprog` AS `fechaprog`,`t`.`descripcion` AS `descripcion`,`t`.`responsable` AS `responsable`,`t`.`iduser` AS `iduser`,`t`.`vigente` AS `vigente`,`k`.`codart` AS `codart`,`v`.`codcentro` AS `codcentro`,`k`.`um` AS `um`,`p`.`nombrepunto` AS `nombrepunto`,`v`.`codalmacen` AS `codalmacen`,`mm`.`descripcion` AS `descripmaterial`,`k`.`cant` AS `cant`,`u`.`desum` AS `desum`,`k`.`id` AS `idkardex`,`k`.`numdocref` AS `numdocref`,`v`.`numvale` AS `numvale`,`k`.`hidvale` AS `hidvale`,`m`.`movimiento` AS `movimiento`,`s`.`ap` AS `ap`,`s`.`am` AS `am`,`s`.`nombres` AS `nombres`,`k`.`codocuref` AS `codocuref`,`l`.`desdocu` AS `desdocu` from ((((((((`public_despacho` `t` join `public_ums` `u`) join `public_maestrocomponentes` `mm`) join `public_almacendocs` `v`) join `public_almacenmovimientos` `m`) join `public_alkardex` `k`) join `public_puntodespacho` `p`) join `public_trabajadores` `s`) join `public_documentos` `l`) where ((`t`.`hidkardex` = `k`.`id`) and (`s`.`codigotra` = `t`.`responsable`) and (`l`.`coddocu` = `k`.`codocuref`) and (`k`.`codart` = `mm`.`codigo`) and (`k`.`um` = `u`.`um`) and (`k`.`hidvale` = `v`.`id`) and (`v`.`codmovimiento` = `m`.`codmov`) and (`t`.`hidpunto` = `p`.`id`)) ;


-- Volcando estructura para vista nautilus.vw_despachogeneral
DROP VIEW IF EXISTS `vw_despachogeneral`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_despachogeneral`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_despachogeneral` AS select `vw_despacho`.`hidvale` AS `hidvale`,
`vw_despacho`.`codcentro` AS `codcentro`,`vw_despacho`.`codalmacen` AS `codalmacen`,
`vw_despacho`.`nombrepunto` AS `nombrepunto`,`vw_despacho`.`numvale` AS `numvale`,
`vw_despacho`.`movimiento` AS `movimiento`,count(`vw_despacho`.`id`) AS `items` 
from `vw_despacho` group by `vw_despacho`.`codcentro`,`vw_despacho`.`codalmacen`,
`vw_despacho`.`nombrepunto`,`vw_despacho`.`numvale`,`vw_despacho`.`movimiento`,
`vw_despacho`.`hidvale` ;


-- Volcando estructura para vista nautilus.vw_detalleingresofactura
DROP VIEW IF EXISTS `vw_detalleingresofactura`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_detalleingresofactura`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_detalleingresofactura` AS select `a`.`idtemp` AS `idtemp`,`a`.`id` AS `id`,x.moneda,
`a`.`hidfactura` AS `hidfactura`,`a`.`item` AS `item`,`a`.`hidkardex` AS `hidkardex`,
`a`.`iduser` AS `iduser`,`a`.`fechacrea` AS `fechacrea`,`a`.`hidalentrega` AS `hidalentrega`,a.cant as cant,
`b`.`id` AS `identrega`,`b`.`iddetcompra` AS `iddetcompra`,`b`.`cant` AS `cantentregada`,
`b`.`fecha` AS `fechaentrega`,`b`.`idkardex` AS `idkardex`,`b`.`punit` AS `punitentrega`,
`c`.`codart` AS `codart`,`c`.`cant` AS `cantcompras`,`c`.`punit` AS `punitcompra`,
`c`.`item` AS `itemcompra`,`c`.`descri` AS `descri`,`c`.`codentro` AS `codentro`,
`d`.`desum` AS `desum` from (((( `public_ocompra` `x` join  `public_docompra` `y` join      `public_tempdetingfactura` `a` join `public_alentregas` `b`) join
 `public_docompra` `c`) join `public_ums` `d`)) where  
     (`a`.`hidalentrega` = `b`.`id`) and
      (`b`.`iddetcompra` = `c`.`id`) and 
      (`c`.`um` = `d`.`um`) and 
       (x.idguia=y.hidguia ) and y.id=b.iddetcompra ;


-- Volcando estructura para vista nautilus.vw_detalleingresofacturafirme
DROP VIEW IF EXISTS `vw_detalleingresofacturafirme`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_detalleingresofacturafirme`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_detalleingresofacturafirme` AS select `a`.`id` AS `id`,a.cant,
`a`.`hidfactura` AS `hidfactura`,`a`.`item` AS `item`,`a`.`hidkardex` AS `hidkardex`,c.punit*a.cant as montofacturado,
`a`.`iduser` AS `iduser`,`a`.`fechacrea` AS `fechacrea`,`a`.`hidalentrega` AS `hidalentrega`,
`b`.`id` AS `identrega`,`b`.`iddetcompra` AS `iddetcompra`,`b`.`cant` AS `cantentregada`,
`b`.`fecha` AS `fechaentrega`,`b`.`idkardex` AS `idkardex`,`b`.`punit` AS `punitentrega`,
`c`.`codart` AS `codart`,`c`.`cant` AS `cantcompras`,`c`.`punit` AS `punitcompra`,
`c`.`item` AS `itemcompra`,`c`.`descri` AS `descri`,`c`.`codentro` AS `codentro`,
`d`.`desum` AS `desum`,`w`.`numocompra` AS `numocompra`,`w`.`numrecepcion` AS `numrecepcion`,
`w`.`seriedoc` AS `seriedoc`,`w`.`numerodoc` AS `numerodoc`,`xx`.`codpro` AS `codpro`,
`w`.`fechadoc` AS `fechadoc`,`w`.`fecha` AS `fecha`,`cc`.`despro` AS `despro`,
`xx`.`moneda` AS `moneda` from ((((((`public_detingfactura` `a` join `public_alentregas` `b`) join
 `public_docompra` `c`) join `public_ums` `d`) join `public_ingfactura` `w`) join 
 `public_ocompra` `xx`) join `public_clipro` `cc`) where ((`a`.`hidalentrega` = `b`.`id`) 
 and (`b`.`iddetcompra` = `c`.`id`) and (`c`.`um` = `d`.`um`) and (`w`.`id` = `a`.`hidfactura`)
  and (`xx`.`idguia` = `c`.`hidguia`) and (`xx`.`codpro` = `cc`.`codpro`)) ;


-- Volcando estructura para vista nautilus.vw_detalle_guia
DROP VIEW IF EXISTS `vw_detalle_guia`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_detalle_guia`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_detalle_guia` AS select `a`.`m_obs` AS `m_obs`,
`x`.`desum` AS `desum`,`a`.`idtemp` AS `idtemp`,`a`.`id` AS `id`,a.c_af,
`a`.`n_hguia` AS `n_hguia`,`a`.`c_itguia` AS `c_itguia`,
`a`.`n_cangui` AS `n_cangui`,`a`.`idstatus` AS `idstatus`,
`a`.`c_codgui` AS `c_codgui`,`a`.`c_edgui` AS `c_edgui`,
`a`.`c_descri` AS `c_descri`,`a`.`c_um` AS `c_um`,`a`.`c_codep` AS `c_codep`,
`a`.`c_estado` AS `c_estado`,`a`.`c_codactivo` AS `c_codactivo`,
`a`.`c_codsap` AS `c_codsap`,`b`.`nomep` AS `nomep`,`c`.`estado` AS `estado`,
`d`.`motivo` AS `desmotivo` from ((((`public_tempdetgui` `a` join `public_embarcaciones` `b`) join 
`public_estado` `c`) join `public_paraqueva` `d`) join `public_ums` `x`) where
 ((`a`.`c_codep` = `b`.`codep`) and (`a`.`c_edgui` = `d`.`cmotivo`) and 
 (`c`.`codestado` = `a`.`c_estado`) and (`c`.`codocu` = `a`.`codocu`) and (`a`.`c_um` = `x`.`um`)) ;


-- Volcando estructura para vista nautilus.vw_detercuentas
DROP VIEW IF EXISTS `vw_detercuentas`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_detercuentas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_detercuentas` AS SELECT a.codop,a.codcatval,a.cuentadebe,a.cuentahaber, a.id,a.activo,
c.desop,b.descat,d.descuenta as debe, e.descuenta as haber 
from public_detercuentas a INNER JOIN 
public_catvaloracion  b  ON a.codcatval=b.codcatval INNER JOIN 
public_opcontables c ON a.codop=c.codop LEFT JOIN 
public_cuentas d  ON a.cuentadebe=d.codcuenta LEFT JOIN 
public_cuentas e ON a.cuentahaber=e.codcuenta
ORDER BY a.codcatval, a.codop ASC ;


-- Volcando estructura para vista nautilus.vw_entregas
DROP VIEW IF EXISTS `vw_entregas`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_entregas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_entregas` AS select `s`.`numvale` AS `numvale`,
`t`.`montomovido` AS `montomovido`,`t`.`codmoneda` AS `codmoneda`,
`s`.`cestadovale` AS `cestadovale`,`s`.`fechacont` AS `fechacont`,
`s`.`fechacre` AS `fechacre`,`s`.`id` AS `idvale`,
`s`.`textolargo` AS `textolargo`,`s`.`fechavale` AS `fechavale`,
`t`.`codart` AS `codart`,`t`.`codmov` AS `codmov`,`t`.`preciounit` AS `preciounit`,
`t`.`cant` AS `cant`,`t`.`idref` AS `idref`,`t`.`alemi` AS `alemi`,`t`.`aldes` AS `aldes`,
`t`.`fecha` AS `fecha`,`t`.`coddoc` AS `coddoc`,`t`.`um` AS `um`,
`t`.`comentario` AS `comentario`,`t`.`codocuref` AS `codocuref`,
`t`.`numdocref` AS `numdocref`,`t`.`codcentro` AS `codcentro`,
`t`.`id` AS `id`,`t`.`codestado` AS `codestado`,`o`.`tipologia` AS `tipologia`,
`o`.`fechanominal` AS `fechaoc`,`t`.`hidvale` AS `hidvale`,`x`.`desum` AS `desum`,
`s`.`iduser` AS `iduser`,`o`.`idguia` AS `idguia`,`o`.`numcot` AS `numcot`,
`d`.`item` AS `item`,`d`.`descri` AS `descri`,`c`.`despro` AS `despro`,
`c`.`rucpro` AS `rucpro`,`c`.`codpro` AS `codpro` from (((((`public_alkardex` `t` join
 `public_ums` `x` on((`t`.`um` = `x`.`um`))) join 
 `public_almacendocs` `s` on((`s`.`id` = `t`.`hidvale`))) join 
 `public_docompra` `d` on(((`d`.`id` = `t`.`idref`) and (`d`.`coddocu` = `t`.`codocuref`)))) join 
 `public_ocompra` `o` on((`d`.`hidguia` = `o`.`idguia`))) join
  `public_clipro` `c` on((`c`.`codpro` = `o`.`codpro`))) ;


-- Volcando estructura para vista nautilus.vw_eventos
DROP VIEW IF EXISTS `vw_eventos`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_eventos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_eventos` AS select `eventos`.`id` AS `id`,`eventos`.`codocu` AS `codocu`,`eventos`.`estadofinal` AS `estadofinal`,`eventos`.`estadoinicial` AS `estadoinicial`,`eventos`.`descripcion` AS `descripcion`,`eventos`.`creadopor` AS `creadopor`,`eventos`.`creadoel` AS `creadoel`,`estadoinicial`.`estado` AS `einicial`,`documentos`.`desdocu` AS `desdocu`,`estadofinal`.`estado` AS `efinal` from (((`public_eventos` `eventos` join `public_documentos` `documentos`) join `public_estado` `estadoinicial`) join `public_estado` `estadofinal`) where ((`eventos`.`codocu` = `documentos`.`coddocu`) and (`eventos`.`estadofinal` = `estadofinal`.`codestado`) and (`estadoinicial`.`codestado` = `eventos`.`estadoinicial`) and (`estadoinicial`.`codocu` = `eventos`.`codocu`) and (`estadofinal`.`codocu` = `eventos`.`codocu`)) ;


-- Volcando estructura para vista nautilus.vw_guia
DROP VIEW IF EXISTS `vw_guia`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_guia`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_guia` AS select `guia`.`id` AS `id`,documentos.desdocu,
`guia`.`c_numgui` AS `c_numgui`,
`guia`.`c_coclig` AS `c_coclig`,`guia`.`cod_cen` AS `cod_cen`,
`guia`.`d_fecgui` AS `d_fecgui`,`guia`.`c_estgui` AS `c_estgui`,
`guia`.`c_rsguia` AS `c_rsguia`,`guia`.`c_codtra` AS `c_codtra`,
`guia`.`c_trans` AS `c_trans`,`guia`.`codocu` AS `codocu`,
`guia`.`c_motivo` AS `c_motivo`,`guia`.`c_placa` AS `c_placa`,
`guia`.`c_licon` AS `c_licon`,`guia`.`d_fectra` AS `d_fectra`,
`guia`.`n_direc` AS `n_direc`,`guia`.`c_desgui` AS `c_desgui`,
`guia`.`n_guia` AS `n_guia`,`guia`.`c_texto` AS `c_texto`,
`guia`.`c_dirsoc` AS `c_dirsoc`,`guia`.`c_serie` AS `c_serie`,
`guia`.`c_salida` AS `c_salida`,`guia`.`n_direcformaldes` AS `n_direcformaldes`,
`guia`.`n_directran` AS `n_directran`,`guia`.`n_dirsoc` AS `n_dirsoc`,
`detgui`.`c_estado` AS `c_estado`,`detgui`.`n_hguia` AS `n_hguia`,
`detgui`.`c_itguia` AS `c_itguia`,`detgui`.`c_af` AS `c_af`,`detgui`.`c_codsap` AS `c_codsap`,
`detgui`.`hidref` AS `hidref`,`detgui`.`docref` AS `docref`,`detgui`.`n_cangui` AS `n_cangui`,
`detgui`.`c_codgui` AS `c_codgui`,`detgui`.`c_edgui` AS `c_edgui`,`detgui`.`c_descri` AS `c_descri`,
`detgui`.`m_obs` AS `m_obs`,`detgui`.`c_codactivo` AS `c_codactivo`,`detgui`.`c_um` AS `c_um`,
`detgui`.`c_codep` AS `c_codep`,`detgui`.`l_libre` AS `l_libre`,
`direcciones_c`.`c_direc` AS `ptopartida`,`paraqueva`.`motivo` AS `desmotivo`,
`direcciones_c`.`c_distrito` AS `distpartida`,`direcciones_c`.`c_prov` AS `provpartida`,
`direcciones_c`.`c_departam` AS `dptopartida`,`direcciones`.`c_direc` AS `direcciontransportista`,
`direcciones_a`.`c_direc` AS `direccionformaldes`,`direcciones_b`.`c_direc` AS `ptollegada`,
`direcciones_b`.`c_distrito` AS `distllegada`,`direcciones_b`.`c_prov` AS `provllegada`,
`direcciones_b`.`c_departam` AS `dptollegada`,`clipro_a`.`despro` AS `razondestinatario`,
`detgui`.`n_hconformidad` AS `n_hconformidad`,`clipro_a`.`rucpro` AS `rucdestinatario`,
`clipro`.`rucpro` AS `ructrans`,`clipro`.`despro` AS `razontransportista`,
`sociedades`.`rucsoc` AS `rucsoc`,`embarcaciones`.`nomep` AS `nomep`,
`estado_b`.`estado` AS `estadodetalle`,`estado`.`estado` AS `estado`,
`objetos_cliente`.`nombreobjeto`,
`documentos`.`y_report` AS `y_report`,`documentos`.`x_report` AS `x_report`,`ums`.`desum` AS `desum` 
from (((((((((((((((`public_guia` `guia` join `public_detgui` `detgui` on((`guia`.`id` = `detgui`.`n_hguia`))) 
join `public_direcciones` `direcciones_c` on((`direcciones_c`.`n_direc` = `guia`.`n_dirsoc`))) join 
`public_direcciones` `direcciones_b` on((`guia`.`n_direc` = `direcciones_b`.`n_direc`))) join 
`public_direcciones` `direcciones` on((`guia`.`n_directran` = `direcciones`.`n_direc`))) join 
`public_direcciones` `direcciones_a` on((`guia`.`n_direcformaldes` = `direcciones_a`.`n_direc`))) join
 `public_sociedades` `sociedades` on((`guia`.`c_rsguia` = `sociedades`.`socio`))) join 
 `public_clipro` `clipro_a` on((`guia`.`c_coclig` = `clipro_a`.`codpro`))) join 
 `public_clipro` `clipro` on((`guia`.`c_codtra` = `clipro`.`codpro`))) join 
  `public_objetos_cliente` `objetos_cliente` on (`objetos_cliente`.`codpro`= `guia`.`c_coclig`  and   `objetos_cliente`.`codobjeto`=
  `detgui`.`codob`          ) ) join
 `public_estado` `estado` on(((`guia`.`c_estgui` = `estado`.`codestado`) and 
 (`estado`.`codocu` = `guia`.`codocu`)))) join `public_embarcaciones` `embarcaciones` 
 on((`detgui`.`c_codep` = `embarcaciones`.`codep`))) join `public_paraqueva` `paraqueva`
  on((`detgui`.`c_edgui` = `paraqueva`.`cmotivo`))) join `public_estado` `estado_b` 
  on(((`detgui`.`c_estado` = `estado_b`.`codestado`) and (`estado_b`.`codocu` = `detgui`.`codocu`)))) join 
  `public_documentos` `documentos` on((`guia`.`codocu` = `documentos`.`coddocu`))) join
   `public_ums` `ums` on((`detgui`.`c_um` = `ums`.`um`))) ;


-- Volcando estructura para vista nautilus.vw_hojaruta
DROP VIEW IF EXISTS `vw_hojaruta`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_hojaruta`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_hojaruta` AS select a.nombrelista,a.comentario,a.id ,
 b.id as idmasterlistamateriales,
m.descripcion,b.codigo,
b.hidlista, c.id as iddetallelista, c.codigo as codart,c.um,c.cant,e.desum,
x.codtipo,x.destipo from
public_listamateriales a,
public_masterlistamateriales b,
public_dlistamaeriales c,
public_ums e,
public_tipolista x,
public_maestrocomponentes m
where
a.id=c.hidlista and
m.codigo=c.codigo and 
e.um=c.um and
b.hidlista=a.id and 
x.codtipo=a.codtipo ;


-- Volcando estructura para vista nautilus.vw_imputaciones
DROP VIEW IF EXISTS `vw_imputaciones`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_imputaciones`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_imputaciones` AS select a.desceco as desimputa, a.* from  public_cc a ;


-- Volcando estructura para vista nautilus.vw_inventariosimple
DROP VIEW IF EXISTS `vw_inventariosimple`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_inventariosimple`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_inventariosimple` AS select a.descripcion,c.punit,c.ubicacion,b.desum,c.codart, c.codalm, c.codcen ,
c.cantlibre,c.id,
round((`c`.`punit` * `c`.`cantlibre`),3) AS `ptlibre`,
round((`c`.`punit` * `c`.`canttran`),3) AS `pttran`,
round((`c`.`punit` * `c`.`cantres`),3) AS `ptres`,
round((((`c`.`punit` * `c`.`cantlibre`) + (`c`.`punit` * `c`.`canttran`)) +
 (`c`.`punit` * `c`.`cantres`)),3) AS `pttotal` 
from public_alinventario c
, public_ums b, public_maestrocomponentes a  where 
a.codigo=c.codart and a.um=b.um ;


-- Volcando estructura para vista nautilus.vw_kardex
DROP VIEW IF EXISTS `vw_kardex`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_kardex`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_kardex` AS select `s`.`numvale` AS `numvale`,
`t`.`codmoneda` AS `codmoneda`,`t`.`montomovido` AS `montomovido`,
`t`.`codart` AS `codart`,`t`.`codmov` AS `codmov`,`t`.`valido` AS `valido`,
`t`.`destino` AS `destino`,`t`.`checki` AS `checki`,`t`.`cant` AS `cant`,
`t`.`idref` AS `idref`,`t`.`alemi` AS `alemi`,`t`.`aldes` AS `aldes`,
`t`.`fecha` AS `fecha`,`t`.`coddoc` AS `coddoc`,`t`.`numdoc` AS `numdoc`,
`t`.`usuario` AS `usuario`,`t`.`um` AS `um`,`t`.`comentario` AS `comentario`,
`t`.`codocuref` AS `codocuref`,`t`.`numdocref` AS `numdocref`,
`t`.`codcentro` AS `codcentro`,`t`.`id` AS `id`,`t`.`codestado` AS `codestado`,
`t`.`prefijo` AS `prefijo`,`t`.`fechadoc` AS `fechadoc`,`t`.`correlativo` AS `correlativo`,
`t`.`numkardex` AS `numkardex`,`t`.`solicitante` AS `solicitante`,`t`.`hidvale` AS `hidvale`,
`a`.`descripcion` AS `descripcion`,`b`.`desdocu` AS `desdocu`,`c`.`movimiento` AS `movimiento`,
`x`.`desum` AS `desum` from (((((`public_alkardex` `t` join `public_maestrocomponentes` `a`) join 
`public_documentos` `b`) join `public_almacenmovimientos` `c`) join `public_ums` `x`) join
 `public_almacendocs` `s`) where ((`s`.`id` = `t`.`hidvale`) and (`t`.`codart` = `a`.`codigo`) 
 and (`t`.`codocuref` = `b`.`coddocu`) and (`t`.`codmov` = `c`.`codmov`) and (`t`.`um` = `x`.`um`)) ;


-- Volcando estructura para vista nautilus.vw_lugares
DROP VIEW IF EXISTS `vw_lugares`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_lugares`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_lugares` AS select `a`.`despro` AS `despro`,`b`.`codlugar` AS `codlugar`,
 `b`.`deslugar` AS `deslugar`,`b`.`claselugar` AS `claselugar`,
 `b`.`codpro` AS `codpro`,`b`.`id` AS `id`,`b`.`n_direc` AS `n_direc`,
 `c`.`c_direc` AS `c_direc`,`d`.`departamento` AS `departamento`,
 `d`.`provincia` AS `provincia`,`d`.`distrito` AS `distrito`,
 count(`x`.`codlugar`) AS `numeroactivos` from ((((`public_clipro` `a` join 
 `public_lugares` `b` on((`a`.`codpro` = `b`.`codpro`))) join 
 `public_direcciones` `c` on((`c`.`n_direc` = `b`.`n_direc`))) join 
 `public_ubigeos` `d` on(((`c`.`coddepa` = `d`.`coddep`) and 
 (`c`.`codprov` = `d`.`codprov`) and (`c`.`coddist` = `d`.`coddist`)))) left join
  `public_inventario` `x` on((`x`.`codlugar` = `b`.`codlugar`)))
   group by `a`.`despro`,`b`.`codlugar`,`b`.`deslugar`,`b`.`claselugar`,
	`b`.`codpro`,`b`.`n_direc`,`c`.`c_direc`,`d`.`departamento`,
	`d`.`provincia`,`d`.`distrito` ;


-- Volcando estructura para vista nautilus.vw_maestrodetalle
DROP VIEW IF EXISTS `vw_maestrodetalle`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_maestrodetalle`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_maestrodetalle` AS select `a`.`codigo` AS `codigo`,
`a`.`marca` AS `marca`,`c`.`desum` AS `desum`,`a`.`descripcion` AS `descripcion`,
`a`.`nparte` AS `nparte`,`a`.`um` AS `um`,`a`.`codtipo` AS `codtipo`,`a`.`esrotativo` AS `esrotativo`,
`b`.`canteconomica` AS `canteconomica`,`b`.`supervisionautomatica` AS `supervisionautomatica`,
`b`.`cantreposic` AS `cantreposic`,`b`.`canaldist` AS `canaldist`,
`b`.`cantreorden` AS `cantreorden`,`b`.`catval` AS `catval`,`b`.`codal` AS `codal`,
`b`.`codcentro` AS `codcentro`,`b`.`controlprecio` AS `controlprecio`,`b`.`sujetolote` AS `sujetolote`,
`b`.`tolerancia` AS `tolerancia` from ((`public_maestrocomponentes` `a` join `public_ums` `c`) join 
`public_maestrodetalle` `b`) where ((`a`.`codigo` = `b`.`codart`) and (`a`.`um` = `c`.`um`)) ;


-- Volcando estructura para vista nautilus.vw_movimientos
DROP VIEW IF EXISTS `vw_movimientos`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_movimientos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_movimientos` AS select `a`.`m_obs` AS `m_obs`,z.c_serie,
`x`.`desum` AS `desum`,`a`.`idtemp` AS `idtemp`,`a`.`id` AS `id`,
`a`.`n_hguia` AS `n_hguia`,`a`.`c_itguia` AS `c_itguia`,
`a`.`n_cangui` AS `n_cangui`,`a`.`idstatus` AS `idstatus`,
`a`.`c_codgui` AS `c_codgui`,`a`.`c_edgui` AS `c_edgui`,
`a`.`c_descri` AS `c_descri`,`a`.`c_um` AS `c_um`,`a`.`c_codep` AS `c_codep`,
`a`.`c_estado` AS `c_estado`,`a`.`c_codactivo` AS `c_codactivo`,z.cod_cen,
`a`.`c_codsap` AS `c_codsap`,`b`.`nomep` AS `nomep`,`c`.`estado` AS `estado`,
`d`.`motivo` AS `desmotivo`, sum(f.cant) as asignado,o.numero ,z.c_numgui,c_salida
,z.d_fectra,j.despro,h.nombreobjeto
 from ((((((((( (public_guia z  join  `public_detgui` `a`  ) join `public_embarcaciones` `b`) join 
`public_estado` `c`) join `public_paraqueva` `d`) join `public_ums` `x`) join 
public_clipro j ) 
 left join
public_neot f on (f.hidne=a.id))
left join public_ot o  on  o.id=f.idot
) left join
public_objetosmaster k  on k.id=o.idobjeto )
left join
public_objetos_cliente h on h.id=k.hidobjeto
 )
 where
 z.id=a.n_hguia and 
 (`a`.`c_codep` = `b`.`codep`) and (`a`.`c_edgui` = `d`.`cmotivo`) and (j.codpro=z.c_coclig) and
  (`c`.`codestado` = `a`.`c_estado`) and (`c`.`codocu` = `a`.`codocu`) and (`a`.`c_um` = `x`.`um`) 

 group by m_obs,desum,idtemp,id,n_hguia,c_itguia,
 n_cangui,idstatus,c_codgui,c_edgui,c_descri,c_um,c_codep,c_estado,
 c_codactivo,c_codsap,nomep,estado,desmotivo,numero ,c_numgui,c_salida,despro,nombreobjeto ;


-- Volcando estructura para vista nautilus.vw_movpendientes
DROP VIEW IF EXISTS `vw_movpendientes`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_movpendientes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_movpendientes` AS select z.c_salida,z.c_numgui,  z.c_serie,`x`.`desum` AS `desum`,`a`.`idtemp` AS `idtemp`,`a`.`id` AS `id`,
`a`.`n_hguia` AS `n_hguia`,`a`.`c_itguia` AS `c_itguia`,`a`.`n_cangui` AS `n_cangui`,`a`.`idstatus` AS `idstatus`,
`a`.`c_codgui` AS `c_codgui`,`a`.`c_edgui` AS `c_edgui`,`a`.`c_descri` AS `c_descri`,`a`.`c_um` AS `c_um`,`a`.`c_codep` AS `c_codep`,
`a`.`c_estado` AS `c_estado`,`a`.`c_codactivo` AS `c_codactivo`,z.cod_cen,`a`.`c_codsap` AS `c_codsap`,`b`.`nomep` AS `nomep`,`c`.`estado` AS `estado`,
`d`.`motivo` AS `desmotivo`, sum(f.cant) as asignado
,z.d_fectra,j.despro
 from (((((( (public_guia z  join  `public_detgui` `a`  ) join `public_embarcaciones` `b`) join 
`public_estado` `c`) join `public_paraqueva` `d`) join `public_ums` `x`) join 
public_clipro j )  left join
public_neot f on (f.hidne=a.id))
 where
 z.id=a.n_hguia and 
 (`a`.`c_codep` = `b`.`codep`) and (`a`.`c_edgui` = `d`.`cmotivo`) and (j.codpro=z.c_coclig) and
  (`c`.`codestado` = `a`.`c_estado`) and (`c`.`codocu` = `a`.`codocu`) and (`a`.`c_um` = `x`.`um`) 

 group by c_serie,desum,idtemp,id,n_hguia,c_itguia,
 n_cangui,idstatus,c_codgui,c_edgui,c_descri,c_um,c_codep,c_estado,
 c_codactivo,c_codsap,nomep,estado,desmotivo ,c_numgui,c_salida,despro ;


-- Volcando estructura para vista nautilus.vw_objetos
DROP VIEW IF EXISTS `vw_objetos`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_objetos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_objetos` AS select t.id,t.serie,m.codigo, o.nombreobjeto,o.codobjeto,  m.descripcion,m.marca,m.modelo,t.identificador
 ,c.rucpro,c.despro from public_objetosmaster t 
,public_clipro c ,public_masterequipo m ,public_objetos_cliente o
where m.codigo=t.hcodobmaster and
o.codpro=c.codpro and 
t.hidobjeto=o.id ;


-- Volcando estructura para vista nautilus.vw_ocompra
DROP VIEW IF EXISTS `vw_ocompra`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_ocompra`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_ocompra` AS select `coti`.`numcot` AS `numcot`,`coti`.`codpro` AS `codpro`,
`coti`.`fecdoc` AS `fecdoc`,`coti`.`codcon` AS `codcon`,`coti`.`codestado` AS `codestado`,`coti`.`texto` AS `texto`,
`coti`.`textolargo` AS `textolargo`,`coti`.`tipologia` AS `tipologia`,`coti`.`moneda` AS `moneda`,`coti`.`orcli` AS `orcli`,
`coti`.`descuento` AS `descuento`,`coti`.`usuario` AS `usuario`,`coti`.`coddocu` AS `coddocu`,`coti`.`codtipofac` AS `codtipofac`,
`coti`.`codsociedad` AS `codsociedad`,`coti`.`codgrupoventas` AS `codgrupoventas`,`coti`.`codtipocotizacion` AS `codtipocotizacion`,
`coti`.`validez` AS `validez`,`coti`.`codcentro` AS `codcentro`,`coti`.`nigv` AS `nigv`,`coti`.`codobjeto` AS `codobjeto`,
`coti`.`fechapresentacion` AS `fechapresentacion`,`coti`.`fechanominal` AS `fechanominal`,
`coti`.`idguia` AS `idguia`,`x`.`id` AS `id`,`x`.`codentro` AS `codentro`,`x`.`codigoalma` AS `codigoalma`,
`x`.`codart` AS `codart`,`x`.`disp` AS `disp`,`x`.`cant` AS `cant`,`x`.`punit` AS `punit`,
`x`.`item` AS `item`,`x`.`descri` AS `descri`,`x`.`stock` AS `stock`,`x`.`detalle` AS `detalle`,
`x`.`tipoitem` AS `tipoitem`,(((`coti`.`descuento` * `x`.`punit`) * `x`.`cant`) / 100) AS `descontado`,
((`x`.`punit` * `x`.`cant`) * (1 - (`coti`.`descuento` / 100))) AS `totalneto`,
`x`.`estadodetalle` AS `estadodetalle`,`x`.`um` AS `um`,`x`.`hidguia` AS `hidguia`,
`x`.`codservicio` AS `codservicio`,`x`.`tipoimputacion` AS `tipoimputacion`,`x`.`punitdes` AS `punitdes`,
(`x`.`punit` * `x`.`cant`) AS `subto`,`t_moneda`.`desmon` AS `desmon`,`t_moneda`.`simbolo` AS `simbolo`,
`tipofacturacion`.`tipofacturacion` AS `tipofacturacion`,`estado`.`estado` AS `estado`,
`sociedades`.`rucsoc` AS `rucsoc`,`sociedades`.`dsocio` AS `dsocio`,
`contactos`.`c_nombre` AS `c_nombre`,`contactos`.`c_cargo` AS `c_cargo`,
`contactos`.`c_tel` AS `c_tel`,`contactos`.`c_mail` AS `c_mail`,`clipro`.`despro` AS `despro`,
`clipro`.`rucpro` AS `rucpro`,`clipro`.`emailpro` AS `emailpro`,`documentos`.`desdocu` AS `desdocu`,
`tenores`.`mensaje` AS `textocabeza`,`tenores1`.`mensaje` AS `textopie`,`trabajadores`.`ap` AS `ap`,
`trabajadores`.`am` AS `am`,`trabajadores`.`nombres` AS `nombres`,`trabajadores`.`telfijo` AS `telfijo`,
`trabajadores`.`telmoviles` AS `telmoviles`,`direcciones`.`c_direc` AS `c_direc`,`ums`.`desum` AS `desum`
 from (((((((((((((`public_ocompra` `coti` join `public_docompra` `x` on((`coti`.`idguia` = `x`.`hidguia`))) join 
 `public_monedas` `t_moneda` on((`coti`.`moneda` = `t_moneda`.`codmoneda`))) join
  `public_tipofacturacion` `tipofacturacion` on((`coti`.`codtipofac` = `tipofacturacion`.`codtipofac`))) join
   `public_estado` `estado` on(((`coti`.`codestado` = `estado`.`codestado`) and (`coti`.`coddocu` = `estado`.`codocu`)))) join
	 `public_sociedades` `sociedades` on((`coti`.`codsociedad` = `sociedades`.`socio`))) join 
	 `public_contactos` `contactos` on((`coti`.`idcontacto` = `contactos`.`id`))) join 
	 `public_clipro` `clipro` on((`coti`.`codpro` = `clipro`.`codpro`))) join `public_documentos` `documentos` 
	 on((`coti`.`coddocu` = `documentos`.`coddocu`))) join `public_tenores` `tenores` 
	 on(((`coti`.`tenorsup` = `tenores`.`posicion`) and (`coti`.`coddocu` = `tenores`.`coddocu`) 
	 and (`coti`.`codsociedad` = `tenores`.`sociedad`)))) join `public_tenores` `tenores1` on
	 (((`coti`.`tenorinf` = `tenores1`.`posicion`) and (`coti`.`coddocu` = `tenores1`.`coddocu`) and
	  (`coti`.`codsociedad` = `tenores1`.`sociedad`)))) join `public_trabajadores` `trabajadores` on
	  ((`coti`.`codresponsable` = `trabajadores`.`codigotra`))) join `public_direcciones` `direcciones` on
	  ((`coti`.`direcentrega` = `direcciones`.`n_direc`))) join `public_ums` `ums` on((`x`.`um` = `ums`.`um`))) 
	  order by `x`.`hidguia`,`x`.`item` ;


-- Volcando estructura para vista nautilus.vw_ocomprasimple
DROP VIEW IF EXISTS `vw_ocomprasimple`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_ocomprasimple`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_ocomprasimple` AS select `coti`.`numcot` AS `numcot`,`coti`.`codpro` AS `codpro`,
`coti`.`fecdoc` AS `fecdoc`,`coti`.`tipologia` AS `tipologia`,`coti`.`codestado` AS `codestado`,
`coti`.`moneda` AS `moneda`,`coti`.`descuento` AS `descuento`,`coti`.`usuario` AS `usuario`,
`clipro`.`despro` AS `despro`,`clipro`.`rucpro` AS `rucpro`,`coti`.`coddocu` AS `coddocu`,
`coti`.`codtipofac` AS `codtipofac`,`coti`.`codsociedad` AS `codsociedad`,
`coti`.`codgrupoventas` AS `codgrupoventas`,`coti`.`codtipocotizacion` AS `codtipocotizacion`,
`coti`.`validez` AS `validez`,`coti`.`codcentro` AS `codcentro`,`coti`.`codobjeto` AS `codobjeto`,
`coti`.`fechapresentacion` AS `fechapresentacion`,`coti`.`fechanominal` AS `fechanominal`,
`coti`.`idguia` AS `idguia`,`y`.`numero` AS `numsolpe`,`x`.`id` AS `id`,`x`.`codentro` AS `codentro`,
`x`.`codigoalma` AS `codigoalma`,`x`.`codart` AS `codart`,`x`.`disp` AS `disp`,`x`.`cant` AS `cant`,
`x`.`punit` AS `punit`,`x`.`item` AS `item`,`x`.`descri` AS `descri`,`x`.`stock` AS `stock`,`x`.`detalle` AS 
`detalle`,`x`.`tipoitem` AS `tipoitem`,(((`coti`.`descuento` * `x`.`punit`) * `x`.`cant`) / 100) AS `descontado`,
((`x`.`punit` * `x`.`cant`) * (1 - (`coti`.`descuento` / 100))) AS `totalneto`,`x`.`estadodetalle` AS `estadodetalle`,
`x`.`um` AS `um`,`x`.`hidguia` AS `hidguia`,`x`.`codservicio` AS `codservicio`,`x`.`tipoimputacion` AS `tipoimputacion`,
`x`.`punitdes` AS `punitdes`,(`x`.`punit` * `x`.`cant`) AS `subto`,`t_moneda`.`desmon` AS `desmon`,
`t_moneda`.`simbolo` AS `simbolo`,`estado`.`estado` AS `estado`,`ums`.`desum` AS `desum`,
sum(`n`.`cant`) AS `entregado` from ((((((((`public_ocompra` `coti` join `public_docompra` `x` on
((`coti`.`idguia` = `x`.`hidguia`))) join `public_monedas` `t_moneda` on
((`coti`.`moneda` = `t_moneda`.`codmoneda`))) join `public_estado` `estado` on
(((`coti`.`codestado` = `estado`.`codestado`) and (`coti`.`coddocu` = `estado`.`codocu`)))) join
 `public_clipro` `clipro` on((`coti`.`codpro` = `clipro`.`codpro`))) join `public_ums` `ums` on((`x`.`um` = `ums`.`um`))) 
 left join `public_desolpe` `z` on((`z`.`id` = `x`.`iddesolpe`))) 
 left join `public_solpe` `y` on((`z`.`hidsolpe` = `y`.`id`))) 
 left join `public_alentregas` `n` on((`n`.`iddetcompra` = `x`.`id`))) 
 group by `coti`.`numcot`,`y`.`numero`,`coti`.`codpro`,`coti`.`fecdoc`,
 `coti`.`tipologia`,`coti`.`moneda`,`coti`.`descuento`,`coti`.`usuario`,
 `coti`.`coddocu`,`coti`.`codtipofac`,`coti`.`codsociedad`,`coti`.`codgrupoventas`,
 `coti`.`codtipocotizacion`,`coti`.`validez`,`coti`.`codcentro`,`coti`.`codobjeto`,
 `coti`.`fechapresentacion`,`coti`.`fechanominal`,`coti`.`idguia`,`x`.`codentro`,
 `x`.`codigoalma`,`x`.`codart`,`x`.`disp`,`x`.`cant`,`x`.`punit`,`x`.`item`,
 `x`.`descri`,`x`.`stock`,`x`.`detalle`,`x`.`tipoitem`,(((`coti`.`descuento` * `x`.`punit`) * `x`.`cant`) / 100),
 ((`x`.`punit` * `x`.`cant`) * (1 - (`coti`.`descuento` / 100))),
 `x`.`codservicio`,`x`.`tipoimputacion`,`x`.`punitdes`,
 (`x`.`punit` * `x`.`cant`),`t_moneda`.`desmon`,`t_moneda`.`simbolo`,
 `estado`.`estado`,`ums`.`desum` order by `x`.`hidguia`,`x`.`item` ;


-- Volcando estructura para vista nautilus.vw_opcionesdocumentos
DROP VIEW IF EXISTS `vw_opcionesdocumentos`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_opcionesdocumentos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_opcionesdocumentos` AS select 
`documentos`.`desdocu` AS `desdocu`,`opcionesdocumentos`.`idopdoc` AS 
`idopdoc`,`opcionescamposdocu`.`campo` AS `campo`,`opcionescamposdocu`.`nombrecampo` AS
 `nombrecampo`,`opcionescamposdocu`.`nombredelmodelo` AS
  `nombredelmodelo`,`opcionescamposdocu`.`tipodato` AS 
  `tipodato`,`opcionescamposdocu`.`longitud` AS
   `longitud`,`opcionesdocumentos`.`id` AS `id`,`opcionesdocumentos`.`idusuario` AS 
	`idusuario`,`cruge_user`.`username` AS `username`,`documentos`.`coddocu` AS
	 `coddocu`,`opcionesdocumentos`.`valor` AS `valor`,`opcionescamposdocu`.`seleccionable` AS 
	 `seleccionable` from (((`public_documentos` `documentos` join `cruge_user`) join 
	 `public_opcionescamposdocu` `opcionescamposdocu`) join 
	 `public_opcionesdocumentos` `opcionesdocumentos`) where 
	 ((`documentos`.`coddocu` = `opcionescamposdocu`.`codocu`) and 
	 (`opcionesdocumentos`.`idopdoc` = `opcionescamposdocu`.`id`) and 
	 (`opcionesdocumentos`.`idusuario` = `cruge_user`.`iduser`)) ;


-- Volcando estructura para vista nautilus.vw_otdetalle
DROP VIEW IF EXISTS `vw_otdetalle`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_otdetalle`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_otdetalle` AS select c.despro,c.rucpro,
o.identificador,o.serie,m.descripcion,
m.marca,m.modelo,n.nombreobjeto,n.codobjeto,r.item,r.textoactividad,r.id as idetot,
t.*  
from public_ot t, public_clipro c,public_objetosmaster o,
public_masterequipo m,public_objetos_cliente n,public_detot r
where c.codpro=t.codpro
and
o.id=t.idobjeto
and 
m.codigo=o.hcodobmaster
and n.id=o.hidobjeto 
and
r.hidorden=t.id ;


-- Volcando estructura para vista nautilus.vw_otsimple
DROP VIEW IF EXISTS `vw_otsimple`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_otsimple`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_otsimple` AS select c.despro,c.rucpro,
o.identificador,o.serie,m.descripcion,
m.marca,m.modelo,n.nombreobjeto,n.codobjeto,
t.*  
from public_ot t, public_clipro c,public_objetosmaster o,
public_masterequipo m,public_objetos_cliente n
where c.codpro=t.codpro
and
o.id=t.idobjeto
and 
m.codigo=o.hcodobmaster
and n.id=o.hidobjeto ;


-- Volcando estructura para vista nautilus.vw_pareto
DROP VIEW IF EXISTS `vw_pareto`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_pareto`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_pareto` AS select `t`.`codart` AS `codart`,t.id,
`t`.`desum` AS `desum`,round(`t`.`punit`,2) AS `punit`,`t`.`descripcion` AS `descripcion`,
round(`t`.`ptlibre`,2) AS `ptlibre`,`t`.`ubicacion` AS `ubicacion`,`t`.`codalm` AS `codalm`,
`t`.`codcen` AS `codcen`,`t`.`cantlibre` AS `cantlibre`,`w`.`ranking` AS `ranking`,`w`.`clase` AS `clase`,
round(`w`.`acumulado`,1) AS `acumulado`,`w`.`porcentaje` AS `porcentaje`,`w`.`hinventario` AS `hinventario`,
`w`.`idsesion` AS `idsesion`,`w`.`column_7` AS `column_7`,`w`.`porcentajeac` AS `porcentajeac` 
from (`public_pareto` `w` join `vw_inventariosimple` `t`) where (`t`.`id` = `w`.`hinventario`) ;


-- Volcando estructura para vista nautilus.vw_reservaspendientes2
DROP VIEW IF EXISTS `vw_reservaspendientes2`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_reservaspendientes2`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_reservaspendientes2` AS select `j`.`id` AS `hidinventario`,`a`.`id` AS `idsolpe`,
`d`.`id` AS `iddesolpe`,`a`.`numero` AS `numero`,`b`.`imputacion` AS `imputacion`,
`b`.`fechaent` AS `fechaent`,`b`.`iduser` AS `idusersolpe`,`b`.`codart` AS `codart`,
`b`.`item` AS `item`,`b`.`codal` AS `codal`,`b`.`centro` AS `centro`,
`b`.`txtmaterial` AS `txtmaterial`,`d`.`desum` AS `desum`,
`b`.`cant` AS `cantdesolpe`,`c`.`hidesolpe` AS `hidesolpe`,
`c`.`fechares` AS `fecha_reserva`,`c`.`id` AS `idreserva`,
`c`.`codocu` AS `codocu`,`c`.`cant` AS `cantidad_reservada`,
`c`.`usuario` AS `usuario_reserva`,`c`.`estadoreserva` AS `estadoreserva`,
`x`.`desdocu` AS `desdocu_reserva`,abs(sum(`e`.`cant`)) AS 
`cantidad_atendida`,(`c`.`cant` -  abs(sum((`e`.`cant`))) )AS 
`cantidad_pendiente` from ((((((`public_solpe` `a` join 
`public_desolpe` `b` on((`a`.`id` = `b`.`hidsolpe`))) join 
`public_alinventario` `j` on(((`b`.`codart` = `j`.`codart`) and 
(`b`.`codal` = `j`.`codalm`) and (`b`.`centro` = `j`.`codcen`)))) join
 `public_alreserva` `c` on((`b`.`id` = `c`.`hidesolpe`))) join 
 `public_ums` `d` on((`d`.`um` = `b`.`um`))) join
  `public_documentos` `x` on((`c`.`codocu` = `x`.`coddocu`))) left join
   `public_atencionreserva` `e` on((`c`.`id` = `e`.`hidreserva`))) group by 
	`j`.`id`,`b`.`iduser`,`a`.`id`,`a`.`numero`,`c`.`estadoreserva`,`b`.`id`,
	`b`.`fechaent`,`b`.`codart`,`b`.`item`,`b`.`codal`,`b`.`centro`,
	`b`.`txtmaterial`,`d`.`desum`,`c`.`hidesolpe`,`c`.`fechares`,
	`b`.`cant`,`b`.`imputacion`,`c`.`id`,`c`.`codocu`,`c`.`cant`,
	`c`.`usuario`,`x`.`desdocu` ;


-- Volcando estructura para vista nautilus.vw_solpe
DROP VIEW IF EXISTS `vw_solpe`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_solpe`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_solpe` AS select `t`.`punitplan` AS `punitplan`,`t`.`punitreal` AS `punitreal`,a.textocabecera,a.fechadoc,a.iduser,
`a`.`id` AS `identidad`,`t`.`numero` AS `numero`,`t`.`posicion` AS `posicion`,s.desdocu,g.destipo,
`t`.`tipimputacion` AS `tipimputacion`,`t`.`centro` AS `centro`,
`t`.`codal` AS `codal`,`t`.`codart` AS `codart`,`t`.`txtmaterial` AS `txtmaterial`,
`t`.`grupocompras` AS `grupocompras`,`t`.`usuario` AS `usuario`,`t`.`textodetalle` AS `textodetalle`,
`t`.`fechacrea` AS `fechacrea`,`t`.`fechaent` AS `fechaent`,a.escompra,
`t`.`fechalib` AS `fechalib`,`t`.`estadolib` AS `estadolib`,
`t`.`imputacion` AS `imputacion`,`t`.`solicitanet` AS `solicitanet`,
`t`.`hidsolpe` AS `hidsolpe`,`t`.`id` AS `id`,`x`.`desum` AS `desum`,
`t`.`codocu` AS `codocu`,`t`.`um` AS `um`,`t`.`tipsolpe` AS `tipsolpe`,
`t`.`est` AS `est`,`t`.`cant` AS `cant`,`t`.`item` AS `item`,`a`.`numero` AS `numsolpe`,
`a`.`estado` AS `estado`,`a`.`codocu` AS `codigodoc`
 from ((((`public_solpe` `a` join `public_desolpe` `t`) join 
 `public_ums` `x`    ) join `public_documentos` `s`  )   join `public_tiposolpe` g ) where 
 (
 (`a`.`id` = `t`.`hidsolpe`) and (`t`.`um` = `x`.`um`) and (`t`.`est` <> '99')
 and (`s`.`coddocu` = a.codocu) and  (`g`.`codtipo` = a.escompra)
 ) ;


-- Volcando estructura para vista nautilus.vw_solpeatencion
DROP VIEW IF EXISTS `vw_solpeatencion`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_solpeatencion`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_solpeatencion` AS select `q`.`numero` AS `numero`,`t`.`um` AS `um`,
`t`.`centro` AS `centro`,`t`.`codal` AS `codal`,`t`.`usuario` AS `usuario`,`t`.`fechacrea` AS `fechacrea`,
`t`.`fechaent` AS `fechaent`,`t`.`imputacion` AS `imputacion`,`t`.`hidsolpe` AS `hidsolpe`,
`t`.`codocu` AS `codocu`,`t`.`id` AS `id`,`t`.`item` AS `item`,`t`.`cant` AS `cant`,
`t`.`txtmaterial` AS `txtmaterial`,`t`.`codart` AS `codart`,`s`.`desum` AS `desum`,
`r`.`cantlibre` AS `cantlibre`,`u`.`desum` AS `umbase`,`r`.`canttran` AS `canttran`,
`r`.`cantres` AS `cantres` from (((((`public_desolpe` `t` join `public_solpe` `q`) join 
`public_ums` `s`) join `public_alinventario` `r`) join `public_ums` `u`) join
 `public_maestrocomponentes` `m`) where ((`t`.`hidsolpe` = `q`.`id`) and 
 (`t`.`um` = `s`.`um`) and (`t`.`centro` = `r`.`codcen`) and (`t`.`codal` = `r`.`codalm`) 
 and (`t`.`codart` = `r`.`codart`) and (`r`.`codart` = `m`.`codigo`) and (`m`.`um` = `u`.`um`)) ;


-- Volcando estructura para vista nautilus.vw_solpeparacomprar
DROP VIEW IF EXISTS `vw_solpeparacomprar`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_solpeparacomprar`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_solpeparacomprar` AS select `a`.`escompra` AS `escompra`,b.textodetalle,`a`.`numero` AS `numero`,`a`.`estado` AS `estado`,`b`.`item` AS `item`,`b`.`id` AS `id`,`b`.`est` AS `est`,`b`.`tipimputacion` AS `tipimputacion`,`b`.`punitplan` AS `punitplan`,`a`.`id` AS `identidad`,`b`.`fechaent` AS `fechaent`,`b`.`fechacrea` AS `fechacrea`,`b`.`usuario` AS `usuario`,`b`.`um` AS `um`,`b`.`tipsolpe` AS `tipsolpe`,`b`.`centro` AS `centro`,`b`.`codal` AS `codal`,`b`.`codart` AS `codart`,`b`.`imputacion` AS `imputacion`,`b`.`cant` AS `cant`,`d`.`desum` AS `desum`,`b`.`txtmaterial` AS `txtmaterial`,sum(`c`.`cant`) AS `cantatendida`,(`b`.`cant` - sum(`c`.`cant`)) AS `cant_pendiente` from (((`public_solpe` `a` join `public_desolpe` `b` on((`a`.`id` = `b`.`hidsolpe`))) left join `public_desolpecompra` `c` on((`b`.`id` = `c`.`iddesolpe`))) join `public_ums` `d` on((`d`.`um` = `b`.`um`))) where (`a`.`escompra` = '1') group by `a`.`escompra`,`a`.`numero`,`a`.`fechanec`,`b`.`centro`,`b`.`txtmaterial`,`b`.`codal`,`b`.`codart`,`b`.`imputacion`,`b`.`cant`,`d`.`desum` having ((sum(`c`.`cant`) < `cant`) or isnull(sum(`c`.`cant`))) ;


-- Volcando estructura para vista nautilus.vw_stocktotal_almacenes
DROP VIEW IF EXISTS `vw_stocktotal_almacenes`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_stocktotal_almacenes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_stocktotal_almacenes` AS select `a`.`codcen` AS `codcen`,
`a`.`codalm` AS `codalm`,`a`.`codsoc` AS `codsoc`,`a`.`nomal` AS `nomal`,
sum(((`b`.`punit` + `b`.`punitdif`) * `b`.`cantlibre`)) AS `stocklibre`,
sum(((`b`.`punit` + `b`.`punitdif`) * `b`.`cantres`)) AS `stockreservado`,
sum(((`b`.`punit` + `b`.`punitdif`) * `b`.`canttran`)) AS `stocktransito` 
from (`public_alinventario` `b` join `public_almacenes` `a`) 
where ((`a`.`codalm` = `b`.`codalm`) and (`a`.`codcen` = `b`.`codcen`)) 
group by `a`.`codcen`,`a`.`codsoc`,`a`.`nomal` ;


-- Volcando estructura para vista nautilus.vw_stock_por_tipos
DROP VIEW IF EXISTS `vw_stock_por_tipos`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_stock_por_tipos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_stock_por_tipos` AS select `n`.`destipo` AS `destipo`,
`n`.`codtipo` AS `codtipo`,`a`.`codcen` AS `codcen`,`a`.`codalm` AS `codalm`,a.codmon,
`a`.`codsoc` AS `codsoc`,`a`.`nomal` AS `nomal`,
sum(((`b`.`punit` + `b`.`punitdif`) * `b`.`cantlibre`)) AS `stocklibre`,
sum(((`b`.`punit` + `b`.`punitdif`) * `b`.`cantres`)) AS `stockreservado`,
sum(((`b`.`punit` + `b`.`punitdif`) * `b`.`canttran`)) AS `stocktransito` 
from (((`public_alinventario` `b` join `public_almacenes` `a`) join
 `public_maestrocomponentes` `m`) join `public_maestrotipos` `n`) where
  ((`a`.`codalm` = `b`.`codalm`) and (`a`.`codcen` = `b`.`codcen`) and
   (`b`.`codart` = `m`.`codigo`) and (`m`.`codtipo` = `n`.`codtipo`)) 
	group by `n`.`destipo`,`n`.`codtipo`,`a`.`codcen`,`a`.`codsoc`,`a`.`nomal` ;


-- Volcando estructura para vista nautilus.vw_stock_supervision
DROP VIEW IF EXISTS `vw_stock_supervision`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_stock_supervision`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_stock_supervision` AS select `a`.`codart` AS `codart`,
`a`.`codcentro` AS `codcentro`,`a`.`codal` AS `codal`,`a`.`canteconomica` AS `canteconomica`,
`a`.`cantreposic` AS `cantreposic`,`a`.`cantreorden` AS `cantreorden`,`d`.`descripcion` AS `descripcion`,
`d`.`um` AS `um`,`c`.`desum` AS `desum`,`a`.`supervisionautomatica` AS `supervisionautomatica`,
`b`.`cantlibre` AS `cantlibre`,`b`.`cantres` AS `cantres`,`b`.`canttran` AS `canttran`,
`b`.`punit` AS `punit`,`b`.`id` AS `idinventario` from (((`public_maestrodetalle` `a` join 
`public_maestrocomponentes` `d`) join `public_ums` `c`) join `public_alinventario` `b`) where
 ((`a`.`codart` = `b`.`codart`) and (`a`.`codcentro` = `b`.`codcen`) and (`a`.`codal` = `b`.`codalm`) 
 and (`a`.`codart` = `d`.`codigo`) and (`d`.`um` = `c`.`um`) and (`a`.`supervisionautomatica` = '1')) ;


-- Volcando estructura para vista nautilus.vw_trabajadores
DROP VIEW IF EXISTS `vw_trabajadores`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_trabajadores`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_trabajadores` AS select `trabajadores`.`codigotra` AS 
`codigotra`,concat(`trabajadores`.`ap`,'-',`trabajadores`.`am`,'-',`trabajadores`.`nombres`) AS
 `nombrecompleto`,`trabajadores`.`codpuesto` AS `codpuesto`,`trabajadores`.`ap` AS 
 `ap`,`trabajadores`.`am` AS `am`,`trabajadores`.`nombres` AS `nombres`,`trabajadores`.`dni` AS
  `dni`,`oficios`.`oficio` AS `oficio` from (`public_trabajadores` `trabajadores` join 
  `public_oficios` `oficios`) where (`trabajadores`.`codpuesto` = `oficios`.`codof`) ;


-- Volcando estructura para vista nautilus.vw_trazabilidad_reservas
DROP VIEW IF EXISTS `vw_trazabilidad_reservas`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_trazabilidad_reservas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_trazabilidad_reservas` AS select  `a`.`hidesolpe` AS `hidesolpe`,`a`.`id` AS `id`,`a`.`fechares` AS `fecha_reserva`,
 `a`.`codocu` AS `codocu`,`a`.`estadoreserva` AS `estadoreserva`,`c`.`montomovido` AS `montomovido`,
 `c`.`cant` AS `cant`,`a`.`usuario` AS `usuario_reserva`,`f`.`desdocu` AS `desdocu_reserva`,
 `u`.`desum` AS `umsolic`,`uu`.`desum` AS `umatem`,`a`.`cant` AS `cantidad_reservada`,
 `b`.`cant` AS `cantidad_atendida`,`g`.`id` AS `idvale`,`g`.`fechacont` AS `fecha_atencion_vale`,
 `g`.`numvale` AS `numero_vale_atencion`,`x`.`fechacrea` AS `fecha_solicitud_compra`,
 `r`.`numero` AS `solicitud_compra`,`j`.`fecdoc` AS `fecha_compra`,`j`.`numcot` AS `orden_compra`,
 `k`.`numvale` AS `vale_ingreso_compra_almacen`,`k`.`fechacont` AS `fecha_vale_ingreso_almacen`,
 `s`.`cant` AS `xx` from (((((((((((((((`public_alreserva` `a`
  left join `public_documentos` `f` on((`f`.`coddocu` = `a`.`codocu`))) left join 
  `public_atencionreserva` `b` on((`a`.`id` = `b`.`hidreserva`))) left join 
  `public_alkardex` `c` on((`b`.`hidkardex` = `c`.`id`))) left join 
  `public_ums` `uu` on((`c`.`um` = `uu`.`um`)))
   left join `public_almacendocs` `g` on((`g`.`id` = `c`.`hidvale`)))	left join 
	`public_desolpe` `x` on((`x`.`idreserva` = `a`.`id`))) left join
	 `public_solpe` `r` on((`x`.`hidsolpe` = `r`.`id`))) left join 
	 `public_desolpecompra` `y` on((`x`.`id` = `y`.`iddesolpe`))) left join 
	 `public_desolpe` `v` on((`v`.`id` = `y`.`iddesolpe`))) left join 
	 `public_ums` `u` on((`u`.`um` = `v`.`um`))) left join 
	 `public_solpe` `w` on((`w`.`id` = `v`.`hidsolpe`))) left join
	  `public_docompra` `z` on((`z`.`id` = `y`.`iddocompra`))) left join 
	  `public_ocompra` `j` on((`j`.`idguia` = `z`.`hidguia`))) left join 
	  `public_alkardex` `s` on((`s`.`idref` = `x`.`id`)  and s.codocuref=x.codocu    )) left join 
	  `public_almacendocs` `k` on((`k`.`id` = `s`.`hidvale`))) ;


-- Volcando estructura para vista nautilus.vw_trazabilidad_solpe_1
DROP VIEW IF EXISTS `vw_trazabilidad_solpe_1`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_trazabilidad_solpe_1`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_trazabilidad_solpe_1` AS select `a`.`numero` AS `numero`,`b`.`centro` AS `centro`,`b`.`codal` AS `codal`,`b`.`codart` AS `codart`,`b`.`txtmaterial` AS `txtmaterial`,`b`.`fechaent` AS `fechaent`,`b`.`cant` AS `cant`,`b`.`item` AS `item`,`b`.`um` AS `um`,`c`.`desum` AS `desum`,`d`.`iddesolpe` AS `iddesolpe`,`d`.`iddocompra` AS `iddocompra`,`d`.`cant` AS `cantaten`,`d`.`fecha` AS `featencion`,`d`.`user` AS `user`,`e`.`cant` AS `cantcompras`,`e`.`item` AS `itemcompra`,`x`.`desum` AS `umcompra`,`f`.`numcot` AS `numcot`,`s`.`fecha` AS `fecha`,`s`.`cant` AS `cantkardex`,`s`.`codmov` AS `codmov`,`t`.`numvale` AS `numvale`,`u`.`movimiento` AS `movimiento` from (((((((((`public_solpe` `a` join `public_desolpe` `b` on((`a`.`id` = `b`.`hidsolpe`))) join `public_ums` `c` on((`c`.`um` = `b`.`um`))) join `public_desolpecompra` `d` on((`d`.`iddesolpe` = `b`.`id`))) join `public_docompra` `e` on((`e`.`id` = `d`.`iddocompra`))) join `public_ums` `x` on((`x`.`um` = `e`.`um`))) join `public_ocompra` `f` on((`f`.`idguia` = `e`.`hidguia`))) left join `public_alkardex` `s` on((`s`.`idref` = `e`.`id`))) left join `public_almacendocs` `t` on((`t`.`id` = `s`.`hidvale`))) left join `public_almacenmovimientos` `u` on((`t`.`codmovimiento` = `u`.`codmov`))) ;


-- Volcando estructura para vista nautilus.vw_usuarios
DROP VIEW IF EXISTS `vw_usuarios`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_usuarios`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_usuarios` AS select iduser, username ,email  from cruge_user ;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
