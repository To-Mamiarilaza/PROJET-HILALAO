CREATE SCHEMA IF NOT EXISTS "public";

CREATE  TABLE "public".users ( 
	id_users             integer DEFAULT nextval('users_id_users_seq'::regclass) NOT NULL  ,
	first_name           varchar(30)  NOT NULL  ,
	last_name            varchar(50)  NOT NULL  ,
	birth_date           date  NOT NULL  ,
	phone_number         varchar(20)  NOT NULL  ,
	mail                 varchar(50)  NOT NULL  ,
	sign_up_date         date DEFAULT CURRENT_DATE NOT NULL  ,
	pwd                  varchar(16)  NOT NULL  ,
	CONSTRAINT pk_users PRIMARY KEY ( id_users )
 );

INSERT INTO "public".users( id_users, first_name, last_name, birth_date, phone_number, mail, sign_up_date, pwd ) VALUES ( 1, 'Tiavina', 'Malalaniaina', '2004-07-08', '+261 32 66 131 80', 'tiavinaramia@gmail.com', '2023-06-08', 'tiavina');
INSERT INTO "public".users( id_users, first_name, last_name, birth_date, phone_number, mail, sign_up_date, pwd ) VALUES ( 2, 'Maela', 'ANDRIAMAHERY', '1998-05-06', '+261 34 564 84', 'maela@gmail.com', '2023-06-10', 'MLLLLL');
