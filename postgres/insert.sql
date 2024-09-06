/********USERS********/
insert into users(id,name,email,password) values(1,'jose apaza saavedra','jos123apaza@gmail.com','9087013');

/********POSTULANTES********/
insert into postulantes(id,user_id,carnet,paterno,materno,nombre,genero,fecha_nacimiento,provincia,departamento) values();

/********ROLES********/
insert into roles(id,rol,descripcion) values(1,'postulante','');

/********CARRERAS********/
insert into carreraS(id,carrera) values(1,'MEDICINA');
insert into carreraS(id,carrera) values(2,'ENFERMERÍA');
insert into carreraS(id,carrera) values(3,'NUTRICIÓN Y DIETÉTICA');
insert into carreraS(id,carrera) values(4,'TECNOLOGÍA MÉDICA');
insert into carreraS(id,carrera) values(5,'PROGRAMA');

/********MENSIONES********/
insert into mensiones(id,carrera_id,mension) values(1,1,null);
insert into mensiones(id,carrera_id,mension) values(2,2,null);
insert into mensiones(id,carrera_id,mension) values(3,3,null);
insert into mensiones(id,carrera_id,mension) values(4,4,'LABORATORIO CLÍNICO');
insert into mensiones(id,carrera_id,mension) values(5,4,'BIOIMAGENOLOGÍA');
insert into mensiones(id,carrera_id,mension) values(6,4,'FISIOTERAPIA Y KINESIOLOGÍA');
insert into mensiones(id,carrera_id,mension) values(7,5,'TERAPIA OCUPACIONAL');
insert into mensiones(id,carrera_id,mension) values(8,5,'FONOAUDIOLOGÍA');

/********INSCRIPCIONES********/
insert into inscripciones(id,mension_id,postulante_id) values(1,1,1);
insert into inscripciones(id,mension_id,postulante_id) values(2,2,1);

/********PARCIALES********/
insert into parciales(id,parcial,fecha,detalle) values(1,'Primer Parcial','1-12-2024','carrera de medicina');
insert into parciales(id,parcial,fecha,detalle) values(2,'Primer Parcial','2-12-2024','carreras varias');
insert into parciales(id,parcial,fecha,detalle) values(3,'Segundo Parcial','1-01-2025','carrera de medicina');
insert into parciales(id,parcial,fecha,detalle) values(4,'Segundo Parcial','2-01-2025','carreras varias');

/********AMBIENTES********/
insert into ambientes(id,edificio,piso,aula,capacidad,sillas,tableros) values(1,'medicina','piso 3','Aula K1',60,60,60);

/********EVALUACIONES********/
insert into evaluaciones(id,inscripcion_id,parcial_id,ambiente_id,nota,estado,hoja_respuesta) values(1,1,1,1,35,true,'url de la hoja de respuesta');

/********TIPOS********/
insert into tipos(id,tipo) values(1,'docentes');
insert into tipos(id,tipo) values(2,'auxiliares');
insert into tipos(id,tipo) values(3,'estudiantes');
insert into tipos(id,tipo) values(4,'trabajadores del proceso de admision');
insert into tipos(id,tipo) values(5,'docentes elaboradores');
insert into tipos(id,tipo) values(6,'notaria');
insert into tipos(id,tipo) values(7,'administrativos');
insert into tipos(id,tipo) values(8,'apoyo logistico');

/********COLABORADORES********/
select * from colaboradores;
insert into colaboradores(id,tipo_id,nombre,paterno,materno,telefono) values(1,1,'Dr. nelson rodrigues','','','77777777');
insert into colaboradores(id,tipo_id,nombre,paterno,materno,telefono) values(2,2,'Aux. Juan lopez','','','77777777');
insert into colaboradores(id,tipo_id,nombre,paterno,materno,telefono) values(3,6,'Dra. notaria','','','77777777');

/********COLABORADOR_PARCIAL********/
insert into colaborador_parcial(colaborador_id,parcial_id) values(3,1)

/********COLABORADOR_EVALUACION********/
insert into colaborador_evaluacion(colaborador_id,evaluacion_id) values(1,1);
insert into colaborador_evaluacion(colaborador_id,evaluacion_id) values(2,1);

/********PREGUNTAS********/
insert into preguntas(pregunta) values(1);
insert into preguntas(pregunta) values(2);
insert into preguntas(pregunta) values(3);
insert into preguntas(pregunta) values(4);
insert into preguntas(pregunta) values(5);

/********RECLAMOS********/
insert into reclamos(postulante_id,parcial_id,reclamo,abogado,carta) values(1,1,'reclamo el primer parcial',false,'url de la carta .pdf');

/********DETALLES********/
select * from detalles;
insert into detalles(pregunta_id,reclamo_id,detalle) values(3,1,'esta mal formulada la pregunta');
insert into detalles(pregunta_id,reclamo_id,detalle) values(5,1,'no se entiende la pregunta');




