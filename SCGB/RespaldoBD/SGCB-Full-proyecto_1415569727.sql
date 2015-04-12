DROP TABLE IF EXISTS arriendo;

CREATE TABLE `arriendo` (
  `CODIGOARRIENDO` int(11) NOT NULL AUTO_INCREMENT,
  `A_NUMEROFACTURA` varchar(15) NOT NULL,
  `A_FECHAINICIO` date NOT NULL,
  `A_FECHATERMINO` date NOT NULL,
  `R_OBSERVACION` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`CODIGOARRIENDO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS cargo;

CREATE TABLE `cargo` (
  `CODIGOCARGO` int(11) NOT NULL AUTO_INCREMENT,
  `C_NOMBRE` varchar(30) NOT NULL,
  `C_DESCRIPCION` varchar(150) DEFAULT NULL,
  `C_ESTADO` int(1) NOT NULL,
  PRIMARY KEY (`CODIGOCARGO`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO cargo VALUES("1","Gerente","Persona encargada de la empresa","1");
INSERT INTO cargo VALUES("2","Sub-Gerente","Persona encargada de los aspectos técnicos de la empresa.","1");
INSERT INTO cargo VALUES("3","Supervisor","supervisor de personal","0");
DROP TABLE IF EXISTS detalle_prestamo;

CREATE TABLE `detalle_prestamo` (
  `CODIGOPRESTAMO` int(11) NOT NULL,
  `CODIGOPRODUCTO` varchar(20) NOT NULL,
  `CODIGOUNITARIO` int(11) NOT NULL,
  `DP_FECHADEVOLUCION` date DEFAULT NULL,
  `DP_USUARIO` varchar(20) DEFAULT NULL,
  `DP_ESTADO` int(1) NOT NULL,
  PRIMARY KEY (`CODIGOPRESTAMO`,`CODIGOPRODUCTO`,`CODIGOUNITARIO`),
  KEY `FK_RELATIONSHIP_5` (`CODIGOPRODUCTO`,`CODIGOUNITARIO`),
  CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`CODIGOPRODUCTO`, `CODIGOUNITARIO`) REFERENCES `producto_unitario` (`CODIGOPRODUCTO`, `CODIGOUNITARIO`),
  CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`CODIGOPRESTAMO`) REFERENCES `prestamo` (`CODIGOPRESTAMO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO detalle_prestamo VALUES("1","HER-1 ","1","","","0");
INSERT INTO detalle_prestamo VALUES("2","HER-1 ","1","","","0");
INSERT INTO detalle_prestamo VALUES("3","HER-1 ","1","","","0");
INSERT INTO detalle_prestamo VALUES("3","HER-2 ","1","","","0");
INSERT INTO detalle_prestamo VALUES("4","HER-1 ","1","","","0");
INSERT INTO detalle_prestamo VALUES("4","HER-1 ","2","","","0");
INSERT INTO detalle_prestamo VALUES("4","HER-2 ","1","","","0");
INSERT INTO detalle_prestamo VALUES("5","HER-1 ","2","","","0");
INSERT INTO detalle_prestamo VALUES("5","INS-1 ","1","","","0");
INSERT INTO detalle_prestamo VALUES("5","INS-2","1","","","0");
INSERT INTO detalle_prestamo VALUES("5","INS-2","2","","","0");
INSERT INTO detalle_prestamo VALUES("5","INS-2","4","","","0");
INSERT INTO detalle_prestamo VALUES("6","HER-1 ","2","","","0");
INSERT INTO detalle_prestamo VALUES("6","HER-1 ","3","","","0");
INSERT INTO detalle_prestamo VALUES("7","HER-1 ","2","","","0");
DROP TABLE IF EXISTS estado_producto;

CREATE TABLE `estado_producto` (
  `CODIGOESTADO` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGOPRODUCTO` varchar(20) NOT NULL,
  `CODIGOUNITARIO` int(11) NOT NULL,
  `EP_ESTADOPRODUCTO` varchar(20) NOT NULL,
  `EP_FECHA` date NOT NULL,
  `EP_OBSERVACION` varchar(300) NOT NULL,
  PRIMARY KEY (`CODIGOESTADO`),
  KEY `FK_RELATIONSHIP_7` (`CODIGOPRODUCTO`,`CODIGOUNITARIO`),
  CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`CODIGOPRODUCTO`, `CODIGOUNITARIO`) REFERENCES `producto_unitario` (`CODIGOPRODUCTO`, `CODIGOUNITARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

INSERT INTO estado_producto VALUES("1","HER-1","1","BUENO","2014-05-02","UNO");
INSERT INTO estado_producto VALUES("2","HER-1","2","BUENO","2014-05-01","DOS");
INSERT INTO estado_producto VALUES("3","VEH-2","1","USADO","2014-05-01","TRES");
INSERT INTO estado_producto VALUES("4","HER-1","3","BUENO","2014-05-01","TRES");
INSERT INTO estado_producto VALUES("5","HER-1","4","BUENO","2014-05-01","CUATRO");
INSERT INTO estado_producto VALUES("6","HER-1","5","BUENO","2014-05-01","CINCO");
INSERT INTO estado_producto VALUES("7","HER-1","1","MALO","2014-04-24","PRUEBA");
INSERT INTO estado_producto VALUES("14","HER-1","2","MALO","2014-08-03","PRUEBA DE FECHA");
INSERT INTO estado_producto VALUES("15","HER-1","2","MAOMA","2014-08-01","PRUEBA FECHA");
INSERT INTO estado_producto VALUES("16","HER-1 ","3","DE BAJA","2014-06-21","PRUEBA INTERFAZ 2");
INSERT INTO estado_producto VALUES("17","HER-1 ","1","DE BAJA","2014-06-06","PRUEBA INTERFAZ 1");
INSERT INTO estado_producto VALUES("18","HER-1 ","4","DE BAJA","2014-07-07","NUEVA PRUEBA DE INTERFAZ");
INSERT INTO estado_producto VALUES("19","HER-1 ","1","DE BAJA","2014-06-25","NUEVA PRUEBA");
INSERT INTO estado_producto VALUES("20","HER-1 ","3","DE BAJA","2014-08-01","PRUEBA FINAL ID 3");
INSERT INTO estado_producto VALUES("21","HER-1 ","1","DE BAJA","2014-07-01","PRUEBA FINAL ID 1");
INSERT INTO estado_producto VALUES("22","HER-1 ","2","DE BAJA","2014-09-01","prueba final final id 2");
INSERT INTO estado_producto VALUES("23","HER-1 ","5","DE BAJA","2014-10-10","prueba final final id 5");
INSERT INTO estado_producto VALUES("24","HER-1","6","BUENO","2014-08-23","PRUEBA DE LA PRUEBA");
DROP TABLE IF EXISTS herramienta;

CREATE TABLE `herramienta` (
  `CODIGOPRODUCTO` varchar(20) NOT NULL,
  `H_TIPOHERRAMIENTA` varchar(10) NOT NULL,
  `H_FRECUENCIA` int(2) NOT NULL,
  `H_POTENCIAMAXIMA` varchar(8) NOT NULL,
  PRIMARY KEY (`CODIGOPRODUCTO`),
  CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`CODIGOPRODUCTO`) REFERENCES `producto` (`CODIGOPRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO herramienta VALUES("HER-1 ","Electrica","1","250");
INSERT INTO herramienta VALUES("HER-2 ","Manual","0","S/N");
INSERT INTO herramienta VALUES("HER-3 ","Manual","0","S/N");
DROP TABLE IF EXISTS historico;

CREATE TABLE `historico` (
  `HISTORICO` int(11) NOT NULL,
  PRIMARY KEY (`HISTORICO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS historico_trabajador;

CREATE TABLE `historico_trabajador` (
  `CODIGOHISTORICOTRABAJADOR` int(11) NOT NULL AUTO_INCREMENT,
  `RUN` varchar(15) NOT NULL,
  `HT_FECHAINICIO` date NOT NULL,
  `HT_FECHATERMINO` date DEFAULT NULL,
  `HT_OBSERVACION` varchar(300) DEFAULT NULL,
  `HT_CARGO` varchar(30) NOT NULL,
  PRIMARY KEY (`CODIGOHISTORICOTRABAJADOR`),
  KEY `FK_RELATIONSHIP_17` (`RUN`),
  CONSTRAINT `FK_RELATIONSHIP_17` FOREIGN KEY (`RUN`) REFERENCES `trabajador` (`RUN`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO historico_trabajador VALUES("2","16283649-8","2014-01-21","2012-12-12","POR LONGI","Supervisor");
INSERT INTO historico_trabajador VALUES("3","12625863-2","2014-03-03","2014-11-07","NADA","Sub-Gerente");
INSERT INTO historico_trabajador VALUES("4","5264914-8","2014-05-21","","","Sub-Gerente");
INSERT INTO historico_trabajador VALUES("6","12.323.123-6","2014-11-06","2014-11-09","","Sub-Gerente");
INSERT INTO historico_trabajador VALUES("8","12.323.123-6","2014-11-06","2014-11-09","","Sub-Gerente");
INSERT INTO historico_trabajador VALUES("10","12.323.123-6","2014-11-06","","","Sub-Gerente");
DROP TABLE IF EXISTS ingreso_producto;

CREATE TABLE `ingreso_producto` (
  `CODIGOPRODUCTO` varchar(20) NOT NULL,
  `RUT` varchar(11) NOT NULL,
  `NUMEROFACTURA` varchar(15) NOT NULL,
  `IP_CANTIDAD` int(3) NOT NULL,
  `IP_PRECIOUNITARIO` int(6) NOT NULL,
  `IP_PRECIOTOTAL` int(6) NOT NULL,
  `IP_TOTALFACTURA` int(6) NOT NULL,
  `IP_FECHA` date NOT NULL,
  `IP_USUARIO` varchar(20) NOT NULL,
  PRIMARY KEY (`CODIGOPRODUCTO`,`RUT`,`NUMEROFACTURA`),
  KEY `FK_RELATIONSHIP_1` (`RUT`),
  CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`RUT`) REFERENCES `proveedor` (`RUT`),
  CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`CODIGOPRODUCTO`) REFERENCES `producto` (`CODIGOPRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO ingreso_producto VALUES("HER-1 ","50623846-7","1","4","5000","20000","27000","2012-12-12","ADMIN");
INSERT INTO ingreso_producto VALUES("HER-1 ","50623846-7","2","20","5000","100000","160000","2012-12-12","admin");
INSERT INTO ingreso_producto VALUES("HER-1 ","50623846-7","2550","1","5000","5000","5000","2014-08-22","admin");
INSERT INTO ingreso_producto VALUES("HER-2 ","50623846-7","379004A1","3","5000","15000","15000","2014-05-13","admin");
INSERT INTO ingreso_producto VALUES("INS-1 ","50623846-7","1","9","15000","135000","215000","2012-12-12","admin");
INSERT INTO ingreso_producto VALUES("INS-2","50623846-7","1","1","20000","20000","215000","2012-12-12","admin");
INSERT INTO ingreso_producto VALUES("INS-2","50623846-7","2","5","3000","15000","72000","2012-12-12","admin");
INSERT INTO ingreso_producto VALUES("INS-3","50623846-7","2","5","3000","15000","72000","2012-12-12","admin");
INSERT INTO ingreso_producto VALUES("ROP- 1 ","50623846-7","1","7","1000","7000","27000","2012-12-12","admin");
INSERT INTO ingreso_producto VALUES("ROP- 1 ","50623846-7","2","20","3000","60000","160000","2012-12-12","admin");
INSERT INTO ingreso_producto VALUES("ROP-2 ","50623846-7","2","6","7000","42000","72000","2012-12-12","admin");
DROP TABLE IF EXISTS insumo;

CREATE TABLE `insumo` (
  `CODIGOPRODUCTO` varchar(20) NOT NULL,
  `I_MEDIDA` varchar(10) NOT NULL,
  `I_TIPOMEDIDA` varchar(15) NOT NULL,
  `I_TIPOUNIDAD` varchar(15) NOT NULL,
  `I_CANTIDAD` int(6) NOT NULL,
  PRIMARY KEY (`CODIGOPRODUCTO`),
  CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`CODIGOPRODUCTO`) REFERENCES `producto` (`CODIGOPRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO insumo VALUES("INS-1 ","1.35","Centimetros","Unitario","1");
INSERT INTO insumo VALUES("INS-2","3,1/2","Pulgadas","Caja","250");
INSERT INTO insumo VALUES("INS-3","3/2","Pulgadas","Caja","300");
DROP TABLE IF EXISTS mantencion;

CREATE TABLE `mantencion` (
  `CODIGOMANTENCION` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGOPRODUCTO` varchar(20) NOT NULL,
  `CODIGOUNITARIO` int(11) NOT NULL,
  `M_FECHAINICIO` date NOT NULL,
  `M_FECHATERMINO` date DEFAULT NULL,
  `M_DESCRIPCION` varchar(300) NOT NULL,
  `M_RESPONSABLE` varchar(20) NOT NULL,
  `M_USUARIOENVIO` varchar(20) NOT NULL,
  `M_USUARIODEVOLUCION` varchar(20) DEFAULT NULL,
  `M_COMENTARIO` varchar(300) DEFAULT NULL,
  `M_ESTADOMANTENCION` int(1) NOT NULL,
  PRIMARY KEY (`CODIGOMANTENCION`),
  KEY `FK_RELATIONSHIP_8` (`CODIGOPRODUCTO`,`CODIGOUNITARIO`),
  CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`CODIGOPRODUCTO`, `CODIGOUNITARIO`) REFERENCES `producto_unitario` (`CODIGOPRODUCTO`, `CODIGOUNITARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO mantencion VALUES("1","HER-1 ","1","2014-05-06","2014-11-02","CUALQUIERA 1","YO"," admin "," admin ","PRUEBA 1","0");
INSERT INTO mantencion VALUES("2","HER-1 ","2","2014-05-09","2014-05-05","CUALQUIERA 2","EL"," admin "," admin ","","0");
INSERT INTO mantencion VALUES("3","VEH-2 ","1","2014-10-20","2014-11-06","cualquiera 3 esto es una prueba larga","tu"," admin "," admin ","PRUEBA 3","0");
INSERT INTO mantencion VALUES("4","HER-1 ","1","2014-05-06","","","yo"," admin ","","","1");
DROP TABLE IF EXISTS obra;

CREATE TABLE `obra` (
  `CODIGOOBRA` int(11) NOT NULL AUTO_INCREMENT,
  `O_NOMBRE` varchar(30) NOT NULL,
  `O_FECHAINICIO` date NOT NULL,
  `O_FECHATERMINO` date DEFAULT NULL,
  `O_ESTADO` int(1) NOT NULL,
  PRIMARY KEY (`CODIGOOBRA`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO obra VALUES("1","Torre 1","2014-01-01","","1");
INSERT INTO obra VALUES("2","Torre 2","2013-01-01","2014-01-29","2");
INSERT INTO obra VALUES("3","Torre 2","2014-11-07","","0");
DROP TABLE IF EXISTS permiso;

CREATE TABLE `permiso` (
  `CODIGOPERMISO` int(11) NOT NULL AUTO_INCREMENT,
  `PROVEEDOR` int(1) DEFAULT NULL,
  `PRODUCTO` int(1) DEFAULT NULL,
  `PERSONAL` int(1) DEFAULT NULL,
  `OBRA` int(1) DEFAULT NULL,
  `BODEGA` int(11) DEFAULT NULL,
  `INFORMEYGRAFICO` int(11) DEFAULT NULL,
  `ADMINISTRACION` int(11) DEFAULT NULL,
  PRIMARY KEY (`CODIGOPERMISO`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO permiso VALUES("1","1","1","1","1","1","1","1");
INSERT INTO permiso VALUES("2","1","1","0","1","0","0","1");
DROP TABLE IF EXISTS prestamo;

CREATE TABLE `prestamo` (
  `CODIGOPRESTAMO` int(11) NOT NULL,
  `CODIGOOBRA` int(11) NOT NULL,
  `RUN` varchar(15) NOT NULL,
  `PT_FECHA` date NOT NULL,
  `PT_TOTALPRODUCTO` int(3) NOT NULL,
  `PT_COMENTARIO` varchar(200) DEFAULT NULL,
  `PT_USUARIO` varchar(20) NOT NULL,
  `PT_ESTADO` int(1) NOT NULL,
  PRIMARY KEY (`CODIGOPRESTAMO`),
  KEY `FK_RELATIONSHIP_15` (`CODIGOOBRA`),
  KEY `FK_RELATIONSHIP_16` (`RUN`),
  CONSTRAINT `FK_RELATIONSHIP_15` FOREIGN KEY (`CODIGOOBRA`) REFERENCES `obra` (`CODIGOOBRA`),
  CONSTRAINT `FK_RELATIONSHIP_16` FOREIGN KEY (`RUN`) REFERENCES `trabajador` (`RUN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO prestamo VALUES("1","1","16283649-8","2012-12-12","1","prueba prueba "," admin ","0");
INSERT INTO prestamo VALUES("2","1","16283649-8","2002-02-02","1","PRUEBA PARA DAR DE BAJA"," admin ","0");
INSERT INTO prestamo VALUES("3","1","16283649-8","2012-02-02","4","prueba 1"," admin ","0");
INSERT INTO prestamo VALUES("4","1","16283649-8","2012-12-12","3","nuevo"," admin ","0");
INSERT INTO prestamo VALUES("5","1","16283649-8","2014-05-05","5","nada "," admin ","0");
INSERT INTO prestamo VALUES("6","1","16283649-8","2014-05-05","2",""," admin ","0");
INSERT INTO prestamo VALUES("7","1","16283649-8","2014-03-03","1",""," admin ","0");
DROP TABLE IF EXISTS producto;

CREATE TABLE `producto` (
  `CODIGOPRODUCTO` varchar(20) NOT NULL,
  `P_NOMBRE` varchar(20) NOT NULL,
  `P_MARCA` varchar(20) NOT NULL,
  `P_MODELO` varchar(20) NOT NULL,
  `P_OBSERVACION` varchar(200) DEFAULT NULL,
  `P_IDENTIFICADOR` char(2) NOT NULL,
  `P_ESTADO` int(1) NOT NULL,
  PRIMARY KEY (`CODIGOPRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO producto VALUES("HER-1 ","Martillo","Still","Normal","S/N","H","1");
INSERT INTO producto VALUES("HER-2 ","Pala","Jonito","Normal","","H","1");
INSERT INTO producto VALUES("HER-3 ","prueba","prueba","prueba","","H","1");
INSERT INTO producto VALUES("INS-1 ","Clavos","Stil","Stil","","I","1");
INSERT INTO producto VALUES("INS-2","Tornillos","Stil","Normal","","I","1");
INSERT INTO producto VALUES("INS-3","Tornillo","Inchalam","Normal","","I","1");
INSERT INTO producto VALUES("ROP- 1 ","Pantalones","Lee","Lee-one","","R","1");
INSERT INTO producto VALUES("ROP-2 ","Pantalon","Lee","Lee rock","","R","1");
INSERT INTO producto VALUES("VEH-1 ","Auto","Toyota","Yaris","","V","1");
INSERT INTO producto VALUES("VEH-2 ","Camioneta","Toyota","Terrano","","V","1");
DROP TABLE IF EXISTS producto_unitario;

CREATE TABLE `producto_unitario` (
  `CODIGOPRODUCTO` varchar(20) NOT NULL,
  `CODIGOUNITARIO` int(11) NOT NULL,
  `PU_ESTADO` int(1) NOT NULL,
  `PU_NUMEROFACTURA` varchar(15) NOT NULL,
  PRIMARY KEY (`CODIGOPRODUCTO`,`CODIGOUNITARIO`),
  CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`CODIGOPRODUCTO`) REFERENCES `producto` (`CODIGOPRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO producto_unitario VALUES("HER-1 ","1","4","1");
INSERT INTO producto_unitario VALUES("HER-1 ","2","1","1");
INSERT INTO producto_unitario VALUES("HER-1 ","3","1","1");
INSERT INTO producto_unitario VALUES("HER-1 ","4","1","1");
INSERT INTO producto_unitario VALUES("HER-1 ","5","1","1");
INSERT INTO producto_unitario VALUES("HER-1 ","6","1","2550");
INSERT INTO producto_unitario VALUES("HER-2 ","1","1","379004A1");
INSERT INTO producto_unitario VALUES("HER-2 ","2","1","379004A1");
INSERT INTO producto_unitario VALUES("HER-2 ","3","1","379004A1");
INSERT INTO producto_unitario VALUES("INS-1 ","1","1","1");
INSERT INTO producto_unitario VALUES("INS-1 ","2","1","1");
INSERT INTO producto_unitario VALUES("INS-1 ","3","1","1");
INSERT INTO producto_unitario VALUES("INS-1 ","4","1","1");
INSERT INTO producto_unitario VALUES("INS-1 ","5","1","1");
INSERT INTO producto_unitario VALUES("INS-1 ","6","1","1");
INSERT INTO producto_unitario VALUES("INS-1 ","7","1","1");
INSERT INTO producto_unitario VALUES("INS-1 ","8","1","1");
INSERT INTO producto_unitario VALUES("INS-1 ","9","1","1");
INSERT INTO producto_unitario VALUES("INS-2","1","1","1");
INSERT INTO producto_unitario VALUES("INS-2","2","1","2");
INSERT INTO producto_unitario VALUES("INS-2","3","1","2");
INSERT INTO producto_unitario VALUES("INS-2","4","1","2");
INSERT INTO producto_unitario VALUES("INS-2","5","1","2");
INSERT INTO producto_unitario VALUES("INS-2","6","1","2");
INSERT INTO producto_unitario VALUES("INS-3","1","1","2");
INSERT INTO producto_unitario VALUES("INS-3","2","1","2");
INSERT INTO producto_unitario VALUES("INS-3","3","1","2");
INSERT INTO producto_unitario VALUES("INS-3","4","1","2");
INSERT INTO producto_unitario VALUES("INS-3","5","1","2");
INSERT INTO producto_unitario VALUES("ROP- 1 ","1","1","1");
INSERT INTO producto_unitario VALUES("ROP- 1 ","2","1","1");
INSERT INTO producto_unitario VALUES("ROP- 1 ","3","1","1");
INSERT INTO producto_unitario VALUES("ROP- 1 ","4","1","1");
INSERT INTO producto_unitario VALUES("ROP- 1 ","5","1","1");
INSERT INTO producto_unitario VALUES("ROP-2 ","1","1","2");
INSERT INTO producto_unitario VALUES("ROP-2 ","2","1","2");
INSERT INTO producto_unitario VALUES("ROP-2 ","3","1","2");
INSERT INTO producto_unitario VALUES("ROP-2 ","4","1","2");
INSERT INTO producto_unitario VALUES("ROP-2 ","5","1","2");
INSERT INTO producto_unitario VALUES("ROP-2 ","6","1","2");
INSERT INTO producto_unitario VALUES("VEH-2 ","1","1","S/N");
DROP TABLE IF EXISTS proveedor;

CREATE TABLE `proveedor` (
  `RUT` varchar(11) NOT NULL,
  `PD_NOMBRE` varchar(30) NOT NULL,
  `PD_DIRECCION` varchar(50) NOT NULL,
  `PD_TELEFONO` int(11) NOT NULL,
  `PD_EMAIL` varchar(30) DEFAULT NULL,
  `PD_ESTADO` int(1) NOT NULL,
  PRIMARY KEY (`RUT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO proveedor VALUES("50623846-7","Inchalam","Las peras #414,Concepción","412558790","inchalam@inchalamchile.cl","1");
DROP TABLE IF EXISTS ropa;

CREATE TABLE `ropa` (
  `CODIGOPRODUCTO` varchar(20) NOT NULL,
  `R_TALLA` varchar(15) NOT NULL,
  `R_COLOR` varchar(15) NOT NULL,
  `R_MATERIAL` varchar(30) NOT NULL,
  PRIMARY KEY (`CODIGOPRODUCTO`),
  CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`CODIGOPRODUCTO`) REFERENCES `producto` (`CODIGOPRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO ropa VALUES("ROP- 1 ","42","Azul","Genero");
INSERT INTO ropa VALUES("ROP-2 ","45","azul","Lana");
DROP TABLE IF EXISTS stock;

CREATE TABLE `stock` (
  `CODIGOPRODUCTO` varchar(20) NOT NULL,
  `S_CANTIDAD` int(4) NOT NULL,
  `S_CANTIDADMINIMA` int(3) NOT NULL,
  PRIMARY KEY (`CODIGOPRODUCTO`),
  CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`CODIGOPRODUCTO`) REFERENCES `producto` (`CODIGOPRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO stock VALUES("HER-1 ","13","2");
INSERT INTO stock VALUES("HER-2 ","10","9");
INSERT INTO stock VALUES("HER-3 ","0","0");
INSERT INTO stock VALUES("INS-1 ","7","3");
INSERT INTO stock VALUES("INS-2","2","4");
INSERT INTO stock VALUES("INS-3","5","4");
INSERT INTO stock VALUES("ROP- 1 ","5","3");
INSERT INTO stock VALUES("ROP-2 ","6","10");
INSERT INTO stock VALUES("VEH-1 ","0","3");
INSERT INTO stock VALUES("VEH-2 ","2","0");
DROP TABLE IF EXISTS trabajador;

CREATE TABLE `trabajador` (
  `RUN` varchar(15) NOT NULL,
  `CODIGOCARGO` int(11) NOT NULL,
  `T_NOMBRE` varchar(20) NOT NULL,
  `T_APELLIDO` varchar(30) NOT NULL,
  `T_SEXO` varchar(10) NOT NULL,
  `T_DIRECCION` varchar(50) NOT NULL,
  `T_TELEFONO` int(11) NOT NULL,
  `T_ESTADO` int(1) NOT NULL,
  PRIMARY KEY (`RUN`),
  KEY `FK_RELATIONSHIP_18` (`CODIGOCARGO`),
  CONSTRAINT `FK_RELATIONSHIP_18` FOREIGN KEY (`CODIGOCARGO`) REFERENCES `cargo` (`CODIGOCARGO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO trabajador VALUES("12.323.123-6","2","Luis Alberto","Peres Peres","Hombre","las nodriza #123","412746581","1");
INSERT INTO trabajador VALUES("12625863-2","1","Mario Alejando","Manzano Peña","Hombre","las manzanas #2114","412940545","2");
INSERT INTO trabajador VALUES("16283649-8","1","Rodrigo","Muñoz Parra","Hombre","Torre Blanca #273,Higueras, Talcahuano","2940545","1");
INSERT INTO trabajador VALUES("5264914-8","2","Maria Ana","Salazar Leal","Mujer","Por ahi #321","78900486","1");
DROP TABLE IF EXISTS usuario;

CREATE TABLE `usuario` (
  `U_LOGIN` varchar(20) NOT NULL,
  `CODIGOPERMISO` int(11) NOT NULL,
  `U_PASSWORD` varchar(20) NOT NULL,
  `U_NOMBRE` varchar(20) NOT NULL,
  `U_APELLIDO` varchar(20) NOT NULL,
  `U_TELEFONO` int(11) NOT NULL,
  `U_EMAIL` varchar(30) NOT NULL,
  `U_ESTADO` int(1) NOT NULL,
  PRIMARY KEY (`U_LOGIN`),
  KEY `FK_RELATIONSHIP_19` (`CODIGOPERMISO`),
  CONSTRAINT `FK_RELATIONSHIP_19` FOREIGN KEY (`CODIGOPERMISO`) REFERENCES `permiso` (`CODIGOPERMISO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO usuario VALUES("admin","1","admin","ADMINISTRADOR","ADMINISTRADOR","78900486","admin@admin.cl","1");
INSERT INTO usuario VALUES("yo","2","1234","Juanito","Super ","78795214","juanito@el.cl","0");
DROP TABLE IF EXISTS vehiculo;

CREATE TABLE `vehiculo` (
  `CODIGOPRODUCTO` varchar(20) NOT NULL,
  `V_PERMISO` date NOT NULL,
  `V_YEAR` int(4) NOT NULL,
  `V_CONDICION` varchar(15) NOT NULL,
  `V_PATENTE` varchar(10) NOT NULL,
  PRIMARY KEY (`CODIGOPRODUCTO`),
  CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`CODIGOPRODUCTO`) REFERENCES `producto` (`CODIGOPRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO vehiculo VALUES("VEH-1 ","2014-02-02","2002","Arriendo","");
INSERT INTO vehiculo VALUES("VEH-2 ","2012-12-12","2002","Particular","ASDD-54");



