--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.25
-- Dumped by pg_dump version 9.6.12

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: store; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE store WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'C' LC_CTYPE = 'C';


ALTER DATABASE store OWNER TO postgres;

\connect store

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner:
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner:
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: addresses; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.addresses (
                                id integer NOT NULL,
                                country_id integer NOT NULL,
                                region_id integer NOT NULL,
                                city_id integer NOT NULL,
                                street_id integer NOT NULL,
                                home_id integer NOT NULL,
                                construction_id integer,
                                building_id integer,
                                office character varying(255),
                                address character varying(255),
                                index integer,
                                metro_id integer
);


ALTER TABLE public.addresses OWNER TO postgres;

--
-- Name: addresses_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.addresses_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.addresses_id_seq OWNER TO postgres;

--
-- Name: addresses_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.addresses_id_seq OWNED BY public.addresses.id;


--
-- Name: admin_menu; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.admin_menu (
                                 id bigint NOT NULL,
                                 root integer,
                                 lft integer NOT NULL,
                                 rgt integer NOT NULL,
                                 lvl smallint NOT NULL,
                                 name character varying(60) NOT NULL,
                                 icon character varying(255),
                                 icon_type smallint DEFAULT 1 NOT NULL,
                                 active boolean DEFAULT true NOT NULL,
                                 selected boolean DEFAULT false NOT NULL,
                                 disabled boolean DEFAULT false NOT NULL,
                                 readonly boolean DEFAULT false NOT NULL,
                                 visible boolean DEFAULT true NOT NULL,
                                 collapsed boolean DEFAULT false NOT NULL,
                                 movable_u boolean DEFAULT true NOT NULL,
                                 movable_d boolean DEFAULT true NOT NULL,
                                 movable_l boolean DEFAULT true NOT NULL,
                                 movable_r boolean DEFAULT true NOT NULL,
                                 removable boolean DEFAULT true NOT NULL,
                                 removable_all boolean DEFAULT false NOT NULL,
                                 child_allowed boolean DEFAULT true NOT NULL,
                                 url text
);


ALTER TABLE public.admin_menu OWNER TO postgres;

--
-- Name: COLUMN admin_menu.url; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.admin_menu.url IS 'URL';


--
-- Name: admin_menu_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.admin_menu_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.admin_menu_id_seq OWNER TO postgres;

--
-- Name: admin_menu_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.admin_menu_id_seq OWNED BY public.admin_menu.id;


--
-- Name: brands; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.brands (
                             id integer NOT NULL,
                             name character varying(255) NOT NULL,
                             show numeric DEFAULT 1
);


ALTER TABLE public.brands OWNER TO postgres;

--
-- Name: brands_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.brands_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.brands_id_seq OWNER TO postgres;

--
-- Name: brands_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.brands_id_seq OWNED BY public.brands.id;


--
-- Name: cart; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cart (
                           id bigint NOT NULL,
                           user_id integer NOT NULL,
                           created_at timestamp(0) without time zone DEFAULT now(),
                           updated_at timestamp(0) without time zone DEFAULT now(),
                           deleted_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone
);


ALTER TABLE public.cart OWNER TO postgres;

--
-- Name: COLUMN cart.created_at; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.cart.created_at IS 'Дата создания';


--
-- Name: COLUMN cart.updated_at; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.cart.updated_at IS 'Дата изменения';


--
-- Name: COLUMN cart.deleted_at; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.cart.deleted_at IS 'Дата удаления';


--
-- Name: cart_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cart_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.cart_id_seq OWNER TO postgres;

--
-- Name: cart_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cart_id_seq OWNED BY public.cart.id;


--
-- Name: cart_items; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cart_items (
                                 id bigint NOT NULL,
                                 cart_id integer NOT NULL,
                                 product_id integer NOT NULL,
                                 quantity integer NOT NULL,
                                 created_at timestamp(0) without time zone DEFAULT now(),
                                 updated_at timestamp(0) without time zone DEFAULT now(),
                                 deleted_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone
);


ALTER TABLE public.cart_items OWNER TO postgres;

--
-- Name: COLUMN cart_items.cart_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.cart_items.cart_id IS 'Идентификатор заказа';


--
-- Name: COLUMN cart_items.product_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.cart_items.product_id IS 'Идентификатор товара';


--
-- Name: COLUMN cart_items.quantity; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.cart_items.quantity IS 'Количество товара';


--
-- Name: COLUMN cart_items.created_at; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.cart_items.created_at IS 'Дата создания';


--
-- Name: COLUMN cart_items.updated_at; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.cart_items.updated_at IS 'Дата изменения';


--
-- Name: COLUMN cart_items.deleted_at; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.cart_items.deleted_at IS 'Дата удаления';


--
-- Name: cart_items_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cart_items_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.cart_items_id_seq OWNER TO postgres;

--
-- Name: cart_items_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cart_items_id_seq OWNED BY public.cart_items.id;


--
-- Name: category_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.category_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.category_id_seq OWNER TO postgres;

--
-- Name: category; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.category (
                               id integer DEFAULT nextval('public.category_id_seq'::regclass) NOT NULL,
                               parent_id integer NOT NULL,
                               name character varying(255) NOT NULL,
                               show numeric
);


ALTER TABLE public.category OWNER TO postgres;

--
-- Name: category_type_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.category_type_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.category_type_id_seq OWNER TO postgres;

--
-- Name: category_type; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.category_type (
                                    id integer DEFAULT nextval('public.category_type_id_seq'::regclass) NOT NULL,
                                    name character varying(255) NOT NULL,
                                    show numeric
);


ALTER TABLE public.category_type OWNER TO postgres;

--
-- Name: city; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.city (
                           id integer NOT NULL,
                           name character varying(255) NOT NULL,
                           region_id integer NOT NULL,
                           country_id integer NOT NULL,
                           show integer
);


ALTER TABLE public.city OWNER TO postgres;

--
-- Name: city_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.city_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.city_id_seq OWNER TO postgres;

--
-- Name: city_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.city_id_seq OWNED BY public.city.id;


--
-- Name: colors; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.colors (
                             id integer NOT NULL,
                             name character varying(255) NOT NULL,
                             color character varying(7),
                             show integer,
                             "default" smallint DEFAULT 0
);


ALTER TABLE public.colors OWNER TO postgres;

--
-- Name: COLUMN colors."default"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.colors."default" IS 'Дефолтное значение';


--
-- Name: colors_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.colors_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.colors_id_seq OWNER TO postgres;

--
-- Name: colors_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.colors_id_seq OWNED BY public.colors.id;


--
-- Name: country_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.country_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.country_id_seq OWNER TO postgres;

--
-- Name: country; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.country (
                              id integer DEFAULT nextval('public.country_id_seq'::regclass) NOT NULL,
                              name character varying(255) NOT NULL
);


ALTER TABLE public.country OWNER TO postgres;

--
-- Name: delivery_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.delivery_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.delivery_id_seq OWNER TO postgres;

--
-- Name: delivery; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.delivery (
                               id integer DEFAULT nextval('public.delivery_id_seq'::regclass) NOT NULL,
                               name character varying(255) NOT NULL,
                               created_at integer NOT NULL,
                               updated_at integer NOT NULL
);


ALTER TABLE public.delivery OWNER TO postgres;

--
-- Name: delivery_status_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.delivery_status_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.delivery_status_id_seq OWNER TO postgres;

--
-- Name: delivery_status; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.delivery_status (
                                      id integer DEFAULT nextval('public.delivery_status_id_seq'::regclass) NOT NULL,
                                      order_id integer NOT NULL,
                                      delivery_id integer NOT NULL,
                                      created_at integer NOT NULL,
                                      updated_at integer NOT NULL
);


ALTER TABLE public.delivery_status OWNER TO postgres;

--
-- Name: delivery_types; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.delivery_types (
                                     id integer NOT NULL,
                                     name character varying(255) NOT NULL,
                                     show numeric
);


ALTER TABLE public.delivery_types OWNER TO postgres;

--
-- Name: delivery_types_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.delivery_types_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.delivery_types_id_seq OWNER TO postgres;

--
-- Name: delivery_types_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.delivery_types_id_seq OWNED BY public.delivery_types.id;


--
-- Name: file_types; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.file_types (
                                 id integer NOT NULL,
                                 name character varying(255) NOT NULL
);


ALTER TABLE public.file_types OWNER TO postgres;

--
-- Name: file_types_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.file_types_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.file_types_id_seq OWNER TO postgres;

--
-- Name: file_types_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.file_types_id_seq OWNED BY public.file_types.id;


--
-- Name: files; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.files (
                            id integer NOT NULL,
                            table_name character varying(255) NOT NULL,
                            table_id integer NOT NULL,
                            file_type_id integer NOT NULL,
                            original character varying(255) NOT NULL,
                            thumbnail character varying(255) NOT NULL,
                            size character varying(25) NOT NULL,
                            main numeric,
                            show numeric,
                            created_at integer NOT NULL,
                            updated_at integer NOT NULL
);


ALTER TABLE public.files OWNER TO postgres;

--
-- Name: files_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.files_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.files_id_seq OWNER TO postgres;

--
-- Name: files_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.files_id_seq OWNED BY public.files.id;


--
-- Name: groups; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.groups (
  id integer NOT NULL
);


ALTER TABLE public.groups OWNER TO postgres;

--
-- Name: groups_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.groups_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.groups_id_seq OWNER TO postgres;

--
-- Name: groups_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.groups_id_seq OWNED BY public.groups.id;


--
-- Name: ingredients; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ingredients (
                                  id integer NOT NULL,
                                  name character varying(255) NOT NULL,
                                  show integer
);


ALTER TABLE public.ingredients OWNER TO postgres;

--
-- Name: ingredients_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ingredients_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.ingredients_id_seq OWNER TO postgres;

--
-- Name: ingredients_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ingredients_id_seq OWNED BY public.ingredients.id;


--
-- Name: manufacturers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.manufacturers (
                                    id integer NOT NULL,
                                    name character varying(255) NOT NULL,
                                    show numeric DEFAULT 1
);


ALTER TABLE public.manufacturers OWNER TO postgres;

--
-- Name: manufacturer_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.manufacturer_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.manufacturer_id_seq OWNER TO postgres;

--
-- Name: manufacturer_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.manufacturer_id_seq OWNED BY public.manufacturers.id;


--
-- Name: menu; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.menu (
                           id integer NOT NULL,
                           parent_id integer NOT NULL,
                           name character varying(255) NOT NULL,
                           url character varying(255),
                           show integer DEFAULT 1
);


ALTER TABLE public.menu OWNER TO postgres;

--
-- Name: menu_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.menu_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.menu_id_seq OWNER TO postgres;

--
-- Name: menu_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.menu_id_seq OWNED BY public.menu.id;


--
-- Name: metro; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.metro (
                            id integer NOT NULL,
                            name character varying(255) NOT NULL
);


ALTER TABLE public.metro OWNER TO postgres;

--
-- Name: metro_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.metro_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.metro_id_seq OWNER TO postgres;

--
-- Name: metro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.metro_id_seq OWNED BY public.metro.id;


--
-- Name: migration; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migration (
                                version character varying(180) NOT NULL,
                                apply_time integer
);


ALTER TABLE public.migration OWNER TO postgres;

--
-- Name: order_items; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.order_items (
                                  id bigint NOT NULL,
                                  order_id integer NOT NULL,
                                  product_id integer NOT NULL,
                                  quantity integer NOT NULL,
                                  created_at timestamp(0) without time zone DEFAULT now(),
                                  updated_at timestamp(0) without time zone DEFAULT now(),
                                  deleted_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone
);


ALTER TABLE public.order_items OWNER TO postgres;

--
-- Name: COLUMN order_items.created_at; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.order_items.created_at IS 'Дата создания';


--
-- Name: COLUMN order_items.updated_at; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.order_items.updated_at IS 'Дата изменения';


--
-- Name: COLUMN order_items.deleted_at; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.order_items.deleted_at IS 'Дата удаления';


--
-- Name: order_items_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.order_items_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.order_items_id_seq OWNER TO postgres;

--
-- Name: order_items_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.order_items_id_seq OWNED BY public.order_items.id;


