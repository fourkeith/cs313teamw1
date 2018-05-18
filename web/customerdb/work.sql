CREATE TABLE Work (
      WORKID SERIAL PRIMARY KEY  NOT NULL
    , DESCRIPTION   VARCHAR(50) NOT NULL
    , WORKDATE      DATE         NOT NULL
    , CUSTOMERID    INT         references Customer(customerid)
    , CARID         INT         references Cars(carid)
);
