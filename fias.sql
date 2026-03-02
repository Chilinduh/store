
drop table if exists address;
drop table if exists house;
drop sequence if exists address_id_seq cascade;


create sequence address_id_seq;

CREATE TABLE address
(
    ACTSTATUS integer,
    AOGUID character varying(36),
    AOID character varying(36),
    AOLEVEL integer,
    AREACODE integer,
    AUTOCODE integer,
    CENTSTATUS integer,
    CITYCODE integer,
    CODE character varying(20),
    CURRSTATUS integer,
    ENDDATE timestamp,
    FORMALNAME character varying(120),
    IFNSFL integer,
    IFNSUL integer,
    NEXTID character varying(36),
    OFFNAME character varying(120),
    OKATO VARCHAR(11),
    OKTMO VARCHAR(11),
    OPERSTATUS integer,
    PARENTGUID character varying(36),
    PLACECODE integer,
    PLAINCODE character varying(20),
    POSTALCODE integer,
    PREVID character varying(36),
    REGIONCODE integer,
    SHORTNAME character varying(15),
    STARTDATE timestamp,
    STREETCODE integer,
    TERRIFNSFL integer,
    TERRIFNSUL integer,
    UPDATEDATE timestamp,
    CTARCODE integer,
    EXTRCODE integer,
    SEXTCODE integer,
    LIVESTATUS integer,
    NORMDOC character varying(36),
    PLANCODE integer,
    CADNUM integer,
    DIVTYPE integer
);



CREATE TABLE house
(
    AOGUID character varying(36),
    BUILDNUM character varying(10),
	ENDDATE timestamp,
	ESTSTATUS integer,
    HOUSEGUID character varying(36),
    HOUSEID character varying(36),
    HOUSENUM character varying(15),
	STATSTATUS integer,
	IFNSFL integer,
	IFNSUL integer,
	OKATO VARCHAR(11),
	OKTMO VARCHAR(11),
	POSTALCODE integer,
	STARTDATE timestamp,
	STRUCNUM VARCHAR(15),
	STRSTATUS integer,
	TERRIFNSFL integer,
	TERRIFNSUL integer,
	UPDATEDATE timestamp,
	NORMDOC character varying(36),
	COUNTER integer,
	CADNUM VARCHAR(50),
	DIVTYPE integer
);

COPY address FROM 'D:\downloads\fias_dbf\77.csv' DELIMITER ',' CSV;
COPY address FROM 'D:\downloads\fias_dbf\77.csv' DELIMITER ';' CSV;
COPY address FROM 'D:\downloads\fias_dbf\77.csv' DELIMITER ';' CSV;
ACTSTATUS;AOGUID;AOID;AOLEVEL;AREACODE;AUTOCODE;CENTSTATUS;CITYCODE;CODE;CURRSTATUS;ENDDATE;FORMALNAME;IFNSFL;IFNSUL;NEXTID;OFFNAME;OKATO;OKTMO;OPERSTATUS;PARENTGUID;PLACECODE;PLAINCODE;POSTALCODE;PREVID;REGIONCODE;SHORTNAME;STARTDATE;STREETCODE;TERRIFNSFL;TERRIFNSUL;UPDATEDATE;CTARCODE;EXTRCODE;SEXTCODE;LIVESTATUS;NORMDOC;PLANCODE;CADNUM;DIVTYPE

ACTSTATUS;
AOGUID;
AOID;
AOLEVEL;
AREACODE;
AUTOCODE;
CENTSTATUS;
CITYCODE;
CODE;
CURRSTATUS;
ENDDATE;
FORMALNAME;
IFNSFL;
IFNSUL;
NEXTID;
OFFNAME;
OKATO;
OKTMO;
OPERSTATUS;
PARENTGUID;
PLACECODE;
PLAINCODE;
POSTALCODE;
PREVID;
REGIONCODE;
SHORTNAME;
STARTDATE;
STREETCODE;
TERRIFNSFL;
TERRIFNSUL;
UPDATEDATE;
CTARCODE;
EXTRCODE;
SEXTCODE;
LIVESTATUS;
NORMDOC;
PLANCODE;
CADNUM;
DIVTYPE