--
-- Name: order_status; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.order_status (
                                   id integer NOT NULL,
                                   name character varying(255) NOT NULL,
                                   show smallint DEFAULT 0,
                                   color character varying(10) DEFAULT NULL::character varying
);


ALTER TABLE public.order_status OWNER TO postgres;

--
-- Name: COLUMN order_status.name; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.order_status.name IS 'Статус';


--
-- Name: COLUMN order_status.show; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.order_status.show IS 'Показать/скрыть';


--
-- Name: COLUMN order_status.color; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.order_status.color IS 'Цвет статуса';


--
-- Name: order_status_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.order_status_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.order_status_id_seq OWNER TO postgres;

--
-- Name: order_status_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.order_status_id_seq OWNED BY public.order_status.id;


--
-- Name: orders; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.orders (
                             id bigint NOT NULL,
                             user_id integer NOT NULL,
                             accept boolean,
                             created_at timestamp(0) without time zone DEFAULT now(),
                             updated_at timestamp(0) without time zone DEFAULT now(),
                             deleted_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
                             status_id integer DEFAULT 0 NOT NULL,
                             comment text,
                             price bigint DEFAULT 0 NOT NULL
);


ALTER TABLE public.orders OWNER TO postgres;

--
-- Name: COLUMN orders.accept; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.orders.accept IS 'Аферта';


--
-- Name: COLUMN orders.created_at; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.orders.created_at IS 'Дата создания';


--
-- Name: COLUMN orders.updated_at; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.orders.updated_at IS 'Дата изменения';


--
-- Name: COLUMN orders.deleted_at; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.orders.deleted_at IS 'Дата удаления';


--
-- Name: COLUMN orders.status_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.orders.status_id IS 'Статус';


--
-- Name: COLUMN orders.comment; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.orders.comment IS 'Комментарий';


--
-- Name: COLUMN orders.price; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.orders.price IS 'Цена';


--
-- Name: orders_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.orders_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.orders_id_seq OWNER TO postgres;

--
-- Name: orders_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.orders_id_seq OWNED BY public.orders.id;


--
-- Name: packaging_type; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.packaging_type (
                                     id integer NOT NULL,
                                     name character varying(255) NOT NULL,
                                     show integer
);


ALTER TABLE public.packaging_type OWNER TO postgres;

--
-- Name: packaging_type_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.packaging_type_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.packaging_type_id_seq OWNER TO postgres;

--
-- Name: packaging_type_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.packaging_type_id_seq OWNED BY public.packaging_type.id;


--
-- Name: payment_types; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.payment_types (
                                    id integer NOT NULL,
                                    name character varying(255) NOT NULL,
                                    show numeric,
                                    created_at integer NOT NULL,
                                    updated_at integer NOT NULL
);


ALTER TABLE public.payment_types OWNER TO postgres;

--
-- Name: payment_types_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.payment_types_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.payment_types_id_seq OWNER TO postgres;

--
-- Name: payment_types_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.payment_types_id_seq OWNED BY public.payment_types.id;


--
-- Name: price_history_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.price_history_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.price_history_id_seq OWNER TO postgres;

--
-- Name: price_history; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.price_history (
                                    id integer DEFAULT nextval('public.price_history_id_seq'::regclass) NOT NULL,
                                    price integer
);


ALTER TABLE public.price_history OWNER TO postgres;

--
-- Name: prices; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.prices (
                             id integer NOT NULL,
                             value integer NOT NULL,
                             show integer,
                             created_at integer NOT NULL,
                             updated_at integer NOT NULL
);


ALTER TABLE public.prices OWNER TO postgres;

--
-- Name: prices_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.prices_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.prices_id_seq OWNER TO postgres;

--
-- Name: prices_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.prices_id_seq OWNED BY public.prices.id;


--
-- Name: product_balance; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.product_balance (
                                      id integer NOT NULL,
                                      stock_id integer NOT NULL,
                                      product_id integer NOT NULL,
                                      quantity integer DEFAULT 0,
                                      show integer,
                                      color_id bigint DEFAULT 0 NOT NULL,
                                      size_id bigint DEFAULT 0 NOT NULL,
                                      created_at timestamp(0) without time zone DEFAULT now(),
                                      updated_at timestamp(0) without time zone DEFAULT now()
);


ALTER TABLE public.product_balance OWNER TO postgres;

--
-- Name: COLUMN product_balance.color_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.product_balance.color_id IS 'Цвет';


--
-- Name: COLUMN product_balance.size_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.product_balance.size_id IS 'Размер';


--
-- Name: COLUMN product_balance.created_at; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.product_balance.created_at IS 'Дата создания';


--
-- Name: COLUMN product_balance.updated_at; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.product_balance.updated_at IS 'Дата обновления';


--
-- Name: product_leftovers_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.product_leftovers_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.product_leftovers_id_seq OWNER TO postgres;

--
-- Name: product_leftovers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.product_leftovers (
                                        id integer DEFAULT nextval('public.product_leftovers_id_seq'::regclass) NOT NULL,
                                        product_id integer NOT NULL,
                                        quantity integer NOT NULL,
                                        subtotal numeric NOT NULL,
                                        created_at timestamp with time zone NOT NULL,
                                        updated_at timestamp with time zone NOT NULL
);


ALTER TABLE public.product_leftovers OWNER TO postgres;

--
-- Name: product_property; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.product_property (
                                       id bigint NOT NULL,
                                       product_id integer NOT NULL,
                                       property_id integer NOT NULL,
                                       created_at timestamp(0) without time zone DEFAULT now()
);


ALTER TABLE public.product_property OWNER TO postgres;

--
-- Name: COLUMN product_property.product_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.product_property.product_id IS 'Товар';


--
-- Name: COLUMN product_property.property_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.product_property.property_id IS 'Свойство';


--
-- Name: COLUMN product_property.created_at; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.product_property.created_at IS 'Дата создания';


--
-- Name: product_property_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.product_property_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.product_property_id_seq OWNER TO postgres;

--
-- Name: product_property_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.product_property_id_seq OWNED BY public.product_property.id;


--
-- Name: products; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.products (
                               id integer NOT NULL,
                               name character varying(255) NOT NULL,
                               category_id integer NOT NULL,
                               manufacturer_id integer,
                               packaging_type_id integer,
                               weight integer,
                               description text,
                               color_id integer,
                               main numeric,
                               show numeric,
                               created_at integer NOT NULL,
                               updated_at integer NOT NULL,
                               price bigint DEFAULT 0,
                               code character varying(100) DEFAULT NULL::character varying,
                               brand_id integer DEFAULT 0
);


ALTER TABLE public.products OWNER TO postgres;

--
-- Name: COLUMN products.price; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.products.price IS 'Цена товара';


--
-- Name: COLUMN products.code; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.products.code IS 'Code';


--
-- Name: COLUMN products.brand_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.products.brand_id IS 'Бренд';


--
-- Name: products_ballance_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.products_ballance_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.products_ballance_id_seq OWNER TO postgres;

--
-- Name: products_ballance_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.products_ballance_id_seq OWNED BY public.product_balance.id;


--
-- Name: products_color_group; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.products_color_group (
                                           id integer NOT NULL,
                                           product_id integer NOT NULL,
                                           group_id integer NOT NULL
);


ALTER TABLE public.products_color_group OWNER TO postgres;

--
-- Name: products_color_group_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.products_color_group_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.products_color_group_id_seq OWNER TO postgres;

--
-- Name: products_color_group_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.products_color_group_id_seq OWNED BY public.products_color_group.id;


--
-- Name: products_colors; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.products_colors (
                                      id integer NOT NULL,
                                      product_id integer NOT NULL,
                                      color_id integer NOT NULL
);


ALTER TABLE public.products_colors OWNER TO postgres;

--
-- Name: products_colors_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.products_colors_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.products_colors_id_seq OWNER TO postgres;

--
-- Name: products_colors_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.products_colors_id_seq OWNED BY public.products_colors.id;


--
-- Name: products_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.products_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.products_id_seq OWNER TO postgres;

--
-- Name: products_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.products_id_seq OWNED BY public.products.id;


--
-- Name: products_ingredients; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.products_ingredients (
                                           id integer NOT NULL,
                                           product_id integer NOT NULL,
                                           ingredient_id integer NOT NULL
);


ALTER TABLE public.products_ingredients OWNER TO postgres;

--
-- Name: products_ingredients_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.products_ingredients_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.products_ingredients_id_seq OWNER TO postgres;

--
-- Name: products_ingredients_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.products_ingredients_id_seq OWNED BY public.products_ingredients.id;


--
-- Name: products_packaging_type_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.products_packaging_type_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.products_packaging_type_id_seq OWNER TO postgres;

--
-- Name: products_packaging_type_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.products_packaging_type_id_seq OWNED BY public.products_ingredients.id;


--
-- Name: products_packaging_type; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.products_packaging_type (
                                              id integer DEFAULT nextval('public.products_packaging_type_id_seq'::regclass) NOT NULL,
                                              product_id integer NOT NULL,
                                              packaging_type_id integer NOT NULL
);


ALTER TABLE public.products_packaging_type OWNER TO postgres;

--
-- Name: products_prices_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.products_prices_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.products_prices_id_seq OWNER TO postgres;

--
-- Name: products_prices_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.products_prices_id_seq OWNED BY public.groups.id;


--
-- Name: products_prices; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.products_prices (
                                      id integer DEFAULT nextval('public.products_prices_id_seq'::regclass) NOT NULL,
                                      product_id integer NOT NULL,
                                      price_id integer NOT NULL
);


ALTER TABLE public.products_prices OWNER TO postgres;

--
-- Name: products_weight_group; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.products_weight_group (
                                            id integer NOT NULL,
                                            product_id integer NOT NULL,
                                            group_id integer NOT NULL
);


ALTER TABLE public.products_weight_group OWNER TO postgres;

--
-- Name: products_weight_group_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.products_weight_group_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.products_weight_group_id_seq OWNER TO postgres;

--
-- Name: products_weight_group_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.products_weight_group_id_seq OWNED BY public.products_weight_group.id;


--
-- Name: property; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.property (
                               id bigint NOT NULL,
                               name character varying(255) NOT NULL,
                               prefix character varying(10) NOT NULL,
                               show smallint DEFAULT 0
);


ALTER TABLE public.property OWNER TO postgres;

--
-- Name: COLUMN property.name; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.property.name IS 'Наименование';


--
-- Name: COLUMN property.prefix; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.property.prefix IS 'Префикс';


--
-- Name: COLUMN property.show; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.property.show IS 'Показать/скрыть';


--
-- Name: property_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.property_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.property_id_seq OWNER TO postgres;

--
-- Name: property_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.property_id_seq OWNED BY public.property.id;


--
-- Name: rating_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.rating_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.rating_id_seq OWNER TO postgres;

--
-- Name: rating; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.rating (
                             id integer DEFAULT nextval('public.rating_id_seq'::regclass) NOT NULL,
                             products_id integer NOT NULL,
                             user_id integer NOT NULL,
                             value integer NOT NULL
);


ALTER TABLE public.rating OWNER TO postgres;

--
-- Name: region_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.region_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.region_id_seq OWNER TO postgres;

--
-- Name: region; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.region (
                             id integer DEFAULT nextval('public.region_id_seq'::regclass) NOT NULL,
                             name character varying(255) NOT NULL,
                             country_id integer NOT NULL
);


ALTER TABLE public.region OWNER TO postgres;

--
-- Name: review_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.review_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.review_id_seq OWNER TO postgres;

--
-- Name: review; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.review (
                             id integer DEFAULT nextval('public.review_id_seq'::regclass) NOT NULL,
                             user_id integer,
                             product_id integer,
                             city_id integer,
                             name character varying(255) NOT NULL,
                             positive text,
                             negative text,
                             status smallint DEFAULT 10 NOT NULL,
                             created_at integer NOT NULL,
                             updated_at integer NOT NULL
);


ALTER TABLE public.review OWNER TO postgres;

--
-- Name: roles_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.roles_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.roles_id_seq OWNER TO postgres;

