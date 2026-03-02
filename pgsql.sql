drop sequence if exists  user_id_seq cascade;
drop sequence if exists  menu_id_seq cascade;
drop sequence if exists rating_id_seq cascade;
drop sequence if exists country_id_seq cascade;
drop sequence if exists region_id_seq cascade;
drop sequence if exists city_id_seq cascade;
drop sequence if exists street_id_seq cascade;
drop sequence if exists review_id_seq cascade;
drop sequence if exists products_id_seq cascade;
drop sequence if exists groups_id_seq cascade;
drop sequence if exists roles_id_seq cascade;
drop sequence if exists category_id_seq cascade;
drop sequence if exists category_type_id_seq cascade;
drop sequence if exists brands_id_seq cascade;
drop sequence if exists files_id_seq cascade;
drop sequence if exists orders_id_seq cascade;
drop sequence if exists manufacturers_id_seq cascade;
drop sequence if exists payment_types_id_seq cascade;
drop sequence if exists product_leftovers_id_seq cascade;
drop sequence if exists user_files_id_seq cascade;
drop sequence if exists file_types_id_seq cascade;
drop sequence if exists products_colors_group_id_seq cascade;
drop sequence if exists stocks_id_seq cascade;
drop sequence if exists addresses_id_seq cascade;
drop sequence if exists metro_id_seq cascade;
drop sequence if exists delivery_types_id_seq cascade;
drop sequence if exists products_prices_id_seq cascade;



drop sequence if exists price_history_id_seq cascade;
drop sequence if exists products_weight_group_id_seq cascade;
drop sequence if exists products_ingredients_id_seq cascade;
drop sequence if exists delivery_id_seq cascade;
drop sequence if exists delivery_status_id_seq cascade;

drop sequence if exists menu_id_seq cascade;
drop sequence if exists prices_id_seq cascade;
drop sequence if exists products_ballance_id_seq cascade;
drop sequence if exists product_item_prices_id_seq cascade;
drop sequence if exists product_files_id_seq cascade;

drop sequence if exists manufacturer_id_seq cascade;
drop sequence if exists settings_id_seq cascade;
drop sequence if exists ingredients_id_seq cascade;
drop sequence if exists packaging_type_id_seq cascade;
drop sequence if exists products_packaging_type_id_seq cascade;
drop sequence if exists cart_id_seq cascade;
drop sequence if exists colors_id_seq cascade;
drop sequence if exists products_colors_id_seq cascade;

drop sequence if exists  units_id_seq  cascade;




drop table if exists products_prices;
drop table if exists users;
drop table if exists units;
drop table if exists products_colors;
drop table if exists products_color_group;


drop table if exists products_ingredients;
drop table if exists products_packaging_type;
drop table if exists products_packaging_type;
drop table if exists settings;
drop table if exists category_type;
drop table if exists products;
drop table if exists brands;
drop table if exists groups;
drop table if exists rating;
drop table if exists city;
drop table if exists category;
drop table if exists country;
drop table if exists region;
drop table if exists street;
drop table if exists sessions;
drop table if exists price_history;
drop table if exists manufacturers;
drop table if exists delivery;
drop table if exists delivery_type;
drop table if exists review;
drop table if exists payment_types;
drop table if exists roles;
drop table if exists product_leftovers;
drop table if exists files;
drop table if exists  delivery_status;
drop table if exists orders;
drop table if exists menu;
drop table if exists user_files ;
drop table if exists file_types ;
drop table if exists product_files ;
drop table if exists product_item_prices ;
drop table if exists prices;
drop table if exists products_ballance;
drop table if exists products_weight_group;
drop table if exists packaging_type;
drop table if exists ingredients;
drop table if exists cart;
drop table if exists colors;
drop table if exists addresses;
drop table if exists stocks;

drop table if exists addresses;
drop table if exists metro;
drop table if exists delivery_types;





create sequence cart_id_seq;

create table cart(
   id integer NOT NULL DEFAULT nextval('cart_id_seq'::regclass),
   name character varying(255) NOT NULL,
   show integer null,
   constraint pk_cart primary key (id)
);


ALTER SEQUENCE cart_id_seq OWNED BY cart.id;
ALTER SEQUENCE cart_id_seq RESTART WITH 1;

create sequence packaging_type_id_seq;

create table packaging_type(
   id integer NOT NULL DEFAULT nextval('packaging_type_id_seq'::regclass),
   name character varying(255) NOT NULL,
   show integer null,
   constraint pk_packaging_type primary key (id)
);

INSERT INTO packaging_type VALUES (1, 'Tetra Pak', 1);
INSERT INTO packaging_type VALUES (2, 'Банка', 1);
INSERT INTO packaging_type VALUES (3, 'Ламистер', 1);
INSERT INTO packaging_type VALUES (4, 'Паучи', 1);


ALTER SEQUENCE packaging_type_id_seq OWNED BY packaging_type.id;
ALTER SEQUENCE packaging_type_id_seq RESTART WITH 4;


create sequence ingredients_id_seq;

