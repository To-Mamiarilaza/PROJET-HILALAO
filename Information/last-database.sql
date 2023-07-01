CREATE SCHEMA IF NOT EXISTS "public";

CREATE SEQUENCE "public".abonnement_notification_id_abonnement_notification_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".abonnement_state_id_abonnement_state_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".account_admin_id_account_admin_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".admin_notification_etat_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".admin_notification_id_admin_notification_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".admin_notification_id_type_notification_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".category_id_category_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".cin_id_cin_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".client_adhesion_notification_id_admin_notification_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".client_adhesion_notification_id_client_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".client_id_client_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".client_notification_etat_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".client_notification_id_client_notification_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".client_notification_id_client_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".client_notification_id_type_notification_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".client_validation_id_client_notification_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".day_id_day_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".direct_reservation_id_direct_reservation_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".discount2_id_discount_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".discount_id_discount_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".dispo_and_price_id_dispo_and_price_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".field_adhesion_notification_id_admin_notification_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".field_adhesion_notification_id_client_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".field_adhesion_notification_id_field_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".field_id_field_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".field_reservation_notification_id_client_notification_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".field_reservation_notification_id_field_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".field_reservation_notification_id_user_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".field_subscription_notification_id_client_notification_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".field_subscription_notification_id_field_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".field_type_id_field_type_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".field_validation_id_client_notification_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".field_validation_id_field_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".infrastruture_id_infrastructure_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".light_id_light_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".picture_id_picture_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".reservation_id_reservation_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".status_client_id_status_client_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".subscription2_id_subscription_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".subscription_payement_notification_id_admin_notification_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".subscription_payement_notification_id_client_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".subscription_payement_notification_id_field_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".type_notification_id_type_notification_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".type_picture_id_type_picture_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".unavailability_id_unavailability_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".user_reservation_notification_id_user_reservation_notificat_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".users_id_users_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".validation_notification_id_validation_notification_seq START WITH 1 INCREMENT BY 1;

CREATE  TABLE "public".account_admin (
	id_account_admin     integer DEFAULT nextval('account_admin_id_account_admin_seq'::regclass) NOT NULL  ,
	first_name           varchar(50)    ,
	last_name            varchar(50)  NOT NULL  ,
	mail                 varchar(50)  NOT NULL  ,
	phone_number         varchar(20)  NOT NULL  ,
	pwd                  varchar(16)  NOT NULL  ,
	CONSTRAINT pk_account_admin PRIMARY KEY ( id_account_admin )
 );

CREATE  TABLE "public".category (
	id_category          integer DEFAULT nextval('category_id_category_seq'::regclass) NOT NULL  ,
	category             varchar(50)  NOT NULL  ,
	subscribing_price    numeric(10,2)  NOT NULL  ,
	description          text    ,
	status               integer DEFAULT 1 NOT NULL  ,
	CONSTRAINT pk_category PRIMARY KEY ( id_category )
 );

CREATE  TABLE "public".cin (
	id_cin               integer DEFAULT nextval('cin_id_cin_seq'::regclass) NOT NULL  ,
	cin_number           varchar(20)    ,
	first_picture        varchar(50)    ,
	second_picture       varchar(50)    ,
	CONSTRAINT pk_cin PRIMARY KEY ( id_cin )
 );

CREATE  TABLE "public"."day" (
	id_day               integer DEFAULT nextval('day_id_day_seq'::regclass) NOT NULL  ,
	"day"                varchar(35)  NOT NULL  ,
	CONSTRAINT pk_tbl PRIMARY KEY ( id_day )
 );

CREATE  TABLE "public".field_type (
	id_field_type        integer DEFAULT nextval('field_type_id_field_type_seq'::regclass) NOT NULL  ,
	field_type           varchar(50)  NOT NULL  ,
	status               integer DEFAULT 1 NOT NULL  ,
	CONSTRAINT pk_field_type PRIMARY KEY ( id_field_type )
 );

CREATE  TABLE "public".infrastructure (
	id_infrastructure    integer DEFAULT nextval('infrastruture_id_infrastructure_seq'::regclass) NOT NULL  ,
	infrastructure       varchar(50)  NOT NULL  ,
	CONSTRAINT pk_infrastruture PRIMARY KEY ( id_infrastructure )
 );

CREATE  TABLE "public".light (
	id_light             integer DEFAULT nextval('light_id_light_seq'::regclass) NOT NULL  ,
	light                varchar(30)    ,
	CONSTRAINT pk_light PRIMARY KEY ( id_light )
 );

CREATE  TABLE "public".status_client (
	id_status_client     integer DEFAULT nextval('status_client_id_status_client_seq'::regclass) NOT NULL  ,
	status               varchar(30)  NOT NULL  ,
	CONSTRAINT pk_status PRIMARY KEY ( id_status_client )
 );

CREATE  TABLE "public".subscription_state (
	id_subscription_state integer DEFAULT nextval('abonnement_state_id_abonnement_state_seq'::regclass) NOT NULL  ,
	subscription_state   varchar(20)  NOT NULL  ,
	status               integer DEFAULT 1 NOT NULL  ,
	CONSTRAINT pk_abonnement_state PRIMARY KEY ( id_subscription_state )
 );

CREATE  TABLE "public".type_notification (
	id_type_notification integer DEFAULT nextval('type_notification_id_type_notification_seq'::regclass) NOT NULL  ,
	type_notification    varchar(50)    ,
	CONSTRAINT type_notification_pkey PRIMARY KEY ( id_type_notification )
 );

CREATE  TABLE "public".type_picture (
	id_type_picture      integer DEFAULT nextval('type_picture_id_type_picture_seq'::regclass) NOT NULL  ,
	type_picture         varchar(50)  NOT NULL  ,
	CONSTRAINT pk_type_picture PRIMARY KEY ( id_type_picture )
 );

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

CREATE  TABLE "public".admin_notification (
	id_admin_notification integer DEFAULT nextval('admin_notification_id_admin_notification_seq'::regclass) NOT NULL  ,
	id_type_notification integer DEFAULT nextval('admin_notification_id_type_notification_seq'::regclass) NOT NULL  ,
	date_notification    timestamp    ,
	etat                 integer DEFAULT nextval('admin_notification_etat_seq'::regclass) NOT NULL  ,
	CONSTRAINT admin_notification_pkey PRIMARY KEY ( id_admin_notification ),
	CONSTRAINT admin_notification_id_type_notification_fkey FOREIGN KEY ( id_type_notification ) REFERENCES "public".type_notification( id_type_notification )
 );

CREATE  TABLE "public".client (
	id_client            integer DEFAULT nextval('client_id_client_seq'::regclass) NOT NULL  ,
	first_name           varchar(30)  NOT NULL  ,
	last_name            varchar(30)  NOT NULL  ,
	phone_number         varchar(20)  NOT NULL  ,
	mail                 varchar(50)  NOT NULL  ,
	address              varchar(50)  NOT NULL  ,
	birth_date           date  NOT NULL  ,
	pwd                  varchar(16)  NOT NULL  ,
	id_status            integer  NOT NULL  ,
	sign_up_date         timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL  ,
	id_cin               integer    ,
	customer_picture     varchar(30)    ,
	CONSTRAINT pk_client PRIMARY KEY ( id_client ),
	CONSTRAINT fk_client_cin FOREIGN KEY ( id_cin ) REFERENCES "public".cin( id_cin )   ,
	CONSTRAINT fk_client_status_client FOREIGN KEY ( id_status ) REFERENCES "public".status_client( id_status_client )
 );

CREATE  TABLE "public".client_adhesion_notification (
	id_admin_notification integer DEFAULT nextval('client_adhesion_notification_id_admin_notification_seq'::regclass) NOT NULL  ,
	id_client            integer DEFAULT nextval('client_adhesion_notification_id_client_seq'::regclass) NOT NULL  ,
	CONSTRAINT client_adhesion_notification_id_admin_notification_fkey FOREIGN KEY ( id_admin_notification ) REFERENCES "public".admin_notification( id_admin_notification )   ,
	CONSTRAINT client_adhesion_notification_id_client_fkey FOREIGN KEY ( id_client ) REFERENCES "public".client( id_client )
 );

