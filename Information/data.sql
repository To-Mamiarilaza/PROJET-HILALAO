CREATE SEQUENCE "public".abonnement_notification_id_abonnement_notification_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".abonnement_state_id_abonnement_state_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".account_admin_id_account_admin_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".category_id_category_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".cin_id_cin_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".client_id_client_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".day_id_day_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".direct_reservation_id_direct_reservation_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".discount2_id_discount_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".discount_id_discount_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".dispo_and_price_id_dispo_and_price_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".field_id_field_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".field_type_id_field_type_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".infrastruture_id_infrastructure_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".light_id_light_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".picture_id_picture_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".reservation_id_reservation_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".status_client_id_status_client_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".subscription2_id_subscription_seq START WITH 1 INCREMENT BY 1;

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
	CONSTRAINT pk_abonnement_state PRIMARY KEY ( id_subscription_state )
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
	CONSTRAINT pk_client PRIMARY KEY ( id_client ),
	CONSTRAINT fk_client_cin FOREIGN KEY ( id_cin ) REFERENCES "public".cin( id_cin )   ,
	CONSTRAINT fk_client_status_client FOREIGN KEY ( id_status ) REFERENCES "public".status_client( id_status_client )   
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
	CONSTRAINT pk_field PRIMARY KEY ( id_field ),
	CONSTRAINT fk_field_category FOREIGN KEY ( id_category ) REFERENCES "public".category( id_category )   ,
	CONSTRAINT fk_field_client FOREIGN KEY ( id_client ) REFERENCES "public".client( id_client )   ,
	CONSTRAINT fk_field_field_type FOREIGN KEY ( id_field_type ) REFERENCES "public".field_type( id_field_type )   ,
	CONSTRAINT fk_field_infrastruture FOREIGN KEY ( id_infrastructure ) REFERENCES "public".infrastructure( id_infrastructure )   ,
	CONSTRAINT fk_field_light FOREIGN KEY ( id_light ) REFERENCES "public".light( id_light )   
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


-- view BO
create view v_select_all_abonnement as
select f.name, c.category, cl.first_name as client, c.subscribing_price as price
from field f
join category c on c.id_category = f.id_category
join client cl on cl.id_client = f.id_client

CREATE VIEW v_select_all_from_abonnement as
select f.name, c.category, cl.first_name as client, c.subscribing_price as price,  start_date, duration, start_date + INTERVAL '1 month' * duration AS end_date 
from field f
join category c on c.id_category = f.id_category
join client cl on cl.id_client = f.id_client
join subscription s on s.id_field = f.id_field
join subscription_state ss on ss.id_subscription_state = s.id_subscription_state

select f.name, c.category, cl.first_name as client, c.subscribing_price as price,  start_date, duration, start_date + INTERVAL '1 month' * duration AS end_date 
from field f
join category c on c.id_category = f.id_category
join client cl on cl.id_client = f.id_client
join subscription s on s.id_field = f.id_field
join subscription_state ss on ss.id_subscription_state = s.id_subscription_state
where start_date <= DATE('06-06-2023') and  (start_date + INTERVAL '1 month' * duration) >= DATE('06-06-2023')