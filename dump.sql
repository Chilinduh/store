CREATE TABLE public.brands
(
  id   integer                NOT NULL,
  name character varying(255) NOT NULL,
  show numeric DEFAULT 1
);

CREATE TABLE public.admin_menu
(
  id            bigint                 NOT NULL,
  root          integer,
  lft           integer                NOT NULL,
  rgt           integer                NOT NULL,
  lvl           smallint               NOT NULL,
  name          character varying(60)  NOT NULL,
  icon          character varying(255),
  icon_type     smallint DEFAULT 1     NOT NULL,
  active        boolean  DEFAULT true  NOT NULL,
  selected      boolean  DEFAULT false NOT NULL,
  disabled      boolean  DEFAULT false NOT NULL,
  readonly      boolean  DEFAULT false NOT NULL,
  visible       boolean  DEFAULT true  NOT NULL,
  collapsed     boolean  DEFAULT false NOT NULL,
  movable_u     boolean  DEFAULT true  NOT NULL,
  movable_d     boolean  DEFAULT true  NOT NULL,
  movable_l     boolean  DEFAULT true  NOT NULL,
  movable_r     boolean  DEFAULT true  NOT NULL,
  removable     boolean  DEFAULT true  NOT NULL,
  removable_all boolean  DEFAULT false NOT NULL,
  child_allowed boolean  DEFAULT true  NOT NULL,
  url           text
);


CREATE TABLE public.user_favorites
(
  id         bigint  NOT NULL,
  user_id    integer NOT NULL,
  product_id integer NOT NULL,
  created_at timestamp(0) without time zone DEFAULT NULL :: timestamp without time zone
);

CREATE TABLE public.user_password_restore
(
  id      bigint                NOT NULL,
  user_id integer               NOT NULL,
  code    character varying(60) NOT NULL,
  active  boolean DEFAULT true  NOT NULL
);
CREATE TABLE public.user_profile
(
  id         bigint  NOT NULL,
  user_id    integer NOT NULL,
  first_name character varying(60),
  last_name  character varying(60),
  phone      character varying(60),
  address    character varying(260),
  country    character varying(60) DEFAULT NULL:: character varying,
  city       character varying(60) DEFAULT NULL:: character varying
);
CREATE TABLE public.cart
(
  id         bigint  NOT NULL,
  user_id    integer NOT NULL,
  created_at timestamp(0) without time zone DEFAULT now(),
  updated_at timestamp(0) without time zone DEFAULT now(),
  deleted_at timestamp(0) without time zone DEFAULT NULL :: timestamp without time zone
);

CREATE TABLE public.cart_items
(
  id         bigint  NOT NULL,
  cart_id    integer NOT NULL,
  product_id integer NOT NULL,
  quantity   integer NOT NULL,
  created_at timestamp(0) without time zone DEFAULT now(),
  updated_at timestamp(0) without time zone DEFAULT now(),
  deleted_at timestamp(0) without time zone DEFAULT NULL :: timestamp without time zone
);

CREATE TABLE public.order_items
(
  id         bigint  NOT NULL,
  order_id   integer NOT NULL,
  product_id integer NOT NULL,
  quantity   integer NOT NULL,
  created_at timestamp(0) without time zone DEFAULT now(),
  updated_at timestamp(0) without time zone DEFAULT now(),
  deleted_at timestamp(0) without time zone DEFAULT NULL :: timestamp without time zone
);

CREATE TABLE public.orders
(
  id         bigint            NOT NULL,
  user_id    integer           NOT NULL,
  status_id  integer DEFAULT 0 NOT NULL,
  price      bigint  DEFAULT 0 NOT NULL
    accept boolean,
  comment    text,
  created_at timestamp(0) without time zone DEFAULT now(),
  updated_at timestamp(0) without time zone DEFAULT now(),
  deleted_at timestamp(0) without time zone DEFAULT NULL :: timestamp without time zone,
);


CREATE TABLE public.orders_statuses
(
  id              integer                NOT NULL,
  name            character varying(255) NOT NULL,
  status_color_id character varying(10) DEFAULT NULL:: character varying
    show smallint DEFAULT 0,

);
CREATE TABLE public.search_words
(
  id         bigint                 NOT NULL,
  user_id    integer,
  ip         character varying(255) DEFAULT NULL:: character varying,
  word       character varying(255) NOT NULL,
  created_at timestamp(0) without time zone DEFAULT now()
);


CREATE TABLE public.property
(
  id     bigint                 NOT NULL,
  name   character varying(255) NOT NULL,
  prefix character varying(10)  NOT NULL,
  show   smallint DEFAULT 0
);

CREATE TABLE public.product_property
(
  id          bigint  NOT NULL,
  product_id  integer NOT NULL,
  property_id integer NOT NULL,
  created_at  timestamp(0) without time zone DEFAULT now()
);


CREATE TABLE public.products_sizes
(
  id        integer               NOT NULL,
  eu_size   character varying(20) NOT NULL,
  ru_size   character varying(20) NOT NULL,
  show      smallint DEFAULT 0,
  "default" smallint DEFAULT 0
);


CREATE TABLE public.orders_status_colors
(
  id              integer                NOT NULL,
  name            character varying(255) NOT NULL,
  status_color_id character varying(10) DEFAULT NULL:: character varying
    show smallint DEFAULT 0,

);