create table ingredients (
   id integer NOT NULL DEFAULT nextval('ingredients_id_seq'::regclass),
   name character varying(255) NOT NULL,
   show integer null,
   constraint pk_ingredients primary key (id)
);

INSERT INTO ingredients VALUES (1, 'Говядина', 1);
INSERT INTO ingredients VALUES (2, 'Гречка', 1);
INSERT INTO ingredients VALUES (3, 'Гусь', 1);
INSERT INTO ingredients VALUES (4, 'Индейка', 1);
INSERT INTO ingredients VALUES (5, 'Кабан', 1);
INSERT INTO ingredients VALUES (6, 'Картофель', 1);
INSERT INTO ingredients VALUES (7, 'Кролик', 1);
INSERT INTO ingredients VALUES (8, 'Кукуруза, пшеница', 1);
INSERT INTO ingredients VALUES (9, 'Курица', 1);
INSERT INTO ingredients VALUES (10, 'Лапша', 1);
INSERT INTO ingredients VALUES (11, 'Лосось, семга, форель', 1);
INSERT INTO ingredients VALUES (12, 'Молоко, сыр, творог', 1);
INSERT INTO ingredients VALUES (13, 'Морковь', 1);
INSERT INTO ingredients VALUES (14, 'Мясной коктейль', 1);
INSERT INTO ingredients VALUES (15, 'Овсянка', 1);
INSERT INTO ingredients VALUES (16, 'Олень, лось', 1);
INSERT INTO ingredients VALUES (17, 'Печень', 1);
INSERT INTO ingredients VALUES (18, 'Птица', 1);
INSERT INTO ingredients VALUES (19, 'Рис белый', 1);
INSERT INTO ingredients VALUES (20, 'Рис коричневый', 1);
INSERT INTO ingredients VALUES (21, 'Рыба / морепродукты', 1);
INSERT INTO ingredients VALUES (22, 'Свинина', 1);
INSERT INTO ingredients VALUES (23, 'Сердце', 1);
INSERT INTO ingredients VALUES (24, 'Соя', 1);
INSERT INTO ingredients VALUES (25, 'Телятина', 1);
INSERT INTO ingredients VALUES (26, 'Тунец', 1);
INSERT INTO ingredients VALUES (27, 'Утка', 1);
INSERT INTO ingredients VALUES (28, 'Яблоко', 1);
INSERT INTO ingredients VALUES (29, 'Ягненок', 1);
INSERT INTO ingredients VALUES (30, 'Яйцо', 1);
INSERT INTO ingredients VALUES (31, 'Ячмень', 1);


ALTER SEQUENCE ingredients_id_seq OWNED BY ingredients.id;
ALTER SEQUENCE ingredients_id_seq RESTART WITH 4;


-- get_smallpackage_pre_sql
-- get_schema_create

create sequence user_id_seq;
CREATE TABLE users (
    id integer NOT NULL DEFAULT nextval('user_id_seq'::regclass) ,
    username character varying(255) NOT NULL,
    auth_key character varying(255) NOT NULL,
    password_hash character varying(255) NOT NULL,
    password_reset_token character varying(255),
    email character varying(255) NOT NULL,
    phones character varying(255),
    status smallint NOT NULL DEFAULT 10,
    rememberMe integer,
    created_at integer NOT NULL,
    updated_at integer NOT NULL,
    verification_token character varying(255) ,
    CONSTRAINT users_pkey PRIMARY KEY (id),
    CONSTRAINT users_email_key UNIQUE (email),
    CONSTRAINT users_phone_key UNIQUE (phones),
    CONSTRAINT users_password_reset_token_key UNIQUE (password_reset_token),
    CONSTRAINT users_username_key UNIQUE (username)
);

INSERT INTO users VALUES (1, 'admin', '0oy2TPoNQ62KtO1MGtoAEhsG8BHoiZF2', '$2y$13$jUXoBNiwCspnBSsdAw89TezrzKRZm/yU1ds9zEkiJRyAYmZEnm7ZS', '', 'kurt_dc@mail.ru', '', 10, 1,  '1568407565', '1568407565', 'N-jcyjqRZmfDr4kL4-kUZd5BJharC-aK_1568407565');

ALTER SEQUENCE user_id_seq OWNED BY users.id;
ALTER SEQUENCE user_id_seq RESTART WITH 3;

create sequence price_history_id_seq;
create table price_history (
id integer NOT NULL DEFAULT nextval('price_history_id_seq'::regclass) ,
price integer ,
CONSTRAINT price_history_pkey PRIMARY KEY (id)
);


create sequence menu_id_seq;
create table menu (
id integer NOT NULL DEFAULT nextval('menu_id_seq'::regclass),
parent_id integer NOT NULL,
name character varying(255) NOT NULL,
url character varying(255),
show integer default 1,
CONSTRAINT menu_pkey PRIMARY KEY (id)
);



INSERT INTO menu VALUES (1, 0, 'Товары', '', 1);
    INSERT INTO menu VALUES (2, 1, 'Товары', 'products', 1);
    INSERT INTO menu VALUES (3, 1, 'Товары по весу', 'weight-groups', 1);
    INSERT INTO menu VALUES (4, 1, 'Товары по цвету', 'color-groups', 1);