CREATE  TABLE "public".client_notification (
	id_client_notification integer DEFAULT nextval('client_notification_id_client_notification_seq'::regclass) NOT NULL  ,
	id_client            integer DEFAULT nextval('client_notification_id_client_seq'::regclass) NOT NULL  ,
	id_type_notification integer DEFAULT nextval('client_notification_id_type_notification_seq'::regclass) NOT NULL  ,
	date_notification    timestamp    ,
	etat                 integer DEFAULT nextval('client_notification_etat_seq'::regclass) NOT NULL  ,
	CONSTRAINT client_notification_pkey PRIMARY KEY ( id_client_notification ),
	CONSTRAINT client_notification_id_client_fkey FOREIGN KEY ( id_client ) REFERENCES "public".client( id_client )   ,
	CONSTRAINT client_notification_id_type_notification_fkey FOREIGN KEY ( id_type_notification ) REFERENCES "public".type_notification( id_type_notification )
 );

CREATE  TABLE "public".client_validation (
	id_client_notification integer DEFAULT nextval('client_validation_id_client_notification_seq'::regclass) NOT NULL  ,
	resultat             integer    ,
	CONSTRAINT client_validation_id_client_notification_fkey FOREIGN KEY ( id_client_notification ) REFERENCES "public".client_notification( id_client_notification )
 );

CREATE  TABLE "public".field (
	id_field             integer DEFAULT nextval('field_id_field_seq'::regclass) NOT NULL  ,
	id_category          integer  NOT NULL  ,
	id_client            integer  NOT NULL  ,
	name                 varchar(100)  NOT NULL  ,
	id_field_type        integer  NOT NULL  ,
	id_infrastructure    integer  NOT NULL  ,
	id_light             integer  NOT NULL  ,
	description          text  NOT NULL  ,
	address              varchar(200)    ,
	latitude             double precision  NOT NULL  ,
	longitude            double precision  NOT NULL  ,
	insert_date          date DEFAULT CURRENT_DATE   ,
	field_files          varchar(100)  NOT NULL  ,
	"state"              integer DEFAULT 2 NOT NULL  ,
	CONSTRAINT pk_field PRIMARY KEY ( id_field ),
	CONSTRAINT fk_field_category FOREIGN KEY ( id_category ) REFERENCES "public".category( id_category )   ,
	CONSTRAINT fk_field_client FOREIGN KEY ( id_client ) REFERENCES "public".client( id_client )   ,
	CONSTRAINT fk_field_field_type FOREIGN KEY ( id_field_type ) REFERENCES "public".field_type( id_field_type )   ,
	CONSTRAINT fk_field_infrastruture FOREIGN KEY ( id_infrastructure ) REFERENCES "public".infrastructure( id_infrastructure )   ,
	CONSTRAINT fk_field_light FOREIGN KEY ( id_light ) REFERENCES "public".light( id_light )   ,
	CONSTRAINT fk_field_status_client FOREIGN KEY ( "state" ) REFERENCES "public".status_client( id_status_client )
 );

CREATE  TABLE "public".field_adhesion_notification (
	id_admin_notification integer DEFAULT nextval('field_adhesion_notification_id_admin_notification_seq'::regclass) NOT NULL  ,
	id_client            integer DEFAULT nextval('field_adhesion_notification_id_client_seq'::regclass) NOT NULL  ,
	id_field             integer DEFAULT nextval('field_adhesion_notification_id_field_seq'::regclass) NOT NULL  ,
	CONSTRAINT field_adhesion_notification_id_client_fkey FOREIGN KEY ( id_client ) REFERENCES "public".client( id_client )   ,
	CONSTRAINT field_adhesion_notification_id_field_fkey FOREIGN KEY ( id_field ) REFERENCES "public".field( id_field )
 );

CREATE  TABLE "public".field_reservation_notification (
	id_client_notification integer DEFAULT nextval('field_reservation_notification_id_client_notification_seq'::regclass) NOT NULL  ,
	id_user              integer DEFAULT nextval('field_reservation_notification_id_user_seq'::regclass) NOT NULL  ,
	id_field             integer DEFAULT nextval('field_reservation_notification_id_field_seq'::regclass) NOT NULL  ,
	CONSTRAINT field_reservation_notification_id_client_notification_fkey FOREIGN KEY ( id_client_notification ) REFERENCES "public".client_notification( id_client_notification )   ,
	CONSTRAINT field_reservation_notification_id_field_fkey FOREIGN KEY ( id_field ) REFERENCES "public".field( id_field )   ,
	CONSTRAINT field_reservation_notification_id_user_fkey FOREIGN KEY ( id_user ) REFERENCES "public".users( id_users )
 );

CREATE  TABLE "public".field_subscription_notification (
	id_client_notification integer DEFAULT nextval('field_subscription_notification_id_client_notification_seq'::regclass) NOT NULL  ,
	id_field             integer DEFAULT nextval('field_subscription_notification_id_field_seq'::regclass) NOT NULL  ,
	"month"              integer    ,
	CONSTRAINT field_subscription_notification_id_client_notification_fkey FOREIGN KEY ( id_client_notification ) REFERENCES "public".client_notification( id_client_notification )   ,
	CONSTRAINT field_subscription_notification_id_field_fkey FOREIGN KEY ( id_field ) REFERENCES "public".field( id_field )
 );

CREATE  TABLE "public".field_validation (
	id_client_notification integer DEFAULT nextval('field_validation_id_client_notification_seq'::regclass) NOT NULL  ,
	id_field             integer DEFAULT nextval('field_validation_id_field_seq'::regclass) NOT NULL  ,
	resultat             integer    ,
	CONSTRAINT field_validation_id_client_notification_fkey FOREIGN KEY ( id_client_notification ) REFERENCES "public".client_notification( id_client_notification )   ,
	CONSTRAINT field_validation_id_field_fkey FOREIGN KEY ( id_field ) REFERENCES "public".field( id_field )
 );

CREATE  TABLE "public".picture (
	id_picture           integer DEFAULT nextval('picture_id_picture_seq'::regclass) NOT NULL  ,
	picture              varchar(50)  NOT NULL  ,
	id_type_picture      integer  NOT NULL  ,
	id_field             integer  NOT NULL  ,
	CONSTRAINT pk_pictures PRIMARY KEY ( id_picture ),
	CONSTRAINT fk_picture_field FOREIGN KEY ( id_field ) REFERENCES "public".field( id_field )   ,
	CONSTRAINT fk_picture_type_picture FOREIGN KEY ( id_type_picture ) REFERENCES "public".type_picture( id_type_picture )
 );

CREATE  TABLE "public".reservation (
	id_reservation       integer DEFAULT nextval('reservation_id_reservation_seq'::regclass) NOT NULL  ,
	reservation_date     date  NOT NULL  ,
	id_users             integer  NOT NULL  ,
	start_time           time  NOT NULL  ,
	id_field             integer  NOT NULL  ,
	duration             integer  NOT NULL  ,
	price                double precision DEFAULT 50000   ,
	"state"              integer DEFAULT 1   ,
	CONSTRAINT pk_reservation PRIMARY KEY ( id_reservation ),
	CONSTRAINT fk_reservation_field FOREIGN KEY ( id_field ) REFERENCES "public".field( id_field )   ,
	CONSTRAINT fk_reservation_users FOREIGN KEY ( id_users ) REFERENCES "public".users( id_users )
 );

CREATE  TABLE "public".subscription (
	id_subscription      integer DEFAULT nextval('subscription2_id_subscription_seq'::regclass) NOT NULL  ,
	id_field             integer  NOT NULL  ,
	subscription_date    date DEFAULT CURRENT_DATE NOT NULL  ,
	start_date           date  NOT NULL  ,
	duration             integer  NOT NULL  ,
	id_subscription_state integer  NOT NULL  ,
	CONSTRAINT pk_subscription2 PRIMARY KEY ( id_subscription ),
	CONSTRAINT fk_subscription2_field FOREIGN KEY ( id_field ) REFERENCES "public".field( id_field )   ,
	CONSTRAINT fk_subscription2_subscription_state FOREIGN KEY ( id_subscription_state ) REFERENCES "public".subscription_state( id_subscription_state )
 );

CREATE  TABLE "public".subscription_payement_notification (
	id_admin_notification integer DEFAULT nextval('subscription_payement_notification_id_admin_notification_seq'::regclass) NOT NULL  ,
	id_client            integer DEFAULT nextval('subscription_payement_notification_id_client_seq'::regclass) NOT NULL  ,
	id_field             integer DEFAULT nextval('subscription_payement_notification_id_field_seq'::regclass) NOT NULL  ,
	"month"              integer    ,
	CONSTRAINT subscription_payement_notification_id_client_fkey FOREIGN KEY ( id_client ) REFERENCES "public".client( id_client )   ,
	CONSTRAINT subscription_payement_notification_id_field_fkey FOREIGN KEY ( id_field ) REFERENCES "public".field( id_field )
 );

