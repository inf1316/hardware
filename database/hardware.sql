--
-- ER/Studio 8.0 SQL Code Generation
-- Company :      Manuel
-- Project :      Model1.DM1
-- Author :       Manuel
--
-- Date Created : Sunday, May 14, 2017 15:07:27
-- Target DBMS : PostgreSQL 8.0
--

-- 
-- TABLE: bios 
--

CREATE TABLE bios(
    "idBios"         serial         NOT NULL,
    fecha            varchar(20),
    referencia       int4,
    autorizado       boolean,
    "idComputadora"  int4            NOT NULL,
    fabricante       varchar(150),
    "numeroSerie"    varchar(150)    NOT NULL,
    CONSTRAINT "PK20" PRIMARY KEY ("idBios")
)
;



-- 
-- TABLE: board 
--

CREATE TABLE board(
    "idBoard"        serial         NOT NULL,
    fecha            varchar(20),
    referencia       int4,
    autorizado       boolean,
    "numeroSerie"    varchar(300)    NOT NULL,
    fabricante       varchar(100),
    "idComputadora"  int4            NOT NULL,
    CONSTRAINT "PK23" PRIMARY KEY ("idBoard")
)
;



-- 
-- TABLE: cd 
--

CREATE TABLE cd(
    "idCD"           serial         NOT NULL,
    fecha            varchar(20),
    referencia       int4,
    autorizado       boolean,
    fabricante       varchar(100),
    "numeroSerie"    varchar(100),
    "idComputadora"  int4            NOT NULL,
    CONSTRAINT "PK25" PRIMARY KEY ("idCD")
)
;



-- 
-- TABLE: computadora 
--

CREATE TABLE computadora(
    "idComputadora"                serial         NOT NULL,
    fecha                          varchar(20)     NOT NULL,
    autorizado                     boolean,
    referecia                      int4,
    id_local                       int4            NOT NULL,
    "numeroInventario"             varchar(100),
    "numeroLicenciaSistOperativo"  varchar(200)    NOT NULL,
    nombre                         varchar(100)    NOT NULL,
    "sistOperativo"                varchar(100)    NOT NULL,
    CONSTRAINT "PK11" PRIMARY KEY ("idComputadora")
)
;



-- 
-- TABLE: cpu 
--

CREATE TABLE cpu(
    "idCpu"          serial         NOT NULL,
    fecha            varchar(20),
    referencia       int4,
    autorizado       boolean,
    fabricante       varchar(50),
    "idComputadora"  int4            NOT NULL,
    "cpuDetalles"    varchar(100),
    "serialNumber"   varchar(100)    NOT NULL,
    CONSTRAINT "PK15" PRIMARY KEY ("idCpu")
)
;



-- 
-- TABLE: disco 
--

CREATE TABLE disco(
    iddisco          serial         NOT NULL,
    fecha            varchar(20),
    "idComputadora"  int4            NOT NULL,
    "numeroSerie"    varchar(150)    NOT NULL,
    fabricante       varchar(150),
    referencia       int4,
    autorizado       boolean,
    CONSTRAINT "PK18" PRIMARY KEY (iddisco)
)
;



-- 
-- TABLE: local 
--

CREATE TABLE local(
    id_local        serial         NOT NULL,
    ubicacion       varchar(100),
    departamento    varchar(100),
    CONSTRAINT "PK1" PRIMARY KEY (id_local)
)
;



-- 
-- TABLE: memoria 
--

CREATE TABLE memoria(
    idmemoria        serial         NOT NULL,
    fecha            varchar(20),
    referencia       interval,
    autorizado       boolean,
    "idComputadora"  int4            NOT NULL,
    "memoryRam"      varchar(100)    NOT NULL,
    slots            varchar(10),
    "numeroSerie"    varchar(150)    NOT NULL,
    CONSTRAINT "PK19" PRIMARY KEY (idmemoria)
)
;



-- 
-- TABLE: monitor 
--

CREATE TABLE monitor(
    "idMonitor"             serial         NOT NULL,
    fecha                   varchar(20),
    referencia              int4,
    autorizado              boolean,
    fabricante              varchar(100),
    "identificadorMonitor"  varchar(18)     NOT NULL,
    "tipoMonitor"           varchar(100)    NOT NULL,
    "idComputadora"         int4            NOT NULL,
    CONSTRAINT "PK14" PRIMARY KEY ("idMonitor")
)
;



-- 
-- TABLE: mouse 
--

