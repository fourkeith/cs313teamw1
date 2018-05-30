CREATE TABLE Customer (
      CUSTOMERID SERIAL PRIMARY KEY NOT NULL
    , FIRSTNAME  VARCHAR(50)        NOT NULL
    , LASTNAME   VARCHAR(50)        NOT NULL
    , ADDRESS    VARCHAR(150)       NOT NULL
    , ZIP        INT                NOT NULL
    , PHONE      VARCHAR(50)        NOT NULL
);


-- Create the Table to hold the Cars
CREATE TABLE Cars (
      CARID SERIAL PRIMARY KEY  NOT NULL
    , MAKE         VARCHAR(50)  NOT NULL
    , MODEL        VARCHAR(50)  NOT NULL
    , YEAR         INT          NOT NULL
    , VIN          VARCHAR(17)  NOT NULL
    , LICENSEPLATE VARCHAR(50)  NOT NULL
    , ODOMETER     INT          NOT NULL
);


CREATE TABLE Work (
      WORKID SERIAL PRIMARY KEY  NOT NULL
    , DESCRIPTION   VARCHAR(50)  NOT NULL
    , WORKDATE      DATE         NOT NULL
    , KEYTAG        INT          NOT NULL
);

-- Add fk references to tables /Note Could not add inside table declarations because it came up with error.
--ALTER TABLE Cars     ADD customerid  INT references Customer(customerid);
--ALTER TABLE Cars     ADD workid      INT references Work(workid);
--ALTER TABLE Work     ADD customerid  INT references Customer(customerid);
--ALTER TABLE Work     ADD carid       INT references Cars(carid);


--CREATE SEQUENCE customerint;
--CREATE SEQUENCE carint;
--CREATE SEQUENCE workint;

-- Insert Data into tables

INSERT INTO Customer
VALUES (
      1, 'Keith', 'Wheeler', '165 Palisades Dr', 78148, '6155676623'
);

INSERT INTO Customer
VALUES (
      2, 'Zack', 'Chaples', '183 Choo Choo Dr', 78122, '3138460013'
);

INSERT INTO Customer
VALUES (
      3, 'Kay', 'Locks', '225 Layanan Dr', 78133, '3133151189'
);

INSERT INTO Cars 
VALUES (
      1, 'Ford', 'Taurus', 1999, 'F1NTUV11256783435', 'FH1354', 172373
);

INSERT INTO Cars 
VALUES (
      2, 'Hyundai', 'Accent', 2005, 'G1TUV315U12343453', 'KH1354', 113222
);

INSERT INTO Cars 
VALUES (
      3, 'Nissan', 'Sentra', 2015, 'U3NOI3138FU839212', 'KH1355', 35010
);

INSERT INTO Cars 
VALUES (
      4, 'Dodge', 'Ram', 2013, 'D3UIV313139875987', 'KH1356', 355010
);

INSERT INTO Work 
VALUES (
      1, 'Oil Change', '12/13/2016', 000157
);

INSERT INTO Work 
VALUES (
      2, 'Tires', '01/01/2016', 000183
);

INSERT INTO Work 
VALUES (
      3, 'Oil Change', '03/03/2016', 000585
);

INSERT INTO Work 
VALUES (
      4, 'Oil Change', '04/08/2016', 000667
);

CREATE USER walmart WITH PASSWORD 'walmart';
GRANT SELECT, INSERT, UPDATE ON customer TO walmart;
GRANT SELECT, INSERT, UPDATE ON cars TO walmart;
GRANT SELECT, INSERT, UPDATE ON work TO walmart;
