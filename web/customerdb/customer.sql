CREATE TABLE Customer (
      CUSTOMERID SERIAL PRIMARY KEY NOT NULL
    , FIRSTNAME  VARCHAR(50)        NOT NULL
    , LASTNAME   VARCHAR(50)        NOT NULL
    , ADDRESS    VARCHAR(150)       NOT NULL
    , ZIP        INT                NOT NULL
    , PHONE      INT                NOT NULL
);


-- Create the Table to hold the Cars
CREATE TABLE Cars (
      CARID SERIAL PRIMARY KEY  NOT NULL
    , MAKE         VARCHAR(50)  NOT NULL
    , MODEL        VARCHAR(50)  NOT NULL
    , YEAR         INT          NOT NULL
    , VIN          INT          NOT NULL
    , LICENSEPLATE VARCHAR(50)  NOT NULL
    , ODOMETER     INT          NOT NULL
);


CREATE TABLE Work (
      WORKID SERIAL PRIMARY KEY  NOT NULL
    , DESCRIPTION   VARCHAR(50) NOT NULL
    , WORKDATE      DATE         NOT NULL
);

ALTER TABLE Customer ADD carid       INT references Cars(carid);
ALTER TABLE Customer ADD workid      INT references Work(workid);
ALTER TABLE Cars     ADD customerid  INT references Customer(customerid);
ALTER TABLE Cars     ADD workid      INT references Work(workid);
ALTER TABLE Work     ADD customerid  INT references Customer(customerid);
ALTER TABLE Work     ADD carid       INT references Cars(carid);