INSERT INTO menu VALUES (5, 0, 'Справочники', '',1);
    INSERT INTO menu VALUES (6, 5, 'Пользователи', 'user',1);
    INSERT INTO menu VALUES (7, 5, 'Категории товаров', 'category', 1);
    INSERT INTO menu VALUES (8, 5, 'Типы категорий', 'category-type', 1);
    INSERT INTO menu VALUES (9, 5, 'Производители', 'manufacturers', 1);

    INSERT INTO menu VALUES (10, 5, 'Изображения', 'file', 1);
    INSERT INTO menu VALUES (11, 5, 'Меню', 'menu', 1);
    INSERT INTO menu VALUES (12, 5, 'Города', 'city', 1);
    INSERT INTO menu VALUES (13, 5, 'Способы оплаты', 'payment-types', 1);
INSERT INTO menu VALUES (14, 0, 'Настройки', '', 1);
    INSERT INTO menu VALUES (15, 5, 'Тип упаковки', 'packaging-type', 1);
    INSERT INTO menu VALUES (16, 5, 'Ингридиенты', 'ingredients', 1);
    INSERT INTO menu VALUES (17, 5, 'Цвета', 'colors', 1);

INSERT INTO menu VALUES (18, 0, 'Заказы/покупки', '', 1);
    INSERT INTO menu VALUES (19, 18, 'Заказы', 'orders', 1);

    INSERT INTO menu VALUES (20, 1, 'Отзывы', 'review', 1);
    INSERT INTO menu VALUES (21, 5, 'Типы доставки', 'delivery-types', 1);

    INSERT INTO menu VALUES (22, 14, 'Выбор города', 'city', 1);
    INSERT INTO menu VALUES (23, 14, 'Вывод полей', 'settings-fields', 1);



ALTER SEQUENCE menu_id_seq OWNED BY menu.id;
ALTER SEQUENCE menu_id_seq RESTART WITH 24;

create sequence rating_id_seq;
create table rating (
id integer NOT NULL DEFAULT nextval('rating_id_seq'::regclass),
products_id  integer                  not null,
user_id integer not null,
value integer not null,
CONSTRAINT rating_pkey PRIMARY KEY (id)
);

INSERT INTO rating VALUES (1, 1, 1, 5);

create sequence country_id_seq;

create table country (
id integer NOT NULL DEFAULT nextval('country_id_seq'::regclass),
name character varying(255) NOT NULL,
CONSTRAINT country_pkey PRIMARY KEY (id)
);

create sequence region_id_seq;

create table region (
id integer NOT NULL DEFAULT nextval('region_id_seq'::regclass) ,
name character varying(255) NOT NULL,
country_id     integer                  not null,
CONSTRAINT region_pkey PRIMARY KEY (id)
);

create sequence city_id_seq;
create table city (
id integer NOT NULL DEFAULT nextval('city_id_seq'::regclass) ,
name character varying(255) NOT NULL,
region_id     integer                  not null,
country_id     integer                  not null,
show integer null,
CONSTRAINT city_pkey PRIMARY KEY (id)
);

INSERT INTO city VALUES (1 , 'Москва', 1, 1, 1 );
INSERT INTO city VALUES (2 , 'Питер', 1, 1, 1 );
ALTER SEQUENCE city_id_seq OWNED BY city.id;
ALTER SEQUENCE city_id_seq RESTART WITH 3;



create sequence street_id_seq;
create table street (
id integer NOT NULL DEFAULT nextval('street_id_seq'::regclass) ,
name character varying(255) NOT NULL,
region_id     integer                  not null,
country_id     integer                  not null,
CONSTRAINT street_pkey PRIMARY KEY (id)
);


create sequence review_id_seq;

CREATE TABLE review (
    id integer NOT NULL DEFAULT nextval('review_id_seq'::regclass),
    user_id  integer,
    product_id integer,
    city_id integer,
    name varchar(255) not null,
    positive text null,
    negative text null,
    status smallint NOT NULL DEFAULT 10,
    created_at integer NOT NULL,
    updated_at integer NOT NULL,
    CONSTRAINT review_pkey PRIMARY KEY (id)
);

create sequence products_id_seq;

create table products (
   id integer NOT NULL DEFAULT nextval('products_id_seq'::regclass),
   name varchar(255) not null,
   category_id integer not null,
   manufacturer_id integer null,
   packaging_type_id integer null,
   weight integer null,
   description text,
   code integer null,
   color_id integer null,
   main numeric null,
   show numeric null,
   created_at  integer not null,
   updated_at  integer not null,
   constraint pk_products primary key (id)
);