CREATE  TABLE "public".unavailability (
	id_unavailability    integer DEFAULT nextval('unavailability_id_unavailability_seq'::regclass) NOT NULL  ,
	id_field             integer  NOT NULL  ,
	unavailability_date  date  NOT NULL  ,
	start_time           time  NOT NULL  ,
	end_time             time  NOT NULL  ,
	CONSTRAINT pk_unavailability PRIMARY KEY ( id_unavailability ),
	CONSTRAINT fk_unavailability_field FOREIGN KEY ( id_field ) REFERENCES "public".field( id_field )
 );

CREATE  TABLE "public".direct_reservation (
	id_direct_reservation integer DEFAULT nextval('direct_reservation_id_direct_reservation_seq'::regclass) NOT NULL  ,
	client_name          varchar(100)    ,
	phone_number_client  varchar(20)    ,
	reservation_date     date DEFAULT CURRENT_DATE   ,
	start_time           time  NOT NULL  ,
	id_field             integer  NOT NULL  ,
	duration             integer  NOT NULL  ,
	CONSTRAINT pk_direct_reservation PRIMARY KEY ( id_direct_reservation ),
	CONSTRAINT fk_direct_reservation_field FOREIGN KEY ( id_field ) REFERENCES "public".field( id_field )
 );

CREATE  TABLE "public".discount (
	id_discount          integer DEFAULT nextval('discount2_id_discount_seq'::regclass) NOT NULL  ,
	id_field             integer  NOT NULL  ,
	"start"              date  NOT NULL  ,
	"end"                date  NOT NULL  ,
	discount             numeric(5,2)  NOT NULL  ,
	CONSTRAINT pk_discount2 PRIMARY KEY ( id_discount ),
	CONSTRAINT fk_discount2_field FOREIGN KEY ( id_field ) REFERENCES "public".field( id_field )
 );

CREATE  TABLE "public".dispo_and_price (
	id_dispo_and_price   integer DEFAULT nextval('dispo_and_price_id_dispo_and_price_seq'::regclass) NOT NULL  ,
	id_day               integer  NOT NULL  ,
	start_time           time  NOT NULL  ,
	end_time             time  NOT NULL  ,
	id_field             integer  NOT NULL  ,
	price                numeric(10,2)  NOT NULL  ,
	CONSTRAINT pk_dispo_and_price PRIMARY KEY ( id_dispo_and_price ),
	CONSTRAINT fk_dispo_and_price_day FOREIGN KEY ( id_day ) REFERENCES "public"."day"( id_day )   ,
	CONSTRAINT fk_dispo_and_price_field FOREIGN KEY ( id_field ) REFERENCES "public".field( id_field )
 );

CREATE VIEW "public".v_detailled_reservation AS  SELECT r.id_users,
    r.id_reservation,
    r.reservation_date,
    r.start_time AS start,
    r.duration,
    r.state,
    r.price,
    u.first_name,
    u.last_name,
    u.birth_date,
    u.phone_number,
    u.mail,
    f.id_field,
    f.name AS field_name,
    f.description AS field_description,
    f.address AS field_address
   FROM ((reservation r
     JOIN users u ON ((r.id_users = u.id_users)))
     JOIN field f ON ((r.id_field = f.id_field)));

CREATE VIEW "public".listfield AS  SELECT field.id_field,
    picture.picture,
    field.name,
    field.address,
    field.description
   FROM (field
     JOIN picture ON ((picture.id_field = field.id_field)))
  WHERE (picture.id_type_picture = 1);

CREATE VIEW "public".v_actif_reservation AS  SELECT v_reservation_detailled.id_reservation,
    v_reservation_detailled.reservation_date,
    v_reservation_detailled.id_users,
    v_reservation_detailled.start_time,
    v_reservation_detailled.id_field,
    v_reservation_detailled.duration,
    v_reservation_detailled.end_time,
    v_reservation_detailled.price
   FROM v_reservation_detailled;

CREATE VIEW "public".v_next_two_weeks AS  SELECT (generate_series((CURRENT_DATE)::timestamp without time zone, (CURRENT_DATE + '14 days'::interval), '1 day'::interval))::date AS day;

CREATE VIEW "public".v_reservation_detailled AS  SELECT r.id_reservation,
    r.reservation_date,
    r.id_users,
    r.start_time,
    r.id_field,
    r.duration,
    (r.start_time + ('01:00:00'::interval * (r.duration)::double precision)) AS end_time,
    r.price
   FROM reservation r;

CREATE VIEW "public".v_reservation_detailled_field AS  SELECT rv.id_users,
    rf.id_client,
    rf.id_field AS rf_id_field,
    rv.price,
    rf.id_field,
    rf.category AS field_category,
    rf.subscribing_price,
    rf.field_type,
    rf.infrastructure,
    rf.light,
    rf.address,
    rf.longitude,
    rf.latitude,
    rf.description,
    rv.id_reservation,
    rv.reservation_date,
    rv.first_name,
    rv.last_name,
    rv.birth_date,
    rv.phone_number,
    rv.mail,
    rv.start,
    rv.duration,
    rv.field_name,
    rv.field_description,
    rv.field_address,
    rv.state
   FROM (v_info_field rf
     JOIN v_detailled_reservation rv ON ((rf.id_field = rv.id_field)));

CREATE VIEW "public".v_availability_field_for_one_month AS  SELECT v.day,
    dp.id_dispo_and_price,
    dp.id_day,
    dp.start_time,
    dp.end_time,
    dp.id_field,
    dp.price
   FROM (dispo_and_price dp
     RIGHT JOIN v_day_for_next_month v ON (((dp.id_day)::numeric = (EXTRACT(dow FROM v.day) + (1)::numeric))))
  ORDER BY v.day, dp.id_field;

CREATE VIEW "public".v_availability_field_for_two_weeks AS  SELECT v.day,
    dp.id_dispo_and_price,
    dp.id_day,
    dp.start_time,
    dp.end_time,
    dp.id_field,
    dp.price
   FROM (dispo_and_price dp
     RIGHT JOIN v_next_two_weeks v ON (((dp.id_day)::numeric = (EXTRACT(dow FROM v.day) + (1)::numeric))))
  ORDER BY v.day, dp.id_field;

CREATE VIEW "public".v_client_adhesion_notification AS  SELECT an.id_admin_notification,
    an.id_type_notification,
    an.date_notification,
    an.etat,
    ca.id_client,
    c.first_name
   FROM ((admin_notification an
     JOIN client_adhesion_notification ca ON ((an.id_admin_notification = ca.id_admin_notification)))
     JOIN client c ON ((ca.id_client = c.id_client)));

CREATE VIEW "public".v_client_detailled AS  SELECT c.id_client,
    c.first_name,
    c.last_name,
    c.phone_number,
    c.mail,
    c.address,
    c.birth_date,
    c.pwd,
    c.id_status,
    sc.status,
    c.sign_up_date,
    c.id_cin
   FROM (client c
     JOIN status_client sc ON ((c.id_status = sc.id_status_client)));

CREATE VIEW "public".v_client_validation_notification AS  SELECT cn.id_client_notification,
    cn.id_client,
    cn.id_type_notification,
    cn.date_notification,
    cv.resultat,
    cn.etat
   FROM (client_notification cn
     JOIN client_validation cv ON ((cn.id_client_notification = cv.id_client_notification)));

CREATE VIEW "public".v_day_for_next_month AS  SELECT (generate_series((CURRENT_DATE)::timestamp without time zone, (CURRENT_DATE + '1 mon'::interval), '1 day'::interval))::date AS day;

CREATE VIEW "public".v_direct_reservation AS  SELECT r.id_direct_reservation,
    r.reservation_date,
    r.client_name,
    r.start_time,
    r.id_field,
    r.duration,
    (r.start_time + ('01:00:00'::interval * (r.duration)::double precision)) AS end_time
   FROM direct_reservation r;

CREATE VIEW "public".v_field_adhesion_notification AS  SELECT an.id_admin_notification,
    an.id_type_notification,
    an.date_notification,
    an.etat,
    fa.id_client,
    c.first_name,
    f.id_field,
    f.name
   FROM (((admin_notification an
     JOIN field_adhesion_notification fa ON ((an.id_admin_notification = fa.id_admin_notification)))
     JOIN client c ON ((fa.id_client = c.id_client)))
     JOIN field f ON ((fa.id_field = f.id_field)));