--
-- Name: roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.roles (
                            id integer DEFAULT nextval('public.roles_id_seq'::regclass) NOT NULL,
                            name character varying(255) NOT NULL,
                            created_at timestamp with time zone DEFAULT timezone('UTC'::text, now()) NOT NULL,
                            updated_at timestamp with time zone DEFAULT timezone('UTC'::text, now()) NOT NULL
);


ALTER TABLE public.roles OWNER TO postgres;

--
-- Name: search_words; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.search_words (
                                   id bigint NOT NULL,
                                   user_id integer,
                                   ip character varying(255) DEFAULT NULL::character varying,
                                   word character varying(255) NOT NULL,
                                   created_at timestamp(0) without time zone DEFAULT now()
);


ALTER TABLE public.search_words OWNER TO postgres;

--
-- Name: COLUMN search_words.user_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.search_words.user_id IS 'Пользователь';


--
-- Name: COLUMN search_words.ip; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.search_words.ip IS 'IP';


--
-- Name: COLUMN search_words.word; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.search_words.word IS 'Поисковое слово';


--
-- Name: COLUMN search_words.created_at; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.search_words.created_at IS 'Дата создания';


--
-- Name: search_words_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.search_words_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.search_words_id_seq OWNER TO postgres;

--
-- Name: search_words_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.search_words_id_seq OWNED BY public.search_words.id;


--
-- Name: settings; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.settings (
                               id integer NOT NULL,
                               user_id integer NOT NULL,
                               city_id integer NOT NULL,
                               stock_id integer NOT NULL
);


ALTER TABLE public.settings OWNER TO postgres;

--
-- Name: settings_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.settings_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.settings_id_seq OWNER TO postgres;

--
-- Name: settings_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.settings_id_seq OWNED BY public.settings.id;


--
-- Name: sizes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sizes (
                            id integer NOT NULL,
                            eu_size character varying(20) NOT NULL,
                            ru_size character varying(20) NOT NULL,
                            show smallint DEFAULT 0,
                            "default" smallint DEFAULT 0
);


ALTER TABLE public.sizes OWNER TO postgres;

--
-- Name: COLUMN sizes.eu_size; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.sizes.eu_size IS 'EU Размер';


--
-- Name: COLUMN sizes.ru_size; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.sizes.ru_size IS 'RU Размер';


--
-- Name: COLUMN sizes.show; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.sizes.show IS 'Показать/скрыть';


--
-- Name: COLUMN sizes."default"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.sizes."default" IS 'Дефолтное значение';


--
-- Name: sizes_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.sizes_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.sizes_id_seq OWNER TO postgres;

--
-- Name: sizes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.sizes_id_seq OWNED BY public.sizes.id;


--
-- Name: stocks; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.stocks (
                             id integer NOT NULL,
                             name character varying(255) NOT NULL,
                             address_id integer NOT NULL
);


ALTER TABLE public.stocks OWNER TO postgres;

--
-- Name: stocks_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.stocks_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.stocks_id_seq OWNER TO postgres;

--
-- Name: stocks_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.stocks_id_seq OWNED BY public.stocks.id;


--
-- Name: street_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.street_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.street_id_seq OWNER TO postgres;

--
-- Name: street; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.street (
                             id integer DEFAULT nextval('public.street_id_seq'::regclass) NOT NULL,
                             name character varying(255) NOT NULL,
                             region_id integer NOT NULL,
                             country_id integer NOT NULL
);


ALTER TABLE public.street OWNER TO postgres;

--
-- Name: tree; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tree (
                           id bigint NOT NULL,
                           root integer,
                           lft integer NOT NULL,
                           rgt integer NOT NULL,
                           lvl smallint NOT NULL,
                           name character varying(60) NOT NULL,
                           icon character varying(255),
                           icon_type smallint DEFAULT 1 NOT NULL,
                           active boolean DEFAULT true NOT NULL,
                           selected boolean DEFAULT false NOT NULL,
                           disabled boolean DEFAULT false NOT NULL,
                           readonly boolean DEFAULT false NOT NULL,
                           visible boolean DEFAULT true NOT NULL,
                           collapsed boolean DEFAULT false NOT NULL,
                           movable_u boolean DEFAULT true NOT NULL,
                           movable_d boolean DEFAULT true NOT NULL,
                           movable_l boolean DEFAULT true NOT NULL,
                           movable_r boolean DEFAULT true NOT NULL,
                           removable boolean DEFAULT true NOT NULL,
                           removable_all boolean DEFAULT false NOT NULL,
                           child_allowed boolean DEFAULT true NOT NULL
);


ALTER TABLE public.tree OWNER TO postgres;

--
-- Name: tree_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tree_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.tree_id_seq OWNER TO postgres;

--
-- Name: tree_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tree_id_seq OWNED BY public.tree.id;


--
-- Name: units; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.units (
                            id integer NOT NULL,
                            name character varying(255) NOT NULL,
                            short character varying(255) NOT NULL
);


ALTER TABLE public.units OWNER TO postgres;

--
-- Name: units_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.units_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.units_id_seq OWNER TO postgres;

--
-- Name: units_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.units_id_seq OWNED BY public.units.id;


--
-- Name: user_favorites; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.user_favorites (
                                     id bigint NOT NULL,
                                     user_id integer NOT NULL,
                                     product_id integer NOT NULL,
                                     created_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone
);


ALTER TABLE public.user_favorites OWNER TO postgres;

--
-- Name: user_favorites_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.user_favorites_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.user_favorites_id_seq OWNER TO postgres;

--
-- Name: user_favorites_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.user_favorites_id_seq OWNED BY public.user_favorites.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
                            id integer NOT NULL,
                            username character varying(255) NOT NULL,
                            auth_key character varying(255) NOT NULL,
                            password_hash character varying(255) NOT NULL,
                            password_reset_token character varying(255),
                            email character varying(255) NOT NULL,
                            phones character varying(255),
                            status smallint DEFAULT 10 NOT NULL,
                            rememberme integer,
                            created_at integer NOT NULL,
                            updated_at integer NOT NULL,
                            verification_token character varying(255)
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.user_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.user_id_seq OWNER TO postgres;

--
-- Name: user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.user_id_seq OWNED BY public.users.id;


--
-- Name: user_password_restore; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.user_password_restore (
                                            id bigint NOT NULL,
                                            user_id integer NOT NULL,
                                            code character varying(60) NOT NULL,
                                            active boolean DEFAULT true NOT NULL
);


ALTER TABLE public.user_password_restore OWNER TO postgres;

--
-- Name: user_password_restore_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.user_password_restore_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.user_password_restore_id_seq OWNER TO postgres;

--
-- Name: user_password_restore_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.user_password_restore_id_seq OWNED BY public.user_password_restore.id;


--
-- Name: user_profile; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.user_profile (
                                   id bigint NOT NULL,
                                   user_id integer NOT NULL,
                                   first_name character varying(60),
                                   last_name character varying(60),
                                   phone character varying(60),
                                   address character varying(260),
                                   country character varying(60) DEFAULT NULL::character varying,
                                   city character varying(60) DEFAULT NULL::character varying
);


ALTER TABLE public.user_profile OWNER TO postgres;

--
-- Name: COLUMN user_profile.country; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.user_profile.country IS 'Город';


--
-- Name: COLUMN user_profile.city; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.user_profile.city IS 'Страна';


--
-- Name: user_profile_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.user_profile_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;


ALTER TABLE public.user_profile_id_seq OWNER TO postgres;

--
-- Name: user_profile_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.user_profile_id_seq OWNED BY public.user_profile.id;


--
-- Name: x; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.x (
                        id integer,
                        name character varying
);


ALTER TABLE public.x OWNER TO postgres;

--
-- Name: y; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.y (
  id integer
);


ALTER TABLE public.y OWNER TO postgres;

--
-- Name: addresses id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.addresses ALTER COLUMN id SET DEFAULT nextval('public.addresses_id_seq'::regclass);


--
-- Name: admin_menu id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin_menu ALTER COLUMN id SET DEFAULT nextval('public.admin_menu_id_seq'::regclass);


--
-- Name: brands id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.brands ALTER COLUMN id SET DEFAULT nextval('public.brands_id_seq'::regclass);


--
-- Name: cart id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cart ALTER COLUMN id SET DEFAULT nextval('public.cart_id_seq'::regclass);


--
-- Name: cart_items id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cart_items ALTER COLUMN id SET DEFAULT nextval('public.cart_items_id_seq'::regclass);


--
-- Name: city id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.city ALTER COLUMN id SET DEFAULT nextval('public.city_id_seq'::regclass);


--
-- Name: colors id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.colors ALTER COLUMN id SET DEFAULT nextval('public.colors_id_seq'::regclass);


--
-- Name: delivery_types id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.delivery_types ALTER COLUMN id SET DEFAULT nextval('public.delivery_types_id_seq'::regclass);


--
-- Name: file_types id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.file_types ALTER COLUMN id SET DEFAULT nextval('public.file_types_id_seq'::regclass);


--
-- Name: files id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.files ALTER COLUMN id SET DEFAULT nextval('public.files_id_seq'::regclass);


--
-- Name: groups id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.groups ALTER COLUMN id SET DEFAULT nextval('public.groups_id_seq'::regclass);


--
-- Name: ingredients id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ingredients ALTER COLUMN id SET DEFAULT nextval('public.ingredients_id_seq'::regclass);


--
-- Name: manufacturers id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.manufacturers ALTER COLUMN id SET DEFAULT nextval('public.manufacturer_id_seq'::regclass);


--
-- Name: menu id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.menu ALTER COLUMN id SET DEFAULT nextval('public.menu_id_seq'::regclass);


--
-- Name: metro id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.metro ALTER COLUMN id SET DEFAULT nextval('public.metro_id_seq'::regclass);


--
-- Name: order_items id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_items ALTER COLUMN id SET DEFAULT nextval('public.order_items_id_seq'::regclass);


--
-- Name: order_status id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_status ALTER COLUMN id SET DEFAULT nextval('public.order_status_id_seq'::regclass);


--
-- Name: orders id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders ALTER COLUMN id SET DEFAULT nextval('public.orders_id_seq'::regclass);


--
-- Name: packaging_type id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.packaging_type ALTER COLUMN id SET DEFAULT nextval('public.packaging_type_id_seq'::regclass);


--
-- Name: payment_types id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.payment_types ALTER COLUMN id SET DEFAULT nextval('public.payment_types_id_seq'::regclass);


--
-- Name: prices id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.prices ALTER COLUMN id SET DEFAULT nextval('public.prices_id_seq'::regclass);


--
-- Name: product_balance id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product_balance ALTER COLUMN id SET DEFAULT nextval('public.products_ballance_id_seq'::regclass);


--
-- Name: product_property id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product_property ALTER COLUMN id SET DEFAULT nextval('public.product_property_id_seq'::regclass);


--
-- Name: products id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products ALTER COLUMN id SET DEFAULT nextval('public.products_id_seq'::regclass);


--
-- Name: products_color_group id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products_color_group ALTER COLUMN id SET DEFAULT nextval('public.products_color_group_id_seq'::regclass);


--
-- Name: products_colors id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products_colors ALTER COLUMN id SET DEFAULT nextval('public.products_colors_id_seq'::regclass);


--
-- Name: products_ingredients id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products_ingredients ALTER COLUMN id SET DEFAULT nextval('public.products_ingredients_id_seq'::regclass);


--
-- Name: products_weight_group id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products_weight_group ALTER COLUMN id SET DEFAULT nextval('public.products_weight_group_id_seq'::regclass);


--
-- Name: property id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.property ALTER COLUMN id SET DEFAULT nextval('public.property_id_seq'::regclass);


--
-- Name: search_words id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.search_words ALTER COLUMN id SET DEFAULT nextval('public.search_words_id_seq'::regclass);


--
-- Name: settings id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.settings ALTER COLUMN id SET DEFAULT nextval('public.settings_id_seq'::regclass);


--
-- Name: sizes id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sizes ALTER COLUMN id SET DEFAULT nextval('public.sizes_id_seq'::regclass);


--
-- Name: stocks id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.stocks ALTER COLUMN id SET DEFAULT nextval('public.stocks_id_seq'::regclass);