INSERT INTO products VALUES (1, 'Royal Canin кусочки в соусе для щенков средних пород', 1, 1, 1, 1000, '',45111,1, 1,1,1555754591, 1555754591);
INSERT INTO products VALUES (2, 'Корм Royal Canin для взрослых ', 12, 1, 1, 5000 ,  '', 123000, 1, 1, 1, 1555754591, 1555754591);
INSERT INTO products VALUES (3, 'Корм Purina Pro Plan лайт для взрослых собак, склонных к избыточному весу и/или стерилизованных, с курицей и рисом, Adult Light', 1, 1, 1, 8000,  '',56556,1, 1,1,1555754591, 1555754591);
INSERT INTO products VALUES (4, 'Royal Canin кусочки в соусе для собак крупных пород', 12, 1,  2, 10000, 'Royal Canin кусочки в соусе для собак крупных пород', 444444,1, 1,1,1555754591, 1555754591);
INSERT INTO products VALUES (5, 'Royal Canin (вет. консервы) консервы для собак при пищевой аллергии, Hypoallergenic', 1, 1,2, 12000,  '',6765675,1, 1,1,1555754591, 1555754591);
INSERT INTO products VALUES (6, 'Корм Royal Canin для взрослых собак малых пород: до 10 кг, 10 мес. - 8 лет, Mini Adult', 1, 1, 1, 500,  '',56765, 1, 1,1,1555754591, 1555754591);

INSERT INTO products VALUES (7, 'Royal Canin лакомство для дрессировки щенков и собак, Educ', 2, 3, 2, 1000, '',45111,1, 1,1,1555754591, 1555754591);
INSERT INTO products VALUES (8, 'Almo Nature консервы для собак "Меню с курицей и индейкой", Daily Menu - Chicken&Turkey Tetrapack ', 10, 2, 1, 5000 ,  '', 123000, 1, 1, 1, 1555754591, 1555754591);
INSERT INTO products VALUES (9, 'Adult Light', 1, 1, 1, 8000,  '',56556,1, 1,1,1555754591, 1555754591);
INSERT INTO products VALUES (10, 'Royal Canin кусочки в соусе для собак крупных пород', 3, 2,  2, 10000, 'Royal Canin кусочки в соусе для собак крупных пород', 444444,1, 1,1,1555754591, 1555754591);
INSERT INTO products VALUES (11, 'Royal Canin (вет. консервы) консервы для собак при пищевой аллергии, Hypoallergenic', 3, 4,1, 12000,  '',6765675,1, 1,1,1555754591, 1555754591);
INSERT INTO products VALUES (12, 'Корм Royal Canin для взрослых собак малых пород: до 10 кг, 10 мес. - 8 лет, Mini Adult', 8, 2, 1, 500,  '',56765, 1, 1,1,1555754591, 1555754591);


ALTER SEQUENCE products_id_seq OWNED BY products.id;
ALTER SEQUENCE products_id_seq RESTART WITH 13;

create sequence colors_id_seq;

create table colors (
   id integer NOT NULL DEFAULT nextval('colors_id_seq'::regclass),
   name varchar(255) not null,
   color varchar(7) null,
   show integer null,
   constraint pk_colors primary key (id)
);

INSERT INTO colors VALUES (1, 'Белый', '#ffffff', 1);
INSERT INTO colors VALUES (2, 'Черный', '#000000', 1);

ALTER SEQUENCE colors_id_seq OWNED BY colors.id;
ALTER SEQUENCE colors_id_seq RESTART WITH 3;

create sequence products_ballance_id_seq;

create table products_ballance (
   id integer NOT NULL DEFAULT nextval('products_ballance_id_seq'::regclass),
   stock_id integer not null,
   product_id integer not null,
   quantity integer default 0,
   show integer null,
   created_at  integer not null,
   updated_at  integer not null,
   constraint pk_products_ballance primary key (id)
);

INSERT INTO products_ballance  VALUES (1, 1, 1, 15, 1,1555754591, 1555754591);
INSERT INTO products_ballance  VALUES (2, 2, 2, 74, 1,1555754591, 1555754591);
INSERT INTO products_ballance  VALUES (3, 1, 3, 9, 1,1555754591, 1555754591);
INSERT INTO products_ballance  VALUES (4, 2, 4, 3, 1,1555754591, 1555754591);
INSERT INTO products_ballance  VALUES (5, 1, 5, 12, 1,1555754591, 1555754591);

INSERT INTO products_ballance  VALUES (6, 1, 6,  10, 1,1555754591, 1555754591);
INSERT INTO products_ballance  VALUES (7, 1, 7, 1, 1,1555754591, 1555754591);
INSERT INTO products_ballance  VALUES (8, 1, 8, 1, 1,1555754591, 1555754591);
INSERT INTO products_ballance  VALUES (9, 2, 9, 1, 1,1555754591, 1555754591);
INSERT INTO products_ballance  VALUES (10, 1, 10, 1, 1,1555754591, 1555754591);
INSERT INTO products_ballance  VALUES (11, 1, 11, 1, 1,1555754591, 1555754591);
INSERT INTO products_ballance  VALUES (12, 1, 12, 1, 1,1555754591, 1555754591);
INSERT INTO products_ballance  VALUES (13, 2, 11, 1, 1,1555754591, 1555754591);


ALTER SEQUENCE products_ballance_id_seq OWNED BY products_ballance.id;
ALTER SEQUENCE products_ballance_id_seq RESTART WITH 14;