CREATE TABLE public.tree
(
  id            bigint                 NOT NULL,
  root          integer,
  lft           integer                NOT NULL,
  rgt           integer                NOT NULL,
  lvl           smallint               NOT NULL,
  name          character varying(60)  NOT NULL,
  icon          character varying(255),
  icon_type     smallint DEFAULT 1     NOT NULL,
  active        boolean  DEFAULT true  NOT NULL,
  selected      boolean  DEFAULT false NOT NULL,
  disabled      boolean  DEFAULT false NOT NULL,
  readonly      boolean  DEFAULT false NOT NULL,
  visible       boolean  DEFAULT true  NOT NULL,
  collapsed     boolean  DEFAULT false NOT NULL,
  movable_u     boolean  DEFAULT true  NOT NULL,
  movable_d     boolean  DEFAULT true  NOT NULL,
  movable_l     boolean  DEFAULT true  NOT NULL,
  movable_r     boolean  DEFAULT true  NOT NULL,
  removable     boolean  DEFAULT true  NOT NULL,
  removable_all boolean  DEFAULT false NOT NULL,
  child_allowed boolean  DEFAULT true  NOT NULL
);

CREATE TABLE public.users
(
  id                   integer                NOT NULL,
  username             character varying(255) NOT NULL,
  auth_key             character varying(255) NOT NULL,
  password_hash        character varying(255) NOT NULL,
  password_reset_token character varying(255),
  email                character varying(255) NOT NULL,
  phones               character varying(255),
  status               smallint DEFAULT 10    NOT NULL,
  rememberme           integer,
  created_at           integer                NOT NULL,
  updated_at           integer                NOT NULL,
  verification_token   character varying(255)
);


CREATE TABLE public.stocks
(
  id         integer                NOT NULL,
  name       character varying(255) NOT NULL,
  address_id integer                NOT NULL
);

CREATE TABLE public.units
(
  id    integer                NOT NULL,
  name  character varying(255) NOT NULL,
  short character varying(255) NOT NULL
);



CREATE TABLE public.payment_types
(
  id   integer                NOT NULL,
  name character varying(255) NOT NULL,
  show numeric,
);


CREATE TABLE public.manufacturers
(
  id   integer                NOT NULL,
  name character varying(255) NOT NULL,
  show numeric DEFAULT 1
);

CREATE TABLE public.country
(
  id   integer DEFAULT nextval('public.country_id_seq'::regclass) NOT NULL,
  name character varying(255)                                     NOT NULL
);


CREATE TABLE public.delivery_types
(
  id   integer                NOT NULL,
  name character varying(255) NOT NULL,
  show numeric
);

CREATE TABLE public.colors
(
  id        integer                NOT NULL,
  name      character varying(255) NOT NULL,
  color     character varying(7),
  show      integer,
  "default" smallint DEFAULT 0
);

CREATE TABLE public.category
(
  id        integer DEFAULT nextval('public.category_id_seq'::regclass) NOT NULL,
  parent_id integer                                                     NOT NULL,
  name      character varying(255)                                      NOT NULL,
  show      numeric
);


CREATE TABLE public.stocks
(
  id         integer                NOT NULL,
  name       character varying(255) NOT NULL,
  address_id integer                NOT NULL
);

CREATE TABLE public.units
(
  id    integer                NOT NULL,
  name  character varying(255) NOT NULL,
  short character varying(255) NOT NULL
);

CREATE TABLE public.product_balance
(
  id         integer           NOT NULL,
  stock_id   integer           NOT NULL,
  product_id integer           NOT NULL,
  quantity   integer DEFAULT 0,
  show       integer,
  color_id   bigint  DEFAULT 0 NOT NULL,
  size_id    bigint  DEFAULT 0 NOT NULL,
  created_at timestamp(0) without time zone DEFAULT now(),
  updated_at timestamp(0) without time zone DEFAULT now()
);

CREATE TABLE public.manufacturers
(
  id   integer                NOT NULL,
  name character varying(255) NOT NULL,
  show numeric DEFAULT 1
);

CREATE TABLE public.country
(
  id   integer DEFAULT nextval('public.country_id_seq'::regclass) NOT NULL,
  name character varying(255)                                     NOT NULL
);

CREATE TABLE public.product_colors
(
  id        integer                NOT NULL,
  name      character varying(255) NOT NULL,
  color     character varying(7),
  show      integer,
  "default" smallint DEFAULT 0
);


CREATE TABLE public.files
(
  id           integer                NOT NULL,
  table_name   character varying(255) NOT NULL,
  table_id     integer                NOT NULL,
  file_type_id integer                NOT NULL,
  original     character varying(255) NOT NULL,
  thumbnail    character varying(255) NOT NULL,
  size         character varying(25)  NOT NULL,
  main         numeric,
  show         numeric,
  created_at   integer                NOT NULL,
  updated_at   integer                NOT NULL
);


CREATE TABLE public.products
(
  id                integer                NOT NULL,
  name              character varying(255) NOT NULL,
  code              character varying(100) DEFAULT NULL:: character varying,
  brand_id          integer                DEFAULT 0
    category_id integer NOT NULL,
  manufacturer_id   integer,
  packaging_type_id integer,
  weight            integer,
  description       text,
  price             bigint                 DEFAULT 0,
  main              numeric,
  show              numeric,
  created_at        integer                NOT NULL,
  updated_at        integer                NOT NULL,
);


CREATE TABLE public.product_balance
(
  id         integer           NOT NULL,
  stock_id   integer           NOT NULL,
  product_id integer           NOT NULL,
  quantity   integer DEFAULT 0,
  show       integer,
  color_id   bigint  DEFAULT 0 NOT NULL,
  size_id    bigint  DEFAULT 0 NOT NULL,
  created_at timestamp(0) without time zone DEFAULT now(),
  updated_at timestamp(0) without time zone DEFAULT now()
);

create table settings (
                        id integer NOT NULL DEFAULT nextval('settings_id_seq'::regclass) ,
                        user_id  integer NOT NULL,
                        city_id integer NOT NULL,
                        stock_id integer NOT NULL,
                        constraint pk_settings primary key (id)
);