--
-- Name: tree id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tree ALTER COLUMN id SET DEFAULT nextval('public.tree_id_seq'::regclass);


--
-- Name: units id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.units ALTER COLUMN id SET DEFAULT nextval('public.units_id_seq'::regclass);


--
-- Name: user_favorites id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.user_favorites ALTER COLUMN id SET DEFAULT nextval('public.user_favorites_id_seq'::regclass);


--
-- Name: user_password_restore id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.user_password_restore ALTER COLUMN id SET DEFAULT nextval('public.user_password_restore_id_seq'::regclass);


--
-- Name: user_profile id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.user_profile ALTER COLUMN id SET DEFAULT nextval('public.user_profile_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.user_id_seq'::regclass);


--
-- Data for Name: addresses; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.addresses (id, country_id, region_id, city_id, street_id, home_id, construction_id, building_id, office, address, index, metro_id) FROM stdin;
1	1	1	1	1	1	1	1	1	1	1	1
\.


--
-- Name: addresses_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.addresses_id_seq', 1, false);


--
-- Data for Name: admin_menu; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.admin_menu (id, root, lft, rgt, lvl, name, icon, icon_type, active, selected, disabled, readonly, visible, collapsed, movable_u, movable_d, movable_l, movable_r, removable, removable_all, child_allowed, url) FROM stdin;
5	2	2	3	1	Категории товаров		1	t	f	f	f	t	f	t	t	t	t	t	f	t	category
6	2	4	5	1	Товары		1	t	f	f	f	t	f	t	t	t	t	t	f	t	products
7	1	2	3	1	Бренд		1	t	f	f	f	t	f	t	t	t	t	t	f	t	brands
9	4	2	3	1	Заказы 		1	t	f	f	f	t	f	t	t	t	t	t	f	t	orders
10	1	6	7	1	Статусы заказов		1	t	f	f	f	t	f	t	t	t	t	t	f	t	order-status
8	1	4	5	1	Меню		1	t	f	f	f	t	f	t	t	t	t	t	f	t	menu
11	1	8	9	1	Цвета		1	t	f	f	f	t	f	t	t	t	t	t	f	t	colors
4	4	1	6	0	Клиенты		1	t	f	f	f	t	f	t	t	t	t	t	f	t
12	4	4	5	1	Пользователи		1	t	f	f	f	t	f	t	t	t	t	t	f	t	user
3	3	1	2	0	Настройки		1	f	f	f	f	f	f	t	t	t	t	t	f	t
13	1	10	11	1	Города		1	t	f	f	f	t	f	t	t	t	t	t	f	t	city
14	1	12	13	1	Производители		1	t	f	f	f	t	f	t	t	t	t	t	f	t	manufacturers
15	1	14	15	1	Поисковые слова		1	t	f	f	f	t	f	t	t	t	t	t	f	t	search-words
16	1	16	17	1	Свойства товаров		1	t	f	f	f	t	f	t	t	t	t	t	f	t	property
2	2	1	8	0	Каталог		1	t	f	f	f	t	f	t	t	t	t	t	f	t	products
17	2	6	7	1	Склад		1	t	f	f	f	t	f	t	t	t	t	t	f	t	stocks
1	1	1	20	0	Справочники		1	t	f	f	f	f	f	t	t	t	t	t	f	t	23132132131
18	1	18	19	1	Размеры		1	t	f	f	f	t	f	t	t	t	t	t	f	t	sizes
\.


--
-- Name: admin_menu_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.admin_menu_id_seq', 18, true);


--
-- Data for Name: brands; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.brands (id, name, show) FROM stdin;
17	 Nordside	1
18	Poritep	1
\.


--
-- Name: brands_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.brands_id_seq', 18, true);


--
-- Data for Name: cart; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cart (id, user_id, created_at, updated_at, deleted_at) FROM stdin;
1	4	2022-11-29 10:05:37	2022-11-29 10:05:37	\N
2	23	2023-01-13 21:27:51	2023-01-13 21:27:51	\N
\.


--
-- Name: cart_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cart_id_seq', 2, true);


--
-- Data for Name: cart_items; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cart_items (id, cart_id, product_id, quantity, created_at, updated_at, deleted_at) FROM stdin;
56	2	42	1	2023-01-13 21:27:51	2023-01-13 21:27:51	\N
\.


--
-- Name: cart_items_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cart_items_id_seq', 56, true);


--
-- Data for Name: category; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.category (id, parent_id, name, show) FROM stdin;
3	1	Брусок	1
5	1	Доска	1
2	1	Брус	1
7	0	Инструменты	0
4	1	Вагонка	1
6	0	Электрика	0
9	7	Ручной инструмент	\N
1	0	Пиломатериалы	0
10	0	Пилы	\N
11	0	Пилы	\N
\.


--
-- Name: category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.category_id_seq', 11, true);


--
-- Data for Name: category_type; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.category_type (id, name, show) FROM stdin;
1	Холистик корма	1
2	Сухие корма	1
3	Ветеринарные корма	1
4	Лакомства	1
5	Ветеринарная аптека	1
6	Витамины, пищ. добавки	1
7	Груминг, Косметика	1
8	Игрушки	1
9	Гигиена, пеленки	1
10	Транспортировка, переноски	1
11	Лежаки	1
\.


--
-- Name: category_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.category_type_id_seq', 1, false);


--
-- Data for Name: city; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.city (id, name, region_id, country_id, show) FROM stdin;
2	Питер	1	1	1
1	Москва	1	1	1
\.


--
-- Name: city_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.city_id_seq', 3, false);


--
-- Data for Name: colors; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.colors (id, name, color, show, "default") FROM stdin;
1	Белый	#ffffff	1	1
2	Черный	#000000	1	0
\.


--
-- Name: colors_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.colors_id_seq', 3, true);


--
-- Data for Name: country; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.country (id, name) FROM stdin;
\.


--
-- Name: country_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.country_id_seq', 1, false);


--
-- Data for Name: delivery; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.delivery (id, name, created_at, updated_at) FROM stdin;
\.


--
-- Name: delivery_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.delivery_id_seq', 1, false);


--
-- Data for Name: delivery_status; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.delivery_status (id, order_id, delivery_id, created_at, updated_at) FROM stdin;
\.


--
-- Name: delivery_status_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.delivery_status_id_seq', 1, false);


--
-- Data for Name: delivery_types; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.delivery_types (id, name, show) FROM stdin;
1	Доставка курьером	1
2	Самовывоз	1
3	Почта России	1
4	EMS Почта России	1
\.


--
-- Name: delivery_types_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.delivery_types_id_seq', 5, false);


--
-- Data for Name: file_types; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.file_types (id, name) FROM stdin;
1	file
2	video
\.


--
-- Name: file_types_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.file_types_id_seq', 3, false);


