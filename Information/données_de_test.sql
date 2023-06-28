
-- Données pour le client
INSERT INTO status_client VALUES
(DEFAULT, 'Confirmé'),
(DEFAULT, 'En attente');

INSERT INTO cin VALUES
(DEFAULT, '117 231 421 552', 'client1_cin_picture1.png', 'client1_cin_picture2.png'),
(DEFAULT, '224 005 317 251', 'client2_cin_picture1.png', 'client2_cin_picture2.png'),
(DEFAULT, '119 105 250 300', 'client3_cin_picture1.png', 'client3_cin_picture2.png');

INSERT INTO client VALUES
(DEFAULT, 'John', 'RAKOTOARISOA', '0321531728', 'john.rakoto@gmail.com', 'Antananarivo', '2000-11-24', 'john1234', 1, '2023-01-15', 1,'sary1.jpg'),
(DEFAULT, 'Andry', 'ANDRIAMAMITIANA', '0341451743', 'andry123@gmail.com', 'Lot 3 bis Iavoloha', '1987-01-12', 'andry-andry', 1, '2023-04-23', 2,'sary2.png'),
(DEFAULT, 'Fitia', 'MIAROTIA', '0331754393', 'fitiaMia@gmail.com', 'Lot IAV 416', '1998-07-05', 'fitia@@', 1, '2023-10-07', 3, 'sary3.png');

-- Données pour les informations requis pour le terrain
INSERT INTO category VALUES
(DEFAULT, 'Foot à 11', 75000),
(DEFAULT, 'Basket', 20000),
(DEFAULT, 'Foot à 7', 50000);

INSERT INTO field_type VALUES
(DEFAULT, 'Goudron'),
(DEFAULT, 'Synthétique'),
(DEFAULT, 'Gazon'),
(DEFAULT, 'Terre'),
(DEFAULT, 'Tapis'),
(DEFAULT, 'Parquet');

INSERT INTO infrastructure VALUES
(DEFAULT, 'Intérieur'),
(DEFAULT, 'Extérieur');

INSERT INTO light VALUES
(DEFAULT, 'Eclairé'),
(DEFAULT, 'Non Eclairé');

INSERT INTO day VALUES
(DEFAULT, 'Lundi'),
(DEFAULT, 'Mardi'),
(DEFAULT, 'Mercredi'),
(DEFAULT, 'Jeudi'),
(DEFAULT, 'Vendredi'),
(DEFAULT, 'Samedi'),
(DEFAULT, 'Dimanche');

-- Insertion donnee de test terrain
insert into type_picture values
	(DEFAULT, 'Profil'),
	(DEFAULT, 'Secondaire');

insert into field values
-- 	(id_field,	id_category,	id_client,	name,						id_field_type,	id_infrastructure,	id_light,	description,									address,					latitude,	longitude,	insert_date,	field_files)
	(DEFAULT,	2,				1,			'Basket Betongolo',			1,				2,					2,			'Terrain fait pour tous et libre a tous',		'Betongolo Antananarivo',	-18.904924,	47.541774,	'2023-02-20',	'Field_Files/1/Proprio.zip'),
	(DEFAULT,	2,				2,			'Terrain Antsahamasina',	1,				2,					2,			'Terrain approprier au entrainement de club',	'3FW9+J8M, Antananarivo',	-18.903418,	47.468301,	'2023-01-14',	'Field_Files/2/Proprio.zip'),
	(DEFAULT,	3,				2,			'Foot Elgeco plus',			1,				2,					2,			'Terrain synthetique et bien eclaire pour vous','3FW9+J8M, Antananarivo',	-18.904924,	47.541774,	'2023-01-09',	'Field_Files/3/Proprio.zip'),
	(DEFAULT,	1,				3,			'Foot Domaine Alasora',		1,				2,					2,			'Terrain approprier au entrainement de club',	'3FW9+J8M, Antananarivo',	-18.904924,	47.541774,	'2023-03-27',	'Field_Files/4/Proprio.zip');

insert into picture values
-- 	(id_picture,	picture,			id_type_picture,	id_field)
	(DEFAULT,		'Terrain1.jpg',		1,					1),
	(DEFAULT,		'Terrain2.jpg',		1,					2),
	(DEFAULT,		'Terrain3.jpg',		2,					3),
	(DEFAULT,		'Terrain4.jpg',		2,					4);


