-- NOTIFICATION DE L'UTILISATEUR
INSERT INTO users VALUES 
(DEFAULT, 'To', 'MAMIARILAZA', '2004-07-07', '0341451743', 'test@gmail.com', '2020-12-03', 'to'),
(DEFAULT, 'Niavo', 'MAMIHARILAZA', '2008-08-18', '0341451743', 'test@gmail.com', '2020-12-03', 'to');

CREATE TABLE type_notification (
    id_type_notification SERIAL PRIMARY KEY,
    type_notification VARCHAR(50)
);

INSERT INTO type_notification VALUES 
(1, 'Rappel de réservation'),
(2, 'Annulation réservation'),
(10, 'Validation demande d'' adhesion'),
(11, 'Validation demande d'' ajout de terrain'),
(12, 'Réservation d'' utilisateur'),
(13, 'Rappel de payement d''abonnement'),
(20, 'Demande d'' adhesion d''un client'),
(21, 'Demande d'' ajout terrain'),
(22, 'Payement d'' une abonnement');

CREATE TABLE user_notification (
    id_user_notification SERIAL PRIMARY KEY,
    id_user SERIAL,
    id_field SERIAL,
    id_type_notification SERIAL,
    date_notification TIMESTAMP,
    etat INTEGER,   -- O si non lue et 1 au contraire
    FOREIGN KEY (id_user) REFERENCES users(id_users),
    FOREIGN KEY (id_field) REFERENCES field(id_field),
    FOREIGN KEY (id_type_notification) REFERENCES type_notification(id_type_notification)
);

INSERT INTO user_notification VALUES 
(DEFAULT, 2, 2, 1, '2023-06-27 15:30:00', 0),
(DEFAULT, 3, 1, 1, '2023-06-27 15:20:00', 0),
(DEFAULT, 3, 2, 1, '2023-06-27 16:30:00', 0);

-- Crée view pour combiner les notifications et le nom du terrain
CREATE VIEW v_user_notification AS
SELECT u.id_user_notification, u.id_user, u.id_field, f.name, id_type_notification, date_notification, etat  
FROM user_notification u JOIN field f ON u.id_field = f.id_field;

-- View pour afficher les notification qui aura lieu dans 30 min
CREATE VIEW v_near_user_notification AS
SELECT * FROM v_user_notification 
WHERE (date_notification >= NOW() AND date_notification <= NOW() + INTERVAL '30 minutes') 
OR (date_notification <= NOW() AND date_notification >= NOW() - INTERVAL '30 minutes');

-- View pour afficher les notification de résérvation en retard plus de 30 min
CREATE VIEW v_missing_user_notification AS
SELECT * FROM v_user_notification 
WHERE date_notification <= NOW() - INTERVAL '30 minutes';


-- NOTIFICATIONS DU CLIENT

CREATE TABLE client_notification (
    id_client_notification SERIAL PRIMARY KEY,
    id_client SERIAL,
    id_type_notification SERIAL,
    date_notification TIMESTAMP,
    etat SERIAL,
    FOREIGN KEY(id_client) REFERENCES client(id_client),
    FOREIGN KEY(id_type_notification) REFERENCES type_notification(id_type_notification)
);

INSERT INTO client_notification VALUES (DEFAULT, 1, 10, '2023-06-28 08:00:00', 0);
INSERT INTO client_notification VALUES (DEFAULT, 1, 11, '2023-06-28 08:00:00', 0);
INSERT INTO client_notification VALUES (DEFAULT, 1, 12, '2023-06-28 12:00:00', 0);
INSERT INTO client_notification VALUES (DEFAULT, 1, 12, '2023-06-28 16:00:00', 0);
INSERT INTO client_notification VALUES (DEFAULT, 1, 13, '2023-06-28 18:00:00', 0);

CREATE TABLE client_validation (
    id_client_notification SERIAL,
    resultat INTEGER,       -- 1 si validée et 0 si refusée
    FOREIGN KEY(id_client_notification) REFERENCES client_notification(id_client_notification)
);

INSERT INTO client_validation VALUES (1, 1);

CREATE TABLE field_validation (
    id_client_notification SERIAL,
    id_field SERIAL,
    resultat INTEGER,       -- 1 si validé et 0 sinon
    FOREIGN KEY (id_client_notification) REFERENCES client_notification(id_client_notification),
    FOREIGN KEY (id_field) REFERENCES field(id_field)
);

INSERT INTO field_validation VALUES (2, 4, 1);

CREATE TABLE field_reservation_notification (
    id_client_notification SERIAL,
    id_user SERIAL,
    id_field SERIAL,
    FOREIGN KEY(id_client_notification) REFERENCES client_notification(id_client_notification),
    FOREIGN KEY(id_user) REFERENCES users(id_users),
    FOREIGN KEY(id_field) REFERENCES field(id_field)
);
INSERT INTO field_reservation_notification VALUES(3, 2, 3);
INSERT INTO field_reservation_notification VALUES(4, 1, 1);