--
-- Data for Name: files; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.files (id, table_name, table_id, file_type_id, original, thumbnail, size, main, show, created_at, updated_at) FROM stdin;
1	products	5	1	/images/products/5/5f91943b763dc.jpg	/images/products/5/5f91943b7c748.jpg	main	1	1	1603385584	1603385584
2	products	1	1	/images/products/1/5f91cfe930320.jpg	/images/products/1/5f91cfe9425fb.jpg	main	1	1	1603391469	1603391469
3	products	3	1	/images/products/3/5f936d9507596.jpg	/images/products/3/5f936d951d826.jpg	main	1	1	1603497368	1603497368
4	products	6	1	/images/products/6/5f9375805bf50.jpg	/images/products/6/5f937580647fb.jpg	main	1	1	1603499400	1603499400
5	products	8	1	/images/products/8/5f937722b75a6.jpg	/images/products/8/5f937722bcfb4.jpg	main	1	1	1603499813	1603499813
6	products	11	1	/images/products/11/5f937742bd4a6.jpg	/images/products/11/5f937742c175f.jpg	main	1	1	1603499846	1603499846
8	products	7	1	/images/products/7/5f937779545e1.jpg	/images/products/7/5f9377795cbf5.jpg	main	1	1	1603499900	1603499900
10	products	12	1	/images/products/12/5f9377b7b502c.jpg	/images/products/12/5f9377b7b8821.jpg	main	1	1	1603499962	1603499962
11	products	17	1	/images/products/17/5f937e9aca47a.jpg	/images/products/17/5f937e9acec29.jpg	main	1	1	1603501725	1603501725
12	products	2	1	/images/products/2/5f9380edaf2b3.jpg	/images/products/2/5f9380edb3005.jpg	main	1	1	1603502320	1603502320
13	products	4	1	/images/products/4/5f93813cabcab.jpg	/images/products/4/5f93813caf2bd.jpg	main	1	1	1603502398	1603502398
14	products	9	1	/images/products/9/5f9381b749ce0.jpg	/images/products/9/5f9381b74ecce.jpg	main	1	1	1603502521	1603502521
15	products	18	1	/images/products/18/5f9384b34ca21.jpg	/images/products/18/5f9384b351255.jpg	main	1	1	1603503287	1603503287
16	products	19	1	/images/products/19/5f9384df6455a.jpg	/images/products/19/5f9384df68474.jpg	main	1	1	1603503347	1603503347
17	products	20	1	/images/products/20/5f938508470e3.jpg	/images/products/20/5f9385084adf0.jpg	main	1	1	1603503373	1603503373
18	products	21	1	/images/products/21/5f93854282240.jpg	/images/products/21/5f93854285736.jpg	main	1	1	1603503428	1603503428
19	products	22	1	/images/products/22/5f93855c915df.jpg	/images/products/22/5f93855c94752.jpg	main	1	1	1603503454	1603503454
20	products	23	1	/images/products/23/5f93857c5f929.jpg	/images/products/23/5f93857c62ca5.jpg	main	1	1	1603503486	1603503486
21	products	24	1	/images/products/24/5f9385df9bc48.jpg	/images/products/24/5f9385df9fd77.jpg	main	1	1	1603503586	1603503586
22	products	25	1	/images/products/25/5f938610081fa.jpg	/images/products/25/5f9386100b56a.jpg	main	1	1	1603503638	1603503638
46	tree	5	1	/images/categories/5/63a87f8487feb.jpg	/images/categories/5/63a87f84b3b6b.jpg	main	0	1	1671987076	1671987076
26	products	28	1	/images/products/28/631c87172897f.jpeg	/images/products/28/631c871828e26.jpeg	main	1	1	1662813976	1662813976
27	products	41	1	/images/products/41/6345a5d0d0786.jpg	/images/products/41/6345a5d1c5585.jpg	main	1	1	1665508817	1665508817
7	products	10	1	/images/products/10/5f93776220f97.jpg	/images/products/10/5f9377622729b.jpg	main	1	1	1632352179	1632352179
23	products	10	1	/images/products/10/614bb7a4e9001.jpg	/images/products/10/614bb7a502a17.jpg	main	1	1	1632352175	1632352175
28	products	41	1	/images/products/41/6346a65feedc2.jpg	/images/products/41/6346a6612d772.jpg	main	1	1	1665574497	1665574497
30	products	30	1	/images/products/30/6347e6a9700ce.jpg	/images/products/30/6347e6aaa1f7f.jpg	main	1	1	1665656951	1665656951
31	products	31	1	/images/products/31/6347e6b026cf2.jpg	/images/products/31/6347e6b03d1ef.jpg	main	1	1	1665656953	1665656953
39	products	30	1	/images/products/30/63640653ce244.jpg	/images/products/30/63640653e78d9.jpg	main	0	1	1667499604	1667499604
40	products	30	1	/images/products/30/636406856e788.jpg	/images/products/30/636406857aa54.jpg	main	0	1	1667499653	1667499653
32	products	29	1	/images/products/29/6347e6d19fde4.png	/images/products/29/6347e6d2ed7c4.png	main	1	1	1665657966	1665657966
33	products	42	1	/images/products/42/634844a2031e6.jpg	/images/products/42/634844a2b4c9b.jpg	main	0	1	1665680546	1665680546
35	tree	12	1	/images/categories/12/6363d1df357ab.jpg	/images/categories/12/6363d1df4b943.jpg	main	0	1	1667486175	1667486175
36	products	30	1	/images/products/30/63640093bf8a0.jpg	/images/products/30/63640093d9014.jpg	main	0	1	1667498131	1667498131
37	products	30	1	/images/products/30/63640360a884b.jpg	/images/products/30/63640360c0456.jpg	main	0	1	1667498848	1667498848
38	products	30	1	/images/products/30/636406335416e.jpg	/images/products/30/63640633619bc.jpg	main	0	1	1667499571	1667499571
41	products	30	1	/images/products/30/63640695d3769.jpg	/images/products/30/63640695eb75b.jpg	main	0	1	1667499670	1667499670
42	products	30	1	/images/products/30/6364069fc0dc7.jpg	/images/products/30/6364069fcd276.jpg	main	0	1	1667499679	1667499679
47	tree	6	1	/images/categories/6/63a87fa2ad7dd.jpg	/images/categories/6/63a87fa2c62db.jpg	main	0	1	1671987106	1671987106
45	tree	5	1	/images/categories/5/63650e949e30c.png	/images/categories/5/63650e976561f.png	main	0	1	1667567256	1667567256
34	tree	11	1	/images/categories/11/6396168667bb1.jpg	/images/categories/11/639616868bbf2.jpg	main	0	1	1670780550	1670780550
52	tree	8	1	/images/categories/8/636691875c84b.jpg	/images/categories/8/6366918776ef0.jpg	main	0	1	1667666311	1667666311
53	tree	9	1	/images/categories/9/63669a22f127e.jpg	/images/categories/9/63669a231efca.jpg	main	0	1	1667668515	1667668515
54	products	36	1	/images/products/36/636a046f253d1.jpg	/images/products/36/636a046fec64c.jpg	main	0	1	1667892336	1667892336
55	products	37	1	/images/products/37/636a059ae2e5e.jpg	/images/products/37/636a059af3b54.jpg	main	0	1	1667892635	1667892635
56	products	38	1	/images/products/38/636a05b43f7cd.jpg	/images/products/38/636a05b44a8e1.jpg	main	0	1	1667892660	1667892660
49	tree	7	1	/images/categories/7/63a87fdac9daf.jpg	/images/categories/7/63a87fdade89f.jpg	main	0	1	1671987163	1671987163
48	tree	19	1	/images/categories/19/63a87ff493dfc.jpg	/images/categories/19/63a87ff4a5680.jpg	main	0	1	1671987188	1671987188
50	tree	20	1	/images/categories/20/63a880174350f.png	/images/categories/20/63a8801836f72.png	main	0	1	1671987224	1671987224
51	tree	21	1	/images/categories/21/63a88052c6c92.jpg	/images/categories/21/63a88052e78d3.jpg	main	0	1	1671987283	1671987283
58	products	40	1	/images/products/40/6390e5297db2a.jpg	/images/products/40/6390e52a5b5d2.jpg	main	0	1	1670440234	1670440234
59	products	40	1	/images/products/40/6390e72e65945.jpg	/images/products/40/6390e72e951a8.jpg	main	0	1	1670440750	1670440750
60	products	40	1	/images/products/40/6390e7d36a885.jpg	/images/products/40/6390e7d398247.jpg	main	0	1	1670440915	1670440915
61	products	40	1	/images/products/40/6390e91d5df7d.jpg	/images/products/40/6390e91d899b5.jpg	main	0	1	1670441245	1670441245
62	products	40	1	/images/products/40/6390e9471e173.jpg	/images/products/40/6390e94759fa3.jpg	main	0	1	1670441287	1670441287
63	products	35	1	/images/products/35/6390f8cdc361d.png	/images/products/35/6390f8ce9c219.png	main	0	1	1670445262	1670445262
64	products	35	1	/images/products/35/6390f9e9ee833.png	/images/products/35/6390f9ea78c10.png	main	0	1	1670445546	1670445546
65	products	35	1	/images/products/35/6390fb213e10d.png	/images/products/35/6390fb21bd850.png	main	0	1	1670445857	1670445857
66	products	35	1	/images/products/35/6390fbddb76c2.png	/images/products/35/6390fbde74878.png	main	0	1	1670446046	1670446046
67	products	35	1	/images/products/35/6390fc27c3dab.png	/images/products/35/6390fc284c9e0.png	main	0	1	1670446120	1670446120
78	products	43	1	/images/products/43/6391a427e4611.png	/images/products/43/6391a428899c5.png	main	0	1	1670489128	1670489128
79	products	43	1	/images/products/43/6391a4be418d0.png	/images/products/43/6391a4beefa84.png	main	0	1	1670489279	1670489279
80	products	43	1	/images/products/43/6391a4cc2048a.png	/images/products/43/6391a4cd1efe0.png	main	0	1	1670489293	1670489293
81	products	43	1	/images/products/43/6391a518721d1.png	/images/products/43/6391a519240f7.png	main	0	1	1670489369	1670489369
82	products	43	1	/images/products/43/6391a520b2ed2.png	/images/products/43/6391a5216ace4.png	main	0	1	1670489377	1670489377
83	products	43	1	/images/products/43/6391a52d073ba.png	/images/products/43/6391a52dc8127.png	main	0	1	1670489390	1670489390
84	products	43	1	/images/products/43/6391a561a137b.png	/images/products/43/6391a56260f9a.png	main	0	1	1670489442	1670489442
85	products	43	1	/images/products/43/6391a56faecf0.png	/images/products/43/6391a5707f489.png	main	0	1	1670489456	1670489456
86	products	43	1	/images/products/43/6391a57cd9c60.png	/images/products/43/6391a57dae24e.png	main	0	1	1670489469	1670489469
87	products	43	1	/images/products/43/6391a5cc43a49.png	/images/products/43/6391a5cd027d5.png	main	0	1	1670489549	1670489549
88	products	43	1	/images/products/43/6391a5e191ce3.png	/images/products/43/6391a5e22ff26.png	main	0	1	1670489570	1670489570
89	products	43	1	/images/products/43/6391a5fa3741f.png	/images/products/43/6391a5fad5a9e.png	main	0	1	1670489595	1670489595
90	products	43	1	/images/products/43/6391a6484e7f3.png	/images/products/43/6391a648edf33.png	main	0	1	1670489673	1670489673
91	products	43	1	/images/products/43/6391a65629762.png	/images/products/43/6391a656a8c5c.png	main	0	1	1670489686	1670489686
92	products	43	1	/images/products/43/6391a6a679954.png	/images/products/43/6391a6a727462.png	main	0	1	1670489767	1670489767
93	products	43	1	/images/products/43/6391a6ba15ae4.png	/images/products/43/6391a6ba99f7f.png	main	0	1	1670489786	1670489786
94	products	43	1	/images/products/43/6391a6c699519.png	/images/products/43/6391a6c74a2e8.png	main	0	1	1670489799	1670489799
95	products	43	1	/images/products/43/6391a6f24bd62.png	/images/products/43/6391a6f2e3421.png	main	0	1	1670489843	1670489843
96	products	43	1	/images/products/43/6391a70269f15.png	/images/products/43/6391a70315e5e.png	main	0	1	1670489859	1670489859
97	products	43	1	/images/products/43/6391a732dfbaf.png	/images/products/43/6391a7337654a.png	main	0	1	1670489907	1670489907
98	products	43	1	/images/products/43/6391a73d8ef3a.png	/images/products/43/6391a73e4b96a.png	main	0	1	1670489918	1670489918
99	products	43	1	/images/products/43/6391a750d4847.png	/images/products/43/6391a7516a769.png	main	0	1	1670489937	1670489937
100	products	43	1	/images/products/43/6391a7770d676.png	/images/products/43/6391a777cda7b.png	main	0	1	1670489976	1670489976
101	products	43	1	/images/products/43/6391a7bf40069.png	/images/products/43/6391a7bfe44d2.png	main	0	1	1670490048	1670490048
102	products	43	1	/images/products/43/6391a7c73933c.png	/images/products/43/6391a7c7bd108.png	main	0	1	1670490055	1670490055
103	products	43	1	/images/products/43/6391a7da5ad6e.png	/images/products/43/6391a7db2421e.png	main	0	1	1670490075	1670490075
105	products	43	1	/images/products/43/6391aa0e2b7d5.png	/images/products/43/6391aa0ee6d01.png	main	0	1	1670490639	1670490639
106	products	43	1	/images/products/43/6391aa2d9bfb2.png	/images/products/43/6391aa2e2d494.png	main	0	1	1670490670	1670490670
107	products	43	1	/images/products/43/6391abbb83686.png	/images/products/43/6391abbc10af8.png	main	0	1	1670491068	1670491068
108	products	43	1	/images/products/43/6391abf1bea3b.png	/images/products/43/6391abf26d712.png	main	0	1	1670491122	1670491122
69	products	43	1	/images/products/43/6391968b5edff.png	/images/products/43/6391968bea135.png	main	0	1	1670492629	1670492629
71	products	43	1	/images/products/43/639197af9f6f6.png	/images/products/43/639197b04d73e.png	main	0	1	1670492638	1670492638
70	products	43	1	/images/products/43/639196abbcdf9.png	/images/products/43/639196ac51de6.png	main	0	1	1670492684	1670492684
72	products	43	1	/images/products/43/639198677de07.png	/images/products/43/63919868164fc.png	main	1	1	1670492962	1670492962
73	products	43	1	/images/products/43/6391989c068ed.png	/images/products/43/6391989cc061c.png	main	1	1	1670493017	1670493017
57	products	35	1	/images/products/35/639099b74bcf9.jpg	/images/products/35/639099b86cae4.jpg	main	0	1	1671124343	1671124343
109	products	43	1	/images/products/43/6391ac0594136.png	/images/products/43/6391ac06643d8.png	main	0	1	1670491142	1670491142
110	products	43	1	/images/products/43/6391ac357d227.png	/images/products/43/6391ac36428df.png	main	0	1	1670491190	1670491190
111	products	43	1	/images/products/43/6391b0c3bbaa9.png	/images/products/43/6391b0c449aaa.png	main	0	1	1670492356	1670492356
68	products	43	1	/images/products/43/6391956f175e5.png	/images/products/43/6391957086b8f.png	main	0	1	1670492365	1670492365
112	products	43	1	/images/products/43/6391b0d004627.png	/images/products/43/6391b0d08cb4b.png	main	0	1	1670492368	1670492368
113	products	43	1	/images/products/43/6391b0df83056.png	/images/products/43/6391b0e019864.png	main	0	1	1670492384	1670492384
114	products	43	1	/images/products/43/6391b1e061c6c.png	/images/products/43/6391b1e0eb878.png	main	0	1	1670492641	1670492641
115	products	43	1	/images/products/43/6391b1f56dc87.jpg	/images/products/43/6391b1f5a636b.jpg	main	0	1	1670492670	1670492670
116	products	44	1	/images/products/44/6395fee6e0739.png	/images/products/44/6395feec97d27.png	main	1	1	1670774588	1670774588
120	products	44	1	/images/products/44/6395ff8910a62.png	/images/products/44/6395ff8dda5aa.png	main	0	1	1670774671	1670774671
121	products	44	1	/images/products/44/6395fff564a39.png	/images/products/44/6395fff942830.png	main	0	1	1670774778	1670774778
122	products	44	1	/images/products/44/639600034b184.png	/images/products/44/63960005320aa.png	main	0	1	1670774789	1670774789
123	products	44	1	/images/products/44/6396000b3ce22.png	/images/products/44/6396000cdaa90.png	main	0	1	1670774797	1670774797
124	products	44	1	/images/products/44/63960067bef4b.png	/images/products/44/6396006836606.png	main	0	1	1670774888	1670774888
126	products	42	1	/images/products/42/63a71dff3afc9.jpg	/images/products/42/63a71dff5449c.jpg	main	0	1	1671896575	1671896575
128	products	26	1	/images/products/26/63b52c077219e.jpg	/images/products/26/63b52c08a9f87.jpg	main	0	1	1672817684	1672817684
129	products	26	1	/images/products/26/63b52c0e2574e.jpg	/images/products/26/63b52c0e54947.jpg	main	1	1	1672817685	1672817685
\.


