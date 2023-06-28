CREATE SCHEMA IF NOT EXISTS "public";

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
    v_reservation_detailled.end_time
   FROM v_reservation_detailled
  WHERE (v_reservation_detailled.reservation_date > CURRENT_DATE);

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

CREATE VIEW "public".v_day_for_next_month AS  SELECT (generate_series((CURRENT_DATE)::timestamp without time zone, (CURRENT_DATE + '1 mon'::interval), '1 day'::interval))::date AS day;

CREATE VIEW "public".v_direct_reservation AS  SELECT r.id_direct_reservation,
    r.reservation_date,
    r.client_name,
    r.start_time,
    r.id_field,
    r.duration,
    (r.start_time + ('01:00:00'::interval * (r.duration)::double precision)) AS end_time
   FROM direct_reservation r;

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

CREATE VIEW "public".v_info_field AS  SELECT field.id_field,
    field.name,
    category.category,
    field_type.field_type,
    infrastructure.infrastructure,
    light.light,
    field.address,
    field.longitude,
    field.latitude,
    field.description
   FROM ((((field
     JOIN category ON ((field.id_category = category.id_category)))
     JOIN field_type ON ((field.id_field_type = field_type.id_field_type)))
     JOIN infrastructure ON ((field.id_infrastructure = infrastructure.id_infrastructure)))
     JOIN light ON ((field.id_light = light.id_light)));

CREATE VIEW "public".v_next_two_weeks AS  SELECT (generate_series((CURRENT_DATE)::timestamp without time zone, (CURRENT_DATE + '14 days'::interval), '1 day'::interval))::date AS day;

CREATE VIEW "public".v_reservation_detailled AS  SELECT r.id_reservation,
    r.reservation_date,
    r.id_users,
    r.start_time,
    r.id_field,
    r.duration,
    (r.start_time + ('01:00:00'::interval * (r.duration)::double precision)) AS end_time
   FROM reservation r;