CREATE VIEW "public".v_field_detailled AS  SELECT f.id_field,
    f.id_category,
    c.category,
    c.subscribing_price,
    f.id_client,
    f.name,
    f.id_field_type,
    ft.field_type,
    f.id_infrastructure,
    inf.infrastructure,
    f.id_light,
    l.light,
    f.description,
    f.address,
    f.latitude,
    f.longitude,
    f.insert_date,
    f.field_files
   FROM ((((field f
     JOIN category c ON ((c.id_category = f.id_category)))
     JOIN field_type ft ON ((ft.id_field_type = f.id_field_type)))
     JOIN infrastructure inf ON ((inf.id_infrastructure = f.id_infrastructure)))
     JOIN light l ON ((l.id_light = f.id_light)));

CREATE VIEW "public".v_field_reservation_notification AS  SELECT cn.id_client_notification,
    cn.id_client,
    cn.id_type_notification,
    cn.date_notification,
    fr.id_user,
    u.first_name,
    fr.id_field,
    f.name,
    cn.etat
   FROM (((client_notification cn
     JOIN field_reservation_notification fr ON ((cn.id_client_notification = fr.id_client_notification)))
     JOIN field f ON ((fr.id_field = f.id_field)))
     JOIN users u ON ((u.id_users = fr.id_user)));

CREATE VIEW "public".v_field_subscription_notification AS  SELECT cn.id_client_notification,
    cn.id_client,
    cn.id_type_notification,
    cn.date_notification,
    fs.id_field,
    f.name,
    fs.month,
    cn.etat
   FROM ((client_notification cn
     JOIN field_subscription_notification fs ON ((cn.id_client_notification = fs.id_client_notification)))
     JOIN field f ON ((fs.id_field = f.id_field)))
  WHERE (((cn.date_notification >= now()) AND (cn.date_notification <= (now() + '10 days'::interval))) OR (cn.date_notification <= now()));

CREATE VIEW "public".v_field_validation_notification AS  SELECT cn.id_client_notification,
    cn.id_client,
    cn.id_type_notification,
    cn.date_notification,
    fv.id_field,
    f.name,
    fv.resultat,
    cn.etat
   FROM ((client_notification cn
     JOIN field_validation fv ON ((cn.id_client_notification = fv.id_client_notification)))
     JOIN field f ON ((fv.id_field = f.id_field)));

CREATE VIEW "public".v_info_field AS  SELECT field.id_field,
    field.name,
    category.category,
    category.subscribing_price,
    field_type.field_type,
    infrastructure.infrastructure,
    light.light,
    field.id_client,
    field.address,
    field.longitude,
    field.latitude,
    field.description
   FROM ((((field
     JOIN category ON ((field.id_category = category.id_category)))
     JOIN field_type ON ((field.id_field_type = field_type.id_field_type)))
     JOIN infrastructure ON ((field.id_infrastructure = infrastructure.id_infrastructure)))
     JOIN light ON ((field.id_light = light.id_light)));

CREATE VIEW "public".v_reservation_one_week AS  SELECT v_detailled_reservation.id_users,
    v_detailled_reservation.id_reservation,
    v_detailled_reservation.reservation_date,
    v_detailled_reservation.start,
    v_detailled_reservation.duration,
    v_detailled_reservation.state,
    v_detailled_reservation.price,
    v_detailled_reservation.first_name,
    v_detailled_reservation.last_name,
    v_detailled_reservation.birth_date,
    v_detailled_reservation.phone_number,
    v_detailled_reservation.mail,
    v_detailled_reservation.id_field,
    v_detailled_reservation.field_name,
    v_detailled_reservation.field_description,
    v_detailled_reservation.field_address
   FROM v_detailled_reservation
  WHERE ((v_detailled_reservation.reservation_date >= CURRENT_DATE) AND (v_detailled_reservation.reservation_date < (CURRENT_DATE + '7 days'::interval)));

CREATE VIEW "public".v_select_all_abonnement AS  SELECT f.name,
    c.category,
    cl.first_name AS client,
    c.subscribing_price AS price
   FROM ((field f
     JOIN category c ON ((c.id_category = f.id_category)))
     JOIN client cl ON ((cl.id_client = f.id_client)));

CREATE VIEW "public".v_select_all_from_abonnement AS  SELECT f.name,
    c.category,
    cl.first_name AS client,
    c.subscribing_price AS price,
    s.start_date,
    s.duration,
    (s.start_date + ('1 mon'::interval * (s.duration)::double precision)) AS end_date
   FROM ((((field f
     JOIN category c ON ((c.id_category = f.id_category)))
     JOIN client cl ON ((cl.id_client = f.id_client)))
     JOIN subscription s ON ((s.id_field = f.id_field)))
     JOIN subscription_state ss ON ((ss.id_subscription_state = s.id_subscription_state)));

CREATE VIEW "public".v_subscription_notification AS  SELECT an.id_admin_notification,
    an.id_type_notification,
    an.date_notification,
    an.etat,
    sp.id_client,
    c.first_name,
    f.id_field,
    f.name,
    sp.month
   FROM (((admin_notification an
     JOIN subscription_payement_notification sp ON ((an.id_admin_notification = sp.id_admin_notification)))
     JOIN client c ON ((sp.id_client = c.id_client)))
     JOIN field f ON ((sp.id_field = f.id_field)));