CREATE TABLE field_subscription_notification (
    id_client_notification SERIAL,
    id_field SERIAL,
    month INTEGER,
    FOREIGN KEY(id_client_notification) REFERENCES client_notification(id_client_notification),
    FOREIGN KEY(id_field) REFERENCES field(id_field)
);
INSERT INTO field_subscription_notification VALUES(5, 1, 6);

-- View pour le notification de validation d'adhesion du client
CREATE VIEW v_client_validation_notification AS
SELECT cn.id_client_notification, id_client, id_type_notification, date_notification, resultat, etat FROM
client_notification cn JOIN client_validation cv ON cn.id_client_notification = cv.id_client_notification; 

-- View pour afficher les validations de demande d'ajout de terrain
CREATE VIEW v_field_validation_notification AS
SELECT cn.id_client_notification, cn.id_client, id_type_notification, date_notification, fv.id_field, name, resultat, cn.etat FROM
client_notification cn JOIN field_validation fv ON cn.id_client_notification = fv.id_client_notification 
JOIN field f ON fv.id_field = f.id_field;

-- View pour afficher les réservations fait par l'utilisateurs
CREATE VIEW v_field_reservation_notification AS
SELECT cn.id_client_notification, cn.id_client, id_type_notification, date_notification, fr.id_user, u.first_name, fr.id_field, name, cn.etat 
FROM client_notification cn JOIN field_reservation_notification fr ON cn.id_client_notification = fr.id_client_notification
JOIN field f ON fr.id_field = f.id_field JOIN users u ON u.id_users = fr.id_user;

-- View pour afficher les rappels de payement d'abonnement
CREATE OR REPLACE VIEW v_field_subscription_notification AS
SELECT cn.id_client_notification, cn.id_client, id_type_notification, date_notification, fs.id_field, name, month, cn.etat
FROM client_notification cn JOIN field_subscription_notification fs 
ON cn.id_client_notification = fs.id_client_notification JOIN
field f ON fs.id_field = f.id_field WHERE  cn.date_notification >= NOW() AND cn.date_notification <= NOW() + '10 days' OR cn.date_notification <= NOW();


-- NOTIFICATION POUR LES BACK OFFICES
CREATE TABLE admin_notification (
    id_admin_notification SERIAL PRIMARY KEY,
    id_type_notification SERIAL,
    date_notification TIMESTAMP,
    etat SERIAL,
    FOREIGN KEY(id_type_notification) REFERENCES type_notification(id_type_notification)
);
INSERT INTO admin_notification VALUES(DEFAULT, 20, '2023-06-29 18:00:00', 0);
INSERT INTO admin_notification VALUES(DEFAULT, 21, '2023-06-29 18:00:00', 0);
INSERT INTO admin_notification VALUES(DEFAULT, 22, '2023-06-29 18:00:00', 0);

CREATE TABLE client_adhesion_notification (
    id_admin_notification SERIAL,
    id_client SERIAL,
    FOREIGN KEY(id_admin_notification) REFERENCES admin_notification(id_admin_notification),
    FOREIGN KEY(id_client) REFERENCES client(id_client)
);
INSERT INTO client_adhesion_notification VALUES(1, 1);

CREATE TABLE field_adhesion_notification (
    id_admin_notification SERIAL,
    id_client SERIAL,
    id_field SERIAL,
    FOREIGN KEY(id_client) REFERENCES client(id_client),
    FOREIGN KEY(id_field) REFERENCES field(id_field)
);
INSERT INTO field_adhesion_notification VALUES(2, 2, 3);

CREATE TABLE subscription_payement_notification (
    id_admin_notification SERIAL,
    id_client SERIAL,
    id_field SERIAL,
    month INTEGER,
    FOREIGN KEY(id_client) REFERENCES client(id_client),
    FOREIGN KEY(id_field) REFERENCES field(id_field)
);

INSERT INTO subscription_payement_notification VALUES (3, 3, 1, 7);

-- Crée un view pour le demande d'adhesion d'un client
CREATE VIEW v_client_adhesion_notification AS
SELECT an.id_admin_notification, an.id_type_notification, an.date_notification, an.etat, ca.id_client, c.first_name FROM 
admin_notification an JOIN client_adhesion_notification ca ON an.id_admin_notification = ca.id_admin_notification
JOIN client c ON ca.id_client = c.id_client;

-- Crée un view pour lee demande d'ajout du terrain
CREATE VIEW v_field_adhesion_notification AS
SELECT an.id_admin_notification, an.id_type_notification, an.date_notification, an.etat, fa.id_client, c.first_name, f.id_field, f.name FROM 
admin_notification an JOIN field_adhesion_notification fa ON an.id_admin_notification = fa.id_admin_notification
JOIN client c ON fa.id_client = c.id_client JOIN field f ON fa.id_field = f.id_field;

-- Crée un view pour les notifications de payements d'une abonnement
CREATE VIEW v_subscription_notification AS
SELECT an.id_admin_notification, an.id_type_notification, an.date_notification, an.etat, sp.id_client, c.first_name, f.id_field, f.name, sp.month FROM
admin_notification an JOIN subscription_payement_notification sp ON an.id_admin_notification = sp.id_admin_notification
JOIN client c ON sp.id_client = c.id_client JOIN field f ON sp.id_field = f.id_field;