create sequence prices_id_seq;



create table prices (
   id integer NOT NULL DEFAULT nextval('prices_id_seq'::regclass),
   value integer not null,
   show integer null,
   created_at  integer not null,
   updated_at  integer not null,
   constraint pk_prices primary key (id)
);

INSERT INTO prices VALUES (1, 1000, 1, 1555754591, 1555754591);
INSERT INTO prices VALUES (2, 1060, 1, 1555754591, 1555754591);


ALTER SEQUENCE prices_id_seq OWNED BY prices.id;
ALTER SEQUENCE prices_id_seq RESTART WITH 3;

create sequence products_colors_id_seq;

create table products_colors (
  id integer NOT NULL DEFAULT nextval('products_colors_id_seq'::regclass) ,
  product_id  integer NOT NULL,
  color_id  integer NOT NULL,
  CONSTRAINT pk_products_colors primary key (id)
);

INSERT INTO products_colors VALUES (1, 1, 1);
INSERT INTO products_colors VALUES (2, 2, 2);
INSERT INTO products_colors  VALUES (3, 3, 4);

ALTER SEQUENCE products_colors_id_seq OWNED BY products_colors.id;
ALTER SEQUENCE products_colors_id_seq RESTART WITH 4;


create sequence files_id_seq;
create table files (
   id integer NOT NULL DEFAULT nextval('files_id_seq'::regclass) ,
   table_name varchar(255) not null,
   table_id integer  not null,
   file_type_id integer  not null,
   original varchar(255) not null,
   thumbnail varchar(255) not null,
   size varchar(25) not null,
   main numeric null,
   show numeric null,
   created_at  integer not null,
   updated_at  integer not null,

   constraint pk_files primary key (id)
);

ALTER SEQUENCE files_id_seq OWNED BY files.id;
ALTER SEQUENCE files_id_seq RESTART WITH 1;

create sequence file_types_id_seq;
create table file_types (
   id integer NOT NULL DEFAULT nextval('file_types_id_seq'::regclass) ,
   name varchar(255) not null,
      constraint pk_file_types primary key (id)
);


INSERT INTO file_types VALUES (1, 'file');
INSERT INTO file_types VALUES (2, 'video');

ALTER SEQUENCE file_types_id_seq OWNED BY file_types.id;
ALTER SEQUENCE file_types_id_seq RESTART WITH 3;




create sequence delivery_id_seq;
create table delivery (
   id integer NOT NULL DEFAULT nextval('delivery_id_seq'::regclass) ,
   name        varchar(255)             not null,
   created_at integer not null,
   updated_at  integer not null,
   constraint pk_delivery primary key (id)
);

create sequence delivery_status_id_seq;
create table delivery_status (
   id integer NOT NULL DEFAULT nextval('delivery_status_id_seq'::regclass) ,
   order_id integer not null,
   delivery_id integer not null,
   created_at  integer not null,
   updated_at  integer not null,

   constraint pk_delivery_status primary key (id)
);


create sequence delivery_types_id_seq;
create table delivery_types (
   id integer NOT NULL DEFAULT nextval('delivery_types_id_seq'::regclass),
   name varchar(255)  not null,
   show numeric null,
   constraint pk_delivery_types primary key (id)
);

INSERT INTO delivery_types VALUES (1 , 'Доставка курьером', 1);
INSERT INTO delivery_types VALUES (2 , 'Самовывоз', 1);
INSERT INTO delivery_types VALUES (3 , 'Почта России', 1);
INSERT INTO delivery_types VALUES (4 , 'EMS Почта России', 1);

ALTER SEQUENCE delivery_types_id_seq OWNED BY delivery_types.id;
ALTER SEQUENCE delivery_types_id_seq RESTART WITH 5;



create sequence payment_types_id_seq;
create table payment_types(
   id integer NOT NULL DEFAULT nextval('payment_types_id_seq'::regclass) ,
   name varchar(255)  not null,
   show numeric null,
   created_at  integer not null,
   updated_at  integer not null,
   constraint pk_payment_types primary key (id)
);


INSERT INTO payment_types VALUES (1 , 'Картой онлайн', 1, 1555754591, 1555754591);
INSERT INTO payment_types VALUES (2 , 'Наличными курьеру', 1, 1555754591, 1555754591);
INSERT INTO payment_types VALUES (3 , 'Картой курьеру', 1, 1555754591, 1555754591);
INSERT INTO payment_types VALUES (4 , 'QIWI', 1, 1555754591, 1555754591);

ALTER SEQUENCE payment_types_id_seq OWNED BY payment_types.id;
ALTER SEQUENCE payment_types_id_seq RESTART WITH 5;

create sequence groups_id_seq;
create table groups (
id integer NOT NULL DEFAULT nextval('groups_id_seq'::regclass) ,
CONSTRAINT pk_groups primary key (id)
);

INSERT INTO groups VALUES (1);
INSERT INTO groups VALUES (2);
INSERT INTO groups  VALUES (3);

ALTER SEQUENCE groups_id_seq OWNED BY groups.id;
ALTER SEQUENCE groups_id_seq RESTART WITH 4;

