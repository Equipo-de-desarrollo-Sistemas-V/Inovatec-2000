create database PagVentas
on primary
(Name ='Pag_Ventas2022_data',
filename='C:\Program Files\Microsoft SQL Server\MSSQL15.SQLEO\MSSQL\DATA\Pag_Ventas2022_data.mdf',
SIZE=25 mb,
maxsize=500mb,
filegrowth=25mb)
log on
(Name ='Pag_Ventas2022_log',
filename='C:\Program Files\Microsoft SQL Server\MSSQL15.SQLEO\MSSQL\DATA\Pag_Ventas2022_log.ldf',
SIZE=5 mb,
maxsize=50mb,
filegrowth=5mb)
go

sp_helpdb PagVentas
use PagVentas
--tabla para productos
create table Productos
(
identificador integer,
nombre varchar(50),
categoria varchar(25),
precio_com money,
precio_ven money,
cantidad integer,
id_proveedor integer,
descripcion text,
id_sucursal integer)
go

--creacion de tabla sucursal
create table sucursal
(ciudad varchar(25),
id_sucursal integer,
cantidad_categoria integer,
inversion_categoria money)
go

--creacion de tabla usuarios
--Hace falta constraint check
create table Usuarios
(
nombres varchar(40),
ap_paterno varchar(20),
ap_materno varchar(20),
usuario varchar(20),
contra_us binary(100),
ciudad varchar(20),
estado varchar(20),
colonia varchar(20),
calle varchar(20),
no_calle char(10),
telefono char(10),
codigo_postal varchar(5),
email varchar(255),
no_tarjeta varchar(16),
fecha_ven_mes char(2),
fecha_ven_anio char(2)
)
go

--creacion de relacion empleados
create table Empleados
(
id_empleado integer,
nombres varchar(40),
ap_paterno varchar(20),
ap_materno varchar(20),
sucursal integer,
rfc varchar(13),
puesto varchar(10),
email varchar(255),
contra_em binary(100),
permisoSA bit,
permiso1 bit,
permiso2 bit,
permiso3 bit,
permiso4 bit,
supension bit
)
go

--creacion de tabla proveedores
create table Proveedores
(
id_proveedor integer,
nombre_empresa varchar(20),
RFC varchar(12),
email_empresa varchar(255),
)
go

--drop table Empleados

--Creacion de primary keys, ademas de volver not null los campos que seran pk
ALTER TABLE Productos alter column identificador int NOT NULL
Alter table Productos
ADD CONSTRAINT PK_Prod_Iden
PRIMARY KEY (identificador)
go

ALTER TABLE Sucursal alter column id_sucursal int NOT NULL
Alter table Sucursal
ADD CONSTRAINT PK_Suc_IdSuc
PRIMARY KEY (id_sucursal)
go

ALTER TABLE Usuarios alter column usuario varchar(20) NOT NULL
Alter table Usuarios
ADD CONSTRAINT PK_Usua_User
PRIMARY KEY (usuario)
go

ALTER TABLE Proveedores alter column id_proveedor int NOT NULL
Alter table Proveedores
ADD CONSTRAINT PK_Prov_IdPro
PRIMARY KEY (id_proveedor)
go

ALTER TABLE Empleados alter column id_empleado int NOT NULL
Alter table Empleados
ADD CONSTRAINT PK_Emp_IdEmp
PRIMARY KEY (id_empleado)
go

--Creacion de Foreign Keys

ALTER TABLE Productos
ADD CONSTRAINT FK_Prod_IdProv
FOREIGN KEY (id_proveedor)
REFERENCES Proveedores(id_proveedor)

ALTER TABLE Productos
ADD CONSTRAINT FK_Prod_IdSuc
FOREIGN KEY (id_sucursal)
REFERENCES sucursal(id_sucursal)

ALTER TABLE Empleados
ADD CONSTRAINT FK_Emp_IdSuc
FOREIGN KEY (sucursal)
REFERENCES sucursal(id_sucursal)

--agregar check a algunas tablas

alter table Productos
add constraint Ck_PVenta
check (precio_ven>precio_com)

alter table Productos
add constraint Ck_PCeros
check (precio_ven>0 and precio_com>0)