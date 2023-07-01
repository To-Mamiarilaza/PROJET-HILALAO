CREATE SCHEMA IF NOT EXISTS "public";

CREATE  TABLE "public".direct_reservation ( 
	id_direct_reservation integer DEFAULT nextval('direct_reservation_id_direct_reservation_seq'::regclass) NOT NULL  ,
	client_name          varchar(100)    ,
	phone_number_client  varchar(20)    ,
	reservation_date     date DEFAULT CURRENT_DATE   ,
	start_time           time  NOT NULL  ,
	id_field             integer  NOT NULL  ,
	duration             integer  NOT NULL  ,
	CONSTRAINT pk_direct_reservation PRIMARY KEY ( id_direct_reservation )
 );

CREATE  TABLE "public".reservation ( 
	id_reservation       integer DEFAULT nextval('reservation_id_reservation_seq'::regclass) NOT NULL  ,
	reservation_date     date  NOT NULL  ,
	id_users             integer  NOT NULL  ,
	start_time           time  NOT NULL  ,
	id_field             integer  NOT NULL  ,
	duration             integer  NOT NULL  ,
	CONSTRAINT pk_reservation PRIMARY KEY ( id_reservation )
 );

INSERT INTO "public".reservation( reservation_date, id_users, start_time, id_field, duration ) VALUES ('2023-06-26', 1, '09:00:00', 1, 2);
INSERT INTO "public".reservation( reservation_date, id_users, start_time, id_field, duration ) VALUES ('2023-05-28', 1, '09:00:00', 1, 2);
INSERT INTO "public".reservation( reservation_date, id_users, start_time, id_field, duration ) VALUES ('2023-07-03', 2, '11:00:00', 1, 3);
INSERT INTO "public".reservation( reservation_date, id_users, start_time, id_field, duration ) VALUES ( '2023-06-10', 1, '10:00:00', 1, 5);
INSERT INTO "public".reservation( reservation_date, id_users, start_time, id_field, duration ) VALUES ( '2023-06-14', 1, '14:00:00', 1, 5);
INSERT INTO "public".reservation( reservation_date, id_users, start_time, id_field, duration ) VALUES ( '2023-06-15', 1, '06:00:00', 1, 1);
INSERT INTO "public".reservation( reservation_date, id_users, start_time, id_field, duration ) VALUES ( '2023-06-16', 1, '15:00:00', 1, 2);
INSERT INTO "public".reservation( reservation_date, id_users, start_time, id_field, duration ) VALUES ( '2023-06-21', 1, '05:00:00', 1, 2);
INSERT INTO "public".reservation( reservation_date, id_users, start_time, id_field, duration ) VALUES ( '2023-06-18', 1, '10:00:00', 1, 3);
INSERT INTO "public".reservation( reservation_date, id_users, start_time, id_field, duration ) VALUES ( '2023-06-18', 2, '10:00:00', 1, 5);
INSERT INTO "public".reservation( reservation_date, id_users, start_time, id_field, duration ) VALUES ( '2023-06-21', 2, '10:00:00', 3, 5);
INSERT INTO "public".reservation( reservation_date, id_users, start_time, id_field, duration ) VALUES ( '2023-06-21', 2, '10:00:00', 4, 2);
INSERT INTO "public".direct_reservation( id_direct_reservation, client_name, phone_number_client, reservation_date, start_time, id_field, duration ) VALUES ( 1, 'Feno', '0331854735', '2023-06-12', '08:00:00', 1, 1);
INSERT INTO "public".direct_reservation( id_direct_reservation, client_name, phone_number_client, reservation_date, start_time, id_field, duration ) VALUES ( 2, 'Zoky andry', '0328254518', '2023-06-10', '18:30:00', 1, 3);
INSERT INTO "public".direct_reservation( id_direct_reservation, client_name, phone_number_client, reservation_date, start_time, id_field, duration ) VALUES ( 3, 'Tiavina', '+261 32 66 131 80', '2023-06-21', '10:00:00', 4, 2);