INSERT INTO "public".account_admin( id_account_admin, first_name, last_name, mail, phone_number, pwd ) VALUES ( 1, 'John', 'Doe', 'john@gmail.com', '+261 34 50 200 40', 'password123');
INSERT INTO "public".account_admin( id_account_admin, first_name, last_name, mail, phone_number, pwd ) VALUES ( 2, 'Jane', 'Smith', 'jane@gmail.com', '+261 33 80 741 51', 'password456');
INSERT INTO "public".account_admin( id_account_admin, first_name, last_name, mail, phone_number, pwd ) VALUES ( 3, 'Bob', 'Johnson', 'bob@gmail.com', '+261 32 87 540 52', 'password789');
INSERT INTO "public".category( id_category, category, subscribing_price, description, status ) VALUES ( 2, 'Basket', 20000, 'Besoin de plus petit, Voir ici les terrains foot à 7', 1);
INSERT INTO "public".category( id_category, category, subscribing_price, description, status ) VALUES ( 1, 'Foot à 11', 75000, 'Besoin de plus petit, Voir ici les terrains foot à 7', 1);
INSERT INTO "public".category( id_category, category, subscribing_price, description, status ) VALUES ( 3, 'Foot à 7', 50000, 'Besoin de plus petit, Voir ici les terrains foot à 7', 1);
INSERT INTO "public".category( id_category, category, subscribing_price, description, status ) VALUES ( 4, 'Tennis', 15000, null, 10);
INSERT INTO "public".cin( id_cin, cin_number, first_picture, second_picture ) VALUES ( 1, '117 231 421 552', 'client1_cin_picture1.png', 'client1_cin_picture2.png');
INSERT INTO "public".cin( id_cin, cin_number, first_picture, second_picture ) VALUES ( 2, '224 005 317 251', 'client2_cin_picture1.png', 'client2_cin_picture2.png');
INSERT INTO "public".cin( id_cin, cin_number, first_picture, second_picture ) VALUES ( 3, '119 105 250 300', 'client3_cin_picture1.png', 'client3_cin_picture2.png');
INSERT INTO "public".cin( id_cin, cin_number, first_picture, second_picture ) VALUES ( 13, '117 005 478 414', 'cin1-front.jpg', 'cin1-back.jpg');
INSERT INTO "public".cin( id_cin, cin_number, first_picture, second_picture ) VALUES ( 14, '117 005 478 415', 'cin2-front.jpg', 'cin2-back.jpg');
INSERT INTO "public".cin( id_cin, cin_number, first_picture, second_picture ) VALUES ( 15, '117 005 478 416', 'cin3-front.jpg', 'cin3-back.jpg');
INSERT INTO "public".cin( id_cin, cin_number, first_picture, second_picture ) VALUES ( 16, '117 005 478 417', 'cin4-front.jpg', 'cin4-back.jpg');
INSERT INTO "public".cin( id_cin, cin_number, first_picture, second_picture ) VALUES ( 17, '117 005 478 418', 'cin5-front.jpg', 'cin5-back.jpg');
INSERT INTO "public".cin( id_cin, cin_number, first_picture, second_picture ) VALUES ( 18, '117 005 478 419', 'cin6-front.jpg', 'cin6-back.jpg');
INSERT INTO "public".cin( id_cin, cin_number, first_picture, second_picture ) VALUES ( 19, '117 005 478 420', 'cin7-front.jpg', 'cin7-back.jpg');
INSERT INTO "public".cin( id_cin, cin_number, first_picture, second_picture ) VALUES ( 20, '117 005 478 421', 'cin8-front.jpg', 'cin8-back.jpg');
INSERT INTO "public".cin( id_cin, cin_number, first_picture, second_picture ) VALUES ( 21, '117 005 478 422', 'cin9-front.jpg', 'cin9-back.jpg');
INSERT INTO "public".cin( id_cin, cin_number, first_picture, second_picture ) VALUES ( 22, '117205108415', 'IMG-20220807-233148.jpg', 'IMG-20220807-233148.jpg');
INSERT INTO "public".cin( id_cin, cin_number, first_picture, second_picture ) VALUES ( 23, '12', 'IMG-20220807-233148.jpg', 'IMG-20220807-233148.jpg');
INSERT INTO "public".cin( id_cin, cin_number, first_picture, second_picture ) VALUES ( 24, '12', 'IMG-20220807-233148.jpg', 'IMG-20220807-233148.jpg');
INSERT INTO "public".cin( id_cin, cin_number, first_picture, second_picture ) VALUES ( 25, '12', 'IMG-20220807-233148.jpg', 'IMG-20220807-233148.jpg');
INSERT INTO "public".cin( id_cin, cin_number, first_picture, second_picture ) VALUES ( 26, '12', 'IMG-20220807-233148.jpg', 'IMG-20220807-233148.jpg');
INSERT INTO "public".cin( id_cin, cin_number, first_picture, second_picture ) VALUES ( 27, '12', 'IMG-20220807-233148.jpg', 'IMG-20220807-233148.jpg');
INSERT INTO "public".cin( id_cin, cin_number, first_picture, second_picture ) VALUES ( 28, '117031003744', 'foot-field.jpg', 'foot-field.jpg');
INSERT INTO "public".cin( id_cin, cin_number, first_picture, second_picture ) VALUES ( 29, '117031003744', 'foot-field.jpg', 'foot-field.jpg');
INSERT INTO "public".cin( id_cin, cin_number, first_picture, second_picture ) VALUES ( 30, '117031003744', 'ballpng.png', 'ballpng.png');
INSERT INTO "public".cin( id_cin, cin_number, first_picture, second_picture ) VALUES ( 31, '117031003744', 'ballpng.png', 'ballpng.png');
INSERT INTO "public".cin( id_cin, cin_number, first_picture, second_picture ) VALUES ( 32, '117031003744', 'ballpng.png', 'ballpng.png');
INSERT INTO "public".cin( id_cin, cin_number, first_picture, second_picture ) VALUES ( 33, '117525121', 'foot-field.jpg', 'foot-field.jpg');
INSERT INTO "public"."day"( id_day, "day" ) VALUES ( 1, 'Lundi');
INSERT INTO "public"."day"( id_day, "day" ) VALUES ( 2, 'Mardi');
INSERT INTO "public"."day"( id_day, "day" ) VALUES ( 3, 'Mercredi');
INSERT INTO "public"."day"( id_day, "day" ) VALUES ( 4, 'Jeudi');
INSERT INTO "public"."day"( id_day, "day" ) VALUES ( 5, 'Vendredi');
INSERT INTO "public"."day"( id_day, "day" ) VALUES ( 6, 'Samedi');
INSERT INTO "public"."day"( id_day, "day" ) VALUES ( 7, 'Dimanche');
INSERT INTO "public".field_type( id_field_type, field_type, status ) VALUES ( 3, 'Gazon', 1);
INSERT INTO "public".field_type( id_field_type, field_type, status ) VALUES ( 4, 'Terre', 1);
INSERT INTO "public".field_type( id_field_type, field_type, status ) VALUES ( 5, 'Tapis', 1);
INSERT INTO "public".field_type( id_field_type, field_type, status ) VALUES ( 6, 'Parquet', 1);
INSERT INTO "public".field_type( id_field_type, field_type, status ) VALUES ( 1, 'Goudron', 1);
INSERT INTO "public".field_type( id_field_type, field_type, status ) VALUES ( 2, 'Synthétique', 1);
INSERT INTO "public".field_type( id_field_type, field_type, status ) VALUES ( 7, '', 1);
INSERT INTO "public".infrastructure( id_infrastructure, infrastructure ) VALUES ( 1, 'Intérieur');
INSERT INTO "public".infrastructure( id_infrastructure, infrastructure ) VALUES ( 2, 'Extérieur');
INSERT INTO "public".light( id_light, light ) VALUES ( 1, 'Eclairé');
INSERT INTO "public".light( id_light, light ) VALUES ( 2, 'Non Eclairé');
INSERT INTO "public".status_client( id_status_client, status ) VALUES ( 1, 'Confirmé');
INSERT INTO "public".status_client( id_status_client, status ) VALUES ( 2, 'En attente');
INSERT INTO "public".status_client( id_status_client, status ) VALUES ( 3, 'refuse');
INSERT INTO "public".subscription_state( id_subscription_state, subscription_state, status ) VALUES ( 1, 'Payer', 1);
INSERT INTO "public".subscription_state( id_subscription_state, subscription_state, status ) VALUES ( 2, 'Non payer', 1);
INSERT INTO "public".type_notification( id_type_notification, type_notification ) VALUES ( 1, 'Rappel de r‚servation');
INSERT INTO "public".type_notification( id_type_notification, type_notification ) VALUES ( 2, 'Annulation r‚servation');
INSERT INTO "public".type_notification( id_type_notification, type_notification ) VALUES ( 10, 'Validation demande d'' adhesion');
INSERT INTO "public".type_notification( id_type_notification, type_notification ) VALUES ( 11, 'Validation demande d'' ajout de terrain');
INSERT INTO "public".type_notification( id_type_notification, type_notification ) VALUES ( 12, 'R‚servation d'' utilisateur');
INSERT INTO "public".type_notification( id_type_notification, type_notification ) VALUES ( 13, 'Rappel de payement d''abonnement');
INSERT INTO "public".type_notification( id_type_notification, type_notification ) VALUES ( 20, 'Demande d'' adhesion d''un client');
INSERT INTO "public".type_notification( id_type_notification, type_notification ) VALUES ( 21, 'Demande d'' ajout terrain');
INSERT INTO "public".type_notification( id_type_notification, type_notification ) VALUES ( 22, 'Payement d'' une abonnement');
INSERT INTO "public".type_picture( id_type_picture, type_picture ) VALUES ( 1, 'Profil');
INSERT INTO "public".type_picture( id_type_picture, type_picture ) VALUES ( 2, 'Secondaire');
INSERT INTO "public".users( id_users, first_name, last_name, birth_date, phone_number, mail, sign_up_date, pwd ) VALUES ( 1, 'Tiavina', 'Malalaniaina', '2004-07-08', '+261 32 66 131 80', 'tiavinaramia@gmail.com', '2023-06-08', 'tiavina');
INSERT INTO "public".users( id_users, first_name, last_name, birth_date, phone_number, mail, sign_up_date, pwd ) VALUES ( 2, 'Maela', 'ANDRIAMAHERY', '1998-05-06', '+261 34 564 84', 'maela@gmail.com', '2023-06-10', 'MLLLLL');
INSERT INTO "public".admin_notification( id_admin_notification, id_type_notification, date_notification, etat ) VALUES ( 1, 20, '2023-06-29 06:00:00 PM', 0);
INSERT INTO "public".admin_notification( id_admin_notification, id_type_notification, date_notification, etat ) VALUES ( 2, 21, '2023-06-29 06:00:00 PM', 0);
INSERT INTO "public".admin_notification( id_admin_notification, id_type_notification, date_notification, etat ) VALUES ( 3, 22, '2023-06-29 06:00:00 PM', 0);
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 2, 'Andry', 'ANDRIAMAMITIANA', '0341451743', 'andry123@gmail.com', 'Lot 3 bis Iavoloha', '1987-01-12', 'andry-andry', 1, '2023-04-23 12:00:00 AM', 2, null);
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 3, 'Fitia', 'MIAROTIA', '0331754393', 'fitiaMia@gmail.com', 'Lot IAV 416', '1998-07-05', 'fitia@@', 1, '2023-10-07 12:00:00 AM', 3, null);
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 4, 'Tiavina', 'Malalaniaina', '+261 32 66 131 80', 'tiavinaramia@gmail.com', 'Tanjombato Lot 3A 248', '2004-07-08', 'tiavina', 1, '2023-06-29 09:17:02 PM', 13, null);
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 5, 'Maela', 'ANDRIAMAHERY', '+261 32 87 451 17', 'maela.andriamahery@gmail.com', 'Besarety Lot 48 47', '2002-04-21', 'maela', 1, '2023-06-29 09:17:02 PM', 14, null);
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 6, 'Eric', 'MAHAFALY', '+261 32 90 502 01', 'eric.mahafaly@gmail.com', 'Besarety Lot 78 61', '2000-04-04', 'eric', 1, '2023-06-29 09:17:02 PM', 15, null);
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 7, 'Benjamina', 'RAMAROSON', '+261 34 04 591 02', 'benjaminaramaroson@gmail.com', 'Mandrimena Lot 45 80', '2001-05-19', 'benjamina', 1, '2023-06-29 09:17:02 PM', 16, null);
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 8, 'Mino', 'Fitahiana', '+261 34 05 845 10', 'mino@gmail.com', 'Andoharanofotsy Lot 10 20', '2002-08-08', 'mino', 1, '2023-06-29 09:17:02 PM', 17, null);
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 9, 'To', 'Mamiarilaza', '+261 34 25 456 84', 'tomamiarilaza@gmail.com', 'Mandrimena Lot 3A 451', '2023-07-07', 'to', 1, '2023-06-29 09:17:02 PM', 18, null);
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 10, 'Chalman', 'INSSA', '+261 34 45 999 12', 'chalmaninssa@gmail.com', 'Bevalala Lot 78 456', '2001-07-08', 'chalman', 1, '2023-06-29 09:17:02 PM', 19, null);
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 11, 'Fy', 'Michael', '+261 34 48 142 80', 'fymichael@gmail.com', 'Itaosy Lot 35 65', '2005-09-13', 'fy', 1, '2023-06-29 09:17:02 PM', 20, null);
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 20, 'Tiavina', 'Malalaniaina', '+261 32 66 131 80', 'tiavinaramia@gmail.com', 'Tanjombato Lot 3A 248', '2004-07-08', 'tiavina', 2, '2023-06-29 10:33:59 PM', 30, null);
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 21, 'Tiavina', 'Malalaniaina', '+261 32 66 131 80', 'tiavinaramia@gmail.com', 'Tanjombato Lot 3A 248', '2004-07-08', 'tiavina', 2, '2023-06-29 10:34:43 PM', 31, null);
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 22, 'Tiavina', 'Malalaniaina', '+261 32 66 131 80', 'tiavinaramia@gmail.com', 'Tanjombato Lot 3A 248', '2004-07-08', 'tiavina', 2, '2023-06-29 10:48:04 PM', 33, 'ballpng.png');
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 23, 'Tiavina', 'Malalaniaina', '+261 32 66 131 80', 'tiavinaramia@gmail.com', 'Tanjombato Lot 3A 248', '2004-07-08', 'tiavina', 2, '2023-06-29 10:48:22 PM', 33, 'ballpng.png');
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 24, 'Tiavina', 'Malalaniaina', '+261 32 66 131 80', 'tiavinaramia@gmail.com', 'Tanjombato Lot 3A 248', '2004-07-08', 'tiavina', 2, '2023-06-29 10:48:56 PM', 33, 'ballpng.png');
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 25, 'Tiavina', 'Malalaniaina', '+261 32 66 131 80', 'tiavinaramia@gmail.com', 'Tanjombato Lot 3A 248', '2004-07-08', 'tiavina', 2, '2023-06-29 10:49:05 PM', 33, 'ballpng.png');
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 26, 'Tiavina', 'Malalaniaina', '+261 32 66 131 80', 'tiavinaramia@gmail.com', 'Tanjombato Lot 3A 248', '2004-07-08', 'tiavina', 2, '2023-06-29 10:50:03 PM', 33, 'ballpng.png');
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 27, 'Tiavina', 'Malalaniaina', '+261 32 66 131 80', 'tiavinaramia@gmail.com', 'Tanjombato Lot 3A 248', '2004-07-08', 'tiavina', 2, '2023-06-29 10:52:26 PM', 33, 'ballpng.png');
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 28, 'Tiavina', 'Malalaniaina', '+261 32 66 131 80', 'tiavinaramia@gmail.com', 'Tanjombato Lot 3A 248', '2004-07-08', 'tiavina', 2, '2023-06-29 10:52:42 PM', 33, 'ballpng.png');
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 29, 'Tiavina', 'Malalaniaina', '+261 32 66 131 80', 'tiavinaramia@gmail.com', 'Tanjombato Lot 3A 248', '2004-07-08', 'tiavina', 2, '2023-06-29 10:58:48 PM', 33, 'ballpng.png');
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 30, 'Tiavina', 'Malalaniaina', '+261 32 66 131 80', 'tiavinaramia@gmail.com', 'Tanjombato Lot 3A 248', '2004-07-08', 'tiavina', 2, '2023-06-29 10:59:02 PM', 33, 'ballpng.png');
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 32, 'Tiavina', 'Malalaniaina', '+261 32 66 131 80', 'tiavinaramia@gmail.com', 'Tanjombato Lot 3A 248', '2004-07-08', 'tiavina', 2, '2023-06-29 11:01:35 PM', 33, 'ballpng.png');
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 33, 'Tiavina', 'Malalaniaina', '+261 32 66 131 80', 'tiavinaramia@gmail.com', 'Tanjombato Lot 3A 248', '2004-07-08', 'tiavina', 2, '2023-06-29 11:01:41 PM', 33, 'ballpng.png');
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 1, 'John', 'RAKOTOARISOA', '0321531728', 'john.rakoto@gmail.com', 'Antananarivo', '2000-11-24', 'john1234', 1, '2023-01-15 12:00:00 AM', 1, '0.jpg');
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 19, 'Tiavina', 'Malalaniaina', '+261 32 66 131 80', 'tiavinaramia@gmail.com', 'Tanjombato Lot 3A 248', '2004-07-08', 'tiavina', 1, '2023-06-29 10:32:51 PM', 29, null);
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 12, 'Tiavina', 'Malalaniaina', '+261 32 66 131 80', 'tiavinaramia@gmail.com', 'Tanjombato Lot 3A 248', '2004-07-08', 'tiavina', 1, '2023-06-29 10:11:40 PM', 22, null);
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 31, 'Tiavina', 'Malalaniaina', '+261 32 66 131 80', 'tiavinaramia@gmail.com', 'Tanjombato Lot 3A 248', '2004-07-08', 'tiavina', 1, '2023-06-29 10:59:27 PM', 33, 'ballpng.png');
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 13, 'Tiavina', 'Malalaniaina', '+261 32 66 131 80', 'tiavinaramia@gmail.com', 'Tanjombato Lot 3A 248', '2004-07-08', 'tiavina', 1, '2023-06-29 10:21:34 PM', 23, null);
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 14, 'Tiavina', 'Malalaniaina', '+261 32 66 131 80', 'tiavinaramia@gmail.com', 'Tanjombato Lot 3A 248', '2004-07-08', 'tiavina', 1, '2023-06-29 10:23:41 PM', 24, null);
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 15, 'Tiavina', 'Malalaniaina', '+261 32 66 131 80', 'tiavinaramia@gmail.com', 'Tanjombato Lot 3A 248', '2004-07-08', 'tiavina', 1, '2023-06-29 10:27:06 PM', 25, null);
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 16, 'Tiavina', 'Malalaniaina', '+261 32 66 131 80', 'tiavinaramia@gmail.com', 'Tanjombato Lot 3A 248', '2004-07-08', 'tiavina', 3, '2023-06-29 10:27:52 PM', 26, null);
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 17, 'Tiavina', 'Malalaniaina', '+261 32 66 131 80', 'tiavinaramia@gmail.com', 'Tanjombato Lot 3A 248', '2004-07-08', 'tiavina', 3, '2023-06-29 10:28:21 PM', 27, null);
INSERT INTO "public".client( id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, sign_up_date, id_cin, customer_picture ) VALUES ( 18, 'Tiavina', 'Malalaniaina', '+261 32 66 131 80', 'tiavinaramia@gmail.com', 'Tanjombato Lot 3A 248', '2004-07-08', 'tiavina', 1, '2023-06-29 10:32:35 PM', 28, null);
INSERT INTO "public".client_adhesion_notification( id_admin_notification, id_client ) VALUES ( 1, 1);
INSERT INTO "public".client_notification( id_client_notification, id_client, id_type_notification, date_notification, etat ) VALUES ( 1, 1, 10, '2023-06-28 08:00:00 AM', 0);
INSERT INTO "public".client_notification( id_client_notification, id_client, id_type_notification, date_notification, etat ) VALUES ( 2, 1, 11, '2023-06-28 08:00:00 AM', 0);
INSERT INTO "public".client_notification( id_client_notification, id_client, id_type_notification, date_notification, etat ) VALUES ( 3, 1, 12, '2023-06-28 12:00:00 PM', 0);
INSERT INTO "public".client_notification( id_client_notification, id_client, id_type_notification, date_notification, etat ) VALUES ( 4, 1, 12, '2023-06-28 04:00:00 PM', 0);
INSERT INTO "public".client_notification( id_client_notification, id_client, id_type_notification, date_notification, etat ) VALUES ( 5, 1, 13, '2023-06-28 06:00:00 PM', 0);
INSERT INTO "public".client_validation( id_client_notification, resultat ) VALUES ( 1, 1);
INSERT INTO "public".field( id_field, id_category, id_client, name, id_field_type, id_infrastructure, id_light, description, address, latitude, longitude, insert_date, field_files, "state" ) VALUES ( 1, 2, 1, 'Basket Betongolo', 1, 2, 2, 'Terrain fait pour tous et libre a tous', 'Betongolo Antananarivo', -18.904924, 47.541774, '2023-02-20', 'Field_Files/1/Proprio.zip', 1);
INSERT INTO "public".field( id_field, id_category, id_client, name, id_field_type, id_infrastructure, id_light, description, address, latitude, longitude, insert_date, field_files, "state" ) VALUES ( 2, 2, 2, 'Terrain Antsahamasina', 1, 2, 2, 'Terrain approprier au entrainement de club', '3FW9+J8M, Antananarivo', -18.903418, 47.468301, '2023-01-14', 'Field_Files/2/Proprio.zip', 1);
INSERT INTO "public".field( id_field, id_category, id_client, name, id_field_type, id_infrastructure, id_light, description, address, latitude, longitude, insert_date, field_files, "state" ) VALUES ( 3, 3, 2, 'Foot Elgeco plus', 1, 2, 2, 'Terrain synthetique et bien eclaire pour vous', '3FW9+J8M, Antananarivo', -18.904924, 47.541774, '2023-01-09', 'Field_Files/3/Proprio.zip', 1);
INSERT INTO "public".field( id_field, id_category, id_client, name, id_field_type, id_infrastructure, id_light, description, address, latitude, longitude, insert_date, field_files, "state" ) VALUES ( 4, 1, 3, 'Foot Domaine Alasora', 1, 2, 2, 'Terrain approprier au entrainement de club', '3FW9+J8M, Antananarivo', -18.904924, 47.541774, '2023-03-27', 'Field_Files/4/Proprio.zip', 1);
INSERT INTO "public".field( id_field, id_category, id_client, name, id_field_type, id_infrastructure, id_light, description, address, latitude, longitude, insert_date, field_files, "state" ) VALUES ( 5, 2, 1, 'Pompier Tanjombato', 1, 2, 2, '', 'EPP Tanjombato, N 7, Tanjombato, Antananarivo, Analamanga, Province d’Antananarivo, 102, Madagascar', -18.957892, 47.528189, '2023-06-29', 'imageFileField_1688064844_png', 1);
INSERT INTO "public".field( id_field, id_category, id_client, name, id_field_type, id_infrastructure, id_light, description, address, latitude, longitude, insert_date, field_files, "state" ) VALUES ( 6, 1, 1, 'Tiavina terrain', 1, 1, 1, '', 'Bevalala, Ankadirano, Analamanga, Province d’Antananarivo, 102, Madagascar', -18.976719, 47.515712, '2023-06-30', 'imageFileField_1688115784_png', 1);
INSERT INTO "public".field( id_field, id_category, id_client, name, id_field_type, id_infrastructure, id_light, description, address, latitude, longitude, insert_date, field_files, "state" ) VALUES ( 7, 1, 1, 'Pompier Tanjombato', 1, 1, 2, '', 'Pompier, N 7, Tanjombato, Antananarivo, Analamanga, Province d’Antananarivo, 102, Madagascar', -18.955355, 47.527227, '2023-06-30', 'imageFileField_1688116085_jpg', 3);
INSERT INTO "public".field_adhesion_notification( id_admin_notification, id_client, id_field ) VALUES ( 2, 2, 3);
INSERT INTO "public".field_reservation_notification( id_client_notification, id_user, id_field ) VALUES ( 3, 2, 3);
INSERT INTO "public".field_reservation_notification( id_client_notification, id_user, id_field ) VALUES ( 4, 1, 1);
INSERT INTO "public".field_subscription_notification( id_client_notification, id_field, "month" ) VALUES ( 5, 1, 6);
INSERT INTO "public".field_validation( id_client_notification, id_field, resultat ) VALUES ( 2, 4, 1);
INSERT INTO "public".picture( id_picture, picture, id_type_picture, id_field ) VALUES ( 1, 'Terrain1.jpg', 1, 1);
INSERT INTO "public".picture( id_picture, picture, id_type_picture, id_field ) VALUES ( 2, 'Terrain2.jpg', 1, 2);
INSERT INTO "public".picture( id_picture, picture, id_type_picture, id_field ) VALUES ( 3, 'Terrain3.jpg', 2, 3);
INSERT INTO "public".picture( id_picture, picture, id_type_picture, id_field ) VALUES ( 4, 'Terrain4.jpg', 2, 4);
INSERT INTO "public".picture( id_picture, picture, id_type_picture, id_field ) VALUES ( 6, 'terrainInconnu.jpg', 2, 5);
INSERT INTO "public".picture( id_picture, picture, id_type_picture, id_field ) VALUES ( 7, 'terrainInconnu.jpg', 2, 5);
INSERT INTO "public".picture( id_picture, picture, id_type_picture, id_field ) VALUES ( 8, 'terrainInconnu.jpg', 2, 5);
INSERT INTO "public".picture( id_picture, picture, id_type_picture, id_field ) VALUES ( 5, 'picField_1688064876_png', 1, 5);
INSERT INTO "public".picture( id_picture, picture, id_type_picture, id_field ) VALUES ( 9, 'terrainInconnu.jpg', 1, 7);
INSERT INTO "public".picture( id_picture, picture, id_type_picture, id_field ) VALUES ( 10, 'terrainInconnu.jpg', 2, 7);
INSERT INTO "public".picture( id_picture, picture, id_type_picture, id_field ) VALUES ( 11, 'terrainInconnu.jpg', 2, 7);
INSERT INTO "public".picture( id_picture, picture, id_type_picture, id_field ) VALUES ( 12, 'terrainInconnu.jpg', 2, 7);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 6, '2023-06-20', 1, '09:00:00', 1, 2, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 7, '2023-05-20', 1, '09:00:00', 1, 2, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 9, '2023-06-20', 2, '11:00:00', 1, 3, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 10, '2023-06-10', 1, '10:00:00', 1, 5, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 11, '2023-06-14', 1, '14:00:00', 1, 5, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 12, '2023-06-15', 1, '06:00:00', 1, 1, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 13, '2023-06-16', 1, '15:00:00', 1, 2, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 14, '2023-06-21', 1, '05:00:00', 1, 2, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 15, '2023-06-18', 1, '10:00:00', 1, 3, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 16, '2023-06-18', 2, '10:00:00', 1, 5, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 17, '2023-06-21', 2, '10:00:00', 3, 5, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 18, '2023-06-21', 2, '10:00:00', 4, 2, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 19, '2023-06-22', 2, '10:00:00', 1, 2, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 20, '2023-06-28', 1, '10:00:00', 3, 5, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 21, '2023-06-30', 1, '10:00:00', 1, 5, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 22, '2023-06-30', 1, '16:00:00', 1, 2, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 23, '2023-07-01', 1, '10:00:00', 4, 2, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 24, '2023-06-30', 2, '10:00:00', 1, 2, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 25, '2023-07-03', 2, '05:00:00', 3, 2, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 26, '2023-06-30', 2, '10:00:00', 3, 2, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 27, '2023-07-10', 1, '05:00:00', 4, 2, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 38, '2023-07-08', 1, '10:00:00', 6, 2, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 39, '2023-07-02', 1, '10:00:00', 1, 5, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 40, '2023-07-02', 1, '10:00:00', 1, 2, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 41, '2023-07-02', 1, '11:00:00', 3, 2, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 42, '2023-07-01', 1, '08:00:00', 5, 5, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 43, '2023-07-02', 1, '04:00:00', 6, 4, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 44, '2023-07-04', 1, '09:00:00', 6, 4, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 45, '2023-07-07', 1, '10:00:00', 4, 2, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 46, '2023-07-10', 1, '09:00:00', 4, 1, 50000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 47, '2023-07-12', 1, '10:00:00', 1, 2, 60000.0, 1);
INSERT INTO "public".reservation( id_reservation, reservation_date, id_users, start_time, id_field, duration, price, "state" ) VALUES ( 48, '2023-08-07', 1, '15:00:00', 1, 2, 60000.0, 1);
INSERT INTO "public".subscription( id_subscription, id_field, subscription_date, start_date, duration, id_subscription_state ) VALUES ( 1, 1, '2023-06-07', '2023-06-06', 1, 1);
INSERT INTO "public".subscription( id_subscription, id_field, subscription_date, start_date, duration, id_subscription_state ) VALUES ( 2, 2, '2023-06-07', '2023-06-06', 2, 1);
INSERT INTO "public".subscription( id_subscription, id_field, subscription_date, start_date, duration, id_subscription_state ) VALUES ( 3, 3, '2023-06-07', '2023-06-06', 1, 1);
INSERT INTO "public".subscription( id_subscription, id_field, subscription_date, start_date, duration, id_subscription_state ) VALUES ( 4, 4, '2023-06-07', '2023-06-06', 1, 1);
INSERT INTO "public".subscription_payement_notification( id_admin_notification, id_client, id_field, "month" ) VALUES ( 3, 3, 1, 7);
INSERT INTO "public".unavailability( id_unavailability, id_field, unavailability_date, start_time, end_time ) VALUES ( 1, 1, '2023-03-07', '14:00:00', '16:00:00');
INSERT INTO "public".unavailability( id_unavailability, id_field, unavailability_date, start_time, end_time ) VALUES ( 3, 3, '2023-03-07', '14:00:00', '16:00:00');
INSERT INTO "public".direct_reservation( id_direct_reservation, client_name, phone_number_client, reservation_date, start_time, id_field, duration ) VALUES ( 1, 'Feno', '0331854735', '2023-06-12', '08:00:00', 1, 1);
INSERT INTO "public".direct_reservation( id_direct_reservation, client_name, phone_number_client, reservation_date, start_time, id_field, duration ) VALUES ( 2, 'Zoky andry', '0328254518', '2023-06-10', '18:30:00', 1, 3);
INSERT INTO "public".direct_reservation( id_direct_reservation, client_name, phone_number_client, reservation_date, start_time, id_field, duration ) VALUES ( 3, 'Tiavina', '+261 32 66 131 80', '2023-06-21', '10:00:00', 4, 2);
INSERT INTO "public".direct_reservation( id_direct_reservation, client_name, phone_number_client, reservation_date, start_time, id_field, duration ) VALUES ( 4, 'Tiavina', '+261 32 66 131 80', '2023-06-30', '10:00:00', 5, 1);
INSERT INTO "public".direct_reservation( id_direct_reservation, client_name, phone_number_client, reservation_date, start_time, id_field, duration ) VALUES ( 5, 'Tiavina', '+261 32 66 131 80', '2023-06-30', '10:00:00', 5, 1);
INSERT INTO "public".discount( id_discount, id_field, "start", "end", discount ) VALUES ( 1, 1, '2023-06-06', '2023-06-10', 20);
INSERT INTO "public".discount( id_discount, id_field, "start", "end", discount ) VALUES ( 2, 4, '2023-06-16', '2023-06-20', 10);
INSERT INTO "public".dispo_and_price( id_dispo_and_price, id_day, start_time, end_time, id_field, price ) VALUES ( 1, 1, '08:00:00', '19:00:00', 1, 30000);
INSERT INTO "public".dispo_and_price( id_dispo_and_price, id_day, start_time, end_time, id_field, price ) VALUES ( 2, 2, '08:00:00', '19:00:00', 1, 30000);
INSERT INTO "public".dispo_and_price( id_dispo_and_price, id_day, start_time, end_time, id_field, price ) VALUES ( 3, 3, '08:00:00', '19:00:00', 1, 30000);
INSERT INTO "public".dispo_and_price( id_dispo_and_price, id_day, start_time, end_time, id_field, price ) VALUES ( 4, 4, '08:00:00', '19:00:00', 1, 30000);
INSERT INTO "public".dispo_and_price( id_dispo_and_price, id_day, start_time, end_time, id_field, price ) VALUES ( 5, 5, '08:00:00', '19:00:00', 1, 30000);
INSERT INTO "public".dispo_and_price( id_dispo_and_price, id_day, start_time, end_time, id_field, price ) VALUES ( 6, 3, '12:00:00', '19:30:00', 2, 28000);
INSERT INTO "public".dispo_and_price( id_dispo_and_price, id_day, start_time, end_time, id_field, price ) VALUES ( 7, 5, '08:00:00', '19:00:00', 2, 28000);
INSERT INTO "public".dispo_and_price( id_dispo_and_price, id_day, start_time, end_time, id_field, price ) VALUES ( 8, 6, '08:00:00', '20:00:00', 2, 30000);
INSERT INTO "public".dispo_and_price( id_dispo_and_price, id_day, start_time, end_time, id_field, price ) VALUES ( 9, 7, '14:00:00', '18:00:00', 2, 35000);
INSERT INTO "public".dispo_and_price( id_dispo_and_price, id_day, start_time, end_time, id_field, price ) VALUES ( 10, 1, '09:00:00', '12:00:00', 3, 50000);
INSERT INTO "public".dispo_and_price( id_dispo_and_price, id_day, start_time, end_time, id_field, price ) VALUES ( 11, 2, '08:00:00', '18:00:00', 3, 50000);
INSERT INTO "public".dispo_and_price( id_dispo_and_price, id_day, start_time, end_time, id_field, price ) VALUES ( 12, 3, '08:00:00', '12:00:00', 3, 50000);
INSERT INTO "public".dispo_and_price( id_dispo_and_price, id_day, start_time, end_time, id_field, price ) VALUES ( 13, 3, '12:00:00', '20:00:00', 3, 65000);
INSERT INTO "public".dispo_and_price( id_dispo_and_price, id_day, start_time, end_time, id_field, price ) VALUES ( 14, 4, '08:00:00', '19:00:00', 3, 60000);
INSERT INTO "public".dispo_and_price( id_dispo_and_price, id_day, start_time, end_time, id_field, price ) VALUES ( 15, 5, '08:00:00', '18:00:00', 3, 60000);
INSERT INTO "public".dispo_and_price( id_dispo_and_price, id_day, start_time, end_time, id_field, price ) VALUES ( 16, 5, '18:00:01', '22:00:00', 3, 80000);
INSERT INTO "public".dispo_and_price( id_dispo_and_price, id_day, start_time, end_time, id_field, price ) VALUES ( 17, 6, '05:00:00', '18:00:00', 3, 60000);
INSERT INTO "public".dispo_and_price( id_dispo_and_price, id_day, start_time, end_time, id_field, price ) VALUES ( 18, 6, '18:00:01', '22:00:00', 3, 65000);
INSERT INTO "public".dispo_and_price( id_dispo_and_price, id_day, start_time, end_time, id_field, price ) VALUES ( 19, 7, '14:00:00', '18:00:00', 3, 60000);
INSERT INTO "public".dispo_and_price( id_dispo_and_price, id_day, start_time, end_time, id_field, price ) VALUES ( 20, 1, '08:00:00', '18:00:00', 4, 40000);
INSERT INTO "public".dispo_and_price( id_dispo_and_price, id_day, start_time, end_time, id_field, price ) VALUES ( 21, 2, '08:00:00', '18:00:00', 4, 40000);
INSERT INTO "public".dispo_and_price( id_dispo_and_price, id_day, start_time, end_time, id_field, price ) VALUES ( 22, 3, '08:00:00', '18:00:00', 4, 40000);
INSERT INTO "public".dispo_and_price( id_dispo_and_price, id_day, start_time, end_time, id_field, price ) VALUES ( 23, 5, '08:00:00', '19:00:00', 4, 50000);
INSERT INTO "public".dispo_and_price( id_dispo_and_price, id_day, start_time, end_time, id_field, price ) VALUES ( 24, 6, '05:00:00', '20:00:00', 4, 50000);
INSERT INTO "public".dispo_and_price( id_dispo_and_price, id_day, start_time, end_time, id_field, price ) VALUES ( 25, 1, '20:00:00', '23:00:00', 1, 50000);