insert into picture values
-- 	(id_picture,	picture,			id_type_picture,	id_field)
	(DEFAULT,		'Terrain5.jpg',		2,					1),
	(DEFAULT,		'Terrain6.jpg',		2,					2),
	(DEFAULT,		'Terrain7.jpg',		1,					3),
	(DEFAULT,		'Terrain8.jpg',		1,					4);

INSERT INTO dispo_and_price VALUES
(DEFAULT, 1, '08:00:00', '19:00:00', 1, 30000),
(DEFAULT, 2, '08:00:00', '19:00:00', 1, 30000),
(DEFAULT, 3, '08:00:00', '19:00:00', 1, 30000),
(DEFAULT, 4, '08:00:00', '19:00:00', 1, 30000),
(DEFAULT, 5, '08:00:00', '19:00:00', 1, 30000),
(DEFAULT, 3, '12:00:00', '19:30:00', 2, 28000),
(DEFAULT, 5, '08:00:00', '19:00:00', 2, 28000),
(DEFAULT, 6, '08:00:00', '20:00:00', 2, 30000),
(DEFAULT, 7, '14:00:00', '18:00:00', 2, 35000),
(DEFAULT, 1, '09:00:00', '12:00:00', 3, 50000),
(DEFAULT, 2, '08:00:00', '18:00:00', 3, 50000),
(DEFAULT, 3, '08:00:00', '12:00:00', 3, 50000),
(DEFAULT, 3, '12:00:00', '20:00:00', 3, 65000),
(DEFAULT, 4, '08:00:00', '19:00:00', 3, 60000),
(DEFAULT, 5, '08:00:00', '18:00:00', 3, 60000),
(DEFAULT, 5, '18:00:01', '22:00:00', 3, 80000),
(DEFAULT, 6, '05:00:00', '18:00:00', 3, 60000),
(DEFAULT, 6, '18:00:01', '22:00:00', 3, 65000),
(DEFAULT, 7, '14:00:00', '18:00:00', 3, 60000),
(DEFAULT, 1, '08:00:00', '18:00:00', 4, 40000),
(DEFAULT, 2, '08:00:00', '18:00:00', 4, 40000),
(DEFAULT, 3, '08:00:00', '18:00:00', 4, 40000),
(DEFAULT, 5, '08:00:00', '19:00:00', 4, 50000),
(DEFAULT, 6, '05:00:00', '20:00:00', 4, 50000);

INSERT INTO discount VALUES
(DEFAULT, 1, '2023-06-06', '2023-06-10', 20),
(DEFAULT, 4, '2023-06-16', '2023-06-20', 10);

INSERT INTO unavailability VALUES
(DEFAULT, 1, '2023-06-26', '08:00:00', '19:00:00'),
(DEFAULT, 3, '2023-06-25', '12:00:00', '20:00:00'),
(DEFAULT, 3, '2023-06-26', '05:00:00', '20:00:00');

INSERT INTO direct_reservation VALUES
(DEFAULT, 'Feno', '0331854735', '2023-06-12', '08:00:00', 1, 1),
(DEFAULT, 'Zoky andry', '0328254518', '2023-06-10', '18:30:00', 1, 3);

insert into account_admin(first_name, last_name, mail, phone_number, pwd)
values
('John', 'Doe', 'john@gmail.com', '+261 34 50 200 40', 'password123'),
('Jane', 'Smith', 'jane@gmail.com', '+261 33 80 741 51', 'password456'),
('Bob', 'Johnson', 'bob@gmail.com', '+261 32 87 540 52', 'password789');

insert into subscription_state(subscription_state)
values
('Payer');

insert into subscription(id_field, subscription_date, start_date, duration, id_subscription_state)
values
(1, DEFAULT, '06-06-2023', 1, 1),
(2, DEFAULT, '06-06-2023', 2, 1),
(3, DEFAULT, '06-06-2023', 1, 1),
(4, DEFAULT, '06-06-2023', 1, 1);



INSERT INTO users
    (first_name, last_name, birth_date, phone_number, mail, pwd)
VALUES
('Tiavina', 'Malalaniaina', '2004-07-08', '+261 32 66 131 80', 'tiavinaramia@gmail.com', 'tiavina'),
('Bob', 'Marley', '1999-05-05', '+261 34 56 789 54', 'marley@gmail.com', 'marley');

INSERT INTO "public".reservation
	( reservation_date, id_users, start_time, id_field, duration)
VALUES
( '2023-06-20', 1, '09:00', 1, 2 ),
( '2023-05-20', 1, '09:00', 1, 2 ),