--
-- Name: files_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.files_id_seq', 129, true);


--
-- Data for Name: groups; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.groups (id) FROM stdin;
1
2
3
\.


--
-- Name: groups_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.groups_id_seq', 4, false);


--
-- Data for Name: ingredients; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ingredients (id, name, show) FROM stdin;
1	Говядина	1
2	Гречка	1
3	Гусь	1
4	Индейка	1
5	Кабан	1
6	Картофель	1
7	Кролик	1
8	Кукуруза, пшеница	1
9	Курица	1
10	Лапша	1
11	Лосось, семга, форель	1
12	Молоко, сыр, творог	1
13	Морковь	1
14	Мясной коктейль	1
15	Овсянка	1
16	Олень, лось	1
17	Печень	1
18	Птица	1
19	Рис белый	1
20	Рис коричневый	1
21	Рыба / морепродукты	1
22	Свинина	1
23	Сердце	1
24	Соя	1
25	Телятина	1
26	Тунец	1
27	Утка	1
28	Яблоко	1
29	Ягненок	1
30	Яйцо	1
31	Ячмень	1
\.


--
-- Name: ingredients_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ingredients_id_seq', 4, false);


--
-- Name: manufacturer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.manufacturer_id_seq', 56, true);


--
-- Data for Name: manufacturers; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.manufacturers (id, name, show) FROM stdin;
1	Россия	1
56	Китай	1
\.


--
-- Data for Name: menu; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.menu (id, parent_id, name, url, show) FROM stdin;
1	0	Товары		1
2	1	Товары	products	1
3	1	Товары по весу	weight-groups	1
4	1	Товары по цвету	color-groups	1
5	0	Справочники		1
6	5	Пользователи	user	1
7	5	Категории товаров	category	1
8	5	Типы категорий	category-type	1
9	5	Производители	manufacturers	1
10	5	Изображения	file	1
11	5	Меню	menu	1
12	5	Города	city	1
13	5	Способы оплаты	payment-types	1
14	0	Настройки		1
15	5	Тип упаковки	packaging-type	1
16	5	Ингридиенты	ingredients	1
17	5	Цвета	colors	1
18	0	Заказы/покупки		1
19	18	Заказы	orders	1
20	1	Отзывы	review	1
21	5	Типы доставки	delivery-types	1
22	14	Выбор города	city	1
23	14	Вывод полей	settings-fields	1
\.


--
-- Name: menu_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.menu_id_seq', 24, false);


--
-- Data for Name: metro; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.metro (id, name) FROM stdin;
\.


--
-- Name: metro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.metro_id_seq', 1, false);


--
-- Data for Name: migration; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migration (version, apply_time) FROM stdin;
m000000_000000_base	1663138033
m180604_202836_create_cart_items_table	1664385719
m230416_200116_tree	1664817154
m230417_200117_alter_tree	1664817154
m130524_201442_init	1666193996
m190124_110200_add_verification_token_column_to_user_table	1666193996
m221019_153302_add_column_price_to_products	1666193996
m221020_174715_add_column_code_products	1666289108
m221023_125730_create_brand	1666533474
m221023_135125_add_column_brand_id_products	1666533474
m221023_144010_add_column_show_brand	1666536370
m221023_161251_create_admin_menu	1666541709
m221024_064456_add_column_child_allowed_admin_menu	1666593951
m221024_091230_add_column_url_admin_menu	1666602973
m221026_161813_create_user_favorites	1666869800
m221120_125121_create_user_password_restore	1669213330
m221126_191531_create_user_profile	1669490881
m221128_150429_create_cart	1669653627
m221128_150436_create_cart_items	1669653739
m221203_184624_order_items	1670095739
m221204_121208_add_column_to_user_profile	1670156515
m221204_121403_add_column_to_user_profile	1670156515
m221203_184705_add_user_to_orders	1670161800
m221204_132710_add_column_user_orders	1670161800
m221204_132939_add_column_accept_orders	1670162291
m221204_141717_create_orders	1670163611
m221204_184425_create_order_status	1670179862
m221204_185447_add_column_status_orders	1670180290
m221204_220242_add_column_comment_orders	1670273537
m221205_204855_add_column_color_order_status	1670273537
m221207_080503_add_column_price_orders	1670400870
m221211_121704_create_search_words	1670763698
m221212_192658_create_property	1670874144
m221212_192704_create_product_property	1670874144
m220215_144912_create_table_favorites	1672074743
m230101_085141_add_field_to_products_ballance	1672567744
m230101_085432_create_products_sizes	1672693575
m230101_085455_add_field_size_id_to_products_ballance	1672693600
m230102_091546_add_column_products_ballance	1672693600
m230106_130006_add_column_default_colors	1673010979
m230106_131340_add_column_default_sizes	1673010979
\.


--
-- Data for Name: order_items; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.order_items (id, order_id, product_id, quantity, created_at, updated_at, deleted_at) FROM stdin;
1	38	42	2	2022-12-05 20:26:18	2022-12-05 20:26:18	\N
\.


--
-- Name: order_items_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.order_items_id_seq', 1, true);


--
-- Data for Name: order_status; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.order_status (id, name, show, color) FROM stdin;
1	В обработке	1	#ff0000
2	Оплачен	1	#6aa84f
\.


--
-- Name: order_status_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.order_status_id_seq', 2, true);


--
-- Data for Name: orders; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.orders (id, user_id, accept, created_at, updated_at, deleted_at, status_id, comment, price) FROM stdin;
23	4	\N	2022-12-05 01:12:46	2022-12-05 01:12:46	\N	1	\N	0
31	4	\N	2022-12-05 18:59:13	2022-12-05 18:59:13	\N	1	\N	0
33	4	\N	2022-12-05 20:24:04	2022-12-05 20:24:04	\N	1	\N	0
32	4	\N	2022-12-05 20:23:42	2022-12-05 20:23:42	\N	2	\N	0
35	4	\N	2022-12-05 20:24:58	2022-12-05 20:24:58	\N	2	\N	0
34	4	\N	2022-12-05 20:24:19	2022-12-05 20:24:19	\N	2	\N	0
29	4	\N	2022-12-05 18:58:39	2022-12-05 18:58:39	\N	2	\N	0
30	4	\N	2022-12-05 18:58:49	2022-12-05 18:58:49	\N	2	\N	0
37	4	\N	2022-12-05 20:25:24	2022-12-05 20:25:24	\N	1	\N	0
27	4	\N	2022-12-05 18:55:40	2022-12-05 18:55:40	\N	2	\N	0
28	4	\N	2022-12-05 18:57:36	2022-12-05 18:57:36	\N	1	\N	6000
1	4	\N	2022-12-04 17:20:26	2022-12-04 17:20:26	\N	1	2131312	1000
38	4	\N	2022-12-05 20:25:43	2022-12-05 20:25:43	\N	2	\N	260000
36	4	\N	2022-12-05 20:25:17	2022-12-05 20:25:17	\N	1	\N	7000
39	4	\N	2022-12-05 20:26:18	2022-12-05 20:26:18	\N	2		1000
\.


--
-- Name: orders_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.orders_id_seq', 39, true);


--
-- Data for Name: packaging_type; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.packaging_type (id, name, show) FROM stdin;
1	Tetra Pak	1
2	Банка	1
3	Ламистер	1
4	Паучи	1
\.


--
-- Name: packaging_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.packaging_type_id_seq', 4, false);


--
-- Data for Name: payment_types; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.payment_types (id, name, show, created_at, updated_at) FROM stdin;
1	Картой онлайн	1	1555754591	1555754591
2	Наличными курьеру	1	1555754591	1555754591
3	Картой курьеру	1	1555754591	1555754591
4	QIWI	1	1555754591	1555754591
\.


--
-- Name: payment_types_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.payment_types_id_seq', 5, false);


--
-- Data for Name: price_history; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.price_history (id, price) FROM stdin;
\.


--
-- Name: price_history_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.price_history_id_seq', 1, false);


--
-- Data for Name: prices; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.prices (id, value, show, created_at, updated_at) FROM stdin;
1	1000	1	1555754591	1555754591
2	1060	1	1555754591	1555754591
\.


--
-- Name: prices_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.prices_id_seq', 3, false);


--
-- Data for Name: product_balance; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.product_balance (id, stock_id, product_id, quantity, show, color_id, size_id, created_at, updated_at) FROM stdin;
32	1	45	12	\N	2	2	2023-01-02 16:30:50	2023-01-02 16:30:50
36	1	26	12	\N	2	2	2023-01-02 16:31:02	2023-01-02 16:31:02
35	1	26	4	\N	1	1	2023-01-02 16:31:00	2023-01-02 16:31:00
44	2	43	4	\N	1	1	2023-01-02 18:02:52	2023-01-02 18:02:52
33	1	26	5	\N	2	1	2023-01-02 16:30:53	2023-01-02 16:30:53
\.


--
-- Data for Name: product_leftovers; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.product_leftovers (id, product_id, quantity, subtotal, created_at, updated_at) FROM stdin;
\.


--
-- Name: product_leftovers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.product_leftovers_id_seq', 1, false);


--
-- Data for Name: product_property; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.product_property (id, product_id, property_id, created_at) FROM stdin;
1	62	3	2022-12-12 23:25:11
3	43	1	2022-12-13 00:36:36
38	28	3	2022-12-23 19:21:15
39	44	4	2022-12-23 19:21:51
40	40	4	2022-12-23 19:30:13
41	41	2	2022-12-24 15:42:24
4	26	4	2022-12-13 00:36:43
2	42	3	2022-12-13 00:29:07
5	35	4	2022-12-14 00:26:53
\.


--
-- Name: product_property_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.product_property_id_seq', 41, true);


--
-- Data for Name: products; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.products (id, name, category_id, manufacturer_id, packaging_type_id, weight, description, color_id, main, show, created_at, updated_at, price, code, brand_id) FROM stdin;
49	Товар 48	11	1	\N	100		1	1	1	1665649638	1665649638	0	\N	0
45	Товар 26	11	1	\N	100		1	1	1	1665649532	1665649532	0	\N	0
51	Товар 25	11	1	\N	100		1	1	1	1665649724	1665649724	0	\N	0
43	Товар 31	11	1	\N	100		2	0	0	1670880995	1670880995	0		17
29	Толвар 2	3	1	\N	\N		1	0	0	1666797354	1666797354	5600		14
28	Брусок сухой	11	1	\N	\N		2	1	1	1671812475	1671812475	12000		18
36	Кирпич	5	1	\N	\N		1	0	0	1667892342	1667892342	0		14
37	Лобзик	5	1	\N	\N		1	0	0	1667892626	1667892626	0		14
38	Шуруповерт	13	1	\N	\N		1	0	0	1667892653	1667892653	0		14
44	Товар 27	11	1	\N	6700		2	1	1	1671812511	1671812511	0		17
50	Товар 26	11	1	\N	100		1	1	1	1665649681	1665649681	0	\N	17
47	Товар 28	11	1	\N	100		1	1	1	1665649592	1665649592	0	\N	17
26	Брусок сухой строганый 50х50х3000 мм сорт АВ хвойные породы	11	1	\N	100	Предназначен для применения во многих видах строительных и ремонтных работ, например: возведение каркасов, устройство обрешеток, в столярном и мебельном производстве.	2	1	1	1673470325	1673470325	6500		17
48	Товар 24	11	1	\N	100		1	1	1	1665649632	1665649632	0	\N	18
40	Дрель 1	13	1	\N	100	1	2	1	1	1671813017	1671813017	12222		17
41	Линейка	11	56	\N	\N	Газобетон – ячеистый бетон автоклавного твердения.\r\nПредназначен для возведения перегородок в малоэтажном строительстве, в высотном строительстве газобетонные блоки применяются при монолитно-каркасном строительстве зданий.\r\n	2	0	0	1671885743	1671885743	10000		17
42	Товар 2	11	1	\N	100	Газобетонные блоки толщиной 85 мм, 100 мм и 150 мм используются для возведения перегородок, блоки толщиной 200 мм и 250 мм – для возведения наружных стен зданий с сезонным проживанием с весны по осень, блоки толщиной 300 мм, 375 мм и 400 мм для возведения наружных стен зданий с круглогодичным проживанием.	2	1	1	1673472119	1673472119	12500	А-10000	17
35	Толвар 9	11	1	\N	\N		2	1	1	1673473556	1673473556	5000		17
46	Товар 29	11	1	\N	100		2	0	0	1670781947	1670781947	0		17
52	Товар 23	12	56	\N	800		2	0	0	1670870208	1670870208	10000	4511	18
53	Дрель 23	17	1	\N	\N		2	0	0	1670870264	1670870264	100000		17
62	123123	13	1	\N	\N		2	0	0	1670878436	1670878436	\N		17
\.