create sequence products_color_group_id_seq;
create table products_color_group (
id integer NOT NULL DEFAULT nextval('products_color_group_id_seq'::regclass) ,
product_id  integer NOT NULL,
group_id  integer NOT NULL,
CONSTRAINT pk_products_color_group primary key (id)
);

ALTER SEQUENCE products_color_group_id_seq OWNED BY products_color_group.id;
ALTER SEQUENCE products_color_group_id_seq RESTART WITH 4;


create sequence products_prices_id_seq;
create table products_prices (
  id integer NOT NULL DEFAULT nextval('products_prices_id_seq'::regclass) ,
  product_id  integer NOT NULL,
  price_id  integer NOT NULL,
  CONSTRAINT pk_products_prices primary key (id)
);
ALTER SEQUENCE products_prices_id_seq OWNED BY groups.id;
ALTER SEQUENCE products_prices_id_seq RESTART WITH 4;

INSERT INTO products_prices VALUES (1, 1, 1);
INSERT INTO products_prices VALUES (2, 2, 1);
INSERT INTO products_prices VALUES (3, 3, 1);



create sequence products_weight_group_id_seq;
create table products_weight_group (
id integer NOT NULL DEFAULT nextval('products_weight_group_id_seq'::regclass) ,
product_id  integer NOT NULL,
group_id  integer NOT NULL,
CONSTRAINT pk_products_weight_group primary key (id)
);

INSERT INTO products_weight_group VALUES (1, 1, 1);
INSERT INTO products_weight_group VALUES (2, 2, 1);
INSERT INTO products_weight_group  VALUES (3, 3,1);

ALTER SEQUENCE products_weight_group_id_seq OWNED BY products_weight_group.id;
ALTER SEQUENCE products_weight_group_id_seq RESTART WITH 4;

create sequence products_ingredients_id_seq;
create table products_ingredients (
id integer NOT NULL DEFAULT nextval('products_ingredients_id_seq'::regclass) ,
product_id  integer NOT NULL,
ingredient_id  integer NOT NULL,
CONSTRAINT pk_products_ingredients primary key (id)
);

INSERT INTO products_ingredients VALUES (1, 1, 1);
INSERT INTO products_ingredients VALUES (2, 2, 2);
INSERT INTO products_ingredients  VALUES (3, 3, 4);

ALTER SEQUENCE products_ingredients_id_seq OWNED BY products_ingredients.id;
ALTER SEQUENCE products_ingredients_id_seq RESTART WITH 4;


create sequence products_packaging_type_id_seq;
create table products_packaging_type (
id integer NOT NULL DEFAULT nextval('products_packaging_type_id_seq'::regclass) ,
product_id  integer NOT NULL,
packaging_type_id  integer NOT NULL,
CONSTRAINT pk_products_packaging_type primary key (id)
);

INSERT INTO products_packaging_type VALUES (1, 1, 1);
INSERT INTO products_packaging_type VALUES (2, 2, 2);
INSERT INTO products_packaging_type  VALUES (3, 3, 4);

ALTER SEQUENCE products_packaging_type_id_seq OWNED BY products_ingredients.id;
ALTER SEQUENCE products_packaging_type_id_seq RESTART WITH 4;


create sequence roles_id_seq;
create table roles (
   id integer NOT NULL DEFAULT nextval('roles_id_seq'::regclass) ,
   name varchar(255) not null,
   created_at  timestamp with time zone not null,
   updated_at  timestamp with time zone not null,
   constraint pk_roles primary key (id)
);

create sequence category_id_seq;
create table category (
   id integer NOT NULL DEFAULT nextval('category_id_seq'::regclass) ,
   parent_id integer NOT NULL,
   name varchar(255) not null,
   show numeric null,
   constraint pk_category primary key (id)
);

INSERT INTO category VALUES (1 , 0, 'Мебель', 1);
INSERT INTO category VALUES (2 , 1, 'Кроватки', 1);
INSERT INTO category VALUES (3 , 0, 'Постельные принадлежности', 1);
INSERT INTO category  VALUES (4 , 3, 'Подушки', 1);
INSERT INTO category  VALUES (5 , 3, 'Держатель для балдахина', 1);



create sequence category_type_id_seq;
create table category_type (
   id integer NOT NULL DEFAULT nextval('category_type_id_seq'::regclass) ,
   name varchar(255) not null,
   show numeric null,
   constraint pk_category_type primary key (id)
);

INSERT INTO category_type VALUES (1 , 'Холистик корма', 1);
INSERT INTO category_type VALUES (2 , 'Сухие корма', 1);
INSERT INTO category_type VALUES (3 , 'Ветеринарные корма', 1);
INSERT INTO category_type VALUES (4 , 'Лакомства', 1);
INSERT INTO category_type VALUES (5 , 'Ветеринарная аптека', 1);
INSERT INTO category_type VALUES (6 , 'Витамины, пищ. добавки', 1);
INSERT INTO category_type VALUES (7 , 'Груминг, Косметика', 1);
INSERT INTO category_type VALUES (8 , 'Игрушки', 1);
INSERT INTO category_type VALUES (9 , 'Гигиена, пеленки', 1);
INSERT INTO category_type VALUES (10 , 'Транспортировка, переноски', 1);
INSERT INTO category_type VALUES (11 , 'Лежаки', 1);


