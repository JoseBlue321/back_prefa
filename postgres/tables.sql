create table postulantes(
	id serial primary key,
	user_id int unique not null,
	carnet varchar(25) not null,
	paterno varchar(100),
	materno varchar(100),
	nombre varchar(150) not null,
	genero varchar(20) not null,
	fecha_nacimiento date not null,
	provincia varchar(255),
	departamento varchar(255),
	pais varchar(255),
	direccion varchar(255),
	correo varchar(255),
	telefono varchar(255),
	estado_civil varchar(50),
	nro_hermanos int,
	nro_hijos int,
	colegio varchar(255),
	adm_colegio varchar(255),
	turno_colegio varchar(255),
	tipo_bachiller varchar(100),
	tiempo_trabajo varchar(100),
	tipo_caracteristica varchar(100),
	tipo_vivienda varchar(150),
	ocupacion varchar(255),
	ocupacion_padre varchar(255),
	ocupacion_madre varchar(255),
	imagen varchar(255),
	cpt varchar(255),
	fecha_pago timestamp,
	paralelo varchar(50),
	foreign key(user_id) references users(id) 
);

create table roles(
	id serial primary key,
	user_id int unique not null,
	rol varchar(20) not null,
	foreign key(user_id) references users(id)
);

create table carreras(
	id serial primary key,
	carrera varchar(150) not null
);

create table mensiones(
	id serial primary key,
	carrera_id int not null,
	mension varchar(150),
	foreign key(carrera_id) references carreras(id)
);

create table inscripciones(
	id serial primary key,
	mension_id int not null,
	postulante_id int not null,
	foreign key(mension_id) references mensiones(id),
	foreign key(postulante_id) references postulantes(id)
);

create table parciales(
	id serial primary key,
	parcial varchar(255) not null,
	fecha date
);

create table ambientes(
	id serial primary key,
	edificio varchar(100) not null,
	piso varchar(80) not null,
	aula varchar(255) not null,
	capacidad int,
	sillas int,
	tableros int
);

create table evaluaciones(
	id serial primary key,
	inscripcion_id int not null,
	parcial_id int not null,
	ambiente_id int,
	nota int not null,
	estado boolean,
	hoja_respuesta varchar(255),
	foreign key(inscripcion_id) references inscripciones(id),
	foreign key(parcial_id) references parciales(id),
	foreign key(ambiente_id) references ambientes(id)
);

create table tipos(
	id serial primary key,
	tipo varchar(150) not null
);

create table colaboradores(
	id serial primary key,
	tipo_id int not null,
	nombre varchar(150) not null,
	paterno varchar(100),
	materno varchar(100),
	telefono varchar(50),
	foreign key(tipo_id) references tipos(id)
);

create table colaborador_parcial(
	colaborador_id int not null,
	parcial_id int not null,
	primary key(colaborador_id,parcial_id),
	foreign key(colaborador_id) references colaboradores(id),
	foreign key(parcial_id) references parciales(id) 
);

create table colaborador_evaluacion(
	colaborador_id int not null,
	evaluacion_id int not null,
	primary key(colaborador_id,evaluacion_id),
	foreign key(colaborador_id) references colaboradores(id),
	foreign key(evaluacion_id) references evaluaciones(id) 
);

create table preguntas(
	id serial primary key,
	pregunta int unique not null
);

create table reclamos(
	id serial primary key,
	postulante_id int not null,
	parcial_id int not null,
	reclamo text,
	abogado boolean,
	carta varchar(255),
	foreign key(postulante_id) references postulantes(id),
	foreign key(parcial_id) references parciales(id)
);

create table detalles(
	id serial primary key,
	pregunta_id int not null,
	reclamo_id int not null,
	detalle text,
	foreign key(pregunta_id) references preguntas(id),
	foreign key(reclamo_id) references reclamos(id)
);

drop table reclamos;

select column_name, data_type, is_nullable, column_default
from information_schema.columns
where table_name = 'postulantes';