--
-- Name: products_ballance_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.products_ballance_id_seq', 44, true);


--
-- Data for Name: products_color_group; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.products_color_group (id, product_id, group_id) FROM stdin;
\.


--
-- Name: products_color_group_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.products_color_group_id_seq', 4, false);


--
-- Data for Name: products_colors; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.products_colors (id, product_id, color_id) FROM stdin;
1	1	1
2	2	2
3	3	4
\.


--
-- Name: products_colors_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.products_colors_id_seq', 4, false);


--
-- Name: products_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.products_id_seq', 62, true);


--
-- Data for Name: products_ingredients; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.products_ingredients (id, product_id, ingredient_id) FROM stdin;
1	1	1
2	2	2
3	3	4
\.


--
-- Name: products_ingredients_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.products_ingredients_id_seq', 4, false);


--
-- Data for Name: products_packaging_type; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.products_packaging_type (id, product_id, packaging_type_id) FROM stdin;
1	1	1
2	2	2
3	3	4
\.


--
-- Name: products_packaging_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.products_packaging_type_id_seq', 4, false);


--
-- Data for Name: products_prices; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.products_prices (id, product_id, price_id) FROM stdin;
1	1	1
2	2	1
3	3	1
\.


--
-- Name: products_prices_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.products_prices_id_seq', 4, false);


--
-- Data for Name: products_weight_group; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.products_weight_group (id, product_id, group_id) FROM stdin;
1	1	1
2	2	1
3	3	1
\.


--
-- Name: products_weight_group_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.products_weight_group_id_seq', 4, false);


--
-- Data for Name: property; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.property (id, name, prefix, show) FROM stdin;
2	Распродажа	sale	1
1	Новинка	new	1
3	Горячее предложение	hot	1
4	Лучшее предложение	best	1
\.


--
-- Name: property_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.property_id_seq', 4, true);


--
-- Data for Name: rating; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.rating (id, products_id, user_id, value) FROM stdin;
1	1	1	5
\.


--
-- Name: rating_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.rating_id_seq', 1, false);


--
-- Data for Name: region; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.region (id, name, country_id) FROM stdin;
\.


--
-- Name: region_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.region_id_seq', 1, false);


--
-- Data for Name: review; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.review (id, user_id, product_id, city_id, name, positive, negative, status, created_at, updated_at) FROM stdin;
\.


--
-- Name: review_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.review_id_seq', 1, false);


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.roles (id, name, created_at, updated_at) FROM stdin;
1	name	2022-10-26 20:51:01.409+03	2022-10-26 20:51:01.409+03
\.


--
-- Name: roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.roles_id_seq', 1, false);


--
-- Data for Name: search_words; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.search_words (id, user_id, ip, word, created_at) FROM stdin;
1	4	127.0.0.1	123	2022-12-11 16:27:20
2	\N	127.0.0.1	1231231231321321	2022-12-11 16:27:42
3	\N	127.0.0.1	ываыва	2022-12-11 16:51:14
4	\N	127.0.0.1	ываыва	2022-12-11 16:51:27
5	\N	127.0.0.1	ываыва	2022-12-11 16:52:16
6	\N	127.0.0.1	ываыва	2022-12-11 16:52:29
7	\N	127.0.0.1	ываыва	2022-12-11 16:52:33
8	\N	127.0.0.1	ываыва	2022-12-11 16:52:41
9	\N	127.0.0.1	ываыва	2022-12-11 16:53:04
10	\N	127.0.0.1	ываыва	2022-12-11 16:53:14
11	\N	127.0.0.1	dfgdfg	2022-12-11 16:53:52
12	\N	127.0.0.1	dfgdfg	2022-12-11 16:54:18
13	\N	127.0.0.1	dfgdfg	2022-12-11 17:09:24
14	\N	127.0.0.1	dfgdfg	2022-12-11 22:02:23
15	\N	127.0.0.1	dfgdfg	2022-12-11 23:58:22
16	4	127.0.0.1	21313	2022-12-13 01:45:47
17	4	127.0.0.1	21313	2022-12-13 08:08:38
18	4	127.0.0.1	21313	2022-12-13 19:45:22
19	4	127.0.0.1	21313	2022-12-13 20:36:29
20	4	127.0.0.1	Товар	2022-12-13 20:36:34
21	4	127.0.0.1	21313	2022-12-13 20:36:59
22	4	127.0.0.1	Товар	2022-12-13 20:40:48
23	4	127.0.0.1	Товар	2022-12-13 20:40:57
24	4	127.0.0.1	Товар	2022-12-13 20:42:27
25	4	127.0.0.1	Товар	2022-12-13 20:42:34
26	4	127.0.0.1	Товар	2022-12-13 20:43:09
27	4	127.0.0.1	48	2022-12-13 20:44:27
28	4	127.0.0.1	48	2022-12-13 20:44:39
29	4	127.0.0.1	321321	2022-12-13 22:35:31
30	4	127.0.0.1	321321	2022-12-13 22:35:42
31	4	127.0.0.1	321321	2022-12-13 22:36:48
32	4	127.0.0.1	321321	2022-12-13 22:36:49
33	4	127.0.0.1	321321	2022-12-13 22:37:03
34	4	127.0.0.1	ewerw	2022-12-13 22:43:35
35	4	127.0.0.1	Товар	2022-12-13 22:43:42
36	4	127.0.0.1	Товар	2022-12-13 22:45:48
37	4	127.0.0.1	Товар	2022-12-13 22:45:55
38	4	127.0.0.1	Товар	2022-12-13 22:48:11
39	4	127.0.0.1	Товар	2022-12-13 22:48:58
40	4	127.0.0.1	Товар	2022-12-13 22:52:42
41	4	127.0.0.1	Товар	2022-12-13 22:52:45
42	4	127.0.0.1	Товар	2022-12-13 22:52:55
43	4	127.0.0.1		2022-12-13 23:07:16
44	4	127.0.0.1		2022-12-13 23:08:08
45	4	127.0.0.1	123	2022-12-13 23:11:36
46	4	127.0.0.1	123	2022-12-13 23:12:17
47	4	127.0.0.1	123	2022-12-13 23:12:19
48	4	127.0.0.1	123	2022-12-13 23:13:08
49	4	127.0.0.1	123	2022-12-13 23:14:34
50	4	127.0.0.1	12311	2022-12-13 23:14:40
51	4	127.0.0.1	Товар	2022-12-13 23:14:49
52	4	127.0.0.1	Толвар	2022-12-14 00:26:14
53	4	127.0.0.1	Толвар	2022-12-14 00:26:21
54	4	127.0.0.1	Толвар	2022-12-14 00:26:55
85	4	127.0.0.1	Толвар	2022-12-15 20:13:37
86	4	127.0.0.1	d	2022-12-15 22:27:43
87	4	127.0.0.1	fdsfdsf	2022-12-15 22:27:44
88	4	127.0.0.1	21313	2022-12-16 20:45:38
89	4	127.0.0.1	fdsfdsf	2022-12-16 20:45:42
90	\N	127.0.0.1	21313	2022-12-17 11:30:32
91	4	127.0.0.1	Товар	2022-12-24 18:04:58
\.


--
-- Name: search_words_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.search_words_id_seq', 91, true);


--
-- Data for Name: settings; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.settings (id, user_id, city_id, stock_id) FROM stdin;
1	1	1	1
\.


--
-- Name: settings_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.settings_id_seq', 2, false);


--
-- Data for Name: sizes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sizes (id, eu_size, ru_size, show, "default") FROM stdin;
1	S	42-44	0	0
2	M	44-48	1	1
\.


--
-- Name: sizes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.sizes_id_seq', 2, true);


--
-- Data for Name: stocks; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.stocks (id, name, address_id) FROM stdin;
1	Алтуфьево	1
2	Каширское шоссе	1
\.


--
-- Name: stocks_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.stocks_id_seq', 3, false);


--
-- Data for Name: street; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.street (id, name, region_id, country_id) FROM stdin;
\.


--
-- Name: street_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.street_id_seq', 1, false);


--
-- Data for Name: tree; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tree (id, root, lft, rgt, lvl, name, icon, icon_type, active, selected, disabled, readonly, visible, collapsed, movable_u, movable_d, movable_l, movable_r, removable, removable_all, child_allowed) FROM stdin;
10	6	2	3	1	Розетки и выключатели		1	t	f	f	f	t	f	t	t	t	t	t	f	t
13	5	9	10	2	Дрели и шуруповерты		1	t	f	f	f	t	f	t	t	t	t	t	f	t
14	5	11	12	2	Компрессорное оборудование и аксессуары		1	t	f	f	f	t	f	t	t	t	t	t	f	t
17	7	3	4	2	Смесители и комплектующие		1	t	f	f	f	t	f	t	t	t	t	t	f	t
18	7	5	6	2	Душевое оборудование		1	t	f	f	f	t	f	t	t	t	t	t	f	t
15	7	2	9	1	Смесители и душевое оборудование		1	t	f	f	f	t	f	t	t	t	t	t	f	t
16	7	7	8	2	Мебель для ванной комнаты		1	t	f	f	f	t	f	t	t	t	t	t	f	t
12	5	5	6	2	Малярный инструмент		1	t	f	f	f	t	f	t	t	t	t	t	f	t
8	5	2	7	1	Ручной инструмент		1	t	f	f	f	t	f	t	t	t	t	t	f	t
9	5	8	13	1	Электроинструмент		1	t	f	f	f	t	f	t	t	t	t	t	f	t
23	5	15	16	2	Листовые материалы		1	t	f	f	f	t	f	t	t	t	t	t	f	t
22	5	14	17	1	Материалы для сухого строительства		1	t	f	f	f	t	f	t	t	t	t	t	f	t
24	5	18	21	1	Древесно-плитные материалы		1	t	f	f	f	t	f	t	t	t	t	t	f	t
25	5	19	20	2	Плита OSB		1	t	f	f	f	t	f	t	t	t	t	t	f	t
11	5	3	4	2	Измерительный инструмент		1	t	f	f	f	t	f	t	t	t	t	t	f	t
5	5	1	22	0	Инструмент		1	t	f	f	f	t	f	t	t	t	t	t	f	t
6	6	1	4	0	Электрика		1	t	f	f	f	t	f	t	t	t	t	t	f	t
7	7	1	10	0	Сантехника		1	t	f	f	f	t	f	t	t	t	t	t	f	t
19	19	1	2	0	Инженерные системы		1	t	f	f	f	t	f	t	t	t	t	t	f	t
20	20	1	2	0	Интерьер и отделка		1	t	f	f	f	t	f	t	t	t	t	t	f	t
21	21	1	2	0	Крепеж		1	t	f	f	f	t	f	t	t	t	t	t	f	t
\.


--
-- Name: tree_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tree_id_seq', 25, true);


--
-- Data for Name: units; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.units (id, name, short) FROM stdin;
1	Килограмм	кг
2	Литр	л.
3	Метр	м
4	Упаковка	упак.
5	Штука	шт.
6	Штука	шт.
\.


--
-- Name: units_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.units_id_seq', 7, false);


--
-- Data for Name: user_favorites; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.user_favorites (id, user_id, product_id, created_at) FROM stdin;
5	4	42	\N
9	4	41	\N
46	4	50	\N
47	4	49	\N
48	4	49	\N
50	4	28	\N
52	22	42	\N
53	23	42	\N
\.


--
-- Name: user_favorites_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.user_favorites_id_seq', 53, true);


--
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.user_id_seq', 23, true);