create sequence manufacturer_id_seq;
create table manufacturers (
  id integer NOT NULL DEFAULT nextval('manufacturer_id_seq'::regclass) ,
   name varchar(255) not null,
   show numeric default 1,
   constraint pk_manufacturers primary key (id)
);


INSERT INTO manufacturers VALUES (1, 'AATU', 1);
INSERT INTO manufacturers VALUES (2, 'Advance', 1);
INSERT INTO manufacturers VALUES (3, 'Advance (вет. корма)', 1);
INSERT INTO manufacturers VALUES (4, 'All Dogs', 1);
INSERT INTO manufacturers VALUES (5, 'Almo Nature', 1);
INSERT INTO manufacturers VALUES (6, 'Almo Nature Alternative', 1);
INSERT INTO manufacturers VALUES (7, 'Applaws', 1);
INSERT INTO manufacturers VALUES (8, 'Arden Grange', 1);
INSERT INTO manufacturers VALUES (9, 'Acana', 1);
INSERT INTO manufacturers VALUES (10, 'Barking Heads', 1);
INSERT INTO manufacturers VALUES (11, 'Beaphar', 1);
INSERT INTO manufacturers VALUES (12, 'Belcando', 1);
INSERT INTO manufacturers VALUES (13, 'Berkley', 1);
INSERT INTO manufacturers VALUES (14, 'Bozita super premium', 1);
INSERT INTO manufacturers VALUES (15, 'Brit', 1);
INSERT INTO manufacturers VALUES (16, 'Chappi', 1);
INSERT INTO manufacturers VALUES (17, 'Classic (Versele Laga)', 1);
INSERT INTO manufacturers VALUES (18, 'DailyDog', 1);
INSERT INTO manufacturers VALUES (19, 'Dog Chow', 1);
INSERT INTO manufacturers VALUES (20, 'Eukanuba', 1);
INSERT INTO manufacturers VALUES (21, 'Franks ProGold', 1);
INSERT INTO manufacturers VALUES (22, 'GATHER', 1);
INSERT INTO manufacturers VALUES (23, 'GO!', 1);
INSERT INTO manufacturers VALUES (24, 'Golden Eagle', 1);
INSERT INTO manufacturers VALUES (25, 'Happy Life', 1);
INSERT INTO manufacturers VALUES (26, 'Happy dog', 1);
INSERT INTO manufacturers VALUES (27, 'Hill''s Prescription Diet', 1);
INSERT INTO manufacturers VALUES (28, 'Hill''s Science Plan', 1);
INSERT INTO manufacturers VALUES (29, 'MEGLIUM', 1);
INSERT INTO manufacturers VALUES (30, 'Monge', 1);
INSERT INTO manufacturers VALUES (31, 'NERO GOLD super premium', 1);
INSERT INTO manufacturers VALUES (32, 'NOW FRESH', 1);
INSERT INTO manufacturers VALUES (33, 'Nature''s Table', 1);
INSERT INTO manufacturers VALUES (34, 'Ontario', 1);
INSERT INTO manufacturers VALUES (35, 'Opti Life (Versele Laga)', 1);
INSERT INTO manufacturers VALUES (36, 'Organix (сухие корма)', 1);
INSERT INTO manufacturers VALUES (37, 'Orijen', 1);
INSERT INTO manufacturers VALUES (38, 'PLATINUM', 1);
INSERT INTO manufacturers VALUES (39, 'PRIMORDIAL', 1);
INSERT INTO manufacturers VALUES (40, 'Pedigree', 1);
INSERT INTO manufacturers VALUES (41, 'Perfect Fit', 1);
INSERT INTO manufacturers VALUES (42, 'Pro Pac', 1);
INSERT INTO manufacturers VALUES (43, 'Purina Pro Plan', 1);
INSERT INTO manufacturers VALUES (44, 'Purina Pro Plan (вет. корма)', 1);
INSERT INTO manufacturers VALUES (45, 'Royal Canin', 1);
INSERT INTO manufacturers VALUES (46, 'Royal Canin (вет. консервы)', 1);
INSERT INTO manufacturers VALUES (47, 'Royal Canin (вет.корма)', 1);
INSERT INTO manufacturers VALUES (48, 'Summit', 1);
INSERT INTO manufacturers VALUES (49, 'TiTBiT', 1);
INSERT INTO manufacturers VALUES (50, 'Зоогурман', 1);
INSERT INTO manufacturers VALUES (51, 'Наша Марка', 1);
INSERT INTO manufacturers VALUES (52, 'Родные корма', 1);
INSERT INTO manufacturers VALUES (53, 'Стаут', 1);
INSERT INTO manufacturers VALUES (54, 'Трапеза', 1);


ALTER SEQUENCE manufacturer_id_seq OWNED BY manufacturers.id;
ALTER SEQUENCE manufacturer_id_seq RESTART WITH 55;