CREATE TABLE mouse(
    "idMouse"             serial         NOT NULL,
    fecha                 varchar(20),
    referencia            int4,
    autorizado            boolean,
    "tipoMouse"           varchar(100)    NOT NULL,
    "identificadorMouse"  varchar(100)    NOT NULL,
    fabricante            varchar(100)    NOT NULL,
    "idComputadora"       int4            NOT NULL,
    CONSTRAINT "PK12" PRIMARY KEY ("idMouse")
)
;



-- 
-- TABLE: red 
--

CREATE TABLE red(
    "idTarjeta"      serial         NOT NULL,
    fecha            varchar(20),
    referencia       int4,
    autorizado       boolean,
    fabricante       varchar(100),
    mac              varchar(200)    NOT NULL,
    "idComputadora"  int4            NOT NULL,
    CONSTRAINT "PK22" PRIMARY KEY ("idTarjeta")
)
;



-- 
-- TABLE: sonido 
--

CREATE TABLE sonido(
    "idSonido"             serial         NOT NULL,
    fecha                  varchar(20),
    referencia             int4,
    autorizado             boolean,
    fabricante             varchar(100)    NOT NULL,
    descripcion            varchar(100),
    "identificadorSonido"  varchar(100)    NOT NULL,
    "idComputadora"        int4,
    CONSTRAINT "PK16" PRIMARY KEY ("idSonido")
)
;



-- 
-- TABLE: teclado 
--

CREATE TABLE teclado(
    "idTeclado"             serial         NOT NULL,
    fecha                   varchar(20),
    referencia              int4,
    autorizado              boolean,
    descripcion             varchar(150),
    "identificadorTeclado"  varchar(150),
    "idComputadora"         int4,
    CONSTRAINT "PK17" PRIMARY KEY ("idTeclado")
)
;



-- 
-- TABLE: bios 
--

ALTER TABLE bios ADD CONSTRAINT "Refcomputadora20" 
    FOREIGN KEY ("idComputadora")
    REFERENCES computadora("idComputadora")
;


-- 
-- TABLE: board 
--

ALTER TABLE board ADD CONSTRAINT "Refcomputadora30" 
    FOREIGN KEY ("idComputadora")
    REFERENCES computadora("idComputadora")
;


-- 
-- TABLE: cd 
--

ALTER TABLE cd ADD CONSTRAINT "Refcomputadora33" 
    FOREIGN KEY ("idComputadora")
    REFERENCES computadora("idComputadora")
;


-- 
-- TABLE: computadora 
--

ALTER TABLE computadora ADD CONSTRAINT "Reflocal27" 
    FOREIGN KEY (id_local)
    REFERENCES local(id_local)
;


-- 
-- TABLE: cpu 
--

ALTER TABLE cpu ADD CONSTRAINT "Refcomputadora19" 
    FOREIGN KEY ("idComputadora")
    REFERENCES computadora("idComputadora")
;


-- 
-- TABLE: disco 
--

ALTER TABLE disco ADD CONSTRAINT "Refcomputadora11" 
    FOREIGN KEY ("idComputadora")
    REFERENCES computadora("idComputadora")
;


-- 
-- TABLE: memoria 
--

ALTER TABLE memoria ADD CONSTRAINT "Refcomputadora12" 
    FOREIGN KEY ("idComputadora")
    REFERENCES computadora("idComputadora")
;


-- 
-- TABLE: monitor 
--

ALTER TABLE monitor ADD CONSTRAINT "Refcomputadora18" 
    FOREIGN KEY ("idComputadora")
    REFERENCES computadora("idComputadora")
;


-- 
-- TABLE: mouse 
--

ALTER TABLE mouse ADD CONSTRAINT "Refcomputadora17" 
    FOREIGN KEY ("idComputadora")
    REFERENCES computadora("idComputadora")
;


-- 
-- TABLE: red 
--

ALTER TABLE red ADD CONSTRAINT "Refcomputadora31" 
    FOREIGN KEY ("idComputadora")
    REFERENCES computadora("idComputadora")
;


-- 
-- TABLE: sonido 
--

ALTER TABLE sonido ADD CONSTRAINT "Refcomputadora28" 
    FOREIGN KEY ("idComputadora")
    REFERENCES computadora("idComputadora")
;


-- 
-- TABLE: teclado 
--

ALTER TABLE teclado ADD CONSTRAINT "Refcomputadora21" 
    FOREIGN KEY ("idComputadora")
    REFERENCES computadora("idComputadora")
;