--
-- Data for Name: user_password_restore; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.user_password_restore (id, user_id, code, active) FROM stdin;
\.


--
-- Name: user_password_restore_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.user_password_restore_id_seq', 1, false);


--
-- Data for Name: user_profile; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.user_profile (id, user_id, first_name, last_name, phone, address, country, city) FROM stdin;
2	4	Мезенцев	Сергей	89269756505	Москва, Высоковольтны проезд 1 к3	1	2
3	1	Сергей	Mezentsev	+79269756505	127422	Россия	Москва
4	1	Сергей	Mezentsev	+79269756505	127422	Россия	Москва
\.


--
-- Name: user_profile_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.user_profile_id_seq', 4, true);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, username, auth_key, password_hash, password_reset_token, email, phones, status, rememberme, created_at, updated_at, verification_token) FROM stdin;
1	admin	0oy2TPoNQ62KtO1MGtoAEhsG8BHoiZF2	$2y$13$KgsjTYX6ksb3GH59dGRbqeEdpI6rweLg0z4bkoSAXGzGdWVFCWeuC				10	1	1568407565	1568407565	N-jcyjqRZmfDr4kL4-kUZd5BJharC-aK_1568407565
4	kurt_dc@mail.ru	NBC8xp1gp8rNws3gmf2kHe1z9prpycO4	$2y$13$.kYW52L2T1GaPyI1rl7RWu8HIBkFaXCwKmIndx9FfmLFFWeQ03Z9C	W6AFqjlHhcBcdFxHdgwOqtjw-xRqtbTR_1669466860	kurt_dc@mail.ru	\N	10	\N	1669467779	1669467779	1Z5DqrcPInYmSfDeu4TR5uhJ35id8qHD_1667380804
21	chilinduh@gmail.com	bcFc7MHlOfMKgGoTcIeuhV6o-r7dj6Or	$2y$13$RmP44333ZX4higsu1AVkLOxtebctUblFxrofwfbewE9FLFUvbSFnS	\N	chilinduh@gmail.com	\N	10	\N	1670343239	1670343239	aKZ7FX9C5i5DFxxh7AUXsf4eJ4fr8NmK_1670343239
22	kurt_dc@mail.ru1	dbQ7PkXxx4j_ChtkJyShxWhi-vqbHPz-	$2y$13$gSVySK2wnapna1BhTf955e1YgRJn6Dv7OQE7PiXnE/3VqqAMVQErS	\N	kurt_dc@mail.ru1	\N	10	\N	1672077748	1672077748	2Z7iMNgqLRTsdFjXvXgkCCvZFm1dsAou_1672077748
23	2@mail.ru	nRLLUixUgsWT5DLwPlHpmVAgWbDVGR7p	$2y$13$kfouhwwFyC/GczegaFYe4OSGOTzy4EbiOLDzaYmEPoawn1d3NNc0G	\N	2@mail.ru	\N	10	\N	1673559059	1673559059	T0uSGEnWMbiNZhlnMQMkmii1bec_MuoV_1673559059
\.


--
-- Data for Name: x; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.x (id, name) FROM stdin;
1	aaa
2	bbb
3	ccc
\.


--
-- Data for Name: y; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.y (id) FROM stdin;
1
4
\.


--
-- Name: admin_menu admin_menu_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin_menu
    ADD CONSTRAINT admin_menu_pkey PRIMARY KEY (id);


--
-- Name: cart_items cart_items_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cart_items
  ADD CONSTRAINT cart_items_pkey PRIMARY KEY (id);


--
-- Name: cart cart_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cart
  ADD CONSTRAINT cart_pkey PRIMARY KEY (id);


--
-- Name: city city_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.city
  ADD CONSTRAINT city_pkey PRIMARY KEY (id);


--
-- Name: country country_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.country
  ADD CONSTRAINT country_pkey PRIMARY KEY (id);


--
-- Name: menu menu_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.menu
  ADD CONSTRAINT menu_pkey PRIMARY KEY (id);


--
-- Name: migration migration_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migration
  ADD CONSTRAINT migration_pkey PRIMARY KEY (version);


--
-- Name: order_items order_items_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_items
  ADD CONSTRAINT order_items_pkey PRIMARY KEY (id);


--
-- Name: order_status order_status_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_status
  ADD CONSTRAINT order_status_pkey PRIMARY KEY (id);


--
-- Name: orders orders_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders
  ADD CONSTRAINT orders_pkey PRIMARY KEY (id);


--
-- Name: addresses pk_addresses; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.addresses
  ADD CONSTRAINT pk_addresses PRIMARY KEY (id);


--
-- Name: brands pk_brands; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.brands
  ADD CONSTRAINT pk_brands PRIMARY KEY (id);


--
-- Name: category pk_category; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.category
  ADD CONSTRAINT pk_category PRIMARY KEY (id);


--
-- Name: category_type pk_category_type; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.category_type
  ADD CONSTRAINT pk_category_type PRIMARY KEY (id);


--
-- Name: colors pk_colors; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.colors
  ADD CONSTRAINT pk_colors PRIMARY KEY (id);


--
-- Name: delivery pk_delivery; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.delivery
  ADD CONSTRAINT pk_delivery PRIMARY KEY (id);


--
-- Name: delivery_status pk_delivery_status; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.delivery_status
  ADD CONSTRAINT pk_delivery_status PRIMARY KEY (id);


--
-- Name: delivery_types pk_delivery_types; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.delivery_types
  ADD CONSTRAINT pk_delivery_types PRIMARY KEY (id);


--
-- Name: file_types pk_file_types; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.file_types
  ADD CONSTRAINT pk_file_types PRIMARY KEY (id);


--
-- Name: files pk_files; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.files
  ADD CONSTRAINT pk_files PRIMARY KEY (id);


--
-- Name: groups pk_groups; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.groups
  ADD CONSTRAINT pk_groups PRIMARY KEY (id);


--
-- Name: ingredients pk_ingredients; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ingredients
  ADD CONSTRAINT pk_ingredients PRIMARY KEY (id);


--
-- Name: manufacturers pk_manufacturers; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.manufacturers
  ADD CONSTRAINT pk_manufacturers PRIMARY KEY (id);


--
-- Name: metro pk_metro; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.metro
  ADD CONSTRAINT pk_metro PRIMARY KEY (id);


--
-- Name: packaging_type pk_packaging_type; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.packaging_type
  ADD CONSTRAINT pk_packaging_type PRIMARY KEY (id);


--
-- Name: payment_types pk_payment_types; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.payment_types
  ADD CONSTRAINT pk_payment_types PRIMARY KEY (id);


--
-- Name: prices pk_prices; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.prices
  ADD CONSTRAINT pk_prices PRIMARY KEY (id);


--
-- Name: product_leftovers pk_product_leftovers; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product_leftovers
  ADD CONSTRAINT pk_product_leftovers PRIMARY KEY (id);


--
-- Name: products pk_products; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products
  ADD CONSTRAINT pk_products PRIMARY KEY (id);


--
-- Name: product_balance pk_products_ballance; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product_balance
  ADD CONSTRAINT pk_products_ballance PRIMARY KEY (id);


--
-- Name: products_color_group pk_products_color_group; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products_color_group
  ADD CONSTRAINT pk_products_color_group PRIMARY KEY (id);


--
-- Name: products_colors pk_products_colors; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products_colors
  ADD CONSTRAINT pk_products_colors PRIMARY KEY (id);


--
-- Name: products_ingredients pk_products_ingredients; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products_ingredients
  ADD CONSTRAINT pk_products_ingredients PRIMARY KEY (id);


--
-- Name: products_packaging_type pk_products_packaging_type; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products_packaging_type
  ADD CONSTRAINT pk_products_packaging_type PRIMARY KEY (id);


--
-- Name: products_prices pk_products_prices; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products_prices
  ADD CONSTRAINT pk_products_prices PRIMARY KEY (id);


--
-- Name: products_weight_group pk_products_weight_group; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products_weight_group
  ADD CONSTRAINT pk_products_weight_group PRIMARY KEY (id);


--
-- Name: roles pk_roles; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
  ADD CONSTRAINT pk_roles PRIMARY KEY (id);


--
-- Name: settings pk_settings; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.settings
  ADD CONSTRAINT pk_settings PRIMARY KEY (id);


--
-- Name: stocks pk_stocks; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.stocks
  ADD CONSTRAINT pk_stocks PRIMARY KEY (id);


--
-- Name: units pk_units; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.units
  ADD CONSTRAINT pk_units PRIMARY KEY (id);


--
-- Name: price_history price_history_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.price_history
  ADD CONSTRAINT price_history_pkey PRIMARY KEY (id);


--
-- Name: product_property product_property_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product_property
  ADD CONSTRAINT product_property_pkey PRIMARY KEY (id);


--
-- Name: property property_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.property
  ADD CONSTRAINT property_pkey PRIMARY KEY (id);


--
-- Name: rating rating_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rating
  ADD CONSTRAINT rating_pkey PRIMARY KEY (id);


--
-- Name: region region_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.region
  ADD CONSTRAINT region_pkey PRIMARY KEY (id);


--
-- Name: review review_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.review
  ADD CONSTRAINT review_pkey PRIMARY KEY (id);


--
-- Name: search_words search_words_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.search_words
  ADD CONSTRAINT search_words_pkey PRIMARY KEY (id);


--
-- Name: sizes sizes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sizes
  ADD CONSTRAINT sizes_pkey PRIMARY KEY (id);


--
-- Name: street street_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.street
  ADD CONSTRAINT street_pkey PRIMARY KEY (id);


--
-- Name: tree tree_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tree
  ADD CONSTRAINT tree_pkey PRIMARY KEY (id);


--
-- Name: user_favorites user_favorites_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.user_favorites
  ADD CONSTRAINT user_favorites_pkey PRIMARY KEY (id);


--
-- Name: user_password_restore user_password_restore_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.user_password_restore
  ADD CONSTRAINT user_password_restore_pkey PRIMARY KEY (id);


--
-- Name: user_profile user_profile_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.user_profile
  ADD CONSTRAINT user_profile_pkey PRIMARY KEY (id);


--
-- Name: users users_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
  ADD CONSTRAINT users_email_key UNIQUE (email);


--
-- Name: users users_password_reset_token_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
  ADD CONSTRAINT users_password_reset_token_key UNIQUE (password_reset_token);


--
-- Name: users users_phone_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
  ADD CONSTRAINT users_phone_key UNIQUE (phones);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
  ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: users users_username_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
  ADD CONSTRAINT users_username_key UNIQUE (username);


--
-- Name: admin_menu_NK1; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "admin_menu_NK1" ON public.admin_menu USING btree (root);


--
-- Name: admin_menu_NK2; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "admin_menu_NK2" ON public.admin_menu USING btree (lft);


--
-- Name: admin_menu_NK3; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "admin_menu_NK3" ON public.admin_menu USING btree (rgt);


--
-- Name: admin_menu_NK4; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "admin_menu_NK4" ON public.admin_menu USING btree (lvl);


--
-- Name: admin_menu_NK5; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "admin_menu_NK5" ON public.admin_menu USING btree (active);


--
-- Name: order_items_order_id; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX order_items_order_id ON public.order_items USING btree (order_id);


--
-- Name: order_items_product_id; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX order_items_product_id ON public.order_items USING btree (product_id);


--
-- Name: tree_NK1; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "tree_NK1" ON public.tree USING btree (root);


--
-- Name: tree_NK2; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "tree_NK2" ON public.tree USING btree (lft);


--
-- Name: tree_NK3; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "tree_NK3" ON public.tree USING btree (rgt);


--
-- Name: tree_NK4; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "tree_NK4" ON public.tree USING btree (lvl);


--
-- Name: tree_NK5; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "tree_NK5" ON public.tree USING btree (active);


--
-- Name: user_favorites_product_id; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX user_favorites_product_id ON public.user_favorites USING btree (product_id);


--
-- Name: user_favorites_user_id; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX user_favorites_user_id ON public.user_favorites USING btree (user_id);


--
-- Name: user_password_restore_user_id; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX user_password_restore_user_id ON public.user_password_restore USING btree (user_id);


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