create sequence settings_id_seq;
create table settings (
  id integer NOT NULL DEFAULT nextval('settings_id_seq'::regclass) ,
  user_id  integer NOT NULL,
  city_id integer NOT NULL,
  stock_id integer NOT NULL,
  constraint pk_settings primary key (id)
);

INSERT INTO settings VALUES (1, 1, 1, 1);
ALTER SEQUENCE settings_id_seq OWNED BY settings.id;
ALTER SEQUENCE settings_id_seq RESTART WITH 2;



create sequence brands_id_seq;
create table brands (
  id integer NOT NULL DEFAULT nextval('brands_id_seq'::regclass) ,
   name varchar(255) not null,
   show numeric default 1,
   constraint pk_brands primary key (id)
);

INSERT INTO brands VALUES (1 , 'AATU', 1);
INSERT INTO brands VALUES (2 , 'Advance', 1);
INSERT INTO brands VALUES (3 , 'Advance (вет. корма)', 1);
INSERT INTO brands VALUES (4 , 'All Dogs', 1);
INSERT INTO brands VALUES (5 , 'Almo Nature', 1);
INSERT INTO brands VALUES (6 , 'Almo Nature Alternative', 1);
INSERT INTO brands VALUES (7 , 'Applaws', 1);
INSERT INTO brands VALUES (8 , 'Arden Grange', 1);
INSERT INTO brands VALUES (9 , 'Acana', 1);
INSERT INTO brands VALUES (10 , 'Barking Heads', 1);
INSERT INTO brands VALUES (11, 'Barking Heads', 1);
INSERT INTO brands VALUES (12, 'Royal Canin', 1);

ALTER SEQUENCE brands_id_seq OWNED BY brands.id;
ALTER SEQUENCE brands_id_seq RESTART WITH 13;

create sequence orders_id_seq;
create table orders (
   id integer NOT NULL DEFAULT nextval('orders_id_seq'::regclass),
   created_at timestamp with time zone not null,
   updated_at  timestamp with time zone not null,
   constraint pk_orders primary key (id)
);

ALTER SEQUENCE orders_id_seq OWNED BY orders.id;
ALTER SEQUENCE orders_id_seq RESTART WITH 1;

create sequence stocks_id_seq;
create table stocks (
   id integer NOT NULL DEFAULT nextval('stocks_id_seq'::regclass),
   name varchar(255) not null,
   address_id integer not null,
   constraint pk_stocks primary key (id)
);

INSERT INTO stocks  VALUES (1 , 'Алтуфьево', 1);
INSERT INTO stocks  VALUES (2 , 'Каширское шоссе', 1);

ALTER SEQUENCE stocks_id_seq OWNED BY stocks.id;
ALTER SEQUENCE stocks_id_seq RESTART WITH 3;

create sequence units_id_seq;
create table units (
   id integer NOT NULL DEFAULT nextval('units_id_seq'::regclass),
   name varchar(255) not null,
   short varchar(255) not null,
   constraint pk_units primary key (id)
);


INSERT INTO units  VALUES (1 , 'Килограмм', 'кг');
INSERT INTO units  VALUES (2 , 'Литр', 'л.');
INSERT INTO units  VALUES (3 , 'Метр', 'м');
INSERT INTO units  VALUES (4 , 'Упаковка', 'упак.');
INSERT INTO units  VALUES (5 , 'Штука', 'шт.');
INSERT INTO units  VALUES (6 , 'Штука', 'шт.');

ALTER SEQUENCE units_id_seq OWNED BY units.id;
ALTER SEQUENCE units_id_seq RESTART WITH 7;

create sequence metro_id_seq;
create table metro (
   id integer NOT NULL DEFAULT nextval('metro_id_seq'::regclass),
   name varchar(255) not null,
   constraint pk_metro primary key (id)
);

ALTER SEQUENCE metro_id_seq OWNED BY metro.id;
ALTER SEQUENCE metro_id_seq RESTART WITH 1;

create sequence addresses_id_seq;
create table addresses (
   id integer NOT NULL DEFAULT nextval('addresses_id_seq'::regclass),
   country_id integer not null,
   region_id integer not null,
   city_id integer not  null,
   street_id integer not null,
   home_id integer not null,
   construction_id integer null,
   building_id integer null,
   office varchar(255) null,
   address varchar(255) null,
   index integer null,
   metro_id integer null,

   constraint pk_addresses primary key (id)
);

INSERT INTO addresses  VALUES (1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);
ALTER SEQUENCE addresses_id_seq OWNED BY addresses.id;
ALTER SEQUENCE addresses_id_seq RESTART WITH 1;

create sequence product_leftovers_id_seq;
create table product_leftovers (
   id integer NOT NULL DEFAULT nextval('product_leftovers_id_seq'::regclass),
   product_id integer not null,
   quantity integer not null,
   subtotal numeric not null,
   created_at timestamp with time zone not null,
   updated_at timestamp with time zone not null,
   constraint pk_product_leftovers primary key (id)
);
